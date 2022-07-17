-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 17 2022 г., 14:51
-- Версия сервера: 8.0.26-16
-- Версия PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hackathon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `compilations`
--

CREATE TABLE `compilations` (
  `id` int NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `object_ids` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `deals`
--

CREATE TABLE `deals` (
  `id` int NOT NULL,
  `compl_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `object_id` int DEFAULT NULL,
  `tags` text,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE `links` (
  `id` int NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `object_ids` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `uniq` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `objects`
--

CREATE TABLE `objects` (
  `id` int NOT NULL,
  `external_id` int NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `advantages` text,
  `address` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `rooms_count` int DEFAULT NULL,
  `filter_type` int DEFAULT NULL,
  `flat_decoration` text,
  `parking` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `territory` varchar(255) DEFAULT NULL,
  `commerce` varchar(255) DEFAULT NULL,
  `ceiling` decimal(10,0) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `types` text,
  `districts` varchar(255) DEFAULT NULL,
  `territory_with_house` tinyint(1) DEFAULT NULL,
  `balcony` tinyint(1) DEFAULT NULL,
  `humanized_type` varchar(255) DEFAULT NULL,
  `communications` text,
  `humanized_name` varchar(255) DEFAULT NULL,
  `object` varchar(255) DEFAULT NULL,
  `object_url` varchar(255) DEFAULT NULL,
  `liter_name` varchar(255) DEFAULT NULL,
  `liter_number` int DEFAULT NULL,
  `floor_number` int DEFAULT NULL,
  `humanized_ready_date` varchar(255) DEFAULT NULL,
  `hide_price` tinyint(1) DEFAULT NULL,
  `full_price` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `sale_price` int DEFAULT NULL,
  `meter_price` int DEFAULT NULL,
  `detail_page_url` varchar(255) DEFAULT NULL,
  `reserved` tinyint(1) DEFAULT NULL,
  `similar_count` int DEFAULT NULL,
  `parameters_icon` text,
  `property_sale_price` text,
  `property_sale_badge` text,
  `square` text,
  `living` text,
  `floor` text,
  `kitchen` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `visited`
--

CREATE TABLE `visited` (
  `id` int NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `link_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visit_data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `compilations`
--
ALTER TABLE `compilations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uuid` (`uuid`);

--
-- Индексы таблицы `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compl_id` (`compl_id`),
  ADD KEY `uuid` (`uuid`),
  ADD KEY `object_id` (`object_id`);

--
-- Индексы таблицы `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq` (`uniq`),
  ADD KEY `uuid` (`uuid`);

--
-- Индексы таблицы `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `external_id` (`external_id`);

--
-- Индексы таблицы `visited`
--
ALTER TABLE `visited`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_id` (`link_id`),
  ADD KEY `uuid` (`uuid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `compilations`
--
ALTER TABLE `compilations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `deals`
--
ALTER TABLE `deals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `links`
--
ALTER TABLE `links`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `visited`
--
ALTER TABLE `visited`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
