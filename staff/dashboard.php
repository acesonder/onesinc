<?php
/**
 * OUTSSINC Platform - Staff Dashboard
 * 
 * "The Engine" - Staff command center with Kanban board.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';

// Demo staff data
$staff = [
    'first_name' => 'Sarah',
    'last_name' => 'Williams',
    'title' => 'Peer Support Worker',
    'caseload' => 12
];

// Demo cases for Kanban
$cases = [
    'pending' => [
        ['id' => 'C-2025-041', 'name' => 'John D.', 'urgency' => 'high', 'need' => 'Housing', 'days' => 1],
        ['id' => 'C-2025-042', 'name' => 'Maria S.', 'urgency' => 'medium', 'need' => 'Mental Health', 'days' => 0],
    ],
    'active' => [
        ['id' => 'C-2025-035', 'name' => 'Alex P.', 'urgency' => 'medium', 'need' => 'Employment', 'days' => 7],
        ['id' => 'C-2025-038', 'name' => 'David L.', 'urgency' => 'high', 'need' => 'Housing', 'days' => 3],
        ['id' => 'C-2025-039', 'name' => 'Emma R.', 'urgency' => 'low', 'need' => 'Benefits', 'days' => 5],
    ],
    'review' => [
        ['id' => 'C-2025-030', 'name' => 'Chris M.', 'urgency' => 'low', 'need' => 'ID Documents', 'days' => 14],
    ],
    'closed' => [
        ['id' => 'C-2025-028', 'name' => 'Anna K.', 'urgency' => 'medium', 'need' => 'Food Security', 'days' => 21],
    ]
];

$pageTitle = 'Staff Dashboard';
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
        /* Staff Dashboard Layout */
        .staff-layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: calc(100vh - var(--nav-height) - var(--marquee-height));
        }
        
        @media (max-width: 992px) {
            .staff-layout {
                grid-template-columns: 1fr;
            }
        }
        
        /* Sidebar */
        .staff-sidebar {
            background: var(--color-dark);
            color: white;
            padding: var(--spacing-lg);
            display: flex;
            flex-direction: column;
        }
        
        @media (max-width: 992px) {
            .staff-sidebar {
                display: none;
            }
        }
        
        .staff-profile {
            text-align: center;
            padding-bottom: var(--spacing-lg);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: var(--spacing-lg);
        }
        
        .staff-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6f42c1 0%, #553098 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--spacing-md);
            font-size: 2rem;
            color: white;
            border: 3px solid rgba(255,255,255,0.2);
        }
        
        .staff-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: var(--spacing-xs);
        }
        
        .staff-title {
            font-size: 0.85rem;
            color: var(--color-gray-light);
        }
        
        .caseload-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-sm);
            margin-top: var(--spacing-md);
            padding: var(--spacing-sm) var(--spacing-md);
            background: rgba(255,255,255,0.1);
            border-radius: var(--border-radius);
        }
        
        .caseload-indicator i {
            color: var(--color-warning);
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
        
        .nav-badge {
            margin-left: auto;
            background: var(--color-primary);
            color: white;
            padding: 2px 8px;
            border-radius: var(--border-radius-pill);
            font-size: 0.7rem;
        }
        
        .nav-badge.alert {
            background: var(--color-danger);
            animation: pulse 2s infinite;
        }
        
        /* Panic Button */
        .panic-btn {
            margin-top: auto;
            padding: var(--spacing-lg);
            background: var(--color-danger);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-sm);
            transition: all var(--transition-fast);
        }
        
        .panic-btn:hover {
            background: #c82333;
            transform: scale(1.02);
        }
        
        /* Main Content */
        .staff-main {
            padding: var(--spacing-xl);
            background: var(--color-light);
            overflow-x: auto;
        }
        
        .staff-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--spacing-xl);
            flex-wrap: wrap;
            gap: var(--spacing-md);
        }
        
        .staff-header h1 {
            font-size: 1.5rem;
            margin: 0;
        }
        
        .header-actions {
            display: flex;
            gap: var(--spacing-sm);
        }
        
        /* Stats Bar */
        .stats-bar {
            display: flex;
            gap: var(--spacing-md);
            margin-bottom: var(--spacing-xl);
            flex-wrap: wrap;
        }
        
        .stat-pill {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-sm) var(--spacing-lg);
            background: white;
            border-radius: var(--border-radius-pill);
            box-shadow: var(--shadow-sm);
        }
        
        .stat-pill i {
            color: var(--color-primary);
        }
        
        .stat-pill.urgent i {
            color: var(--color-danger);
        }
        
        .stat-pill .count {
            font-weight: 700;
            font-size: 1.25rem;
        }
        
        .stat-pill .label {
            color: var(--color-gray);
            font-size: 0.85rem;
        }
        
        /* Kanban Board */
        .kanban-board {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--spacing-lg);
            min-height: 500px;
        }
        
        @media (max-width: 1200px) {
            .kanban-board {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .kanban-board {
                grid-template-columns: 1fr;
            }
        }
        
        .kanban-column {
            background: rgba(0,0,0,0.03);
            border-radius: var(--border-radius);
            padding: var(--spacing-md);
            min-height: 400px;
        }
        
        .column-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: var(--spacing-md);
            padding-bottom: var(--spacing-md);
            border-bottom: 2px solid var(--color-gray-light);
        }
        
        .column-header h3 {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }
        
        .column-header .count {
            background: var(--color-gray-light);
            color: var(--color-dark);
            padding: 2px 8px;
            border-radius: var(--border-radius-pill);
            font-size: 0.75rem;
        }
        
        .kanban-column.pending .column-header {
            border-color: var(--color-warning);
        }
        
        .kanban-column.active .column-header {
            border-color: var(--color-primary);
        }
        
        .kanban-column.review .column-header {
            border-color: var(--color-info);
        }
        
        .kanban-column.closed .column-header {
            border-color: var(--color-success);
        }
        
        /* Case Cards */
        .case-card {
            background: white;
            border-radius: var(--border-radius-sm);
            padding: var(--spacing-md);
            margin-bottom: var(--spacing-sm);
            box-shadow: var(--shadow-sm);
            cursor: grab;
            transition: all var(--transition-fast);
            border-left: 4px solid var(--color-gray-light);
        }
        
        .case-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }
        
        .case-card.urgency-high {
            border-left-color: var(--color-danger);
        }
        
        .case-card.urgency-medium {
            border-left-color: var(--color-warning);
        }
        
        .case-card.urgency-low {
            border-left-color: var(--color-success);
        }
        
        .case-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: var(--spacing-sm);
        }
        
        .case-id {
            font-size: 0.75rem;
            color: var(--color-gray);
        }
        
        .urgency-badge {
            font-size: 0.65rem;
            padding: 2px 6px;
            border-radius: var(--border-radius-sm);
            text-transform: uppercase;
            font-weight: 600;
        }
        
        .urgency-badge.high {
            background: #ffe5e5;
            color: var(--color-danger);
        }
        
        .urgency-badge.medium {
            background: #fff8e5;
            color: #996600;
        }
        
        .urgency-badge.low {
            background: #e5f5e5;
            color: #196619;
        }
        
        .case-name {
            font-weight: 600;
            margin-bottom: var(--spacing-xs);
        }
        
        .case-need {
            font-size: 0.85rem;
            color: var(--color-gray);
            display: flex;
            align-items: center;
            gap: var(--spacing-xs);
        }
        
        .case-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: var(--spacing-sm);
            padding-top: var(--spacing-sm);
            border-top: 1px solid var(--color-light);
            font-size: 0.75rem;
            color: var(--color-gray);
        }
        
        /* Red Alert Banner */
        .red-alert-banner {
            background: linear-gradient(90deg, var(--color-danger), #c82333);
            color: white;
            padding: var(--spacing-md) var(--spacing-lg);
            border-radius: var(--border-radius);
            margin-bottom: var(--spacing-xl);
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: alertPulse 2s infinite;
        }
        
        @keyframes alertPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.9; }
        }
        
        .red-alert-banner i {
            font-size: 1.5rem;
            margin-right: var(--spacing-md);
        }
        
        .red-alert-banner .alert-content {
            flex: 1;
        }
        
        .red-alert-banner h4 {
            margin: 0 0 var(--spacing-xs);
        }
        
        .red-alert-banner p {
            margin: 0;
            opacity: 0.9;
        }
        
        .red-alert-banner .btn {
            background: white;
            color: var(--color-danger);
        }
        
        /* Quick Stats Cards */
        .quick-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--spacing-md);
            margin-bottom: var(--spacing-xl);
        }
        
        @media (max-width: 1200px) {
            .quick-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        .quick-stat {
            background: white;
            padding: var(--spacing-lg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            text-align: center;
        }
        
        .quick-stat .number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--color-primary);
        }
        
        .quick-stat .label {
            color: var(--color-gray);
            font-size: 0.85rem;
        }
    </style>
</head>
<body class="theme-light" data-font-size="normal">
    
    <!-- Top Navigation -->
    <nav class="main-nav">
        <div class="nav-container">
            <a href="/" class="nav-brand">
                <span class="brand-logo">OUTSSINC</span>
                <span class="brand-tagline">Staff Portal</span>
            </a>
            <div class="nav-actions">
                <button class="btn btn-sm" style="background: rgba(255,255,255,0.1); color: white;">
                    <i class="fas fa-bell"></i>
                </button>
                <button class="btn btn-sm btn-outline" style="color: white; border-color: rgba(255,255,255,0.3);">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </div>
        </div>
    </nav>
    
    <!-- Staff Layout -->
    <div class="staff-layout">
        <!-- Sidebar -->
        <aside class="staff-sidebar">
            <div class="staff-profile">
                <div class="staff-avatar">
                    <?php echo strtoupper(substr($staff['first_name'], 0, 1)); ?>
                </div>
                <div class="staff-name"><?php echo htmlspecialchars($staff['first_name'] . ' ' . $staff['last_name']); ?></div>
                <div class="staff-title"><?php echo htmlspecialchars($staff['title']); ?></div>
                <div class="caseload-indicator">
                    <i class="fas fa-users"></i>
                    <span><?php echo $staff['caseload']; ?> Active Cases</span>
                </div>
            </div>
            
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="/staff/dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="/staff/cases.php"><i class="fas fa-folder-open"></i> My Cases <span class="nav-badge"><?php echo $staff['caseload']; ?></span></a></li>
                    <li><a href="/staff/triage.php"><i class="fas fa-clipboard-list"></i> Triage Queue <span class="nav-badge alert">2</span></a></li>
                    <li><a href="/staff/calendar.php"><i class="fas fa-calendar-alt"></i> Calendar</a></li>
                    <li><a href="/staff/messages.php"><i class="fas fa-envelope"></i> Messages <span class="nav-badge">5</span></a></li>
                    <li><a href="/staff/resources.php"><i class="fas fa-map-marked-alt"></i> Resources</a></li>
                    <li><a href="/staff/reports.php"><i class="fas fa-chart-bar"></i> Reports</a></li>
                    <li><a href="/staff/team.php"><i class="fas fa-user-friends"></i> Team</a></li>
                    <li><a href="/staff/settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </nav>
            
            <button class="panic-btn" id="panic-btn">
                <i class="fas fa-exclamation-triangle"></i> PANIC BUTTON
            </button>
        </aside>
        
        <!-- Main Content -->
        <main class="staff-main">
            <div class="staff-header">
                <div>
                    <h1>Command Center</h1>
                    <p style="color: var(--color-gray); margin: 0;"><?php echo date('l, F j, Y'); ?></p>
                </div>
                <div class="header-actions">
                    <button class="btn btn-outline"><i class="fas fa-filter"></i> Filter</button>
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> New Case</button>
                </div>
            </div>
            
            <!-- Red Alert Banner (if any crisis cases) -->
            <div class="red-alert-banner">
                <i class="fas fa-exclamation-circle"></i>
                <div class="alert-content">
                    <h4>Red Alert: Urgent Triage Required</h4>
                    <p>2 new intakes flagged as high urgency require immediate attention.</p>
                </div>
                <a href="/staff/triage.php" class="btn">Review Now</a>
            </div>
            
            <!-- Quick Stats -->
            <div class="quick-stats">
                <div class="quick-stat">
                    <div class="number"><?php echo count($cases['pending']); ?></div>
                    <div class="label">Pending Triage</div>
                </div>
                <div class="quick-stat">
                    <div class="number"><?php echo count($cases['active']); ?></div>
                    <div class="label">Active Cases</div>
                </div>
                <div class="quick-stat">
                    <div class="number">3</div>
                    <div class="label">Appointments Today</div>
                </div>
                <div class="quick-stat">
                    <div class="number">12</div>
                    <div class="label">Clients Helped (Month)</div>
                </div>
            </div>
            
            <!-- Kanban Board -->
            <div class="kanban-board">
                <!-- Pending Triage -->
                <div class="kanban-column pending">
                    <div class="column-header">
                        <h3><i class="fas fa-clock"></i> Pending Triage</h3>
                        <span class="count"><?php echo count($cases['pending']); ?></span>
                    </div>
                    <?php foreach ($cases['pending'] as $case): ?>
                    <div class="case-card urgency-<?php echo $case['urgency']; ?>" draggable="true">
                        <div class="case-header">
                            <span class="case-id"><?php echo $case['id']; ?></span>
                            <span class="urgency-badge <?php echo $case['urgency']; ?>"><?php echo ucfirst($case['urgency']); ?></span>
                        </div>
                        <div class="case-name"><?php echo htmlspecialchars($case['name']); ?></div>
                        <div class="case-need">
                            <i class="fas fa-tag"></i> <?php echo htmlspecialchars($case['need']); ?>
                        </div>
                        <div class="case-footer">
                            <span><i class="fas fa-clock"></i> <?php echo $case['days']; ?>d ago</span>
                            <a href="/staff/case.php?id=<?php echo urlencode($case['id']); ?>">View</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Active -->
                <div class="kanban-column active">
                    <div class="column-header">
                        <h3><i class="fas fa-play-circle"></i> Active</h3>
                        <span class="count"><?php echo count($cases['active']); ?></span>
                    </div>
                    <?php foreach ($cases['active'] as $case): ?>
                    <div class="case-card urgency-<?php echo $case['urgency']; ?>" draggable="true">
                        <div class="case-header">
                            <span class="case-id"><?php echo $case['id']; ?></span>
                            <span class="urgency-badge <?php echo $case['urgency']; ?>"><?php echo ucfirst($case['urgency']); ?></span>
                        </div>
                        <div class="case-name"><?php echo htmlspecialchars($case['name']); ?></div>
                        <div class="case-need">
                            <i class="fas fa-tag"></i> <?php echo htmlspecialchars($case['need']); ?>
                        </div>
                        <div class="case-footer">
                            <span><i class="fas fa-clock"></i> <?php echo $case['days']; ?>d</span>
                            <a href="/staff/case.php?id=<?php echo urlencode($case['id']); ?>">View</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Under Review -->
                <div class="kanban-column review">
                    <div class="column-header">
                        <h3><i class="fas fa-search"></i> Under Review</h3>
                        <span class="count"><?php echo count($cases['review']); ?></span>
                    </div>
                    <?php foreach ($cases['review'] as $case): ?>
                    <div class="case-card urgency-<?php echo $case['urgency']; ?>" draggable="true">
                        <div class="case-header">
                            <span class="case-id"><?php echo $case['id']; ?></span>
                            <span class="urgency-badge <?php echo $case['urgency']; ?>"><?php echo ucfirst($case['urgency']); ?></span>
                        </div>
                        <div class="case-name"><?php echo htmlspecialchars($case['name']); ?></div>
                        <div class="case-need">
                            <i class="fas fa-tag"></i> <?php echo htmlspecialchars($case['need']); ?>
                        </div>
                        <div class="case-footer">
                            <span><i class="fas fa-clock"></i> <?php echo $case['days']; ?>d</span>
                            <a href="/staff/case.php?id=<?php echo urlencode($case['id']); ?>">View</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Closed -->
                <div class="kanban-column closed">
                    <div class="column-header">
                        <h3><i class="fas fa-check-circle"></i> Closed</h3>
                        <span class="count"><?php echo count($cases['closed']); ?></span>
                    </div>
                    <?php foreach ($cases['closed'] as $case): ?>
                    <div class="case-card urgency-<?php echo $case['urgency']; ?>" draggable="true">
                        <div class="case-header">
                            <span class="case-id"><?php echo $case['id']; ?></span>
                            <span class="urgency-badge <?php echo $case['urgency']; ?>"><?php echo ucfirst($case['urgency']); ?></span>
                        </div>
                        <div class="case-name"><?php echo htmlspecialchars($case['name']); ?></div>
                        <div class="case-need">
                            <i class="fas fa-tag"></i> <?php echo htmlspecialchars($case['need']); ?>
                        </div>
                        <div class="case-footer">
                            <span><i class="fas fa-clock"></i> <?php echo $case['days']; ?>d</span>
                            <a href="/staff/case.php?id=<?php echo urlencode($case['id']); ?>">View</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Crisis Marquee -->
    <div class="crisis-marquee">
        <div class="marquee-content">
            <span class="marquee-item urgent">
                <i class="fas fa-phone-alt"></i> 24/7 Crisis Line: <?php echo CRISIS_LINE; ?>
            </span>
            <span class="marquee-item">
                <i class="fas fa-shield-alt"></i> Staff Internal Line: Ext. 555
            </span>
            <span class="marquee-item urgent">
                <i class="fas fa-phone-alt"></i> 24/7 Crisis Line: <?php echo CRISIS_LINE; ?>
            </span>
            <span class="marquee-item">
                <i class="fas fa-shield-alt"></i> Staff Internal Line: Ext. 555
            </span>
        </div>
    </div>
    
    <script>
        // Panic Button functionality
        document.getElementById('panic-btn').addEventListener('click', function() {
            if (confirm('This will send an alert to all online staff members. Continue?')) {
                alert('PANIC ALERT SENT! All available staff have been notified.');
                // In production, this would trigger WebSocket/push notification to all staff
            }
        });
        
        // Basic drag and drop for Kanban cards
        const cards = document.querySelectorAll('.case-card');
        const columns = document.querySelectorAll('.kanban-column');
        
        cards.forEach(function(card) {
            card.addEventListener('dragstart', function() {
                card.classList.add('dragging');
            });
            
            card.addEventListener('dragend', function() {
                card.classList.remove('dragging');
            });
        });
        
        columns.forEach(function(column) {
            column.addEventListener('dragover', function(e) {
                e.preventDefault();
                var dragging = document.querySelector('.dragging');
                var afterElement = getDragAfterElement(column, e.clientY);
                if (afterElement == null) {
                    column.appendChild(dragging);
                } else {
                    column.insertBefore(dragging, afterElement);
                }
            });
        });
        
        function getDragAfterElement(container, y) {
            var draggableElements = Array.from(container.querySelectorAll('.case-card:not(.dragging)'));
            
            return draggableElements.reduce(function(closest, child) {
                var box = child.getBoundingClientRect();
                var offset = y - box.top - box.height / 2;
                if (offset < 0 && offset > closest.offset) {
                    return { offset: offset, element: child };
                } else {
                    return closest;
                }
            }, { offset: Number.NEGATIVE_INFINITY }).element;
        }
    </script>
</body>
</html>
