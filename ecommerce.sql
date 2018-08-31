-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 08:15 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `total` (OUT `total` INT)  NO SQL
    DETERMINISTIC
select sum(tax) INTO total from cart$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `c_u_id` int(11) NOT NULL,
  `c_p_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_image` varchar(100) NOT NULL,
  `c_price` int(11) NOT NULL,
  `tax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `c_u_id`, `c_p_id`, `c_name`, `c_image`, `c_price`, `tax`) VALUES
(32, 1, 12, 'Nike Printed Men Polo Neck Blue T-Shirt', 'images/13.png', 2078, 2181.9),
(33, 1, 2, 'Bluefire gaming headset (Blue)', 'images/2.jpg', 5939, 6235.95);

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `tax` BEFORE INSERT ON `cart` FOR EACH ROW set new.tax=(new.c_price+(new.c_price*0.05))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `mobile`, `message`) VALUES
(1, 'Gangadhar', 'gangadhar.smg24@gmai', '9483845366', 'Thank you');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktbl`
--

CREATE TABLE `feedbacktbl` (
  `f_id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacktbl`
--

INSERT INTO `feedbacktbl` (`f_id`, `fullname`, `feedback`) VALUES
(1, 'Gangadhar', 'One of the best ecommerce website, easy to use'),
(2, 'Bharath', 'Very good , thank you'),
(3, 'Pooja', 'Nice one'),
(4, 'Harshith', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `mobile` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `p_id`, `fullname`, `address`, `pincode`, `city`, `state`, `mobile`) VALUES
(1, 1, 'Gangadhar', 'Sagaranahalli', 572226, 'Tumkur', 'Karnataka', '+919483845'),
(2, 1, 'Gangadhar', 'Sagaranahalli', 572226, 'Tumkur', 'Karnataka', '+919483845366'),
(3, 12, 'Bharath', 'Tumkur', 572221, 'Tumkur', 'Karnataka', '+919413321446'),
(4, 12, 'Bharath', 'Tumkur', 572221, 'Tumkur', 'Karnataka', '+919413321446');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_image` varchar(500) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_image`, `p_price`, `p_type`) VALUES
(1, 'Beets headphone (pink)', 'images/1.jpg', 6939, 'Headphone'),
(2, 'Bluefire gaming headset (Blue)', 'images/2.jpg', 5939, 'Headphone'),
(3, 'boAt Rockerz 400 Wireless bluetooth Headphone.', 'images/3.png', 3695, 'Headphone'),
(4, 'Bose SoundLink Wireless Around-Ear Headphones wit...', 'images/4.png', 1650, 'Headphone'),
(5, 'Sennheiser-HD-4.50-BTNC', 'images/5.jpeg', 3123, 'Headphone'),
(6, 'Lightweight Headphones SBCHL140', 'images/6.jpg', 1200, 'Headphone'),
(7, 'Over and On Ear Headbands', 'images/7.jpg', 629, 'Headphone'),
(8, 'OPPO PM-3 Closed Back Planar Magnetic Headphones', 'images/8.jpg', 1899, 'Headphone'),
(9, 'Skullcandy Ink\'d 2.0 Mic\'d Headphones with Mic', 'images/9.jpg', 346, 'Headphone'),
(10, 'Lee Printed Men Round Neck Black T-Shirt', 'images/11.png', 979, 'Tshirt'),
(11, 'Adidas Originals Men Round Neck Black T-Shirt', 'images/12.png', 1659, 'Tshirt'),
(12, 'Nike Printed Men Polo Neck Blue T-Shirt', 'images/13.png', 2078, 'Tshirt'),
(13, 'Levis Men Round Neck Grey T-Shirt', 'images/14.png', 656, 'Tshirt'),
(14, 'BLACK AND DENIM V-neck Blue T-Shirt', 'images/15.png', 549, 'Tshirt'),
(15, 'DENIM Harringbone Round Neck T-Shirt', 'images/16.png', 790, 'Tshirt'),
(16, 'Lee Printed Women Round Neck White T-Shirt', 'images/17.png', 477, 'Tshirt'),
(17, 'Puma Women Round Neck Blue T-Shirt\r\n\r\n', 'images/18.png', 989, 'Tshirt'),
(18, 'Elle Printed Women Round Neck Blue T-Shirt', 'images/19.png', 899, 'Tshirt'),
(19, 'Levis Women Round Neck Maroon T-Shirt', 'images/20.png', 649, 'Tshirt'),
(20, 'Clo Clu Solid Women Denim Jacket', 'images/21.png', 550, 'Tshirt'),
(21, 'Fastrack NG3089SL01 Black Analog Watch - For Men', 'images/22.png', 2395, 'Watches'),
(22, 'Titan NH90024BM01 Karishma Analog Watch - For Men', 'images/23.png', 2995, 'Watches'),
(23, 'Sonata 77037PP07J Sonata Digital Watch - For Men', 'images/24.png', 799, 'Watches'),
(24, 'Diesel DZ1609 Double Down Analog Watch - For Men', 'images/25.png', 9495, 'Watches'),
(25, 'Fastrack NG6078SL05C Analog Watch - For Women', 'images/26.png', 1890, 'Watches'),
(26, 'Fossil ES3060 Georgia Analog Watch - For Women', 'images/27.png', 1999, 'Watches'),
(27, 'Titan NH9710SM01 Raga Analog Watch - For Women', 'images/28.png', 1999, 'Watches'),
(28, 'Abrexo Abx-40007 Analog Watch - For Women', 'images/29.png', 539, 'Watches');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mobile`, `email`, `address`) VALUES
(1, 'Gangadhar', 'guruomsmg', '+919483845', 'gangadhar.smg24@gmai', 'Sagaranahalli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `c_u_id` (`c_u_id`),
  ADD KEY `c_p_id` (`c_p_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `c_u_id` FOREIGN KEY (`c_u_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `p_u_id` FOREIGN KEY (`c_p_id`) REFERENCES `products` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `o_p_id` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
