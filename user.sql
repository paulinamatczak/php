-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Lis 2022, 20:39
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `galeria`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `user_fullname` varchar(128) COLLATE utf8mb4_polish_ci NOT NULL,
  `user_email` varchar(128) COLLATE utf8mb4_polish_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `data_utworzenia` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_password`, `username`, `data_utworzenia`) VALUES
(1, 'Jakub Kowalski', 'kowalskij@gmail.com', 'kowalski123', 'kowalskij', '2022-11-28'),
(2, 'Julia Ochocka', 'julia.ochocka@wp.pl', 'ochocka123', 'julia737', '2022-11-28'),
(3, 'Patryk Wesołowski', 'wesolowski@o2.pl', 'wesolowski123', 'p.wes22', '2022-11-28');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
