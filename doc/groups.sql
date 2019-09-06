--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.22.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 01.09.2019 19:31:14
-- Версия сервера: 8.0.15
-- Версия клиента: 4.1
--


SET NAMES 'AUTO';

INSERT INTO fp_base.groups(id, name, parent_id) VALUES
(1, 'текстиль', NULL),
(2, 'носки', 1),
(3, 'наволочки', 1),
(4, 'майки', 1),
(5, 'посуда', NULL),
(6, 'чашки', 5),
(7, 'кастрюли', 5),
(8, 'чайник', 5);