-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 12/06/2020 às 05:47
-- Versão do servidor: 10.3.22-MariaDB-cll-lve
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenci3_teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status_name`) VALUES
(1, 'Novo'),
(2, 'Pendente'),
(3, 'Em progresso'),
(4, 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_task`
--

CREATE TABLE `tbl_task` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_task`
--

INSERT INTO `tbl_task` (`id`, `title`, `description`, `project_name`, `status_id`, `created_at`) VALUES
(1, 'Tarefa 1', 'Descrição tal tal', 'StartTuts', 1, '2020-06-11 18:44:56'),
(2, 'Tarefa 2', 'Tarefa 2', 'StartTuts', 3, '2020-06-11 18:44:56'),
(3, 'Tarefa 3', 'Tarefa 3', 'StartTuts', 2, '2020-06-11 18:44:56'),
(4, 'Tarefa 4', 'Tarefa 4', 'StartTuts', 4, '2020-06-11 18:44:56');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
