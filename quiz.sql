-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2021 at 04:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(11) NOT NULL,
  `ans_content` varchar(255) NOT NULL,
  `ans_option_number` int(11) NOT NULL,
  `ans_for` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `ans_content`, `ans_option_number`, `ans_for`) VALUES
(17, 'werwf', 1, '8'),
(18, 'rfwerf', 2, '8'),
(19, 'wrfewrf', 3, '8'),
(20, 'wfewf', 4, '8'),
(21, 'Ram', 1, '9'),
(22, 'shyam', 2, '9'),
(23, 'raju ', 3, '9'),
(24, 'sheeta', 4, '9');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `exam_last_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`, `exam_last_date`) VALUES
(1, 'Annual Exam 2021', '2021-10-30 04:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `paper_id` int(11) NOT NULL,
  `paper_hash` varchar(255) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `paper_subject` varchar(255) NOT NULL,
  `paper_class` varchar(255) NOT NULL,
  `paper_author` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`paper_id`, `paper_hash`, `exam_id`, `paper_subject`, `paper_class`, `paper_author`) VALUES
(19, 'ddvdwfwfwr', 1, 'Gk', '10', 'Akash'),
(20, '4E61fR6TDO1yX843mWi5', 1, 'Hindi', '10', 'vikash'),
(21, 'uZno4JIbXN2LijPOTOyx', 1, 'Gk', '12', 'vikash'),
(22, 'ASXmfzk0XJrFHh0JoAAF', 1, 'Gk', '12', 'vikash');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `que_id` int(11) NOT NULL,
  `que_hash` varchar(255) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `que_content` varchar(255) NOT NULL,
  `option_1` varchar(255) NOT NULL,
  `option_2` varchar(255) NOT NULL,
  `option_3` varchar(255) NOT NULL,
  `option_4` varchar(255) NOT NULL,
  `que_subject` varchar(255) NOT NULL,
  `right_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`que_id`, `que_hash`, `paper_id`, `exam_id`, `que_content`, `option_1`, `option_2`, `option_3`, `option_4`, `que_subject`, `right_option`) VALUES
(14, 'Dw08d4JiDPs', 19, 1, 'HEllo', 'frfr', 'ref', 'efrf', 'rerferfr', 'GK', 1),
(15, 'KVTZN2Dk8eb', 19, 1, 'Who is Gandi', 'ede2', 'wedfewd', 'ewdf2', 'erwfrwfeg', 'GK', 1),
(16, 'MgVD1ZCVDT0', 19, 1, 'The home of Gargi, Maitrey and Kapila was at', 'Vidisha', 'Ujjain', 'Pataliputra', 'Mithila', 'GK', 4),
(17, 'rO69T8iuMnA', 19, 1, 'Which of the following Vedas provides information about the civilization of the Early Vedic Age?', 'Rig-veda', 'Yajur-veda', 'Atharva-veda', 'Sama-veda', 'GK', 1),
(18, '0mzoKLQMjgu', 19, 1, 'The most important text of vedic mathematics is:', 'Satapatha Brahman', 'Atharva Veda', 'Sulva Sutras', 'Chhandogya Upanishad', 'GK', 3),
(19, 'ORLEHxttMVv', 19, 1, 'Which of the following Craftsmanship was not practised by the Aryans?', 'Pottery', 'Jewellery', 'Carpentry', 'Blacksmith', 'GK', 4),
(20, 'N3nOuFlCQvW', 19, 1, 'The words \"Satyameva Jayate” in the State Emblem of india were taken from', 'Upanishads', 'Sama Veda', 'Rig Veda', 'Ramayana', 'GK', 1),
(21, 'zJG3y6lmdqZ', 19, 1, '', '', '', '', '', 'GK', 3),
(22, 'hIM3IjBjxnB', 19, 1, 'Hello', 'fevwdfvegqhd', 'edf eqdvkghewd', 'bcsdbfshdfbh', 'bdejdvgehdf', 'GK', 4),
(23, 'iYyJlZmjj5l', 21, 1, 'The home of Gargi, Maitrey and Kapila was at', 'Vidisha', 'Ujjain', 'Pataliputra', 'Mithila', 'GK', 4),
(24, 'iCZD6DXAzpO', 21, 1, 'Which of the following Vedas provides information about the civilization of the Early Vedic Age?', 'Yajur-veda', 'Atharva-veda', 'Sama-veda', 'Rig-veda', 'GK', 1),
(25, 'weMv43Fv2VH', 21, 1, 'The most important text of vedic mathematics is:', 'Satapatha Brahman', 'Sulva Sutras', 'Atharva Veda', 'Chhandogya Upanishad', 'GK', 2),
(26, 'GOT4L13clnN', 21, 1, 'Which of the following Craftsmanship was not practised by the Aryans?', 'Pottery', 'Blacksmith', 'Carpentry', 'Jewellery', 'GK', 2),
(27, 'fRnA85MVu8c', 21, 1, 'The words \"Satyameva Jayate” in the State Emblem of india were taken from', 'Upanishads', 'Sama Veda', 'Rig Veda', 'Ramayana', 'GK', 1),
(28, '5hl2lgOEAGD', 21, 1, 'Who is hailed as the “God of Medicine\" by the practitioners of Ayurveda?', 'Susruta', 'Chyavana', 'Dhanwantari', 'Charaka', 'GK', 3);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `result_hash` varchar(255) NOT NULL,
  `result_student_id` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `marks_obtained` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `attempted_questions` int(11) NOT NULL,
  `right_answers` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_paper_id` int(11) NOT NULL,
  `attempted_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `result_hash`, `result_student_id`, `total_marks`, `marks_obtained`, `total_questions`, `attempted_questions`, `right_answers`, `exam_id`, `exam_paper_id`, `attempted_on`) VALUES
(22, 'Yc0y8UHFAoh', 23, 9, 4, 9, 8, 4, 1, 19, '2021-10-20 08:01:45'),
(23, 'rNRhsHfYLC2', 23, 9, 1, 9, 8, 1, 1, 19, '2021-10-20 10:42:15'),
(24, 'fv7ydOZf2mt', 23, 9, 1, 9, 8, 1, 1, 19, '2021-10-20 11:17:58'),
(25, 'az7h6y8zrhL', 23, 6, 4, 6, 6, 4, 1, 21, '2021-10-20 11:29:20'),
(26, '3QNoHpcSt6b', 23, 6, 1, 6, 1, 1, 1, 21, '2021-10-20 11:40:39'),
(27, 'dgUMKUTQ2o4', 23, 6, 4, 6, 6, 4, 1, 21, '2021-10-20 13:25:47'),
(28, '82EK4vMJgyc', 23, 6, 4, 6, 6, 4, 1, 21, '2021-10-20 13:43:06'),
(29, 'SCcBGAq1LZJ', 23, 6, 2, 6, 3, 2, 1, 21, '2021-10-20 13:43:43'),
(30, 'Hzuqr3ekQO1', 23, 6, 5, 6, 6, 5, 1, 21, '2021-10-20 13:45:49'),
(31, 'A5LXZeHNhHg', 23, 6, 1, 6, 4, 1, 1, 21, '2021-10-20 14:26:06'),
(32, 'I0C7c6YvGyA', 23, 6, 1, 6, 1, 1, 1, 21, '2021-10-20 16:25:27'),
(33, 'azJ2nlqhJC8', 23, 6, 1, 6, 4, 1, 1, 21, '2021-10-20 16:29:48'),
(34, 'wA40hLkA25m', 23, 6, 0, 6, 1, 0, 1, 21, '2021-10-20 16:33:33'),
(35, '1jenLMYINPE', 23, 6, 1, 6, 6, 1, 1, 21, '2021-10-20 17:05:01'),
(36, 'z5KDO6tzTS0', 23, 6, 2, 6, 6, 2, 1, 21, '2021-10-20 17:08:30'),
(37, 'MoKnd6898vd', 23, 6, 3, 6, 6, 3, 1, 21, '2021-10-20 17:13:23'),
(38, 'PEmOj5cQdmJ', 23, 6, 3, 6, 6, 3, 1, 21, '2021-10-20 17:31:48'),
(39, '', 23, 0, 0, 0, 0, 0, 1, 21, '2021-10-21 04:39:42'),
(40, '', 23, 0, 0, 0, 0, 0, 1, 21, '2021-10-21 04:39:49'),
(41, 'DNJqQ3RhFhC', 23, 6, 1, 6, 1, 1, 1, 21, '2021-10-21 04:39:53'),
(42, 'WMYc12wL527', 23, 6, 4, 6, 6, 4, 1, 21, '2021-10-21 04:46:58'),
(43, 'ELnh99k1mXe', 23, 6, 0, 6, 2, 0, 1, 21, '2021-10-30 05:27:10'),
(44, 'pAY61ibP5Kf', 23, 9, 3, 9, 8, 3, 1, 19, '2021-12-01 15:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_roll_no` int(11) NOT NULL,
  `student_class` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_roll_no`, `student_class`, `student_email`, `student_name`, `student_password`) VALUES
(1, 1, '9th', 'student@gmail.com', 'Akash choudhary', 'akash0000'),
(23, 2, '12th', 'mecvgh@gmail.com', 'Mewaram', 'dcdwfqddwf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(244) NOT NULL,
  `user_full_name` varchar(244) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_full_name`, `user_role`) VALUES
(1, 'code@gmail.com', 'akash', 'aksh', 'admin'),
(4, 'mewaramk01@gmail.com', 'akashnew', 'Akash', 'staff'),
(5, 'mewaramk02@gmail.com', 'akashnew', 'Akash', 'staff'),
(6, 'inbuddyfix@gmail.com', 'akashnew', 'Akash', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`que_id`),
  ADD UNIQUE KEY `que_id` (`que_hash`),
  ADD UNIQUE KEY `que_id_2` (`que_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
