<?php
require_once __DIR__ . '/../includes/functions.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit;
}

$fullName = sanitize($_POST['full_name'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$message = sanitize($_POST['message'] ?? '');
$userId = isLoggedIn() ? $_SESSION['user_id'] : null;

if (empty($fullName) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please provide your name and a valid email.']);
    exit;
}

$db = getDB();

// Check if already signed
$stmt = $db->prepare("SELECT id FROM petitions WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch()) {
    echo json_encode(['success' => false, 'message' => 'You have already signed this petition.']);
    exit;
}

$stmt = $db->prepare("INSERT INTO petitions (user_id, full_name, email, message) VALUES (?, ?, ?, ?)");
$stmt->execute([$userId, $fullName, $email, $message]);

$count = $db->query("SELECT COUNT(*) FROM petitions")->fetchColumn();

echo json_encode([
    'success' => true, 
    'message' => "Thank you for signing! You are signatory #$count. Together we're making a difference!"
]);
?>
