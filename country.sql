/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : country

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-03-24 21:00:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `favorite_country`
-- ----------------------------
DROP TABLE IF EXISTS `favorite_country`;
CREATE TABLE `favorite_country` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `favorite` varchar(255) NOT NULL DEFAULT '1',
  `user_id` int(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fc_user` (`user_id`),
  CONSTRAINT `fc_user` FOREIGN KEY (`user_id`) REFERENCES `favorite_country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of favorite_country
-- ----------------------------
INSERT INTO `favorite_country` VALUES ('5', 'Albania', '1', '5', '2021-03-23 23:31:13', 'smokiiiiiiiiii\r\n             ');
INSERT INTO `favorite_country` VALUES ('6', 'Macedonia (the former Yugoslav Republic of)', '1', '5', '2021-03-31 23:12:17', '');
INSERT INTO `favorite_country` VALUES ('7', 'Italy', '1', '5', '2021-03-25 23:12:22', '');
INSERT INTO `favorite_country` VALUES ('8', 'Angola', '1', '5', '2021-03-23 23:31:16', '\r\n             aj sea vidi  test');
INSERT INTO `favorite_country` VALUES ('9', 'Algeria', '0', '5', '2021-03-23 23:26:04', '');
INSERT INTO `favorite_country` VALUES ('10', 'Andorra', '1', '5', '2021-03-31 23:12:37', '');
INSERT INTO `favorite_country` VALUES ('11', 'Belgium', '1', '5', '2021-03-23 22:58:17', '');
INSERT INTO `favorite_country` VALUES ('13', 'Algeria', '1', '6', '2021-03-24 20:36:24', '');
INSERT INTO `favorite_country` VALUES ('14', 'Argentina', '1', '6', '2021-03-24 20:36:26', '\r\n             test');
INSERT INTO `favorite_country` VALUES ('15', 'Anguilla', '1', '6', '2021-03-24 20:36:28', '');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_1` varchar(255) DEFAULT NULL,
  `phone_2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5', null, null, '21232f297a57a5a743894a0e4a801fc3', 'admin', null, null, null);
INSERT INTO `user` VALUES ('6', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test@test.mk', '', '');
INSERT INTO `user` VALUES ('7', 'riki', 'ffff', '7637cc5d986da53ff28afda097427eab', 'lazo', 'stef@sim.mk', '', '');
