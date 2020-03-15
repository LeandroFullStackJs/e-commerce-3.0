-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2020 a las 04:19:49
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
(83, 9, 3, 1);

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

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2020_02_12_202328_column_quantity_added_to_receipts_products', 1);

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
(1, 'Xiaomi airdots', 2700, 1, 'pequeños auriculares inalámbricos que cuentan con estuche que también sirve de cargador. Una buena alternativa a los Apple Airpods.', '1583885730.jpg', 2, 3),
(2, 'Fiio F3', 3600, 73, 'Los FiiO F3 son los nuevos auriculares In-Ear con drivers de Grafeno, un nano material muy reciente con excelentes propiedades para la producción de sonido en alta fidelidad. Los F3 están construidos con la calidad que caracteriza a los productos FiiO y cuentan con un completo set de accesorios que normalmente puede encontrarse en auriculares que duplican y triplican su valor. Los F3 son IEMs que ofrecen excelente calidad de sonido, aislación del exterior y comodidad para una experiencia de sonido de alta definición que puede disfrutarse en todo momento y lugar.', '2.jpg', 7, 4),
(3, 'Apple iPhone 11 Pro Dual SIM 256 GB Verde medianoche 4 GB RAM', 25000, 11, '¡El nuevo smartphone que lo tiene todo! Con este lanzamiento, Apple ha superado todos sus récords. Su diseño se destaca por sus líneas finas y distinguidas a partir de una sola hoja de vidrio resistente, combinada con aluminio de excelente calidad.', '3.jpg', 3, 1),
(4, 'Samsung Buds', 10000, 1, 'En la calle, en el colectivo o en la oficina, tené siempre a mano tus auriculares Samsung y ¡escapate de la rutina por un rato! Vas a poder disfrutar de la música que más te gusta y de tus podcasts favoritos cuando quieras y donde quieras.El formato perfecto para vos. Al ser in-ear, aíslan el ruido del exterior, mejoran la calidad del audio y son de tamaño pequeño para poder insertarse en tu oreja. Son ideales para acompañarte a la hora de hacer ejercicio mientras te sumergís en el mejor sonido envolvente.', '4.jpg', 1, 3),
(5, 'Xiaomi Redmi Note 8 Dual SIM 64 GB', 20000, 1, 'El sistema operativo avanzado Android 9.0 Pie aprende tus hábitos para adaptarse a tu rutina y lograr la máxima eficiencia de tu equipo. Tu dispositivo tendrá la autonomía necesaria para reducir el consumo energético ajustando el brillo automáticamente y gestionando la batería de manera inteligente para que puedas priorizar el uso de tus aplicaciones habituales.\nCon su pantalla IPS de 6.3\", disfrutá de colores intensos y mayor nitidez en todos tus contenidos. Con su memoria interna de 64 GB siempre tendrás espacio para almacenar archivos y documentos importantes. Además, podrás guardar películas, series y videos para reproducirlos cuando quieras sin conexión. Si necesitas más, podrás agregar una tarjeta micro-SD, que te permitirá contar con 256 GB extras.\n', '5.jpg', 2, 1),
(13, 'Samsung Galaxy S10e 128 GB Azul prisma', 49599, 1, 'La doble cámara trasera te permitirá tomar imágenes de alta definición con el famoso modo retrato de poca profundidad de campo. Además, la cámara frontal permite tomar fotos de gran calidad, perfecta para hacer videollamadas y tomar selfies grupales.', '13.jpg', 1, 1),
(14, 'Apple AirPods', 16599, 1, 'Los AirPods reinventan el concepto de auriculares inalámbricos. Los sacás del estuche y ya funcionan con tu iPhone, Apple Watch, iPad o Mac. Se configuran con un simple toque, se activan automáticamente y están siempre conectados, hasta detectan si los llevás puestos y detienen la reproducción cuando te los sacás. Además, ¡Siri hace todo por vos! solo tenés que pedirle que ajuste el volumen, cambie de canción, haga una llamada o te diga cómo llegar a algún sitio.', '14.jpg', 3, 3);

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
-- Estructura de tabla para la tabla `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `receipts`
--

INSERT INTO `receipts` (`id`, `date`, `user_id`) VALUES
(13, '2020-02-12 17:30:55', 7),
(14, '2020-02-12 17:35:08', 7),
(15, '2020-03-07 23:01:36', 8),
(16, '2020-03-10 20:02:03', 9),
(17, '2020-03-10 20:36:35', 9),
(18, '2020-03-11 16:29:09', 9),
(19, '2020-03-11 16:34:20', 9),
(20, '2020-03-11 16:37:24', 9),
(21, '2020-03-11 16:44:25', 9),
(22, '2020-03-11 17:02:38', 9),
(23, '2020-03-11 17:03:59', 9),
(24, '2020-03-11 17:05:15', 9),
(25, '2020-03-11 17:29:50', 9),
(26, '2020-03-11 18:42:57', 9),
(27, '2020-03-11 18:43:50', 9),
(28, '2020-03-11 18:54:41', 9),
(29, '2020-03-11 19:07:35', 9),
(30, '2020-03-11 19:08:16', 9),
(31, '2020-03-11 19:44:51', 9),
(32, '2020-03-11 20:06:48', 9),
(33, '2020-03-11 20:08:55', 9),
(34, '2020-03-11 20:22:54', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receiptsproducts`
--

CREATE TABLE `receiptsproducts` (
  `id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `receiptsproducts`
--

INSERT INTO `receiptsproducts` (`id`, `receipt_id`, `product_id`, `quantity`) VALUES
(4, 13, 1, 2),
(5, 13, 2, 3),
(6, 14, 1, 2),
(7, 14, 2, 3),
(8, 15, 2, 2),
(9, 17, 2, 1),
(10, 18, 2, 2),
(11, 18, 1, 3),
(12, 19, 2, 2),
(13, 20, 1, 4),
(14, 21, 3, 1),
(15, 22, 3, 1),
(16, 22, 13, 2),
(17, 23, 3, 3),
(18, 24, 2, 4),
(19, 25, 3, 2),
(20, 25, 1, 3),
(21, 26, 4, 1),
(22, 27, 14, 1),
(23, 28, 5, 2),
(24, 28, 3, 2),
(25, 29, 2, 8),
(26, 31, 2, 3);

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
(9, 'lea', 'acu', 'lea@gmail.com', '$2y$10$2Ogm4lVgvcxVDxAmHuWbqe/1R3Ba1/h1MX6AJiom7MPA3/fgScJ/S', '1987-01-05', '123', '123', 'asd 123', '1583870519.jpg', NULL);

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
-- Indices de la tabla `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `receiptsproducts`
--
ALTER TABLE `receiptsproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_id` (`receipt_id`),
  ADD KEY `product_id` (`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `receiptsproducts`
--
ALTER TABLE `receiptsproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`mark_id`) REFERENCES `marks` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `receiptsproducts`
--
ALTER TABLE `receiptsproducts`
  ADD CONSTRAINT `receiptsproducts_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`),
  ADD CONSTRAINT `receiptsproducts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
