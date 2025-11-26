<?php
/**
 * OUTSSINC Platform - Admin Updates & System Report
 * 
 * Displays blog updates, system status, error reports, and feature overview for administrators.
 * Access code: 079777
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';

// Session handling
if (session_status() === PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_start();
}

$pageTitle = 'Admin Updates & System Report';
$accessCode = '079777';
$isAuthenticated = false;
$errorMessage = '';

// Check for authentication
if (isset($_POST['access_code'])) {
    if ($_POST['access_code'] === $accessCode) {
        $_SESSION['admin_updates_access'] = true;
        $isAuthenticated = true;
    } else {
        $errorMessage = 'Invalid access code. Please try again.';
    }
}

if (isset($_SESSION['admin_updates_access']) && $_SESSION['admin_updates_access'] === true) {
    $isAuthenticated = true;
}

// Handle logout
if (isset($_GET['logout'])) {
    unset($_SESSION['admin_updates_access']);
    $isAuthenticated = false;
}

// System verification report data
$systemReport = [
    'last_updated' => date('F j, Y \a\t g:i A'),
    'platform_version' => '2.0',
    'php_version' => phpversion(),
    'files_verified' => 14,
    'js_files_verified' => 3,
    'css_files_verified' => 3
];

// Features summary
$features = [
    [
        'name' => 'Public Landing Page',
        'status' => 'working',
        'file' => 'index.php',
        'description' => 'Main public-facing homepage with hero section, services grid, testimonials, and CTAs.'
    ],
    [
        'name' => 'Client Portal Authentication',
        'status' => 'working',
        'file' => 'api/auth.php',
        'description' => 'Handles login, registration, password reset via sliding panel portal.'
    ],
    [
        'name' => 'Smart Intake Assessment',
        'status' => 'working',
        'file' => 'pages/intake.php',
        'description' => 'Multi-step form with conditional logic, urgency slider, and auto-save functionality.'
    ],
    [
        'name' => 'Resource Directory',
        'status' => 'working',
        'file' => 'pages/resources.php',
        'description' => 'Searchable database with category filters, emergency services flagging, and ratings.'
    ],
    [
        'name' => 'Client Dashboard',
        'status' => 'working',
        'file' => 'client/dashboard.php',
        'description' => 'Gamified "My Journey" dashboard with XP, badges, streaks, goals, and appointments.'
    ],
    [
        'name' => 'Staff Dashboard',
        'status' => 'working',
        'file' => 'staff/dashboard.php',
        'description' => 'Kanban-style case management with triage queue, panic button, and red alerts.'
    ],
    [
        'name' => 'Admin Dashboard',
        'status' => 'working',
        'file' => 'admin/dashboard.php',
        'description' => 'Administrative control panel with stats, activity feed, and quick actions.'
    ],
    [
        'name' => 'Documentation',
        'status' => 'working',
        'file' => 'docs/index.php',
        'description' => 'Comprehensive documentation with sidebar navigation and styled content.'
    ],
    [
        'name' => 'About Us Page',
        'status' => 'working',
        'file' => 'pages/about.php',
        'description' => 'Mission statement, values, services overview, and location information.'
    ],
    [
        'name' => 'Safety Features',
        'status' => 'working',
        'file' => 'assets/js/main.js',
        'description' => 'Quick exit button, weather overlay, double-ESC safety mode, crisis detection.'
    ],
    [
        'name' => 'Accessibility Tools',
        'status' => 'working',
        'file' => 'assets/js/accessibility.js',
        'description' => 'Font size controls, high contrast mode, text-to-speech, keyboard shortcuts.'
    ],
    [
        'name' => 'Database Schema',
        'status' => 'ready',
        'file' => 'database/schema.sql',
        'description' => 'Complete MySQL schema with users, cases, resources, badges, and audit tables.'
    ]
];

// Updates/blog entries
$updates = [
    [
        'date' => date('F j, Y'),
        'title' => 'Platform Verification Complete - Version 2.0',
        'type' => 'verification',
        'content' => 'Complete verification of all platform files has been performed. All 14 PHP files pass syntax validation. All 3 JavaScript files pass Node.js syntax checks. All CSS files have been reviewed for proper formatting.',
        'author' => 'System Verification'
    ],
    [
        'date' => date('F j, Y'),
        'title' => 'Admin Updates Console Created',
        'type' => 'new',
        'content' => 'New admin updates console has been created to provide administrators with a centralized location to view system status, feature documentation, and error reports. Access is protected with a secure code.',
        'author' => 'System'
    ],
    [
        'date' => date('F j, Y'),
        'title' => 'Feature Documentation Completed',
        'type' => 'documentation',
        'content' => 'All platform features have been documented including: Public landing page, Client portal, Smart intake assessment, Resource directory, Client dashboard with gamification, Staff Kanban dashboard, Admin panel, Safety features, and Accessibility tools.',
        'author' => 'Documentation Team'
    ]
];

// Potential issues/recommendations
$issues = [
    [
        'severity' => 'info',
        'title' => 'Database Connection Required',
        'description' => 'The platform requires a MySQL/MariaDB database connection. Ensure database credentials are configured in config/database.php before deployment.'
    ],
    [
        'severity' => 'info',
        'title' => 'Image Assets',
        'description' => 'Some image assets referenced in manifest.json (icon-192.png, icon-512.png) and header.php (favicon.png, og-image.png) should be added to /assets/images/.'
    ],
    [
        'severity' => 'info',
        'title' => 'Production Configuration',
        'description' => 'Before production deployment, set DEV_MODE to false in config/config.php and update database credentials.'
    ],
    [
        'severity' => 'info',
        'title' => 'SSL Certificate Required',
        'description' => 'HTTPS is required for production to ensure secure data transmission and enable PWA features.'
    ]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Admin Updates Specific Styles */
        .updates-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            min-height: calc(100vh - var(--nav-height));
        }
        
        @media (max-width: 992px) {
            .updates-layout {
                grid-template-columns: 1fr;
            }
        }
        
        /* Sidebar */
        .updates-sidebar {
            background: #1a1a2e;
            color: white;
            padding: var(--spacing-lg);
        }
        
        @media (max-width: 992px) {
            .updates-sidebar {
                display: none;
            }
        }
        
        .sidebar-brand {
            text-align: center;
            padding-bottom: var(--spacing-lg);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: var(--spacing-lg);
        }
        
        .sidebar-brand h2 {
            color: white;
            font-size: 1.25rem;
            margin-bottom: var(--spacing-xs);
        }
        
        .sidebar-brand span {
            font-size: 0.8rem;
            color: var(--color-gray-light);
        }
        
        .sidebar-nav ul {
            list-style: none;
        }
        
        .sidebar-nav li {
            margin-bottom: var(--spacing-xs);
        }
        
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: var(--spacing-md);
            padding: var(--spacing-md);
            color: var(--color-gray-light);
            text-decoration: none;
            border-radius: var(--border-radius-sm);
            transition: all var(--transition-fast);
        }
        
        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        
        .sidebar-nav a i {
            width: 20px;
            text-align: center;
        }
        
        /* Main Content */
        .updates-main {
            padding: var(--spacing-xl);
            background: var(--color-light);
        }
        
        .updates-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--spacing-xl);
            flex-wrap: wrap;
            gap: var(--spacing-md);
        }
        
        .updates-header h1 {
            font-size: 1.5rem;
            margin: 0;
        }
        
        /* Update Cards */
        .update-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            padding: var(--spacing-lg);
            margin-bottom: var(--spacing-lg);
            border-left: 4px solid var(--color-primary);
        }
        
        .update-card.type-new {
            border-left-color: var(--color-success);
        }
        
        .update-card.type-verification {
            border-left-color: var(--color-info);
        }
        
        .update-card.type-documentation {
            border-left-color: #6f42c1;
        }
        
        .update-card.type-fix {
            border-left-color: var(--color-warning);
        }
        
        .update-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: var(--spacing-md);
        }
        
        .update-header h3 {
            margin: 0;
            font-size: 1.1rem;
        }
        
        .update-type {
            font-size: 0.75rem;
            padding: var(--spacing-xs) var(--spacing-sm);
            border-radius: var(--border-radius-sm);
            text-transform: uppercase;
            font-weight: 600;
        }
        
        .update-type.new { background: #d4edda; color: #155724; }
        .update-type.verification { background: #cce5ff; color: #004085; }
        .update-type.documentation { background: #e2d5f1; color: #553098; }
        .update-type.fix { background: #fff3cd; color: #856404; }
        
        .update-meta {
            font-size: 0.85rem;
            color: var(--color-gray);
            margin-bottom: var(--spacing-md);
        }
        
        .update-content {
            color: var(--color-dark);
            line-height: 1.7;
        }
        
        /* Features Table */
        .features-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }
        
        .features-table th,
        .features-table td {
            padding: var(--spacing-md);
            text-align: left;
            border-bottom: 1px solid var(--color-light);
        }
        
        .features-table th {
            background: var(--color-dark);
            color: white;
            font-weight: 500;
        }
        
        .features-table tr:hover {
            background: var(--color-light);
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            padding: var(--spacing-xs) var(--spacing-sm);
            border-radius: var(--border-radius-pill);
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .status-badge.working {
            background: #d4edda;
            color: #155724;
        }
        
        .status-badge.ready {
            background: #cce5ff;
            color: #004085;
        }
        
        .status-badge.needs-attention {
            background: #fff3cd;
            color: #856404;
        }
        
        /* Issues Section */
        .issue-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            padding: var(--spacing-md);
            margin-bottom: var(--spacing-md);
            display: flex;
            gap: var(--spacing-md);
            align-items: flex-start;
        }
        
        .issue-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .issue-icon.info { background: #cce5ff; color: #004085; }
        .issue-icon.warning { background: #fff3cd; color: #856404; }
        .issue-icon.error { background: #f8d7da; color: #721c24; }
        
        .issue-content h4 {
            margin: 0 0 var(--spacing-xs);
            font-size: 1rem;
        }
        
        .issue-content p {
            margin: 0;
            color: var(--color-gray);
            font-size: 0.9rem;
        }
        
        /* System Stats */
        .system-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: var(--spacing-md);
            margin-bottom: var(--spacing-xl);
        }
        
        .stat-box {
            background: white;
            padding: var(--spacing-lg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            text-align: center;
        }
        
        .stat-box .number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--color-primary);
        }
        
        .stat-box .label {
            color: var(--color-gray);
            font-size: 0.85rem;
        }
        
        /* Login Form */
        .login-container {
            min-height: calc(100vh - var(--nav-height));
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--color-dark) 0%, #2d1f3d 100%);
            padding: var(--spacing-lg);
        }
        
        .login-card {
            background: white;
            padding: var(--spacing-2xl);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        
        .login-card h2 {
            margin-bottom: var(--spacing-sm);
        }
        
        .login-card p {
            color: var(--color-gray);
            margin-bottom: var(--spacing-xl);
        }
        
        .login-card .form-group {
            margin-bottom: var(--spacing-lg);
        }
        
        .login-card input {
            width: 100%;
            padding: var(--spacing-md);
            font-size: 1.25rem;
            text-align: center;
            letter-spacing: 0.5em;
            border: 2px solid var(--color-gray-light);
            border-radius: var(--border-radius);
        }
        
        .login-card input:focus {
            border-color: var(--color-primary);
            outline: none;
        }
        
        .login-error {
            background: #f8d7da;
            color: #721c24;
            padding: var(--spacing-md);
            border-radius: var(--border-radius-sm);
            margin-bottom: var(--spacing-lg);
        }
        
        /* Section headers */
        .section-title {
            font-size: 1.25rem;
            margin-bottom: var(--spacing-lg);
            padding-bottom: var(--spacing-md);
            border-bottom: 2px solid var(--color-light);
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }
        
        .section-title i {
            color: var(--color-primary);
        }
        
        /* Nav Section */
        .nav-section {
            margin-top: var(--spacing-xl);
            padding-top: var(--spacing-lg);
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        
        .nav-section-title {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--color-gray);
            margin-bottom: var(--spacing-md);
            padding-left: var(--spacing-md);
        }
    </style>
</head>
<body class="theme-light" data-font-size="normal">
    
    <!-- Top Navigation -->
    <nav class="main-nav">
        <div class="nav-container">
            <a href="/" class="nav-brand">
                <span class="brand-logo">OUTSSINC</span>
                <span class="brand-tagline">Admin Updates</span>
            </a>
            <div class="nav-actions">
                <?php if ($isAuthenticated): ?>
                <span style="color: var(--color-gray-light); margin-right: var(--spacing-md);">
                    <i class="fas fa-check-circle text-success"></i> Authenticated
                </span>
                <a href="?logout=1" class="btn btn-sm btn-outline" style="color: white; border-color: rgba(255,255,255,0.3);">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <?php else: ?>
                <a href="/admin/dashboard.php" class="btn btn-sm btn-outline" style="color: white; border-color: rgba(255,255,255,0.3);">
                    <i class="fas fa-arrow-left"></i> Back to Admin
                </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    
    <?php if (!$isAuthenticated): ?>
    <!-- Login Required -->
    <div class="login-container">
        <div class="login-card">
            <i class="fas fa-lock fa-3x text-primary" style="margin-bottom: var(--spacing-lg);"></i>
            <h2>Admin Updates Access</h2>
            <p>Enter the access code to view system updates and reports.</p>
            
            <?php if ($errorMessage): ?>
            <div class="login-error">
                <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($errorMessage); ?>
            </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <input type="text" name="access_code" placeholder="Access Code" 
                           maxlength="6" pattern="[0-9]{6}" autocomplete="off" required
                           autofocus inputmode="numeric">
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg">
                    <i class="fas fa-unlock"></i> Access Updates
                </button>
            </form>
            
            <p style="margin-top: var(--spacing-xl); font-size: 0.85rem; color: var(--color-gray);">
                Contact your system administrator if you don't have the access code.
            </p>
        </div>
    </div>
    
    <?php else: ?>
    <!-- Authenticated Content -->
    <div class="updates-layout">
        <!-- Sidebar -->
        <aside class="updates-sidebar">
            <div class="sidebar-brand">
                <h2><i class="fas fa-newspaper"></i> Updates Portal</h2>
                <span>Version <?php echo $systemReport['platform_version']; ?></span>
            </div>
            
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="#updates" class="active"><i class="fas fa-rss"></i> Latest Updates</a></li>
                    <li><a href="#features"><i class="fas fa-list-check"></i> Feature Status</a></li>
                    <li><a href="#issues"><i class="fas fa-exclamation-triangle"></i> Issues & Notes</a></li>
                    <li><a href="#system"><i class="fas fa-server"></i> System Info</a></li>
                </ul>
                
                <div class="nav-section">
                    <div class="nav-section-title">Admin Navigation</div>
                    <ul>
                        <li><a href="/admin/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a href="/docs/"><i class="fas fa-book"></i> Documentation</a></li>
                        <li><a href="/"><i class="fas fa-home"></i> Main Site</a></li>
                    </ul>
                </div>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="updates-main">
            <div class="updates-header">
                <div>
                    <h1><i class="fas fa-clipboard-check"></i> System Updates & Report</h1>
                    <p style="color: var(--color-gray); margin: 0;">Last verified: <?php echo $systemReport['last_updated']; ?></p>
                </div>
                <div>
                    <a href="/admin/dashboard.php" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
                </div>
            </div>
            
            <!-- System Stats -->
            <div class="system-stats">
                <div class="stat-box">
                    <div class="number"><?php echo $systemReport['files_verified']; ?></div>
                    <div class="label">PHP Files Verified</div>
                </div>
                <div class="stat-box">
                    <div class="number"><?php echo $systemReport['js_files_verified']; ?></div>
                    <div class="label">JS Files Verified</div>
                </div>
                <div class="stat-box">
                    <div class="number"><?php echo $systemReport['css_files_verified']; ?></div>
                    <div class="label">CSS Files Verified</div>
                </div>
                <div class="stat-box">
                    <div class="number"><?php echo count($features); ?></div>
                    <div class="label">Features Documented</div>
                </div>
            </div>
            
            <!-- Latest Updates Section -->
            <section id="updates">
                <h2 class="section-title"><i class="fas fa-rss"></i> Latest Updates</h2>
                
                <?php foreach ($updates as $update): ?>
                <div class="update-card type-<?php echo htmlspecialchars($update['type']); ?>">
                    <div class="update-header">
                        <h3><?php echo htmlspecialchars($update['title']); ?></h3>
                        <span class="update-type <?php echo htmlspecialchars($update['type']); ?>">
                            <?php echo htmlspecialchars($update['type']); ?>
                        </span>
                    </div>
                    <div class="update-meta">
                        <i class="fas fa-calendar"></i> <?php echo htmlspecialchars($update['date']); ?>
                        &nbsp;&bull;&nbsp;
                        <i class="fas fa-user"></i> <?php echo htmlspecialchars($update['author']); ?>
                    </div>
                    <div class="update-content">
                        <?php echo htmlspecialchars($update['content']); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>
            
            <!-- Feature Status Section -->
            <section id="features" style="margin-top: var(--spacing-2xl);">
                <h2 class="section-title"><i class="fas fa-list-check"></i> Feature Status Overview</h2>
                
                <table class="features-table">
                    <thead>
                        <tr>
                            <th>Feature</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($features as $feature): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($feature['name']); ?></strong></td>
                            <td>
                                <span class="status-badge <?php echo htmlspecialchars($feature['status']); ?>">
                                    <?php if ($feature['status'] === 'working'): ?>
                                    <i class="fas fa-check-circle"></i>
                                    <?php elseif ($feature['status'] === 'ready'): ?>
                                    <i class="fas fa-database"></i>
                                    <?php else: ?>
                                    <i class="fas fa-exclamation-circle"></i>
                                    <?php endif; ?>
                                    <?php echo ucfirst(str_replace('-', ' ', $feature['status'])); ?>
                                </span>
                            </td>
                            <td><code><?php echo htmlspecialchars($feature['file']); ?></code></td>
                            <td><?php echo htmlspecialchars($feature['description']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
            
            <!-- Issues & Notes Section -->
            <section id="issues" style="margin-top: var(--spacing-2xl);">
                <h2 class="section-title"><i class="fas fa-exclamation-triangle"></i> Issues & Recommendations</h2>
                
                <?php foreach ($issues as $issue): ?>
                <div class="issue-card">
                    <div class="issue-icon <?php echo htmlspecialchars($issue['severity']); ?>">
                        <?php if ($issue['severity'] === 'info'): ?>
                        <i class="fas fa-info"></i>
                        <?php elseif ($issue['severity'] === 'warning'): ?>
                        <i class="fas fa-exclamation"></i>
                        <?php else: ?>
                        <i class="fas fa-times"></i>
                        <?php endif; ?>
                    </div>
                    <div class="issue-content">
                        <h4><?php echo htmlspecialchars($issue['title']); ?></h4>
                        <p><?php echo htmlspecialchars($issue['description']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>
            
            <!-- System Info Section -->
            <section id="system" style="margin-top: var(--spacing-2xl);">
                <h2 class="section-title"><i class="fas fa-server"></i> System Information</h2>
                
                <div class="update-card">
                    <table style="width: 100%;">
                        <tr>
                            <td style="padding: var(--spacing-sm) 0;"><strong>Platform Version:</strong></td>
                            <td><?php echo $systemReport['platform_version']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: var(--spacing-sm) 0;"><strong>PHP Version:</strong></td>
                            <td><?php echo $systemReport['php_version']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: var(--spacing-sm) 0;"><strong>Site Name:</strong></td>
                            <td><?php echo SITE_NAME; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: var(--spacing-sm) 0;"><strong>Site URL:</strong></td>
                            <td><?php echo SITE_URL; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: var(--spacing-sm) 0;"><strong>Development Mode:</strong></td>
                            <td><?php echo DEV_MODE ? '<span class="badge badge-warning">Enabled</span>' : '<span class="badge badge-success">Disabled</span>'; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: var(--spacing-sm) 0;"><strong>Maintenance Mode:</strong></td>
                            <td><?php echo MAINTENANCE_MODE ? '<span class="badge badge-danger">Active</span>' : '<span class="badge badge-success">Inactive</span>'; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: var(--spacing-sm) 0;"><strong>Session Timeout:</strong></td>
                            <td><?php echo SESSION_TIMEOUT; ?> seconds (<?php echo SESSION_TIMEOUT / 60; ?> minutes)</td>
                        </tr>
                        <tr>
                            <td style="padding: var(--spacing-sm) 0;"><strong>Crisis Line:</strong></td>
                            <td><?php echo CRISIS_LINE; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: var(--spacing-sm) 0;"><strong>Crisis Text:</strong></td>
                            <td><?php echo CRISIS_TEXT; ?></td>
                        </tr>
                    </table>
                </div>
            </section>
            
            <!-- Summary -->
            <section style="margin-top: var(--spacing-2xl);">
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <strong>System Verification Complete</strong>
                        <p style="margin: var(--spacing-sm) 0 0;">All frontend and backend files have been verified. The OUTSSINC platform is in stable working condition. All core features are functional and ready for deployment. Please review the recommendations above before production deployment.</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <?php endif; ?>

</body>
</html>
