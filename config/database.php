<?php
/**
 * OUTSSINC Platform - Database Configuration
 * 
 * This file contains database connection settings.
 * For production, update these values in your cPanel.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

// Prevent direct access
if (!defined('OUTSSINC_LOADED')) {
    die('Direct access not permitted');
}

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'outssinc_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// PDO Connection Options
define('DB_OPTIONS', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
]);

/**
 * Get database connection
 * 
 * @return PDO|null Database connection or null on failure
 */
function getDbConnection() {
    static $pdo = null;
    
    if ($pdo === null) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS, DB_OPTIONS);
        } catch (PDOException $e) {
            // Log error in production, display in development
            if (defined('DEV_MODE') && DEV_MODE) {
                die("Database connection failed: " . htmlspecialchars($e->getMessage()));
            }
            error_log("Database connection failed: " . $e->getMessage());
            return null;
        }
    }
    
    return $pdo;
}
