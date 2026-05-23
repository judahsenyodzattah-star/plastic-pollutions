<?php

$pageTitle = 'Meet the Team';

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';

?>

<main id="main-content">
    <div class="page-header">
        <h1>Meet the Team</h1>
        <p>The passionate individuals behind PlasticPollutions</p>
        <div class="breadcrumb">
            <a href="<?php echo SITE_URL; ?>/index.php">Home</a>
            <span>›</span>
            <span>Our Team</span>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2>Our Developers</h2>
                <p>Meet the team that built this platform for environmental change</p>
                <div class="line"></div>
            </div>

            <div class="team-grid">

                <!-- Developer 1 -->
                <div class="team-card">
                    <img
                        src="<?php echo SITE_URL; ?>/assets/images/team/kwame-asante.jpg"
                        alt="Kwame Asante - Lead Developer"
                        class="team-img"
                    >
                    <div class="team-info">
                        <h3>Judah Dzattah</h3>
                        <div class="role">Lead Developer &amp; Project Manager</div>
                        <p>"Technology is a powerful tool for environmental activism. Through this platform, we can connect people, spread awareness, and drive real change against plastic pollution."</p>
                        <div class="social-buttons" style="justify-content: center; margin-top: 10px;">
                            <!-- Replace # with actual LinkedIn URL -->
                            <a href="https://www.linkedin.com/signup" class="social-btn linkedin" aria-label="LinkedIn profile" target="_blank" rel="noopener noreferrer" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background: #0A66C2; color: white; text-decoration: none;">
                                <!-- LinkedIn SVG Logo -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="white">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <!-- Replace # with actual GitHub URL -->
                            <a href="https://github.com/signup" class="social-btn" aria-label="GitHub profile" target="_blank" rel="noopener noreferrer" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background: #181717; color: white; text-decoration: none;">
                                <!-- GitHub SVG Logo -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Developer 2 -->
                <div class="team-card">
                    <img
                        src="<?php echo SITE_URL; ?>/assets/images/team/ama-mensah.jpg"
                        alt="Ama Mensah - Frontend Developer"
                        class="team-img"
                    >
                    <div class="team-info">
                        <h3>Ama Mensah</h3>
                        <div class="role">Frontend Developer &amp; UI/UX Designer</div>
                        <p>"Great design makes information accessible. I believe in creating interfaces that not only look beautiful but empower users to take action for our planet."</p>
                        <div class="social-buttons" style="justify-content: center; margin-top: 10px;">
                            <a href="https://www.linkedin.com/signup" class="social-btn linkedin" aria-label="LinkedIn profile" target="_blank" rel="noopener noreferrer" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background: #0A66C2; color: white; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="white">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="https://github.com/signup" class="social-btn" aria-label="GitHub profile" target="_blank" rel="noopener noreferrer" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background: #181717; color: white; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Developer 3 -->
                <div class="team-card">
                    <img
                        src="<?php echo SITE_URL; ?>/assets/images/team/kofi-boateng.jpg"
                        alt="Kofi Boateng - Backend Developer"
                        class="team-img"
                    >
                    <div class="team-info">
                        <h3>Adewola Remy</h3>
                        <div class="role">Backend Developer &amp; Database Admin</div>
                        <p>"Behind every great platform is a solid foundation. I ensure our systems are secure, efficient, and capable of supporting our growing community of environmental advocates."</p>
                        <div class="social-buttons" style="justify-content: center; margin-top: 10px;">
                            <a href="https://www.linkedin.com/signup" class="social-btn linkedin" aria-label="LinkedIn profile" target="_blank" rel="noopener noreferrer" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background: #0A66C2; color: white; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="white">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="https://github.com/signup" class="social-btn" aria-label="GitHub profile" target="_blank" rel="noopener noreferrer" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background: #181717; color: white; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Developer 4 -->
                <div class="team-card">
                    <img
                        src="<?php echo SITE_URL; ?>/assets/images/team/efua-darko.jpg"
                        alt="Efua Darko - Content Creator"
                        class="team-img"
                    >
                    <div class="team-info">
                        <h3>Adewale Blushie</h3>
                        <div class="role">Content Creator &amp; Research Lead</div>
                        <p>"Knowledge is power. By researching and presenting accurate data about plastic pollution, we equip people with the information they need to make informed choices."</p>
                        <div class="social-buttons" style="justify-content: center; margin-top: 10px;">
                            <a href="https://www.linkedin.com/signup" class="social-btn linkedin" aria-label="LinkedIn profile" target="_blank" rel="noopener noreferrer" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background: #0A66C2; color: white; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="white">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="https://github.com/signup" class="social-btn" aria-label="GitHub profile" target="_blank" rel="noopener noreferrer" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background: #181717; color: white; text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Team Philosophy -->
            <div class="info-card mt-3" style="text-align: center; max-width: 800px; margin: 30px auto 0;">
                <h3 style="margin-bottom: 15px;">Our Shared Philosophy</h3>
                <p style="font-size: 1.1rem; color: var(--gray-700); line-height: 1.8;">
                    "We believe that technology and activism go hand in hand. As students at Pentecost University, we have the opportunity and responsibility to use our skills for the greater good. This platform represents our commitment to environmental sustainability and our belief that every individual can make a difference. Together, we can create a cleaner, healthier world for future generations."
                </p>
            </div>

            <!-- Tech Stack -->
            <div class="mt-3" style="text-align: center;">
                <h3 style="margin-bottom: 20px;">Built With</h3>
                <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                    <span class="badge" style="background: #777BB3; color: white; padding: 8px 20px; font-size: 0.9rem;">PHP</span>
                    <span class="badge" style="background: #4479A1; color: white; padding: 8px 20px; font-size: 0.9rem;">MySQL</span>
                    <span class="badge" style="background: #F7DF1E; color: #333; padding: 8px 20px; font-size: 0.9rem;">JavaScript</span>
                    <span class="badge" style="background: #264de4; color: white; padding: 8px 20px; font-size: 0.9rem;">CSS3</span>
                    <span class="badge" style="background: #E34F26; color: white; padding: 8px 20px; font-size: 0.9rem;">HTML5</span>
                    <span class="badge" style="background: #333; color: white; padding: 8px 20px; font-size: 0.9rem;">AJAX</span>
                </div>
            </div>

        </div>
    </section>

</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
