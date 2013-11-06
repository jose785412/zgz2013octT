SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `mydb`.`users` 
ADD INDEX `fk_users_pets_idx` (`pets_idpets` ASC),
ADD INDEX `fk_users_cities1_idx` (`cities_idcities` ASC),
DROP INDEX `fk_users_cities1_idx` ,
DROP INDEX `fk_users_pets_idx` ;

ALTER TABLE `mydb`.`languages` 
CHANGE COLUMN `idlanguages` `idlanguages` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `mydb`.`cities` 
CHANGE COLUMN `idcities` `idcities` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `mydb`.`technologies` 
CHANGE COLUMN `idtechnologies` `idtechnologies` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `mydb`.`users_has_technologies` 
ADD INDEX `fk_users_has_technologies_technologies1_idx` (`technologies_idtechnologies` ASC),
ADD INDEX `fk_users_has_technologies_users1_idx` (`users_idusers` ASC),
DROP INDEX `fk_users_has_technologies_users1_idx` ,
DROP INDEX `fk_users_has_technologies_technologies1_idx` ;

ALTER TABLE `mydb`.`users_has_languages` 
ADD INDEX `fk_users_has_languages_languages1_idx` (`languages_idlanguages` ASC),
ADD INDEX `fk_users_has_languages_users1_idx` (`users_idusers` ASC),
DROP INDEX `fk_users_has_languages_users1_idx` ,
DROP INDEX `fk_users_has_languages_languages1_idx` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
