DROP TABLE IF EXISTS `#__debtticker`;
DROP TABLE IF EXISTS `#__debtticker_ratelog`;
 
CREATE TABLE `#__debtticker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current_liabilities` DECIMAL(11,2) NOT NULL,
  `start_date` DATETIME NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__debtticker` (`current_liabilities`) VALUES (400000000);

CREATE TABLE `#__debtticker_ratelogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` varchar(25) NOT NULL,
  `rate_date` date NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;