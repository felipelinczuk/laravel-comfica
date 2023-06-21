-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/06/2023 às 21:02
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_apilaravel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `url_img` longtext NOT NULL,
  `fav` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `books`
--

INSERT INTO `books` (`id`, `name`, `description`, `url_img`, `fav`, `created_at`, `updated_at`) VALUES
(12, 'Harry Potter', 'Livro 3', 'https://jamboeditora.com.br/wp-content/uploads/2020/09/jamboeditora-ordem-da-fenix-capa-dura-15x21-1.png', 0, '2023-06-21 21:48:09', '2023-06-21 21:48:09'),
(13, 'Jogos Vorazes', 'Livro 1', 'https://m.media-amazon.com/images/I/61zBhzjS4LL._AC_UF1000,1000_QL80_.jpg', 0, '2023-06-21 21:49:20', '2023-06-21 21:49:20'),
(14, 'Diário de um banana', 'Livro x', 'https://4.bp.blogspot.com/-fUpOhTpDFS0/VcjlYEPBCQI/AAAAAAAAGQE/7Uvt1q6TNcw/s1600/jeff_kinney_dias_de_cao_diario_de_um_banana_4.jpg', 0, '2023-06-21 21:49:59', '2023-06-21 21:49:59'),
(15, 'A cabana', 'Qualquer', 'https://www.editoraarqueiro.com.br/media/upload/conteudos/9788580416343.png', 0, '2023-06-21 21:50:30', '2023-06-21 21:50:30'),
(17, 'A culpa é das estrelas', 'John Green', 'https://m.media-amazon.com/images/I/41MRMmeNz0L.jpg', 0, '2023-06-21 21:53:17', '2023-06-21 21:53:17'),
(18, 'O menino maluquinho', 'Infantil', 'https://www.horoscopovirtual.com.br/imagem/artigos/interno/images/Sem%20t%C3%ADtulo(3).png', 0, '2023-06-21 21:54:34', '2023-06-21 21:54:34'),
(19, 'Circo Musical', 'Tião', 'https://univali.br/noticias/PublishingImages/2018-10-09-Capa%20Circo%20Musical.png', 0, '2023-06-21 21:55:21', '2023-06-21 21:55:21'),
(20, 'Protagonize!', 'AA', 'https://editoracoerencia.com.br/wp-content/uploads/2023/02/capa_protagonize-01.png', 0, '2023-06-21 21:56:47', '2023-06-21 21:56:47'),
(22, 'Amanhecer', 'SM', 'https://m.media-amazon.com/images/I/51+ljDi72mL._AC_UF1000,1000_QL80_.jpg', 0, '2023-06-21 21:58:06', '2023-06-21 21:58:06'),
(23, 'IT: A coisa', 'Stephen King', 'https://m.media-amazon.com/images/I/51z0s3GcvwL.jpg', 0, '2023-06-21 21:59:36', '2023-06-21 21:59:36'),
(24, 'O exorcista', 'Terror', 'https://m.media-amazon.com/images/I/41hdhjujI1L._AC_UF1000,1000_QL80_.jpg', 0, '2023-06-21 22:00:40', '2023-06-21 22:00:40'),
(25, 'Turma da Mônica Jovem', 'Gibi', 'https://img.assinaja.com/assets/tZ/099/img/457970_520x520.png', 0, '2023-06-21 22:02:20', '2023-06-21 22:02:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_06_13_172243_create_books_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
