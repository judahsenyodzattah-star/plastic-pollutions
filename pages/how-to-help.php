<?php

$pageTitle = 'How You Can Help';

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
?>

<main id="main-content">
    <div class="page-header">
        <h1>How You Can Help</h1>
        <p>Every action counts. Here's how you can contribute to reducing plastic pollution.</p>
        <div class="breadcrumb">
            <a href="<?php echo SITE_URL; ?>/index.php">Home</a>
            <span>›</span>
            <span>How You Can Help</span>
        </div>
    </div>

    <!-- Ways to Help -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Ways to Make a Difference</h2>
                <p>Choose how you'd like to contribute</p>
                <div class="line"></div>
            </div>

            <div class="card-grid">
                <!-- Volunteer -->
                <div class="card">
                    <div class="card-body" style="text-align: center; padding: 40px;">
                        <div class="action-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </div>
                        <h3>Volunteer</h3>
                        <p>Join our cleanup events, campus drives, and community outreach programs. We organize regular activities where you can make a hands-on difference.</p>
                        <a href="<?php echo SITE_URL; ?>/pages/contact.php" class="btn btn-primary btn-sm mt-2">Sign Up to Volunteer</a>
                    </div>
                </div>

                <!-- Donate -->
                <div class="card">
                    <div class="card-body" style="text-align: center; padding: 40px;">
                        <div class="action-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/>
                                <line x1="12" y1="9" x2="12" y2="15"/>
                                <line x1="9" y1="12" x2="15" y2="12"/>
                            </svg>
                        </div>
                        <h3>Donate</h3>
                        <p>Financial support helps us fund cleanups, research, educational programs, and advocacy campaigns. Every contribution matters.</p>
                        <a href="<?php echo SITE_URL; ?>/pages/donate.php" class="btn btn-accent btn-sm mt-2">Make a Donation</a>
                    </div>
                </div>

                <!-- Spread the Word -->
                <div class="card">
                    <div class="card-body" style="text-align: center; padding: 40px;">
                        <div class="action-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 2L11 13"/>
                                <path d="M22 2L15 22L11 13L2 9L22 2Z"/>
                            </svg>
                        </div>
                        <h3>Spread the Word</h3>
                        <p>Share our message on social media, talk to your friends and family, and help raise awareness about plastic pollution in your community.</p>
                        <div class="social-buttons mt-2" style="justify-content: center;">
                            <a href="https://twitter.com/intent/tweet?text=Join%20the%20fight%20against%20plastic%20pollution!%20%23PlasticPollutions&url=<?php echo urlencode(SITE_URL); ?>" target="_blank" rel="noopener noreferrer" class="social-btn twitter" aria-label="Share on X/Twitter">𝕏</a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(SITE_URL); ?>" target="_blank" rel="noopener noreferrer" class="social-btn facebook" aria-label="Share on Facebook">f</a>
                            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" class="social-btn instagram" aria-label="Share on Instagram">
                                <svg viewBox="0 0 24 24" width="20" height="20">
                                    <rect x="2" y="2" width="20" height="20" rx="5" fill="none" stroke="white" stroke-width="2"/>
                                    <circle cx="12" cy="12" r="5" fill="none" stroke="white" stroke-width="2"/>
                                    <circle cx="17.5" cy="6.5" r="1.5" fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Change Your Lifestyle -->
                <div class="card">
                    <div class="card-body" style="text-align: center; padding: 40px;">
                        <div class="action-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22c4-4 8-7.5 8-12a8 8 0 1 0-16 0c0 4.5 4 8 8 12z"/>
                                <path d="M9 12l2 2 4-4"/>
                            </svg>
                        </div>
                        <h3>Change Your Lifestyle</h3>
                        <p>Reduce your plastic footprint by making simple changes: use reusable bags, bottles, and containers; choose plastic-free products.</p>
                    </div>
                </div>

                <!-- Sign Petitions -->
                <div class="card">
                    <div class="card-body" style="text-align: center; padding: 40px;">
                        <div class="action-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <path d="M9 15l2 2 4-4"/>
                            </svg>
                        </div>
                        <h3>Sign Petitions</h3>
                        <p>Add your voice to our petitions calling for policy changes, manufacturer responsibility, and government action on plastic pollution.</p>
<a href="<?php echo SITE_URL; ?>/pages/what-to-do.php#petition" class="btn btn-outline btn-sm mt-2">Sign Our Petition</a>                    </div>
                </div>

                <!-- Educate Others -->
                <div class="card">
                    <div class="card-body" style="text-align: center; padding: 40px;">
                        <div class="action-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                            </svg>
                        </div>
                        <h3>Educate Others</h3>
                        <p>Become an ambassador for our cause. Organize talks, workshops, or informational sessions in your school, workplace, or community.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pledge System -->
    <section class="section section-light" aria-label="Take a pledge">
        <div class="container">
            <div class="section-header">
                <h2>Take the Pledge</h2>
                <p>Commit to specific actions that reduce plastic pollution</p>
                <div class="line"></div>
            </div>

            <div class="pledge-grid">
                <!-- No Plastic Bags -->
                <div class="pledge-card" data-pledge="no-plastic-bags" tabindex="0" role="checkbox" aria-checked="false">
                    <img src="<?php echo SITE_URL; ?>/assets/images/pledges/no-plastic-bags.jpg" alt="No Plastic Bags" class="pledge-img">
                    <h4>No Plastic Bags</h4>
                    <p>I pledge to use reusable bags for all my shopping.</p>
                </div>

                <!-- Reusable Bottle -->
                <div class="pledge-card" data-pledge="reusable-bottle" tabindex="0" role="checkbox" aria-checked="false">
                    <img src="<?php echo SITE_URL; ?>/assets/images/pledges/reusable-bottle.jpg" alt="Reusable Bottle" class="pledge-img">
                    <h4>Reusable Bottle</h4>
                    <p>I pledge to carry a reusable water bottle always.</p>
                </div>

                <!-- Say No to Straws -->
                <div class="pledge-card" data-pledge="no-straws" tabindex="0" role="checkbox" aria-checked="false">
                    <img src="<?php echo SITE_URL; ?>/assets/images/pledges/no-straws.jpg" alt="Say No to Straws" class="pledge-img">
                    <h4>Say No to Straws</h4>
                    <p>I pledge to refuse plastic straws and use alternatives.</p>
                </div>

                <!-- Recycle Always -->
                <div class="pledge-card" data-pledge="recycle" tabindex="0" role="checkbox" aria-checked="false">
                    <img src="<?php echo SITE_URL; ?>/assets/images/pledges/recycle-always.jpg" alt="Recycle Always" class="pledge-img">
                    <h4>Recycle Always</h4>
                    <p>I pledge to properly sort and recycle all eligible waste.</p>
                </div>

                <!-- Spread Awareness -->
                <div class="pledge-card" data-pledge="spread-awareness" tabindex="0" role="checkbox" aria-checked="false">
                    <img src="<?php echo SITE_URL; ?>/assets/images/pledges/spread-awareness.jpg" alt="Spread Awareness" class="pledge-img">
                    <h4>Spread Awareness</h4>
                    <p>I pledge to educate at least 5 people about plastic pollution.</p>
                </div>

                <!-- Monthly Cleanup -->
                <div class="pledge-card" data-pledge="monthly-cleanup" tabindex="0" role="checkbox" aria-checked="false">
                    <img src="<?php echo SITE_URL; ?>/assets/images/pledges/monthly-cleanup.jpg" alt="Monthly Cleanup" class="pledge-img">
                    <h4>Monthly Cleanup</h4>
                    <p>I pledge to participate in or organize a cleanup monthly.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <div id="pledgeCount" style="margin-bottom: 10px; font-weight: 600; color: var(--gray-600);"></div>
                <div id="pledgeResult" style="margin-bottom: 15px;"></div>
                <?php if (isLoggedIn()): ?>
                <button class="btn btn-primary btn-lg" onclick="submitPledges()">Submit My Pledges</button>
                <?php else: ?>
                <p style="color: var(--gray-500); margin-bottom: 10px;">Login to save your pledges</p>
                <a href="<?php echo SITE_URL; ?>/pages/login.php" class="btn btn-primary btn-lg">Login to Pledge</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Impact Tracker -->
    <section class="section" aria-label="Collective impact">
        <div class="container">
            <div class="section-header">
                <h2>Our Collective Impact</h2>
                <p>See how our community is making a difference together</p>
                <div class="line"></div>
            </div>
            <div class="info-card" style="max-width: 700px; margin: 0 auto;">
                <div style="margin-bottom: 20px;">
                    <div class="progress-label">
                        <span>Plastic Bags Refused</span>
                        <span>12,500 bags</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" data-width="85%"></div>
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <div class="progress-label">
                        <span>Bottles Saved</span>
                        <span>8,200 bottles</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" data-width="72%"></div>
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <div class="progress-label">
                        <span>Items Recycled</span>
                        <span>25,000+ items</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" data-width="90%"></div>
                    </div>
                </div>
                <div>
                    <div class="progress-label">
                        <span>People Educated</span>
                        <span>3,500 people</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" data-width="65%"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// Pass SITE_URL to JavaScript for the submit function
window.SITE_URL = '<?php echo SITE_URL; ?>';
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
