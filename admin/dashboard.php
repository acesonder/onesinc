<?php
/**
 * OUTSSINC Platform - Admin Dashboard
 * 
 * Administrative control panel.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Admin Dashboard';

// Demo admin data
$admin = [
    'first_name' => 'System',
    'last_name' => 'Admin',
    'role' => 'Super Admin'
];

// Demo stats
$stats = [
    'total_users' => 156,
    'active_clients' => 89,
    'staff_members' => 12,
    'open_cases' => 34,
    'intakes_today' => 5,
    'resources' => 47
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> | <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Admin Layout */
        .admin-layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: calc(100vh - var(--nav-height));
        }
        
        @media (max-width: 992px) {
            .admin-layout {
                grid-template-columns: 1fr;
            }
        }
        
        /* Sidebar */
        .admin-sidebar {
            background: #1a1a2e;
            color: white;
            padding: var(--spacing-lg);
        }
        
        @media (max-width: 992px) {
            .admin-sidebar {
                display: none;
            }
        }
        
        .admin-brand {
            text-align: center;
            padding-bottom: var(--spacing-lg);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: var(--spacing-lg);
        }
        
        .admin-brand h2 {
            color: white;
            font-size: 1.25rem;
            margin-bottom: var(--spacing-xs);
        }
        
        .admin-brand span {
            font-size: 0.8rem;
            color: var(--color-gray-light);
        }
        
        .admin-nav ul {
            list-style: none;
        }
        
        .admin-nav li {
            margin-bottom: var(--spacing-xs);
        }
        
        .admin-nav a {
            display: flex;
            align-items: center;
            gap: var(--spacing-md);
            padding: var(--spacing-md);
            color: var(--color-gray-light);
            text-decoration: none;
            border-radius: var(--border-radius-sm);
            transition: all var(--transition-fast);
        }
        
        .admin-nav a:hover,
        .admin-nav a.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        
        .admin-nav a i {
            width: 20px;
            text-align: center;
        }
        
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
        
        /* Main Content */
        .admin-main {
            padding: var(--spacing-xl);
            background: var(--color-light);
        }
        
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--spacing-xl);
        }
        
        .admin-header h1 {
            font-size: 1.5rem;
            margin: 0;
        }
        
        /* Stats Grid */
        .admin-stats {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: var(--spacing-md);
            margin-bottom: var(--spacing-xl);
        }
        
        @media (max-width: 1400px) {
            .admin-stats {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .admin-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        .admin-stat {
            background: white;
            padding: var(--spacing-lg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            text-align: center;
        }
        
        .admin-stat .icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--spacing-md);
            font-size: 1.25rem;
            color: white;
        }
        
        .admin-stat .number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--color-dark);
        }
        
        .admin-stat .label {
            color: var(--color-gray);
            font-size: 0.85rem;
        }
        
        /* Dashboard Cards */
        .admin-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: var(--spacing-lg);
        }
        
        @media (max-width: 1200px) {
            .admin-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .admin-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            padding: var(--spacing-lg);
        }
        
        .admin-card h3 {
            font-size: 1rem;
            margin-bottom: var(--spacing-lg);
            padding-bottom: var(--spacing-md);
            border-bottom: 1px solid var(--color-light);
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }
        
        .admin-card h3 i {
            color: var(--color-primary);
        }
        
        /* Activity List */
        .activity-list {
            list-style: none;
        }
        
        .activity-item {
            display: flex;
            gap: var(--spacing-md);
            padding: var(--spacing-md) 0;
            border-bottom: 1px solid var(--color-light);
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .activity-icon.new { background: #d4edda; color: #155724; }
        .activity-icon.update { background: #cce5ff; color: #004085; }
        .activity-icon.alert { background: #f8d7da; color: #721c24; }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-content p {
            margin: 0;
            font-size: 0.9rem;
        }
        
        .activity-time {
            font-size: 0.75rem;
            color: var(--color-gray);
        }
        
        /* Quick Actions */
        .quick-actions-grid {
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
        }
        
        .quick-action:hover {
            background: white;
            box-shadow: var(--shadow-md);
        }
        
        .quick-action i {
            font-size: 1.5rem;
            color: var(--color-primary);
            margin-bottom: var(--spacing-sm);
        }
        
        .quick-action span {
            font-size: 0.85rem;
            font-weight: 500;
            text-align: center;
        }
        
        /* System Status */
        .system-status {
            display: flex;
            flex-direction: column;
            gap: var(--spacing-sm);
        }
        
        .status-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--spacing-sm) 0;
        }
        
        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: var(--spacing-sm);
        }
        
        .status-indicator.online { background: var(--color-success); }
        .status-indicator.warning { background: var(--color-warning); }
        .status-indicator.offline { background: var(--color-danger); }
    </style>
</head>
<body class="theme-light" data-font-size="normal">
    
    <!-- Top Navigation -->
    <nav class="main-nav">
        <div class="nav-container">
            <a href="/" class="nav-brand">
                <span class="brand-logo">OUTSSINC</span>
                <span class="brand-tagline">Admin Panel</span>
            </a>
            <div class="nav-actions">
                <span style="color: var(--color-gray-light); margin-right: var(--spacing-md);">
                    Welcome, <?php echo htmlspecialchars($admin['first_name']); ?>
                </span>
                <button class="btn btn-sm btn-outline" style="color: white; border-color: rgba(255,255,255,0.3);">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </div>
        </div>
    </nav>
    
    <!-- Admin Layout -->
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="admin-brand">
                <h2><i class="fas fa-cog"></i> Admin Panel</h2>
                <span>Version 2.0</span>
            </div>
            
            <nav class="admin-nav">
                <ul>
                    <li><a href="/admin/dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="/admin/users.php"><i class="fas fa-users"></i> Users</a></li>
                    <li><a href="/admin/cases.php"><i class="fas fa-folder-open"></i> All Cases</a></li>
                    <li><a href="/admin/resources.php"><i class="fas fa-map-marked-alt"></i> Resources</a></li>
                    <li><a href="/admin/badges.php"><i class="fas fa-award"></i> Badges</a></li>
                </ul>
                
                <div class="nav-section">
                    <div class="nav-section-title">Reports</div>
                    <ul>
                        <li><a href="/admin/analytics.php"><i class="fas fa-chart-line"></i> Analytics</a></li>
                        <li><a href="/admin/audit.php"><i class="fas fa-history"></i> Audit Log</a></li>
                        <li><a href="/admin/reports.php"><i class="fas fa-file-alt"></i> Reports</a></li>
                    </ul>
                </div>
                
                <div class="nav-section">
                    <div class="nav-section-title">System</div>
                    <ul>
                        <li><a href="/admin/settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                        <li><a href="/admin/backup.php"><i class="fas fa-database"></i> Backup</a></li>
                        <li><a href="/admin/maintenance.php"><i class="fas fa-tools"></i> Maintenance</a></li>
                        <li><a href="/docs/"><i class="fas fa-book"></i> Documentation</a></li>
                    </ul>
                </div>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="admin-main">
            <div class="admin-header">
                <div>
                    <h1>Admin Dashboard</h1>
                    <p style="color: var(--color-gray); margin: 0;"><?php echo date('l, F j, Y'); ?></p>
                </div>
                <div>
                    <a href="/admin/backup.php" class="btn btn-outline"><i class="fas fa-download"></i> Download Backup</a>
                </div>
            </div>
            
            <!-- Stats -->
            <div class="admin-stats">
                <div class="admin-stat">
                    <div class="icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="number"><?php echo $stats['total_users']; ?></div>
                    <div class="label">Total Users</div>
                </div>
                <div class="admin-stat">
                    <div class="icon" style="background: linear-gradient(135deg, #28a745 0%, #1e7b34 100%);">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="number"><?php echo $stats['active_clients']; ?></div>
                    <div class="label">Active Clients</div>
                </div>
                <div class="admin-stat">
                    <div class="icon" style="background: linear-gradient(135deg, #17a2b8 0%, #117a8b 100%);">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="number"><?php echo $stats['staff_members']; ?></div>
                    <div class="label">Staff Members</div>
                </div>
                <div class="admin-stat">
                    <div class="icon" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <div class="number"><?php echo $stats['open_cases']; ?></div>
                    <div class="label">Open Cases</div>
                </div>
                <div class="admin-stat">
                    <div class="icon" style="background: linear-gradient(135deg, #ffc107 0%, #d39e00 100%);">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="number"><?php echo $stats['intakes_today']; ?></div>
                    <div class="label">Intakes Today</div>
                </div>
                <div class="admin-stat">
                    <div class="icon" style="background: linear-gradient(135deg, #6f42c1 0%, #553098 100%);">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="number"><?php echo $stats['resources']; ?></div>
                    <div class="label">Resources</div>
                </div>
            </div>
            
            <!-- Grid -->
            <div class="admin-grid">
                <div class="admin-card">
                    <h3><i class="fas fa-stream"></i> Recent Activity</h3>
                    <ul class="activity-list">
                        <li class="activity-item">
                            <div class="activity-icon new"><i class="fas fa-user-plus"></i></div>
                            <div class="activity-content">
                                <p>New client registered: <strong>John D.</strong></p>
                                <span class="activity-time">5 minutes ago</span>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon update"><i class="fas fa-edit"></i></div>
                            <div class="activity-content">
                                <p>Case C-2025-041 status updated to <strong>Active</strong></p>
                                <span class="activity-time">15 minutes ago</span>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon alert"><i class="fas fa-exclamation"></i></div>
                            <div class="activity-content">
                                <p><strong>Red Alert:</strong> High urgency intake submitted</p>
                                <span class="activity-time">32 minutes ago</span>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon new"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="activity-content">
                                <p>New resource added: <strong>Cobourg Youth Centre</strong></p>
                                <span class="activity-time">1 hour ago</span>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-icon update"><i class="fas fa-check"></i></div>
                            <div class="activity-content">
                                <p>Case C-2025-028 closed: <strong>Goals Completed</strong></p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <div class="admin-card" style="margin-bottom: var(--spacing-lg);">
                        <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
                        <div class="quick-actions-grid">
                            <a href="/admin/users.php?action=new" class="quick-action">
                                <i class="fas fa-user-plus"></i>
                                <span>Add User</span>
                            </a>
                            <a href="/admin/resources.php?action=new" class="quick-action">
                                <i class="fas fa-plus-circle"></i>
                                <span>Add Resource</span>
                            </a>
                            <a href="/admin/backup.php" class="quick-action">
                                <i class="fas fa-database"></i>
                                <span>Backup DB</span>
                            </a>
                            <a href="/admin/settings.php" class="quick-action">
                                <i class="fas fa-cog"></i>
                                <span>Settings</span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="admin-card">
                        <h3><i class="fas fa-server"></i> System Status</h3>
                        <div class="system-status">
                            <div class="status-item">
                                <span><span class="status-indicator online"></span> Database</span>
                                <span class="text-success">Online</span>
                            </div>
                            <div class="status-item">
                                <span><span class="status-indicator online"></span> Web Server</span>
                                <span class="text-success">Online</span>
                            </div>
                            <div class="status-item">
                                <span><span class="status-indicator online"></span> API</span>
                                <span class="text-success">Healthy</span>
                            </div>
                            <div class="status-item">
                                <span><span class="status-indicator warning"></span> Last Backup</span>
                                <span class="text-warning">3 days ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
