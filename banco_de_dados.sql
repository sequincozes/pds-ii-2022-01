CREATE TABLE `pds2`.`TipoUsuario` (`idTipoUsuario` INT NOT NULL AUTO_INCREMENT, `descricao` ENUM("administrador","comum") NOT NULL , PRIMARY KEY (`idTipoUsuario`)) ENGINE = InnoDB;

CREATE TABLE `pds2`.`instituicao` (`idInstituicao` INT NOT NULL , `sobre` VARCHAR(500) NOT NULL , `nome` VARCHAR(50) NOT NULL , `siteInstituicao` VARCHAR(100) NOT NULL , `quantidadeEmpregados` INT(6) NOT NULL , `logoInstituicao` VARCHAR(1000), PRIMARY KEY (`idInstituicao`)) ENGINE = InnoDB;

CREATE TABLE `pds2`.`Usuario` (`idUsuario` INT NOT NULL , `fk_tipoUsuario` INT NOT NULL , `dataNascimento` DATE NOT NULL , `senha` VARCHAR(50) NOT NULL , `fotoPerfil` VARCHAR(500) NOT NULL , `biografia` TEXT NOT NULL , `cidade` VARCHAR(50) NOT NULL , `vistoPorUltimo` TIMESTAMP NOT NULL , `nome` VARCHAR(30) NOT NULL ) ENGINE = InnoDB;

CREATE TABLE `pds2`.`ConvitesAmizade` (`idConviteAmizade` INT NOT NULL , `fk_convidado` INT NOT NULL , `fk_solicitante` INT NOT NULL , `dataConvite` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , `status` ENUM("pendente","aceito") NOT NULL DEFAULT 'pendente' , PRIMARY KEY (`idConviteAmizade`)) ENGINE = InnoDB;

CREATE TABLE `pds2`.`Amigos` (`idAmigos` INT NOT NULL , `fk_amigo1` INT NOT NULL , `fk_amigo2` INT NOT NULL , `dataAmizade` DATE NOT NULL , PRIMARY KEY (`idAmigos`)) ENGINE = InnoDB;

CREATE TABLE `pds2`.`AvaliacoesPerfilUsuarios` (`idAvaliacoes` INT NOT NULL , `avaliacoes` TEXT NOT NULL , `fk_avaliador` INT NOT NULL , `fk_avaliado` INT NOT NULL , `score` ENUM('1','2','3','4','5') NOT NULL , PRIMARY KEY (`idAvaliacoes`)) ENGINE = InnoDB;

CREATE TABLE `pds2`.`VinculosUsuario` (`idVinculo` INT NOT NULL , `fk_Usuario` INT NOT NULL , `fk_Vinculo` INT NOT NULL , `dataFimTrabalho` DATE NULL DEFAULT NULL , `dataInicioTrabalho` DATE NOT NULL , `cargo` VARCHAR(50) NOT NULL , PRIMARY KEY (`idVinculo`)) ENGINE = InnoDB;

ALTER TABLE Usuario ADD PRIMARY KEY(idUsuario);

ALTER TABLE Usuario ADD CONSTRAINT fk_UsuarioTipo FOREIGN KEY(fk_tipoUsuario) REFERENCES TipoUsuario(idTipoUsuario);
