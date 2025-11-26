<?php
/**
 * OUTSSINC Platform - Client Dashboard
 * 
 * "My Journey" - Client portal dashboard with gamification.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';

// Demo user data (in production, this would come from session/database)
$user = [
    'first_name' => 'Alex',
    'last_name' => 'Demo',
    'avatar' => null,
    'level' => 3,
    'xp' => 275,
    'xp_next_level' => 400,
    'streak_days' => 7,
    'badges' => [
        ['name' => 'Welcome', 'icon' => 'fa-door-open', 'earned_at' => '2025-11-01'],
        ['name' => 'First Steps', 'icon' => 'fa-shoe-prints', 'earned_at' => '2025-11-02'],
        ['name' => 'Week Warrior', 'icon' => 'fa-fire', 'earned_at' => '2025-11-08'],
    ]
];

$pageTitle = 'My Journey | Client Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/accessibility.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Dashboard Layout */
        .dashboard-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            min-height: calc(100vh - var(--nav-height) - var(--marquee-height));
        }
        
        @media (max-width: 992px) {
            .dashboard-layout {
                grid-template-columns: 1fr;
            }
        }
        
        /* Sidebar */
        .dashboard-sidebar {
            background: var(--color-dark);
            color: white;
            padding: var(--spacing-lg);
            display: flex;
            flex-direction: column;
        }
        
        @media (max-width: 992px) {
            .dashboard-sidebar {
                display: none;
            }
        }
        
        .user-profile {
            text-align: center;
            padding-bottom: var(--spacing-lg);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: var(--spacing-lg);
        }
        
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--spacing-md);
            font-size: 2.5rem;
            color: white;
            border: 4px solid rgba(255,255,255,0.2);
        }
        
        .user-name {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: var(--spacing-xs);
        }
        
        .user-level {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-xs);
            background: rgba(255,255,255,0.1);
            padding: var(--spacing-xs) var(--spacing-md);
            border-radius: var(--border-radius-pill);
            font-size: 0.85rem;
        }
        
        .user-level i {
            color: var(--color-warning);
        }
        
        /* XP Progress */
        .xp-progress {
            margin-top: var(--spacing-md);
        }
        
        .xp-bar {
            height: 8px;
            background: rgba(255,255,255,0.1);
            border-radius: var(--border-radius-pill);
            overflow: hidden;
        }
        
        .xp-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--color-warning), #ffce00);
            border-radius: var(--border-radius-pill);
            transition: width 0.5s ease;
        }
        
        .xp-text {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
            color: var(--color-gray-light);
            margin-top: var(--spacing-xs);
        }
        
        /* Streak Badge */
        .streak-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-sm);
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            padding: var(--spacing-sm) var(--spacing-md);
            border-radius: var(--border-radius);
            margin-top: var(--spacing-md);
        }
        
        .streak-badge i {
            font-size: 1.5rem;
            animation: flicker 1s ease-in-out infinite;
        }
        
        @keyframes flicker {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .streak-count {
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .streak-label {
            font-size: 0.75rem;
            opacity: 0.9;
        }
        
        /* Sidebar Navigation */
        .sidebar-nav {
            flex: 1;
            margin-top: var(--spacing-lg);
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
        
        .sidebar-nav .badge {
            margin-left: auto;
            background: var(--color-primary);
            color: white;
            padding: 2px 8px;
            border-radius: var(--border-radius-pill);
            font-size: 0.7rem;
        }
        
        /* Main Content */
        .dashboard-main {
            padding: var(--spacing-xl);
            background: var(--color-light);
        }
        
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--spacing-xl);
        }
        
        .dashboard-header h1 {
            font-size: 1.75rem;
            margin: 0;
        }
        
        .greeting-time {
            color: var(--color-gray);
            font-size: 0.9rem;
        }
        
        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--spacing-lg);
            margin-bottom: var(--spacing-xl);
        }
        
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .stat-card {
            background: white;
            padding: var(--spacing-lg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: var(--spacing-lg);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
        }
        
        .stat-icon.primary { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); }
        .stat-icon.success { background: linear-gradient(135deg, var(--color-success) 0%, #1e7b34 100%); }
        .stat-icon.info { background: linear-gradient(135deg, var(--color-info) 0%, #117a8b 100%); }
        .stat-icon.warning { background: linear-gradient(135deg, var(--color-warning) 0%, #d39e00 100%); }
        
        .stat-info h4 {
            font-size: 0.85rem;
            color: var(--color-gray);
            font-weight: 500;
            margin: 0 0 var(--spacing-xs);
        }
        
        .stat-info .value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-dark);
        }
        
        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: var(--spacing-lg);
        }
        
        @media (max-width: 992px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }
        
        /* Cards */
        .dashboard-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            padding: var(--spacing-lg);
            margin-bottom: var(--spacing-lg);
        }
        
        .dashboard-card h3 {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            font-size: 1.1rem;
            margin-bottom: var(--spacing-lg);
            padding-bottom: var(--spacing-md);
            border-bottom: 1px solid var(--color-light);
        }
        
        .dashboard-card h3 i {
            color: var(--color-primary);
        }
        
        /* Goals List */
        .goals-list {
            list-style: none;
        }
        
        .goal-item {
            display: flex;
            align-items: flex-start;
            gap: var(--spacing-md);
            padding: var(--spacing-md);
            background: var(--color-light);
            border-radius: var(--border-radius-sm);
            margin-bottom: var(--spacing-sm);
        }
        
        .goal-checkbox {
            width: 24px;
            height: 24px;
            border: 2px solid var(--color-gray-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all var(--transition-fast);
            flex-shrink: 0;
        }
        
        .goal-item.completed .goal-checkbox {
            background: var(--color-success);
            border-color: var(--color-success);
            color: white;
        }
        
        .goal-content h4 {
            font-size: 1rem;
            margin: 0 0 var(--spacing-xs);
        }
        
        .goal-item.completed .goal-content h4 {
            text-decoration: line-through;
            color: var(--color-gray);
        }
        
        .goal-meta {
            font-size: 0.8rem;
            color: var(--color-gray);
        }
        
        /* Appointments List */
        .appointment-item {
            display: flex;
            gap: var(--spacing-md);
            padding: var(--spacing-md);
            background: var(--color-light);
            border-radius: var(--border-radius-sm);
            margin-bottom: var(--spacing-sm);
        }
        
        .appointment-date {
            text-align: center;
            padding: var(--spacing-sm) var(--spacing-md);
            background: white;
            border-radius: var(--border-radius-sm);
            border-left: 3px solid var(--color-primary);
        }
        
        .appointment-date .day {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
        }
        
        .appointment-date .month {
            font-size: 0.75rem;
            color: var(--color-gray);
            text-transform: uppercase;
        }
        
        .appointment-info h4 {
            font-size: 0.95rem;
            margin: 0 0 var(--spacing-xs);
        }
        
        .appointment-info p {
            margin: 0;
            font-size: 0.85rem;
            color: var(--color-gray);
        }
        
        /* Badges Display */
        .badges-grid {
            display: flex;
            flex-wrap: wrap;
            gap: var(--spacing-md);
        }
        
        .badge-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: var(--spacing-md);
            background: var(--color-light);
            border-radius: var(--border-radius);
            min-width: 80px;
            text-align: center;
        }
        
        .badge-item i {
            font-size: 1.5rem;
            color: var(--color-primary);
            margin-bottom: var(--spacing-xs);
        }
        
        .badge-item span {
            font-size: 0.75rem;
            color: var(--color-gray);
        }
        
        /* Resources Saved */
        .resource-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--spacing-md);
            background: var(--color-light);
            border-radius: var(--border-radius-sm);
            margin-bottom: var(--spacing-sm);
        }
        
        .resource-item h4 {
            font-size: 0.95rem;
            margin: 0;
        }
        
        .resource-item p {
            font-size: 0.8rem;
            color: var(--color-gray);
            margin: 0;
        }
        
        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--spacing-sm);
        }
        
        .quick-action {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: var(--spacing-lg);
            background: var(--color-light);
            border-radius: var(--border-radius);
            text-decoration: none;
            color: var(--color-dark);
            transition: all var(--transition-fast);
            text-align: center;
        }
        
        .quick-action:hover {
            background: white;
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }
        
        .quick-action i {
            font-size: 1.5rem;
            color: var(--color-primary);
            margin-bottom: var(--spacing-sm);
        }
        
        .quick-action span {
            font-size: 0.85rem;
            font-weight: 500;
        }
    </style>
</head>
<body class="theme-light" data-font-size="normal">
    
    <!-- Quick Exit Button -->
    <button id="quick-exit" class="quick-exit-btn" title="Quick Exit" aria-label="Quick Exit">
        <i class="fas fa-running"></i>
    </button>
    
    <!-- Safety Overlay -->
    <div id="safety-overlay" class="safety-overlay hidden">
        <div class="weather-app">
            <div class="weather-header">
                <h2><i class="fas fa-cloud-sun"></i> Weather Today</h2>
                <span class="weather-location">Cobourg, ON</span>
            </div>
            <div class="weather-content">
                <div class="weather-temp">-2°C</div>
                <div class="weather-desc">Partly Cloudy</div>
            </div>
            <p class="weather-exit-hint">Press ESC twice to return</p>
        </div>
    </div>
    
    <!-- Top Navigation -->
    <nav class="main-nav">
        <div class="nav-container">
            <a href="/" class="nav-brand">
                <span class="brand-logo">OUTSSINC</span>
            </a>
            <div class="nav-actions">
                <div class="accessibility-tools">
                    <button class="access-btn" id="font-decrease" title="Decrease Font Size">
                        <i class="fas fa-font"></i><i class="fas fa-minus"></i>
                    </button>
                    <button class="access-btn" id="font-increase" title="Increase Font Size">
                        <i class="fas fa-font"></i><i class="fas fa-plus"></i>
                    </button>
                    <button class="access-btn" id="contrast-toggle" title="Toggle High Contrast">
                        <i class="fas fa-adjust"></i>
                    </button>
                </div>
                <button class="btn btn-sm btn-outline" style="color: white; border-color: rgba(255,255,255,0.3);">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </div>
        </div>
    </nav>
    
    <!-- Dashboard Layout -->
    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="dashboard-sidebar">
            <div class="user-profile">
                <div class="avatar">
                    <?php echo strtoupper(substr($user['first_name'], 0, 1)); ?>
                </div>
                <div class="user-name"><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></div>
                <span class="user-level">
                    <i class="fas fa-star"></i> Level <?php echo $user['level']; ?> Advocate
                </span>
                
                <div class="xp-progress">
                    <div class="xp-bar">
                        <div class="xp-fill" style="width: <?php echo ($user['xp'] / $user['xp_next_level']) * 100; ?>%;"></div>
                    </div>
                    <div class="xp-text">
                        <span><?php echo $user['xp']; ?> XP</span>
                        <span><?php echo $user['xp_next_level']; ?> XP</span>
                    </div>
                </div>
                
                <?php if ($user['streak_days'] > 0): ?>
                <div class="streak-badge">
                    <i class="fas fa-fire"></i>
                    <div>
                        <div class="streak-count"><?php echo $user['streak_days']; ?></div>
                        <div class="streak-label">Day Streak!</div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="/client/dashboard.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="/client/goals.php"><i class="fas fa-bullseye"></i> My Goals</a></li>
                    <li><a href="/client/appointments.php"><i class="fas fa-calendar-alt"></i> Appointments</a></li>
                    <li><a href="/client/messages.php"><i class="fas fa-envelope"></i> Messages <span class="badge">2</span></a></li>
                    <li><a href="/client/resources.php"><i class="fas fa-bookmark"></i> Saved Resources</a></li>
                    <li><a href="/client/badges.php"><i class="fas fa-award"></i> My Badges</a></li>
                    <li><a href="/client/documents.php"><i class="fas fa-folder"></i> Documents</a></li>
                    <li><a href="/client/settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </nav>
            
            <div style="margin-top: auto; padding-top: var(--spacing-lg); border-top: 1px solid rgba(255,255,255,0.1);">
                <a href="/pages/crisis.php" class="btn btn-primary btn-block">
                    <i class="fas fa-phone-alt"></i> Crisis Support
                </a>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="dashboard-main">
            <div class="dashboard-header">
                <div>
                    <h1>Welcome back, <?php echo htmlspecialchars($user['first_name']); ?>!</h1>
                    <p class="greeting-time"><?php echo date('l, F j, Y'); ?></p>
                </div>
            </div>
            
            <!-- Stats -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon primary"><i class="fas fa-bullseye"></i></div>
                    <div class="stat-info">
                        <h4>Active Goals</h4>
                        <div class="value">3</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon success"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-info">
                        <h4>Goals Completed</h4>
                        <div class="value">7</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon info"><i class="fas fa-calendar"></i></div>
                    <div class="stat-info">
                        <h4>Upcoming Appointments</h4>
                        <div class="value">2</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon warning"><i class="fas fa-award"></i></div>
                    <div class="stat-info">
                        <h4>Badges Earned</h4>
                        <div class="value"><?php echo count($user['badges']); ?></div>
                    </div>
                </div>
            </div>
            
            <!-- Content Grid -->
            <div class="content-grid">
                <div class="main-column">
                    <!-- Current Goals -->
                    <div class="dashboard-card">
                        <h3><i class="fas fa-bullseye"></i> My Current Goals</h3>
                        <ul class="goals-list">
                            <li class="goal-item">
                                <div class="goal-checkbox"><i class="fas fa-check" style="display:none;"></i></div>
                                <div class="goal-content">
                                    <h4>Complete housing application</h4>
                                    <p class="goal-meta">Due: Dec 1, 2025 • Housing Support</p>
                                </div>
                            </li>
                            <li class="goal-item">
                                <div class="goal-checkbox"><i class="fas fa-check" style="display:none;"></i></div>
                                <div class="goal-content">
                                    <h4>Attend peer support group</h4>
                                    <p class="goal-meta">Due: Nov 30, 2025 • Wellness</p>
                                </div>
                            </li>
                            <li class="goal-item completed">
                                <div class="goal-checkbox"><i class="fas fa-check"></i></div>
                                <div class="goal-content">
                                    <h4>Get Ontario ID replacement</h4>
                                    <p class="goal-meta">Completed: Nov 20, 2025 • Documents</p>
                                </div>
                            </li>
                        </ul>
                        <a href="/client/goals.php" class="btn btn-sm btn-outline">View All Goals</a>
                    </div>
                    
                    <!-- Upcoming Appointments -->
                    <div class="dashboard-card">
                        <h3><i class="fas fa-calendar-alt"></i> Upcoming Appointments</h3>
                        <div class="appointment-item">
                            <div class="appointment-date">
                                <div class="day">28</div>
                                <div class="month">Nov</div>
                            </div>
                            <div class="appointment-info">
                                <h4>Check-in with Sarah (Peer Support)</h4>
                                <p><i class="fas fa-clock"></i> 2:00 PM - 3:00 PM</p>
                                <p><i class="fas fa-video"></i> Virtual Meeting</p>
                            </div>
                        </div>
                        <div class="appointment-item">
                            <div class="appointment-date">
                                <div class="day">5</div>
                                <div class="month">Dec</div>
                            </div>
                            <div class="appointment-info">
                                <h4>Housing Application Review</h4>
                                <p><i class="fas fa-clock"></i> 10:00 AM - 11:00 AM</p>
                                <p><i class="fas fa-map-marker-alt"></i> Community Centre, Cobourg</p>
                            </div>
                        </div>
                        <a href="/client/appointments.php" class="btn btn-sm btn-outline">View All Appointments</a>
                    </div>
                </div>
                
                <div class="side-column">
                    <!-- Quick Actions -->
                    <div class="dashboard-card">
                        <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
                        <div class="quick-actions">
                            <a href="/pages/intake.php" class="quick-action">
                                <i class="fas fa-clipboard-list"></i>
                                <span>New Assessment</span>
                            </a>
                            <a href="/client/messages.php" class="quick-action">
                                <i class="fas fa-envelope"></i>
                                <span>Send Message</span>
                            </a>
                            <a href="/pages/resources.php" class="quick-action">
                                <i class="fas fa-search"></i>
                                <span>Find Resources</span>
                            </a>
                            <a href="/client/appointments.php" class="quick-action">
                                <i class="fas fa-calendar-plus"></i>
                                <span>Book Appointment</span>
                            </a>
                        </div>
                    </div>
                    
                    <!-- My Badges -->
                    <div class="dashboard-card">
                        <h3><i class="fas fa-award"></i> My Badges</h3>
                        <div class="badges-grid">
                            <?php foreach ($user['badges'] as $badge): ?>
                            <div class="badge-item">
                                <i class="fas <?php echo htmlspecialchars($badge['icon']); ?>"></i>
                                <span><?php echo htmlspecialchars($badge['name']); ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <a href="/client/badges.php" class="btn btn-sm btn-outline mt-2" style="margin-top: var(--spacing-md); display: block; text-align: center;">View All Badges</a>
                    </div>
                    
                    <!-- Saved Resources -->
                    <div class="dashboard-card">
                        <h3><i class="fas fa-bookmark"></i> Saved Resources</h3>
                        <div class="resource-item">
                            <div>
                                <h4>Cobourg Food Bank</h4>
                                <p>Food Security</p>
                            </div>
                            <i class="fas fa-external-link-alt text-primary"></i>
                        </div>
                        <div class="resource-item">
                            <div>
                                <h4>Ontario Works - Cobourg</h4>
                                <p>Financial Assistance</p>
                            </div>
                            <i class="fas fa-external-link-alt text-primary"></i>
                        </div>
                        <a href="/client/resources.php" class="btn btn-sm btn-outline mt-2" style="margin-top: var(--spacing-md); display: block; text-align: center;">View All</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Crisis Marquee -->
    <div class="crisis-marquee">
        <div class="marquee-content">
            <span class="marquee-item urgent">
                <i class="fas fa-phone-alt"></i> 24/7 Crisis Line: <?php echo CRISIS_LINE; ?> | Text: <?php echo CRISIS_TEXT; ?>
            </span>
            <span class="marquee-item">
                <i class="fas fa-heart"></i> You are not alone. We are here to help.
            </span>
            <span class="marquee-item urgent">
                <i class="fas fa-phone-alt"></i> 24/7 Crisis Line: <?php echo CRISIS_LINE; ?> | Text: <?php echo CRISIS_TEXT; ?>
            </span>
            <span class="marquee-item">
                <i class="fas fa-heart"></i> You are not alone. We are here to help.
            </span>
        </div>
    </div>
    
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/accessibility.js"></script>
</body>
</html>
