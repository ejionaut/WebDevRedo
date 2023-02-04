-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2023 at 09:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maindatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `acc_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acc_id`, `user_id`, `password`) VALUES
(1, 2022001, 'nicktoh1'),
(2, 2022002, 'nicktoh2'),
(3, 2022003, 'nicktoh3'),
(4, 2022004, 'nicktoh4'),
(5, 2022005, 'nicktoh5'),
(6, 2022006, 'nicktoh6'),
(7, 2022007, 'nicktoh7'),
(8, 2022008, 'nicktoh8'),
(9, 2022009, 'nicktoh9'),
(10, 2022010, 'nicktoh10');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_inventory`
--

CREATE TABLE `quiz_inventory` (
  `quiz_code` varchar(45) DEFAULT NULL,
  `type_of_quiz` text DEFAULT NULL,
  `question` text DEFAULT NULL,
  `choices` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_inventory`
--

INSERT INTO `quiz_inventory` (`quiz_code`, `type_of_quiz`, `question`, `choices`, `answer`, `points`) VALUES
('tpqs001', 'iden', 'It is the process of generating meaning by sending and receiving verbal and non-verbal symbols and signs that are influenced by multiple contexts.', '', 'communication', 1),
('tpqs001', 'iden', 'It is a structured communication based on the actual audience\'s needs in order to achieve a certain purpose.', '', 'presentation', 1),
('tpqs001', 'iden', 'A type of presentation that influences a change in the belief, attitude, or behavior of the audience', '', 'persuasive presentation', 1),
('tpqs001', 'iden', 'It provides a flexible way to organize the content of a slide presentation.', '', 'grid', 1),
('tpqs001', 'mc', 'Used to identify the main point quickly.', 'Contrast,Hierarchy,Proximity,Whitespace', 'Contrast', 1),
('tpqs001', 'mc', 'It is used for perceiving meaning from the element\'s location.', 'Whitespace,Unity,Flow,Proximity', 'Proximity', 1),
('tpqs001', 'mc', 'It is used to create relationship between elements', 'Flow,Hierarchy,Whitespace,Contrast', 'Hierarchy', 1),
('tpqs001', 'mc', 'It is used to provide visual breathing room.', 'Proximity,Unity,Whitespace,Hierarchy', 'Whitespace', 1),
('tpqs001', 'enum', 'Enumerate six reasons why Business Communication is unique.', '', 'globalization and diversity,information value,pervasiveness of technology,new corporate structures,reliance on teamwork,communication barriers', 6),
('tpqs001', 'enum', 'List the seven Principles of Effective Communication', '', 'completeness,conciseness,consideration,clarity,concreteness,courtesy,correctness', 7),
('nmqs001', 'iden', 'It refers to the systematic deviation from the truth.', '', 'Inaccuracy', 1),
('nmqs001', 'iden', 'It refers to how closely individual computed or measured values agree with each other.', '', 'Precision', 1),
('nmqs001', 'iden', 'It refers to the magnitude of the scatter of the approximate values.', '', 'Imprecision', 1),
('nmqs001', 'mc', 'The process used to understand through observation and experimentation.', 'Scientific Process,Empirical Process,Analytical Process,Engineering Process', 'Empirical Process', 1),
('nmqs001', 'mc', 'This error is due to the fact that computers can represent only quantities with a finite number of digits.', 'Numerical Error,Truncation Error,Formulation Error,Round-off Error', 'Round-off Error', 1),
('nmqs001', 'mc', 'A kind of error that is not directly connected with numerical methods.', 'Numerical Error,Truncation Error,Formulation Error,Round-off Error', 'Formulation Error', 1),
('nmqs001', 'enum', 'What are the three phases of scientific problem solving?', '', 'Formulation,Solution,Interpretation', 3),
('nmqs001', 'enum', 'What are the three Fundamental Control Structures used in structured programming?', '', 'Sequence,Selection,Repetition', 3),
('pdqs001', 'iden', 'Regarding their positive traits, this generation is entrepreneurial, flexible, and self-reliant.', '', 'Gen X', 1),
('pdqs001', 'iden', 'This generation lacks basic literacy fundamentals, has a very short attention.', '', 'Millennial', 1),
('pdqs001', 'iden', 'Their career goal is to build a legacy, a lifetime career with one company.', '', 'Traditionalist', 1),
('pdqs001', 'iden', 'Their workplace attributes include a long-term commitment to employing organizations and not appreciating feedback.', '', 'Boomer', 1),
('pdqs001', 'mc', 'It is the ability to examine yourself to find out how much progress you have made on a specific ethical standard.', 'Personal Assessment,Self-Assessment,Activities and assessment exams,Personality Development', 'Self-Assessment', 1),
('pdqs001', 'mc', 'An aspect of personality concerned with emotional dispositions and reactions and their speed and intensity. The term often is used to refer to the prevailing mood or mood pattern of a person.', 'Self-esteem,Grit,Aptitude,Temperament', 'Temperament', 1),
('pdqs001', 'mc', 'The ability to control yourself or the strong determination that allows you to do something difficult.', 'Willpower,Goal Setting,Mindset,Critical Thinking', 'Willpower', 1),
('pdqs001', 'mc', 'It refers to individual differences in characteristic patterns of thinking, feeling, and behaving.', 'Adversity Quotient,Interest Inventory,Personality,Work-Related Values', 'Personality', 1),
('pdqs001', 'enum', 'List the six Reasons your Personality is Important.', '', 'Because personality is what makes you interesting,Because personality can change,Because personality is how we distinguish ourselves,Because personality can get you further romantically,Because personality can get you further professionally,Because personality does not fade away', 5),
('pdqs001', 'enum', 'Enumerate the five Maslow\'s Hierarchy of Needs.', '', 'Self-actualization,Esteem needs,Belongingness and love needs,Safety needs,Physiological needs', 5),
('seqs001', 'iden', 'These are instructions (computer programs) that when executed provide desired function and performance.', '', 'Software', 1),
('seqs001', 'iden', 'A type of software product produced by a development organization and sold on the open market.', '', 'Generic Software', 1),
('seqs001', 'iden', 'An engineering discipline that is concerned with all aspects of software production such that high-quality software is produced in a cost-effective manner.', '', 'Software Engineering', 1),
('seqs001', 'iden', 'A development strategy that encompasses the process, methods and tools.', '', 'Process Models', 1),
('seqs001', 'mc', 'The following are generic process models except:', 'Waterfall,Evolutionary Development,Incremental Model,Formal Systems Development', 'Incremental Model', 1),
('seqs001', 'mc', 'It is a process model based on the transformation of a mathematical specification through different representations to an executable program.', 'Formal Systems Development,Rational Unified Process,Incremental Model,Evolutionary Development', 'Formal Systems Development', 1),
('seqs001', 'mc', 'It is a process model based on the use of commercial-off-the-shelf packages (COTS).', 'Reuse-oriented Development,Package-based Development,Component-based Software Engineering,Feature Driven Development', 'Package-based Development', 1),
('seqs001', 'mc', 'A software development that uses an iterative approach, in which the product is developed in increments that gradually increase the implemented functionality.', 'Evolutionary Development,Incremental Model,Spiral Development Model,Cleanroom Model', 'Cleanroom Model', 1),
('seqs001', 'enum', 'Enumerate the Goals of Software Development efforts.', '', 'The right feature set,High quality,Short time to market', 3),
('seqs001', 'enum', 'Give at least four traits of Agile Teams.', '', 'Competence,Common Focus,Collaboration,Mutual trust and respect,Decision-making ability,Self-organization,Fuzzy-problem solving ability', 7),
('adqs001', 'enum', 'Enumerate the Four Pillars of Object Oriented Programming Paradigm.', '', 'Abstraction,Inheritance,Polymorphism,Encapsulation', 4),
('adqs001', 'enum', 'Enumerate the 2 types of Declarative Programming.', '', 'Logical Programming,Functional Programming', 2),
('wdqs001', 'mc', 'Global system of interconnected computer networks that communicate and interchange data through TCP/IP.', 'Network,World Wide Web,Internet,LAN', 'Internet', 1),
('wdqs001', 'mc', 'HTML document that delivers various information and hyperlinks other pages and resources.', 'Website,Web page,Web application,Web server,Webclient', 'Web page', 1),
('wdqs001', 'mc', 'Related web resources under a common domain name.', 'Website,Web page,Web application,Web server,Webclient', 'Website', 1),
('wdqs001', 'mc', 'Software applications used to access web resources.', 'Website,Web page,Web application,Web server,Web client', 'Web client', 1),
('wdqs001', 'tf', 'When a browser parses an HTML document for rendering, it builds a root-structured representation of the hierarchy of the elements.', 'true,false', 'FALSE', 1),
('wdqs001', 'tf', 'CSS means Cascading Sheet Style', 'true,false', 'FALSE', 1),
('wdqs001', 'tf', 'Global attributes are attributes that are specific to some elements.', 'true,false', 'FALSE', 1),
('wdqs001', 'tf', 'The < p > tag is part of the heading elements.', 'true,false', 'FALSE', 1),
('wdqs001', 'tf', 'As part of the HTML coding conventions, use lowercase characters for ALL element and attribute names.', 'true,false', 'TRUE', 1),
('wdqs001', 'tf', 'ACSS specifications are maintained and published by WHATWG.', 'true,false', 'FALSE', 1),
('wdqs001', 'tf', 'Pseudo-elements allow selection of elements based on their structural relationships with other elements in the document tree.', 'true,false', 'FALSE', 1),
('wdqs001', 'enum', 'Enumerate the 3 different sources (a.k.a. origin) of styles applied to HTML documents.', '', 'User agent styles,User styles,Author styles', 3),
('adqs001', 'mc', 'question1', 'hi,hello,how are you,kumusta', 'hello', 1),
('adqs001', 'mc', 'question2', 'hi,hello,how are you,kumusta', 'hello', 1),
('adqs001', 'mc', 'question3', 'hi,hello,how are you,kumusta', 'hello', 1),
('adqs001', 'mc', 'question4', 'hi,hello,how are you,kumusta', 'hello', 1),
('adqs001', 'mc', 'question5', 'hi,hello,how are you,kumusta', 'hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_list`
--

CREATE TABLE `quiz_list` (
  `q_name` text DEFAULT NULL,
  `q_password` text DEFAULT NULL,
  `quiz_code` text DEFAULT NULL,
  `q_display_setting` text DEFAULT NULL,
  `total_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_list`
--

INSERT INTO `quiz_list` (`q_name`, `q_password`, `quiz_code`, `q_display_setting`, `total_score`) VALUES
('TechPres Prelims Quiz# 1', 'tp001a', 'tpqs001', 'listed', 21),
('NumMeth Prelims Quiz# 1', 'nm001a', 'nmqs001', 'listed', 12),
('PerDev Prelims Quiz# 1', 'pd001a', 'pdqs001', 'listed', 18),
('SoftEng Prelims Quiz# 1', 'seqs001a', 'seqs001', 'listed', 18),
('AppDev Prelims Quiz# 1', 'adqs001a', 'adqs001', 'listed', 11),
('WebDev Prelims Quiz# 1', 'wdqs001a', 'wdqs001', 'unlisted', 14);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `lastname` text DEFAULT NULL,
  `firstname` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `lastname`, `firstname`) VALUES
(2022001, 'Johnson', 'Dwayne'),
(2022002, 'Wilson', 'Troy'),
(2022003, 'Smith', 'Sam'),
(2022004, 'Williams', 'Robert'),
(2022005, 'Davis', 'John'),
(2022006, 'Garcia', 'Giselle'),
(2022007, 'Jones', 'Indianna'),
(2022008, 'Browne', 'Jake'),
(2022009, 'Moore', 'Mandy'),
(2022010, 'Miller', 'Gilbert');

-- --------------------------------------------------------

--
-- Table structure for table `student_quiz`
--

CREATE TABLE `student_quiz` (
  `user_id` bigint(20) DEFAULT NULL,
  `quiz_code` text DEFAULT NULL,
  `score` bigint(20) DEFAULT NULL,
  `sq_id` int(11) NOT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_quiz`
--

INSERT INTO `student_quiz` (`user_id`, `quiz_code`, `score`, `sq_id`, `timestamp`) VALUES
(2022001, 'tpqs001', 10, 1, NULL),
(2022003, 'tpqs001', 4, 2, NULL),
(2022001, 'pdqs001', 0, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_quiz_details`
--

CREATE TABLE `student_quiz_details` (
  `sq_id` int(11) NOT NULL,
  `quiz_code` varchar(45) DEFAULT NULL,
  `question` varchar(45) DEFAULT NULL,
  `answer` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `student_quiz`
--
ALTER TABLE `student_quiz`
  ADD PRIMARY KEY (`sq_id`);

--
-- Indexes for table `student_quiz_details`
--
ALTER TABLE `student_quiz_details`
  ADD PRIMARY KEY (`sq_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_quiz`
--
ALTER TABLE `student_quiz`
  MODIFY `sq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
