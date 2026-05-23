<?php

$pageTitle = 'Our Campaigns';

require_once __DIR__ . '/../includes/header.php';

$campaignImageOne = SITE_URL . '/assets/images/campaign-single-use-plastics.jpg';
$campaignImageTwo = SITE_URL . '/assets/images/campaign-clean-waterways.jpg';
$campaignImageThree = SITE_URL . '/assets/images/campaign-manufacturer-responsibility.jpg';

?>

<main id="main-content">
    <div class="page-header">
        <h1>Our Campaigns</h1>
        <p>Active initiatives driving real change against plastic pollution</p>
        <div class="breadcrumb">
            <a href="<?php echo SITE_URL; ?>/index.php">Home</a>
            <span>›</span>
            <span>Campaigns</span>
        </div>
    </div>

    <!-- Active Campaigns -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Active Campaigns</h2>
                <p>Join one of our ongoing campaigns and make a real difference</p>
                <div class="line"></div>
            </div>

            <!-- Campaign 1 -->
            <div class="info-card mb-3" style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px; align-items: center;">
                <div style="aspect-ratio: 1; border-radius: var(--radius-lg); overflow: hidden; background: var(--gray-100);">
                    <img 
                        src="<?php echo $campaignImageOne; ?>" 
                        alt="Ban Single-Use Plastics on Campus campaign"
                        style="width: 100%; height: 100%; object-fit: cover; display: block;"
                        loading="lazy"
                    >
                </div>

                <div>
                    <span class="badge badge-success">Active Campaign</span>
                    <h2 style="margin: 10px 0;">Ban Single-Use Plastics on Campus</h2>
                    <p style="color: var(--gray-700); line-height: 1.8; margin-bottom: 15px;">
                        We're working with Pentecost University administration to implement a campus-wide ban on unnecessary single-use plastics. This includes plastic straws, bags, and disposable cutlery in all campus facilities.
                    </p>

                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 15px;">
                        <div style="text-align: center; padding: 15px; background: var(--primary-light); border-radius: var(--radius);">
                            <strong style="font-size: 1.3rem; color: var(--primary);">2,500+</strong>
                            <p style="font-size: 0.8rem; color: var(--gray-500);">Signatures</p>
                        </div>

                        <div style="text-align: center; padding: 15px; background: var(--secondary-light); border-radius: var(--radius);">
                            <strong style="font-size: 1.3rem; color: var(--secondary);">15</strong>
                            <p style="font-size: 0.8rem; color: var(--gray-500);">Partners</p>
                        </div>

                        <div style="text-align: center; padding: 15px; background: #fff3e0; border-radius: var(--radius);">
                            <strong style="font-size: 1.3rem; color: var(--accent);">60%</strong>
                            <p style="font-size: 0.8rem; color: var(--gray-500);">Goal Progress</p>
                        </div>
                    </div>

                    <div class="progress-bar" style="height: 8px;">
                        <div class="progress-fill" data-width="60%"></div>
                    </div>

                    <a href="<?php echo SITE_URL; ?>/pages/what-to-do.php" class="btn btn-primary mt-2">Join This Campaign →</a>
                </div>
            </div>

            <!-- Campaign 2 -->
            <div class="info-card mb-3" style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px; align-items: center;">
                <div style="aspect-ratio: 1; border-radius: var(--radius-lg); overflow: hidden; background: var(--gray-100);">
                    <img 
                        src="<?php echo $campaignImageTwo; ?>" 
                        alt="Clean Our Waterways campaign"
                        style="width: 100%; height: 100%; object-fit: cover; display: block;"
                        loading="lazy"
                    >
                </div>

                <div>
                    <span class="badge badge-success">Active Campaign</span>
                    <h2 style="margin: 10px 0;">Clean Our Waterways</h2>
                    <p style="color: var(--gray-700); line-height: 1.8; margin-bottom: 15px;">
                        Organizing regular cleanup events along local rivers, streams, and water channels to prevent plastic from reaching the ocean. During heavy rainfall periods, massive amounts of plastic waste enter waterways.
                    </p>

                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 15px;">
                        <div style="text-align: center; padding: 15px; background: var(--primary-light); border-radius: var(--radius);">
                            <strong style="font-size: 1.3rem; color: var(--primary);">5,000 kg</strong>
                            <p style="font-size: 0.8rem; color: var(--gray-500);">Waste Collected</p>
                        </div>

                        <div style="text-align: center; padding: 15px; background: var(--secondary-light); border-radius: var(--radius);">
                            <strong style="font-size: 1.3rem; color: var(--secondary);">500+</strong>
                            <p style="font-size: 0.8rem; color: var(--gray-500);">Volunteers</p>
                        </div>

                        <div style="text-align: center; padding: 15px; background: #fff3e0; border-radius: var(--radius);">
                            <strong style="font-size: 1.3rem; color: var(--accent);">12</strong>
                            <p style="font-size: 0.8rem; color: var(--gray-500);">Events Held</p>
                        </div>
                    </div>

                    <div class="progress-bar" style="height: 8px;">
                        <div class="progress-fill" data-width="75%"></div>
                    </div>

                    <a href="<?php echo SITE_URL; ?>/pages/how-to-help.php" class="btn btn-secondary mt-2">Volunteer Now →</a>
                </div>
            </div>

            <!-- Campaign 3 -->
            <div class="info-card mb-3" style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px; align-items: center;">
                <div style="aspect-ratio: 1; border-radius: var(--radius-lg); overflow: hidden; background: var(--gray-100);">
                    <img 
                        src="<?php echo $campaignImageThree; ?>" 
                        alt="Manufacturer Responsibility campaign"
                        style="width: 100%; height: 100%; object-fit: cover; display: block;"
                        loading="lazy"
                    >
                </div>

                <div>
                    <span class="badge badge-success">Active Campaign</span>
                    <h2 style="margin: 10px 0;">Manufacturer Responsibility</h2>
                    <p style="color: var(--gray-700); line-height: 1.8; margin-bottom: 15px;">
                        Engaging with manufacturers and retailers to adopt Extended Producer Responsibility (EPR) practices. We advocate for companies to take responsibility for the entire lifecycle of their plastic products.
                    </p>

                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 15px;">
                        <div style="text-align: center; padding: 15px; background: var(--primary-light); border-radius: var(--radius);">
                            <strong style="font-size: 1.3rem; color: var(--primary);">8</strong>
                            <p style="font-size: 0.8rem; color: var(--gray-500);">Companies Engaged</p>
                        </div>

                        <div style="text-align: center; padding: 15px; background: var(--secondary-light); border-radius: var(--radius);">
                            <strong style="font-size: 1.3rem; color: var(--secondary);">3</strong>
                            <p style="font-size: 0.8rem; color: var(--gray-500);">Policy Changes</p>
                        </div>

                        <div style="text-align: center; padding: 15px; background: #fff3e0; border-radius: var(--radius);">
                            <strong style="font-size: 1.3rem; color: var(--accent);">40%</strong>
                            <p style="font-size: 0.8rem; color: var(--gray-500);">Goal Progress</p>
                        </div>
                    </div>

                    <div class="progress-bar" style="height: 8px;">
                        <div class="progress-fill" data-width="40%"></div>
                    </div>

                    <a href="<?php echo SITE_URL; ?>/pages/contact.php" class="btn btn-accent mt-2">Get Involved →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Campaign Impact -->
    <section class="section section-green" aria-label="Campaign impact statistics">
        <div class="container">
            <div class="section-header" style="color: white;">
                <h2 style="color: white;">Our Impact So Far</h2>
                <p style="color: rgba(255,255,255,0.9);">Measurable results from our campaigns</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-number" data-count="5000" data-suffix="kg">0</span>
                    <span class="stat-label">Plastic Waste Collected</span>
                </div>

                <div class="stat-card">
                    <span class="stat-number" data-count="500" data-suffix="+">0</span>
                    <span class="stat-label">Active Volunteers</span>
                </div>

                <div class="stat-card">
                    <span class="stat-number" data-count="24" data-suffix="">0</span>
                    <span class="stat-label">Events Organized</span>
                </div>

                <div class="stat-card">
                    <span class="stat-number" data-count="3" data-suffix="">0</span>
                    <span class="stat-label">Policy Changes Achieved</span>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>