-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 08 nov 2017 om 13:35
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin_credentials`
--

CREATE TABLE `admin_credentials` (
  `id` int(11) NOT NULL DEFAULT '1',
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(25) DEFAULT NULL,
  `region` varchar(25) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `street` varchar(25) DEFAULT NULL,
  `postalcode` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin_credentials`
--

INSERT INTO `admin_credentials` (`id`, `fullname`, `username`, `mail`, `password`, `country`, `region`, `city`, `street`, `postalcode`) VALUES
(1, 'Nyma Dolatkhahnejad', 'Nyma', 'nyma@telfort.nl', '$2y$10$jWh4P/PA4yqrRHjFjWopheoPd.MCwviCP/LbtY2m7KY0z4NCMwK7q', 'Nederland', 'Gelderland', 'Ede', 'Van Der Hagenstraat 701', '6717DK');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(11) NOT NULL,
  `site_reinstall` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `content`
--

CREATE TABLE `content` (
  `id` int(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `content`
--

INSERT INTO `content` (`id`, `page`, `content`) VALUES
(1, 'resume_education_title', 'Educatie'),
(2, 'resume_work_title', 'Werk'),
(3, 'skills_title', 'Skills'),
(4, 'skills_info', 'Nog wat ingeschatte percentages van mijn voortgang!'),
(5, 'projects_title', 'Mijn projecten'),
(6, 'contact_alt', 'Contacteer mij!'),
(7, 'contact_title', 'Nog niet genoeg?'),
(8, 'contact_info', 'Zijn er nog dingen die ik ben vergeten, staat er iets waarvan je denkt dat het niet klopt of wil je contact met me opnemen? Scrol dan nog even verder!'),
(9, 'contact_info2', 'Heb je een vraag of opmerking? Aarzel niet om mij een bericht te sturen. De hele week probeer ik binnen 24 uur te reageren!');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `site_about`
--

CREATE TABLE `site_about` (
  `id` int(11) NOT NULL,
  `about_name` text NOT NULL,
  `about_info` text NOT NULL,
  `about_info_header1` varchar(255) DEFAULT NULL,
  `about_info_header2` varchar(255) DEFAULT NULL,
  `about_info2` text NOT NULL,
  `about_downloadbutton` varchar(255) DEFAULT NULL,
  `about_image` varchar(255) DEFAULT NULL,
  `about_facebook` varchar(255) DEFAULT NULL,
  `about_twitter` varchar(255) DEFAULT NULL,
  `about_instagram` varchar(255) DEFAULT NULL,
  `about_skype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `site_about`
--

INSERT INTO `site_about` (`id`, `about_name`, `about_info`, `about_info_header1`, `about_info_header2`, `about_info2`, `about_downloadbutton`, `about_image`, `about_facebook`, `about_twitter`, `about_instagram`, `about_skype`) VALUES
(1, 'Nyma Dolatkhahnejad', 'Ik ben een <span>back-end</span> programmeur die geweldige systemen maakt! Dit doe ik allemaal met PHP, de taal waar ik me in verdiep. Natuurlijk ook meer, maar laten we daarvoor verder <a class=\"smoothscroll\" href=\"#about\">gaan.</a> Zo kom je meer over mij te <a class=\"smoothscroll\" href=\"#about\"> weten </a>.', 'Over mij', 'Contact gegevens', 'Hoi! Ik ben een 17 jarige programmeur die zich verdiept in applicaties bouwen zoals Content Management Systemen, administratie panelen en veel meer. Ik verdiep me in de volgende talen: PHP, SQL, PDO (DB). Dit zijn de talen waar ik het meeste mee doe. Daarnaast doe ik ook nog wat kleine design talen zoals HTML5, CSS3 en een beetje JavaScript...', 'CV Downloaden', 'mypicture.jpg', 'NymaDolatkhahnejad', 'Nymatjeuh', 'Mustache2605', 'live:nyma_nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `site_education`
--

CREATE TABLE `site_education` (
  `id` int(11) NOT NULL,
  `education_type` varchar(255) NOT NULL,
  `education_level` varchar(255) NOT NULL,
  `education_year_start` int(11) NOT NULL,
  `education_year_end` int(11) NOT NULL,
  `education_info` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `site_education`
--

INSERT INTO `site_education` (`id`, `education_type`, `education_level`, `education_year_start`, `education_year_end`, `education_info`) VALUES
(1, 'Basisonderwijs', 'Basis', 2017, 2017, 'Informatie over je opleiding/school'),
(2, 'Middelbaar onderwijs', 'Onderwijs', 2017, 2017, 'Informatie over je opleiding/school'),
(3, 'Voortgezetonderwijs', 'MBO', 2017, 2017, 'Informatie over je opleiding/school');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `site_info`
--

CREATE TABLE `site_info` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL DEFAULT 'Portfolio'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `site_info`
--

INSERT INTO `site_info` (`id`, `site_name`) VALUES
(1, 'Nyma');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `site_projects`
--

CREATE TABLE `site_projects` (
  `id` int(11) NOT NULL,
  `project_small_image` varchar(255) DEFAULT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `project_big_image` varchar(255) DEFAULT NULL,
  `project_info` varchar(255) DEFAULT NULL,
  `project_image` text NOT NULL,
  `project_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `site_projects`
--

INSERT INTO `site_projects` (`id`, `project_small_image`, `project_name`, `project_type`, `project_big_image`, `project_info`, `project_image`, `project_link`) VALUES
(1, '1.jpg', 'Project 1', 'CMS', '1.jpg', 'Informatie over het project', 'doggo.jpeg', 'https://google.com'),
(2, '2.jpg', 'Project 2', 'CMS', '2.jpg', 'Informatie over het project', 'doggo.jpeg', 'https://google.com'),
(3, '3.jpg', 'Project 3', 'CMS', '3.jpg', 'Informatie over het project', 'doggo.jpeg', 'https://google.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL DEFAULT '1',
  `site_installed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_installed`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `site_skills`
--

CREATE TABLE `site_skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) DEFAULT NULL,
  `skill_percentage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `site_skills`
--

INSERT INTO `site_skills` (`id`, `skill_name`, `skill_percentage`) VALUES
(1, 'Skill1', 20),
(2, 'Skill2', 40),
(3, 'Skill3', 60),
(4, 'Skill4', 80),
(5, 'Skill5', 100);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `site_work`
--

CREATE TABLE `site_work` (
  `id` int(11) NOT NULL,
  `work_type` varchar(255) NOT NULL,
  `work_place` varchar(255) NOT NULL,
  `work_year_start` int(11) NOT NULL,
  `work_year_end` int(11) NOT NULL,
  `work_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `site_work`
--

INSERT INTO `site_work` (`id`, `work_type`, `work_place`, `work_year_start`, `work_year_end`, `work_info`) VALUES
(1, 'Hoofd beheer ICT', 'Ede', 2017, 2017, 'Informatie over je werk'),
(2, 'Netwerkmanagement', 'Ede', 2017, 2017, 'Informatie over je werk'),
(3, 'Applicatieontwikkelaar', 'Ede', 2017, 2017, 'Informatie over je werk');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin_credentials`
--
ALTER TABLE `admin_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `site_about`
--
ALTER TABLE `site_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `site_education`
--
ALTER TABLE `site_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `site_projects`
--
ALTER TABLE `site_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `site_skills`
--
ALTER TABLE `site_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `site_work`
--
ALTER TABLE `site_work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `content`
--
ALTER TABLE `content`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `site_about`
--
ALTER TABLE `site_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `site_education`
--
ALTER TABLE `site_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `site_projects`
--
ALTER TABLE `site_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `site_skills`
--
ALTER TABLE `site_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `site_work`
--
ALTER TABLE `site_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
