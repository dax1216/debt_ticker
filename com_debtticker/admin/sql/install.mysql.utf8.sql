DROP TABLE IF EXISTS `#__debtticker_debtlogsminutes`;
DROP TABLE IF EXISTS `#__debtticker_debtlogsdaily`;
 
CREATE TABLE `#__debtticker_debtlogsminutes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `debt` DECIMAL(13,2) NOT NULL,
  `comp_rate` DECIMAL(11,3) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__debtticker_debtlogsdaily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` DECIMAL(11,2) NOT NULL,
  `rate_val1` DECIMAL(11,2) NOT NULL,
  `rate_val2` DECIMAL(11,2) NOT NULL,
  `comp_rate` DECIMAL(11,2) NOT NULL,
  `comp_rate_val` DECIMAL(11,2) NOT NULL,
  `rate_date` date NOT NULL,
  `debt` DECIMAL(11,2) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;