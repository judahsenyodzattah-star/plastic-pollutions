<?php

session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/db.php';

header('Content-Type: application/json');

if (!isLoggedIn()) {
    echo json_encode(['success' => false, 'message' => 'Please login to submit pledges.']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$pledges = $input['pledges'] ?? [];

if (empty($pledges)) {
    echo json_encode(['success' => false, 'message' => 'No pledges selected.']);
    exit;
}

try {
    $db = getDB();
    $userId = $_SESSION['user_id'] ?? null;

    // Verify the user actually exists in the database
    if ($userId) {
        $checkUser = $db->prepare("SELECT id FROM users WHERE id = ?");
        $checkUser->execute([$userId]);
        if (!$checkUser->fetch()) {
            // User ID in session doesn't exist in database
            // Clear the invalid session
            session_destroy();
            echo json_encode(['success' => false, 'message' => 'Your session has expired. Please log out, register a new account, and log in again.']);
            exit;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Session error. Please log out and log in again.']);
        exit;
    }

    $count = 0;

    foreach ($pledges as $pledge) {
        $pledge = sanitize($pledge);

        // Check if already pledged
        $stmt = $db->prepare("SELECT id FROM pledges WHERE user_id = ? AND pledge_type = ?");
        $stmt->execute([$userId, $pledge]);

        if (!$stmt->fetch()) {
            $stmt = $db->prepare("INSERT INTO pledges (user_id, pledge_type) VALUES (?, ?)");
            $stmt->execute([$userId, $pledge]);
            $count++;
        }
    }

    if ($count > 0) {
        echo json_encode(['success' => true, 'message' => "Thank you! You've committed to $count pledge(s). Together we're making a difference!"]);
    } else {
        echo json_encode(['success' => true, 'message' => "You've already made these pledges. Thank you for your commitment!"]);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
