-- =============================================
-- OUTSSINC Platform Database Schema
-- Version: 2.0
-- Compatible with: MySQL 5.7+ / MariaDB 10.3+
-- =============================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- =============================================
-- Database Creation
-- =============================================
CREATE DATABASE IF NOT EXISTS `outssinc_db` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE `outssinc_db`;

-- =============================================
-- Users Table (Clients, Staff, Admin)
-- =============================================
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `uuid` CHAR(36) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password_hash` VARCHAR(255) NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(20) DEFAULT NULL,
    `role` ENUM('client', 'staff', 'admin', 'super_admin') NOT NULL DEFAULT 'client',
    `status` ENUM('pending', 'active', 'suspended', 'deleted') NOT NULL DEFAULT 'pending',
    `avatar` VARCHAR(255) DEFAULT NULL,
    `level` INT UNSIGNED NOT NULL DEFAULT 1,
    `xp` INT UNSIGNED NOT NULL DEFAULT 0,
    `streak_days` INT UNSIGNED NOT NULL DEFAULT 0,
    `last_login` DATETIME DEFAULT NULL,
    `last_activity` DATETIME DEFAULT NULL,
    `email_verified` TINYINT(1) NOT NULL DEFAULT 0,
    `phone_verified` TINYINT(1) NOT NULL DEFAULT 0,
    `tos_accepted_at` DATETIME DEFAULT NULL,
    `privacy_mode` TINYINT(1) NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uuid` (`uuid`),
    UNIQUE KEY `email` (`email`),
    KEY `role` (`role`),
    KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Staff Profiles (Extended info for staff/admin)
-- =============================================
CREATE TABLE IF NOT EXISTS `staff_profiles` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `title` VARCHAR(100) DEFAULT NULL,
    `bio` TEXT DEFAULT NULL,
    `specializations` JSON DEFAULT NULL,
    `lived_experience_tags` JSON DEFAULT NULL,
    `max_caseload` INT UNSIGNED DEFAULT NULL,
    `current_caseload` INT UNSIGNED NOT NULL DEFAULT 0,
    `available` TINYINT(1) NOT NULL DEFAULT 1,
    `hire_date` DATE DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `user_id` (`user_id`),
    CONSTRAINT `fk_staff_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Client Profiles (Extended info for clients)
-- =============================================
CREATE TABLE IF NOT EXISTS `client_profiles` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `assigned_staff_id` INT UNSIGNED DEFAULT NULL,
    `date_of_birth` DATE DEFAULT NULL,
    `gender` VARCHAR(50) DEFAULT NULL,
    `preferred_pronouns` VARCHAR(50) DEFAULT NULL,
    `address` TEXT DEFAULT NULL,
    `city` VARCHAR(100) DEFAULT NULL,
    `postal_code` VARCHAR(10) DEFAULT NULL,
    `emergency_contact_name` VARCHAR(200) DEFAULT NULL,
    `emergency_contact_phone` VARCHAR(20) DEFAULT NULL,
    `needs_tags` JSON DEFAULT NULL,
    `preferences` JSON DEFAULT NULL,
    `consent_contact` TINYINT(1) NOT NULL DEFAULT 1,
    `consent_share_agencies` TINYINT(1) NOT NULL DEFAULT 0,
    `memorial_status` TINYINT(1) NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `user_id` (`user_id`),
    KEY `assigned_staff_id` (`assigned_staff_id`),
    CONSTRAINT `fk_client_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_client_staff` FOREIGN KEY (`assigned_staff_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Intake Assessments
-- =============================================
CREATE TABLE IF NOT EXISTS `intake_assessments` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED DEFAULT NULL,
    `session_id` VARCHAR(100) DEFAULT NULL,
    `status` ENUM('draft', 'submitted', 'triaged', 'assigned', 'closed') NOT NULL DEFAULT 'draft',
    `urgency_level` ENUM('low', 'medium', 'high', 'crisis') NOT NULL DEFAULT 'medium',
    `red_alert` TINYINT(1) NOT NULL DEFAULT 0,
    `responses` JSON NOT NULL,
    `needs_identified` JSON DEFAULT NULL,
    `triage_notes` TEXT DEFAULT NULL,
    `assigned_staff_id` INT UNSIGNED DEFAULT NULL,
    `referred_agencies` JSON DEFAULT NULL,
    `ip_address` VARCHAR(45) DEFAULT NULL,
    `user_agent` VARCHAR(255) DEFAULT NULL,
    `submitted_at` DATETIME DEFAULT NULL,
    `triaged_at` DATETIME DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `status` (`status`),
    KEY `urgency_level` (`urgency_level`),
    KEY `red_alert` (`red_alert`),
    CONSTRAINT `fk_intake_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Cases (Client Case Management)
-- =============================================
CREATE TABLE IF NOT EXISTS `cases` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `case_number` VARCHAR(20) NOT NULL,
    `client_id` INT UNSIGNED NOT NULL,
    `staff_id` INT UNSIGNED NOT NULL,
    `intake_id` INT UNSIGNED DEFAULT NULL,
    `status` ENUM('pending', 'active', 'under_review', 'closed') NOT NULL DEFAULT 'pending',
    `priority` ENUM('low', 'medium', 'high', 'urgent') NOT NULL DEFAULT 'medium',
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT DEFAULT NULL,
    `goals` JSON DEFAULT NULL,
    `close_reason` VARCHAR(255) DEFAULT NULL,
    `close_notes` TEXT DEFAULT NULL,
    `opened_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `closed_at` DATETIME DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `case_number` (`case_number`),
    KEY `client_id` (`client_id`),
    KEY `staff_id` (`staff_id`),
    KEY `status` (`status`),
    CONSTRAINT `fk_case_client` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_case_staff` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Resources Directory
-- =============================================
CREATE TABLE IF NOT EXISTS `resources` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `category` VARCHAR(100) NOT NULL,
    `subcategory` VARCHAR(100) DEFAULT NULL,
    `description` TEXT DEFAULT NULL,
    `address` VARCHAR(255) DEFAULT NULL,
    `city` VARCHAR(100) DEFAULT NULL,
    `postal_code` VARCHAR(10) DEFAULT NULL,
    `latitude` DECIMAL(10,7) DEFAULT NULL,
    `longitude` DECIMAL(10,7) DEFAULT NULL,
    `hide_exact_address` TINYINT(1) NOT NULL DEFAULT 0,
    `phone` VARCHAR(50) DEFAULT NULL,
    `email` VARCHAR(255) DEFAULT NULL,
    `website` VARCHAR(255) DEFAULT NULL,
    `hours` JSON DEFAULT NULL,
    `eligibility` TEXT DEFAULT NULL,
    `services_offered` JSON DEFAULT NULL,
    `languages` JSON DEFAULT NULL,
    `accessibility_features` JSON DEFAULT NULL,
    `is_emergency` TINYINT(1) NOT NULL DEFAULT 0,
    `is_verified` TINYINT(1) NOT NULL DEFAULT 0,
    `average_rating` DECIMAL(2,1) DEFAULT NULL,
    `total_ratings` INT UNSIGNED NOT NULL DEFAULT 0,
    `status` ENUM('active', 'inactive', 'pending') NOT NULL DEFAULT 'pending',
    `added_by` INT UNSIGNED DEFAULT NULL,
    `last_verified` DATETIME DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `category` (`category`),
    KEY `city` (`city`),
    KEY `status` (`status`),
    KEY `is_emergency` (`is_emergency`),
    FULLTEXT KEY `search` (`name`, `description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Badges (Gamification)
-- =============================================
CREATE TABLE IF NOT EXISTS `badges` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `icon` VARCHAR(50) NOT NULL,
    `category` VARCHAR(50) NOT NULL,
    `xp_value` INT UNSIGNED NOT NULL DEFAULT 0,
    `is_hidden` TINYINT(1) NOT NULL DEFAULT 0,
    `criteria` JSON DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- User Badges
-- =============================================
CREATE TABLE IF NOT EXISTS `user_badges` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `badge_id` INT UNSIGNED NOT NULL,
    `awarded_by` INT UNSIGNED DEFAULT NULL,
    `is_displayed` TINYINT(1) NOT NULL DEFAULT 1,
    `awarded_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `revoked_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `user_badge` (`user_id`, `badge_id`),
    CONSTRAINT `fk_userbadge_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_userbadge_badge` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Audit Log (Immutable)
-- =============================================
CREATE TABLE IF NOT EXISTS `audit_log` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED DEFAULT NULL,
    `action` VARCHAR(100) NOT NULL,
    `entity_type` VARCHAR(100) NOT NULL,
    `entity_id` INT UNSIGNED DEFAULT NULL,
    `old_values` JSON DEFAULT NULL,
    `new_values` JSON DEFAULT NULL,
    `ip_address` VARCHAR(45) DEFAULT NULL,
    `user_agent` VARCHAR(255) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `entity` (`entity_type`, `entity_id`),
    KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Settings
-- =============================================
CREATE TABLE IF NOT EXISTS `settings` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `setting_key` VARCHAR(100) NOT NULL,
    `setting_value` TEXT DEFAULT NULL,
    `setting_type` ENUM('string', 'number', 'boolean', 'json') NOT NULL DEFAULT 'string',
    `category` VARCHAR(50) NOT NULL DEFAULT 'general',
    `description` VARCHAR(255) DEFAULT NULL,
    `updated_by` INT UNSIGNED DEFAULT NULL,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Insert Default Data
-- =============================================

-- Default Settings
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_type`, `category`, `description`) VALUES
('site_name', 'OUTSSINC', 'string', 'general', 'Site name'),
('site_tagline', 'Outreach Someone In Need of Change', 'string', 'general', 'Site tagline'),
('crisis_line', '1-833-456-4566', 'string', 'general', '24/7 Crisis line number'),
('crisis_text', '45645', 'string', 'general', 'Crisis text number'),
('session_timeout', '1800', 'number', 'security', 'Session timeout in seconds'),
('enable_2fa', '0', 'boolean', 'security', 'Enable two-factor authentication'),
('deletion_cooling_period', '7', 'number', 'privacy', 'Days before data deletion'),
('maintenance_mode', '0', 'boolean', 'general', 'Enable maintenance mode'),
('dev_mode', '1', 'boolean', 'general', 'Enable development mode');

-- Default Badges
INSERT INTO `badges` (`name`, `description`, `icon`, `category`, `xp_value`, `is_hidden`) VALUES
('Welcome', 'Joined the OUTSSINC community', 'fa-door-open', 'milestone', 10, 0),
('First Steps', 'Completed your first intake assessment', 'fa-shoe-prints', 'milestone', 25, 0),
('Week Warrior', 'Logged in for 7 consecutive days', 'fa-fire', 'streak', 50, 0),
('Month Master', 'Logged in for 30 consecutive days', 'fa-fire-alt', 'streak', 150, 0),
('Resource Hunter', 'Saved 10 resources to your profile', 'fa-map-marker-alt', 'engagement', 30, 0),
('Community Voice', 'Left 5 resource reviews', 'fa-comment', 'engagement', 40, 0),
('Helping Hand', 'Referred a friend to OUTSSINC', 'fa-hands-helping', 'community', 75, 0),
('Goal Getter', 'Completed all goals in a case plan', 'fa-trophy', 'achievement', 100, 0),
('Rising Star', 'Reached Level 5', 'fa-star', 'milestone', 200, 0),
('Easter Egg', 'Found a hidden feature!', 'fa-egg', 'hidden', 50, 1);

-- Create default admin user (password: admin123 - CHANGE IN PRODUCTION!)
INSERT INTO `users` (`uuid`, `email`, `password_hash`, `first_name`, `last_name`, `role`, `status`, `email_verified`) VALUES
(UUID(), 'admin@outssinc.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System', 'Admin', 'super_admin', 'active', 1);
