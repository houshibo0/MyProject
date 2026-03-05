/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : phpbaihuo

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2022-03-27 21:37:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `allusers`
-- ----------------------------
DROP TABLE IF EXISTS `allusers`;
CREATE TABLE `allusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `cx` varchar(50) DEFAULT '普通管理员',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of allusers
-- ----------------------------
INSERT INTO `allusers` VALUES ('2', 'hou', 'hou', '超级管理员', '2022-02-21 10:51:02');
INSERT INTO `allusers` VALUES ('14', 'aa', 'aa', '普通管理员', '2022-03-23 14:14:13');
INSERT INTO `allusers` VALUES ('15', 'bb', 'bb', '普通管理员', '2022-03-25 12:51:45');
INSERT INTO `allusers` VALUES ('16', 'cc', 'cc', '普通管理员', '2022-03-22 11:32:24');

-- ----------------------------
-- Table structure for `gonghuoshangxinxi`
-- ----------------------------
DROP TABLE IF EXISTS `gonghuoshangxinxi`;
CREATE TABLE `gonghuoshangxinxi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gonghuoshangbianhao` varchar(50) DEFAULT NULL,
  `gonghuoshangmingcheng` varchar(300) DEFAULT NULL,
  `lianxiren` varchar(50) DEFAULT NULL,
  `dianhua` varchar(50) DEFAULT NULL,
  `dizhi` varchar(300) DEFAULT NULL,
  `youxiang` varchar(50) DEFAULT NULL,
  `zhuyingchanpin` varchar(500) DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of gonghuoshangxinxi
-- ----------------------------
INSERT INTO `gonghuoshangxinxi` VALUES ('2', '001', 'A供货商', '张三', '1234567890', '上海', '777777@163.com', '家电类', '2022-03-23 12:30:34');
INSERT INTO `gonghuoshangxinxi` VALUES ('3', '002', 'B供货商', '刘少奇', '1234565431', '北京', '888888@163.com', '食品类', '2022-03-23 12:30:53');

-- ----------------------------
-- Table structure for `rukujilu`
-- ----------------------------
DROP TABLE IF EXISTS `rukujilu`;
CREATE TABLE `rukujilu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bianhao` varchar(50) DEFAULT NULL,
  `mingcheng` varchar(300) DEFAULT NULL,
  `leibie` varchar(50) DEFAULT NULL,
  `rukushuliang` varchar(50) DEFAULT NULL,
  `rukujiage` varchar(50) DEFAULT NULL,
  `laizichangshang` varchar(300) DEFAULT NULL,
  `beizhu` varchar(500) DEFAULT NULL,
  `caozuoyuan` varchar(50) DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of rukujilu
-- ----------------------------
INSERT INTO `rukujilu` VALUES ('2', '002', '女士长裙', '服装类', '22', '22', 'A供货商', '漂亮', 'hou', '2022-03-22 14:56:58');
INSERT INTO `rukujilu` VALUES ('3', '003', '液晶电视', '家电类', '500', '1840', 'B供货商', '耐用', 'hou', '2022-03-22 14:56:58');
INSERT INTO `rukujilu` VALUES ('4', '004', 'gewgwegwe', '家电类', '333', '235', 'wegewg', 'ewehew', 'hou', '2022-03-22 14:56:58');
INSERT INTO `rukujilu` VALUES ('5', '005', 'wiogw', '家电类', '40', '1350', 'fowewegw', 'jiogweiogw', 'hou', '2022-03-23 00:33:55');

-- ----------------------------
-- Table structure for `shangpinleibie`
-- ----------------------------
DROP TABLE IF EXISTS `shangpinleibie`;
CREATE TABLE `shangpinleibie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leibie` varchar(50) DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of shangpinleibie
-- ----------------------------
INSERT INTO `shangpinleibie` VALUES ('2', '服装类', '2022-03-22 14:56:58');
INSERT INTO `shangpinleibie` VALUES ('3', '家电类', '2022-03-24 14:56:58');
INSERT INTO `shangpinleibie` VALUES ('4', '食品类', '2022-03-21 14:56:58');

-- ----------------------------
-- Table structure for `shangpinxinxi`
-- ----------------------------
DROP TABLE IF EXISTS `shangpinxinxi`;
CREATE TABLE `shangpinxinxi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bianhao` varchar(50) DEFAULT NULL,
  `mingcheng` varchar(300) DEFAULT NULL,
  `leibie` varchar(50) DEFAULT NULL,
  `tupian` varchar(50) DEFAULT NULL,
  `jiage` varchar(50) DEFAULT NULL,
  `beizhu` varchar(500) DEFAULT NULL,
  `kucun` varchar(50) DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of shangpinxinxi
-- ----------------------------
INSERT INTO `shangpinxinxi` VALUES ('2', '001', '珍珠项链', '首饰类', 'uploadfile/1.jpeg', '1500', 'gg', '1', '2022-03-22 10:48:01');
INSERT INTO `shangpinxinxi` VALUES ('3', '002', '女士长裙', '服装类', 'uploadfile/2.jpeg', '150', 'gg', '25', '2021-03-22 10:48:01');
INSERT INTO `shangpinxinxi` VALUES ('4', '003', '液晶电视', '家电类', 'uploadfile/4.jpeg', '2850', 'gg', '493', '2022-03-12 10:48:01');
INSERT INTO `shangpinxinxi` VALUES ('5', '004', '家用电器', '家电类', 'uploadfile/5.jpeg', '353', 'gg', '310', '2014-04-22 10:48:01');
INSERT INTO `shangpinxinxi` VALUES ('6', '005', '燃气社', '家电类', 'uploadfile/139818441390t6.jpg', '2000', 'gg', '38', '2021-05-23 00:33:38');

-- ----------------------------
-- Table structure for `yuangongxinxi`
-- ----------------------------
DROP TABLE IF EXISTS `yuangongxinxi`;
CREATE TABLE `yuangongxinxi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gonghao` varchar(50) DEFAULT NULL,
  `xingming` varchar(50) DEFAULT NULL,
  `nianling` varchar(100) DEFAULT NULL,
  `shenfenzheng` varchar(300) DEFAULT NULL,
  `dianhua` varchar(50) DEFAULT NULL,
  `youxiang` varchar(50) DEFAULT NULL,
  `zhaopian` varchar(50) DEFAULT NULL,
  `zhuyaozhize` varchar(300) DEFAULT NULL,
  `ruzhishijian` varchar(50) DEFAULT NULL,
  `beizhu` varchar(500) DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xingbie` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of yuangongxinxi
-- ----------------------------
INSERT INTO `yuangongxinxi` VALUES ('2', '001', '何升高', '25', '532632623', '23663464', '4444444@163.com', 'uploadfile/tupian.jpg', '销售', '2020-03-07', 'gewgwe', '2020-04-22 10:48:01', '男');
INSERT INTO `yuangongxinxi` VALUES ('3', '002', 'fgew', '33', '52362362', '3262362', '6666666@163.com', 'uploadfile/tupian.jpg', '管理', '2021-03-05', 'gewgew', '2021-04-22 10:48:01', '男');
INSERT INTO `yuangongxinxi` VALUES ('4', '003', '李鹏', '44', '235326362', '2352522', '8883388@163.com', 'uploadfile/tupian.jpg', '管理', '2021-04-15', 'wggew', '2021-04-23 00:33:00', '男');
