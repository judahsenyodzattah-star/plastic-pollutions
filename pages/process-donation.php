<?php
require_once __DIR__ . '/../includes/functions.php';
header('Content-Type: application/json');

if (!isLoggedIn()) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to donate.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit;
}

$amount = floatval($_POST['amount'] ?? 0);
$message = sanitize($_POST['message'] ?? '');
$campaign = sanitize($_POST['campaign'] ?? 'General');

if ($amount <= 0) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid donation amount.']);
    exit;
}

if ($amount > 100000) {
    echo json_encode(['success' => false, 'message' => 'Maximum donation amount is $100,000.']);
    exit;
}

$result = makeDonation($_SESSION['user_id'], $amount, $message, $campaign);
echo json_encode($result);
?>
