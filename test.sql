/*
Navicat MySQL Data Transfer

Source Server         : lxl
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-04-16 11:41:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_admin
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) NOT NULL COMMENT '管理员账号',
  `pwd` varchar(255) NOT NULL COMMENT '管理员密码',
  `login_time` int(11) NOT NULL COMMENT '登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('1', 'admin', '0192023a7bbd73250516f069df18b500', '1586926506');

-- ----------------------------
-- Table structure for t_rule
-- ----------------------------
DROP TABLE IF EXISTS `t_rule`;
CREATE TABLE `t_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nums` varchar(255) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_rule
-- ----------------------------
INSERT INTO `t_rule` VALUES ('1', '8');

-- ----------------------------
-- Table structure for t_subject
-- ----------------------------
DROP TABLE IF EXISTS `t_subject`;
CREATE TABLE `t_subject` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `d_wen` varchar(255) DEFAULT NULL,
  `d_img` varchar(100) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1是文字选项；2是图片选项；3是文本',
  `is_more` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1是单选；2是多选',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_subject
-- ----------------------------
INSERT INTO `t_subject` VALUES ('12', '7', '3|4|5|6', null, '1', '1', '1');
INSERT INTO `t_subject` VALUES ('2', '1', '2|3|4|5', null, '1', '1', '1');
INSERT INTO `t_subject` VALUES ('3', '2', '', null, '1', '3', '1');
INSERT INTO `t_subject` VALUES ('7', '3', null, '/imgs/2020/04/15/5e96c8a1d212f.图层 4.png', '1', '2', '1');
INSERT INTO `t_subject` VALUES ('8', '4', null, '/imgs/2020/04/13/5e9435db219a5.764fee0d1e9211f9934d2ebc1b5d7d8.png', '1', '2', '1');
INSERT INTO `t_subject` VALUES ('9', '5', null, null, '1', '3', '0');
INSERT INTO `t_subject` VALUES ('11', '6', '3|4|5|6', null, '1', '1', '1');
INSERT INTO `t_subject` VALUES ('13', '8', '3|4|5|6', null, '1', '1', '1');
INSERT INTO `t_subject` VALUES ('14', '9', '3|4|5|6', null, '1', '1', '1');
INSERT INTO `t_subject` VALUES ('15', '10', '3|4|5|6', null, '1', '1', '1');
INSERT INTO `t_subject` VALUES ('16', 'a', '3|4|5|6', null, '2', '1', '1');
INSERT INTO `t_subject` VALUES ('17', 'a', '3|4|5|6', '', '2', '1', '1');
INSERT INTO `t_subject` VALUES ('18', 'a', '3|4|5|6', '', '2', '1', '1');
INSERT INTO `t_subject` VALUES ('19', 'a', '3|4|5|6', '', '2', '1', '1');
INSERT INTO `t_subject` VALUES ('20', 'a', '3|4|5|6', '', '2', '1', '1');
INSERT INTO `t_subject` VALUES ('21', 'a', '3|4|5|6', '', '2', '1', '1');
INSERT INTO `t_subject` VALUES ('22', 'a', '3|4|5|6', '', '2', '1', '1');
INSERT INTO `t_subject` VALUES ('23', 'a', '3|4|5|6', '', '2', '1', '1');
INSERT INTO `t_subject` VALUES ('24', 'a', '3|4|5|6', '', '2', '1', '1');
INSERT INTO `t_subject` VALUES ('25', 'a', '3|4|5|6', '', '2', '1', '1');
INSERT INTO `t_subject` VALUES ('26', 'b', '3|4|5|6', '', '3', '1', '1');
INSERT INTO `t_subject` VALUES ('27', 'b', '3|4|5|6', '', '3', '1', '1');
INSERT INTO `t_subject` VALUES ('28', 'b', '3|4|5|6', '', '3', '1', '1');
INSERT INTO `t_subject` VALUES ('29', 'b', '3|4|5|6', '', '3', '1', '1');
INSERT INTO `t_subject` VALUES ('30', 'b', '3|4|5|6', '', '3', '1', '1');
INSERT INTO `t_subject` VALUES ('31', 'b', '3|4|5|6', '', '3', '1', '1');
INSERT INTO `t_subject` VALUES ('32', 'b', '3|4|5|6', '', '3', '1', '1');
INSERT INTO `t_subject` VALUES ('33', 'b', '3|4|5|6', '', '3', '1', '1');
INSERT INTO `t_subject` VALUES ('34', 'b', '3|4|5|6', '', '3', '1', '1');
INSERT INTO `t_subject` VALUES ('35', 'b', '3|4|5|6', '', '3', '1', '1');
INSERT INTO `t_subject` VALUES ('36', 'b', '3|4|5|6', '', '4', '1', '1');
INSERT INTO `t_subject` VALUES ('37', 'b', '3|4|5|6', '', '4', '1', '1');
INSERT INTO `t_subject` VALUES ('38', 'b', '3|4|5|6', '', '4', '1', '1');
INSERT INTO `t_subject` VALUES ('39', 'b', '3|4|5|6', '', '4', '1', '1');
INSERT INTO `t_subject` VALUES ('40', 'b', '3|4|5|6', '', '4', '1', '1');
INSERT INTO `t_subject` VALUES ('41', 'b', '3|4|5|6', '', '4', '1', '1');
INSERT INTO `t_subject` VALUES ('42', 'b', 'q|4|5|6', '', '3', '1', '2');
INSERT INTO `t_subject` VALUES ('43', 'b', '3|4|5|6', '', '4', '1', '1');
INSERT INTO `t_subject` VALUES ('44', 'b', '3|4|5|6', '', '4', '1', '1');
INSERT INTO `t_subject` VALUES ('45', 'b', '3|4|5|6', '', '4', '1', '1');
INSERT INTO `t_subject` VALUES ('46', 'asass', '1|2|3|4', null, '1', '1', '1');
INSERT INTO `t_subject` VALUES ('47', 'sdasdas', '4|5|6|7', null, '1', '1', '2');

-- ----------------------------
-- Table structure for t_type
-- ----------------------------
DROP TABLE IF EXISTS `t_type`;
CREATE TABLE `t_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL COMMENT '题库题目类型',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '类型状态；1是开启；2是关闭',
  `time` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_type
-- ----------------------------
INSERT INTO `t_type` VALUES ('1', '智商', '1', '2');
INSERT INTO `t_type` VALUES ('2', '情商', '1', '2');
INSERT INTO `t_type` VALUES ('3', '心理', '1', '2');
INSERT INTO `t_type` VALUES ('4', '财商', '1', '2');
