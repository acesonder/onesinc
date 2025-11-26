<?php
/**
 * OUTSSINC Platform - Documentation Index
 * 
 * @package OUTSSINC
 * @version 2.0
 */

require_once dirname(__DIR__) . '/config/config.php';
$pageTitle = 'Documentation';
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
        .docs-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            max-width: var(--container-max);
            margin: 0 auto;
            padding: var(--spacing-xl);
            gap: var(--spacing-xl);
        }
        
        @media (max-width: 992px) {
            .docs-layout {
                grid-template-columns: 1fr;
            }
        }
        
        .docs-nav {
            background: white;
            padding: var(--spacing-lg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: calc(var(--nav-height) + var(--spacing-lg));
            height: fit-content;
        }
        
        .docs-nav h3 {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--color-gray);
            margin-bottom: var(--spacing-md);
        }
        
        .docs-nav ul {
            list-style: none;
        }
        
        .docs-nav ul ul {
            margin-left: var(--spacing-md);
            margin-top: var(--spacing-xs);
        }
        
        .docs-nav li {
            margin-bottom: var(--spacing-xs);
        }
        
        .docs-nav a {
            display: block;
            padding: var(--spacing-sm);
            color: var(--color-dark);
            text-decoration: none;
            border-radius: var(--border-radius-sm);
            font-size: 0.9rem;
        }
        
        .docs-nav a:hover,
        .docs-nav a.active {
            background: var(--color-light);
            color: var(--color-primary);
        }
        
        .docs-content {
            background: white;
            padding: var(--spacing-2xl);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
        }
        
        .docs-content h1 {
            margin-bottom: var(--spacing-lg);
            padding-bottom: var(--spacing-md);
            border-bottom: 2px solid var(--color-light);
        }
        
        .docs-content h2 {
            margin-top: var(--spacing-2xl);
            margin-bottom: var(--spacing-md);
            color: var(--color-primary);
        }
        
        .docs-content h3 {
            margin-top: var(--spacing-xl);
            margin-bottom: var(--spacing-sm);
        }
        
        .docs-content p {
            line-height: 1.8;
        }
        
        .docs-content ul, .docs-content ol {
            margin-left: var(--spacing-xl);
            margin-bottom: var(--spacing-lg);
        }
        
        .docs-content li {
            margin-bottom: var(--spacing-sm);
            line-height: 1.7;
        }
        
        .docs-content code {
            background: var(--color-light);
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.9em;
        }
        
        .docs-content pre {
            background: var(--color-dark);
            color: white;
            padding: var(--spacing-lg);
            border-radius: var(--border-radius);
            overflow-x: auto;
            margin: var(--spacing-lg) 0;
        }
        
        .docs-content pre code {
            background: none;
            padding: 0;
            color: inherit;
        }
        
        .callout {
            padding: var(--spacing-lg);
            border-radius: var(--border-radius);
            margin: var(--spacing-lg) 0;
        }
        
        .callout-info {
            background: #e7f3ff;
            border-left: 4px solid var(--color-info);
        }
        
        .callout-warning {
            background: #fff8e6;
            border-left: 4px solid var(--color-warning);
        }
        
        .callout-danger {
            background: #ffebee;
            border-left: 4px solid var(--color-danger);
        }
        
        .callout-success {
            background: #e8f5e9;
            border-left: 4px solid var(--color-success);
        }
    </style>
</head>
<body class="theme-light" data-font-size="normal">
    
    <!-- Navigation -->
    <nav class="main-nav">
        <div class="nav-container">
            <a href="/" class="nav-brand">
                <span class="brand-logo">OUTSSINC</span>
                <span class="brand-tagline">Documentation</span>
            </a>
            <div class="nav-actions">
                <a href="/" class="btn btn-sm btn-outline" style="color: white; border-color: rgba(255,255,255,0.3);">
                    <i class="fas fa-arrow-left"></i> Back to Site
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Documentation Layout -->
    <div class="docs-layout">
        <!-- Sidebar Navigation -->
        <nav class="docs-nav">
            <h3>Getting Started</h3>
            <ul>
                <li><a href="#overview" class="active">Overview</a></li>
                <li><a href="#installation">Installation</a></li>
                <li><a href="#configuration">Configuration</a></li>
                <li><a href="#database">Database Setup</a></li>
            </ul>
            
            <h3 style="margin-top: var(--spacing-lg);">User Guides</h3>
            <ul>
                <li><a href="#clients">For Clients</a></li>
                <li><a href="#staff">For Staff</a></li>
                <li><a href="#admins">For Administrators</a></li>
            </ul>
            
            <h3 style="margin-top: var(--spacing-lg);">Features</h3>
            <ul>
                <li><a href="#intake">Smart Intake</a></li>
                <li><a href="#case-management">Case Management</a></li>
                <li><a href="#gamification">Gamification</a></li>
                <li><a href="#safety">Safety Features</a></li>
            </ul>
            
            <h3 style="margin-top: var(--spacing-lg);">Technical</h3>
            <ul>
                <li><a href="#api">API Reference</a></li>
                <li><a href="#backup">Backup & Recovery</a></li>
                <li><a href="#security">Security</a></li>
            </ul>
        </nav>
        
        <!-- Main Content -->
        <main class="docs-content">
            <h1><i class="fas fa-book"></i> OUTSSINC Platform Documentation</h1>
            
            <p><strong>Version:</strong> 2.0 | <strong>Last Updated:</strong> <?php echo date('F j, Y'); ?></p>
            
            <h2 id="overview">Overview</h2>
            <p>OUTSSINC (Outreach Someone In Need of Change) is a comprehensive peer support platform designed for community outreach organizations. The platform provides tools for client intake, case management, resource directories, and gamified engagement.</p>
            
            <div class="callout callout-info">
                <strong>Platform Compatibility:</strong> This platform is designed to work with cPanel web hosting services using MySQL/MariaDB and PHP 7.4+.
            </div>
            
            <h3>Key Features</h3>
            <ul>
                <li><strong>Smart Intake Assessment:</strong> Multi-step forms with conditional logic and auto-save</li>
                <li><strong>Client Portal:</strong> Gamified dashboard with XP, badges, and streaks</li>
                <li><strong>Staff Dashboard:</strong> Kanban-style case management with triage system</li>
                <li><strong>Resource Directory:</strong> Searchable database with GPS integration</li>
                <li><strong>Safety Features:</strong> Quick exit button, privacy overlay, crisis detection</li>
                <li><strong>Accessibility:</strong> WCAG-compliant with font sizing, high contrast, and TTS</li>
            </ul>
            
            <h2 id="installation">Installation</h2>
            
            <h3>Requirements</h3>
            <ul>
                <li>PHP 7.4 or higher (8.0+ recommended)</li>
                <li>MySQL 5.7+ or MariaDB 10.3+</li>
                <li>Apache or Nginx web server</li>
                <li>SSL certificate (required for production)</li>
            </ul>
            
            <h3>cPanel Installation Steps</h3>
            <ol>
                <li>Upload all files to your <code>public_html</code> directory</li>
                <li>Create a MySQL database via cPanel</li>
                <li>Import <code>database/schema.sql</code> using phpMyAdmin</li>
                <li>Edit <code>config/database.php</code> with your database credentials</li>
                <li>Set <code>DEV_MODE</code> to <code>false</code> in <code>config/config.php</code></li>
                <li>Ensure proper file permissions (755 for directories, 644 for files)</li>
            </ol>
            
            <div class="callout callout-warning">
                <strong>Security Note:</strong> Change the default admin password immediately after installation!
            </div>
            
            <h2 id="configuration">Configuration</h2>
            
            <h3>Main Configuration (<code>config/config.php</code>)</h3>
            <pre><code>// Site Configuration
define('SITE_NAME', 'OUTSSINC');
define('SITE_URL', 'https://your-domain.com');
define('DEV_MODE', false); // Set to false in production

// Crisis Line Configuration
define('CRISIS_LINE', '1-833-456-4566');
define('CRISIS_TEXT', '45645');

// Session Settings
define('SESSION_TIMEOUT', 1800); // 30 minutes</code></pre>
            
            <h2 id="database">Database Setup</h2>
            <p>The database schema includes the following main tables:</p>
            <ul>
                <li><code>users</code> - All user accounts (clients, staff, admin)</li>
                <li><code>client_profiles</code> - Extended client information</li>
                <li><code>staff_profiles</code> - Staff-specific data</li>
                <li><code>intake_assessments</code> - Intake form submissions</li>
                <li><code>cases</code> - Case management records</li>
                <li><code>resources</code> - Resource directory</li>
                <li><code>badges</code> - Gamification badges</li>
                <li><code>audit_log</code> - Immutable activity log</li>
            </ul>
            
            <h2 id="clients">For Clients</h2>
            
            <h3>Getting Started</h3>
            <ol>
                <li>Visit the website and click "Client Portal"</li>
                <li>Create an account with your email and phone</li>
                <li>Complete the Smart Intake Assessment</li>
                <li>A peer support worker will contact you within 24-48 hours</li>
            </ol>
            
            <h3>Dashboard Features</h3>
            <ul>
                <li><strong>My Goals:</strong> Track progress on your personal goals</li>
                <li><strong>Appointments:</strong> View and manage upcoming meetings</li>
                <li><strong>Messages:</strong> Communicate with your support worker</li>
                <li><strong>Saved Resources:</strong> Quick access to bookmarked services</li>
                <li><strong>Badges & XP:</strong> Earn rewards for engagement</li>
            </ul>
            
            <h2 id="staff">For Staff</h2>
            
            <h3>Case Management</h3>
            <p>The Kanban board provides a visual overview of all cases:</p>
            <ul>
                <li><strong>Pending Triage:</strong> New intakes awaiting assignment</li>
                <li><strong>Active:</strong> Cases currently being worked</li>
                <li><strong>Under Review:</strong> Cases ready for closure review</li>
                <li><strong>Closed:</strong> Completed cases</li>
            </ul>
            
            <h3>Panic Button</h3>
            <p>The Panic Button sends an immediate alert to all online staff members. Use this when you need urgent assistance with a client situation.</p>
            
            <h2 id="admins">For Administrators</h2>
            
            <h3>Admin Panel Access</h3>
            <p>Navigate to <code>/admin/</code> to access the administrative dashboard.</p>
            
            <h3>Key Admin Functions</h3>
            <ul>
                <li>User management (create, edit, deactivate accounts)</li>
                <li>Resource directory maintenance</li>
                <li>Badge and gamification configuration</li>
                <li>System settings and maintenance mode</li>
                <li>Database backup and restore</li>
                <li>Audit log review</li>
            </ul>
            
            <h2 id="safety">Safety Features</h2>
            
            <h3>Quick Exit Button</h3>
            <p>A red "running man" button is always visible in the bottom-right corner. Clicking it immediately redirects to a weather website.</p>
            
            <h3>Privacy Overlay</h3>
            <p>Double-tap the Escape key to activate the "Weather App" overlay, which disguises the screen if someone approaches unexpectedly.</p>
            
            <h3>Crisis Detection</h3>
            <p>The intake form monitors for crisis keywords (suicide, overdose, etc.) and immediately displays crisis resources and live chat options.</p>
            
            <h2 id="backup">Backup & Recovery</h2>
            
            <h3>Manual Backup</h3>
            <ol>
                <li>Go to Admin Panel → Backup</li>
                <li>Click "Download SQL Backup"</li>
                <li>Store the backup file securely</li>
            </ol>
            
            <div class="callout callout-success">
                <strong>Best Practice:</strong> Perform weekly backups and store them in multiple locations.
            </div>
            
            <h2 id="security">Security Considerations</h2>
            <ul>
                <li>Always use HTTPS in production</li>
                <li>Change default credentials immediately</li>
                <li>Keep PHP and dependencies updated</li>
                <li>Review audit logs regularly</li>
                <li>Implement IP-based rate limiting</li>
            </ul>
            
            <hr style="margin: var(--spacing-2xl) 0;">
            
            <p class="text-center text-muted">
                <strong>OUTSSINC Platform</strong><br>
                Outreach Someone In Need of Change<br>
                &copy; <?php echo date('Y'); ?> All Rights Reserved
            </p>
        </main>
    </div>
</body>
</html>
