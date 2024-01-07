-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Jan 2024 pada 04.18
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nextauthrba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Account`
--

CREATE TABLE `Account` (
  `id` varchar(191) NOT NULL,
  `userId` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `provider` varchar(191) NOT NULL,
  `providerAccountId` varchar(191) NOT NULL,
  `refresh_token` text DEFAULT NULL,
  `access_token` text DEFAULT NULL,
  `expires_at` int(11) DEFAULT NULL,
  `token_type` varchar(191) DEFAULT NULL,
  `scope` varchar(191) DEFAULT NULL,
  `id_token` text DEFAULT NULL,
  `session_state` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Image`
--

CREATE TABLE `Image` (
  `id` varchar(191) NOT NULL,
  `sparepartId` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `updatedAt` datetime(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Kategori`
--

CREATE TABLE `Kategori` (
  `id` varchar(191) NOT NULL,
  `label` varchar(191) NOT NULL,
  `workshopId` varchar(191) NOT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `updatedAt` datetime(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Layanan`
--

CREATE TABLE `Layanan` (
  `id` varchar(191) NOT NULL,
  `workshopId` varchar(191) NOT NULL,
  `label` varchar(191) NOT NULL,
  `imageUrl` varchar(191) NOT NULL,
  `price` int(11) NOT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `updatedAt` datetime(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Role`
--

CREATE TABLE `Role` (
  `id` varchar(191) NOT NULL,
  `label` enum('USER','ADMIN','OWNER','MECHANIC') NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `Role`
--

INSERT INTO `Role` (`id`, `label`) VALUES
('7ee901fe-433e-4b6c-ae6c-10b546c39010', 'OWNER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Session`
--

CREATE TABLE `Session` (
  `id` varchar(191) NOT NULL,
  `sessionToken` varchar(191) NOT NULL,
  `userId` varchar(191) NOT NULL,
  `expires` datetime(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Sparepart`
--

CREATE TABLE `Sparepart` (
  `id` varchar(191) NOT NULL,
  `workshopId` varchar(191) NOT NULL,
  `kategoriId` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `hargaBeli` int(11) NOT NULL,
  `hargaJual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `updatedAt` datetime(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `User`
--

CREATE TABLE `User` (
  `id` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `emailVerified` datetime(3) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `workshopId` varchar(191) DEFAULT NULL,
  `roleId` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `User`
--

INSERT INTO `User` (`id`, `username`, `name`, `email`, `emailVerified`, `image`, `password`, `workshopId`, `roleId`) VALUES
('clr0hwek6000114l02xrojsvi', 'antonysinudarsono', 'antonysinudarsono', 'antonysinudarsono@gmail.com', NULL, '/default.jpg', '$2b$12$Fee0gZZSd8xVnfpnAryfdu52iXBehe34hVHNPV6FUTAYczO1PjYnO', '7865f2b9-98dc-4116-af95-57f8546df722', '7ee901fe-433e-4b6c-ae6c-10b546c39010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `VerificationToken`
--

CREATE TABLE `VerificationToken` (
  `identifier` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `expires` datetime(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Workshop`
--

CREATE TABLE `Workshop` (
  `id` varchar(191) NOT NULL,
  `userId` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `updatedAt` datetime(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `Workshop`
--

INSERT INTO `Workshop` (`id`, `userId`, `name`, `address`, `createdAt`, `updatedAt`) VALUES
('7865f2b9-98dc-4116-af95-57f8546df722', 'clq0lo1nj0001126tikunp0tn', 'Jaya Auto', 'Jl. Randugarut', '2024-01-05 10:32:33.407', '2024-01-05 10:32:33.407');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Account_provider_providerAccountId_key` (`provider`,`providerAccountId`),
  ADD KEY `Account_userId_idx` (`userId`);

--
-- Indeks untuk tabel `Image`
--
ALTER TABLE `Image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Image_sparepartId_idx` (`sparepartId`);

--
-- Indeks untuk tabel `Kategori`
--
ALTER TABLE `Kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Kategori_workshopId_idx` (`workshopId`);

--
-- Indeks untuk tabel `Layanan`
--
ALTER TABLE `Layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Layanan_workshopId_idx` (`workshopId`);

--
-- Indeks untuk tabel `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `Session`
--
ALTER TABLE `Session`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Session_sessionToken_key` (`sessionToken`),
  ADD KEY `Session_userId_idx` (`userId`);

--
-- Indeks untuk tabel `Sparepart`
--
ALTER TABLE `Sparepart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Sparepart_workshopId_idx` (`workshopId`),
  ADD KEY `Sparepart_kategoriId_idx` (`kategoriId`);

--
-- Indeks untuk tabel `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `User_username_key` (`username`),
  ADD UNIQUE KEY `User_email_key` (`email`),
  ADD KEY `User_workshopId_idx` (`workshopId`),
  ADD KEY `User_roleId_idx` (`roleId`);

--
-- Indeks untuk tabel `VerificationToken`
--
ALTER TABLE `VerificationToken`
  ADD UNIQUE KEY `VerificationToken_token_key` (`token`),
  ADD UNIQUE KEY `VerificationToken_identifier_token_key` (`identifier`,`token`);

--
-- Indeks untuk tabel `Workshop`
--
ALTER TABLE `Workshop`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
