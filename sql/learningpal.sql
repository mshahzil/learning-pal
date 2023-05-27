-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2021 at 03:56 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learningpal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin'),
(2, 'admin2', 'admin2@gmail.com', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `subject` text COLLATE utf8_bin NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Shahzil', 'mshahzil.bese18seecs@seecs.edu.pk', 'Test Email', 'Onnnnnn'),
(2, 'M. Shahzil', 'shahzil.jawad@gmail.com', 'Test Email 2', 'I am unable to login.');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` text COLLATE utf8_bin NOT NULL,
  `course_desc` text COLLATE utf8_bin NOT NULL,
  `course_author` text COLLATE utf8_bin NOT NULL,
  `course_duration` text COLLATE utf8_bin NOT NULL,
  `course_original_price` int(10) NOT NULL,
  `course_price` int(10) NOT NULL,
  `course_img` text COLLATE utf8_bin NOT NULL,
  `course_status` text COLLATE utf8_bin NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_duration`, `course_original_price`, `course_price`, `course_img`, `course_status`, `category_id`) VALUES
(1, 'Fundamentals of Programming with Python', 'This course covers the basics of programming using one of the most popular and easy to learn programming languages, Python. Highly recommended for beginners!', 'David Henry', '1 month', 2000, 0, './image/courseimg/python.jpg', 'free', 1),
(2, 'Introduction to Web Development', 'This course is for beginners who aspire to delve into the world of Web Development. It covers HTML, CSS and JavaScript, enabling you to become a skilled Front End Developer.', 'Brad Lee', '1 month', 2000, 0, '../image/courseimg/webdev.jpg', 'free', 1),
(3, 'Mobile App Development with React Native', 'This course is made for those who plan on becoming cross-platform Mobile App Developers. Learn Mobile App Development using the most popular framework React Native.', 'Mike Taylor', '3 months', 2500, 0, '../image/courseimg/reactnative.jpg', 'free', 1),
(4, 'Probability and Statistics', 'This course covers all the main topics you need to know for becoming a statistics expert, ranging from Binomial Theorem to Normal Distribution.', 'Wallace Harry', '2 months', 2000, 0, '../image/courseimg/stats.jpg', 'free', 6),
(5, 'Discrete Mathematics', 'This course covers the digital logic and algorithms required in Mathematics including shortest path algorithms and Sorting algorithms.', 'Trever Nolan', '2 months', 3000, 0, '../image/courseimg/discretemaths.jpg', 'free', 6),
(6, 'Introduction to Artificial Intelligence', 'This course covers the basics of Artificial Intelligence, which is the fastest growing field in Computer Science today. ', 'Daniel Smith', '1 month', 2000, 0, '../image/courseimg/AI.jpg', 'free', 1),
(7, 'Introduction to Game Development with Unity', 'This course introduces Game Development using one of the most popular gaming engines, Unity.', 'Steve Henry', '2 months', 2000, 0, '../image/courseimg/unity.jpg', 'free', 1),
(10, 'Build Web Applications with React', 'This course covers the most popular and in-demand framework for Front End Web Development, React.', 'Louis Carry', '1 month', 3000, 0, '../image/courseimg/react.jpg', 'free', 1),
(11, 'Complex Variables and Transforms', 'This course comprehensively covers complex variables, complex functions, fourier series and fourier transforms.', 'Kevin Smith', '3 months', 1500, 0, '../image/courseimg/cvt.jpg', 'free', 6),
(12, 'Business Fundamentals', 'This course will enable you to understand and learn contemporary business tactics and techniques.', 'John Will', '2 months', 2000, 0, '../image/courseimg/unity.jpg', 'free', 2),
(16, 'History', 'This course gives you a brief overview of world history, ranging from the United States to the Indian Subcontinent.', 'Adam Bill', '1 month', 1000, 0, 'image/courseimg/viserys.jpg', 'free', 3),
(14, 'Business Analytics', 'This an advanced course through which you can learn advanced business analytics in depth.', 'Mike', '3 months', 2500, 0, 'image/courseimg/AI.jpg', 'free', 2),
(17, 'Philosophy', 'This is course enables you to gain insight on modern philosophy and its societal implications.', 'Tim', '2 months', 2000, 0, './image/courseimg/discretemaths.jpg', 'free', 3),
(18, 'Visual Arts', 'Visual Arts is one of the most significant fields of today. So, this course has everything that you would want to learn.', 'William ', '3 months', 3000, 0, 'image/courseimg/python.jpg', 'free', 3),
(19, 'Introduction to DataScience', 'This course will provide you with a deep insight on what data science and its fundamentals are.', 'David Henry', '1 month', 1000, 0, 'image/courseimg/cvt.jpg', 'free', 4),
(20, 'Applied Data Science', 'This course will provide you with a deep insight on what applied data science is with python.', 'Brad Cooper', '2 months', 0, 0, 'image/courseimg/python.jpg', 'free', 4),
(21, 'Dataquest', 'This course will provide you with a deep insight on what data science and its fundamentals are.', 'John David', '3 months', 2000, 0, 'image/courseimg/stats.jpg', 'free', 4),
(22, 'Computer Networking', 'You will learn best networking practices.', 'Brad Lee', '1 month', 1000, 0, 'image/courseimg/AI.jpg', 'free', 5),
(23, 'Network Security', 'It is a course on security fundamentals.', 'Kevin Smith', '2 months', 2000, 0, 'image/courseimg/unity.jpg', 'free', 5),
(24, 'Quality Assurance', 'You will learn SQA in depth.', 'John David', '3 months', 3000, 0, 'image/courseimg/reactnative.jpg', 'free', 5),
(25, 'Sociology', 'A descriptive course on Sociology', 'Brad Lee', '3 months', 2000, 0, 'image/courseimg/unity.jpg', 'free', 7),
(26, 'Economics', 'A brief Intro to Economics.', 'Arthur Lee', '1 month', 1000, 0, 'image/courseimg/webdev.jpg', 'free', 7),
(27, 'Political Science', 'Enter the era of political science with us.', 'Henry Bill', '2 month', 1000, 0, 'image/courseimg/AI.jpg', 'free', 7),
(28, 'Nutrition', 'A course on nutritional value of items.', 'Henry Cooper', '3 months', 2000, 0, 'image/courseimg/unity.jpg', 'free', 8),
(29, 'Infectious Diseases', 'Learn about the infectious diseases.', 'Me', '4 months', 1000, 0, 'image/courseimg/viserys.jpg', 'free', 8),
(30, 'Anatomy', 'Let\'s learn anatomy', 'steven', '2 months', 2000, 0, '../image/courseimg/python.jpg', 'free', 8);

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

DROP TABLE IF EXISTS `course_category`;
CREATE TABLE IF NOT EXISTS `course_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text COLLATE utf8_bin NOT NULL,
  `num_courses` int(10) NOT NULL,
  `category_img` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`category_id`, `category_name`, `num_courses`, `category_img`) VALUES
(1, 'Computer Science', 50, './image/categoryimg/cs.jpg'),
(2, 'Business', 40, './image/categoryimg/business.jpg'),
(3, 'Arts and Humanities', 40, './image/categoryimg/arts.jpg'),
(4, 'Data Science', 60, './image/categoryimg/data_science.jpg'),
(5, 'Information Technology', 50, './image/categoryimg/IT.jpg'),
(6, 'Math and Logic', 40, './image/categoryimg/maths.jpg'),
(7, 'Social Sciences', 30, './image/categoryimg/social.jpg'),
(8, 'Health', 30, './image/categoryimg/health.jpg'),
(9, 'Professional Development', 25, './image/categoryimg/professional.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enrolment`
--

DROP TABLE IF EXISTS `enrolment`;
CREATE TABLE IF NOT EXISTS `enrolment` (
  `enrolment_id` int(11) NOT NULL AUTO_INCREMENT,
  `std_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`enrolment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `enrolment`
--

INSERT INTO `enrolment` (`enrolment_id`, `std_id`, `course_id`) VALUES
(12, 3, 6),
(11, 3, 11),
(13, 35, 1),
(14, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback` text NOT NULL,
  `std_id` int(11) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback`, `std_id`) VALUES
(1, 'this is nice', 4),
(2, 'Hey! I learnt a lot...', 5),
(3, 'Coooooooool', 2),
(4, 'The course was cool.', 1),
(5, 'Onnnnnn Scene', 3),
(6, 'Boringgg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
CREATE TABLE IF NOT EXISTS `lesson` (
  `lesson_id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_name` text COLLATE utf8_bin NOT NULL,
  `lesson_desc` text COLLATE utf8_bin NOT NULL,
  `lesson_link` text COLLATE utf8_bin NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`lesson_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(1, 'React JS Basics', 'This lesson introduces the React framework and covers the basics you need to know before learning React Native.', './lessonvid/react.mp4', 3, 'Mobile App Development with React Native'),
(2, 'Introduction to HTML5', 'This lesson will teach you how to build the structure of your website using HTML5.', '../lessonvid/webdev01.mp4', 2, 'Introduction to Web Development'),
(3, 'Introduction to CSS3', 'This lesson will teach you how to apply styling to your website to enhance its look and feel.', './lessonvid/', 2, 'Introduction to Web Development'),
(5, 'Supervised Learning', 'This lesson explains one of the two main basic techniques used in Artificial Intelligence.', '../lessonvid/AI01.mp4', 6, 'Artificial Intelligence'),
(8, 'Introduction to JavaScript', 'This lesson covers the basics of JavaScript for handling events on a webpage.', '../lessonvid/', 2, 'Introduction to Web Development'),
(7, 'Python Loops and Conditionals', 'This lesson introduces Object oriented Programming In Python.', './lessonvid/video_file.mp4', 1, 'Fundamentals of Programming with Python'),
(9, 'Python Arrays and Functions', 'This lesson covers Python Arrays and Functions', '../lessonvid/video_file.mp4', 1, 'Fundamentals of Programming with Python'),
(10, 'Python Classes and Objects', 'This lesson covers Python Classes and Objects', '../lessonvid/video_file.mp4', 1, 'Fundamentals of Programming with Python'),
(11, 'React Components', 'This lesson covers React Components.', '../lessonvid/video_file.mp4', 3, 'Mobile App Development with React Native'),
(12, 'Introduction to JSX', 'This lesson gives an Introduction to JSX.', '../lessonvid/video_file.mp4', 3, 'Mobile App Development with React Native'),
(13, 'Unsupervised Learning', 'This lesson covers the technique of Unsupervised Learning.', '../lessonvid/video_file.mp4', 6, 'Introduction to Artificial Intelligence');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `std_id` int(11) NOT NULL AUTO_INCREMENT,
  `std_name` varchar(255) NOT NULL,
  `std_email` varchar(255) NOT NULL,
  `std_pass` varchar(255) NOT NULL,
  `std_prof` varchar(255) DEFAULT NULL,
  `std_img` text,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`, `std_email`, `std_pass`, `std_prof`, `std_img`) VALUES
(1, 'Talia Hamid', 'taliathesaas@gmail.com', 'Unhon', 'Professor', 'images/std.jpg'),
(2, 'Amna Abid', 'ilovesirmeow@hotmail.com', 'Giraffe', 'Toddler', 'images/std.jpg'),
(3, 'Muhammad Shahzil', 'iamspeed@yahoo.com', 'HayeHaye', 'Teacher', 'images/viserys.jpg'),
(4, 'Amna Faisal', 'Catsforlife@gmail.com', 'tooCute', 'Student', 'images/about1.jpg'),
(5, 'Zainab', 'sleepyPanda@gmail.com', 'Squishable', 'President', 'images/std.jpg'),
(6, 'Amna Jah', 'badshahsalamat@gmail.com', 'Meinaydaalchawalkhanayhain', 'Sir', 'images/std.jpg'),
(35, 'user1', 'user1@gmail.com', 'abcd', NULL, NULL),
(36, 'user2', 'abc@gmail.com', '123', 'Student', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
