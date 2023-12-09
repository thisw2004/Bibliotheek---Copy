-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 dec 2023 om 00:13
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `books`
--

CREATE TABLE `books` (
  `CatalogNumber` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `ISBN` int(200) NOT NULL,
  `IsBorrowed` tinyint(1) NOT NULL DEFAULT 0,
  `UserID` bigint(20) UNSIGNED DEFAULT NULL,
  `Author` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `books`
--

INSERT INTO `books` (`CatalogNumber`, `Title`, `Description`, `ISBN`, `IsBorrowed`, `UserID`, `Author`) VALUES
(11, 'De Avonturen van Alice in Wonderland', 'Een klassiek verhaal over een meisje dat een wonderbaarlijke wereld ontdekt.', 978, 0, NULL, 'Lewis Carroll'),
(12, 'De Grote Gatsby', 'Een verhaal over rijkdom, liefde en decadentie in de jaren 1920.', 978, 0, NULL, 'F. Scott Fitzgerald'),
(13, 'Honderd jaar eenzaamheid', 'Een epische saga over de opkomst en ondergang van de Buendía-familie.', 978, 0, NULL, 'Gabriel García Márquez'),
(14, 'De Hobbit', 'Het avontuur van Bilbo Baggins in Midden-aarde.', 978, 0, NULL, 'J.R.R. Tolkien'),
(15, 'Pride and Prejudice', 'Een romantisch verhaal over de zoektocht naar liefde en acceptatie.', 978, 0, NULL, 'Jane Austen'),
(16, '1984', 'Een dystopische visie op een totalitaire toekomstmaatschappij.', 978, 0, NULL, 'George Orwell'),
(17, 'To Kill a Mockingbird', 'Een aangrijpend verhaal over rassendiscriminatie in het zuiden van de VS.', 978, 0, NULL, 'Harper Lee'),
(18, 'The Catcher in the Rye', 'Het verhaal van de rebelse tiener Holden Caulfield in New York City.', 978, 0, NULL, 'J.D. Salinger'),
(19, 'The Great Expectations', 'Een coming-of-age verhaal over de weesjongen Pip en zijn grote verwachtingen.', 978, 0, NULL, 'Charles Dickens'),
(20, 'The Lord of the Rings', 'Een episch fantasyavontuur in de wereld van Midden-aarde.', 978, 0, NULL, 'J.R.R. Tolkien');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `uitleningen`
--

CREATE TABLE `uitleningen` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `DatumUitgeleend` datetime NOT NULL,
  `DatumIngeleverd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `uitleningen`
--

INSERT INTO `uitleningen` (`ID`, `UserID`, `BookID`, `DatumUitgeleend`, `DatumIngeleverd`) VALUES
(34237, 3, 11, '2023-12-03 00:27:57', '2023-12-24 00:27:57'),
(34238, 3, 11, '2023-12-03 00:29:38', '2023-12-24 00:29:38'),
(34239, 3, 11, '2023-12-03 00:33:33', '2023-12-24 00:33:33'),
(34240, 2, 11, '2023-12-06 00:06:42', '2023-12-27 00:06:42'),
(34241, 2, 11, '2023-12-06 00:06:44', '2023-12-27 00:06:44'),
(34242, 2, 11, '2023-12-06 00:06:46', '2023-12-27 00:06:46'),
(34243, 2, 11, '2023-12-06 00:06:49', '2023-12-27 00:06:49'),
(34244, 2, 11, '2023-12-06 00:06:51', '2023-12-27 00:06:51'),
(34245, 2, 11, '2023-12-06 00:06:53', '2023-12-27 00:06:53'),
(34246, 2, 11, '2023-12-06 00:06:55', '2023-12-27 00:06:55'),
(34247, 2, 13, '2023-12-06 00:07:23', '2023-12-27 00:07:23'),
(34248, 2, 14, '2023-12-06 00:07:30', '2023-12-27 00:07:30'),
(34249, 2, 16, '2023-12-06 00:13:30', '2023-12-27 00:13:30'),
(34250, 2, 12, '2023-12-06 00:17:16', '2023-12-27 00:17:16'),
(34251, 2, 11, '2023-12-06 00:20:29', '2023-12-27 00:20:29'),
(34252, 2, 13, '2023-12-06 00:21:37', '2023-12-27 00:21:37'),
(34253, 2, 14, '2023-12-06 00:23:10', '2023-12-27 00:23:10'),
(34254, 2, 16, '2023-12-06 00:24:42', '2023-12-27 00:24:42'),
(34255, 2, 11, '2023-12-06 00:28:49', '2023-12-27 00:28:49'),
(34256, 2, 11, '2023-12-06 00:29:44', '2023-12-27 00:29:44'),
(34257, 2, 11, '2023-12-06 00:31:49', '2023-12-27 00:31:49'),
(34258, 2, 11, '2023-12-06 00:36:18', '2023-12-27 00:36:18'),
(34259, 2, 11, '2023-12-06 00:36:26', '2023-12-27 00:36:26'),
(34260, 2, 11, '2023-12-06 00:36:59', '2023-12-27 00:36:59'),
(34261, 2, 14, '2023-12-06 00:37:08', '2023-12-27 00:37:08'),
(34262, 2, 14, '2023-12-06 00:37:13', '2023-12-27 00:37:13'),
(34263, 2, 14, '2023-12-06 00:39:10', '2023-12-27 00:39:10'),
(34264, 2, 14, '2023-12-06 00:41:48', '2023-12-27 00:41:48'),
(34265, 2, 11, '2023-12-06 01:00:43', '2023-12-27 01:00:43'),
(34266, 2, 11, '2023-12-10 00:10:55', '2023-12-31 00:10:55'),
(34267, 2, 12, '2023-12-10 00:13:01', '2023-12-31 00:13:01'),
(34268, 2, 11, '2023-12-10 00:13:11', '2023-12-31 00:13:11');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'test', 'test@test.nl', NULL, '$2y$10$9NUPkvsPv4DnxyB24wGCbuDYmdDluwseMeI0seo.nugg52Ys6imli', 'KxodqaDHHrYMponLUvIfgagDLFncvD587HYopcIZSIMM3ICRQ3W4XPFaw6Ba', '2023-11-25 18:09:10', '2023-11-25 18:09:10'),
(3, 'thirza', 'tdc.swijnenburg@student.avans.nl', NULL, '$2y$10$TH4dbj4sbDe4iXj7gguBBO69OqQez3lxApxGSu7239UDeCT6NqT82', 'w87AmUaK6WLXrrKmAIqI9RMnuRQt0ylJStnHlBOICK8vym8ZN1Zl6IikYHIJ', '2023-11-27 21:07:00', '2023-11-27 21:07:00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`CatalogNumber`),
  ADD KEY `Foreign_UserID` (`UserID`);

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexen voor tabel `uitleningen`
--
ALTER TABLE `uitleningen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `books`
--
ALTER TABLE `books`
  MODIFY `CatalogNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `uitleningen`
--
ALTER TABLE `uitleningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34269;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `Foreign_UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
