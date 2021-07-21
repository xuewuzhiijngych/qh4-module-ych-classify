/*
 Navicat Premium Data Transfer

 Source Server         : 本机mysql
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : qh4

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 20/07/2021 15:14:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_classifies
-- ----------------------------
DROP TABLE IF EXISTS `tbl_classifies`;
CREATE TABLE `tbl_classifies`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
  `banner` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'banner',
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '图标',
  `pid` int(11) NOT NULL DEFAULT 0 COMMENT '父级ID',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0' COMMENT '跳转url',
  `sort` int(11) NOT NULL DEFAULT 0 COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态：0-禁用，1-正常',
  `del_time` int(11) NULL DEFAULT 0 COMMENT '软删除',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '无限极分类' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_classifies
-- ----------------------------
INSERT INTO `tbl_classifies` VALUES (1, '系统管理', '', 'fa fa-cog', 0, '0', 0, 1, 0);
INSERT INTO `tbl_classifies` VALUES (2, '管理员列表', 'user', '', 1, '0', 0, 1, 0);
INSERT INTO `tbl_classifies` VALUES (3, '角色管理', 'role', '', 1, '0', 0, 1, 0);
INSERT INTO `tbl_classifies` VALUES (4, '权限管理', 'permission', '', 1, '0', 0, 1, 0);
INSERT INTO `tbl_classifies` VALUES (5, '菜单管理', 'menu', '', 1, '0', 0, 1, 0);
INSERT INTO `tbl_classifies` VALUES (6, '城市管理', 'cities', '', 1, '0', 0, 1, 0);
INSERT INTO `tbl_classifies` VALUES (7, '系统工具', '', 'fa fa-rocket', 0, '0', 1, 1, 0);
INSERT INTO `tbl_classifies` VALUES (8, '定时任务', 'timed_task', '', 7, '0', 0, 1, 0);
INSERT INTO `tbl_classifies` VALUES (9, '一级菜单', '', 'fa fa-align-left', 0, '0', 3, 1, 0);
INSERT INTO `tbl_classifies` VALUES (10, '二级菜单', '', '', 9, '0', 0, 1, 0);
INSERT INTO `tbl_classifies` VALUES (11, '三级菜单1', '', '', 10, '0', 0, 1, 0);
INSERT INTO `tbl_classifies` VALUES (12, '四级菜单1', '', '', 11, '0', 1, 1, 0);
INSERT INTO `tbl_classifies` VALUES (13, '三级菜单2', '', '', 10, '0', 0, 1, 0);

SET FOREIGN_KEY_CHECKS = 1;
