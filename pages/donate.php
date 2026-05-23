<?php
$pageTitle = 'Donate';
require_once __DIR__ . '/../includes/header.php';
?>

<main id="main-content">

    <div class="page-header">
        <h1>Make a Donation</h1>
        <p>Your generosity fuels our fight against plastic pollution</p>

        <div class="breadcrumb">
            <a href="<?php echo SITE_URL; ?>/index.php">Home</a>
            <span>›</span>
            <span>Donate</span>
        </div>
    </div>

    <section class="section">
        <div class="container" style="max-width: 700px;">

            <?php if (!isLoggedIn()): ?>

                <div class="alert alert-info">
                    ℹ️ Please
                    <a href="<?php echo SITE_URL; ?>/pages/login.php"
                       style="color: var(--secondary); font-weight: 600;">
                        login
                    </a>
                    or
                    <button type="button"
                            onclick="openSignupModal()"
                            style="color: var(--primary); font-weight: 600; background: none; border: none; cursor: pointer;">
                        sign up
                    </button>
                    to make a donation. Your donation history will be saved to your account.
                </div>

            <?php else: ?>

                <div class="info-card">

                    <h2 style="text-align: center; margin-bottom: 5px;">
                        Support Our Cause
                    </h2>

                    <p class="text-center mb-3" style="color: var(--gray-500);">
                        Every cedi helps protect our oceans and wildlife
                    </p>

                    <div id="donateAlertContainer"></div>

                    <!-- Amount Selection -->
                    <p style="font-weight: 600; margin-bottom: 10px;">
                        Choose an amount:
                    </p>

                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 5px;">

                        <button type="button"
                                class="btn btn-outline donation-option"
                                onclick="selectDonationAmount(50, this)"
                                style="font-size: 1.1rem;">
                            GHS 50
                        </button>

                        <button type="button"
                                class="btn btn-outline donation-option"
                                onclick="selectDonationAmount(100, this)"
                                style="font-size: 1.1rem;">
                            GHS 100
                        </button>

                        <button type="button"
                                class="btn btn-outline donation-option"
                                onclick="selectDonationAmount(200, this)"
                                style="font-size: 1.1rem;">
                            GHS 200
                        </button>

                        <button type="button"
                                class="btn btn-outline donation-option"
                                onclick="selectDonationAmount(500, this)"
                                style="font-size: 1.1rem;">
                            GHS 500
                        </button>

                    </div>

                    <p style="font-size: 0.85rem; color: var(--gray-500); margin-bottom: 20px;">
                        Or enter a custom amount below
                    </p>

                    <form id="donatePageForm" onsubmit="handleDonatePage(event)">

                        <div class="form-group">
                            <label for="donateAmount">
                                Donation Amount (GHS) *
                            </label>

                            <input
                                type="number"
                                name="amount"
                                id="donateAmount"
                                class="form-control"
                                min="1"
                                step="0.01"
                                required
                                placeholder="Enter amount in GHS"
                                style="font-size: 1.2rem; padding: 15px;"
                                aria-required="true"
                            >

                            <span class="form-error" role="alert"></span>
                        </div>

                        <div class="form-group">
                            <label for="donateCampaign">
                                Choose a Campaign
                            </label>

                            <select name="campaign"
                                    id="donateCampaign"
                                    class="form-control">

                                <option value="General">
                                    General Fund
                                </option>

                                <option value="Ocean Cleanup">
                                    Ocean Cleanup
                                </option>

                                <option value="Recycling Initiative">
                                    Recycling Initiative
                                </option>

                                <option value="Education">
                                    Education &amp; Awareness
                                </option>

                                <option value="Wildlife Protection">
                                    Wildlife Protection
                                </option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="donateMessage">
                                Personal Message (Optional)
                            </label>

                            <textarea
                                name="message"
                                id="donateMessage"
                                class="form-control"
                                placeholder="Leave a message with your donation..."
                            ></textarea>
                        </div>

                        <button type="submit"
                                class="btn btn-primary btn-lg btn-block"
                                style="font-size: 1.1rem;">

                            Complete Donation

                        </button>

                    </form>

                </div>

                <?php
                $userDonations = getUserDonations($_SESSION['user_id']);
                $userTotal = getUserTotalDonations($_SESSION['user_id']);

                if (!empty($userDonations)):
                ?>

                    <div class="table-container mt-3">

                        <div class="table-header">
                            <h3>Your Donation History</h3>

                            <strong style="color: var(--primary);">
                                Total: GHS <?php echo number_format($userTotal, 2); ?>
                            </strong>
                        </div>

                        <table>

                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Campaign</th>
                                    <th>Reference</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($userDonations as $d): ?>

                                    <tr>

                                        <td>
                                            <?php echo date('M d, Y', strtotime($d['created_at'])); ?>
                                        </td>

                                        <td>
                                            <strong>
                                                GHS <?php echo number_format($d['amount'], 2); ?>
                                            </strong>
                                        </td>

                                        <td>
                                            <?php echo htmlspecialchars($d['campaign']); ?>
                                        </td>

                                        <td>
                                            <code>
                                                <?php echo htmlspecialchars($d['transaction_ref']); ?>
                                            </code>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                <?php endif; ?>

            <?php endif; ?>

        </div>
    </section>

    <!-- Why Donate -->
    <section class="section section-light">

        <div class="container">

            <div class="section-header">

                <h2>Where Your Money Goes</h2>

                <p>
                    Transparency in how donations are used
                </p>

                <div class="line"></div>

            </div>

            <div class="card-grid" style="max-width: 900px; margin: 0 auto;">

                <div class="info-card" style="text-align: center;">

                    <h3>40% - Cleanup Operations</h3>

                    <div class="progress-bar mt-1">
                        <div class="progress-fill"
                             data-width="40%"
                             style="background: var(--primary);">
                        </div>
                    </div>

                    <p class="mt-1" style="font-size: 0.9rem; color: var(--gray-700);">
                        Equipment, logistics, and event organization
                    </p>

                </div>

                <div class="info-card" style="text-align: center;">

                    <h3>30% - Education</h3>

                    <div class="progress-bar mt-1">
                        <div class="progress-fill"
                             data-width="30%"
                             style="background: var(--secondary);">
                        </div>
                    </div>

                    <p class="mt-1" style="font-size: 0.9rem; color: var(--gray-700);">
                        Workshops, materials, and outreach programs
                    </p>

                </div>

                <div class="info-card" style="text-align: center;">

                    <h3>20% - Research</h3>

                    <div class="progress-bar mt-1">
                        <div class="progress-fill"
                             data-width="20%"
                             style="background: var(--accent);">
                        </div>
                    </div>

                    <p class="mt-1" style="font-size: 0.9rem; color: var(--gray-700);">
                        Environmental studies and innovation
                    </p>

                </div>

            </div>

        </div>

    </section>

</main>

<script>

function selectDonationAmount(amount, button) {

    const amountInput = document.getElementById('donateAmount');

    if (!amountInput) {
        return;
    }

    document.querySelectorAll('.donation-option').forEach(function(option) {
        option.classList.remove('selected');
    });

    if (button) {
        button.classList.add('selected');
    }

    amountInput.value = amount;
    amountInput.focus();
}

function handleDonatePage(e) {

    e.preventDefault();

    const form = e.target;

    const amountInput = form.querySelector('[name="amount"]');
    const amount = parseFloat(amountInput.value);

    clearDonationErrors(form);

    if (!amount || amount <= 0) {

        showDonationError(
            amountInput,
            'Please enter a valid amount'
        );

        return;
    }

    const formData = new FormData(form);

    const submitBtn = form.querySelector('[type="submit"]');
    const originalText = submitBtn.textContent;

    submitBtn.disabled = true;
    submitBtn.textContent = 'Processing...';

    fetch('<?php echo SITE_URL; ?>/pages/process-donation.php', {

        method: 'POST',
        body: formData

    })

    .then(function(response) {

        return response.json();

    })

    .then(function(data) {

        const container = document.getElementById('donateAlertContainer');

        if (data.success) {

            container.innerHTML =
                '<div class="alert alert-success">' +
                '✓ ' +
                data.message +
                '<br>Reference: <code>' +
                data.transaction_ref +
                '</code></div>';

            form.reset();

            document.querySelectorAll('.donation-option').forEach(function(option) {
                option.classList.remove('selected');
            });

            setTimeout(function() {
                location.reload();
            }, 2500);

        } else {

            container.innerHTML =
                '<div class="alert alert-error">✕ ' +
                data.message +
                '</div>';
        }

    })

    .catch(function(error) {

        console.error(error);

        document.getElementById('donateAlertContainer').innerHTML =
            '<div class="alert alert-error">' +
            '✕ An error occurred. Please try again.' +
            '</div>';

    })

    .finally(function() {

        submitBtn.disabled = false;
        submitBtn.textContent = originalText;

    });
}

function showDonationError(input, message) {

    input.classList.add('error');

    const errorEl = input.parentElement.querySelector('.form-error');

    if (errorEl) {

        errorEl.textContent = message;
        errorEl.classList.add('show');

    }
}

function clearDonationErrors(form) {

    form.querySelectorAll('.form-control').forEach(function(input) {
        input.classList.remove('error');
    });

    form.querySelectorAll('.form-error').forEach(function(error) {

        error.textContent = '';
        error.classList.remove('show');

    });
}

</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>