-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 11 Février 2020 à 10:25
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project6`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) DEFAULT NULL,
  `trick_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `user_id_id`, `trick_id`, `content`, `created_at`) VALUES
(632, 68, 207, 'Commentaire n° 1', '2019-12-12 15:02:24'),
(633, 69, 205, 'Commentaire n° 2', '2019-12-12 15:02:24'),
(634, 68, 196, 'Commentaire n° 3', '2019-12-12 15:02:24'),
(635, 69, 210, 'Commentaire n° 4', '2019-12-12 15:02:24'),
(636, 69, 200, 'Commentaire n° 5', '2019-12-12 15:02:24'),
(637, 68, 206, 'Commentaire n° 6', '2019-12-12 15:02:24'),
(638, 68, 205, 'Commentaire n° 7', '2019-12-12 15:02:24'),
(639, 68, 207, 'Commentaire n° 8', '2019-12-12 15:02:24'),
(640, 69, 204, 'Commentaire n° 9', '2019-12-12 15:02:24'),
(641, 69, 201, 'Commentaire n° 10', '2019-12-12 15:02:24'),
(642, 69, 201, 'Commentaire n° 11', '2019-12-12 15:02:24'),
(643, 69, 204, 'Commentaire n° 12', '2019-12-12 15:02:24'),
(644, 68, 207, 'Commentaire n° 13', '2019-12-12 15:02:24'),
(645, 69, 208, 'Commentaire n° 14', '2019-12-12 15:02:24'),
(646, 69, 196, 'Commentaire n° 15', '2019-12-12 15:02:24'),
(647, 68, 196, 'Commentaire n° 16', '2019-12-12 15:02:24'),
(648, 68, 205, 'Commentaire n° 17', '2019-12-12 15:02:24'),
(649, 69, 196, 'Commentaire n° 18', '2019-12-12 15:02:24'),
(650, 68, 196, 'Commentaire n° 19', '2019-12-12 15:02:24'),
(651, 69, 205, 'Commentaire n° 20', '2019-12-12 15:02:24'),
(652, 69, 208, 'Commentaire n° 21', '2019-12-12 15:02:24'),
(653, 68, 196, 'Commentaire n° 22', '2019-12-12 15:02:24'),
(654, 69, 198, 'Commentaire n° 23', '2019-12-12 15:02:24'),
(655, 69, 210, 'Commentaire n° 24', '2019-12-12 15:02:24'),
(656, 68, 205, 'Commentaire n° 25', '2019-12-12 15:02:24'),
(657, 68, 203, 'Commentaire n° 26', '2019-12-12 15:02:24'),
(658, 69, 198, 'Commentaire n° 27', '2019-12-12 15:02:24'),
(659, 69, 201, 'Commentaire n° 28', '2019-12-12 15:02:24'),
(660, 68, 209, 'Commentaire n° 29', '2019-12-12 15:02:24'),
(661, 68, 202, 'Commentaire n° 30', '2019-12-12 15:02:24'),
(662, 69, 198, 'Commentaire n° 31', '2019-12-12 15:02:24'),
(663, 69, 207, 'Commentaire n° 32', '2019-12-12 15:02:24'),
(664, 68, 203, 'Commentaire n° 33', '2019-12-12 15:02:24'),
(665, 68, 202, 'Commentaire n° 34', '2019-12-12 15:02:24'),
(666, 69, 196, 'Commentaire n° 35', '2019-12-12 15:02:24'),
(667, 68, 203, 'Commentaire n° 36', '2019-12-12 15:02:24'),
(668, 69, 208, 'Commentaire n° 37', '2019-12-12 15:02:24'),
(669, 68, 199, 'Commentaire n° 38', '2019-12-12 15:02:24'),
(670, 68, 199, 'Commentaire n° 39', '2019-12-12 15:02:24'),
(671, 69, 210, 'Commentaire n° 40', '2019-12-12 15:02:24'),
(672, 68, 208, 'Commentaire n° 41', '2019-12-12 15:02:24'),
(673, 69, 204, 'Commentaire n° 42', '2019-12-12 15:02:24'),
(674, 69, 196, 'Commentaire n° 43', '2019-12-12 15:02:24'),
(675, 68, 204, 'Commentaire n° 44', '2019-12-12 15:02:24'),
(676, 68, 196, 'Commentaire n° 45', '2019-12-12 15:02:24'),
(677, 68, 201, 'Commentaire n° 46', '2019-12-12 15:02:24'),
(678, 69, 203, 'Commentaire n° 47', '2019-12-12 15:02:24'),
(679, 69, 199, 'Commentaire n° 48', '2019-12-12 15:02:24'),
(680, 68, 206, 'Commentaire n° 49', '2019-12-12 15:02:24'),
(681, 69, 198, 'Commentaire n° 50', '2019-12-12 15:02:24'),
(682, 69, 206, 'Commentaire n° 51', '2019-12-12 15:02:24'),
(683, 68, 203, 'Commentaire n° 52', '2019-12-12 15:02:24'),
(684, 69, 202, 'Commentaire n° 53', '2019-12-12 15:02:24'),
(685, 69, 202, 'Commentaire n° 54', '2019-12-12 15:02:24'),
(686, 69, 200, 'Commentaire n° 55', '2019-12-12 15:02:24'),
(687, 68, 201, 'Commentaire n° 56', '2019-12-12 15:02:24'),
(688, 68, 209, 'Commentaire n° 57', '2019-12-12 15:02:24'),
(689, 69, 208, 'Commentaire n° 58', '2019-12-12 15:02:24'),
(690, 69, 198, 'Commentaire n° 59', '2019-12-12 15:02:24'),
(691, 69, 196, 'Commentaire n° 60', '2019-12-12 15:02:24'),
(692, 68, 204, 'Commentaire n° 61', '2019-12-12 15:02:24'),
(693, 69, 200, 'Commentaire n° 62', '2019-12-12 15:02:24'),
(694, 68, 196, 'Commentaire n° 63', '2019-12-12 15:02:24'),
(695, 69, 199, 'Commentaire n° 64', '2019-12-12 15:02:24'),
(696, 69, 204, 'Commentaire n° 65', '2019-12-12 15:02:24'),
(697, 69, 199, 'Commentaire n° 66', '2019-12-12 15:02:24'),
(698, 69, 202, 'Commentaire n° 67', '2019-12-12 15:02:24'),
(699, 68, 208, 'Commentaire n° 68', '2019-12-12 15:02:24'),
(700, 68, 198, 'Commentaire n° 69', '2019-12-12 15:02:24'),
(701, 68, 205, 'Commentaire n° 70', '2019-12-12 15:02:24'),
(702, 68, 207, 'Commentaire n° 71', '2019-12-12 15:02:24'),
(703, 68, 201, 'Commentaire n° 72', '2019-12-12 15:02:24'),
(704, 68, 210, 'Commentaire n° 73', '2019-12-12 15:02:24'),
(705, 69, 200, 'Commentaire n° 74', '2019-12-12 15:02:24'),
(706, 68, 210, 'Commentaire n° 75', '2019-12-12 15:02:24'),
(707, 69, 197, 'Commentaire n° 76', '2019-12-12 15:02:24'),
(708, 69, 196, 'Commentaire n° 77', '2019-12-12 15:02:24'),
(709, 68, 198, 'Commentaire n° 78', '2019-12-12 15:02:24'),
(710, 69, 208, 'Commentaire n° 79', '2019-12-12 15:02:24'),
(711, 68, 201, 'Commentaire n° 80', '2019-12-12 15:02:24'),
(712, 69, 199, 'Commentaire n° 81', '2019-12-12 15:02:24'),
(713, 68, 201, 'Commentaire n° 82', '2019-12-12 15:02:24'),
(714, 68, 198, 'Commentaire n° 83', '2019-12-12 15:02:24'),
(715, 69, 207, 'Commentaire n° 84', '2019-12-12 15:02:24'),
(716, 68, 206, 'Commentaire n° 85', '2019-12-12 15:02:24'),
(717, 69, 196, 'Commentaire n° 86', '2019-12-12 15:02:24'),
(718, 69, 210, 'Commentaire n° 87', '2019-12-12 15:02:24'),
(719, 69, 208, 'Commentaire n° 88', '2019-12-12 15:02:24'),
(720, 68, 204, 'Commentaire n° 89', '2019-12-12 15:02:24'),
(721, 68, 202, 'Commentaire n° 90', '2019-12-12 15:02:24'),
(722, 68, 207, 'Commentaire n° 91', '2019-12-12 15:02:24'),
(723, 69, 210, 'Commentaire n° 92', '2019-12-12 15:02:24'),
(724, 69, 199, 'Commentaire n° 93', '2019-12-12 15:02:24'),
(725, 68, 207, 'Commentaire n° 94', '2019-12-12 15:02:24'),
(726, 69, 200, 'Commentaire n° 95', '2019-12-12 15:02:24'),
(727, 68, 196, 'Commentaire n° 96', '2019-12-12 15:02:24'),
(728, 68, 206, 'Commentaire n° 97', '2019-12-12 15:02:24'),
(729, 69, 207, 'Commentaire n° 98', '2019-12-12 15:02:24'),
(730, 69, 207, 'Commentaire n° 99', '2019-12-12 15:02:24'),
(731, 69, 210, 'Commentaire n° 100', '2019-12-12 15:02:24'),
(732, 69, 201, 'Commentaire n° 101', '2019-12-12 15:02:24'),
(733, 69, 204, 'Commentaire n° 102', '2019-12-12 15:02:24'),
(734, 69, 202, 'Commentaire n° 103', '2019-12-12 15:02:24'),
(735, 69, 200, 'Commentaire n° 104', '2019-12-12 15:02:24'),
(736, 69, 210, 'Commentaire n° 105', '2019-12-12 15:02:24'),
(741, 69, 210, 'Test ajout commentaire', '2020-01-11 10:49:42');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191026085355', '2019-10-26 08:55:43'),
('20191027092234', '2019-10-27 09:22:50'),
('20191105102123', '2019-11-05 20:12:43'),
('20191118133215', '2019-11-18 13:33:00'),
('20191118171020', '2019-11-18 17:10:34');

-- --------------------------------------------------------

--
-- Structure de la table `picture_trick`
--

CREATE TABLE `picture_trick` (
  `id` int(11) NOT NULL,
  `relation_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `picture_trick`
--

INSERT INTO `picture_trick` (`id`, `relation_id`, `name`) VALUES
(139, 209, '6.jpg'),
(140, 206, '3.jpg'),
(141, 208, '2.jpg'),
(142, 210, '10.jpg'),
(143, 201, '9.jpg'),
(144, 201, '1.jpg'),
(145, 203, '8.jpg'),
(146, 207, '7.jpg'),
(147, 205, '11.jpg'),
(148, 207, '5.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `picture_user`
--

CREATE TABLE `picture_user` (
  `id` int(11) NOT NULL,
  `relation_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `picture_user`
--

INSERT INTO `picture_user` (`id`, `relation_id`, `name`) VALUES
(2, 68, 'profil1.jpg'),
(3, 69, 'profil2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `token`
--

INSERT INTO `token` (`id`, `user_id_id`, `created_at`, `value`) VALUES
(1, 69, '2019-12-17 10:01:01', 'e6650341359592ab85b50badada8166f');

-- --------------------------------------------------------

--
-- Structure de la table `trick`
--

CREATE TABLE `trick` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `name_default_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `trick`
--

INSERT INTO `trick` (`id`, `name`, `description`, `category`, `created_at`, `modified_at`, `name_default_picture`) VALUES
(196, 'Trick n°1', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '1.jpg'),
(197, 'Trick n°2', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '2.jpg'),
(198, 'Trick n°3', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '3.jpg'),
(199, 'Trick n°4', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '4.jpg'),
(200, 'Trick n°5', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '5.jpg'),
(201, 'Trick n°6', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '6.jpg'),
(202, 'Trick n°7', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '7.jpg'),
(203, 'Trick n°8', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '8.jpg'),
(204, 'Trick n°9', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '9.jpg'),
(205, 'Trick n°10', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '10.jpg'),
(206, 'Trick n°11', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '11.jpg'),
(207, 'Trick n°12', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '12.jpg'),
(208, 'Trick n°13', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '13.jpg'),
(209, 'Trick n°14', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\n            \n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\n            \n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', NULL, '14.jpg'),
(210, 'Trick n°15', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.\r\n            \r\n            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.\r\n            \r\n            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.', 'Grabs', '2019-12-12 15:02:24', '2019-12-28 09:40:41', '15.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roles` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `roles`) VALUES
(68, 'administrateur', '$argon2id$v=19$m=65536,t=4,p=1$n9YAPk/CxdLWHrm91SE9Ow$gYUSUwrMLRk8HIV7ESRSGpIiTGKdFKg8llWFScpwZTw', 'administrateur@gmail.com', '[\"ROLE_ADMIN\"]'),
(69, 'utilisateur', '$argon2id$v=19$m=65536,t=4,p=1$RiGCLBeMVbqz9CU/QkCrXA$sIwWNgRoVsCBK8FXZgiTag78NgfdHPW7Gr0gZzLQmys', 'utilisateur@gmail.com', '[\"ROLE_USER\"]');

-- --------------------------------------------------------

--
-- Structure de la table `video_trick`
--

CREATE TABLE `video_trick` (
  `id` int(11) NOT NULL,
  `relation_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `video_trick`
--

INSERT INTO `video_trick` (`id`, `relation_id`, `url`) VALUES
(66, 209, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/SQyTWk7OxSI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(67, 208, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/SQyTWk7OxSI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(68, 207, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/SQyTWk7OxSI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(69, 210, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/SQyTWk7OxSI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(70, 207, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/SQyTWk7OxSI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C9D86650F` (`user_id_id`),
  ADD KEY `IDX_9474526CB281BE2E` (`trick_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `picture_trick`
--
ALTER TABLE `picture_trick`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_582A2E503256915B` (`relation_id`);

--
-- Index pour la table `picture_user`
--
ALTER TABLE `picture_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_327353DC3256915B` (`relation_id`);

--
-- Index pour la table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5F37A13B9D86650F` (`user_id_id`);

--
-- Index pour la table `trick`
--
ALTER TABLE `trick`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `video_trick`
--
ALTER TABLE `video_trick`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5792A0BC3256915B` (`relation_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=742;
--
-- AUTO_INCREMENT pour la table `picture_trick`
--
ALTER TABLE `picture_trick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT pour la table `picture_user`
--
ALTER TABLE `picture_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `trick`
--
ALTER TABLE `trick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT pour la table `video_trick`
--
ALTER TABLE `video_trick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_9474526CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);

--
-- Contraintes pour la table `picture_trick`
--
ALTER TABLE `picture_trick`
  ADD CONSTRAINT `FK_582A2E503256915B` FOREIGN KEY (`relation_id`) REFERENCES `trick` (`id`);

--
-- Contraintes pour la table `picture_user`
--
ALTER TABLE `picture_user`
  ADD CONSTRAINT `FK_327353DC3256915B` FOREIGN KEY (`relation_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `FK_5F37A13B9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `video_trick`
--
ALTER TABLE `video_trick`
  ADD CONSTRAINT `FK_5792A0BC3256915B` FOREIGN KEY (`relation_id`) REFERENCES `trick` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
