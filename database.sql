-- =====================================================
-- Job Portal System - Database Schema
-- Framework: LavaLust
-- =====================================================

-- Create database (note: uses backticks due to space in name)
CREATE DATABASE IF NOT EXISTS `job portal` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `job portal`;

-- =====================================================
-- TABLE: user
-- =====================================================
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL UNIQUE,
  `email` VARCHAR(190) DEFAULT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('admin','employee','job_seeker') NOT NULL DEFAULT 'job_seeker',
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: categories
-- =====================================================
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NOT NULL UNIQUE,
  `description` TEXT DEFAULT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: jobs
-- =====================================================
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL,
  `description` TEXT NOT NULL,
  `company` VARCHAR(150) NOT NULL,
  `location` VARCHAR(150) DEFAULT NULL,
  `salary` DECIMAL(12,2) DEFAULT NULL,
  `category_id` INT UNSIGNED DEFAULT NULL,
  `posted_by` INT UNSIGNED NOT NULL,
  `status` ENUM('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_jobs_category` (`category_id`),
  KEY `idx_jobs_posted_by` (`posted_by`),
  KEY `idx_jobs_status` (`status`),
  CONSTRAINT `fk_jobs_category` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_jobs_user` FOREIGN KEY (`posted_by`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: applications
-- =====================================================
DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `job_id` INT UNSIGNED NOT NULL,
  `status` ENUM('pending','reviewed','accepted','rejected') NOT NULL DEFAULT 'pending',
  `resume_path` VARCHAR(255) DEFAULT NULL,
  `cover_letter` TEXT DEFAULT NULL,
  `applied_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_application` (`user_id`, `job_id`),
  KEY `idx_app_user` (`user_id`),
  KEY `idx_app_job` (`job_id`),
  KEY `idx_app_status` (`status`),
  CONSTRAINT `fk_app_user` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_app_job` FOREIGN KEY (`job_id`) REFERENCES `jobs`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- SEED DATA: Categories
-- =====================================================
INSERT INTO `categories` (`name`, `description`) VALUES
('IT & Software', 'Information Technology and Software Development roles'),
('Sales & Marketing', 'Sales, Marketing, and Business Development positions'),
('Design', 'Graphic Design, UI/UX Design, and Creative roles'),
('Engineering', 'Mechanical, Electrical, Civil, and other Engineering positions'),
('Finance & Accounting', 'Financial planning, accounting, and audit roles'),
('Human Resources', 'HR management, recruitment, and talent acquisition'),
('Healthcare', 'Medical, nursing, and healthcare services'),
('Education', 'Teaching, training, and educational services');

-- =====================================================
-- SEED DATA: Users
-- Note: Passwords are hashed with bcrypt. Default password for all is: password123
-- =====================================================
INSERT INTO `user` (`username`, `email`, `password`, `role`) VALUES
('admin', 'admin@jobportal.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('employer1', 'employer1@company.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'employee'),
('employer2', 'employer2@company.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'employee'),
('seeker1', 'seeker1@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'job_seeker'),
('seeker2', 'seeker2@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'job_seeker'),
('seeker3', 'seeker3@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'job_seeker');

-- =====================================================
-- SEED DATA: Jobs
-- =====================================================
INSERT INTO `jobs` (`title`, `description`, `company`, `location`, `salary`, `category_id`, `posted_by`, `status`) VALUES
('Senior Frontend Developer', 'We are looking for an experienced Frontend Developer to join our team. Must have 5+ years of experience with React, Vue, or Angular. You will be responsible for building user-friendly web applications and working closely with our design team.', 'TechCorp Solutions', 'Manila, Philippines', 80000.00, 1, 2, 'approved'),
('UI/UX Designer', 'Creative UI/UX Designer needed to design beautiful and intuitive user interfaces. Experience with Figma, Adobe XD, and prototyping tools required. Portfolio required.', 'Design Studio Inc.', 'Makati, Philippines', 60000.00, 3, 2, 'approved'),
('Backend Developer', 'Looking for a Backend Developer proficient in PHP, Laravel, and MySQL. Experience with RESTful APIs and microservices architecture preferred.', 'WebDev Solutions', 'Cebu, Philippines', 75000.00, 1, 3, 'approved'),
('Sales Manager', 'Experienced Sales Manager to lead our sales team and drive revenue growth. Must have proven track record in B2B sales and team management.', 'Global Sales Co.', 'Quezon City, Philippines', 70000.00, 2, 3, 'approved'),
('Junior Software Engineer', 'Entry-level position for recent graduates. Training provided. Knowledge of any programming language preferred.', 'StartupXYZ', 'Taguig, Philippines', 40000.00, 1, 2, 'pending'),
('Marketing Specialist', 'Marketing professional needed to develop and execute marketing campaigns. Experience with digital marketing and social media required.', 'MarketPro Agency', 'Pasig, Philippines', 50000.00, 2, 3, 'pending'),
('Full Stack Developer', 'Full Stack Developer with experience in both frontend and backend technologies. Node.js, React, and MongoDB experience preferred.', 'TechStart Inc.', 'Davao, Philippines', 85000.00, 1, 2, 'approved'),
('Graphic Designer', 'Creative Graphic Designer for print and digital media. Adobe Creative Suite proficiency required.', 'Creative Minds', 'Makati, Philippines', 45000.00, 3, 3, 'approved');

-- =====================================================
-- SEED DATA: Applications
-- =====================================================
INSERT INTO `applications` (`user_id`, `job_id`, `status`, `applied_at`) VALUES
(4, 1, 'pending', '2025-01-15 10:00:00'),
(4, 3, 'reviewed', '2025-01-14 14:30:00'),
(5, 1, 'accepted', '2025-01-13 09:15:00'),
(5, 2, 'pending', '2025-01-16 11:20:00'),
(6, 4, 'reviewed', '2025-01-12 16:45:00'),
(4, 7, 'pending', '2025-01-17 08:00:00'),
(5, 7, 'reviewed', '2025-01-16 13:30:00');

-- =====================================================
-- USEFUL QUERIES
-- =====================================================

-- View all users with their roles
-- SELECT id, username, email, role, created_at FROM `user`;

-- View all jobs with category and employer info
-- SELECT j.id, j.title, j.company, c.name as category, u.username as posted_by, j.status, j.created_at 
-- FROM jobs j 
-- LEFT JOIN categories c ON j.category_id = c.id 
-- LEFT JOIN user u ON j.posted_by = u.id 
-- ORDER BY j.created_at DESC;

-- View applications with applicant and job details
-- SELECT a.id, u.username as applicant, j.title as job_title, j.company, a.status, a.applied_at 
-- FROM applications a 
-- JOIN user u ON a.user_id = u.id 
-- JOIN jobs j ON a.job_id = j.id 
-- ORDER BY a.applied_at DESC;

-- Count jobs by status
-- SELECT status, COUNT(*) as count FROM jobs GROUP BY status;

-- Count applications by status
-- SELECT status, COUNT(*) as count FROM applications GROUP BY status;

-- =====================================================
-- NOTES
-- =====================================================
-- 1. Default password for all seeded users: password123
-- 2. The password hash in the seed data uses bcrypt ($2y$10$...)
-- 3. Change passwords via the application interface for security
-- 4. Foreign keys ensure data integrity - cascading deletes are enabled
-- 5. All timestamps are in DATETIME format (Y-m-d H:i:s)

