-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: maindatabase
-- ------------------------------------------------------
-- Server version	5.7.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `acc_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,2022001,'nicktoh1'),(2,2022002,'nicktoh2'),(3,2022003,'nicktoh3'),(4,2022004,'nicktoh4'),(5,2022005,'nicktoh5'),(6,2022006,'nicktoh6'),(7,2022007,'nicktoh7'),(8,2022008,'nicktoh8'),(9,2022009,'nicktoh9'),(10,2022010,'nicktoh10');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_inventory`
--

DROP TABLE IF EXISTS `quiz_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_inventory` (
  `quiz_set` text,
  `type_of_quiz` text,
  `question` text,
  `choices` text,
  `answer` text,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_inventory`
--

LOCK TABLES `quiz_inventory` WRITE;
/*!40000 ALTER TABLE `quiz_inventory` DISABLE KEYS */;
INSERT INTO `quiz_inventory` VALUES ('tpqs001','iden','It is the process of generating meaning by sending and receiving verbal and non-verbal symbols and signs that are influenced by multiple contexts.','','communication',1),('tpqs001','iden','It is a structured communication based on the actual audience\'s needs in order to achieve a certain purpose.','','presentation',1),('tpqs001','iden','A type of presentation that influences a change in the belief, attitude, or behavior of the audience','','persuasive presentation',1),('tpqs001','iden','It provides a flexible way to organize the content of a slide presentation.','','grid',1),('tpqs001','mc','Used to identify the main point quickly.','Contrast,Hierarchy,Proximity,Whitespace','Contrast',1),('tpqs001','mc','It is used for perceiving meaning from the element\'s location.','Whitespace,Unity,Flow,Proximity','Proximity',1),('tpqs001','mc','It is used to create relationship between elements','Flow,Hierarchy,Whitespace,Contrast','Hierarchy',1),('tpqs001','mc','It is used to provide visual breathing room.','Proximity,Unity,Whitespace,Hierarchy','Whitespace',1),('tpqs001','enum','Enumerate six reasons why Business Communication is unique.','','globalization and diversity,information value,pervasiveness of technology,new corporate structures,reliance on teamwork,communication barriers',6),('tpqs001','enum','List the seven Principles of Effective Communication','','completeness,conciseness,consideration,clarity,concreteness,courtesy,correctness',7),('nmqs001','iden','It refers to the systematic deviation from the truth.','','Inaccuracy',1),('nmqs001','iden','It refers to how closely individual computed or measured values agree with each other.','','Precision',1),('nmqs001','iden','It refers to the magnitude of the scatter of the approximate values.','','Imprecision',1),('nmqs001','mc','The process used to understand through observation and experimentation.','Scientific Process,Empirical Process,Analytical Process,Engineering Process','Empirical Process',1),('nmqs001','mc','This error is due to the fact that computers can represent only quantities with a finite number of digits.','Numerical Error,Truncation Error,Formulation Error,Round-off Error','Round-off Error',1),('nmqs001','mc','A kind of error that is not directly connected with numerical methods.','Numerical Error,Truncation Error,Formulation Error,Round-off Error','Formulation Error',1),('nmqs001','enum','What are the three phases of scientific problem solving?','','Formulation,Solution,Interpretation',3),('nmqs001','enum','What are the three Fundamental Control Structures used in structured programming?','','Sequence,Selection,Repetition',3),('pdqs001','iden','Regarding their positive traits, this generation is entrepreneurial, flexible, and self-reliant.','','Gen X',1),('pdqs001','iden','This generation lacks basic literacy fundamentals, has a very short attention.','','Millennial',1),('pdqs001','iden','Their career goal is to build a legacy, a lifetime career with one company.','','Traditionalist',1),('pdqs001','iden','Their workplace attributes include a long-term commitment to employing organizations and not appreciating feedback.','','Boomer',1),('pdqs001','mc','It is the ability to examine yourself to find out how much progress you have made on a specific ethical standard.','Personal Assessment,Self-Assessment,Activities and assessment exams,Personality Development','Self-Assessment',1),('pdqs001','mc','An aspect of personality concerned with emotional dispositions and reactions and their speed and intensity. The term often is used to refer to the prevailing mood or mood pattern of a person.','Self-esteem,Grit,Aptitude,Temperament','Temperament',1),('pdqs001','mc','The ability to control yourself or the strong determination that allows you to do something difficult.','Willpower,Goal Setting,Mindset,Critical Thinking','Willpower',1),('pdqs001','mc','It refers to individual differences in characteristic patterns of thinking, feeling, and behaving.','Adversity Quotient,Interest Inventory,Personality,Work-Related Values','Personality',1),('pdqs001','enum','List the six Reasons your Personality is Important.','','Because personality is what makes you interesting,Because personality can change,Because personality is how we distinguish ourselves,Because personality can get you further romantically,Because personality can get you further professionally,Because personality does not fade away',5),('pdqs001','enum','Enumerate the five Maslow\'s Hierarchy of Needs.','','Self-actualization,Esteem needs,Belongingness and love needs,Safety needs,Physiological needs',5),('seqs001','iden','These are instructions (computer programs) that when executed provide desired function and performance.','','Software',1),('seqs001','iden','A type of software product produced by a development organization and sold on the open market.','','Generic Software',1),('seqs001','iden','An engineering discipline that is concerned with all aspects of software production such that high-quality software is produced in a cost-effective manner.','','Software Engineering',1),('seqs001','iden','A development strategy that encompasses the process, methods and tools.','','Process Models',1),('seqs001','mc','The following are generic process models except:','Waterfall,Evolutionary Development,Incremental Model,Formal Systems Development','Incremental Model',1),('seqs001','mc','It is a process model based on the transformation of a mathematical specification through different representations to an executable program.','Formal Systems Development,Rational Unified Process,Incremental Model,Evolutionary Development','Formal Systems Development',1),('seqs001','mc','It is a process model based on the use of commercial-off-the-shelf packages (COTS).','Reuse-oriented Development,Package-based Development,Component-based Software Engineering,Feature Driven Development','Package-based Development',1),('seqs001','mc','A software development that uses an iterative approach, in which the product is developed in increments that gradually increase the implemented functionality.','Evolutionary Development,Incremental Model,Spiral Development Model,Cleanroom Model','Cleanroom Model',1),('seqs001','enum','Enumerate the Goals of Software Development efforts.','','The right feature set,High quality,Short time to market',3),('seqs001','enum','Give at least four traits of Agile Teams.','','Competence,Common Focus,Collaboration,Mutual trust and respect,Decision-making ability,Self-organization,Fuzzy-problem solving ability',7),('adqs001','iden','Used to communicate with a machine and instruct it what to do.','','Programming Language',1),('adqs001','iden','Disciplined technique for restructuring an existing body of code, altering its internal structure without changing its external behavior.','','Code Refactoring',1),('adqs001','iden','Refers to the gradual deterioration of software over time or its decreasing inability to respond to its changing environment.','','Software Decay',1),('adqs001','iden','Involves finding and removing bugs (problem that prevent correct operation of the program).','','Debugging',1),('adqs001','iden','Process of assessing the functionality and correctness of a computer program through execution or analysis.','','Testing',1),('adqs001','mc','Translate the source code (written in a programming language) into the computer language (object code).','Compiler,Interpreter,Assembler,Decompiler','Compiler',1),('adqs001','mc','Reverse-engineer the translation performed by compilers and assemblers.','Compiler,Interpreter,Assembler,Decompiler','Decompiler',1),('adqs001','mc','Used in assembly language to convert the source code into the machine language.','Compiler,Interpreter,Assembler,Decompiler','Assembler',1),('adqs001','enum','Enumerate the Four Pillars of Object Oriented Programming Paradigm.','','Abstraction,Inheritance,Polymorphism,Encapsulation',4),('adqs001','enum','Enumerate the 2 types of Declarative Programming.','','Logical Programming,Functional Programming',2),('wdqs001','mc','Global system of interconnected computer networks that communicate and interchange data through TCP/IP.','Network,World Wide Web,Internet,LAN','Internet',1),('wdqs001','mc','HTML document that delivers various information and hyperlinks other pages and resources.','Website,Web page,Web application,Web server,Webclient','Web page',1),('wdqs001','mc','Related web resources under a common domain name.','Website,Web page,Web application,Web server,Webclient','Website',1),('wdqs001','mc','Software applications used to access web resources.','Website,Web page,Web application,Web server,Web client','Web client',1),('wdqs001','tf','When a browser parses an HTML document for rendering, it builds a root-structured representation of the hierarchy of the elements.','true,false','FALSE',1),('wdqs001','tf','CSS means Cascading Sheet Style','true,false','FALSE',1),('wdqs001','tf','Global attributes are attributes that are specific to some elements.','true,false','FALSE',1),('wdqs001','tf','The < p > tag is part of the heading elements.','true,false','FALSE',1),('wdqs001','tf','As part of the HTML coding conventions, use lowercase characters for ALL element and attribute names.','true,false','TRUE',1),('wdqs001','tf','ACSS specifications are maintained and published by WHATWG.','true,false','FALSE',1),('wdqs001','tf','Pseudo-elements allow selection of elements based on their structural relationships with other elements in the document tree.','true,false','FALSE',1),('wdqs001','enum','Enumerate the 3 different sources (a.k.a. origin) of styles applied to HTML documents.','','User agent styles,User styles,Author styles',3);
/*!40000 ALTER TABLE `quiz_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_list`
--

DROP TABLE IF EXISTS `quiz_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_list` (
  `quiz_code` text,
  `q_name` text,
  `q_password` text,
  `quiz_set` text,
  `subject_code` text,
  `q_display_setting` text,
  `start_quiz` text,
  `end_quiz` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_list`
--

LOCK TABLES `quiz_list` WRITE;
/*!40000 ALTER TABLE `quiz_list` DISABLE KEYS */;
INSERT INTO `quiz_list` VALUES ('tp001a','TechPres Prelims Quiz# 1','tp001a','tpqs001','tp','listed','',''),('nm001a','NumMeth Prelims Quiz# 1','nm001a','nmqs001','nm','listed','',''),('pd001a','PerDev Prelims Quiz# 1','pd001a','pdqs001','pd','listed','',''),('se001a','SoftEng Prelims Quiz# 1','seqs001a','seqs001','se','listed','',''),('ad001a','AppDev Prelims Quiz# 1','adqs001a','adqs001','ad','listed','',''),('wd001a','WebDev Prelims Quiz# 1','wdqs001a','wdqs001','wd','unlisted','',''),('','','','','','','',''),('','','','','','','q_display_setting - whether or not the teacher wants to display the quiz or not',''),('','','','','','','student_list - array, list of students allowed to take the quiz','');
/*!40000 ALTER TABLE `quiz_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `user_id` int(11) DEFAULT NULL,
  `lastname` text,
  `firstname` text,
  `history_id` text,
  `avail_quizzes` text,
  `subject_list` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (2022001,'Johnson','Dwayne','QH0001','','nm,tp,wd'),(2022002,'Wilson','Troy','QH0002','','ad,se,nm'),(2022003,'Smith','Sam','QH0003','','ad,pd,tp'),(2022004,'Williams','Robert','QH0004','','tp,wd,ad'),(2022005,'Davis','John','QH0005','','se,pd,tp'),(2022006,'Garcia','Giselle','QH0006','','wd,pd,ad'),(2022007,'Jones','Indianna','QH0007','','nm,se,pd'),(2022008,'Browne','Jake','QH0008','','pd,se,wd'),(2022009,'Moore','Mandy','QH0009','','ad,wd,tp'),(2022010,'Miller','Gilbert','QH0010','','nm,tp,ad');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_quiz`
--

DROP TABLE IF EXISTS `student_quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_quiz` (
  `user_id` bigint(20) DEFAULT NULL,
  `quiz_code` text,
  `score` bigint(20) DEFAULT NULL,
  `sq_id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`sq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_quiz`
--

LOCK TABLES `student_quiz` WRITE;
/*!40000 ALTER TABLE `student_quiz` DISABLE KEYS */;
INSERT INTO `student_quiz` VALUES (2022001,'tp001a',10,1,NULL),(2022003,'tp001a',4,2,NULL),(2022001,'pd001a',0,7,NULL);
/*!40000 ALTER TABLE `student_quiz` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-15 16:10:15
