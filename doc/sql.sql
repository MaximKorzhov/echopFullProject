-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.25 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных fp_base
CREATE DATABASE IF NOT EXISTS `fp_base` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fp_base`;

-- Дамп структуры для таблица fp_base.fp_contact
CREATE TABLE IF NOT EXISTS `fp_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `last` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `user_UNIQUE` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fp_base.fp_contact: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `fp_contact` DISABLE KEYS */;
INSERT IGNORE INTO `fp_contact` (`id`, `from`, `name`, `tel`, `mail`, `status`, `user`, `pass`, `last`) VALUES
	(3, '9', 'еукецук', 'куацу', 'акйуцк', 'active', 'ауц', '1111', NULL),
	(4, '10', 'tyhrt', 'trhrt', 'dfv', 'active', 'dfvd', '1111', NULL),
	(5, '11', 'tyhrt', 'trhrt', 'dfv', 'active', '34r3', 'ferfewr', NULL),
	(6, '12', '5пццп', '5п4ц54', '54п4ц5', 'active', 'п54', '54п4ц5п45', NULL);
/*!40000 ALTER TABLE `fp_contact` ENABLE KEYS */;

-- Дамп структуры для таблица fp_base.fp_group
CREATE TABLE IF NOT EXISTS `fp_group` (
  `gr_id` int(11) NOT NULL AUTO_INCREMENT,
  `gr_name` varchar(90) DEFAULT NULL,
  `gr_pod` int(11) DEFAULT NULL,
  PRIMARY KEY (`gr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fp_base.fp_group: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `fp_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `fp_group` ENABLE KEYS */;

-- Дамп структуры для таблица fp_base.fp_position
CREATE TABLE IF NOT EXISTS `fp_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `art` varchar(45) DEFAULT NULL,
  `shtrih` varchar(45) DEFAULT NULL,
  `name` varchar(90) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `group` varchar(45) DEFAULT NULL,
  `podgroup` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `podrobno` blob,
  `add_pole` varchar(45) DEFAULT NULL,
  `from_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fp_base.fp_position: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `fp_position` DISABLE KEYS */;
INSERT IGNORE INTO `fp_position` (`id`, `art`, `shtrih`, `name`, `price`, `date`, `group`, `podgroup`, `size`, `podrobno`, `add_pole`, `from_id`) VALUES
	(2, '5898', '286868486687', 'товар 3', 1.24, '2019-02-04 22:55:33', 'rdtrп', 'yufyj', '444x776x888', _binary 0x6B6A6664736864206B682064696775656877726C696768777269756C67686577726C67726567772C726520686A756C726B6575206768777265752069676975726520676869756577726C206768696C7565727720676869756577722067756972657772207767206466676264666720617265672065726720657220676572206720, '9', NULL),
	(6, 'cxvx', '45354', 'gdgd', 3.10, '2019-02-19 13:38:53', 'efwe', NULL, 'gerge', _binary 0x3234, '9', NULL),
	(7, 'cxvx', '45354', 'gdgd', 3.00, '2019-02-18 12:39:31', 'efwe', NULL, 'gerge', _binary '', '9', NULL),
	(13, '65465', '345435345', 'jhjh', 2.13, '2019-02-19 20:56:01', 'bnfg bs rbr', NULL, 'проба', _binary 0x343335343366676466736266206262736662737272736E72677420207220, '9', NULL),
	(14, '543tr3', '4333', 'grtb tr brtb  tr', 4.00, '2019-02-19 21:37:23', 'regerg', NULL, 'rtgh454gw 4 g4 ', _binary 0x206777746874206274206877367435206835347468623435, '9', NULL),
	(15, '35325', '453453453', 'gsdfgdfg', 6.00, '2019-02-19 21:52:20', 'gdhhn', NULL, 'gfdb', _binary 0x6668786668, '9', NULL),
	(20, '45', '5353', 'reger', 4.00, '2019-02-20 14:14:09', 'greger', NULL, 'reger', _binary 0x7265676572, '10', NULL),
	(21, 'rte', '34534534', 'ert434', 5.00, '2019-02-20 14:20:30', 'regerge', NULL, '43534', _binary 0x746572746572, '10', NULL),
	(22, '54343', '45345345345', 'ergerg', 5.00, '2019-02-20 18:56:14', 'retgretgre', NULL, '5343', _binary 0x726567726567, '10', NULL);
/*!40000 ALTER TABLE `fp_position` ENABLE KEYS */;

-- Дамп структуры для таблица fp_base.fp_postav
CREATE TABLE IF NOT EXISTS `fp_postav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unp` varchar(45) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `contact_id` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `schet` varchar(45) DEFAULT NULL,
  `balans` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `unp_UNIQUE` (`unp`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fp_base.fp_postav: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `fp_postav` DISABLE KEYS */;
INSERT IGNORE INTO `fp_postav` (`id`, `unp`, `bank`, `contact_id`, `name`, `schet`, `balans`, `status`) VALUES
	(9, '54352', NULL, NULL, 'Zаумыу', NULL, NULL, NULL),
	(10, '741236', NULL, NULL, 'ООО &quot;Фабрика&quot;', NULL, NULL, NULL),
	(11, 'fvds', NULL, NULL, 'ООО &quot;Фабрика&quot;', NULL, NULL, NULL),
	(12, 'п54ц4', NULL, NULL, 'п5кы', NULL, NULL, NULL);
/*!40000 ALTER TABLE `fp_postav` ENABLE KEYS */;

-- Дамп структуры для таблица fp_base.fp_prodam
CREATE TABLE IF NOT EXISTS `fp_prodam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unp` varchar(45) DEFAULT NULL,
  `bank` varchar(45) DEFAULT NULL,
  `contact_id` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `schet` varchar(45) DEFAULT NULL,
  `balans` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `unp_UNIQUE` (`unp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fp_base.fp_prodam: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `fp_prodam` DISABLE KEYS */;
/*!40000 ALTER TABLE `fp_prodam` ENABLE KEYS */;

-- Дамп структуры для таблица fp_base.fp_soob
CREATE TABLE IF NOT EXISTS `fp_soob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` varchar(45) DEFAULT NULL,
  `to_id` varchar(45) DEFAULT NULL,
  `zakaz_id` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fp_base.fp_soob: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `fp_soob` DISABLE KEYS */;
/*!40000 ALTER TABLE `fp_soob` ENABLE KEYS */;

-- Дамп структуры для таблица fp_base.fp_zakaz
CREATE TABLE IF NOT EXISTS `fp_zakaz` (
  `zakaz_id` int(11) NOT NULL AUTO_INCREMENT,
  `zakaz_from` int(11) NOT NULL,
  `zakaz_to` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `soob_id` varchar(45) DEFAULT NULL,
  `zak_id` int(11) NOT NULL,
  `summ` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`zakaz_id`),
  UNIQUE KEY `idnew_table_UNIQUE` (`zakaz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fp_base.fp_zakaz: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `fp_zakaz` DISABLE KEYS */;
INSERT IGNORE INTO `fp_zakaz` (`zakaz_id`, `zakaz_from`, `zakaz_to`, `position_id`, `date_from`, `date_to`, `state`, `soob_id`, `zak_id`, `summ`) VALUES
	(1, 2, 9, 2, '2021-02-20 19:00:00', '2024-02-20 19:00:00', 'open', NULL, 0, '100');
/*!40000 ALTER TABLE `fp_zakaz` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
