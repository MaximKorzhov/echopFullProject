--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.22.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 06.05.2019 23:09:38
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
-- Удалить таблицу `order`
--
DROP TABLE IF EXISTS `order`;

--
-- Удалить таблицу `order_group`
--
DROP TABLE IF EXISTS order_group;

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
AUTO_INCREMENT = 37,
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
AUTO_INCREMENT = 31,
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
  sales_tax decimal(10, 0) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 63,
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
-- Создать таблицу `order_group`
--
CREATE TABLE order_group (
  id int(11) NOT NULL AUTO_INCREMENT,
  data date NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `order`
--
CREATE TABLE `order` (
  id int(11) NOT NULL AUTO_INCREMENT,
  org_id int(11) NOT NULL,
  position_id int(11) NOT NULL,
  date_from datetime DEFAULT NULL,
  date_to datetime DEFAULT NULL,
  state varchar(45) DEFAULT NULL,
  soob_id varchar(45) DEFAULT NULL,
  number varchar(45) DEFAULT NULL,
  order_group_id int(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX idnew_table_UNIQUE (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 18,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE `order`
ADD CONSTRAINT FK_order_order_group_id FOREIGN KEY (order_group_id)
REFERENCES order_group (id);

--
-- Создать внешний ключ
--
ALTER TABLE `order`
ADD CONSTRAINT FK_order_position_id FOREIGN KEY (position_id)
REFERENCES `position` (id) ON DELETE CASCADE ON UPDATE CASCADE;

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
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
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
AUTO_INCREMENT = 8,
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
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(1, 'admin', 'admin', '$2y$13$fYXItsLXsudX1PjSP4Ez4OXyp3THYHv9tkA2kNC7V7aZsrFdr8b3q', NULL, 'ya.ru', 10, 1, 1, NULL, 'админ', NULL),
(6, 'user', 'user', '$2y$13$fYXItsLXsudX1PjSP4Ez4OXyp3THYHv9tkA2kNC7V7aZsrFdr8b3q', NULL, 'y.ru', 10, 1, 1, NULL, 'юзверь1', NULL),
(7, 'user2', 'user2', '$2y$13$fYXItsLXsudX1PjSP4Ez4OXyp3THYHv9tkA2kNC7V7aZsrFdr8b3q', NULL, 'tt.ru', 0, 1, 1, NULL, 'юзверь2', NULL),
(8, 'user3', 'user3', '$2y$13$fYXItsLXsudX1PjSP4Ez4OXyp3THYHv9tkA2kNC7V7aZsrFdr8b3q', NULL, 'rr.ru', 10, 1, 1, NULL, 'юзверь3', NULL),
(9, 'user4', 'user4', '$2y$13$fYXItsLXsudX1PjSP4Ez4OXyp3THYHv9tkA2kNC7V7aZsrFdr8b3q', NULL, 'yy.ru', 0, 1, 1, NULL, 'юзверь4', NULL),
(10, 'user5', 'user5', '$2y$13$fYXItsLXsudX1PjSP4Ez4OXyp3THYHv9tkA2kNC7V7aZsrFdr8b3q', NULL, 'uuu.ru', 10, 1, 1, NULL, 'юзверь5', NULL),
(35, 'user123', 'GeNTMSFk0fVxNgfB_YXYLEdyCd2x7bmt', '$2y$13$GyukWs9xalwYZ95kgXaSNepoF6PRTROAqQBaA7T74ZiR/0/ujfuUm', NULL, 'dmkorolev@ydex.ru', 10, 1554352364, 1554352364, '89663029815', 'fio', NULL),
(36, 'maxin', 'YOk0Wr5sy81jXKvYCMRaSu7QNPtT35xj', '$2y$13$gsGiWs9aGZZ.KZl8lOw0CeMPHReaUoFYOc/mz.VDh5hQ.R94djk8i', NULL, 'iron@yandex.ru', 10, 1554443917, 1554443917, '933232323232', 'VasiaPetrov', NULL);

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
(2, '741236', NULL, 7, 'магазин1', NULL, NULL, NULL, 0),
(9, '54352', NULL, 6, 'поставщик1', NULL, NULL, NULL, 1),
(11, 'fvds', NULL, 1, 'поставщик2', NULL, NULL, NULL, 1),
(12, 'п54ц4', NULL, 8, 'магазин2', NULL, NULL, NULL, 0),
(13, 'afa', NULL, 9, 'поставщик3', NULL, NULL, NULL, 1),
(14, 'wfr', NULL, 10, 'магазин3', NULL, NULL, NULL, 0),
(29, 'unp', NULL, 35, 'organization', NULL, NULL, NULL, 1),
(30, '23313', NULL, 36, 'vasia', NULL, NULL, NULL, 1);

-- 
-- Вывод данных для таблицы `position`
--
INSERT INTO `position` VALUES
(3, '5891', '286868486687', 'товар 1', 1.24, '2019-02-04 22:55:33', 'rdtrп', 'yufyj', '444x776x888', x'6B6A6664736864206B682064696775656877726C696768777269756C67686577726C67726567772C726520686A756C726B6575206768777265752069676975726520676869756577726C206768696C7565727720676869756577722067756972657772207767206466676264666720617265672065726720657220676572206720', '9', 11, 20),
(6, 'cxvff', '45354', 'товар 2', 3.10, '2019-02-19 13:38:53', 'efwe', '', 'gerge', x'3234', '9', 11, 20),
(7, 'cxvxt', '45354', 'товар 3', 3.00, '2019-02-18 12:39:31', 'efwe', '', 'gerge', x'', '9', 9, 20),
(13, '654651', '345435345', 'товар 4', 2.13, '2019-02-19 20:56:01', 'bnfg bs rbr', '', 'проба', x'343335343366676466736266206262736662737272736E72677420207220', '9', 11, 20),
(14, '543re', '4333', 'товар 5', 4.00, '2019-02-19 21:37:23', 'regerg', '', 'rtgh454gw 4 g4 ', x'206777746874206274206877367435206835347468623435', '9', 13, 20),
(15, '35325', '453453453', 'товар 6', 6.00, '2019-02-19 21:52:20', 'gdhhn', NULL, 'gfdb', x'6668786668', '9', 9, 20),
(20, '45', '5353', 'товар 7', 4.00, '2019-02-20 14:14:09', 'greger', NULL, 'reger', x'7265676572', '10', 9, 20),
(21, 'rte', '34534534', 'товар 8', 5.00, '2019-02-20 14:20:30', 'regerge', NULL, '43534', x'746572746572', '10', 13, 20),
(22, '54343', '45345345345', 'товар 9', 5.00, '2019-02-20 18:56:14', 'retgretgre', NULL, '5343', x'726567726567', '10', 13, 20),
(61, '34343', '343433', 'Диски', 45.00, '2018-02-20 19:00:00', 'sfswfswf', 'wedwew', 'gerge', x'64666677667766666666666666', '23232232', 30, 20),
(62, '343', '343434', 'Текстиль', 23.00, '2019-02-20 19:00:00', 'sfswfswf', 'wedwew', 'gerge', x'64666677667766666666666666', '23232232', 30, 20);

-- 
-- Вывод данных для таблицы order_group
--
INSERT INTO order_group VALUES
(1, '2019-04-02'),
(2, '2019-05-11'),
(3, '2019-04-16');

-- 
-- Вывод данных для таблицы `order`
--
INSERT INTO `order` VALUES
(2, 14, 22, '2019-03-19 00:00:00', '2019-03-29 00:00:00', NULL, NULL, '100', 1),
(14, 12, 13, '2019-04-25 00:00:00', '2019-04-30 00:00:00', 'open', NULL, '27', 2),
(15, 12, 3, '2019-04-16 00:00:00', '2019-04-19 00:00:00', 'open', NULL, '54', 2),
(16, 12, 6, '2019-04-02 00:00:00', '2019-04-25 00:00:00', 'open', NULL, '34', 2),
(17, 14, 13, '2019-04-01 00:00:00', '2019-04-30 00:00:00', 'open', NULL, '25', 3);

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