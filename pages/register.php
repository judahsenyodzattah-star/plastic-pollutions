<?php
session_start();

require_once __DIR__ . '/../includes/functions.php';

header('Content-Type: application/json');

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
    exit;
}

// ----------------------
// INPUTS
// ----------------------
$firstName = sanitize($_POST['first_name'] ?? '');
$lastName  = sanitize($_POST['last_name'] ?? '');

$emailRaw = trim($_POST['email'] ?? '');
$email = filter_var($emailRaw, FILTER_VALIDATE_EMAIL);

$password = $_POST['password'] ?? '';

// ----------------------
// VALIDATION
// ----------------------
$errors = [];

if (strlen($firstName) < 2) {
    $errors[] = 'First name must be at least 2 characters.';
}

if (strlen($lastName) < 2) {
    $errors[] = 'Last name must be at least 2 characters.';
}

if (!$email) {
    $errors[] = 'Please enter a valid email address.';
}

if (strlen($password) < 8) {
    $errors[] = 'Password must be at least 8 characters.';
}

if (!preg_match('/[A-Z]/', $password)) {
    $errors[] = 'Password must contain at least one uppercase letter.';
}

if (!preg_match('/[0-9]/', $password)) {
    $errors[] = 'Password must contain at least one number.';
}

if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => implode(' ', $errors)
    ]);
    exit;
}

// ----------------------
// REGISTER USER (SAFE WRAPPER)
// ----------------------
try {

    $result = registerUser(
        $firstName,
        $lastName,
        $email,
        $password
    );

    echo json_encode($result);
    exit;

} catch (Throwable $e) {

    echo json_encode([
        'success' => false,
        'message' => 'Server error during registration.'
    ]);
    exit;
}