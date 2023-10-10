
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `xtbm_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_categoria` (
  `idc` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `variable` varchar(90) DEFAULT NULL,
  `mostrar` enum('1','2') DEFAULT NULL,
  `registrado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_categoria` WRITE;
/*!40000 ALTER TABLE `xtbm_categoria` DISABLE KEYS */;
INSERT INTO `xtbm_categoria` VALUES (1,'EQUIPOS DE INGENIERÍA','equipos-de-ingenieria','1','2019-08-08 09:21:00','2020-03-28 22:10:40');
INSERT INTO `xtbm_categoria` VALUES (2,'EQUIPOS MEDICOS','equipos-medicos','1','2019-08-08 09:21:00','2020-03-28 22:19:08');
INSERT INTO `xtbm_categoria` VALUES (3,'SERVICIO DE MANTENIMIENTO Y REPARACIÓN','servicio-de-mantenimiento-y-reparacion','1','2019-08-08 09:21:00','2020-03-28 22:20:19');
INSERT INTO `xtbm_categoria` VALUES (4,'CALIBRACIÓN CERTIFICADA','calibracion-certificada','1','2019-12-09 08:07:41','2020-03-28 22:21:04');
INSERT INTO `xtbm_categoria` VALUES (5,'Catálogos Externos','catalogos-externos','1','2020-01-07 10:10:49','2020-01-18 19:18:14');
/*!40000 ALTER TABLE `xtbm_categoria` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_clientes` (
  `idc` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `imagen1` varchar(40) DEFAULT NULL,
  `imagen2` varchar(40) DEFAULT NULL,
  `mostrar` enum('1','2') DEFAULT NULL,
  `registrado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_clientes` WRITE;
/*!40000 ALTER TABLE `xtbm_clientes` DISABLE KEYS */;
INSERT INTO `xtbm_clientes` VALUES (1,'Gobierno Regional Cusco','','5df0e86d33f59.png','5df0e86d33f5e.jpg','1','2019-12-11 13:00:29','2019-12-11 13:00:29');
INSERT INTO `xtbm_clientes` VALUES (2,'Seguro Social de Salud del Perú (Essalud)','','5df0edff134d5.png','5df0edff134da.jpg','1','2019-12-11 13:24:15','2019-12-11 13:24:15');
INSERT INTO `xtbm_clientes` VALUES (3,'Obrascón Huarte Lain (OHL)','https://www.ohl.es/','5df0ee41ee91e.png','5df0ee41ee923.jpg','1','2019-12-11 13:25:21','2019-12-11 21:47:31');
INSERT INTO `xtbm_clientes` VALUES (4,'Gobierno Regional de Apurímac','http://www.regionapurimac.gob.pe/','5df0eeb525241.png','5df0eeb525246.jpg','1','2019-12-11 13:27:17','2019-12-11 21:46:47');
INSERT INTO `xtbm_clientes` VALUES (5,'Instituto Nacional de Enfermedades Neoplásicas (INEN)','https://portal.inen.sld.pe/','5df0eefd3806a.png','5df0eefd3806e.jpg','1','2019-12-11 13:28:29','2019-12-11 13:28:29');
INSERT INTO `xtbm_clientes` VALUES (6,'Mixercon','http://www.mixercon.com/es/','5df0f00bc1a22.png','5df0f00bc1a26.jpg','1','2019-12-11 13:32:59','2019-12-11 13:32:59');
INSERT INTO `xtbm_clientes` VALUES (8,'Ministerio de Transportes y Comunicaciones (MTC)','http://portal.mtc.gob.pe/','5df0f1cf450ac.png','5df0f1cf450b0.jpg','1','2019-12-11 13:40:31','2019-12-11 13:40:31');
INSERT INTO `xtbm_clientes` VALUES (9,'Cementos Pacasmayo','https://www.cementospacasmayo.com.pe/','5df16125015b9.png','5df16125015bd.jpg','1','2019-12-11 13:43:10','2019-12-11 21:35:33');
INSERT INTO `xtbm_clientes` VALUES (10,'Universidad Andina del Cusco','https://www.uandina.edu.pe/','5df0f2d245f68.png','5df0f2d245f6c.jpg','1','2019-12-11 13:44:50','2019-12-11 13:44:50');
INSERT INTO `xtbm_clientes` VALUES (11,'Universidad Nacional de Ingeniería','https://www.uni.edu.pe/','5df0f3190c7aa.png','5df0f3190c7ae.jpg','1','2019-12-11 13:46:01','2019-12-11 13:46:01');
INSERT INTO `xtbm_clientes` VALUES (12,'Universidad Nacional de San Antonio Abad del Cusco','http://www.unsaac.edu.pe/','5df0f36dbdf4c.png','5df0f36dbdf50.jpg','1','2019-12-11 13:47:25','2019-12-11 13:47:25');
INSERT INTO `xtbm_clientes` VALUES (13,'UNIVERSIDAD TECNOLÓGICA DE LOS ANDES','https://utea.edu.pe/','5ef36d7d7063d.jpg','5ef36d7d70648.jpg','1','2020-06-24 15:46:09','2020-06-24 16:13:01');
/*!40000 ALTER TABLE `xtbm_clientes` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_historial` (
  `idh` int NOT NULL AUTO_INCREMENT,
  `modulo` varchar(5) DEFAULT NULL,
  `proceso` varchar(150) DEFAULT NULL,
  `usuario` varchar(80) DEFAULT NULL,
  `pantalla` varchar(40) DEFAULT NULL,
  `sistema` varchar(40) DEFAULT NULL,
  `navegador` varchar(40) DEFAULT NULL,
  `ip` varchar(70) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `registrado` datetime DEFAULT NULL,
  PRIMARY KEY (`idh`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_historial` WRITE;
/*!40000 ALTER TABLE `xtbm_historial` DISABLE KEYS */;
INSERT INTO `xtbm_historial` VALUES (1,'m8','Edición del PERFIL DE USUARIO: Ventas\ncon módulos: m1,m2,m3,','1','<script>document.write(_anchop_)</script','Windows 10','Google Chrome','190.232.74.66','http://cpss.com.pe/website/cms/proceso-permisos.php?v=editar&cod=2','2020-02-15 15:28:26');
INSERT INTO `xtbm_historial` VALUES (2,'m8','Edición del PERFIL DE USUARIO: Ventas\ncon módulos: m1,m2,m3,m4,m5','Id:1 - Manuel Jesús Vicuña Fuertes','<script>document.write(_anchop_)</script','Windows 10','Google Chrome','190.232.74.66','http://cpss.com.pe/website/cms/proceso-permisos.php?v=editar&cod=2','2020-02-15 15:34:11');
INSERT INTO `xtbm_historial` VALUES (3,'m8','Edición del PERFIL DE USUARIO: Ventas\ncon módulos: m1,m2,m3,m4,m5','Id:1 - Manuel Jesús Vicuña Fuertes','<script>document.write(_anchop_)</script','Windows 10','Google Chrome','190.232.74.66','http://cpss.com.pe/website/cms/proceso-permisos.php?v=editar&cod=2','2020-02-15 15:42:50');
INSERT INTO `xtbm_historial` VALUES (4,'m','','6','','','','','','2020-04-17 23:16:53');
INSERT INTO `xtbm_historial` VALUES (5,'m','','1','','','','','','2020-04-18 17:38:31');
INSERT INTO `xtbm_historial` VALUES (6,'m','','1','','','','','','2020-04-18 17:38:56');
INSERT INTO `xtbm_historial` VALUES (7,'m','','1','','','','','','2020-04-18 17:39:23');
INSERT INTO `xtbm_historial` VALUES (8,'m','','1','','','','','','2020-04-18 17:39:33');
INSERT INTO `xtbm_historial` VALUES (9,'m','','1','','','','','','2020-04-18 17:39:44');
INSERT INTO `xtbm_historial` VALUES (10,'m','','1','','','','','','2020-04-18 17:39:54');
INSERT INTO `xtbm_historial` VALUES (11,'m','','1','','','','','','2020-04-18 17:40:03');
INSERT INTO `xtbm_historial` VALUES (12,'m','','1','','','','','','2020-04-18 17:40:15');
INSERT INTO `xtbm_historial` VALUES (13,'m','','1','','','','','','2020-04-18 17:40:25');
INSERT INTO `xtbm_historial` VALUES (14,'m','','1','','','','','','2020-04-18 17:40:35');
INSERT INTO `xtbm_historial` VALUES (15,'m','','1','','','','','','2020-04-18 17:40:46');
INSERT INTO `xtbm_historial` VALUES (16,'m','','1','','','','','','2020-04-18 17:40:56');
INSERT INTO `xtbm_historial` VALUES (17,'m','','1','','','','','','2020-04-18 17:41:08');
INSERT INTO `xtbm_historial` VALUES (18,'m','','1','','','','','','2020-04-18 17:41:19');
INSERT INTO `xtbm_historial` VALUES (19,'m','','1','','','','','','2020-04-19 01:36:36');
INSERT INTO `xtbm_historial` VALUES (20,'m','','6','','','','','','2020-04-23 15:40:13');
INSERT INTO `xtbm_historial` VALUES (21,'m','','6','','','','','','2020-04-23 15:43:30');
INSERT INTO `xtbm_historial` VALUES (22,'m','','1','','','','','','2020-06-18 00:12:08');
INSERT INTO `xtbm_historial` VALUES (23,'m','','1','','','','','','2020-06-18 00:32:16');
INSERT INTO `xtbm_historial` VALUES (24,'m','','1','','','','','','2020-06-18 15:55:59');
INSERT INTO `xtbm_historial` VALUES (25,'m','','1','','','','','','2020-06-18 15:56:41');
INSERT INTO `xtbm_historial` VALUES (26,'m','','1','','','','','','2020-06-18 15:57:32');
INSERT INTO `xtbm_historial` VALUES (27,'m','','1','','','','','','2020-06-18 15:57:56');
INSERT INTO `xtbm_historial` VALUES (28,'m','','1','','','','','','2020-06-18 15:58:21');
INSERT INTO `xtbm_historial` VALUES (29,'m','','1','','','','','','2020-06-18 15:58:50');
INSERT INTO `xtbm_historial` VALUES (30,'m','','4','','','','','','2020-06-24 15:54:16');
INSERT INTO `xtbm_historial` VALUES (31,'m','','1','','','','','','2021-03-19 17:52:30');
INSERT INTO `xtbm_historial` VALUES (32,'m','','1','','','','','','2021-03-19 17:52:49');
INSERT INTO `xtbm_historial` VALUES (33,'m','','1','','','','','','2021-03-19 17:53:14');
INSERT INTO `xtbm_historial` VALUES (34,'m','','1','','','','','','2021-03-19 17:53:43');
INSERT INTO `xtbm_historial` VALUES (35,'m','','1','','','','','','2021-03-19 17:53:58');
INSERT INTO `xtbm_historial` VALUES (36,'m','','1','','','','','','2021-03-19 17:54:16');
INSERT INTO `xtbm_historial` VALUES (37,'m','','1','','','','','','2021-03-19 17:54:44');
INSERT INTO `xtbm_historial` VALUES (38,'m','','1','','','','','','2021-03-19 17:54:59');
INSERT INTO `xtbm_historial` VALUES (39,'m','','1','','','','','','2021-03-19 17:55:11');
INSERT INTO `xtbm_historial` VALUES (40,'m','','1','','','','','','2021-03-19 17:55:28');
INSERT INTO `xtbm_historial` VALUES (41,'m','','1','','','','','','2021-03-19 17:55:46');
INSERT INTO `xtbm_historial` VALUES (42,'m','','1','','','','','','2021-06-17 16:40:14');
INSERT INTO `xtbm_historial` VALUES (43,'m','','6','','','','','','2021-07-09 00:17:18');
INSERT INTO `xtbm_historial` VALUES (44,'m','','6','','','','','','2021-07-09 00:22:37');
INSERT INTO `xtbm_historial` VALUES (45,'m','','6','','','','','','2021-07-09 01:01:30');
INSERT INTO `xtbm_historial` VALUES (46,'m','','6','','','','','','2021-07-09 01:02:07');
/*!40000 ALTER TABLE `xtbm_historial` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_marcas` (
  `idm` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `imagen1` varchar(40) DEFAULT NULL,
  `mostrar` enum('1','2') DEFAULT NULL,
  `registrado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`idm`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_marcas` WRITE;
/*!40000 ALTER TABLE `xtbm_marcas` DISABLE KEYS */;
INSERT INTO `xtbm_marcas` VALUES (1,'HUMBOLDT','https://www.humboldtmfg.com','5df2f647df8a4.png','2','2019-12-12 11:54:27','2022-09-19 22:09:39');
INSERT INTO `xtbm_marcas` VALUES (2,'Instron','https://www.instron.us/','5df2f69e2fa3f.png','2','2019-12-13 01:23:48','2020-04-16 01:11:20');
INSERT INTO `xtbm_marcas` VALUES (3,'Riester','https://www.riester.de/es/','5df394075fe6f.png','2','2019-12-13 01:35:04','2020-04-16 01:11:35');
INSERT INTO `xtbm_marcas` VALUES (4,'GDS Instruments','https://www.gdsinstruments.com','5e6a1c68ab387.png','1','2019-12-14 08:40:29','2020-03-12 11:26:32');
INSERT INTO `xtbm_marcas` VALUES (5,'Italsigma','http://www.italsigma.it/Pagine/default.aspx','633b3a9accdc6.jpg','1','2019-12-14 08:41:10','2022-10-03 20:40:14');
INSERT INTO `xtbm_marcas` VALUES (6,'Testing Equipment','http://www.testingequipmentie.com','5e6a29cee39cf.png','1','2019-12-14 08:42:47','2020-03-12 12:23:42');
INSERT INTO `xtbm_marcas` VALUES (7,'Labotronics','https://www.labotronics.com','5e97a2e76647b.png','1','2020-04-16 01:12:23','2020-04-22 16:57:36');
INSERT INTO `xtbm_marcas` VALUES (10,'PSS','https://jhhinversiones.com/jhhinversiones//','5ea1f7d1312a1.jpeg','1','2020-04-23 21:17:21','2020-04-23 21:17:21');
INSERT INTO `xtbm_marcas` VALUES (11,'ZFCV','https://zfcv.com/','5eb9d82fcda48.jpg','2','2020-05-11 23:56:47','2020-05-21 19:09:06');
INSERT INTO `xtbm_marcas` VALUES (12,'Medilab Global','http://www.medilabglobal.com/','5ebdc045c0e0f.jpg','1','2020-05-14 23:03:49','2020-05-14 23:03:49');
INSERT INTO `xtbm_marcas` VALUES (13,'BELLTRONIC','http://www.belltronicn.com/','5ebdde9bde78e.png','2','2020-05-15 01:13:15','2020-05-15 01:13:15');
INSERT INTO `xtbm_marcas` VALUES (14,'YXN-TECH','https://yxntech.com/','5ec6aac05546c.jpg','2','2020-05-21 17:22:24','2020-06-18 15:54:54');
INSERT INTO `xtbm_marcas` VALUES (15,'Gelikang','https://yxntech.com/','5ec6afa5377b9.jpg','2','2020-05-21 17:43:17','2020-05-21 19:08:08');
INSERT INTO `xtbm_marcas` VALUES (16,'BABYLY','https://www.babyinfanti.com.pe/','5eea9ef03aeda.png','2','2020-06-17 23:53:36','2020-06-18 15:55:12');
INSERT INTO `xtbm_marcas` VALUES (17,'YOUNUOKANG','http://cpss.com.pe/','5eed364751ba2.jpg','2','2020-06-19 23:03:51','2020-06-19 23:03:51');
INSERT INTO `xtbm_marcas` VALUES (18,'Shenzhen Wanli Printing','http://cpss.com.pe/','','2','2020-06-19 23:54:35','2020-06-19 23:54:35');
INSERT INTO `xtbm_marcas` VALUES (19,'Shenzhen Sunjet','https://www.sunjet-sz.com/','5effbb1029dd6.jpg','2','2020-07-04 00:11:12','2020-07-04 00:11:12');
INSERT INTO `xtbm_marcas` VALUES (24,'Ohaus','https://mx.ohaus.com/es-MX/Products/Model-Comparison?id=179329','60e869b185d9a.jpg','1','2021-07-09 01:02:35','2021-07-09 16:22:25');
INSERT INTO `xtbm_marcas` VALUES (25,'CST Instruments','https://www.cstinstruments.co.uk/','60e8694c9c5c8.jpg','1','2021-07-09 01:06:25','2021-07-09 16:20:44');
INSERT INTO `xtbm_marcas` VALUES (26,'Controls','https://www.controls-group.com/eng-es/','6328d53642e79.jpg','1','2021-11-09 23:01:40','2022-09-19 22:07:59');
/*!40000 ALTER TABLE `xtbm_marcas` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_pais` (
  `idp` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET utf8mb3 DEFAULT NULL,
  `bandera` varchar(10) CHARACTER SET utf8mb3 DEFAULT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_pais` WRITE;
/*!40000 ALTER TABLE `xtbm_pais` DISABLE KEYS */;
INSERT INTO `xtbm_pais` VALUES (1,'Antigua y Barbuda','ag.png');
INSERT INTO `xtbm_pais` VALUES (2,'Argentina','ar.png');
INSERT INTO `xtbm_pais` VALUES (3,'Bahamas','bs.png');
INSERT INTO `xtbm_pais` VALUES (4,'Barbados','bb.png');
INSERT INTO `xtbm_pais` VALUES (5,'Belice','bz.png');
INSERT INTO `xtbm_pais` VALUES (6,'Bolivia','bo.png');
INSERT INTO `xtbm_pais` VALUES (7,'Brasil','br.png');
INSERT INTO `xtbm_pais` VALUES (8,'Canadá','ca.png');
INSERT INTO `xtbm_pais` VALUES (9,'Chile','cl.png');
INSERT INTO `xtbm_pais` VALUES (10,'Colombia','co.png');
INSERT INTO `xtbm_pais` VALUES (11,'Costa Rica','cr.png');
INSERT INTO `xtbm_pais` VALUES (12,'Cuba','cu.png');
INSERT INTO `xtbm_pais` VALUES (13,'Dominica','dm.png');
INSERT INTO `xtbm_pais` VALUES (14,'Ecuador','ec.png');
INSERT INTO `xtbm_pais` VALUES (15,'El Salvador','sv.png');
INSERT INTO `xtbm_pais` VALUES (16,'Estados Unidos','us.png');
INSERT INTO `xtbm_pais` VALUES (17,'Granada','gd.png');
INSERT INTO `xtbm_pais` VALUES (18,'Guatemala','gt.png');
INSERT INTO `xtbm_pais` VALUES (19,'Guyana','gy.png');
INSERT INTO `xtbm_pais` VALUES (20,'Haití','ht.png');
INSERT INTO `xtbm_pais` VALUES (21,'Honduras','hn.png');
INSERT INTO `xtbm_pais` VALUES (22,'Jamaica','jm.png');
INSERT INTO `xtbm_pais` VALUES (23,'México','mx.png');
INSERT INTO `xtbm_pais` VALUES (24,'Nicaragua','ni.png');
INSERT INTO `xtbm_pais` VALUES (25,'Panamá','pa.png');
INSERT INTO `xtbm_pais` VALUES (26,'Paraguay','py.png');
INSERT INTO `xtbm_pais` VALUES (27,'Perú','pe.png');
INSERT INTO `xtbm_pais` VALUES (28,'República Dominicana','do.png');
INSERT INTO `xtbm_pais` VALUES (29,'San Cristóbal','kn.png');
INSERT INTO `xtbm_pais` VALUES (30,'San Vicente y las Granadinas','vc.png');
INSERT INTO `xtbm_pais` VALUES (31,'Santa Lucía','lc.png');
INSERT INTO `xtbm_pais` VALUES (32,'Surinam','sr.png');
INSERT INTO `xtbm_pais` VALUES (33,'Trinidad y Tobago','tt.png');
INSERT INTO `xtbm_pais` VALUES (34,'Uruguay','uy.png');
INSERT INTO `xtbm_pais` VALUES (35,'Venezuela','ve.png');
INSERT INTO `xtbm_pais` VALUES (36,'España','es.png');
INSERT INTO `xtbm_pais` VALUES (37,'Italia','it.png');
/*!40000 ALTER TABLE `xtbm_pais` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_permisos` (
  `idpe` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `modulos` text,
  `registrado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`idpe`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_permisos` WRITE;
/*!40000 ALTER TABLE `xtbm_permisos` DISABLE KEYS */;
INSERT INTO `xtbm_permisos` VALUES (1,'Administrador','m1,m2,m3,m4,m5,m6,m7,m8,m9','2018-09-16 03:29:00','2020-02-14 03:53:11');
INSERT INTO `xtbm_permisos` VALUES (2,'Ventas','m1,m2,m3,m4,m5','2020-02-09 06:58:13','2020-02-15 15:42:50');
/*!40000 ALTER TABLE `xtbm_permisos` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_productos` (
  `idp` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `variable` varchar(100) DEFAULT NULL,
  `resumen` text,
  `descripcion` text,
  `marcas` int NOT NULL,
  `categorias` text,
  `subcategorias` text,
  `precio` decimal(12,2) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `mostrar` enum('1','2') DEFAULT NULL,
  `home` enum('1','2') DEFAULT NULL,
  `externo` enum('1','2') DEFAULT NULL,
  `url_externo` varchar(250) DEFAULT NULL,
  `imagen1` varchar(40) DEFAULT NULL,
  `etiquetas` text,
  `registrado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`idp`),
  KEY `fk_xtbm_productos_xtbm_marcas` (`marcas`),
  FULLTEXT KEY `codigo` (`codigo`,`nombre`,`resumen`,`descripcion`),
  CONSTRAINT `fk_xtbm_productos_xtbm_marcas` FOREIGN KEY (`marcas`) REFERENCES `xtbm_marcas` (`idm`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_productos` WRITE;
/*!40000 ALTER TABLE `xtbm_productos` DISABLE KEYS */;
INSERT INTO `xtbm_productos` VALUES (16,'CAP18-100000172','Cabezal de Rotura Marshall de 4 pulg','cabezal-de-rotura-marshall-de-4-pulg','Admite los siguientes estándares: ASTM D6927 , ASTM D5581','<p>Admite los siguientes est&aacute;ndares: ASTM D6927 , ASTM D5581<br />Los cabezales de rotura Marshall consisten en un segmento cil&iacute;ndrico superior e inferior que tiene un radio de curvatura interno de 3 pulg para muestras de 6 pulg y 2 pulg para una muestra de 4 pulg . El segmento inferior est&aacute; montado sobre una base con dos barras de gu&iacute;a perpendiculares que se extienden verticalmente desde la base. Una barra de gu&iacute;a es m&aacute;s grande que la otra, con un manguito de gu&iacute;a correspondientemente m&aacute;s grande en el segmento superior para garantizar un montaje correcto. Los manguitos de gu&iacute;a en el segmento superior unen las dos secciones sin un atascamiento apreciable o movimiento suelto en las barras de gu&iacute;a.</p>',1,'1',NULL,1763.00,3,'1','2','2','','5e9b99696ff0d.jpg','PSS','2020-04-19 01:20:57','2021-06-18 20:43:00');
INSERT INTO `xtbm_productos` VALUES (20,'CAP18-010000011','Piedra porosa inferior de la celda de consolidación 4.375 X 1/2pulg','piedra-porosa-inferior-de-la-celda-de-consolidacion-4-375-x-1-2pulg','Admite los siguientes estándares: ASTM D4767 , ASTM D5084 , ASTM D6035 , ASTM D7181','<p>Admite los siguientes est&aacute;ndares: ASTM D4767 , ASTM D5084 , ASTM D6035 , ASTM D7181<br />Se utiliza para pruebas de permeabilidad y triaxiales para permitir una distribuci&oacute;n uniforme del agua a trav&eacute;s de la muestra. Se requieren dos piedras por celda, cada una de 1/4 pulg de espesor (6 mm).</p>',1,'1',NULL,35.00,4,'1','2','2','','5e9e29b0763ec.jpg','PSS','2020-04-21 00:01:04','2021-06-18 20:37:33');
INSERT INTO `xtbm_productos` VALUES (38,'CAP19-060000042','Máquina de compresión, 250,000lbs (1,112kN) , con Lector digital, 3/4 HP 220 60H','maquina-de-compresion-250-000lbs-1-112kn-con-lector-digital-3-4-hp-220-60h','Admite los estándares GMT: ASTM C1073 , ASTM C109 , ASTM C140 , ASTM C39 , ASTM C87 , ASTM C496 , ASTM C469 , ASTM C496 , ASTM C39 , ASTM C87 , ASTM C109 , ASTM C140 , ASTM C469 , ASTM C1073','<p>M&aacute;quina de compresi&oacute;n serie HCM-2500, 250K (1012kN), controlador HCM-5090, 1 / 2HP 230V 60Hz<br />Admite los est&aacute;ndares GMT: ASTM C1073 , ASTM C109 , ASTM C140 , ASTM C39 , ASTM C87 , ASTM C496 , ASTM C469 , ASTM C496 , ASTM C39 , ASTM C87 , ASTM C109 , ASTM C140 , ASTM C469 , ASTM C1073<br />&bull; Adecuado para cilindros, cubos, vigas y n&uacute;cleos de mezclas de hormig&oacute;n de resistencia est&aacute;ndar<br />&bull; Rango de prueba de 2500 a 250,000 lbf (11 a 1112 kN) con una precisi&oacute;n de &plusmn; 0.5% de la carga indicada<br />&bull; Adecuado para una resistencia de concreto de hasta 7.000 psi para cilindros de 6 \"de di&aacute;metro<br />&bull; La configuraci&oacute;n est&aacute;ndar incluye platos para probar cilindros de 6 \"x 12\" (150 mm x 300 mm).<br />&bull; Tres opciones de control digital<br />&bull; Platos de prueba y accesorios opcionales disponibles<br />&bull; Puertas protectoras de acero, no de pl&aacute;stico.<br />&bull; El soporte de montaje NO est&aacute; incluido. C&oacute;digo de producto de opci&oacute;n HCM-0200<br />Especificaciones<br />Apertura vertical - 19,375 pulg (492 mm) <br />Apertura horizontal - 9,25 pulg ( 235 mm)<br />Carrera del pist&oacute;n - 2,5 pulg (63,5 mm) <br />Plato inferior, di&aacute;metro - 6,5 pulg (165 mm) <br />&Oslash; Plato superior, dia. - 6.5 pulg (165 mm) <br />Tapa del dep&oacute;sito de aceite - 2 gal (7,6 litros) <br />Ancho total &ndash; 27 pulg (686 mm) <br />Profundidad total - 17 pulg (432 mm) <br />Altura total - 56,312 pulg (1430 mm</p>',1,'1',NULL,1.00,1,'1','2','2','','60ccf9873e41b.png','HCM-2500IH.2F','2021-06-17 18:09:08','2021-06-18 20:58:00');
INSERT INTO `xtbm_productos` VALUES (39,'CAP20-100000060','Agitador económico grande, 220 V 60 Hz','agitador-economico-grande-220-v-60-hz','Admite las siguientes normas: ASTM D4914.','<p>Humboldt, grande, tamiz Tamiz econ&oacute;mico Agitador econ&oacute;mico grande, 220 V 60 Hz<br />Admite las siguientes normas: ASTM D4914<br />El agitador de tamices econ&oacute;mico grande de Humboldt se puede utilizar con tamices de 8 pulg , 10 pulg y 12 pulg. Puede manipular hasta once tamices de 8 pulg, siete tamices de 10 pulg , siete tamices de 12pulg,de altura completa, diecinueve tamices de 8 pulg de media altura o trece tamices de 12 pulg de media altura. Este agitador utiliza un motor de 1/4 hp con un temporizador de 30 minutos. La unidad debe atornillarse al banco para que funcione correctamente. Dimensiones 21 pulg de ancho x 18pulg de profundidad x 47 pulg de alto (533 x 4570 x 1194 mm).</p>',1,'1',NULL,1.00,1,'1','2','2','','60ccfc28121ae.png','H-4330.2F','2021-06-17 18:26:07','2021-06-18 21:05:02');
INSERT INTO `xtbm_productos` VALUES (40,'PRC16-050000262','Placa Swell de aumento de Volumen','placa-swell-de-aumento-de-volumen','Admite los siguientes estándares: ASTM D1883','<p>Admite los siguientes est&aacute;ndares: ASTM D1883<br />Base perforada de 5 -7 / 8 pulg (149 mm) de di&aacute;metro con v&aacute;stago ajustable. El extremo de contacto del v&aacute;stago se bloquea f&aacute;cilmente en su lugar con una tuerca moleteada.</p>',1,'1',NULL,1.00,1,'1','2','2','','60ccfb509c0be.png','H-4172','2021-06-17 18:49:35','2021-06-18 21:00:16');
/*!40000 ALTER TABLE `xtbm_productos` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_satisfechos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_satisfechos` (
  `ids` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `comentarios` varchar(170) DEFAULT NULL,
  `sexo` enum('1','2') DEFAULT NULL,
  `mostrar` enum('1','2') DEFAULT NULL,
  `registrado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_satisfechos` WRITE;
/*!40000 ALTER TABLE `xtbm_satisfechos` DISABLE KEYS */;
INSERT INTO `xtbm_satisfechos` VALUES (1,'Nombre apellido de prueba 1','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s. dummy text.','1','1','2019-12-14 14:51:05','2019-12-14 16:04:11');
INSERT INTO `xtbm_satisfechos` VALUES (2,'Nombre apellido de prueba 2','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.','2','1','2019-12-14 16:04:02','2019-12-14 16:55:05');
INSERT INTO `xtbm_satisfechos` VALUES (3,'Nombre apellido de prueba 3','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.','1','1','2019-12-14 16:04:43','2019-12-14 16:04:43');
/*!40000 ALTER TABLE `xtbm_satisfechos` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_slider` (
  `ids` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `imagen` varchar(80) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `mostrar` enum('Y','N') DEFAULT NULL,
  `registrado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_slider` WRITE;
/*!40000 ALTER TABLE `xtbm_slider` DISABLE KEYS */;
/*!40000 ALTER TABLE `xtbm_slider` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_subcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_subcategoria` (
  `ids` int NOT NULL AUTO_INCREMENT,
  `categoria` int NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `variable` varchar(90) DEFAULT NULL,
  `mostrar` enum('1','2') DEFAULT NULL,
  `registrado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`ids`,`categoria`),
  KEY `fk_xtbm_sbcat_xtbm_cat` (`categoria`) USING BTREE,
  CONSTRAINT `fk_xtbm_subcategoria_xtbm_categoria` FOREIGN KEY (`categoria`) REFERENCES `xtbm_categoria` (`idc`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_subcategoria` WRITE;
/*!40000 ALTER TABLE `xtbm_subcategoria` DISABLE KEYS */;
INSERT INTO `xtbm_subcategoria` VALUES (1,1,'Subcategoría de prueba 1.1','subcategoria-de-prueba-1-1','1','2020-01-19 22:06:26','2020-01-19 22:06:26');
INSERT INTO `xtbm_subcategoria` VALUES (2,1,'Subcategoría de prueba 1.2','subcategoria-de-prueba-1-2','1','2020-01-19 22:30:29','2020-01-19 22:30:29');
INSERT INTO `xtbm_subcategoria` VALUES (3,2,'Subcategoría de prueba 2.1','subcategoria-de-prueba-2-1','1','2020-01-19 22:34:07','2020-01-19 22:34:07');
INSERT INTO `xtbm_subcategoria` VALUES (4,2,'Subcategoría de prueba 2.2','subcategoria-de-prueba-2-2','1','2020-01-19 22:36:47','2020-01-19 22:36:47');
INSERT INTO `xtbm_subcategoria` VALUES (5,3,'Subcategoría de prueba 3.1','subcategoria-de-prueba-3-1','1','2020-01-19 22:37:38','2020-01-19 22:37:38');
INSERT INTO `xtbm_subcategoria` VALUES (6,3,'Subcategoría de prueba 3.2','subcategoria-de-prueba-3-2','1','2020-01-19 22:37:46','2020-01-19 22:37:46');
INSERT INTO `xtbm_subcategoria` VALUES (7,4,'Subcategoría de prueba 4.1','subcategoria-de-prueba-4-1','1','2020-01-19 22:39:07','2020-01-19 22:39:07');
INSERT INTO `xtbm_subcategoria` VALUES (8,4,'Subcategoría de prueba 4.2','subcategoria-de-prueba-4-2','1','2020-01-19 22:39:25','2020-01-19 22:39:25');
/*!40000 ALTER TABLE `xtbm_subcategoria` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_user_trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_user_trabajadores` (
  `idv` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `apellidos` varchar(80) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `mostrar` enum('1','2') DEFAULT NULL,
  `registrado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`idv`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_user_trabajadores` WRITE;
/*!40000 ALTER TABLE `xtbm_user_trabajadores` DISABLE KEYS */;
INSERT INTO `xtbm_user_trabajadores` VALUES (1,'Abel Hugo','Pilares Mariscal','EVAPM','1','2020-04-28 03:53:54','2020-04-28 16:47:45');
INSERT INTO `xtbm_user_trabajadores` VALUES (2,'Marialejandra Katherine','Delgado Olivera','EVMDO','1','2020-04-28 16:31:23','2020-04-28 16:46:54');
INSERT INTO `xtbm_user_trabajadores` VALUES (3,'Edgard','Santacruz Atau','EVESA','1','2020-04-28 18:19:59','2020-04-28 18:19:59');
INSERT INTO `xtbm_user_trabajadores` VALUES (4,'Fray Jelsin','Quispe Serrano','EVFQS','1','2020-05-02 03:15:46','2020-05-02 03:15:46');
INSERT INTO `xtbm_user_trabajadores` VALUES (5,'Andrea','Duran Bartra','GVPSS','1','2020-07-29 20:52:53','2020-07-29 20:52:53');
/*!40000 ALTER TABLE `xtbm_user_trabajadores` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `xtbm_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `xtbm_usuarios` (
  `idu` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `apellido` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `login` varchar(40) DEFAULT NULL,
  `clave` varchar(60) DEFAULT NULL,
  `permisos` int DEFAULT NULL,
  `activado` enum('Y','N') NOT NULL,
  `registrado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COMMENT='Tabla de usuarios externos registrados en el sistema';
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `xtbm_usuarios` WRITE;
/*!40000 ALTER TABLE `xtbm_usuarios` DISABLE KEYS */;
INSERT INTO `xtbm_usuarios` VALUES (1,'Manuel Jesús','Vicuña Fuertes','manolo1978@gmail.com','5df8c934ea6af.jpg','manuel1978','bc3039718af08172ae92a2d863c9bf20a2332561',1,'Y','2019-11-25 00:00:00','2020-01-18 19:22:10');
INSERT INTO `xtbm_usuarios` VALUES (2,'Angélica','Pilares','angelica.p.cubillas@gmail.com','','lima2019','44962d53cd2156d14872d6f1c6e74e0bc76b6830',1,'Y','2019-12-23 14:57:52','2020-02-04 02:50:08');
INSERT INTO `xtbm_usuarios` VALUES (3,'Abel','Pilares','abelpilares@cpss.com.pe','5df8c934ea6af.jpg','abel2018','d547ec374d8a0cfa00ba003e36f4c7c7201f5d7b',1,'Y','2019-11-25 00:00:00','2020-01-18 19:22:10');
/*!40000 ALTER TABLE `xtbm_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

