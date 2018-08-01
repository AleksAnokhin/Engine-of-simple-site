-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 09 2018 г., 13:07
-- Версия сервера: 5.5.44-0ubuntu0.14.04.1-log
-- Версия PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `verdirf`
--

-- --------------------------------------------------------

--
-- Структура таблицы `composers`
--

CREATE TABLE IF NOT EXISTS `composers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `birthDate` int(11) DEFAULT NULL,
  `deathDate` int(11) DEFAULT NULL,
  `bio` longtext,
  `fullName` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Дамп данных таблицы `composers`
--

INSERT INTO `composers` (`id`, `firstName`, `lastName`, `country_id`, `genre_id`, `birthDate`, `deathDate`, `bio`, `fullName`) VALUES
(21, 'Антонио', 'Вивальди', 26, 33, 1678, 1741, NULL, NULL),
(22, 'Доменико', 'Скарлатти', 26, 33, 1685, 1757, NULL, NULL),
(23, 'Луиджи', 'Боккерини', 26, 34, 1743, 1805, NULL, NULL),
(24, 'Доменико', 'Чимароза', 26, 34, 1749, 1801, NULL, NULL),
(25, 'Джоаккино', 'Россини', 26, 28, 1792, 1868, NULL, NULL),
(26, 'Гаэтано', 'Доницетти', 26, 28, 1797, 1848, NULL, NULL),
(27, 'Винченцо', 'Беллини', 26, 28, 1801, 1835, NULL, NULL),
(28, 'Джузеппе', 'Верди', 26, 28, 1814, 1900, '', NULL),
(29, 'Руджеро', 'Леонкавалло', 26, NULL, 1857, 1919, NULL, NULL),
(30, 'Джакомо', 'Пуччини', 26, NULL, 1858, 1924, NULL, NULL),
(31, 'Нино', 'Рота', 26, 29, 1911, 1979, NULL, NULL),
(32, 'Георг Филипп', 'Телеман', 37, 33, 1681, 1767, NULL, NULL),
(33, 'Георг', 'Гендель', 37, 33, 1685, 1759, NULL, NULL),
(34, 'Иоганн Себастьян', 'Бах', 37, 33, 1685, 1750, NULL, NULL),
(35, 'Кристоф Виллибальд', 'Глюк', 37, 34, 1714, 1787, NULL, NULL),
(36, 'Йозеф', 'Гайдн', 38, 34, 1732, 1809, NULL, NULL),
(37, 'Томазо', 'Альбинони', 26, 33, 1671, 1751, NULL, NULL),
(39, 'Вольфганг Амадей', 'Моцарт', 38, 34, 1756, 1791, NULL, NULL),
(40, 'Людвиг Ван', 'Бетховен', 37, 34, 1770, 1827, NULL, NULL),
(41, 'Франц', 'Шуберт', 38, 28, 1797, 1828, NULL, NULL),
(43, 'Роберт', 'Шуман', 37, 28, 1810, 1856, NULL, NULL),
(44, 'Ференц', 'Лист', 22, 28, 1811, 1886, NULL, NULL),
(45, 'Рихад', 'Вагнер', 37, 28, 1813, 1883, NULL, NULL),
(47, 'Иоганнес', 'Брамс', 37, 28, 1833, 1897, NULL, NULL),
(48, 'Густав', 'Малер', 38, 28, 1860, 1911, NULL, NULL),
(49, 'Иоганн, отец', 'Штраус', 38, NULL, 1804, 1849, NULL, NULL),
(50, 'Имре', 'Кальман', 22, NULL, 1882, 1953, NULL, NULL),
(51, 'Гектор', 'Берлиоз', 39, 28, 1803, 1869, NULL, NULL),
(52, 'Фредерик', 'Шопен', NULL, 28, 1810, 1849, NULL, NULL),
(53, 'Шарль', 'Гуно', 39, 28, 1818, 1893, NULL, NULL),
(54, 'Жак', 'Оффенбах', 39, NULL, 1819, 1880, NULL, NULL),
(55, 'Камиль', 'Сен-Санс', 39, 28, 1835, 1921, NULL, NULL),
(56, 'Жорж', 'Бизе', 39, 28, 1838, 1875, NULL, NULL),
(57, 'Жюль', 'Массне', 39, 28, 1842, 1912, NULL, NULL),
(58, 'Клод', 'Дебюсси', 39, NULL, 1862, 1918, NULL, NULL),
(59, 'Морис', 'Равель', 39, NULL, 1875, 1937, NULL, NULL),
(60, 'Дмитрий', 'Бортнянский', 21, NULL, 1751, 1825, NULL, NULL),
(61, 'Михаил', 'Глинка', 21, NULL, 1804, 1857, NULL, NULL),
(62, 'Александр', 'Бородин', 21, NULL, 1833, 1887, NULL, NULL),
(63, 'Модест', 'Мусоргский', 21, NULL, 1839, 1881, NULL, NULL),
(64, 'Петр', 'Чайковский', 21, NULL, 1840, 1893, NULL, NULL),
(65, 'Николай', 'Римский-Корсаков', 21, NULL, 1844, 1908, NULL, NULL),
(66, 'Александр', 'Скрябин', 21, NULL, 1871, 1915, NULL, NULL),
(67, 'Сергей', 'Рахманинов', 21, NULL, 1873, 1943, NULL, NULL),
(68, 'Павел', 'Чесноков', 21, NULL, 1877, 1944, NULL, NULL),
(69, 'Игорь', 'Стравинский', 21, NULL, 1882, 1971, NULL, NULL),
(70, 'Сергей', 'Прокофьев', 21, NULL, 1891, 1953, NULL, NULL),
(71, 'Арам', 'Хачатурян', 21, NULL, 1903, 1978, NULL, NULL),
(72, 'Дмитрий', 'Кабалевский', 21, NULL, 1904, 1987, NULL, NULL),
(73, 'Дмитрий', 'Шостакович', 21, NULL, 1906, 1975, NULL, NULL),
(74, 'Георгий', 'Свиридов', 21, NULL, 1915, 1998, NULL, NULL),
(75, 'Исаак', 'Дунаевский', 21, NULL, 1900, 1955, NULL, NULL),
(76, 'Альфред ', 'Шнитке', 21, NULL, 1934, 1998, NULL, NULL),
(79, 'Иоганн, сын', '', 38, 28, 1825, 1899, NULL, NULL),
(80, 'Штраус', '', NULL, NULL, NULL, NULL, NULL, NULL),
(126, '', 'Беллини Винченцо', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `title`) VALUES
(21, 'Россия'),
(22, 'Венгрия'),
(26, 'Италия'),
(37, 'Германия'),
(38, 'Австрия'),
(39, 'Франция'),
(40, 'Проверка'),
(41, 'Проверка');

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `title`) VALUES
(28, 'романтизм'),
(29, 'современная классика'),
(33, 'барокко'),
(34, 'классицизм'),
(36, 'ХипХоп');

-- --------------------------------------------------------

--
-- Структура таблицы `Operas`
--

CREATE TABLE IF NOT EXISTS `operas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `composer_id` int(11) NOT NULL,
  `basedOn` text,
  `librettist` text,
  `premierePlace` text,
  `premiereYear` int(11) DEFAULT NULL,
  `partituraExists` set('yes','no') NOT NULL DEFAULT 'no',
  `duration` tinytext,
  `videos` text,
  `audios` text,
  `partituraFiles` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Дамп данных таблицы `Operas`
--

INSERT INTO `operas` (`id`, `title`, `composer_id`, `basedOn`, `librettist`, `premierePlace`, `premiereYear`, `partituraExists`, `duration`, `videos`, `audios`, `partituraFiles`) VALUES
(1, 'Оберто, граф ди Сан-Бонифачо', 28, '', 'Темистокле Солера', 'Милан, Ла Скала', 1839, 'yes', '13:20:30', NULL, NULL, NULL),
(98, 'Король на час', 28, 'А.В. Пинеу-Дюваль', 'Феличе Романи', 'Милан, Ла Скала', 1840, 'no', '', NULL, NULL, NULL),
(99, 'Набукко или Навуходоносор', 28, '', 'Темистокле Солера', 'Милан, Ла Скала', 1842, 'no', '', NULL, NULL, NULL),
(100, 'Ломбардцы в первом крестовом походе', 28, 'Томмасо Гросси', 'Темистокле Солера', 'Милан, Ла Скала', 1843, 'no', NULL, NULL, NULL, NULL),
(101, 'Эрнани', 28, 'Виктор Гюго', 'Франческо Мария Пьяве', 'Венеция, Ла Фениче', 1943, 'no', '', NULL, NULL, NULL),
(102, 'Двое Фоскари', 28, 'Джордж Байрон', 'Франческо Мария Пьяве', 'Рим, Арджентина', 1844, 'no', NULL, NULL, NULL, NULL),
(104, 'Жанна д''Арк', 28, 'Фридрих Шиллер', 'Темистокле Солера', 'Милан, Ла Скала', 1844, 'no', NULL, NULL, NULL, NULL),
(105, 'Альзира', 28, 'Вольтер', 'Сальваторе Камарано', 'Неаполь, Сан-Карло', 1845, 'no', NULL, NULL, NULL, NULL),
(106, 'Аттила', 28, 'Захарис Вернер', 'Темистокле Солера, Франческо Мария Пьяве', 'Венеция, Ла Фениче', 1846, 'no', NULL, NULL, NULL, NULL),
(107, 'Макбет', 28, 'Вильям Шекспир', 'Франческо Мария Пьяве', 'Флоренция, Театро делла Пергола', 1847, 'no', NULL, NULL, NULL, NULL),
(108, 'Разбойники', 28, 'Фридрих Шиллер', 'Андреа Маффей', 'Лондон, театр Её Величества', 1847, 'no', NULL, NULL, NULL, NULL),
(109, 'Иерусалим', 28, NULL, 'Гюстав Ваэз и Альфонс Руайе', 'Париж, корол. Академия музыки', 1847, 'no', NULL, NULL, NULL, NULL),
(110, 'Корсар', 28, 'Джордж Гордон Байрон', 'Франческо Мария Пьяве', 'Триест, Театро Гранде', 1848, 'no', NULL, NULL, NULL, NULL),
(111, 'Битва при Леньяно', 28, NULL, 'Сальваторе Камарано', 'Рим', 1849, 'no', NULL, NULL, NULL, NULL),
(112, 'Луиза Миллер', 28, 'Фридрих Шиллер', 'Сальваторе Камарано', 'Неаполь, Сан-Карло', 1849, 'no', NULL, NULL, NULL, NULL),
(113, 'Стиффелио', 28, 'Эмиль Сувестр и Эжен Буржуа', 'Франческо Мария Пьяве', 'Триест, Театро Гранде', 1850, 'no', NULL, NULL, NULL, NULL),
(114, 'Риголетто', 28, 'Виктор Гюго', 'Франческо Мария Пьяве', 'Венеция, Ла Фениче', 1851, 'no', NULL, NULL, NULL, NULL),
(115, 'Трубадур', 28, 'Антонио Гарсия Гутьерреса', 'Сальваторе Каммарано и Леоне Бардаре', 'Рим,  Театро Аполло', 1853, 'no', NULL, NULL, NULL, NULL),
(116, 'Травиата', 28, 'Александр Дюма-сын', 'Франческо Мария Пьяве', 'Венеция, Ла Фениче', 1853, 'no', NULL, NULL, NULL, NULL),
(117, 'Сицилийская вечерня', 28, 'Шарль Дюверье и Эжен Скриб', 'Шарль Дюверье и Эжен Скриб', 'Париж, Гранд-Опера', 1855, 'no', NULL, NULL, NULL, NULL),
(118, 'Симон Бокканегра', 28, 'Антонио Гарсия Гутьеррес', 'Франческо Мария Пьяве', 'Венеция, Ла Фениче', 1855, 'no', NULL, NULL, NULL, NULL),
(119, 'Арольдо', 28, NULL, 'Франческо Мария Пьяве', 'Римини, новый Театр', 1857, 'no', NULL, NULL, NULL, NULL),
(120, 'Бал-Маскарад', 28, NULL, 'Антонио Сомма по сюжету Э. Скриба', 'Рим, Театро Аполло', 1859, 'no', NULL, NULL, NULL, NULL),
(121, 'Сила судьбы', 28, 'Анхель Сааверда ', 'Франческо Мария Пьяве', 'Санкт-Петербург,  Большой Каменный театр', 1862, 'no', NULL, NULL, NULL, NULL),
(122, 'Дон Карлос', 28, 'Фридрих Шиллер', 'Жозеф Мери и Камиль дю Локль', 'Париж, Парижская опера', 1865, 'no', NULL, NULL, NULL, NULL),
(123, 'Макбет, вторая версия', 28, 'Вильям Шекспир', 'Франческо Мария Пьяве', 'Париж, Гранд-Опера', 1865, 'no', '', NULL, NULL, NULL),
(124, 'Аида', 28, 'О. Ф. Мариетт', 'Антонио Гисланцоне', 'Каир. Оперный театр', 1870, 'no', NULL, NULL, NULL, NULL),
(125, 'Отелло', 28, 'Вильям Шекспир', 'Арриго Бойто', 'Милан, Ла Скала', 1886, 'no', NULL, NULL, NULL, NULL),
(126, 'Фальстаф', 28, 'Вильям Шекспир', 'Арриго Бойто', 'Милан, Ла Скала', 1889, 'no', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `operas_files`
--

CREATE TABLE IF NOT EXISTS `operas_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operas_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `md5` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `operas_files`
--

INSERT INTO `operas_files` (`id`, `operas_id`, `name`, `type`, `file`, `md5`) VALUES
(48, 1, '03. Ковент-Гарден               1975        Англия          Лондон.mp4', 'videos', 'uploads/videos/ca3f81e63200fbd2f2b0d5d011b9a363.mp4', 'ca3f81e63200fbd2f2b0d5d011b9a363'),
(49, 1, 'Verdi - Un Ballo in Maschera (Fabritiis ) NHK Symphony Orchestra Tokyo Phlharmonic Chorus.mp4', 'videos', 'uploads/videos/1881d866448163fe275f4273fe142e9c.mp4', '1881d866448163fe275f4273fe142e9c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
