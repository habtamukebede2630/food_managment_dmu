DROP TABLE IF EXISTSaccount;

CREATE TABLE `account` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

INSERT INTO account VALUES("34","adminsterator","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("35","headcafe","fcea920f7412b5da7be0cf42b8c93759","1");
INSERT INTO account VALUES("36","foodstore","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("37","president","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("38","vicepresident","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("39","Tickerhead","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("40","enterprise","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("41","Merchant","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("42","chef","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("43","registrar","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("44","electerical","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("45","directorate","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("46","finance","6537e99af2c2223642df9f70a0b5afca","1");
INSERT INTO account VALUES("47","union","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("48","nurse","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("49","proctor","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("50","purchase","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("51","storemanager","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("52","admin","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("53","hk","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("54","civil","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("55","COTOM","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("56","tick","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("57","chef01","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("58","finance002","e10adc3949ba59abbe56e057f20f883e","1");
INSERT INTO account VALUES("59","oliyad123","e10adc3949ba59abbe56e057f20f883e","1");


DROP TABLE IF EXISTSailingstudent;

CREATE TABLE `ailingstudent` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `ayear` varchar(100) NOT NULL,
  `studid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `sicklevel` varchar(100) NOT NULL,
  `recommendation` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `senderid` varchar(100) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `studid_2` (`studid`),
  KEY `studid` (`studid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO ailingstudent VALUES("4","4th","ter/1104/10","Hagernesh worku","24","F","electerical","ulcer","medium","less salty food","registered","nurse");
INSERT INTO ailingstudent VALUES("5","4th","ter/1100/10","Berihun  solomon","25","M","electerical","ul","medium","less salty food","registered","nurse");


DROP TABLE IF EXISTSassignmenu;

CREATE TABLE `assignmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(100) NOT NULL,
  `breakfast` varchar(100) NOT NULL,
  `lunch` varchar(100) NOT NULL,
  `dinner` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO assignmenu VALUES("2","monday","rice with bread","misr and injera","enjera with kik");
INSERT INTO assignmenu VALUES("9","tuesday","rice with bread","misr and injera","enjera with kik");


DROP TABLE IF EXISTSbirr;

CREATE TABLE `birr` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `senderid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `student` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `fod` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

INSERT INTO birr VALUES("16","2022/06/14","directorate1","solomon","daniel","111.png","3","1350","For non-cafe","","request");
INSERT INTO birr VALUES("18","2022/06/14","directorate1","solomon","daniel","111.png","3","1350","For non-cafe","","request");
INSERT INTO birr VALUES("19","2022/06/23","directorate1","solomon","daniel","111.png","3","1350","For non-cafe","","request");
INSERT INTO birr VALUES("20","2022/06/25","directorate1","solomon","daniel","111.png","12","180","internship","electerical","accept");
INSERT INTO birr VALUES("29","2022/06/26","directorate1","solomon","daniel","111.png","1","15","internship","civil","accept");
INSERT INTO birr VALUES("30","2022/06/26","directorate1","solomon","daniel","111.png","12","180","internship","electerical","accept");
INSERT INTO birr VALUES("31","2022/06/27","directorate1","solomon","daniel","111.png","2","900","For non-cafe","","request");
INSERT INTO birr VALUES("32","2022/06/27","directorate1","solomon","daniel","111.png","2","900","For non-cafe","","request");
INSERT INTO birr VALUES("35","2022/06/28","directorate1","solomon","daniel","111.png","12","180","internship","electerical","accept");
INSERT INTO birr VALUES("51","2022/07/02","directorate1","solomon","daniel","111.png","12","8820","internship","electerical","accept");
INSERT INTO birr VALUES("52","2022/07/04","directorate1","solomon","daniel","111.png","12","7380","internship","electerical","accept");
INSERT INTO birr VALUES("53","2022/07/05","directorate1","solomon","daniel","111.png","12","5760","internship","electerical","accept");
INSERT INTO birr VALUES("54","2022/07/07","directorate1","solomon","daniel","111.png","4","1800","For non-cafe","","request");
INSERT INTO birr VALUES("55","2022/07/08","directorate1","solomon","daniel","111.png","4","1800","For non-cafe","","request");
INSERT INTO birr VALUES("56","2022/07/13","directorate","Adane","Abebaw","IMG_20190711_003015_409.jpg","5","2250","For non-cafe","","request");
INSERT INTO birr VALUES("57","2022/07/13","directorate","Adane","Abebaw","IMG_20190711_003015_409.jpg","5","2250","For non-cafe","","request");
INSERT INTO birr VALUES("61","2022/07/14","directorate","Adane","Abebaw","IMG_20190711_003015_409.jpg","13","7410","internship","electerical","request");
INSERT INTO birr VALUES("62","2022/07/15","directorate","Adane","Abebaw","IMG_20190711_003015_409.jpg","13","6240","internship","electerical","request");


DROP TABLE IF EXISTSbreaktime;

CREATE TABLE `breaktime` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `studid` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `acyear` varchar(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `meal` varchar(5) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `cyear` varchar(10) NOT NULL,
  `senderid` varchar(20) NOT NULL,
  `le` date NOT NULL,
  `re` date NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO breaktime VALUES("1","2022-07-14","ter/120910","Melaku wubetu","2022","software","29","","4th","proctor","2022-07-14","2022-07-31");


DROP TABLE IF EXISTSdailyexpenditure;

CREATE TABLE `dailyexpenditure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `dailyexpenditure` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `senderid` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=408 DEFAULT CHARSET=latin1;

INSERT INTO dailyexpenditure VALUES("389","2022-07-11","onion","0.33","Monday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("390","2022-07-12","maize","5.16","Tuesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("391","2022-07-12","rice","6.48","Tuesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("392","2022-07-12","melaku","3.96","Tuesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("393","2022-07-13","zz","0.36","Wednesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("394","2022-07-13","oil","0.36","Wednesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("395","2022-07-13","rr","7.8","Wednesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("396","2022-07-13","kik","6.5","Wednesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("397","2022-07-13","tealeaves","10.01","Wednesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("398","2022-07-13","soyabean","10.4","Wednesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("399","2022-07-13","melaku","0.26","Wednesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("400","2022-07-13","rice","4.29","Wednesday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("401","2022-07-14","flour","4.42","Thursday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("402","2022-07-14","oil","0.65","Thursday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("403","2022-07-14","salad","6.5","Thursday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("404","2022-07-15","pasta","6.5","Friday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","approve");
INSERT INTO dailyexpenditure VALUES("406","2022-07-15","teff","6.5","Friday","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","A");
INSERT INTO dailyexpenditure VALUES("407","2023-01-07","zz","6","Saturday","oliyad123","oliyad","gizaw","111.png","approve");


DROP TABLE IF EXISTSdailymenu;

CREATE TABLE `dailymenu` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `senderid` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(30) NOT NULL,
  `breakfast` varchar(50) NOT NULL,
  `lunch` varchar(50) NOT NULL,
  `dinner` varchar(50) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO dailymenu VALUES("6","headcafe","2022-07-10","monday","rice with bread","misr and injera","enjera with kik");
INSERT INTO dailymenu VALUES("7","headcafe","2022-07-10","sunday","rice with bread","pasta","enjera with kik");
INSERT INTO dailymenu VALUES("8","headcafe","2022-07-13","wednesday","firfir","misir wot with enjera","enjera with kik");
INSERT INTO dailymenu VALUES("9","headcafe","2022-07-14","thursday","rice with bread","misir wot with enjera","shiro with enjera");


DROP TABLE IF EXISTSfeedback;

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `comment` longtext NOT NULL,
  `recieverid` varchar(50) NOT NULL,
  `statu` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

INSERT INTO feedback VALUES("18","2022-07-12","habtamu","kebede","099015067","adminster","					\n			jkhkhkhkhkhkhhhj	","Almaz","replay");
INSERT INTO feedback VALUES("19","2022-07-12","habtamu","kebede","099015067","adminster","					\n			jkhkhkhkhkhkhhhj	","Almaz","replay");
INSERT INTO feedback VALUES("20","2022-07-13","habtamu","kebede","099015067","admin","					\n			hey almaz	","Almaz","replay");
INSERT INTO feedback VALUES("22","2022-07-13","Almaz","Yitna","0934567711","chef","					\n				dddddddw","Almaz","replay");
INSERT INTO feedback VALUES("25","2022-07-14","habtamu","kebede","099015067","admin","					\n				hey chef","Almaz","replay");
INSERT INTO feedback VALUES("29","2022-07-14","habtamu","kebede","099015067","admin","					\n	hey chef			","chef","comment");
INSERT INTO feedback VALUES("31","2022-07-14","Sisay","Daniel","09445678","departmenthead","					\n				hey admin","habtamu","replay");
INSERT INTO feedback VALUES("33","2022-07-14","Almaz","Yitna","0934567711","chef","					\n				hey admin im fine","habtamu","replay");
INSERT INTO feedback VALUES("34","2022-07-14","habtamu","kebede","099015067","admin","					\n			contact me some system faikure happend	","Almaz","replay");
INSERT INTO feedback VALUES("37","2022-07-15","Almaz","Yitna","0934567711","chef","					\n		hey headcafe	","headcafe","comment");


DROP TABLE IF EXISTSfinancerequest;

CREATE TABLE `financerequest` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL,
  `senderid` varchar(50) NOT NULL,
  `importitem` varchar(50) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `kind` varchar(50) NOT NULL,
  `totalprice` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `itemid` (`itemid`),
  CONSTRAINT `financerequest_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `incomingfood` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=321 DEFAULT CHARSET=latin1;

INSERT INTO financerequest VALUES("278","53","Merchant","zz","474.25","","43400","accept");
INSERT INTO financerequest VALUES("279","54","Merchant","berebew","190.8","","10525","A");
INSERT INTO financerequest VALUES("280","55","Merchant","soyabean","84.1","","5000","A");
INSERT INTO financerequest VALUES("281","56","Merchant","misir","195.05","","10000","A");
INSERT INTO financerequest VALUES("282","57","Merchant","maize","85.38","","3000","A");
INSERT INTO financerequest VALUES("283","58","Merchant","pasta","1078.61","","20000","A");
INSERT INTO financerequest VALUES("284","63","Merchant","flour","245.58","","9500","A");
INSERT INTO financerequest VALUES("285","64","Merchant","habtamu","81.2","","3535","A");
INSERT INTO financerequest VALUES("286","65","Merchant","yoni","21.1","","1085","A");
INSERT INTO financerequest VALUES("287","66","Merchant","mebratu","4.08","","435","A");
INSERT INTO financerequest VALUES("288","67","Merchant","oil","499.01","","25000","A");
INSERT INTO financerequest VALUES("289","68","Merchant","dere","31","","1550","A");
INSERT INTO financerequest VALUES("291","70","Merchant","garlic","1193.74","","38050","A");
INSERT INTO financerequest VALUES("292","71","Merchant","tealeaves","183.29","","5050","A");
INSERT INTO financerequest VALUES("293","72","Merchant","melaku","11.78","","560","A");
INSERT INTO financerequest VALUES("294","73","Merchant","kefe","16","","400","A");
INSERT INTO financerequest VALUES("295","74","Merchant","salt","200","","10000","A");
INSERT INTO financerequest VALUES("296","75","Merchant","josi","101","","2525","A");
INSERT INTO financerequest VALUES("297","76","Merchant","berbere","100","","5000","A");
INSERT INTO financerequest VALUES("298","77","Merchant","kik","194.5","","10035","A");
INSERT INTO financerequest VALUES("299","53","Merchant","zz","474.25","","43400","accept");
INSERT INTO financerequest VALUES("300","54","Merchant","berebew","190.8","","10525","A");
INSERT INTO financerequest VALUES("301","55","Merchant","soyabean","84.1","","5000","A");
INSERT INTO financerequest VALUES("302","56","Merchant","misir","195.05","","10000","A");
INSERT INTO financerequest VALUES("303","57","Merchant","maize","85.38","","3000","A");
INSERT INTO financerequest VALUES("304","58","Merchant","pasta","1078.61","","20000","A");
INSERT INTO financerequest VALUES("305","63","Merchant","flour","245.58","","9500","A");
INSERT INTO financerequest VALUES("306","64","Merchant","habtamu","81.2","","3535","A");
INSERT INTO financerequest VALUES("307","65","Merchant","yoni","21.1","","1085","A");
INSERT INTO financerequest VALUES("308","66","Merchant","mebratu","4.08","","435","A");
INSERT INTO financerequest VALUES("309","67","Merchant","oil","499.36","","25200","A");
INSERT INTO financerequest VALUES("310","68","Merchant","dere","31","","1550","A");
INSERT INTO financerequest VALUES("312","70","Merchant","garlic","1193.74","","38050","A");
INSERT INTO financerequest VALUES("313","71","Merchant","tealeaves","183.29","","5050","A");
INSERT INTO financerequest VALUES("314","72","Merchant","melaku","11.78","","560","A");
INSERT INTO financerequest VALUES("315","73","Merchant","kefe","16","","400","A");
INSERT INTO financerequest VALUES("316","74","Merchant","salt","200","","10000","A");
INSERT INTO financerequest VALUES("317","75","Merchant","josi","101","","2525","A");
INSERT INTO financerequest VALUES("318","76","Merchant","berbere","100","","5000","A");
INSERT INTO financerequest VALUES("319","77","Merchant","kik","194.5","","10035","A");
INSERT INTO financerequest VALUES("320","78","Merchant","salad","10.5","","590","A");


DROP TABLE IF EXISTSfoodscale;

CREATE TABLE `foodscale` (
  `date` date NOT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(100) NOT NULL,
  `scale` varchar(100) NOT NULL,
  `dailyexpenditure` varchar(100) NOT NULL,
  `sprice` varchar(100) NOT NULL,
  `totalprice` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `eid` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

INSERT INTO foodscale VALUES("2022-07-13","110","zz","liter","0.03","35","1.05","wednesday","directorate");
INSERT INTO foodscale VALUES("2022-07-13","111","oil","liter","0.03","30","0.9","wednesday","directorate");
INSERT INTO foodscale VALUES("2022-07-13","112","kik","killogram","0.5","50","25","wednesday","directorate");
INSERT INTO foodscale VALUES("2022-07-13","113","rr","killogram","0.6","15","9","wednesday","directorate");
INSERT INTO foodscale VALUES("2022-07-13","114","tealeaves","packet","0.77","45","34.65","wednesday","directorate");
INSERT INTO foodscale VALUES("2022-07-13","115","soyabean","killogram","0.8","35","28","wednesday","directorate");
INSERT INTO foodscale VALUES("2022-07-13","116","melaku","killogram","0.02","35","0.7","wednesday","directorate");
INSERT INTO foodscale VALUES("2022-07-13","117","rice","killogram","0.33","50","16.5","wednesday","directorate");
INSERT INTO foodscale VALUES("2022-07-14","118","flour","killogram","0.34","30","10.2","thursday","directorate");
INSERT INTO foodscale VALUES("2022-07-14","121","oil","liter","0.05","200","10","thursday","directorate");
INSERT INTO foodscale VALUES("2022-07-14","122","salad","killogram","0.5","35","17.5","thursday","directorate");
INSERT INTO foodscale VALUES("2022-07-15","123","pasta","packet","0.5","35","17.5","friday","directorate");
INSERT INTO foodscale VALUES("2022-07-15","124","teff","killogram","0.5","35","17.5","friday","directorate");
INSERT INTO foodscale VALUES("2023-01-07","125","zz","killogram","0.5","45","22.5","saturday","directorate");


DROP TABLE IF EXISTSincomingfood;

CREATE TABLE `incomingfood` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `scale` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `sprice` varchar(100) NOT NULL,
  `tprice` varchar(100) NOT NULL,
  `eid` varchar(100) NOT NULL,
  `supplayer` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

INSERT INTO incomingfood VALUES("53","2022-07-02","zz","kilogram","468.25","24","43400","foodstore","merchant","pay");
INSERT INTO incomingfood VALUES("54","2022-07-03","berebew","kilogram","190.8","35","10525","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("55","2022-07-03","soyabean","kilogram","84.1","50","5000","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("56","2022-07-03","misir","kilogram","195.05","50","10000","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("57","2022-07-03","maize","kilogram","85.38","30","3000","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("58","2022-07-03","pasta","kilogram","1072.11","50","20000","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("59","2022-07-04","onion","kilogram","67.18","50","5000","foodstore","enterprise","pending");
INSERT INTO incomingfood VALUES("60","2022-07-04","rice","kilogram","53.59","35","3500","foodstore","enterprise","pending");
INSERT INTO incomingfood VALUES("61","2022-07-04","rr","kilogram","82.3","35","3500","foodstore","enterprise","pending");
INSERT INTO incomingfood VALUES("62","2022-07-04","aa","kilogram","100","50","5000","foodstore","enterprise","pending");
INSERT INTO incomingfood VALUES("63","2022-07-04","flour","kilogram","245.58","50","9500","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("64","2022-07-06","habtamu","kilogram","81.2","35","3535","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("65","2022-07-07","yoni","kilogram","21.1","35","1085","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("66","2022-07-07","mebratu","kilogram","4.08","50","435","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("67","2022-07-08","oil","liter","499.36","50","25200","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("68","2022-07-08","dere","kilogram","31","50","1550","storemanager","merchant","pending");
INSERT INTO incomingfood VALUES("70","2022-07-08","garlic","kilogram","1193.74","40","38050","storemanager","merchant","pending");
INSERT INTO incomingfood VALUES("71","2022-07-09","tealeaves","kilogram","183.29","50","5050","foodstore","merchant","pending");
INSERT INTO incomingfood VALUES("72","2022-07-12","melaku","kilogram","11.78","35","560","foodstore","merchant","notpay");
INSERT INTO incomingfood VALUES("73","2022-07-12","kefe","kilogram","16","25","400","foodstore","merchant","notpay");
INSERT INTO incomingfood VALUES("74","2022-07-12","salt","kilogram","200","50","10000","foodstore","merchant","notpay");
INSERT INTO incomingfood VALUES("75","2022-07-12","josi","kilogram","101","25","2525","foodstore","merchant","notpay");
INSERT INTO incomingfood VALUES("76","2022-07-13","berbere","kilogram","100","50","5000","foodstore","merchant","notpay");
INSERT INTO incomingfood VALUES("77","2022-07-13","kik","kilogram","194.5","35","10035","foodstore","merchant","notpay");
INSERT INTO incomingfood VALUES("78","2022-07-14","salad","kilogram","10.5","30","590","foodstore","merchant","notpay");
INSERT INTO incomingfood VALUES("79","2022-07-15","teff","kilogram","104.5","35","2885","foodstore","merchant","notpay");


DROP TABLE IF EXISTSinternship;

CREATE TABLE `internship` (
  `date` date NOT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `senderid` varchar(20) NOT NULL,
  `startdate` varchar(20) NOT NULL,
  `returndate` varchar(20) NOT NULL,
  `place` varchar(20) NOT NULL,
  `reason` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(100) NOT NULL,
  `material` varchar(20) NOT NULL,
  `number` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

INSERT INTO internship VALUES("2022-07-14","55","electerical","2022-07-14","2022-08-21","AA","internship","electerical","4th","money","13","approve");
INSERT INTO internship VALUES("2022-07-15","56","electerical","2022-07-15","2022-08-16","AA","internship","electerical","4th","money for food","13","approve");


DROP TABLE IF EXISTSlogfile;

CREATE TABLE `logfile` (
  `nu` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `ipadd` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`nu`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO logfile VALUES("1","admin","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 02:25:36","admin","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("2","directorate","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 02:27:47","studentdirectorate","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("3","admin","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 02:28:03","admin","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("4","admin","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 02:57:01","admin","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("5","headcafe","fcea920f7412b5da7be0cf42b8c93759","Login","2022-07-15 03:04:41","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("6","admin","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 04:02:58","admin","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("7","admin","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 04:05:40","admin","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("8","directorate","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 04:09:50","studentdirectorate","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("9","headcafe","fcea920f7412b5da7be0cf42b8c93759","Login","2022-07-15 04:12:06","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("10","foodstore","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 04:13:18","foodstore","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("11","directorate","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 04:16:29","studentdirectorate","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("12","headcafe","fcea920f7412b5da7be0cf42b8c93759","Login","2022-07-15 04:17:41","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("13","foodstore","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 04:18:44","foodstore","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("14","headcafe","fcea920f7412b5da7be0cf42b8c93759","Login","2022-07-15 04:19:45","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("15","foodstore","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 04:20:23","foodstore","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("16","directorate","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 04:22:52","studentdirectorate","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("17","headcafe","fcea920f7412b5da7be0cf42b8c93759","Login","2022-07-15 05:52:17","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("18","foodstore","e10adc3949ba59abbe56e057f20f883e","Login","2022-07-15 05:52:46","foodstore","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("19","headcafe","fcea920f7412b5da7be0cf42b8c93759","Login","2022-07-15 05:54:14","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("20","headcafe","fcea920f7412b5da7be0cf42b8c93759","Login","2022-08-03 15:50:26","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("21","registrar","e10adc3949ba59abbe56e057f20f883e","Login","2022-08-03 15:53:17","registrar","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("22","headcafe","fcea920f7412b5da7be0cf42b8c93759","Login","2022-08-03 15:54:19","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("23","foodstore","e10adc3949ba59abbe56e057f20f883e","Login","2022-09-14 16:35:04","foodstore","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("24","adminsterator","e10adc3949ba59abbe56e057f20f883e","Login","2023-01-07 10:10:19","admin","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("25","oliyad123","e10adc3949ba59abbe56e057f20f883e","Login","2023-01-07 10:23:24","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("26","oliyad123","e10adc3949ba59abbe56e057f20f883e","Login","2023-01-07 10:30:08","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("27","foodstore","e10adc3949ba59abbe56e057f20f883e","Login","2023-01-07 10:34:45","foodstore","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("28","oliyad123","e10adc3949ba59abbe56e057f20f883e","Login","2023-01-07 10:36:27","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("29","directorate","e10adc3949ba59abbe56e057f20f883e","Login","2023-01-07 10:37:10","studentdirectorate","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("30","oliyad123","e10adc3949ba59abbe56e057f20f883e","Login","2023-01-07 10:39:42","headcafe","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("31","foodstore","e10adc3949ba59abbe56e057f20f883e","Login","2023-01-07 10:41:19","foodstore","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("32","admin","e10adc3949ba59abbe56e057f20f883e","Login","2023-01-20 07:18:54","admin","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("33","admin","e10adc3949ba59abbe56e057f20f883e","Login","2023-08-08 15:12:28","admin","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("34","admin","e10adc3949ba59abbe56e057f20f883e","Login","2023-08-08 17:36:44","admin","2C-60-0C-F6-A7-D6","correct login");
INSERT INTO logfile VALUES("35","admin","e10adc3949ba59abbe56e057f20f883e","Login","2023-08-09 14:27:19","admin","08-8F-C3-3E-01-8C","correct login");
INSERT INTO logfile VALUES("36","admin","e10adc3949ba59abbe56e057f20f883e","Login","2023-08-20 23:02:32","admin","08-8F-C3-3E-01-8C","correct login");


DROP TABLE IF EXISTSmaterial;

CREATE TABLE `material` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sprice` decimal(11,0) NOT NULL,
  `tprice` decimal(11,0) NOT NULL,
  `eid` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO material VALUES("3","sugar","400","300","120000","foodstore","enterprise");
INSERT INTO material VALUES("4","tealeaf","200","12","2400","foodstore","enterprise");
INSERT INTO material VALUES("5","teff","120","2300","230700","foodstore","merchant");
INSERT INTO material VALUES("6","pasta","300","250","75000","foodstore","merchant");
INSERT INTO material VALUES("7","breadpowder","290","15","6150","foodstore","merchant");
INSERT INTO material VALUES("8","garlic","100","35","3500","foodstore","merchant");
INSERT INTO material VALUES("9","soyabean","100","35","3500","foodstore","merchant");
INSERT INTO material VALUES("10","maize","150","50","7500","foodstore","merchant");


DROP TABLE IF EXISTSmateriallack;

CREATE TABLE `materiallack` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `senderid` varchar(50) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `kind` varchar(50) NOT NULL,
  `quantity` decimal(20,0) NOT NULL,
  `model` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `supplayer` varchar(100) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTSnoncafe;

CREATE TABLE `noncafe` (
  `date` date NOT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `eid` varchar(100) NOT NULL,
  `studid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cyear` varchar(100) NOT NULL,
  `acyear` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `studid` (`studid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

INSERT INTO noncafe VALUES("2022-07-02","78","headcafe0023","ter/1101/10","Bereket sisay","4th","2022","electerical","M","noncafe","pay");
INSERT INTO noncafe VALUES("2022-07-03","79","headcafe0023","ter/1102/10","cherinet demsis","4th","2022","electerical","M","noncafe","pay");
INSERT INTO noncafe VALUES("2022-07-05","80","headcafe0023","ter/1103/10","chalachew daniel","4th","2022","electerical","M","noncafe","pay");
INSERT INTO noncafe VALUES("2022-07-05","81","headcafe0023","ter/2330/10","liya Geremew","5th","2022","civil","F","noncafe","pay");
INSERT INTO noncafe VALUES("2022-07-12","82","headcafe","ter/1108/10","Geremew desalegn","4th","2022","electerical","M","noncafe","pay");
INSERT INTO noncafe VALUES("2022-07-14","83","headcafe","ter/1211/10","Metasebiya Getaneh","4th","2022","software","F","noncafe","notpay");
INSERT INTO noncafe VALUES("2023-01-07","84","oliyad123","ter/0812/10","Abinet mekunint","4th","2023","electerical","M","noncafe","notpay");


DROP TABLE IF EXISTSnotice;

CREATE TABLE `notice` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `new` varchar(255) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `dat` date NOT NULL,
  `lname` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTSpunish;

CREATE TABLE `punish` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `studid` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cyear` varchar(100) NOT NULL,
  `acyear` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `reason` varchar(100) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `reason` (`reason`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO punish VALUES("12","2022","directorate1","ter/1100/10","Berihun  solomon","4th","2022","electerical","   m"," edw");
INSERT INTO punish VALUES("18","2022","directorate1","ter/0833/10","Alemneh  daniel","4th","2022","electerical","M"," misb");


DROP TABLE IF EXISTSreplacedfood;

CREATE TABLE `replacedfood` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `eaten` varchar(50) NOT NULL,
  `noteaten` varchar(50) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO replacedfood VALUES("1","yoni","soyabean");
INSERT INTO replacedfood VALUES("2","yoni","dere");


DROP TABLE IF EXISTSshortageofitem;

CREATE TABLE `shortageofitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(100) NOT NULL,
  `datee` date NOT NULL,
  `day` varchar(100) NOT NULL,
  `dailyexpenditure` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTSspecialcase;

CREATE TABLE `specialcase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(30) NOT NULL,
  `scale` varchar(30) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `senderid` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `sprice` varchar(20) NOT NULL,
  `tprice` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO specialcase VALUES("1","oil","litter","200","headcafe0023","2022-07-06","350","70000");


DROP TABLE IF EXISTSspecialfood;

CREATE TABLE `specialfood` (
  `date` date NOT NULL,
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ayear` varchar(20) NOT NULL,
  `cyear` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `diag` varchar(100) NOT NULL,
  `recomm` varchar(100) NOT NULL,
  `meal` varchar(10) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO specialfood VALUES("2022-06-27","3","ter/1104/10","Hagernesh worku","2022/06/27","4th","F","electerical","ulcer","less salty food","9","headcafe0023","special");
INSERT INTO specialfood VALUES("2022-07-03","4","ter/1100/10","Berihun  solomon","2022/07/03","4th","M","electerical","ul","less salty food","5","headcafe0023","special");


DROP TABLE IF EXISTSstudent;

CREATE TABLE `student` (
  `meal` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `t` varchar(100) NOT NULL,
  PRIMARY KEY (`meal`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO student VALUES("2","Abinet mekunint","ter/0812/10","M","electerical","4th","noncafe","null");
INSERT INTO student VALUES("3","Alemneh  daniel","ter/0833/10","M","electerical","4th","active","");
INSERT INTO student VALUES("4","Asrat wogene","ter/0911/10","M","electerical","4th","active","");
INSERT INTO student VALUES("5","Berihun  solomon","ter/1100/10","M","electerical","4th","active","");
INSERT INTO student VALUES("6","Bereket sisay","ter/1101/10","M","electerical","4th","noncafe","null");
INSERT INTO student VALUES("7","cherinet demsis","ter/1102/10","M","electerical","4th","noncafe","null");
INSERT INTO student VALUES("8","chalachew daniel","ter/1103/10","M","electerical","4th","noncafe","null");
INSERT INTO student VALUES("9","Hagernesh worku","ter/1104/10","F","electerical","4th","active","");
INSERT INTO student VALUES("10","Hayal daniel","ter/1105/10","F","electerical","4th","active","");
INSERT INTO student VALUES("11","Hagere abayneh","ter/1106/10","F","electerical","4th","active","");
INSERT INTO student VALUES("12","hasen mohhamed","ter/1107/10"," M","electerical","4th","active","take");
INSERT INTO student VALUES("13","Geremew desalegn","ter/1108/10","M","electerical","4th","noncafe","null");
INSERT INTO student VALUES("14","liya Geremew","ter/2330/10","F","civil","5th","noncafe","null");
INSERT INTO student VALUES("23","Habtamu kebede","ter/1201/10","M","software","4th","active","take");
INSERT INTO student VALUES("24","abdurahman Jemal","ter/0872/10","M","software","4th","active","take");
INSERT INTO student VALUES("25","Habtamu kebede","ter/1206/10","M","electerical","4th","active","");
INSERT INTO student VALUES("26","Abebech Demeke","ter/2235/10","F","electerical","5th","internship","");
INSERT INTO student VALUES("27","Addisu M","ter/1123/10","M","software","4th","active","take");
INSERT INTO student VALUES("28","Metasebiya Getaneh","ter/1211/10","F","software","4th","noncafe","null");
INSERT INTO student VALUES("29","Melaku wubetu","ter/120910","M","software","4th","break","take");


DROP TABLE IF EXISTSuser;

CREATE TABLE `user` (
  `user_id` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `Age` int(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("admin","habtamu","kebede","degree","24","male","099015067","IMG_20190711_003036_150.jpg","admin","2022-07-09");
INSERT INTO user VALUES("adminsterator","Amsalu","Temesgen","master","38","male","0988112344","IMG_20190711_003032_023.jpg","admin","2022-07-08");
INSERT INTO user VALUES("chef","Almaz","Yitna","certeficate","33","female","0934567711","IMG_20190711_003048_642.jpg","chef","2022-07-08");
INSERT INTO user VALUES("chef01","melaku","melese","student","35","male","0934555688","IMG_20190705_085821.jpg","admin","2022-07-14");
INSERT INTO user VALUES("civil","Melkamu","Amare","phd","33","male","0934555682","IMG_20190711_003105_423.jpg","departmenthead","2022-07-09");
INSERT INTO user VALUES("COTOM","abera","Alemu","phd","24","male","0911234567","","departmenthead","2022-07-12");
INSERT INTO user VALUES("directorate","Adane","Abebaw","phd","46","male","0978112367","IMG_20190711_003015_409.jpg","studentdirectorate","2022-07-08");
INSERT INTO user VALUES("electerical","Sisay","Daniel","master","34","male","09445678","IMG_20190711_003048_642.jpg","departmenthead","2022-07-08");
INSERT INTO user VALUES("enterprise","Adane","Molla","certeficate","34","male","0911234566","IMG_20190711_003107_034.jpg","enterprise","2022-07-08");
INSERT INTO user VALUES("finance","Adamu","melese","phd","35","male","0987543211","IMG_20190711_003048_642.jpg","finance","2022-07-08");
INSERT INTO user VALUES("finance002","abebe","ayele","degree","34","male","0967112355","vlcsnap-2021-10-04-13h41m53s165.png","finance","2022-07-15");
INSERT INTO user VALUES("foodstore","sleshi ","Dagnew","degree","35","male","0934555688","IMG_20190711_003032_023.jpg","foodstore","2022-07-08");
INSERT INTO user VALUES("headcafe","Selam","Asnake","degree","34","female","0923456674","IMG_20190711_003032_023.jpg","headcafe","2022-07-08");
INSERT INTO user VALUES("hk","abebe","ayele","phd","23","male","0934555688","IMG_20190711_003041_147.jpg","admin","2022-07-09");
INSERT INTO user VALUES("Merchant","Alemnesh","Zewdie","deploma","41","female","0911234876","IMG_20190711_003039_247.jpg","merchant","2022-07-08");
INSERT INTO user VALUES("nurse","Abeba","Ayele","master","35","female","0989776123","IMG_20190711_003032_023.jpg","nurse","2022-07-08");
INSERT INTO user VALUES("oliyad123","oliyad","gizaw","master","23","male","0934555688","111.png","headcafe","2023-01-07");
INSERT INTO user VALUES("president","Tafere","Melaku","phd","50","male","0911456823","IMG_20190711_003102_682.jpg","president","2022-07-08");
INSERT INTO user VALUES("proctor","Zemenu","Tafese","master","34","male","0911234576","IMG_20190711_003039_247.jpg","proctor","2022-07-08");
INSERT INTO user VALUES("purchase","Abebech","Mekunint","degree","34","female","0923112345","IMG_20190711_003015_409.jpg","purchase","2022-07-08");
INSERT INTO user VALUES("registrar","solomon","Asmare","master","35","male","0940113456","IMG_20190711_003048_642.jpg","registrar","2022-07-08");
INSERT INTO user VALUES("storemanager","habtamu","Ayele","master","34","male","0988712345","IMG_20190711_003032_023.jpg","foodstore","2022-07-08");
INSERT INTO user VALUES("tick","atnafu","legesse","degree","34","male","0913234567","admin.PNG","tickerhead","2022-07-12");
INSERT INTO user VALUES("Tickerhead","Kasech","Mekuanint","degree","34","female","0977123567","IMG_20190711_003105_423.jpg","","2022-07-08");
INSERT INTO user VALUES("union","Abera","Asnake","student","26","","0990113456","IMG_20190711_003032_023.jpg","studentunion","2022-07-08");
INSERT INTO user VALUES("vicepresident","Abebe","Solomon","phd","45","male","0988665431","IMG_20190711_003107_034.jpg","vicepresident","2022-07-08");


DROP TABLE IF EXISTSuserview;

CREATE TABLE `userview` (
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `activity` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;

INSERT INTO userview VALUES("0000-00-00","","1","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","2","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","3","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","4","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","5","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","6","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","7","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","8","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","9","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","10","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","11","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-02","","12","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-03","","13","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-08","","14","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-08","","15","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-09","","16","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-10","","17","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-15","","18","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-15","","19","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-22","02:35:12pm","20","foodstore","sisay","shiferaw","111.png","request material lack.lentlis");
INSERT INTO userview VALUES("2022-06-22","02:37:43pm","21","foodstore","sisay","shiferaw","111.png","request material lack.bread powder");
INSERT INTO userview VALUES("2022-06-22","02:40:33pm","22","foodstore","sisay","shiferaw","111.png","request material lack.bread powder");
INSERT INTO userview VALUES("2022-06-22","03:16:45pm","23","foodstore","sisay","shiferaw","111.png","request material lack.lentlis");
INSERT INTO userview VALUES("2022-06-22","15:03:18:50pm","24","directorate1","solomon","daniel","111.png","reject material lack");
INSERT INTO userview VALUES("2022-06-22","15:03:19:27pm","25","directorate1","solomon","daniel","111.png","reject material lack");
INSERT INTO userview VALUES("2022-06-22","","26","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-23","08:49:38am","27","foodstore","sisay","shiferaw","111.png","request material lack.sugar");
INSERT INTO userview VALUES("2022-06-24","10:19:34pm","28","foodstore","sisay","shiferaw","111.png","request material lack.bread powder");
INSERT INTO userview VALUES("2022-06-25","08:35:12am","29","foodstore","sisay","shiferaw","111.png","request material lack.bread powder");
INSERT INTO userview VALUES("2022-06-25","08:36:18am","30","foodstore","sisay","shiferaw","111.png","request material lack.bread powder");
INSERT INTO userview VALUES("2022-06-25","01:18:34pm","31","foodstore","sisay","shiferaw","111.png","request material lack.ginger");
INSERT INTO userview VALUES("2022-06-25","01:42:33pm","32","foodstore","sisay","shiferaw","111.png","request material lack.rawmeat");
INSERT INTO userview VALUES("2022-06-25","01:45:00pm","33","foodstore","sisay","shiferaw","111.png","request material lack.lentlis");
INSERT INTO userview VALUES("2022-06-25","02:15:07pm","34","foodstore","sisay","shiferaw","111.png","request material lack.rawmeat");
INSERT INTO userview VALUES("2022-06-25","09:28:06pm","35","foodstore","sisay","shiferaw","111.png","request material lack.oyster");
INSERT INTO userview VALUES("2022-06-25","09:28:48pm","36","foodstore","sisay","shiferaw","111.png","request material lack.lentlis");
INSERT INTO userview VALUES("2022-06-26","08:41:25am","37","foodstore","sisay","shiferaw","111.png","request material lack.slad");
INSERT INTO userview VALUES("2022-06-26","08:57:14am","38","foodstore","sisay","shiferaw","111.png","request material lack.abay");
INSERT INTO userview VALUES("2022-06-26","09:00:29am","39","foodstore","sisay","shiferaw","111.png","request material lack.oyster");
INSERT INTO userview VALUES("2022-06-26","23:11:15:59pm","40","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-06-26","23:11:16:55pm","41","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-06-27","00:12:33:05am","42","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-06-27","00:12:34:14am","43","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-06-27","00:12:42:03am","44","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-06-27","22:10:39:50pm","45","headcafe0023","selam","asnake","h.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-06-27","22:10:40:59pm","46","headcafe0023","selam","asnake","h.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-06-27","22:10:45:30pm","47","headcafe0023","selam","asnake","h.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-06-27","22:10:48:10pm","48","headcafe0023","selam","asnake","h.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-06-27","22:10:53:20pm","49","headcafe0023","selam","asnake","h.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-06-27","22:10:57:14pm","50","headcafe0023","selam","asnake","h.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-06-28","07:07:00:58am","51","headcafe0023","selam","asnake","h.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-06-29","22:10:42:10pm","52","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-06-29","","53","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-29","","54","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-29","23:11:53:56pm","55","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-06-30","12:53:26am","56","foodstore","sisay","shiferaw","111.png","request material lack.soyabean");
INSERT INTO userview VALUES("2022-06-30","01:10:23am","57","foodstore","sisay","shiferaw","111.png","request material lack.bread powder");
INSERT INTO userview VALUES("2022-06-30","","58","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-30","","59","admin","","","","update user");
INSERT INTO userview VALUES("2022-06-30","09:09:51:47am","60","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-06-30","09:09:52:16am","61","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-06-30","02:05:34pm","62","foodstore","sisay","shiferaw","111.png","request material lack.addisu");
INSERT INTO userview VALUES("2022-07-01","12:12:34:59pm","63","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-01","12:12:37:03pm","64","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","12:12:37:55pm","65","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","12:12:42:25pm","66","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","12:12:43:15pm","67","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-01","12:12:43:39pm","68","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","12:12:44:20pm","69","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","12:12:47:06pm","70","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-01","12:12:49:38pm","71","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","12:12:51:05pm","72","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-01","13:01:05:42pm","73","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-01","13:01:07:55pm","74","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","13:01:08:48pm","75","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-01","13:01:09:12pm","76","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","13:01:10:47pm","77","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","14:02:02:07pm","78","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-01","14:02:02:28pm","79","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","14:02:03:09pm","80","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-01","14:02:03:30pm","81","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","14:02:05:09pm","82","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","14:02:08:17pm","83","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-01","14:02:09:27pm","84","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-01","23:11:31:20pm","85","unionasnake","adamu","abebe","h.jpg","adamu abebe post notice about for all students");
INSERT INTO userview VALUES("2022-07-01","23:11:35:05pm","86","unionasnake","adamu","abebe","h.jpg","register additional   ");
INSERT INTO userview VALUES("2022-07-01","23:11:38:31pm","87","unionasnake","adamu","abebe","h.jpg","adamu abebe post notice about for all studentsc");
INSERT INTO userview VALUES("2022-07-03","08:08:30:22am","88","headcafe0023","selam","asnake","h.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-07-04","09:09:54:51am","89","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-04","09:09:54:57am","90","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-04","09:09:56:04am","91","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-04","21:09:14:25pm","92","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-04","21:09:14:25pm","93","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-04","21:09:14:25pm","94","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-04","21:09:14:26pm","95","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-04","09:16:20pm","96","foodstore","sisay","shiferaw","111.png","request material lack.zz");
INSERT INTO userview VALUES("2022-07-04","09:18:41pm","97","foodstore","sisay","shiferaw","111.png","request material lack.aa");
INSERT INTO userview VALUES("2022-07-04","09:26:56pm","98","foodstore","sisay","shiferaw","111.png","request material lack.flour");
INSERT INTO userview VALUES("2022-07-04","21:09:55:46pm","99","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-04","22:10:25:01pm","100","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-05","09:09:30:06am","101","directorate1","solomon","daniel","111.png","Approve finance request");
INSERT INTO userview VALUES("2022-07-05","09:09:31:07am","102","finance01","mekuanint","seiyfu","h.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-05","10:10:16:43am","103","headcafe0023","selam","asnake","h.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-07-05","14:02:34:47pm","104","headcafe0023","selam","asnake","h.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-07-06","20:08:16:58pm","105","headcafe0023","selam","asnake","h.jpg","register new income 200 litter oil");
INSERT INTO userview VALUES("2022-07-08","","106","adminsterator","","","","update user");
INSERT INTO userview VALUES("2022-07-09","13:01:09:24pm","107","finance","Adamu","melese","IMG_20190711_003048_642.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-09","10:07:47pm","108","foodstore","sleshi ","Dagnew","IMG_20190711_003032_023.jpg","request material lack.garlic");
INSERT INTO userview VALUES("2022-07-10","01:01:16:44am","109","directorate","Adane","Abebaw","IMG_20190711_003015_409.jpg","Approve finance request");
INSERT INTO userview VALUES("2022-07-10","01:01:17:56am","110","finance","Adamu","melese","IMG_20190711_003048_642.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-12","","111","admin","","","","update user");
INSERT INTO userview VALUES("2022-07-12","","112","admin","","","","update user");
INSERT INTO userview VALUES("2022-07-12","02:53:34pm","113","","","","","send feadback to .headcafe");
INSERT INTO userview VALUES("2022-07-12","03:00:47pm","114","","habtamu","kebede","","send feadback to .headcafe");
INSERT INTO userview VALUES("2022-07-12","03:01:42pm","115","","habtamu","kebede","","send feadback to .headcafe");
INSERT INTO userview VALUES("2022-07-12","03:02:22pm","116","","habtamu","kebede","","send feadback to .headcafe");
INSERT INTO userview VALUES("2022-07-12","03:04:06pm","117","","habtamu","kebede","","send feadback to .headcafe");
INSERT INTO userview VALUES("2022-07-12","03:04:57pm","118","","habtamu","kebede","","send feadback to .headcafe");
INSERT INTO userview VALUES("2022-07-12","03:07:43pm","119","admin","habtamu","kebede","","send feadback to .foodstore");
INSERT INTO userview VALUES("2022-07-12","03:13:23pm","120","chef","Almaz","Yitna","","send feadback to .adminster");
INSERT INTO userview VALUES("2022-07-12","03:15:02pm","121","chef","Almaz","Yitna","","send feadback to .adminster");
INSERT INTO userview VALUES("2022-07-12","03:15:50pm","122","chef","Almaz","Yitna","","send feadback to .admin");
INSERT INTO userview VALUES("2022-07-12","03:25:19pm","123","chef","Almaz","Yitna","","send feadback to .admin");
INSERT INTO userview VALUES("2022-07-12","21:09:19:39pm","124","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-07-12","09:25:29pm","125","foodstore","sleshi ","Dagnew","IMG_20190711_003032_023.jpg","request material lack.josi");
INSERT INTO userview VALUES("2022-07-13","00:12:23:24am","126","union","Abera","Asnake","IMG_20190711_003032_023.jpg","register additional   ");
INSERT INTO userview VALUES("2022-07-13","00:12:23:36am","127","union","Abera","Asnake","IMG_20190711_003032_023.jpg","Abera Asnake post notice about jjjj");
INSERT INTO userview VALUES("2022-07-13","00:12:23:58am","128","union","Abera","Asnake","IMG_20190711_003032_023.jpg","Abera Asnake post notice about fewq");
INSERT INTO userview VALUES("2022-07-13","00:12:24:09am","129","union","Abera","Asnake","IMG_20190711_003032_023.jpg","register additional   ");
INSERT INTO userview VALUES("2022-07-13","00:12:26:07am","130","union","Abera","Asnake","IMG_20190711_003032_023.jpg","Abera Asnake post notice about jjjjjjjjj");
INSERT INTO userview VALUES("2022-07-13","08:08:23:55am","131","finance","Adamu","melese","IMG_20190711_003048_642.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-13","08:08:25:26am","132","finance","Adamu","melese","IMG_20190711_003048_642.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-13","08:08:31:19am","133","finance","Adamu","melese","IMG_20190711_003048_642.jpg","Accept finance request");
INSERT INTO userview VALUES("0000-00-00","","134","admin","","","","delete feadback");
INSERT INTO userview VALUES("2022-07-13","09:29:59am","135","admin","habtamu","kebede","","send feadback to .chef");
INSERT INTO userview VALUES("0000-00-00","","136","admin","","","","delete feadback");
INSERT INTO userview VALUES("0000-00-00","","137","admin","","","","delete feadback");
INSERT INTO userview VALUES("2022-07-13","10:04:24am","138","foodstore","sleshi ","Dagnew","IMG_20190711_003032_023.jpg","request material lack.berbere");
INSERT INTO userview VALUES("0000-00-00","","139","admin","","","","delete feadback");
INSERT INTO userview VALUES("0000-00-00","","140","admin","","","","delete feadback");
INSERT INTO userview VALUES("2022-07-14","07:59:58am","141","chef","Almaz","Yitna","","send feadback to .admin");
INSERT INTO userview VALUES("0000-00-00","","142","admin","","","","delete feadback");
INSERT INTO userview VALUES("2022-07-14","08:05:28am","143","chef","Almaz","Yitna","","send feadback to .admin");
INSERT INTO userview VALUES("0000-00-00","","144","","","","","delete feadback");
INSERT INTO userview VALUES("2022-07-14","08:35:16am","145","chef","Almaz","Yitna","","send feadback to .admin");
INSERT INTO userview VALUES("0000-00-00","","146","admin","","","","delete feadback");
INSERT INTO userview VALUES("2022-07-14","08:37:32am","147","chef","Almaz","Yitna","","send feadback to .admin");
INSERT INTO userview VALUES("0000-00-00","","148","chef","","","","delete feadback");
INSERT INTO userview VALUES("2022-07-14","08:57:14am","149","admin","habtamu","kebede","","send feadback to .chef");
INSERT INTO userview VALUES("2022-07-14","09:06:20am","150","admin","habtamu","kebede","","send feadback to .departmenthead");
INSERT INTO userview VALUES("2022-07-14","","151","admin","","","","update user");
INSERT INTO userview VALUES("2022-07-14","","152","admin","","","","update user");
INSERT INTO userview VALUES("2022-07-14","21:09:14:01pm","153","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-07-14","21:09:17:29pm","154","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-07-14","21:09:21:34pm","155","headcafe","Selam","Asnake","IMG_20190711_003032_023.jpg","accept ailing student");
INSERT INTO userview VALUES("2022-07-14","21:09:47:22pm","156","finance","Adamu","melese","IMG_20190711_003048_642.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-14","21:09:57:41pm","157","directorate","Adane","Abebaw","IMG_20190711_003015_409.jpg","Approve finance request");
INSERT INTO userview VALUES("2022-07-14","21:09:58:20pm","158","finance","Adamu","melese","IMG_20190711_003048_642.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-14","22:10:21:46pm","159","finance","Adamu","melese","IMG_20190711_003048_642.jpg","Accept finance request");
INSERT INTO userview VALUES("2022-07-14","11:13:57pm","160","chef","Almaz","Yitna","","send feadback to .admin");
INSERT INTO userview VALUES("0000-00-00","","161","chef","","","","delete feadback");
INSERT INTO userview VALUES("2022-07-14","11:34:52pm","162","chef","Almaz","Yitna","","send feadback to .admin");
INSERT INTO userview VALUES("0000-00-00","","163","admin","","","","delete feadback");
INSERT INTO userview VALUES("0000-00-00","","164","admin","","","","delete feadback");
INSERT INTO userview VALUES("2022-07-15","12:45:44am","165","electerical","Sisay","Daniel","","send feadback to .chef");
INSERT INTO userview VALUES("0000-00-00","","166","chef","","","","delete feadback");
INSERT INTO userview VALUES("2022-07-15","01:16:51am","167","chef","Almaz","Yitna","","send feadback to .headcafe");


