<?php
$pageTitle = 'Home';

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';

if (function_exists('trackVisitor')) {
    trackVisitor($_SERVER['REQUEST_URI'] ?? '/');
}
?>

<!-- page content -->
<main id="main-content">

   <!-- Hero Section -->
<section class="hero" aria-label="Welcome banner">
    <div class="particles" aria-hidden="true"></div>
    <div class="hero-overlay" aria-hidden="true"></div>
    
    <div class="hero-content">
        <h1>Together We Can End<br>Plastic Pollution</h1>
        <p>
            Join PlasticPollutions at Pentecost University in our mission to reduce plastic waste,
            protect our oceans, and build a sustainable future for all.
        </p>

        <div class="hero-buttons">
            <button onclick="openSignupModal()" class="btn btn-accent btn-lg">
                Sign Up Now
            </button>

            <a href="<?php echo SITE_URL; ?>/pages/how-to-help.php" 
               class="btn btn-lg"
               style="background: rgba(255,255,255,0.2); color: white; border: 2px solid white;">
                Learn How to Help
            </a>
        </div>
    </div>
</section>

   <!-- Environmental Stats -->
<section class="section section-green" aria-label="Environmental statistics">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <!-- Keep the large number for the math, change the visible text to 14M -->
                <span class="stat-number" data-count="14" data-suffix="M+">14</span>
                <span class="stat-label">Tons of plastic enter oceans yearly</span>
            </div>

            <div class="stat-card">
                <span class="stat-number" data-count="5" data-suffix="%" data-prefix="&lt;">0</span>
                <span class="stat-label">Of plastic waste is recycled</span>
            </div>

            <div class="stat-card">
                <span class="stat-number" data-count="800" data-suffix="+">0</span>
                <span class="stat-label">Marine species affected</span>
            </div>

            <div class="stat-card">
                <!-- Keep the large number for the math, change the visible text to 1M -->
                <span class="stat-number" data-count="1" data-suffix="M+">1</span>
                <span class="stat-label">Plastic bottles bought per minute</span>
            </div>
        </div>
    </div>
</section>

    <!-- Image Slider Section -->
<section class="section" aria-label="Featured content slider">
    <div class="container">
        <div class="section-header">
            <h2>The Plastic Crisis</h2>
            <p>See the devastating impact of plastic pollution on our planet</p>
            <div class="line"></div>
        </div>

        <div class="slider-section" role="region" aria-label="Image slideshow">
            <div class="slider">

                <div class="slide" style="background-image: url('<?php echo SITE_URL; ?>/assets/images/ocean.jpg');">
                    <div class="slide-content">
                        <h3>Ocean Pollution</h3>
                        <p>Over 8 million tons of plastic end up in our oceans every year, threatening marine life and ecosystems.</p>
                    </div>
                </div>

                <div class="slide" style="background-image: url('<?php echo SITE_URL; ?>/assets/images/recyclebin.jpg');">
                    <div class="slide-content">
                        <h3>Recycle &amp; Reduce</h3>
                        <p>Less than 5% of plastic is recycled. Learn how you can make a difference through proper recycling.</p>
                    </div>
                </div>

                <div class="slide" style="background-image: url('<?php echo SITE_URL; ?>/assets/images/wildlife.jpg');">
                    <div class="slide-content">
                        <h3>Wildlife at Risk</h3>
                        <p>Millions of animals are killed by plastic pollution every year. From birds to sea turtles, no species is safe.</p>
                    </div>
                </div>

                <div class="slide" style="background-image: url('<?php echo SITE_URL; ?>/assets/images/future.jpg');">
                    <div class="slide-content">
                        <h3>Sustainable Future</h3>
                        <p>Together, we can transition to sustainable alternatives and create a plastic-free future.</p>
                    </div>
                </div>

            </div>

            <button class="slider-arrow prev" aria-label="Previous slide" type="button">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M15 18l-6-6 6-6"></path>
                </svg>
            </button>

            <button class="slider-arrow next" aria-label="Next slide" type="button">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M9 6l6 6-6 6"></path>
                </svg>
            </button>

            <div class="slider-controls" role="tablist" aria-label="Slide navigation">
                <button class="slider-dot active" aria-label="Go to slide 1" role="tab" type="button"></button>
                <button class="slider-dot" aria-label="Go to slide 2" role="tab" type="button"></button>
                <button class="slider-dot" aria-label="Go to slide 3" role="tab" type="button"></button>
                <button class="slider-dot" aria-label="Go to slide 4" role="tab" type="button"></button>
            </div>
        </div>
    </div>
</section>

    <!-- About Section -->
    <section class="section section-light" aria-label="About us">
        <div class="container">
            <div class="section-header">
                <h2>About PlasticPollutions</h2>
                <p>Learn about our mission and why we fight against plastic pollution</p>
                <div class="line"></div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px; align-items: center;">
                <div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 15px; color: var(--primary);">Our Mission</h3>
                    <p style="margin-bottom: 15px; color: var(--gray-700); line-height: 1.8;">
                        PlasticPollutions is an environmental action group at Pentecost University whose aim is to reduce plastic waste and prevent harm to oceans, wildlife, and the general environment. We actively promote sustainable practices and encourage individuals, manufacturers, and retailers to reduce the use of non-essential single-use plastics.
                    </p>
                    <p style="margin-bottom: 20px; color: var(--gray-700); line-height: 1.8;">
                        Growing concerns about the large volumes of plastic waste that enter water bodies, especially during periods of heavy rainfall, inspired the formation of this group. Reports indicate that less than 5% of plastic waste is recycled, while the rest contributes significantly to environmental pollution.
                    </p>
                    <a href="<?php echo SITE_URL; ?>/pages/strategy.php" class="btn btn-primary">Learn Our Strategy</a>
                </div>

                <div>
                    <div class="info-card">
                        <h4 style="margin-bottom: 20px; font-size: 1.2rem;">Environmental Impact Overview</h4>

                        <div style="margin-bottom: 15px;">
                            <div class="progress-label"><span>Ocean Contamination</span><span>80%</span></div>
                            <div class="progress-bar"><div class="progress-fill" data-width="80%"></div></div>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <div class="progress-label"><span>Landfill Accumulation</span><span>73%</span></div>
                            <div class="progress-bar"><div class="progress-fill" data-width="73%"></div></div>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <div class="progress-label"><span>Wildlife Affected</span><span>90%</span></div>
                            <div class="progress-bar"><div class="progress-fill" data-width="90%"></div></div>
                        </div>

                        <div>
                            <div class="progress-label"><span>Recycling Rate Global</span><span>5%</span></div>
                            <div class="progress-bar"><div class="progress-fill" data-width="5%" style="background: var(--danger);"></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What You Can Do -->
    <section class="section" aria-label="Actions you can take">
        <div class="container">
            <div class="section-header">
                <h2>What You Can Do</h2>
                <p>Simple actions that make a big difference</p>
                <div class="line"></div>
            </div>

            <div class="card-grid">
                <div class="card">
                    <div class="card-body" style="text-align: center; padding: 40px;">
                        <div class="action-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><line x1="5.7" y1="5.7" x2="18.3" y2="18.3"></line></svg>
                        </div>
                        <h3>Refuse Single-Use</h3>
                        <p>Say no to plastic straws, bags, and cutlery. Bring your own reusable alternatives wherever you go.</p>
                        <a href="<?php echo SITE_URL; ?>/pages/how-to-help.php" class="btn btn-outline btn-sm mt-2">Learn More</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body" style="text-align: center; padding: 40px;">
                        <div class="action-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="M7 7l2.5-4L12 7H9.8l2.2 4"></path><path d="M17 8l4 2-3.2 3.5-1.1-1.9-4.4 2.5"></path><path d="M8 17H3l2.4-4.2 1.1 1.9H12"></path></svg>
                        </div>
                        <h3>Recycle Properly</h3>
                        <p>Learn which plastics can be recycled and ensure they make it to the right facilities.</p>
                        <a href="<?php echo SITE_URL; ?>/pages/what-to-do.php" class="btn btn-outline btn-sm mt-2">Learn More</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body" style="text-align: center; padding: 40px;">
                        <div class="action-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="M12 21s-7-4.4-9.2-9.2C1.4 8.8 3.3 5 6.7 5c2 0 3.3 1.1 4.1 2.2C11.7 6.1 13 5 15 5c3.4 0 5.3 3.8 3.9 6.8C16.7 16.6 12 21 12 21z"></path><path d="M12 9v6"></path><path d="M9 12h6"></path></svg>
                        </div>
                        <h3>Donate &amp; Support</h3>
                        <p>Your donation helps fund cleanups, research, and campaigns to end plastic pollution.</p>
                        <a href="<?php echo SITE_URL; ?>/pages/donate.php" class="btn btn-outline btn-sm mt-2">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Twitter Feed & Social Section -->
    <section class="section section-light" aria-label="Social media updates">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px;">
                <div>
                    <div class="section-header" style="text-align: left;">
                        <h2>Latest Updates</h2>
                        <p>Follow our social media for real-time updates</p>
                        <div class="line" style="margin-left: 0;"></div>
                    </div>

                    <div class="twitter-feed">
                        <div class="twitter-header">
                            <span class="twitter-header-logo" aria-hidden="true">
                                <svg viewBox="0 0 24 24"><path d="M18.9 2H22l-6.8 7.8L23.2 22h-6.3l-5-7.5L5.5 22H2.3l7.3-8.4L2 2h6.5l4.5 6.8L18.9 2zm-1.1 17.8h1.7L7.5 4.1H5.7l12.1 15.7z"></path></svg>
                            </span>
                            <span>@PlasticPollutions</span>
                        </div>

                        <div class="tweet">
                            <div class="tweet-header">
                                <div class="tweet-avatar">PP</div>
                                <div><div class="tweet-name">PlasticPollutions</div><div class="tweet-handle">@PlasticPollutions</div></div>
                            </div>
                            <div class="tweet-text">Did you know? Every minute, one garbage truck of plastic enters our oceans. It's time to act! Join our next campus cleanup event this Saturday. #PlasticFree #PentecostUniversity</div>
                            <div class="tweet-time">2 hours ago</div>
                        </div>

                        <div class="tweet">
                            <div class="tweet-header">
                                <div class="tweet-avatar">PP</div>
                                <div><div class="tweet-name">PlasticPollutions</div><div class="tweet-handle">@PlasticPollutions</div></div>
                            </div>
                            <div class="tweet-text">Great news! We've partnered with three local recycling centers to improve plastic waste management in our community. Together we can increase the recycling rate! #Recycle #Sustainability</div>
                            <div class="tweet-time">5 hours ago</div>
                        </div>

                        <div class="tweet">
                            <div class="tweet-header">
                                <div class="tweet-avatar">PP</div>
                                <div><div class="tweet-name">PlasticPollutions</div><div class="tweet-handle">@PlasticPollutions</div></div>
                            </div>
                            <div class="tweet-text">Over 800 marine species are affected by plastic pollution. Let's protect our wildlife by reducing single-use plastics. Sign our petition today! #SaveOurOceans</div>
                            <div class="tweet-time">1 day ago</div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="section-header" style="text-align: left;">
                        <h2>Connect With Us</h2>
                        <p>Follow us on social media and stay informed</p>
                        <div class="line" style="margin-left: 0;"></div>
                    </div>

                    <div style="display: grid; gap: 20px;">
                        <a href="https://twitter.com" target="_blank" rel="noopener" class="card social-card">
                            <div class="social-btn twitter" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M18.9 2H22l-6.8 7.8L23.2 22h-6.3l-5-7.5L5.5 22H2.3l7.3-8.4L2 2h6.5l4.5 6.8L18.9 2zm-1.1 17.8h1.7L7.5 4.1H5.7l12.1 15.7z"></path></svg></div>
                            <div><strong>Twitter / X</strong><p style="font-size: 0.9rem; color: var(--gray-500);">Follow @PlasticPollutions for daily updates</p></div>
                        </a>

                        <a href="https://facebook.com" target="_blank" rel="noopener" class="card social-card">
                            <div class="social-btn facebook" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M22 12.06C22 6.48 17.52 2 11.94 2S2 6.48 2 12.06c0 5.02 3.66 9.19 8.44 9.94v-7.03H7.9v-2.91h2.54V9.84c0-2.5 1.49-3.88 3.77-3.88 1.09 0 2.23.19 2.23.19v2.45h-1.26c-1.24 0-1.63.77-1.63 1.56v1.9h2.77l-.44 2.91h-2.33V22c4.78-.75 8.45-4.92 8.45-9.94z"></path></svg></div>
                            <div><strong>Facebook</strong><p style="font-size: 0.9rem; color: var(--gray-500);">Join our community of 5,000+ supporters</p></div>
                        </a>

                        <a href="https://instagram.com" target="_blank" rel="noopener" class="card social-card">
                            <div class="social-btn instagram" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7.8 2h8.4A5.8 5.8 0 0 1 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8A5.8 5.8 0 0 1 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2zm0 2A3.8 3.8 0 0 0 4 7.8v8.4A3.8 3.8 0 0 0 7.8 20h8.4a3.8 3.8 0 0 0 3.8-3.8V7.8A3.8 3.8 0 0 0 16.2 4H7.8zm4.2 3.3a4.7 4.7 0 1 1 0 9.4 4.7 4.7 0 0 1 0-9.4zm0 2a2.7 2.7 0 1 0 0 5.4 2.7 2.7 0 0 0 0-5.4zm5.1-2.2a1.1 1.1 0 1 1 0 2.2 1.1 1.1 0 0 1 0-2.2z"></path></svg></div>
                            <div><strong>Instagram</strong><p style="font-size: 0.9rem; color: var(--gray-500);">See our environmental impact in pictures</p></div>
                        </a>

                        <a href="https://youtube.com" target="_blank" rel="noopener" class="card social-card">
                            <div class="social-btn youtube" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2 31.2 31.2 0 0 0 0 12a31.2 31.2 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1A31.2 31.2 0 0 0 24 12a31.2 31.2 0 0 0-.5-5.8zM9.6 15.5v-7l6.2 3.5-6.2 3.5z"></path></svg></div>
                            <div><strong>YouTube</strong><p style="font-size: 0.9rem; color: var(--gray-500);">Watch documentaries and event coverage</p></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section section-dark" style="text-align: center;" aria-label="Call to action">
        <div class="container">
            <h2 style="font-size: 2.2rem; margin-bottom: 15px;">Ready to Make a Difference?</h2>
            <p style="font-size: 1.1rem; opacity: 0.9; max-width: 600px; margin: 0 auto 30px;">
                Every action counts. Whether you donate, volunteer, or simply reduce your plastic usage, you're part of the solution.
            </p>
            <div class="hero-buttons">
                <button onclick="openSignupModal()" class="btn btn-accent btn-lg">Join Us Today</button>
                <a href="<?php echo SITE_URL; ?>/pages/donate.php" class="btn btn-lg" style="background: rgba(255,255,255,0.15); color: white; border: 2px solid rgba(255,255,255,0.5);">Make a Donation</a>
            </div>
        </div>
    </section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
