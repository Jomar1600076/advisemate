-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 11:33 AM
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
-- Table structure for table `advisers`
--

CREATE TABLE `advisers` (
  `ad_id` int(11) NOT NULL,
  `ad_fname` varchar(55) NOT NULL,
  `ad_mname` varchar(55) NOT NULL,
  `ad_lname` varchar(55) NOT NULL,
  `ad_sex` varchar(7) NOT NULL,
  `ad_address` varchar(100) NOT NULL,
  `ad_bday` date NOT NULL,
  `ad_yrlvl` int(11) NOT NULL,
  `ad_pword` varchar(50) NOT NULL,
  `ad_uname` varchar(55) NOT NULL,
  `ad_college` int(11) NOT NULL,
  `ad_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisers`
--

INSERT INTO `advisers` (`ad_id`, `ad_fname`, `ad_mname`, `ad_lname`, `ad_sex`, `ad_address`, `ad_bday`, `ad_yrlvl`, `ad_pword`, `ad_uname`, `ad_college`, `ad_course`) VALUES
(1000001, 'Maria', 'Lopez', 'Gomez', 'Female', 'Manila, Philippines', '1970-02-19', 2, 'admin', '1000001', 1, 1),
(1000002, 'Ivana', 'Reyes', 'Alawi', 'Female', 'USA', '1993-01-23', 1, '1000002', '1000002', 2, 1),
(1000003, 'Kim', 'N/A', 'Lagonoy', 'Male', 'Tacloban City', '2020-02-11', 2, '1000003', '1000003', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chair`
--

CREATE TABLE `chair` (
  `chair_id` int(11) NOT NULL,
  `chair_fname` varchar(55) NOT NULL,
  `chair_mname` varchar(55) NOT NULL,
  `chair_lname` varchar(55) NOT NULL,
  `chair_bday` date NOT NULL,
  `chair_sex` varchar(7) NOT NULL,
  `chair_add` varchar(50) NOT NULL,
  `chair_uname` varchar(50) NOT NULL,
  `chair_pword` varchar(50) NOT NULL,
  `chair_college` int(2) NOT NULL,
  `chair_course` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chair`
--

INSERT INTO `chair` (`chair_id`, `chair_fname`, `chair_mname`, `chair_lname`, `chair_bday`, `chair_sex`, `chair_add`, `chair_uname`, `chair_pword`, `chair_college`, `chair_course`) VALUES
(123, 'khoho', 'jkhjhjk', 'jhkjhk', '2020-02-07', '789', 'Villareal, Samar', '123', '1213', 1, 1),
(167687, 'Jomar', 'Lababo', 'Salazar', '1998-11-29', 'Male', 'Villareal, Samar', '167687', 'jomar', 1, 1),
(1000001, 'Rommel', 'L', 'Verecio', '1970-02-04', 'Male', 'San Jose', '1000001', '1000001', 1, 1),
(1234567, 'Jason', 'Villarin', 'Lago', '1993-12-29', 'Male', 'Taloban City', '1234567', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `college_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_desc`) VALUES
(1, 'College of Arts and Sciences'),
(2, 'Bachelor in Secondary Education'),
(3, 'Bachelor in Elementary Education'),
(4, 'College of Management and Entrepreneurship');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `college` varchar(100) NOT NULL,
  `course_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `college`, `course_desc`) VALUES
(1, '1', 'Bachelor of Science in Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `cu_id` int(11) NOT NULL,
  `cur_year` year(4) NOT NULL,
  `cur_desc` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`cu_id`, `cur_year`, `cur_desc`) VALUES
(1, 2013, '2013-2017'),
(2, 2018, '2018-Present');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sub_code` varchar(55) NOT NULL,
  `grade` varchar(55) NOT NULL,
  `grade_status` int(2) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `sub_code`, `grade`, `grade_status`, `status`) VALUES
(450, 1600076, 'ENG_101', '2.0', 0, ''),
(451, 1600076, 'ENG_103', '3.0', 0, ''),
(452, 1600076, 'ENG_108', '1.8', 0, ''),
(453, 1600076, 'ENG_112', '1.8', 0, ''),
(454, 1600076, 'ENG_113', '1.7', 0, ''),
(455, 1600076, 'FIL_101', '1.1', 0, ''),
(456, 1600076, 'FIL_102', '2.0', 0, ''),
(457, 1600076, 'HUM_103', 'DROP', 1, ''),
(458, 1600076, 'HUM_104', '1.3', 0, ''),
(459, 1600076, 'HUM_106', '1.9', 0, ''),
(460, 1600076, 'IT_101', '2.5', 0, ''),
(461, 1600076, 'IT_102', '1.2', 0, ''),
(462, 1600076, 'IT_103', '1.1', 0, ''),
(463, 1600076, 'IT_104', '1.7', 0, ''),
(464, 1600076, 'IT_105', '1.8', 0, ''),
(465, 1600076, 'IT_201', '2.3', 0, ''),
(466, 1600076, 'IT_202', '1.8', 0, ''),
(467, 1600076, 'IT_203', '1.2', 0, ''),
(468, 1600076, 'IT_204', '1.6', 0, ''),
(469, 1600076, 'IT_205', '1.5', 0, ''),
(470, 1600076, 'IT_206', '1.2', 0, ''),
(471, 1600076, 'IT_207', '1.6', 0, ''),
(472, 1600076, 'IT_208', '1.2', 0, ''),
(473, 1600076, 'IT_301', '1.8', 0, ''),
(474, 1600076, 'IT_302', '1.8', 0, ''),
(475, 1600076, 'IT_303', '4.0', 0, ''),
(476, 1600076, 'IT_304', '1.7', 0, ''),
(477, 1600076, 'IT_305', '2.4', 0, ''),
(478, 1600076, 'IT_306', 'DRP', 0, ''),
(479, 1600076, 'IT_307', 'INC', 0, ''),
(480, 1600076, 'IT_308', '2.4', 0, ''),
(481, 1600076, 'IT_309', '5.0', 0, ''),
(482, 1600076, 'IT_310', '2.0', 0, ''),
(483, 1600076, 'IT_311', '3.0', 0, ''),
(484, 1600076, 'IT_401', '', 0, ''),
(485, 1600076, 'IT_402', '', 0, ''),
(486, 1600076, 'IT_403', '1.5', 2, ''),
(487, 1600076, 'IT_404', '', 0, ''),
(488, 1600076, 'IT_405', '1.1', 1, ''),
(489, 1600076, 'IT_406', '4.0', 1, ''),
(490, 1600076, 'IT_407', 'INCOMPLETE', 1, ''),
(491, 1600076, 'IT_408', '1.1', 1, ''),
(492, 1600076, 'IT_409', '1.78', 1, ''),
(493, 1600076, 'MATH_106', '1.6', 0, ''),
(494, 1600076, 'MATH_108', '2.4', 0, ''),
(495, 1600076, 'MATH_112', '2.4', 0, ''),
(496, 1600076, 'MATH_121', '2.0', 0, ''),
(497, 1600076, 'NSTP_101', '1.4', 0, ''),
(498, 1600076, 'NSTP_102', '1.3', 0, ''),
(499, 1600076, 'PE_101', '2.2', 0, ''),
(500, 1600076, 'PE_102', '1.3', 0, ''),
(501, 1600076, 'PE_103', '1.3', 0, ''),
(502, 1600076, 'PE_104', '1.1', 0, ''),
(503, 1600076, 'SCI_101', '2.1', 0, ''),
(504, 1600076, 'SCI_102A', '1.2', 0, ''),
(505, 1600076, 'SCI_117', '1.4', 0, ''),
(506, 1600076, 'SCI_135L-1', '2.5', 0, ''),
(507, 1600076, 'SOCSCI_101', '1.8', 0, ''),
(508, 1600076, 'SOCSCI_103', '2.0', 0, ''),
(509, 1600076, 'SOCSCI_104', '1.8', 0, ''),
(510, 1600076, 'SOCSCI_105', '1.5', 0, ''),
(511, 1600076, 'SOCSCI_106', '2.8', 0, ''),
(512, 1600076, 'SOCSCI_115', '4.0', 1, ''),
(513, 1600045, 'ENG_101', '1.8', 0, ''),
(514, 1600045, 'ENG_103', '1.8', 0, ''),
(515, 1600045, 'ENG_108', '1.3', 0, ''),
(516, 1600045, 'ENG_112', '1.3', 0, ''),
(517, 1600045, 'ENG_113', '1.3', 0, ''),
(518, 1600045, 'FIL_101', '2.4', 0, ''),
(519, 1600045, 'FIL_102', '1.5', 0, ''),
(520, 1600045, 'HUM_103', '2.4', 2, ''),
(521, 1600045, 'HUM_104', '2.1', 0, ''),
(522, 1600045, 'HUM_106', '1.5', 0, ''),
(523, 1600045, 'IT_101', '1.5', 0, ''),
(524, 1600045, 'IT_102', '1.9', 0, ''),
(525, 1600045, 'IT_103', '1.8', 0, ''),
(526, 1600045, 'IT_104', '1.7', 0, ''),
(527, 1600045, 'IT_105', '1.4', 0, ''),
(528, 1600045, 'IT_201', '1.9', 0, ''),
(529, 1600045, 'IT_202', '1.4', 0, ''),
(530, 1600045, 'IT_203', '1.8', 0, ''),
(531, 1600045, 'IT_204', '2.0', 0, ''),
(532, 1600045, 'IT_205', '1.3', 0, ''),
(533, 1600045, 'IT_206', '1.9', 0, ''),
(534, 1600045, 'IT_207', '1.8', 0, ''),
(535, 1600045, 'IT_208', '2.2', 0, ''),
(536, 1600045, 'IT_301', '1.3', 0, ''),
(537, 1600045, 'IT_302', '1.7', 0, ''),
(538, 1600045, 'IT_303', '5.0', 0, ''),
(539, 1600045, 'IT_304', '2.5', 0, ''),
(540, 1600045, 'IT_305', '2.4', 0, ''),
(541, 1600045, 'IT_306', 'INC', 0, ''),
(542, 1600045, 'IT_307', '1.8', 0, ''),
(543, 1600045, 'IT_308', '3.0', 0, ''),
(544, 1600045, 'IT_309', '2.4', 0, ''),
(545, 1600045, 'IT_310', '3.0', 0, ''),
(546, 1600045, 'IT_311', 'DRP', 0, ''),
(547, 1600045, 'IT_401', '', 0, ''),
(548, 1600045, 'IT_402', '', 0, ''),
(549, 1600045, 'IT_403', '', 0, ''),
(550, 1600045, 'IT_404', '', 0, ''),
(551, 1600045, 'IT_405', '', 0, ''),
(552, 1600045, 'IT_406', '', 0, ''),
(553, 1600045, 'IT_407', '', 0, ''),
(554, 1600045, 'IT_408', '', 0, ''),
(555, 1600045, 'IT_409', '2.5', 1, ''),
(556, 1600045, 'MATH_106', '2.4', 0, ''),
(557, 1600045, 'MATH_108', '1.3', 0, ''),
(558, 1600045, 'MATH_112', '1.3', 0, ''),
(559, 1600045, 'MATH_121', '1.4', 0, ''),
(560, 1600045, 'NSTP_101', '1.1', 0, ''),
(561, 1600045, 'NSTP_102', '1.8', 0, ''),
(562, 1600045, 'PE_101', '1.2', 0, ''),
(563, 1600045, 'PE_102', '2.0', 0, ''),
(564, 1600045, 'PE_103', '1.3', 0, ''),
(565, 1600045, 'PE_104', '1.3', 0, ''),
(566, 1600045, 'SCI_101', '2.0', 0, ''),
(567, 1600045, 'SCI_102A', '1.2', 0, ''),
(568, 1600045, 'SCI_117', '1.3', 0, ''),
(569, 1600045, 'SCI_135L-1', '2.4', 0, ''),
(570, 1600045, 'SOCSCI_101', '1.3', 0, ''),
(571, 1600045, 'SOCSCI_103', '2.1', 0, ''),
(572, 1600045, 'SOCSCI_104', '2.2', 0, ''),
(573, 1600045, 'SOCSCI_105', '2.0', 0, ''),
(574, 1600045, 'SOCSCI_106', '2.1', 0, ''),
(575, 1600045, 'SOCSCI_115', '', 0, ''),
(576, 1600073, 'ENG_101', '', 0, ''),
(577, 1600073, 'ENG_103', '', 0, ''),
(578, 1600073, 'ENG_108', '', 0, ''),
(579, 1600073, 'ENG_112', '', 0, ''),
(580, 1600073, 'ENG_113', '', 0, ''),
(581, 1600073, 'FIL_101', '', 0, ''),
(582, 1600073, 'FIL_102', '', 0, ''),
(583, 1600073, 'HUM_103', '', 0, ''),
(584, 1600073, 'HUM_104', '', 0, ''),
(585, 1600073, 'HUM_106', '', 0, ''),
(586, 1600073, 'IT_101', '', 0, ''),
(587, 1600073, 'IT_102', '', 0, ''),
(588, 1600073, 'IT_103', '', 0, ''),
(589, 1600073, 'IT_104', '', 0, ''),
(590, 1600073, 'IT_105', '', 0, ''),
(591, 1600073, 'IT_201', '', 0, ''),
(592, 1600073, 'IT_202', '', 0, ''),
(593, 1600073, 'IT_203', '', 0, ''),
(594, 1600073, 'IT_204', '', 0, ''),
(595, 1600073, 'IT_205', '', 0, ''),
(596, 1600073, 'IT_206', '', 0, ''),
(597, 1600073, 'IT_207', '', 0, ''),
(598, 1600073, 'IT_208', '', 0, ''),
(599, 1600073, 'IT_301', '', 0, ''),
(600, 1600073, 'IT_302', '', 0, ''),
(601, 1600073, 'IT_303', '', 0, ''),
(602, 1600073, 'IT_304', '', 0, ''),
(603, 1600073, 'IT_305', '', 0, ''),
(604, 1600073, 'IT_306', '', 0, ''),
(605, 1600073, 'IT_307', '', 0, ''),
(606, 1600073, 'IT_308', '', 0, ''),
(607, 1600073, 'IT_309', '', 0, ''),
(608, 1600073, 'IT_310', '', 0, ''),
(609, 1600073, 'IT_311', '', 0, ''),
(610, 1600073, 'IT_401', '', 0, ''),
(611, 1600073, 'IT_402', '', 0, ''),
(612, 1600073, 'IT_403', '', 0, ''),
(613, 1600073, 'IT_404', '', 0, ''),
(614, 1600073, 'IT_405', '', 0, ''),
(615, 1600073, 'IT_406', '', 0, ''),
(616, 1600073, 'IT_407', '', 0, ''),
(617, 1600073, 'IT_408', '', 0, ''),
(618, 1600073, 'IT_409', '', 0, ''),
(619, 1600073, 'MATH_106', '', 0, ''),
(620, 1600073, 'MATH_108', '', 0, ''),
(621, 1600073, 'MATH_112', '', 0, ''),
(622, 1600073, 'MATH_121', '', 0, ''),
(623, 1600073, 'NSTP_101', '', 0, ''),
(624, 1600073, 'NSTP_102', '', 0, ''),
(625, 1600073, 'PE_101', '', 0, ''),
(626, 1600073, 'PE_102', '', 0, ''),
(627, 1600073, 'PE_103', '', 0, ''),
(628, 1600073, 'PE_104', '', 0, ''),
(629, 1600073, 'SCI_101', '', 0, ''),
(630, 1600073, 'SCI_102A', '', 0, ''),
(631, 1600073, 'SCI_117', '', 0, ''),
(632, 1600073, 'SCI_135L-1', '', 0, ''),
(633, 1600073, 'SOCSCI_101', '1.0', 2, ''),
(634, 1600073, 'SOCSCI_103', '', 0, ''),
(635, 1600073, 'SOCSCI_104', '', 0, ''),
(636, 1600073, 'SOCSCI_105', '', 0, ''),
(637, 1600073, 'SOCSCI_106', '', 0, ''),
(638, 1600073, 'SOCSCI_115', '', 0, ''),
(639, 1600241, 'ENG_101', '', 0, ''),
(640, 1600241, 'ENG_103', '', 0, ''),
(641, 1600241, 'ENG_108', '', 0, ''),
(642, 1600241, 'ENG_112', '', 0, ''),
(643, 1600241, 'ENG_113', '', 0, ''),
(644, 1600241, 'FIL_101', '', 0, ''),
(645, 1600241, 'FIL_102', '', 0, ''),
(646, 1600241, 'HUM_103', '', 0, ''),
(647, 1600241, 'HUM_104', '', 0, ''),
(648, 1600241, 'HUM_106', '', 0, ''),
(649, 1600241, 'IT_101', '', 0, ''),
(650, 1600241, 'IT_102', '', 0, ''),
(651, 1600241, 'IT_103', '', 0, ''),
(652, 1600241, 'IT_104', '', 0, ''),
(653, 1600241, 'IT_105', '', 0, ''),
(654, 1600241, 'IT_201', '', 0, ''),
(655, 1600241, 'IT_202', '', 0, ''),
(656, 1600241, 'IT_203', '', 0, ''),
(657, 1600241, 'IT_204', '', 0, ''),
(658, 1600241, 'IT_205', '', 0, ''),
(659, 1600241, 'IT_206', '', 0, ''),
(660, 1600241, 'IT_207', '', 0, ''),
(661, 1600241, 'IT_208', '', 0, ''),
(662, 1600241, 'IT_301', '', 0, ''),
(663, 1600241, 'IT_302', '', 0, ''),
(664, 1600241, 'IT_303', '', 0, ''),
(665, 1600241, 'IT_304', '', 0, ''),
(666, 1600241, 'IT_305', '', 0, ''),
(667, 1600241, 'IT_306', '', 0, ''),
(668, 1600241, 'IT_307', '', 0, ''),
(669, 1600241, 'IT_308', '', 0, ''),
(670, 1600241, 'IT_309', '', 0, ''),
(671, 1600241, 'IT_310', '', 0, ''),
(672, 1600241, 'IT_311', '', 0, ''),
(673, 1600241, 'IT_401', '', 0, ''),
(674, 1600241, 'IT_402', '', 0, ''),
(675, 1600241, 'IT_403', '', 0, ''),
(676, 1600241, 'IT_404', '', 0, ''),
(677, 1600241, 'IT_405', '', 0, ''),
(678, 1600241, 'IT_406', '', 0, ''),
(679, 1600241, 'IT_407', '', 0, ''),
(680, 1600241, 'IT_408', '', 0, ''),
(681, 1600241, 'IT_409', '', 0, ''),
(682, 1600241, 'MATH_106', '', 0, ''),
(683, 1600241, 'MATH_108', '', 0, ''),
(684, 1600241, 'MATH_112', '', 0, ''),
(685, 1600241, 'MATH_121', '', 0, ''),
(686, 1600241, 'NSTP_101', '', 0, ''),
(687, 1600241, 'NSTP_102', '', 0, ''),
(688, 1600241, 'PE_101', '', 0, ''),
(689, 1600241, 'PE_102', '', 0, ''),
(690, 1600241, 'PE_103', '', 0, ''),
(691, 1600241, 'PE_104', '', 0, ''),
(692, 1600241, 'SCI_101', '', 0, ''),
(693, 1600241, 'SCI_102A', '', 0, ''),
(694, 1600241, 'SCI_117', '', 0, ''),
(695, 1600241, 'SCI_135L-1', '', 0, ''),
(696, 1600241, 'SOCSCI_101', '', 0, ''),
(697, 1600241, 'SOCSCI_103', '', 0, ''),
(698, 1600241, 'SOCSCI_104', '', 0, ''),
(699, 1600241, 'SOCSCI_105', '', 0, ''),
(700, 1600241, 'SOCSCI_106', '', 0, ''),
(701, 1600241, 'SOCSCI_115', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sem`
--

CREATE TABLE `sem` (
  `id` int(11) NOT NULL,
  `sem_desc` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem`
--

INSERT INTO `sem` (`id`, `sem_desc`) VALUES
(1, 'Fisrt Semester'),
(2, 'Second Semester');

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
  `year_lvl` int(11) NOT NULL,
  `student_course` int(2) NOT NULL,
  `student_college` int(11) NOT NULL,
  `bday` date NOT NULL,
  `sex` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `fname`, `mname`, `lname`, `pword`, `year_started`, `year_lvl`, `student_course`, `student_college`, `bday`, `sex`, `address`) VALUES
(1600045, 'Jason', 'Villarin', 'Lago', '1600045', '2016-00-05', 3, 1, 1, '0000-00-00', 'Male', 'Taloban City'),
(1600073, 'Mary Joy', 'Segura', 'Nabartey', '1600073', '2016-00-05', 1, 1, 1, '0000-00-00', '', ''),
(1600076, 'Jomar', 'Lababo', 'Salazar', '1600076', '2016-00-05', 3, 1, 1, '1998-11-29', 'Male', 'Villareal, Samar'),
(1600241, 'Joseph', 'Omega', 'Raagas', '1600241', '2020-02-18', 4, 1, 1, '2020-02-22', 'Male', 'Tacloban City');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(11) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `sub_desc` varchar(255) NOT NULL,
  `sub_prereq` varchar(20) NOT NULL,
  `sub_unit` int(2) NOT NULL,
  `sub_year` int(2) NOT NULL,
  `sub_sem` int(2) NOT NULL,
  `sub_cur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_code`, `sub_desc`, `sub_prereq`, `sub_unit`, `sub_year`, `sub_sem`, `sub_cur`) VALUES
(1, 'SOCSCI_115', 'Society  & Culture with Family Planning', 'NONE', 3, 4, 2, 1),
(2, 'IT_105', 'Programming I', 'IT_102', 3, 1, 2, 1),
(3, 'IT_201', 'Discrete Structures', 'MATH_106', 3, 2, 1, 1),
(4, 'IT_202', 'Programming II', 'IT_105', 3, 2, 1, 1),
(5, 'IT_203', 'Quality Consciousness Habit and Processes', 'NONE', 3, 2, 1, 1),
(6, 'IT_204', 'Accounting Principle', 'NONE', 3, 2, 1, 1),
(7, 'IT_205', 'Object Oriented Programming', 'IT_202', 3, 2, 2, 1),
(8, 'IT_206', 'Computer Organization', 'IT_202', 3, 2, 2, 1),
(9, 'IT_207', 'Data Structures and Algorithms', 'IT_202', 3, 2, 2, 1),
(10, 'IT_208', 'Data Communication and Networking', 'IT_104', 3, 2, 2, 1),
(11, 'IT_301', 'Professional Ethics', 'IT_101', 3, 3, 1, 1),
(12, 'SCI_101', 'Biological Science', 'NONE', 3, 1, 1, 1),
(13, 'NSTP_101', 'National Service Training Program 1', 'NONE', 3, 1, 1, 1),
(14, 'MATH_121', 'Probability', 'MATH_106', 3, 3, 1, 1),
(15, 'MATH_112', 'Calculus 1', 'MATH_108', 3, 2, 1, 1),
(16, 'MATH_108', 'Trigonometry', 'MATH_106', 3, 1, 2, 1),
(17, 'MATH_106', 'College Algebria', 'NONE', 3, 1, 1, 1),
(18, 'IT_409', 'IT Elective IV', 'NONE', 3, 4, 2, 1),
(19, 'IT_408', 'IT Elective III', 'NONE', 3, 4, 2, 1),
(20, 'IT_407', 'Seminar and Field Trip', 'NONE', 3, 4, 2, 1),
(21, 'IT_406', 'Network Management', 'IT_206', 3, 4, 2, 1),
(22, 'IT_405', 'Capstone Project II', 'IT_402', 3, 4, 2, 1),
(23, 'NSTP_102', 'National Service Training Program 2', 'NSTP_101', 3, 1, 2, 1),
(24, 'SOCSCI_106', 'Issues and Problems in Contemporary Society', 'NONE', 3, 3, 2, 1),
(25, 'PE_104', 'Health and Recreation', 'PE_101', 2, 2, 2, 1),
(26, 'PE_103', 'Games and Sports', 'PE_101', 2, 2, 1, 1),
(27, 'PE_102', 'Rhythm and Dance', 'PE_101', 2, 1, 2, 1),
(28, 'PE_101', 'Fitness and Gymnastics', 'NONE', 2, 1, 1, 1),
(29, 'SCI_102A', 'General Science with Environmental Science', 'SCI_101', 3, 2, 1, 1),
(30, 'SCI_117', 'Basic Electrical and Electronics', 'NONE', 3, 3, 1, 1),
(31, 'SCI_135L-1', 'College Physics 1', 'NONE', 4, 2, 2, 1),
(32, 'SOCSCI_101', 'General Psychology', 'NONE', 3, 1, 1, 1),
(33, 'SOCSCI_103', 'Politics and Governance with Philippine Constitution and Human Rights', 'NONE', 3, 1, 2, 1),
(34, 'SOCSCI_104', 'Basic Economics w/ Taxation, Agrarian Reform & Cooperative', 'NONE', 3, 3, 2, 1),
(35, 'SOCSCI_105', 'Life and Works of Rizal', 'NONE', 3, 2, 2, 1),
(36, 'IT_404', 'Free Elective III', 'NONE', 3, 4, 1, 1),
(37, 'IT_403', 'Multimedia Systems', 'IT_306', 3, 4, 1, 1),
(38, 'IT_402', 'Capstone Project I', 'NONE', 3, 4, 1, 1),
(39, 'IT_103', 'Computer Hardware, Repair and Maintenance', 'IT_101', 3, 1, 2, 1),
(40, 'IT_102', 'Program Logic Formulation', 'NONE', 3, 1, 1, 1),
(41, 'IT_101', 'Information Technology Fundamentals w/Software Applicatino', 'NONE', 3, 1, 1, 1),
(42, 'HUM_106', 'Appreciation of Music and Various Arts', 'NONE', 3, 2, 1, 1),
(43, 'HUM_104', 'Appreciation of Visual Arts', 'NONE', 3, 2, 2, 1),
(44, 'HUM_103', 'Art Appreciation', 'NONE', 3, 4, 2, 1),
(45, 'FIL_102', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 'FIL_101', 3, 1, 2, 1),
(46, 'FIL_101', 'Komunikasyon sa Akademikong Filipino', 'NONE', 3, 1, 1, 1),
(47, 'ENG_113', 'Introduction to Mass Communication and Information Technology', 'ENG_101', 3, 1, 2, 1),
(48, 'ENG_112', 'Technical Writing & Reporting', 'NONE', 3, 3, 1, 1),
(49, 'ENG_108', 'Oral Communication', 'NONE', 3, 2, 2, 1),
(50, 'IT_104', 'Networking Basic', 'IT_101', 3, 1, 2, 1),
(51, 'ENG_101', 'Communication Arts', 'NONE', 3, 1, 1, 1),
(52, 'IT_401', 'Internship/OJT Practicum', 'NONE', 9, 4, 1, 1),
(53, 'IT_311', 'Free Elective II', 'NONE', 3, 3, 2, 1),
(54, 'IT_310', 'IT Elective II', 'NONE', 3, 3, 2, 1),
(55, 'IT_309', 'Software Engineering', 'IT_303', 3, 3, 2, 1),
(56, 'IT_308', 'Database Management System 2', 'IT_301', 3, 3, 2, 1),
(57, 'IT_307', 'Operating System Applications', 'IT_206', 3, 3, 2, 1),
(58, 'IT_306', 'Web Development', 'IT_301', 3, 3, 2, 1),
(59, 'IT_305', 'Free Elective I', 'NONE', 3, 3, 1, 1),
(60, 'IT_304', 'IT Elective I', 'NONE', 3, 3, 1, 1),
(61, 'IT_303', 'System Analysis and Design', 'MATH_108', 3, 3, 1, 1),
(62, 'IT_302', 'Database Management System', 'IT_205', 3, 3, 1, 1),
(63, 'ENG_103', 'Writing in the Discipline', 'NONE', 3, 2, 1, 1),
(69, 'GE 101', 'Understanding the Self', 'NONE', 3, 1, 1, 2),
(72, 'GE 102', 'Readings in Philippine History', 'NONE', 3, 1, 1, 2),
(73, 'GE 122', 'Kontekstwalisadong Komunikasyon sa Filipino (KOMFIL)', 'NONE', 3, 1, 1, 2),
(74, 'NSTP 101', 'National Service Training Program 1', 'NONE', 3, 1, 1, 2),
(75, 'PE 101', 'Movement Enhancement', 'NONE', 2, 1, 1, 2),
(76, 'IT 101', 'Information Technology Fundamentals with Software Applications', 'NONE', 2, 1, 1, 2),
(77, 'IT 101 L', 'Information Technology Fundamentals with Software Applications (Laboratory)', 'NONE', 1, 1, 1, 2),
(78, 'IT 102', 'Accounting Principle', 'NONE', 3, 1, 1, 2),
(79, 'IT 103', 'Computer Programming 1 Java', 'NONE', 2, 1, 1, 2),
(80, 'IT 103 L', 'Computer Programming 1 Java (Laboratory)', 'NONE', 1, 1, 1, 2),
(81, 'IT 104', 'Discrete Mathematics', 'NONE', 3, 1, 1, 2),
(82, 'Ge 103', 'The Contemporary World', 'NONE', 3, 1, 2, 2),
(83, 'Ge 104', 'Mathematics in the Modern World', 'NONE', 3, 1, 2, 2),
(84, 'Ge 105', 'Purposive Communication', 'NONE', 3, 1, 2, 2),
(85, 'NSTP 102', 'National Service Training Program 2', 'NSTP 101', 3, 1, 2, 2),
(86, 'PE 102', 'Fitness Exercises', 'NONE', 2, 1, 2, 2),
(87, 'IT 105', 'Mobile Development', 'IT 103', 2, 1, 2, 2),
(88, 'IT 105 L', 'Mobile Development (Laboratory)', 'IT 103 L', 1, 1, 2, 2),
(89, 'IT 106', 'Introduction to Computing Computer Organization', 'NONE', 3, 1, 2, 2),
(90, 'IT 107', 'Multimedia Systems', 'NONE', 2, 1, 2, 2),
(91, 'IT 107 L', 'Multimedia Systems (Laboratory)', 'NONE', 1, 1, 2, 2),
(92, 'IT 108', 'Programming II - Java', 'IT 103', 2, 1, 2, 2),
(93, 'IT 108 L', 'Programming II - Java (Laboratory)', 'IT 103 L', 1, 1, 2, 2),
(94, 'GE 113', 'Living in the IT Era', 'NONE', 3, 2, 1, 2),
(95, 'PE 103', 'Physical Activities towards Health & Fitness I', 'NONE', 2, 2, 1, 2),
(96, 'IT 109', 'IT Elective I - Platform Technologies', 'IT 108', 2, 2, 1, 2),
(97, 'IT 109 L', 'IT Elective I - Platform Technologies (Laboratory)', 'IT 108 L', 1, 2, 1, 2),
(98, 'IT 110', 'Data Structure and Algorithms', 'IT 108 ', 3, 2, 1, 2),
(99, 'IT 111', 'Fundamentals of Database Systems', 'IT 107', 2, 2, 1, 2),
(100, 'IT 111 L', 'Fundamentals of Database Systems (Laboratory)', 'IT 107 L', 1, 2, 1, 2),
(101, 'IT 112', 'Integrative Programming and Technologies', 'IT 107', 2, 2, 1, 2),
(102, 'IT 112 L', 'Integrative Programming and Technologies (Laboratory)', 'IT 107 L', 1, 2, 1, 2),
(103, 'IT 113', 'CISCO I - Network Fundamentals', 'NONE', 2, 2, 1, 2),
(104, 'IT 113 L', 'CISCO I - Network Fundamentals (Laboratory)', 'NONE', 1, 2, 1, 2),
(105, 'GE 107', 'Science, Technology & Society', 'NONE', 3, 2, 2, 2),
(106, 'GE 106', 'Art Appreciation', 'NONE', 3, 2, 2, 2),
(107, 'GE 125', 'Sosyedad at Literatura', 'Fil 111', 3, 2, 2, 2),
(108, 'PE 104', 'Physical Activities towards Health & Fitness II', 'NONE', 2, 2, 2, 2),
(109, 'IT 114', 'IT Elective II - Object Oriented Programming', 'IT 108', 2, 2, 2, 2),
(110, 'IT 114 L', 'IT Elective II - Object Oriented Programming (Laboratory)', 'IT 108 L', 1, 2, 2, 2),
(111, 'IT 115', 'Introduction to Human Computer Interaction', 'IT 107, IT 104', 3, 2, 2, 2),
(112, 'IT 116', 'CISCO II - Routing and Switching Essentials ', 'IT 113', 2, 2, 2, 2),
(113, 'IT 116 L', 'CISCO II - Routing and Switching Essentials (Laboratory)', 'IT 113 L', 1, 2, 2, 2),
(114, 'IT 117', 'Systems Integration and Achitecture I (Laboratory)', 'IT 112', 2, 2, 2, 2),
(115, 'IT 117 L', 'Systems Integration and Achitecture I (Laboratory)', 'IT 112 L', 1, 2, 2, 2),
(116, 'GE 117', 'The Entrepreneurial Mind', 'NONE', 3, 3, 1, 2),
(117, 'GE 126', 'Sinesosyedad/Pelikulang Panlipunan', 'Fil 114', 3, 3, 1, 2),
(118, 'IT 118', 'IT Elective III - Integrative Programming Technologies II', 'IT 117', 2, 3, 1, 2),
(119, 'IT 118 L', 'IT Elective III - Integrative Programming Technologies II (Laboratory)', 'IT 117 L', 1, 3, 1, 2),
(120, 'IT 119', 'IT Elective IV - Web Systems and Technologies ', 'IT 117', 2, 3, 1, 2),
(121, 'IT 119 L', 'IT Elective IV - Web Systems and Technologies (Laboratory)', 'IT 117 L', 1, 3, 1, 2),
(122, 'IT 120', 'Geographic Information Systems', 'NONE', 2, 3, 1, 2),
(123, 'IT 120 L', 'Geographic Information Systems (Laboratory)', 'NONE', 1, 3, 1, 2),
(124, 'IT 121', 'Information Management I', 'IT 108', 2, 3, 1, 2),
(125, 'IT 121 L', 'Information Management I (Laboratory)', 'IT 108 L', 1, 3, 1, 2),
(126, 'IT 122', 'Systems Analysis and Design', 'NONE', 2, 3, 1, 2),
(127, 'IT 122 L', 'Systems Analysis and Design (Laboratory)', 'NONE', 1, 3, 1, 2),
(128, 'GE 108', 'Ethics', 'NONE', 3, 3, 2, 2),
(129, 'IT 123', 'IT Elective V - System Integration & Architecture II', 'IT 117', 2, 3, 2, 2),
(130, 'IT 123 L', 'IT Elective V - System Integration & Architecture II (Laboratory)', 'IT 117', 1, 3, 2, 2),
(131, 'IT 124', 'Quantitative Methods with Simulations and Modeling', 'IT 107', 2, 3, 2, 2),
(132, 'IT 124 L', 'Quantitative Methods with Simulations and Modeling (Laboratory)', 'IT 107 L', 1, 3, 2, 2),
(133, 'IT 125', 'Information Assurance & Security I', 'IT 117', 2, 3, 2, 2),
(134, 'IT 125 L', 'Information Assurance & Security I (Laboratory)', 'IT 117 L', 1, 3, 2, 2),
(135, 'IT 126', 'Social and Professional Issues', 'NONE', 3, 3, 2, 2),
(136, 'IT 127', 'Application Development and Emerging Technologies', 'IT 111', 2, 3, 2, 2),
(137, 'IT 127 L', 'Application Development and Emerging Technologies (Laboratory)', 'IT 111 L', 1, 3, 2, 2),
(138, 'IT 128', 'Capstone Project I', 'All subjects from fi', 2, 3, 2, 2),
(139, 'IT 128 L', 'Capstone Project I (Laboratory)', 'All subjects from fi', 1, 3, 2, 2),
(140, 'GE 119', 'Philippine Popular Culture', 'NONE', 3, 3, 3, 2),
(149, 'IT 129', 'System Administration and Maintenance', 'IT 107', 2, 3, 3, 0),
(150, 'IT 129', 'System Administration and Maintenance (Laboratory)', 'IT 107 L', 1, 3, 3, 0),
(154, 'IT 130', 'Computer Hardware Repair and Maintenance', 'NONE', 2, 4, 1, 2),
(155, 'IT 130 L', 'Computer Hardware Repair and Maintenance (Laboratory)', 'NONE', 1, 4, 1, 2),
(156, 'IT 131', 'Seminars and Fieldtrip', 'NONE', 3, 4, 1, 2),
(157, 'IT 132', 'Information Assurance and Security II', 'IT 125', 2, 4, 1, 2),
(158, 'IT 132 L', 'Information Assurance and Security II (Laboratory)', 'IT 125 L', 1, 4, 1, 2),
(159, 'IT 133', 'Capstone Project 2', 'IT 128', 2, 4, 1, 2),
(160, 'IT 133 L', 'Capstone Project 2 (Laboratory)', 'IT 128 L', 1, 4, 1, 2),
(161, 'IT 134', 'Practicum - 486hrs', 'NONE', 6, 4, 2, 2);

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
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `login_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_ip` varchar(55) NOT NULL,
  `u_action` varchar(55) NOT NULL,
  `date_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`login_id`, `u_id`, `u_ip`, `u_action`, `date_login`) VALUES
(7, 123, '0', 'Login', '2020-02-10 03:47:13'),
(8, 123, '0', 'Login', '2020-02-10 03:50:39'),
(9, 123, '0', 'Logout', '2020-02-10 03:51:32'),
(10, 123, '0', 'Logout', '2020-02-10 03:52:31'),
(11, 123, '0', 'Login', '2020-02-10 03:52:42'),
(12, 123, '0', 'Logout', '2020-02-10 03:52:50'),
(13, 123, '::1', 'Login', '2020-02-10 08:07:09'),
(14, 123, '::1', 'Logout', '2020-02-10 08:44:13'),
(15, 123, '::1', 'Login', '2020-02-10 08:44:17'),
(16, 123, '::1', 'Logout', '2020-02-10 08:44:19'),
(17, 123, '::1', 'Login', '2020-02-10 08:44:21'),
(18, 123, '::1', 'Logout', '2020-02-10 08:44:48'),
(19, 123, '::1', 'Login', '2020-02-10 08:44:50'),
(20, 123, '::1', 'Logout', '2020-02-10 08:44:52'),
(21, 123, '::1', 'Login', '2020-02-10 08:44:53'),
(22, 123, '::1', 'Logout', '2020-02-11 04:53:41'),
(23, 1000001, '::1', 'Login', '2020-02-11 04:53:47'),
(24, 1000001, '::1', 'Logout', '2020-02-18 09:20:44'),
(25, 123, '::1', 'Login', '2020-02-18 09:20:51'),
(26, 123, '::1', 'Logout', '2020-02-18 11:12:14'),
(27, 123, '::1', 'Login', '2020-02-18 11:12:16'),
(28, 123, '::1', 'Logout', '2020-02-18 11:20:13'),
(29, 123, '::1', 'Login', '2020-02-18 11:20:16'),
(30, 123, '::1', 'Login', '2020-02-18 11:51:16'),
(31, 123, '::1', 'Logout', '2020-02-18 17:32:23'),
(32, 123, '::1', 'Login', '2020-02-20 09:27:12'),
(33, 123, '::1', 'Login', '2020-02-25 05:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `year_lvl`
--

CREATE TABLE `year_lvl` (
  `yr_lvl` int(11) NOT NULL,
  `yrlvl_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_lvl`
--

INSERT INTO `year_lvl` (`yr_lvl`, `yrlvl_name`) VALUES
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
-- Indexes for table `advisers`
--
ALTER TABLE `advisers`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `chair`
--
ALTER TABLE `chair`
  ADD PRIMARY KEY (`chair_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sem`
--
ALTER TABLE `sem`
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
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`user-id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`login_id`);

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
-- AUTO_INCREMENT for table `advisers`
--
ALTER TABLE `advisers`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000004;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=702;

--
-- AUTO_INCREMENT for table `sem`
--
ALTER TABLE `sem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
