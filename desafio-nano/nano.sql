/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `nano` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `nano`;

CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_atual` decimal(10,2) NOT NULL,
  `administrador_id` int(10) unsigned NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `administrador_id` (`administrador_id`),
  CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`administrador_id`) REFERENCES `administradores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `movimentacoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_movimentacao` enum('entrada','saida') COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `funcionario_id` int(10) unsigned NOT NULL,
  `administrador_id` int(10) unsigned NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observacoes` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `administrador_id` (`administrador_id`),
  KEY `funcionario_id` (`funcionario_id`),
  CONSTRAINT `movimentacoes_ibfk_1` FOREIGN KEY (`administrador_id`) REFERENCES `administradores` (`id`),
  CONSTRAINT `movimentacoes_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
