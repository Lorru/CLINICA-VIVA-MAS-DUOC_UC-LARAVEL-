/*
Navicat MySQL Data Transfer

Source Server         : LORRU
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : clinicavivamas

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-05-27 22:08:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for centromedico
-- ----------------------------
DROP TABLE IF EXISTS `centromedico`;
CREATE TABLE `centromedico` (
  `id_centromedico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_centromedico` varchar(130) NOT NULL,
  `direccion_centromedico` varchar(260) NOT NULL,
  PRIMARY KEY (`id_centromedico`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of centromedico
-- ----------------------------
INSERT INTO `centromedico` VALUES ('1', 'PASEO HUERFANOS, SANTIAGO', 'HUERFANOS 123, PISO N°1, SANTIAGO');
INSERT INTO `centromedico` VALUES ('2', 'BARROS ARANA, SANTIAGO', 'BARROS ARANA 666, PISO N°30, CONCEPCION');
INSERT INTO `centromedico` VALUES ('3', 'ALONSO OVALLE, SANTIAGO', 'ALONSO DE OVALLE 555, PISO N°3, SANTIAGO');

-- ----------------------------
-- Table structure for especialidad
-- ----------------------------
DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_especialidad` varchar(130) NOT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of especialidad
-- ----------------------------
INSERT INTO `especialidad` VALUES ('1', 'CARDIOLOGIA');
INSERT INTO `especialidad` VALUES ('2', 'CIRUGIA PLASTICA');
INSERT INTO `especialidad` VALUES ('3', 'MEDICINA GENERAL');
INSERT INTO `especialidad` VALUES ('4', 'TRAUMATOLOGIA');

-- ----------------------------
-- Table structure for horario
-- ----------------------------
DROP TABLE IF EXISTS `horario`;
CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `hora_horario` varchar(5) NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of horario
-- ----------------------------
INSERT INTO `horario` VALUES ('1', '08:00');
INSERT INTO `horario` VALUES ('2', '08:30');
INSERT INTO `horario` VALUES ('3', '09:00');
INSERT INTO `horario` VALUES ('4', '09:30');
INSERT INTO `horario` VALUES ('5', '10:00');
INSERT INTO `horario` VALUES ('6', '10:30');
INSERT INTO `horario` VALUES ('7', '11:00');
INSERT INTO `horario` VALUES ('8', '11:30');
INSERT INTO `horario` VALUES ('9', '12:00');
INSERT INTO `horario` VALUES ('10', '12:30');
INSERT INTO `horario` VALUES ('11', '13:00');
INSERT INTO `horario` VALUES ('12', '13:30');
INSERT INTO `horario` VALUES ('13', '14:00');
INSERT INTO `horario` VALUES ('14', '14:30');
INSERT INTO `horario` VALUES ('15', '15:00');
INSERT INTO `horario` VALUES ('16', '15:30');
INSERT INTO `horario` VALUES ('17', '16:00');
INSERT INTO `horario` VALUES ('18', '16:30');
INSERT INTO `horario` VALUES ('19', '17:00');
INSERT INTO `horario` VALUES ('20', '17:30');
INSERT INTO `horario` VALUES ('21', '18:00');
INSERT INTO `horario` VALUES ('22', '18:30');
INSERT INTO `horario` VALUES ('23', '19:00');
INSERT INTO `horario` VALUES ('24', '19:30');
INSERT INTO `horario` VALUES ('25', '20:00');
INSERT INTO `horario` VALUES ('26', '20:30');
INSERT INTO `horario` VALUES ('27', '21:00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for perfil
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(20) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perfil
-- ----------------------------
INSERT INTO `perfil` VALUES ('1', 'ADMINISTRADOR');
INSERT INTO `perfil` VALUES ('2', 'ATENCION');
INSERT INTO `perfil` VALUES ('3', 'CONSULTA');

-- ----------------------------
-- Table structure for profesional
-- ----------------------------
DROP TABLE IF EXISTS `profesional`;
CREATE TABLE `profesional` (
  `id_profesional` int(11) NOT NULL AUTO_INCREMENT,
  `id_especialidad` int(11) NOT NULL,
  `id_centromedico` int(11) NOT NULL,
  `nombres_profesional` varchar(70) NOT NULL,
  `apellidos_profesional` varchar(70) NOT NULL,
  PRIMARY KEY (`id_profesional`),
  KEY `id_especialidad` (`id_especialidad`),
  KEY `id_centromedico` (`id_centromedico`),
  CONSTRAINT `profesional_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  CONSTRAINT `profesional_ibfk_2` FOREIGN KEY (`id_centromedico`) REFERENCES `centromedico` (`id_centromedico`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of profesional
-- ----------------------------
INSERT INTO `profesional` VALUES ('1', '1', '1', 'PATRICIA PAMELA', 'VASQUEZ VIDAL');
INSERT INTO `profesional` VALUES ('2', '4', '1', 'ALFREDO ALONSO', 'RAMIREZ RIQUELME');
INSERT INTO `profesional` VALUES ('3', '3', '1', 'JUAN JOSE', 'PEREZ PEREIRA');
INSERT INTO `profesional` VALUES ('4', '1', '3', 'JAVIERA JACINTA', 'MONTANO MUÑOZ');
INSERT INTO `profesional` VALUES ('5', '2', '2', 'PEDRO PABLO', 'CARDENAS CONTRERAS');
INSERT INTO `profesional` VALUES ('6', '3', '1', 'AMANDA ANTONIA', 'BURGOS BARROS');

-- ----------------------------
-- Table structure for reserva
-- ----------------------------
DROP TABLE IF EXISTS `reserva`;
CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesional` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `rut_paciente` varchar(30) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reserva`),
  KEY `id_profesional` (`id_profesional`),
  KEY `id_horario` (`id_horario`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reserva
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_perfil` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `id_perfil` (`id_perfil`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'Administrador', 'admin@vivamas.cl', '$2y$10$ugpQxh.JZ4Q9RYFOUPTcxewuky8St8A8FprYiwqmig.sm4hGj2Scm', 'GJOMU6OYSs3t4bsZH2fFQVvz80yHRa7rbWTpbzJoMvZ0PbS8SjvdG08qmKJB', '2018-05-27 15:51:15', '2018-05-27 15:51:15');
INSERT INTO `users` VALUES ('2', '2', 'Atencion', 'atencion@vivamas.cl', '$2y$10$m8djkvlFsRMguS9frEdt/Ou5jUE3aubTKS8kHqYeDA784hxTTJQwO', 'VLx0GpD9N3NUiMsTBrWa5ccSX7OshBIq0jQanYMNVkF3jcG3uqFqmXKQewQT', '2018-05-27 17:32:29', '2018-05-27 17:32:29');
INSERT INTO `users` VALUES ('3', '3', 'Consulta', 'consulta@vivamas.cl', '$2y$10$VCL20GvPUtewbmMjGOiX6OarcQN3iJt3qdjGzHrbw5hjUyYPMNp0i', 'sjLT7qeOq3XKAv2ViHTHB7JEaCC63560wkXrkDF3v9lbfSKoO585DWcUki7n', '2018-05-27 17:32:57', '2018-05-27 17:32:57');
