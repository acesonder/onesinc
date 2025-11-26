<?php
/**
 * OUTSSINC Platform - Authentication API
 * 
 * Handles login, registration, and password reset.
 * 
 * @package OUTSSINC
 * @version 2.0
 */

header('Content-Type: application/json');

require_once dirname(__DIR__) . '/config/config.php';

// Get action from POST
$action = isset($_POST['action']) ? $_POST['action'] : '';

$response = ['success' => false, 'message' => 'Invalid action'];

switch ($action) {
    case 'login':
        $response = handleLogin();
        break;
    
    case 'register':
        $response = handleRegister();
        break;
    
    case 'forgot':
        $response = handleForgotPassword();
        break;
    
    case 'logout':
        $response = handleLogout();
        break;
    
    default:
        $response = ['success' => false, 'message' => 'Unknown action'];
}

echo json_encode($response);
exit;

/**
 * Handle user login
 */
function handleLogin() {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    // Validate input
    if (empty($email) || empty($password)) {
        return ['success' => false, 'message' => 'Email and password are required'];
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Invalid email format'];
    }
    
    // Get database connection
    $db = getDbConnection();
    if (!$db) {
        return ['success' => false, 'message' => 'Database connection error'];
    }
    
    try {
        // Find user by email
        $stmt = $db->prepare("SELECT id, uuid, email, password_hash, first_name, role, status FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if (!$user) {
            // Don't reveal if email exists
            return ['success' => false, 'message' => 'Invalid email or password'];
        }
        
        // Check if account is active
        if ($user['status'] !== 'active') {
            return ['success' => false, 'message' => 'Your account is not active. Please contact support.'];
        }
        
        // Verify password
        if (!password_verify($password, $user['password_hash'])) {
            return ['success' => false, 'message' => 'Invalid email or password'];
        }
        
        // Update last login
        $updateStmt = $db->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
        $updateStmt->execute([$user['id']]);
        
        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_name(SESSION_NAME);
            session_start();
        }
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_uuid'] = $user['uuid'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_name'] = $user['first_name'];
        $_SESSION['login_time'] = time();
        
        // Determine redirect based on role
        $redirect = '/client/dashboard.php';
        if (in_array($user['role'], ['staff', 'admin', 'super_admin'])) {
            $redirect = '/staff/dashboard.php';
        }
        
        return [
            'success' => true,
            'message' => 'Login successful',
            'redirect' => $redirect
        ];
        
    } catch (PDOException $e) {
        error_log("Login error: " . $e->getMessage());
        return ['success' => false, 'message' => 'An error occurred. Please try again.'];
    }
}

/**
 * Handle user registration
 */
function handleRegister() {
    $firstName = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
    $lastName = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $acceptTos = isset($_POST['accept_tos']);
    
    // Validate input
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        return ['success' => false, 'message' => 'All fields are required'];
    }
    
    if (!$acceptTos) {
        return ['success' => false, 'message' => 'You must accept the Terms of Service'];
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Invalid email format'];
    }
    
    // Block temporary email providers
    $tempEmailDomains = ['temp-mail.org', 'guerrillamail.com', 'mailinator.com', '10minutemail.com'];
    $emailDomain = strtolower(substr(strrchr($email, "@"), 1));
    if (in_array($emailDomain, $tempEmailDomains)) {
        return ['success' => false, 'message' => 'Temporary email addresses are not allowed'];
    }
    
    if (strlen($password) < 8) {
        return ['success' => false, 'message' => 'Password must be at least 8 characters'];
    }
    
    // Get database connection
    $db = getDbConnection();
    if (!$db) {
        return ['success' => false, 'message' => 'Database connection error'];
    }
    
    try {
        // Check if email already exists
        $stmt = $db->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return ['success' => false, 'message' => 'An account with this email already exists'];
        }
        
        // Generate UUID
        $uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
        
        // Hash password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user
        $stmt = $db->prepare("
            INSERT INTO users (uuid, email, password_hash, first_name, last_name, phone, role, status, tos_accepted_at, created_at)
            VALUES (?, ?, ?, ?, ?, ?, 'client', 'pending', NOW(), NOW())
        ");
        $stmt->execute([$uuid, $email, $passwordHash, $firstName, $lastName, $phone]);
        
        $userId = $db->lastInsertId();
        
        // Create client profile
        $stmt = $db->prepare("INSERT INTO client_profiles (user_id, created_at) VALUES (?, NOW())");
        $stmt->execute([$userId]);
        
        // Log registration
        logAudit($db, $userId, 'user_registered', 'users', $userId);
        
        // In production, send SMS verification here
        // For now, we'll just return success
        
        return [
            'success' => true,
            'message' => 'Account created successfully',
            'requireVerification' => true
        ];
        
    } catch (PDOException $e) {
        error_log("Registration error: " . $e->getMessage());
        return ['success' => false, 'message' => 'An error occurred. Please try again.'];
    }
}

/**
 * Handle forgot password
 */
function handleForgotPassword() {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Invalid email format'];
    }
    
    // Always return success to prevent email enumeration
    // In production, send reset email if user exists
    
    return [
        'success' => true,
        'message' => 'If an account exists with this email, reset instructions have been sent.'
    ];
}

/**
 * Handle logout
 */
function handleLogout() {
    if (session_status() === PHP_SESSION_NONE) {
        session_name(SESSION_NAME);
        session_start();
    }
    
    $_SESSION = [];
    session_destroy();
    
    return ['success' => true, 'redirect' => '/'];
}

/**
 * Log audit entry
 */
function logAudit($db, $userId, $action, $entityType, $entityId, $oldValues = null, $newValues = null) {
    try {
        $stmt = $db->prepare("
            INSERT INTO audit_log (user_id, action, entity_type, entity_id, old_values, new_values, ip_address, user_agent, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
        ");
        $stmt->execute([
            $userId,
            $action,
            $entityType,
            $entityId,
            $oldValues ? json_encode($oldValues) : null,
            $newValues ? json_encode($newValues) : null,
            $_SERVER['REMOTE_ADDR'] ?? null,
            $_SERVER['HTTP_USER_AGENT'] ?? null
        ]);
    } catch (PDOException $e) {
        error_log("Audit log error: " . $e->getMessage());
    }
}
