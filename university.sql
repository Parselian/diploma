-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 22 2020 г., 20:37
-- Версия сервера: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- Версия PHP: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `university`
--

-- --------------------------------------------------------

--
-- Структура таблицы `abiturients`
--

CREATE TABLE `abiturients` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1638) NOT NULL,
  `anket_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `abiturients`
--

INSERT INTO `abiturients` (`id`, `login`, `email`, `password`, `anket_status`) VALUES
(2, 'user', 'user@user.ru', '$2y$10$31f4/Nd4GNsM54cHiLVWaO5Kl/HuHyj/l1zhuop7FqKiAKF2gdr/S', 'denied'),
(3, 'test2', 'test@tes.tu', '$2y$10$bp7e3r1fqqL4YglgURTQy.M6mO0p7H2UqUS0u6pCfzBq.HEBbDnSC', 'denied'),
(4, 'testuser', 'sedg', '$2y$10$NjntA0w1tUQ3rycsVTnVT.j0SYuaFEhvksehTzcG5kK5g7ZYgLzce', 'approved'),
(5, 'user2', 'sdgd', '$2y$10$1Zuo5YOjDrpbGEy77ugsfuhXSXvjCzY6iJUWvnwYW95/JIS0y28.O', 'denied'),
(6, 'desktop', 'sadf', '$2y$10$bLSiFFcHw78icVVbGk4fGurVqINZsvDrH6hFNlsoIa4xrvi1FG1iK', 'approved'),
(7, 'desk2', 'uyryut', '$2y$10$QGsCuK8mISJbUJBk2fUR3uIVg92f8/xQDyippRFiOHVfhhQahKaxK', 'documents-sent'),
(8, 'qwerty', 'kjgklj@nd.ry', '$2y$10$dUQGm/rURTAoi0wgQR8Xa.c8IAHykmMigx7jJ8MowCCtFUNbqoi46', 'approved'),
(9, 'test7', 'jhgk@kjgjlkh', '$2y$10$AZP5S0M9jgu11OaVoBxBSOPzL7w/h6o1sIMjbrnLFwaqVwhdbV8P.', 'closed'),
(10, '', '', '', 'in-process'),
(11, '', '', '', 'in-process'),
(12, '', '', '', 'in-process'),
(13, '', '', '', 'in-process'),
(14, '', '', '', 'in-process'),
(15, '', '', '', 'in-process'),
(16, '', '', '', 'in-process'),
(17, '', '', '', NULL),
(18, '', '', '', NULL),
(19, '', '', '', 'in-process'),
(20, '', '', '', 'in-process'),
(21, '', '', '', 'in-process'),
(22, '', '', '', 'in-process'),
(23, '', '', '', 'in-process'),
(24, '', '', '', 'in-process'),
(25, '', '', '', 'in-process'),
(26, '', '', '', 'in-process'),
(27, '', '', '', 'in-process'),
(28, '', '', '', 'in-process'),
(29, '', '', '', 'in-process'),
(30, '', '', '', 'in-process'),
(31, '', '', '', 'in-process'),
(32, '', '', '', 'in-process'),
(33, '', '', '', 'in-process'),
(34, '', '', '', 'in-process'),
(35, '', '', '', 'in-process'),
(36, '', '', '', 'in-process'),
(37, '', '', '', 'in-process'),
(38, '', '', '', 'in-process'),
(39, '', '', '', 'in-process'),
(40, '', '', '', 'in-process'),
(41, '', '', '', 'in-process'),
(42, '', '', '', 'in-process'),
(43, '', '', '', 'in-process'),
(44, '', '', '', 'in-process'),
(45, '', '', '', 'in-process'),
(46, '', '', '', 'in-process'),
(47, '', '', '', 'in-process'),
(48, '', '', '', 'in-process'),
(49, '', '', '', 'in-process'),
(50, '', '', '', 'in-process'),
(51, '', '', '', 'in-process'),
(52, '', '', '', 'in-process'),
(53, '', '', '', 'in-process'),
(54, '', '', '', 'in-process'),
(55, '', '', '', 'in-process'),
(56, '', '', '', 'in-process'),
(57, '', '', '', 'in-process'),
(58, '', '', '', 'in-process'),
(59, '', '', '', 'in-process'),
(60, '', '', '', 'in-process'),
(61, '', '', '', 'in-process'),
(62, '', '', '', 'in-process'),
(63, '', '', '', 'in-process'),
(64, '', '', '', 'close'),
(65, '', '', '', 'in-process'),
(66, '', '', '', 'in-process'),
(67, '', '', '', 'in-process'),
(68, '', '', '', 'in-process'),
(69, '', '', '', 'in-process'),
(70, '', '', '', 'close'),
(71, '', '', '', 'in-process'),
(72, '', '', '', 'in-process'),
(73, '', '', '', 'in-process'),
(74, '', '', '', 'in-process'),
(75, '', '', '', 'in-process'),
(76, '', '', '', 'in-process'),
(77, '', '', '', 'in-process'),
(78, '', '', '', 'in-process'),
(79, '', '', '', 'in-process'),
(80, '', '', '', 'closed'),
(81, '', '', '', 'closed'),
(82, '', '', '', 'in-process'),
(83, '', '', '', 'in-process'),
(84, '', '', '', 'closed'),
(85, '', '', '', 'closed'),
(86, '', '', '', 'closed'),
(87, '', '', '', 'closed'),
(88, '', '', '', 'closed'),
(89, '', '', '', 'in-process'),
(90, '', '', '', 'in-process'),
(91, '', '', '', 'closed'),
(92, '', '', '', 'closed'),
(93, '', '', '', 'closed'),
(94, '', '', '', 'closed'),
(95, '', '', '', 'in-process'),
(96, '', '', '', 'in-process'),
(97, '', '', '', 'in-process'),
(98, '', '', '', 'in-process'),
(99, '', '', '', 'in-process'),
(100, '', '', '', 'in-process'),
(101, '', '', '', NULL),
(102, '', '', '', 'in-process'),
(103, '', '', '', NULL),
(104, '', '', '', 'in-process'),
(105, '', '', '', 'closed'),
(106, '', '', '', 'closed'),
(107, '', '', '', 'closed'),
(108, '', '', '', 'closed'),
(109, '', '', '', 'in-process'),
(110, '', '', '', 'closed'),
(111, '', '', '', 'in-process'),
(112, '', '', '', 'closed'),
(113, '', '', '', 'in-process'),
(114, '', '', '', NULL),
(115, '', '', '', 'in-process'),
(116, '', '', '', NULL),
(117, '', '', '', 'in-process'),
(118, '', '', '', NULL),
(119, '', '', '', 'in-process'),
(120, '', '', '', 'in-process');

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `email`, `password`) VALUES
(2, 'windmymind', 'skorpion.16@yandex.ru', '$2y$10$UJFHmBK804U3dLYDGtaVBeuruTS.HYTWC9EABU77ef8DiU0bxa686'),
(10, 'test2', 'jhgf', '$2y$10$Zs18DAmXcJNE5FijQcrEr.KmWF5ZcWMvGvKaHCbJMKo45pIZMxjQa'),
(11, 'desktop', 'sdgh', '$2y$10$slg0TDOLgPbmpn/dDlG2U.6QuWC/P9vaQWUex1GAc4ZVXysJpmDZm'),
(12, 'test5', 'jhkgkjh@kjhgdsa.ru', '$2y$10$1OSJNWGYA48TUs1DpxWgquzDIIpiUqzsYGnkLshKYIFKFG4HY/dt.');

-- --------------------------------------------------------

--
-- Структура таблицы `algorithm`
--

CREATE TABLE `algorithm` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `algorithm`
--

INSERT INTO `algorithm` (`id`, `admin_id`, `date`, `content`) VALUES
(1, 2, '2020-07-26', 'Завершается прием документов от абитуриентов, которые не сдают дополнительные экзамены (стандартное поступление по ЕГЭ).\r\n Вузы обязаны закончить собственные вступительные испытания для всех абитуриентов\r\nПоявляется полный список поступающих по стандартному протоколу (информационный стенд, сайт вуза)'),
(2, 2, '2020-07-27', 'Завершается прием оригиналов документов от абитуриентов, поступающих без экзаменов (спортсменов и победителей творческих, профессиональных, интеллектуальных конкурсов)'),
(3, 2, '2020-07-29', 'Готов приказ о зачислении в вуз абитуриентов, поступающих без экзаменов по квоте'),
(4, 2, '2020-08-01', '«Первая волна поступления». Вуз регистрирует заявления от поступивших и выразивших согласие обучаться (заполняется 80 % конкурсных мест)'),
(5, 2, '2020-08-03', 'Приказ о зачислении абитуриентов «первой волны»'),
(6, 2, '2020-08-06', '«Вторая волна поступления». Вуз регистрирует согласие на обучение от абитуриентов (заполняется оставшиеся 20 % конкурсных мест)'),
(7, 2, '2020-08-08', 'Приказ о зачислении абитуриентов «второй волны»'),
(8, 2, '2020-02-12', 'квопаролгне');

-- --------------------------------------------------------

--
-- Структура таблицы `faculties`
--

CREATE TABLE `faculties` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `faculties`
--

INSERT INTO `faculties` (`faculty_id`, `faculty_name`) VALUES
(1, 'Компьютерные сети'),
(7, 'Системы и комплексы'),
(10, 'Программирование'),
(45, 'право');

-- --------------------------------------------------------

--
-- Структура таблицы `specialties`
--

CREATE TABLE `specialties` (
  `specialty_id` int(11) NOT NULL,
  `specialty_name` varchar(100) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `budget_places` int(11) NOT NULL,
  `contract_places` int(11) NOT NULL,
  `study_type` varchar(50) NOT NULL,
  `exam_1` varchar(50) NOT NULL,
  `exam_2` varchar(50) NOT NULL,
  `exam_3` varchar(50) NOT NULL,
  `exam_points_1` int(11) NOT NULL,
  `exam_points_2` int(11) NOT NULL,
  `exam_points_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `specialties`
--

INSERT INTO `specialties` (`specialty_id`, `specialty_name`, `faculty_id`, `budget_places`, `contract_places`, `study_type`, `exam_1`, `exam_2`, `exam_3`, `exam_points_1`, `exam_points_2`, `exam_points_3`) VALUES
(1, 'дворник', 1, 12, 100, 'очный', 'русский', 'итальянский', 'вьетнамский', 89, 92, 75),
(4, 'эникейщик', 7, 100, 13, 'заочное', 'павп', 'ваес', 'роман', 424, 634, 745),
(7, 'Мехатроника', 1, 2, 13, 'заочное', 'химия', 'литература', 'право', 92, 100, 140);

-- --------------------------------------------------------

--
-- Структура таблицы `statements`
--

CREATE TABLE `statements` (
  `statement_id` int(11) UNSIGNED NOT NULL,
  `abiturient_id` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `surname` varchar(50) NOT NULL,
  `abiname` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL,
  `born_date` date NOT NULL,
  `born_country` varchar(50) NOT NULL,
  `born_city` varchar(50) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `passport_series` int(10) NOT NULL,
  `passport_number` int(10) NOT NULL,
  `passport_whogive` varchar(255) NOT NULL,
  `passport_date` date NOT NULL,
  `snils` int(12) DEFAULT NULL,
  `contacts_phone` varchar(50) NOT NULL,
  `contacts_email` varchar(50) NOT NULL,
  `contacts_regcity` varchar(50) NOT NULL,
  `contacts_regstreet` varchar(50) NOT NULL,
  `contacts_reghouse` varchar(50) NOT NULL,
  `contacts_regflat` varchar(50) NOT NULL,
  `contacts_regindex` int(12) NOT NULL,
  `contacts_livecity` varchar(50) DEFAULT NULL,
  `contacts_livestreet` varchar(50) DEFAULT NULL,
  `contacts_livehouse` varchar(50) DEFAULT NULL,
  `contacts_liveflat` varchar(50) DEFAULT NULL,
  `contacts_liveindex` int(12) DEFAULT NULL,
  `edu_last` varchar(50) NOT NULL,
  `edu_name` varchar(50) NOT NULL,
  `edu_country` varchar(50) NOT NULL,
  `edu_finishyear` date NOT NULL,
  `edu_series` varchar(50) NOT NULL,
  `edu_number` varchar(50) NOT NULL,
  `edu_points` varchar(4) NOT NULL,
  `edu_specialty` int(100) DEFAULT NULL,
  `passport_link` varchar(1600) DEFAULT NULL,
  `photo_link` varchar(1600) DEFAULT NULL,
  `statement_link` varchar(1600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `statements`
--

INSERT INTO `statements` (`statement_id`, `abiturient_id`, `checked`, `surname`, `abiname`, `patronymic`, `born_date`, `born_country`, `born_city`, `citizenship`, `passport_series`, `passport_number`, `passport_whogive`, `passport_date`, `snils`, `contacts_phone`, `contacts_email`, `contacts_regcity`, `contacts_regstreet`, `contacts_reghouse`, `contacts_regflat`, `contacts_regindex`, `contacts_livecity`, `contacts_livestreet`, `contacts_livehouse`, `contacts_liveflat`, `contacts_liveindex`, `edu_last`, `edu_name`, `edu_country`, `edu_finishyear`, `edu_series`, `edu_number`, `edu_points`, `edu_specialty`, `passport_link`, `photo_link`, `statement_link`) VALUES
(150, 9, 0, 'Вождаев', 'Вячеслав', 'Алексеевич', '2020-04-08', 'Россия', 'Санкт-Петербург', 'Российское', 1234, 123456, 'УФМС', '2020-04-09', 123, '+7 (921) 574-15-42', 'example@ya.ru', 'Санкт-Петербург', 'Руставелли', '12 лит.А', '142', 123456, 'Москва', 'Ленина', '8', '14', 123456, 'школа', 'шарага', 'Россия', '2020-04-10', '123456', '1234567', '4.2', 7, 'control/uploads/passports/user_id_9', 'control/uploads/photos/user_id_9', 'control/uploads/statements/user_id_9'),
(151, 9, 2, 'Вождаев', 'Вячеслав', 'Алексеевич', '2020-04-08', 'Россия', 'Санкт-Петербург', 'Российское', 1234, 123456, 'УФМС', '2020-04-05', 123, '+7 (921) 574-15-42', 'example@ya.ru', 'Санкт-Петербург', 'Руставелли', '12 лит.А', '142', 123456, 'Москва', 'Ленина', '8', '14', 123456, 'школа', 'шарага', 'Россия', '2020-04-22', '123456', '1234567', '4.2', 1, NULL, NULL, NULL),
(152, 9, 2, 'Вождаев', 'Вячеслав', 'Алексеевич', '2020-04-08', 'Россия', 'Санкт-Петербург', 'Российское', 1234, 123456, 'УФМС', '2020-04-05', 123, '+7 (921) 574-15-42', 'example@ya.ru', 'Санкт-Петербург', 'Руставелли', '12 лит.А', '142', 123456, 'Москва', 'Ленина', '8', '14', 123456, 'школа', 'шарага', 'Россия', '2020-04-22', '123456', '1234567', '4.2', 4, NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `abiturients`
--
ALTER TABLE `abiturients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `algorithm`
--
ALTER TABLE `algorithm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Индексы таблицы `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Индексы таблицы `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`specialty_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Индексы таблицы `statements`
--
ALTER TABLE `statements`
  ADD PRIMARY KEY (`statement_id`),
  ADD KEY `abiturient_id` (`abiturient_id`),
  ADD KEY `edu_specialty` (`edu_specialty`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `abiturients`
--
ALTER TABLE `abiturients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `algorithm`
--
ALTER TABLE `algorithm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `faculties`
--
ALTER TABLE `faculties`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT для таблицы `specialties`
--
ALTER TABLE `specialties`
  MODIFY `specialty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `statements`
--
ALTER TABLE `statements`
  MODIFY `statement_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `algorithm`
--
ALTER TABLE `algorithm`
  ADD CONSTRAINT `algorithm_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Ограничения внешнего ключа таблицы `specialties`
--
ALTER TABLE `specialties`
  ADD CONSTRAINT `specialties_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`faculty_id`);

--
-- Ограничения внешнего ключа таблицы `statements`
--
ALTER TABLE `statements`
  ADD CONSTRAINT `statements_ibfk_1` FOREIGN KEY (`abiturient_id`) REFERENCES `abiturients` (`id`),
  ADD CONSTRAINT `statements_ibfk_2` FOREIGN KEY (`edu_specialty`) REFERENCES `specialties` (`specialty_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
