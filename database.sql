-- Progettazione Web 
DROP DATABASE if exists 564650_ambrogi; 
CREATE DATABASE 564650_ambrogi; 
USE 564650_ambrogi; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: 564650_ambrogi
-- ------------------------------------------------------
-- Server version	5.6.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auto`
--

DROP TABLE IF EXISTS `auto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auto` (
  `codAuto` int(11) NOT NULL AUTO_INCREMENT,
  `codConcessionaria` int(11) NOT NULL,
  `codModello` int(11) NOT NULL,
  `prezzo` int(11) DEFAULT NULL,
  `isNew` tinyint(4) DEFAULT '0',
  `veicoloCommerciale` tinyint(4) DEFAULT '0',
  `elettrico` tinyint(4) DEFAULT '0',
  `paeseOrigine` varchar(128) DEFAULT NULL,
  `anno` double DEFAULT NULL,
  `totKm` int(11) DEFAULT NULL,
  `targa` varchar(128) DEFAULT NULL,
  `ultimaManutenzione` date DEFAULT NULL,
  `numProprietariPrecedenti` int(11) DEFAULT NULL,
  PRIMARY KEY (`codAuto`),
  KEY `codConcessionaria` (`codConcessionaria`),
  KEY `codModello` (`codModello`),
  CONSTRAINT `auto_ibfk_2` FOREIGN KEY (`codConcessionaria`) REFERENCES `concessionaria` (`codConcessionaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `auto_ibfk_3` FOREIGN KEY (`codModello`) REFERENCES `modello` (`codModello`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auto`
--

LOCK TABLES `auto` WRITE;
/*!40000 ALTER TABLE `auto` DISABLE KEYS */;
INSERT INTO `auto` VALUES (1,1,1,9620,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL),(2,2,2,5240,0,0,0,'Italia',2020,5632,'ED349AO','2021-05-28',1),(3,1,3,5352,0,0,0,'Italia',2020,15632,'FD349AX','2020-12-12',2),(4,2,4,18630,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL),(5,3,5,25900,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL),(6,4,6,17900,1,1,0,NULL,NULL,NULL,NULL,NULL,NULL),(7,4,7,23785,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL),(8,3,8,60785,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL),(9,1,9,18350,0,1,1,'Italia',2019,20632,'FR834PQ','2020-11-16',1),(10,4,4,6620,0,0,0,'Italia',2018,120632,'EK834GQ','2021-06-16',3),(11,2,1,4620,0,0,0,'Italia',2017,123632,'DK834GQ','2021-03-16',2),(12,2,10,30785,1,0,1,NULL,NULL,NULL,NULL,NULL,NULL),(13,1,11,14620,0,0,1,'Italia',2020,25672,'FK792KR','2021-04-17',1),(14,4,12,13982,0,0,1,'Italia',2021,7689,'FJ003PR','2021-05-13',1),(15,3,11,27400,1,0,1,NULL,NULL,NULL,NULL,NULL,NULL),(16,4,13,41440,1,0,1,NULL,NULL,NULL,NULL,NULL,NULL),(17,3,14,11990,0,1,0,'Italia',2020,127689,'EF893PR','2021-06-22',1),(18,1,15,17400,0,1,0,'Italia',2019,86689,'EF358TR','2021-04-02',2),(19,2,16,20750,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL),(20,3,17,20300,0,0,1,'Italia',2021,5347,'FF389UR','2021-06-01',1),(22,1,19,22882,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL),(23,2,20,20562,0,1,1,'Italia',2020,10500,'GA875TF','2021-09-01',1),(24,3,21,17151,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL),(25,4,22,20300,0,0,0,'Italia',2020,7834,'GA456LF','2021-09-11',1),(26,1,23,38350,1,0,1,NULL,NULL,NULL,NULL,NULL,NULL),(27,1,24,32500,0,0,1,'Italia',2020,7845,'GF528AM','2021-09-08',1);
/*!40000 ALTER TABLE `auto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concessionaria`
--

DROP TABLE IF EXISTS `concessionaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concessionaria` (
  `codConcessionaria` int(11) NOT NULL AUTO_INCREMENT,
  `nomeConcessionaria` varchar(128) DEFAULT NULL,
  `usernameConcessionaria` varchar(45) DEFAULT NULL,
  `passwordConcessionaria` varchar(255) DEFAULT NULL,
  `posterUrlConcessionaria` varchar(500) DEFAULT NULL,
  `numeroTelefono` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `via` varchar(128) DEFAULT NULL,
  `numeroCivico` int(11) DEFAULT NULL,
  `cap` double DEFAULT NULL,
  `citta` varchar(128) DEFAULT NULL,
  `provincia` varchar(128) DEFAULT NULL,
  `descrizione` text,
  `lunedi` varchar(128) DEFAULT NULL,
  `martedi` varchar(128) DEFAULT NULL,
  `mercoledi` varchar(128) DEFAULT NULL,
  `giovedi` varchar(128) DEFAULT NULL,
  `venerdi` varchar(128) DEFAULT NULL,
  `sabato` varchar(128) DEFAULT NULL,
  `domenica` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`codConcessionaria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concessionaria`
--

LOCK TABLES `concessionaria` WRITE;
/*!40000 ALTER TABLE `concessionaria` DISABLE KEYS */;
INSERT INTO `concessionaria` VALUES (1,'DP TOP CAR','topcar','$2y$10$SePpOuvoFCt9mFpgslRDo.cVeqSveD1xR8qhinEkxa3b3ut.OaN0K','./../img/concessionaria/topcar.jpeg','393456789123','dptopcar@pweb.com','Via di Contrada San Pietro',1,49,'Velletri','RM','Possibilita di finanziamento agevolato anche senza anticipo e dilazione fino ad 84 mesi! si esamina ritiro usato preferibilmente con trattativa telefonica o in sede! proponiamo su tutte le nostre vetture esclusivi pacchetti assicurativi incluso antifurto satellitare-collisione kasko eventi speciali incendio e furto valore al nuovo fino a 36 mesi! Per ulteriori proposte consultate il nostro sito www.dptopcar.it presenti anche su facebook e instagram e possibile concludere la trattativa tramite telefono o mail e ritirare la vettura recandosi una sola volta in concessionaria previo accordo....','09:00 - 13:00 / 16:00 - 19:30','09:00 - 13:00 / 16:00 - 19:30','09:00 - 13:00 / 16:00 - 19:30','09:00 - 13:00 / 16:00 - 19:30','09:00 - 13:00 / 16:00 - 19:30','09:30 - 12:30','Chiuso'),(2,'Miledi Auto Srl','miledi','$2y$10$qCE262K7w1Mas2wIQANZV.QQrEXmfulZDLpXQOwnLolVR/oRS2q2W','./../img/concessionaria/milediautosrl.jpg','393245619873','milediautosrl@pweb.com','Viale Petrarca',58,50124,'Firenze','FI','Usato garantito, chilometri certificati, garanzia 12 mesi (con possibilita di estensione a 24/36 mesi), finanziamenti personalizzati e valutazione della vostra auto (permuta). per avere maggiori informazioni potete contattarci tramite telefono o visitare il nostro sito www.milediauto.it. potete anche venire direttamente nella nostra concessionaria che si trova in via del casone 3/r. all interno presenta, inoltre, vari servizi: officina, cambio gomme, revisione, igienizzazione interni, pulizia interna ed esterna della macchina. visita la nostra pagina su facebook ed instagram per rimanere aggiornato delle macchine in arrivo ed eventuali promozioni che facciamo ai nostri clienti, miledi_auto.','09:00 - 13:00 / 14:00 - 18:30','09:00 - 13:00 / 14:00 - 18:30','09:00 - 13:00 / 14:00 - 18:30','09:00 - 13:00 / 14:00 - 18:30','09:00 - 13:00 / 14:00 - 18:30','09:30 - 12:30','Chiuso'),(3,'Auto e Auto Varese','aavarese','$2y$10$V.e6HM2jh/QBnjYmTdF..uuqFwCNALNFW/ZjYe3wfgYuE0sW.5Xx.','./../img/concessionaria/autoeautovarese.jpg','396475123846','autoeautovarese@pweb.com','Via Rene Vanetti',67,21100,'Varese','VA','- Possibilita di richiedere numero di telaio prima della prenotazione- Extra sconto in caso di adesione a nostra formula di finanziamento con servizi finanziati nella rata- Spese immatricolazione e trasporto escluse- Possibilita di finanziare tutta la cifra- Valutiamo usato in permuta come anticipo- Tempistiche di consegna c.ca 30/40 gg. dalla prenotazione- Siamo raggiungibili da Malpensa in c.ca 30 min. oppure dalla Stazione di Varese in 5 min.- La dotazione tecnica e gli optional potrebbero in alcuni casi differire dall effettivo equipaggiamento della vettura. Auto & Auto Varese S.r.l declina ogni responsabilita per eventuali involontarie incongruenze, che non rappresentano un impegno contrattuale.','09:00 - 12:30 / 14:30 - 19:00','09:00 - 12:30 / 14:30 - 19:00','09:00 - 12:30 / 14:30 - 19:00','09:00 - 12:30 / 14:30 - 19:00','09:00 - 12:30 / 14:30 - 19:00','09:00 - 12:30 / 14:30 - 19:00','Chiuso'),(4,'De Stefani spa','stefani','$2y$10$lUiOhKbYODxOy5hwv1glCO4mwg8jANrS4s1OEw1VO5hciuIeEUJ0C','./../img/concessionaria/destefani.png','395492581350','destefani@pweb.com','Via Dismano',2,48124,'Ravenna','RA','De Stefani, da oltre 100 anni, sinonimo di esperienza, qualita e garanzia. Cinque sedi in Emilia-Romagna, personale altamente qualificato e le migliori tecnologie di diagnosi ed intervento, rendono.','09:00 - 12:30 / 15:00 - 19:00','09:00 - 12:30 / 15:00 - 19:00','09:00 - 12:30 / 15:00 - 19:00','09:00 - 12:30 / 15:00 - 19:00','09:00 - 12:30 / 15:00 - 19:00','09:00 - 12:30 / 15:00 - 18:00','Chiuso');
/*!40000 ALTER TABLE `concessionaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modello`
--

DROP TABLE IF EXISTS `modello`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modello` (
  `codModello` int(11) NOT NULL AUTO_INCREMENT,
  `casaProduttrice` varchar(128) NOT NULL,
  `nomeModello` varchar(128) DEFAULT NULL,
  `posterUrl` varchar(500) DEFAULT NULL,
  `cilindrata` double DEFAULT NULL,
  `cavalli` int(11) DEFAULT NULL,
  `cambio` varchar(128) DEFAULT NULL,
  `marce` int(11) DEFAULT NULL,
  `numeroCilindri` int(11) DEFAULT NULL,
  `numPosti` int(11) DEFAULT NULL,
  `numPorte` int(11) DEFAULT NULL,
  `lunghezza` double DEFAULT NULL,
  `larghezza` double DEFAULT NULL,
  `altezza` double DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `dimensioneBagagliaio` double DEFAULT NULL,
  `tipoCarburante` varchar(128) DEFAULT NULL,
  `capacitaSerbatoio` double DEFAULT NULL,
  `velocitaMassima` double DEFAULT NULL,
  `consumoUrbano` decimal(3,1) DEFAULT NULL,
  `consumoExtraurbano` decimal(3,1) DEFAULT NULL,
  `consumoMisto` decimal(3,1) DEFAULT NULL,
  `classeEmissione` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`codModello`),
  KEY `casaProduttrice` (`casaProduttrice`),
  CONSTRAINT `` FOREIGN KEY (`casaProduttrice`) REFERENCES `produttore` (`casaProduttrice`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modello`
--

LOCK TABLES `modello` WRITE;
/*!40000 ALTER TABLE `modello` DISABLE KEYS */;
INSERT INTO `modello` VALUES (1,'Fiat','Panda','./../img/auto/panda.jpg',1242,69,'manuale',5,4,5,5,3705,1662,1635,1075,225,'Benzina',37,155,7.3,5.2,6.0,'Euro 6'),(2,'Ford','Fiesta','./../img/auto/fiesta.jpg',999,95,'manuale',6,3,5,5,4040,1735,1476,1089,292,'Benzina',42,180,5.4,4.0,4.5,'Euro 6'),(3,'Volkswagen','Polo','./../img/auto/polo.jpg',999,90,'manuale',6,3,5,5,4074,1751,1435,1230,225,'Benzina',37,183,4.1,2.8,3.3,'Euro 6'),(4,'Renault','Clio','./../img/auto/clio.jpg',999,65,'manuale',5,3,5,5,4050,1798,1440,1042,391,'Benzina',42,160,6.1,4.1,4.9,'Euro 6'),(5,'Mercedes','Classe A','./../img/auto/classea.jpg',1332,109,'manuale',6,4,5,5,4419,1796,1440,1275,391,'Benzina',43,200,7.7,4.6,5.8,'Euro 6'),(6,'Citroen','Jumper','./../img/auto/jumper.jpg',2198,130,'manuale',6,4,3,5,5413,2050,2524,1860,11500,'Diesel',90,140,9.2,6.3,7.4,'Euro 6'),(7,'Ford','Focus','./../img/auto/focus.jpg',999,123,'manuale',6,3,5,5,4539,1882,1468,1331,347,'Benzina',47,160,7.8,5.6,6.7,'Euro 6'),(8,'Renault','Master','./../img/auto/master.jpg',2298,150,'automatico',6,4,3,4,5075,2070,2310,1877,8000,'Diesel/Elettrico',105,155,7.7,6.8,6.3,'Euro 6'),(9,'Mercedes','Sprinter','./../img/auto/sprinter.jpg',2298,150,'automatico',6,4,3,4,6088,2020,2687,1952,11000,'Diesel/Elettrico',105,120,7.7,6.8,6.3,'Euro 6'),(10,'Audi','A3','./../img/auto/audia3.jpg',999,110,'automatico',7,3,5,5,4343,1816,1449,1280,380,'Benzina/Elettrico',45,204,5.1,4.3,3.9,'Euro 6'),(11,'Citroen','C5 Aircross','./../img/auto/citroenc5.jpg',1598,181,'automatico',8,4,5,5,4500,1969,1689,1750,460,'Benzina/Elettrico',43,180,5.1,4.3,3.9,'Euro 6'),(12,'Ford','Kuga','./../img/auto/fordkuga.jpg',2488,225,'automatico',7,4,5,5,4614,1883,1675,1750,411,'Benzina/Elettrico',42,200,3.1,2.3,2.9,'Euro 6'),(13,'Mercedes','Classe B','./../img/auto/classeb.jpg',1332,160,'automatico',8,4,5,5,4419,1796,1562,1650,405,'Benzina/Elettrico',35,235,3.1,2.3,2.9,'Euro 6'),(14,'Renault','Kangoo','./../img/auto/kangoo.jpg',1461,95,'manuale',6,4,2,4,4419,1919,1864,1650,3300,'Diesel',54,164,7.1,4.3,5.5,'Euro 6'),(15,'Volkswagen','Caddy','./../img/auto/caddy.jpg',1968,122,'manuale',6,4,2,4,4500,1855,2100,1473,3100,'Diesel',50,185,5.9,3.7,4.5,'Euro 6'),(16,'Fiat','500X','./../img/auto/500x.jpg',1332,150,'manuale',6,4,5,5,4264,1769,1603,1320,350,'Benzina',48,200,7.4,5.4,6.1,'Euro 6'),(17,'Renault','Captur','./../img/auto/captur.jpg',1598,160,'automatico',6,4,5,5,4227,1797,1576,1564,265,'Benzina/Elettrico',39,200,1.6,6.7,4.8,'Euro 6'),(19,'Volkswagen','Golf','./../img/auto/volkswagen_golf_mk8_front_tracking.jpg',999,110,'Automatico',7,3,5,5,4284,1789,1491,1227,381,'Benzina',45,202,5.2,3.8,4.5,'Euro 6'),(20,'Mercedes','Vito','./../img/auto/mercedes_vito_1.jpg',1400,116,'Automatico',7,4,3,4,5140,1928,1945,3200,6000,'Diesel/Elettrico',110,120,4.2,2.1,3.4,'Euro 6'),(21,'Fiat','Tipo','./../img/auto/Fiat_Tipo_005.jpg',1248,95,'Manuale',5,4,5,5,4532,1792,1497,1260,520,'Diesel',45,122,5.3,4.0,4.6,'Euro 6'),(22,'Ford','Ranger','./../img/auto/Ford_Ranger_Raptor_025.jpg',1997,170,'Manuale',6,4,4,5,5282,2163,1815,2180,3000,'Diesel',80,180,9.4,3.6,6.9,'Euro 6'),(23,'Volkswagen','Golf GTE','./../img/auto/28356-thenewgolfgte.jpg',1395,245,'Automatico',6,4,5,5,4287,1789,1484,1549,273,'Benzina/Elettrico',40,225,3.5,1.1,1.5,'Euro 6'),(24,'Audi','A6','./../img/auto/audiuk00023313_audi_s6_saloon.jpg',1984,299,'Automatico',7,4,5,5,4939,2110,1467,2075,405,'Benzina/Elettrico',52,250,1.5,2.3,1.6,'Euro 6');
/*!40000 ALTER TABLE `modello` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preferiti`
--

DROP TABLE IF EXISTS `preferiti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preferiti` (
  `idPreferiti` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `autoId` int(11) NOT NULL,
  PRIMARY KEY (`idPreferiti`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preferiti`
--

LOCK TABLES `preferiti` WRITE;
/*!40000 ALTER TABLE `preferiti` DISABLE KEYS */;
INSERT INTO `preferiti` VALUES (40,1,1),(43,1,3);
/*!40000 ALTER TABLE `preferiti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produttore`
--

DROP TABLE IF EXISTS `produttore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produttore` (
  `casaProduttrice` varchar(128) NOT NULL,
  `posterUrlLogo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`casaProduttrice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produttore`
--

LOCK TABLES `produttore` WRITE;
/*!40000 ALTER TABLE `produttore` DISABLE KEYS */;
INSERT INTO `produttore` VALUES ('Audi','./../img/logo/audi.png'),('Citroen','./../img/logo/citroen.png'),('Dacia','./../img/logo/dacia.png'),('Fiat','./../img/logo/fiat.png'),('Ford','./../img/logo/ford.png'),('Mercedes','./../img/logo/mercedes.png'),('Renault','./../img/logo/renault.png'),('Volkswagen','./../img/logo/volkswagen.png');
/*!40000 ALTER TABLE `produttore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utenti`
--

DROP TABLE IF EXISTS `utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utenti` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cognome` varchar(45) DEFAULT NULL,
  `indirizzo` varchar(45) DEFAULT NULL,
  `telefono` varchar(128) DEFAULT NULL,
  `immagineUtente` varchar(500) DEFAULT NULL,
  `sesso` varchar(45) DEFAULT NULL,
  `dataNascita` date DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utenti`
--

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` VALUES (1,'pippo','$2y$10$4oGZge6quDgEXdXpBRAQO.p9iR5NR.rN4sJq18ZWohndF//8rTYOS','pippo@pweb.com','Pippo','Pippo','via pippo 34','3562845762','./../img/utenti/pippo.jpeg','Uomo','2021-07-17'),(4,'ciao','$2y$10$oUgEb7.aKb78koxoezMbcuO2IXgSPWQxxMaSosoGjwb3LhaDaTqj.','ciao@pweb.com','ciao','ciao','ciao','2333',NULL,'Uomo',NULL),(5,'gino','$2y$10$6Vi.QTLC.jSNfOc/j4vxt.5a5d2CXZJ46pue0h6OBYAAxWa.DZ9QS','gino@pippo.com','a','a','a','3',NULL,NULL,NULL);
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-16  9:46:18
