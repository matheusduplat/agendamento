-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Out-2020 às 23:32
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda_pereira`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendar`
--

CREATE TABLE `agendar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `volume_carga` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fornecedor` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `valor_nota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_loja` bigint(20) UNSIGNED NOT NULL,
  `id_area` bigint(20) UNSIGNED NOT NULL,
  `status` bigint(20) UNSIGNED DEFAULT NULL,
  `observacao` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` time NOT NULL,
  `descarga_i` time DEFAULT NULL,
  `descarga_f` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `agendar`
--

INSERT INTO `agendar` (`id`, `data`, `volume_carga`, `fornecedor`, `valor_nota`, `id_users`, `id_loja`, `id_area`, `status`, `observacao`, `created_at`, `updated_at`, `time`, `descarga_i`, `descarga_f`) VALUES
(1, '2020-10-27', '1003', '1', '125,22', 1, 15, 2, 3, NULL, '2020-10-23 02:03:26', '2020-10-28 01:04:42', '00:00:00', NULL, NULL),
(2, '2020-10-27', '1003', '333', '1', 1, 15, 2, 3, NULL, '2020-10-23 02:06:37', '2020-10-28 01:12:59', '00:00:00', NULL, NULL),
(3, '2020-10-27', '1003', '1', '1', 1, 15, 1, 1, NULL, '2020-10-23 02:09:42', '2020-10-28 01:07:52', '00:00:00', NULL, NULL),
(4, '2020-10-27', '1003', '1', '0', 1, 15, 1, 3, NULL, '2020-10-23 02:21:46', '2020-10-28 01:07:32', '00:00:00', NULL, NULL),
(5, '2020-10-22', '1003', '1', '0', 1, 15, 2, 3, NULL, '2020-10-23 02:25:35', '2020-10-23 02:25:35', '00:00:00', NULL, NULL),
(6, '2020-10-22', '1003', '1', '0', 1, 15, 2, 3, NULL, '2020-10-23 02:29:53', '2020-10-23 02:29:53', '00:00:00', NULL, NULL),
(7, '2020-10-22', '1003', '1', '12', 1, 15, 2, 3, NULL, '2020-10-23 03:01:42', '2020-10-23 03:01:42', '00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`id`, `nome`) VALUES
(1, 'Seco/Embalagem'),
(2, 'Frios/Congelados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE `loja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`id`, `nome`, `endereco`) VALUES
(15, 'Pereira', 'Santo Amaro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_14_224320_create_table_fornecedor', 1),
(5, '2020_04_14_224818_create_table_loja', 1),
(6, '2020_04_14_232715_up_colum_email', 1),
(7, '2020_04_16_003854_area', 1),
(8, '2020_04_28_223354_add_fk_area', 1),
(9, '2020_04_29_213355_add_fk_idloja', 1),
(10, '2020_05_06_220057_create_agendar_table', 1),
(11, '2020_05_06_220219_add_fk_user_loja', 1),
(12, '2020_05_12_220904_add_new_colum_status_obs', 1),
(13, '2020_05_13_014314_add_new_colum_create_uptade', 1),
(14, '2020_05_21_020721_up_collun_id', 1),
(15, '2020_05_26_225421_add_collun_tipo', 1),
(16, '2020_08_19_212148_create_status_table', 1),
(17, '2020_08_19_214553_alte_colum_status_agendar', 1),
(18, '2020_08_19_214841_fk_colum_status_agendar', 1),
(19, '2020_08_19_221150_drop_fk_colun_id_user_outros', 1),
(20, '2020_08_19_221705_alt_colums_table_agendar', 1),
(23, '2020_10_22_225521_add_colum_time', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomeStatus` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `nomeStatus`, `created_at`, `updated_at`) VALUES
(1, 'Entregue', NULL, NULL),
(2, 'Não Entregue', NULL, NULL),
(3, 'Aguardando', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_area` bigint(20) UNSIGNED NOT NULL,
  `id_loja` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id_area`, `id_loja`, `tipo`) VALUES
(1, 'ADM', 'adm@adm.com.br', NULL, '$2y$10$1tNDewv2yWYWXKDk/B2Sbu252QTCG2H0a4o4a6nZeAV9hIAIPjG2W', NULL, NULL, NULL, 1, 15, 'adm'),
(2, 'SAULO', 'saulo@atacadaopereira.com', NULL, '$2y$10$gIYErPNtNcN9QeyPmIOpX.Sih1xGmBMovFV3ElpNYdfKtu0QtJlYe', NULL, '2020-10-14 04:30:36', '2020-10-14 04:32:16', 2, 15, 'adm'),
(3, 'LILIANE', 'liliane@atacadaopereira.com', NULL, '$2y$10$r9ZelZ6j3rq6O4MhhgtgMeMAbxX8FfauueA2wGp7rvN/5zrmYjvja', NULL, '2020-10-14 04:31:36', '2020-10-14 04:31:36', 1, 15, 'adm'),
(4, 'RITA DUPLAT', 'ritaduplat@atacadaopereira.com', NULL, '$2y$10$jHRuv5C97MkaMIGoMnO13OaTLNzyeIzv6JyJM9JJRBSdbwCLhiGjS', NULL, '2020-10-14 04:32:54', '2020-10-14 04:32:54', 2, 15, 'adm');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendar`
--
ALTER TABLE `agendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agendar_id_area_foreign` (`id_area`),
  ADD KEY `agendar_id_users_foreign` (`id_users`),
  ADD KEY `agendar_id_loja_foreign` (`id_loja`),
  ADD KEY `agendar_status_foreign` (`status`);

--
-- Índices para tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_area_foreign` (`id_area`),
  ADD KEY `users_id_loja_foreign` (`id_loja`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendar`
--
ALTER TABLE `agendar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `loja`
--
ALTER TABLE `loja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendar`
--
ALTER TABLE `agendar`
  ADD CONSTRAINT `agendar_status_foreign` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `users_id_loja_foreign` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
