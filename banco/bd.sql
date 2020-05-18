-- MySQL Script generated by MySQL Workbench
-- Tue Sep 17 14:40:40 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mundomagico
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mundomagico
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mundomagico` DEFAULT CHARACTER SET utf8 ;
USE `mundomagico` ;

-- -----------------------------------------------------
-- Table `mundomagico`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mundomagico`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Login` VARCHAR(45) NOT NULL,
  `Senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mundomagico`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mundomagico`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Telefone` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCliente`),
  INDEX `fk_Cliente_Usuario1_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_Cliente_Usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `mundomagico`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mundomagico`.`Status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mundomagico`.`Status` (
  `idStatus` INT NOT NULL AUTO_INCREMENT,
  `Status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idStatus`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mundomagico`.`Itens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mundomagico`.`Itens` (
  `idItens` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(45) NOT NULL,
  `Valor` FLOAT NOT NULL,
  PRIMARY KEY (`idItens`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mundomagico`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mundomagico`.`Pedido` (
  `idPedido` INT NOT NULL AUTO_INCREMENT,
  `idStatus` INT NOT NULL,
  `idCliente` INT NOT NULL,
  `ValorTotal` FLOAT NULL,
  PRIMARY KEY (`idPedido`),
  INDEX `fk_Pedido_Status_idx` (`idStatus` ASC),
  INDEX `fk_Pedido_Cliente1_idx` (`idCliente` ASC),
  CONSTRAINT `fk_Pedido_Status`
    FOREIGN KEY (`idStatus`)
    REFERENCES `mundomagico`.`Status` (`idStatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `mundomagico`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mundomagico`.`Itens_has_Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mundomagico`.`Itens_has_Pedido` (
  `Itens_idItens` INT NOT NULL,
  `Pedido_idPedido` INT NOT NULL,
  `Valor` FLOAT NOT NULL,
  `Qtd` INT NOT NULL,
  PRIMARY KEY (`Itens_idItens`, `Pedido_idPedido`),
  INDEX `fk_Itens_has_Pedido_Pedido1_idx` (`Pedido_idPedido` ASC),
  INDEX `fk_Itens_has_Pedido_Itens1_idx` (`Itens_idItens` ASC),
  CONSTRAINT `fk_Itens_has_Pedido_Itens1`
    FOREIGN KEY (`Itens_idItens`)
    REFERENCES `mundomagico`.`Itens` (`idItens`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Itens_has_Pedido_Pedido1`
    FOREIGN KEY (`Pedido_idPedido`)
    REFERENCES `mundomagico`.`Pedido` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mundomagico`.`Adm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mundomagico`.`Adm` (
  `idAdm` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAdm`),
  INDEX `fk_Adm_Usuario1_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_Adm_Usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `mundomagico`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mundomagico`.`Foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mundomagico`.`Foto` (
  `idFoto` INT NOT NULL AUTO_INCREMENT,
  `idItens` INT NOT NULL,
  `Endereco` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idFoto`),
  INDEX `fk_Foto_Itens1_idx` (`idItens` ASC),
  CONSTRAINT `fk_Foto_Itens1`
    FOREIGN KEY (`idItens`)
    REFERENCES `mundomagico`.`Itens` (`idItens`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
