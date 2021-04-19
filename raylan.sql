-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2021 г., 07:43
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Структура таблицы `invoices`
--

CREATE TABLE `invoices` (
  `id` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `price` float NOT NULL,
  `number` int(12) NOT NULL,
  `date_start` date NOT NULL,
  `date_stop` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `invoices`
--

INSERT INTO `invoices` (`id`, `id_user`, `price`, `number`, `date_start`, `date_stop`, `type`, `base`, `reason`, `name`, `category`) VALUES
(1, 1, 424.23, 12321421, '2020-09-07', '2021-09-10', 'Взнос', 'Лицевой счет', 'Решение Общего собрания садоводов - членов СНТ от 25.01.2014', 'Членский взнос 2014г. 5000 руб. за участок', 'Нет'),
(2, 1, 424.23, 12321421, '2020-09-07', '2021-09-10', 'Взнос', 'Лицевой счет', 'Решение Общего собрания садоводов - членов СНТ от 25.01.2014', 'Членский взнос 2014г. 5000 руб. за участок', 'Нет');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(12) NOT NULL,
  `title` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `avtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Структура таблицы `user/comment`
--

CREATE TABLE `user/comment` (
  `id_news` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_and_time` datetime NOT NULL,
  `id_comment` int(11) NOT NULL
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
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.png',
  `balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `img`, `balance`) VALUES
(1, 'UBLACKHOSE', 'veselovdima394@gmail.com', 'GogaMoga29', '0.png', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user/comment`
--
ALTER TABLE `user/comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `user/comment`
--
ALTER TABLE `user/comment`
  ADD CONSTRAINT `user/comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user/comment_ibfk_2` FOREIGN KEY (`id_news`) REFERENCES `news` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
