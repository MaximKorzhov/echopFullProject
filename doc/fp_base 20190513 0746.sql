--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.45.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 13.05.2019 7:46:12
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
-- Удалить таблицу `order_group`
--
DROP TABLE IF EXISTS order_group;

--
-- Удалить таблицу `order`
--
DROP TABLE IF EXISTS `order`;

--
-- Удалить таблицу `position`
--
DROP TABLE IF EXISTS `position`;

--
-- Удалить таблицу `organizations`
--
DROP TABLE IF EXISTS organizations;

--
-- Удалить таблицу `org_type`
--
DROP TABLE IF EXISTS org_type;

--
-- Удалить таблицу `user`
--
DROP TABLE IF EXISTS user;

--
-- Установка базы данных по умолчанию
--
USE fp_base;

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
  status smallint(6) NOT NULL,
  created_at int(11) NOT NULL,
  updated_at int(11) NOT NULL,
  tel varchar(255) DEFAULT NULL,
  fullname varchar(50) DEFAULT NULL,
  last int(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 38,
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
-- Создать таблицу `org_type`
--
CREATE TABLE org_type (
  id int(11) DEFAULT NULL,
  name varchar(50) DEFAULT NULL
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `UK_user`.`type_id` для объекта типа таблица `org_type`
--
ALTER TABLE org_type
ADD UNIQUE INDEX `UK_user.type_id` (id);

--
-- Создать таблицу `organizations`
--
CREATE TABLE organizations (
  id int(11) NOT NULL AUTO_INCREMENT,
  unp varchar(45) DEFAULT NULL,
  bank varchar(100) DEFAULT NULL,
  user_id int(11) DEFAULT NULL,
  name varchar(45) DEFAULT NULL,
  schet varchar(45) DEFAULT NULL,
  balans varchar(45) DEFAULT NULL,
  status varchar(45) DEFAULT NULL,
  org_type_id int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 35,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `unp_UNIQUE` для объекта типа таблица `organizations`
--
ALTER TABLE organizations
ADD UNIQUE INDEX unp_UNIQUE (unp);

--
-- Создать внешний ключ
--
ALTER TABLE organizations
ADD CONSTRAINT FK_organizations_org_type_id FOREIGN KEY (org_type_id)
REFERENCES org_type (id) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE organizations
ADD CONSTRAINT FK_organizations_user_id FOREIGN KEY (user_id)
REFERENCES user (id);

--
-- Создать таблицу `position`
--
CREATE TABLE `position` (
  id int(11) NOT NULL AUTO_INCREMENT,
  art varchar(45) DEFAULT NULL,
  shtrih varchar(45) DEFAULT NULL,
  name varchar(90) DEFAULT NULL,
  price decimal(10, 2) NOT NULL DEFAULT 0.00,
  date datetime DEFAULT NULL,
  `group` varchar(45) DEFAULT NULL,
  podgroup varchar(45) DEFAULT NULL,
  size varchar(45) DEFAULT NULL,
  podrobno blob DEFAULT NULL,
  add_pole varchar(45) DEFAULT NULL,
  org_id int(11) DEFAULT NULL,
  sales_tax decimal(10, 0) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 73,
AVG_ROW_LENGTH = 1820,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE `position`
ADD CONSTRAINT FK_position_organizations_id FOREIGN KEY (org_id)
REFERENCES organizations (id) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать таблицу `order`
--
CREATE TABLE `order` (
  id int(11) NOT NULL AUTO_INCREMENT,
  org_id int(11) NOT NULL DEFAULT 0,
  position_id int(11) NOT NULL DEFAULT 0,
  date_from datetime DEFAULT NULL,
  date_to datetime DEFAULT NULL,
  state varchar(45) DEFAULT NULL,
  soob_id varchar(45) DEFAULT NULL,
  number varchar(45) DEFAULT NULL,
  order_group_id int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE INDEX idnew_table_UNIQUE (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 17,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE `order`
ADD CONSTRAINT FK_order_position_id FOREIGN KEY (position_id)
REFERENCES `position` (id) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать таблицу `order_group`
--
CREATE TABLE order_group (
  id int(11) NOT NULL AUTO_INCREMENT,
  date date NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 6,
AVG_ROW_LENGTH = 3276,
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
  message_text varchar(255) NOT NULL,
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
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  parent_id int(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 9,
AVG_ROW_LENGTH = 2048,
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
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(1, 'admin', 'admin', '$2y$13$fYXItsLXsudX1PjSP4Ez4OXyp3THYHv9tkA2kNC7V7aZsrFdr8b3q', NULL, 'ya.ru', 10, 1, 1, NULL, 'админ', NULL),
(36, 'user123', '5fpb4OiEemEMvHDh5ceGI6vRBSZsNudC', '$2y$13$lgaQpRDkM.r5TYA6uTLyKekKtXpu2ysUk/.EdEwajntZT06K.sGHS', NULL, 'd@ya.ru', 10, 1554408688, 1554408688, '2324234234234', 'DMITRIY KOROLEV', NULL),
(37, 'user1234', 'VfHhktZYFyxbMpEfz57BaxUILaaIclgG', '$2y$13$ijNGt/ViBbux0MTYscASveE2FLWrSLF0AeWcM3q/2uPkWvmSqabpG', NULL, 'w@ya.ru', 10, 1554410423, 1554410423, '345435334534', 'JOHN DOE', NULL);

-- 
-- Вывод данных для таблицы org_type
--
INSERT INTO org_type VALUES
(1, 'supplier'),
(0, 'shop');

-- 
-- Вывод данных для таблицы organizations
--
INSERT INTO organizations VALUES
(30, '1', NULL, 36, 'Магазин1', NULL, NULL, NULL, 0),
(31, '2', NULL, 37, 'Поставщик1', NULL, NULL, NULL, 1),
(32, '3', NULL, 36, 'Магазин2', NULL, NULL, NULL, 0),
(33, '4', NULL, 36, 'Поставщик2', NULL, NULL, NULL, 1),
(34, '5', NULL, 1, 'Магазин3', NULL, NULL, NULL, 0);

-- 
-- Вывод данных для таблицы `position`
--
INSERT INTO `position` VALUES
(62, '', '', 'товар25', 10.50, NULL, '', '', '', x'', '', 31, 13),
(63, '', '', 'товар24', 100.25, NULL, '', '', '', x'', '', 33, 13),
(64, '', '', 'товар21', 20.10, NULL, '', '', '', x'', '', 31, 13),
(65, '', '', 'товар 4', 2.01, NULL, '', '', '', x'', '', 31, 13),
(66, '', '', 'товар 5', 100.60, NULL, '', '', '', x'', '', 31, 13),
(67, '', '', 'товар 6', 200.45, NULL, '', '', '', x'', '', 31, 13),
(68, NULL, NULL, 'товар 7', 300.34, NULL, NULL, NULL, NULL, NULL, NULL, 33, 13),
(70, '', '', 'товар7', 1.03, NULL, '', '', '', x'', '', 31, 13),
(71, '', '', 'товар8', 12.06, NULL, '', '', '', x'', '', 31, 13),
(72, '', '', 'товар9', 200.00, NULL, '', '', '', x'', '', 31, 13);

-- 
-- Вывод данных для таблицы order_group
--
INSERT INTO order_group VALUES
(1, '2019-04-24'),
(2, '2019-04-23'),
(3, '2019-04-22'),
(4, '2019-04-25'),
(5, '2019-04-15');

-- 
-- Вывод данных для таблицы `order`
--
INSERT INTO `order` VALUES
(12, 30, 62, '2019-03-17 00:00:00', '2019-04-03 00:00:00', NULL, NULL, '1', 1),
(13, 30, 63, '2019-03-16 00:00:00', '2019-04-04 00:00:00', NULL, NULL, '20', 4),
(14, 32, 64, '2019-03-15 00:00:00', '2019-04-05 00:00:00', NULL, NULL, '30', 2),
(15, 34, 65, '2019-03-22 00:00:00', '2019-04-19 00:00:00', NULL, NULL, '2', 3),
(16, 30, 72, '2019-03-30 00:00:00', '2019-04-18 00:00:00', NULL, NULL, '10', 1),
(17, 30, 70, '2019-05-15 00:00:00', '2019-05-15 00:00:00', NULL, NULL, '11', 1),
(18, 32, 70, '2019-05-07 00:00:00', '2019-05-14 00:00:00', NULL, NULL, '13', 2);

-- 
-- Вывод данных для таблицы migration
--
INSERT INTO migration VALUES
('m000000_000000_base', 1551988093),
('m130524_201442_init', 1551988409);

-- 
-- Вывод данных для таблицы messages
--
INSERT INTO messages VALUES
(1, '12', '11', '2', NULL, NULL, 'Добрый день. Сообщаю вам, что возможно выполнить ваш заказ раньше срока'),
(2, '11', '12', '2', NULL, NULL, 'Очень хорошо!'),
(3, '12', '11', '2', NULL, NULL, 'В таком случае ожидаю перевода');

-- 
-- Вывод данных для таблицы groups
--
INSERT INTO groups VALUES
(1, 'текстиль', NULL),
(2, 'носки', 1),
(3, 'наволочки', 1),
(4, 'майки', 1),
(5, 'посуда', NULL),
(6, 'чашки', 5),
(7, 'кастрюли', 5),
(8, 'чайник', 5);

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