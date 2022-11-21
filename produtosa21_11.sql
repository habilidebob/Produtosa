-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2022 às 00:41
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `produtosa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome_categoria`) VALUES
(7, 'Açougue'),
(1, 'Alimentação'),
(4, 'Higiene'),
(5, 'Papelaria'),
(2, 'Perfumes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `preco` double NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `caminho_foto` varchar(300) NOT NULL DEFAULT 'semfoto.png',
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `caminho_foto`, `id_categoria`, `id_usuario`) VALUES
(1, 'Neroli Portofino 100ML', 800, 'Perfume Neroli Portofino da Tom Ford', 'semfoto.png', 2, 2),
(2, 'Acqua Azurra', 900, 'Perfume show', 'perfume1.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_completo`, `email`, `senha`) VALUES
(1, 'Robson Soares de Soares', 'rssoares@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(2, 'Estevao Rada', 'estevao.roliveira@sp.senac.br', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(5, 'Xi Feng Huang', 'xifeng99@qq.com', 'ef2e4499aa9a30162e4c197172317929af0507f0e09895bb712034e8042bfeb9');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_produtos`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_produtos` (
`ID` int(11)
,`Nome` varchar(150)
,`Preco` double
,`Descricao` varchar(500)
,`Foto` varchar(300)
,`ID_Usuario` int(11)
,`Categoria` varchar(100)
,`Usuario` varchar(300)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `view_produtos`
--
DROP TABLE IF EXISTS `view_produtos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produtos`  AS SELECT `produtos`.`id` AS `ID`, `produtos`.`nome` AS `Nome`, `produtos`.`preco` AS `Preco`, `produtos`.`descricao` AS `Descricao`, `produtos`.`caminho_foto` AS `Foto`, `produtos`.`id_usuario` AS `ID_Usuario`, `categorias`.`nome_categoria` AS `Categoria`, `usuarios`.`nome_completo` AS `Usuario` FROM ((`produtos` join `categorias` on(`produtos`.`id_categoria` = `categorias`.`id`)) join `usuarios` on(`produtos`.`id_usuario` = `usuarios`.`id`))  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_categoria` (`nome_categoria`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `produtos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
