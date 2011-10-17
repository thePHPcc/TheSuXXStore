CREATE TABLE IF NOT EXISTS `comments` (
  `CID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PID` int(10) unsigned NOT NULL,
  `AUTHOR` varchar(200) NOT NULL,
  `COMMENT` text NOT NULL,
  `PICTURE` varchar(200) NOT NULL,
  PRIMARY KEY (`CID`),
  KEY `PID` (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `PID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `LABEL` varchar(200) NOT NULL,
  `IMG` varchar(200) NOT NULL,
  `PRICE` int(11) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWD` varchar(80) NOT NULL,
  `EMAIL` varchar(80) NOT NULL,
  `NAME` varchar(80) NOT NULL,
  `DESCR` text NOT NULL,
  `PICTURE` varchar(80) NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

