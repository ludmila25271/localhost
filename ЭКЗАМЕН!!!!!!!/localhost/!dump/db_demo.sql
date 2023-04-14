-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Апр 13 2023 г., 21:52
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_demo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(4, 'xbox'),
(5, 'наушники'),
(6, 'приставки'),
(7, 'игры'),
(8, 'зарядка');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `number` int DEFAULT NULL,
  `count` int DEFAULT NULL,
  `status` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `user_id`, `number`, `count`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(21, 0, 3, 1247902945, 1, 'Отменённый', 'апуып', '2023-04-13 18:26:05', '2023-04-13 18:50:25'),
(22, 2, 3, NULL, 1, NULL, NULL, '2023-04-13 18:37:55', '2023-04-13 18:37:55'),
(23, 5, 1, NULL, 1, NULL, NULL, '2023-04-13 18:48:45', '2023-04-13 18:48:45');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `country` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int NOT NULL,
  `path` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `country`, `model`, `category`, `count`, `path`, `created_at`) VALUES
(1, 'Мытье окон', 1000, 'Мойка окон и лоджий в квартире - цена от 400 рублей за окно\r\n*Мойка окон для юр лиц. Витражные и офисные окна - цена от 70 руб м.кв', '', 'Мытье окон', 32, '', '2023-04-13 18:24:11'),
(2, 'Услуги уборки', 2000, 'Генеральная уборка квартир * Уборка после ремонта  * Уборка запущенных квартир *Генеральная уборка кухни *Уборка ванной комнаты *Уборка после потопа', '', 'Уборка', 54, '', '2023-04-13 18:35:40'),
(3, 'Услуги Химчистки', 1500, 'Химчистка диванов на дому* Химчистка дивана от запаха* Химчистка кожаной мебели* Химчистка матрасов с выездом на дом* Химчистка кресла на дому*  Химчистка стульев (офисных)* ', '', 'Химчистка', 55, '', '2023-04-13 18:39:55'),
(4, 'Чистка(мойка) бассейна', 1500, 'Согласно действующим нормам, открытые бассейны должны убираться минимум раз в год, закрытые убирают в год 3 раза. А вот дезинфекцию лавочек, туалетов, дорожек, раздевалок, урн, туалетов и душевых кабин нужно проводить каждый день. Важно грамотно выбрать моющие составы для каждого процесса, иначе результат может оказаться некачественным. Мы поможем почистить поверхности от налета, любых типов загрязнений.', '', 'Бассейн', 22, '', '2023-04-13 18:41:20'),
(5, 'Мойка зданий', 5500, 'Мойка фасада – это трудоемкая работа, которую сложно проводить самостоятельно даже при наличии современного оснащения. Гораздо проще доверить эту задачу нашей службе. Заказывая мойку стен у нас, Вы получаете гарантию на услуги. ', '', 'Мойка зданий', 54, '', '2023-04-13 18:42:27');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `role`) VALUES
(1, 'Ад', 'мини', 'стратор', 'admin', 'gmail@mail.ru', 'admin77', 'admin'),
(3, 'Елена', 'Калабухина', 'Святославовна', 'romanovaelena2003', 'romanovaelena2003@mail.ru', 'gust77', 'client'),
(4, 'аааа', 'ааа', 'ааа', 'olya', 'jdjdndhdh@list.ru', '151515', 'client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
