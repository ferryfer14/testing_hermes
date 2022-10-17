-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 09:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `password`) VALUES
(1, 'Smit', '$2y$10$p6T98cu3J1LrweeJISXIK.UUpiYSYg4MzUhQvj3UiHH4XbYxiFiFW');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2022_10_15_022714_login', 1),
(20, '2022_10_15_023338_product', 1),
(21, '2022_10_15_024525_transaction_header', 1),
(22, '2022_10_15_024908_transaction_detail', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_code` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `currency` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `dimension` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_code`, `product_name`, `price`, `currency`, `discount`, `dimension`, `unit`) VALUES
(1, 'SKUSKILNP', 'So klin Pewangi', 15000, 'IDR', 10, '13 cm x 10 cm', 'PCS'),
(2, 'GIVBLUE', 'GIV Biru', 11000, 'IDR', 0, '13 cm x 10 cm', 'PCS'),
(3, 'SKUSKILNL', 'So klin Liquid', 18000, 'IDR', 0, '13 cm x 10 cm', 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `document_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double NOT NULL,
  `currency` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `document_code`, `document_number`, `product_code`, `price`, `quantity`, `unit`, `subtotal`, `currency`) VALUES
(1, 'TRX', '001', 'SKUSKILNP', 15000, 2, 'PCS', 30000, 'IDR'),
(2, 'TRX', '001', 'GIVBLUE', 11000, 2, 'PCS', 22000, 'IDR'),
(3, 'TRX', '001', 'SKUSKILNL', 18000, 2, 'PCS', 36000, 'IDR');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_header`
--

CREATE TABLE `transaction_header` (
  `id` int(10) UNSIGNED NOT NULL,
  `document_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_header`
--

INSERT INTO `transaction_header` (`id`, `document_code`, `document_number`, `user`, `total`, `date`) VALUES
(1, 'TRX', '001', 'Smit', 88000, '2022-10-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_product_code_unique` (`product_code`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_detail_document_number_index` (`document_number`),
  ADD KEY `transaction_detail_product_code_index` (`product_code`);

--
-- Indexes for table `transaction_header`
--
ALTER TABLE `transaction_header`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_header_document_number_unique` (`document_number`),
  ADD KEY `transaction_header_user_index` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_header`
--
ALTER TABLE `transaction_header`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
