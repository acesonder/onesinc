<?php
/**
 * OUTSSINC Platform - Header Include
 * 
 * Contains the HTML head section and navigation.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

// Ensure config is loaded
if (!defined('OUTSSINC_LOADED')) {
    require_once dirname(__DIR__) . '/config/config.php';
}

// Get current page for navigation highlighting
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo SITE_FULL_NAME; ?> - Peer support organization helping people navigate life's obstacles in Cobourg, Ontario.">
    <meta name="keywords" content="outreach, peer support, mental health, housing, crisis support, Cobourg, Ontario">
    <meta name="author" content="OUTSSINC">
    
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' | ' . SITE_NAME : SITE_NAME . ' - ' . SITE_TAGLINE; ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/accessibility.css">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- PWA Support -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="<?php echo COLOR_PRIMARY; ?>">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo SITE_NAME; ?>">
    <meta property="og:description" content="<?php echo SITE_TAGLINE; ?>">
    <meta property="og:image" content="/assets/images/og-image.png">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    
    <style id="accessibility-styles"></style>
</head>
<body class="theme-light" data-font-size="normal">
    
    <!-- Safety Quick Exit Button -->
    <button id="quick-exit" class="quick-exit-btn" title="Quick Exit - Opens Weather Page" aria-label="Quick Exit">
        <i class="fas fa-running"></i>
    </button>
    
    <!-- Weather App Safety Overlay (Hidden by default) -->
    <div id="safety-overlay" class="safety-overlay hidden">
        <div class="weather-app">
            <div class="weather-header">
                <h2><i class="fas fa-cloud-sun"></i> Weather Today</h2>
                <span class="weather-location">Cobourg, ON</span>
            </div>
            <div class="weather-content">
                <div class="weather-temp">-2°C</div>
                <div class="weather-desc">Partly Cloudy</div>
                <div class="weather-details">
                    <span><i class="fas fa-wind"></i> 15 km/h</span>
                    <span><i class="fas fa-tint"></i> 45%</span>
                </div>
            </div>
            <p class="weather-exit-hint">Press ESC twice to return</p>
        </div>
    </div>
    
    <!-- Main Navigation (HUD Style) -->
    <nav class="main-nav" id="main-nav" role="navigation" aria-label="Main navigation">
        <div class="nav-container">
            <!-- Brand -->
            <a href="/" class="nav-brand">
                <span class="brand-logo">OUTSSINC</span>
                <span class="brand-tagline">Outreach Someone In Need of Change</span>
            </a>
            
            <!-- Mobile Menu Toggle -->
            <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
                <span class="hamburger"></span>
            </button>
            
            <!-- Navigation Links -->
            <div class="nav-menu" id="nav-menu">
                <ul class="nav-links">
                    <li class="nav-item <?php echo $currentPage === 'index' ? 'active' : ''; ?>">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                            About Us <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/pages/about.php">Our Mission</a></li>
                            <li><a href="/pages/team.php">Meet the Team</a></li>
                            <li><a href="/pages/stories.php">Success Stories</a></li>
                            <li><a href="/pages/history.php">Our History</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle highlight" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-hands-helping"></i> Find Help <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/pages/self-refer.php"><i class="fas fa-user-plus"></i> Self Refer</a></li>
                            <li><a href="/pages/resources.php"><i class="fas fa-map-marked-alt"></i> Local Resources</a></li>
                            <li><a href="/pages/crisis.php" class="urgent"><i class="fas fa-phone-alt"></i> Crisis Lines</a></li>
                            <li><a href="/pages/intake.php"><i class="fas fa-clipboard-list"></i> Smart Assessment</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                            Engagement <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/pages/donate.php"><i class="fas fa-heart"></i> Donate</a></li>
                            <li><a href="/pages/volunteer.php"><i class="fas fa-hand-holding-heart"></i> Volunteer</a></li>
                            <li><a href="/pages/events.php"><i class="fas fa-calendar-alt"></i> Events</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                            Forum <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/pages/chat.php"><i class="fas fa-comments"></i> Live Chat</a></li>
                            <li><a href="/pages/faq.php"><i class="fas fa-question-circle"></i> FAQ</a></li>
                            <li><a href="/pages/community.php"><i class="fas fa-users"></i> Community</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                            eLearning <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/pages/toolkits.php"><i class="fas fa-toolbox"></i> Toolkits</a></li>
                            <li><a href="/pages/courses.php"><i class="fas fa-graduation-cap"></i> Courses</a></li>
                            <li><a href="/pages/webinars.php"><i class="fas fa-video"></i> Webinars</a></li>
                        </ul>
                    </li>
                </ul>
                
                <!-- Portal & Accessibility -->
                <div class="nav-actions">
                    <!-- Accessibility Tools -->
                    <div class="accessibility-tools">
                        <button class="access-btn" id="font-decrease" title="Decrease Font Size" aria-label="Decrease font size">
                            <i class="fas fa-font"></i><i class="fas fa-minus"></i>
                        </button>
                        <button class="access-btn" id="font-increase" title="Increase Font Size" aria-label="Increase font size">
                            <i class="fas fa-font"></i><i class="fas fa-plus"></i>
                        </button>
                        <button class="access-btn" id="contrast-toggle" title="Toggle High Contrast" aria-label="Toggle high contrast">
                            <i class="fas fa-adjust"></i>
                        </button>
                        <button class="access-btn" id="tts-toggle" title="Text to Speech" aria-label="Toggle text to speech">
                            <i class="fas fa-volume-up"></i>
                        </button>
                    </div>
                    
                    <!-- Portal Button -->
                    <button class="btn btn-portal" id="portal-toggle" aria-label="Open client portal">
                        <i class="fas fa-user-circle"></i> Client Portal
                    </button>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content Wrapper -->
    <main id="main-content" role="main">
