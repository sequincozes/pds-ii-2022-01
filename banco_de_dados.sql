CREATE TABLE `pds2`.`TipoUsuario` (`idTipoUsuario` INT NOT NULL AUTO_INCREMENT, `descricao` ENUM("administrador","comum") NOT NULL , PRIMARY KEY (`idTipoUsuario`)) ENGINE = InnoDB;

CREATE TABLE `pds2`.`instituicao` (`idInstituicao` INT NOT NULL , `sobre` VARCHAR(500) NOT NULL , `nome` VARCHAR(50) NOT NULL , `siteInstituicao` VARCHAR(100) NOT NULL , `quantidadeEmpregados` INT(6) NOT NULL , `logoInstituicao` VARCHAR(1000), PRIMARY KEY (`idInstituicao`)) ENGINE = InnoDB;

CREATE TABLE `pds2`.`Usuario` (`idUsuario` INT NOT NULL , `fk_tipoUsuario` INT NOT NULL , `dataNascimento` DATE NOT NULL , `senha` VARCHAR(50) NOT NULL , `fotoPerfil` VARCHAR(500) NOT NULL , `biografia` VARCHAR(200) NOT NULL , `cidade` VARCHAR(50) NOT NULL , `vistoPorUltimo` TIMESTAMP NOT NULL , `nome` VARCHAR(30) NOT NULL ) ENGINE = InnoDB;
