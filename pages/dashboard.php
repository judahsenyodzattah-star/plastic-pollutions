Here is the complete, updated `dashboard.php` file. All currency symbols have been changed to **GHS**, and the JavaScript function for the auto-input buttons has been added.

You can copy the code below and completely replace your existing `dashboard.php` file:

```php
<?php
$pageTitle = 'Dashboard';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

$user = getCurrentUser();
$donations = getUserDonations($_SESSION['user_id']);
$totalDonated = getUserTotalDonations($_SESSION['user_id']);
$donationStats = getDonationStats();

// Handle profile update
$updateMsg = '';
$updateType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'update_profile') {
        $firstName = sanitize($_POST['first_name'] ?? '');
        $lastName = sanitize($_POST['last_name'] ?? '');
        $phone = sanitize($_POST['phone'] ?? '');
        $bio = sanitize($_POST['bio'] ?? '');
        
        if (empty($firstName) || empty($lastName)) {
            $updateMsg = 'First name and last name are required.';
            $updateType = 'error';
        } else {
            $db = getDB();
            $stmt = $db->prepare("UPDATE users SET first_name = ?, last_name = ?, phone = ?, bio = ? WHERE id = ?");
            $stmt->execute([$firstName, $lastName, $phone, $bio, $_SESSION['user_id']]);
            $_SESSION['first_name'] = $firstName;
            $_SESSION['last_name'] = $lastName;
            $updateMsg = 'Profile updated successfully!';
            $updateType = 'success';
            $user = getCurrentUser();
        }
    }
    
    if ($action === 'change_password') {
        $currentPass = $_POST['current_password'] ?? '';
        $newPass = $_POST['new_password'] ?? '';
        $confirmPass = $_POST['confirm_password'] ?? '';
        
        if (!password_verify($currentPass, $user['password'])) {
            $updateMsg = 'Current password is incorrect.';
            $updateType = 'error';
        } elseif (strlen($newPass) < 8 || !preg_match('/[A-Z]/', $newPass) || !preg_match('/[0-9]/', $newPass)) {
            $updateMsg = 'New password must be at least 8 characters with 1 uppercase letter and 1 number.';
            $updateType = 'error';
        } elseif ($newPass !== $confirmPass) {
            $updateMsg = 'New passwords do not match.';
            $updateType = 'error';
        } else {
            $db = getDB();
            $hashedPass = password_hash($newPass, PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->execute([$hashedPass, $_SESSION['user_id']]);
            $updateMsg = 'Password changed successfully!';
            $updateType = 'success';
        }
    }
    
    if ($action === 'delete_account') {
        $confirmEmail = $_POST['confirm_email'] ?? '';
        if ($confirmEmail === $user['email']) {
            $db = getDB();
            $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            session_destroy();
            header('Location: ' . SITE_URL . '/index.php');
            exit;
        } else {
            $updateMsg = 'Email confirmation does not match. Account not deleted.';
            $updateType = 'error';
        }
    }
}

require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="<?php echo SITE_URL; ?>/index.php" class="nav-logo">
                <svg viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="18" cy="18" r="16" fill="#0d7c3f" opacity="0.2"/>
                    <circle cx="18" cy="18" r="12" fill="#0d7c3f" opacity="0.4"/>
                    <path d="M18 6C18 6 12 14 12 20C12 23.3 14.7 26 18 26C21.3 26 24 23.3 24 20C24 14 18 6 18 6Z" fill="#0d7c3f"/>
                    <path d="M15 18L17 22L21 16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>PlasticPollutions</span>
            </a>
            <div class="nav-auth">
                <a href="<?php echo SITE_URL; ?>/index.php" class="btn btn-outline btn-sm">← Back to Site</a>
                <a href="<?php echo SITE_URL; ?>/pages/logout.php" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-user">
                <div class="sidebar-avatar">
                    <?php echo strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1)); ?>
                </div>
                <h3><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h3>
<p style="font-size: 0.85rem; color: var(--gray-500);">
    ID: <?php echo htmlspecialchars($user['visitor_id'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?>
</p>            </div>
            <nav class="sidebar-menu" aria-label="Dashboard navigation">
                <a href="#overview" class="active" onclick="showTab('overview', this)">Overview</a>
                <a href="#profile" onclick="showTab('profile', this)">My Profile</a>
                <a href="#donations" onclick="showTab('donations', this)">Donations</a>
                <a href="#make-donation" onclick="showTab('make-donation', this)">Make Donation</a>
                <a href="#password" onclick="showTab('password', this)">Change Password</a>
                <a href="#settings" onclick="showTab('settings', this)">Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main" id="main-content">
            <?php if ($updateMsg): ?>
                <div class="alert alert-<?php echo $updateType; ?>">
                    <?php echo $updateType === 'success' ? '✓' : '✕'; ?> <?php echo htmlspecialchars($updateMsg); ?>
                </div>
            <?php endif; ?>
<!-- Overview Tab -->
<div id="tab-overview" class="tab-content">
    <div class="dashboard-header">
        <h1>
            Welcome, <?php echo htmlspecialchars($user['first_name'], ENT_QUOTES, 'UTF-8'); ?>!
        </h1>
        <p class="dashboard-subtitle">Here's a summary of your activity</p>
    </div>

    <div class="dashboard-cards">
        <!-- Total Donated -->
        <div class="dash-card">
            <div class="dash-card-icon green" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="8.5"></circle>
                    <path d="M9.5 10.25c0-1.1 1.12-2 2.5-2s2.5.9 2.5 2-1.12 2-2.5 2-2.5.9-2.5 2 1.12 2 2.5 2 2.5-.9 2.5-2"></path>
                    <path d="M12 7.5v9"></path>
                </svg>
            </div>
            <div class="dash-card-info">
                <h3>GHS <?php echo number_format($totalDonated, 2); ?></h3>
                <p>Total Donated</p>
            </div>
        </div>

        <!-- Transactions -->
        <div class="dash-card">
            <div class="dash-card-icon blue" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M7 3.5h10v17l-2-1.25-2 1.25-2-1.25-2 1.25-2-1.25-2 1.25v-17z"></path>
                    <path d="M9 8h6"></path>
                    <path d="M9 12h6"></path>
                    <path d="M9 16h3.5"></path>
                </svg>
            </div>
            <div class="dash-card-info">
                <h3><?php echo count($donations); ?></h3>
                <p>Transactions</p>
            </div>
        </div>

        <!-- Visitor ID -->
        <div class="dash-card">
            <div class="dash-card-icon orange" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3.75" y="4.75" width="16.5" height="14.5" rx="2.25"></rect>
                    <circle cx="9" cy="11" r="2"></circle>
                    <path d="M6.8 16.2c.8-1.2 2.2-1.95 3.7-1.95s2.9.75 3.7 1.95"></path>
                    <path d="M14.5 9.5h2.75"></path>
                    <path d="M14.5 12.25h2.75"></path>
                </svg>
            </div>
            <div class="dash-card-info">
                <h3><?php echo htmlspecialchars($user['visitor_id'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></h3>
                <p>Your Visitor ID</p>
            </div>
        </div>
    </div>
</div>

                <!-- Recent Donations -->
<div class="table-container">
    <div class="table-header">
        <h3>Recent Donations</h3>
        <a href="#donations" onclick="showTab('donations', document.querySelector('[href=\'#donations\']'))" class="btn btn-sm btn-outline">View All</a>
    </div>

    <table role="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Campaign</th>
                <th scope="col">Reference</th>
                <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($donations)): ?>

                <tr>
                    <td colspan="5" style="text-align: center; padding: 30px; color: var(--gray-500);">
                        No donations yet.
                        <a href="#make-donation"
                           onclick="showTab('make-donation', document.querySelector('[href=\'#make-donation\']'))"
                           style="color: var(--primary);">
                            Make your first donation!
                        </a>
                    </td>
                </tr>

            <?php else: ?>

                <?php foreach(array_slice($donations, 0, 5) as $d): ?>

                    <tr>

                        <td>
                            <?php echo date('M d, Y', strtotime($d['created_at'] ?? 'now')); ?>
                        </td>

                        <td>
                            <strong>
                                GHS <?php echo number_format($d['amount'] ?? 0, 2); ?>
                            </strong>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($d['campaign'] ?? 'General', ENT_QUOTES, 'UTF-8'); ?>
                        </td>

                        <td>
                            <code style="font-size: 0.8rem;">
                                <?php echo htmlspecialchars($d['transaction_ref'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?>
                            </code>
                        </td>

                        <td>
                            <span class="badge badge-success">Completed</span>
                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php endif; ?>
        </tbody>
    </table>
</div>
                <!-- Global Stats -->
                <div class="info-card mt-3">
                    <h3 style="margin-bottom: 15px;">Global Donation Statistics</h3>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                        <div style="text-align: center; padding: 15px; background: var(--primary-light); border-radius: var(--radius);">
                            <strong style="font-size: 1.5rem; color: var(--primary);">GHS <?php echo number_format($donationStats['total'], 2); ?></strong>
                            <p style="font-size: 0.85rem; color: var(--gray-500);">Total Raised</p>
                        </div>
                        <div style="text-align: center; padding: 15px; background: var(--secondary-light); border-radius: var(--radius);">
                            <strong style="font-size: 1.5rem; color: var(--secondary);"><?php echo $donationStats['count']; ?></strong>
                            <p style="font-size: 0.85rem; color: var(--gray-500);">Total Donations</p>
                        </div>
                        <div style="text-align: center; padding: 15px; background: #fff3e0; border-radius: var(--radius);">
                            <strong style="font-size: 1.5rem; color: var(--accent);">GHS <?php echo number_format($donationStats['average'], 2); ?></strong>
                            <p style="font-size: 0.85rem; color: var(--gray-500);">Average Donation</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Tab -->
            <div id="tab-profile" class="tab-content" style="display: none;">
                <div class="dashboard-header">
                    <h1>My Profile</h1>
                    <p style="color: var(--gray-500);">View and update your personal information</p>
                </div>
                <div class="info-card" style="max-width: 600px;">
                    <form method="POST" action="">
                        <input type="hidden" name="action" value="update_profile">
                        <div class="form-group">
                            <label for="prof_first">First Name *</label>
                            <input type="text" name="first_name" id="prof_first" class="form-control" 
                                   value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="prof_last">Last Name *</label>
                            <input type="text" name="last_name" id="prof_last" class="form-control" 
                                   value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
                            <small style="color: var(--gray-500);">Email cannot be changed</small>
                        </div>
                        <div class="form-group">
                            <label>Visitor ID</label>
<input type="text"
       class="form-control"
       value="<?php echo htmlspecialchars($user['visitor_id'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?>"
       disabled>                        </div>
                        <div class="form-group">
                            <label for="prof_phone">Phone Number</label>
                            <input type="tel" name="phone" id="prof_phone" class="form-control" 
                                   value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>" placeholder="+233 20 000 0000">
                        </div>
                        <div class="form-group">
                            <label for="prof_bio">Bio</label>
                            <textarea name="bio" id="prof_bio" class="form-control" placeholder="Tell us about yourself..."><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Member Since</label>
                            <input type="text" class="form-control" value="<?php echo date('F d, Y', strtotime($user['created_at'])); ?>" disabled>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Update Profile</button>
                    </form>
                </div>
            </div>

            <!-- Donations Tab -->
            <div id="tab-donations" class="tab-content" style="display: none;">
                <div class="dashboard-header">
                    <h1>Donation History</h1>
                    <p style="color: var(--gray-500);">View all your donation records</p>
                </div>

                <!-- Search and Filter -->
                <div class="info-card mb-3">
                    <form method="GET" action="" style="display: flex; gap: 15px; flex-wrap: wrap; align-items: end;">
                        <div class="form-group" style="margin-bottom: 0; flex: 1; min-width: 200px;">
                            <label for="search_ref">Search by Reference</label>
                            <input type="text" id="search_ref" class="form-control" placeholder="Transaction reference..." 
                                   oninput="filterDonations(this.value)">
                        </div>
                    </form>
                </div>

                <div class="table-container">
                    <div class="table-header">
                        <h3>All Donations (<?php echo count($donations); ?> records)</h3>
                        <strong>Total: GHS <?php echo number_format($totalDonated, 2); ?></strong>
                    </div>
                    <table role="table" id="donationsTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Campaign</th>
                                <th scope="col">Message</th>
                                <th scope="col">Reference</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($donations)): ?>
                                <tr><td colspan="7" style="text-align: center; padding: 40px; color: var(--gray-500);">No donation records found.</td></tr>
                            <?php else: ?>
                                <?php foreach($donations as $i => $d): ?>
<tr>
    <td><?php echo $i + 1; ?></td>

    <td>
        <?php echo date('M d, Y H:i', strtotime($d['created_at'] ?? 'now')); ?>
    </td>

    <td>
        <strong style="color: var(--primary);">
            GHS <?php echo number_format($d['amount'] ?? 0, 2); ?>
        </strong>
    </td>

    <td>
        <?php echo htmlspecialchars($d['campaign'] ?? 'General', ENT_QUOTES, 'UTF-8'); ?>
    </td>

    <td>
        <?php echo htmlspecialchars($d['message'] ?? '—', ENT_QUOTES, 'UTF-8'); ?>
    </td>

    <td>
        <code style="font-size: 0.8rem;">
            <?php echo htmlspecialchars($d['transaction_ref'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?>
        </code>
    </td>

    <td>
        <span class="badge badge-success">Completed</span>
    </td>
</tr>
<?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Make Donation Tab -->
            <div id="tab-make-donation" class="tab-content" style="display: none;">
                <div class="dashboard-header">
                    <h1>Make a Donation </h1>
                    <p style="color: var(--gray-500);">Support our mission to fight plastic pollution</p>
                </div>
                <div class="info-card" style="max-width: 600px;">
                    <div id="donationAlertContainer"></div>
                    
                   <!-- Quick Amount Selection -->
<p style="font-weight: 600; margin-bottom: 10px;">Select an amount:</p>
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 20px;">
    <button type="button" class="btn btn-outline donation-option" data-amount="10">GHS 10</button>
    <button type="button" class="btn btn-outline donation-option" data-amount="25">GHS 25</button>
    <button type="button" class="btn btn-outline donation-option" data-amount="50">GHS 50</button>
    <button type="button" class="btn btn-outline donation-option" data-amount="100">GHS 100</button>
</div>

                    <form id="donationForm" onsubmit="handleDonation(event)">
                        <div class="form-group">
                            <label for="donationAmount">Amount (GHS)</label>
                            <input type="number" name="amount" id="donationAmount" class="form-control" 
                                   min="1" step="0.01" required placeholder="Enter amount" aria-required="true">
                            <span class="form-error" role="alert"></span>
                        </div>
                        <div class="form-group">
                            <label for="donationCampaign">Campaign</label>
                            <select name="campaign" id="donationCampaign" class="form-control">
                                <option value="General">General Fund</option>
                                <option value="Ocean Cleanup">Ocean Cleanup</option>
                                <option value="Recycling Initiative">Recycling Initiative</option>
                                <option value="Education">Education & Awareness</option>
                                <option value="Wildlife Protection">Wildlife Protection</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="donationMessage">Message (Optional)</label>
                            <textarea name="message" id="donationMessage" class="form-control" 
                                      placeholder="Leave a message with your donation..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Complete Donation
                        </button>
                    </form>
                </div>
            </div>

            <!-- Change Password Tab -->
            <div id="tab-password" class="tab-content" style="display: none;">
                <div class="dashboard-header">
                    <h1>Change Password</h1>
                    <p style="color: var(--gray-500);">Update your account password</p>
                </div>
                <div class="info-card" style="max-width: 500px;">
                    <form method="POST" action="">
                        <input type="hidden" name="action" value="change_password">
                        <div class="form-group">
                            <label for="current_password">Current Password *</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password *</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" required
                                   placeholder="Min 8 chars, 1 uppercase, 1 number">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm New Password *</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Change Password</button>
                    </form>
                </div>
            </div>

            <!-- Settings Tab -->
            <div id="tab-settings" class="tab-content" style="display: none;">
                <div class="dashboard-header">
                    <h1>Account Settings</h1>
                    <p style="color: var(--gray-500);">Manage your account preferences</p>
                </div>
                
                <div class="info-card" style="max-width: 600px; border-left: 4px solid var(--danger);">
                    <h3 style="color: var(--danger); margin-bottom: 10px;">Danger Zone</h3>
                    <p style="margin-bottom: 20px; color: var(--gray-700);">
                        Once you delete your account, there is no going back. All your data including donation history will be permanently removed.
                    </p>
                    <form method="POST" action="" onsubmit="return confirm('Are you absolutely sure you want to delete your account? This action cannot be undone.')">
                        <input type="hidden" name="action" value="delete_account">
                        <div class="form-group">
                            <label for="confirm_email">Type your email to confirm: <strong><?php echo htmlspecialchars($user['email']); ?></strong></label>
                            <input type="email" name="confirm_email" id="confirm_email" class="form-control" required 
                                   placeholder="Enter your email to confirm deletion">
                        </div>
                        <button type="submit" class="btn btn-danger">Delete My Account</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="<?php echo SITE_URL; ?>/js/main.js"></script>
    <script>
    function showTab(tabName, clickedLink) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => tab.style.display = 'none');
        // Show selected tab
        document.getElementById('tab-' + tabName).style.display = 'block';
        // Update sidebar active
        document.querySelectorAll('.sidebar-menu a').forEach(a => a.classList.remove('active'));
        if (clickedLink) clickedLink.classList.add('active');
    }

    // New function to handle donation auto-input
    function selectDonationAmount(amount) {
        const amountInput = document.getElementById('donationAmount');
        amountInput.value = amount;
        
        // Highlight briefly to show it worked
        amountInput.style.backgroundColor = '#e8f5e9';
        setTimeout(() => amountInput.style.backgroundColor = '', 300);
    }

    function handleDonation(e) {
        e.preventDefault();
        const form = e.target;
        const amount = form.querySelector('[name="amount"]').value;
        
        if (!amount || amount <= 0) {
            showError(form.querySelector('[name="amount"]'), 'Please enter a valid amount');
            return;
        }

        const formData = new FormData(form);
        const submitBtn = form.querySelector('[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Processing...';

        fetch('<?php echo SITE_URL; ?>/pages/process-donation.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById('donationAlertContainer');
            if (data.success) {
                container.innerHTML = '<div class="alert alert-success">✓ ' + data.message + '<br>Reference: ' + data.transaction_ref + '</div>';
                form.reset();
                // Refresh page after 2 seconds to update stats
                setTimeout(() => location.reload(), 2000);
            } else {
                container.innerHTML = '<div class="alert alert-error">✕ ' + data.message + '</div>';
            }
        })
        .catch(() => {
            document.getElementById('donationAlertContainer').innerHTML = '<div class="alert alert-error">✕ An error occurred.</div>';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Complete Donation';
        });
    }

    function filterDonations(query) {
        const rows = document.querySelectorAll('#donationsTable tbody tr');
        query = query.toLowerCase();
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(query) ? '' : 'none';
        });
    }


    // Auto-input donation amounts
    document.addEventListener('DOMContentLoaded', function() {
        const donationButtons = document.querySelectorAll('.donation-option');
        const amountInput = document.getElementById('donationAmount');

        if(donationButtons && amountInput) {
            donationButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent any default button behavior
                    
                    // Get the amount from the data attribute and set the input
                    const amount = this.getAttribute('data-amount');
                    amountInput.value = amount;
                    
                    // Trigger an input event just in case your CSS/JS needs it to register the change
                    amountInput.dispatchEvent(new Event('input', { bubbles: true }));
                    
                    // Move the cursor to the input box so the user sees it happened
                    amountInput.focus();
                    
                    // Brief green flash for visual feedback
                    amountInput.style.backgroundColor = '#e8f5e9';
                    setTimeout(() => {
                        amountInput.style.backgroundColor = '';
                    }, 300);
                });
            });
        }
    });

    
    // Check hash for direct tab navigation
    if (window.location.hash) {
        const tab = window.location.hash.substring(1);
        const link = document.querySelector('[href="#' + tab + '"]');
        if (link) showTab(tab, link);
    }
    </script>
</body>
</html>

```