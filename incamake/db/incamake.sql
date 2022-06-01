-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 06:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `incamake`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL DEFAULT '',
  `thumbnail` varchar(200) NOT NULL DEFAULT '',
  `website` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `unique_id`, `title`, `link`, `thumbnail`, `website`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ij67g8kkq5q', 'Adele aryohewe mu rukundo n’umugabo bamaze iminsi bacuditse', 'https://igihe.com/imyemerere/article/adele-aryohewe-mu-rukundo-n-umugabo-bamaze-iminsi-bacuditse', 'https://igihe.com/local/cache-gd2/a7/eac3eb53833287b3d8592918f201b0.jpg?1653231825', 2, 'ACTIVE', '2022-05-22 17:23:26', '2022-05-22 17:23:26'),
(2, '1hbg3x20gr5a', 'Karongi: Abarenga 20 batawe muri yombi bakekwaho ubujura', 'https://igihe.com/amakuru/u-rwanda/article/karongi-abarenga-20-batawe-muri-yombi-bakekwaho-ubujura', 'https://igihe.com/local/cache-gd2/5a/a560f1140618a7ac226a713b090bf9.jpg?1653230364', 2, 'ACTIVE', '2022-05-22 17:23:26', '2022-05-22 17:23:26'),
(3, '2m5g26ftflv2', 'Apple ishobora kwagurira ibikorwa byayo hanze y’u Bushinwa', 'https://igihe.com/ikoranabuhanga/article/apple-ishobora-kwagurira-ibikorwa-byayo-hanze-y-u-bushinwa', 'https://igihe.com/local/cache-gd2/ce/a64dcc927e8377f60ffe7e3c4e31e4.jpg?1653226787', 2, 'ACTIVE', '2022-05-22 17:23:26', '2022-05-22 17:23:26'),
(4, 'fiw3g6ip9bu', 'IFOTO Y&#8217;UMUNSI:Perezida Kagame yigaragaje cyane mu mukino wa Basketball', 'http://umuryango.rw/imyidagaduro/imikino/article/ifoto-y-umunsi-perezida-kagame-yigaragaje-cyane-mu-mukino-wa-basketball', 'http://umuryango.rw/local/cache-vignettes/L600xH374/arton63344-f61e3.jpg', 3, 'ACTIVE', '2022-05-22 17:23:38', '2022-05-22 17:23:38'),
(5, '1x7xq74aiet6', 'Umuyobozi wungirije wa RGB yatawe muri yombi', 'http://umuryango.rw/amakuru/mu-rwanda/umutekano/article/umuyobozi-wungirije-wa-rgb-yatawe-muri-yombi', 'http://umuryango.rw/local/cache-vignettes/L300xH200/arton63361-46bb5.jpg', 3, 'ACTIVE', '2022-05-22 17:23:38', '2022-05-22 17:23:38'),
(6, '27iw1nsgnn96', 'Mu mafoto atandukanye irebere uburanga bw’Umugore wigaruriye umutima wa Harmonize', 'http://umuryango.rw/imyidagaduro/article/mu-mafoto-atandukanye-irebere-uburanga-bw-umugore-wigaruriye-umutima-wa', 'http://umuryango.rw/local/cache-vignettes/L350xH133/arton63358-fdfa6.jpg', 3, 'ACTIVE', '2022-05-22 17:23:38', '2022-05-22 17:23:38'),
(7, '2fft02of9yey', 'Bugesera:Umupfumu yubatse umuhanda mu rwego rwo kwitura Igihugu(AMAFOTO)', 'http://umuryango.rw/imyidagaduro/article/bugesera-umupfumu-yubatse-umuhanda-mu-rwego-rwo-kwitura-igihugu', 'http://umuryango.rw/local/cache-vignettes/L350xH180/arton63359-6d654.jpg', 3, 'ACTIVE', '2022-05-22 17:23:38', '2022-05-22 17:23:38'),
(14, '5hk43wak12dd', 'Umuyobozi wungirije wa RGB yatawe muri yombi &#8211; Ibyo ashinjwa n&#8217;uko byagenze', 'https://umuseke.rw/2022/05/437773/', 'https://secureservercdn.net/198.71.233.148/p3g.7a0.myftpupload.com/wp-content/uploads/2022/05/48914756076_e909952d07_c-35771-750x604.jpeg', 1, 'ACTIVE', '2022-05-22 18:01:05', '2022-05-22 18:01:05'),
(15, '6hogj8y6exc1', 'Rwamagana: Umukozi yibye shebuja amafaranga, afatwa amaze kwikenura', 'https://umuseke.rw/2022/05/rwamagana-umukozi-yibye-shebuja-amafaranga-afatwa-amaze-kwikenura/', 'https://secureservercdn.net/198.71.233.148/p3g.7a0.myftpupload.com/wp-content/uploads/2022/05/Rwamagana.jpg?time=1653234176', 1, 'ACTIVE', '2022-05-22 18:01:05', '2022-05-22 18:01:05'),
(16, '6pz4bxdtdrnl', 'Perezida Félix Tshisekedi yakiranywe urugwiro i Bujumbura -AMAFOTO', 'https://umuseke.rw/2022/05/perezida-felix-tshisekedi-yakiranywe-urugwiro-i-bujumbura-amafoto/', 'https://secureservercdn.net/198.71.233.148/p3g.7a0.myftpupload.com/wp-content/uploads/2022/05/FTTJdhgXoAcmf6m-750x500.jpg', 1, 'ACTIVE', '2022-05-22 18:01:05', '2022-05-22 18:01:05'),
(20, '4fmdzxqxd4xa', 'Nyabihu: Abanyamuryango ba Koperative KOGUGU barashinja akarere kubariganya imitungo yabo no kubahombya', 'https://bwiza.com/./?Nyabihu-Abanyamuryango-ba-Koperative-KOGUGU-barashinja-akarere-kubariganya', 'https://bwiza.com/local/cache-gd2/61/363a5df49474c497b10e88352becfd.jpg?1653202886', 4, 'ACTIVE', '2022-05-22 18:22:06', '2022-05-22 18:22:06'),
(21, '6j8d7u50ssha', 'Gakenke: Barashinja uwo bavuga ko ari mushiki wa Minisitiri w’Intebe kubateza inzara n’igihombo gikabije', 'https://bwiza.com/./?Gakenke-Barashinja-uwo-bavuga-ko-ari-mushiki-wa-Minitiri-w-Intebe-kubateza', 'https://bwiza.com/local/cache-gd2/3d/18e51750aa66f6f865d8d45d35d1f8.jpg?1653069289', 4, 'ACTIVE', '2022-05-22 18:22:06', '2022-05-22 18:22:06'),
(22, '771z8icv9f2m', 'Perezida Kagame yayoboye Inama Nkuru y’Ubuyobozi bw’Ingabo z’u Rwanda (Amafoto)', 'https://bwiza.com/./?Perezida-Kagame-yayoboye-Inama-Nkuru-y-Ubuyobozi-bw-Ingabo-z-u-Rwanda-Amafoto', 'https://bwiza.com/local/cache-gd2/2b/5b52eb7099975d5f68a750b314fc8c.jpg?1653067092', 4, 'ACTIVE', '2022-05-22 18:23:42', '2022-05-22 18:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL DEFAULT '',
  `thumbnail` varchar(200) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `name`, `link`, `thumbnail`, `created_at`, `update_at`) VALUES
(1, 'Umuryango', 'https://umuryango.rw/', 'https://umuryango.rw/images/LOGO_MWIZA_2.png', '2022-05-22 17:31:02', '2022-05-22 17:31:02'),
(2, 'Igihe', 'https://igihe.com/', 'https://igihe.com/IMG/arton151116.png?1620891831', '2022-05-22 17:29:37', '2022-05-22 17:29:37'),
(3, 'Umuseke', 'https://umuseke.rw/', 'https://secureservercdn.net/198.71.233.148/p3g.7a0.myftpupload.com/wp-content/uploads/2022/05/Logo_Umuseke-small2.png', '2022-05-22 17:30:08', '2022-05-22 17:30:08'),
(4, 'Bwiza', 'https://bwiza.com/', 'https://bwiza.com/assets/img/bwiza-logo.jpg', '2022-05-22 17:30:08', '2022-05-22 17:30:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
