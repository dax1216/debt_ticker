DROP TABLE IF EXISTS `#__debtticker`;
 
CREATE TABLE `#__debtticker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_before` varchar(256) NOT NULL,
  `text_after` varchar(256) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__debtticker` (`text_before`, `text_after`) VALUES
        ('Hello World!' ,'Good bye World!');

CREATE TABLE `#__debtticker_rate_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `log_date` timestamp NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;