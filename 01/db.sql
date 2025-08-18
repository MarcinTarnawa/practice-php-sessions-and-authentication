-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2025 at 09:02 AM
-- Wersja serwera: 8.0.42
-- Wersja PHP: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sort`
--

CREATE TABLE `sort` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_0900_as_cs NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

--
-- Zrzut danych tabeli `sort`
--

INSERT INTO `sort` (`id`, `name`, `price`) VALUES
(1, 'Kawa', 20),
(2, 'Cukier', 10),
(5, 'Mleko', 5),
(6, 'Pieczywo', 3),
(7, 'Sok', 15),
(8, 'Arbuz', 17);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `sort`
--
ALTER TABLE `sort`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `sort`
--
ALTER TABLE `sort`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
