--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.22.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 18.03.2019 22:17:18
-- Версия сервера: 8.0.15
-- Версия клиента: 4.1
--


SET NAMES 'AUTO';




INSERT INTO fp_base.migration(version, apply_time) VALUES
('m000000_000000_base', 1551988093),
('m130524_201442_init', 1551988409);


INSERT INTO fp_base.`position`(id, art, shtrih, name, price, date, `group`, podgroup, size, podrobno, add_pole, from_id) VALUES
(2, '5898', '286868486687', 'товар 3', 1.24, '2019-02-04 22:55:33', 'rdtrп', 'yufyj', '444x776x888', x'6B6A6664736864206B682064696775656877726C696768777269756C67686577726C67726567772C726520686A756C726B6575206768777265752069676975726520676869756577726C206768696C7565727720676869756577722067756972657772207767206466676264666720617265672065726720657220676572206720', '9', NULL),
(6, 'cxvx', '45354', 'gdgd', 3.10, '2019-02-19 13:38:53', 'efwe', NULL, 'gerge', x'3234', '9', NULL),
(7, 'cxvx', '45354', 'gdgd', 3.00, '2019-02-18 12:39:31', 'efwe', NULL, 'gerge', x'', '9', NULL),
(13, '65465', '345435345', 'jhjh', 2.13, '2019-02-19 20:56:01', 'bnfg bs rbr', NULL, 'проба', x'343335343366676466736266206262736662737272736E72677420207220', '9', NULL),
(14, '543tr3', '4333', 'grtb tr brtb  tr', 4.00, '2019-02-19 21:37:23', 'regerg', NULL, 'rtgh454gw 4 g4 ', x'206777746874206274206877367435206835347468623435', '9', NULL),
(15, '35325', '453453453', 'gsdfgdfg', 6.00, '2019-02-19 21:52:20', 'gdhhn', NULL, 'gfdb', x'6668786668', '9', NULL),
(20, '45', '5353', 'reger', 4.00, '2019-02-20 14:14:09', 'greger', NULL, 'reger', x'7265676572', '10', NULL),
(21, 'rte', '34534534', 'ert434', 5.00, '2019-02-20 14:20:30', 'regerge', NULL, '43534', x'746572746572', '10', NULL),
(22, '54343', '45345345345', 'ergerg', 5.00, '2019-02-20 18:56:14', 'retgretgre', NULL, '5343', x'726567726567', '10', NULL);


INSERT INTO fp_base.shops(id, unp, bank, contact_id, name, schet, balans, status) VALUES
(1, '123', '456', '765', 'один', '13232323', '233222', 'ыфф');


INSERT INTO fp_base.suppliers(id, unp, bank, contact_id, name, schet, balans, status) VALUES
(9, '54352', NULL, NULL, 'Zаумыу', NULL, NULL, NULL),
(10, '741236', NULL, NULL, 'ООО &quot;Фабрика&quot;', NULL, NULL, NULL),
(11, 'fvds', NULL, NULL, 'ООО &quot;Фабрика&quot;', NULL, NULL, NULL),
(12, 'п54ц4', NULL, NULL, 'п5кы', NULL, NULL, NULL);


INSERT INTO fp_base.user(id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, user_type_id, tel, name, last) VALUES
(3, 'max', 'HKFUNmQW9LNkzmpWNpU2h4sLoaVFoROe', '$2y$13$ScC2G.hJ1xekn//QFRd8sOvM/2SUx5.pAA5PilY.v0eYz8/KxTZ5G', NULL, 'ironmax68@yandex.ru', 10, 1552162089, 1552162089, 0, NULL, NULL, NULL),
(4, 'maks', '1234567', '$2y$13$ck8XSy/lRhgSX7fvWQFfieuMmR2daGnrT.W5ZitIu4roKDDXY3s6u', '55555555555555', 'ironmax63@yandex.ru', 2, 2, 2, 0, NULL, NULL, NULL),
(5, 'dima', '123', '1211', '2323', 'fsds@sdfswfs', 1, 1, 2, 1, NULL, NULL, NULL);


INSERT INTO fp_base.user_type(id, name) VALUES
(1, 'suppliers'),
(0, 'shops');


INSERT INTO fp_base.zakaz(zakaz_id, zakaz_from, zakaz_to, position_id, date_from, date_to, state, soob_id, zak_id, summ) VALUES
(1, 2, 9, 2, '2021-02-20 19:00:00', '2024-02-20 19:00:00', 'open', NULL, 0, '100');