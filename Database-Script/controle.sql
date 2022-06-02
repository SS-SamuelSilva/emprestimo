-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2022 às 03:05
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_produto`
--

CREATE TABLE `cadastro_produto` (
  `id` int(11) NOT NULL,
  `id_produto` varchar(30) NOT NULL,
  `nome_produto` text NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `nomer` varchar(60) NOT NULL,
  `numeror` varchar(20) NOT NULL,
  `cpfr` varchar(20) NOT NULL,
  `codigor` varchar(11) NOT NULL,
  `nomed` text NOT NULL,
  `datar` date NOT NULL,
  `datad` date DEFAULT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Aberto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro_produto`
--

INSERT INTO `cadastro_produto` (`id`, `id_produto`, `nome_produto`, `descricao`, `nomer`, `numeror`, `cpfr`, `codigor`, `nomed`, `datar`, `datad`, `status`) VALUES
(118, 'G5H5GL2', 'P2317H (Identificação : G5H5GL2)', 'Monitor 24\" acompanhando display port, cabo de energia e cabo AM/BM para USB nas laterais.', 'Arthur Lobo Mateus de Oliveira', '(11) 95952-0421', '454.165.368-02', '5631 CF', 'Samuel Melo Silva', '2022-04-06', '2022-04-06', 'Aberto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `camera`
--

CREATE TABLE `camera` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(20) NOT NULL,
  `nome_detalhado` varchar(30) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `qualidade` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitor`
--

CREATE TABLE `monitor` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(30) NOT NULL,
  `nome_detalhado` varchar(30) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mouse`
--

CREATE TABLE `mouse` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(50) NOT NULL,
  `nome_detalhado` varchar(30) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notebook`
--

CREATE TABLE `notebook` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(50) NOT NULL,
  `nome_detalhado` varchar(30) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `processador` varchar(20) NOT NULL,
  `memora_ram` varchar(10) NOT NULL,
  `bateria` varchar(50) NOT NULL,
  `dominio` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `outros`
--

CREATE TABLE `outros` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(255) NOT NULL,
  `nome_detalhado` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetor`
--

CREATE TABLE `projetor` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(50) NOT NULL,
  `nome_detalhado` varchar(30) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teclado`
--

CREATE TABLE `teclado` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(50) NOT NULL,
  `nome_detalhado` varchar(30) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
(1, 'emprestimo', 'WDVrdz@1964');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro_produto`
--
ALTER TABLE `cadastro_produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacao` (`identificacao`) USING BTREE,
  ADD KEY `nome_detalhado` (`nome_detalhado`) USING BTREE;

--
-- Índices para tabela `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacao` (`identificacao`);

--
-- Índices para tabela `mouse`
--
ALTER TABLE `mouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacao` (`identificacao`);

--
-- Índices para tabela `notebook`
--
ALTER TABLE `notebook`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacao` (`identificacao`);

--
-- Índices para tabela `outros`
--
ALTER TABLE `outros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projetor`
--
ALTER TABLE `projetor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacao` (`identificacao`);

--
-- Índices para tabela `teclado`
--
ALTER TABLE `teclado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacao` (`identificacao`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_produto`
--
ALTER TABLE `cadastro_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de tabela `camera`
--
ALTER TABLE `camera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de tabela `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de tabela `mouse`
--
ALTER TABLE `mouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `notebook`
--
ALTER TABLE `notebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `outros`
--
ALTER TABLE `outros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `projetor`
--
ALTER TABLE `projetor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `teclado`
--
ALTER TABLE `teclado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
