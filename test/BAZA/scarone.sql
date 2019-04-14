-- MySQL dump 10.15  Distrib 10.0.19-MariaDB, for Win32 (AMD64)
--
-- Host: sql.scarone.nazwa.pl    Database: scarone_logowanie
-- ------------------------------------------------------
-- Server version	10.1.30-MariaDB

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
-- Table structure for table `klient`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `klient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) NOT NULL,
  `nazwas` varchar(255) NOT NULL,
  `kod` varchar(255) NOT NULL,
  `miasto` varchar(50) NOT NULL,
  `ulica` varchar(255) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numertel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`id`, `nazwa`, `nazwas`, `kod`, `miasto`, `ulica`, `nip`, `email`, `numertel`) VALUES (108,'Koło','Wojciech Mizgalski','41-700','','ASTRÓW, 2/6','234234','mizgalski.wojciech@gmail.com','+48 0793028180'),(109,'Mensa','Mensa','','','','','',''),(110,'Sztolnia','Sztolnia Wino Mięso ','','','','','',''),(111,'Motycze Ballada','Ballada','','','','','',''),(112,'Hotel Szafran','Hotel Szafran','Węgierki ','','','','',''),(113,'Złoty Słoń','Złoty Słoń','Kielce','','','','',''),(114,'Otwarte drzwi','Otwarte drzwi','','','','','',''),(116,'Motycze Centrala','Motycze Centrala','','','','','',''),(117,'Netpos','Netpos','','','','','',''),(118,' hotel Harenda','Hotel Harenda','','','','','',''),(119,'Restauracja Dębowa Góra','Restauracja Dębowa Góra','','','','','',''),(120,'ZOO Borysew','ZOO Borysew','','','','','',''),(121,'Motycze Tarnobrzeg','Motycze Tarnobrzeg','','','','','',''),(122,'Netpos SP z o.o.','Netpos','Łódź','','Mikołaja Kopernika 36A','7282800470','netpos@com.pl','535015253'),(123,'CHICHI4U SP. Z O. O. ','CHICHI4U SP. Z O. O. ','61-568','Poznań','Wierzbięcice 22','7831743440','',''),(124,'Dwór w Tomaszowicach','Dwór w Tomaszowicach','32-085 ','Tomaszowice','ul.Krakowska 68','','',''),(125,'Inferno warszawa','Inferno warszawa','','','','','',''),(126,'Widzew Bar','Widzew Bar','','','','','',''),(127,'Heksagon ','Heksagon ','','','','','',''),(128,'La-Fontana Katowice','La-Fontana Katowice','','','','','',''),(129,'Hana sushi','Hana sushi','','','','','',''),(130,'GOM','GOM','','','','','','');

--
-- Table structure for table `koszty`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `koszty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `fl_rodzaj` int(11) NOT NULL,
  `kwota` float NOT NULL,
  `rodzaj_koszt` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `koszty`
--

INSERT INTO `koszty` (`id`, `data`, `fl_rodzaj`, `kwota`, `rodzaj_koszt`) VALUES (34,'2019-03-15',1,22,'4');
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`scarone_logowanie`@`%`*/ /*!50003 trigger zlicz_saldo
  after insert on koszty
    for each row


BEGIN
    # definiowanie zmiennych
        set @id = new.id;
        set @kwota = new.kwota;
        set @fl_rodzaj = new.fl_rodzaj;
        set @jakieid = (select count(*) from koszty);
   
        
        if @fl_rodzaj=1 then       
       
       
		    if ifnull((select count(*) from koszty),1) =1 then
        			INSERT INTO saldo (
                        kwota,fl_rodzaj,id,zlicz_saldo,jakie_idd) VALUES (
                         @kwota,@fl_rodzaj,@id,@kwota,@jakieid);
 
            else
		       
               set @zliczsaldo = ((select zlicz_saldo from saldo where id=@jakieid-1 )+@kwota);
                INSERT INTO saldo (
                        kwota,fl_rodzaj,id,zlicz_saldo,jakie_idd) VALUES (
                         @kwota,@fl_rodzaj,@id,@zliczsaldo,@jakieid);
            end if;
 
        else
		
		    if ifnull((select count(*) from koszty),1) =1 then
        			INSERT INTO saldo (
                        kwota,fl_rodzaj,id,zlicz_saldo,jakie_idd) VALUES (
                         @kwota,@fl_rodzaj,@id,@kwota,@jakieid);
 
            else
		       
               set @zliczsaldo = ((select zlicz_saldo from saldo where id=@jakieid-1 )-@kwota);
                INSERT INTO saldo (
                        kwota,fl_rodzaj,id,zlicz_saldo,jakie_idd) VALUES (
                         @kwota,@fl_rodzaj,@id,@zliczsaldo,@jakieid);
            end if;
		
		
		
		
		
		end if;
		
     
    END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `rights`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rodzaj` varchar(50) NOT NULL,
  `fl` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`id`, `rodzaj`, `fl`) VALUES (1,'user','3'),(2,'admin','2'),(3,'guest','1');

--
-- Table structure for table `saldo`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `saldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kwota` float NOT NULL DEFAULT '0',
  `fl_rodzaj` bit(1) NOT NULL DEFAULT b'0',
  `zlicz_saldo` double NOT NULL DEFAULT '0',
  `jakie_idd` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `upg_date` date NOT NULL,
  `fl_active` bigint(20) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id`, `kwota`, `fl_rodzaj`, `zlicz_saldo`, `jakie_idd`, `add_date`, `upg_date`, `fl_active`) VALUES (34,22,0x01,22,1,'0000-00-00','0000-00-00',2);

--
-- Table structure for table `slowniki`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `slowniki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(50) DEFAULT '0',
  `opcja` varchar(50) DEFAULT '0',
  `opis` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slowniki`
--

INSERT INTO `slowniki` (`id`, `nazwa`, `opcja`, `opis`) VALUES (4,'Tankowanie','6','Tankowanie paliwa'),(5,'Myjnia','6','Mycie samochodu'),(6,'Wypłata','8','Miesięczna wypłata '),(7,'Zakupy Wdrożenie','7','Zakupy na potrzeby Wdrożenia');

--
-- Table structure for table `slownikiopcje`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `slownikiopcje` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slownikiopcje`
--

INSERT INTO `slownikiopcje` (`id`, `nazwa`) VALUES (6,'Auto'),(7,'Zakupy'),(8,'Wypłata'),(9,'Koszty');

--
-- Table structure for table `trasa`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `trasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ilosckm` int(11) NOT NULL DEFAULT '0',
  `start` varchar(50) NOT NULL DEFAULT '0',
  `meta` varchar(50) NOT NULL DEFAULT '0',
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trasa`
--

INSERT INTO `trasa` (`id`, `ilosckm`, `start`, `meta`, `data`) VALUES (1,200,'katowice','kraków','2019-02-24'),(2,100,'katowice','kraków','2019-02-24'),(3,23,'afdadsf','afas','2019-03-04'),(4,23,'afdadsf','afas','2019-03-04');

--
-- Table structure for table `userrights`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `userrights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `fl_rights` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userrights`
--

INSERT INTO `userrights` (`id`, `user`, `fl_rights`) VALUES (1,'$user','1'),(2,'qaz','1'),(3,'asd','1'),(4,'qwerty','1');

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES (1,'xxx','scarone10@gmail.com','f561aaf6ef0bf14d4208bb46a4ccb3ad');

--
-- Table structure for table `zgloszenie`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `zgloszenie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `czasod` time NOT NULL,
  `czasdo` time NOT NULL,
  `klient` varchar(255) NOT NULL,
  `zrodlo` varchar(255) NOT NULL,
  `dowyk` varchar(255) NOT NULL,
  `wyk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zgloszenie`
--

INSERT INTO `zgloszenie` (`id`, `data`, `czasod`, `czasdo`, `klient`, `zrodlo`, `dowyk`, `wyk`) VALUES (1,'2019-01-06','17:50:00','18:09:00','Bar Jarocin','','Raporty z fiskala i posa alko','wysłano pdf z instrukcją i screnami z pos i instrukcji '),(2,'2019-01-04','16:00:00','19:00:00','Beskid sport arena','','przegląd 5 drukarek fiskalnych','przegląd wykonany, klient zapłacił gotówką '),(11,'2019-01-07','16:00:00','16:53:00','Pierrot s.c.Mariola i Wojciech Senkowscy','','hotel reinstalacja na życzenie klienta wymiana komputera','hotel reinstalacja na życzenie klienta wymiana komputera'),(12,'2019-01-07','16:00:00','16:53:00','Pierrot s.c.Mariola i Wojciech Senkowscy','','hotel reinstalacja na życzenie klienta wymiana komputera','hotel reinstalacja na życzenie klienta wymiana komputera // czas do zafakturowania 1h '),(13,'2019-01-07','17:02:00','17:20:00','Magnum Bonum ','','Nie działa hotel','Poprawiono połączenie do bazy '),(14,'2019-01-07','17:00:00','17:10:00','Mensa','','prosimy o dosłanie paragonów za miesiące: listopad i grudzień na Bistro  POS 4 i Bistro 2 POS6 oraz za dzień 06.12.2018r. na Alutec 2 POS 3.','wysłano z 4 i 6'),(15,'2019-01-07','19:00:00','22:30:00','Sztolnia','','szkolenie pos konfiguracja','wykonano'),(16,'2019-01-08','17:30:00','17:48:00','ZDG','','brak wysyłania na ftp ','Zawieszony ftp / wisi cała maszyna wirtualna '),(17,'2019-01-08','17:30:00','18:12:00','Mensa','','Wysyłka dokumentów z posów do centrali','Wysyłka dokumentów z posów do centrali'),(18,'2019-01-09','12:21:00','12:12:00','Mensa','','Reset','Inne'),(31,'2019-01-09','20:00:00','21:00:00','Kasztel uniejów','','Problem z chanel menager','Rozmwa z kayetan ustawienia'),(33,'2019-01-09','23:30:00','23:50:00','lokomotycze','','pełen dysk','czyszczenie dysku z danych '),(35,'2019-01-10','16:30:00','19:30:00','Sztolnia','','szkolenie pos konfiguracja',' Bckofice'),(36,'2019-01-10','20:00:00','20:30:00','Lantier','','wykonanie raportu z drukarki fiskalnej ','wykonanie raportu z drukarki fiskalnej '),(39,'2019-01-11','17:20:00','18:04:00','dobry dom nowa szazyna ','','ustawienie stopki na fv usunięcie dokumentów prucz fv','ustawienie stopki na fv usunięcie dokumentów prucz fvv'),(40,'2019-01-11','18:00:00','18:30:00','Malaga ','','weryfikacja błędu systemu błąd występuje nie można wykonać dokumentu pz','logi baza opis do fudsoft '),(41,'2019-01-11','18:10:00','18:25:00','Hotel mazurek','','przekazywanie rachunków pos','przekazywanie rachunków pos'),(151,'2019-01-13','12:12:00','12:12:00','Pierrot s.c.Mariola i Wojciech Senkowscy','','test','Inne'),(152,'2019-01-13','12:12:00','12:12:00','Pierrot s.c.Mariola i Wojciech Senkowscy','','test','Inne'),(159,'2019-01-16','20:53:00','21:53:00','Motycze','','Ustawienie zamówień specjalnych według życzenia klienta','Wykonano'),(160,'2019-01-16','21:48:00','22:07:00','Mensa','','Ustawienie czasu na drukarce fiskalnej',''),(162,'2019-01-18','18:00:00','00:51:00','Koło ','','Serwer',''),(163,'2019-01-22','18:06:00','18:20:00','Magnum Bonum ','','połączenie komputera do bazy ','połączenie komputera do bazy '),(164,'2019-01-22','18:06:00','18:37:00','Malaga ','','połączenie komputera do bazy ','połączenie komputera do bazy '),(165,'2019-01-22','18:34:00','19:00:00','Gom','','wydruk rachunku ','Wydruk rachunku wstępnego  '),(166,'2019-01-23','18:20:00','18:40:00','rydzyk','','podłączenie fiskala','podłączenie fiskala do 2 instancji hotelu '),(167,'2019-01-23','18:10:00','18:45:00','Mensa','','cenniki daty','cenniki daty'),(169,'2019-01-23','19:00:00','19:20:00','rydzyk','','ustawienie backupu','ustawienie backupu'),(170,'2019-01-24','19:00:00','22:30:00','nalesy','','podniesienie wersji','podniesienie wersji do 4.6 zlecenie jerzy '),(171,'2019-01-28','18:00:00','19:24:00','Rock browar','','Podniesienie wersji do 47','Wykonano podniesienie wersji podstawą konfigurację'),(172,'2019-01-28','19:25:00','22:25:00','Kursy targ','','Instalacja systemu operacyjnego w celu skonfigurowania drukarki bonów','Wykonano'),(173,'2019-01-28','22:26:00','23:26:00','Bonum','','Sprawdzenie problemu systemu hotelowego błędy komunikaty','Brak połączenia z drukarką fiskalną'),(174,'2019-01-28','23:28:00','01:29:00','Złoty słoń Kielce','','A płyty wersji do 4.6','Wykonano upgrade pod gra na fix'),(175,'2019-01-29','18:21:00','19:51:00','rydzyk','','Ustawienia drukarki fiskalnej',''),(176,'2019-01-29','18:21:00','19:51:00','rydzyk','','Ustawienia drukarki fiskalnej',''),(177,'2019-01-29','18:21:00','19:51:00','rydzyk','','Ustawienia drukarki fiskalnej',''),(178,'2019-01-29','18:21:00','19:51:00','rydzyk','','Ustawienia drukarki fiskalnej',''),(179,'2019-01-30','21:46:00','23:46:00','Hana sushi','','Jpg do 4.6','Upg'),(180,'2019-01-30','18:10:00','22:10:00','Mazurek','','Hotel problem z gastro','Upg. Przeniesienie  bazy . Wersja . Informacje kayetan'),(181,'2019-01-30','17:12:00','18:30:00','Mensa','','Zmiana ftp','Zlecenie Jurek'),(182,'2019-02-01','18:09:00','19:09:00','Zdg','','Zmiana pasa na inne z powodu awarii','Wykonano przełożenie bazy danych i konfigurację wstępną na nowym pasie'),(183,'2019-02-01','19:02:00','20:02:00','Netpos','','Konfiguracja serwera maszyny zdalnej nowego FTP na naszym serwerze','Wykonano'),(184,'2019-02-01','21:03:00','23:30:00','Crazy car','','Granie wersji','Oczywiście żeby nie było za prosto nie da się wgrać błędy SQL'),(187,'2019-02-04','17:00:00','18:40:00','Mensa','','Wysyłka danych z posów do serwera ','Wysyłka danych z posów do serwera '),(188,'2019-02-04','19:00:00','19:20:00','3korony','','weryfikacja zgłoszenia','nie potwierdzam'),(189,'2019-02-04','19:30:00','20:40:00','Red Habanero ','','Konfiguracja komputera pod fudsoft ','Konfiguracja komputera pod fudsoft '),(191,'2019-02-04','23:00:00','23:10:00','Mensa','','wydruk paragonu','wydruk paragonu'),(192,'2019-02-05','19:28:00','20:15:00','Mensa','','Wysyłka wszystkich k p od początku','Wysyłka wszystkich dokumentów kasowych'),(193,'2019-02-05','19:28:00','20:15:00','Mensa','','Wysyłka wszystkich k p od początku','Wysyłka wszystkich dokumentów kasowych'),(194,'2019-02-05','20:00:00','21:30:00','Sztolnia','','zmiana rws od księgowanie inwentaryzacji błąd foodsoft ','zmiana rws od księgowanie inwentaryzacji błąd foodsoft '),(195,'2019-02-05','21:00:00','21:41:00','Tomaszowice licencja','','podgranie licencji ','podgranie licencji '),(196,'2019-02-05','21:40:00','22:20:00','Netpos','','obsługa zgłoszeń portal','obsługa zgłoszeń portal'),(197,'2019-02-04','16:20:00','17:00:00','Krystynka wraca z wiednia','','Przegląd fiskalny','Przegląd fiskalny'),(198,'2019-02-07','18:00:00','21:48:00','Motycze','','Fix','Fix'),(199,'2019-02-02','11:30:00','15:00:00','Crazy car','','instalacja i konfiguracja pos po awari ',''),(200,'2019-02-08','18:00:00','18:55:00','Motycze','','FTP przesyłanie danych',''),(201,'2019-02-11','18:00:00','22:00:00','takara','','instalacja bos i replikator','instalacja bos i replikator'),(202,'2019-02-12','16:05:00','16:30:00','prodiż','','przegląd fiskalny','3306'),(203,'2019-02-12','17:00:00','17:50:00','zajazd pod dębem','','instalacja netpos hotel ','instalacja netpos hotel '),(204,'2019-02-12','18:00:00','18:17:00','węgierki','','pokoje nie widoczne w pos','nie potwierdzam wszystko działa '),(205,'2019-02-17','10:20:00','10:32:00','Gom','','Go restart portu kamińsk',''),(206,'2019-02-19','16:31:00','18:30:00','Koło ','','Szkolenie boś magazyn','Boos magazyn'),(207,'2019-02-21','17:00:00','18:00:00','Salonik Fryzur','','przegląd fiskalny','przegląd fiskalny'),(208,'2019-02-22','16:30:00','18:00:00','Lantier','','przegląd fiskalny','przegląd fiskalny'),(214,'2019-02-24','12:22:00','12:33:00','Sztolnia','','nie działa pos 1  z fiskalem błąd biosu','rozładowanie pomogło'),(216,'2019-02-25','18:29:00','19:11:00','Motycze Ballada','','Na koniec dnia nie działa replikacja','Ustawiono replikację , siec i kopie danych'),(218,'2019-02-25','19:42:00','19:50:00','Hotel Szafran','','zgłoszenie integracji','zgłoszenie integracji wypełnienie formularza profitroom'),(224,'2019-02-25','22:00:00','22:44:00','Złoty Słoń','','Brak możliwości wykonania inwentaryzacji','zrobione'),(225,'2019-02-25','23:00:00','23:13:00','Otwarte drzwi','','Sprawdzenie backupu','Sprawdzenie backup'),(226,'2019-02-26','17:00:00','17:40:00','Złoty Słoń','','nie działają pz','u mnie działa /fix'),(228,'2019-02-26','18:40:00','19:08:00','Motycze Centrala','','nie przesyłają się pz','ustawienie replikacji wysyłka danych'),(229,'2019-02-27','18:00:00','20:00:00','Netpos','','konfiguracja serwera ','konfiguracja serwera '),(230,'2019-02-27','19:00:00','19:20:00','Koło','','Nie widoczne rezerwacje na foodsoft','Usuwa się plik z rezerwacjami '),(232,'2019-02-27','20:00:00','20:20:00',' hotel Harenda','','wydruk raportu alk','wydruk raportu alk'),(233,'2019-03-01','17:00:00','18:13:00','Restauracja Dębowa Góra','','Konfiguracja posa na komputerze ','Konfiguracja posa na komputerze  z drukarkami bonów i kds'),(234,'2019-03-02','08:40:00','08:55:00','ZOO Borysew','','ustawienie  uprawnień . wydruk bonu po płatności ','ustawienie  uprawnień . wydruk bonu po płatności '),(235,'2019-03-02','09:00:00','09:20:00','Motycze Tarnobrzeg','','połączenie z bazą danych','poprawa połączeń switch pod ladą '),(266,'2019-03-04','16:40:00','17:40:00','CHICHI4U SP. Z O. O. ','','problemy ze źle wykonanymi dokumentami','praca na bazie  danych '),(267,'2019-03-04','17:45:00','18:09:00','Dwór w Tomaszowicach','','problem z fv','odpisano na zgłoszenie '),(268,'2019-03-04','18:20:00','19:00:00','Koło','','standart rate','zmiana cennika na baziie '),(269,'2019-03-05','19:00:00','19:20:00','Widzew Bar','','korekta paragonu','szybkie szkolenie'),(270,'2019-03-05','19:30:00','20:00:00','Inferno warszawa','','nie fiskalizują się PARAGONY','restart komputera brak internetu'),(271,'2019-03-07','18:30:00','21:30:00','Dwór w Tomaszowicach','','inwentaryzacja','ogólnie syf koleś bawi się z boga na dokumentach tyle że mu nie wychodzi '),(272,'2019-03-07','21:40:00','22:00:00','1','','wysłanie danych z posa 6','wykonano'),(273,'2019-03-07','22:00:00','23:00:00','Dwór w Tomaszowicach','','badanie fv /po aktualizacji ','wybór poprawnego formatu '),(274,'2019-03-07','22:50:00','23:45:00','Heksagon ','','up do 4.6','wykonano '),(275,'2019-03-16','12:00:00','13:00:00','ZOO Borysew','','instalacja kopi','instalacja sql i awaryjnego posa '),(276,'2019-03-16','15:00:00','16:00:00','Netpos SP z o.o.','','konfiguracja ftp na naszym serwerze ','konfiguracja ftp na naszym serwerze '),(277,'2019-03-15','18:00:00','20:00:00','Motycze Centrala','','problem z ftp','problem z ftp'),(278,'2019-03-13','16:20:00','21:40:00','La-Fontana Katowice','','wdrożenie katowice','wdrożenie katowice '),(279,'2019-03-18','21:30:00','22:20:00','Heksagon ','','fix','fix dla 4.6'),(280,'2019-03-18','20:02:00','21:20:00','Mensa','','przesyłanie paragonów 2018','wykonano'),(281,'2019-03-19','17:30:00','18:20:00','Hana sushi','','inwentaryzacja błąd','fix dla 4.6'),(282,'2019-03-19','22:50:00','23:40:00','La-Fontana Katowice','','podłączenie serwera','podłączenie serwera'),(283,'2019-03-20','19:00:00','21:30:00','GOM','','wgranie  fixa 4.6 centrala lokal','wgranie  fixa 4.6 centrala lokal'),(284,'2019-03-20','16:30:00','17:30:00','Koło','','wycina plik z rezerwacjami','wycina plik z rezerwacjami /serwer konfiguracja '),(285,'2019-03-20','17:30:00','18:00:00','Mensa','','hotel z Kajetan','hotel z Kajetan');
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-24 20:18:58
