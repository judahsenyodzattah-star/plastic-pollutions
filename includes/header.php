<?php

require_once __DIR__ . '/functions.php';

// Track visitor once per page load
try {
    if (function_exists('trackVisitor')) {
        trackVisitor($_SERVER['REQUEST_URI'] ?? '/');
    }
} catch (Exception $e) {
    // Fail silently so the site does not break if visitor tracking has an issue
}

$currentPage = basename($_SERVER['PHP_SELF'], '.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta 
        name="description" 
        content="PlasticPollutions - An environmental action group at Pentecost University reducing plastic waste and protecting our planet."
    >
    <meta 
        name="keywords" 
        content="plastic pollution, recycling, environment, ocean cleanup, sustainability, Pentecost University"
    >
    <meta name="author" content="PlasticPollutions Team">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="<?php echo SITE_NAME; ?> - <?php echo SITE_TAGLINE; ?>">
    <meta property="og:description" content="Join us in the fight against plastic pollution. Together we can make a difference.">
    <meta property="og:type" content="website">

    <title>
        <?php echo isset($pageTitle) ? $pageTitle . ' | ' . SITE_NAME : SITE_NAME . ' - ' . SITE_TAGLINE; ?>
    </title>

    <!-- Preload -->
    <link rel="preload" as="image" href="<?php echo SITE_URL; ?>/assets/images/hero.jpg" fetchpriority="high">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link 
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" 
        rel="stylesheet"
    >

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/style.css">
</head>

<body>
    <!-- Skip to content -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <!-- Mobile nav overlay -->
    <div class="nav-overlay" id="navOverlay" aria-hidden="true"></div>

    <!-- Navigation -->
    <nav class="navbar" role="navigation" aria-label="Main navigation" id="navbar">
        <div class="nav-container">

            <!-- Logo -->
            <a href="<?php echo SITE_URL; ?>/index.php" class="nav-logo" aria-label="PlasticPollutions Home">
                <img 
                    src="<?php echo SITE_URL; ?>/assets/images/logo.png" 
                    alt="PlasticPollutions Logo"
                    class="site-logo"
                    style="width:38px;height:38px;object-fit:contain;display:block;flex:0 0 auto;"
                >
                <span>PlasticPollutions</span>
            </a>

            <!-- Nav Menu -->
            <ul class="nav-menu" id="navMenu" role="menubar">

                <li class="nav-item" role="none">
                    <a 
                        href="<?php echo SITE_URL; ?>/index.php"
                        class="nav-link <?php echo $currentPage === 'index' ? 'active' : ''; ?>"
                        role="menuitem"
                    >
                        Home
                    </a>
                </li>

                <li class="nav-item" role="none">
                    <a 
                        href="#" 
                        class="nav-link" 
                        role="menuitem" 
                        aria-haspopup="true" 
                        aria-expanded="false"
                    >
                        About
                    </a>

                    <div class="dropdown-menu" role="menu">
                        <a href="<?php echo SITE_URL; ?>/pages/what-to-do.php" role="menuitem">
                            What to Do About Plastic
                        </a>
                        <a href="<?php echo SITE_URL; ?>/pages/strategy.php" role="menuitem">
                            Our Strategy
                        </a>
                        <a href="<?php echo SITE_URL; ?>/pages/developers.php" role="menuitem">
                            Our Team
                        </a>
                    </div>
                </li>

                <li class="nav-item" role="none">
                    <a 
                        href="#" 
                        class="nav-link" 
                        role="menuitem" 
                        aria-haspopup="true" 
                        aria-expanded="false"
                    >
                        Get Involved
                    </a>

                    <div class="dropdown-menu" role="menu">
                        <a href="<?php echo SITE_URL; ?>/pages/campaigns.php" role="menuitem">
                            Campaigns
                        </a>
                        <a href="<?php echo SITE_URL; ?>/pages/how-to-help.php" role="menuitem">
                            How You Can Help
                        </a>
                        <a href="<?php echo SITE_URL; ?>/pages/donate.php" role="menuitem">
                            Donate
                        </a>
                    </div>
                </li>

                <li class="nav-item" role="none">
                    <a 
                        href="<?php echo SITE_URL; ?>/pages/latest.php"
                        class="nav-link <?php echo $currentPage === 'latest' ? 'active' : ''; ?>"
                        role="menuitem"
                    >
                        Latest News
                    </a>
                </li>

                <li class="nav-item" role="none">
                    <a 
                        href="<?php echo SITE_URL; ?>/pages/contact.php"
                        class="nav-link <?php echo $currentPage === 'contact' ? 'active' : ''; ?>"
                        role="menuitem"
                    >
                        Contact
                    </a>
                </li>

            </ul>

            <!-- Auth Buttons -->
            <div class="nav-auth">
                <?php if (isLoggedIn()): ?>

                    <a href="<?php echo SITE_URL; ?>/pages/dashboard.php" class="btn btn-primary btn-sm">
                        <svg 
                            viewBox="0 0 24 24" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="2" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            width="16" 
                            height="16"
                        >
                            <rect x="3" y="3" width="7" height="7"/>
                            <rect x="14" y="3" width="7" height="7"/>
                            <rect x="14" y="14" width="7" height="7"/>
                            <rect x="3" y="14" width="7" height="7"/>
                        </svg>
                        Dashboard
                    </a>

                    <a 
                        href="<?php echo SITE_URL; ?>/pages/logout.php" 
                        class="btn btn-outline btn-sm"
                        onclick="return confirm('Are you sure you want to sign out?');"
                    >
                        Logout
                    </a>

                <?php else: ?>

                    <a href="<?php echo SITE_URL; ?>/pages/login.php" class="btn btn-outline btn-sm">
                        Login
                    </a>

                    <button type="button" onclick="openSignupModal()" class="btn btn-primary btn-sm">
                        <svg 
                            viewBox="0 0 24 24" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="2" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            width="16" 
                            height="16"
                        >
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <line x1="19" y1="8" x2="19" y2="14"/>
                            <line x1="22" y1="11" x2="16" y2="11"/>
                        </svg>
                        Sign Up
                    </button>

                <?php endif; ?>
            </div>

            <!-- Hamburger -->
            <div 
                class="nav-toggle" 
                id="navToggle" 
                aria-label="Toggle navigation menu" 
                tabindex="0" 
                role="button" 
                aria-expanded="false"
            >
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>
    </nav>