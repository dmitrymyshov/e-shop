-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2019 г., 19:55
-- Версия сервера: 5.6.41
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2_loc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`) VALUES
(1, 0, 'Кроссовки', NULL, NULL),
(2, 1, 'Adidas', NULL, NULL),
(3, 1, 'Asics', NULL, NULL),
(4, 1, 'Fila', NULL, NULL),
(5, 1, 'Lacoste', NULL, NULL),
(6, 1, 'Nike', NULL, NULL),
(7, 1, 'Puma', NULL, NULL),
(8, 1, 'Reebok', NULL, NULL),
(9, 1, 'Saucony', NULL, NULL),
(10, 1, 'New Balance', NULL, NULL),
(11, 0, 'Кепки', NULL, NULL),
(12, 0, 'Носки', NULL, NULL),
(13, 0, 'Очки', NULL, NULL),
(14, 0, 'Рюкзаки и сумки', NULL, NULL),
(15, 0, 'Уход за обувью', NULL, NULL),
(16, 0, 'Часы', '', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(1, 'Products/Product1/c3da84.jpg', 1, 1, 'Product', '225f2a67f6-1', ''),
(2, 'Products/Product1/91adfb.jpg', 1, NULL, 'Product', 'd081626e11-2', ''),
(3, 'Products/Product1/7a260c.jpg', 1, NULL, 'Product', 'a80f24162a-3', ''),
(4, 'Products/Product1/0b04dd.jpg', 1, NULL, 'Product', 'fcb3aa841a-4', ''),
(5, 'Products/Product2/4a428c.jpg', 2, 1, 'Product', '100e861ed3-1', ''),
(6, 'Products/Product2/170958.jpg', 2, NULL, 'Product', '6aa8af89b8-2', ''),
(7, 'Products/Product2/b9cbed.jpg', 2, NULL, 'Product', '38daa306e6-3', ''),
(8, 'Products/Product2/4f986f.jpg', 2, NULL, 'Product', 'a46193e787-4', ''),
(9, 'Products/Product3/591644.jpg', 3, 1, 'Product', '1a8d73b02f-1', ''),
(10, 'Products/Product3/8e0aea.jpg', 3, NULL, 'Product', '29918c986d-2', ''),
(11, 'Products/Product3/efb4d8.jpg', 3, NULL, 'Product', '3850adfec6-3', ''),
(12, 'Products/Product3/c44dc0.jpg', 3, NULL, 'Product', '256887bb06-4', ''),
(13, 'Products/Product4/1fb4d8.jpg', 4, 1, 'Product', '75b0bf394b-1', ''),
(14, 'Products/Product4/2eb021.jpg', 4, NULL, 'Product', '5ec80b6159-2', ''),
(15, 'Products/Product4/5b6ded.jpg', 4, NULL, 'Product', '880eb88140-3', ''),
(16, 'Products/Product4/6ce083.jpg', 4, NULL, 'Product', 'e908c1f296-4', ''),
(21, 'Products/Product6/48a9c0.jpg', 6, 1, 'Product', '655be51a06-1', ''),
(22, 'Products/Product6/765956.jpg', 6, NULL, 'Product', 'a982a56d00-2', ''),
(23, 'Products/Product6/a15929.jpg', 6, NULL, 'Product', '808ac31efe-3', ''),
(24, 'Products/Product6/0b3d86.jpg', 6, NULL, 'Product', 'c5cd540653-4', ''),
(25, 'Products/Product7/2b2819.jpg', 7, 1, 'Product', '0f57c09712-1', ''),
(26, 'Products/Product8/8ffc13.jpg', 8, 1, 'Product', '932c1e9e47-1', ''),
(27, 'Products/Product9/a4dd6d.jpg', 9, 1, 'Product', 'ffef0c1090-1', ''),
(28, 'Products/Product10/e347c8.jpg', 10, 1, 'Product', '8031f3ea7a-1', ''),
(29, 'Products/Product11/c3d60a.jpg', 11, 1, 'Product', '82cfe93fd0-1', ''),
(30, 'Products/Product12/af7118.jpg', 12, 1, 'Product', '58546c17e2-1', ''),
(38, 'Products/Product5/880989.jpg', 5, 1, 'Product', 'f2f9250671-1', ''),
(39, 'Products/Product5/6db181.jpg', 5, NULL, 'Product', 'b34e112d00-2', ''),
(40, 'Products/Product5/2e3c1c.jpg', 5, NULL, 'Product', 'fa9025483a-3', ''),
(41, 'Products/Product5/02c9bd.jpg', 5, NULL, 'Product', '3c2eaad34a-4', '');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1558945321),
('m140622_111540_create_image_table', 1558945330),
('m140622_111545_add_name_to_image_table', 1558945331);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int(10) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`) VALUES
(24, '2019-06-12 20:14:57', '2019-06-12 20:14:57', 3, 8700, '0', 'Дмитрий', 'dmitrymyshov@yandex.ru', '5435', 'tttttttt'),
(25, '2019-06-21 01:12:38', '2019-06-21 01:12:38', 2, 5800, '0', 'Дмитрий', 'dmitrymyshov@yandex.ru', '+7 (777) 777 77 77', 'г. Северск Томская обл.');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `size` varchar(4) NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `size`, `qty_item`, `sum_item`) VALUES
(34, 24, 3, 'Кроссовки 3', 2900, '36', 1, 2900),
(35, 24, 6, 'Кроссовки 6', 2900, 'нет', 1, 2900),
(36, 24, 1, 'Кроссовки 1', 2900, '36', 1, 2900),
(37, 25, 3, 'Кроссовки 3', 2900, '36', 1, 2900),
(38, 25, 7, 'Кепка 1', 2900, 'нет', 1, 2900);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no-image.png',
  `hit` enum('0','1') NOT NULL DEFAULT '0',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `sale` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `content`, `price`, `keywords`, `description`, `img`, `hit`, `new`, `sale`) VALUES
(1, 2, 'Кроссовки 1', 'Кроссовки – спортивная, а также уличная молодежная обувь. Изначально позиционировалась, как обувь для бега.', 2900, '', '', 'product1.jpg', '1', '0', '1'),
(2, 3, 'Кроссовки 2', 'Кроссовки – спортивная, а также уличная молодежная обувь. Изначально позиционировалась, как обувь для бега.', 2900, '', '', 'product2.jpg', '1', '0', '0'),
(3, 4, 'Кроссовки 3', '<p>Кроссовки &ndash; спортивная, а также уличная молодежная обувь. Изначально позиционировалась, как обувь для бега.</p>\r\n', 2900, '', '', 'product3.jpg', '1', '1', '0'),
(4, 5, 'Кроссовки 4', '<p>Кроссовки &ndash; спортивная, а также уличная молодежная обувь. Изначально позиционировалась, как обувь для бега.</p>\r\n', 2900, '', '', 'product4.jpg', '1', '0', '0'),
(5, 6, 'Кроссовки 5', '<p>Кроссовки &ndash; спортивная, а также уличная молодежная обувь. Изначально позиционировалась, как обувь для бега.</p>\r\n', 2900, '', '', 'product5.jpg', '1', '1', '0'),
(6, 7, 'Кроссовки 6', '<p>Кроссовки &ndash; спортивная, а также уличная молодежная обувь. Изначально позиционировалась, как обувь для бега.</p>\r\n', 2900, '', '', 'product6.jpg', '1', '1', '0'),
(7, 11, 'Кепка 1', '<p>Casual марка молодежной женской одежды ONLY является частью датской компании Bestseller AS. Изначально Bestseller занимался производством детской одежды, а в 1995 году появилась на свет марка ONLY. Популярность этой марки возрастала быстрыми темпами и теперь ONLY владеет 770 магазинами в более чем 40 странах мира. ONLY &mdash; бренд стильной молодежной одежды. Это бренд для тех, кто любит добиваться успеха и быть не таким, как все. Демократичные цены, модные модели, экологически чистые ткани делают одежду от ONLY сверхпопулярной.</p>\r\n', 2900, '', '', 'no-image.png', '0', '1', '1'),
(8, 12, 'Носки 1', '<p>Компания SK House &mdash; это украинский производитель модной женской одежды с безупречной репутацией и тысячами поклонников по всему СНГ. SK House изготавливает качественный и долговечный товар, созданный из высококачественных тканей. Компания использует современные методы пошива и, изучая текущие мировые тенденции и локальные требования покупателей, создает модели, которые не задерживаются на полках длительное время и быстро раскупаются во всех странах.</p>\r\n', 100, '', '', 'no-image.png', '0', '0', '1'),
(9, 13, 'Очки 1', '', 490, '', '', 'product1.jpg', '0', '0', '1'),
(10, 14, 'Сумка 1', '<p>Простота, инновационный стиль бренда, высококачественные требования к продукции, благодаря этому GUSSACI Italy пользуется высокой репутацией во многих странах Европы.</p>\r\n', 1490, '', '', 'product3.jpg', '0', '1', '1'),
(11, 15, 'Кондиционер для замши и кожи 200 мл.', '<p>Особенность стиля Michael Kors заключается в том, что простота его коллекций гармонирует с роскошью.&nbsp;</p>\r\n', 450, '', '', 'no-image.png', '0', '0', '1'),
(12, 16, 'Часы 1', '<p>Особенность стиля Michael Kors заключается в том, что простота его коллекций гармонирует с роскошью.&nbsp;</p>\r\n', 450, '', '', 'product5.jpg', '0', '0', '1'),
(14, 2, 'hgfhf', '<p>hfghfg</p>\r\n', 453, '', '', 'no-image.png', '1', '0', '0'),
(15, 1, 'рапра', '<p>рпара</p>\r\n', 0, '', '', 'no-image.png', '1', '0', '0'),
(16, 2, 'jhgjg', '<p>jhgjg</p>\r\n', 45, '', '', 'no-image.png', '0', '0', '0'),
(17, 2, 'jujuj', '<p>juju</p>\r\n', 675, '', '', 'no-image.png', '0', '0', '0'),
(18, 2, 'rerte', '', 45, '', '', 'no-image.png', '0', '0', '0'),
(19, 2, 'eeeeee', '', 43, '', '', 'no-image.png', '0', '0', '0'),
(20, 2, 'ttttttttttt', '', 344, '', '', 'no-image.png', '0', '0', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `product_size`
--

CREATE TABLE `product_size` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `size_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`) VALUES
(10, 1, 2),
(15, 1, 10),
(17, 1, 1),
(18, 1, 6),
(19, 3, 1),
(20, 3, 2),
(21, 3, 3),
(25, 14, 2),
(26, 14, 3),
(27, 14, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE `size` (
  `id` int(10) NOT NULL,
  `size_number` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `size`
--

INSERT INTO `size` (`id`, `size_number`) VALUES
(1, '36'),
(2, '37'),
(3, '38'),
(4, '39'),
(5, '40'),
(6, '41'),
(7, '42'),
(8, '43'),
(9, '44'),
(10, '45'),
(11, 'XS'),
(12, 'S'),
(13, 'M'),
(14, 'L'),
(15, 'XL'),
(16, 'XXL');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`) VALUES
(1, 'admin', '$2y$13$EEEOHo32F7gNX5355Nnc0eCGYEXOT/Axg6BiXhgQV8/W4SNDSrRIa', 'jqVJVpoKMqlgi5Kog9Ebx92ZGUsURagS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
