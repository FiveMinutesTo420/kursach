-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2023 г., 16:05
-- Версия сервера: 8.0.29
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zoo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `item_id`, `count`, `created_at`, `updated_at`, `order_id`) VALUES
(4, 8, 26, 1, '2023-03-23 13:24:05', '2023-04-09 14:17:24', 1),
(8, 8, 27, 1, '2023-04-03 04:29:05', '2023-04-09 14:17:24', 1),
(10, 8, 54, 14, '2023-04-09 13:48:19', '2023-04-09 13:48:19', 3),
(11, 8, 33, 2, '2023-04-09 14:48:39', '2023-04-09 23:39:26', 2),
(12, 8, 34, 1, '2023-04-09 14:50:19', '2023-04-09 14:50:39', 2),
(13, 8, 34, 1, '2023-04-09 23:40:46', '2023-04-09 23:41:29', 3),
(14, 8, 27, 1, '2023-04-10 00:21:14', '2023-04-10 00:31:30', 4),
(15, 8, 30, 1, '2023-04-10 00:32:46', '2023-04-10 00:32:50', 6),
(16, 8, 53, 4, '2023-04-10 00:41:55', '2023-04-10 01:11:26', 10),
(19, 8, 33, 9, '2023-04-10 01:14:55', '2023-04-12 23:19:01', 11),
(20, 8, 53, 1, '2023-04-10 01:15:58', '2023-04-12 23:19:01', 12),
(21, 8, 27, 8, '2023-04-12 23:18:28', '2023-04-12 23:19:01', 13),
(22, 8, 33, 1, '2023-04-12 23:20:16', '2023-04-12 23:20:28', 14),
(23, 8, 52, 1, '2023-04-12 23:20:24', '2023-04-12 23:20:28', 15),
(24, 8, 49, 1, '2023-04-12 23:22:14', '2023-04-12 23:22:24', 16),
(25, 8, 53, 1, '2023-04-12 23:22:20', '2023-04-12 23:22:24', 16),
(27, 8, 26, 1, '2023-04-17 03:40:19', '2023-04-17 03:40:23', 17),
(28, 8, 52, 5, '2023-04-17 03:45:37', '2023-04-17 03:46:23', 18),
(29, 8, 54, 4, '2023-04-17 03:46:02', '2023-04-17 03:46:23', 18),
(30, 8, 26, 1, '2023-04-17 03:48:01', '2023-04-17 03:58:05', 19),
(31, 10, 26, 1, '2023-04-17 04:04:54', '2023-04-17 04:04:58', 20),
(32, 10, 1, 1, '2023-04-17 05:23:37', '2023-04-17 05:23:41', 21),
(33, 8, 57, 3, '2023-10-23 01:40:00', '2023-10-23 01:54:38', 22),
(34, 8, 57, 1, '2023-10-23 02:22:06', '2023-10-23 02:22:16', 23),
(36, 8, 64, 1, '2023-10-30 05:16:15', '2023-12-18 06:00:59', 24);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Барная посуда', '37955023_1241186566024135_1894065381941706752_n-24x24.jpg'),
(2, 'Посуда для праздников', '11-24x24.png'),
(3, 'Товары для сервировки', 'categorygigiena-24x24.png'),
(4, 'Столовый текстиль', '38030470_282333842555197_2641525670110298112_n-24x24.jpg'),
(5, 'Декор стола\n', 'vetfood-24x24.png');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_30_073045_create_kind_animals_table', 2),
(6, '2023_01_30_072032_create_categories_table', 2),
(7, '2023_01_30_072209_create_sub_categories_table', 2),
(8, '2023_01_30_072509_create_products_table', 2),
(9, '2023_01_31_140330_add_image_column_to_categories_table', 3),
(10, '2023_02_01_132607_add_image_column_to_sub_categories_table', 4),
(11, '2023_02_01_135216_add_image_column_to_products_table', 5),
(12, '2023_02_09_014056_add_columns_to_users_table', 6),
(14, '2023_03_12_140200_create_carts_table', 7),
(15, '2023_04_03_072618_add_status_column_to_users_table', 8),
(16, '2023_04_09_162204_add_status_columng_to_users_table', 9),
(17, '2023_04_09_163103_create_orders_table', 10),
(18, '2023_04_09_163821_add_orderid_column_to_carts_table', 11),
(19, '2023_04_09_164556_change_orderid_column_to_carts_table', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Новый',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(23, 8, 'Новый', NULL, '2023-10-23 02:22:16', '2023-10-23 02:22:16');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED DEFAULT NULL,
  `kind_of_animal` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `in_stock`, `category_id`, `sub_category_id`, `kind_of_animal`, `created_at`, `updated_at`) VALUES
(57, 'Графин', 'Графин — широкий книзу стеклянный или хрустальный прозрачный сосуд с длинным узким горлом, закрывающимся незакреплённой пробкой. Графин используется для подачи и хранения воды и напитков, в том числе крепких алкогольных — водки, коньяка, настоек, а также для декантации вина. Вместимость графина от 100 до 1000 см3.', 1234, 'decante-1.png', 8, 1, 1, NULL, NULL, '2023-10-23 02:22:06'),
(58, 'Кружка Basic Pasabahce', 'Турецкая компания Pasabahce существует на мировом рынке уже полвека и успешно реализует стеклянную посуду более чем в ста странах мира. Современный дизайн, доступные цены и высокое качество стеклянных изделий позволили этой марке завоевать популярность и у барменов, и у домохозяек. Кружка Pasabahce выполнена из упрочненного непористого стекла. Прозрачная кружка классической формы подчеркнет насыщенность цвета и яркость вкуса любимого напитка. Кружка практична, проста в уходе и удобна в эксплуатации. Ее можно мыть в посудомоечной машине и использовать в микроволновой печи.', 89, '7332f047814529bc4ac9e58d7b80ea13.webp', 10, 3, 20, NULL, NULL, NULL),
(59, 'Кружка 330мл керамика', '', 129, '614b72673adb00648e8d07e13bbd033f.webp', 10, 3, 20, NULL, NULL, NULL),
(60, 'Кружка 385мл LUCKY', '', 299, 'f273d23ed13b4c624b944295791bd512.webp', 9, 3, 20, NULL, NULL, '2023-10-30 05:16:12'),
(63, 'Кружка 320мл TULU PORSELEN DENIZ ', '', 149, 'b458bb2c0a049fd6301d5156887b22b3.webp', 10, 3, 20, NULL, NULL, NULL),
(64, 'Кружка 410мл Капли ', '', 129, '65f09593076abc8581638a1395afad4d.webp', 9, 3, 20, NULL, NULL, '2023-10-30 05:16:15'),
(65, 'Ваза-конфетница на ножке 15см', '', 379, '130dec7f3f4bc3e218fd08353a33b124.webp', 10, 5, 14, NULL, NULL, NULL),
(66, 'Блюдо 33см EFE glass', '', 699, '7adebb528a7f27f0a80a1f0090838d78.webp', 10, 5, 14, NULL, NULL, NULL),
(67, 'Блюдо (ляган) 34см RISHTON', '', 799, 'ebb7406615dfc53ab9b9d69653cb20ca.webp', 10, 5, 14, NULL, NULL, NULL),
(68, 'Блюдо 35см EFE glass', '', 799, '01fb2e7525a99cfa68dd1d9c268c4c9a.webp', 10, 5, 14, NULL, NULL, NULL),
(69, 'Ваза-конфетница 17см EFE glass ', '', 229, '020b008587d7cfcb67d1fc960d2cd5d5.webp', 10, 5, 14, NULL, NULL, NULL),
(70, 'СТАКАНЫ БУМАЖНЫЕ МОНСТРИКИ 200МЛ 6ШТ', '', 65, '6078775.jpg', 10, 2, NULL, NULL, NULL, NULL),
(71, 'ТАРЕЛКИ БУМАЖНЫЕ ДИНОЗАВРЫ 6 ШТ', '', 61, '6078768.jpg', 10, 2, NULL, NULL, NULL, NULL),
(72, 'СТАКАНЫ БУМАЖНЫЕ МИШКИ 200МЛ 6 ШТ', '', 52, '6078799.jpg', 10, 2, NULL, NULL, NULL, NULL),
(73, 'СТАКАНЫ БУМАЖНЫЕ КАВАИ 200МЛ 6 ШТ', '', 52, '6078782.jpg', 10, 2, NULL, NULL, NULL, NULL),
(74, 'ТАРЕЛКИ БУМАЖНЫЕ ЛАМИНИРОВАННЫЕ 18СМ 6ШТ', '', 70, '6056285.jpg', 10, 2, NULL, NULL, NULL, NULL),
(77, 'Графин 900мл LUCKY', '', 1299, '1972028d32da7d3494bb6f044e74cc12.webp', 10, 1, 1, NULL, NULL, NULL),
(78, 'Графин 650мл LUCKY с бамбуковой крышкой', '', 999, '99e8d291baf876786491c9d978da9f63.webp', 10, 1, 1, NULL, NULL, NULL),
(79, 'Графин 1л LUCKY Янтарь', '', 1199, '3f4f7d7ebca4662098ab5518be3c6b5f.webp', 10, 1, 1, NULL, NULL, NULL),
(80, 'BACCHUS Графин 1л PASABAHCE', '', 299, '0b4d5b16d7c16c1b44463078c16d2b16.webp', 10, 1, 1, NULL, NULL, NULL),
(81, 'Скатерть из хлопка с пропиткой', '', 4249, '3ee4d1c2e1597e8a7f0d7dcb4e7eef1d.webp', 10, 4, NULL, NULL, NULL, NULL),
(82, 'Дорожка столовая с пропиткой против пятен', '', 799, '3d6c0d579b4768d77f33111fa4f4aac6.webp', 10, 4, NULL, NULL, NULL, NULL),
(83, 'Комплект из 4 столовых салфеток, Winter berry', '', 2849, '19248d6bbae6050df604480946654620.webp', 10, 4, NULL, NULL, NULL, NULL),
(84, 'Скатерть круглая из жатого полиэстера CERYAS', '', 2099, '7350db7c3c6cd5813be4ff6acbd1bcb8.webp', 10, 4, NULL, NULL, NULL, NULL),
(85, 'Комплект из двух подложек под столовые приборы из поликотона, Augusta', '', 1599, '6cf8ff68023be16b6bf5f14aec7726b5.webp', 10, 4, NULL, NULL, NULL, NULL),
(86, 'Блюдо сервировочное DE\'NASTIA ', '', 799, 'e6898d6a68a95690d46ab69a669e2672.webp', 10, 3, 19, NULL, NULL, NULL),
(87, 'Блюдо овальное 31,5см бежевый', '', 349, '57953a6e8863de6bd8271f46b9a07743.webp', 10, 3, 19, NULL, NULL, NULL),
(88, 'Блюдо сервировочное 25-29см GLASSCOM', '', 499, 'aec214e5be0964fd3d8bcc7af78990cd.webp', 10, 3, 19, NULL, NULL, NULL),
(89, 'Блюдо сервировочное 25см GLASSCOM', '', 499, '9d19bb78a66fe9938d4715a7930665e6.webp', 10, 3, 19, NULL, NULL, NULL),
(90, 'Блюдо овальное 29см CMIELOW', '', 1449, '230231fa13b4f2579e7715082c32da1c.jpg', 10, 3, 19, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `image`) VALUES
(1, 'Графины', 1, '6344_0-1000x1340-120x120.jpg'),
(2, 'Кувшины', 1, '5666645-120x120.png'),
(14, 'Блюда, вазы', 5, '_вет-120x120.jpg'),
(15, 'Сервировка', 5, 'Ветеринарная диета для кошек'),
(19, 'Блюда', 3, ''),
(20, 'Кружки', 3, '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `number`, `country`, `region`, `city`, `postcode`, `address`) VALUES
(1, 'Айаал', 'Федоров', 'aiaal8964@mail.ru', 1, NULL, '135964Ww', '135964Ww', '2023-02-28 12:20:50', '2023-02-14 12:20:50', '79644291882', 'Russia', 'bddg', 'wrwe', 677001, 'dfgdf'),
(2, 'Айаал', 'Федоров', 'aiaal89641@mail.ru', 1, NULL, '$2y$10$X/IolW9N5wusMzq6y3qp8.a4l4lJiod5LNwDgjrsnebkRFeIxSiT.', NULL, '2023-02-10 11:30:07', '2023-02-10 11:30:07', '79644291882', 'Russia', 'Владимировка', 'Якутск', 124124, '124124'),
(3, 'Айаал', 'Федоров', 'aiaal23017@mail.ru', 1, NULL, '$2y$10$9ZW6kdwC1hD3qxKgPqcb0.H2JA0v9nukp7FhZUBPoSMDsfXAaovra', NULL, '2023-02-10 11:33:24', '2023-02-10 11:33:24', '1', 'Russia', 'Жатай', '1', 1, '1'),
(4, 'Bob', 'Odenkirk', 'bob@mail.ru', 1, NULL, '$2y$10$vRNRWeRLf2HuzWdNg2IJb.UOh/Lc9r18zjLq2abmXe1gtyDNRrAWG', NULL, '2023-02-10 12:35:07', '2023-02-10 12:35:07', '123123123', 'Russia', 'Покровск', '123432', 1234, '12312'),
(5, 'Айаал', 'Федоров', 'admin@mail.ru', 1, NULL, '$2y$10$HIIbDvtinZvAO9J9rYzUbeqwTgK7PF96x7UY35YE/Bro.g4L.B3ny', NULL, '2023-02-23 11:18:18', '2023-02-23 11:18:18', '79644291882', 'Russia', 'Якутск', 'Якутск', 677000, 'ул.Пушкина 23 кв4'),
(6, 'Айаал', 'Федоров', 'aaa@mail.ru', 1, NULL, '$2y$10$VtNQ7ykH.pE0tXAFBojjZOtCA4Cy.02ZSY/9in05aF6/uvrJi5J8q', NULL, '2023-03-03 04:17:17', '2023-03-03 04:17:17', '79644291882', 'Russia', 'Якутск', 'Якутск,Россия', 677001, '12312'),
(7, 'Алексей', 'Федоров', 'aiaal2017@mail.ru', 1, NULL, '$2y$10$d8bDuO2CQF6C.TRH/tc4mOLJjAOr9L4bKmKGIxU2NpYPIRqMuhvPe', NULL, '2023-03-08 11:28:48', '2023-03-08 11:28:48', '79644291882', 'Russia', 'Якутск', 'Якутск,Россия', 677001, '123'),
(8, 'Misato', 'Katsuragi', '1359@mail.ru', 2, NULL, '$2y$10$suRApFzWWUIo0KC9ADBIWeSYrpMtCHmxr8rR/FQ/wihF/XzfbmmSC', NULL, '2023-03-12 10:23:52', '2023-03-12 10:23:52', '1242343243', 'Russia', 'Кангалассы', '677001', 13123, '123'),
(9, 'sdf', 'sdf', 'fsdfsd@rwer', 1, NULL, '$2y$10$m5NHfGHmdT7HUdVlnA96Z.QRz8Baik2WcFvJU1SHuM9Vr6P3YTzI6', NULL, '2023-04-17 03:56:37', '2023-04-17 03:56:37', '4234', 'Не выбрано', 'Не выбрано', 'gdfg', 42344, 'rwer'),
(10, 'SOUP', 'Soup', 'xvxsoupj@gmail.com', 1, NULL, '$2y$10$AM2aB1dNtUVkjXVNlGq34uPhplLcG7G9zEghpZv5Dc49q8CkT9QrK', NULL, '2023-04-17 04:04:35', '2023-04-17 04:04:35', '999999', 'Russia', 'Кангалассы', 'Якутск', 677000, 'ул12312');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT для таблицы `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
