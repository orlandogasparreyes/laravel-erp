-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para oerp
CREATE DATABASE IF NOT EXISTS `oerp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `oerp`;

-- Volcando estructura para tabla oerp.camiones
CREATE TABLE IF NOT EXISTS `camiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) DEFAULT NULL,
  `matricula` varchar(8) DEFAULT NULL,
  `carga_max` float DEFAULT NULL,
  `transmicion` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla oerp.camiones: ~5 rows (aproximadamente)
DELETE FROM `camiones`;
/*!40000 ALTER TABLE `camiones` DISABLE KEYS */;
INSERT INTO `camiones` (`id`, `modelo`, `matricula`, `carga_max`, `transmicion`, `image`, `created_at`, `updated_at`) VALUES
	(3, 'Volvo Truck CX46', 'HDM84K4', 3045, 'A', 'public/kQwaa9noxXhfFuSDBhwsmc6cIiu4ZKzgIZ5KiAzT.jpeg', '2019-05-14 16:18:52', '2019-05-14 16:18:52'),
	(4, 'DINA EW3 89', 'QJ4MC94', 3134, 'M', 'public/l8qPAAdfjz2EN5CEy0QEYfddIUP5slPzEs2H4klD.jpeg', '2019-05-14 16:19:30', '2019-05-14 16:19:30'),
	(5, 'Mercedez Benz OE496', 'MJ469SA', 39445, 'M', 'public/zPh7JiKW9QrNI0u7NWUgGNM5izyhWES7t7aE85So.jpeg', '2019-05-14 16:20:00', '2019-05-14 16:20:00'),
	(6, 'Truck3894', 'JAH73DF', 38042, 'M', 'public/cjMfIAYbrvIdF9ImA5ZoPdGSgyyDdz7zI8n9xgBU.jpeg', '2019-05-14 16:20:27', '2019-05-14 16:20:27');
/*!40000 ALTER TABLE `camiones` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(20) DEFAULT NULL,
  `funcion` varchar(40) DEFAULT NULL,
  `salario_mes` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cargo` (`cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla oerp.cargos: ~2 rows (aproximadamente)
DELETE FROM `cargos`;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` (`id`, `cargo`, `funcion`, `salario_mes`, `created_at`, `updated_at`) VALUES
	(3, 'Chofer De Trailer', 'manje', 9384, '2019-04-26 17:51:34', '2019-04-26 17:49:49'),
	(4, 'Secretaria De RH', 'administra software', 10383, '2019-04-26 23:46:00', '2019-04-26 23:46:05');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telfijo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telmovil` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpostal` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla oerp.clientes: ~3 rows (aproximadamente)
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nombre`, `telfijo`, `telmovil`, `email`, `domicilio`, `cpostal`, `rfc`, `tipo`, `image`, `created_at`, `updated_at`) VALUES
	(3, 'Fernando Luis Mtz', '83837', '68687', 'orlandogasparreyesxd@gmail.com', 'Col.Miramar', '70680', 'KN693DB3', 'F', 'public/H9MiNdRK5dNk4fbC6bwxCW5YNqxjHkkJeZzozA7b.jpeg', '2019-04-29 02:06:28', '2019-05-14 00:43:47'),
	(8, 'Fernando Laguna', '8047404', '76757', 'orlandogasparxd@gmail.com', 'Col.San Martin', '83048', 'JDI494K', 'M', 'public/kyRpRVz2rnqReWBjiPH2fG40ICn9jI54tnJnSS0u.jpeg', '2019-05-14 01:42:27', '2019-06-05 15:55:29'),
	(15, 'Jannet Guadalupe', '7857', '7858', 'jannetgsl@hotmail.com', 'Tehuantepec', '70384', 'JGSL72N3UJD', 'F', 'public/hJMChAfUuKNX3nqf5wApZBXH8k9vYmlwBYj4PiJd.jpeg', '2019-06-04 14:58:40', '2019-06-05 15:53:26'),
	(16, 'Julissa Alquisiris', '98364686', '58687', 'julissa_alquisiris@hotmail.com', 'Col.Miramar', '70283', 'JGD84494D', 'F', 'public/L5ATLVQVJfHQmZA2TNOiPxgaBBwtt9mOG0ZJC7mv.jpeg', '2019-06-05 15:55:16', '2019-06-05 15:55:16');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `domicilio` varchar(50) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `nss` varchar(11) DEFAULT NULL,
  `num_cuenta` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cargo` int(10) unsigned DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `curp` (`curp`),
  UNIQUE KEY `rfc` (`rfc`),
  UNIQUE KEY `nss` (`nss`),
  UNIQUE KEY `num_cuenta` (`num_cuenta`),
  KEY `FK_empleados_cargos` (`cargo`),
  CONSTRAINT `FK_empleados_cargos` FOREIGN KEY (`cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla oerp.empleados: ~5 rows (aproximadamente)
DELETE FROM `empleados`;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` (`id`, `nombre`, `apellidos`, `domicilio`, `curp`, `rfc`, `nss`, `num_cuenta`, `image`, `cargo`, `usuario`, `created_at`, `updated_at`) VALUES
	(3, 'Alex', 'Turner', 'Col.Pilas', 'GARO93884', 'JJD3903', '9997283', '92308394', 'public/4C3Shlgl7unKvgUMW6CdTXct5UJynb0B1WTbsBtC.jpeg', 3, 'Orlando', '2019-04-27 05:03:28', '2019-04-29 03:56:20'),
	(4, 'Orlando', 'Gaspar Reyes', 'miramar', 'KDJ97983', 'KHJKH87', '9809798', '65675875875', 'public/62UBIfYbnMLK7JwirBUBZvkcugtKcHEt5aiEhau6.jpeg', 4, 'Orlando', '2019-04-27 05:04:58', '2019-04-29 03:57:21'),
	(5, 'PennyWise', 'Laguna', 'Col.Barrio Nuevo', '89887', '9879879', '7987', '879879879', 'public/GK3pqyH9OxGyPH9APbQZR5ougLGhH5cF0HmOXgtF.jpeg', 3, 'Orlando', '2019-04-27 05:35:55', '2019-04-29 03:57:00'),
	(6, 'yutuy', 'yuruyru', 'tyutuytuy', 'uutyu', 'yutuy', '89968', '68687', 'public/MPW2cVs0hlx9o22Y3Eew5T3ZSLU37rxjt5uz8Rq9.jpeg', 4, 'Orlando', '2019-05-02 18:15:22', '2019-05-02 18:15:22');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.envios
CREATE TABLE IF NOT EXISTS `envios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ruta` int(10) unsigned DEFAULT NULL,
  `paquete` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `paquete` (`paquete`),
  KEY `FK_envios_rutas` (`ruta`),
  CONSTRAINT `FK_envios_paquetes` FOREIGN KEY (`paquete`) REFERENCES `paquetes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_envios_rutas` FOREIGN KEY (`ruta`) REFERENCES `rutas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla oerp.envios: ~8 rows (aproximadamente)
DELETE FROM `envios`;
/*!40000 ALTER TABLE `envios` DISABLE KEYS */;
INSERT INTO `envios` (`id`, `ruta`, `paquete`, `created_at`, `updated_at`) VALUES
	(23, 8, 3, '2019-05-14 16:53:00', '2019-05-14 16:53:00'),
	(24, 8, 4, '2019-05-14 16:53:01', '2019-05-14 16:53:01'),
	(25, 9, 5, '2019-05-14 16:53:10', '2019-05-14 16:53:10'),
	(26, 9, 6, '2019-05-14 16:53:10', '2019-05-14 16:53:10'),
	(27, 8, 7, '2019-05-14 17:10:31', '2019-05-14 17:10:31'),
	(28, 8, 8, '2019-05-14 17:10:31', '2019-05-14 17:10:31'),
	(29, 8, 9, '2019-05-14 17:10:31', '2019-05-14 17:10:31'),
	(30, 8, 10, '2019-05-14 17:10:31', '2019-05-14 17:10:31');
/*!40000 ALTER TABLE `envios` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla oerp.jobs: ~0 rows (aproximadamente)
DELETE FROM `jobs`;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla oerp.migrations: ~2 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_04_11_045947_create_clientes_table', 1),
	(4, '2019_05_08_021703_create_jobs_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.paquetes
CREATE TABLE IF NOT EXISTS `paquetes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) DEFAULT NULL,
  `dimensiones` varchar(80) DEFAULT NULL,
  `destinatario` varchar(80) DEFAULT NULL,
  `direccion_dest` varchar(90) DEFAULT NULL,
  `telf_destino` varchar(14) DEFAULT NULL,
  `estado` int(1) unsigned DEFAULT NULL,
  `peso` float unsigned DEFAULT NULL,
  `costo_envio` float DEFAULT NULL,
  `cliente` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion` (`descripcion`),
  KEY `FK_paquetes_clientes` (`cliente`),
  CONSTRAINT `FK_paquetes_clientes` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla oerp.paquetes: ~13 rows (aproximadamente)
DELETE FROM `paquetes`;
/*!40000 ALTER TABLE `paquetes` DISABLE KEYS */;
INSERT INTO `paquetes` (`id`, `descripcion`, `dimensiones`, `destinatario`, `direccion_dest`, `telf_destino`, `estado`, `peso`, `costo_envio`, `cliente`, `created_at`, `updated_at`) VALUES
	(3, 'Paquete 1', '45cm', 'oaxaca', 'san martin', '384749', 0, 27, 235, 3, '2019-04-30 20:59:23', '2019-05-14 16:53:01'),
	(4, 'Paquete 2', '45cm', 'oaxaca', 'san martin', '384749', 0, 27, 235, 3, '2019-04-30 20:59:23', '2019-05-14 16:53:01'),
	(5, 'Paquete 3', '45cm', 'oaxaca', 'san martin', '384749', 0, 27, 235, 3, '2019-04-30 20:59:23', '2019-05-14 16:53:10'),
	(6, 'Paquete 4', '45cm', 'oaxaca', 'san martin', '384749', 0, 27, 235, 3, '2019-04-30 20:59:23', '2019-05-14 16:53:10'),
	(7, 'Paquete 7 Extra', '45cm', 'oaxaca', 'san martin', '384749', 0, 27, 235, 3, '2019-04-30 20:59:23', '2019-05-14 17:10:31'),
	(8, 'Guitarra Electrica W23', '45cm', 'oaxaca', 'san martin', '384749', 0, 27, 235, 3, '2019-04-30 20:59:23', '2019-05-14 17:10:31'),
	(9, 'Paquete 7', '45cm', 'oaxaca', 'san martin', '384749', 0, 27, 235, 3, '2019-04-30 20:59:23', '2019-05-14 17:10:31'),
	(10, 'Paquete 8', '45cm', 'oaxaca', 'san martin', '384749', 0, 27, 235, 3, '2019-04-30 20:59:23', '2019-05-14 17:10:31'),
	(11, 'Paquete 9', '45cm', 'oaxaca', 'san martin', '384749', 1, 27, 235, 3, '2019-04-30 20:59:23', '2019-05-14 16:14:14'),
	(12, 'Paquete 12', 'yu', 'uiyiu', 'uiiu', '7588', 1, 878, 17911.2, 3, '2019-05-02 15:12:45', '2019-05-12 07:25:04'),
	(13, 'Paquete 13', '76765', 'jhjh', 'jhjh', '7578', 1, 788, 16075.2, 3, '2019-05-02 18:09:37', '2019-05-13 20:40:52'),
	(14, 'Paquete 14', 'tuy788', 'yuguy', 'yutty', '5558', 1, 785, 16014, 3, '2019-05-02 18:09:59', '2019-05-13 20:40:52');
/*!40000 ALTER TABLE `paquetes` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla oerp.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.precios
CREATE TABLE IF NOT EXISTS `precios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `precio_kg` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion` (`descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla oerp.precios: ~0 rows (aproximadamente)
DELETE FROM `precios`;
/*!40000 ALTER TABLE `precios` DISABLE KEYS */;
INSERT INTO `precios` (`id`, `descripcion`, `precio_kg`, `created_at`, `updated_at`) VALUES
	(1, 'Autorizado Por Lic.Juan', 12.4, '2019-04-16 18:19:53', '2019-05-05 04:06:00');
/*!40000 ALTER TABLE `precios` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.promociones
CREATE TABLE IF NOT EXISTS `promociones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fecha_ini` varchar(10) DEFAULT NULL,
  `fecha_fin` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `estado` varchar(9) DEFAULT NULL,
  `usuario` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titulo` (`titulo`),
  KEY `FK_promociones_users` (`usuario`),
  CONSTRAINT `FK_promociones_users` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla oerp.promociones: ~0 rows (aproximadamente)
DELETE FROM `promociones`;
/*!40000 ALTER TABLE `promociones` DISABLE KEYS */;
INSERT INTO `promociones` (`id`, `titulo`, `descripcion`, `fecha_ini`, `fecha_fin`, `image`, `estado`, `usuario`, `created_at`, `updated_at`) VALUES
	(17, 'Envios Transnacioneles a todo México', 'Realiza los envíos de tus paquetes nacionales o internacionales eligiendo entre multitud de servicios de paquetería: Mensajería Urgente o Economy.', '2019-05-10', '2019-05-25', 'public/UGzbUarzeHz1hqu7ZWLT7ifrIpWfBpzaTiYCoX6b.png', 'primary', 1, '2019-05-08 17:23:23', '2019-05-08 17:23:23');
/*!40000 ALTER TABLE `promociones` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.rutas
CREATE TABLE IF NOT EXISTS `rutas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(10) DEFAULT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `camion` int(11) DEFAULT NULL,
  `empleado` int(10) unsigned DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `folio` (`folio`),
  KEY `FK_rutas_camiones` (`camion`),
  KEY `FK_rutas_empleados` (`empleado`),
  CONSTRAINT `FK_rutas_camiones` FOREIGN KEY (`camion`) REFERENCES `camiones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_rutas_empleados` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla oerp.rutas: ~2 rows (aproximadamente)
DELETE FROM `rutas`;
/*!40000 ALTER TABLE `rutas` DISABLE KEYS */;
INSERT INTO `rutas` (`id`, `folio`, `ruta`, `camion`, `empleado`, `estado`, `created_at`, `updated_at`) VALUES
	(8, '0A123', 'México, Av. Mdero', 5, 3, 'success', '2019-05-14 16:23:18', '2019-05-14 16:23:18'),
	(9, '38304', 'Oaxa, Den Juarez', 5, 5, 'success', '2019-05-14 16:23:45', '2019-05-14 16:23:45');
/*!40000 ALTER TABLE `rutas` ENABLE KEYS */;

-- Volcando estructura para tabla oerp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla oerp.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `tipo`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@hotmail.com', '$2y$10$wonX85zeo7lAR.JEyewNFOlq3jxNfRxDsSrl9v/VGgBqdEiKC43ga', 'admin', 'MtK4Vjb5ZDLXSpJRV3tX8Qmhp9taLj7EFs0cjYlp7sbqwviiMxpEs5zR5RBI', '2019-04-16 22:09:12', '2019-04-16 22:09:12'),
	(2, 'Cesar Alberto', 'cesar@hotmail.com', '$2y$10$zvdkd5n7ivTwYt7RXB7XZuERdQlPbah8uLKue1Wepfnc.qB7q27si', 'empleado', '9c0D3uAKkTBSiV63IPaxtNQv1kE66u9EPMBymDM2X2YEPJ18EBap0K1zLI5a', '2019-05-03 05:00:08', '2019-05-03 05:00:08'),
	(3, 'utuyf', 'hj@hotmail.com', '$2y$10$1YpCMsj1s2DX8ZuKUgDZ6e3N.mhUG2Ox6M5ZL.jy044.UPFWFZsjK', 'empleado', NULL, '2019-05-14 17:12:07', '2019-05-14 17:12:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
