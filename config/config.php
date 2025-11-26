<?php
/**
 * OUTSSINC Platform - Main Configuration
 * 
 * Central configuration file for the platform.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

// Define that OUTSSINC is loaded (security check)
define('OUTSSINC_LOADED', true);

// Site Configuration
define('SITE_NAME', 'OUTSSINC');
define('SITE_FULL_NAME', 'Outreach Someone In Need of Change');
define('SITE_TAGLINE', 'Meeting you where you are, getting you where you want to be');
define('SITE_URL', 'https://outssinc.org');
define('SITE_EMAIL', 'info@outssinc.org');
define('SITE_PHONE', '1-800-OUTSSINC');
define('SITE_LOCATION', 'Cobourg, Ontario, Canada');

// Crisis Line (24/7)
define('CRISIS_LINE', '1-833-456-4566');
define('CRISIS_TEXT', '45645');

// Environment
define('DEV_MODE', true);
define('MAINTENANCE_MODE', false);

// Session Configuration
define('SESSION_TIMEOUT', 1800); // 30 minutes
define('SESSION_NAME', 'OUTSSINC_SESSION');

// Security Settings (as per SOP - some disabled for accessibility)
define('ENABLE_2FA', false);
define('REQUIRE_PASSWORD_RESET', false);
define('AUTO_IP_BAN', false);
define('GEO_RESTRICTIONS', false);

// Privacy Settings
define('DELETION_COOLING_PERIOD', 7); // Days
define('CHAT_RETENTION', 'indefinite');

// File Paths
define('ROOT_PATH', dirname(__DIR__));
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('ASSETS_PATH', ROOT_PATH . '/assets');
define('UPLOADS_PATH', ROOT_PATH . '/uploads');

// Theme Colors
define('COLOR_PRIMARY', '#d80032');
define('COLOR_DARK', '#1c1c1e');
define('COLOR_LIGHT', '#f8f9fd');
define('COLOR_SUCCESS', '#28a745');
define('COLOR_WARNING', '#ffc107');
define('COLOR_DANGER', '#dc3545');

// Include database configuration
require_once __DIR__ . '/database.php';
