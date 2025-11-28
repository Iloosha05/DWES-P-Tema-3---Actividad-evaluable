-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Сервер: 127.0.0.1
-- Время создания: 2025-11-27

CREATE DATABASE IF NOT EXISTS tarea3
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE tarea3;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET NAMES utf8mb4 */;

DROP TABLE IF EXISTS `enemies`;
DROP TABLE IF EXISTS `items`;

CREATE TABLE `enemies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `isBoss` tinyint(1) NOT NULL DEFAULT 0,
  `health` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `enemies` (`id`, `name`, `description`, `isBoss`, `health`, `strength`, `defense`, `img`) VALUES
(1, 'Enemigo1', 'que peligroso', 1, 100, 18, 100, 'img1'),
(2, 'Enemigo2', 'Menos mal', 0, 50, 8, 9, 'img2'),
(4, 'Enemigo3', 'uuuy', 0, 10, 1, 2, 'img3');

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('weapon','armor','potion','misc') NOT NULL,
  `effect` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `items` (`id`, `name`, `description`, `type`, `effect`, `img`) VALUES
(1, 'item1', 'que guay', 'weapon', 5, 'el url'),
(2, 'Item2', 'El item más guapo que el item1', 'weapon', 7, 'url2'),
(3, 'item3', 'wow', 'armor', 4, 'url3'),
(6, 'item4', 'no puede ser..', 'weapon', 1, 'url4');

