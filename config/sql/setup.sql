##### create database #####
	create database myoffice;

##### create table user #####
CREATE TABLE `user` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT,
 `uname` char(30) DEFAULT NULL,
 `pass` char(30) DEFAULT NULL,
 `name` char(50) NOT NULL,
 `company` char(50) NOT NULL,
 `phno` char(15) NOT NULL,
 `email` char(100) NOT NULL,
 `website` char(75) NOT NULL,
 `city` char(100) NOT NULL,
 `state` char(50) NOT NULL,
 `address` longtext NOT NULL,
 `begin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `user_pin` char(5) NOT NULL,
 PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1

structure for table directory
CREATE TABLE `directory` (
 `unique_sno` int(11) NOT NULL AUTO_INCREMENT,
 `Name` char(150) DEFAULT NULL,
 `Company` char(150) DEFAULT NULL,
 `Business` char(150) DEFAULT NULL,
 `Home` char(150) DEFAULT NULL,
 `Mobile` char(150) DEFAULT NULL,
 `Fax` char(150) DEFAULT NULL,
 `Email` char(150) DEFAULT NULL,
 `Website` char(150) DEFAULT NULL,
 `Street` char(150) DEFAULT NULL,
 `City` char(150) DEFAULT NULL,
 `State` char(150) DEFAULT NULL,
 `Pin_Number` char(150) DEFAULT NULL,
 `Country` char(150) DEFAULT NULL,
 PRIMARY KEY (`unique_sno`)

structure for table clock
CREATE TABLE `clock_2` (
 `sno` int(11) NOT NULL AUTO_INCREMENT,
 `due_date` date NOT NULL,
 `title` char(50) NOT NULL,
 `dis` char(100) NOT NULL,
 `start_time` char(10) NOT NULL,
 `end_time` char(10) NOT NULL,
 `type` char(15) NOT NULL,
 `cat` char(10) NOT NULL,
 `rept` char(10) NOT NULL,
 `priority` char(15) NOT NULL,
 `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `pending` char(10) NOT NULL DEFAULT 'no',
 `active` char(3) NOT NULL DEFAULT 'yes',
 `day_of_week` char(10) NOT NULL,
 `day_of_month` char(2) NOT NULL,
 `month` char(2) NOT NULL,
 `remind` char(10) NOT NULL,
 PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1