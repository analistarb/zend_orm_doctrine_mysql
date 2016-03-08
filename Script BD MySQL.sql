

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `carro`
-- ----------------------------
DROP TABLE IF EXISTS `carro`;
CREATE TABLE `carro` (
  `idcarro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcarro`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carro
-- ----------------------------
INSERT INTO `carro` VALUES ('1', 'Fiesta', 'Ford');
INSERT INTO `carro` VALUES ('2', 'Corsa', 'GM');
INSERT INTO `carro` VALUES ('3', 'Uno', 'Fiat');
INSERT INTO `carro` VALUES ('4', 'Golf', 'VW');
INSERT INTO `carro` VALUES ('5', 'Vectra', 'GM');
INSERT INTO `carro` VALUES ('5', 'Fusion', 'Ford');
INSERT INTO `carro` VALUES ('6', 'Polo', 'VW');
INSERT INTO `carro` VALUES ('7', 'Gol', 'VW');
INSERT INTO `carro` VALUES ('8', 'Voyage', 'VW');