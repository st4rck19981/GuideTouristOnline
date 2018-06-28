CREATE DATABASE guidetourist;
-- -----------------------------------------------------
-- Schema new_database
-- -----------------------------------------------------
USE guidetourist;

-- -----------------------------------------------------
-- Table `guidetourist`.`Lugar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `guidetourist`.`Lugar` (
  `idLugar` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idLugar`));


-- -----------------------------------------------------
-- Table `guidetourist`.`ValoracionLugar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `guidetourist`.`ValoracionLugar` (
  `Lugar_idLugar` INT NOT NULL,
  `punto` INT NOT NULL,
  INDEX `fk_ValoracionLugar_Lugar_idx` (`Lugar_idLugar` ASC),
  CONSTRAINT `fk_ValoracionLugar_Lugar`
    FOREIGN KEY (`Lugar_idLugar`)
    REFERENCES `guidetourist`.`Lugar` (`idLugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table `guidetourist`.`Comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `guidetourist`.`Comentarios` (
  `idComentario` INT NOT NULL AUTO_INCREMENT,
  `Lugar_idLugar` INT NOT NULL,
  `Comentario` TEXT NOT NULL,
  `Fecha` DATETIME NOT NULL,
  `Valoracion` INT NULL DEFAULT 0,
  PRIMARY KEY (`idComentario`),
  INDEX `fk_Comentarios_Lugar1_idx` (`Lugar_idLugar` ASC),
  CONSTRAINT `fk_Comentarios_Lugar1`
    FOREIGN KEY (`Lugar_idLugar`)
    REFERENCES `guidetourist`.`Lugar` (`idLugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `guidetourist`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `guidetourist`.`Categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nombreCategoria` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idCategoria`));


-- -----------------------------------------------------
-- Table `guidetourist`.`Lugar_has_Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `guidetourist`.`Lugar_has_Categoria` (
  `Lugar_idLugar` INT NOT NULL,
  `Categoria_idCategoria` INT NOT NULL,
  `contenidoCategoria` TEXT NULL,
  `referenciaCategoria` TEXT NULL,
  PRIMARY KEY (`Lugar_idLugar`, `Categoria_idCategoria`),
  INDEX `fk_Lugar_has_Categoria_Categoria1_idx` (`Categoria_idCategoria` ASC),
  INDEX `fk_Lugar_has_Categoria_Lugar1_idx` (`Lugar_idLugar` ASC),
  CONSTRAINT `fk_Lugar_has_Categoria_Lugar1`
    FOREIGN KEY (`Lugar_idLugar`)
    REFERENCES `guidetourist`.`Lugar` (`idLugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lugar_has_Categoria_Categoria1`
    FOREIGN KEY (`Categoria_idCategoria`)
    REFERENCES `guidetourist`.`Categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
