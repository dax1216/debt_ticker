DROP TABLE IF EXISTS `#__debtticker_liabilitylogs`;
DROP TABLE IF EXISTS `#__debtticker_ratelogs`;
 
CREATE TABLE `#__debtticker_liabilitylogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `liability` DECIMAL(13,2) NOT NULL,
  `comp_rate` DECIMAL(11,3) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__debtticker_ratelogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate1` DECIMAL(11,2) NOT NULL,
  `rate2` DECIMAL(11,2) NOT NULL,
  `comp_rate` DECIMAL(11,2) NOT NULL,
  `rate_date` date NOT NULL,
  `debit_value` DECIMAL(11,2) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;