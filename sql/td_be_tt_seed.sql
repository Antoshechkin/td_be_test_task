-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.1.48-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.3.0.6376
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп данных таблицы td_be_test_task.brand: ~7 rows (приблизительно)
INSERT INTO `brand` (`id`, `name`) VALUES
	(1, 'Audi'),
	(2, 'BMW'),
	(7, 'Hyundai'),
	(6, 'Kia'),
	(5, 'Lexus'),
	(3, 'Mercedes-Benz'),
	(4, 'Toyota');

-- Дамп данных таблицы td_be_test_task.model: ~19 rows (приблизительно)
INSERT INTO `model` (`id`, `name`) VALUES
    (4, '3-series'),
    (5, '5-series'),
    (6, '7-series'),
    (1, 'A4'),
    (2, 'A6'),
    (3, 'A8'),
    (7, 'C-class'),
    (10, 'Camry'),
    (11, 'Corolla'),
    (8, 'E-class'),
    (12, 'IS-250'),
    (13, 'LX-570'),
    (14, 'Rio'),
    (9, 'S-class'),
    (19, 'Santa-Fe'),
    (17, 'Solaris'),
    (16, 'Sorento'),
    (15, 'Sportage'),
    (18, 'Tucson');

-- Дамп данных таблицы td_be_test_task.car: ~19 rows (приблизительно)
INSERT INTO `car` (`id`, `brand_id`, `model_id`, `price`, `photo`) VALUES
	(1, 1, 1, 3153800, 'img1.png'),
	(2, 1, 2, 5273600, 'img2.png'),
	(3, 1, 2, 8639100, 'img2.png'),
	(4, 2, 4, 3153800, 'img4.png'),
	(5, 2, 5, 5273600, 'img5.png'),
	(6, 2, 6, 8639100, 'img6.png'),
	(7, 3, 7, 3153800, 'img7.png'),
	(8, 3, 8, 5273600, 'img8.png'),
	(9, 3, 9, 8639100, 'img9.png'),
	(10, 4, 10, 3153800, 'img10.png'),
	(11, 4, 11, 5273600, 'img11.png'),
	(12, 5, 12, 3153800, 'img12.png'),
	(13, 5, 13, 5273600, 'img13.png'),
	(14, 6, 14, 2153800, 'img14.png'),
	(15, 6, 15, 3673600, 'img15.png'),
	(16, 6, 16, 5239100, 'img16.png'),
	(17, 7, 17, 2153800, 'img17.png'),
	(18, 7, 18, 3673600, 'img18.png'),
	(19, 7, 19, 5239100, 'img19.png');

-- Дамп данных таблицы td_be_test_task.credit_program: ~3 rows (приблизительно)
INSERT INTO `credit_program` (`program_id`, `title`, `interest_rate`, `max_body`, `max_loan_term`) VALUES
	(1, 'Credit title 1', 22.2, 300000, 36),
	(2, 'Credit title 2', 14, 2000000, 84),
	(3, 'Credit title 3', 17.5, 1000000, 60);

-- Дамп данных таблицы td_be_test_task.credit_request: ~0 rows (приблизительно)
INSERT INTO `credit_request` (`id`, `car_id`, `program_id`, `initial_payment`, `loan_term`) VALUES
	(1, 4, 2, 1500000, 60);

-- Дамп данных таблицы td_be_test_task.doctrine_migration_versions: ~7 rows (приблизительно)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20250331153748', '2025-04-01 09:15:23', 18),
	('DoctrineMigrations\\Version20250331162218', '2025-04-01 09:16:05', 18),
	('DoctrineMigrations\\Version20250401072136', '2025-04-01 09:16:05', 8),
	('DoctrineMigrations\\Version20250401090530', '2025-04-01 09:16:05', 73),
	('DoctrineMigrations\\Version20250401091627', '2025-04-01 09:17:08', 9),
	('DoctrineMigrations\\Version20250402081707', '2025-04-02 08:18:43', 20),
	('DoctrineMigrations\\Version20250402161700', '2025-04-02 16:17:38', 94);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
