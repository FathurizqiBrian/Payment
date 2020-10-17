-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 10:58 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `namapemesan` varchar(255) NOT NULL,
  `telppemesan` varchar(255) NOT NULL,
  `emailpemesan` varchar(255) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `namapemesan`, `telppemesan`, `emailpemesan`, `join_date`) VALUES
(1, 'Maya', '085641208060', 'maya@gmail.com', '2020-04-06 16:59:27'),
(2, 'Caroline', '085640644498', 'caroline@mf.com', '2020-04-06 17:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `customer` int(11) NOT NULL,
  `namapengirim` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `payment` varchar(64) NOT NULL,
  `notes` longtext NOT NULL,
  `user` int(1) NOT NULL DEFAULT '0',
  `xendit_id` text NOT NULL,
  `invoice_url` longtext NOT NULL,
  `status` varchar(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice`, `produk`, `customer`, `namapengirim`, `harga`, `payment`, `notes`, `user`, `xendit_id`, `invoice_url`, `status`, `create_date`, `last_update`) VALUES
(1, 'MF-0001', 'Bunga Papan ', 2, 'Maya', 850000, 'CREDIT CARD', 'Include ongkir', 1, '5e942851279e3d46f0e2cf80', 'https://invoice-staging.xendit.co/web/invoices/5e942851279e3d46f0e2cf80', 'PAID', '2020-04-13 08:52:32', '2020-04-13 08:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(64) NOT NULL,
  `pwd` longtext NOT NULL,
  `role` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `pwd`, `role`, `status`, `input_date`) VALUES
(1, 'Henry', 'henry@gmail.com', '$2a$08$8iHYa2/4ZeSBp.b/4D/XCO4wabwFQJWvNb7XgucC2j3NO0uXn0LuC', 'superadmin', 1, '2020-03-29 17:44:29'),
(5, 'Rachel', 'rachel@memeflorist.com', '$2a$08$lb4v/om5GTZ/J6fleeNaQev0oXPAv0mRR9TtMUy1UDeu8.O8ZRDey', 'sales', 1, '2020-04-06 16:55:05'),
(6, 'Mika', 'mika@memeflorist.com', '$2a$08$mKjf7Cxxi0n9vMzX3.o/luyOjLSeT8yVK453XNJKyh5QBAIYbz0H.', 'sales', 1, '2020-04-06 17:24:52'),
(7, 'Kastini', 'kastini@memeflorist.com', '$2a$08$fui//5WkW6kfzl8Ayuir/OMdmxHyelgcRO.81TADooOVeUtNmIc32', 'finance', 1, '2020-04-13 08:50:14'),
(8, 'Hero', 'hero@memeflorist.com', '$2a$08$f2PnsvERGUkerp21v/vC2.UeC5FZQpmOhMxcYvu8yFMsSrclpf5Mu', 'direktur', 1, '2020-04-13 08:57:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
