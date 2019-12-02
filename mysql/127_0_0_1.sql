-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 29 2019 г., 01:59
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_base`
--
CREATE DATABASE IF NOT EXISTS `my_base` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `my_base`;

-- --------------------------------------------------------

--
-- Структура таблицы `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `averageMark` float DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `workingDay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `members`
--

INSERT INTO `members` (`id`, `fullName`, `phone`, `email`, `role`, `averageMark`, `subject`, `workingDay`) VALUES
(1, 'Валера  Г', '01690169', 'yourtime@mail.ru', 3, NULL, NULL, 'Среда-Четверг'),
(2, 'Вениамин C', '04780478', 'venic@mail.ru', 2, NULL, 'php', NULL),
(3, 'Алекс B', '123123', 'Alex@mail.ru', 1, 4.5, NULL, NULL),
(4, 'Семен', '0987654', 'Semen@mail.ru', 3, NULL, NULL, 'Четверг'),
(6, 'Джонни', '098098', 'silver@mail.ru', 1, 9.5, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
