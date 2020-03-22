-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 01:52 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advisemate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `fname` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `advisory_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`fname`, `user_id`, `mname`, `lname`, `password`, `advisory_year`) VALUES
('Juan', 123456, 'Dela', 'Salazar', 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sub_code` varchar(55) NOT NULL,
  `grade` varchar(55) NOT NULL,
  `grade_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `sub_code`, `grade`, `grade_status`) VALUES
(450, 1600076, 'ENG_101', '2.0', 0),
(451, 1600076, 'ENG_103', '3.0', 0),
(452, 1600076, 'ENG_108', '1.8', 0),
(453, 1600076, 'ENG_112', '1.8', 0),
(454, 1600076, 'ENG_113', '1.7', 0),
(455, 1600076, 'FIL_101', '1.1', 0),
(456, 1600076, 'FIL_102', '2.0', 0),
(457, 1600076, 'HUM_103', '', 0),
(458, 1600076, 'HUM_104', '1.3', 0),
(459, 1600076, 'HUM_106', '1.9', 0),
(460, 1600076, 'IT_101', '2.5', 0),
(461, 1600076, 'IT_102', '1.2', 0),
(462, 1600076, 'IT_103', '1.1', 0),
(463, 1600076, 'IT_104', '1.7', 0),
(464, 1600076, 'IT_105', '1.8', 0),
(465, 1600076, 'IT_201', '2.3', 0),
(466, 1600076, 'IT_202', '1.8', 0),
(467, 1600076, 'IT_203', '1.2', 0),
(468, 1600076, 'IT_204', '1.6', 0),
(469, 1600076, 'IT_205', '1.5', 0),
(470, 1600076, 'IT_206', '1.2', 0),
(471, 1600076, 'IT_207', '1.6', 0),
(472, 1600076, 'IT_208', '1.2', 0),
(473, 1600076, 'IT_301', '1.8', 0),
(474, 1600076, 'IT_302', '1.8', 0),
(475, 1600076, 'IT_303', '4.0', 0),
(476, 1600076, 'IT_304', '1.7', 0),
(477, 1600076, 'IT_305', '2.4', 0),
(478, 1600076, 'IT_306', 'DRP', 0),
(479, 1600076, 'IT_307', 'INC', 0),
(480, 1600076, 'IT_308', '2.4', 0),
(481, 1600076, 'IT_309', '5.0', 0),
(482, 1600076, 'IT_310', '2.0', 0),
(483, 1600076, 'IT_311', '3.0', 0),
(484, 1600076, 'IT_401', '', 0),
(485, 1600076, 'IT_402', '', 0),
(486, 1600076, 'IT_403', '1.5', 2),
(487, 1600076, 'IT_404', '', 0),
(488, 1600076, 'IT_405', '', 0),
(489, 1600076, 'IT_406', '', 0),
(490, 1600076, 'IT_407', '', 0),
(491, 1600076, 'IT_408', '', 0),
(492, 1600076, 'IT_409', '', 0),
(493, 1600076, 'MATH_106', '1.6', 0),
(494, 1600076, 'MATH_108', '2.4', 0),
(495, 1600076, 'MATH_112', '2.4', 0),
(496, 1600076, 'MATH_121', '2.0', 0),
(497, 1600076, 'NSTP_101', '1.4', 0),
(498, 1600076, 'NSTP_102', '1.3', 0),
(499, 1600076, 'PE_101', '2.2', 0),
(500, 1600076, 'PE_102', '1.3', 0),
(501, 1600076, 'PE_103', '1.3', 0),
(502, 1600076, 'PE_104', '1.1', 0),
(503, 1600076, 'SCI_101', '2.1', 0),
(504, 1600076, 'SCI_102A', '1.2', 0),
(505, 1600076, 'SCI_117', '1.4', 0),
(506, 1600076, 'SCI_135L-1', '2.5', 0),
(507, 1600076, 'SOCSCI_101', '1.8', 0),
(508, 1600076, 'SOCSCI_103', '2.0', 0),
(509, 1600076, 'SOCSCI_104', '1.8', 0),
(510, 1600076, 'SOCSCI_105', '1.5', 0),
(511, 1600076, 'SOCSCI_106', '2.8', 0),
(512, 1600076, 'SOCSCI_115', '', 0),
(513, 1600045, 'ENG_101', '1.8', 0),
(514, 1600045, 'ENG_103', '1.8', 0),
(515, 1600045, 'ENG_108', '1.3', 0),
(516, 1600045, 'ENG_112', '1.3', 0),
(517, 1600045, 'ENG_113', '1.3', 0),
(518, 1600045, 'FIL_101', '2.4', 0),
(519, 1600045, 'FIL_102', '1.5', 0),
(520, 1600045, 'HUM_103', '2.4', 2),
(521, 1600045, 'HUM_104', '2.1', 0),
(522, 1600045, 'HUM_106', '1.5', 0),
(523, 1600045, 'IT_101', '1.5', 0),
(524, 1600045, 'IT_102', '1.9', 0),
(525, 1600045, 'IT_103', '1.8', 0),
(526, 1600045, 'IT_104', '1.7', 0),
(527, 1600045, 'IT_105', '1.4', 0),
(528, 1600045, 'IT_201', '1.9', 0),
(529, 1600045, 'IT_202', '1.4', 0),
(530, 1600045, 'IT_203', '1.8', 0),
(531, 1600045, 'IT_204', '2.0', 0),
(532, 1600045, 'IT_205', '1.3', 0),
(533, 1600045, 'IT_206', '1.9', 0),
(534, 1600045, 'IT_207', '1.8', 0),
(535, 1600045, 'IT_208', '2.2', 0),
(536, 1600045, 'IT_301', '1.3', 0),
(537, 1600045, 'IT_302', '1.7', 0),
(538, 1600045, 'IT_303', '5.0', 0),
(539, 1600045, 'IT_304', '2.5', 0),
(540, 1600045, 'IT_305', '2.4', 0),
(541, 1600045, 'IT_306', 'INC', 0),
(542, 1600045, 'IT_307', '1.8', 0),
(543, 1600045, 'IT_308', '3.0', 0),
(544, 1600045, 'IT_309', '2.4', 0),
(545, 1600045, 'IT_310', '3.0', 0),
(546, 1600045, 'IT_311', 'DRP', 0),
(547, 1600045, 'IT_401', '', 0),
(548, 1600045, 'IT_402', '', 0),
(549, 1600045, 'IT_403', '', 0),
(550, 1600045, 'IT_404', '', 0),
(551, 1600045, 'IT_405', '', 0),
(552, 1600045, 'IT_406', '', 0),
(553, 1600045, 'IT_407', '', 0),
(554, 1600045, 'IT_408', '', 0),
(555, 1600045, 'IT_409', '2.5', 1),
(556, 1600045, 'MATH_106', '2.4', 0),
(557, 1600045, 'MATH_108', '1.3', 0),
(558, 1600045, 'MATH_112', '1.3', 0),
(559, 1600045, 'MATH_121', '1.4', 0),
(560, 1600045, 'NSTP_101', '1.1', 0),
(561, 1600045, 'NSTP_102', '1.8', 0),
(562, 1600045, 'PE_101', '1.2', 0),
(563, 1600045, 'PE_102', '2.0', 0),
(564, 1600045, 'PE_103', '1.3', 0),
(565, 1600045, 'PE_104', '1.3', 0),
(566, 1600045, 'SCI_101', '2.0', 0),
(567, 1600045, 'SCI_102A', '1.2', 0),
(568, 1600045, 'SCI_117', '1.3', 0),
(569, 1600045, 'SCI_135L-1', '2.4', 0),
(570, 1600045, 'SOCSCI_101', '1.3', 0),
(571, 1600045, 'SOCSCI_103', '2.1', 0),
(572, 1600045, 'SOCSCI_104', '2.2', 0),
(573, 1600045, 'SOCSCI_105', '2.0', 0),
(574, 1600045, 'SOCSCI_106', '2.1', 0),
(575, 1600045, 'SOCSCI_115', '', 0),
(576, 1600073, 'ENG_101', '', 0),
(577, 1600073, 'ENG_103', '', 0),
(578, 1600073, 'ENG_108', '', 0),
(579, 1600073, 'ENG_112', '', 0),
(580, 1600073, 'ENG_113', '', 0),
(581, 1600073, 'FIL_101', '', 0),
(582, 1600073, 'FIL_102', '', 0),
(583, 1600073, 'HUM_103', '', 0),
(584, 1600073, 'HUM_104', '', 0),
(585, 1600073, 'HUM_106', '', 0),
(586, 1600073, 'IT_101', '', 0),
(587, 1600073, 'IT_102', '', 0),
(588, 1600073, 'IT_103', '', 0),
(589, 1600073, 'IT_104', '', 0),
(590, 1600073, 'IT_105', '', 0),
(591, 1600073, 'IT_201', '', 0),
(592, 1600073, 'IT_202', '', 0),
(593, 1600073, 'IT_203', '', 0),
(594, 1600073, 'IT_204', '', 0),
(595, 1600073, 'IT_205', '', 0),
(596, 1600073, 'IT_206', '', 0),
(597, 1600073, 'IT_207', '', 0),
(598, 1600073, 'IT_208', '', 0),
(599, 1600073, 'IT_301', '', 0),
(600, 1600073, 'IT_302', '', 0),
(601, 1600073, 'IT_303', '', 0),
(602, 1600073, 'IT_304', '', 0),
(603, 1600073, 'IT_305', '', 0),
(604, 1600073, 'IT_306', '', 0),
(605, 1600073, 'IT_307', '', 0),
(606, 1600073, 'IT_308', '', 0),
(607, 1600073, 'IT_309', '', 0),
(608, 1600073, 'IT_310', '', 0),
(609, 1600073, 'IT_311', '', 0),
(610, 1600073, 'IT_401', '', 0),
(611, 1600073, 'IT_402', '', 0),
(612, 1600073, 'IT_403', '', 0),
(613, 1600073, 'IT_404', '', 0),
(614, 1600073, 'IT_405', '', 0),
(615, 1600073, 'IT_406', '', 0),
(616, 1600073, 'IT_407', '', 0),
(617, 1600073, 'IT_408', '', 0),
(618, 1600073, 'IT_409', '', 0),
(619, 1600073, 'MATH_106', '', 0),
(620, 1600073, 'MATH_108', '', 0),
(621, 1600073, 'MATH_112', '', 0),
(622, 1600073, 'MATH_121', '', 0),
(623, 1600073, 'NSTP_101', '', 0),
(624, 1600073, 'NSTP_102', '', 0),
(625, 1600073, 'PE_101', '', 0),
(626, 1600073, 'PE_102', '', 0),
(627, 1600073, 'PE_103', '', 0),
(628, 1600073, 'PE_104', '', 0),
(629, 1600073, 'SCI_101', '', 0),
(630, 1600073, 'SCI_102A', '', 0),
(631, 1600073, 'SCI_117', '', 0),
(632, 1600073, 'SCI_135L-1', '', 0),
(633, 1600073, 'SOCSCI_101', '1.0', 2),
(634, 1600073, 'SOCSCI_103', '', 0),
(635, 1600073, 'SOCSCI_104', '', 0),
(636, 1600073, 'SOCSCI_105', '', 0),
(637, 1600073, 'SOCSCI_106', '', 0),
(638, 1600073, 'SOCSCI_115', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `mname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `pword` varchar(55) NOT NULL,
  `year_started` date NOT NULL,
  `year_lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `fname`, `mname`, `lname`, `pword`, `year_started`, `year_lvl`) VALUES
(1600045, 'Jason', 'Villarin', 'Lago', '1600045', '2016-00-05', 3),
(1600073, 'Mary Joy', 'Segura', 'Nabartey', '1600073', '2016-00-05', 1),
(1600076, 'Jomar', 'Lababo', 'Salazar', '1600076', '2016-00-05', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_code` varchar(20) NOT NULL,
  `sub_desc` varchar(255) NOT NULL,
  `sub_prereq` varchar(20) NOT NULL,
  `sub_unit` int(2) NOT NULL,
  `sub_year` int(2) NOT NULL,
  `sub_sem` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_code`, `sub_desc`, `sub_prereq`, `sub_unit`, `sub_year`, `sub_sem`) VALUES
('ENG_101', 'Communication Arts', 'NONE', 3, 1, 1),
('ENG_103', 'Writing in the Discipline', 'NONE', 3, 2, 1),
('ENG_108', 'Oral Communication', 'NONE', 3, 2, 2),
('ENG_112', 'Technical Writing & Reporting', 'NONE', 3, 3, 1),
('ENG_113', 'Introduction to Mass Communication and Information Technology', 'ENG_101', 3, 1, 2),
('FIL_101', 'Komunikasyon sa Akademikong Filipino', 'NONE', 3, 1, 1),
('FIL_102', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 'FIL_101', 3, 1, 2),
('HUM_103', 'Art Appreciation', 'NONE', 3, 4, 2),
('HUM_104', 'Appreciation of Visual Arts', 'NONE', 3, 2, 2),
('HUM_106', 'Appreciation of Music and Various Arts', 'NONE', 3, 2, 1),
('IT_101', 'Information Technology Fundamentals w/Software Applicatino', 'NONE', 3, 1, 1),
('IT_102', 'Program Logic Formulation', 'NONE', 3, 1, 1),
('IT_103', 'Computer Hardware, Repair and Maintenance', 'IT_101', 3, 1, 2),
('IT_104', 'Networking Basic', 'IT_101', 3, 1, 2),
('IT_105', 'Programming I', 'IT_102', 3, 1, 2),
('IT_201', 'Discrete Structures', 'MATH_106', 3, 2, 1),
('IT_202', 'Programming II', 'IT_105', 3, 2, 1),
('IT_203', 'Quality Consciousness Habit and Processes', 'NONE', 3, 2, 1),
('IT_204', 'Accounting Principle', 'NONE', 3, 2, 1),
('IT_205', 'Object Oriented Programming', 'IT_202', 3, 2, 2),
('IT_206', 'Computer Organization', 'IT_202', 3, 2, 2),
('IT_207', 'Data Structures and Algorithms', 'IT_202', 3, 2, 2),
('IT_208', 'Data Communication and Networking', 'IT_104', 3, 2, 2),
('IT_301', 'Professional Ethics', 'IT_101', 3, 3, 1),
('IT_302', 'Database Management System', 'IT_205', 3, 3, 1),
('IT_303', 'System Analysis and Design', 'MATH_108', 3, 3, 1),
('IT_304', 'IT Elective I', 'NONE', 3, 3, 1),
('IT_305', 'Free Elective I', 'NONE', 3, 3, 1),
('IT_306', 'Web Development', 'IT_301', 3, 3, 2),
('IT_307', 'Operating System Applications', 'IT_206', 3, 3, 2),
('IT_308', 'Database Management System 2', 'IT_301', 3, 3, 2),
('IT_309', 'Software Engineering', 'IT_303', 3, 3, 2),
('IT_310', 'IT Elective II', 'NONE', 3, 3, 2),
('IT_311', 'Free Elective II', 'NONE', 3, 3, 2),
('IT_401', 'Internship/OJT Practicum', 'NONE', 9, 4, 1),
('IT_402', 'Capstone Project I', 'NONE', 3, 4, 1),
('IT_403', 'Multimedia Systems', 'IT_306', 3, 4, 1),
('IT_404', 'Free Elective III', 'NONE', 3, 4, 1),
('IT_405', 'Capstone Project II', 'IT_402', 3, 4, 2),
('IT_406', 'Network Management', 'IT_206', 3, 4, 2),
('IT_407', 'Seminar and Field Trip', 'NONE', 3, 4, 2),
('IT_408', 'IT Elective III', 'NONE', 3, 4, 2),
('IT_409', 'IT Elective IV', 'NONE', 3, 4, 2),
('MATH_106', 'College Algebria', 'NONE', 3, 1, 1),
('MATH_108', 'Trigonometry', 'MATH_106', 3, 1, 2),
('MATH_112', 'Calculus 1', 'MATH_108', 3, 2, 1),
('MATH_121', 'Probability', 'MATH_106', 3, 3, 1),
('NSTP_101', 'National Service Training Program 1', 'NONE', 3, 1, 1),
('NSTP_102', 'National Service Training Program 2', 'NSTP_101', 3, 1, 2),
('PE_101', 'Fitness and Gymnastics', 'NONE', 2, 1, 1),
('PE_102', 'Rhythm and Dance', 'PE_101', 2, 1, 2),
('PE_103', 'Games and Sports', 'PE_101', 2, 2, 1),
('PE_104', 'Health and Recreation', 'PE_101', 2, 2, 2),
('SCI_101', 'Biological Science', 'NONE', 3, 1, 1),
('SCI_102A', 'General Science with Environmental Science', 'SCI_101', 3, 2, 1),
('SCI_117', 'Basic Electrical and Electronics', 'NONE', 3, 3, 1),
('SCI_135L-1', 'College Physics 1', 'NONE', 4, 2, 2),
('SOCSCI_101', 'General Psychology', 'NONE', 3, 1, 1),
('SOCSCI_103', 'Politics and Governance with Philippine Constitution and Human Rights', 'NONE', 3, 1, 2),
('SOCSCI_104', 'Basic Economics w/ Taxation, Agrarian Reform & Cooperative', 'NONE', 3, 3, 2),
('SOCSCI_105', 'Life and Works of Rizal', 'NONE', 3, 2, 2),
('SOCSCI_106', 'Issues and Problems in Contemporary Society', 'NONE', 3, 3, 2),
('SOCSCI_115', 'Society  & Culture with Family Planning', 'NONE', 3, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `user-id` int(11) NOT NULL,
  `fName` varchar(55) NOT NULL,
  `MI` varchar(1) NOT NULL,
  `lName` varchar(55) NOT NULL,
  `bDay` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `uName` varchar(55) NOT NULL,
  `pWord` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`user-id`, `fName`, `MI`, `lName`, `bDay`, `address`, `uName`, `pWord`) VALUES
(1600076, 'Juan', 'D', 'Cruz', '2019-09-10', 'Villareal, Samar', 'jsalazar29', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `year_lvl`
--

CREATE TABLE `year_lvl` (
  `yr_lvl` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_lvl`
--

INSERT INTO `year_lvl` (`yr_lvl`, `name`) VALUES
(1, 'First Year'),
(2, 'Second Year'),
(3, 'Third Year'),
(4, 'Fourth Year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_code`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`user-id`);

--
-- Indexes for table `year_lvl`
--
ALTER TABLE `year_lvl`
  ADD PRIMARY KEY (`yr_lvl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123457;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=639;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
