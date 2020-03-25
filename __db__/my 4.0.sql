-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-03-2020 a las 23:28:31
-- Versión del servidor: 10.3.16-MariaDB
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
(37, 7, 1, 3);

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
(3, 'Auriculares inalámbricos'),
(4, 'Auriculares con cable'),
(6, 'Teclados'),
(7, 'TVs y Monitores'),
(14, 'Consolas'),
(17, 'Laptop'),
(18, 'Mouse'),
(19, 'Headset');

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
(16, 'Kz'),
(25, 'Hyperx'),
(26, 'Asus'),
(27, 'Jaybird'),
(28, 'Logitech'),
(29, 'Razer'),
(30, 'OnePlus'),
(31, 'LG'),
(32, 'Sennheiser'),
(33, 'Nintendo'),
(34, 'Microsoft');

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
(23, 9, 2700, 'lea@gmail.com', 'asd', 'asd', 'asd', 'asd', '132', '123', 'asd', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-16 00:30:22', '2020-03-16 00:30:22'),
(24, 10, 6300, 'lean@gmail.com', 'leannn', 'asd111', 'asd', 'asd', '123', '123', 'leann', NULL, NULL, NULL, NULL, 'stripe', 0, NULL, '2020-03-22 23:06:51', '2020-03-22 23:06:51');

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
(18, 23, 1, 1, '2020-03-16 00:30:22', '2020-03-16 00:30:22'),
(19, 24, 1, 1, '2020-03-22 23:06:52', '2020-03-22 23:06:52'),
(20, 24, 2, 1, '2020-03-22 23:06:52', '2020-03-22 23:06:52');

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
(1, 'Xiaomi airdots', 2700, 3, 'pequeños auriculares inalámbricos que cuentan con estuche que también sirve de cargador. Una buena alternativa a los Apple Airpods.', '1583885730.jpg', 2, 3),
(2, 'Fiio F3', 3600, 65, 'Los FiiO F3 son los nuevos auriculares In-Ear con drivers de Grafeno, un nano material muy reciente con excelentes propiedades para la producción de sonido en alta fidelidad. Los F3 están construidos con la calidad que caracteriza a los productos FiiO y cuentan con un completo set de accesorios que normalmente puede encontrarse en auriculares que duplican y triplican su valor. Los F3 son IEMs que ofrecen excelente calidad de sonido, aislación del exterior y comodidad para una experiencia de sonido de alta definición que puede disfrutarse en todo momento y lugar.', '2.jpg', 7, 4),
(3, 'Apple iPhone 11 Pro Dual SIM 256 GB Verde medianoche 4 GB RAM', 250000, 2, '¡El nuevo smartphone que lo tiene todo! Con este lanzamiento, Apple ha superado todos sus récords. Su diseño se destaca por sus líneas finas y distinguidas a partir de una sola hoja de vidrio resistente, combinada con aluminio de excelente calidad.', '3.jpg', 3, 1),
(4, 'Samsung Buds', 10000, 6, 'En la calle, en el colectivo o en la oficina, tené siempre a mano tus auriculares Samsung y ¡escapate de la rutina por un rato! Vas a poder disfrutar de la música que más te gusta y de tus podcasts favoritos cuando quieras y donde quieras.El formato perfecto para vos. Al ser in-ear, aíslan el ruido del exterior, mejoran la calidad del audio y son de tamaño pequeño para poder insertarse en tu oreja. Son ideales para acompañarte a la hora de hacer ejercicio mientras te sumergís en el mejor sonido envolvente.', '4.jpg', 1, 3),
(5, 'Xiaomi Redmi Note 8 Dual SIM 64 GB', 20000, 109, 'El sistema operativo avanzado Android 9.0 Pie aprende tus hábitos para adaptarse a tu rutina y lograr la máxima eficiencia de tu equipo. Tu dispositivo tendrá la autonomía necesaria para reducir el consumo energético ajustando el brillo automáticamente y gestionando la batería de manera inteligente para que puedas priorizar el uso de tus aplicaciones habituales.\nCon su pantalla IPS de 6.3\", disfrutá de colores intensos y mayor nitidez en todos tus contenidos. Con su memoria interna de 64 GB siempre tendrás espacio para almacenar archivos y documentos importantes. Además, podrás guardar películas, series y videos para reproducirlos cuando quieras sin conexión. Si necesitas más, podrás agregar una tarjeta micro-SD, que te permitirá contar con 256 GB extras.\n', '5.jpg', 2, 1),
(13, 'Samsung Galaxy S10e 128 GB Azul prisma', 49599, 8, 'La doble cámara trasera te permitirá tomar imágenes de alta definición con el famoso modo retrato de poca profundidad de campo. Además, la cámara frontal permite tomar fotos de gran calidad, perfecta para hacer videollamadas y tomar selfies grupales.', '13.jpg', 1, 1),
(14, 'Apple AirPods', 16599, 10, 'Los AirPods reinventan el concepto de auriculares inalámbricos. Los sacás del estuche y ya funcionan con tu iPhone, Apple Watch, iPad o Mac. Se configuran con un simple toque, se activan automáticamente y están siempre conectados, hasta detectan si los llevás puestos y detienen la reproducción cuando te los sacás. Además, ¡Siri hace todo por vos! solo tenés que pedirle que ajuste el volumen, cambie de canción, haga una llamada o te diga cómo llegar a algún sitio.', '14.jpg', 3, 3),
(18, 'Teclado Hyperx Alloy Core RGB', 5000, 4, 'Contar con la barra de luz exclusiva de HyperX y con los efectos de iluminación dinámicos RGB, el HyperX Alloy Core RGB™ es ideal para los gamers que buscan ampliar el estilo y rendimiento de su teclado sin tirar la casa por la ventana. Con seis efectos de iluminación diferentes y tres niveles de brillo, representa el equilibrio ideal entre esplendor y presupuesto. Construido con una estructura plástica reforzada, el Alloy Core RGB fue diseñado para brindar una mayor estabilidad y confiabilidad para los gamers que deseen un teclado duradero.', '1584739865.jpg', 25, 6),
(19, 'Laptop 15.6\" Asus X509FA', 45000, 2, 'The ASUS 15.6\" Laptop 15 X509FA is a well-rounded system fit for everyday tasks such as browsing the internet, composing and editing documents, and streaming online videos. Specs-wise, it\'s powered by a 1.8 GHz Intel Core i7-8565U quad-core processor, 8GB of DDR4 RAM, integrated Intel UHD graphics, and a 256GB NVMe PCIe M.2 SSD', '1584745333.jpg', 26, 17),
(20, 'Jaybird x4', 11699, 6, 'Los X4 están entre los mejores audífonos inalámbricos para correr, y para senderismo y ciclismo de montaña.\" •Resistencia a la intemperie de X4 Creados para la aventura Construcción impermeable y a prueba del sudor (IPX7) para un desempeño confiable en las peores condiciones climáticas y de entrenamiento. •Ajuste de X4 : Confort seguro y personalizable Ajuste deportivo plus: Pasa el cable sobre la oreja para lograr un ajuste seguro y estable mientras haces ejercicio y colócalo bajo la oreja cuando quieras escuchar música tranquilamente. Las aletas de silicona intercambiables y los extremos Comply Ultra™ de espuma viscoelástica proporcionan un ajuste personalizable para cada oreja.', '1584746273.jpg', 27, 3),
(21, 'Mx Master 2', 13000, 9, 'Impecable calidad de construcción. -fluidez y desplazamiento muy buenos. -funcionamiento bluetooth o mediante dongle incluído. -emparejamiento con tres dispositivos simultáneos. -gran cantidad de botones: cuatro botones extra y click de scroll programables (cambio de velocidad, app launcher, cambio de aplicación/escritorio, disparador de gestos, shortcuts por aplicación, etc). -segunda rueda de scroll programable (zoom, velocidad, scroll horizontal, volumen, y otras). -comodidad: probablemente uno de los mouses (si no él) más cómodo que probé. -la resistencia de la rueda de scroll es dinámica: puede funcionar paso-a-paso (como la mayoría de los mouses) o sin resistencia (el mecanismo de paso-a-paso se suelta y gira libre). Puede programarse a uno de los botones o configurar el software del mouse para que cambie de modo automáticamente al scrollear rápido.', '1584747397.jpg', 28, 18),
(22, 'Kraken Gaming Headset 7.1', 7800, 5, 'Desde su inicio, el Razer Kraken ha construido una reputación como un clásico de culto dentro de la comunidad de juegos. Hizo su marca como un elemento básico en innumerables eventos de juegos, convenciones y torneos. Ahora hemos mejorado las funciones de este favorito de la multitud para no solo darle un impulso a la calidad de audio, sino también hacerlo más cómodo para que pueda jugar todo el día con el auricular que ama. Este es el nuevo Razer Kraken. Disfruta de una claridad de sonido superior y bajos profundos y potentes para un amplio entorno sonoro. Desde los pasos sutiles que se esconden detrás de ti hasta las explosiones climáticas que te dejan sin aliento, se escuchan todos los detalles de sonido cuando juegas con el Razer Kraken.', '1584748410.jpg', 29, 19),
(23, 'OnePlus 7t', 119999, 3, 'El OnePlus 7 Pro está construido en cristal y es un móvil top en todos los aspectos. Cuenta con un frontal en el que no hay rastro de notch y cuenta con unos marcos de tamaño muy reducido, así como una barbilla muy estrecha. El lector de huellas está en la pantalla. En la parte trasera podemos ver el logo de OnePlus, así como el módulo de la triple cámara. La cámara frontal está en un módulo retráctil en la parte superior del terminal.   La diagonal del OnePlus 7 Pro es de 6,67 pulgadas y el panel es Fluid AMOLED. Cuenta con una resolución de 3.120 x 1.440 que nos arroja una densidad de 516 píxeles por pulgada. La relación de aspecto es de 19.5:9. Cuenta con modo noche, soporta sRGB y un modo lectura para reducir la fatiga durante la lectura.', '1584749054.jpg', 30, 1),
(25, 'LG V60 ThinQ 5G', 80000, 4, 'El LG V60 ThinQ 5G es el nuevo flagship de LG para el 2020 que llega con una pantalla POLED Full HD+ de 6.8 pulgadas y potenciado por un procesador Snapdragon 865 junto con 8GB de memoria RAM y 128GB o 256GB de almacenamiento interno. La cámara principal del LG V60 ThinQ 5G es triple, de 64 MP + 13 MP + TOF 3D con estabilización óptica de imagen, mientras que su cámara selfie es de 10 megapixels. El LG V60 ThinQ 5G completa sus características con una batería de 5000 mAh con soporte para carga rápida, lector de huellas integrado en la pantalla, parlantes stereo con sonido HiFi, carga inalámbrica, resistencia al polvo y agua, conectividad 5G y Android 10 a bordo.', '1584830230.jpg', 31, 1),
(26, 'Moto Z4 128gb', 50000, 10, 'El Motorola Moto Z4 es la cuarta generación de la serie Moto Z, esta vez con una pantalla OLED Full HD+ de 6.4 pulgadas y potenciado por un procesador Snapdragon 675 de ocho núcleos acompañado de 4GB de memoria RAM y 128GB de espacio de almacenamiento interno, expandible vía microSD. La cámara trasera del Moto Z4 es de 48 MP con OIS, mientras que la cámara para selfies es de 25 MP. El Moto Z4 completa sus características con una batería de 3600 mAh con carga rápida Turbopower, puerto USB-C, lector de huellas embebido en pantalla y soporte para Moto Mods.', '1584830632.jpg', 5, 1),
(27, 'Sennheiser Hd 4.40 Bluetooth', 17000, 42, 'Los auriculares inalámbricos HD 4.40 BT de Sennheiser incorporan sonido de alta calidad y tecnología Bluetooth 4.0 en un diseño elegante y plegable. Estos auriculares se pueden utilizar para escuchar música y responder llamadas, y son adecuados para su uso con teléfonos inteligentes, reproductores de MP3, tabletas y otros dispositivos portátiles. Los HD 4.40 BT están diseñados para ser portátiles y pueden hacer que viajar sea más placentero. Con su diseño sobre la oreja y sus almohadillas ergonómicas y profundas, estos auriculares ofrecen una comodidad duradera, incluso durante sesiones de escucha prolongadas. Su robusto diseño plegable de diadema se puede almacenar de manera fácil y compacta en la funda protectora suministrada.', '1584831110.jpg', 32, 3),
(28, 'Sony WH-XB700 Bluetooth', 12000, 6, 'En la calle, en el colectivo o en la oficina, tené siempre a mano tus auriculares Sony y ¡escapate de la rutina por un rato! Vas a poder disfrutar de la música que más te gusta y de tus podcasts favoritos cuando quieras y donde quieras.  El formato perfecto para vos Al ser on-ear, se apoyan en tus oídos cómodamente y te ofrecen una gran calidad de sonido. Tené preparados tus discos preferidos y usalos en viajes largos o actividades al aire libre.', '1584831432.jpg', 6, 3),
(29, 'Xiaomi Original Mi Basic In Ear Stereo 3,5mm', 750, 40, 'Auricular Xiaomi Original Mi Basic In Ear stereo 3,5mm universal compatible con teléfonos Mi, Android y dispositivos iOS, PCs, Laptop, etc.  Diseño elegante y de excelente calidad de sonido  Especificaciones: - Tipo de Auricular: Intrauricular. Ergonomicos. - Marca: Xiaomi - Modelo: Basic (HSEJ03JY) - Conectores: 3.5mm. Ficha stereo - Longitud del cable: 125 cm - Peso: 14g - Potencia medida: 5mW - Rango de Frecuencia de Respuesta: 20-20.000Hz - Cancelación de Ruido: Si (Pasiva) - Con micrófono: Sí - Control de volumen: No - Impermeable: Sí (Contra el Sudor)', '1584998792.jpg', 2, 4),
(30, 'Razer Hammerhead Pro V2', 2500, 15, '10mm Extra-large Dynamic Drivers for Stellar Audio Fidelity Experience superior acoustic clarity and improved bass performance through the upgraded extra-large 10 mm dynamic drivers, over 20% larger than the original Razer Hammerhead, featuring an optimized inner acoustics chamber. All-new Body Design with Flat-style Cables for Toughness On The Go The Razer Hammerhead Pro complements every style while retaining its signature durability factor. Designed with a high quality body to enable improved acoustics, the new flat-style cables also facilitate fuss-free mobility and easy storage while you’re on the move. In-line Microphones with 3 Quick Action Controls Buttons for iOS and Android Devices The discreet in-line microphone on the Razer Hammerhead Pro has been further enhanced with a 3-button remote control. Whether you need to control the volume or answer a call, the 3 Quick Action Control buttons give you greater flexibility with your mobile devices.', '1584999105.jpg', 29, 4),
(31, 'Sony Mdrzx110', 1200, 20, 'Connectivity Technology: Wired // 30mm Multi-layer film diaphragms create powerful sound // High energy drivers deliver powerful bass & clear treble // Lightweight & adjust. ABS housing for rugged durability // Pressure-relieving earpads for long-wear comfort // A rugged Y-type design makes for a tangle-free experience //  Color: | Product Packaging: Sony MDR-ZX100 Headphone - Stereo - Black - Mini-phone MDRZX100/BLK Headphones & Earphones', '1584999353.jpg', 6, 4),
(32, 'Samsung Manos Libres Mic', 300, 100, 'Auricular samsung original con microfono', '1584999596.jpg', 1, 4),
(33, 'Cloud Earbuds Hyperx Switch', 3600, 22, 'Los audífonos HyperX Cloud Earbuds son ideales para usuarios de Nintendo Switch que disfrutan llevar su juego al exterior. Con un conector con un ángulo de 90 grados, el cable vulcanizado y trenzado para evitar enredos, la conexión es menos complicada y está optimizada para ser portátil. Además, el estuche para transporte incluido es perfecto para la portabilidad y el almacenamiento seguro. Comunícate fácilmente con tu equipo de Fortnite y en otros juegos Switch que utilizan chat, obtén una ventaja competitiva y potencia tu diversión. Los Earbuds Cloud vienen con puntas de silicona patentadas en tres tamaños, para brindar la máxima comodidad exclusiva de HyperX, lo que convierte tus largas sesiones de juego', '1584999772.jpg', 25, 4),
(34, 'Teclado Mecanico Razer Blackwidow Elite Chroma', 14000, 5, 'Con el paso de los años hemos fabricado teclados mecánicos para juegos que han causado grandes estragos, que han llegado a romper amistades y a destronar a campeones. Han acumulado una ventaja tan injusta que se ha acusado a los usuarios de hacer trampas y de conducta antideportiva. Nos disculpamos de antemano por volver a liarla: presentamos el Razer BlackWidow Elite.', '1585000818.jpg', 29, 6),
(35, 'Teclado HyperX Alloy FPS Cherry MX Red', 8000, 18, 'Este teclado HyperX de alto rendimiento hará que disfrutes de horas ilimitadas de juego. Está diseñado especialmente para que puedas expresar tanto tus habilidades como tu estilo. Mejorá muchísimo tu experiencia de gaming, ya seas un aficionado o todo un experto, y hacé que tus jugadas alcancen otro nivel.  Distinción a todo color Su retroiluminación le dará un toque diferente a tu equipo y destacará las teclas cuando desees utilizarlo en espacios poco iluminados.', '1585001083.jpg', 25, 6),
(36, 'Teclado Logitech K400', 1500, 30, 'Este teclado Logitech será tu mejor complemento para hacer todo tipo de actividades en la pc. Te resultará cómodo y práctico al momento de redactar documentos, navegar y hacer búsquedas por internet, ya sea en tu trabajo o en la comodidad del hogar.  Facilidad de manejo Con su touchpad incorporado, podrás controlar el cursor de manera sencilla y mantener una cómoda navegación en cualquier interfaz.', '1585001189.jpg', 28, 6),
(37, 'Apple Magic Keyboard', 20000, 5, 'El Magic Keyboard con teclado numérico tiene un diseño ampliado, con controles de navegación para que te desplaces rápidamente por tus documentos y teclas de flecha de tamaño estándar para jugar.  Incorpora un mecanismo de tijera debajo de cada tecla que mejora la estabilidad, a la vez que su perfil bajo te ayuda a escribir con rapidez, comodidad y precisión. El teclado numérico es perfecto para hojas de cálculo y aplicaciones financieras. Además, lleva una batería recargable que te da autonomía para un mes, o incluso más.', '1585001365.jpg', 3, 6),
(38, 'Teclado Mecanico Asus Tuf K5', 15000, 30, 'Mechanical membrane (membrane) switches deliver crisp, Tactile clicks with a quiet and cushioned touch // 100% anti-ghosting, 24-key rollover, and onboard memory for fully programmable on-the-fly macro recording // Specialized coating and spill-resistance for extended durability // Integrated media controls keep your hands on the keyboard during intense gaming sessions // ASUS Aura Sync RGB lighting features a nearly endless spectrum of colors with the ability to synchronize effects across an ever-expanding ecosystem of AURA Sync enabled products //  Mechanical membrane (membrane) switches deliver crisp, Tactile clicks with a quiet and cushioned touch', '1585001481.jpg', 26, 6),
(39, 'Lg Ultrawide 34\'', 150000, 5, 'Monitor Lg Ultrawide 34\' Ips 21:9 Curvo 1440p 144hz UltraGear™ QHD Curved IPS Gaming with Radeon FreeSync™  Caracteristicas basicas:  - 34\" 21:9 UltraWide® QHD Curved IPS Display - Radeon FreeSync™ 2 Technology (GSYNC capable monitor) - 144Hz Refresh Rate - DCI-P3 98% with Nano IPS - VESA DisplayHDR™ 400', '1585082626.jpg', 31, 7),
(40, 'Asus Gaming 27 Pulg Full Hd', 58000, 12, 'El monitor Gamer de 27 Pulgadas de Asus cuenta con una resolución full HD, Un tiempo de respuesta de 1 MS, Una tasa de refresco de 144Hz, 2 Speakers de audio, Puerto HDMI, DVI y DisplayPort. El Monitor VG278Q de Asus cuenta con 27 Pulgadas de pura calidad, Con un panel de 1920 x 1080p, vas a tener la definición ideal para todos tus juegos. Sumado a esto, cuenta con 1ms de respuesta y 144Hz de refresco, lo que te va a dar una fluidez y calidad extraordinaria en todos tus juegos. Además, El audio puede provenir directo de tu monitor, ya que cuenta con 2 Speakers de audio de gran calidad y nitidez.', '1585083026.jpg', 26, 7),
(41, 'Smart TV LG Full HD 43\" 43LK5700', 27000, 60, 'Con el Smart TV LG 43LK5700, viví una nueva experiencia visual con la resolución Full HD, que te presentará imágenes con gran detalle y de alta calidad. Ahora todo lo que veas cobrará vida con brillo y colores más reales. Gracias a su tamaño de 43\", transformarás tu espacio en una sala de cine y vas a poder transportarte a donde quieras. Gracias a sus 2 puertos HDMI, vivirás una experiencia multimedia a gran velocidad. Desde PC y consolas podrás transmitir de forma directa tus contenidos en alta definición. Con su puerto USB conseguirás conectar una gran variedad de dispositivos electrónicos y periféricos como pendrive, cámara digital, teclado o mouse a tu TV y disfrutar de tus fotos, música y películas favoritas en el lugar que elijas.', '1585083317.jpg', 31, 7),
(42, 'Smart TV Samsung Full HD 43\" UN43J5290AGCZB', 25000, 15, 'Con el Smart TV Samsung UN43J5290, viví una nueva experiencia visual con la resolución Full HD, que te presentará imágenes con gran detalle y de alta calidad. Ahora todo lo que veas cobrará vida con brillo y colores más reales. Gracias a su tamaño de 43\", transformarás tu espacio en una sala de cine y vas a poder transportarte a donde quieras. Gracias a sus 2 puertos HDMI, vivirás una experiencia multimedia a gran velocidad. Desde PC y consolas podrás transmitir de forma directa tus contenidos en alta definición. Con su puerto USB conseguirás conectar una gran variedad de dispositivos electrónicos y periféricos como pendrive, cámara digital, teclado o mouse a tu TV y disfrutar de tus fotos, música y películas favoritas en el lugar que elijas.', '1585083513.jpg', 1, 7),
(43, 'Smart TV LG 4K 60\" 60UM7270PSA', 60000, 32, 'Con el Smart TV LG 60UM7270, viví una nueva experiencia visual con la resolución 4K, que te presentará imágenes con gran detalle y de alta calidad. Ahora todo lo que veas cobrará vida con brillo y colores más reales. Gracias a su tamaño de 60\", transformarás tu espacio en una sala de cine y vas a poder transportarte a donde quieras. Gracias a sus 3 puertos HDMI, vivirás una experiencia multimedia a gran velocidad. Desde PC y consolas podrás transmitir de forma directa tus contenidos en alta definición. Con sus 2 puertos USB conseguirás conectar una gran variedad de dispositivos electrónicos y periféricos como pendrive, cámara digital, teclado o mouse a tu TV y disfrutar de tus fotos, música y películas favoritas en el lugar que elijas.', '1585083924.jpg', 31, 7),
(44, 'Razer Raptor 27 Monitor', 135000, 5, '27\" WQHD (2560 x 1440px) resolution Non-Glare IPS Display with up to 178° wide viewing angles 144Hz Refresh Rate, 1ms with Ultra Low Motion Blur HDR400, 10-Bit dimming processor Factory Calibrated 95% DCI-P3 wide color gamut 1000:1 Contrast Ratio INPUT & OUTPUT HDMI 2.0b DP1.4 USB-C (Support for DP1.4 in Alt-mode) 2x USB3.2 Gen 1 Type-A Passthrough', '1585084017.jpg', 29, 7),
(45, 'Playstation 4 1tb Ultra Slim', 40000, 100, 'Incluye un nuevo y delgado sistema PlayStation 4 de 1TB, un controlador inalámbrico DualShock 4, cable hdmi, auricular mono, cable cargador para el control, cable corriente a 220 Juega en línea con tus amigos, obtén juegos gratis, guarda juegos en línea y más con la membresía de PlayStation Plus (se vende por separado). Todo lo mejor, juegos, TV, música y más. Conéctese con sus amigos para transmitir y celebrar sus momentos épicos con solo presionar el botón Compartir a Twitch, YouTube, Facebook y Twitter.', '1585084545.jpg', 6, 14),
(46, 'Nintendo Switch Lite 32GB amarillo', 27000, 15, 'Gracias a su interconectividad global, descargarás los mejores videojuegos y navegarás en la web sin límites. A su vez, la posibilidad de competir en línea con otros te hará disfrutar de aventuras inolvidables junto a amigos y personas de todas partes del mundo.  Calidad de otro nivel Su conexión wifi te permitirá reproducir música, películas y tus series favoritas a través de las aplicaciones descargables.  Diseño innovador Nintendo Switch Lite es una consola diseñada específicamente para el uso portátil. Su formato compacto y ligero cuenta con controles integrados para que puedas trasladarla a donde quieras y disfrutar de tus juegos favoritos en cualquier momento y lugar.', '1585085463.jpg', 33, 14),
(47, 'Microsoft Xbox One S 1TB', 30000, 30, 'Microsoft Xbox One S ofrece impresionantes gráficos, sonido de primer nivel e incluso la posibilidad de guardar todas tus partidas en la nube.Además, su control combina un elegante estilo y agarre en relieve para brindar una mayor comodidad.  Adaptada a tus necesidades Guardá tus apps, fotos, videos y mucho más en el disco duro, que cuenta con una capacidad de 1 TB. Al contar con un procesador de 8 núcleos y un procesador gráfico, brinda una experiencia dinámica, respuestas ágiles, así como transiciones fluidas de imágenes en alta definición. Por otro lado, tiene puerto USB y salida HDMI, que permiten conectar accesorios y cargar la batería de tu control mientras jugás.', '1585085603.jpg', 34, 14),
(48, 'Xbox One 500gb', 23000, 20, 'Consola Xbox One 500gb Rfb Microsoft Joystick Sensor Kinect  INCLUYE: * CONSOLA RFB 500GB * SENSOR MOVIMIENTO KINECT * JOYSTICK CON PILAS * HEADSET * CABLE HDMI * CABLE ENERGIA * FUENTE 110V (requiere transformador 110/220v 750watts no incluido)', '1585085800.jpg', 34, 14),
(49, 'Sony PlayStation 4 Pro 1TB Standard', 49000, 50, 'Se considera que esta consola es la mejor dentro del mercado, dado que presenta una resolución de hasta 4K. Su conexión wifi te permitirá reproducir música, películas y tus series favoritas a través de las aplicaciones descargables.  Diseño innovador Además, el control DualShock combina funciones revolucionarias mientras conserva precisión, comodidad y exactitud sin precedentes con cada movimiento.  Adaptada a tus necesidades Guardá tus apps, fotos, videos y mucho más en el disco duro, que cuenta con una capacidad de 1 TB. Al contar con un procesador de 8 núcleos y un procesador gráfico, brinda una experiencia dinámica, respuestas ágiles, así como transiciones fluidas de imágenes en alta definición. Por otro lado, tiene puerto USB y salida HDMI, que permiten conectar accesorios y cargar la batería de tu control mientras jugás.', '1585085931.jpg', 6, 14),
(50, 'Nintendo Switch 32GB Standard', 44000, 40, 'Nintendo Switch es una consola desmontable, que puede usarse en modo portátil, sobremesa o en TV; esto te brindará la posibilidad de utilizarla donde quieras y compartir sus controles. Además, los Joy-con cuentan con botones especiales para realizar print de pantalla y una cámara infrarroja que puede leer la distancia respecto a los objetos e incluso detectar formas.  Adaptada a tus necesidades Guardá tus apps, fotos, videos y mucho más en el disco duro, que cuenta con una capacidad de 32 GB. Por otro lado, tiene puerto USB y salida HDMI, que permiten conectar accesorios y cargar la batería de tu control mientras jugás.', '1585086057.jpg', 33, 14);

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
(19, 1, '9538.jpg', '2020-03-14', '2020-03-14'),
(20, 18, '1463.jpg', '2020-03-20', '2020-03-20'),
(21, 18, '7456.jpg', '2020-03-20', '2020-03-20'),
(22, 18, '7849.jpg', '2020-03-20', '2020-03-20'),
(23, 19, '8291.jpg', '2020-03-20', '2020-03-20'),
(24, 19, '1428.jpg', '2020-03-20', '2020-03-20'),
(25, 19, '9701.jpg', '2020-03-20', '2020-03-20'),
(26, 20, '710.jpg', '2020-03-20', '2020-03-20'),
(27, 20, '1601.jpg', '2020-03-20', '2020-03-20'),
(28, 20, '7492.jpg', '2020-03-20', '2020-03-20'),
(29, 21, '6579.jpg', '2020-03-20', '2020-03-20'),
(30, 21, '7763.jpg', '2020-03-20', '2020-03-20'),
(31, 21, '8661.jpg', '2020-03-20', '2020-03-20'),
(32, 22, '7068.jpg', '2020-03-20', '2020-03-20'),
(33, 22, '5065.jpg', '2020-03-20', '2020-03-20'),
(34, 22, '9383.jpg', '2020-03-20', '2020-03-20'),
(35, 23, '2637.jpg', '2020-03-21', '2020-03-21'),
(36, 23, '8860.jpg', '2020-03-21', '2020-03-21'),
(37, 23, '2367.jpg', '2020-03-21', '2020-03-21'),
(38, 25, '9436.jpg', '2020-03-21', '2020-03-21'),
(39, 25, '5471.jpg', '2020-03-21', '2020-03-21'),
(40, 26, '7662.jpg', '2020-03-21', '2020-03-21'),
(41, 26, '956.jpg', '2020-03-21', '2020-03-21'),
(42, 26, '6933.jpg', '2020-03-21', '2020-03-21'),
(43, 27, '2621.jpg', '2020-03-21', '2020-03-21'),
(44, 27, '7973.jpg', '2020-03-21', '2020-03-21'),
(45, 27, '3343.jpg', '2020-03-21', '2020-03-21'),
(46, 28, '1239.jpg', '2020-03-21', '2020-03-21'),
(47, 28, '9668.jpg', '2020-03-21', '2020-03-21'),
(48, 28, '832.jpg', '2020-03-21', '2020-03-21'),
(49, 29, '3179.jpg', '2020-03-23', '2020-03-23'),
(50, 29, '6367.jpg', '2020-03-23', '2020-03-23'),
(51, 29, '4061.jpg', '2020-03-23', '2020-03-23'),
(52, 30, '8936.jpg', '2020-03-23', '2020-03-23'),
(53, 30, '2196.jpg', '2020-03-23', '2020-03-23'),
(54, 30, '4015.jpg', '2020-03-23', '2020-03-23'),
(55, 31, '352.jpg', '2020-03-23', '2020-03-23'),
(56, 31, '4103.jpg', '2020-03-23', '2020-03-23'),
(57, 31, '777.jpg', '2020-03-23', '2020-03-23'),
(58, 32, '7376.jpg', '2020-03-23', '2020-03-23'),
(59, 32, '5419.jpg', '2020-03-23', '2020-03-23'),
(60, 32, '6612.jpg', '2020-03-23', '2020-03-23'),
(61, 33, '740.jpg', '2020-03-23', '2020-03-23'),
(62, 33, '7216.jpg', '2020-03-23', '2020-03-23'),
(63, 33, '7607.jpg', '2020-03-23', '2020-03-23'),
(64, 34, '9072.jpg', '2020-03-23', '2020-03-23'),
(65, 34, '653.jpg', '2020-03-23', '2020-03-23'),
(66, 34, '3274.png', '2020-03-23', '2020-03-23'),
(67, 35, '341.jpg', '2020-03-23', '2020-03-23'),
(68, 35, '208.jpg', '2020-03-23', '2020-03-23'),
(69, 36, '4645.jpg', '2020-03-23', '2020-03-23'),
(70, 36, '9919.jpg', '2020-03-23', '2020-03-23'),
(71, 37, '3584.jpg', '2020-03-23', '2020-03-23'),
(72, 37, '8888.jpg', '2020-03-23', '2020-03-23'),
(73, 38, '9809.jpg', '2020-03-23', '2020-03-23'),
(74, 38, '8028.jpg', '2020-03-23', '2020-03-23'),
(75, 38, '2089.jpg', '2020-03-23', '2020-03-23'),
(76, 39, '2754.jpg', '2020-03-24', '2020-03-24'),
(77, 39, '1313.jpg', '2020-03-24', '2020-03-24'),
(78, 39, '9129.jpg', '2020-03-24', '2020-03-24'),
(79, 40, '760.jpg', '2020-03-24', '2020-03-24'),
(80, 40, '8927.jpg', '2020-03-24', '2020-03-24'),
(81, 40, '1606.jpg', '2020-03-24', '2020-03-24'),
(82, 41, '1336.jpg', '2020-03-24', '2020-03-24'),
(83, 41, '7121.jpg', '2020-03-24', '2020-03-24'),
(84, 41, '8560.jpg', '2020-03-24', '2020-03-24'),
(85, 42, '1466.jpg', '2020-03-24', '2020-03-24'),
(86, 42, '7570.jpg', '2020-03-24', '2020-03-24'),
(87, 42, '5508.jpg', '2020-03-24', '2020-03-24'),
(88, 43, '3525.jpg', '2020-03-24', '2020-03-24'),
(89, 43, '1798.jpg', '2020-03-24', '2020-03-24'),
(90, 43, '4351.jpg', '2020-03-24', '2020-03-24'),
(91, 44, '3979.jpg', '2020-03-24', '2020-03-24'),
(92, 44, '6906.jpg', '2020-03-24', '2020-03-24'),
(93, 44, '1149.jpg', '2020-03-24', '2020-03-24'),
(94, 45, '357.jpg', '2020-03-24', '2020-03-24'),
(95, 45, '5939.jpg', '2020-03-24', '2020-03-24'),
(96, 45, '630.jpg', '2020-03-24', '2020-03-24'),
(97, 46, '1173.jpg', '2020-03-24', '2020-03-24'),
(98, 46, '1281.jpg', '2020-03-24', '2020-03-24'),
(99, 46, '567.jpg', '2020-03-24', '2020-03-24'),
(100, 47, '7239.jpg', '2020-03-24', '2020-03-24'),
(101, 47, '2270.jpg', '2020-03-24', '2020-03-24'),
(102, 47, '9944.jpg', '2020-03-24', '2020-03-24'),
(103, 48, '2402.jpg', '2020-03-24', '2020-03-24'),
(104, 48, '7286.jpg', '2020-03-24', '2020-03-24'),
(105, 48, '964.jpg', '2020-03-24', '2020-03-24'),
(106, 49, '804.jpg', '2020-03-24', '2020-03-24'),
(107, 49, '7004.jpg', '2020-03-24', '2020-03-24'),
(108, 50, '3377.jpg', '2020-03-24', '2020-03-24'),
(109, 50, '384.jpg', '2020-03-24', '2020-03-24'),
(110, 50, '3348.jpg', '2020-03-24', '2020-03-24');

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
(10, 'leandro', 'ac', 'lean@gmail.com', '$2y$10$dEsMr03eNKkDoistshh/Mu5sJXnM7qMTPA8yFeut5zCFujtgckuw.', '1987-02-10', '123', '123', 'eee', '1584285923.jpg', NULL),
(11, 'Juan', 'Perez', 'juan@perez.com', '$2y$10$TQiFB2/RGDj8kNe0h2OpI.Gd1qejJMT1VFobr0rlrdPm9z7AQuwEa', '1950-01-01', '151521514545', '15236975', 'Falsa 123', '1584647194.png', NULL),
(12, 'Benjamin', 'Casares', 'benjacasares@gmail.com', '$2y$10$kTSPrm/DgBw29uM8uNS7W.kzVtIu3a.dtQW8yHXmbmwPOGzthz5uy', '1999-06-29', '37871188', '42076503', '406', 'perfil', NULL),
(13, 'lea', 'acu', 'leann@gmail.com', '$2y$10$FvYYjwOWmBSzdnN4YXlGHOrGo2Jbi.5fUmmoH65bG0WZOf4X1iB6e', '1987-02-10', '123', '12315', 'asd123', '1584915585.jpg', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
