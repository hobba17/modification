-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 14 2022 г., 19:23
-- Версия сервера: 5.6.19
-- Версия PHP: 5.5.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `zelena_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `zr6i_adminy`
--

CREATE TABLE IF NOT EXISTS `zr6i_adminy` (
`id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(999) NOT NULL,
  `fio` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `action_page` int(1) NOT NULL DEFAULT '0',
  `edit_page` int(1) NOT NULL DEFAULT '0',
  `add_page` int(1) NOT NULL DEFAULT '0',
  `edit_code` int(1) NOT NULL DEFAULT '0',
  `edit_admin` int(1) NOT NULL DEFAULT '0',
  `view_bot` int(1) NOT NULL DEFAULT '0',
  `view_zayav` int(1) NOT NULL DEFAULT '0',
  `moder_com` int(1) NOT NULL DEFAULT '0',
  `view_admin` int(1) NOT NULL DEFAULT '0',
  `add_admin` int(1) NOT NULL DEFAULT '0',
  `slut` int(11) NOT NULL,
  `true_pass` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `zr6i_adminy`
--

INSERT INTO `zr6i_adminy` (`id`, `login`, `pass`, `fio`, `role`, `email`, `phone`, `action_page`, `edit_page`, `add_page`, `edit_code`, `edit_admin`, `view_bot`, `view_zayav`, `moder_com`, `view_admin`, `add_admin`, `slut`, `true_pass`) VALUES
(1, 'admin37', 'a9a9e5204cf2251f0a05999a896b60e4327c3cfc6ee2e0a698900838b85048ad', 'Fagot Koval', 'Шеф Шефов', 'roher@yandex.ru', '(495) 666-77-88', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7177, 'f45Tn7G65'),
(3, 'Шеф Шефов', '6c95329060f6def7609555c57d24690a13d057ab1ea7463abf60d39473595244', 'Челомей', 'Глав-Бух', 'ршдгрпнгпа', '(495) 666-77-88', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 8242, 'kkkkkku'),
(4, 'adminuu', 'cb491f3967c76fa74b8ce4203286387f8ba957f251db3f4107beaff75b484c9c', 'Котов Кот Котофеивич', 'Котяра', 'рроллл', '(495) 666-77-88', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7861, 'kkkkkkkk'),
(5, 'admin56', '979678f04c52f3d3888a374d765f315a0d6a43c993f628de5870b10b3289608d', 'Федотов', 'Пень', 'ршдгрпнгпа', '(495) 666-77-88', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3135, 'ллллллл'),
(6, 'admine', '3175b55141a61fe1d29e9e64353debc32a97264136bc180af3244c1d03bc0ad5', 'nnnnn hhhhh tgttttttt', 'neon', 'hgdfdt@jjhhg.kj', '89165557687', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8579, 'llllll');

-- --------------------------------------------------------

--
-- Структура таблицы `zr6i_comments`
--

CREATE TABLE IF NOT EXISTS `zr6i_comments` (
`id_hod` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_comment` varchar(30) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `moderat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `zr6i_comments`
--

INSERT INTO `zr6i_comments` (`id_hod`, `comment`, `date_comment`, `id_comment`, `moderat`) VALUES
(1, 'За плохое поведение на форуме - Вечный Бан!', '07.06.2019', 1, 1),
(3, 'Привет, я вернулся!!', '2019-12-05 09:28', 2, 1),
(4, 'Чтобы снова исчезнуть)))', '2019-12-05 09:36', 2, 1),
(9, 'Love is...', '2019-12-15 04:15', 4, 1),
(14, 'ТОска не сусветная?', '2020-07-15 10:42', 5, 1),
(18, 'Посмотрим как сработает...', '2020-07-23 01:04', 6, 1),
(24, 'Vepsrf djky', '2020-11-24 23:44', 3, 1),
(26, 'Я новичок!', '2021-09-13 07:10', 15, 1),
(27, 'Gtnz jrtq!', '2021-10-12 21:44', 1, 1),
(28, 'река течёт...', '2021-10-13 01:48', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `zr6i_forum_images`
--

CREATE TABLE IF NOT EXISTS `zr6i_forum_images` (
`id` int(11) NOT NULL,
  `images` varchar(25) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `zr6i_forum_images`
--

INSERT INTO `zr6i_forum_images` (`id`, `images`, `id_comment`, `id_user`) VALUES
(1, 'bann.png', 1, 1),
(3, 'T5Q59dya-2.jpg', 3, 2),
(4, 'AaGY28Gd-2.jpg', 4, 2),
(9, 'AZahDB8S-11.jpg', 15, 11),
(10, '6R9afGSz-6.jpg', 18, 6),
(13, 'FnD4NKHh-15.jpg', 26, 15),
(14, 'tK8rRGk3-1.jpg', 27, 1),
(15, '4QfABa63-1.jpg', 27, 1),
(16, 'sK8dHkT6-1.jpg', 28, 1),
(17, 'GGiTNaDT-1.jpg', 28, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `zr6i_guests`
--

CREATE TABLE IF NOT EXISTS `zr6i_guests` (
  `id_guest` varchar(100) NOT NULL,
  `put_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guest` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zr6i_guests`
--

INSERT INTO `zr6i_guests` (`id_guest`, `put_date`, `guest`) VALUES
('36umdqcf5r2b508e1j86gojh0sda2jej', '2022-03-14 15:22:11', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `zr6i_lang`
--

CREATE TABLE IF NOT EXISTS `zr6i_lang` (
  `code` varchar(10) NOT NULL,
  `title` varchar(15) NOT NULL,
  `base` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zr6i_lang`
--

INSERT INTO `zr6i_lang` (`code`, `title`, `base`) VALUES
('en', 'English', 1),
('ru', 'Русский', 0),
('sp', 'Spain', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `zr6i_news_blog`
--

CREATE TABLE IF NOT EXISTS `zr6i_news_blog` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cur_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `links` text NOT NULL,
  `preview` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `counts` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `zr6i_news_blog`
--

INSERT INTO `zr6i_news_blog` (`id`, `title`, `cur_date`, `links`, `preview`, `author_name`, `type`, `counts`) VALUES
(1, 'Причина лени - в продуктах', '2020-10-27 05:21:20', 'https://humanstory.ru/science/prichina-leni-v-produktakh', 'len.jpg', 'На сайте', 'NewsPublication', 14),
(2, '10 мудрых цитат месяца. Июль.', '2020-10-27 05:21:20', 'https://dobro-news.top/10-mudryh-tsitat-iyulya/', '2.jpg', 'На сайте', 'NewsPublication', 10),
(3, 'Мишка Тэдди и аэропорт "Кольцово"', '2020-10-27 05:24:47', 'https://www.ural.kp.ru/daily/26627.3/3645831/?utm_campaign=external&amp;utm_medium=section_goodnews_page%3D1&amp;utm_source=quote_preview&amp;utm_term=-1', '3.jpg', 'На сайте', 'ArticlePublication', 14),
(4, 'Разное.', '2020-10-27 05:24:47', 'https://onedio.ru/news/pozitivnye-i-vdohnovlyayushie-novosti-2-02-0-goda-kotorye-ne-dadut-vam-okonchatelno-skisnut-50448', '4.jpg', 'На сайте', 'ArticlePublication', 10),
(5, '32 самых популярных фотографии', '2020-10-27 05:26:40', 'http://gooodnews.ru/index.php/pozitivnoe/pictures/6956-32-samykh-populyarnykh-fotografij-za-vse-vremya-s-1x-com', 'bull.jpg', 'На сайте', 'PhotoReportPublication', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `zr6i_pages`
--

CREATE TABLE IF NOT EXISTS `zr6i_pages` (
`id` int(3) NOT NULL,
  `page_ru` varchar(50) NOT NULL,
  `page_en` varchar(50) NOT NULL,
  `links` varchar(50) NOT NULL,
  `dostup` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `zr6i_pages`
--

INSERT INTO `zr6i_pages` (`id`, `page_ru`, `page_en`, `links`, `dostup`) VALUES
(1, 'Главная', 'Home', 'main', 1),
(2, 'Путь к нам', 'The way to us', 'way', 1),
(4, 'Shopping в Зелёном', 'Shops in the village', 'shop', 1),
(5, 'Досуг', 'Leisure', 'leisure', 1),
(6, 'Обратная связь', 'Feedback', 'feedback', 1),
(10, 'Новости', 'News', 'news', 1),
(11, 'Форум', 'Forum', 'forum', 1),
(12, 'Админ', 'Admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `zr6i_users`
--

CREATE TABLE IF NOT EXISTS `zr6i_users` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `true_pass` varchar(50) NOT NULL DEFAULT '0',
  `slut` bigint(225) NOT NULL,
  `iling` int(1) NOT NULL DEFAULT '1',
  `dostup` int(1) NOT NULL DEFAULT '0',
  `check_reg` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `zr6i_users`
--

INSERT INTO `zr6i_users` (`id`, `name`, `img`, `email`, `time_reg`, `ip`, `pass`, `true_pass`, `slut`, `iling`, `dostup`, `check_reg`) VALUES
(1, 'Товарищ', 'comrad.jpg', 'comrad@ya.ru', '0000-00-00 00:00:00', '127.0.0.0', '818077ee8cb2bc4edc9f946a2873b538b936924a0019854db2b70588051e4b14', 'eysFYef', 1205, 0, 1, 1),
(2, 'Горошек', 'bGBQfS8K-2.jpg', 'ribinin@yandex.ru', '2019-06-07 09:29:57', '127.0.0.2', '056e4f8372fe7477f6fe2c94c5d9e97f12cbc63032f417dab90f63d27bf96898', 'ivvy38n', 79, 1, 1, 1),
(3, 'Goroshec', 'QN87sd7S-3.jpg', 'ribinin@yandex.jj', '2019-12-08 17:13:11', '127.0.0.9', '57f42912a7a65c6e00b8c3f607ea69b02b2dc0e3aac419d1ec6635abbbefb431', '4kcsgxp', 10023, 1, 1, 1),
(4, 'Котик-Мент', '2iBEbE6B-4.jpg', 'ribinin@yandex.reio', '2019-12-09 17:08:03', '127.0.0.4', 'da5ba3b7ecf600fff2f4c65acf110b118f3eeb987597767d7e1cbc8e77c3e879', 'l1slzdt', 9796, 0, 1, 1),
(5, 'Покинул форум', '/img_dop/noimages80x70.png', 'ljkh@hgu.lll', '2020-07-15 09:57:46', '127.0.0.5', '0', '0', 0, 0, 0, 1),
(6, 'Колос', 'Q5Z4KZdi-6.jpg', 'ribinin@yandex.fg', '2020-07-22 20:52:57', '127.0.0.6', '69f65a5dd90d1f115f097d78c1322e0a3dbe9f26128bd0030758676d13149291', '64u18pi', 8047, 0, 1, 1),
(15, 'Покинул форум', '/img_dop/noimages80x70.png', 'ww@ww.kk', '2021-09-13 02:58:24', '127.0.0.8', '0', '0', 0, 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `zr6i_adminy`
--
ALTER TABLE `zr6i_adminy`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zr6i_comments`
--
ALTER TABLE `zr6i_comments`
 ADD PRIMARY KEY (`id_hod`);

--
-- Indexes for table `zr6i_forum_images`
--
ALTER TABLE `zr6i_forum_images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zr6i_guests`
--
ALTER TABLE `zr6i_guests`
 ADD PRIMARY KEY (`id_guest`);

--
-- Indexes for table `zr6i_lang`
--
ALTER TABLE `zr6i_lang`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `zr6i_news_blog`
--
ALTER TABLE `zr6i_news_blog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zr6i_pages`
--
ALTER TABLE `zr6i_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zr6i_users`
--
ALTER TABLE `zr6i_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zr6i_adminy`
--
ALTER TABLE `zr6i_adminy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `zr6i_comments`
--
ALTER TABLE `zr6i_comments`
MODIFY `id_hod` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `zr6i_forum_images`
--
ALTER TABLE `zr6i_forum_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `zr6i_news_blog`
--
ALTER TABLE `zr6i_news_blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `zr6i_pages`
--
ALTER TABLE `zr6i_pages`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `zr6i_users`
--
ALTER TABLE `zr6i_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
