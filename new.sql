-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 07:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `name`, `price`, `image`, `quantity`) VALUES
('1', '2', '3', '4', '4', 1),
('Sank--123-5931', 'sket-Nature-1728', 'sketch 4', '5000', 'upload/ac1.jpg', 2),
('Sank-9665-123-5592', 'Ac1-Acrylic-1105', 'Ac1', '50000', 'upload/ac1.jpg', 2),
('Sank-9665-123-5592', 'imag-Pencil-1249', 'image', '2000', 'upload/pencil.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `customer_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`customer_id`, `name`, `email`, `phone`, `password`) VALUES
('Nira--123-6818', 'Niraj', 'nirajjadhav@gmail.com', '', '$2y$10$V1lEQ5mqQ5MaL0WgtG6.r.v.gnV2oNqr.YNHXN88tzvN7gKYJ.PXa'),
('Sank-9665-123-2445', 'Sanket Walhekar', '18project03@gmail.com', '9665998329', '$2y$10$pwgcDoDwt1lO9hZ7vkTlrOFLKhqwTqvGQp13661wPoxZ1dS1PB8Qm'),
('Sank-9665-123-5592', 'Sanket', 'sanketwalhekar83@gmail.com', '9665998329', '$2y$10$xK45HgBGLgWFB8fFrKBqq.13buHVLLIn0DjFQUhkXx33KoO1..tfO'),
('Sank-9665-san-9502', 'Sanket Walhekar', 'sanketwalhekar4099@gmail.com', '9665998329', '$2y$10$oJVQCQ..txmdT963vtmV1eMhmIIJh7oGvlD/Z9ltkJEFuSHgV6s8O');

-- --------------------------------------------------------

--
-- Table structure for table `sketch_detail`
--

CREATE TABLE `sketch_detail` (
  `product_id` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `feature` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sketch_detail`
--

INSERT INTO `sketch_detail` (`product_id`, `type`, `name`, `price`, `image`, `feature`) VALUES
('Canv-Acrylic-3880', 'Acrylic', 'Canvas Picture', '2000', 'upload/can9.jpeg', 'Without Frame Sketch,\r\n'),
('J. K-Pencil-6720', 'Nature', 'J. K. Picture with Cat', '2000', 'upload/S7.jpg', 'A4 Size \r\nWithout Frame\r\nGraphite Pencil Sketch\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sketch_order`
--

CREATE TABLE `sketch_order` (
  `order_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `frame` varchar(100) NOT NULL,
  `requirement` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `order_status` int(100) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sketch_order`
--

INSERT INTO `sketch_order` (`order_id`, `name`, `email`, `image`, `size`, `frame`, `requirement`, `status`, `order_status`, `time`) VALUES
('Sank-7903', 'Sanket Walhekar', 'sanketwalhekar83@gmail.com', 'sketch_order/blog1.jpeg', 'A5', 'Sketch With Frame', 'No', 2, 0, '2023-10-12 20:39:06.600083'),
('Walh-1921', 'Walhekar', 'sanketwalhekar83@gmail.com', 'sketch_order/can11.jpeg', 'A4', 'Sketch With Frame', 'NO', 2, 0, '2023-10-12 20:37:50.019473'),
('Sani-8238', 'Sanika Gadekar', 'sanketwalhekar83@gmail.com', 'sketch_order/color15.jpeg', 'A3', 'Sketch With Frame', 'Nothing', 2, 0, '2023-10-13 05:00:35.732334'),
('Sank-7471', 'Sanket Walhekar', 'sanketwalhekar83@gmail.com', 'sketch_order/SKETCH1.jpeg', 'A5', 'Sketch With Frame', 'Nothing', 2, 0, '2023-10-13 05:15:46.505271'),
('Nira-6203', 'Niraj Jadhav', 'nirajjadhav@gmail.com', 'sketch_order/can1.webp', 'A4', 'Sketch With Frame', '', 1, 0, '2023-10-13 05:33:15.616876');

-- --------------------------------------------------------

--
-- Table structure for table `users_products`
--

CREATE TABLE `users_products` (
  `user_id` varchar(100) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_products`
--

INSERT INTO `users_products` (`user_id`, `item_id`, `status`, `quantity`) VALUES
('Sank-9665-123-9999', 'imag-Pencil-1249', 'Added to cart', 1),
('Sank-9665-123-9999', 'imag-Pencil-8596', 'Added to cart', 1),
('Sank-9665-123-5592', 'sket-Canvas-1096', 'Added to cart', 1),
('Sank-9665-123-5592', 'J. K-Pencil-6720', 'Added to cart', 3),
('', 'J. K-Pencil-6720', 'Added to cart', 1),
('Nira--123-6818', 'J. K-Pencil-6720', 'Added to cart', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `sketch_detail`
--
ALTER TABLE `sketch_detail`
  ADD PRIMARY KEY (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
