SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `idusers` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `address` VARCHAR(255) NULL DEFAULT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  `photo` VARCHAR(255) NULL DEFAULT NULL,
  `pets_idpets` INT(11) NOT NULL,
  `cities_idcities` INT(11) NOT NULL,
  PRIMARY KEY (`idusers`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_users_pets_idx` (`pets_idpets` ASC),
  INDEX `fk_users_cities1_idx` (`cities_idcities` ASC),
  CONSTRAINT `fk_users_pets`
    FOREIGN KEY (`pets_idpets`)
    REFERENCES `mydb`.`pets` (`idpets`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_cities1`
    FOREIGN KEY (`cities_idcities`)
    REFERENCES `mydb`.`cities` (`idcities`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`pets` (
  `idpets` INT(11) NOT NULL AUTO_INCREMENT,
  `pet` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idpets`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`languages` (
  `idlanguages` INT(11) NOT NULL,
  `language` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idlanguages`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`cities` (
  `idcities` INT(11) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcities`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`technologies` (
  `idtechnologies` INT(11) NOT NULL,
  `technology` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtechnologies`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`users_has_technologies` (
  `users_idusers` INT(11) NOT NULL,
  `technologies_idtechnologies` INT(11) NOT NULL,
  PRIMARY KEY (`users_idusers`, `technologies_idtechnologies`),
  INDEX `fk_users_has_technologies_technologies1_idx` (`technologies_idtechnologies` ASC),
  INDEX `fk_users_has_technologies_users1_idx` (`users_idusers` ASC),
  CONSTRAINT `fk_users_has_technologies_users1`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `mydb`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_technologies_technologies1`
    FOREIGN KEY (`technologies_idtechnologies`)
    REFERENCES `mydb`.`technologies` (`idtechnologies`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `mydb`.`users_has_languages` (
  `users_idusers` INT(11) NOT NULL,
  `languages_idlanguages` INT(11) NOT NULL,
  PRIMARY KEY (`users_idusers`, `languages_idlanguages`),
  INDEX `fk_users_has_languages_languages1_idx` (`languages_idlanguages` ASC),
  INDEX `fk_users_has_languages_users1_idx` (`users_idusers` ASC),
  CONSTRAINT `fk_users_has_languages_users1`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `mydb`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_languages_languages1`
    FOREIGN KEY (`languages_idlanguages`)
    REFERENCES `mydb`.`languages` (`idlanguages`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
