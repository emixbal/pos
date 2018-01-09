-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2017 at 01:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unggul_pos`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `jam_now` ()  begin
select now() as jam_sekarang;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `abal`
--

CREATE TABLE `abal` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qty` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abal`
--

INSERT INTO `abal` (`id`, `name`, `date_created`, `qty`) VALUES
(501, 'olhmriex', '2016-08-15 00:00:00', 57),
(502, 'qxlxtdze', '2016-08-16 00:00:00', 72),
(503, 'ougcfvsg', '2016-08-17 00:00:00', 94),
(504, 'svjdojvn', '2016-08-18 00:00:00', 53),
(505, 'tzyrciub', '2016-08-19 00:00:00', 90),
(506, 'zefmirws', '2016-08-20 00:00:00', 1),
(507, 'pralxyot', '2016-08-21 00:00:00', 17),
(508, 'crpenwyd', '2016-08-22 00:00:00', 9),
(509, 'elgqppxj', '2016-08-23 00:00:00', 3),
(510, 'srccbkan', '2016-08-24 00:00:00', 14),
(511, 'bczodfib', '2016-08-25 00:00:00', 85),
(512, 'qafjkzzy', '2016-08-26 00:00:00', 13),
(513, 'ofqwwlci', '2016-08-27 00:00:00', 92),
(514, 'swjivbcm', '2016-08-28 00:00:00', 30),
(515, 'pdebjmxi', '2016-08-29 00:00:00', 97),
(516, 'sljkaspd', '2016-08-30 00:00:00', 80),
(517, 'dlfvlguh', '2016-08-31 00:00:00', 96),
(518, 'sgmyyrtd', '2016-09-01 00:00:00', 15),
(519, 'gaqhgdqi', '2016-09-02 00:00:00', 87),
(520, 'epjyezpf', '2016-09-03 00:00:00', 34),
(521, 'xpvoeckd', '2016-09-04 00:00:00', 61),
(522, 'qwbedcts', '2016-09-05 00:00:00', 57),
(523, 'csglerwk', '2016-09-06 00:00:00', 98),
(524, 'dslwgetk', '2016-09-07 00:00:00', 47),
(525, 'yjxmhkfw', '2016-09-08 00:00:00', 56),
(526, 'cswmeztx', '2016-09-09 00:00:00', 40),
(527, 'rxqajzwj', '2016-09-10 00:00:00', 43),
(528, 'luxagtpf', '2016-09-11 00:00:00', 18),
(529, 'gwpkfmmi', '2016-09-12 00:00:00', 96),
(530, 'bqemgvwo', '2016-09-13 00:00:00', 65),
(531, 'awemqibh', '2016-09-14 00:00:00', 35),
(532, 'nyvjxzci', '2016-09-15 00:00:00', 48),
(533, 'mwagxnhb', '2016-09-16 00:00:00', 29),
(534, 'gqswgqwm', '2016-09-17 00:00:00', 86),
(535, 'buvisgoe', '2016-09-18 00:00:00', 7),
(536, 'oayvhtqy', '2016-09-19 00:00:00', 3),
(537, 'zjytcaqo', '2016-09-20 00:00:00', 3),
(538, 'ustwvhsw', '2016-09-21 00:00:00', 60),
(539, 'bgiemslu', '2016-09-22 00:00:00', 82),
(540, 'syxotsqa', '2016-09-23 00:00:00', 84),
(541, 'kgtdelxq', '2016-09-24 00:00:00', 75),
(542, 'qunyerpk', '2016-09-25 00:00:00', 82),
(543, 'rmfyvzws', '2016-09-26 00:00:00', 96),
(544, 'cpzxdgek', '2016-09-27 00:00:00', 10),
(545, 'uykiltzw', '2016-09-28 00:00:00', 37),
(546, 'toyzfdde', '2016-09-29 00:00:00', 38),
(547, 'ofumavgz', '2016-09-30 00:00:00', 76),
(548, 'vmptsuxj', '2016-10-01 00:00:00', 40),
(549, 'ggyvnqmw', '2016-10-02 00:00:00', 7),
(550, 'oedaxlji', '2016-10-03 00:00:00', 69),
(551, 'yjnzocwd', '2016-10-04 00:00:00', 59),
(552, 'pyrubkob', '2016-10-05 00:00:00', 90),
(553, 'qraiekyu', '2016-10-06 00:00:00', 79),
(554, 'tmqwygvx', '2016-10-07 00:00:00', 64),
(555, 'wddpkzyx', '2016-10-08 00:00:00', 29),
(556, 'hwihfsbq', '2016-10-09 00:00:00', 32),
(557, 'jgscrlzr', '2016-10-10 00:00:00', 34),
(558, 'aprnemgm', '2016-10-11 00:00:00', 76),
(559, 'spbxvvcg', '2016-10-12 00:00:00', 73),
(560, 'bepoptnu', '2016-10-13 00:00:00', 15),
(561, 'usjhwyec', '2016-10-14 00:00:00', 19),
(562, 'azqveumc', '2016-10-15 00:00:00', 20),
(563, 'crthzfau', '2016-10-16 00:00:00', 60),
(564, 'sijduzvf', '2016-10-17 00:00:00', 64),
(565, 'thkxfdaq', '2016-10-18 00:00:00', 63),
(566, 'ujwjtofe', '2016-10-19 00:00:00', 76),
(567, 'dapcasrj', '2016-10-20 00:00:00', 24),
(568, 'yicoyxmj', '2016-10-21 00:00:00', 37),
(569, 'nhlxxftm', '2016-10-22 00:00:00', 76),
(570, 'bibsitcx', '2016-10-23 00:00:00', 20),
(571, 'etuzkwuk', '2016-10-24 00:00:00', 42),
(572, 'faejugec', '2016-10-25 00:00:00', 68),
(573, 'mfdvtghp', '2016-10-26 00:00:00', 14),
(574, 'qgtpoawp', '2016-10-27 00:00:00', 42),
(575, 'szwuliib', '2016-10-28 00:00:00', 38),
(576, 'gtkxigam', '2016-10-29 00:00:00', 56),
(577, 'ixjzeqqh', '2016-10-30 00:00:00', 89),
(578, 'vwhfpboh', '2016-10-31 00:00:00', 6),
(579, 'gqexbznf', '2016-11-01 00:00:00', 47),
(580, 'ldbcakrg', '2016-11-02 00:00:00', 23),
(581, 'zrcxgign', '2016-11-03 00:00:00', 76),
(582, 'lvyrdimv', '2016-11-04 00:00:00', 9),
(583, 'xsxqawbc', '2016-11-05 00:00:00', 84),
(584, 'yhzofcqn', '2016-11-06 00:00:00', 3),
(585, 'cqwfmywx', '2016-11-07 00:00:00', 74),
(586, 'rijbvcca', '2016-11-08 00:00:00', 43),
(587, 'hpxclujc', '2016-11-09 00:00:00', 27),
(588, 'xditwjwo', '2016-11-10 00:00:00', 57),
(589, 'pqktmvpg', '2016-11-11 00:00:00', 72),
(590, 'bwmcnhqf', '2016-11-12 00:00:00', 75),
(591, 'xxdcsmfn', '2016-11-13 00:00:00', 94),
(592, 'dowaubqz', '2016-11-14 00:00:00', 34),
(593, 'zfvdbhrq', '2016-11-15 00:00:00', 57),
(594, 'ootzwmvh', '2016-11-16 00:00:00', 69),
(595, 'ofcflwzm', '2016-11-17 00:00:00', 89),
(596, 'hdxdngxq', '2016-11-18 00:00:00', 80),
(597, 'argtbyuz', '2016-11-19 00:00:00', 19),
(598, 'qcysufhw', '2016-11-20 00:00:00', 87),
(599, 'siiezdpd', '2016-11-21 00:00:00', 5),
(600, 'ubintngv', '2016-11-22 00:00:00', 15),
(601, 'irbnavri', '2016-11-23 00:00:00', 7),
(602, 'mioyevna', '2016-11-24 00:00:00', 84),
(603, 'wjaemzkl', '2016-11-25 00:00:00', 29),
(604, 'zblvtsfs', '2016-11-26 00:00:00', 16),
(605, 'kacdzwcb', '2016-11-27 00:00:00', 30),
(606, 'vpzyrknw', '2016-11-28 00:00:00', 96),
(607, 'mclnahmv', '2016-11-29 00:00:00', 50),
(608, 'ivfgsymw', '2016-11-30 00:00:00', 59),
(609, 'emfntmyd', '2016-12-01 00:00:00', 50),
(610, 'ulyfrccq', '2016-12-02 00:00:00', 43),
(611, 'pdhrjcgk', '2016-12-03 00:00:00', 35),
(612, 'orqjwxsv', '2016-12-04 00:00:00', 65),
(613, 'yehztsfq', '2016-12-05 00:00:00', 42),
(614, 'saogwuyt', '2016-12-06 00:00:00', 23),
(615, 'kwjsystd', '2016-12-07 00:00:00', 36),
(616, 'lmsewcjv', '2016-12-08 00:00:00', 57),
(617, 'sogjtyng', '2016-12-09 00:00:00', 38),
(618, 'rhdnifsu', '2016-12-10 00:00:00', 10),
(619, 'zmujqizo', '2016-12-11 00:00:00', 71),
(620, 'oliwhsky', '2016-12-12 00:00:00', 60),
(621, 'wyxyseik', '2016-12-13 00:00:00', 10),
(622, 'hqhfvfoa', '2016-12-14 00:00:00', 41),
(623, 'zftwbjvl', '2016-12-15 00:00:00', 65),
(624, 'xzadbtlp', '2016-12-16 00:00:00', 75),
(625, 'bkcmgwbv', '2016-12-17 00:00:00', 25),
(626, 'nliqxyvk', '2016-12-18 00:00:00', 27),
(627, 'dczsfixb', '2016-12-19 00:00:00', 14),
(628, 'mlthhqqy', '2016-12-20 00:00:00', 12),
(629, 'uawsgyxt', '2016-12-21 00:00:00', 9),
(630, 'zicphzjy', '2016-12-22 00:00:00', 16),
(631, 'cftujnre', '2016-12-23 00:00:00', 71),
(632, 'zknaywyp', '2016-12-24 00:00:00', 97),
(633, 'xjepxwsa', '2016-12-25 00:00:00', 87),
(634, 'tbkrhztv', '2016-12-26 00:00:00', 14),
(635, 'agcnzjte', '2016-12-27 00:00:00', 49),
(636, 'fgkmpnvj', '2016-12-28 00:00:00', 67),
(637, 'xdlmzffj', '2016-12-29 00:00:00', 6),
(638, 'xrznpesx', '2016-12-30 00:00:00', 87),
(639, 'spmvdotg', '2016-12-31 00:00:00', 76),
(640, 'gpufscxb', '2017-01-01 00:00:00', 37),
(641, 'otnzjegc', '2017-01-02 00:00:00', 48),
(642, 'dirqbyet', '2017-01-03 00:00:00', 21),
(643, 'ckjwtjmh', '2017-01-04 00:00:00', 5),
(644, 'cokjuysg', '2017-01-05 00:00:00', 8),
(645, 'yluqchri', '2017-01-06 00:00:00', 36),
(646, 'xgmibldq', '2017-01-07 00:00:00', 5),
(647, 'eldstzzg', '2017-01-08 00:00:00', 61),
(648, 'sesgvkie', '2017-01-09 00:00:00', 25),
(649, 'ykjzphcx', '2017-01-10 00:00:00', 83),
(650, 'rtsaimzf', '2017-01-11 00:00:00', 95),
(651, 'fpyujggi', '2017-01-12 00:00:00', 69),
(652, 'xiiqozwf', '2017-01-13 00:00:00', 56),
(653, 'dwspadel', '2017-01-14 00:00:00', 16),
(654, 'bybctaho', '2017-01-15 00:00:00', 52),
(655, 'zbvxyjdk', '2017-01-16 00:00:00', 98),
(656, 'ocqsoyzv', '2017-01-17 00:00:00', 49),
(657, 'auftwoee', '2017-01-18 00:00:00', 82),
(658, 'oiknyjrt', '2017-01-19 00:00:00', 3),
(659, 'ashpcvks', '2017-01-20 00:00:00', 49),
(660, 'qtwamkjj', '2017-01-21 00:00:00', 75),
(661, 'ztxhrfkp', '2017-01-22 00:00:00', 68),
(662, 'jtkzwpjl', '2017-01-23 00:00:00', 46),
(663, 'avfvlenw', '2017-01-24 00:00:00', 3),
(664, 'esvaprfx', '2017-01-25 00:00:00', 10),
(665, 'hjazzuik', '2017-01-26 00:00:00', 72),
(666, 'fxoyeilh', '2017-01-27 00:00:00', 57),
(667, 'mxqpswrc', '2017-01-28 00:00:00', 5),
(668, 'jlzptmca', '2017-01-29 00:00:00', 36),
(669, 'xtszraeu', '2017-01-30 00:00:00', 37),
(670, 'guvabsxw', '2017-01-31 00:00:00', 27),
(671, 'fdapzmen', '2017-02-01 00:00:00', 3),
(672, 'iqwokxzh', '2017-02-02 00:00:00', 68),
(673, 'rbkgwfrz', '2017-02-03 00:00:00', 39),
(674, 'evbwftrj', '2017-02-04 00:00:00', 58),
(675, 'nkjsracv', '2017-02-05 00:00:00', 85),
(676, 'jqgotvyl', '2017-02-06 00:00:00', 20),
(677, 'kztjxpmf', '2017-02-07 00:00:00', 90),
(678, 'uzwqmnbd', '2017-02-08 00:00:00', 12),
(679, 'wepnkjrj', '2017-02-09 00:00:00', 25),
(680, 'ughoyyla', '2017-02-10 00:00:00', 57),
(681, 'dfpqsoef', '2017-02-11 00:00:00', 65),
(682, 'gmrzlkys', '2017-02-12 00:00:00', 5),
(683, 'qrayvmqz', '2017-02-13 00:00:00', 53),
(684, 'oefichyv', '2017-02-14 00:00:00', 72),
(685, 'roiqiyhk', '2017-02-15 00:00:00', 85),
(686, 'chlhkfer', '2017-02-16 00:00:00', 95),
(687, 'hdmcitol', '2017-02-17 00:00:00', 86),
(688, 'zwtycnqd', '2017-02-18 00:00:00', 89),
(689, 'eqzgpxdj', '2017-02-19 00:00:00', 67),
(690, 'rukewzpa', '2017-02-20 00:00:00', 74),
(691, 'zcxpxsnu', '2017-02-21 00:00:00', 68),
(692, 'ofxkmfzr', '2017-02-22 00:00:00', 82),
(693, 'mkgchuda', '2017-02-23 00:00:00', 83),
(694, 'asqrjkfl', '2017-02-24 00:00:00', 79),
(695, 'mtdltieb', '2017-02-25 00:00:00', 86),
(696, 'avhmqdjs', '2017-02-26 00:00:00', 64),
(697, 'wqqeduta', '2017-02-27 00:00:00', 29),
(698, 'gemizkmy', '2017-02-28 00:00:00', 7),
(699, 'bckgvlxf', '2017-03-01 00:00:00', 61),
(700, 'mpskoezu', '2017-03-02 00:00:00', 45),
(701, 'srnpueml', '2017-03-03 00:00:00', 90),
(702, 'fqgxbvap', '2017-03-04 00:00:00', 30),
(703, 'mochwsnl', '2017-03-05 00:00:00', 13),
(704, 'ibfmjhut', '2017-03-06 00:00:00', 86),
(705, 'utpqeerd', '2017-03-07 00:00:00', 28),
(706, 'qexrkprj', '2017-03-08 00:00:00', 34),
(707, 'uvzjmacw', '2017-03-09 00:00:00', 61),
(708, 'quwddebp', '2017-03-10 00:00:00', 8),
(709, 'dbxhwxse', '2017-03-11 00:00:00', 7),
(710, 'wojnzqll', '2017-03-12 00:00:00', 16),
(711, 'qtwfdedk', '2017-03-13 00:00:00', 43),
(712, 'pkrwwefc', '2017-03-14 00:00:00', 89),
(713, 'yqudzvlm', '2017-03-15 00:00:00', 97),
(714, 'nmhsnpdx', '2017-03-16 00:00:00', 58),
(715, 'aqotciap', '2017-03-17 00:00:00', 19),
(716, 'naizsthw', '2017-03-18 00:00:00', 83),
(717, 'kamcfrik', '2017-03-19 00:00:00', 58),
(718, 'lgmndzjm', '2017-03-20 00:00:00', 84),
(719, 'rneaxmlj', '2017-03-21 00:00:00', 43),
(720, 'nacmgeot', '2017-03-22 00:00:00', 8),
(721, 'vfjhtjbk', '2017-03-23 00:00:00', 95),
(722, 'fhmjsqyx', '2017-03-24 00:00:00', 4),
(723, 'hlwcqcfr', '2017-03-25 00:00:00', 65),
(724, 'nphtfigk', '2017-03-26 00:00:00', 32),
(725, 'biuorcnq', '2017-03-27 00:00:00', 72),
(726, 'jbikqhnp', '2017-03-28 00:00:00', 9),
(727, 'bxnzotwi', '2017-03-29 00:00:00', 64),
(728, 'iiywpjyd', '2017-03-30 00:00:00', 30),
(729, 'jnpjzgyw', '2017-03-31 00:00:00', 85),
(730, 'symbrxoz', '2017-04-01 00:00:00', 58),
(731, 'uypdsgou', '2017-04-02 00:00:00', 92),
(732, 'thanpstq', '2017-04-03 00:00:00', 70),
(733, 'grfvqxsk', '2017-04-04 00:00:00', 71),
(734, 'jjiafxma', '2017-04-05 00:00:00', 27),
(735, 'rrebhsma', '2017-04-06 00:00:00', 65),
(736, 'cyoqsruw', '2017-04-07 00:00:00', 71),
(737, 'cfctvedq', '2017-04-08 00:00:00', 28),
(738, 'emgyjwpx', '2017-04-09 00:00:00', 69),
(739, 'jipjifyp', '2017-04-10 00:00:00', 17),
(740, 'lowihyew', '2017-04-11 00:00:00', 24),
(741, 'mnpjesju', '2017-04-12 00:00:00', 54),
(742, 'lsxziump', '2017-04-13 00:00:00', 3),
(743, 'ubjkhdxz', '2017-04-14 00:00:00', 73),
(744, 'vtpsjwql', '2017-04-15 00:00:00', 59),
(745, 'tulfixam', '2017-04-16 00:00:00', 32),
(746, 'vqegbuin', '2017-04-17 00:00:00', 47),
(747, 'bxsrqykj', '2017-04-18 00:00:00', 12),
(748, 'uxesoecc', '2017-04-19 00:00:00', 75),
(749, 'ihabuycn', '2017-04-20 00:00:00', 23),
(750, 'tdvymwie', '2017-04-21 00:00:00', 48),
(751, 'hgotqzvo', '2017-04-22 00:00:00', 85),
(752, 'vqbmdzut', '2017-04-23 00:00:00', 80),
(753, 'dtmroekv', '2017-04-24 00:00:00', 21),
(754, 'ogyvtcwe', '2017-04-25 00:00:00', 91),
(755, 'iwboabkg', '2017-04-26 00:00:00', 17),
(756, 'fgalaloy', '2017-04-27 00:00:00', 26),
(757, 'wohyflvr', '2017-04-28 00:00:00', 92),
(758, 'biixkwld', '2017-04-29 00:00:00', 50),
(759, 'wxvorcxk', '2017-04-30 00:00:00', 61),
(760, 'qzsbkiew', '2017-05-01 00:00:00', 48),
(761, 'cumsyvgg', '2017-05-02 00:00:00', 52),
(762, 'krzhedtw', '2017-05-03 00:00:00', 3),
(763, 'xgdtzeip', '2017-05-04 00:00:00', 17),
(764, 'xfrxdzjf', '2017-05-05 00:00:00', 61),
(765, 'knxbjigl', '2017-05-06 00:00:00', 91),
(766, 'cxgpwygl', '2017-05-07 00:00:00', 21),
(767, 'eufznltx', '2017-05-08 00:00:00', 41),
(768, 'mshihjac', '2017-05-09 00:00:00', 97),
(769, 'qayzmawj', '2017-05-10 00:00:00', 21),
(770, 'ciuqfyba', '2017-05-11 00:00:00', 10),
(771, 'xpunlske', '2017-05-12 00:00:00', 90),
(772, 'lfxnuvbn', '2017-05-13 00:00:00', 20),
(773, 'prsjoerg', '2017-05-14 00:00:00', 13),
(774, 'mtqvnwyk', '2017-05-15 00:00:00', 95),
(775, 'ypmoweiv', '2017-05-16 00:00:00', 92),
(776, 'vgjhugcm', '2017-05-17 00:00:00', 25),
(777, 'imuvqbmj', '2017-05-18 00:00:00', 79),
(778, 'xajrumfw', '2017-05-19 00:00:00', 42),
(779, 'zkqcobjx', '2017-05-20 00:00:00', 89),
(780, 'kvqlzcmm', '2017-05-21 00:00:00', 71),
(781, 'ysedwplv', '2017-05-22 00:00:00', 93),
(782, 'kfdrajys', '2017-05-23 00:00:00', 56),
(783, 'pwgfmqhn', '2017-05-24 00:00:00', 84),
(784, 'zsvzjgbl', '2017-05-25 00:00:00', 58),
(785, 'baozgduy', '2017-05-26 00:00:00', 80),
(786, 'ombzondr', '2017-05-27 00:00:00', 48),
(787, 'jmtbzdpq', '2017-05-28 00:00:00', 86),
(788, 'wgxipyhk', '2017-05-29 00:00:00', 86),
(789, 'blwntcwg', '2017-05-30 00:00:00', 9),
(790, 'puxqbqrd', '2017-05-31 00:00:00', 15),
(791, 'drnndoyw', '2017-06-01 00:00:00', 85),
(792, 'mpqkxzbo', '2017-06-02 00:00:00', 85),
(793, 'mzxomwsl', '2017-06-03 00:00:00', 24),
(794, 'czjkjtmf', '2017-06-04 00:00:00', 78),
(795, 'birkvhwx', '2017-06-05 00:00:00', 15),
(796, 'xuteryfc', '2017-06-06 00:00:00', 90),
(797, 'ylxeswhj', '2017-06-07 00:00:00', 4),
(798, 'dokghpsp', '2017-06-08 00:00:00', 58),
(799, 'oxeaoncd', '2017-06-09 00:00:00', 51),
(800, 'gqcsrabd', '2017-06-10 00:00:00', 35),
(801, 'wuypxlan', '2017-06-11 00:00:00', 6),
(802, 'wufxcnps', '2017-06-12 00:00:00', 49),
(803, 'jpiyglqz', '2017-06-13 00:00:00', 74),
(804, 'lfrbqxoo', '2017-06-14 00:00:00', 29),
(805, 'jqzonwnv', '2017-06-15 00:00:00', 39),
(806, 'ynjiwwab', '2017-06-16 00:00:00', 84),
(807, 'yzmqnxsa', '2017-06-17 00:00:00', 23),
(808, 'fwfqvtxe', '2017-06-18 00:00:00', 23),
(809, 'fvjliqae', '2017-06-19 00:00:00', 49),
(810, 'jtpukajh', '2017-06-20 00:00:00', 79),
(811, 'epytorvx', '2017-06-21 00:00:00', 48),
(812, 'vhyhicmw', '2017-06-22 00:00:00', 95),
(813, 'sfdyccfa', '2017-06-23 00:00:00', 82),
(814, 'ivtycmgb', '2017-06-24 00:00:00', 20),
(815, 'wtreapwz', '2017-06-25 00:00:00', 76),
(816, 'swdxgjjl', '2017-06-26 00:00:00', 71),
(817, 'ctojlqxz', '2017-06-27 00:00:00', 70),
(818, 'lszaqucx', '2017-06-28 00:00:00', 2),
(819, 'dtuzlnjv', '2017-06-29 00:00:00', 58),
(820, 'uvgtzlbs', '2017-06-30 00:00:00', 40),
(821, 'elzfcxkq', '2017-07-01 00:00:00', 95),
(822, 'dnhgsfpx', '2017-07-02 00:00:00', 86),
(823, 'svfskyfp', '2017-07-03 00:00:00', 68),
(824, 'lojroazx', '2017-07-04 00:00:00', 69),
(825, 'qlkmqoaz', '2017-07-05 00:00:00', 51),
(826, 'ixofalxm', '2017-07-06 00:00:00', 34),
(827, 'nytpakoz', '2017-07-07 00:00:00', 41),
(828, 'bnuchumc', '2017-07-08 00:00:00', 73),
(829, 'ewomscdl', '2017-07-09 00:00:00', 86),
(830, 'cscferym', '2017-07-10 00:00:00', 84),
(831, 'kziehrxv', '2017-07-11 00:00:00', 89),
(832, 'iflsesqx', '2017-07-12 00:00:00', 20),
(833, 'cvljrhxm', '2017-07-13 00:00:00', 63),
(834, 'kkqtzmmd', '2017-07-14 00:00:00', 18),
(835, 'qgbwbcor', '2017-07-15 00:00:00', 23),
(836, 'ovgmtlsm', '2017-07-16 00:00:00', 59),
(837, 'ottxbugz', '2017-07-17 00:00:00', 38),
(838, 'ajfbmjzh', '2017-07-18 00:00:00', 21),
(839, 'jzrjmckv', '2017-07-19 00:00:00', 68),
(840, 'zybtcdnb', '2017-07-20 00:00:00', 6),
(841, 'gcnxsoyk', '2017-07-21 00:00:00', 47),
(842, 'okvsfhnp', '2017-07-22 00:00:00', 48),
(843, 'pmsjbyqa', '2017-07-23 00:00:00', 78),
(844, 'colwiekj', '2017-07-24 00:00:00', 61),
(845, 'mnogviif', '2017-07-25 00:00:00', 21),
(846, 'gvriigkn', '2017-07-26 00:00:00', 78),
(847, 'lzirtgso', '2017-07-27 00:00:00', 63),
(848, 'jcqplwzv', '2017-07-28 00:00:00', 59),
(849, 'yecvezjj', '2017-07-29 00:00:00', 84),
(850, 'gxkubnau', '2017-07-30 00:00:00', 76),
(851, 'tuqhdbzl', '2017-07-31 00:00:00', 13),
(852, 'jlpzdlnj', '2017-08-01 00:00:00', 4),
(853, 'tflckpdv', '2017-08-02 00:00:00', 41),
(854, 'lawkjcig', '2017-08-03 00:00:00', 36),
(855, 'jwrmaxnx', '2017-08-04 00:00:00', 26),
(856, 'yyohgldk', '2017-08-05 00:00:00', 35),
(857, 'isjdnixq', '2017-08-06 00:00:00', 6),
(858, 'hvtpiylc', '2017-08-07 00:00:00', 16),
(859, 'ssqixuki', '2017-08-08 00:00:00', 28),
(860, 'brqqswoy', '2017-08-09 00:00:00', 85),
(861, 'ekihcxar', '2017-08-10 00:00:00', 96),
(862, 'cszpaipe', '2017-08-11 00:00:00', 68),
(863, 'zuckrvom', '2017-08-12 00:00:00', 50),
(864, 'ukfnwhst', '2017-08-13 00:00:00', 95),
(865, 'evxgqlzy', '2017-08-14 00:00:00', 25),
(866, 'aclbiodz', '2017-08-15 00:00:00', 16),
(867, 'vzdysxyc', '2017-08-16 00:00:00', 58),
(868, 'rscwgumh', '2017-08-17 00:00:00', 31),
(869, 'yucdpjky', '2017-08-18 00:00:00', 41),
(870, 'oeiwqtkv', '2017-08-19 00:00:00', 28),
(871, 'fwhjtiro', '2017-08-20 00:00:00', 95),
(872, 'xdjyhott', '2017-08-21 00:00:00', 51),
(873, 'slboarut', '2017-08-22 00:00:00', 96),
(874, 'acaumift', '2017-08-23 00:00:00', 29),
(875, 'krpttjeq', '2017-08-24 00:00:00', 7),
(876, 'edfwiqui', '2017-08-25 00:00:00', 8),
(877, 'kjvpzccf', '2017-08-26 00:00:00', 28),
(878, 'kpvyftxb', '2017-08-27 00:00:00', 29),
(879, 'gqmcgjor', '2017-08-28 00:00:00', 82),
(880, 'akggujkt', '2017-08-29 00:00:00', 70),
(881, 'lzucnefl', '2017-08-30 00:00:00', 60),
(882, 'uosnlvon', '2017-08-31 00:00:00', 97),
(883, 'kxazlwzv', '2017-09-01 00:00:00', 95),
(884, 'ezmpioen', '2017-09-02 00:00:00', 98),
(885, 'lrxwabpz', '2017-09-03 00:00:00', 53),
(886, 'wmucpqna', '2017-09-04 00:00:00', 12),
(887, 'yvosprsf', '2017-09-05 00:00:00', 65),
(888, 'sgcvfyep', '2017-09-06 00:00:00', 41),
(889, 'snwiejpc', '2017-09-07 00:00:00', 85),
(890, 'cbytnsfy', '2017-09-08 00:00:00', 8),
(891, 'gntkxhyu', '2017-09-09 00:00:00', 85),
(892, 'gnwdubut', '2017-09-10 00:00:00', 85),
(893, 'rrgnacdb', '2017-09-11 00:00:00', 17),
(894, 'ejbrqtfa', '2017-09-12 00:00:00', 24),
(895, 'ratuktfg', '2017-09-13 00:00:00', 96),
(896, 'yinxljuz', '2017-09-14 00:00:00', 37),
(897, 'qhefiuyl', '2017-09-15 00:00:00', 84),
(898, 'jxdkkmsb', '2017-09-16 00:00:00', 36),
(899, 'prtscjmx', '2017-09-17 00:00:00', 23),
(900, 'fotjsfnu', '2017-09-18 00:00:00', 9),
(901, 'gfhwiruf', '2017-09-19 00:00:00', 56),
(902, 'ufcxblzm', '2017-09-20 00:00:00', 30),
(903, 'yuiheads', '2017-09-21 00:00:00', 58),
(904, 'cahgtxok', '2017-09-22 00:00:00', 41),
(905, 'nufcwgyd', '2017-09-23 00:00:00', 60),
(906, 'xklwurol', '2017-09-24 00:00:00', 17),
(907, 'cuazbprw', '2017-09-25 00:00:00', 32),
(908, 'xnjmhtsr', '2017-09-26 00:00:00', 53),
(909, 'gpspevmk', '2017-09-27 00:00:00', 31),
(910, 'zlixkead', '2017-09-28 00:00:00', 84),
(911, 'javshgrn', '2017-09-29 00:00:00', 76),
(912, 'cjuzwxva', '2017-09-30 00:00:00', 81),
(913, 'mdweizjj', '2017-10-01 00:00:00', 49),
(914, 'agynnytw', '2017-10-02 00:00:00', 92),
(915, 'qpzsmdwo', '2017-10-03 00:00:00', 39),
(916, 'iuehtpuc', '2017-10-04 00:00:00', 75),
(917, 'zxcuqyma', '2017-10-05 00:00:00', 70),
(918, 'svkthepv', '2017-10-06 00:00:00', 26),
(919, 'cidmivwd', '2017-10-07 00:00:00', 57),
(920, 'cfjqdoag', '2017-10-08 00:00:00', 42),
(921, 'qivfksbt', '2017-10-09 00:00:00', 59),
(922, 'gjuratyu', '2017-10-10 00:00:00', 87),
(923, 'bhrgodaz', '2017-10-11 00:00:00', 29),
(924, 'caryatbs', '2017-10-12 00:00:00', 83),
(925, 'bymwamfa', '2017-10-13 00:00:00', 25),
(926, 'abaslgpk', '2017-10-14 00:00:00', 97),
(927, 'ajluvxou', '2017-10-15 00:00:00', 52),
(928, 'sgibgauj', '2017-10-16 00:00:00', 95),
(929, 'hnsvhupo', '2017-10-17 00:00:00', 69),
(930, 'siecahnm', '2017-10-18 00:00:00', 8),
(931, 'srfomlds', '2017-10-19 00:00:00', 87),
(932, 'gdnfzlvl', '2017-10-20 00:00:00', 70),
(933, 'iezntugn', '2017-10-21 00:00:00', 72),
(934, 'jzgyltta', '2017-10-22 00:00:00', 17),
(935, 'mnzrgavu', '2017-10-23 00:00:00', 37),
(936, 'vuiarktl', '2017-10-24 00:00:00', 87),
(937, 'xykdbqyp', '2017-10-25 00:00:00', 40),
(938, 'cejfbhlw', '2017-10-26 00:00:00', 45),
(939, 'jkdhyutv', '2017-10-27 00:00:00', 65),
(940, 'crivkfta', '2017-10-28 00:00:00', 41),
(941, 'lxbcexti', '2017-10-29 00:00:00', 68),
(942, 'wpgtymao', '2017-10-30 00:00:00', 53),
(943, 'jmxgkcqj', '2017-10-31 00:00:00', 39),
(944, 'lkqhvmcn', '2017-11-01 00:00:00', 57),
(945, 'jmzrgyfl', '2017-11-02 00:00:00', 85),
(946, 'uecvsuln', '2017-11-03 00:00:00', 2),
(947, 'fddvbkcl', '2017-11-04 00:00:00', 4),
(948, 'vmxdotjl', '2017-11-05 00:00:00', 41),
(949, 'dtxbwafr', '2017-11-06 00:00:00', 47),
(950, 'xjbulvkt', '2017-11-07 00:00:00', 38),
(951, 'mleoguxc', '2017-11-08 00:00:00', 52),
(952, 'rlponkes', '2017-11-09 00:00:00', 86),
(953, 'fioygwsh', '2017-11-10 00:00:00', 9),
(954, 'ifjmhsol', '2017-11-11 00:00:00', 9),
(955, 'xdrshpsg', '2017-11-12 00:00:00', 80),
(956, 'yxdjzbpd', '2017-11-13 00:00:00', 40),
(957, 'lenztysd', '2017-11-14 00:00:00', 37),
(958, 'sugeomwh', '2017-11-15 00:00:00', 92),
(959, 'tmvshbsg', '2017-11-16 00:00:00', 85),
(960, 'nfsxvzag', '2017-11-17 00:00:00', 14),
(961, 'pehdwzbm', '2017-11-18 00:00:00', 17),
(962, 'snwvibzj', '2017-11-19 00:00:00', 36),
(963, 'lrckqinv', '2017-11-20 00:00:00', 64),
(964, 'cuaksari', '2017-11-21 00:00:00', 3),
(965, 'owqhdeon', '2017-11-22 00:00:00', 89),
(966, 'qgqhokfo', '2017-11-23 00:00:00', 1),
(967, 'iqpbexmw', '2017-11-24 00:00:00', 49),
(968, 'ssjraeyb', '2017-11-25 00:00:00', 91),
(969, 'ohxkoyum', '2017-11-26 00:00:00', 52),
(970, 'ncgyoujz', '2017-11-27 00:00:00', 81),
(971, 'rmxulazs', '2017-11-28 00:00:00', 78),
(972, 'tmvcovss', '2017-11-29 00:00:00', 72),
(973, 'zjqbfyhb', '2017-11-30 00:00:00', 71),
(974, 'otxssxuf', '2017-12-01 00:00:00', 9),
(975, 'ojpsgbao', '2017-12-02 00:00:00', 75),
(976, 'steqynjr', '2017-12-03 00:00:00', 31),
(977, 'ypjmryxz', '2017-12-04 00:00:00', 73),
(978, 'pjworapu', '2017-12-05 00:00:00', 41),
(979, 'fetjbruw', '2017-12-06 00:00:00', 75),
(980, 'avubmiqv', '2017-12-07 00:00:00', 39),
(981, 'rjpuoiqn', '2017-12-08 00:00:00', 80),
(982, 'rupkvfil', '2017-12-09 00:00:00', 31),
(983, 'wmsnonow', '2017-12-10 00:00:00', 24),
(984, 'oatyjwdh', '2017-12-11 00:00:00', 49),
(985, 'znbgqokm', '2017-12-12 00:00:00', 67),
(986, 'tamrdjvm', '2017-12-13 00:00:00', 36),
(987, 'zdrohtuy', '2017-12-14 00:00:00', 10),
(988, 'xlaguock', '2017-12-15 00:00:00', 64),
(989, 'vgupsofw', '2017-12-16 00:00:00', 56),
(990, 'vghsjunp', '2017-12-17 00:00:00', 59),
(991, 'wzkdubgl', '2017-12-18 00:00:00', 83),
(992, 'iaencwph', '2017-12-19 00:00:00', 89),
(993, 'pninyvfl', '2017-12-20 00:00:00', 79),
(994, 'uaizokyx', '2017-12-21 00:00:00', 73),
(995, 'frvpwxrp', '2017-12-22 00:00:00', 60),
(996, 'dhcbeqvq', '2017-12-23 00:00:00', 68),
(997, 'zhdblcnr', '2017-12-24 00:00:00', 51),
(998, 'xsoijbcn', '2017-12-25 00:00:00', 16),
(999, 'hoxpockm', '2017-12-26 00:00:00', 30),
(1000, 'fzqknvra', '2017-12-27 00:00:00', 25);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `kode_koleksi` varchar(100) NOT NULL,
  `harga_beli` int(12) NOT NULL,
  `harga_jual` int(12) NOT NULL,
  `stok` int(5) NOT NULL,
  `kode_invoice` varchar(20) NOT NULL,
  `diskon` int(3) NOT NULL DEFAULT '0',
  `keterangan` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`id`, `name`, `kode_koleksi`, `harga_beli`, `harga_jual`, `stok`, `kode_invoice`, `diskon`, `keterangan`, `created_at`) VALUES
(1, 'teh jenggot biru', 'PO122333099999', 1200, 1500, 104, 'ptg24112017', 0, '', '2017-10-18 22:03:23'),
(3, 'agar swallow 10mg rasa anggur', 'ML12890111', 2450, 3000, 3, 'skm09092017', 0, '', '2017-12-13 07:46:34'),
(5, 'plastik es 1kg 50pcs', 'LP12344555566656', 4650, 6000, 0, 'mj04112017', 0, '', '2017-12-13 07:51:03'),
(6, 'remason 20ml hijau', 'RMS23455666', 3450, 4000, 67, 'nt13062017', 0, '', '2017-12-13 08:00:54'),
(7, 'sakatonik liver 40ml wanita', '1234455556666', 25600, 28000, 1, 'kmk06072017', 0, 'kadalluarsa tangg 08082019', '2017-12-13 08:04:25'),
(8, 'extrajoss anggur kardus', '2234455556666', 12000, 13000, 2, 'kmk06072017', 0, '', '2017-12-13 08:05:42'),
(9, 'susu enfagrow 1000g', 'EF101099222', 98000, 120000, 16, 'STM11092017', 0, '', '2017-12-23 13:38:05'),
(10, 'motor honda absolut revo hitam cakram', 'MH1234567234321', 17000, 22000, 3, 'KSM02012017', 0, '', '2017-12-23 13:39:47'),
(11, 'marina hand body 200ml pink', 'MR1123787450', 7800, 8500, 22, 'AGM06062017', 0, '', '2017-12-26 22:40:16'),
(12, 'Nivia Sabun Muka Carbon Hijau 75ml', 'NI98098761YH', 17000, 20000, 5, 'AGM06062017', 0, '', '2017-12-26 22:41:22'),
(13, 'Gatsby pomade soft 100ml', 'BG123098098890', 56000, 72000, 2, 'AGM06062017', 0, '', '2017-12-26 22:42:25'),
(14, 'Pepsodent pasta gigi 56ml', 'UP2341563211144', 6700, 7500, 20, 'AGM06062017', 0, '', '2017-12-26 22:43:12'),
(15, 'Switzal sampo sereh 300ml', 'SW4563211DL', 11450, 13000, 8, 'AGM06062017', 0, '', '2017-12-26 22:44:02'),
(16, 'liftboy sabun batang 56g', 'ULB17231111233', 1800, 2300, 37, 'AGM06062017', 0, '', '2017-12-26 22:45:50'),
(17, 'Liftboy sampo 5ml orange', 'ULS1981110000', 350, 500, 83, 'AGM06062017', 0, '', '2017-12-26 22:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi_transaksi`
--

CREATE TABLE `koleksi_transaksi` (
  `id` int(11) NOT NULL,
  `transaksi_penjualan_id` int(20) NOT NULL,
  `koleksi_id` int(20) NOT NULL,
  `koleksi_name` varchar(100) NOT NULL,
  `harga_beli` int(12) NOT NULL,
  `harga_jual` int(12) NOT NULL,
  `qty` int(5) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koleksi_transaksi`
--

INSERT INTO `koleksi_transaksi` (`id`, `transaksi_penjualan_id`, `koleksi_id`, `koleksi_name`, `harga_beli`, `harga_jual`, `qty`) VALUES
(152, 266, 13, 'Gatsby pomade soft 100ml', 56000, 72000, 1),
(153, 266, 6, 'remason 20ml hijau', 3450, 4000, 1),
(154, 266, 11, 'marina hand body 200ml pink', 7800, 8500, 1),
(155, 267, 11, 'marina hand body 200ml pink', 7800, 8500, 1),
(156, 267, 6, 'remason 20ml hijau', 3450, 4000, 1),
(157, 267, 17, 'Liftboy sampo 5ml orange', 350, 500, 1),
(158, 268, 6, 'remason 20ml hijau', 3450, 4000, 1),
(159, 269, 17, 'Liftboy sampo 5ml orange', 350, 500, 1),
(160, 269, 7, 'sakatonik liver 40ml wanita', 25600, 28000, 1),
(161, 270, 16, 'liftboy sabun batang 56g', 1800, 2300, 2),
(162, 270, 17, 'Liftboy sampo 5ml orange', 350, 500, 1),
(163, 270, 14, 'Pepsodent pasta gigi 56ml', 6700, 7500, 1),
(164, 270, 8, 'extrajoss anggur kardus', 12000, 13000, 1),
(165, 271, 10, 'motor honda absolut revo hitam cakram', 17000, 22000, 1),
(166, 271, 8, 'extrajoss anggur kardus', 12000, 13000, 1),
(167, 272, 17, 'Liftboy sampo 5ml orange', 350, 500, 10),
(168, 272, 12, 'Nivia Sabun Muka Carbon Hijau 75ml', 17000, 20000, 1),
(169, 273, 14, 'Pepsodent pasta gigi 56ml', 6700, 7500, 1),
(170, 273, 1, 'teh jenggot biru', 1200, 1500, 1),
(171, 274, 1, 'teh jenggot biru', 1200, 1500, 5),
(172, 274, 17, 'Liftboy sampo 5ml orange', 350, 500, 1),
(173, 274, 15, 'Switzal sampo sereh 300ml', 11450, 13000, 1),
(174, 275, 6, 'remason 20ml hijau', 3450, 4000, 1),
(175, 275, 11, 'marina hand body 200ml pink', 7800, 8500, 1),
(176, 275, 5, 'plastik es 1kg 50pcs', 4650, 6000, 1),
(177, 276, 14, 'Pepsodent pasta gigi 56ml', 6700, 7500, 1),
(178, 276, 17, 'Liftboy sampo 5ml orange', 350, 500, 1),
(179, 276, 10, 'motor honda absolut revo hitam cakram', 17000, 22000, 1),
(180, 277, 6, 'remason 20ml hijau', 3450, 4000, 1),
(181, 277, 16, 'liftboy sabun batang 56g', 1800, 2300, 1),
(182, 278, 7, 'sakatonik liver 40ml wanita', 25600, 28000, 1),
(183, 278, 9, 'susu enfagrow 1000g', 98000, 120000, 1),
(184, 280, 6, 'remason 20ml hijau', 3450, 4000, 1),
(185, 280, 10, 'motor honda absolut revo hitam cakram', 17000, 22000, 1),
(186, 281, 9, 'susu enfagrow 1000g', 98000, 120000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(6, '::1', 'admin@gmail.com', 1514442989);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pembelian`
-- (See below for the actual view)
--
CREATE TABLE `pembelian` (
`kt_id` int(11)
,`koleksi_id` int(20)
,`nama_items` text
);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id` int(20) NOT NULL,
  `uniq` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `t_harga_beli` int(12) NOT NULL,
  `t_harga_jual` int(12) NOT NULL,
  `nominal_bayar` int(12) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id`, `uniq`, `user_id`, `t_harga_beli`, `t_harga_jual`, `nominal_bayar`, `created_at`) VALUES
(266, '2611117225531_3510', 1, 59450, 76000, 80000, '2017-12-26 22:55:31'),
(267, '2611117225710_4406', 1, 11600, 13000, 13000, '2017-12-25 22:58:04'),
(268, '261111722584_8595', 1, 3450, 4000, 4000, '2017-12-25 22:58:04'),
(269, '2611117225838_8376', 1, 25950, 28500, 30000, '2017-12-26 22:58:38'),
(270, '2611117225953_397', 1, 22650, 25600, 30000, '2017-12-26 22:59:53'),
(271, '26111172331_5077', 1, 29000, 35000, 35000, '2017-12-24 23:03:02'),
(272, '261111723334_7428', 1, 20500, 25000, 25000, '2017-12-24 23:03:02'),
(273, '261111723411_900', 1, 7900, 9000, 10000, '2017-12-24 23:03:02'),
(274, '261111723458_3157', 1, 17800, 21000, 21000, '2017-12-23 23:03:02'),
(275, '271111771516_8353', 1, 15900, 18500, 20000, '2017-12-27 07:15:16'),
(276, '271111771553_8830', 1, 7050, 8000, 8000, '2017-12-27 07:15:53'),
(277, '271111771647_9300', 1, 5250, 6300, 7000, '2017-12-27 07:16:48'),
(278, '271111771717_9307', 1, 123600, 148000, 150000, '2017-12-27 07:17:17'),
(279, '271111772239_3415', 1, 0, 0, 0, '2017-11-27 07:22:39'),
(280, '27111172250_5564', 1, 20450, 26000, 26000, '2017-12-23 22:05:01'),
(281, '281111713572_6367', 2, 98000, 120000, 120000, '2017-12-28 13:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1514444317, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'ibnujamil', '$2y$08$kRhqTXB1uiqO.xGJcj/As.QMnYCmYakWk3CQg3MS1oNpN0sWg2sgG', NULL, 'ibnu@gmail.com', NULL, NULL, NULL, NULL, 1514107638, 1514443378, 1, 'ibnu', 'jamil mil mil', NULL, NULL),
(3, '::1', 'khoirullah@gmail.com', '0', NULL, 'khoirullah@gmail.com', NULL, NULL, NULL, NULL, 1514107692, NULL, 1, 'khoirullah', 'feris', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(4, 1, 1),
(3, 1, 2),
(24, 2, 2),
(22, 3, 2);

-- --------------------------------------------------------

--
-- Structure for view `pembelian`
--
DROP TABLE IF EXISTS `pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY INVOKER VIEW `pembelian`  AS  select `koleksi_transaksi`.`id` AS `kt_id`,`koleksi`.`id` AS `koleksi_id`,group_concat(`koleksi`.`name` separator ',') AS `nama_items` from (`koleksi_transaksi` left join `koleksi` on((`koleksi_transaksi`.`koleksi_id` = `koleksi`.`id`))) group by `koleksi_transaksi`.`koleksi_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abal`
--
ALTER TABLE `abal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koleksi_transaksi`
--
ALTER TABLE `koleksi_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_penjualan_id` (`transaksi_penjualan_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq` (`uniq`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abal`
--
ALTER TABLE `abal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `koleksi_transaksi`
--
ALTER TABLE `koleksi_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `koleksi_transaksi`
--
ALTER TABLE `koleksi_transaksi`
  ADD CONSTRAINT `koleksi_transaksi_ibfk_1` FOREIGN KEY (`transaksi_penjualan_id`) REFERENCES `transaksi_penjualan` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
