-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 29 2023 г., 13:54
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Zak`
--

-- --------------------------------------------------------

--
-- Структура таблицы `information`
--

CREATE TABLE `information` (
  `id` int NOT NULL,
  `Nam` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Dat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `New_dat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` bit(3) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `information`
--

INSERT INTO `information` (`id`, `Nam`, `Dat`, `New_dat`, `Status`) VALUES
(1, 'Zak', '2023-08-29 13:30:57', '2023-08-29 13:52:03', b'001'),
(2, 'Igor', '2023-08-29 13:31:06', '2023-08-29 13:45:12', b'001'),
(3, 'Slava', '2023-08-29 13:45:21', '2023-08-29 13:46:28', b'001'),
(4, 'Nastia', '2023-08-29 13:52:28', '2023-08-29 13:52:28', b'000');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `information`
--
ALTER TABLE `information`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
