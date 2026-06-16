-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 16, 2026 at 02:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `email`, `phone`, `address`, `total_amount`, `order_date`, `user_id`) VALUES
(1, 'Mazen Omer', 'mazenomermazen2002@gmail.com', '0793753602', 'kk10', 4800.00, '2026-06-14 01:45:38', NULL),
(2, 'Ali', 'ahmedali2214@hotmail.com', '0793545454', 'kk10', 450.00, '2026-06-14 01:54:01', NULL),
(3, 'Mazen Omer', 'mazenmohammedoemr1@gmail.com', '0793753602', 'kk10', 2400.00, '2026-06-14 09:28:03', NULL),
(4, 'Mazen Omer', 'mazenmohammedoemr1@gmail.com', '0793753602', 'kk10', 1200.00, '2026-06-14 09:36:45', 1),
(5, 'ali ahmed', 'ahmedali2214@hotmail.com', '0795845645', 'Musanzi\r\n', 50.00, '2026-06-14 09:47:32', 2),
(6, 'Salim', 'salim123@gmail.com', '0793555544', '            Kanombi\r\n', 4465.00, '2026-06-15 00:09:37', 0),
(7, 'wadda', 'wadda2005@gmail.com', '07944556888', 'Kigali', 1620.00, '2026-06-15 00:57:58', 4),
(8, 'wadda', 'wadda2005@gmail.com', '07944556888', '  Musanzi\r\n', 1320.00, '2026-06-15 01:24:06', 4),
(9, 'mustafa', 'mustafa123@gmail.com', '079546852', 'Remera            ', 150.00, '2026-06-15 21:08:17', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 2, 4, 1200.00),
(2, 2, 6, 6, 15.00),
(3, 2, 4, 3, 120.00),
(4, 3, 2, 2, 1200.00),
(5, 4, 2, 1, 1200.00),
(6, 5, 3, 1, 50.00),
(7, 6, 3, 5, 50.00),
(8, 6, 2, 1, 1200.00),
(9, 6, 1, 2, 1500.00),
(10, 6, 6, 1, 15.00),
(11, 7, 4, 1, 120.00),
(12, 7, 1, 1, 1500.00),
(13, 8, 2, 1, 1200.00),
(14, 8, 4, 1, 120.00),
(15, 9, 4, 1, 120.00),
(16, 9, 6, 2, 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `description`, `stock`, `created_at`) VALUES
(1, 'Arabian Horse', 'Big Animals', 1500.00, 'horse.avif', 'Healthy Arabian horse', 5, '2026-06-14 01:01:07'),
(2, 'Dairy Cow', 'Big Animals', 1200.00, 'cow.avif', 'Milk producing cow', 10, '2026-06-14 01:01:07'),
(3, 'Rabbit', 'Small Animals', 50.00, 'rabbit.avif', 'Friendly pet rabbit', 20, '2026-06-14 01:01:07'),
(4, 'Parrot', 'Small Animals', 120.00, 'parrot.avif', 'Colorful talking parrot', 8, '2026-06-14 01:01:07'),
(5, 'Dog Food Premium', 'Animal Food', 25.00, 'dogfood.avif', 'Premium dog nutrition', 50, '2026-06-14 01:01:07'),
(6, 'Bird Food Mix', 'Animal Food', 15.00, 'birdfood.avif', 'Healthy bird feed', 40, '2026-06-14 01:01:07'),
(7, 'Camel', 'Big Animals', 3200.00, 'camel.avif', 'Strong desert camel suitable for transport and farming.', 3, '2026-06-16 00:40:44'),
(8, 'Goat', 'Big Animals', 450.00, 'goat.avif', 'Healthy farm goat ideal for milk and breeding.', 12, '2026-06-16 00:40:44'),
(9, 'Golden Hamster', 'Small Animals', 35.00, 'hamster.avif', 'Friendly hamster that makes a perfect family pet.', 20, '2026-06-16 00:40:44'),
(10, 'Guinea Pig', 'Small Animals', 45.00, 'guinea-pig.avif', 'Cute and social guinea pig that enjoys human interaction.', 18, '2026-06-16 00:40:44'),
(11, 'Cat Food Deluxe', 'Animal Food', 18.00, 'cat-food.avif', 'Premium cat food rich in vitamins and protein.', 50, '2026-06-16 00:40:44'),
(12, 'Fish Food Flakes', 'Animal Food', 10.00, 'fish-food.webp', 'Nutritious floating flakes for aquarium fish.', 60, '2026-06-16 00:40:44'),
(13, 'Golden Retriever Dog', 'Small Animals', 450.00, 'golden-retriever.avif', 'Friendly and intelligent family dog known for its loyalty and playful nature.', 8, '2026-06-16 00:45:02'),
(14, 'German Shepherd Dog', 'Small Animals', 550.00, 'german-shepherd.avif', 'Highly trainable and protective dog suitable for families and security purposes.', 6, '2026-06-16 00:45:02'),
(15, 'Persian Cat', 'Small Animals', 300.00, 'persian-cat.avif', 'Beautiful long-haired cat with a calm and affectionate personality.', 10, '2026-06-16 00:45:02'),
(16, 'Siamese Cat', 'Small Animals', 280.00, 'siamese-cat.avif', 'Elegant and vocal cat breed known for its striking blue eyes.', 9, '2026-06-16 00:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `created_at`) VALUES
(1, 'Mazen Omer', 'mazenmohammedomer1@gmail.com', '$2y$10$v3mSs..s8ZKgkLQlQ0Gbp.yi0WhUlnDWxK.wbiKW8IRVg8t5J..XC', '2026-06-14 09:08:25'),
(2, 'Ali Ahmed', 'ahmedali2214@hotmail.com', '$2y$10$iExRsdk7s.NpCmOuCPCz0eNNg/46dR3LTksF0XvSrpFjBQfFQryFG', '2026-06-14 09:44:25'),
(3, 'Khalid', 'khalid@gmail.com', '$2y$10$fT1lSIag.mR/H70kl1Iv8uI0lyJ7JvOIeUNRo25nfnYzeYOV2wy5m', '2026-06-14 17:36:51'),
(4, 'Wadda', 'wadda2005@gmail.com', '$2y$10$ntnn4SNJBO.kmyJoFRF5TezH9LDWHNnx6fFYDPNZl1WvILejG2gee', '2026-06-14 17:46:46'),
(5, 'Mustafa', 'mustafa123@gmail.com', '$2y$10$p73NSF/yQhz6j5BooM83aOdZG8sOSvfmqVi/bLtBUC7Lgoq.7hGdO', '2026-06-15 21:07:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
