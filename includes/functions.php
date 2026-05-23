<?php
require_once __DIR__ . '/db.php';

/**
 * Ensure required constants exist (prevents silent failure)
 */
if (!defined('VISITOR_ID_PREFIX')) {
    define('VISITOR_ID_PREFIX', 'PU');
}

if (!defined('VISITOR_ID_PATTERN')) {
    define('VISITOR_ID_PATTERN', '/^PU\d{6}$/');
}

/**
 * Sanitize input data
 */
function sanitize($data) {
    return htmlspecialchars(trim(stripslashes($data)), ENT_QUOTES, 'UTF-8');
}

/**
 * Generate unique visitor ID (ROBUST VERSION)
 */
function generateVisitorId() {
    $db = getDB();
    $maxAttempts = 100;

    for ($i = 0; $i < $maxAttempts; $i++) {

        $digits = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $visitorId = VISITOR_ID_PREFIX . $digits;

        // Validate format
        if (!preg_match(VISITOR_ID_PATTERN, $visitorId)) {
            continue;
        }

        try {
            // Check if exists in users table
            $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE visitor_id = ?");
            $stmt->execute([$visitorId]);

            $count = $stmt->fetchColumn();

            if ($count === false) {
                continue;
            }

            if ((int)$count === 0) {
                // Check tracking table too (extra safety)
                $stmt2 = $db->prepare("SELECT COUNT(*) FROM visitor_ids WHERE visitor_id = ?");
                $stmt2->execute([$visitorId]);

                if ((int)$stmt2->fetchColumn() > 0) {
                    continue;
                }

                // Reserve ID (IMPORTANT: only reserve, NOT final insert here)
                $stmt3 = $db->prepare("INSERT INTO visitor_ids (visitor_id) VALUES (?)");
                $stmt3->execute([$visitorId]);

                return $visitorId;
            }

        } catch (PDOException $e) {
            // Skip and retry on DB error
            continue;
        }
    }

    throw new Exception("Unable to generate unique visitor ID after $maxAttempts attempts");
}

/**
 * Validate visitor ID format
 */
function validateVisitorId($id) {
    return preg_match(VISITOR_ID_PATTERN, $id) === 1;
}

/**
 * Register a new user
 */
function registerUser($firstName, $lastName, $email, $password) {
    $db = getDB();

    // Check email exists
    $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        return ['success' => false, 'message' => 'Email already registered.'];
    }

    // Generate visitor ID
    try {
        $visitorId = generateVisitorId();
    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Could not generate Visitor ID. Try again.'];
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    try {
        $stmt = $db->prepare("
            INSERT INTO users (visitor_id, first_name, last_name, email, password)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $visitorId,
            $firstName,
            $lastName,
            $email,
            $hashedPassword
        ]);

        return [
            'success' => true,
            'message' => 'Registration successful!',
            'visitor_id' => $visitorId,
            'user_id' => $db->lastInsertId()
        ];

    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Registration failed. Please try again.'];
    }
}

function getDonationStats() {
    $db = getDB();

    try {
        // Total donation amount
        $stmt = $db->query("SELECT SUM(amount) AS total FROM donations");
        $total = $stmt->fetchColumn();
        $total = $total ? (float)$total : 0;

        // Total number of donations
        $stmt = $db->query("SELECT COUNT(*) AS count FROM donations");
        $count = $stmt->fetchColumn();
        $count = $count ? (int)$count : 0;

        // Average donation
        $average = $count > 0 ? $total / $count : 0;

        return [
            'total' => $total,
            'count' => $count,
            'average' => $average
        ];

    } catch (PDOException $e) {
        return [
            'total' => 0,
            'count' => 0,
            'average' => 0
        ];
    }
}
/**
 * Login user with lockout mechanism
 */
function loginUser($email, $password) {
    $db = getDB();

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        return ['success' => false, 'message' => 'Invalid email or password.'];
    }

    // Lockout check
    if (!empty($user['lockout_until']) && strtotime($user['lockout_until']) > time()) {
        $remaining = strtotime($user['lockout_until']) - time();

        return [
            'success' => false,
            'message' => "Account locked. Try again in " . ceil($remaining / 60) . " min.",
            'locked' => true
        ];
    }

    // Password check
    if (password_verify($password, $user['password'])) {

        $stmt = $db->prepare("
            UPDATE users 
            SET failed_attempts = 0, lockout_until = NULL 
            WHERE id = ?
        ");
        $stmt->execute([$user['id']]);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['visitor_id'] = $user['visitor_id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['logged_in'] = true;

        return ['success' => true, 'message' => 'Login successful!'];
    }

    // Failed login handling
    $failedAttempts = (int)$user['failed_attempts'] + 1;
    $remaining = MAX_LOGIN_ATTEMPTS - $failedAttempts;

    if ($failedAttempts >= MAX_LOGIN_ATTEMPTS) {
        $lockoutUntil = date('Y-m-d H:i:s', time() + LOCKOUT_DURATION);

        $stmt = $db->prepare("
            UPDATE users 
            SET failed_attempts = ?, lockout_until = ? 
            WHERE id = ?
        ");

        $stmt->execute([$failedAttempts, $lockoutUntil, $user['id']]);

        return [
            'success' => false,
            'message' => 'Account locked due to failed attempts.',
            'locked' => true
        ];
    }

    $stmt = $db->prepare("
        UPDATE users 
        SET failed_attempts = ? 
        WHERE id = ?
    ");
    $stmt->execute([$failedAttempts, $user['id']]);

    return [
        'success' => false,
        'message' => "Wrong password. $remaining attempts left."
    ];
}

/**
 * Check login
 */
function isLoggedIn() {
    return !empty($_SESSION['logged_in']);
}

/**
 * Require login
 */
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: ' . SITE_URL . '/pages/login.php');
        exit;
    }
}

/**
 * Get current user
 */
function getCurrentUser() {
    if (!isLoggedIn()) return null;

    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);

    return $stmt->fetch();
}

/**
 * Transaction reference
 */
function generateTransactionRef() {
    return 'TXN' . date('Ymd') . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
}

/**
 * Donation
 */
function makeDonation($userId, $amount, $message = '', $campaign = 'General') {
    $db = getDB();

    $amount = floatval($amount);

    if ($amount <= 0) {
        return ['success' => false, 'message' => 'Invalid amount.'];
    }

    $txnRef = generateTransactionRef();

    try {
        $stmt = $db->prepare("
            INSERT INTO donations (user_id, amount, message, campaign, transaction_ref)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([$userId, $amount, $message, $campaign, $txnRef]);

        return [
            'success' => true,
            'message' => 'Donation successful!',
            'transaction_ref' => $txnRef
        ];

    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Donation failed.'];
    }
}

/**
 * Donations history
 */
function getUserDonations($userId) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM donations WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}

/**
 * Total donations
 */
function getUserTotalDonations($userId) {
    $db = getDB();
    $stmt = $db->prepare("SELECT COALESCE(SUM(amount),0) as total FROM donations WHERE user_id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetch()['total'];
}

/**
 * Visitor tracking
 */
function trackVisitor($page = '/') {
    $db = getDB();

    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

    $stmt = $db->prepare("
        INSERT INTO visitor_counter (ip_address, page_visited, user_agent)
        VALUES (?, ?, ?)
    ");

    $stmt->execute([$ip, $page, $ua]);
}

/**
 * Get visitor counter statistics
 */
function getVisitorCount() {
    $db = getDB();

    try {
        $stmt = $db->query("
            SELECT 
                COUNT(*) AS total_visits,
                COUNT(DISTINCT ip_address) AS unique_visitors
            FROM visitor_counter
        ");

        $stats = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'total_visits' => isset($stats['total_visits']) ? (int)$stats['total_visits'] : 0,
            'unique_visitors' => isset($stats['unique_visitors']) ? (int)$stats['unique_visitors'] : 0
        ];

    } catch (PDOException $e) {
        return [
            'total_visits' => 0,
            'unique_visitors' => 0
        ];
    }
}

/**
 * CSRF
 */
function getCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Flash messages
 */
function setFlash($type, $message) {
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function getFlash() {
    if (!empty($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}