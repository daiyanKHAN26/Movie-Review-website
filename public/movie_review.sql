-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2021 at 09:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_07_27_163754_create_movies_table', 1),
(4, '2021_07_27_190313_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `cover_image`, `poster_image`, `created_at`, `updated_at`) VALUES
(1, 'The Matrix', 'Thomas Anderson, a computer programmer, is led to fight an underground war against powerful computers who have constructed his entire reality with a system called the Matrix.', 'matrix-banner.jpg', 'matrix-poster.jpeg', '2021-08-06 19:10:36', '2021-08-06 19:10:36'),
(2, 'F9', 'Dom Toretto is living the quiet life off the grid with Letty and his son, but they know that danger always lurks just over the peaceful horizon. This time, that threat forces Dom to confront the sins of his past to save those he loves most.', 'f9-banner.jpg', 'f9-poster.jpg', '2021-08-06 19:10:36', '2021-08-06 19:10:36'),
(3, 'The Suicide Squad', 'The government sends the most dangerous supervillains in the world -- Bloodsport, Peacemaker, King Shark, Harley Quinn and others -- to the remote, enemy-infused island of Corto Maltese.', 'suicide-banner.jpg', 'suicide-poster.jpg', '2021-08-06 19:12:00', '2021-08-06 19:12:00'),
(4, 'Shazam!', 'We all have a superhero inside of us -- it just takes a bit of magic to bring it out. In 14-year-old Billy Batsons case, all he needs to do is shout out one word to transform into the adult superhero Shazam', 'shazam-banner.jpg', 'shazam-poster.jpg', '2021-08-06 19:12:00', '2021-08-06 19:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(3,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `movie_id`, `body`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Favourite movie of all time', 4.5, '2021-08-06 14:13:11', '2021-08-06 15:05:12'),
(5, 1, 2, 'Its actually better than i thought', 3.5, '2021-08-06 15:08:43', '2021-08-06 15:09:05'),
(6, 1, 3, 'Phenomenally entertaining and a masterpiece!!!', 5.0, '2021-08-06 15:09:54', '2021-08-06 15:09:54'),
(3, 2, 1, 'Even though I heard the film received extremely and unbelievably negative reviews all over, I didn\'t change my mind and went for an afternoon show today in IMAX 3D. I found it enjoyable to the core as I didn\'t look for flaws or something even close to that. The audience turnout had also been quite lower than usual following the negative talk but I still enjoyed it like any other movie.', 5.0, '2021-08-06 14:39:52', '2021-08-06 14:39:52'),
(4, 3, 2, 'One of the things I love most about this movie is right from the start, it jumps right in.', 4.0, '2021-08-06 15:04:03', '2021-08-06 15:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'Johndoe@gmail.com', NULL, '$2y$10$DEj2F1XCslTkriEc6TSLlO7qcX8r6Btv7es8Q7sOffcCEUqufeyrO', NULL, '2021-08-06 13:43:07', '2021-08-06 13:43:07'),
(2, 'Random Name', 'random@gmail.com', NULL, '$2y$10$pixQ9yCDCajKHhgFFoRxbeHFcO2WiZkOGBB8e6YkA8AqzSinpyUm6', NULL, '2021-08-06 14:39:23', '2021-08-06 14:39:23'),
(3, 'Daiyan Khan', 'daiyankhan@gmail.com', NULL, '$2y$10$3jG5p1Eg7fE6GTRONcfeT.iGSY7ST8gbRjd5Ruj1ie/g8wgtXMztu', NULL, '2021-08-06 15:03:34', '2021-08-06 15:03:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
