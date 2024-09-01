SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `appointmenttb` (
    `pid` INT(11),
    `ID` INT(11),
    `doctor` VARCHAR(30),
    `appdate` DATE,
    `apptime` TIME,
    `userStatus` INT(5),
    `doctorStatus` INT(5),
    `allowmhis` INT(5)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `doctreg` (
  `docid` int(11) AUTO_INCREMENT PRIMARY KEY ,
  `fname` varchar(20) ,
  `lname` varchar(20) ,
  `gender` varchar(10) ,
  `email` varchar(30) ,
  `contact` varchar(10) ,
  `password` varchar(30) ,
  `spec` varchar(100)
) ENGINE=InnoDB;


CREATE TABLE `patreg` (
  `pid` int(11) ,
  `fname` varchar(20) ,
  `lname` varchar(20) ,
  `gender` varchar(10) ,
  `email` varchar(30) ,
  `contact` varchar(10) ,
  `password` varchar(30) ,
  `cpassword` varchar(30) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `prestb` (
  `docid` varchar(50),
  `pid` int(11) ,
  `ID` int(11),
  `appdate` date ,
  `apptime` time ,
  `disease` varchar(250) ,
  `allergy` varchar(250) ,
  `prescription` varchar(1000)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table `medhis`(
  `pid` int(11),
  `surgeries` varchar(100),
  `medication` varchar(100),
  `conditions`  varchar(100),
  `allergies` varchar(100),
  `hereditary` varchar(100),
  PRIMARY key(pid)
)ENGINE=InnoDB;

ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `patreg`
  ADD PRIMARY KEY (`pid`);

ALTER TABLE `appointmenttb`
  MODIFY `ID` int(11)  AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `patreg`
  MODIFY `pid` int(11)  AUTO_INCREMENT, AUTO_INCREMENT=1;

alter table `prestb` add PRIMARY key(`ID`);
COMMIT;
