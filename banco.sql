-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para trab_tai_2021
CREATE DATABASE IF NOT EXISTS `trab_tai_2021` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `trab_tai_2021`;

-- Copiando estrutura para tabela trab_tai_2021.crud_agenda
CREATE TABLE IF NOT EXISTS `crud_agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `convidado_id` int(11) DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `local` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `descricao` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_crud_agenda_crud_contato` (`convidado_id`),
  CONSTRAINT `FK_crud_agenda_crud_contato` FOREIGN KEY (`convidado_id`) REFERENCES `crud_contato` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela trab_tai_2021.crud_agenda: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `crud_agenda` DISABLE KEYS */;
INSERT INTO `crud_agenda` (`id`, `convidado_id`, `titulo`, `data_inicio`, `hora_inicio`, `data_fim`, `hora_fim`, `local`, `descricao`) VALUES
	(28, 7, 'asa', '0072-02-04', '23:02:00', '0007-02-27', '23:02:00', '27', '72');
/*!40000 ALTER TABLE `crud_agenda` ENABLE KEYS */;

-- Copiando estrutura para tabela trab_tai_2021.crud_contato
CREATE TABLE IF NOT EXISTS `crud_contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `sobrenome` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `telefone1` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `tipo_telefone1` varchar(50) COLLATE utf8mb4_bin DEFAULT 'Casa, Celular, Comercial, Principal',
  `telefone2` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `tipo_telefone2` varchar(50) COLLATE utf8mb4_bin DEFAULT 'Casa, Celular, Comercial, Principal',
  `email` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela trab_tai_2021.crud_contato: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `crud_contato` DISABLE KEYS */;
INSERT INTO `crud_contato` (`id`, `nome`, `sobrenome`, `telefone1`, `tipo_telefone1`, `telefone2`, `tipo_telefone2`, `email`) VALUES
	(1, 'daaa', 'ac', '8787', 'Comercial', '7878', 'Comercial', 'acs'),
	(3, 'ada', 'ad', 'dsad', 'Comercial', 'da', 'ad', 'da'),
	(7, 'bodega', 'forti', '88888888888', 'Celular', '3353 2222', 'Casa', 'bodega@kkk.com'),
	(8, 'joao', 'curtarelli', '88888888888', 'Casa', '82822', 'Celular', 'joaocurtarelli@hotmail.com'),
	(9, 'cdc', 'cxz', 'zcz', 'Celular', 'czcz', 'Casa', 'xcz');
/*!40000 ALTER TABLE `crud_contato` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
