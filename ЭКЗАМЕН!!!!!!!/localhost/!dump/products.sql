-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Апр 13 2023 г., 21:54
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
-- База данных: `Base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `country`, `model`, `category`, `count`, `created_at`) VALUES
(1, 'Мытье окон', '1000', 'Мойка окон и лоджий в квартире - цена от 400 рублей за окно\r\n*Мойка окон для юр лиц. Витражные и офисные окна - цена от 70 руб м.кв', '', 'Мытье окон', 7, '2023-04-13 12:08:34'),
(2, 'Услуги уборки', '1000', 'Генеральная уборка квартир * Уборка после ремонта  * Уборка запущенных квартир *Генеральная уборка кухни *Уборка ванной комнаты *Уборка после потопа', '', 'Уборка', 10, '2023-04-13 12:21:09'),
(3, 'Услуги по химчистке', '1500', 'Химчистка диванов на дому* Химчистка дивана от запаха* Химчистка кожаной мебели* Химчистка матрасов с выездом на дом* Химчистка кресла на дому*  Химчистка стульев (офисных)* ', '\r\n\r\n', 'Химчистка', 10, '2023-04-13 12:38:45'),
(4, 'Чистка(мойка) бассейна', '3000', 'Согласно действующим нормам, открытые бассейны должны убираться минимум раз в год, закрытые убирают в год 3 раза. А вот дезинфекцию лавочек, туалетов, дорожек, раздевалок, урн, туалетов и душевых кабин нужно проводить каждый день. Важно грамотно выбрать моющие составы для каждого процесса, иначе результат может оказаться некачественным. Мы поможем почистить поверхности от налета, любых типов загрязнений.', '', 'Чистка бассейна', 50, '2023-04-13 16:56:09'),
(5, 'Мойка фасадов зданий', '1550', 'Мойка фасада – это трудоемкая работа, которую сложно проводить самостоятельно даже при наличии современного оснащения. Гораздо проще доверить эту задачу нашей службе. Заказывая мойку стен у нас, Вы получаете гарантию на услуги. ', '', 'Мойка фасадов зданий', 15, '2023-04-13 16:57:15'),
(6, 'Чистка плитки', '1950', 'Чистка плитки и швов от клея и затирки', '', 'Чистка плитки', 35, '2023-04-13 16:59:59'),
(7, 'Эко уборка', '2500', 'Уборка экологически чистыми и гипоаллергенными средствами\r\n\r\n', '', 'Безопасная уборка', 63, '2023-04-13 17:02:24'),
(8, 'Дополнительные услуги', '1990', 'Какие дополнительные услуги мы оказываем?• ручная стирка одежды\r\n• машинная стирка одежды\r\n• глажка белья\r\n• сушка вещей\r\n• мытьё обуви', '', 'Дополнительные услуги', 20, '2023-04-13 17:05:05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
