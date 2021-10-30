-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 03:19 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(255) NOT NULL,
  `sid` int(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `sid`, `date`, `status`) VALUES
(1, 1, '2021-06-15', 'Present'),
(3, 1, '2021-06-15', 'Present'),
(8, 1, '2021-05-21', 'Present'),
(9, 1, '2021-05-21', 'Present'),
(10, 1, '2021-07-21', 'Present'),
(11, 1, '2021-07-21', 'Present'),
(13, 2, '2021-06-21', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(10) NOT NULL,
  `Class` varchar(100) NOT NULL,
  `Number of Students` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `Class`, `Number of Students`) VALUES
(1, 'Class 1', 0),
(2, 'Class 2', 0),
(3, 'Class 3', 0),
(4, 'Class 4', 0),
(5, 'Class 5', 0),
(6, 'Class 6', 0),
(7, 'Class 7', 0),
(8, 'Class 8', 0),
(9, 'Class 9', 0),
(10, 'Class 10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(255) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Total Question` int(255) NOT NULL,
  `Durations` int(255) NOT NULL,
  `Total Marks` int(255) NOT NULL,
  `Start Date` date NOT NULL,
  `Start Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `Class`, `Title`, `Total Question`, `Durations`, `Total Marks`, `Start Date`, `Start Time`) VALUES
(3, 'Class 9', 'Quiz 1', 5, 20, 10, '2021-07-25', '13:00:00'),
(6, 'Class 9', 'Quiz -2 (Science)', 5, 20, 10, '2021-07-26', '08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`id`, `fname`, `lname`, `username`, `password`) VALUES
(1, 'Sanjay', 'Singh', 'Sanjay101', 'Hello@123');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(255) NOT NULL,
  `exam_id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `marks` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question`, `answer`, `correct_answer`, `marks`) VALUES
(7, 3, 'What type of a language is HTML?', 'a:4:{i:0;s:20:\"Programming Language\";i:1;s:18:\"Scripting Language\";i:2;s:15:\"Markup Language\";i:3;s:16:\"Network Protocol\";}', 'Markup Language', 2),
(9, 3, 'What tag is used to display a picture in a HTML page?', 'a:4:{i:0;s:3:\"Src\";i:1;s:7:\"Picture\";i:2;s:5:\"Image\";i:3;s:3:\"Img\";}', 'Img', 4),
(10, 3, 'HTML documents are saved in', 'a:4:{i:0;s:10:\"ASCII text\";i:1;s:21:\"Special binary format\";i:2;s:22:\"Machine language codes\";i:3;s:13:\"None of above\";}', 'None of above', 4),
(12, 6, 'How Many Number of bones in human body have ?', 'a:4:{i:0;s:3:\"204\";i:1;s:7:\" 205   \";i:2;s:7:\" 206   \";i:3;s:4:\" 207\";}', ' 206   ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_assignment`
--

CREATE TABLE `schedule_assignment` (
  `assignment_id` int(10) NOT NULL,
  `assignment_name` varchar(100) NOT NULL,
  `assignment_class` varchar(100) NOT NULL,
  `assignment_info` varchar(300) NOT NULL,
  `before_time` time NOT NULL,
  `due_date` date NOT NULL,
  `tid` int(11) NOT NULL,
  `assignment_file` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_assignment`
--

INSERT INTO `schedule_assignment` (`assignment_id`, `assignment_name`, `assignment_class`, `assignment_info`, `before_time`, `due_date`, `tid`, `assignment_file`) VALUES
(2, 'History Project', 'Class 9', 'Submit in PDF Format', '23:59:00', '2021-06-15', 0, ''),
(3, 'Science Practical Assignment', 'Class 9', 'Submit Diagram Also', '23:57:00', '2021-06-16', 0, ''),
(8, 'maths tutorial', 'Class 6', 'solve given maths q on unit 3', '21:00:00', '2021-07-20', 1, '../uploads/upload_assignment/Vision and Mission Statements.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_meeting`
--

CREATE TABLE `schedule_meeting` (
  `meeting_id` int(10) NOT NULL,
  `meeting_name` varchar(100) NOT NULL,
  `meeting_class` varchar(100) NOT NULL,
  `meeting_info` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `meeting_link` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_meeting`
--

INSERT INTO `schedule_meeting` (`meeting_id`, `meeting_name`, `meeting_class`, `meeting_info`, `start_date`, `start_time`, `meeting_link`) VALUES
(1, 'Science - Lecture', 'Class 9', 'Attendance is compulsory', '2021-06-15', '08:00:00', 'https://meet.google.com/'),
(2, 'English - Lecture + Test', 'Class 2', 'There will be a test on chp 2 & chp3...Be prepared', '2021-06-24', '23:01:00', 'https://zoom.us/'),
(3, 'Parents Meeting', 'Class 1', 'Kindly Attend the parents teacher meeting.\r\nOne Parent of each child is compulsory.', '2021-06-18', '11:00:00', 'https://www.skype.com/en/'),
(4, 'Hindi Lecture', 'Class 9', '', '2021-06-17', '08:00:00', 'https://meet.google.com/'),
(5, 'History', 'Class 9', 'Come to the meeting', '2021-06-18', '15:00:00', 'https://us04web.zoom.us/j/78893196441?pwd=K2cySUJiSCtCaWNCVlhXcU5KbHVCZz09'),
(10, 'Zoom', 'Class 9', 'Zoom', '2021-06-20', '16:30:00', 'https://us04web.zoom.us/j/76924330082?pwd=OXBOZ3RvQXhXNDhpYXo0UzF2cnN1QT09'),
(22, 'Meeting with Parents', 'Class 6', 'Meeting', '2021-06-27', '14:00:00', 'https://us04web.zoom.us/j/75963493006?pwd=UHI1UDlPUzVERkJnNDJXZlNVWHJnQT09'),
(21, 'History', 'Class 9', 'History', '2021-06-30', '07:00:00', 'https://us04web.zoom.us/j/77096779394?pwd=MEhBMk02VGY0cGdmWWxNb2FGNHoxUT09'),
(23, 'Meeting abc', 'Class 9', 'Meeting', '2021-06-30', '20:00:00', 'https://us04web.zoom.us/j/78911572129?pwd=L0ZtVjBSWi9oZ094NUlGZmE5QTBVZz09');

-- --------------------------------------------------------

--
-- Table structure for table `solved_assignment`
--

CREATE TABLE `solved_assignment` (
  `solved_assignment_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `assignment_id` int(255) NOT NULL,
  `answers` varchar(1000) NOT NULL,
  `upload_answer` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `marks_obtained` int(11) NOT NULL,
  `marks_out_of` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solved_assignment`
--

INSERT INTO `solved_assignment` (`solved_assignment_id`, `student_id`, `assignment_id`, `answers`, `upload_answer`, `remarks`, `marks_obtained`, `marks_out_of`) VALUES
(22, 1, 2, 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group. ', '../uploads/submit_assignment/Vision and Mission Statements.pdf', 'Late', 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `id_card` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `class_joined` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `fname`, `lname`, `email`, `password`, `phone`, `id_card`, `status`, `class_joined`) VALUES
(1, 'Raj', 'Verma', 'raj@gmail.com', 'student@123', 987654321, 'uploads/Vision and Mission Statements.pdf', 'Verified', 'Class 9'),
(2, 'Bunny', 'Singh', 'bunny@gmail.com', 'student@123', 999999999, 'uploads/Vision and Mission Statements.pdf', 'Verified', 'Class 2'),
(3, 'create', 'whizz', 'whizz@gmail.com', 'student@123', 98765432, 'uploads/instructions_for_use.pdf', 'Verified', 'Class 1'),
(4, 'sham', 'sharma', 'sham@gmail.com', 'ZJp46d3N', 98789876, 'uploads/instructions_for_use.pdf', 'Applied', '');

-- --------------------------------------------------------

--
-- Table structure for table `submit_exam`
--

CREATE TABLE `submit_exam` (
  `subex_id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `ex_id` int(11) NOT NULL,
  `total_score` int(11) NOT NULL,
  `percent` int(100) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `fname`, `lname`, `email`, `password`, `phone`, `gender`, `role`, `designation`) VALUES
(1, 'Deepak', 'Kumar', 'deepak@gmail.com', 'teacher@123', 123123123, 'Male', 'HOD', 'CSE (Computer Science Engineering)'),
(2, 'Mohima ', 'Singh', 'mohima@gmail.com', 'teacher@123', 123456789, 'Female', 'Teacher', 'ECE (Electronics and Communication Engineering)'),
(4, 'Anjali', 'Sawant', 'anjali@gmail.com', 'BfaGC1uN', 898789876, 'Female', 'Teacher', 'CSE (Computer Science Engineering)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `schedule_assignment`
--
ALTER TABLE `schedule_assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `schedule_meeting`
--
ALTER TABLE `schedule_meeting`
  ADD PRIMARY KEY (`meeting_id`);

--
-- Indexes for table `solved_assignment`
--
ALTER TABLE `solved_assignment`
  ADD PRIMARY KEY (`solved_assignment_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `submit_exam`
--
ALTER TABLE `submit_exam`
  ADD PRIMARY KEY (`subex_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schedule_assignment`
--
ALTER TABLE `schedule_assignment`
  MODIFY `assignment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule_meeting`
--
ALTER TABLE `schedule_meeting`
  MODIFY `meeting_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `solved_assignment`
--
ALTER TABLE `solved_assignment`
  MODIFY `solved_assignment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `submit_exam`
--
ALTER TABLE `submit_exam`
  MODIFY `subex_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `sid` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `exam_id` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solved_assignment`
--
ALTER TABLE `solved_assignment`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
