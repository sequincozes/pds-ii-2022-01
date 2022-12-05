-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2022 às 14:36
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pds2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE `amigos` (
  `idAmigos` int(11) NOT NULL,
  `fk_amigo1` int(11) NOT NULL,
  `fk_amigo2` int(11) NOT NULL,
  `dataAmizade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoesperfilusuarios`
--

CREATE TABLE `avaliacoesperfilusuarios` (
  `idAvaliacoes` int(11) NOT NULL,
  `avaliacoes` text NOT NULL,
  `fk_avaliador` int(11) NOT NULL,
  `fk_avaliado` int(11) NOT NULL,
  `score` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `tipoComentario` tinyint(1) NOT NULL,
  `fk_Post` int(11) NOT NULL,
  `fk_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarioresposta`
--

CREATE TABLE `comentarioresposta` (
  `idComentarioR` int(11) NOT NULL,
  `fk_Usuario` int(11) NOT NULL,
  `fk_Post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convitesamizade`
--

CREATE TABLE `convitesamizade` (
  `idConviteAmizade` int(11) NOT NULL,
  `fk_convidado` int(11) NOT NULL,
  `fk_solicitante` int(11) NOT NULL,
  `dataConvite` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('pendente','aceito') NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtidas`
--

CREATE TABLE `curtidas` (
  `idCurtidas` int(11) NOT NULL,
  `fk_Usuario` int(11) NOT NULL,
  `fk_Post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncia`
--

CREATE TABLE `denuncia` (
  `idDenuncia` int(11) NOT NULL,
  `descricaoDenuncia` varchar(500) NOT NULL,
  `fk_Usuario` int(11) NOT NULL,
  `fk_Comentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `idInstituicao` int(11) NOT NULL,
  `sobre` varchar(500) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `siteInstituicao` varchar(100) NOT NULL,
  `quantidadeEmpregados` int(6) NOT NULL,
  `logoInstituicao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `tipoPost` tinyint(1) NOT NULL,
  `fk_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tag`
--

CREATE TABLE `tag` (
  `idTag` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `fk_Usuario` int(11) NOT NULL,
  `fk_Post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `descricao` enum('administrador','comum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `fk_tipoUsuario` int(11) NOT NULL,
  `dataNascimento` date NOT NULL,
  `senha` varchar(50) NOT NULL,
  `fotoPerfil` varchar(500) NOT NULL,
  `biografia` text NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `vistoPorUltimo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculosusuario`
--

CREATE TABLE `vinculosusuario` (
  `idVinculo` int(11) NOT NULL,
  `fk_Usuario` int(11) NOT NULL,
  `fk_Vinculo` int(11) DEFAULT NULL,
  `dataFimTrabalho` date DEFAULT NULL,
  `dataInicioTrabalho` date NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`idAmigos`),
  ADD KEY `fk_amigo1` (`fk_amigo1`),
  ADD KEY `fk_amigo2` (`fk_amigo2`);

--
-- Índices para tabela `avaliacoesperfilusuarios`
--
ALTER TABLE `avaliacoesperfilusuarios`
  ADD PRIMARY KEY (`idAvaliacoes`),
  ADD KEY `fk_avaliador` (`fk_avaliador`),
  ADD KEY `fk_avaliado` (`fk_avaliado`);

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`);

--
-- Índices para tabela `comentarioresposta`
--
ALTER TABLE `comentarioresposta`
  ADD PRIMARY KEY (`idComentarioR`);

--
-- Índices para tabela `convitesamizade`
--
ALTER TABLE `convitesamizade`
  ADD PRIMARY KEY (`idConviteAmizade`),
  ADD KEY `fk_convidado` (`fk_convidado`),
  ADD KEY `fk_solicitante` (`fk_solicitante`);

--
-- Índices para tabela `curtidas`
--
ALTER TABLE `curtidas`
  ADD PRIMARY KEY (`idCurtidas`);

--
-- Índices para tabela `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`idDenuncia`);

--
-- Índices para tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`idInstituicao`);

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`);

--
-- Índices para tabela `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`idTag`);

--
-- Índices para tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_UsuarioTipo` (`fk_tipoUsuario`);

--
-- Índices para tabela `vinculosusuario`
--
ALTER TABLE `vinculosusuario`
  ADD PRIMARY KEY (`idVinculo`),
  ADD KEY `fk_user` (`fk_Usuario`),
  ADD KEY `fk_vinc` (`fk_Vinculo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `fk_amigo1` FOREIGN KEY (`fk_amigo1`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_amigo2` FOREIGN KEY (`fk_amigo2`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `avaliacoesperfilusuarios`
--
ALTER TABLE `avaliacoesperfilusuarios`
  ADD CONSTRAINT `fk_avaliado` FOREIGN KEY (`fk_avaliado`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_avaliador` FOREIGN KEY (`fk_avaliador`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `convitesamizade`
--
ALTER TABLE `convitesamizade`
  ADD CONSTRAINT `fk_convidado` FOREIGN KEY (`fk_convidado`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_solicitante` FOREIGN KEY (`fk_solicitante`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_UsuarioTipo` FOREIGN KEY (`fk_tipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `vinculosusuario`
--
ALTER TABLE `vinculosusuario`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`fk_Usuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vinc` FOREIGN KEY (`fk_Vinculo`) REFERENCES `instituicao` (`idInstituicao`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
