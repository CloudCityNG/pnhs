-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2014 at 03:19 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pagasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_admin_t`
--

CREATE TABLE IF NOT EXISTS `account_admin_t` (
  `admin_no` int(11) NOT NULL AUTO_INCREMENT,
  `module_no` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`admin_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_module_t`
--

CREATE TABLE IF NOT EXISTS `account_module_t` (
  `module_no` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(30) NOT NULL,
  PRIMARY KEY (`module_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_permission_t`
--

CREATE TABLE IF NOT EXISTS `account_permission_t` (
  `account_no` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  PRIMARY KEY (`privilege_id`,`account_no`),
  KEY `account_no` (`account_no`),
  KEY `privilege_id` (`privilege_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_permission_t`
--

INSERT INTO `account_permission_t` (`account_no`, `privilege_id`) VALUES
(2, 1),
(2, 2),
(10, 17),
(11, 17),
(12, 17),
(13, 17),
(14, 9),
(15, 17),
(16, 10),
(20, 4),
(21, 9),
(22, 5),
(23, 6),
(23, 11),
(25, 8),
(26, 3),
(27, 4),
(28, 12),
(29, 10),
(30, 11),
(31, 13),
(32, 15),
(33, 16),
(34, 11),
(34, 14),
(35, 1),
(36, 2),
(37, 7),
(38, 17);

-- --------------------------------------------------------

--
-- Table structure for table `account_privilege_t`
--

CREATE TABLE IF NOT EXISTS `account_privilege_t` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(30) DEFAULT NULL,
  `privilege_level` int(11) NOT NULL,
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `account_privilege_t`
--

INSERT INTO `account_privilege_t` (`privilege_id`, `privilege_name`, `privilege_level`) VALUES
(1, 'developer', 1),
(2, 'super_admin', 1),
(3, 'EIS_admin', 2),
(4, 'SIS_admin', 2),
(5, 'registration_admin', 2),
(6, 'scheduling_admin', 2),
(7, 'grading_admin', 2),
(8, 'library_admin', 2),
(9, 'supply_admin', 2),
(10, 'adviser', 3),
(11, 'club_adviser', 3),
(12, 'teacher', 3),
(13, 'registrar', 3),
(14, 'scheduling_officer', 3),
(15, 'librarian', 3),
(16, 'supply_officer', 3),
(17, 'student', 4);

-- --------------------------------------------------------

--
-- Table structure for table `account_t`
--

CREATE TABLE IF NOT EXISTS `account_t` (
  `account_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` enum('admin','employee','student','Employee Admin') NOT NULL,
  PRIMARY KEY (`account_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `account_t`
--

INSERT INTO `account_t` (`account_no`, `username`, `password`, `type`) VALUES
(2, 'master', 'petta', 'admin'),
(10, 'jackie', 'ramos', 'student'),
(11, '2015-1012', 'Lee_Danilo', 'student'),
(12, '2016-1014', 'ramos_jervie', 'student'),
(13, 'vince', 'vincegadi', 'student'),
(14, 'albert', '12345', 'admin'),
(15, 'melwinbalasta', '123456', 'student'),
(16, 'ejay', '123456', 'employee'),
(20, 'fionar', '1234567', 'Employee Admin'),
(21, 'alberto', '123456', 'Employee Admin'),
(22, 'melwin', '123456', 'Employee Admin'),
(23, 'jerviealcera', 'jervie', 'Employee Admin'),
(25, 'iren12', 'd123456', 'Employee Admin'),
(26, 'ralph12', 'e123456', 'Employee Admin'),
(27, 'fiona12', 'f123456', 'Employee Admin'),
(28, 'dickdick', 'g123456', 'employee'),
(29, 'girlie', 'h123456', 'employee'),
(30, 'jessa', 'i123456', 'employee'),
(31, 'mjlotino', 'j123456', 'employee'),
(32, 'yhen19', 'k123456', 'employee'),
(33, 'jervie12', 'l123456', 'employee'),
(34, 'master01', 'm123456', 'employee'),
(35, 'yunice', 'n123456', 'admin'),
(36, 'masterjack', 'o123456', 'admin'),
(37, 'dick', 'dick12', 'Employee Admin'),
(38, '2016-1016', 'Wilson_Lovely', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `account_type_t`
--

CREATE TABLE IF NOT EXISTS `account_type_t` (
  `type_no` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`type_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account_type_t`
--

INSERT INTO `account_type_t` (`type_no`, `type_name`) VALUES
(1, 'Admin'),
(2, 'Employee Admin'),
(3, 'Employee'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `appraisal_t`
--

CREATE TABLE IF NOT EXISTS `appraisal_t` (
  `a_no` int(11) NOT NULL AUTO_INCREMENT,
  `borrow_date` date DEFAULT NULL,
  `borrow_time` time DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_time` time DEFAULT NULL,
  `penalties` float DEFAULT NULL,
  `fine` float DEFAULT NULL,
  `access_no` varchar(11) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  `library_in_charge` int(11) DEFAULT NULL,
  `a_remark` varchar(20) NOT NULL,
  `notification` varchar(20) NOT NULL,
  PRIMARY KEY (`a_no`),
  KEY `a_no` (`a_no`),
  KEY `account_no` (`account_no`),
  KEY `access_no` (`access_no`),
  KEY `access_no_2` (`access_no`),
  KEY `account_no_2` (`account_no`),
  KEY `library_in_charge` (`library_in_charge`),
  KEY `account_no_3` (`account_no`),
  KEY `library_in_charge_2` (`library_in_charge`),
  KEY `library_in_charge_3` (`library_in_charge`),
  KEY `account_no_4` (`account_no`),
  KEY `account_no_5` (`account_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `appraisal_t`
--

INSERT INTO `appraisal_t` (`a_no`, `borrow_date`, `borrow_time`, `return_date`, `return_time`, `penalties`, `fine`, `access_no`, `account_no`, `library_in_charge`, `a_remark`, `notification`) VALUES
(10, '2014-01-15', '07:40:23', '2014-01-15', '07:40:42', 0, 0, '10000066', 11, 32, 'N/A', 'N/A'),
(11, '2014-01-15', '07:42:39', '2014-01-15', '07:44:49', 0, 0, '10000052', 15, 32, 'N/A', 'N/A'),
(12, '2014-01-15', '07:43:55', '2014-01-15', '07:44:23', 0, 0, '10000096', 10, 32, 'N/A', 'N/A'),
(13, '2014-01-15', '07:45:37', '2014-01-15', '07:45:57', 0, 0, '10000113', 11, 32, 'N/A', 'N/A'),
(14, '2016-01-15', '07:47:25', '2016-01-15', '07:47:37', 0, 0, '10000004', 15, 32, 'N/A', 'N/A'),
(15, '2014-01-15', '07:50:29', '2014-01-17', '07:53:08', 12.01, 0, '10000004', 10, 32, 'paid', 'not_seen');

-- --------------------------------------------------------

--
-- Table structure for table `book_limit_t`
--

CREATE TABLE IF NOT EXISTS `book_limit_t` (
  `no_books` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_limit_t`
--

INSERT INTO `book_limit_t` (`no_books`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `cat_author_t`
--

CREATE TABLE IF NOT EXISTS `cat_author_t` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `call_no` varchar(11) DEFAULT NULL,
  `author_fname` varchar(20) DEFAULT NULL,
  `author_mname` varchar(20) DEFAULT NULL,
  `author_lname` varchar(20) DEFAULT NULL,
  `nameextention` varchar(50) NOT NULL,
  PRIMARY KEY (`author_id`),
  KEY `call_no` (`call_no`),
  KEY `call_no_2` (`call_no`),
  KEY `call_no_3` (`call_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `cat_author_t`
--

INSERT INTO `cat_author_t` (`author_id`, `call_no`, `author_fname`, `author_mname`, `author_lname`, `nameextention`) VALUES
(1, 'PNHS0001', 'Michelle', 'Grafil', 'Dreu', 'Ph'),
(2, 'PNHS0002', 'Iren', 'Llona', 'Lotino', ''),
(3, 'PNHSP0001', 'Fiona Rae', 'Mayor', 'Llaneta', ''),
(16, 'PNHSP00023M', 'Florentino', 'T.', 'Feliciano', 'Ph.'),
(17, 'PNHSP00023M', 'Fausto', 'L.', 'Uy', ''),
(18, 'PNHSP000P89', 'Allan Van', '', 'Heuvelen', ''),
(19, 'PNHSP0001P', 'Liz', '', 'Uy', ''),
(20, 'PNHS00034', 'Jervie', 'Dreu', 'Alcera', ''),
(21, 'PNHS0007', 'Kevin', 'Poli', 'Grates', ''),
(22, 'PNHSP000190', 'Iren', 'Llona', 'Lotino', '');

-- --------------------------------------------------------

--
-- Table structure for table `cat_books_t`
--

CREATE TABLE IF NOT EXISTS `cat_books_t` (
  `book_id` varchar(11) NOT NULL,
  `edition` varchar(20) DEFAULT NULL,
  `description` text,
  `isbn` varchar(25) DEFAULT NULL,
  `illustration` varchar(20) DEFAULT NULL,
  `type` enum('Non-Fiction','Fiction') NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `book_id` (`book_id`),
  KEY `book_id_2` (`book_id`),
  KEY `book_id_3` (`book_id`),
  KEY `book_id_4` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_books_t`
--

INSERT INTO `cat_books_t` (`book_id`, `edition`, `description`, `isbn`, `illustration`, `type`) VALUES
('PNHS0001', '8th', '', '099-252-101', ' ', 'Non-Fiction'),
('PNHS0002', 'Revised', '', '009-109-890', ' ', 'Non-Fiction'),
('PNHS00034', 'Revised', '', '0-316-89716-1', ' ', 'Non-Fiction'),
('PNHS0007', 'Revised', '', '0-316-89716-5', 'ill.', 'Non-Fiction'),
('PNHSP000190', 'Revised', '\r\nExplaining security vulnerabilities, possible exploitation scenarios, and prevention in a systematic manner, this guide to BIOS exploitation describes the reverse-engineering techniques used to gather information from BIOS and expansion ROMs. SMBIOS/DMI exploitation techniques', '9781931769600', ' ', 'Fiction'),
('PNHSP00023M', 'Revised', '', '971-30-0587-2', ' ', 'Fiction'),
('PNHSP000P89', 'Revised', '', '0-316-89716-7', ' ', 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `cat_copies_t`
--

CREATE TABLE IF NOT EXISTS `cat_copies_t` (
  `access_no` varchar(11) NOT NULL,
  `call_no` varchar(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `librarian_in_charge` int(20) NOT NULL,
  `remarks` enum('Replaced','Paid','Undone') NOT NULL,
  PRIMARY KEY (`access_no`),
  KEY `call_no` (`call_no`),
  KEY `librarian_in_charge` (`librarian_in_charge`),
  KEY `librarian_in_charge_2` (`librarian_in_charge`),
  KEY `librarian_in_charge_3` (`librarian_in_charge`),
  KEY `call_no_2` (`call_no`),
  KEY `librarian_in_charge_4` (`librarian_in_charge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_copies_t`
--

INSERT INTO `cat_copies_t` (`access_no`, `call_no`, `status`, `librarian_in_charge`, `remarks`) VALUES
('10000003', 'PNHS0002', 'On shelf', 32, ''),
('10000004', 'PNHS0002', 'On shelf', 32, ''),
('10000051', 'PNHSP000P89', 'On shelf', 32, ''),
('10000052', 'PNHSP000P89', 'On shelf', 32, ''),
('10000066', 'PNHSP0001', 'On shelf', 32, ''),
('10000095', 'PNHSP00023M', 'On shelf', 32, ''),
('10000096', 'PNHSP00023M', 'On shelf', 32, ''),
('10000105', 'PNHSP0001P', 'On shelf', 32, ''),
('10000106', 'PNHSP0001P', 'On shelf', 32, ''),
('10000109', 'PNHS0002', 'On shelf', 32, ''),
('10000110', 'PNHS0002', 'On shelf', 32, ''),
('10000111', 'PNHS0001', 'On shelf', 32, ''),
('10000112', 'PNHS0001', 'On shelf', 32, ''),
('10000113', 'PNHS00034', 'On shelf', 32, ''),
('10000114', 'PNHS0007', 'On shelf', 32, ''),
('10000115', 'PNHS0007', 'On shelf', 32, ''),
('10000116', 'PNHSP000190', 'On shelf', 25, ''),
('10000117', 'PNHSP000190', 'On shelf', 25, '');

-- --------------------------------------------------------

--
-- Table structure for table `cat_ddc_t`
--

CREATE TABLE IF NOT EXISTS `cat_ddc_t` (
  `dec_no` varchar(10) NOT NULL,
  `class` char(75) NOT NULL,
  PRIMARY KEY (`dec_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_ddc_t`
--

INSERT INTO `cat_ddc_t` (`dec_no`, `class`) VALUES
('000', 'Generalities'),
('001', 'Knowledge'),
('002', 'The Book'),
('003', 'Systems'),
('004', 'Data Processing Computer Science'),
('005', 'Computer Programming, programs, data'),
('006', 'Special Computer Methods'),
('010', 'Bibliography'),
('011', 'Bibliographies'),
('012', 'Bibliographies of individuals'),
('013', 'Bibliographies of works by specific classes of authors'),
('014', 'Bibliographies of anonymous and pseudonymous works'),
('015', 'Bibliographies of  works from specific places'),
('016', 'Bibliographies of works from specific subjects'),
('017', 'General subject catalogs'),
('018', 'Catalogs arranged by author and date'),
('019', 'Dictionary catalogs'),
('020', 'Library & information sciences'),
('021', 'Library relationships'),
('022', 'Administration of the physical plant'),
('023', 'Personnel administration'),
('025', 'Library operations'),
('026', 'Libraries for specific subjects'),
('027', 'General libraries'),
('028', 'Reading, use of other information media'),
('030', 'General encyclopedic works'),
('031', 'General encyclopedic works -- American'),
('032', 'General encyclopedic works in English'),
('033', 'General encyclopedic works in other Germanic languages'),
('034', 'General encyclopedic works French, Provencal, Catalan'),
('035', 'General encyclopedic works in Italian, Romanian, Rhaeto-Romanic'),
('036', 'General encyclopedic works in Spanish and Portuguese'),
('037', 'General encyclopedic works in Slavic languages'),
('038', 'General encyclopedic works in Scandinavian languages'),
('039', 'General encyclopedic works in other languages'),
('050', 'General serials & their indexes'),
('051', 'General serials & their indexes American'),
('052', 'General serials & their indexes In English'),
('053', 'General serials & their indexes Inither Germanic languages'),
('054', 'General serials & their indexes In French, Provencal, Catalan'),
('055', 'General serials & their indexes In Italian, Romanian, Rhaeto-Romanic'),
('056', 'General serials & their indexes In Spanish & Protuguese'),
('057', 'General serials & their indexes In Slavic languages'),
('058', 'General serials & th'),
('059', 'General serials & th'),
('060', 'General organization'),
('061', 'General organization & museology In North America'),
('062', 'General organization & museology In British Isles In England'),
('063', 'General organization & museology In central Europe In Germany'),
('064', 'General organization & museology In France & Monaco'),
('065', 'General organization & museology In Italy & adjacent territories'),
('066', 'General organization & museology In Iberian Peninsula & adjacent islands'),
('067', 'General organization & museology In eastern Europe In Soviet Union'),
('068', 'General organization & museology In other areas'),
('069', 'Museology (Museum science)'),
('070', 'News, media, journalism, publishing'),
('071', 'News media, journalism, publishing In North America'),
('072', 'News media, journalism, publishing In British Isles In England'),
('073', 'News media, journalism, publishing In central Europe In Germany'),
('074', 'News media, journalism, publishing In France & Monaco'),
('075', 'News media, journalism, publishing In Italy & adjacent territories'),
('076', 'News media, journalism, publishing In Iberian Peninsula & adjacent island'),
('077', 'News media, journalism, publishing In eastern Europe In Soviet Union'),
('078', 'News media, journalism, publishing In Scandinavia'),
('079', 'News media, journalism, publishing In other languages'),
('080', 'General collections'),
('081', 'General collections American'),
('082', 'General collections In English'),
('083', 'General collections In other Germanic languages'),
('084', 'General collections In French, Provencal, Catalan'),
('085', 'General collections In Italian, Romanian, Rhaeto-Romanic'),
('086', 'General collections In Spanish & Portuguese'),
('087', 'General collections In Slavic languages'),
('088', 'General collections In Scandinavian languages'),
('089', 'General collections In other languages'),
('090', 'Manuscripts & rare books'),
('091', 'Manuscripts'),
('092', 'Block books'),
('093', 'Incunabula'),
('094', 'Printed books'),
('095', 'Books notable for bindings'),
('096', 'Books notable for illlustrations'),
('097', 'Books notable for ownership or origin'),
('098', 'Prohibited works, forgeries, hoaxes'),
('099', 'Books notable for format'),
('100', 'Philosophy & Psychology'),
('101', 'Theory of philosophy'),
('102', 'Miscellany of philosophy'),
('103', 'Dictionaries of philosophy'),
('105', 'Serial publications of philosophy'),
('106', 'Organizations of philosophy'),
('107', 'Education, research in philosophy'),
('108', 'Kinds of persons in philosophy'),
('109', 'Historical treatment of philosophy'),
('110', 'Metaphysics'),
('111', 'Ontology'),
('113', 'Cosmology (Philosophy of nature)'),
('114', 'Space'),
('115', 'Time'),
('116', 'Change'),
('117', 'Structure'),
('118', 'Force & Energy'),
('119', 'Number & quantity'),
('120', 'Epistemology, causation, humankind'),
('121', 'Epistemology (Theory of knowledge)'),
('122', 'Causation'),
('123', 'Determinism & indeterminism'),
('124', 'Teleology'),
('126', 'The self'),
('127', 'The unconscious & the subconscious'),
('128', 'Humankind'),
('129', 'Origin & destiny of individual souls'),
('130', 'Paranormal phenomena'),
('131', 'Occult methods for achieving well-being'),
('133', 'Parapsychology & occultism'),
('135', 'Dreams & mysteries'),
('137', 'Divinatory grapholog'),
('138', 'Physiognomy'),
('139', 'Phrenology'),
('140', 'Specific philosophical schools'),
('141', 'Idealism & related systems'),
('142', 'Critical philosophy'),
('143', 'Intuitionism & Bergsonism'),
('144', 'Humanism & related systems'),
('145', 'Sensationalism'),
('146', 'Naturalism & related systems'),
('147', 'Pantheism & related systems'),
('148', 'Liberalism, eclecticism, traditionalism'),
('149', 'Other philosophical systems'),
('150', 'Psychology'),
('152', 'Perception, movement, emotions, drives'),
('153', 'Mental processes & i'),
('154', 'Subconscious & altered states'),
('155', 'Differential & developmental psychology'),
('156', 'Comparative psychology'),
('158', 'Applied psychology'),
('160', 'Logic'),
('161', 'Induction'),
('162', 'Deduction'),
('165', 'Fallacies & sources of error'),
('166', 'Syllogisms'),
('167', 'Hypotheses'),
('168', 'Argument & persuasion'),
('169', 'Analogy'),
('170', 'Ethics (Moral philosophy)'),
('171', 'Systems & doctrines'),
('172', 'Political ethics'),
('173', 'Ethics of family relationship'),
('174', 'Economic & professional ethics'),
('175', 'Ethics of recreation & leisure'),
('176', 'Ethics of sex & reproduction'),
('177', 'Ethics of social relations'),
('178', 'Ethics of consumptions'),
('179', 'Other ethical norms'),
('180', 'Ancient, medieval, Oiental philosophy'),
('181', 'Oriental philosophy'),
('182', 'Pre-Socratic Greek philosophies'),
('183', 'Sophistic & Socratic philosophies'),
('184', 'Platonic philosophy'),
('185', 'Aristotelian philosophy'),
('186', 'Skeptic and Neoplatonic philosophies'),
('187', 'Epicurean philosophy'),
('188', 'Stoic philosophy'),
('189', 'Medieval Western phiilosophy'),
('190', 'Modern Western philoilosophy'),
('191', 'Modern Western philosophy United States & Canada'),
('192', 'Modern Western philosophy British Isles'),
('193', 'Modern Western philosophy Germany & Austria'),
('194', 'Modern Western philosophy France'),
('195', 'Modern Western philosophy Italy'),
('196', 'Modern Western philosophy Spain & Portugal'),
('197', 'Modern Western philosophy Soviet Union'),
('198', 'Modern Western philosophy Scandinavia'),
('199', 'Modern Western philosophy Other geographical areas'),
('200', 'Religion'),
('201', 'Philosophy of Christtianity'),
('202', 'Miscellany of Christianity'),
('203', 'Dictionaries of Christianity'),
('204', 'Special topics'),
('205', 'Serial publicationss of Christianity'),
('206', 'Organizations of Christianity'),
('207', 'Education, research in Christianity'),
('208', 'Kinds of persons in Christianity'),
('209', 'History & geography of Christianity'),
('210', 'Natural theology'),
('211', 'Concepts of God'),
('212', 'Existence, attributes of God'),
('213', 'Creation'),
('214', 'Theodicy'),
('215', 'Science & religion'),
('216', 'Good & evil'),
('218', 'Humankind'),
('220', 'Bible'),
('221', 'Old Testament'),
('222', 'Historical books of Old Testament'),
('223', 'Poetic books of Old Testament'),
('224', 'Prophetic books of  Old Testament'),
('225', 'New Testament'),
('226', 'Gospels & Acts'),
('227', 'Epistles'),
('228', 'Revelation (Apocalypse)'),
('229', 'Apocrypha & pseudepigrapha'),
('230', 'Christian theology'),
('231', 'God'),
('232', 'Jesus Christ & his family'),
('233', 'Humankind'),
('234', 'Salvation (Soteriology) & grace'),
('235', 'Spiritual beings'),
('236', 'Eschatology'),
('238', 'Creeds & catechisms'),
('239', 'Apologetics & polemics'),
('240', 'Christian moral & devotional theology'),
('241', 'Moral theology'),
('242', 'Devotional literature'),
('243', 'Evangelistic writings for individuals'),
('245', 'Texts of hymns'),
('246', 'Use of art in Christianity'),
('247', 'Church furnishings & articles'),
('248', 'Christian experience, practice, life'),
('249', 'Christian observances in family life'),
('250', 'Christian orders & local church'),
('251', 'Preaching (Homiletics)'),
('252', 'Texts of sermons'),
('253', 'Pastoral office (Pastoral theology)'),
('254', 'Parish government & administration'),
('255', 'Religious congregations & orders'),
('259', 'Activities of the lo'),
('260', 'Christian social theology'),
('261', 'Social theology'),
('262', 'Ecclesiology'),
('263', 'Times, places of relious observance'),
('264', 'Public worship'),
('265', 'Sacraments, other rites & acts'),
('266', 'Missions'),
('267', 'Associations for religious work'),
('268', 'Religious education'),
('269', 'Spiritual renewal'),
('270', 'Christian church history'),
('271', 'Religious orders in'),
('272', 'Persecutions in church history'),
('273', 'Heresies in church history'),
('274', 'Christian church in Europe'),
('275', 'Christian church in Asia'),
('276', 'Christian church in Africa'),
('277', 'Christian church in North America'),
('278', 'Christian church in South America'),
('279', 'Christian church in other areas'),
('280', 'Christian denominations & sects'),
('281', 'Early church & Eastern churches'),
('282', 'Roman Catholic Church'),
('283', 'Anglican churches'),
('284', 'Protestants of Continental origin'),
('285', 'Presbyterian, Reformed, Congregational'),
('286', 'Baptist, Disciples of Christ, Adventist'),
('287', 'Methodist & related churches'),
('289', 'Other denominations &sects'),
('290', 'Other & comparative religions'),
('291', 'Comparative religion'),
('292', 'Classical (Greek & Roman) relisgion'),
('293', 'Germanic religion'),
('294', 'Religions of Indic origin'),
('295', 'Zoroastrianism (Mazdaism, Parseeism)'),
('296', 'Judaism'),
('297', 'Islam & religions originating in it'),
('299', 'Other religions'),
('300', 'Social Sciences'),
('301', 'Sociology & anthropology'),
('302', 'Social interaction'),
('303', 'Social processes'),
('304', 'Factors affecting social behavior'),
('305', 'Social groups'),
('306', 'Culture & institutions'),
('307', 'Communities'),
('310', 'General statistics'),
('314', 'General statistics Of Europe'),
('315', 'General statistics Of Asia'),
('316', 'General statistics Of Africa'),
('317', 'General statistics Of North America'),
('318', 'General statistics Of South America'),
('319', 'General statistics Of other pars of the world'),
('320', 'Political science'),
('321', 'Systems of governments & states'),
('322', 'Relation of state to organized groups'),
('323', 'Civil & political rights'),
('324', 'The political process'),
('325', 'International migration and colonization'),
('326', 'Slavery & emancipatiion'),
('327', 'International relations'),
('328', 'The legislative process'),
('330', 'Economics'),
('331', 'Labor economics'),
('332', 'Financial economics'),
('333', 'Land economics'),
('334', 'Cooperatives'),
('335', 'Socialism & related systems'),
('336', 'Public finance'),
('337', 'International economics'),
('338', 'Production'),
('339', 'Macroeconomics & related topics'),
('340', 'Law'),
('341', 'International law'),
('342', 'Constitutional & administrative law'),
('343', 'Military, tax, trade, industrial law'),
('344', 'Social, labor, welfare, & related law'),
('345', 'Criminal law'),
('346', 'Private law'),
('347', 'Civil procedure & courts'),
('348', 'Law (Statutes), regulations, cases'),
('349', 'Law of specific jurisdictions & areas'),
('350', 'Public administration'),
('351', 'Of central governments'),
('352', 'Of local governments'),
('353', 'of U.S. federal & state governments'),
('354', 'Of specific central governments'),
('355', 'Military science'),
('356', 'Foot forces & warfare'),
('357', 'Mounted forces & warfare'),
('358', 'Other specialized forces & services'),
('359', 'Sea (Naval) forces & warfare'),
('360', 'Social services; association'),
('361', 'General social problems & services'),
('362', 'Social welfare problems & services'),
('362.29', 'Addiction'),
('363', 'Other social problem & services'),
('363.46', 'Abortion'),
('364', 'Criminology'),
('365', 'Penal & related institutions'),
('366', 'Association'),
('367', 'General clubs'),
('368', 'Insurance'),
('369', 'Miscellaneous kinds of associations'),
('370', 'Education'),
('371', 'School management; special education'),
('372', 'Elementary education'),
('373', 'Secondary education'),
('374', 'Adult education'),
('375', 'Curriculums'),
('376', 'Education of women'),
('377', 'Schools & religion'),
('378', 'Higher education'),
('379', 'Government regulation, control, support'),
('380', 'Commerce, communications, transport'),
('381', 'Internal commerce (Domestic trade)'),
('382', 'International commerce (Foreign trade)'),
('383', 'Postal communication'),
('384', 'Communications Telecommunication'),
('385', 'Railroad transportatation'),
('386', 'Inland waterway & ferry transportation'),
('387', 'Water, air, space transportation'),
('388', 'Transportation Ground transportation'),
('389', 'Metrology & standardization'),
('390', 'Customs, etiquette, folklore'),
('391', 'Costume & personal appearance'),
('392', 'Customs of life cycle & domestic life'),
('393', 'Death customs'),
('394', 'General customs'),
('395', 'Etiquette (Manners)'),
('398', 'Folklore'),
('399', 'Customs of war & diplomacy'),
('400', 'Language'),
('401', 'Philosophy & theory'),
('402', 'Miscellany'),
('403', 'Dictionaries & encyc'),
('404', 'Special topics'),
('405', 'Serial publications'),
('406', 'Organizations & mana'),
('407', 'Education, research, related topics'),
('408', 'With respect to kinds of persons'),
('409', 'Geographical & persons treatment'),
('410', 'Linguistics'),
('411', 'Writing systems'),
('412', 'Etymology'),
('413', 'Dictionaries'),
('414', 'Phonology'),
('415', 'Structural systems (Grammar)'),
('417', 'Dialectology & historical linguistics'),
('418', 'Standard usage Applied linguistics'),
('419', 'Verbal language not spoken or written'),
('420', 'English & Old English'),
('421', 'English writing system & phonology'),
('422', 'English etymology'),
('423', 'English dictionaries'),
('425', 'English grammar'),
('427', 'English language variations'),
('428', 'Standard English usage'),
('429', 'Old English (Anglo-Saxon)'),
('430', 'Germanic languages German'),
('431', 'German writing system'),
('432', 'German etymology'),
('433', 'German dictionaries'),
('435', 'German grammar'),
('437', 'German language variations'),
('438', 'Standard German usage'),
('439', 'Other Germanic language'),
('440', 'Romance languages French'),
('441', 'French writing system'),
('442', 'French etymology'),
('443', 'French dictionaries'),
('445', 'French grammar'),
('447', 'French language variations'),
('448', 'Standard French usage'),
('449', 'Provencal & Catalan'),
('450', 'Italian, Romanian, Rhaeto-Romantic'),
('451', 'Italian writing system'),
('452', 'Italian etymology'),
('453', 'Italian dictionaries'),
('455', 'Italian grammar'),
('457', 'Italian language variations'),
('458', 'Standard Italian usage'),
('459', 'Romanian & Rhaeto-Romanic'),
('460', 'Spanish & Portugese languages'),
('461', 'Spanish writing system'),
('462', 'Spanish etymology'),
('463', 'Spanish dictionaries'),
('465', 'Spanish grammar'),
('467', 'Spanish language variations'),
('468', 'Standard Spanish usage'),
('469', 'Portugese'),
('470', 'Italic Latin'),
('471', 'Classical Latin writing & phonology'),
('472', 'Classical Latin etymology & phonology'),
('473', 'Classical Latin dictionaries'),
('475', 'Classical Latin grammar'),
('477', 'Old, Postclassical, Vulgar Latin'),
('478', 'Classical Latin usage'),
('479', 'Other Italic languages'),
('480', 'Hellenic languages Classical Greek'),
('481', 'Classical Greek writing & phonology'),
('482', 'Classical Greek etymology'),
('483', 'Classical Greek dictionaries'),
('485', 'Classical Greek grammar'),
('487', 'Preclassical & postclassical Greek'),
('488', 'Classical Greek usage'),
('489', 'Other Hellenic languages Semitic'),
('490', 'Other languages'),
('491', 'East Indo-European & Celtic languages'),
('492', 'Afro-Asiatic languages Semitic'),
('493', 'Non-Semitic Afro-Asiatic languages'),
('494', 'Ural-Altaic, Paleosiberian, Dravidian'),
('495', 'Languages of East & Southeast Asia'),
('496', 'African languages'),
('497', 'North American native languages'),
('498', 'South American native languages'),
('499', 'Miscellaneous languages'),
('500', 'Natural Sciences & Mathematics'),
('501', 'Philosophy & theory'),
('502', 'Miscellany'),
('503', 'Dictionaries & encycyclopedias'),
('505', 'Serial publications'),
('506', 'Organizations & management'),
('507', 'Education, research, related topics'),
('508', 'Natural history'),
('509', 'Historical, areas, persons treatment'),
('510', 'Mathematics'),
('511', 'General principles'),
('512', 'Algebra & number the'),
('513', 'Arithmetic'),
('514', 'Topology'),
('515', 'Analysis'),
('516', 'Geometry'),
('519', 'Probabilities & appl'),
('520', 'Astronomy & allied s'),
('521', 'Celestial mechanics'),
('522', 'Techniques, equipmen'),
('523', 'Specific celestial b'),
('525', 'Earth (Astronomical'),
('526', 'Mathematical geograp'),
('527', 'Celestial navigation'),
('528', 'Ephemerides'),
('529', 'Chronology'),
('530', 'Physics'),
('531', 'Classical mechanics'),
('532', 'Fluid mechanics Liqu'),
('533', 'Gas mechanics'),
('534', 'Sound & related vibr'),
('535', 'Light & paraphotic p'),
('536', 'Heat'),
('537', 'Electricity & electr'),
('538', 'Magnetism'),
('539', 'Modern physics'),
('540', 'Chemistry & allied s'),
('541', 'Physical & theoretic'),
('542', 'Techniques, equipmen'),
('543', 'Analytical chemistry'),
('544', 'Qualitative analysis'),
('545', 'Quantitative analysi'),
('546', 'Inorganic chemistry'),
('547', 'Organic chemistry'),
('548', 'Crystallography'),
('549', 'Mineralogy'),
('550', 'Earth sciences'),
('551', 'Geology, hydrology,'),
('552', 'Petrology'),
('553', 'Economic geology'),
('554', 'Earth sciences of Eu'),
('555', 'Earth sciences of As'),
('556', 'Earth sciences of Af'),
('557', 'Earth sciences of No'),
('558', 'Earth sciences of So'),
('559', 'Earth sciences of ot'),
('560', 'Paleontology Paleozo'),
('561', 'Paleobotany'),
('562', 'Fossil invertebrates'),
('563', 'Fossil primitive phy'),
('564', 'Fossil Mollusca & Mo'),
('565', 'Other fossil inverte'),
('566', 'Fossil Vertebrata (F'),
('567', 'Fossil cold-blooded'),
('568', 'Fossil Aves (Fossil'),
('569', 'Fossil Mammalia'),
('570 Life', 'sciences'),
('572', 'Human races'),
('573', 'Physical anthropolog'),
('574', 'Biology'),
('575', 'Evolution & genetics'),
('576', 'Microbiology'),
('577', 'General nature of li'),
('578', 'Microscopy in biolog'),
('579', 'Collection and prese'),
('580', 'Botanical sciences'),
('581', 'Botany'),
('582', 'Spermatophyta (Seed-'),
('583', 'Dicotyledones'),
('584', 'Monocotyledones'),
('585', 'Gymnospermae (Pinoph'),
('586', 'Cryptogamia (Seedles'),
('587', 'Pteridophyta (Vascul'),
('588', 'Bryophyta'),
('589', 'Thallobionta & Proka'),
('590', 'Zoological sciences'),
('591', 'Zoology'),
('592', 'Invertebrates'),
('593', 'Protozoa, Echinoderm'),
('594', 'Mollusca & Molluscoi'),
('595', 'Other invertebrates'),
('596', 'Vertebrata (Craniata'),
('597', 'Cold-blooded vertebr'),
('598', 'Aves (Birds)'),
('599', 'Mammalia (Mammals)'),
('600', 'Technology(Applied Sciences)'),
('601', 'Philosophy & theory'),
('602', 'Miscellany'),
('603', 'Dictionaries & encyc'),
('604', 'Special topics'),
('605', 'Serial publications'),
('606', 'Organizations'),
('607', 'Education, research,'),
('608', 'Invention & patents'),
('609', 'Historical, areas, p'),
('610', 'Medical sciences Med'),
('611', 'Human anatomy, cytol'),
('612', 'Human physiology'),
('613', 'Promotion of health'),
('614', 'Incidence & preventi'),
('615', 'Pharmacology & thera'),
('616', 'Diseases'),
('617', 'Surgery & related me'),
('618', 'Gynecology & other m'),
('619', 'Experimental medicin'),
('620', 'Engineering & allied'),
('621', 'Applied physics'),
('622', 'Mining & related ope'),
('623', 'Military & nautical'),
('624', 'Civil engineering'),
('625', 'Engineering of railr'),
('627', 'Hydraulic engineerin'),
('628', 'Sanitary & municipal'),
('629', 'Other branches of en'),
('630', 'Agriculture'),
('631', 'Techniques, equipmen'),
('632', 'Plant injuries, dise'),
('633', 'Field & plantation c'),
('634', 'Orchards, fruits, fo'),
('635', 'Garden crops (Hortic'),
('636', 'Animal husbandry'),
('637', 'Processing dairy & r'),
('638', 'Insect culture'),
('639', 'Hunting, fishing, co'),
('640', 'Home economics & fam'),
('641', 'Food & drink'),
('642', 'Meals & table servic'),
('643', 'Housing & household'),
('644', 'Household utilities'),
('645', 'Household furnishing'),
('646', 'Sewing, clothing, pe'),
('647', 'Management of public'),
('648', 'Housekeeping'),
('649', 'Child rearing & home'),
('650', 'Management & auxilia'),
('651', 'Office services'),
('652', 'Processes of written'),
('653', 'Shorthand'),
('657', 'Accounting'),
('658', 'General management'),
('659', 'Advertising & public'),
('660', 'Chemical engineering'),
('661', 'Industrial chemicals'),
('662', 'Explosives, fuels te'),
('663', 'Beverage technology'),
('664', 'Food technology'),
('665', 'Industrial oils, fat'),
('666', 'Ceramic & allied tec'),
('667', 'Cleaning, color, rel'),
('668', 'Technology of other'),
('669', 'Metallurgy'),
('670', 'Manufacturing'),
('671', 'Metalworking & metal'),
('672', 'Iron, steel, other i'),
('673', 'Nonferrous metals'),
('674', 'Lumber processing, w'),
('675', 'Leather & fur proces'),
('676', 'Pulp & paper technol'),
('677', 'Textiles'),
('678', 'Elastomers & elastom'),
('679', 'Other products of sp'),
('680', 'Manufacture for spec'),
('681', 'Precision instrument'),
('682', 'Small forge work (Bl'),
('683', 'Hardware & household'),
('684', 'Furnishings & home w'),
('685', 'Leather, fur, relate'),
('686', 'Printing & related a'),
('687', 'Clothing'),
('688', 'Other final products'),
('690', 'Buildings'),
('691', 'Building materials'),
('692', 'Auxiliary constructi'),
('693', 'Specific materials &'),
('694', 'Wood construction Ca'),
('695', 'Roof covering'),
('696', 'Utilities'),
('697', 'Heating, ventilating'),
('698', 'Detail finishing'),
('700', 'The Arts'),
('701', 'Philosophy & theory'),
('702', 'Miscellany'),
('703', 'Dictionaries & encyc'),
('704', 'Special topics'),
('705', 'Serial publications'),
('706', 'Organizations & mana'),
('707', 'Education, research,'),
('708', 'Galleries, museums,'),
('709', 'Historical, areas, p'),
('710', 'Civic & landscape ar'),
('711', 'Area planning (Civic'),
('712', 'Landscape architectu'),
('713', 'Landscape architectu'),
('714', 'Water features'),
('715', 'Woody plants'),
('716', 'Herbaceous plants'),
('717', 'Structures'),
('718', 'Landscape design of'),
('719', 'Natural landscapes'),
('720', 'Architecture'),
('721', 'Architectural struct'),
('722', 'Architecture to ca.'),
('723', 'Architecture from ca'),
('724', 'Architecture from 14'),
('725', 'Public structures'),
('726', 'Buildings for religi'),
('727', 'Buildings for educat'),
('728', 'Residential & relate'),
('729', 'Design & decoration'),
('730', 'Plastic arts Sculptu'),
('731', 'Processes, forms, su'),
('732', 'Sculpture to ca. 500'),
('733', 'Greek, Etruscan, Rom'),
('734', 'Sculpture from ca. 5'),
('735', 'Sculpture from 1400'),
('736', 'Carving & carvings'),
('737', 'Numismatics & sigill'),
('738', 'Ceramic arts'),
('739', 'Art metalwork'),
('740', 'Drawing & decorative'),
('741', 'Drawing & drawings'),
('742', 'Perspective'),
('743', 'Drawing & drawings b'),
('745', 'Decorative arts'),
('746', 'Textile arts'),
('747', 'Interior decoration'),
('748', 'Glass'),
('749', 'Furniture & accessor'),
('750', 'Painting & paintings'),
('751', 'Techniques, equipmen'),
('752', 'Color'),
('753', 'Symbolism, allegory,'),
('754', 'Genre paintings'),
('755', 'Religion & religious'),
('757', 'Human figures & thei'),
('758', 'Other subjects'),
('759', 'Historical, areas, p'),
('760', 'Graphic arts Printma'),
('761', 'Relief processes (Bl'),
('763', 'Lithographic (Planog'),
('764', 'Chromolithography &'),
('765', 'Metal engraving'),
('766', 'Mezzotinting & relat'),
('767', 'Etching & drypoint'),
('769', 'Prints'),
('770', 'Photography & photog'),
('771', 'Techniques, equipmen'),
('772', 'Metallic salt proces'),
('773', 'Pigment processes of'),
('774', 'Holography'),
('778', 'Fields & kinds of ph'),
('779', 'Photographs'),
('780', 'Music'),
('781', 'General principles &'),
('782', 'Vocal music'),
('783', 'Music for single voi'),
('784', 'Instruments & Instru'),
('785', 'Chamber music'),
('786', 'Keyboard & other ins'),
('787', 'Stringed instruments'),
('788', 'Wind instruments (Ae'),
('790', 'Recreational & perfo'),
('791', 'Public performances'),
('792', 'Stage presentations'),
('793', 'Indoor games & amuse'),
('794', 'Indoor games of skil'),
('795', 'Games of chance'),
('796', 'Athletic & outdoor s'),
('797', 'Aquatic & air sports'),
('798', 'Equestrian sports &'),
('799', 'Fishing, hunting, sh'),
('800', 'Literature & Rhetoric'),
('801', 'Philosophy & theory'),
('802', 'Miscellany'),
('803', 'Dictionaries & encyc'),
('805', 'Serial publications'),
('806', 'Organizations'),
('807', 'Education, research,'),
('808', 'Rhetoric & collectio'),
('809', 'Literary history & c'),
('810', 'American literature'),
('811', 'Poetry'),
('812', 'Drama'),
('813', 'Fiction'),
('814', 'Essays'),
('815', 'Speeches'),
('816', 'Letters'),
('817', 'Satire & humor'),
('818', 'Miscellaneous writin'),
('819', 'Not used'),
('820', 'English & Old Englis'),
('821', 'English poetry'),
('822', 'English drama'),
('823', 'English fiction'),
('824', 'English essays'),
('825', 'English speeches'),
('826', 'English letters'),
('827', 'English satire & hum'),
('828', 'English miscellaneou'),
('829', 'Old English (Anglo-S'),
('830', 'Literatures of Germa'),
('831', 'Early to 1517'),
('832', 'Reformation, etc.  1'),
('833', 'Classic period,  175'),
('834', 'Post classic & moder'),
('835', 'Contemporary authors'),
('836', 'German dialect liter'),
('837', 'German-American'),
('838', 'German miscellaneous'),
('839', 'Other Germanic liter'),
('840', 'Literatures of Roman'),
('841', 'Old and early French'),
('842', 'Transition & renaiss'),
('843', 'Classical period, 16'),
('844', '18 th Century, 1715-'),
('845', 'Revolution to presen'),
('846', 'Contemporary authors'),
('847', 'French Canadian'),
('848', 'Provencal'),
('849', 'French dialect liter'),
('851', 'Early period to 1375'),
('852', 'Classical learning,'),
('853', '1492-1585'),
('854', '1585-1814'),
('855', '1814-1940/50'),
('856', 'Works in and/or abou'),
('857', 'Sardinian'),
('858', 'Romanian (including'),
('859', 'Rumansh, Rhastian, R'),
('860', 'Spanish & Portuguese'),
('861', 'Early to 1400'),
('862', '1400-1553'),
('863', 'Golden age, 1554-170'),
('864', '1700-1800'),
('867', 'Catalan'),
('868', 'Portuguese'),
('869', 'South/Central Americ'),
('870', 'General works on Lat'),
('871', 'Latin Authors'),
('872', 'Collections of Latin'),
('873', 'Not Used'),
('874', 'Not Used'),
('875', 'Medieval and modern'),
('876', 'Not Used'),
('877', 'Not Used'),
('878', 'Not Used'),
('879', 'Classical literature'),
('880', 'Hellenic literatures'),
('881', 'Greek Authors'),
('882', 'Collections of Greek'),
('883', 'Not Used'),
('884', 'Not Used'),
('885', 'Modern Literature in'),
('886', 'Not Used'),
('887', 'Not Used'),
('888', 'Not Used'),
('889', 'Literature in Mediev'),
('890', 'Indic Literature'),
('891.5', 'Iranian/Persian Literature'),
('891.6', 'Celtic/Gaelic Literature'),
('891.7', 'Slavic and Baltic Literature'),
('892', 'Afro-Asiatic Literat'),
('893', 'Afro-Asiatic Literature (Hamito-Semitic)'),
('894', 'Afro-Asiatic Literature (Hamito-Semitic)'),
('895', 'Literature in East Asian and African Languages'),
('896', 'Literature in East Asian and African Languages'),
('897', 'North and South American Native Languages'),
('898', 'North and South American Native Languages'),
('899', 'Other Literatures'),
('900', 'Geography & History'),
('901', 'Philosophy & theory'),
('902', 'Miscellany'),
('903', 'Dictionaries & encyc'),
('904', 'Collected accounts o'),
('905', 'Serial publications'),
('906', 'Organizations & mana'),
('907', 'Education, research,'),
('908', 'With respect to kind'),
('909', 'World history'),
('910', 'Geography & travel'),
('911', 'Historical geography'),
('912', 'Graphic representati'),
('913', 'Ancient world'),
('914', 'Europe'),
('915', 'Asia'),
('916', 'Africa'),
('917', 'North America'),
('918', 'South America'),
('919', 'Other areas'),
('920', 'Biography, genealogy'),
('929', 'Genealogy, names, in'),
('930', 'History of ancient w'),
('931', 'History of ancient w'),
('932', 'History of ancient w'),
('933', 'History of ancient w'),
('934', 'History of ancient w'),
('935', 'History of ancient w'),
('936', 'History of ancient w'),
('937', 'History of ancient w'),
('938', 'History of ancient w'),
('939', 'History of ancient w'),
('940', 'General history of E'),
('941', 'General history of E'),
('942', 'General history of E'),
('943', 'General history of E'),
('944', 'General history of E'),
('945', 'General history of E'),
('946', 'General history of E'),
('947', 'General history of E'),
('948', 'General history of E'),
('949', 'General history of E'),
('950', 'General history of A'),
('951', 'General history of A'),
('952', 'General history of A'),
('953', 'General history of A'),
('954', 'General history of A'),
('955', 'General history of A'),
('956', 'General history of A'),
('957', 'General history of A'),
('958', 'General history of A'),
('959', 'General history of A'),
('960', 'General history of A'),
('961', 'General history of A'),
('962', 'General history of A'),
('963', 'General history of A'),
('964', 'General history of A'),
('965', 'General history of A'),
('966', 'General history of A'),
('967', 'General history of A'),
('968', 'General history of A'),
('969', 'General history of A'),
('970', 'General history of N'),
('971', 'General history of N'),
('972', 'General history of N'),
('973', 'General history of N'),
('973.7', 'L63 Used for Abraham'),
('974', 'General history of N'),
('975', 'General history of N'),
('976', 'General history of N'),
('977', 'General history of N'),
('978', 'General history of N'),
('979', 'General history of N'),
('980', 'General history of S'),
('981', 'General history of S'),
('982', 'General history of S'),
('983', 'General history of S'),
('984', 'General history of S'),
('985', 'General history of S'),
('986', 'General history of S'),
('987', 'General history of S'),
('988', 'General history of S'),
('989', 'General history of S'),
('990', 'General history of o'),
('993', 'General history of other areas New Zealand'),
('994', 'General history of other areas Melanesia New Guinea'),
('995', 'General history of o'),
('996', 'General history of other areas Other parts of Pacific Polynesia'),
('997', 'General history of other areas Atlantic Ocean islands'),
('998', 'General history of other areas Arctic islands & Antarctica'),
('999', 'Extraterrestrial Worlds');

-- --------------------------------------------------------

--
-- Table structure for table `cat_periodical_t`
--

CREATE TABLE IF NOT EXISTS `cat_periodical_t` (
  `p_id` varchar(11) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `date_of_issue` varchar(25) DEFAULT NULL,
  `issn` varchar(13) DEFAULT NULL,
  `issued_within` varchar(100) NOT NULL,
  KEY `p_id` (`p_id`),
  KEY `p_id_2` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_periodical_t`
--

INSERT INTO `cat_periodical_t` (`p_id`, `label`, `date_of_issue`, `issn`, `issued_within`) VALUES
('PNHSP0001', '', 'February 2014', '001-0001-098', '30 days'),
('PNHSP0001P', 'huu', 'January 2014', '2-343-2323-23', '100 days');

-- --------------------------------------------------------

--
-- Table structure for table `cat_publisher_t`
--

CREATE TABLE IF NOT EXISTS `cat_publisher_t` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `pub_name` varchar(100) DEFAULT NULL,
  `street` varchar(25) DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`publisher_id`),
  KEY `publisher_id` (`publisher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cat_publisher_t`
--

INSERT INTO `cat_publisher_t` (`publisher_id`, `pub_name`, `street`, `country`, `city`) VALUES
(1, 'Phoenix Publishing House ', '1036 Edza', '(Munoz) Quezon City', 'Philippines'),
(2, 'Rex Publishing House', 'morales', 'Albay', 'Philippines'),
(3, 'Merriam ', '', 'Manila', 'Philippines'),
(4, 'Litlt, Brown ', '', 'United State', 'America');

-- --------------------------------------------------------

--
-- Table structure for table `cat_reading_material_t`
--

CREATE TABLE IF NOT EXISTS `cat_reading_material_t` (
  `call_no` varchar(11) NOT NULL,
  `pages` int(11) DEFAULT NULL,
  `size` varchar(11) DEFAULT NULL,
  `unit` varchar(75) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `subtitle` text,
  `volume` varchar(10) DEFAULT NULL,
  `copyright` varchar(10) DEFAULT NULL,
  `date_recorded` date DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `subject` varchar(10) NOT NULL,
  `section_no` int(11) NOT NULL,
  `image` blob,
  KEY `section_no` (`section_no`),
  KEY `publisher_id` (`publisher_id`),
  KEY `call_no` (`call_no`),
  KEY `publisher_id_2` (`publisher_id`),
  KEY `publisher_id_3` (`publisher_id`),
  KEY `subject` (`subject`),
  KEY `subject_2` (`subject`),
  KEY `subject_3` (`subject`),
  KEY `section_no_2` (`section_no`),
  KEY `section_no_3` (`section_no`),
  KEY `subject_4` (`subject`),
  KEY `publisher_id_4` (`publisher_id`),
  KEY `publisher_id_5` (`publisher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_reading_material_t`
--

INSERT INTO `cat_reading_material_t` (`call_no`, `pages`, `size`, `unit`, `title`, `subtitle`, `volume`, `copyright`, `date_recorded`, `publisher_id`, `subject`, `section_no`, `image`) VALUES
('PNHS0001', 99, '      100X5', 'cm', 'Discrete Science', 'Mathematical Structures for computer', 'V', '1995', '2014-01-10', 1, '002', 1, 0x646f776e6c6f6164202833292e6a7067504e485330303031),
('PNHS0002', 231, ' 23', 'cm', 'Differancial Calculus ', 'Reviewer', 'VII', '2004', '2014-01-10', 2, '004', 5, 0x646f776e6c6f6164202832292e6a7067504e485330303032),
('PNHSP0001', 20, '     233', 'cm', 'TimeMgazine', '', 'V', '2001', '2014-01-10', 2, '000', 4, 0x612e6a7067504e48535030303031),
('PNHSP00023M', 321, '          5', 'cm', 'Modern College Algebra', 'To the student', '', '1991', '2014-01-15', 2, '510', 3, 0x646f776e6c6f6164202834292e6a7067),
('PNHSP000P89', 887, '50X300', 'cm', 'PHYSICS', 'A GENERAL INTRODUCTION', '', '1986', '2014-01-15', 1, '968', 3, ''),
('PNHSP0001P', 100, '           ', 'cm', 'FHM', '', '', '2014', '2014-01-15', 4, '001', 4, 0x612e6a7067),
('PNHS00034', 123, '100X50', 'cm', 'Filipino', 'Wika', 'V', '2014', '2014-01-17', 1, '020', 3, ''),
('PNHS0007', 1231, '100X50', 'inches', 'Science', '', 'V', '2000', '2014-01-17', 1, '002', 2, ''),
('PNHSP000190', 579, '100X50', 'inches', 'BIOS Disassembly Ninjutsu', '', '', '2006', '2014-01-15', 3, '011', 5, 0x646f776e6c6f61642e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `cat_section_t`
--

CREATE TABLE IF NOT EXISTS `cat_section_t` (
  `section_no` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(20) NOT NULL,
  `unit_cost` varchar(20) NOT NULL,
  `fine_amount` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `section_unit` varchar(20) NOT NULL,
  PRIMARY KEY (`section_no`),
  KEY `section_no` (`section_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cat_section_t`
--

INSERT INTO `cat_section_t` (`section_no`, `section_name`, `unit_cost`, `fine_amount`, `time`, `section_unit`) VALUES
(1, 'non print', '0', '0', '0', '0'),
(2, 'rare book', '0', '0.00', '0', '0'),
(3, 'references', 'hour', '.50', '1800', 'minute'),
(4, 'periodical', 'minute', '.50', '1800', 'minute'),
(5, 'Reserved_acquisition', 'hour', '.50', '86400', 'day'),
(6, 'Circulation', 'day', '2.00', '172800', 'day'),
(7, 'Fiction_biographies', 'day', '1', '604800', 'day');

-- --------------------------------------------------------

--
-- Table structure for table `cat_supplies_t`
--

CREATE TABLE IF NOT EXISTS `cat_supplies_t` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `call_no` varchar(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `date_received` varchar(25) DEFAULT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supply_type` enum('Donated','Borrowed','Purchased') NOT NULL,
  PRIMARY KEY (`supplier_id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `call_no` (`call_no`),
  KEY `call_no_2` (`call_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `cat_supplies_t`
--

INSERT INTO `cat_supplies_t` (`supplier_id`, `call_no`, `quantity`, `unit_price`, `date_received`, `supplier_name`, `supply_type`) VALUES
(1, 'PNHS0001', 2, 200, '14-01-10', 'National Book Store', 'Purchased'),
(2, 'PNHS0002', 4, 0, '14-01-10', 'Printice Hall', 'Donated'),
(3, 'PNHSP0001', 1, 108.9, '2014-01-10', 'Printice Hall', 'Donated'),
(14, 'PNHSP00023M', 2, 1, '14-01-15', 'Merriam-Webster Incorporated', 'Donated'),
(15, 'PNHSP000P89', 2, 100.5, '14-01-15', 'Allan Van Heuvelen', 'Donated'),
(16, 'PNHSP0001P', 2, 200, '2014-01-15', 'Merriam-Webster Incorporated', 'Donated'),
(17, 'PNHS00034', 1, 156.9, '14-01-17', 'Printice Halls', 'Purchased'),
(18, 'PNHS0007', 2, 320.9, '14-01-17', 'Printice Halls', 'Donated'),
(19, 'PNHSP000190', 2, 200, '14-01-15', 'Iren lotino', 'Donated');

-- --------------------------------------------------------

--
-- Table structure for table `class_hours_t`
--

CREATE TABLE IF NOT EXISTS `class_hours_t` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_time` time DEFAULT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='SCHEDULING' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class_room_t`
--

CREATE TABLE IF NOT EXISTS `class_room_t` (
  `room_no` int(11) NOT NULL,
  `section_assigned` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_no`),
  KEY `section_assigned` (`section_assigned`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='SCHEDULING';

--
-- Dumping data for table `class_room_t`
--

INSERT INTO `class_room_t` (`room_no`, `section_assigned`) VALUES
(104, 0),
(105, 0),
(101, 101),
(102, 102),
(103, 103);

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule_t`
--

CREATE TABLE IF NOT EXISTS `class_schedule_t` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `day` varchar(15) NOT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `room` int(11) DEFAULT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SCHEDULING' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `class_schedule_t`
--

INSERT INTO `class_schedule_t` (`schedule_id`, `class_id`, `day`, `time_start`, `time_end`, `room`) VALUES
(1, 7, 'tuesday', '07:30:00', '09:30:00', 101),
(2, 7, 'thursday', '07:30:00', '09:30:00', 101),
(3, 8, 'tuesday', '13:00:00', '15:00:00', 101),
(4, 8, 'thursday', '13:00:00', '15:00:00', 101),
(5, 9, 'monday', '07:30:00', '08:30:00', 101),
(6, 9, 'wednesday', '07:30:00', '08:30:00', 101),
(7, 9, 'friday', '07:30:00', '08:30:00', 101),
(8, 9, 'thursday', '07:30:00', '08:30:00', 101),
(9, 10, 'tuesday', '08:30:00', '09:30:00', 101),
(10, 10, 'thursday', '08:30:00', '09:30:00', 101),
(11, 10, 'tuesday', '10:00:00', '11:00:00', 101),
(12, 10, 'thursday', '10:00:00', '11:00:00', 101),
(13, 11, 'monday', '13:00:00', '14:00:00', 101),
(14, 11, 'wednesday', '13:00:00', '14:00:00', 101),
(15, 11, 'friday', '13:00:00', '14:00:00', 101),
(16, 11, 'tuesday', '07:30:00', '08:30:00', 101),
(17, 12, 'tuesday', '13:00:00', '14:15:00', 102),
(18, 12, 'thursday', '13:00:00', '14:15:00', 102),
(19, 12, 'wednesday', '10:00:00', '10:45:00', 101);

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule_temp_t`
--

CREATE TABLE IF NOT EXISTS `class_schedule_temp_t` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `day` varchar(15) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `room` int(11) DEFAULT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SCHEDULING' AUTO_INCREMENT=73 ;

--
-- Dumping data for table `class_schedule_temp_t`
--

INSERT INTO `class_schedule_temp_t` (`schedule_id`, `class_id`, `day`, `time_start`, `time_end`, `room`) VALUES
(68, NULL, NULL, NULL, NULL, NULL),
(69, NULL, NULL, NULL, NULL, NULL),
(70, NULL, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_t`
--

CREATE TABLE IF NOT EXISTS `class_t` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) DEFAULT NULL,
  `sy_id` int(11) DEFAULT NULL,
  `subject_code` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `section_id` (`section_id`),
  KEY `subject_code` (`subject_code`),
  KEY `teacher_id` (`teacher_id`),
  KEY `sy_id` (`sy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SCHEDULING' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `class_t`
--

INSERT INTO `class_t` (`class_id`, `section_id`, `sy_id`, `subject_code`, `teacher_id`) VALUES
(2, 103, 1, 101, 10001),
(3, 101, 1, 102, 10001),
(4, 101, 1, 103, 10001),
(5, 101, 1, 106, 10001),
(6, 101, 1, 104, 10001),
(7, 101, 4, 101, 10001),
(8, 101, 4, 102, 10001),
(9, 100, 5, 101, 1234567),
(10, 100, 5, 102, 6875169),
(11, 100, 5, 103, 98765432),
(12, 100, 5, 104, 98765432),
(13, 101, 5, 101, 98765432),
(14, 101, 5, 102, 1234567),
(15, 100, 6, 102, 123);

-- --------------------------------------------------------

--
-- Table structure for table `club_adv_account_t`
--

CREATE TABLE IF NOT EXISTS `club_adv_account_t` (
  `club_id` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `account_date` date DEFAULT NULL,
  PRIMARY KEY (`club_id`,`account_no`),
  KEY `cacc_fk2` (`account_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club_adv_account_t`
--

INSERT INTO `club_adv_account_t` (`club_id`, `account_no`, `account_date`) VALUES
(1017, 23, '2014-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `club_application_t`
--

CREATE TABLE IF NOT EXISTS `club_application_t` (
  `club_app_id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `application_date` date DEFAULT NULL,
  `school_year` int(11) NOT NULL,
  `app_status` varchar(30) NOT NULL,
  PRIMARY KEY (`club_app_id`),
  KEY `clubapp_fk` (`club_id`),
  KEY `clubapp_fk2` (`student_id`),
  KEY `school_year` (`school_year`),
  KEY `school_year_2` (`school_year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `club_application_t`
--

INSERT INTO `club_application_t` (`club_app_id`, `club_id`, `student_id`, `application_date`, `school_year`, `app_status`) VALUES
(5, 1017, '2012-1004', '2014-01-18', 5, 'Approved'),
(6, 1017, '2015-1013', '2014-01-17', 5, 'Rejected'),
(7, 1017, '2015-1013', '2017-05-22', 6, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `club_members_t`
--

CREATE TABLE IF NOT EXISTS `club_members_t` (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(11) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `position` int(11) NOT NULL,
  `academicyear_joined` int(11) NOT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `club_members_t`
--

INSERT INTO `club_members_t` (`cm_id`, `club_id`, `student_id`, `position`, `academicyear_joined`) VALUES
(2, 1017, '2012-1004', 1, 5),
(4, 1017, '2015-1013', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `club_position_t`
--

CREATE TABLE IF NOT EXISTS `club_position_t` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_desc` varchar(30) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `club_position_t`
--

INSERT INTO `club_position_t` (`position_id`, `position_desc`) VALUES
(1, 'President'),
(2, 'Vice president'),
(3, 'Secretary'),
(4, 'Treasurer'),
(5, 'Auditor'),
(6, 'Public Information Officer'),
(7, 'Undeclared');

-- --------------------------------------------------------

--
-- Table structure for table `club_t`
--

CREATE TABLE IF NOT EXISTS `club_t` (
  `club_id` int(11) NOT NULL AUTO_INCREMENT,
  `club_name` varchar(30) DEFAULT NULL,
  `club_adviser` int(11) DEFAULT NULL,
  `club_status` varchar(30) NOT NULL,
  PRIMARY KEY (`club_id`),
  KEY `club_adviser` (`club_adviser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1019 ;

--
-- Dumping data for table `club_t`
--

INSERT INTO `club_t` (`club_id`, `club_name`, `club_adviser`, `club_status`) VALUES
(1017, 'English Club', 1234567, 'Active'),
(1018, 'Agricultural CLub', 10001, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_t`
--

CREATE TABLE IF NOT EXISTS `curriculum_t` (
  `curriculum_code` varchar(10) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `year_started_use` int(11) DEFAULT NULL,
  `quota` float DEFAULT NULL,
  PRIMARY KEY (`curriculum_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='scheduling';

--
-- Dumping data for table `curriculum_t`
--

INSERT INTO `curriculum_t` (`curriculum_code`, `title`, `year_started_use`, `quota`) VALUES
('K12', 'K to 12 Curriculum', 2012, 1),
('SEC', 'Secondary Education Curriculum', 2008, 1),
('SSC', 'Special Science Class', 2008, 92);

-- --------------------------------------------------------

--
-- Table structure for table `department_t`
--

CREATE TABLE IF NOT EXISTS `department_t` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(30) NOT NULL,
  `dept_description` varchar(100) DEFAULT NULL,
  `dept_head` int(11) DEFAULT NULL,
  PRIMARY KEY (`dept_id`),
  KEY `dept_head` (`dept_head`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department_t`
--

INSERT INTO `department_t` (`dept_id`, `dept_name`, `dept_description`, `dept_head`) VALUES
(1, 'ACCOUNTING', 'Money.Money.', 987654321),
(2, 'ENGLISH', 'Inglesera po kami.', 1234567);

-- --------------------------------------------------------

--
-- Table structure for table `discipline_category_t`
--

CREATE TABLE IF NOT EXISTS `discipline_category_t` (
  `cat_code` int(1) NOT NULL AUTO_INCREMENT,
  `cat_name` text NOT NULL,
  PRIMARY KEY (`cat_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `discipline_category_t`
--

INSERT INTO `discipline_category_t` (`cat_code`, `cat_name`) VALUES
(1, 'Minor'),
(2, 'Less grave'),
(3, 'Grave');

-- --------------------------------------------------------

--
-- Table structure for table `discipline_offense_t`
--

CREATE TABLE IF NOT EXISTS `discipline_offense_t` (
  `offense_code` int(11) NOT NULL AUTO_INCREMENT,
  `offense_description` text NOT NULL,
  `offense_cat` int(1) NOT NULL,
  PRIMARY KEY (`offense_code`),
  KEY `offense_cat` (`offense_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `discipline_offense_t`
--

INSERT INTO `discipline_offense_t` (`offense_code`, `offense_description`, `offense_cat`) VALUES
(38, 'Littering', 1),
(39, 'Loitering during class hours', 1),
(40, 'Sleeping in class', 1),
(41, 'Cutting classes', 1),
(42, 'Possession of firearms', 2),
(43, 'Threatening classmates an/or teachers', 3),
(44, 'Selling of pohibited drugs', 1),
(45, 'Public display of affection', 1),
(46, 'Theft of school property', 2),
(47, 'Dishonesty', 2),
(48, 'Wearing of earring/s in males', 1),
(49, 'Bullying', 2),
(50, 'Disruption of classes', 1),
(51, 'Cruelty among animals', 1),
(52, 'Cheating in exams', 1),
(53, 'Tampering of grades', 2),
(54, 'Affiliations in gangs, fraternities and illegal organiations', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eis_child_t`
--

CREATE TABLE IF NOT EXISTS `eis_child_t` (
  `emp_id` int(11) NOT NULL,
  `child_name` varchar(65) DEFAULT NULL,
  `child_bdate` date NOT NULL DEFAULT '0000-00-00',
  `count` int(3) NOT NULL,
  PRIMARY KEY (`emp_id`,`child_bdate`,`count`),
  KEY `emp_id` (`emp_id`),
  KEY `emp_id_2` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eis_civ_service_t`
--

CREATE TABLE IF NOT EXISTS `eis_civ_service_t` (
  `emp_id` int(11) NOT NULL,
  `career_service` varchar(65) NOT NULL,
  `rating` varchar(15) NOT NULL,
  `date_of_exam` date DEFAULT NULL,
  `place_of_exam` varchar(65) NOT NULL,
  `license_no` varchar(15) NOT NULL,
  `license_date_release` date DEFAULT NULL,
  `count` int(3) NOT NULL,
  PRIMARY KEY (`emp_id`,`license_no`,`count`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eis_ctc_t`
--

CREATE TABLE IF NOT EXISTS `eis_ctc_t` (
  `ctc_no` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `ctc_date` date DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ctc_no`),
  KEY `ctc_emp_fk` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eis_dependent_t`
--

CREATE TABLE IF NOT EXISTS `eis_dependent_t` (
  `dependent_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `d_name` varchar(50) DEFAULT NULL,
  `d_birthdate` date DEFAULT NULL,
  `relationship` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dependent_id`),
  KEY `dpndt_emp_fk` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eis_educ_bg_t`
--

CREATE TABLE IF NOT EXISTS `eis_educ_bg_t` (
  `emp_id` int(11) NOT NULL,
  `name_of_school` varchar(50) NOT NULL,
  `degree_course` varchar(50) NOT NULL,
  `year_graduated` year(4) DEFAULT NULL,
  `highest_grade_earned` varchar(15) NOT NULL,
  `inclusive_date_att_from` date NOT NULL DEFAULT '0000-00-00',
  `inclusive_date_att_to` date NOT NULL DEFAULT '0000-00-00',
  `scholarship` varchar(15) NOT NULL,
  `level` varchar(25) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`,`inclusive_date_att_from`,`inclusive_date_att_to`,`level`,`count`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eis_educ_bg_t`
--

INSERT INTO `eis_educ_bg_t` (`emp_id`, `name_of_school`, `degree_course`, `year_graduated`, `highest_grade_earned`, `inclusive_date_att_from`, `inclusive_date_att_to`, `scholarship`, `level`, `count`) VALUES
(6875169, 'sjdhgslfdg', 'rghug', 0000, '', '1992-01-07', '1992-12-10', '', 'Elementary', 1),
(98765432, 'daraga elementary ', 'sdfhdkj', 2004, '', '2004-01-06', '2004-01-13', '', 'Elementary', 1),
(98765432, 'daraga high ', 'dfdlghfkj', 2008, '', '2008-01-13', '2008-01-22', '', 'Secondary', 1),
(98765432, 'daraga academy', 'dsgdjfgfl', 0000, '', '2012-01-01', '2012-01-31', '', 'College1', 1),
(123456797, 'djghljfgfldj', 'rdcf', 2011, '', '2014-01-01', '2014-01-02', '', 'Elementary', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eis_leave_add_cat`
--

CREATE TABLE IF NOT EXISTS `eis_leave_add_cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_type` varchar(15) NOT NULL,
  `sick_credits` int(11) NOT NULL,
  `vac_credits` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `eis_leave_add_cat`
--

INSERT INTO `eis_leave_add_cat` (`cat_id`, `position_type`, `sick_credits`, `vac_credits`) VALUES
(1, 'teaching', 30, 0),
(2, 'non-teaching', 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `eis_leave_credits_t`
--

CREATE TABLE IF NOT EXISTS `eis_leave_credits_t` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `vacation_bal` int(5) DEFAULT NULL,
  `sick_bal` int(5) DEFAULT NULL,
  `leave_balance` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=987654322 ;

--
-- Dumping data for table `eis_leave_credits_t`
--

INSERT INTO `eis_leave_credits_t` (`emp_id`, `vacation_bal`, `sick_bal`, `leave_balance`) VALUES
(1234567, 45, 28, 73),
(6875169, 0, 60, 60),
(9076565, 15, 15, 30),
(12345678, 0, 60, 60),
(98765432, 0, 60, 60),
(123456773, 15, 15, 30),
(123456797, 15, 15, 30),
(987654321, 15, 15, 30);

-- --------------------------------------------------------

--
-- Table structure for table `eis_leave_credit_t`
--

CREATE TABLE IF NOT EXISTS `eis_leave_credit_t` (
  `credit_id` int(11) NOT NULL,
  `credit_points` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`credit_id`),
  KEY `credit_fk` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eis_leave_response_t`
--

CREATE TABLE IF NOT EXISTS `eis_leave_response_t` (
  `leave_res_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `response` varchar(20) NOT NULL,
  PRIMARY KEY (`leave_res_id`),
  KEY `leave_resfk` (`leave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eis_leave_t`
--

CREATE TABLE IF NOT EXISTS `eis_leave_t` (
  `emp_id` int(11) NOT NULL,
  `leave_id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `date_of_filling` date DEFAULT NULL,
  `duration` int(5) DEFAULT NULL,
  `type_of_leave` varchar(30) NOT NULL,
  `start_of_leave` date DEFAULT NULL,
  `end_of_leave` date DEFAULT NULL,
  `reason` text NOT NULL,
  `other_reason` varchar(65) DEFAULT NULL,
  `leave_status` varchar(25) NOT NULL,
  `incase_of_vacation` text,
  `incase_v_specify` varchar(65) DEFAULT NULL,
  `incase_of_sick` text,
  `incase_s1_specify` varchar(65) DEFAULT NULL,
  `incase_s2_specify` varchar(65) DEFAULT NULL,
  `commutation` varchar(15) DEFAULT NULL,
  `as_of_date` date DEFAULT NULL,
  `as_of_vacation_bal` int(5) DEFAULT NULL,
  `as_of_sick_bal` int(5) DEFAULT NULL,
  `as_of_total_bal` int(5) DEFAULT NULL,
  `date_of_recommendation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `reason_leave_recommendation` text,
  `other_recommendation` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`leave_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `eis_leave_t`
--

INSERT INTO `eis_leave_t` (`emp_id`, `leave_id`, `date_of_filling`, `duration`, `type_of_leave`, `start_of_leave`, `end_of_leave`, `reason`, `other_reason`, `leave_status`, `incase_of_vacation`, `incase_v_specify`, `incase_of_sick`, `incase_s1_specify`, `incase_s2_specify`, `commutation`, `as_of_date`, `as_of_vacation_bal`, `as_of_sick_bal`, `as_of_total_bal`, `date_of_recommendation`, `reason_leave_recommendation`, `other_recommendation`) VALUES
(1234567, 00001, '2014-01-17', 8, 'Sick Leave', '2014-01-01', '2014-01-10', 'Other', 'Fever', 'APPROVED', '', '', 'Out Patient', '', 'HOuse', 'Not Requested', '2014-01-17', 45, 15, 60, '2014-01-17 13:53:42', NULL, NULL),
(1234567, 00002, '2014-01-17', 9, 'Sick Leave', '2014-01-01', '2014-01-13', 'Other', 'TB', 'APPROVED', '', '', 'In Hospital', 'AMEEC', '', 'Requested', '2014-01-17', 45, 7, 52, '2014-01-17 13:59:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eis_other_info1_t`
--

CREATE TABLE IF NOT EXISTS `eis_other_info1_t` (
  `emp_id` int(11) NOT NULL,
  `special_skills` varchar(35) NOT NULL,
  `recognition` varchar(35) NOT NULL,
  `organization` varchar(35) NOT NULL,
  `count` int(3) NOT NULL,
  PRIMARY KEY (`emp_id`,`count`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eis_other_info1_t`
--

INSERT INTO `eis_other_info1_t` (`emp_id`, `special_skills`, `recognition`, `organization`, `count`) VALUES
(6875169, '', '', '', 1),
(6875169, '', '', '', 2),
(6875169, '', '', '', 3),
(6875169, '', '', '', 4),
(6875169, '', '', '', 5),
(9076565, '', '', '', 1),
(9076565, '', '', '', 2),
(9076565, '', '', '', 3),
(9076565, '', '', '', 4),
(9076565, '', '', '', 5),
(12345678, '', '', '', 1),
(12345678, '', '', '', 2),
(12345678, '', '', '', 3),
(12345678, '', '', '', 4),
(12345678, '', '', '', 5),
(98765432, '', '', '', 1),
(98765432, '', '', '', 2),
(98765432, '', '', '', 3),
(98765432, '', '', '', 4),
(98765432, '', '', '', 5),
(123456773, '', '', '', 1),
(123456773, '', '', '', 2),
(123456773, '', '', '', 3),
(123456773, '', '', '', 4),
(123456773, '', '', '', 5),
(123456797, '', '', '', 1),
(123456797, '', '', '', 2),
(123456797, '', '', '', 3),
(123456797, '', '', '', 4),
(123456797, '', '', '', 5),
(987654321, '', '', '', 1),
(987654321, '', '', '', 2),
(987654321, '', '', '', 3),
(987654321, '', '', '', 4),
(987654321, '', '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `eis_other_info2_t`
--

CREATE TABLE IF NOT EXISTS `eis_other_info2_t` (
  `emp_id` int(11) NOT NULL,
  `question_no` varchar(11) NOT NULL,
  `answer` varchar(3) NOT NULL,
  `details` varchar(35) NOT NULL,
  PRIMARY KEY (`emp_id`,`question_no`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eis_other_info2_t`
--

INSERT INTO `eis_other_info2_t` (`emp_id`, `question_no`, `answer`, `details`) VALUES
(6875169, 'q36_a', 'NO', ''),
(6875169, 'q36_b', 'NO', ''),
(6875169, 'q37_a', 'NO', ''),
(6875169, 'q37_b', 'NO', ''),
(6875169, 'q38', 'NO', ''),
(6875169, 'q39', 'NO', ''),
(6875169, 'q40', 'NO', ''),
(6875169, 'q41_a', 'NO', ''),
(6875169, 'q41_b', 'NO', ''),
(6875169, 'q41_c', 'NO', ''),
(9076565, 'q36_a', 'NO', ''),
(9076565, 'q36_b', 'NO', ''),
(9076565, 'q37_a', 'NO', ''),
(9076565, 'q37_b', 'NO', ''),
(9076565, 'q38', 'NO', ''),
(9076565, 'q39', 'NO', ''),
(9076565, 'q40', 'NO', ''),
(9076565, 'q41_a', 'NO', ''),
(9076565, 'q41_b', 'NO', ''),
(9076565, 'q41_c', 'NO', ''),
(12345678, 'q36_a', 'NO', ''),
(12345678, 'q36_b', 'NO', ''),
(12345678, 'q37_a', 'NO', ''),
(12345678, 'q37_b', 'NO', ''),
(12345678, 'q38', 'NO', ''),
(12345678, 'q39', 'NO', ''),
(12345678, 'q40', 'NO', ''),
(12345678, 'q41_a', 'NO', ''),
(12345678, 'q41_b', 'NO', ''),
(12345678, 'q41_c', 'NO', ''),
(98765432, 'q36_a', 'NO', ''),
(98765432, 'q36_b', 'NO', ''),
(98765432, 'q37_a', 'NO', ''),
(98765432, 'q37_b', 'NO', ''),
(98765432, 'q38', 'NO', ''),
(98765432, 'q39', 'NO', ''),
(98765432, 'q40', 'NO', ''),
(98765432, 'q41_a', 'NO', ''),
(98765432, 'q41_b', 'NO', ''),
(98765432, 'q41_c', 'NO', ''),
(123456773, 'q36_a', 'NO', ''),
(123456773, 'q36_b', 'NO', ''),
(123456773, 'q37_a', 'NO', ''),
(123456773, 'q37_b', 'NO', ''),
(123456773, 'q38', 'NO', ''),
(123456773, 'q39', 'NO', ''),
(123456773, 'q40', 'NO', ''),
(123456773, 'q41_a', 'NO', ''),
(123456773, 'q41_b', 'NO', ''),
(123456773, 'q41_c', 'NO', ''),
(123456797, 'q36_a', 'NO', ''),
(123456797, 'q36_b', 'NO', ''),
(123456797, 'q37_a', 'NO', ''),
(123456797, 'q37_b', 'NO', ''),
(123456797, 'q38', 'NO', ''),
(123456797, 'q39', 'NO', ''),
(123456797, 'q40', 'NO', ''),
(123456797, 'q41_a', 'NO', ''),
(123456797, 'q41_b', 'NO', ''),
(123456797, 'q41_c', 'NO', ''),
(987654321, 'q36_a', 'NO', ''),
(987654321, 'q36_b', 'NO', ''),
(987654321, 'q37_a', 'NO', ''),
(987654321, 'q37_b', 'NO', ''),
(987654321, 'q38', 'NO', ''),
(987654321, 'q39', 'NO', ''),
(987654321, 'q40', 'NO', ''),
(987654321, 'q41_a', 'NO', ''),
(987654321, 'q41_b', 'NO', ''),
(987654321, 'q41_c', 'NO', '');

-- --------------------------------------------------------

--
-- Table structure for table `eis_pic_t`
--

CREATE TABLE IF NOT EXISTS `eis_pic_t` (
  `emp_id` int(11) DEFAULT NULL,
  `pic_name` blob NOT NULL,
  KEY `fk_emp_pic` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eis_pic_t`
--

INSERT INTO `eis_pic_t` (`emp_id`, `pic_name`) VALUES
(1234567, 0x433336305f323031342d30312d30362d31362d35342d35302d3438392e6a706731323334353637),
(12345678, 0x313436383638375f3539333733333433373333313236315f3532363934353139335f6e2e6a7067),
(123456797, 0x646f776e6c6f6164202836292e6a7067),
(98765432, 0x66696f6e6120332e6a70673938373635343332),
(6875169, 0x646f776e6c6f61642e6a7067),
(123456773, 0x6466642e6a7067313233343536373733),
(987654321, 0x77656263616d2d746f792d70686f746f36342e6a7067),
(9076565, 0x433336305f323031342d30312d31322d31302d35352d31382d3835322e6a7067),
(123, 0x323031332d30372d32342031372e35312e34362e6a7067313233);

-- --------------------------------------------------------

--
-- Table structure for table `eis_pnhs_eligibility_t`
--

CREATE TABLE IF NOT EXISTS `eis_pnhs_eligibility_t` (
  `eligibility_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `exam_name` varchar(50) DEFAULT NULL,
  `date_taken` date DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`eligibility_id`),
  KEY `eligibility_emp_fk` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eis_reference_t`
--

CREATE TABLE IF NOT EXISTS `eis_reference_t` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `address` varchar(35) NOT NULL,
  `tel_no` varchar(11) NOT NULL,
  `count` int(1) NOT NULL,
  PRIMARY KEY (`emp_id`,`count`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eis_reference_t`
--

INSERT INTO `eis_reference_t` (`emp_id`, `name`, `address`, `tel_no`, `count`) VALUES
(6875169, '', '', '', 1),
(6875169, '', '', '', 2),
(6875169, '', '', '', 3),
(9076565, '', '', '', 1),
(9076565, '', '', '', 2),
(9076565, '', '', '', 3),
(12345678, '', '', '', 1),
(12345678, '', '', '', 2),
(12345678, '', '', '', 3),
(98765432, '', '', '', 1),
(98765432, '', '', '', 2),
(98765432, '', '', '', 3),
(123456773, '', '', '', 1),
(123456773, '', '', '', 2),
(123456773, '', '', '', 3),
(123456797, '', '', '', 1),
(123456797, '', '', '', 2),
(123456797, '', '', '', 3),
(987654321, '', '', '', 1),
(987654321, '', '', '', 2),
(987654321, '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `eis_school_t`
--

CREATE TABLE IF NOT EXISTS `eis_school_t` (
  `school_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `name_of_school` varchar(50) DEFAULT NULL,
  `degree_course` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `scholarship` varchar(50) DEFAULT NULL,
  `highest_grade` int(11) DEFAULT NULL,
  `year_graduated` int(11) DEFAULT NULL,
  PRIMARY KEY (`school_id`),
  KEY `school_emp_fk` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eis_training_program_t`
--

CREATE TABLE IF NOT EXISTS `eis_training_program_t` (
  `emp_id` int(11) NOT NULL,
  `title_of_seminar` varchar(65) NOT NULL,
  `inclusive_date_att_from` date NOT NULL DEFAULT '0000-00-00',
  `inclusive_date_att_to` date NOT NULL DEFAULT '0000-00-00',
  `no_of_hrs` int(11) DEFAULT NULL,
  `conducted_sponsor_by` varchar(65) NOT NULL,
  `count` int(3) NOT NULL,
  PRIMARY KEY (`emp_id`,`inclusive_date_att_from`,`inclusive_date_att_to`,`count`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eis_voluntary_work_t`
--

CREATE TABLE IF NOT EXISTS `eis_voluntary_work_t` (
  `emp_id` int(11) NOT NULL,
  `name_of_org` varchar(65) NOT NULL,
  `inclusive_date_from` date NOT NULL DEFAULT '0000-00-00',
  `inclusive_date_to` date NOT NULL DEFAULT '0000-00-00',
  `no_of_hrs` int(11) DEFAULT NULL,
  `nature_of_work` varchar(65) NOT NULL,
  `count` int(3) NOT NULL,
  PRIMARY KEY (`emp_id`,`inclusive_date_from`,`inclusive_date_to`,`count`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eis_work_experience_t`
--

CREATE TABLE IF NOT EXISTS `eis_work_experience_t` (
  `emp_id` int(11) NOT NULL,
  `inclusive_date_from` date NOT NULL DEFAULT '0000-00-00',
  `inclusive_date_to` date NOT NULL DEFAULT '0000-00-00',
  `position_title` varchar(65) NOT NULL,
  `dept_agency_office_company` varchar(65) NOT NULL,
  `monthly_salary` int(20) DEFAULT NULL,
  `salary_grade_and_step_inc` varchar(65) NOT NULL,
  `status_of_appointment` varchar(65) NOT NULL,
  `govt_service` varchar(65) NOT NULL,
  `count` int(3) NOT NULL,
  PRIMARY KEY (`emp_id`,`inclusive_date_from`,`inclusive_date_to`,`count`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_account_t`
--

CREATE TABLE IF NOT EXISTS `employee_account_t` (
  `emp_id` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`,`account_no`),
  KEY `emp_acct_fk2` (`account_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_account_t`
--

INSERT INTO `employee_account_t` (`emp_id`, `account_no`) VALUES
(123, 16),
(98765432, 20),
(12323, 21),
(123456797, 22),
(1234567, 23),
(9076565, 25),
(123456773, 26),
(98765432, 27),
(10001, 28),
(12345678, 29),
(12323, 30),
(123456797, 31),
(9076565, 32),
(1234567, 33),
(6875169, 34),
(10001, 37);

-- --------------------------------------------------------

--
-- Table structure for table `employee_position_t`
--

CREATE TABLE IF NOT EXISTS `employee_position_t` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_title` varchar(50) DEFAULT NULL,
  `position_type` enum('teaching','non-teaching') DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `employee_position_t`
--

INSERT INTO `employee_position_t` (`position_id`, `position_title`, `position_type`) VALUES
(13, 'Scheduling Admin', 'non-teaching'),
(14, 'SIS Admin', 'non-teaching'),
(15, 'teacher 1', 'teaching'),
(16, 'teacher II', 'teaching'),
(17, 'librarian', 'non-teaching'),
(18, 'Supplier Admin', 'non-teaching'),
(19, 'Registrar', 'teaching'),
(20, 'Registrar Admin', 'non-teaching'),
(21, 'Grading Admin', 'teaching');

-- --------------------------------------------------------

--
-- Table structure for table `employee_role_t`
--

CREATE TABLE IF NOT EXISTS `employee_role_t` (
  `role_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`emp_id`),
  KEY `role_id` (`role_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_role_t`
--

INSERT INTO `employee_role_t` (`role_id`, `emp_id`) VALUES
(13, 123456797),
(15, 123),
(15, 12345678),
(15, 98765432),
(16, 1234567),
(16, 6875169),
(17, 9076565),
(20, 123456773),
(20, 987654321);

-- --------------------------------------------------------

--
-- Table structure for table `employee_t`
--

CREATE TABLE IF NOT EXISTS `employee_t` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `f_name` varchar(50) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `name_extension` varchar(5) NOT NULL,
  `b_date` date NOT NULL,
  `age` int(11) NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `gsis_id_no` varchar(11) DEFAULT NULL,
  `pag_ibig_id_no` varchar(12) DEFAULT NULL,
  `philhealth_id_no` varchar(12) DEFAULT NULL,
  `sss_id_no` varchar(11) DEFAULT NULL,
  `agency_emp_no` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `p_address` varchar(50) NOT NULL,
  `p_zipcode` int(11) NOT NULL,
  `contact_no1` int(11) DEFAULT NULL,
  `contact_no2` int(11) DEFAULT NULL,
  `contact_no3` varchar(11) DEFAULT NULL,
  `e_add1` varchar(50) DEFAULT NULL,
  `e_add2` varchar(50) DEFAULT NULL,
  `e_add3` varchar(50) DEFAULT NULL,
  `tin` int(11) DEFAULT NULL,
  `sf_name` varchar(50) NOT NULL,
  `sm_name` varchar(50) NOT NULL,
  `sl_name` varchar(50) NOT NULL,
  `s_occupation` varchar(50) NOT NULL,
  `s_bus_name` varchar(50) NOT NULL,
  `s_bus_add` varchar(50) NOT NULL,
  `s_bus_telno` int(11) NOT NULL,
  `ff_name` varchar(50) NOT NULL,
  `fm_name` varchar(50) NOT NULL,
  `fl_name` varchar(50) NOT NULL,
  `mf_name` varchar(50) NOT NULL,
  `mm_name` varchar(50) NOT NULL,
  `ml_name` varchar(50) NOT NULL,
  `mmaiden_name` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `dept_id` (`dept_id`),
  KEY `dept_id_2` (`dept_id`),
  KEY `position` (`position`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='EIS' AUTO_INCREMENT=987654322 ;

--
-- Dumping data for table `employee_t`
--

INSERT INTO `employee_t` (`emp_id`, `position`, `dept_id`, `f_name`, `m_name`, `l_name`, `name_extension`, `b_date`, `age`, `place_of_birth`, `gender`, `civil_status`, `citizenship`, `height`, `weight`, `blood_type`, `gsis_id_no`, `pag_ibig_id_no`, `philhealth_id_no`, `sss_id_no`, `agency_emp_no`, `address`, `zip_code`, `p_address`, `p_zipcode`, `contact_no1`, `contact_no2`, `contact_no3`, `e_add1`, `e_add2`, `e_add3`, `tin`, `sf_name`, `sm_name`, `sl_name`, `s_occupation`, `s_bus_name`, `s_bus_add`, `s_bus_telno`, `ff_name`, `fm_name`, `fl_name`, `mf_name`, `mm_name`, `ml_name`, `mmaiden_name`) VALUES
(123, 13, 2, 'Visnu', 'Ejay', 'Baclao', 'JR', '2004-09-18', 9, 'calamba', 'Female', 'Single', 'Filipino', 123, 123, 'a', '123456789', '123456789098', '123456789012', '123456789', '12345678901', 'libon', 4507, 'libon', 4507, 2147483647, 2147483647, '1234567890', 'ejay@yahoo.com', 'ejay@baclao.com', 'ejay@baclaoyahoo.com', 2147483647, '', '', '', '', '', '', 0, '', '', '', ' ', '', '', ''),
(10001, 0, 1, 'Dick Harrence', '', 'Dela Vega', '', '0000-00-00', 0, '', 'male', '', '', 0, 0, '', NULL, NULL, NULL, NULL, '0', '', 0, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(12323, 0, 1, 'asdasd', 'asdasd', 'asasda', '', '1995-01-04', 19, 'asdasd', 'Male', 'Single', 'asdasd', 156, 23, 'a', '12345678912', '123456789123', '123456789123', '12345678912', '12345678912', 'asdasd', 1234, 'asdasd', 1234, 12345678, 12345678, '12345678912', '', NULL, NULL, 2147483647, '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(1234567, 0, 2, 'John', 'Jervie', 'Alcera', 'JR', '1995-03-21', 18, 'Tabaco City', 'Male', 'Single', 'Filipino', 158, 50, 'O', '1111111111', '22222222222', '33333333333', '2147483647', '2147483647', 'Tabaco City', 1234, 'Legazpi City', 1234, 12345678, 12345678, '2147483647', 'jervie@gmail.com', NULL, NULL, 2147483647, '', '', '', '', '', '', 0, '', '', '', '   ', '', '', ''),
(6875169, 0, 2, 'paulo', 'master', 'bonaqua', 'jr', '2014-01-17', 0, 'alabay', 'Male', 'Single', 'jdhsldgh', 123, 132, 'a', '12345678901', '123456789012', '123456789012', '12345678901', '12345678', 'vfdkghfk', 1324, 'sdbgbfd,', 1234, 12345678, 12345678, '12345678901', 'djfdh@vbdkfh.com', NULL, NULL, 123456789, '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(9076565, 0, 1, 'Iren', 'Llona', 'Lotino', '', '1995-01-08', 19, 'Camalig, Albay', 'Female', 'Single', 'tanzanian', 5, 543, 'a', '23456789011', '123456788901', '123456783211', '12345678901', '23456789', 'Camalig, Albay', 4501, 'fdfkjbgdrk', 1234, 12345678, 12345678, '12345678901', 'bgfdjkhdfk@gjhjkhg.com', NULL, NULL, 12345678, '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(12345678, 0, 1, 'wertyui', 'ertyu', 'dfghnmsdf', '', '2014-01-16', 0, 'asdasd', 'Male', 'Single', 'asda', 123, 12, 'a', '12345678912', '123456789123', '123456789123', '12345678912', '12345678912', '2312', 1234, 'sdasd', 1234, 12345678, 12345678, '12345678912', '', NULL, NULL, 2147483647, '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(98765432, 0, 2, 'fiona', 'cruz', 'llaneta', '', '2005-03-08', 8, 'daraga', 'Female', 'Single', 'american', 234, 55, 'a', '12345678901', '123456789001', '123456789011', '12345678900', '1234567890', 'daraga', 4503, 'daraga', 4321, 12345678, 12345678, '12345678900', 'dsbgdbgdkj@vkjgk.com', NULL, NULL, 2345678, '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(123456773, 0, 1, 'ralph', 'sed', 'Abayon', '', '1994-01-15', 20, 'sdkbkdl', 'Male', 'Single', 'dsfbsdjkgdfljgbfld', 123, 121, 'b', '12345678901', '123456789011', '123456789012', '12345678901', '2345678', 'sdfbdjh', 1234, 'kjgsdljkg', 1234, 12345678, 12345678, '12345678901', 'vndkfbjf@fjdkf.cjdfk', NULL, NULL, 23456789, '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(123456797, 0, 1, 'melwin', 'lips', 'balasta', '', '2014-03-04', -1, 'laguna', 'Male', 'Single', 'ddnjdsgbl', 123, 123, 'a', '12345678901', '234567890121', '123456789012', '12345678901', '123456789', 'libon', 2435, 'ckdsjgkl', 1234, 12345678, 12345678, '12345678901', 'jfbkjdfn@ydbhdgd.com', NULL, NULL, 1234567890, '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(987654321, 0, 1, 'Eunice', 'julian', 'Soriano', '', '1994-10-23', 19, 'fgbdfkgh', 'Male', 'Single', 'djfgfkdj', 1234, 123, 'a', '12345678012', '123456789091', '123456789001', '12345678901', '12345678', 'gndkjhgkd', 1234, 'cdbsgkbdgkdf', 1234, 12345678, 12345678, '12345678901', 'sdkjbgkdsb@fbdkfh.com', NULL, NULL, 12345678, '', '', '', '', '', '', 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_category_detail`
--

CREATE TABLE IF NOT EXISTS `equipment_category_detail` (
  `detail_no` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`detail_no`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='EQUIPMENT' AUTO_INCREMENT=50 ;

--
-- Dumping data for table `equipment_category_detail`
--

INSERT INTO `equipment_category_detail` (`detail_no`, `category_id`, `category`) VALUES
(25, 8, 'Acer'),
(26, 8, 'HP'),
(27, 8, 'asus'),
(28, 8, 'Lenovo'),
(29, 8, 'Apple'),
(30, 8, 'Gateway'),
(31, 8, 'Compaq'),
(32, 11, 'National'),
(33, 11, 'LG'),
(34, 11, 'Courier'),
(35, 10, 'Acer'),
(36, 10, 'Samsung'),
(37, 10, 'Hong'),
(38, 9, 'Canon'),
(39, 9, 'HP'),
(40, 9, 'Epson'),
(41, 9, 'brother'),
(42, 9, 'Sister'),
(43, 12, 'Honda'),
(44, 12, 'BMW'),
(45, 12, 'Nissan'),
(46, 12, 'Toyota'),
(47, 12, 'Audi'),
(48, 12, 'Hyundai'),
(49, 12, 'Dodge');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_category_t`
--

CREATE TABLE IF NOT EXISTS `equipment_category_t` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='EQUIPMENT' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `equipment_category_t`
--

INSERT INTO `equipment_category_t` (`category_id`, `item_name`) VALUES
(8, 'Laptop'),
(9, 'Printer'),
(10, 'Projector'),
(11, 'Aircon'),
(12, 'Car');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_color_t`
--

CREATE TABLE IF NOT EXISTS `equipment_color_t` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='EQUIPMENT' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `equipment_color_t`
--

INSERT INTO `equipment_color_t` (`color_id`, `color_name`) VALUES
(1, 'blue'),
(2, 'red'),
(3, 'yellow'),
(4, 'pink'),
(5, 'Silver'),
(6, 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_item_t`
--

CREATE TABLE IF NOT EXISTS `equipment_item_t` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_no` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `specs` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `e_cat_fk` (`category_id`),
  KEY `e_color_fk` (`color_id`),
  KEY `stock_no` (`stock_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='EQUIPMENT' AUTO_INCREMENT=27 ;

--
-- Dumping data for table `equipment_item_t`
--

INSERT INTO `equipment_item_t` (`item_id`, `stock_no`, `category_id`, `color_id`, `specs`) VALUES
(6, 5, 8, 5, 'iOS'),
(7, 5, 9, 6, 'with WiFi'),
(8, 6, 9, 6, 'with WiFi'),
(9, 5, 12, 4, '4WD'),
(10, 6, 12, 4, '4WD'),
(11, 7, 12, 4, '4WD'),
(12, 5, 11, 5, 'malipot'),
(13, 6, 11, 5, 'malipot'),
(14, 7, 11, 5, 'malipot'),
(15, 8, 11, 5, 'malipot'),
(16, 5, 10, 6, 'malinaw'),
(17, 6, 10, 6, 'malinaw'),
(18, 7, 10, 6, 'malinaw'),
(19, 8, 10, 6, 'malinaw'),
(20, 9, 10, 6, 'malinaw'),
(21, 5, 10, 2, ''),
(22, 6, 10, 2, ''),
(23, 7, 10, 2, ''),
(24, 8, 10, 2, ''),
(25, 9, 10, 2, ''),
(26, 10, 10, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_property_t`
--

CREATE TABLE IF NOT EXISTS `equipment_property_t` (
  `property_no` int(11) NOT NULL AUTO_INCREMENT,
  `stock_no` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `quantity_acquired` int(11) NOT NULL,
  `date_acquired` date DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`property_no`),
  KEY `e_emp_fk` (`emp_id`),
  KEY `stock_no` (`stock_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='EQUIPMENT' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `equipment_property_t`
--

INSERT INTO `equipment_property_t` (`property_no`, `stock_no`, `emp_id`, `quantity_acquired`, `date_acquired`, `status`) VALUES
(5, 5, 1234567, 2, '2014-01-21', 'borrowed'),
(6, 7, 10001, 1, '2014-01-21', 'borrowed'),
(7, 6, 1234567, 4, '2014-01-21', 'borrowed'),
(8, 8, 123456797, 3, '2014-01-17', 'borrowed'),
(9, 7, 10001, 2, '2014-01-15', 'borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_record_t`
--

CREATE TABLE IF NOT EXISTS `equipment_record_t` (
  `stock_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_no` int(11) NOT NULL,
  `date_delivered` date NOT NULL,
  `unit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `life_span` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `qoh` int(11) NOT NULL,
  `sy_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stock_no`),
  KEY `e_rec_stock_fk` (`stock_no`),
  KEY `e_rec_supp_fk` (`supplier_no`),
  KEY `stock_no` (`stock_no`),
  KEY `unit` (`unit`),
  KEY `unit_2` (`unit`),
  KEY `sy_id` (`sy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='EQUIPMENT' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `equipment_record_t`
--

INSERT INTO `equipment_record_t` (`stock_no`, `supplier_no`, `date_delivered`, `unit`, `quantity`, `life_span`, `amount`, `qoh`, `sy_id`) VALUES
(5, 1, '2014-01-21', 2, 5, 2, 50000, 3, 5),
(6, 2, '2014-01-21', 2, 10, 1, 8000, 6, 5),
(7, 1, '2014-01-21', 2, 4, 15, 1200000, 1, 5),
(8, 2, '2014-01-21', 2, 10, 10, 10000, 7, 5),
(9, 4, '2014-01-21', 2, 5, 5, 5000, 5, 5),
(10, 2, '2014-01-17', 5, 4, 4, 12, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_serial_t`
--

CREATE TABLE IF NOT EXISTS `equipment_serial_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_no` int(11) NOT NULL,
  `serial_no` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_no` (`property_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `equipment_serial_t`
--

INSERT INTO `equipment_serial_t` (`id`, `property_no`, `serial_no`) VALUES
(4, 5, 'laptop123'),
(5, 5, 'laptop456'),
(6, 6, 'car123'),
(7, 7, 'pr1'),
(8, 7, 'pr2'),
(9, 7, 'pr3'),
(10, 7, 'pr4'),
(11, 8, 'melwin1'),
(12, 8, 'melwin2'),
(13, 8, 'melwin3'),
(14, 9, 'car99'),
(15, 9, 'car88');

-- --------------------------------------------------------

--
-- Table structure for table `final_grade_t`
--

CREATE TABLE IF NOT EXISTS `final_grade_t` (
  `fg_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(15) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `final_grade` int(5) DEFAULT NULL,
  PRIMARY KEY (`fg_id`),
  KEY `student_id` (`student_id`),
  KEY `sy_id` (`sy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `final_grade_t`
--

INSERT INTO `final_grade_t` (`fg_id`, `student_id`, `sy_id`, `final_grade`) VALUES
(1, '2012-1005', 1, 79),
(2, '2012-1004', 1, 78),
(3, '2012-1004', 2, 99),
(4, '2012-1005', 2, 75),
(5, '2013-1006', 2, 78),
(6, '2013-1007', 2, 78),
(7, '2013-1008', 2, 90),
(8, '2013-1006', 3, 99),
(9, '2012-1004', 3, 89),
(10, '2014-1009', 3, 88),
(11, '2014-1010', 3, 77),
(12, '2014-1011', 3, 78),
(13, '2014-1009', 4, 74),
(14, '2014-1010', 4, 80),
(15, '2013-1006', 4, 70),
(16, '2012-1004', 4, 73),
(17, '2015-1012', 4, 70),
(18, '2015-1013', 4, 80),
(19, '2015-1013', 5, NULL),
(20, '2015-1012', 5, NULL),
(21, '2013-1006', 5, NULL),
(22, '2014-1009', 5, NULL),
(23, '2012-1004', 5, NULL),
(24, '2016-1014', 5, NULL),
(25, '2016-1015', 5, 70),
(26, '2016-1016', 5, NULL),
(27, '2016-1017', 5, NULL),
(28, '2016-1018', 5, NULL),
(29, '2016-1019', 5, NULL),
(30, '2017-1020', 6, NULL),
(31, '2017-1021', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gmc_t`
--

CREATE TABLE IF NOT EXISTS `gmc_t` (
  `gmc_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(15) NOT NULL,
  `release_date` date DEFAULT NULL,
  PRIMARY KEY (`gmc_id`),
  KEY `gmc_fk` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SIS' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gmc_t`
--

INSERT INTO `gmc_t` (`gmc_id`, `student_id`, `release_date`) VALUES
(1, '2012-1004', '2014-01-10'),
(2, '2012-1004', '2014-01-17'),
(3, '2012-1004', '2014-01-17'),
(4, '2012-1004', '2014-01-18'),
(5, '2012-1004', '2017-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `grading_assignments`
--

CREATE TABLE IF NOT EXISTS `grading_assignments` (
  `assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `assign_num` int(5) NOT NULL,
  `assign_item_num` int(5) NOT NULL,
  `assign_date` date NOT NULL,
  `assign_avg` float NOT NULL,
  `grading_period` int(5) DEFAULT NULL,
  `subject_code` int(10) DEFAULT NULL,
  `assign_score` float NOT NULL,
  `student_id` varchar(15) NOT NULL,
  PRIMARY KEY (`assign_id`),
  KEY `assign_avg` (`assign_avg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grading_assignments`
--

INSERT INTO `grading_assignments` (`assign_id`, `assign_num`, `assign_item_num`, `assign_date`, `assign_avg`, `grading_period`, `subject_code`, `assign_score`, `student_id`) VALUES
(1, 1, 5, '2014-01-15', 80, 1, 102, 4, '2017-1020'),
(2, 1, 5, '2014-01-15', 60, 1, 102, 3, '2017-1021');

-- --------------------------------------------------------

--
-- Table structure for table `grading_chapter_test`
--

CREATE TABLE IF NOT EXISTS `grading_chapter_test` (
  `chapter_test_id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(15) NOT NULL,
  `chapter_test_num` int(20) NOT NULL,
  `chapter_test_score` float NOT NULL,
  `chapter_test_avg` float NOT NULL,
  `chapter_test_date` date NOT NULL,
  `chapter_test_item_num` int(5) NOT NULL,
  `grading_period` int(15) NOT NULL,
  `subject_code` int(15) NOT NULL,
  PRIMARY KEY (`chapter_test_id`),
  KEY `chapter_test_avg` (`chapter_test_avg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grading_criteria`
--

CREATE TABLE IF NOT EXISTS `grading_criteria` (
  `quizzes` int(11) NOT NULL,
  `assignments` int(11) NOT NULL,
  `participation` int(11) NOT NULL,
  `chapter_test` int(11) NOT NULL,
  `projects` int(11) NOT NULL,
  `periodical_exam` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`criteria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `grading_criteria`
--

INSERT INTO `grading_criteria` (`quizzes`, `assignments`, `participation`, `chapter_test`, `projects`, `periodical_exam`, `criteria_id`) VALUES
(20, 10, 20, 20, 25, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grading_participation`
--

CREATE TABLE IF NOT EXISTS `grading_participation` (
  `participation_id` int(10) NOT NULL AUTO_INCREMENT,
  `participation_num` int(5) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `participation_grade` float NOT NULL,
  `participation_avg` float NOT NULL,
  `grading_period` int(5) DEFAULT NULL,
  `subject_code` int(10) DEFAULT NULL,
  PRIMARY KEY (`participation_id`),
  KEY `participation_avg` (`participation_avg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grading_participation`
--

INSERT INTO `grading_participation` (`participation_id`, `participation_num`, `student_id`, `participation_grade`, `participation_avg`, `grading_period`, `subject_code`) VALUES
(1, 1, '2017-1020', 97, 0, 1, 102),
(2, 1, '2017-1021', 89, 0, 1, 102);

-- --------------------------------------------------------

--
-- Table structure for table `grading_periodical_exam`
--

CREATE TABLE IF NOT EXISTS `grading_periodical_exam` (
  `student_id` varchar(15) NOT NULL,
  `periodical_exam_score` int(11) NOT NULL,
  `periodical_exam_avg` float NOT NULL,
  `periodical_exam_item_num` int(11) NOT NULL,
  `periodical_exam_date` date NOT NULL,
  `periodical_exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `periodical_exam_num` int(11) NOT NULL,
  `subject_code` int(15) NOT NULL,
  PRIMARY KEY (`periodical_exam_id`),
  KEY `periodical_exam_avg` (`periodical_exam_avg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grading_periodical_exam`
--

INSERT INTO `grading_periodical_exam` (`student_id`, `periodical_exam_score`, `periodical_exam_avg`, `periodical_exam_item_num`, `periodical_exam_date`, `periodical_exam_id`, `periodical_exam_num`, `subject_code`) VALUES
('2017-1020', 48, 96, 50, '2014-01-15', 1, 1, 0),
('2017-1021', 49, 98, 50, '2014-01-15', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grading_projects`
--

CREATE TABLE IF NOT EXISTS `grading_projects` (
  `proj_id` int(11) NOT NULL AUTO_INCREMENT,
  `proj_num` int(5) NOT NULL,
  `proj_grade` float NOT NULL,
  `proj_avg` float NOT NULL,
  `grading_period` int(5) DEFAULT NULL,
  `subject_code` int(10) DEFAULT NULL,
  `student_id` varchar(11) NOT NULL,
  PRIMARY KEY (`proj_id`),
  KEY `proj_avg` (`proj_avg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grading_projects`
--

INSERT INTO `grading_projects` (`proj_id`, `proj_num`, `proj_grade`, `proj_avg`, `grading_period`, `subject_code`, `student_id`) VALUES
(1, 1, 90, 0, 1, 102, '2017-1020'),
(2, 1, 85, 0, 1, 102, '2017-1021');

-- --------------------------------------------------------

--
-- Table structure for table `grading_quizzes`
--

CREATE TABLE IF NOT EXISTS `grading_quizzes` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(15) NOT NULL,
  `quiz_num` int(11) NOT NULL,
  `quiz_item_num` int(11) NOT NULL,
  `quiz_score` int(11) NOT NULL,
  `quiz_avg` float NOT NULL,
  `grading_period` int(5) DEFAULT NULL,
  `subject_code` int(10) DEFAULT NULL,
  `quiz_date` date NOT NULL,
  PRIMARY KEY (`quiz_id`),
  KEY `quiz_avg` (`quiz_avg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `grading_quizzes`
--

INSERT INTO `grading_quizzes` (`quiz_id`, `student_id`, `quiz_num`, `quiz_item_num`, `quiz_score`, `quiz_avg`, `grading_period`, `subject_code`, `quiz_date`) VALUES
(1, '2017-1020', 1, 5, 5, 100, 1, 0, '2014-01-15'),
(2, '2017-1021', 1, 5, 5, 100, 1, 0, '2014-01-15'),
(3, '2017-1020', 2, 5, 5, 100, 1, 102, '2014-01-15'),
(4, '2017-1021', 2, 5, 4, 80, 1, 102, '2014-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `grading_subject_grade`
--

CREATE TABLE IF NOT EXISTS `grading_subject_grade` (
  `subject_code` varchar(20) NOT NULL,
  `credit_unit` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `subject_title` char(20) NOT NULL,
  `curriculum_code` char(10) NOT NULL,
  `class_id` int(11) NOT NULL,
  `periodical_exam_avg` float NOT NULL,
  `quizzes_avg` int(11) NOT NULL,
  `assign_avg` int(11) NOT NULL,
  `proj_avg` int(11) NOT NULL,
  `chapter_test_avg` int(11) NOT NULL,
  `participation_avg` int(11) NOT NULL,
  `subject_grade` float NOT NULL,
  PRIMARY KEY (`subject_code`),
  KEY `class_id` (`class_id`),
  KEY `curriculum_code` (`curriculum_code`),
  KEY `periodical_exam_avg` (`periodical_exam_avg`,`quizzes_avg`,`assign_avg`,`proj_avg`,`chapter_test_avg`,`participation_avg`),
  KEY `participation_avg` (`participation_avg`),
  KEY `quiz_avg` (`quizzes_avg`),
  KEY `assign_avg` (`assign_avg`,`proj_avg`,`chapter_test_avg`),
  KEY `proj_avg` (`proj_avg`,`chapter_test_avg`),
  KEY `chapter_test_avg` (`chapter_test_avg`),
  KEY `quizzes_avg` (`quizzes_avg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grading_subject_grade_assignment`
--

CREATE TABLE IF NOT EXISTS `grading_subject_grade_assignment` (
  `assign_id` int(11) NOT NULL,
  `assign_avg` float NOT NULL,
  UNIQUE KEY `assign_avg` (`assign_avg`),
  KEY `assign_avg_2` (`assign_avg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grading_subject_grade_chapter_test`
--

CREATE TABLE IF NOT EXISTS `grading_subject_grade_chapter_test` (
  `chapter_test_id` int(11) NOT NULL,
  `chapter_test_avg` float NOT NULL,
  PRIMARY KEY (`chapter_test_avg`),
  KEY `participation_avg` (`chapter_test_avg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grading_subject_grade_participation`
--

CREATE TABLE IF NOT EXISTS `grading_subject_grade_participation` (
  `participation_id` int(11) NOT NULL,
  `participation_avg` float NOT NULL,
  PRIMARY KEY (`participation_avg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grading_subject_grade_participation`
--

INSERT INTO `grading_subject_grade_participation` (`participation_id`, `participation_avg`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grading_subject_grade_periodical_exam`
--

CREATE TABLE IF NOT EXISTS `grading_subject_grade_periodical_exam` (
  `periodical_exam_id` int(11) NOT NULL,
  `periodical_exam_avg` float NOT NULL,
  KEY `periodical_exam_avg` (`periodical_exam_avg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grading_subject_grade_periodical_exam`
--

INSERT INTO `grading_subject_grade_periodical_exam` (`periodical_exam_id`, `periodical_exam_avg`) VALUES
(1, 0),
(2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grading_subject_grade_projects`
--

CREATE TABLE IF NOT EXISTS `grading_subject_grade_projects` (
  `proj_avg` float NOT NULL,
  `proj_id` int(11) NOT NULL,
  KEY `proj_avg` (`proj_avg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grading_subject_grade_projects`
--

INSERT INTO `grading_subject_grade_projects` (`proj_avg`, `proj_id`) VALUES
(0, 1),
(0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `grading_subject_grade_quizzes`
--

CREATE TABLE IF NOT EXISTS `grading_subject_grade_quizzes` (
  `quiz_id` int(11) NOT NULL,
  `quizzes_avg` float NOT NULL,
  KEY `quizzes_avg` (`quizzes_avg`),
  KEY `quizzes_avg_2` (`quizzes_avg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grading_subject_grade_quizzes`
--

INSERT INTO `grading_subject_grade_quizzes` (`quiz_id`, `quizzes_avg`) VALUES
(18, 5),
(19, 10),
(20, 7.5),
(21, 2.5),
(22, 9),
(23, 8),
(24, 7),
(25, 6),
(26, 10),
(27, 8),
(28, 9),
(29, 10),
(30, 8),
(31, 9),
(32, 10),
(33, 8),
(34, 9),
(35, 10),
(36, 1),
(37, 8),
(38, 9),
(39, 13),
(40, 6),
(41, 14),
(42, 5),
(43, 4),
(44, 9),
(45, 10),
(1, 0),
(2, 0),
(3, 0),
(4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item_t`
--

CREATE TABLE IF NOT EXISTS `inventory_item_t` (
  `item_no` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`item_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SUPPLY' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `inventory_item_t`
--

INSERT INTO `inventory_item_t` (`item_no`, `item_name`) VALUES
(10, 'Paper'),
(11, 'Chalk'),
(12, 'Marker');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_stock_t`
--

CREATE TABLE IF NOT EXISTS `inventory_stock_t` (
  `stock_no` int(11) NOT NULL AUTO_INCREMENT,
  `detail_no` int(11) DEFAULT NULL,
  `unit_no` int(11) DEFAULT NULL,
  `type_no` int(10) NOT NULL,
  `description` varchar(30) NOT NULL,
  `qoh` int(11) NOT NULL,
  PRIMARY KEY (`stock_no`),
  KEY `supp_unit_fk` (`unit_no`),
  KEY `supp_detail_fk` (`detail_no`),
  KEY `supp_type_fk` (`type_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SUPPLY' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `inventory_stock_t`
--

INSERT INTO `inventory_stock_t` (`stock_no`, `detail_no`, `unit_no`, `type_no`, `description`, `qoh`) VALUES
(9, 24, 3, 1, 'Long', 18),
(10, 27, 1, 3, '50pcs.', 13),
(11, 29, 8, 1, 'Black', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_supplier_t`
--

CREATE TABLE IF NOT EXISTS `inventory_supplier_t` (
  `supplier_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`supplier_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='INVENTORY' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `inventory_supplier_t`
--

INSERT INTO `inventory_supplier_t` (`supplier_no`, `supplier_name`, `address`, `contact_no`) VALUES
(1, 'Lester Motors', 'Legazpi City', '09197069346'),
(2, 'Jebson Trading', 'Moscow, Russia', '09127976308'),
(3, 'Lucky Educational', 'Legazpi, Albay', '09876543450'),
(4, 'Octagon', 'LCC', '09756345261'),
(5, 'CdR-King', 'Gaisano', '27487287482');

-- --------------------------------------------------------

--
-- Table structure for table `library_logs`
--

CREATE TABLE IF NOT EXISTS `library_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_no` int(11) DEFAULT NULL,
  `log_in_time` time DEFAULT NULL,
  `log_out_time` time DEFAULT NULL,
  `log_date` date DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `account_no` (`account_no`),
  KEY `account_no_2` (`account_no`),
  KEY `account_no_3` (`account_no`),
  KEY `account_no_4` (`account_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=183 ;

--
-- Dumping data for table `library_logs`
--

INSERT INTO `library_logs` (`log_id`, `account_no`, `log_in_time`, `log_out_time`, `log_date`) VALUES
(174, 10, '23:33:37', '07:29:23', '2017-01-01'),
(175, 10, '07:29:27', '07:29:30', '2014-01-15'),
(176, 15, '07:29:44', '07:37:45', '2014-01-15'),
(177, 11, '07:29:55', '07:37:47', '2014-01-15'),
(178, 15, '07:48:36', '07:48:46', '2016-01-15'),
(179, 10, '07:48:40', '07:48:46', '2016-01-15'),
(180, 11, '07:48:44', '07:48:48', '2016-01-15'),
(181, 11, '21:12:35', '21:12:38', '2014-01-17'),
(182, 26, '21:13:38', '21:13:44', '2014-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `municipality_t`
--

CREATE TABLE IF NOT EXISTS `municipality_t` (
  `municipality_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`municipality_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipality_t`
--

INSERT INTO `municipality_t` (`municipality_name`) VALUES
('Bacacay'),
('Camalig'),
('Daraga'),
('Guinobatan'),
('jervie'),
('Jovellar'),
('Legazpi City'),
('Libon'),
('Ligao City'),
('Malilipot'),
('Malinao'),
('Manito'),
('Oas'),
('Pio Duran'),
('Polangui'),
('Rapu-Rapu'),
('Sto. Dominggo'),
('Tabaco City'),
('Tiwi');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_t`
--

CREATE TABLE IF NOT EXISTS `scholarship_t` (
  `scholarship_id` int(11) NOT NULL AUTO_INCREMENT,
  `scholarship_name` varchar(50) DEFAULT NULL,
  `grantor` varchar(50) NOT NULL,
  `financial grant` varchar(30) NOT NULL,
  PRIMARY KEY (`scholarship_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `scholarship_t`
--

INSERT INTO `scholarship_t` (`scholarship_id`, `scholarship_name`, `grantor`, `financial grant`) VALUES
(1, 'CHED-OTOS', 'Commision on Higher Education', 'Full Tuition'),
(2, 'DOST', 'Department of Science and Technology', 'Full Tuition'),
(3, 'AKO BICOL SCHOLARSHIP', 'AKO BIKOL PARTYLIST', 'Miscellaneous Fee'),
(4, 'SKOP', 'Government', 'Full Tuition with Matriculatio'),
(5, 'NONE', 'NONE', 'NONE'),
(6, 'jervie', 'jervie', 'Full Tuition with Matriculatio');

-- --------------------------------------------------------

--
-- Table structure for table `school_year_t`
--

CREATE TABLE IF NOT EXISTS `school_year_t` (
  `sy_id` int(11) NOT NULL AUTO_INCREMENT,
  `sy_start` int(11) DEFAULT NULL,
  `sy_end` int(11) DEFAULT NULL,
  `no_of_days` int(5) NOT NULL,
  `SY_Status` int(5) NOT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='REGISTRATION' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `school_year_t`
--

INSERT INTO `school_year_t` (`sy_id`, `sy_start`, `sy_end`, `no_of_days`, `SY_Status`) VALUES
(1, 2012, 2013, 120, 0),
(2, 2013, 2014, 130, 0),
(3, 2014, 2015, 150, 0),
(4, 2015, 2016, 150, 0),
(5, 2016, 2017, 150, 0),
(6, 2017, 2018, 130, 1);

-- --------------------------------------------------------

--
-- Table structure for table `section_t`
--

CREATE TABLE IF NOT EXISTS `section_t` (
  `section_id` int(11) NOT NULL,
  `section_no` int(11) DEFAULT NULL,
  `year_level` int(11) DEFAULT NULL,
  `section_name` varchar(30) DEFAULT NULL,
  `class_adviser_id` int(11) DEFAULT NULL,
  `curriculum_code` varchar(5) DEFAULT NULL,
  `section_size` int(5) NOT NULL,
  PRIMARY KEY (`section_id`),
  KEY `section_adviser_fk` (`class_adviser_id`),
  KEY `section_curr_fk` (`curriculum_code`),
  KEY `year_level` (`year_level`),
  KEY `curriculum_code` (`curriculum_code`),
  KEY `year_level_2` (`year_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='SCHEDULING';

--
-- Dumping data for table `section_t`
--

INSERT INTO `section_t` (`section_id`, `section_no`, `year_level`, `section_name`, `class_adviser_id`, `curriculum_code`, `section_size`) VALUES
(100, 0, 1, 'Gold-SSC', 10001, 'SSC', 5),
(101, 1, 1, 'Silver', NULL, 'K12', 5),
(102, 2, 1, 'Copper', NULL, 'K12', 5),
(103, 3, 1, 'Bronze', NULL, 'K12', 5),
(104, 4, 1, 'Platinum', NULL, 'K12', 5),
(200, 0, 2, 'Narra - SSC', 6875169, 'SSC', 5),
(201, 2, 2, 'Acacia', 10001, 'K12', 5),
(202, 5, 2, 'Molave', NULL, 'K12', 10),
(203, 3, 2, 'Manga', NULL, 'K12', 5),
(204, 4, 2, 'Coconut', NULL, 'K12', 5),
(300, 0, 3, 'Mango-SSC', 12323, 'SSC', 5),
(301, 1, 3, 'Apple', NULL, 'K12', 5),
(302, 2, 3, 'Banana', NULL, 'K12', 5),
(303, 3, 3, 'Watermelon', NULL, 'K12', 5),
(304, 4, 3, 'Orange', NULL, 'K12', 5),
(400, 0, 4, 'Rizal-SSC', NULL, 'SSC', 5),
(401, 1, 4, 'Bonifacio', NULL, 'K12', 5),
(402, 2, 4, 'Del Pilar', NULL, 'K12', 5),
(403, 3, 4, 'Aguinaldo', NULL, 'K12', 5),
(404, 4, 4, 'Mabini', NULL, 'K12', 5),
(500, 0, 5, 'Zues-SSC', 1234567, 'SSC', 5),
(501, 1, 5, 'Hermes', NULL, 'K12', 5),
(502, 2, 5, 'Hercules', NULL, 'K12', 5),
(503, 3, 5, 'Adonis', NULL, 'K12', 5),
(504, 4, 5, 'Hadas', NULL, 'K12', 5),
(600, 0, 6, 'Asus-SSC', 98765432, 'SSC', 5),
(601, 1, 6, 'Acer', NULL, 'K12', 5),
(602, 2, 6, 'Lenovo', NULL, 'K12', 5),
(603, 3, 6, 'HP', NULL, 'K12', 5),
(604, 4, 6, 'Dell', NULL, 'K12', 5);

-- --------------------------------------------------------

--
-- Table structure for table `student_account_t`
--

CREATE TABLE IF NOT EXISTS `student_account_t` (
  `student_id` varchar(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `account_date` date DEFAULT NULL,
  PRIMARY KEY (`student_id`,`account_no`),
  KEY `student_id` (`student_id`),
  KEY `account_no` (`account_no`),
  KEY `student_id_2` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_account_t`
--

INSERT INTO `student_account_t` (`student_id`, `account_no`, `account_date`) VALUES
('2012-1004', 10, '2014-01-18'),
('2012-1005', 15, NULL),
('2015-1012', 11, '2014-01-18'),
('2015-1013', 13, '2014-01-18'),
('2016-1014', 12, '2014-01-18'),
('2016-1016', 38, '2017-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `student_offense_list_t`
--

CREATE TABLE IF NOT EXISTS `student_offense_list_t` (
  `student_id` varchar(30) NOT NULL,
  `offense_code` int(11) NOT NULL,
  `offense_date` date NOT NULL DEFAULT '0000-00-00',
  `Remarks` text NOT NULL,
  `school_year` int(11) NOT NULL,
  PRIMARY KEY (`student_id`,`offense_code`,`offense_date`),
  KEY `of_fk` (`offense_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_offense_list_t`
--

INSERT INTO `student_offense_list_t` (`student_id`, `offense_code`, `offense_date`, `Remarks`, `school_year`) VALUES
('2012-1004', 43, '2014-01-10', 'Cleared', 5),
('2012-1004', 43, '2014-01-13', 'Cleared', 2),
('2012-1004', 44, '2014-01-08', 'Cleared', 5),
('2012-1004', 47, '2017-05-22', 'Cleared', 6),
('2012-1004', 54, '2014-01-01', 'Cleared', 5),
('2012-1005', 43, '2014-01-13', 'Uncleared', 5),
('2012-1005', 44, '2014-01-20', 'Cleared', 1),
('2013-1007', 41, '2014-01-12', 'Uncleared', 5),
('2013-1007', 44, '2014-01-01', 'Uncleared', 5),
('2014-1010', 47, '2013-08-05', 'Cleared', 3),
('2014-1010', 47, '2014-06-13', 'Cleared', 3),
('2014-1011', 45, '2014-01-21', '', 3),
('2014-1011', 46, '2014-01-20', 'Cleared', 2),
('2015-1012', 39, '2014-02-20', 'Cleared', 1),
('2015-1012', 49, '2013-11-11', 'Cleared', 1),
('2015-1012', 51, '2014-01-27', 'Uncleared', 5),
('2015-1013', 44, '2014-01-15', 'Cleared', 3),
('2015-1013', 44, '2014-01-22', 'Cleared', 4),
('2015-1013', 48, '2014-02-07', 'Uncleared', 5),
('2015-1013', 51, '2014-01-08', 'Cleared', 4),
('2015-1013', 51, '2014-01-15', 'Cleared', 4),
('2015-1013', 54, '2014-01-17', 'Cleared', 2),
('2016-1014', 51, '2014-07-17', 'Uncleared', 5);

-- --------------------------------------------------------

--
-- Table structure for table `student_registration_t`
--

CREATE TABLE IF NOT EXISTS `student_registration_t` (
  `reg_no` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(15) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `school_yr` int(11) DEFAULT NULL,
  `year_level` int(5) NOT NULL,
  PRIMARY KEY (`reg_no`),
  KEY `reg_stud_fk` (`student_id`),
  KEY `reg_emp_fk` (`emp_id`),
  KEY `ref_sy_fk` (`school_yr`),
  KEY `reg_section_fk` (`section_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='REGISTRATION' AUTO_INCREMENT=34 ;

--
-- Dumping data for table `student_registration_t`
--

INSERT INTO `student_registration_t` (`reg_no`, `student_id`, `section_id`, `emp_id`, `reg_date`, `school_yr`, `year_level`) VALUES
(1, '2012-1004', 101, NULL, '2013-12-06', 1, 1),
(2, '2012-1005', 101, NULL, '2013-12-06', 1, 1),
(5, '2012-1004', 103, NULL, '2013-12-06', 2, 2),
(6, '2012-1005', 201, NULL, '2013-12-06', 2, 2),
(7, '2013-1006', 301, NULL, '2013-12-06', 2, 1),
(8, '2013-1007', 104, NULL, '2013-12-06', 2, 0),
(9, '2013-1008', 202, NULL, '2013-12-07', 2, 6),
(10, '2013-1006', 104, NULL, '2013-12-07', 3, 2),
(11, '2012-1004', 104, NULL, '2013-12-07', 3, 3),
(12, '2014-1009', 201, NULL, '2013-12-07', 3, 1),
(13, '2014-1010', 303, NULL, '2013-12-08', 3, 1),
(14, '2014-1011', 200, NULL, '2013-12-08', 3, 0),
(15, '2014-1009', 204, NULL, '2013-12-08', 4, 2),
(16, '2014-1010', 202, NULL, '2013-12-08', 4, 2),
(17, '2013-1006', 203, NULL, '2013-12-08', 4, 3),
(18, '2012-1004', 201, NULL, '2013-12-08', 4, 4),
(19, '2015-1012', 202, NULL, '2013-12-08', 4, 1),
(20, '2015-1013', 104, NULL, '2013-12-08', 4, 1),
(21, '2015-1013', 200, NULL, '2014-01-17', 5, 2),
(22, '2015-1012', 200, NULL, '2014-01-17', 5, 2),
(23, '2013-1006', 203, NULL, '2014-01-17', 5, 3),
(24, '2014-1009', 204, NULL, '2014-01-17', 5, 2),
(25, '2012-1004', 303, NULL, '2014-01-17', 5, 5),
(26, '2016-1014', 100, NULL, '2014-01-17', 5, 1),
(27, '2016-1015', 201, NULL, '2014-01-21', 5, 3),
(28, '2016-1016', 103, NULL, '2014-01-21', 5, 2),
(29, '2016-1017', 100, NULL, '2014-01-21', 5, 1),
(30, '2016-1018', 600, NULL, '2014-01-17', 5, 6),
(31, '2016-1019', 600, NULL, '2014-01-17', 5, 6),
(32, '2017-1020', 100, NULL, '2014-01-15', 6, 1),
(33, '2017-1021', 100, NULL, '2014-01-15', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_t`
--

CREATE TABLE IF NOT EXISTS `student_t` (
  `student_id` varchar(15) NOT NULL,
  `student_type` varchar(15) DEFAULT NULL,
  `f_name` varchar(30) DEFAULT NULL,
  `m_name` varchar(30) DEFAULT NULL,
  `l_name` varchar(30) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city_municipality` varchar(20) DEFAULT NULL,
  `province` varchar(30) NOT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `barangay` varchar(20) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `name_of_parent_guardian` varchar(30) DEFAULT NULL,
  `relation_to_student` varchar(30) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `scholarship` int(10) DEFAULT NULL,
  `name_of_last_school_attended` varchar(30) DEFAULT NULL,
  `photo` blob,
  `exam_result` float DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `scholarship` (`scholarship`),
  KEY `city_municipality` (`city_municipality`),
  KEY `scholarship_2` (`scholarship`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='REGISTRATION';

--
-- Dumping data for table `student_t`
--

INSERT INTO `student_t` (`student_id`, `student_type`, `f_name`, `m_name`, `l_name`, `birthdate`, `city_municipality`, `province`, `zip_code`, `barangay`, `street`, `name_of_parent_guardian`, `relation_to_student`, `gender`, `scholarship`, `name_of_last_school_attended`, `photo`, `exam_result`) VALUES
('2012-1004', 'returning', 'Jackielynn', 'Cajurao', 'Ramos', '1995-03-23', 'Camalig', 'MASBATE', 4500, 'EMS 1', 'sesame', 'Moher', 'Non-relative', 'female', 1, 'monodho', 0x433336305f323031332d31322d31302d31332d35362d30382d3130342e6a7067, 99),
('2012-1005', 'returning', 'Albert', 'Domalaon', 'Destura', '1995-09-23', 'Bacacay', 'Albay', 7890, 'Dol', 'sesame', 'manalyn', 'Relative', 'male', 2, 'ANHSs', 0x433336305f323031332d31322d30392d31362d35392d30332d3532372e6a7067, 90),
('2013-1006', 'returning', 'Jerry', 'Almeniana', 'Sape', '1995-09-23', 'Pio Duran', 'Albay', 4500, 'Poblacion', '12', 'Hanna', 'Relative', 'male', 1, 'BicolUniversity', 0x323031332d30362d30362031392e30312e32322e6a7067, 99),
('2013-1007', 'Alumni', 'Juan', 'Domalaon', 'Sape', '1995-06-13', 'Pio Duran', 'Albay', 7890, 'Poblacion', '23', 'manalyn', 'Non-relative', 'male', 3, 'BicolUniversity', NULL, 75),
('2013-1008', 'Alumni', 'Hanna', 'Diego', 'Silang', '0000-00-00', 'Oas', 'Albay', 8970, 'Poblacion', 'Remedios', 'PedroSilang', 'Relative', 'female', 3, 'BicolUniversity', NULL, 75),
('2014-1009', 'returning', 'Kiko', 'Sampaga', 'Duran', '1995-09-23', 'Ligao City', 'Albay', 8970, 'Poblacion', 'Remedios', 'manalyn', 'Non-relative', 'female', 5, 'BicolUniversity', 0x70726f66696c655f3139363335383634355f373573715f313334333038323734382e6a7067, 99),
('2014-1010', 'returning', 'Hanna', 'Domalaon', 'Lapas', '1995-09-18', 'Bacacay', 'Albay', 7800, 'Poblacion', 'Remedios', 'DannaLapas', 'Relative', 'female', 5, 'BicolUniversity', 0x50656e6775696e732e6a7067, 99),
('2014-1011', 'Alumni', 'Joanne', 'Gadi', 'Labao', '1995-09-23', 'Oas', 'Albay', 5401, 'San Vicente', 'San Nicholas', 'LaarniLabao', 'Relative', 'female', 1, 'BicolUniversity', NULL, 100),
('2015-1012', 'new', 'Danilo', 'Tio', 'Lee', '1995-09-23', 'Bacacay', 'Albay', 8900, 'San Vicente', 'Interior', 'FacundoLee', 'Non-relative', 'male', 2, 'SouthElementarySchool', 0x55532d7770322e6a7067, 78),
('2015-1013', 'returning', 'Vince', 'Sampaga', 'Gadi', '1995-09-23', 'Camalig', 'Albay', 5400, 'Dol', '41', 'AlbertoGsdi', 'Relative', 'male', 3, 'StAgnes', 0x52656669612d4461726b4b6e696768742e706e67, 78),
('2016-1014', 'new', 'jervie', 'dreu', 'ramos', '1995-03-21', 'Tabaco City', 'albay', 4511, 'sdvf', 'jobstreet', 'fe alcera', 'Relative', 'male', 4, 'taught nhs', 0x4a656c6c79666973682e6a7067, 98),
('2016-1015', 'transferee', 'Sarah', 'Ramos', 'Tio', '1995-09-23', 'Daraga', 'Albay', 5400, 'Pob 2', 'sesame', 'Danilo Tio', 'Relative', 'female', 4, 'Albay Central School', NULL, 89),
('2016-1016', 'transferee', 'Lovely', 'Serano', 'Wilson', '1996-09-23', 'Jovellar', 'Albay', 5400, 'Pob 2', 'Libot', 'Willy Wilson', 'Relative', 'female', 3, 'Albay Central School', 0x4b6f616c612e6a7067, 90),
('2016-1017', 'new', 'Danna', 'Ramos', 'oriano', '1995-09-12', 'Jovellar', 'Albay', 5401, 'Pob 2', 'The', 'Willy Soriano', 'Relative', 'female', 4, 'Jovellar Elementary School', NULL, 90),
('2016-1018', 'transferee', 'Wenna', 'Llona', 'Sabrina', '1995-09-12', 'Guinobatan', 'Albay', 5400, 'Pob 1', 'we', 'Will Lee', 'Non-relative', 'female', 4, 'Albay Central School', NULL, 90),
('2016-1019', 'transferee', 'Allan ', 'Quijano', 'Ramos', '1995-07-13', 'Jovellar', 'Albay', 5400, 'Pob 1', 'yuy', 'Martin Sala', 'Non-relative', 'male', 3, 'Albay Central School', NULL, 78),
('2017-1020', 'new', 'Cheska', 'Aw', 'Paga', '2014-01-15', 'Daraga', 'dcfghj', 2345, 'hjk', 'fghjk', 'fghj', 'Relative', 'female', 4, 'dfghjkfghj', NULL, 90),
('2017-1021', 'new', 'Alysa', 'dfghj', 'Lauilles', '2014-01-08', 'Malilipot', 'wertyu', 5679, 'dfghj', 'dfghj', 'fghjkl', 'Relative', 'female', 4, 'Albay Central School', NULL, 91);

-- --------------------------------------------------------

--
-- Table structure for table `subject_category_t`
--

CREATE TABLE IF NOT EXISTS `subject_category_t` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='SCHEDULING';

--
-- Dumping data for table `subject_category_t`
--

INSERT INTO `subject_category_t` (`category_id`, `category_name`) VALUES
(101, 'Mathematics'),
(102, 'Science'),
(103, 'Filipino'),
(104, 'English'),
(105, 'AP'),
(106, 'TLE'),
(107, 'MAPEH'),
(108, 'EP');

-- --------------------------------------------------------

--
-- Table structure for table `subject_t`
--

CREATE TABLE IF NOT EXISTS `subject_t` (
  `subject_code` int(11) NOT NULL AUTO_INCREMENT,
  `subject_title` varchar(30) DEFAULT NULL,
  `credit_unit` float DEFAULT NULL,
  `year_level` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `curriculum_code` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`subject_code`),
  KEY `subject_fk` (`category_id`),
  KEY `sub_crit_fk` (`criteria_id`),
  KEY `sub_curr_fk` (`curriculum_code`),
  KEY `curriculum_code` (`curriculum_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SCHEDULING' AUTO_INCREMENT=2705 ;

--
-- Dumping data for table `subject_t`
--

INSERT INTO `subject_t` (`subject_code`, `subject_title`, `credit_unit`, `year_level`, `category_id`, `criteria_id`, `curriculum_code`) VALUES
(101, 'MATH 7', 1.2, 1, 101, 1, 'K12'),
(102, 'SCIENCE 7', 1.2, 1, 102, 1, 'K12'),
(103, 'FILIPINO 7', 1.2, 1, 103, 1, 'K12'),
(104, 'ENGLISH 7', 1, 1, 104, 1, 'K12'),
(105, 'AP 7', 0.9, 1, 105, 1, 'K12'),
(106, 'TLE 7', 1.2, 1, 106, 1, 'K12'),
(107, 'MUSIC 7', 1.2, 1, 107, 1, 'K12'),
(108, 'EP 7', 0.6, 1, 108, 1, 'K12'),
(201, 'MATH 8', 2, 2, 101, 1, 'K12'),
(202, 'SCIENCE 8', 2, 2, 102, 1, 'K12'),
(203, 'FILIPINO 8', 2, 2, 103, 1, 'K12'),
(204, 'ENGLISH 8', 1, 2, 104, 1, 'K12'),
(205, 'AP 8', 1, 2, 105, 1, 'K12'),
(206, 'TLE 8', 1, 2, 106, 1, 'K12'),
(207, 'MAPEH 8', 1, 2, 107, 1, 'K12'),
(208, 'EP 8', 1, 2, 108, 1, 'K12'),
(2701, 'MATH 9', 2, 27, 101, 1, 'K12'),
(2702, 'SCIENCE 9', 2, 27, 102, 1, 'K12'),
(2703, 'FILIPINO 9', 1, 27, 103, 1, 'K12'),
(2704, 'ENGLISH 9', 1, 27, 104, 1, 'K12');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_t`
--

CREATE TABLE IF NOT EXISTS `supplier_t` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(25) DEFAULT NULL,
  `supply_type` enum('donated','borrowed','purchased') NOT NULL,
  `address` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supply_category_t`
--

CREATE TABLE IF NOT EXISTS `supply_category_t` (
  `detail_no` int(11) NOT NULL AUTO_INCREMENT,
  `item_no` int(11) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`detail_no`),
  KEY `s_details_fk` (`item_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SUPPLY' AUTO_INCREMENT=31 ;

--
-- Dumping data for table `supply_category_t`
--

INSERT INTO `supply_category_t` (`detail_no`, `item_no`, `category`) VALUES
(24, 10, 'Bond'),
(25, 10, 'Manila'),
(26, 10, 'Carbon'),
(27, 11, 'White'),
(28, 11, 'Colored'),
(29, 12, 'Permanent'),
(30, 12, 'White board');

-- --------------------------------------------------------

--
-- Table structure for table `supply_distribution_t`
--

CREATE TABLE IF NOT EXISTS `supply_distribution_t` (
  `sd_id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date_recieved` date DEFAULT NULL,
  `type` enum('requested','pending','delivered','ignore') NOT NULL,
  PRIMARY KEY (`sd_id`),
  KEY `supp_dept_fk` (`dept_id`),
  KEY `supp_emp_fk` (`emp_id`),
  KEY `supp_record_fk` (`record_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SUPPLY' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `supply_distribution_t`
--

INSERT INTO `supply_distribution_t` (`sd_id`, `record_id`, `dept_id`, `emp_id`, `quantity`, `date_recieved`, `type`) VALUES
(3, 19, 2, 1234567, 5, '2014-01-15', 'delivered'),
(4, 20, 2, 1234567, 10, '2014-01-17', 'delivered'),
(6, 16, 2, 1234567, 15, '2014-01-17', 'ignore'),
(7, 16, 2, 1234567, 8, '2014-01-17', 'pending'),
(8, 19, 2, 1234567, 2, '2014-01-15', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `supply_message_t`
--

CREATE TABLE IF NOT EXISTS `supply_message_t` (
  `message_no` int(11) NOT NULL AUTO_INCREMENT,
  `message` mediumtext NOT NULL,
  `sd_id` int(11) NOT NULL,
  `confirmation` enum('yes','no') NOT NULL,
  PRIMARY KEY (`message_no`),
  KEY `sd_id` (`sd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SUPPLY' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `supply_message_t`
--

INSERT INTO `supply_message_t` (`message_no`, `message`, `sd_id`, `confirmation`) VALUES
(1, 'I dont Like', 6, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `supply_record_t`
--

CREATE TABLE IF NOT EXISTS `supply_record_t` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_no` int(11) DEFAULT NULL,
  `supplier_no` int(11) DEFAULT NULL,
  `ris_no` int(11) DEFAULT NULL,
  `rcc` varchar(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `balance_quantity` int(11) DEFAULT NULL,
  `date_recorded` date DEFAULT NULL,
  `unit_amount` float DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `sy_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`record_id`),
  KEY `rec_stock_fk` (`stock_no`),
  KEY `rec_supp_fk` (`supplier_no`),
  KEY `sy_id` (`sy_id`),
  KEY `sy_id_2` (`sy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SUPPLY' AUTO_INCREMENT=21 ;

--
-- Dumping data for table `supply_record_t`
--

INSERT INTO `supply_record_t` (`record_id`, `stock_no`, `supplier_no`, `ris_no`, `rcc`, `quantity`, `balance_quantity`, `date_recorded`, `unit_amount`, `total_amount`, `sy_id`) VALUES
(16, 9, 1, 1234, '09123', 10, 8, '2014-01-10', 200, 2000, 4),
(17, 9, 1, 123456789, '09876543', 10, 10, '2014-01-10', 199, 1990, 4),
(18, 10, 2, 15236512, '874672637', 5, 5, '2014-01-21', 100, 500, 5),
(19, 10, 3, 764772, '837482', 15, 8, '2014-01-21', 99, 1485, 5),
(20, 11, 1, 976, '28938178', 10, 0, '2014-01-21', 223, 2230, 5);

-- --------------------------------------------------------

--
-- Table structure for table `supply_type_t`
--

CREATE TABLE IF NOT EXISTS `supply_type_t` (
  `type_no` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`type_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SUPPLY' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `supply_type_t`
--

INSERT INTO `supply_type_t` (`type_no`, `type_name`) VALUES
(1, 'Office Supply'),
(2, 'Laboratory Supply'),
(3, 'Classroom Supply');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_t`
--

CREATE TABLE IF NOT EXISTS `teacher_t` (
  `emp_id` int(11) NOT NULL,
  `max_load` float DEFAULT NULL,
  `major_subject` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `teacher_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_t`
--

INSERT INTO `teacher_t` (`emp_id`, `max_load`, `major_subject`, `level`, `teacher_status`) VALUES
(123, 2, NULL, NULL, 1),
(10001, 15, NULL, NULL, 1),
(1234567, 24, NULL, NULL, 1),
(6875169, 15, NULL, NULL, 0),
(9076565, 30, NULL, NULL, 1),
(12345678, 123, NULL, NULL, 0),
(98765432, 15, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_t`
--

CREATE TABLE IF NOT EXISTS `unit_t` (
  `unit_no` int(11) NOT NULL AUTO_INCREMENT,
  `unit_type` varchar(20) NOT NULL,
  PRIMARY KEY (`unit_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='INVENTORY' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `unit_t`
--

INSERT INTO `unit_t` (`unit_no`, `unit_type`) VALUES
(1, 'Box'),
(2, 'Pieces'),
(3, 'Ream'),
(4, 'Set'),
(5, 'Gross'),
(6, 'Liter'),
(7, 'unit'),
(8, 'Dozen');

-- --------------------------------------------------------

--
-- Table structure for table `year_level_t`
--

CREATE TABLE IF NOT EXISTS `year_level_t` (
  `lvl_id` int(11) NOT NULL AUTO_INCREMENT,
  `year_lvl` int(11) DEFAULT NULL,
  `lvl_name` varchar(30) DEFAULT NULL,
  `total_unit` float NOT NULL,
  `yl_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`lvl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='SCHEDULING' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `year_level_t`
--

INSERT INTO `year_level_t` (`lvl_id`, `year_lvl`, `lvl_name`, `total_unit`, `yl_status`) VALUES
(1, 1, 'grade 7', 8.5, 0),
(2, 2, 'grade 8', 11, 0),
(3, 3, 'grade 9', 0, 0),
(4, 4, 'grade 10', 0, 0),
(5, 5, 'junior high', 0, 0),
(6, 6, 'senior high', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_permission_t`
--
ALTER TABLE `account_permission_t`
  ADD CONSTRAINT `account_permission_t_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `account_t` (`account_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_permission_t_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `account_privilege_t` (`privilege_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appraisal_t`
--
ALTER TABLE `appraisal_t`
  ADD CONSTRAINT `appraisal_t_ibfk_1` FOREIGN KEY (`access_no`) REFERENCES `cat_copies_t` (`access_no`),
  ADD CONSTRAINT `appraisal_t_ibfk_2` FOREIGN KEY (`account_no`) REFERENCES `account_t` (`account_no`),
  ADD CONSTRAINT `appraisal_t_ibfk_3` FOREIGN KEY (`library_in_charge`) REFERENCES `account_t` (`account_no`);

--
-- Constraints for table `cat_author_t`
--
ALTER TABLE `cat_author_t`
  ADD CONSTRAINT `cat_author_t_ibfk_1` FOREIGN KEY (`call_no`) REFERENCES `cat_reading_material_t` (`call_no`);

--
-- Constraints for table `cat_books_t`
--
ALTER TABLE `cat_books_t`
  ADD CONSTRAINT `cat_books_t_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `cat_reading_material_t` (`call_no`);

--
-- Constraints for table `cat_copies_t`
--
ALTER TABLE `cat_copies_t`
  ADD CONSTRAINT `cat_copies_t_ibfk_1` FOREIGN KEY (`call_no`) REFERENCES `cat_reading_material_t` (`call_no`),
  ADD CONSTRAINT `cat_copies_t_ibfk_2` FOREIGN KEY (`librarian_in_charge`) REFERENCES `account_t` (`account_no`);

--
-- Constraints for table `cat_periodical_t`
--
ALTER TABLE `cat_periodical_t`
  ADD CONSTRAINT `cat_periodical_t_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `cat_reading_material_t` (`call_no`);

--
-- Constraints for table `cat_reading_material_t`
--
ALTER TABLE `cat_reading_material_t`
  ADD CONSTRAINT `cat_reading_material_t_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `cat_publisher_t` (`publisher_id`),
  ADD CONSTRAINT `cat_reading_material_t_ibfk_2` FOREIGN KEY (`subject`) REFERENCES `cat_ddc_t` (`dec_no`),
  ADD CONSTRAINT `cat_reading_material_t_ibfk_3` FOREIGN KEY (`section_no`) REFERENCES `cat_section_t` (`section_no`);

--
-- Constraints for table `cat_supplies_t`
--
ALTER TABLE `cat_supplies_t`
  ADD CONSTRAINT `cat_supplies_t_ibfk_1` FOREIGN KEY (`call_no`) REFERENCES `cat_reading_material_t` (`call_no`);

--
-- Constraints for table `class_t`
--
ALTER TABLE `class_t`
  ADD CONSTRAINT `class_t_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section_t` (`section_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_t_ibfk_2` FOREIGN KEY (`sy_id`) REFERENCES `school_year_t` (`sy_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_t_ibfk_3` FOREIGN KEY (`subject_code`) REFERENCES `subject_t` (`subject_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `class_t_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_t` (`emp_id`);

--
-- Constraints for table `club_adv_account_t`
--
ALTER TABLE `club_adv_account_t`
  ADD CONSTRAINT `cacc_fk1` FOREIGN KEY (`club_id`) REFERENCES `club_t` (`club_id`),
  ADD CONSTRAINT `cacc_fk2` FOREIGN KEY (`account_no`) REFERENCES `account_t` (`account_no`);

--
-- Constraints for table `department_t`
--
ALTER TABLE `department_t`
  ADD CONSTRAINT `department_t_ibfk_1` FOREIGN KEY (`dept_head`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_child_t`
--
ALTER TABLE `eis_child_t`
  ADD CONSTRAINT `eis_child_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_civ_service_t`
--
ALTER TABLE `eis_civ_service_t`
  ADD CONSTRAINT `eis_civ_service_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_ctc_t`
--
ALTER TABLE `eis_ctc_t`
  ADD CONSTRAINT `eis_ctc_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_dependent_t`
--
ALTER TABLE `eis_dependent_t`
  ADD CONSTRAINT `eis_dependent_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_educ_bg_t`
--
ALTER TABLE `eis_educ_bg_t`
  ADD CONSTRAINT `eis_educ_bg_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_leave_credits_t`
--
ALTER TABLE `eis_leave_credits_t`
  ADD CONSTRAINT `leave_cred_f` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_leave_credit_t`
--
ALTER TABLE `eis_leave_credit_t`
  ADD CONSTRAINT `eis_leave_credit_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_leave_t`
--
ALTER TABLE `eis_leave_t`
  ADD CONSTRAINT `eis_leave_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_other_info1_t`
--
ALTER TABLE `eis_other_info1_t`
  ADD CONSTRAINT `oi1_emp_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_other_info2_t`
--
ALTER TABLE `eis_other_info2_t`
  ADD CONSTRAINT `oi2_emp_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_pic_t`
--
ALTER TABLE `eis_pic_t`
  ADD CONSTRAINT `eis_pic_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_pnhs_eligibility_t`
--
ALTER TABLE `eis_pnhs_eligibility_t`
  ADD CONSTRAINT `eis_pnhs_eligibility_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_reference_t`
--
ALTER TABLE `eis_reference_t`
  ADD CONSTRAINT `eis_reference_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_school_t`
--
ALTER TABLE `eis_school_t`
  ADD CONSTRAINT `eis_school_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_training_program_t`
--
ALTER TABLE `eis_training_program_t`
  ADD CONSTRAINT `t_program_emp_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_voluntary_work_t`
--
ALTER TABLE `eis_voluntary_work_t`
  ADD CONSTRAINT `v_work_emp_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `eis_work_experience_t`
--
ALTER TABLE `eis_work_experience_t`
  ADD CONSTRAINT `we_emp_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `employee_account_t`
--
ALTER TABLE `employee_account_t`
  ADD CONSTRAINT `emp_acct_fk1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`),
  ADD CONSTRAINT `emp_acct_fk2` FOREIGN KEY (`account_no`) REFERENCES `account_t` (`account_no`);

--
-- Constraints for table `employee_role_t`
--
ALTER TABLE `employee_role_t`
  ADD CONSTRAINT `employee_role_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`),
  ADD CONSTRAINT `employee_role_t_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `employee_position_t` (`position_id`);

--
-- Constraints for table `employee_t`
--
ALTER TABLE `employee_t`
  ADD CONSTRAINT `employee_t_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department_t` (`dept_id`);

--
-- Constraints for table `equipment_category_detail`
--
ALTER TABLE `equipment_category_detail`
  ADD CONSTRAINT `equipment_category_detail_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `equipment_category_t` (`category_id`);

--
-- Constraints for table `equipment_item_t`
--
ALTER TABLE `equipment_item_t`
  ADD CONSTRAINT `equipment_item_t_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `equipment_color_t` (`color_id`),
  ADD CONSTRAINT `equipment_item_t_ibfk_2` FOREIGN KEY (`stock_no`) REFERENCES `equipment_record_t` (`stock_no`),
  ADD CONSTRAINT `equipment_item_t_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `equipment_category_t` (`category_id`);

--
-- Constraints for table `equipment_property_t`
--
ALTER TABLE `equipment_property_t`
  ADD CONSTRAINT `equipment_property_t_ibfk_1` FOREIGN KEY (`stock_no`) REFERENCES `equipment_record_t` (`stock_no`),
  ADD CONSTRAINT `equipment_property_t_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`);

--
-- Constraints for table `equipment_record_t`
--
ALTER TABLE `equipment_record_t`
  ADD CONSTRAINT `equipment_record_t_ibfk_1` FOREIGN KEY (`supplier_no`) REFERENCES `inventory_supplier_t` (`supplier_no`),
  ADD CONSTRAINT `equipment_record_t_ibfk_2` FOREIGN KEY (`unit`) REFERENCES `unit_t` (`unit_no`);

--
-- Constraints for table `equipment_serial_t`
--
ALTER TABLE `equipment_serial_t`
  ADD CONSTRAINT `equipment_serial_t_ibfk_1` FOREIGN KEY (`property_no`) REFERENCES `equipment_property_t` (`property_no`);

--
-- Constraints for table `final_grade_t`
--
ALTER TABLE `final_grade_t`
  ADD CONSTRAINT `final_grade_t_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `final_grade_t_ibfk_2` FOREIGN KEY (`sy_id`) REFERENCES `school_year_t` (`sy_id`) ON UPDATE CASCADE;

--
-- Constraints for table `gmc_t`
--
ALTER TABLE `gmc_t`
  ADD CONSTRAINT `gmc_t_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `inventory_stock_t`
--
ALTER TABLE `inventory_stock_t`
  ADD CONSTRAINT `inventory_stock_t_ibfk_1` FOREIGN KEY (`detail_no`) REFERENCES `supply_category_t` (`detail_no`),
  ADD CONSTRAINT `inventory_stock_t_ibfk_2` FOREIGN KEY (`unit_no`) REFERENCES `unit_t` (`unit_no`),
  ADD CONSTRAINT `inventory_stock_t_ibfk_3` FOREIGN KEY (`type_no`) REFERENCES `supply_type_t` (`type_no`);

--
-- Constraints for table `library_logs`
--
ALTER TABLE `library_logs`
  ADD CONSTRAINT `library_logs_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `account_t` (`account_no`);

--
-- Constraints for table `section_t`
--
ALTER TABLE `section_t`
  ADD CONSTRAINT `section_t_ibfk_1` FOREIGN KEY (`year_level`) REFERENCES `year_level_t` (`lvl_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `section_t_ibfk_2` FOREIGN KEY (`curriculum_code`) REFERENCES `curriculum_t` (`curriculum_code`) ON DELETE SET NULL,
  ADD CONSTRAINT `section_t_ibfk_3` FOREIGN KEY (`year_level`) REFERENCES `year_level_t` (`lvl_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `section_t_ibfk_4` FOREIGN KEY (`class_adviser_id`) REFERENCES `employee_t` (`emp_id`),
  ADD CONSTRAINT `section_t_ibfk_5` FOREIGN KEY (`curriculum_code`) REFERENCES `curriculum_t` (`curriculum_code`) ON DELETE SET NULL;

--
-- Constraints for table `student_account_t`
--
ALTER TABLE `student_account_t`
  ADD CONSTRAINT `student_account_t_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`),
  ADD CONSTRAINT `student_account_t_ibfk_3` FOREIGN KEY (`account_no`) REFERENCES `account_t` (`account_no`);

--
-- Constraints for table `student_registration_t`
--
ALTER TABLE `student_registration_t`
  ADD CONSTRAINT `student_registration_t_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_registration_t_ibfk_5` FOREIGN KEY (`section_id`) REFERENCES `section_t` (`section_id`),
  ADD CONSTRAINT `student_registration_t_ibfk_6` FOREIGN KEY (`school_yr`) REFERENCES `school_year_t` (`sy_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_t`
--
ALTER TABLE `student_t`
  ADD CONSTRAINT `student_t_ibfk_1` FOREIGN KEY (`city_municipality`) REFERENCES `municipality_t` (`municipality_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_t_ibfk_2` FOREIGN KEY (`scholarship`) REFERENCES `scholarship_t` (`scholarship_id`) ON UPDATE CASCADE;

--
-- Constraints for table `subject_t`
--
ALTER TABLE `subject_t`
  ADD CONSTRAINT `subject_t_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `subject_category_t` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_t_ibfk_2` FOREIGN KEY (`curriculum_code`) REFERENCES `curriculum_t` (`curriculum_code`) ON DELETE SET NULL;

--
-- Constraints for table `supply_category_t`
--
ALTER TABLE `supply_category_t`
  ADD CONSTRAINT `s_details_fk` FOREIGN KEY (`item_no`) REFERENCES `inventory_item_t` (`item_no`);

--
-- Constraints for table `supply_distribution_t`
--
ALTER TABLE `supply_distribution_t`
  ADD CONSTRAINT `supply_distribution_t_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `supply_record_t` (`record_id`),
  ADD CONSTRAINT `supply_distribution_t_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`),
  ADD CONSTRAINT `supply_distribution_t_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `department_t` (`dept_id`);

--
-- Constraints for table `supply_message_t`
--
ALTER TABLE `supply_message_t`
  ADD CONSTRAINT `supply_message_t_ibfk_1` FOREIGN KEY (`sd_id`) REFERENCES `supply_distribution_t` (`sd_id`);

--
-- Constraints for table `supply_record_t`
--
ALTER TABLE `supply_record_t`
  ADD CONSTRAINT `supply_record_t_ibfk_1` FOREIGN KEY (`supplier_no`) REFERENCES `inventory_supplier_t` (`supplier_no`),
  ADD CONSTRAINT `supply_record_t_ibfk_2` FOREIGN KEY (`stock_no`) REFERENCES `inventory_stock_t` (`stock_no`),
  ADD CONSTRAINT `supply_record_t_ibfk_6` FOREIGN KEY (`stock_no`) REFERENCES `inventory_stock_t` (`stock_no`),
  ADD CONSTRAINT `supply_record_t_ibfk_7` FOREIGN KEY (`supplier_no`) REFERENCES `inventory_supplier_t` (`supplier_no`),
  ADD CONSTRAINT `supply_record_t_ibfk_8` FOREIGN KEY (`sy_id`) REFERENCES `school_year_t` (`sy_id`);

--
-- Constraints for table `teacher_t`
--
ALTER TABLE `teacher_t`
  ADD CONSTRAINT `teacher_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
