CREATE TABLE `uidai`.`users` ( 
  `Id` INT NOT NULL AUTO_INCREMENT , 
  `username` VARCHAR(25) NOT NULL , 
  `email` VARCHAR(25) NOT NULL , 
  `password` VARCHAR(25) NOT NULL , 
  `aadhar` BIGINT NOT NULL , 
  `Phone` INT NOT NULL , 
  PRIMARY KEY (`Id`)
) ENGINE = InnoDB; 
