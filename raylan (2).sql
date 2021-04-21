-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2021 г., 12:31
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `raylan`
--

-- --------------------------------------------------------

--
-- Структура таблицы `hous`
--

CREATE TABLE `hous` (
  `id` int NOT NULL,
  `house` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `hous`
--

INSERT INTO `hous` (`id`, `house`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7');

-- --------------------------------------------------------

--
-- Структура таблицы `house/hous`
--

CREATE TABLE `house/hous` (
  `id` int NOT NULL,
  `id_hous` int NOT NULL,
  `id_street` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `house/hous`
--

INSERT INTO `house/hous` (`id`, `id_hous`, `id_street`) VALUES
(1, 1, 1),
(3, 2, 1),
(2, 5, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `invoices`
--

CREATE TABLE `invoices` (
  `id` int NOT NULL,
  `id_street` int NOT NULL,
  `price` float NOT NULL,
  `number` int NOT NULL,
  `date_start` date NOT NULL,
  `date_stop` date NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `base` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `invoices`
--

INSERT INTO `invoices` (`id`, `id_street`, `price`, `number`, `date_start`, `date_stop`, `type`, `base`, `reason`, `name`, `category`, `status`) VALUES
(1, 1, 424.23, 12321421, '2020-09-07', '2021-09-10', 'Взнос', 'Лицевой счет', 'Решение Общего собрания садоводов - членов СНТ от 25.01.2014', 'Членский взнос 2014г. 5000 руб. за участок', 'Нет', 0),
(2, 1, 424.23, 12321421, '2020-09-07', '2021-09-10', 'Взнос', 'Лицевой счет', 'Решение Общего собрания садоводов - членов СНТ от 25.01.2014', 'Членский взнос 2014г. 5000 руб. за участок', 'Нет', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `avtor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `date`, `avtor`, `img`) VALUES
(1, 'О внесении изменения в указ Мэра Москвы от 8 июня 2020 г. N 68-УМ', 'Домашний режим для пенсионеров, москвичей с хроническими заболеваниями  действует до существенного улучшения эпидемиологической ситуации.\r\nМосквичи старше 65 лет должны соблюдать домашний режим. Работающим пенсионерам рекомендуют взять отпуск или перейти на удаленную работу. Бесплатный проезд для москвичей старше 65 лет, которые обязаны оставаться дома, приостановлен. ', '2021-01-01', 'Admin', '1.jpg'),
(2, 'Расчищены от снега дороги и улицы СНТ', '10 января 2021 года расчищены от снега дороги и улицы СНТ.', '2021-01-10', 'Admin', '2.jpg'),
(3, 'О проведении очередного общего собрания членов СНТ «Дружба»', 'Уважаемые садоводы!\r\n\r\n29 ноября 2020 года\r\n\r\nсостоится очередное общее собрание членов СНТ «Дружба»\r\n\r\n\r\nНачало регистрации: 10:00\r\n\r\nОкончание регистрации: 10:45\r\n\r\nНачало собрания: 11:00\r\n\r\nПравление СНТ \"Дружба\" призывает каждого члена Товарищества, а также собственников и правообладателей земельных участков, не являющихся членами Товарищества выразить свою гражданскую позицию и прийти на собрание.\r\n\r\nВ случае невозможности личного присутствия просим вас передать свои полномочия другому лицу для наличия кворума (минимального числа участников общего собрания, необходимого для признания такого собрания законным).\r\n\r\nВнимание! Если вы не можете лично присутствовать на собрании допускается выписать доверенность в простой письменной форме на имя вашего представителя. Разъяснение по вопросу доверенности было дано Министерством экономического развития РФ, которое отметило следующее: «Любой член товарищества вправе передать свои полномочия на основании простой письменной доверенности любому третьему лицу, которому он доверяет представлять свои интересы, определяя при этом круг вопросов, по которым он уполномочивает действовать своего представителя, а также срок действия его полномочий. При этом нотариальное удостоверение такой доверенности не требуется и может осуществляться по желанию члена товарищества.Cледует отметить, что в соответствии со статьей 185 Гражданского кодекса письменное уполномочие, выдаваемое одним лицом другому лицу или другим лицам для представительства перед третьими лицами, оформляется именно в виде доверенности.».', '2021-04-07', 'Admin', '3.jpg'),
(4, 'Уважаемые садоводы!', 'В соответствии с решением общего собрания членов СНТ «Дружба» 50 % годового членского взноса вносится до 01 июля. После этой даты начисляются пени в размере 0,1% от суммы просроченного платежа за каждый день просрочки.', '2021-04-05', 'Admin', '4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `street`
--

CREATE TABLE `street` (
  `id` int NOT NULL,
  `street` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `street`
--

INSERT INTO `street` (`id`, `street`) VALUES
(1, 'Ломаносова'),
(2, 'Калинина');

-- --------------------------------------------------------

--
-- Структура таблицы `user/comment`
--

CREATE TABLE `user/comment` (
  `id_news` int NOT NULL,
  `id_user` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_and_time` datetime NOT NULL,
  `id_comment` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user/comment`
--

INSERT INTO `user/comment` (`id_news`, `id_user`, `content`, `date_and_time`, `id_comment`) VALUES
(1, 1, '123\n', '2021-04-10 22:25:53', 7),
(3, 1, 'Лол\n', '2021-04-11 17:17:56', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.png',
  `balance` float NOT NULL DEFAULT '0',
  `street_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `img`, `balance`, `street_id`) VALUES
(1, 'UBLACKHOSE', 'veselovdima394@gmail.com', 'GogaMoga29', 'img_6.png', 600.62, 1),
(4, 'User2', 'User2@mail.ru', 'password', '0.png', 0, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `hous`
--
ALTER TABLE `hous`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `house/hous`
--
ALTER TABLE `house/hous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hous` (`id_hous`,`id_street`),
  ADD KEY `id_house` (`id_street`);

--
-- Индексы таблицы `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_street`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user/comment`
--
ALTER TABLE `user/comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_comment` (`id_news`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `street_id` (`street_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `hous`
--
ALTER TABLE `hous`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `house/hous`
--
ALTER TABLE `house/hous`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `street`
--
ALTER TABLE `street`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user/comment`
--
ALTER TABLE `user/comment`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `house/hous`
--
ALTER TABLE `house/hous`
  ADD CONSTRAINT `house/hous_ibfk_1` FOREIGN KEY (`id_street`) REFERENCES `street` (`id`),
  ADD CONSTRAINT `house/hous_ibfk_2` FOREIGN KEY (`id_hous`) REFERENCES `hous` (`id`);

--
-- Ограничения внешнего ключа таблицы `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`id_street`) REFERENCES `house/hous` (`id`);

--
-- Ограничения внешнего ключа таблицы `user/comment`
--
ALTER TABLE `user/comment`
  ADD CONSTRAINT `user/comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user/comment_ibfk_2` FOREIGN KEY (`id_news`) REFERENCES `news` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`street_id`) REFERENCES `house/hous` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
