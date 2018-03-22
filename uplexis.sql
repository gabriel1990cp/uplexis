-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Mar-2018 às 00:33
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uplexis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_03_22_002741_create_sintegras_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sintegras`
--

CREATE TABLE `sintegras` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cnpj` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `json` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sintegras`
--

INSERT INTO `sintegras` (`id`, `id_usuario`, `cnpj`, `json`, `created_at`, `updated_at`) VALUES
(13, 2, '31.804.115-0002-43', '{\"&nbsp;CNPJ:\":\"<td class=\\\"valor\\\" width=\\\"30%\\\">&nbsp;31.804.115\\/0002-43<\\/td>\",\"Inscri\\u00e7\\u00e3o Estadual:\":\"<td class=\\\"valor\\\">&nbsp;082.254.28-1<\\/td>\",\"&nbsp;Raz\\u00e3o Social :\":\"<td class=\\\"valor\\\" colspan=\\\"3\\\">&nbsp;CEREAIS DO NICO LTDA<\\/td>\",\"&nbsp;Logradouro:\":\"<td class=\\\"valor\\\" colspan=\\\"3\\\">&nbsp;RUA IPE<\\/td>\",\"&nbsp;N\\u00famero:\":\"<td class=\\\"valor\\\" width=\\\"15%\\\">&nbsp;10<\\/td>\",\"&nbsp;Complemento:\":\"<td class=\\\"valor\\\">&nbsp;<\\/td>\",\"&nbsp;Bairro:\":\"<td class=\\\"valor\\\" colspan=\\\"3\\\">&nbsp;MOVELAR<\\/td>\",\"&nbsp;Munic\\u00edpio:\":\"<td class=\\\"valor\\\" width=\\\"15%\\\">&nbsp;LINHARES<\\/td>\",\"&nbsp;UF:\":\"<td class=\\\"valor\\\">&nbsp;ES<\\/td>\",\"&nbsp;CEP:\":\"<td width=\\\"30%\\\" class=\\\"valor\\\">&nbsp;29906-120<\\/td>\",\"&nbsp;Telefone:\":\"<td width=\\\"30%\\\" class=\\\"valor\\\">&nbsp;        <\\/td>\",\"Atividade Econ\\u00f4mica:&nbsp;\":\"<td class=\\\"valor\\\" width=\\\"60%\\\">COMERCIO ATACADISTA DE CEREAIS E LEGUMINOSAS BENEFICIADAS<\\/td>\",\"Data de Inicio de Atividade:&nbsp;\":\"<td class=\\\"valor\\\">26\\/03\\/2004<\\/td>\",\"Situa\\u00e7\\u00e3o Cadastral Vigente:&nbsp;\":\"<td class=\\\"valor\\\">HABILITADO<\\/td>\",\"Data desta Situa\\u00e7\\u00e3o Cadastral:&nbsp;\":\"<td class=\\\"valor\\\">26\\/03\\/2004<\\/td>\",\"Regime de Apura&ccedil;&atilde;o:&nbsp;\":\"<td class=\\\"valor\\\">ORDINARIO<\\/td>\",\"Obrigatoriedade de EFD:&nbsp;\":\"<td class=\\\"valor\\\"> <\\/td>\",\"In\\u00edcio de obrigatoriedade de EFD:&nbsp;\":\"<td class=\\\"valor\\\"> <\\/td>\",\"In\\u00edcio de voluntariedade de NFe:&nbsp;\":\"<td class=\\\"valor\\\">31\\/08\\/2009<\\/td>\",\"Emitente de NFe desde:&nbsp;\":\"<td class=\\\"valor\\\" style=\\\"color:#FF0000;\\\"><b>Data da Consulta:<\\/b>&nbsp;<b>22\\/03\\/2018<\\/b><\\/td>\"}', '2018-03-23 01:54:49', '2018-03-23 01:54:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gabriel Costa Pinto', 'gabriel.cp1990@gmail.com', '$2y$10$0y5Pb1oVmAl9GTiMsBS.lODgiB9QZK0l2s2igP5L50QeHJRtooxci', 'FeQXDSk5Da8kawhlAGe4AjH8gshf3mwaFqJwIjhA4RKhOF7K9CQ17GC95Ewh', '2018-03-22 01:28:16', '2018-03-22 01:28:16'),
(2, 'uplexis', 'uplexis@uplexis.com.br', '$2y$10$5TWrMD5f6pw9DbaTTc6hlO74YI4rF4b2fbq9otcp.u8SaoQiGptMm', 'f3bqpZXUuE4yWqVInN1J0wtFU9utkgqQcoNFAnDsfU3ZTBfUuxUkF8llZVtW', '2018-03-23 01:54:13', '2018-03-23 01:54:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sintegras`
--
ALTER TABLE `sintegras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sintegras`
--
ALTER TABLE `sintegras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
