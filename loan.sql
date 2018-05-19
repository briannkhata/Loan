/*
SQLyog Community v12.2.6 (64 bit)
MySQL - 5.7.19 : Database - loan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`loan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `loan`;

/*Table structure for table `account_transaction` */

DROP TABLE IF EXISTS `account_transaction`;

CREATE TABLE `account_transaction` (
  `account_transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_type` varchar(100) DEFAULT NULL,
  `tr_amount` int(11) DEFAULT NULL,
  `tr_desc` text,
  `tr_date` datetime DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `tr_id` text,
  `teller` int(11) DEFAULT NULL,
  PRIMARY KEY (`account_transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `account_transaction` */

insert  into `account_transaction`(`account_transaction_id`,`tr_type`,`tr_amount`,`tr_desc`,`tr_date`,`deleted`,`user_id`,`tr_id`,`teller`) values 
(16,'1',8000,NULL,'2018-02-18 23:11:04',0,64,'TxID - 21013',6),
(17,'1',5000,NULL,'2018-02-18 23:11:21',0,66,'TxID - 2346',6),
(18,'2',2000,NULL,'2018-02-18 23:11:48',0,64,'TxID - 25371',6),
(19,'1',5000,NULL,'2018-02-25 07:10:56',0,66,'TxID - 9424',6),
(20,'1',90000,NULL,'2018-02-26 21:05:00',0,85,'TxID - 13805',6);

/*Table structure for table `addional_fees` */

DROP TABLE IF EXISTS `addional_fees`;

CREATE TABLE `addional_fees` (
  `af_id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) DEFAULT NULL,
  `fee_title` varchar(100) DEFAULT NULL,
  `fee_amount` varchar(100) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`af_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `addional_fees` */

insert  into `addional_fees`(`af_id`,`loan_id`,`fee_title`,`fee_amount`,`deleted`) values 
(9,24,'EXTRA','2000',0);

/*Table structure for table `attachments` */

DROP TABLE IF EXISTS `attachments`;

CREATE TABLE `attachments` (
  `attach_id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) DEFAULT NULL,
  `title` text,
  `file` text,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`attach_id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `attachments` */

insert  into `attachments`(`attach_id`,`loan_id`,`title`,`file`,`deleted`) values 
(67,24,'Multiple testing','22.jpg',0),
(66,24,'End of Year Voting','Hospital Algo.docx',0),
(65,24,'vvvvvvvvvvv','IMG_20180228_100152.jpg',0),
(64,24,'bulk Test','Hospital Algo.docx',0);

/*Table structure for table `branch` */

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) DEFAULT NULL,
  `branch_address` text,
  `branch_phone` varchar(100) DEFAULT NULL,
  `branch_email` varchar(100) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `company_id` text NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `lmd` datetime DEFAULT NULL,
  `lmd_by` int(11) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `branch` */

insert  into `branch`(`branch_id`,`branch_name`,`branch_address`,`branch_phone`,`branch_email`,`added_by`,`company_id`,`date_added`,`lmd`,`lmd_by`,`deleted`) values 
(2,'SEAL DIAGNOSTIC (PVT) LAB','P.O.BOX 2849, BLANTYRE','+265 999 955794/ 0881549600','sealdiagnostics@yahoo.com',0,'SEAL',NULL,NULL,NULL,0),
(3,'LLcccccccccccc','                                                                        Box 20,Katete\r\n                                                                 bbbbbbbbbbbbbbbbbbbbbbbb   ','55900000','b@yahoo.com',0,'',NULL,NULL,NULL,1),
(4,'LL','Box 20,Katete','55b','briannkhata@gmail.com',0,'',NULL,NULL,NULL,1),
(5,'Mangochi Branch','Box 11,Mangochi                                                                        \r\n                                                                    ','015004','brian@loan.com',0,'',NULL,NULL,NULL,0),
(6,'Kabula','Box 18,Blantyre                                                                        \r\n                                                                    ','0999888766','kabula@gmail.com',0,'',NULL,NULL,NULL,0);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category`,`description`,`deleted`) values 
(1,'MACROSCOPY','',0),
(2,'CHEMICAL ANALYSIS','',0),
(3,'MICROSCOPY','',0),
(4,'STOOL ROUTINE','',0),
(5,'URINE ROUTINE','',0),
(11,'CARDIAC ENZYMES','',0),
(13,'OTHER CHEMISTRY','',1),
(14,'METABOLITES','',0),
(15,'SEROLOGY','SERUM/PLASMA',0),
(16,'U & E\'S','U&E\'S',0),
(17,'CBC','WHOLE BLOOD',0),
(19,'LIPOGRAM','SERUM',0),
(20,'LIVER FUNCTION TESTS','SERUM/PLASMA',0),
(21,'Chemistry Singles','Serum/Plasma',1),
(22,'Other','Other',0);

/*Table structure for table `client_finance` */

DROP TABLE IF EXISTS `client_finance`;

CREATE TABLE `client_finance` (
  `cfinance_id` int(11) NOT NULL AUTO_INCREMENT,
  `occupation` varchar(200) DEFAULT NULL,
  `income` varchar(300) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cfinance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

/*Data for the table `client_finance` */

insert  into `client_finance`(`cfinance_id`,`occupation`,`income`,`deleted`,`user_id`) values 
(78,'Guard','120000000',0,78),
(79,'Teacher','180000',0,66),
(80,'Nurse','250000',0,66),
(81,'Farner','150000',0,84),
(82,'saleman','30000',0,84),
(83,'Murder','100000',0,84),
(84,'hhhh','8888',1,84),
(85,'oooo','7899',1,84),
(86,'Driver','500000',0,85),
(87,'Sales Man','2000000',0,85),
(88,'Driver','90000',0,86),
(89,'Teaching','225000',0,85);

/*Table structure for table `client_uploads` */

DROP TABLE IF EXISTS `client_uploads`;

CREATE TABLE `client_uploads` (
  `client_upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `file` text,
  `client_id` int(11) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`client_upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `client_uploads` */

insert  into `client_uploads`(`client_upload_id`,`file`,`client_id`,`deleted`) values 
(1,'',0,0),
(2,'',0,0),
(3,'Non Reactive',0,0),
(4,'Non Reactive',0,0);

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `profession` text,
  `user_id` int(11) DEFAULT NULL,
  `account_number` text,
  `account_balance` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=482 DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

insert  into `clients`(`client_id`,`profession`,`user_id`,`account_number`,`account_balance`) values 
(476,'Marketer',64,'12-78-00',6000),
(477,'Marketer',65,'12-78-00',0),
(478,'Marketer',66,'12-78-00',10000),
(479,'Marketer',84,'12-78-00',0),
(480,NULL,85,'3725723',90000),
(481,NULL,86,'123-90-3030',0);

/*Table structure for table `collaterals` */

DROP TABLE IF EXISTS `collaterals`;

CREATE TABLE `collaterals` (
  `collateral_id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `s_no` text,
  `model` text,
  `name` text,
  `make` text,
  `type` text,
  `price` int(11) DEFAULT NULL,
  `proof` text,
  `file` text,
  `loan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`collateral_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `collaterals` */

insert  into `collaterals`(`collateral_id`,`deleted`,`s_no`,`model`,`name`,`make`,`type`,`price`,`proof`,`file`,`loan_id`) values 
(11,0,'123456','DERAZ','Car','ASES','Benz',2000000,'138_Feed the People_27112017.pdf','Bank Account Details      _International(Revised).pdf',24);

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL DEFAULT '1',
  `company_name` varchar(100) DEFAULT NULL,
  `company_logo` text,
  `company_phone` varchar(100) DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `stamp` text,
  `missed_payment_message` text,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `company` */

insert  into `company`(`company_id`,`company_name`,`company_logo`,`company_phone`,`company_email`,`currency`,`stamp`,`missed_payment_message`) values 
(1,'Umunthu','logo.png','0999999','umunthu@gmail.com','Mk','stamp.png','Missed you payment');

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) DEFAULT NULL,
  `department_head` varchar(100) DEFAULT NULL,
  `department_details` text,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `department` */

insert  into `department`(`department_id`,`department_name`,`department_head`,`department_details`,`deleted`) values 
(1,'OK MAN   ff                                                              ','OK BOSS','HAHAHA',1),
(2,'          mm','                   kk','                                           pp                       ',1),
(3,'It','BRIAN NKHAT','BDEAR',1),
(4,'DD','SS','EE',1),
(5,'QQ','QQ','QQ',1),
(6,'WW','WW','WW',1),
(7,'FF','FF','FF',1),
(8,'Information Technology','Brian Nkhata','IT Issues                                                               \r\n                                                                    ',0),
(9,'MM','MM','MM',1),
(10,'TT','TT','TT',1),
(11,'XX','XX','XX',1),
(12,'ZZZ','ZZ','ZZ',1),
(13,'TAO','TAYO','TAYO',1),
(14,NULL,NULL,NULL,1);

/*Table structure for table `developer` */

DROP TABLE IF EXISTS `developer`;

CREATE TABLE `developer` (
  `developer_id` int(11) NOT NULL AUTO_INCREMENT,
  `about` text,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`developer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `developer` */

insert  into `developer`(`developer_id`,`about`,`phone`,`email`) values 
(1,'\r\nBix ProgrammerZ is a wholly owned private Information and Communication Technology (ICT) company and its Headquarters is in Blantyre, Malawi, Africa.\r\nThe core mission for the company is to provide excellent and timely ICT solutions to various institutions, firms, individuals, companies and organizations throughout the country.\r\nWe have a very well established and stable team for the execution of all the Information and Communication Technology (ICT) Services. The team is made up of very well qualified and also experienced individuals. As such, all our clients enjoy professional services from us every time they engage us','+265 (0) 888 015 904','briannkhata@gmail.com');

/*Table structure for table `email_settings` */

DROP TABLE IF EXISTS `email_settings`;

CREATE TABLE `email_settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text,
  `password` text,
  `port` text,
  `host` text,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `email_settings` */

insert  into `email_settings`(`settings_id`,`email`,`password`,`port`,`host`) values 
(1,'briannkhata@gmail.com','999999999999999999999','25','bix.mwz');

/*Table structure for table `emails` */

DROP TABLE IF EXISTS `emails`;

CREATE TABLE `emails` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `subject` text,
  `receiver_email` varchar(100) DEFAULT NULL,
  `date_sent` int(11) DEFAULT NULL,
  `message` text,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `sending_email` text,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `emails` */

insert  into `emails`(`email_id`,`user_id`,`subject`,`receiver_email`,`date_sent`,`message`,`deleted`,`sending_email`) values 
(2,6,'0','briannkhata@gmail.com',0,'Testing<br>',1,NULL),
(3,6,'boss2','briannkhata@gmail.com',0,'testing2<br>',1,NULL),
(4,6,'test3','nkhata_@yahoo.com',1518818443,'testing3<br>',1,NULL),
(5,6,'Boss','nkhata_@yahoo.com',1518818653,'hh<br>',1,NULL),
(6,6,'Boss','nkhata_@yahoo.com',1518818718,'hh<br>',1,NULL),
(7,6,'Boss','briannkhata@gmail.com',1519834367,'test',0,NULL),
(8,6,'bulk Test',NULL,1519884830,'BULK TESTTING<br>',0,'briannkhata@gmail.com'),
(9,NULL,'bulk Test','bathe@gmail.com',1519884920,'ok<br>',0,'briannkhata@gmail.com'),
(10,NULL,'bulk Test','jnyumbu@gmail.com',1519884920,'ok<br>',0,'briannkhata@gmail.com'),
(11,NULL,'bulk Test','g@yahoo.com',1519884920,'ok<br>',0,'briannkhata@gmail.com');

/*Table structure for table `guaranta` */

DROP TABLE IF EXISTS `guaranta`;

CREATE TABLE `guaranta` (
  `guaranta_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_name` text NOT NULL,
  `g_id` text NOT NULL,
  `g_photo` double DEFAULT NULL,
  `g_phone` text,
  `g_email` text,
  `relationship` text NOT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `g_address` text,
  `remarks` text,
  PRIMARY KEY (`guaranta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=761 DEFAULT CHARSET=latin1;

/*Data for the table `guaranta` */

insert  into `guaranta`(`guaranta_id`,`g_name`,`g_id`,`g_photo`,`g_phone`,`g_email`,`relationship`,`loan_id`,`g_address`,`remarks`) values 
(753,'Jayloss Nkhata','qwerty',23685,'0999999','b@gmail.com','Father',20,'Chirimba                                                                    ','Business Man                                                                    '),
(754,'Martin Nkhata','qwert-123',2810,'099999988','mnkhata@yahoo.com','Brother',21,'Box 18,Chichiri,Blantyre 3                                                                    ',' He is always available for contact                                                                   '),
(755,'Brico Nkhata','127777777',15025,'0888015904','nkhata_b@yahoo.com','My Former Boss',22,'Chilomon,Blantyre                                                                    ','  He is cull,crime free                                                                  '),
(756,'Matilda','weaty1234',2219,'0888015904','mat@yahoo.com','Friend',23,'   Box 20,Lilongwe                                                                 ','She is cul                                                                    '),
(757,'Martin Nyumbu','123-890-mn',27171,'099988890','martinnkhata@gmail.com','My Lawyer',24,'Box 222,Blantyre                                                                    ',' Always available for assistance                                                                   '),
(758,'Galu','ty-ert',3,'099988890','','Sondo',25,' da                                                                   ','ok boss                                                                    '),
(759,'Martin Nyumbu','ty-ertnnnnnnnnn',0,'099988890','martinnkhata@gmail.com','My Lawyer',26,'bo','                                                                    cul'),
(760,'Martin Nyumbu','ty-ertnnnnnnnnnm',0,'099988890','martinnkhata@gmail.com','My Lawyer',27,'       nnnnnnnnn                                                             ','                          bmm                                          ');

/*Table structure for table `loan_types` */

DROP TABLE IF EXISTS `loan_types`;

CREATE TABLE `loan_types` (
  `loan_type` text NOT NULL,
  `type_desc` varchar(100) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `type_amount` int(11) DEFAULT NULL,
  `type_rate` text,
  `loan_type_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`loan_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `loan_types` */

insert  into `loan_types`(`loan_type`,`type_desc`,`deleted`,`type_amount`,`type_rate`,`loan_type_id`) values 
('Company Loans','ALL GOOD                                                                       \r\n                   ',0,1000000,'10',13),
('Personal Loans','                                                                        \r\n    wtf                   ',0,1000000,'20',14);

/*Table structure for table `loans` */

DROP TABLE IF EXISTS `loans`;

CREATE TABLE `loans` (
  `loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `amount` text,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `payment_date` text,
  `approved_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 - PENDING 2 - APPROVED 3 - DIAPROVE 4- FINISED PAYING',
  `desc` text,
  `total_amount` int(11) DEFAULT NULL,
  `teller` int(11) DEFAULT NULL,
  `agent` varchar(100) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `date_applied` datetime DEFAULT NULL,
  `date_approved` datetime DEFAULT NULL,
  `reason` text,
  `cash_in` int(11) DEFAULT NULL,
  `loan_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`loan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `loans` */

insert  into `loans`(`loan_id`,`user_id`,`amount`,`deleted`,`payment_date`,`approved_by`,`status`,`desc`,`total_amount`,`teller`,`agent`,`balance`,`date_applied`,`date_approved`,`reason`,`cash_in`,`loan_type_id`) values 
(24,'85','2000000',0,'1519776000',6,2,' To buy a house                                                                    ',2500000,6,'Brian Nkhata',-2504200,'2018-02-28 20:02:34','2018-03-04 12:03:04','ok',5004200,NULL),
(25,'84','2500000',0,'1522454400',NULL,1,'To buy a house                                                                    ',27500000,6,'Vivian',NULL,'2018-03-05 21:03:36',NULL,NULL,NULL,13),
(26,'85','2500000',0,'1524873600',NULL,1,'New House',3000000,6,'Brian Nkhata',3000000,'2018-03-05 21:03:28',NULL,NULL,NULL,14),
(27,'86','2500000',0,'1529020800',NULL,1,'                                                                    m',2750000,6,'Vivian',2750000,'2018-03-05 22:03:13',NULL,NULL,NULL,13);

/*Table structure for table `modules` */

DROP TABLE IF EXISTS `modules`;

CREATE TABLE `modules` (
  `sort` int(10) NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `modules` */

insert  into `modules`(`sort`,`icon`,`module_id`,`active`) values 
(1,'fa fa-users','client',1),
(4,'fa fa-cogs','config',1),
(5,'fa fa-envelope-o','emails',1),
(2,'fa fa-money','loans',1),
(3,'fa fa-list','payments',1),
(9,'fa fa-list','reports',1),
(10,'fa fa-cogs','rights',1),
(8,'fa fa-credit-card','savings',1),
(6,'fa fa-comments-o','sms',1),
(7,'fa fa-users','staff',1),
(20,'fa fa-money','wallet',1);

/*Table structure for table `modules_actions` */

DROP TABLE IF EXISTS `modules_actions`;

CREATE TABLE `modules_actions` (
  `action_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `module_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `class` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`action_id`,`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `modules_actions` */

insert  into `modules_actions`(`action_id`,`module_id`,`sort`,`class`,`icon`,`desc`) values 
('bulk','emails',4,'btn btn-sm btn-success','fa fa-check-circle-o','bulk emails'),
('bulk','sms',4,'btn btn-sm btn-success','fa fa-check-circle-o','bulk sms'),
('create','client',2,'btn btn-sm btn-primary','fa fa-plus-circle','new client'),
('create','emails',2,'btn btn-sm btn-primary','fa fa-plus-circle','new email'),
('create','loans',2,'btn btn-sm btn-primary','fa fa-plus-circle','new loan'),
('create','payments',2,'btn btn-sm btn-primary','fa fa-plus-circle','new payment'),
('create','sms',2,'btn btn-sm btn-primary','fa fa-plus-circle','new sms'),
('create','staff',2,'btn btn-sm btn-primary','fa fa-plus-circle','new staff'),
('delete','client',1,'btn btn-sm btn-danger del','fa fa-times-circle','delete'),
('delete','emails',1,'btn btn-sm btn-danger  del','fa fa-times-circle','delete'),
('delete','loans',1,'btn btn-sm btn-danger  del','fa fa-times-circle','delete'),
('delete','payments',1,'btn btn-sm btn-danger  del','fa fa-times-circle','delete'),
('delete','savings',1,'btn btn-sm btn-danger  del','fa fa-times-circle','delete'),
('delete','sms',1,'btn btn-sm btn-danger  del','fa fa-times-circle','delete'),
('delete','staff',1,'btn btn-sm btn-danger del','fa fa-times-circle','delete'),
('delete','wallet',1,'btn btn-sm btn-danger  del','fa fa-times-circle','delete'),
('deleted','wallet',4,'btn btn-sm btn-warning','fa fa-check-circle','trash'),
('missed_payments','payments',5,'btn btn-sm btn-success','fa fa-check-circle','Missed payments'),
('overdue','loans',5,'btn btn-sm btn-success','fa fa-check-circle','Overdue'),
('transact','savings',2,'btn btn-sm btn-primary','fa fa-money','transaction'),
('transact','wallet',4,'btn btn-sm btn-success','fa fa-money','transaction'),
('view','client',3,'btn btn-sm btn-info','fa fa-info-circle','details'),
('view','emails',3,'btn btn-sm btn-info','fa fa-info-circle','details'),
('view','loans',3,'btn btn-sm btn-info','fa fa-info-circle','details'),
('view','payments',4,'btn btn-sm btn-info','fa fa-info-circle','details'),
('view','savings',4,'btn btn-sm btn-info','fa fa-list','receipt'),
('view','sms',3,'btn btn-sm btn-info','fa fa-info-circle','details'),
('view','staff',3,'btn btn-sm btn-info','fa fa-info-circle','details'),
('view','wallet',3,'btn btn-sm btn-info','fa fa-info-circle','view');

/*Table structure for table `month` */

DROP TABLE IF EXISTS `month`;

CREATE TABLE `month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `month` */

insert  into `month`(`id`,`month`) values 
(1,'January'),
(2,'February'),
(3,'March'),
(4,'April'),
(5,'May'),
(6,'June'),
(7,'July'),
(8,'September'),
(9,'October'),
(10,'November'),
(11,'December'),
(12,'August');

/*Table structure for table `pay_schedule` */

DROP TABLE IF EXISTS `pay_schedule`;

CREATE TABLE `pay_schedule` (
  `ps_id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) DEFAULT NULL,
  `date` text,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `desc` text,
  `rate` int(11) DEFAULT NULL,
  PRIMARY KEY (`ps_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pay_schedule` */

insert  into `pay_schedule`(`ps_id`,`loan_id`,`date`,`deleted`,`desc`,`rate`) values 
(1,20,'45',0,'nnnnnnnnnnnnnnnn',NULL),
(2,20,'20',0,'ok boss',30000);

/*Table structure for table `payment_mode` */

DROP TABLE IF EXISTS `payment_mode`;

CREATE TABLE `payment_mode` (
  `payment_mode_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_mode` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_mode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `payment_mode` */

insert  into `payment_mode`(`payment_mode_id`,`pay_mode`,`description`) values 
(1,'MASM',NULL),
(2,'Invoice',NULL),
(3,'Cash',NULL),
(4,'Cheque',NULL);

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) DEFAULT NULL,
  `payment_amount` text NOT NULL,
  `payment_date` text NOT NULL,
  `received_by` int(11) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `comment` text,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=506 DEFAULT CHARSET=latin1;

/*Data for the table `payments` */

insert  into `payments`(`payment_id`,`loan_id`,`payment_amount`,`payment_date`,`received_by`,`deleted`,`comment`) values 
(505,24,'2000','1520294400',6,0,'                               tyr                                     ');

/*Table structure for table `reminders` */

DROP TABLE IF EXISTS `reminders`;

CREATE TABLE `reminders` (
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `reminder_name` text,
  `days_before` text,
  `message` text,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reminder_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `reminders` */

insert  into `reminders`(`reminder_id`,`reminder_name`,`days_before`,`message`,`deleted`) values 
(1,'Loans Reminder','5','                                    your loan is due on 12th marcj                                    \r\n                                                                    ',0);

/*Table structure for table `sms` */

DROP TABLE IF EXISTS `sms`;

CREATE TABLE `sms` (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `message` text,
  `date_sent` int(11) DEFAULT NULL,
  `receiver_number` varchar(100) DEFAULT NULL,
  `sending_number` varchar(100) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sms` */

/*Table structure for table `sms_settings` */

DROP TABLE IF EXISTS `sms_settings`;

CREATE TABLE `sms_settings` (
  `settings_id` varchar(100) NOT NULL DEFAULT '1',
  `twilio_account_sid` text,
  `twilio_auth_token` text,
  `twilio_sender_phone_number` text,
  PRIMARY KEY (`settings_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sms_settings` */

insert  into `sms_settings`(`settings_id`,`twilio_account_sid`,`twilio_auth_token`,`twilio_sender_phone_number`) values 
('1','from twilio','same','09999999');

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `department` text,
  `jobtitle` text,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `staff` */

insert  into `staff`(`staff_id`,`user_id`,`department`,`jobtitle`) values 
(1,19,NULL,'Marketer'),
(2,20,NULL,'Marketer'),
(3,21,NULL,'Marketer'),
(4,22,NULL,'Marketer'),
(5,23,NULL,'Marketer'),
(6,24,NULL,'Marketer'),
(7,25,NULL,'Marketer'),
(8,26,NULL,'Marketer'),
(9,27,NULL,'Marketer'),
(10,28,NULL,'Marketer'),
(11,29,NULL,'Marketer'),
(12,30,NULL,'Marketer'),
(13,31,NULL,'Marketer'),
(14,32,NULL,'Marketer'),
(15,34,NULL,'Marketer'),
(16,35,NULL,'Marketer'),
(17,36,NULL,'Marketer'),
(18,37,NULL,'Marketer'),
(19,38,NULL,'Marketer'),
(20,39,NULL,'Marketer'),
(21,40,NULL,'Marketer'),
(22,41,NULL,'Marketer'),
(23,42,NULL,'Marketer'),
(24,43,NULL,'Marketer'),
(25,44,NULL,'Marketer'),
(26,45,NULL,'Marketer'),
(27,46,NULL,'Marketer'),
(28,47,NULL,'Marketer'),
(29,67,NULL,'Marketer'),
(30,68,NULL,'Marketer'),
(31,69,NULL,'Marketer'),
(32,70,NULL,'Marketer'),
(33,71,NULL,'Marketer'),
(34,72,NULL,'Marketer'),
(35,73,NULL,'Marketer'),
(36,74,NULL,'Marketer'),
(37,75,NULL,'Marketer'),
(38,76,NULL,'Marketer'),
(39,77,NULL,'Marketer'),
(40,78,NULL,'Marketer'),
(41,79,NULL,'Marketer'),
(42,80,NULL,'Marketer'),
(43,81,NULL,'Marketer'),
(44,82,NULL,'Marketer'),
(45,83,NULL,'Marketer');

/*Table structure for table `sub_module_actions` */

DROP TABLE IF EXISTS `sub_module_actions`;

CREATE TABLE `sub_module_actions` (
  `sub_module_action_id` varchar(100) NOT NULL,
  `sub_module_id` varchar(100) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `class` varchar(200) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `icon` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`sub_module_action_id`,`sub_module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `sub_module_actions` */

insert  into `sub_module_actions`(`sub_module_action_id`,`sub_module_id`,`sort`,`class`,`desc`,`icon`) values 
('create','department',2,'btn btn-sm btn-primary','add New','fa fa-plus-circle'),
('delete','department',1,'btn btn-sm btn-danger','delete','fa fa-times-circle'),
('create','branch',2,'btn btn-sm btn-primary','add new','fa fa-plus-circle'),
('delete','branch',1,'btn btn-sm btn-danger','delete','fa fa-times-circle'),
('view','branch',3,'btn btn-sm btn-success','details','fa fa-info-circle'),
('create','reminders',2,'btn btn-sm btn-primary','add new','fa fa-plus-circle'),
('delete','reminders',1,'btn btn-sm btn-danger','delete','fa fa-times-circle'),
('view','reminders',3,'btn btn-sm btn-sucsess','details','fa fa-info-circle'),
('create','loan_types',2,'btn btn-sm btn-primary','add new','fa fa-plus-circle'),
('delete','loan_types',1,'btn btn-sm btn-danger','delete','fa fa-times-circle'),
('view','loan_types',3,'btn btn-sm btn-success','details','fa fa-info-circle');

/*Table structure for table `sub_modules` */

DROP TABLE IF EXISTS `sub_modules`;

CREATE TABLE `sub_modules` (
  `sub_module_id` varchar(200) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `module_id` varchar(100) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sub_module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sub_modules` */

insert  into `sub_modules`(`sub_module_id`,`sort`,`icon`,`module_id`,`desc`) values 
('branch',4,'','config','Branches'),
('company',3,'','config','Company Setup'),
('department',5,'','config','Departments'),
('email_setting',2,'','config','Email Settings'),
('loan_types',6,NULL,'config','Loan Types'),
('reminders',7,NULL,'config','Follow Ups'),
('sms_setting',1,'','config','SMS API Settings');

/*Table structure for table `user_module_actions` */

DROP TABLE IF EXISTS `user_module_actions`;

CREATE TABLE `user_module_actions` (
  `module_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `action_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`module_id`,`user_id`,`action_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_module_actions` */

insert  into `user_module_actions`(`module_id`,`user_id`,`action_id`) values 
('client',6,'craete'),
('client',6,'delete'),
('client',6,'view'),
('emails',6,'bulk'),
('emails',6,'create'),
('emails',6,'delete'),
('emails',6,'view'),
('loans',6,'create'),
('loans',6,'delete'),
('loans',6,'overdue'),
('loans',6,'view'),
('payments',6,'create'),
('payments',6,'delete'),
('payments',6,'missed_payments'),
('payments',6,'view'),
('savings',6,'delete'),
('savings',6,'transact'),
('savings',6,'view'),
('sms',6,'bulk'),
('sms',6,'create'),
('sms',6,'delete'),
('sms',6,'view'),
('staff',6,'create'),
('staff',6,'delete'),
('staff',6,'view'),
('wallet',6,'create'),
('wallet',6,'delete'),
('wallet',6,'deleted'),
('wallet',6,'transact'),
('wallet',6,'view');

/*Table structure for table `user_sub_module_actions` */

DROP TABLE IF EXISTS `user_sub_module_actions`;

CREATE TABLE `user_sub_module_actions` (
  `sub_module_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_module_action_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sub_module_id`,`user_id`,`sub_module_action_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_sub_module_actions` */

insert  into `user_sub_module_actions`(`sub_module_id`,`user_id`,`sub_module_action_id`) values 
('branch',6,'create'),
('branch',6,'delete'),
('branch',6,'view'),
('department',6,'create'),
('department',6,'delete'),
('department',6,'view'),
('loan_types',6,'create'),
('loan_types',6,'delete'),
('loan_types',6,'view'),
('reminders',6,'create'),
('reminders',6,'delete'),
('reminders',6,'view'),
('specimens',17,'create'),
('specimens',17,'delete'),
('specimens',17,'view'),
('tests',17,'create'),
('tests',17,'delete'),
('tests',17,'view');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `lmd_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `lmd` datetime DEFAULT NULL,
  `address1` text,
  `address2` text,
  `gender` varchar(100) DEFAULT NULL,
  `marital_status` varchar(200) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1 staff 2 - Clients',
  `branch_id` int(11) DEFAULT NULL,
  `national_id` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`name`,`username`,`password`,`photo`,`deleted`,`phone`,`email`,`added_by`,`lmd_by`,`date_added`,`lmd`,`address1`,`address2`,`gender`,`marital_status`,`type`,`branch_id`,`national_id`) values 
(6,'Brian','briannkhata','21232f297a57a5a743894a0e4a801fc3','WIN_20180227_10_48_32_Pro.jpg',0,'0888015904','briannkhata@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,2,NULL),
(10,'Madalitso ','Lapken','a3f8c71ffb94ea04cf2d2caf3d6e8569','HznhE.jpg',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(11,'Mayeso','Mayeso','0d109b05dc3c1f504504d4e24ac52df0','Rt7UR.jpg',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(12,'Emmanuel','Emmanuel','011aedbea90fb3b6d1e7a47526b3bee6','l9dNq.jpg',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(13,'Madalitso ','Lapken','a3f8c71ffb94ea04cf2d2caf3d6e8569','fBVC3.jpg',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(14,'Collins','Collins','1b36ea1c9b7a1c3ad668b8bb5df7963f','hu8pc.jpg',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(15,'Marths','0888015904','61972f9d46e392ba0442bd87fc736596','WIN_20180227_10_48_32_Pro.jpg',0,'0888015904','m@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(16,'bossx','0','cfcd208495d565ef66e7dff9f98764da',NULL,0,'0','nj@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(17,'ossy','09999','0e0f8bdf150356c7ea444750799e7160',NULL,0,'09999','briannkhata@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(18,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(19,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(20,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(21,'Chisomo Nkhata','0888015904','81dc9bdb52d04dc20036dbd8313ed055',NULL,0,'09999999','chisomo@yahoo.com',NULL,NULL,NULL,NULL,'chirmba2                                                                        \r\n                                                                    ','Chirimba1                                                                        \r\n                                                                    ',NULL,NULL,1,NULL,NULL),
(22,'Chisomo Nkhata','0888015904','81dc9bdb52d04dc20036dbd8313ed055',NULL,0,'09999999','chisomo@yahoo.com',NULL,NULL,NULL,NULL,'chirmba2                                                                        \r\n                                                                    ','Chirimba1                                                                        \r\n                                                                    ',NULL,NULL,1,NULL,NULL),
(23,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(24,'Jayloss Nkhata','admin@admin.com','827ccb0eea8a706c4c34a16891f84e7b',NULL,0,'0999999910','jay@gmail.com',NULL,NULL,NULL,NULL,'                                   Zambia                               \r\n                                                                    ','                                                                        \r\n                                     Zambia                               ',NULL,NULL,1,NULL,NULL),
(25,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(26,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(27,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(28,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(29,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(30,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(31,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(32,'Gibson','gib','47af2cf6e05b247d01fd1d0cc804b403',NULL,0,'0996677556','briannkhata@gmail.com',NULL,NULL,NULL,NULL,'Box 20,Katete','                                                                        \r\n                                                                    rumphi','Male',NULL,1,NULL,NULL),
(33,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(34,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(35,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(36,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(37,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(38,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(39,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(40,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(41,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(42,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(43,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(44,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(45,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(46,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(47,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(48,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(49,'Rose Mvula','0888015904','61972f9d46e392ba0442bd87fc736596',NULL,0,'0888015904','briannkhata@gmail.com',NULL,NULL,NULL,NULL,'Box 20,Katete','Chilomon','Male',NULL,1,NULL,NULL),
(50,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(51,'Bean','0000007777777','bc840e4f173403f733aab7c825b81ba2',NULL,0,'0000007777777','briannkhata@gmail.com',NULL,NULL,NULL,NULL,'                                                                        \r\n                                                          xxxxxxxxxxxxx          ','                                                      zzzzzzzzzzzzzzzzz                  \r\n                                                                    ','Male',NULL,2,NULL,NULL),
(52,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(53,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(54,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(55,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(56,'DEr','0996677556','9fb65f0679e23dffaa5a33ba04ab7d2a',NULL,0,'0996677556','x@yahoo.com',NULL,NULL,NULL,NULL,'  as                                                                      \r\n                                                                    ','                                                                        \r\n      ass                                                              ','Male',NULL,2,NULL,NULL),
(57,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(58,'Dear','0000007777777','bc840e4f173403f733aab7c825b81ba2',NULL,0,'0000007777777','briannkhata@gmail.com',NULL,NULL,NULL,NULL,'Box 20,Katete','Chipata                                                                    ','Male',NULL,2,NULL,NULL),
(59,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(60,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(61,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(62,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(63,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(64,'Boss','0888015904','61972f9d46e392ba0442bd87fc736596',NULL,1,'0888015904','briannkhata@gmail.com',NULL,NULL,NULL,NULL,'Box 20,Katete','Box 20,Katete','Male',NULL,2,NULL,NULL),
(65,'Boss','0888015904','61972f9d46e392ba0442bd87fc736596',NULL,1,'0888015904','briannkhata@gmail.com',NULL,NULL,NULL,NULL,'Box 20,Katete','Box 20,Katete','Male',NULL,2,NULL,NULL),
(66,'Chisomo Nkhata','098988989','233cb12bf7f051c858cb6aed9b916670','24628.jpg',1,'098988989','chisomo@yahoo.com',NULL,NULL,NULL,NULL,'                                                                                                                                                   qwerty                                                                     \r\n                                                                    \r\n                                                                    \r\n                                                                    ','                                                                                                                                                     qwrats                                                                   \r\n                                                                    \r\n                                                                    \r\n                                                                    ','Male',NULL,2,NULL,''),
(67,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(68,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(69,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(70,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(71,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(72,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(73,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(74,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(75,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(76,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(77,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(78,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(79,'Igwe','0888327475','becfa3b8fe5689068fe85f7d63d6ebc2','http://127.0.0.1/loan/uploads/staff/28956.jpg',0,'0888327475','igwe@gmail.com',NULL,NULL,NULL,NULL,'  Chilomon                                                                      \r\n                                                                    ','              Mabulabo                                                          \r\n                                                                    ','Male',NULL,1,NULL,'1234Malawi'),
(80,'Maria','0888015904','61972f9d46e392ba0442bd87fc736596','.uploads/staff/8049.jpg',0,'0888015904','maria@gmail.com',NULL,NULL,NULL,NULL,'Lilongwe, kauma                                                                        \r\n                                                                    ',' Mzimba,Mbabala                                                                       \r\n                                                                    ','Female',NULL,1,NULL,'1234Malawi12'),
(81,'Alliness Nkhata','0996677556','9fb65f0679e23dffaa5a33ba04ab7d2a','uploads/staff/342.jpg',0,'0996677556','alliness@gmail.com',NULL,NULL,NULL,NULL,'        Lilongwe                                                                \r\n                                                                    ','     Mabulabo                                                                   \r\n                                                                    ','Female',NULL,1,NULL,'AllinessMalwi'),
(82,'Martha Nkhata','0996677556','9fb65f0679e23dffaa5a33ba04ab7d2a','28961.jpg',0,'0996677556','martha@gmail.com',NULL,NULL,NULL,NULL,'                                                                                                                                                                                                                                                                                xxxxxxxxxxx                Lilongwe xxxxxxxxxxxxxx                                                                       \r\n                                                                    \r\n                                                                    \r\n                                                                    \r\n                                                                    \r\n                                                                    ','                                                                                                                                                                                                                                                                                                Mabulabo    zzzzzzzzzzzzzzzzz                                                                    \r\n                                                                    \r\n                                                                    \r\n                                                                    \r\n                                                                    \r\n                                                                    ','Male',NULL,1,NULL,'martha12345'),
(83,'Martha Nkhata','0888015904','61972f9d46e392ba0442bd87fc736596','26950.jpg',0,'0888015904','mnkhata@gmail.com',NULL,NULL,NULL,NULL,'  Chipata\r\n                                                                    ','Chiboliya\r\n                                                                    ','Male',NULL,1,NULL,'NONE'),
(84,'Bathe','0888015904','61972f9d46e392ba0442bd87fc736596','3416.jpg',0,'0888015904','bathe@gmail.com',NULL,NULL,NULL,NULL,'                                                                                                                                                  Chirmba     cccccccccccccczzzzzz                                                                 \r\n                                                                    \r\n                                                                    \r\n                                                                    ','                                                                                                                                                  Chemusa                                                                      \r\n                                                                    zzzzzzzzzzzzzzzzzz\r\n                                                                    \r\n                                                                    ','Male',NULL,2,NULL,'maalawi12-78'),
(85,'Josephy Nyumbu','0888015904','61972f9d46e392ba0442bd87fc736596','6961.jpg',0,'0888015904','jnyumbu@gmail.com',NULL,NULL,NULL,NULL,'Box 10 ,Mubwa                                                                        \r\n                                                                    ','Box 11,Chipata                                                                        \r\n                                                                    ','Male',NULL,2,NULL,'1223334455'),
(86,'Benda Godfrey','0888015904','61972f9d46e392ba0442bd87fc736596','31748.jpg',0,'0888015904','g@yahoo.com',NULL,NULL,NULL,NULL,'  Lilongwe                                                                      \r\n                                                                    ',' Kasungu                                                                       \r\n                                                                    ','Male',NULL,2,2,'bri - 1233');

/*Table structure for table `wallet` */

DROP TABLE IF EXISTS `wallet`;

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`wallet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

/*Data for the table `wallet` */

insert  into `wallet`(`wallet_id`,`user_id`,`total_amount`,`deleted`) values 
(1,228,0,0),
(2,228,0,0),
(3,937,0,1),
(4,902,0,0),
(5,902,0,0),
(6,6,15998,0),
(7,903,0,0),
(8,904,0,0),
(9,15,0,0),
(10,905,0,1),
(11,905,0,0),
(12,906,0,0),
(13,906,0,0),
(14,976,0,0),
(15,976,0,0),
(16,977,0,0),
(17,961,0,0),
(18,961,0,0),
(19,962,0,0),
(20,962,0,0),
(21,963,0,0),
(22,963,0,0),
(23,964,0,0),
(24,964,0,0),
(25,965,0,0),
(26,965,0,0),
(27,966,0,0),
(28,966,0,0),
(29,967,0,0),
(30,967,0,0),
(31,968,0,0),
(32,968,0,0),
(33,969,0,0),
(34,969,0,0),
(35,905,0,0),
(36,957,0,0),
(37,957,0,0),
(38,958,0,0),
(39,958,0,0),
(40,959,0,0),
(41,959,0,0),
(42,960,0,0),
(43,960,0,0),
(44,243,0,0),
(45,243,0,0),
(46,970,0,0),
(47,970,0,0),
(48,979,0,0),
(49,979,0,0),
(50,980,0,0),
(51,980,0,0),
(52,982,0,0),
(53,982,0,0),
(54,10,4000,0),
(55,10,0,0),
(56,937,0,1),
(57,937,0,0),
(58,937,0,0),
(59,938,0,0),
(60,938,0,0),
(61,939,0,0),
(62,939,0,0),
(63,940,0,0),
(64,940,0,0),
(65,941,0,0),
(66,941,0,0),
(67,942,0,0),
(68,942,0,0),
(69,943,0,0),
(70,943,0,0),
(71,944,0,0),
(72,944,0,0),
(73,945,0,0),
(74,945,0,0),
(75,946,0,0),
(76,946,0,0),
(77,947,0,0),
(78,947,0,0),
(79,948,0,0),
(80,948,0,0),
(81,949,0,0),
(82,949,0,0),
(83,950,0,0),
(84,950,0,0),
(85,950,0,1),
(86,67,0,0),
(87,68,0,0),
(88,69,0,0),
(89,70,0,0),
(90,71,0,0),
(91,72,0,0),
(92,73,0,0),
(93,74,0,0),
(94,75,0,0),
(95,76,0,0),
(96,77,0,0),
(97,78,0,0),
(98,79,0,0),
(99,80,0,0),
(100,81,0,0),
(101,82,0,0),
(102,83,0,0);

/*Table structure for table `wallet_transaction` */

DROP TABLE IF EXISTS `wallet_transaction`;

CREATE TABLE `wallet_transaction` (
  `wallet_transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_type` varchar(100) DEFAULT NULL,
  `tr_amount` int(11) DEFAULT NULL,
  `tr_desc` text,
  `tr_date` text,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `wallet_id` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`wallet_transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `wallet_transaction` */

insert  into `wallet_transaction`(`wallet_transaction_id`,`tr_type`,`tr_amount`,`tr_desc`,`tr_date`,`deleted`,`wallet_id`,`deleted_by`,`delete_date`) values 
(13,'1',5000,'ok','1520294400',0,6,NULL,NULL),
(14,'2',4000,'debit','1520294400',0,6,NULL,NULL),
(15,'3',4000,'mada','1520294400',0,6,NULL,NULL);

/*Table structure for table `year` */

DROP TABLE IF EXISTS `year`;

CREATE TABLE `year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `year` */

insert  into `year`(`id`,`year`) values 
(1,'2015'),
(2,'2016'),
(3,'2017'),
(4,'2018'),
(5,'2019'),
(6,'2020'),
(7,'2021'),
(8,'2022'),
(9,'2023'),
(10,'2024'),
(11,'2025');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
