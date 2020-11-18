-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 18 2020 г., 14:11
-- Версия сервера: 8.0.22-0ubuntu0.20.04.2
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `faculty`
--

CREATE TABLE `faculty` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `datetime`) VALUES
(1, 'Факультет будівництва та архітектури', '2020-11-15 22:17:41'),
(2, 'Факультет музичного мистецтва', '2020-11-15 22:17:41'),
(3, 'Факультет інформаційних технологій', '2020-11-15 22:17:41');

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE `group` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `group`
--

INSERT INTO `group` (`id`, `name`) VALUES
(1, '17'),
(2, '17A'),
(3, '18');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `age` tinyint NOT NULL,
  `floor` tinyint(1) NOT NULL,
  `group_id` tinyint NOT NULL,
  `faculty_id` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `age`, `floor`, `group_id`, `faculty_id`) VALUES
(19, 'First Name 1', 'Last Name 1', 21, 1, 2, 2),
(20, 'First Name 2', 'Last Name 2', 22, 0, 1, 1),
(21, 'First Name 3', 'Last Name 3', 23, 1, 2, 2),
(22, 'First Name 4', 'Last Name 4', 24, 0, 1, 1),
(23, 'First Name 5', 'Last Name 5', 25, 1, 1, 1),
(24, 'First Name 6', 'Last Name 6', 26, 0, 2, 2),
(25, 'First Name 7', 'Last Name 7', 27, 1, 1, 2),
(26, 'First Name 1', 'Last Name 1', 21, 1, 2, 2),
(27, 'First Name 2', 'Last Name 2', 22, 0, 1, 1),
(28, 'First Name 3', 'Last Name 3', 23, 1, 2, 2),
(29, 'First Name 4', 'Last Name 4', 24, 0, 1, 1),
(30, 'First Name 5', 'Last Name 5', 25, 1, 1, 1),
(31, 'First Name 6', 'Last Name 6', 26, 0, 2, 2),
(32, 'First Name 7', 'Last Name 7', 27, 1, 1, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
