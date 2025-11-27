-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 27 2025 г., 21:16
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tarea3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `enemies`
--

CREATE TABLE `enemies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `isBoss` tinyint(1) NOT NULL DEFAULT 0,
  `health` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `enemies`
--

INSERT INTO `enemies` (`id`, `name`, `description`, `isBoss`, `health`, `strength`, `defense`, `img`) VALUES
(1, 'Enemigo1', 'que peligroso', 1, 100, 18, 100, 'img1'),
(2, 'Enemigo2', 'Menos mal', 0, 50, 8, 9, 'img2'),
(4, 'Enemigo3', 'uuuy', 0, 10, 1, 2, 'img3');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('weapon','armor','potion','misc') NOT NULL,
  `effect` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `type`, `effect`, `img`) VALUES
(1, 'item1', 'que guay', 'weapon', 5, 'el url'),
(2, 'Item2', 'El item más guapo que el item1', 'weapon', 7, 'url2'),
(3, 'item3', 'wow', 'armor', 4, 'url3'),
(6, 'item4', 'no puede ser..', 'weapon', 1, 'url4');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `enemies`
--
ALTER TABLE `enemies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `enemies`
--
ALTER TABLE `enemies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
