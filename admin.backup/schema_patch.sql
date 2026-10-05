-- ============================================================
-- DIFOSS Rangkui - Emerald Forest Edition
-- schema_patch.sql : Tabel & kolom tambahan
-- Dijalankan SETELAH brantas.sql oleh InstallController
-- Aman (idempotent) : error per-query diabaikan
-- ============================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ------------------------------------------------------------
-- TABEL BARU : Fitur Approval / Persetujuan
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `xu_approval_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text NULL,
  `input_date` datetime NULL DEFAULT NULL,
  `last_update` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `xu_approval_step` (
  `step_id` int NOT NULL AUTO_INCREMENT,
  `submission_id` int NOT NULL DEFAULT 0,
  `approver_id` int NOT NULL DEFAULT 0,
  `step_order` int NOT NULL DEFAULT 1,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `note` text NULL,
  `acted_at` datetime NULL DEFAULT NULL,
  `input_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`step_id`),
  KEY `submission_id` (`submission_id`),
  KEY `approver_id` (`approver_id`)
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `xu_fingerprint` (
  `id` int NOT NULL AUTO_INCREMENT,
  `biblio_id` int NOT NULL DEFAULT 0,
  `fingerprint_hash` varchar(64) NULL DEFAULT NULL,
  `similarity` decimal(5,2) NOT NULL DEFAULT 0.00,
  `ai_risk` decimal(5,2) NOT NULL DEFAULT 0.00,
  `scanned_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `biblio_id` (`biblio_id`)
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ------------------------------------------------------------
-- TABEL BARU : Pendukung
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblio_count` (
  `biblio_id` int NOT NULL DEFAULT 0,
  `download_count` int NOT NULL DEFAULT 0,
  `view_count` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`biblio_id`)
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `group_access_backup` (
  `group_id` int NOT NULL,
  `module_id` int NOT NULL,
  `r` int NOT NULL DEFAULT 0,
  `w` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`group_id`, `module_id`)
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `visitor_count` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visit_date` date NULL DEFAULT NULL,
  `member_id` varchar(20) NULL DEFAULT NULL,
  `ip_address` varchar(45) NULL DEFAULT NULL,
  `user_agent` varchar(255) NULL DEFAULT NULL,
  `input_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `search_biblio` (
  `search_id` int NOT NULL AUTO_INCREMENT,
  `biblio_id` int NOT NULL DEFAULT 0,
  `keyword` varchar(255) NULL DEFAULT NULL,
  `search_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`search_id`),
  KEY `biblio_id` (`biblio_id`)
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

-- ------------------------------------------------------------
-- KOLOM TAMBAHAN : biblio (Approval & Integrity Scanner)
-- (Jika kolom sudah ada, query gagal & dilewati - aman)
-- ------------------------------------------------------------
ALTER TABLE `biblio` ADD COLUMN `notes_en` text NULL AFTER `notes`;
ALTER TABLE `biblio` ADD COLUMN `approval_status` varchar(20) NOT NULL DEFAULT 'draft' AFTER `opac_hide`;
ALTER TABLE `biblio` ADD COLUMN `integrity_similarity` decimal(5,2) NOT NULL DEFAULT 0.00 AFTER `approval_status`;
ALTER TABLE `biblio` ADD COLUMN `integrity_ai_risk` decimal(5,2) NOT NULL DEFAULT 0.00 AFTER `integrity_similarity`;
ALTER TABLE `biblio` ADD COLUMN `integrity_last_scan` datetime NULL DEFAULT NULL AFTER `integrity_ai_risk`;
ALTER TABLE `biblio` ADD COLUMN `submission_id` int NULL DEFAULT NULL AFTER `integrity_last_scan`;

-- ------------------------------------------------------------
-- KOLOM TAMBAHAN : member (Approval keanggotaan)
-- ------------------------------------------------------------
ALTER TABLE `member` ADD COLUMN `member_category` varchar(50) NULL DEFAULT NULL AFTER `member_type_id`;
ALTER TABLE `member` ADD COLUMN `approval_note` varchar(255) NULL DEFAULT NULL AFTER `member_category`;

-- ------------------------------------------------------------
-- KOLOM TAMBAHAN : mst_author (ORCID)
-- ------------------------------------------------------------
ALTER TABLE `mst_author` ADD COLUMN `orcid_id` varchar(50) NULL DEFAULT NULL AFTER `auth_list`;

-- ------------------------------------------------------------
-- KOLOM TAMBAHAN : mst_supervisor (tahun)
-- ------------------------------------------------------------
ALTER TABLE `mst_supervisor` ADD COLUMN `supervisor_year` varchar(20) NULL DEFAULT NULL AFTER `supervisor_number`;

SET FOREIGN_KEY_CHECKS = 1;