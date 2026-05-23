<?php
session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header('Location: ' . SITE_URL . '/pages/dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $emailRaw = trim($_POST['email'] ?? '');
    $email = filter_var($emailRaw, FILTER_VALIDATE_EMAIL);

    $password = $_POST['password'] ?? '';

    // --------------------
    // VALIDATION
    // --------------------
    if (!$email || empty($password)) {
        $error = 'Please enter a valid email and password.';
    } else {
        $result = loginUser($email, $password);

        if ($result['success']) {
            header('Location: ' . SITE_URL . '/pages/dashboard.php');
            exit;
        } else {
            $error = $result['message'];
        }
    }
}

$pageTitle = 'Login';

require_once __DIR__ . '/../includes/header.php';
?>

<main id="main-content">

    <div class="page-header">
        <h1>Member Login</h1>
        <p>Access your PlasticPollutions account</p>
    </div>

    <section class="section">

        <div class="container" style="max-width: 480px;">

            <?php if ($error): ?>
                <div class="alert alert-error">
                    ✕ <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <div class="info-card">

                <h2 style="text-align: center; margin-bottom: 5px;">
                    Welcome Back
                </h2>

                <p style="color: var(--gray-500); text-align:center;">
                    Enter your credentials to continue
                </p>

                <form method="POST" id="loginForm">

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
    <label for="loginPassword">Password</label>
    <div class="password-wrapper">
        <input type="password" id="loginPassword" name="password" class="form-control" required>
        <button type="button"
                class="password-toggle"
                data-target="loginPassword"
                aria-label="Show password"
                aria-pressed="false">
            Show
        </button>
    </div>
</div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">
                        Login
                    </button>

                </form>

                <div style="text-align:center; margin-top:20px;">
                    <p style="color: var(--gray-500); font-size: 0.9rem;">
                        Don't have an account?
                        <button onclick="openSignupModal()"
                            style="color: var(--primary); font-weight:600; background:none; border:none; cursor:pointer;">
                            Sign up here
                        </button>
                    </p>
                </div>


                <div class="alert alert-info mt-2" style="font-size:0.85rem;">
                    ℹ️ <strong>Security Notice:</strong>
                    Account locks after 3 failed attempts.
                </div>

            </div>

        </div>

    </section>

</main>

<div id="signupModal" class="signup-modal-overlay" aria-hidden="true">
    <div class="signup-modal-panel" role="dialog" aria-modal="true" aria-labelledby="signupModalTitle">
        <button type="button"
                class="signup-modal-close"
                onclick="closeSignupModal()"
                aria-label="Close signup form">
            &times;
        </button>

        <h2 id="signupModalTitle" style="text-align:center; margin-bottom:6px;">Create Account</h2>
        <p style="text-align:center; color: var(--gray-500); margin-bottom:20px;">Join PlasticPollutions today</p>

        <form id="signupForm" method="POST">
            <div class="form-group">
                <label for="signupFirstName">First Name</label>
                <input type="text" id="signupFirstName" name="first_name" class="form-control" required>
                <div class="form-error"></div>
            </div>

            <div class="form-group">
                <label for="signupLastName">Last Name</label>
                <input type="text" id="signupLastName" name="last_name" class="form-control" required>
                <div class="form-error"></div>
            </div>

            <div class="form-group">
                <label for="signupEmail">Email Address</label>
                <input type="email" id="signupEmail" name="email" class="form-control" required>
                <div class="form-error"></div>
            </div>

            <div class="form-group">
                <label for="signupPassword">Password</label>
                <div class="password-wrapper">
                    <input type="password"
                           id="signupPassword"
                           name="password"
                           class="form-control"
                           required
                           oninput="checkPasswordStrength(this.value)">
                    <button type="button"
                            class="password-toggle"
                            data-target="signupPassword"
                            aria-label="Show password"
                            aria-pressed="false">
                        Show
                    </button>
                </div>
                <div class="form-error"></div>
            </div>

            <div id="passwordStrength" style="display:none; margin-bottom:15px;">
                <div style="height:8px; background:#e5e7eb; border-radius:999px; overflow:hidden;">
                    <div class="progress-fill" style="width:0%; height:100%; background:#c0392b; transition:all 0.3s ease;"></div>
                </div>
                <small class="strength-text" style="display:block; margin-top:6px;">Very Weak</small>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
        </form>
    </div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {

    const email = this.querySelector('[name="email"]');
    const password = this.querySelector('[name="password"]');

    let valid = true;

    if (!email.value.trim() || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        valid = false;
    }

    if (!password.value) {
        valid = false;
    }

    if (!valid) {
        e.preventDefault();
        alert('Please fill in valid login details');
    }
});
</script>

<script>
const signupForm = document.getElementById('signupForm');

if (signupForm) {
    signupForm.addEventListener('submit', function(e) {
        e.preventDefault();

        if (!validateSignupForm(this)) {
            return;
        }

        submitForm(this, '<?php echo SITE_URL; ?>/pages/register.php', function(data) {
            const modalContent = document.querySelector('#signupModal .modal-content');

            showAlert(
                data.message,
                data.success ? 'success' : 'error',
                modalContent
            );

            if (data.success) {
                signupForm.reset();
                checkPasswordStrength('');
                setTimeout(() => {
                    closeSignupModal();
                }, 1200);
            }
        });
    });
}
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>