-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2020 a las 23:27:11
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `my`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `user`, `password`) VALUES
(1, 'admin', '$2y$10$jBu7f75o4CEQwdiZamnHbOJEoLyZJI60UW1mwlgQ5I5CElSo43/oi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(37, 7, 1, 3),
(97, 10, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Celulares'),
(2, 'Accesorios'),
(3, 'Auriculares inalámbricos'),
(4, 'Auriculares con cable'),
(6, 'Teclados'),
(7, 'Televisores'),
(14, 'Consolas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marks`
--

INSERT INTO `marks` (`id`, `name`) VALUES
(1, 'Samsung'),
(2, 'Xiaomi'),
(3, 'Apple'),
(4, 'Huawei'),
(5, 'Motorola'),
(6, 'Sony'),
(7, 'Fiio'),
(10, 'Lenovo'),
(16, 'Kz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_total` int(11) DEFAULT NULL,
  `billing_email` varchar(55) DEFAULT NULL,
  `billing_name` varchar(33) DEFAULT NULL,
  `billing_address` varchar(25) DEFAULT NULL,
  `billing_city` varchar(25) DEFAULT NULL,
  `billing_province` varchar(25) DEFAULT NULL,
  `billing_postalcode` varchar(25) DEFAULT NULL,
  `billing_phone` varchar(25) DEFAULT NULL,
  `billing_name_on_card` varchar(25) DEFAULT NULL,
  `billing_discount` int(11) DEFAULT NULL,
  `billing_discount_code` varchar(25) DEFAULT NULL,
  `billing_subtotal` int(11) DEFAULT NULL,
  `billing_tax` int(11) DEFAULT NULL,
  `payment_gateway` varchar(25) NOT NULL DEFAULT 'stripe',
  `shipped` tinyint(1) NOT NULL DEFAULT 0,
  `error` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_total`, `billing_email`, `billing_name`, `billing_address`, `billing_city`, `billing_province`, `billing_postalcode`, `billing_phone`, `billing_name_on_card`, `billing_discount`, `billing_discount_code`, `billing_subtotal`, `billing_tax`, `payment_gateway`, `shipped`, `error`, `created_at`, `updated_at`) VALUES
(9, 9, 3600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 02:47:34', '2020-03-15 02:47:34'),
(10, 9, 25000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 02:48:13', '2020-03-15 02:48:13'),
(11, 9, 7200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 06:11:53', '2020-03-15 06:11:53'),
(12, 10, 2700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 19:47:15', '2020-03-15 19:47:15'),
(13, 9, 50000, 'lea@gmail.com', 'asd', 'asd', 'asd', 'asd', '123', '123', 'asd', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 21:15:01', '2020-03-15 21:15:01'),
(14, 9, 5400, 'lea@gmail.com', 'lea', 'calle falsa 123', 'ba', 'ba', '1112', '12345678', 'lea', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 21:22:53', '2020-03-15 21:22:53'),
(15, 9, 10000, 'lea@gmail.com', 'ss', 'ss', 'ss', 'ss', '11', '11', 'ss', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 21:33:45', '2020-03-15 21:33:45'),
(16, 9, 20000, 'lea@gmail.com', 'aa', 'aa', 'aa', 'aa', '112', '112', 'aa', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 21:34:32', '2020-03-15 21:34:32'),
(17, 9, 49599, 'lea@gmail.com', 'ii', 'ii', 'ii', 'ii', '34', '34', 'ii', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 21:38:01', '2020-03-15 21:38:01'),
(18, 9, 0, 'lea@gmail.com', 'ii', 'ii', 'ii', 'ii', '34', '34', 'ii', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 21:39:57', '2020-03-15 21:39:57'),
(19, 9, 25000, 'lea@gmail.com', 'vv', 'vv', 'vv', 'vv', '1', '1', 'vv', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 21:41:05', '2020-03-15 21:41:05'),
(20, 9, 2700, 'lea@gmail.com', 'bb', 'bb', 'bb', 'bb', '11', '11', 'bb', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 21:43:56', '2020-03-15 21:43:56'),
(21, 9, 25000, 'lea@gmail.com', 'asd', 'asd', 'asd', 'asd', '123', '123', 'asd', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 23:27:34', '2020-03-15 23:27:34'),
(22, 9, 2700, 'leandroacu2012@gmail.com', 'lea', 'lea', 'lea', 'lea', '123', '123', 'lea', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-15 23:34:06', '2020-03-15 23:34:06'),
(23, 9, 2700, 'lea@gmail.com', 'asd', 'asd', 'asd', 'asd', '132', '123', 'asd', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-16 00:30:22', '2020-03-16 00:30:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 9, 2, 1, '2020-03-15 02:47:34', '2020-03-15 02:47:34'),
(6, 10, 3, 1, '2020-03-15 02:48:13', '2020-03-15 02:48:13'),
(7, 11, 2, 2, '2020-03-15 06:11:53', '2020-03-15 06:11:53'),
(8, 12, 1, 1, '2020-03-15 19:47:15', '2020-03-15 19:47:15'),
(9, 13, 3, 2, '2020-03-15 21:15:01', '2020-03-15 21:15:01'),
(10, 14, 1, 2, '2020-03-15 21:22:53', '2020-03-15 21:22:53'),
(11, 15, 4, 1, '2020-03-15 21:33:45', '2020-03-15 21:33:45'),
(12, 16, 5, 1, '2020-03-15 21:34:32', '2020-03-15 21:34:32'),
(13, 17, 13, 1, '2020-03-15 21:38:01', '2020-03-15 21:38:01'),
(14, 19, 3, 1, '2020-03-15 21:41:05', '2020-03-15 21:41:05'),
(15, 20, 1, 1, '2020-03-15 21:43:56', '2020-03-15 21:43:56'),
(16, 21, 3, 1, '2020-03-15 23:27:34', '2020-03-15 23:27:34'),
(17, 22, 1, 1, '2020-03-15 23:34:06', '2020-03-15 23:34:06'),
(18, 23, 1, 1, '2020-03-16 00:30:22', '2020-03-16 00:30:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `mark_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `description`, `image`, `mark_id`, `category_id`) VALUES
(1, 'Xiaomi airdots', 2700, 4, 'pequeños auriculares inalámbricos que cuentan con estuche que también sirve de cargador. Una buena alternativa a los Apple Airpods.', '1583885730.jpg', 2, 3),
(2, 'Fiio F3', 3600, 66, 'Los FiiO F3 son los nuevos auriculares In-Ear con drivers de Grafeno, un nano material muy reciente con excelentes propiedades para la producción de sonido en alta fidelidad. Los F3 están construidos con la calidad que caracteriza a los productos FiiO y cuentan con un completo set de accesorios que normalmente puede encontrarse en auriculares que duplican y triplican su valor. Los F3 son IEMs que ofrecen excelente calidad de sonido, aislación del exterior y comodidad para una experiencia de sonido de alta definición que puede disfrutarse en todo momento y lugar.', '2.jpg', 7, 4),
(3, 'Apple iPhone 11 Pro Dual SIM 256 GB Verde medianoche 4 GB RAM', 25000, 2, '¡El nuevo smartphone que lo tiene todo! Con este lanzamiento, Apple ha superado todos sus récords. Su diseño se destaca por sus líneas finas y distinguidas a partir de una sola hoja de vidrio resistente, combinada con aluminio de excelente calidad.', '3.jpg', 3, 1),
(4, 'Samsung Buds', 10000, 6, 'En la calle, en el colectivo o en la oficina, tené siempre a mano tus auriculares Samsung y ¡escapate de la rutina por un rato! Vas a poder disfrutar de la música que más te gusta y de tus podcasts favoritos cuando quieras y donde quieras.El formato perfecto para vos. Al ser in-ear, aíslan el ruido del exterior, mejoran la calidad del audio y son de tamaño pequeño para poder insertarse en tu oreja. Son ideales para acompañarte a la hora de hacer ejercicio mientras te sumergís en el mejor sonido envolvente.', '4.jpg', 1, 3),
(5, 'Xiaomi Redmi Note 8 Dual SIM 64 GB', 20000, 109, 'El sistema operativo avanzado Android 9.0 Pie aprende tus hábitos para adaptarse a tu rutina y lograr la máxima eficiencia de tu equipo. Tu dispositivo tendrá la autonomía necesaria para reducir el consumo energético ajustando el brillo automáticamente y gestionando la batería de manera inteligente para que puedas priorizar el uso de tus aplicaciones habituales.\nCon su pantalla IPS de 6.3\", disfrutá de colores intensos y mayor nitidez en todos tus contenidos. Con su memoria interna de 64 GB siempre tendrás espacio para almacenar archivos y documentos importantes. Además, podrás guardar películas, series y videos para reproducirlos cuando quieras sin conexión. Si necesitas más, podrás agregar una tarjeta micro-SD, que te permitirá contar con 256 GB extras.\n', '5.jpg', 2, 1),
(13, 'Samsung Galaxy S10e 128 GB Azul prisma', 49599, 8, 'La doble cámara trasera te permitirá tomar imágenes de alta definición con el famoso modo retrato de poca profundidad de campo. Además, la cámara frontal permite tomar fotos de gran calidad, perfecta para hacer videollamadas y tomar selfies grupales.', '13.jpg', 1, 1),
(14, 'Apple AirPods', 16599, 10, 'Los AirPods reinventan el concepto de auriculares inalámbricos. Los sacás del estuche y ya funcionan con tu iPhone, Apple Watch, iPad o Mac. Se configuran con un simple toque, se activan automáticamente y están siempre conectados, hasta detectan si los llevás puestos y detienen la reproducción cuando te los sacás. Además, ¡Siri hace todo por vos! solo tenés que pedirle que ajuste el volumen, cambie de canción, haga una llamada o te diga cómo llegar a algún sitio.', '14.jpg', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_images`
--

CREATE TABLE `products_images` (
  `id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(14, 1, '2752.jpg', '2020-03-14', '2020-03-14'),
(15, 1, '7572.jpg', '2020-03-14', '2020-03-14'),
(17, 1, '5567.jpg', '2020-03-14', '2020-03-14'),
(19, 1, '9538.jpg', '2020-03-14', '2020-03-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `remember_token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `birthdate`, `phone`, `dni`, `address`, `image`, `remember_token`) VALUES
(7, 'Santiago Nicolás', 'Penalva', 'penalvasantiagogm@gmail.com', '$2y$10$MUKQTj1DFsPGXMPM1ARySO6VhbjL/15oXHDEVlCtTgKQdrlepCOh2', '1999-05-05', '01166400929', '42148622', 'Virrey Cevallos 215, 4to C', '1581553513.jpg', 'JH3sOhGw2ZCTGwRfWLWEov65wJaiKSrtrSTg0BVK9fhWTw2bQhud2K3q7Pwe'),
(8, 'lea', 'lea', 'lea@gmail', '$2y$10$BnsAaoDiM4BcrBg1kn9vpOK7gFNJT1o1GTZxXbP/EJfeejAnmEkNK', '1996-02-06', '123', '123123123', 'asd', 'perfil', NULL),
(9, 'leandroo', 'acun', 'lea@gmail.com', '$2y$10$ZeJKeeLL8niKlDafFX1NNem1fKUKZ0tM/fW.6UGJ2ri7qddV16/GW', '1987-01-05', '1234', '1234', 'asd 1234', '1584241973.jpg', 'XWuGyTnxLZBqFlzf2r02ey8sGEHyBHs8yZKOxK4zGai8zIFkJWEBV1Pl94d3'),
(10, 'leandro', 'ac', 'lean@gmail.com', '$2y$10$dEsMr03eNKkDoistshh/Mu5sJXnM7qMTPA8yFeut5zCFujtgckuw.', '1987-02-10', '123', '123', 'eee', '1584285923.jpg', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `mark_id` (`mark_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`mark_id`) REFERENCES `marks` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
