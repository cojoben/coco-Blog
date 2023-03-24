/*
 Navicat Premium Data Transfer

 Source Server         : mysql_php
 Source Server Type    : MySQL
 Source Server Version : 50737
 Source Host           : localhost:3306
 Source Schema         : php

 Target Server Type    : MySQL
 Target Server Version : 50737
 File Encoding         : 65001

 Date: 24/03/2023 16:06:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `headname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `content` varchar(700) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `author` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES (10, 'coco', 'X神黑客技术联盟', 'coco', '2022-12-12 16:34:36');
INSERT INTO `blog` VALUES (12, '国家卫健委印发新型冠状病毒感染重症病例诊疗方案', '每经AI快讯，1月13日，国家卫健委印发新型冠状病毒感染重症病例诊疗方案（试行第四版），将“新型冠状病毒肺炎”调整为“新型冠状病毒感染”。《方案》进一步明确了重症高危人群，对未达到重症诊断标准，但是年龄>65岁、未完成全程疫苗接种、合并较为严重慢性疾病的新冠病毒感染肺炎患者，可以按重症病例管理。对重症高危人群进行生命体征监测，特别是对静息和活动后的指氧饱和度等进行监测；强调低氧在重症临床预警方面的作用，轻微活动后指氧饱和度<94%，应警惕病情恶化。将临床实践中行之有效的治疗方法纳入《方案》，在一般治疗中增加了高热和咳嗽等对症处理；在抗病毒治疗中增加了已在我国审批上市的小分子药物；增加了抗凝治疗.', 'coco', '2022-12-12 19:01:44');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'guest',
  `num` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'admin', NULL, 'guest', '0');

SET FOREIGN_KEY_CHECKS = 1;
