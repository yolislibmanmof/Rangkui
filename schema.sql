-- RANGKUI - CLEAN INSTALL SCHEMA
-- Contains table definitions and non-personal lookup/menu seeds only.
-- No production user accounts, documents, uploaded files, logs, or scan history.
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rangkui`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup_log`
--

CREATE TABLE `backup_log` (
  `backup_log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `backup_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `backup_file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `biblio`
--

CREATE TABLE `biblio` (
  `biblio_id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `gmd_id` int(11) DEFAULT NULL,
  `item_type_id` int(11) DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `sor` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edition` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departement` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_ministry` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isbn_issn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `publish_year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `collation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `series_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `call_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authors_text` text COLLATE utf8_unicode_ci,
  `supervisors_text` text COLLATE utf8_unicode_ci,
  `examiners_text` text COLLATE utf8_unicode_ci,
  `subjects_text` text COLLATE utf8_unicode_ci,
  `language_id` char(5) COLLATE utf8_unicode_ci DEFAULT 'en',
  `copyright_id` int(11) DEFAULT NULL,
  `license_id` int(11) NOT NULL,
  `source` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_place_id` int(11) DEFAULT NULL,
  `classification` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `notes_en` text COLLATE utf8_unicode_ci,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_att` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_crossref` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opac_hide` smallint(6) DEFAULT '0',
  `approval_status` enum('draft','pending','approved','published') COLLATE utf8_unicode_ci DEFAULT 'draft',
  `integrity_similarity` decimal(5,2) DEFAULT NULL,
  `integrity_ai_risk` decimal(5,2) DEFAULT NULL,
  `integrity_last_scan` datetime DEFAULT NULL,
  `submission_id` int(11) DEFAULT NULL,
  `promoted` smallint(6) DEFAULT '0',
  `labels` text COLLATE utf8_unicode_ci,
  `frequency_id` int(11) NOT NULL DEFAULT '0',
  `spec_detail_info` text COLLATE utf8_unicode_ci,
  `input_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `step` smallint(6) NOT NULL DEFAULT '1',
  `hits` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `biblio_attachment`
--

CREATE TABLE `biblio_attachment` (
  `biblio_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `access_type` enum('public','private') COLLATE utf8_unicode_ci NOT NULL,
  `access_limit` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `biblio_author`
--

CREATE TABLE `biblio_author` (
  `biblio_id` int(11) NOT NULL DEFAULT '0',
  `author_id` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

--
-- Table structure for table `biblio_certificates`
--

CREATE TABLE `biblio_certificates` (
  `cert_id` int(11) NOT NULL,
  `biblio_id` int(11) NOT NULL,
  `certificate_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sha256_hash` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `issued_at` datetime NOT NULL,
  `issued_by` int(11) DEFAULT NULL,
  `pdf_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `download_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biblio_contributor`
--

CREATE TABLE `biblio_contributor` (
  `biblio_id` int(11) NOT NULL,
  `contributor_id` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `biblio_count`
--

CREATE TABLE `biblio_count` (
  `biblio_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `biblio_custom`
--

CREATE TABLE `biblio_custom` (
  `biblio_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='one to one relation with real biblio table' ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `biblio_examiner`
--

CREATE TABLE `biblio_examiner` (
  `biblio_id` int(11) NOT NULL DEFAULT '0',
  `examiner_id` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `biblio_supervisor`
--

CREATE TABLE `biblio_supervisor` (
  `biblio_id` int(11) NOT NULL DEFAULT '0',
  `supervisor_id` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `biblio_topic`
--

CREATE TABLE `biblio_topic` (
  `biblio_id` int(11) NOT NULL DEFAULT '0',
  `topic_id` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `biblio_id` int(11) NOT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `input_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `content_path` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `content_ownpage` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_bkd_rekap`
--

CREATE TABLE `dosen_bkd_rekap` (
  `rekap_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `semester` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `total_pembimbing` int(11) DEFAULT '0',
  `total_penguji` int(11) DEFAULT '0',
  `total_kontributor` int(11) DEFAULT '0',
  `sks_pembimbing` decimal(5,2) DEFAULT '0.00',
  `sks_penguji` decimal(5,2) DEFAULT '0.00',
  `total_sks` decimal(5,2) DEFAULT '0.00',
  `generated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `file_title` text COLLATE utf8_unicode_ci NOT NULL,
  `file_name` text COLLATE utf8_unicode_ci NOT NULL,
  `file_url` text COLLATE utf8_unicode_ci,
  `file_dir` text COLLATE utf8_unicode_ci,
  `mime_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_desc` text COLLATE utf8_unicode_ci,
  `uploader_id` int(11) NOT NULL,
  `input_date` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `fines_id` int(11) NOT NULL,
  `fines_date` date NOT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `debet` int(11) DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `group_access`
--

CREATE TABLE `group_access` (
  `group_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `r` int(11) NOT NULL DEFAULT '0',
  `w` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

--
-- Dumping data for table `group_access`
--

INSERT INTO `group_access` (`group_id`, `module_id`, `r`, `w`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1),
(3, 1, 1, 1),
(4, 1, 1, 1),
(1, 3, 1, 1),
(2, 3, 1, 1),
(3, 3, 1, 1),
(4, 3, 1, 1),
(1, 4, 1, 1),
(2, 4, 1, 1),
(3, 4, 1, 1),
(4, 4, 1, 1),
(1, 5, 1, 1),
(2, 5, 1, 1),
(3, 5, 1, 1),
(4, 5, 1, 1),
(1, 8, 1, 1),
(2, 8, 1, 1),
(3, 8, 1, 1),
(4, 8, 1, 1),
(1, 12, 1, 1),
(2, 12, 1, 1),
(3, 12, 1, 1),
(4, 12, 1, 1),
(1, 29, 1, 1),
(2, 29, 1, 1),
(3, 29, 1, 1),
(4, 29, 1, 1),
(1, 41, 1, 1),
(2, 41, 1, 1),
(3, 41, 1, 1),
(4, 41, 1, 1),
(1, 53, 1, 1),
(2, 53, 1, 1),
(3, 53, 1, 1),
(4, 53, 1, 1),
(1, 2, 1, 1),
(2, 2, 1, 1),
(3, 2, 1, 1),
(4, 2, 1, 1),
(1, 6, 1, 1),
(2, 6, 1, 1),
(3, 6, 1, 1),
(4, 6, 1, 1),
(1, 7, 1, 1),
(2, 7, 1, 1),
(3, 7, 1, 1),
(4, 7, 1, 1),
(1, 9, 1, 1),
(2, 9, 1, 1),
(3, 9, 1, 1),
(4, 9, 1, 1),
(1, 10, 1, 1),
(2, 10, 1, 1),
(3, 10, 1, 1),
(4, 10, 1, 1),
(1, 11, 1, 1),
(2, 11, 1, 1),
(3, 11, 1, 1),
(4, 11, 1, 1),
(1, 13, 1, 1),
(2, 13, 1, 1),
(3, 13, 1, 1),
(4, 13, 1, 1),
(1, 20, 1, 1),
(2, 20, 1, 1),
(3, 20, 1, 1),
(4, 20, 1, 1),
(1, 26, 1, 1),
(2, 26, 1, 1),
(3, 26, 1, 1),
(4, 26, 1, 1),
(1, 27, 1, 1),
(2, 27, 1, 1),
(3, 27, 1, 1),
(4, 27, 1, 1),
(1, 28, 1, 1),
(2, 28, 1, 1),
(3, 28, 1, 1),
(4, 28, 1, 1),
(1, 14, 1, 1),
(2, 14, 1, 1),
(3, 14, 1, 1),
(4, 14, 1, 1),
(1, 15, 1, 1),
(2, 15, 1, 1),
(3, 15, 1, 1),
(4, 15, 1, 1),
(1, 16, 1, 1),
(2, 16, 1, 1),
(3, 16, 1, 1),
(4, 16, 1, 1),
(1, 17, 1, 1),
(2, 17, 1, 1),
(3, 17, 1, 1),
(4, 17, 1, 1),
(1, 18, 1, 1),
(2, 18, 1, 1),
(3, 18, 1, 1),
(4, 18, 1, 1),
(1, 19, 1, 1),
(2, 19, 1, 1),
(3, 19, 1, 1),
(4, 19, 1, 1),
(1, 21, 1, 1),
(2, 21, 1, 1),
(3, 21, 1, 1),
(4, 21, 1, 1),
(1, 22, 1, 1),
(2, 22, 1, 1),
(3, 22, 1, 1),
(4, 22, 1, 1),
(1, 23, 1, 1),
(2, 23, 1, 1),
(3, 23, 1, 1),
(4, 23, 1, 1),
(1, 24, 1, 1),
(2, 24, 1, 1),
(3, 24, 1, 1),
(4, 24, 1, 1),
(1, 25, 1, 1),
(2, 25, 1, 1),
(3, 25, 1, 1),
(4, 25, 1, 1),
(1, 30, 1, 1),
(2, 30, 1, 1),
(3, 30, 1, 1),
(4, 30, 1, 1),
(1, 31, 1, 1),
(2, 31, 1, 1),
(3, 31, 1, 1),
(4, 31, 1, 1),
(1, 32, 1, 1),
(2, 32, 1, 1),
(3, 32, 1, 1),
(4, 32, 1, 1),
(1, 33, 1, 1),
(2, 33, 1, 1),
(3, 33, 1, 1),
(4, 33, 1, 1),
(1, 34, 1, 1),
(2, 34, 1, 1),
(3, 34, 1, 1),
(4, 34, 1, 1),
(1, 35, 1, 1),
(2, 35, 1, 1),
(3, 35, 1, 1),
(4, 35, 1, 1),
(1, 36, 1, 1),
(2, 36, 1, 1),
(3, 36, 1, 1),
(4, 36, 1, 1),
(1, 37, 1, 1),
(2, 37, 1, 1),
(3, 37, 1, 1),
(4, 37, 1, 1),
(1, 38, 1, 1),
(2, 38, 1, 1),
(3, 38, 1, 1),
(4, 38, 1, 1),
(1, 39, 1, 1),
(2, 39, 1, 1),
(3, 39, 1, 1),
(4, 39, 1, 1),
(1, 40, 1, 1),
(2, 40, 1, 1),
(3, 40, 1, 1),
(4, 40, 1, 1),
(1, 42, 1, 1),
(2, 42, 1, 1),
(3, 42, 1, 1),
(4, 42, 1, 1),
(1, 45, 1, 1),
(2, 45, 1, 1),
(3, 45, 1, 1),
(4, 45, 1, 1),
(1, 43, 1, 1),
(2, 43, 1, 1),
(3, 43, 1, 1),
(4, 43, 1, 1),
(1, 44, 1, 1),
(2, 44, 1, 1),
(3, 44, 1, 1),
(4, 44, 1, 1),
(1, 54, 1, 1),
(2, 54, 1, 1),
(3, 54, 1, 1),
(4, 54, 1, 1),
(1, 46, 1, 1),
(2, 46, 1, 1),
(3, 46, 1, 1),
(4, 46, 1, 1),
(1, 47, 1, 1),
(2, 47, 1, 1),
(3, 47, 1, 1),
(4, 47, 1, 1),
(1, 48, 1, 1),
(2, 48, 1, 1),
(3, 48, 1, 1),
(4, 48, 1, 1),
(1, 49, 1, 1),
(2, 49, 1, 1),
(3, 49, 1, 1),
(4, 49, 1, 1),
(1, 50, 1, 1),
(2, 50, 1, 1),
(3, 50, 1, 1),
(4, 50, 1, 1),
(1, 51, 1, 1),
(2, 51, 1, 1),
(3, 51, 1, 1),
(4, 51, 1, 1),
(1, 52, 1, 1),
(2, 52, 1, 1),
(3, 52, 1, 1),
(4, 52, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_access_backup`
--

CREATE TABLE `group_access_backup` (
  `group_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `r` int(11) NOT NULL DEFAULT '0',
  `w` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `holiday_id` int(11) NOT NULL,
  `holiday_dayname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `holiday_date` date DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `biblio_id` int(11) DEFAULT NULL,
  `call_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coll_type_id` int(11) DEFAULT NULL,
  `item_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inventory_code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `supplier_id` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_id` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `item_status_id` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` int(11) NOT NULL DEFAULT '0',
  `invoice` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `price_currency` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `input_date` datetime NOT NULL,
  `last_update` datetime DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kardex`
--

CREATE TABLE `kardex` (
  `kardex_id` int(11) NOT NULL,
  `date_expected` date NOT NULL,
  `date_received` date DEFAULT NULL,
  `seq_number` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `serial_id` int(11) DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL,
  `item_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loan_date` date NOT NULL,
  `due_date` date NOT NULL,
  `renewed` int(11) NOT NULL DEFAULT '0',
  `loan_rules_id` int(11) NOT NULL DEFAULT '0',
  `actual` date DEFAULT NULL,
  `is_lent` int(11) NOT NULL DEFAULT '0',
  `is_return` int(11) NOT NULL DEFAULT '0',
  `return_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `log_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `status` enum('SUCCESS','FAILED') NOT NULL,
  `login_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `long_pattern`
--

CREATE TABLE `long_pattern` (
  `pattern_id` int(11) NOT NULL,
  `pattern_prefix` varchar(5) DEFAULT NULL,
  `pattern_zero` int(11) DEFAULT NULL,
  `pattern_suffix` varchar(5) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `member_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `institution` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `member_type_id` int(11) DEFAULT NULL,
  `member_category` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approval_note` text COLLATE utf8_unicode_ci,
  `member_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_mail_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inst_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `member_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_since_date` date DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `expire_date` date NOT NULL,
  `member_notes` text COLLATE utf8_unicode_ci,
  `is_pending` smallint(6) NOT NULL DEFAULT '0',
  `mpasswd` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `member_custom`
--

CREATE TABLE `member_custom` (
  `member_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='one to one relation with real member table' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `member_type`
--

CREATE TABLE `member_type` (
  `member_type_id` int(11) NOT NULL,
  `member_type_name` varchar(100) NOT NULL,
  `loan_periode` smallint(6) DEFAULT '7',
  `enable_reserve` tinyint(1) DEFAULT '1',
  `reserve_limit` smallint(6) DEFAULT '3',
  `fine_each_day` decimal(10,2) DEFAULT '0.00',
  `grace_periode` smallint(6) DEFAULT '0',
  `reborrow_limit` smallint(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_type`
--

INSERT INTO `member_type` (`member_type_id`, `member_type_name`, `loan_periode`, `enable_reserve`, `reserve_limit`, `fine_each_day`, `grace_periode`, `reborrow_limit`) VALUES
(1, 'Standard', 7, 1, 3, 0.00, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_author`
--

CREATE TABLE `mst_author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author_year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authority_type` enum('p','o','c') COLLATE utf8_unicode_ci DEFAULT 'p',
  `auth_list` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orcid_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `mst_code_ministry`
--

CREATE TABLE `mst_code_ministry` (
  `code_ministry` varchar(20) NOT NULL,
  `name_prodi` varchar(100) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `university` varchar(100) NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `mst_coll_type`
--

CREATE TABLE `mst_coll_type` (
  `coll_type_id` int(11) NOT NULL,
  `coll_type_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `mst_contributor`
--

CREATE TABLE `mst_contributor` (
  `contributor_id` int(11) NOT NULL,
  `contributor_name` varchar(100) NOT NULL,
  `contributor_type` enum('p','o','c') NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Table structure for table `mst_copyright`
--

CREATE TABLE `mst_copyright` (
  `copyright_id` int(11) NOT NULL,
  `copyright_name` varchar(100) NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_copyright`
--

INSERT INTO `mst_copyright` (`copyright_id`, `copyright_name`, `input_date`, `last_update`) VALUES
(1, 'Lembaga Penerbit', '2019-03-14', '2019-03-14'),
(2, 'Individu Penulis', '2020-05-18', '2020-05-18'),
(3, 'Sekolah Tinggi Ilmu Kesehatan Holistik', '2020-07-26', '2020-07-26'),
(4, 'Institut Teknologi Nasional Bandung', '2020-07-29', '2020-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `mst_examiner`
--

CREATE TABLE `mst_examiner` (
  `examiner_id` int(11) NOT NULL,
  `examiner_name` varchar(100) NOT NULL,
  `examiner_number` varchar(100) NOT NULL,
  `examiner_type` enum('p','o','c') NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Table structure for table `mst_frequency`
--

CREATE TABLE `mst_frequency` (
  `frequency_id` int(11) NOT NULL,
  `frequency` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `language_prefix` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_increment` smallint(6) DEFAULT NULL,
  `time_unit` enum('day','week','month','year') COLLATE utf8_unicode_ci DEFAULT 'day',
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `mst_gmd`
--

CREATE TABLE `mst_gmd` (
  `gmd_id` int(11) NOT NULL,
  `gmd_code` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmd_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `icon_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mst_gmd`
--

INSERT INTO `mst_gmd` (`gmd_id`, `gmd_code`, `gmd_name`, `icon_image`, `input_date`, `last_update`) VALUES
(1, 'TE', 'Text', NULL, '2017-08-16', '2017-08-16'),
(2, 'AR', 'Art Original', NULL, '2017-08-16', '2018-03-20'),
(3, 'CH', 'Chart', NULL, '2017-08-16', '2017-08-16'),
(4, 'CO', 'Computer Software', NULL, '2017-08-16', '2017-08-16'),
(5, 'DI', 'Diorama', NULL, '2017-08-16', '2017-08-16'),
(6, 'FI', 'Filmstrip', NULL, '2017-08-16', '2017-08-16'),
(7, 'FL', 'Flash Card', NULL, '2017-08-16', '2017-08-16'),
(8, 'GA', 'Game', NULL, '2017-08-16', '2017-08-16'),
(9, 'GL', 'Globe', NULL, '2017-08-16', '2017-08-16'),
(10, 'KI', 'Kit', NULL, '2017-08-16', '2017-08-16'),
(11, 'MA', 'Map', NULL, '2017-08-16', '2017-08-16'),
(12, 'MI', 'Microform', NULL, '2017-08-16', '2017-08-16'),
(13, 'MN', 'Manuscript', NULL, '2017-08-16', '2017-08-16'),
(14, 'MO', 'Model', NULL, '2017-08-16', '2017-08-16'),
(15, 'MP', 'Motion Picture', NULL, '2017-08-16', '2017-08-16'),
(16, 'MS', 'Microscope Slide', NULL, '2017-08-16', '2017-08-16'),
(17, 'MU', 'Music', NULL, '2017-08-16', '2017-08-16'),
(18, 'PI', 'Picture', NULL, '2017-08-16', '2017-08-16'),
(19, 'RE', 'Realia', NULL, '2017-08-16', '2017-08-16'),
(20, 'SL', 'Slide', NULL, '2017-08-16', '2017-08-16'),
(21, 'SO', 'Sound Recording', NULL, '2017-08-16', '2017-08-16'),
(22, 'TD', 'Technical Drawing', NULL, '2017-08-16', '2017-08-16'),
(23, 'TR', 'Transparency', NULL, '2017-08-16', '2017-08-16'),
(24, 'VI', 'Video Recording', NULL, '2017-08-16', '2017-08-16'),
(25, 'EQ', 'Equipment', NULL, '2017-08-16', '2017-08-16'),
(26, 'CF', 'Computer File', NULL, '2017-08-16', '2017-08-16'),
(27, 'CA', 'Cartographic Material', NULL, '2017-08-16', '2017-08-16'),
(28, 'CD', 'CD-ROM', NULL, '2017-08-16', '2017-08-16'),
(29, 'MV', 'Multimedia', NULL, '2017-08-16', '2017-08-16'),
(30, 'ER', 'Electronic Resource', NULL, '2017-08-16', '2017-08-16'),
(31, 'DVD', 'Digital Versatile Disc', NULL, '2017-08-16', '2017-08-16'),
(46, NULL, 'Mainan', NULL, '2018-03-23', '2018-03-23'),
(43, 'SK', 'Skripsi', NULL, '2020-07-26', '2020-07-26'),
(47, NULL, 'Disertasi', NULL, '2026-08-31', '2026-08-31'),
(48, NULL, 'Tesis', NULL, '2026-08-31', '2026-08-31'),
(49, 'MK', 'Makalah', NULL, '2026-08-31', '2026-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `mst_icon`
--

CREATE TABLE `mst_icon` (
  `id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `icon_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_icon`
--

INSERT INTO `mst_icon` (`id`, `class_name`, `icon_name`) VALUES
(1, 'fa-adjust', 'fa fa-adjust'),
(2, 'fa-anchor', 'fa fa-anchor'),
(3, 'fa-archive', 'fa fa-archive'),
(4, 'fa-area-chart', 'fa fa-area-chart'),
(5, 'fa-arrows', 'fa fa-arrows'),
(6, 'fa-arrows-h', 'fa fa-arrows-h'),
(7, 'fa-arrows-v', 'fa fa-arrows-v'),
(8, 'fa-asterisk', 'fa fa-asterisk'),
(9, 'fa-at', 'fa fa-at'),
(10, 'fa-automobile', 'fa fa-automobile'),
(11, 'fa-ban', 'fa fa-ban'),
(12, 'fa-bank', 'fa fa-bank'),
(13, 'fa-bar-chart', 'fa fa-bar-chart'),
(14, 'fa-bar-chart-o', 'fa fa-bar-chart-o'),
(15, 'fa-barcode', 'fa fa-barcode'),
(16, 'fa-bars', 'fa fa-bars'),
(17, 'fa-beer', 'fa fa-beer'),
(18, 'fa-bell', 'fa fa-bell'),
(19, 'fa-bell-o', 'fa fa-bell-o'),
(20, 'fa-bell-slash', 'fa fa-bell-slash'),
(21, 'fa-bell-slash-o', 'fa fa-bell-slash-o'),
(22, 'fa-bicycle', 'fa fa-bicycle'),
(23, 'fa-binoculars', 'fa fa-binoculars'),
(24, 'fa-birthday-cake', 'fa fa-birthday-cake'),
(25, 'fa-bolt', 'fa fa-bolt'),
(26, 'fa-bomb', 'fa fa-bomb'),
(27, 'fa-book', 'fa fa-book'),
(28, 'fa-bookmark', 'fa fa-bookmark'),
(29, 'fa-bookmark-o', 'fa fa-bookmark-o'),
(30, 'fa-briefcase', 'fa fa-briefcase'),
(31, 'fa-bug', 'fa fa-bug'),
(32, 'fa-building', 'fa fa-building'),
(33, 'fa-building-o', 'fa fa-building-o'),
(34, 'fa-bullhorn', 'fa fa-bullhorn'),
(35, 'fa-bullseye', 'fa fa-bullseye'),
(36, 'fa-bus', 'fa fa-bus'),
(37, 'fa-cab', 'fa fa-cab'),
(38, 'fa-calculator', 'fa fa-calculator'),
(39, 'fa-calendar', 'fa fa-calendar'),
(40, 'fa-calendar-o', 'fa fa-calendar-o'),
(41, 'fa-camera', 'fa fa-camera'),
(42, 'fa-camera-retro', 'fa fa-camera-retro'),
(43, 'fa-car', 'fa fa-car'),
(44, 'fa-caret-square-o-down', 'fa fa-caret-square-o-down'),
(45, 'fa-caret-square-o-left', 'fa fa-caret-square-o-left'),
(46, 'fa-caret-square-o-right', 'fa fa-caret-square-o-right'),
(47, 'fa-caret-square-o-up', 'fa fa-caret-square-o-up'),
(48, 'fa-cc', 'fa fa-cc'),
(49, 'fa-certificate', 'fa fa-certificate'),
(50, 'fa-check', 'fa fa-check'),
(51, 'fa-check-circle', 'fa fa-check-circle'),
(52, 'fa-check-circle-o', 'fa fa-check-circle-o'),
(53, 'fa-check-square', 'fa fa-check-square'),
(54, 'fa-check-square-o', 'fa fa-check-square-o'),
(55, 'fa-child', 'fa fa-child'),
(56, 'fa-circle', 'fa fa-circle'),
(57, 'fa-circle-o', 'fa fa-circle-o'),
(58, 'fa-circle-o-notch', 'fa fa-circle-o-notch'),
(59, 'fa-circle-thin', 'fa fa-circle-thin'),
(60, 'fa-clock-o', 'fa fa-clock-o'),
(61, 'fa-close', 'fa fa-close'),
(62, 'fa-cloud', 'fa fa-cloud'),
(63, 'fa-cloud-download', 'fa fa-cloud-download'),
(64, 'fa-cloud-upload', 'fa fa-cloud-upload'),
(65, 'fa-code', 'fa fa-code'),
(66, 'fa-code-fork', 'fa fa-code-fork'),
(67, 'fa-coffee', 'fa fa-coffee'),
(68, 'fa-cog', 'fa fa-cog'),
(69, 'fa-cogs', 'fa fa-cogs'),
(70, 'fa-comment', 'fa fa-comment'),
(71, 'fa-comment-o', 'fa fa-comment-o'),
(72, 'fa-comments', 'fa fa-comments'),
(73, 'fa-comments-o', 'fa fa-comments-o'),
(74, 'fa-compass', 'fa fa-compass'),
(75, 'fa-copyright', 'fa fa-copyright'),
(76, 'fa-credit-card', 'fa fa-credit-card'),
(77, 'fa-crop', 'fa fa-crop'),
(78, 'fa-crosshairs', 'fa fa-crosshairs'),
(79, 'fa-cube', 'fa fa-cube'),
(80, 'fa-cubes', 'fa fa-cubes'),
(81, 'fa-cutlery', 'fa fa-cutlery'),
(82, 'fa-dashboard', 'fa fa-dashboard'),
(83, 'fa-database', 'fa fa-database'),
(84, 'fa-desktop', 'fa fa-desktop'),
(85, 'fa-dot-circle-o', 'fa fa-dot-circle-o'),
(86, 'fa-download', 'fa fa-download'),
(87, 'fa-edit', 'fa fa-edit'),
(88, 'fa-ellipsis-h', 'fa fa-ellipsis-h'),
(89, 'fa-ellipsis-v', 'fa fa-ellipsis-v'),
(90, 'fa-envelope', 'fa fa-envelope'),
(91, 'fa-envelope-o', 'fa fa-envelope-o'),
(92, 'fa-envelope-square', 'fa fa-envelope-square'),
(93, 'fa-eraser', 'fa fa-eraser'),
(94, 'fa-exchange', 'fa fa-exchange'),
(95, 'fa-exclamation', 'fa fa-exclamation'),
(96, 'fa-exclamation-circle', 'fa fa-exclamation-circle'),
(97, 'fa-exclamation-triangle', 'fa fa-exclamation-triangle'),
(98, 'fa-external-link', 'fa fa-external-link'),
(99, 'fa-external-link-square', 'fa fa-external-link-square'),
(100, 'fa-eye', 'fa fa-eye'),
(101, 'fa-eye-slash', 'fa fa-eye-slash'),
(102, 'fa-eyedropper', 'fa fa-eyedropper'),
(103, 'fa-fax', 'fa fa-fax'),
(104, 'fa-female', 'fa fa-female'),
(105, 'fa-fighter-jet', 'fa fa-fighter-jet'),
(106, 'fa-file-archive-o', 'fa fa-file-archive-o'),
(107, 'fa-file-audio-o', 'fa fa-file-audio-o'),
(108, 'fa-file-code-o', 'fa fa-file-code-o'),
(109, 'fa-file-excel-o', 'fa fa-file-excel-o'),
(110, 'fa-file-image-o', 'fa fa-file-image-o'),
(111, 'fa-file-movie-o', 'fa fa-file-movie-o'),
(112, 'fa-file-pdf-o', 'fa fa-file-pdf-o'),
(113, 'fa-file-photo-o', 'fa fa-file-photo-o'),
(114, 'fa-file-picture-o', 'fa fa-file-picture-o'),
(115, 'fa-file-powerpoint-o', 'fa fa-file-powerpoint-o'),
(116, 'fa-file-sound-o', 'fa fa-file-sound-o'),
(117, 'fa-file-video-o', 'fa fa-file-video-o'),
(118, 'fa-file-word-o', 'fa fa-file-word-o'),
(119, 'fa-file-zip-o', 'fa fa-file-zip-o'),
(120, 'fa-film', 'fa fa-film'),
(121, 'fa-filter', 'fa fa-filter'),
(122, 'fa-fire', 'fa fa-fire'),
(123, 'fa-fire-extinguisher', 'fa fa-fire-extinguisher'),
(124, 'fa-flag', 'fa fa-flag'),
(125, 'fa-flag-checkered', 'fa fa-flag-checkered'),
(126, 'fa-flag-o', 'fa fa-flag-o'),
(127, 'fa-flash', 'fa fa-flash'),
(128, 'fa-flask', 'fa fa-flask'),
(129, 'fa-folder', 'fa fa-folder'),
(130, 'fa-folder-o', 'fa fa-folder-o'),
(131, 'fa-folder-open', 'fa fa-folder-open'),
(132, 'fa-folder-open-o', 'fa fa-folder-open-o'),
(133, 'fa fa-frown-o', 'fa-frown-o'),
(134, 'fa fa-futbol-o', 'fa-futbol-o'),
(135, 'fa fa-gamepad', 'fa-gamepad'),
(136, 'fa fa-gavel', 'fa-gavel'),
(137, 'fa fa-gear', 'fa-gear'),
(138, 'fa fa-gears', 'fa-gears'),
(139, 'fa fa-gift', 'fa-gift'),
(140, 'fa fa-glass', 'fa-glass'),
(141, 'fa fa-globe', 'fa-globe'),
(142, 'fa fa-graduation-cap', 'fa-graduation-cap'),
(143, 'fa fa-group', 'fa-group'),
(144, 'fa fa-hdd-o', 'fa-hdd-o'),
(145, 'fa fa-headphones', 'fa-headphones'),
(146, 'fa fa-heart', 'fa-heart'),
(147, 'fa fa-heart-o', 'fa-heart-o'),
(148, 'fa fa-history', 'fa-history'),
(149, 'fa fa-home', 'fa-home'),
(150, 'fa fa-image', 'fa-image'),
(151, 'fa fa-inbox', 'fa-inbox'),
(152, 'fa fa-info', 'fa-info'),
(153, 'fa fa-info-circle', 'fa-info-circle'),
(154, 'fa fa-institution', 'fa-institution'),
(155, 'fa fa-key', 'fa-key'),
(156, 'fa fa-keyboard-o', 'fa-keyboard-o'),
(157, 'fa fa-language', 'fa-language'),
(158, 'fa fa-laptop', 'fa-laptop'),
(159, 'fa fa-leaf', 'fa-leaf'),
(160, 'fa fa-legal', 'fa-legal'),
(161, 'fa fa-lemon-o', 'fa-lemon-o'),
(162, 'fa fa-level-down', 'fa-level-down'),
(163, 'fa fa-level-up', 'fa-level-up'),
(164, 'fa fa-life-bouy', 'fa-life-bouy'),
(165, 'fa fa-life-buoy', 'fa-life-buoy'),
(166, 'fa fa-life-ring', 'fa-life-ring'),
(167, 'fa fa-life-saver', 'fa-life-saver'),
(168, 'fa fa-lightbulb-o', 'fa-lightbulb-o'),
(169, 'fa fa-line-chart', 'fa-line-chart'),
(170, 'fa fa-location-arrow', 'fa-location-arrow'),
(171, 'fa fa-lock', 'fa-lock'),
(172, 'fa fa-magic', 'fa-magic'),
(173, 'fa fa-magnet', 'fa-magnet'),
(174, 'fa fa-mail-forward', 'fa-mail-forward'),
(175, 'fa fa-mail-reply', 'fa-mail-reply'),
(176, 'fa fa-mail-reply-all', 'fa-mail-reply-all'),
(177, 'fa fa-male', 'fa-male'),
(178, 'fa fa-map-marker', 'fa-map-marker'),
(179, 'fa fa-meh-o', 'fa-meh-o'),
(180, 'fa fa-microphone', 'fa-microphone'),
(181, 'fa fa-microphone-slash', 'fa-microphone-slash'),
(182, 'fa fa-minus', 'fa-minus'),
(183, 'fa fa-minus-circle', 'fa-minus-circle'),
(184, 'fa fa-minus-square', 'fa-minus-square'),
(185, 'fa fa-minus-square-o', 'fa-minus-square-o'),
(186, 'fa fa-mobile', 'fa-mobile'),
(187, 'fa fa-mobile-phone', 'fa-mobile-phone'),
(188, 'fa fa-money', 'fa-money'),
(189, 'fa fa-moon-o', 'fa-moon-o'),
(190, 'fa fa-mortar-board', 'fa-mortar-board'),
(191, 'fa fa-music', 'fa-music'),
(192, 'fa fa-navicon', 'fa-navicon'),
(193, 'fa fa-newspaper-o', 'fa-newspaper-o'),
(194, 'fa fa-paint-brush', 'fa-paint-brush'),
(195, 'fa fa-paper-plane', 'fa-paper-plane'),
(196, 'fa fa-paper-plane-o', 'fa-paper-plane-o'),
(197, 'fa fa-paw', 'fa-paw'),
(198, 'fa fa-pencil', 'fa-pencil'),
(199, 'fa fa-pencil-square', 'fa-pencil-square'),
(200, 'fa fa-pencil-square-o', 'fa-pencil-square-o'),
(201, 'fa fa-phone', 'fa-phone'),
(202, 'fa fa-phone-square', 'fa-phone-square'),
(203, 'fa fa-photo', 'fa-photo'),
(204, 'fa fa-picture-o', 'fa-picture-o'),
(205, 'fa fa-pie-chart', 'fa-pie-chart'),
(206, 'fa fa-plane', 'fa-plane'),
(207, 'fa fa-plug', 'fa-plug'),
(208, 'fa fa-plus', 'fa-plus'),
(209, 'fa fa-plus-circle', 'fa-plus-circle'),
(210, 'fa fa-plus-square', 'fa-plus-square'),
(211, 'fa fa-plus-square-o', 'fa-plus-square-o'),
(212, 'fa fa-power-off', 'fa-power-off'),
(213, 'fa fa-print', 'fa-print'),
(214, 'fa fa-puzzle-piece', 'fa-puzzle-piece'),
(215, 'fa fa-qrcode', 'fa-qrcode'),
(216, 'fa fa-question', 'fa-question'),
(217, 'fa fa-question-circle', 'fa-question-circle'),
(218, 'fa fa-quote-left', 'fa-quote-left'),
(219, 'fa fa-quote-right', 'fa-quote-right'),
(220, 'fa fa-random', 'fa-random'),
(221, 'fa fa-recycle', 'fa-recycle'),
(222, 'fa fa-refresh', 'fa-refresh'),
(223, 'fa fa-remove', 'fa-remove'),
(224, 'fa fa-reorder', 'fa-reorder'),
(225, 'fa fa-reply', 'fa-reply'),
(226, 'fa fa-reply-all', 'fa-reply-all'),
(227, 'fa fa-retweet', 'fa-retweet'),
(228, 'fa fa-road', 'fa-road'),
(229, 'fa fa-rocket', 'fa-rocket'),
(230, 'fa fa-rss', 'fa-rss'),
(231, 'fa fa-rss-square', 'fa-rss-square'),
(232, 'fa fa-search', 'fa-search'),
(233, 'fa fa-search-minus', 'fa-search-minus'),
(234, 'fa fa-search-plus', 'fa-search-plus'),
(235, 'fa fa-send', 'fa-send'),
(236, 'fa fa-send-o', 'fa-send-o'),
(237, 'fa fa-share', 'fa-share'),
(238, 'fa fa-share-alt', 'fa-share-alt'),
(239, 'fa fa-share-alt-square', 'fa-share-alt-square'),
(240, 'fa fa-share-square', 'fa-share-square'),
(241, 'fa fa-share-square-o', 'fa-share-square-o'),
(242, 'fa fa-shield', 'fa-shield'),
(243, 'fa fa-shopping-cart', 'fa-shopping-cart'),
(244, 'fa fa-sign-in', 'fa-sign-in'),
(245, 'fa fa-sign-out', 'fa-sign-out'),
(246, 'fa fa-signal', 'fa-signal'),
(247, 'fa fa-sitemap', 'fa-sitemap'),
(248, 'fa fa-sliders', 'fa-sliders'),
(249, 'fa fa-smile-o', 'fa-smile-o'),
(250, 'fa fa-soccer-ball-o', 'fa-soccer-ball-o'),
(251, 'fa fa-sort', 'fa-sort'),
(252, 'fa fa-sort-alpha-asc', 'fa-sort-alpha-asc'),
(253, 'fa fa-sort-alpha-desc', 'fa-sort-alpha-desc'),
(254, 'fa fa-sort-amount-asc', 'fa-sort-amount-asc'),
(255, 'fa fa-sort-amount-desc', 'fa-sort-amount-desc'),
(256, 'fa fa-sort-asc', 'fa-sort-asc'),
(257, 'fa fa-sort-desc', 'fa-sort-desc'),
(258, 'fa fa-sort-down', 'fa-sort-down'),
(259, 'fa fa-sort-numeric-asc', 'fa-sort-numeric-asc'),
(260, 'fa fa-sort-numeric-desc', 'fa-sort-numeric-desc'),
(261, 'fa fa-sort-up', 'fa-sort-up'),
(262, 'fa fa-space-shuttle', 'fa-space-shuttle'),
(263, 'fa fa-spinner', 'fa-spinner'),
(264, 'fa fa-spoon', 'fa-spoon'),
(265, 'fa fa-square', 'fa-square'),
(266, 'fa fa-square-o', 'fa-square-o'),
(267, 'fa fa-star', 'fa-star'),
(268, 'fa fa-star-half', 'fa-star-half'),
(269, 'fa fa-star-half-empty', 'fa-star-half-empty'),
(270, 'fa fa-star-half-full', 'fa-star-half-full'),
(271, 'fa fa-star-half-o', 'fa-star-half-o'),
(272, 'fa fa-star-o', 'fa-star-o'),
(273, 'fa fa-suitcase', 'fa-suitcase'),
(274, 'fa fa-sun-o', 'fa-sun-o'),
(275, 'fa fa-support', 'fa-support'),
(276, 'fa fa-tablet', 'fa-tablet'),
(277, 'fa fa-tachometer', 'fa-tachometer'),
(278, 'fa fa-tag', 'fa-tag'),
(279, 'fa fa-tags', 'fa-tags'),
(280, 'fa fa-tasks', 'fa-tasks'),
(281, 'fa fa-taxi', 'fa-taxi'),
(282, 'fa fa-terminal', 'fa-terminal'),
(283, 'fa fa-thumb-tack', 'fa-thumb-tack'),
(284, 'fa fa-thumbs-down', 'fa-thumbs-down'),
(285, 'fa fa-thumbs-o-down', 'fa-thumbs-o-down'),
(286, 'fa fa-thumbs-o-up', 'fa-thumbs-o-up'),
(287, 'fa fa-thumbs-up', 'fa-thumbs-up'),
(288, 'fa fa-ticket', 'fa-ticket'),
(289, 'fa fa-times', 'fa-times'),
(290, 'fa fa-times-circle', 'fa-times-circle'),
(291, 'fa fa-times-circle-o', 'fa-times-circle-o'),
(292, 'fa fa-tint', 'fa-tint'),
(293, 'fa fa-toggle-down', 'fa-toggle-down'),
(294, 'fa fa-toggle-left', 'fa-toggle-left'),
(295, 'fa fa-toggle-off', 'fa-toggle-off'),
(296, 'fa fa-toggle-on', 'fa-toggle-on'),
(297, 'fa fa-toggle-right', 'fa-toggle-right'),
(298, 'fa fa-toggle-up', 'fa-toggle-up'),
(299, 'fa fa-trash', 'fa-trash'),
(300, 'fa fa-trash-o', 'fa-trash-o'),
(301, 'fa fa-tree', 'fa-tree'),
(302, 'fa fa-trophy', 'fa-trophy'),
(303, 'fa fa-truck', 'fa-truck'),
(304, 'fa fa-tty', 'fa-tty'),
(305, 'fa fa-umbrella', 'fa-umbrella'),
(306, 'fa fa-university', 'fa-university'),
(307, 'fa fa-unlock', 'fa-unlock'),
(308, 'fa fa-unlock-alt', 'fa-unlock-alt'),
(309, 'fa fa-unsorted', 'fa-unsorted'),
(310, 'fa fa-upload', 'fa-upload'),
(311, 'fa fa-user', 'fa-user'),
(312, 'fa fa-users', 'fa-users'),
(313, 'fa fa-video-camera', 'fa-video-camera'),
(314, 'fa fa-volume-down', 'fa-volume-down'),
(315, 'fa fa-volume-off', 'fa-volume-off'),
(316, 'fa fa-volume-up', 'fa-volume-up'),
(317, 'fa fa-warning', 'fa-warning'),
(318, 'fa fa-wheelchair', 'fa-wheelchair'),
(319, 'fa fa-wifi', 'fa-wifi'),
(320, 'fa fa-wrench', 'fa-wrench'),
(321, 'fa fa-file', 'fa-file'),
(322, 'fa fa-file-archive-o', 'fa-file-archive-o'),
(323, 'fa fa-file-audio-o', 'fa-file-audio-o'),
(324, 'fa fa-file-code-o', 'fa-file-code-o'),
(325, 'fa fa-file-excel-o', 'fa-file-excel-o'),
(326, 'fa fa-file-image-o', 'fa-file-image-o'),
(327, 'fa fa-file-movie-o', 'fa-file-movie-o'),
(328, 'fa fa-file-o', 'fa-file-o'),
(329, 'fa fa-file-pdf-o', 'fa-file-pdf-o'),
(330, 'fa fa-file-photo-o', 'fa-file-photo-o'),
(331, 'fa fa-file-picture-o', 'fa-file-picture-o'),
(332, 'fa fa-file-powerpoint-o', 'fa-file-powerpoint-o'),
(333, 'fa fa-file-sound-o', 'fa-file-sound-o'),
(334, 'fa fa-file-text', 'fa-file-text'),
(335, 'fa fa-file-text-o', 'fa-file-text-o'),
(336, 'fa fa-file-video-o', 'fa-file-video-o'),
(337, 'fa fa-file-word-o', 'fa-file-word-o'),
(338, 'fa fa-file-zip-o', 'fa-file-zip-o'),
(339, 'fa fa-info-circle fa-lg fa-li', 'fa-info-circle'),
(340, 'fa fa-circle-o-notch', 'fa-circle-o-notch'),
(341, 'fa fa-cog', 'fa-cog'),
(342, 'fa fa-gear', 'fa-gear'),
(343, 'fa fa-refresh', 'fa-refresh'),
(344, 'fa fa-spinner', 'fa-spinner'),
(345, 'fa fa-check-square', 'fa-check-square'),
(346, 'fa fa-check-square-o', 'fa-check-square-o'),
(347, 'fa fa-circle', 'fa-circle'),
(348, 'fa fa-circle-o', 'fa-circle-o'),
(349, 'fa fa-dot-circle-o', 'fa-dot-circle-o'),
(350, 'fa fa-minus-square', 'fa-minus-square'),
(351, 'fa fa-minus-square-o', 'fa-minus-square-o'),
(352, 'fa fa-plus-square', 'fa-plus-square'),
(353, 'fa fa-plus-square-o', 'fa-plus-square-o'),
(354, 'fa fa-square', 'fa-square'),
(355, 'fa fa-square-o', 'fa-square-o'),
(356, 'fa fa-cc-amex', 'fa-cc-amex'),
(357, 'fa fa-cc-discover', 'fa-cc-discover'),
(358, 'fa fa-cc-mastercard', 'fa-cc-mastercard'),
(359, 'fa fa-cc-paypal', 'fa-cc-paypal'),
(360, 'fa fa-cc-stripe', 'fa-cc-stripe'),
(361, 'fa fa-cc-visa', 'fa-cc-visa'),
(362, 'fa fa-credit-card', 'fa-credit-card'),
(363, 'fa fa-google-wallet', 'fa-google-wallet'),
(364, 'fa fa-paypal', 'fa-paypal'),
(365, 'fa fa-area-chart', 'fa-area-chart'),
(366, 'fa fa-bar-chart', 'fa-bar-chart'),
(367, 'fa fa-bar-chart-o', 'fa-bar-chart-o'),
(368, 'fa fa-line-chart', 'fa-line-chart'),
(369, 'fa fa-pie-chart', 'fa-pie-chart'),
(370, 'fa fa-bitcoin', 'fa-bitcoin'),
(371, 'fa fa-btc', 'fa-btc'),
(372, 'fa fa-cny', 'fa-cny'),
(373, 'fa fa-dollar', 'fa-dollar'),
(374, 'fa fa-eur', 'fa-eur'),
(375, 'fa fa-euro', 'fa-euro'),
(376, 'fa fa-gbp', 'fa-gbp'),
(377, 'fa fa-ils', 'fa-ils'),
(378, 'fa fa-inr', 'fa-inr'),
(379, 'fa fa-jpy', 'fa-jpy'),
(380, 'fa fa-krw', 'fa-krw'),
(381, 'fa fa-money', 'fa-money'),
(382, 'fa fa-rmb', 'fa-rmb'),
(383, 'fa fa-rouble', 'fa-rouble'),
(384, 'fa fa-rub', 'fa-rub'),
(385, 'fa fa-ruble', 'fa-ruble'),
(386, 'fa fa-rupee', 'fa-rupee'),
(387, 'fa fa-shekel', 'fa-shekel'),
(388, 'fa fa-sheqel', 'fa-sheqel'),
(389, 'fa fa-try', 'fa-try'),
(390, 'fa fa-turkish-lira', 'fa-turkish-lira'),
(391, 'fa fa-usd', 'fa-usd'),
(392, 'fa fa-won', 'fa-won'),
(393, 'fa fa-yen', 'fa-yen'),
(394, 'fa fa-align-center', 'fa-align-center'),
(395, 'fa fa-align-justify', 'fa-align-justify'),
(396, 'fa fa-align-left', 'fa-align-left'),
(397, 'fa fa-align-right', 'fa-align-right'),
(398, 'fa fa-bold', 'fa-bold'),
(399, 'fa fa-chain', 'fa-chain'),
(400, 'fa fa-chain-broken', 'fa-chain-broken'),
(401, 'fa fa-clipboard', 'fa-clipboard'),
(402, 'fa fa-columns', 'fa-columns'),
(403, 'fa fa-copy', 'fa-copy'),
(404, 'fa fa-cut', 'fa-cut'),
(405, 'fa fa-dedent', 'fa-dedent'),
(406, 'fa fa-eraser', 'fa-eraser'),
(407, 'fa fa-file', 'fa-file'),
(408, 'fa fa-file-o', 'fa-file-o'),
(409, 'fa fa-file-text', 'fa-file-text'),
(410, 'fa fa-file-text-o', 'fa-file-text-o'),
(411, 'fa fa-chevron-circle-up', 'fa-chevron-circle-up'),
(412, 'fa fa-chevron-down', 'fa-chevron-down'),
(413, 'fa fa-chevron-left', 'fa-chevron-left'),
(414, 'fa fa-chevron-right', 'fa-chevron-right'),
(415, 'fa fa-chevron-up', 'fa-chevron-up'),
(416, 'fa fa-hand-o-down', 'fa-hand-o-down'),
(417, 'fa fa-hand-o-left', 'fa-hand-o-left'),
(418, 'fa fa-hand-o-right', 'fa-hand-o-right'),
(419, 'fa fa-hand-o-up', 'fa-hand-o-up'),
(420, 'fa fa-long-arrow-down', 'fa-long-arrow-down'),
(421, 'fa fa-long-arrow-left', 'fa-long-arrow-left'),
(422, 'fa fa-long-arrow-right', 'fa-long-arrow-right'),
(423, 'fa fa-long-arrow-up', 'fa-long-arrow-up'),
(424, 'fa fa-toggle-down', 'fa-toggle-down'),
(425, 'fa fa-toggle-left', 'fa-toggle-left'),
(426, 'fa fa-toggle-right', 'fa-toggle-right'),
(427, 'fa fa-toggle-up', 'fa-toggle-up'),
(428, 'fa fa-arrows-alt', 'fa-arrows-alt'),
(429, 'fa fa-backward', 'fa-backward'),
(430, 'fa fa-compress', 'fa-compress'),
(431, 'fa fa-eject', 'fa-eject'),
(432, 'fa fa-expand', 'fa-expand'),
(433, 'fa fa-fast-backward', 'fa-fast-backward'),
(434, 'fa fa-fast-forward', 'fa-fast-forward'),
(435, 'fa fa-forward', 'fa-forward'),
(436, 'fa fa-pause', 'fa-pause'),
(437, 'fa fa-play', 'fa-play'),
(438, 'fa fa-play-circle', 'fa-play-circle'),
(439, 'fa fa-play-circle-o', 'fa-play-circle-o'),
(440, 'fa fa-step-backward', 'fa-step-backward'),
(441, 'fa fa-step-forward', 'fa-step-forward'),
(442, 'fa fa-stop', 'fa-stop'),
(443, 'fa fa-youtube-play', 'fa-youtube-play'),
(444, 'fa fa-adn', 'fa-adn'),
(445, 'fa fa-android', 'fa-android'),
(446, 'fa fa-angellist', 'fa-angellist'),
(447, 'fa fa-apple', 'fa-apple'),
(448, 'fa fa-behance', 'fa-behance'),
(449, 'fa fa-behance-square', 'fa-behance-square'),
(450, 'fa fa-bitbucket', 'fa-bitbucket'),
(451, 'fa fa-bitbucket-square', 'fa-bitbucket-square'),
(452, 'fa fa-bitcoin', 'fa-bitcoin'),
(453, 'fa fa-btc', 'fa-btc'),
(454, 'fa fa-cc-amex', 'fa-cc-amex'),
(455, 'fa fa-cc-discover', 'fa-cc-discover'),
(456, 'fa fa-cc-mastercard', 'fa-cc-mastercard'),
(457, 'fa fa-cc-paypal', 'fa-cc-paypal'),
(458, 'fa fa-cc-stripe', 'fa-cc-stripe'),
(459, 'fa fa-cc-visa', 'fa-cc-visa'),
(460, 'fa fa-codepen', 'fa-codepen'),
(461, 'fa fa-css3', 'fa-css3'),
(462, 'fa fa-delicious', 'fa-delicious'),
(463, 'fa fa-deviantart', 'fa-deviantart'),
(464, 'fa fa-digg', 'fa-digg'),
(465, 'fa fa-dribbble', 'fa-dribbble'),
(466, 'fa fa-dropbox', 'fa-dropbox'),
(467, 'fa fa-drupal', 'fa-drupal'),
(468, 'fa fa-empire', 'fa-empire'),
(469, 'fa fa-facebook', 'fa-facebook'),
(470, 'fa fa-facebook-square', 'fa-facebook-square'),
(471, 'fa fa-flickr', 'fa-flickr'),
(472, 'fa fa-foursquare', 'fa-foursquare'),
(473, 'fa fa-ge', 'fa-ge'),
(474, 'fa fa-git', 'fa-git'),
(475, 'fa fa-git-square', 'fa-git-square'),
(476, 'fa fa-github', 'fa-github'),
(477, 'fa fa-github-alt', 'fa-github-alt'),
(478, 'fa fa-github-square', 'fa-github-square'),
(479, 'fa fa-gittip', 'fa-gittip'),
(480, 'fa fa-google', 'fa-google'),
(481, 'fa fa-google-plus', 'fa-google-plus'),
(482, 'fa fa-google-plus-square', 'fa-google-plus-square'),
(483, 'fa fa-google-wallet', 'fa-google-wallet'),
(484, 'fa fa-hacker-news', 'fa-hacker-news'),
(485, 'fa fa-html5', 'fa-html5'),
(486, 'fa fa-files-o', 'fa-files-o'),
(487, 'fa fa-floppy-o', 'fa-floppy-o'),
(488, 'fa fa-font', 'fa-font'),
(489, 'fa fa-header', 'fa-header'),
(490, 'fa fa-indent', 'fa-indent'),
(491, 'fa fa-italic', 'fa-italic'),
(492, 'fa fa-link', 'fa-link'),
(493, 'fa fa-list', 'fa-list'),
(494, 'fa fa-list-alt', 'fa-list-alt'),
(495, 'fa fa-list-ol', 'fa-list-ol'),
(496, 'fa fa-list-ul', 'fa-list-ul'),
(497, 'fa fa-outdent', 'fa-outdent'),
(498, 'fa fa-paperclip', 'fa-paperclip'),
(499, 'fa fa-paragraph', 'fa-paragraph'),
(500, 'fa fa-paste', 'fa-paste'),
(501, 'fa fa-repeat', 'fa-repeat'),
(502, 'fa fa-rotate-left', 'fa-rotate-left'),
(503, 'fa fa-rotate-right', 'fa-rotate-right'),
(504, 'fa fa-save', 'fa-save'),
(505, 'fa fa-scissors', 'fa-scissors'),
(506, 'fa fa-strikethrough', 'fa-strikethrough'),
(507, 'fa fa-subscript', 'fa-subscript'),
(508, 'fa fa-superscript', 'fa-superscript'),
(509, 'fa fa-table', 'fa-table'),
(510, 'fa fa-text-height', 'fa-text-height'),
(511, 'fa fa-text-width', 'fa-text-width'),
(512, 'fa fa-th', 'fa-th'),
(513, 'fa fa-th-large', 'fa-th-large'),
(514, 'fa fa-th-list', 'fa-th-list'),
(515, 'fa fa-underline', 'fa-underline'),
(516, 'fa fa-undo', 'fa-undo'),
(517, 'fa fa-unlink', 'fa-unlink'),
(518, 'fa fa-angle-double-down', 'fa-angle-double-down'),
(519, 'fa fa-angle-double-left', 'fa-angle-double-left'),
(520, 'fa fa-angle-double-right', 'fa-angle-double-right'),
(521, 'fa fa-angle-double-up', 'fa-angle-double-up'),
(522, 'fa fa-angle-down', 'fa-angle-down'),
(523, 'fa fa-angle-left', 'fa-angle-left'),
(524, 'fa fa-angle-right', 'fa-angle-right'),
(525, 'fa fa-angle-up', 'fa-angle-up'),
(526, 'fa fa-arrow-circle-down', 'fa-arrow-circle-down'),
(527, 'fa fa-arrow-circle-left', 'fa-arrow-circle-left'),
(528, 'fa fa-arrow-circle-o-down', 'fa-arrow-circle-o-down'),
(529, 'fa fa-arrow-circle-o-left', 'fa-arrow-circle-o-left'),
(530, 'fa fa-arrow-circle-o-right', 'fa-arrow-circle-o-right'),
(531, 'fa fa-arrow-circle-o-up', 'fa-arrow-circle-o-up'),
(532, 'fa fa-arrow-circle-right', 'fa-arrow-circle-right'),
(533, 'fa fa-arrow-circle-up', 'fa-arrow-circle-up'),
(534, 'fa fa-arrow-down', 'fa-arrow-down'),
(535, 'fa fa-arrow-left', 'fa-arrow-left'),
(536, 'fa fa-arrow-right', 'fa-arrow-right'),
(537, 'fa fa-arrow-up', 'fa-arrow-up'),
(538, 'fa fa-arrows', 'fa-arrows'),
(539, 'fa fa-arrows-alt', 'fa-arrows-alt'),
(540, 'fa fa-arrows-h', 'fa-arrows-h'),
(541, 'fa fa-arrows-v', 'fa-arrows-v'),
(542, 'fa fa-caret-down', 'fa-caret-down'),
(543, 'fa fa-caret-left', 'fa-caret-left'),
(544, 'fa fa-caret-right', 'fa-caret-right'),
(545, 'fa fa-caret-square-o-down', 'fa-caret-square-o-down'),
(546, 'fa fa-caret-square-o-left', 'fa-caret-square-o-left'),
(547, 'fa fa-caret-square-o-right', 'fa-caret-square-o-right'),
(548, 'fa fa-caret-square-o-up', 'fa-caret-square-o-up'),
(549, 'fa fa-caret-up', 'fa-caret-up'),
(550, 'fa fa-chevron-circle-down', 'fa-chevron-circle-down'),
(551, 'fa fa-chevron-circle-left', 'fa-chevron-circle-left'),
(552, 'fa fa-chevron-circle-right', 'fa-chevron-circle-right'),
(553, 'fa fa-instagram', 'fa-instagram'),
(554, 'fa fa-ioxhost', 'fa-ioxhost'),
(555, 'fa fa-joomla', 'fa-joomla'),
(556, 'fa fa-jsfiddle', 'fa-jsfiddle'),
(557, 'fa fa-lastfm', 'fa-lastfm'),
(558, 'fa fa-lastfm-square', 'fa-lastfm-square'),
(559, 'fa fa-linkedin', 'fa-linkedin'),
(560, 'fa fa-linkedin-square', 'fa-linkedin-square'),
(561, 'fa fa-linux', 'fa-linux'),
(562, 'fa fa-maxcdn', 'fa-maxcdn'),
(563, 'fa fa-meanpath', 'fa-meanpath'),
(564, 'fa fa-openid', 'fa-openid'),
(565, 'fa fa-pagelines', 'fa-pagelines'),
(566, 'fa fa-paypal', 'fa-paypal'),
(567, 'fa fa-pied-piper', 'fa-pied-piper'),
(568, 'fa fa-pied-piper-alt', 'fa-pied-piper-alt'),
(569, 'fa fa-pinterest', 'fa-pinterest'),
(570, 'fa fa-pinterest-square', 'fa-pinterest-square'),
(571, 'fa fa-qq', 'fa-qq'),
(572, 'fa fa-ra', 'fa-ra'),
(573, 'fa fa-rebel', 'fa-rebel'),
(574, 'fa fa-reddit', 'fa-reddit'),
(575, 'fa fa-reddit-square', 'fa-reddit-square'),
(576, 'fa fa-renren', 'fa-renren'),
(577, 'fa fa-share-alt', 'fa-share-alt'),
(578, 'fa fa-share-alt-square', 'fa-share-alt-square'),
(579, 'fa fa-skype', 'fa-skype'),
(580, 'fa fa-slack', 'fa-slack'),
(581, 'fa fa-slideshare', 'fa-slideshare'),
(582, 'fa fa-soundcloud', 'fa-soundcloud'),
(583, 'fa fa-spotify', 'fa-spotify'),
(584, 'fa fa-stack-exchange', 'fa-stack-exchange'),
(585, 'fa fa-stack-overflow', 'fa-stack-overflow'),
(586, 'fa fa-steam', 'fa-steam'),
(587, 'fa fa-steam-square', 'fa-steam-square'),
(588, 'fa fa-stumbleupon', 'fa-stumbleupon'),
(589, 'fa fa-stumbleupon-circle', 'fa-stumbleupon-circle'),
(590, 'fa fa-tencent-weibo', 'fa-tencent-weibo'),
(591, 'fa fa-trello', 'fa-trello'),
(592, 'fa fa-tumblr', 'fa-tumblr'),
(593, 'fa fa-tumblr-square', 'fa-tumblr-square'),
(594, 'fa fa-twitch', 'fa-twitch'),
(595, 'fa fa-twitter', 'fa-twitter'),
(596, 'fa fa-twitter-square', 'fa-twitter-square'),
(597, 'fa fa-vimeo-square', 'fa-vimeo-square'),
(598, 'fa fa-vine', 'fa-vine'),
(599, 'fa fa-vk', 'fa-vk'),
(600, 'fa fa-wechat', 'fa-wechat'),
(601, 'fa fa-weibo', 'fa-weibo'),
(602, 'fa fa-weixin', 'fa-weixin'),
(603, 'fa fa-windows', 'fa-windows'),
(604, 'fa fa-wordpress', 'fa-wordpress'),
(605, 'fa fa-xing', 'fa-xing'),
(606, 'fa fa-xing-square', 'fa-xing-square'),
(607, 'fa fa-yahoo', 'fa-yahoo'),
(608, 'fa fa-yelp', 'fa-yelp'),
(609, 'fa fa-youtube', 'fa-youtube'),
(610, 'fa fa-youtube-play', 'fa-youtube-play'),
(611, 'fa fa-youtube-square', 'fa-youtube-square'),
(612, 'fa fa-ambulance', 'fa-ambulance'),
(613, 'fa fa-h-square', 'fa-h-square'),
(614, 'fa fa-hospital-o', 'fa-hospital-o'),
(615, 'fa fa-medkit', 'fa-medkit'),
(616, 'fa fa-plus-square', 'fa-plus-square'),
(617, 'fa fa-stethoscope', 'fa-stethoscope'),
(618, 'fa fa-user-md', 'fa-user-md'),
(619, 'fa fa-wheelchair', 'fa-wheelchair');

-- --------------------------------------------------------

--
-- Table structure for table `mst_item_status`
--

CREATE TABLE `mst_item_status` (
  `item_status_id` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `item_status_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rules` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_loan` smallint(6) NOT NULL DEFAULT '0',
  `skip_stock_take` smallint(6) NOT NULL DEFAULT '0',
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `mst_item_type`
--

CREATE TABLE `mst_item_type` (
  `item_type_id` int(11) NOT NULL,
  `item_type_code` varchar(3) DEFAULT NULL,
  `item_type_name` varchar(30) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_item_type`
--

INSERT INTO `mst_item_type` (`item_type_id`, `item_type_code`, `item_type_name`, `input_date`, `last_update`) VALUES
(1, 'BS', 'Bachelor\'s Thesis', '2020-05-10', '2020-05-10'),
(3, 'THS', 'Master\'s Thesis', '2020-05-10', '2020-05-10'),
(5, 'DSR', 'Dissertation', '2020-05-15', '2020-05-15'),
(6, 'OTH', 'Other', '2020-06-10', '2020-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `mst_label`
--

CREATE TABLE `mst_label` (
  `label_id` int(11) NOT NULL,
  `label_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `label_desc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `label_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `mst_language`
--

CREATE TABLE `mst_language` (
  `language_id` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `language_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mst_language`
--

INSERT INTO `mst_language` (`language_id`, `language_name`, `input_date`, `last_update`) VALUES
('id', 'Indonesia', '2017-08-16', '2017-08-16'),
('en', 'English', '2017-08-16', '2017-08-16'),
('KOR', 'Korean', '2026-08-31', '2026-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `mst_license`
--

CREATE TABLE `mst_license` (
  `license_id` int(11) NOT NULL,
  `license_name` varchar(100) NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_license`
--

INSERT INTO `mst_license` (`license_id`, `license_name`, `input_date`, `last_update`) VALUES
(1, 'Universitas Hasanudin', '2026-08-31', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_loan_rules`
--

CREATE TABLE `mst_loan_rules` (
  `loan_rules_id` int(11) NOT NULL,
  `member_type_id` int(11) NOT NULL DEFAULT '0',
  `coll_type_id` int(11) DEFAULT '0',
  `gmd_id` int(11) DEFAULT '0',
  `loan_limit` int(11) DEFAULT '0',
  `loan_periode` int(11) DEFAULT '0',
  `reborrow_limit` int(11) DEFAULT '0',
  `fine_each_day` int(11) DEFAULT '0',
  `grace_periode` int(11) DEFAULT '0',
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `mst_location`
--

CREATE TABLE `mst_location` (
  `location_id` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `location_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `mst_member_type`
--

CREATE TABLE `mst_member_type` (
  `member_type_id` int(11) NOT NULL,
  `member_type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `loan_limit` int(11) NOT NULL,
  `loan_periode` int(11) NOT NULL,
  `enable_reserve` int(11) NOT NULL DEFAULT '0',
  `reserve_limit` int(11) NOT NULL DEFAULT '0',
  `member_periode` int(11) NOT NULL,
  `reborrow_limit` int(11) NOT NULL,
  `fine_each_day` int(11) NOT NULL,
  `grace_periode` int(11) DEFAULT '0',
  `input_date` date NOT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mst_member_type`
--

INSERT INTO `mst_member_type` (`member_type_id`, `member_type_name`, `loan_limit`, `loan_periode`, `enable_reserve`, `reserve_limit`, `member_periode`, `reborrow_limit`, `fine_each_day`, `grace_periode`, `input_date`, `last_update`) VALUES
(1, 'Standard', 3, 7, 1, 3, 365, 0, 0, 0, '2026-08-31', '2026-08-31'),
(2, 'Mahasiswa', 3, 7, 1, 3, 365, 0, 0, 0, '2026-08-31', '2026-08-31'),
(3, 'Dosen', 5, 14, 1, 5, 365, 0, 0, 0, '2026-08-31', '2026-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `mst_menu`
--

CREATE TABLE `mst_menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `type` enum('menu','submenu','title') NOT NULL,
  `level` int(11) NOT NULL,
  `desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`id`, `parent_id`, `title`, `url`, `icon`, `type`, `level`, `desc`) VALUES
(1, NULL, 'Pinned', NULL, 'fa-thumb-tack', 'menu', 1, NULL),
(2, 1, 'Update User Profile', 'profile', NULL, 'submenu', 3, NULL),
(3, NULL, 'Dashboard', 'home', 'fa-bar-chart-o', 'menu', 1, NULL),
(4, NULL, 'Opac', 'opac', 'fa-desktop', 'menu', 1, NULL),
(5, NULL, 'ETD', NULL, 'fa-book', 'menu', 1, NULL),
(6, 5, 'Bibliography', '#', NULL, 'title', 2, NULL),
(7, 6, 'Etd List', 'bibliography', NULL, 'submenu', 3, NULL),
(8, NULL, 'Membership', NULL, 'fa-user', 'menu', 1, NULL),
(9, 8, 'Membership', NULL, NULL, 'title', 2, NULL),
(10, 9, 'List Membership', 'membership', NULL, 'submenu', 3, NULL),
(11, 9, 'Member Type', 'membership/membertype', NULL, 'submenu', 3, NULL),
(12, NULL, 'Master File', NULL, 'fa-file', 'menu', 1, NULL),
(13, 12, 'List Controlled', NULL, NULL, 'title', 2, NULL),
(14, 13, 'GMD', 'master/gmd', NULL, 'submenu', 3, NULL),
(15, 13, 'Publisher', 'master/penerbit', NULL, 'submenu', 3, NULL),
(16, 13, 'Writer', 'master/pengarang', NULL, 'submenu', 3, NULL),
(17, 13, 'Supervisor', 'master/supervisor', NULL, 'submenu', 3, NULL),
(18, 13, 'Examiner', 'master/examiner', NULL, 'submenu', 3, NULL),
(19, 13, 'Location', 'master/location', NULL, 'submenu', 3, NULL),
(20, 12, 'References', NULL, NULL, 'title', 2, NULL),
(21, 20, 'Places', 'master/place', NULL, 'submenu', 3, NULL),
(22, 20, 'Exemplar State', 'master/statusitem', NULL, 'submenu', 3, NULL),
(23, 20, 'Collection Type', 'master/collection', NULL, 'submenu', 3, NULL),
(24, 20, 'Language', 'master/language', NULL, 'submenu', 3, NULL),
(25, 20, 'Frequency', 'master/frequency', NULL, 'submenu', 3, NULL),
(26, 12, 'License', 'master/license', NULL, 'submenu', 3, NULL),
(27, 12, 'Code Ministry PDDIKTI', 'master/codeministry', NULL, 'submenu', 3, NULL),
(28, 12, 'Subject', 'master/subject', NULL, 'submenu', 3, NULL),
(29, NULL, 'System', NULL, 'fa-sitemap', 'menu', 1, NULL),
(30, 28, 'System', NULL, NULL, 'title', 2, NULL),
(31, 29, 'System Configuration', 'sistem/pengaturan-sistem', NULL, 'submenu', 3, NULL),
(32, 29, 'Content', 'sistem/konten', NULL, 'submenu', 3, NULL),
(33, 29, 'Shortcut', 'sistem/pintasan', NULL, 'submenu', 3, NULL),
(34, 29, 'Biblio Index', 'sistem/indeks-biblio', NULL, 'submenu', 3, NULL),
(35, 29, 'Modules', 'sistem/modul', NULL, 'submenu', 3, NULL),
(36, 29, 'Libarian System', 'sistem/pustakawan', NULL, 'submenu', 3, NULL),
(37, 29, 'User Groups', 'sistem/user-groups', NULL, 'submenu', 3, NULL),
(38, 29, 'Format Scan Generator', '', NULL, 'submenu', 3, NULL),
(39, 29, 'Sys Log', 'sistem/logs', NULL, 'submenu', 3, NULL),
(40, 29, 'Backup Data', 'sistem/backups', NULL, 'submenu', 3, NULL),
(41, NULL, 'Reporting', NULL, 'fa-table', 'menu', 1, NULL),
(42, 40, 'Reporting', NULL, NULL, 'title', 2, NULL),
(43, 41, 'Statistic Collection', 'report/stats-collection', NULL, 'submenu', 3, NULL),
(44, 41, 'Membership Report', 'report/membership', NULL, 'submenu', 3, NULL),
(45, 40, 'Other Report', NULL, NULL, 'title', 2, NULL),
(46, 44, 'Recapitulation', 'report/recap', NULL, 'submenu', 3, NULL),
(47, 44, 'List Title', 'report/titles', NULL, 'submenu', 3, NULL),
(48, 44, 'List Membership', 'report/list-member', NULL, 'submenu', 3, NULL),
(49, 44, 'Contributor List', 'report/contributors', NULL, 'submenu', 3, NULL),
(50, 44, 'Staff Activity', 'report/staff-activity', NULL, 'submenu', 3, NULL),
(51, 44, 'Visitor', 'report/visitor', NULL, 'submenu', 3, NULL),
(52, 44, 'Visualize Diagram', '#', NULL, 'submenu', 3, NULL),
(53, NULL, 'Logout', 'logout', 'fa-power-off', 'menu', 1, NULL),
(54, 41, 'Download Counter', 'report/download-counter', NULL, 'submenu', 3, NULL),
(60, NULL, 'Submission', NULL, 'fa-cloud-upload', 'menu', 1, NULL),
(61, 60, 'Submission', NULL, NULL, 'title', 2, NULL),
(62, 61, 'Dashboard Submission', 'submission/dashboard', NULL, 'submenu', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_module`
--

CREATE TABLE `mst_module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `module_path` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mst_module`
--

INSERT INTO `mst_module` (`module_id`, `module_name`, `module_path`, `module_desc`) VALUES
(1, 'ETD', 'bibliography', 'Manage your bibliographic/catalog and items/copies database'),
(3, 'membership', 'membership', 'Manage your library membership and membership type'),
(4, 'master_file', 'master_file', 'Manage your referential data that will be used by other modules'),
(6, 'system', 'system', 'Configure system behaviour, user and backups'),
(7, 'reporting', 'reporting', 'Real time and dynamic report about library collections and circulation');

-- --------------------------------------------------------

--
-- Table structure for table `mst_place`
--

CREATE TABLE `mst_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `mst_publisher`
--

CREATE TABLE `mst_publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `mst_supervisor`
--

CREATE TABLE `mst_supervisor` (
  `supervisor_id` int(11) NOT NULL,
  `supervisor_name` varchar(100) DEFAULT NULL,
  `supervisor_number` varchar(100) NOT NULL,
  `supervisor_year` varchar(20) DEFAULT NULL,
  `supervisor_type` enum('p','o','c') DEFAULT NULL,
  `supervisor_list` varchar(20) DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Table structure for table `mst_supplier`
--

CREATE TABLE `mst_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` char(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` char(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account` char(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e_mail` char(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `mst_topic`
--

CREATE TABLE `mst_topic` (
  `topic_id` int(11) NOT NULL,
  `topic` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `topic_type` enum('t','g','n','tm','gr','oc') COLLATE utf8_unicode_ci NOT NULL,
  `auth_list` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classification` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Classification Code',
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` int(11) NOT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `biblio_id` int(11) NOT NULL,
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `reserve_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `search_biblio`
--

CREATE TABLE `search_biblio` (
  `biblio_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `edition` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isbn_issn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` text COLLATE utf8_unicode_ci,
  `examiner` text COLLATE utf8_unicode_ci,
  `supervisor` text COLLATE utf8_unicode_ci,
  `contributor` text COLLATE utf8_unicode_ci,
  `topic` text COLLATE utf8_unicode_ci,
  `gmd` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_place` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classification` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spec_detail_info` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `publish_year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `series_title` text COLLATE utf8_unicode_ci,
  `items` text COLLATE utf8_unicode_ci,
  `collection_types` text COLLATE utf8_unicode_ci,
  `call_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opac_hide` smallint(1) NOT NULL DEFAULT '0',
  `promoted` smallint(1) NOT NULL DEFAULT '0',
  `labels` text COLLATE utf8_unicode_ci,
  `collation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='index table for advance searching technique for SLiMS' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE `serial` (
  `serial_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `period` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `biblio_id` int(11) DEFAULT NULL,
  `gmd_id` int(11) DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `stock_take`
--

CREATE TABLE `stock_take` (
  `stock_take_id` int(11) NOT NULL,
  `stock_take_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `init_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total_item_stock_taked` int(11) DEFAULT NULL,
  `total_item_lost` int(11) DEFAULT NULL,
  `total_item_exists` int(11) DEFAULT '0',
  `total_item_loan` int(11) DEFAULT NULL,
  `stock_take_users` mediumtext COLLATE utf8_unicode_ci,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `report_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `stock_take_item`
--

CREATE TABLE `stock_take_item` (
  `stock_take_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gmd_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classification` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coll_type_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `call_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('e','m','u','l') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'm',
  `checked_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE `system_log` (
  `log_id` int(11) NOT NULL,
  `log_type` enum('staff','member','system') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'staff',
  `id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `log_msg` text COLLATE utf8_unicode_ci NOT NULL,
  `log_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `setting_id` int(11) NOT NULL,
  `setting_key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8mb4_unicode_ci,
  `setting_type` enum('string','number','boolean','json') COLLATE utf8mb4_unicode_ci DEFAULT 'string',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `realname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` smallint(6) DEFAULT NULL,
  `user_image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_media` text COLLATE utf8_unicode_ci,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `groups` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`group_id`, `group_name`, `input_date`, `last_update`) VALUES
(1, 'Administrator', '2017-08-16', '2017-08-16'),
(2, 'admin', '2017-11-12', '2017-11-12'),
(3, 'Operator', '2020-05-15', '2020-05-15'),
(4, 'User', '2020-05-15', '2020-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_count`
--

CREATE TABLE `visitor_count` (
  `visitor_id` int(11) NOT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institution` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `checkin_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `xu_approval_settings`
--

CREATE TABLE `xu_approval_settings` (
  `id` int(11) NOT NULL,
  `require_pembimbing` tinyint(1) DEFAULT '1',
  `require_penguji` tinyint(1) DEFAULT '0',
  `require_admin` tinyint(1) DEFAULT '1',
  `wa_template_pemberitahuan` text,
  `wa_template_persetujuan` text,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `xu_approval_step`
--

CREATE TABLE `xu_approval_step` (
  `step_id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `stage_order` tinyint(4) NOT NULL DEFAULT '1',
  `stage_name` varchar(50) NOT NULL,
  `approver_name` varchar(100) DEFAULT NULL,
  `approver_email` varchar(100) DEFAULT NULL,
  `approver_phone` varchar(20) DEFAULT NULL,
  `token` varchar(64) NOT NULL,
  `status` enum('pending','setuju','revisi','tolak') DEFAULT 'pending',
  `note` text,
  `acted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `xu_fingerprint`
--

CREATE TABLE `xu_fingerprint` (
  `fingerprint_id` int(11) NOT NULL,
  `biblio_id` int(11) NOT NULL,
  `text_hash` char(64) NOT NULL COMMENT 'SHA256 dari teks mentah',
  `word_count` int(11) DEFAULT '0',
  `unique_words` int(11) DEFAULT '0',
  `ttr` decimal(5,4) DEFAULT '0.0000' COMMENT 'Type-Token Ratio',
  `entropy` decimal(6,4) DEFAULT '0.0000' COMMENT 'Shannon entropy',
  `burstiness` decimal(6,4) DEFAULT '0.0000' COMMENT 'Std dev panjang kalimat',
  `avg_sentence_len` decimal(6,2) DEFAULT '0.00',
  `lexical_density` decimal(5,4) DEFAULT '0.0000',
  `ngram_signature` mediumtext COMMENT 'JSON hash set n-gram',
  `scan_count` int(11) DEFAULT '1',
  `first_scanned` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_scanned` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `xu_plagiarism_checks`
--

CREATE TABLE `xu_plagiarism_checks` (
  `check_id` int(11) NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `similarity_score` decimal(5,2) NOT NULL DEFAULT '0.00',
  `threshold` decimal(5,2) NOT NULL DEFAULT '25.00',
  `status` enum('lulus','gagal') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'gagal',
  `matches_json` text COLLATE utf8_unicode_ci,
  `snippets_json` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `xu_plagiarism_fingerprints`
--

CREATE TABLE `xu_plagiarism_fingerprints` (
  `fp_id` int(11) NOT NULL,
  `biblio_id` int(11) NOT NULL,
  `sig_text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hash_count` int(11) NOT NULL DEFAULT '0',
  `word_count` int(11) NOT NULL DEFAULT '0',
  `source_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xu_reg_settings`
--

CREATE TABLE `xu_reg_settings` (
  `id` int(11) NOT NULL,
  `reg_open` tinyint(1) NOT NULL DEFAULT '1',
  `warna_mahasiswa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'biru',
  `warna_dosen` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'merah',
  `warna_staff` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'merah',
  `wa_template` text COLLATE utf8mb4_unicode_ci,
  `input_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `xu_scan_history`
--

CREATE TABLE `xu_scan_history` (
  `scan_id` int(11) NOT NULL,
  `biblio_id` int(11) NOT NULL,
  `scan_type` enum('similarity','ai_writing','full') DEFAULT 'full',
  `similarity_score` decimal(5,2) DEFAULT '0.00',
  `ai_risk_score` decimal(5,2) DEFAULT '0.00',
  `top_match_biblio_id` int(11) DEFAULT NULL,
  `top_match_title` varchar(255) DEFAULT NULL,
  `top_match_percent` decimal(5,2) DEFAULT '0.00',
  `indicators` mediumtext COMMENT 'JSON detail indikator',
  `scanned_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `xu_similarity_pairs`
--

CREATE TABLE `xu_similarity_pairs` (
  `pair_id` int(11) NOT NULL,
  `biblio_a` int(11) NOT NULL,
  `biblio_b` int(11) NOT NULL,
  `jaccard_score` decimal(5,4) DEFAULT '0.0000',
  `ngram_overlap` int(11) DEFAULT '0',
  `shared_fragments` mediumtext COMMENT 'JSON cuplikan teks mirip',
  `compared_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `xu_submission`
--

CREATE TABLE `xu_submission` (
  `submission_id` int(11) NOT NULL,
  `biblio_id` int(11) NOT NULL,
  `member_id` varchar(30) DEFAULT NULL,
  `student_name` varchar(150) DEFAULT NULL,
  `current_stage` enum('pembimbing','penguji','admin','selesai') DEFAULT 'pembimbing',
  `status` enum('menunggu','revisi','disetujui','ditolak','terbit') DEFAULT 'menunggu',
  `note` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `yudisium_checklist`
--

CREATE TABLE `yudisium_checklist` (
  `checklist_id` int(11) NOT NULL,
  `student_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `biblio_id` int(11) DEFAULT NULL,
  `check_document_submitted` tinyint(1) DEFAULT '0',
  `check_document_approved` tinyint(1) DEFAULT '0',
  `check_similarity_ok` tinyint(1) DEFAULT '0',
  `check_similarity_score` decimal(5,2) DEFAULT NULL,
  `check_library_clearance` tinyint(1) DEFAULT '0',
  `check_admin_approved` tinyint(1) DEFAULT '0',
  `overall_status` enum('belum_lengkap','pending','lulus') COLLATE utf8_unicode_ci DEFAULT 'belum_lengkap',
  `last_checked` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backup_log`
--
ALTER TABLE `backup_log`
  ADD PRIMARY KEY (`backup_log_id`) USING BTREE;

--
-- Indexes for table `biblio`
--
ALTER TABLE `biblio`
  ADD PRIMARY KEY (`biblio_id`) USING BTREE,
  ADD KEY `references_idx` (`gmd_id`,`publisher_id`,`language_id`,`publish_place_id`) USING BTREE,
  ADD KEY `classification` (`classification`) USING BTREE,
  ADD KEY `biblio_flag_idx` (`opac_hide`,`promoted`) USING BTREE,
  ADD KEY `uid` (`uid`) USING BTREE,
  ADD KEY `idx_approval` (`approval_status`);
ALTER TABLE `biblio` ADD FULLTEXT KEY `title_ft_idx` (`title`,`series_title`);
ALTER TABLE `biblio` ADD FULLTEXT KEY `notes_ft_idx` (`notes`);
ALTER TABLE `biblio` ADD FULLTEXT KEY `labels` (`labels`);

--
-- Indexes for table `biblio_attachment`
--
ALTER TABLE `biblio_attachment`
  ADD KEY `biblio_id` (`biblio_id`) USING BTREE,
  ADD KEY `file_id` (`file_id`) USING BTREE,
  ADD KEY `biblio_id_2` (`biblio_id`,`file_id`) USING BTREE;

--
-- Indexes for table `biblio_author`
--
ALTER TABLE `biblio_author`
  ADD PRIMARY KEY (`biblio_id`,`author_id`) USING BTREE;

--
-- Indexes for table `biblio_certificates`
--
ALTER TABLE `biblio_certificates`
  ADD PRIMARY KEY (`cert_id`),
  ADD UNIQUE KEY `certificate_no` (`certificate_no`),
  ADD KEY `idx_biblio` (`biblio_id`),
  ADD KEY `idx_cert_no` (`certificate_no`);

--
-- Indexes for table `biblio_contributor`
--
ALTER TABLE `biblio_contributor`
  ADD PRIMARY KEY (`biblio_id`,`contributor_id`) USING BTREE;

--
-- Indexes for table `biblio_count`
--
ALTER TABLE `biblio_count`
  ADD KEY `biblio_id` (`biblio_id`) USING BTREE,
  ADD KEY `biblio_id_2` (`biblio_id`,`file_id`) USING BTREE,
  ADD KEY `file_id` (`file_id`) USING BTREE;

--
-- Indexes for table `biblio_custom`
--
ALTER TABLE `biblio_custom`
  ADD PRIMARY KEY (`biblio_id`) USING BTREE;

--
-- Indexes for table `biblio_examiner`
--
ALTER TABLE `biblio_examiner`
  ADD PRIMARY KEY (`biblio_id`,`examiner_id`) USING BTREE;

--
-- Indexes for table `biblio_supervisor`
--
ALTER TABLE `biblio_supervisor`
  ADD PRIMARY KEY (`biblio_id`,`supervisor_id`) USING BTREE;

--
-- Indexes for table `biblio_topic`
--
ALTER TABLE `biblio_topic`
  ADD PRIMARY KEY (`biblio_id`,`topic_id`) USING BTREE;

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`) USING BTREE;

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`) USING BTREE,
  ADD UNIQUE KEY `content_path` (`content_path`) USING BTREE;
ALTER TABLE `content` ADD FULLTEXT KEY `content_title` (`content_title`);
ALTER TABLE `content` ADD FULLTEXT KEY `content_desc` (`content_desc`);

--
-- Indexes for table `dosen_bkd_rekap`
--
ALTER TABLE `dosen_bkd_rekap`
  ADD PRIMARY KEY (`rekap_id`),
  ADD UNIQUE KEY `uq_dosen_semester` (`dosen_id`,`semester`),
  ADD KEY `idx_semester` (`semester`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`) USING BTREE;
ALTER TABLE `files` ADD FULLTEXT KEY `file_name` (`file_name`);
ALTER TABLE `files` ADD FULLTEXT KEY `file_dir` (`file_dir`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`fines_id`) USING BTREE,
  ADD KEY `member_id` (`member_id`) USING BTREE;

--
-- Indexes for table `group_access`
--
ALTER TABLE `group_access`
  ADD PRIMARY KEY (`group_id`,`module_id`) USING BTREE;

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`holiday_id`) USING BTREE,
  ADD UNIQUE KEY `holiday_dayname` (`holiday_dayname`,`holiday_date`) USING BTREE;

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`) USING BTREE,
  ADD UNIQUE KEY `item_code` (`item_code`) USING BTREE,
  ADD KEY `item_references_idx` (`coll_type_id`,`location_id`,`item_status_id`) USING BTREE,
  ADD KEY `uid` (`uid`) USING BTREE,
  ADD KEY `biblio_id_idx` (`biblio_id`) USING BTREE;

--
-- Indexes for table `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`kardex_id`) USING BTREE,
  ADD KEY `fk_serial` (`serial_id`) USING BTREE;

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`) USING BTREE,
  ADD KEY `item_code` (`item_code`) USING BTREE,
  ADD KEY `member_id` (`member_id`) USING BTREE;

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `idx_username` (`username`),
  ADD KEY `idx_ip` (`ip_address`),
  ADD KEY `idx_login_time` (`login_time`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `long_pattern`
--
ALTER TABLE `long_pattern`
  ADD PRIMARY KEY (`pattern_id`) USING BTREE,
  ADD UNIQUE KEY `pattern_prefix` (`pattern_prefix`,`pattern_suffix`) USING BTREE;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`) USING BTREE,
  ADD KEY `member_name` (`member_name`) USING BTREE,
  ADD KEY `member_type_id` (`member_type_id`) USING BTREE;

--
-- Indexes for table `member_custom`
--
ALTER TABLE `member_custom`
  ADD PRIMARY KEY (`member_id`) USING BTREE;

--
-- Indexes for table `member_type`
--
ALTER TABLE `member_type`
  ADD PRIMARY KEY (`member_type_id`);

--
-- Indexes for table `mst_author`
--
ALTER TABLE `mst_author`
  ADD PRIMARY KEY (`author_id`) USING BTREE,
  ADD UNIQUE KEY `author_name` (`author_name`,`authority_type`) USING BTREE;

--
-- Indexes for table `mst_code_ministry`
--
ALTER TABLE `mst_code_ministry`
  ADD PRIMARY KEY (`code_ministry`) USING BTREE;

--
-- Indexes for table `mst_coll_type`
--
ALTER TABLE `mst_coll_type`
  ADD PRIMARY KEY (`coll_type_id`) USING BTREE,
  ADD UNIQUE KEY `coll_type_name` (`coll_type_name`) USING BTREE;

--
-- Indexes for table `mst_contributor`
--
ALTER TABLE `mst_contributor`
  ADD PRIMARY KEY (`contributor_id`) USING BTREE;

--
-- Indexes for table `mst_copyright`
--
ALTER TABLE `mst_copyright`
  ADD PRIMARY KEY (`copyright_id`) USING BTREE;

--
-- Indexes for table `mst_examiner`
--
ALTER TABLE `mst_examiner`
  ADD PRIMARY KEY (`examiner_id`) USING BTREE;

--
-- Indexes for table `mst_frequency`
--
ALTER TABLE `mst_frequency`
  ADD PRIMARY KEY (`frequency_id`) USING BTREE;

--
-- Indexes for table `mst_gmd`
--
ALTER TABLE `mst_gmd`
  ADD PRIMARY KEY (`gmd_id`) USING BTREE,
  ADD UNIQUE KEY `gmd_name` (`gmd_name`) USING BTREE,
  ADD UNIQUE KEY `gmd_code` (`gmd_code`) USING BTREE;

--
-- Indexes for table `mst_icon`
--
ALTER TABLE `mst_icon`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `mst_item_status`
--
ALTER TABLE `mst_item_status`
  ADD PRIMARY KEY (`item_status_id`) USING BTREE,
  ADD UNIQUE KEY `item_status_name` (`item_status_name`) USING BTREE;

--
-- Indexes for table `mst_item_type`
--
ALTER TABLE `mst_item_type`
  ADD PRIMARY KEY (`item_type_id`) USING BTREE;

--
-- Indexes for table `mst_label`
--
ALTER TABLE `mst_label`
  ADD PRIMARY KEY (`label_id`) USING BTREE,
  ADD UNIQUE KEY `label_name` (`label_name`) USING BTREE;

--
-- Indexes for table `mst_language`
--
ALTER TABLE `mst_language`
  ADD PRIMARY KEY (`language_id`) USING BTREE,
  ADD UNIQUE KEY `language_name` (`language_name`) USING BTREE;

--
-- Indexes for table `mst_license`
--
ALTER TABLE `mst_license`
  ADD PRIMARY KEY (`license_id`) USING BTREE;

--
-- Indexes for table `mst_loan_rules`
--
ALTER TABLE `mst_loan_rules`
  ADD PRIMARY KEY (`loan_rules_id`) USING BTREE;

--
-- Indexes for table `mst_location`
--
ALTER TABLE `mst_location`
  ADD PRIMARY KEY (`location_id`) USING BTREE,
  ADD UNIQUE KEY `location_name` (`location_name`) USING BTREE;

--
-- Indexes for table `mst_member_type`
--
ALTER TABLE `mst_member_type`
  ADD PRIMARY KEY (`member_type_id`) USING BTREE,
  ADD UNIQUE KEY `member_type_name` (`member_type_name`) USING BTREE;

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `parent_id` (`parent_id`) USING BTREE;

--
-- Indexes for table `mst_module`
--
ALTER TABLE `mst_module`
  ADD PRIMARY KEY (`module_id`) USING BTREE,
  ADD UNIQUE KEY `module_name` (`module_name`,`module_path`) USING BTREE;

--
-- Indexes for table `mst_place`
--
ALTER TABLE `mst_place`
  ADD PRIMARY KEY (`place_id`) USING BTREE,
  ADD UNIQUE KEY `place_name` (`place_name`) USING BTREE;

--
-- Indexes for table `mst_publisher`
--
ALTER TABLE `mst_publisher`
  ADD PRIMARY KEY (`publisher_id`) USING BTREE,
  ADD UNIQUE KEY `publisher_name` (`publisher_name`) USING BTREE;

--
-- Indexes for table `mst_supervisor`
--
ALTER TABLE `mst_supervisor`
  ADD PRIMARY KEY (`supervisor_id`) USING BTREE;

--
-- Indexes for table `mst_supplier`
--
ALTER TABLE `mst_supplier`
  ADD PRIMARY KEY (`supplier_id`) USING BTREE,
  ADD UNIQUE KEY `supplier_name` (`supplier_name`) USING BTREE;

--
-- Indexes for table `mst_topic`
--
ALTER TABLE `mst_topic`
  ADD PRIMARY KEY (`topic_id`) USING BTREE,
  ADD UNIQUE KEY `topic` (`topic`,`topic_type`) USING BTREE;

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserve_id`) USING BTREE,
  ADD KEY `references_idx` (`member_id`,`biblio_id`) USING BTREE,
  ADD KEY `item_code_idx` (`item_code`) USING BTREE;

--
-- Indexes for table `search_biblio`
--
ALTER TABLE `search_biblio`
  ADD UNIQUE KEY `biblio_id` (`biblio_id`),
  ADD KEY `add_indexes` (`gmd`,`publisher`,`publish_place`,`language`,`classification`,`publish_year`,`call_number`),
  ADD KEY `add_indexes2` (`opac_hide`,`promoted`);
ALTER TABLE `search_biblio` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `search_biblio` ADD FULLTEXT KEY `author` (`author`);
ALTER TABLE `search_biblio` ADD FULLTEXT KEY `topic` (`topic`);
ALTER TABLE `search_biblio` ADD FULLTEXT KEY `location` (`location`);
ALTER TABLE `search_biblio` ADD FULLTEXT KEY `items` (`items`);
ALTER TABLE `search_biblio` ADD FULLTEXT KEY `collection_types` (`collection_types`);
ALTER TABLE `search_biblio` ADD FULLTEXT KEY `labels` (`labels`);
ALTER TABLE `search_biblio` ADD FULLTEXT KEY `supervisor` (`supervisor`);
ALTER TABLE `search_biblio` ADD FULLTEXT KEY `contributor` (`contributor`);
ALTER TABLE `search_biblio` ADD FULLTEXT KEY `examiner` (`examiner`);

--
-- Indexes for table `serial`
--
ALTER TABLE `serial`
  ADD PRIMARY KEY (`serial_id`) USING BTREE,
  ADD KEY `fk_serial_biblio` (`biblio_id`) USING BTREE,
  ADD KEY `fk_serial_gmd` (`gmd_id`) USING BTREE;

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`) USING BTREE,
  ADD UNIQUE KEY `setting_name` (`setting_name`) USING BTREE;

--
-- Indexes for table `stock_take`
--
ALTER TABLE `stock_take`
  ADD PRIMARY KEY (`stock_take_id`) USING BTREE;

--
-- Indexes for table `stock_take_item`
--
ALTER TABLE `stock_take_item`
  ADD PRIMARY KEY (`stock_take_id`,`item_id`) USING BTREE,
  ADD UNIQUE KEY `item_code` (`item_code`) USING BTREE,
  ADD KEY `status` (`status`) USING BTREE,
  ADD KEY `item_properties_idx` (`gmd_name`,`classification`,`coll_type_name`,`location`) USING BTREE;

--
-- Indexes for table `system_log`
--
ALTER TABLE `system_log`
  ADD PRIMARY KEY (`log_id`) USING BTREE,
  ADD KEY `log_type` (`log_type`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD KEY `realname` (`realname`) USING BTREE;

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`group_id`) USING BTREE,
  ADD UNIQUE KEY `group_name` (`group_name`) USING BTREE;

--
-- Indexes for table `visitor_count`
--
ALTER TABLE `visitor_count`
  ADD PRIMARY KEY (`visitor_id`) USING BTREE,
  ADD KEY `member_id` (`member_id`) USING BTREE;

--
-- Indexes for table `xu_approval_settings`
--
ALTER TABLE `xu_approval_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xu_approval_step`
--
ALTER TABLE `xu_approval_step`
  ADD PRIMARY KEY (`step_id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `idx_submission` (`submission_id`),
  ADD KEY `idx_token` (`token`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `xu_fingerprint`
--
ALTER TABLE `xu_fingerprint`
  ADD PRIMARY KEY (`fingerprint_id`),
  ADD UNIQUE KEY `uniq_biblio` (`biblio_id`),
  ADD KEY `idx_hash` (`text_hash`),
  ADD KEY `idx_ttr` (`ttr`);

--
-- Indexes for table `xu_plagiarism_checks`
--
ALTER TABLE `xu_plagiarism_checks`
  ADD PRIMARY KEY (`check_id`),
  ADD KEY `idx_pc_token` (`token`),
  ADD KEY `idx_pc_student` (`student_id`);

--
-- Indexes for table `xu_plagiarism_fingerprints`
--
ALTER TABLE `xu_plagiarism_fingerprints`
  ADD PRIMARY KEY (`fp_id`),
  ADD UNIQUE KEY `uq_fp_biblio` (`biblio_id`);

--
-- Indexes for table `xu_reg_settings`
--
ALTER TABLE `xu_reg_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xu_scan_history`
--
ALTER TABLE `xu_scan_history`
  ADD PRIMARY KEY (`scan_id`),
  ADD KEY `idx_biblio` (`biblio_id`),
  ADD KEY `idx_score` (`similarity_score`),
  ADD KEY `idx_ai` (`ai_risk_score`);

--
-- Indexes for table `xu_similarity_pairs`
--
ALTER TABLE `xu_similarity_pairs`
  ADD PRIMARY KEY (`pair_id`),
  ADD UNIQUE KEY `uniq_pair` (`biblio_a`,`biblio_b`),
  ADD KEY `idx_score` (`jaccard_score`);

--
-- Indexes for table `xu_submission`
--
ALTER TABLE `xu_submission`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `idx_biblio` (`biblio_id`),
  ADD KEY `idx_member` (`member_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_stage` (`current_stage`);

--
-- Indexes for table `yudisium_checklist`
--
ALTER TABLE `yudisium_checklist`
  ADD PRIMARY KEY (`checklist_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_biblio` (`biblio_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backup_log`
--
ALTER TABLE `backup_log`
  MODIFY `backup_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `biblio`
--
ALTER TABLE `biblio`
  MODIFY `biblio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `biblio_certificates`
--
ALTER TABLE `biblio_certificates`
  MODIFY `cert_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen_bkd_rekap`
--
ALTER TABLE `dosen_bkd_rekap`
  MODIFY `rekap_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `fines_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kardex`
--
ALTER TABLE `kardex`
  MODIFY `kardex_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `long_pattern`
--
ALTER TABLE `long_pattern`
  MODIFY `pattern_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_type`
--
ALTER TABLE `member_type`
  MODIFY `member_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_author`
--
ALTER TABLE `mst_author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_coll_type`
--
ALTER TABLE `mst_coll_type`
  MODIFY `coll_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_contributor`
--
ALTER TABLE `mst_contributor`
  MODIFY `contributor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_copyright`
--
ALTER TABLE `mst_copyright`
  MODIFY `copyright_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_examiner`
--
ALTER TABLE `mst_examiner`
  MODIFY `examiner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_frequency`
--
ALTER TABLE `mst_frequency`
  MODIFY `frequency_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_gmd`
--
ALTER TABLE `mst_gmd`
  MODIFY `gmd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_icon`
--
ALTER TABLE `mst_icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_item_type`
--
ALTER TABLE `mst_item_type`
  MODIFY `item_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_label`
--
ALTER TABLE `mst_label`
  MODIFY `label_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_license`
--
ALTER TABLE `mst_license`
  MODIFY `license_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_loan_rules`
--
ALTER TABLE `mst_loan_rules`
  MODIFY `loan_rules_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_member_type`
--
ALTER TABLE `mst_member_type`
  MODIFY `member_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_module`
--
ALTER TABLE `mst_module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_place`
--
ALTER TABLE `mst_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_publisher`
--
ALTER TABLE `mst_publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_supervisor`
--
ALTER TABLE `mst_supervisor`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mst_supplier`
--
ALTER TABLE `mst_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_topic`
--
ALTER TABLE `mst_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serial`
--
ALTER TABLE `serial`
  MODIFY `serial_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `stock_take`
--
ALTER TABLE `stock_take`
  MODIFY `stock_take_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_log`
--
ALTER TABLE `system_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `visitor_count`
--
ALTER TABLE `visitor_count`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xu_approval_settings`
--
ALTER TABLE `xu_approval_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `xu_approval_step`
--
ALTER TABLE `xu_approval_step`
  MODIFY `step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `xu_fingerprint`
--
ALTER TABLE `xu_fingerprint`
  MODIFY `fingerprint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `xu_plagiarism_checks`
--
ALTER TABLE `xu_plagiarism_checks`
  MODIFY `check_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `xu_plagiarism_fingerprints`
--
ALTER TABLE `xu_plagiarism_fingerprints`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xu_reg_settings`
--
ALTER TABLE `xu_reg_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `xu_scan_history`
--
ALTER TABLE `xu_scan_history`
  MODIFY `scan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `xu_similarity_pairs`
--
ALTER TABLE `xu_similarity_pairs`
  MODIFY `pair_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `xu_submission`
--
ALTER TABLE `xu_submission`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `yudisium_checklist`
--
ALTER TABLE `yudisium_checklist`
  MODIFY `checklist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD CONSTRAINT `mst_menu_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `mst_menu` (`id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
