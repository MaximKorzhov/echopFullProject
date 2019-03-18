--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.22.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 18.03.2019 22:26:29
-- Версия сервера: 8.0.15
-- Версия клиента: 4.1
--

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8mb4';

--
-- Установка базы данных по умолчанию
--
USE fp_base;

--
-- Удалить таблицу `country`
--
DROP TABLE IF EXISTS country;

--
-- Удалить таблицу `groups`
--
DROP TABLE IF EXISTS groups;

--
-- Удалить таблицу `messages`
--
DROP TABLE IF EXISTS messages;

--
-- Удалить таблицу `migration`
--
DROP TABLE IF EXISTS migration;

--
-- Удалить таблицу `position`
--
DROP TABLE IF EXISTS `position`;

--
-- Удалить таблицу `shops`
--
DROP TABLE IF EXISTS shops;

--
-- Удалить таблицу `suppliers`
--
DROP TABLE IF EXISTS suppliers;

--
-- Удалить таблицу `zakaz`
--
DROP TABLE IF EXISTS zakaz;

--
-- Удалить таблицу `user`
--
DROP TABLE IF EXISTS user;

--
-- Удалить таблицу `user_type`
--
DROP TABLE IF EXISTS user_type;

--
-- Установка базы данных по умолчанию
--
USE fp_base;

--
-- Создать таблицу `user_type`
--
CREATE TABLE user_type (
  id int(11) DEFAULT NULL,
  name varchar(50) DEFAULT NULL
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `UK_user`.`type_id` для объекта типа таблица `user_type`
--
ALTER TABLE user_type
ADD UNIQUE INDEX `UK_user.type_id` (id);

--
-- Создать таблицу `user`
--
CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  auth_key varchar(32) NOT NULL,
  password_hash varchar(255) NOT NULL,
  password_reset_token varchar(255) DEFAULT NULL,
  email varchar(255) NOT NULL,
  status smallint(6) NOT NULL DEFAULT 10,
  created_at int(11) NOT NULL,
  updated_at int(11) NOT NULL,
  user_type_id int(11) DEFAULT NULL,
  tel varchar(255) DEFAULT NULL,
  name varchar(50) DEFAULT NULL,
  last varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 6,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8,
COLLATE utf8_unicode_ci;

--
-- Создать индекс `email` для объекта типа таблица `user`
--
ALTER TABLE user
ADD UNIQUE INDEX email (email);

--
-- Создать индекс `password_reset_token` для объекта типа таблица `user`
--
ALTER TABLE user
ADD UNIQUE INDEX password_reset_token (password_reset_token);

--
-- Создать индекс `username` для объекта типа таблица `user`
--
ALTER TABLE user
ADD UNIQUE INDEX username (username);

--
-- Создать внешний ключ
--
ALTER TABLE user
ADD CONSTRAINT FK_user_user_type_id FOREIGN KEY (user_type_id)
REFERENCES user_type (id);

--
-- Создать таблицу `zakaz`
--
CREATE TABLE zakaz (
  zakaz_id int(11) NOT NULL AUTO_INCREMENT,
  zakaz_from int(11) NOT NULL,
  zakaz_to int(11) NOT NULL,
  position_id int(11) NOT NULL,
  date_from datetime DEFAULT NULL,
  date_to datetime DEFAULT NULL,
  state varchar(45) DEFAULT NULL,
  soob_id varchar(45) DEFAULT NULL,
  zak_id int(11) NOT NULL,
  summ varchar(45) DEFAULT NULL,
  PRIMARY KEY (zakaz_id),
  UNIQUE INDEX idnew_table_UNIQUE (zakaz_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `suppliers`
--
CREATE TABLE suppliers (
  id int(11) NOT NULL AUTO_INCREMENT,
  unp varchar(45) DEFAULT NULL,
  bank varchar(100) DEFAULT NULL,
  contact_id varchar(45) DEFAULT NULL,
  name varchar(45) DEFAULT NULL,
  schet varchar(45) DEFAULT NULL,
  balans varchar(45) DEFAULT NULL,
  status varchar(45) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 13,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `unp_UNIQUE` для объекта типа таблица `suppliers`
--
ALTER TABLE suppliers
ADD UNIQUE INDEX unp_UNIQUE (unp);

--
-- Создать таблицу `shops`
--
CREATE TABLE shops (
  id int(11) NOT NULL AUTO_INCREMENT,
  unp varchar(45) DEFAULT NULL,
  bank varchar(45) DEFAULT NULL,
  contact_id varchar(45) DEFAULT NULL,
  name varchar(45) DEFAULT NULL,
  schet varchar(45) DEFAULT NULL,
  balans varchar(45) DEFAULT NULL,
  status varchar(45) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `unp_UNIQUE` для объекта типа таблица `shops`
--
ALTER TABLE shops
ADD UNIQUE INDEX unp_UNIQUE (unp);

--
-- Создать таблицу `position`
--
CREATE TABLE `position` (
  id int(11) NOT NULL AUTO_INCREMENT,
  art varchar(45) DEFAULT NULL,
  shtrih varchar(45) DEFAULT NULL,
  name varchar(90) DEFAULT NULL,
  price decimal(10, 2) DEFAULT NULL,
  date datetime DEFAULT NULL,
  `group` varchar(45) DEFAULT NULL,
  podgroup varchar(45) DEFAULT NULL,
  size varchar(45) DEFAULT NULL,
  podrobno blob DEFAULT NULL,
  add_pole varchar(45) DEFAULT NULL,
  from_id varchar(45) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 23,
AVG_ROW_LENGTH = 1820,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `migration`
--
CREATE TABLE migration (
  version varchar(180) NOT NULL,
  apply_time int(11) DEFAULT NULL,
  PRIMARY KEY (version)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `messages`
--
CREATE TABLE messages (
  id int(11) NOT NULL AUTO_INCREMENT,
  from_id varchar(45) DEFAULT NULL,
  to_id varchar(45) DEFAULT NULL,
  zakaz_id varchar(45) DEFAULT NULL,
  type varchar(45) DEFAULT NULL,
  status varchar(45) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `groups`
--
CREATE TABLE groups (
  gr_id int(11) NOT NULL AUTO_INCREMENT,
  gr_name varchar(90) DEFAULT NULL,
  gr_pod int(11) DEFAULT NULL,
  PRIMARY KEY (gr_id)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `country`
--
CREATE TABLE country (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы user_type
--
INSERT INTO user_type VALUES
(1, 'suppliers'),
(0, 'shops');

-- 
-- Вывод данных для таблицы zakaz
--
INSERT INTO zakaz VALUES
(1, 2, 9, 2, '2021-02-20 19:00:00', '2024-02-20 19:00:00', 'open', NULL, 0, '100');

-- 
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(3, 'max', 'HKFUNmQW9LNkzmpWNpU2h4sLoaVFoROe', '$2y$13$ScC2G.hJ1xekn//QFRd8sOvM/2SUx5.pAA5PilY.v0eYz8/KxTZ5G', NULL, 'ironmax68@yandex.ru', 10, 1552162089, 1552162089, 0, NULL, NULL, NULL),
(4, 'maks', '1234567', '$2y$13$ck8XSy/lRhgSX7fvWQFfieuMmR2daGnrT.W5ZitIu4roKDDXY3s6u', '55555555555555', 'ironmax63@yandex.ru', 2, 2, 2, 0, NULL, NULL, NULL),
(5, 'dima', '123', '1211', '2323', 'fsds@sdfswfs', 1, 1, 2, 1, NULL, NULL, NULL);

-- 
-- Вывод данных для таблицы suppliers
--
INSERT INTO suppliers VALUES
(9, '54352', NULL, NULL, 'Zаумыу', NULL, NULL, NULL),
(10, '741236', NULL, NULL, 'ООО &quot;Фабрика&quot;', NULL, NULL, NULL),
(11, 'fvds', NULL, NULL, 'ООО &quot;Фабрика&quot;', NULL, NULL, NULL),
(12, 'п54ц4', NULL, NULL, 'п5кы', NULL, NULL, NULL);

-- 
-- Вывод данных для таблицы shops
--
INSERT INTO shops VALUES
(1, '123', '456', '765', 'один', '13232323', '233222', 'ыфф');

-- 
-- Вывод данных для таблицы `position`
--
INSERT INTO `position` VALUES
(2, '5898', '286868486687', 'товар 3', 1.24, '2019-02-04 22:55:33', 'rdtrп', 'yufyj', '444x776x888', x'6B6A6664736864206B682064696775656877726C696768777269756C67686577726C67726567772C726520686A756C726B6575206768777265752069676975726520676869756577726C206768696C7565727720676869756577722067756972657772207767206466676264666720617265672065726720657220676572206720', '9', NULL),
(6, 'cxvx', '45354', 'gdgd', 3.10, '2019-02-19 13:38:53', 'efwe', NULL, 'gerge', x'3234', '9', NULL),
(7, 'cxvx', '45354', 'gdgd', 3.00, '2019-02-18 12:39:31', 'efwe', NULL, 'gerge', x'', '9', NULL),
(13, '65465', '345435345', 'jhjh', 2.13, '2019-02-19 20:56:01', 'bnfg bs rbr', NULL, 'проба', x'343335343366676466736266206262736662737272736E72677420207220', '9', NULL),
(14, '543tr3', '4333', 'grtb tr brtb  tr', 4.00, '2019-02-19 21:37:23', 'regerg', NULL, 'rtgh454gw 4 g4 ', x'206777746874206274206877367435206835347468623435', '9', NULL),
(15, '35325', '453453453', 'gsdfgdfg', 6.00, '2019-02-19 21:52:20', 'gdhhn', NULL, 'gfdb', x'6668786668', '9', NULL),
(20, '45', '5353', 'reger', 4.00, '2019-02-20 14:14:09', 'greger', NULL, 'reger', x'7265676572', '10', NULL),
(21, 'rte', '34534534', 'ert434', 5.00, '2019-02-20 14:20:30', 'regerge', NULL, '43534', x'746572746572', '10', NULL),
(22, '54343', '45345345345', 'ergerg', 5.00, '2019-02-20 18:56:14', 'retgretgre', NULL, '5343', x'726567726567', '10', NULL);

-- 
-- Вывод данных для таблицы migration
--
INSERT INTO migration VALUES
('m000000_000000_base', 1551988093),
('m130524_201442_init', 1551988409);

-- 
-- Вывод данных для таблицы messages
--
-- Таблица fp_base.messages не содержит данных

-- 
-- Вывод данных для таблицы groups
--
-- Таблица fp_base.groups не содержит данных

-- 
-- Вывод данных для таблицы country
--
INSERT INTO country VALUES
(1, 'Russia'),
(2, 'Ukraine'),
(3, 'Belorussia');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;