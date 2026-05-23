<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'plasticpollutions');
define('DB_USER', 'root');
define('DB_PASS', 'Juda4857');

// Site Configuration
define('SITE_NAME', 'PlasticPollutions');
define('SITE_URL', 'http://localhost:8080');
define('SITE_TAGLINE', 'Reducing Plastic Waste, Protecting Our Planet');

// Session Configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error reporting (set to 0 in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Timezone
date_default_timezone_set('Africa/Accra');

// Security constants
define('MAX_LOGIN_ATTEMPTS', 3);
define('LOCKOUT_DURATION', 180); // 3 minutes in seconds
define('VISITOR_ID_PREFIX', 'PU');
define('VISITOR_ID_PATTERN', '/^PU\d{6}$/');
?>
