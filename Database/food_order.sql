-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 10:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'Jobaed Bhuiyan', 'jobaed', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Alvin Nill', 'Nill', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image`, `featured`, `active`) VALUES
(33, 'MoMo ', 'Food_catagory-1648982669.jpg', 'Yes', 'Yes'),
(34, 'Burger', 'Food_catagory-1648982677.jpg', 'Yes', 'Yes'),
(35, 'Pizza', 'Food_catagory-1648982687.jpg', 'Yes', 'Yes'),
(36, 'Sendwitch', 'Food_catagory-1649017847.jpg', 'Yes', 'Yes'),
(37, 'Fish & Chips', 'Food_catagory-1649018250.jpg', 'Yes', 'Yes'),
(38, 'Fried Chicken', 'Food_catagory-1649018523.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `discription` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `discription`, `price`, `image`, `category_id`, `featured`, `active`) VALUES
(7, 'Vegetables Burger ', 'Black beans, brown rice, mushrooms, tomato paste,', '80.00', 'Food_item-1648982485.jpg', 34, 'Yes', 'Yes'),
(8, 'Cheese Burger', 'A cheeseburger is a hamburger topped with cheese. Traditionally', '150.00', 'Food_item-1648980515.jpg', 34, 'Yes', 'Yes'),
(9, 'Chicken Burger', 'Crispy seasoned chicken breast, topped with mandatory melted', '150.00', 'Food_item-1648980583.jpg', 34, 'No', 'Yes'),
(10, 'Steamed Momo', 'Steamed momos are meat filled dumplings from the east Indian state of Sikkim.', '130.00', 'Food_item-1648980695.jpg', 33, 'Yes', 'Yes'),
(11, 'Chilly momo', 'In a pan, add them along', '455.00', 'Food_item-1648980847.jpeg', 33, 'Yes', 'Yes'),
(12, 'Neapolitan Pizza', 'Neapolitan pizza, or pizza Napoletan', '150.00', 'Food_item-1648980996.jpg', 35, 'Yes', 'Yes'),
(13, 'Sicilian Pizza', 'CHEESY GARLIC TOAST', '280.00', 'Food_item-1648981080.jpg', 35, 'Yes', 'Yes'),
(14, 'Chickens Sandwich', ' Smoked Chicken Sandwich. Smoked Chicken Sandwich', '210.00', 'Food_item-1648981199.jpg', 36, 'No', 'Yes'),
(15, 'Egg Sandwich', 'Just boil the eggs, whip up a filling mixture', '80.00', 'Food_item-1648981305.jpeg', 36, 'Yes', 'Yes'),
(16, 'Pea Fritters', 'Pea fritters are a great little finger food, ideal for baby led weaning', '120.00', 'Food_item-1649019992.jpg', 37, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(250) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Vegetables Burger ', '80.00', 3, '240.00', '2022-04-05 01:24:20', 'Deleverd', 'Jobaed Bhuiyan', '01707586774', 'jobaedbhuiyan34@gmail.com', '                                                556 East Kazipara, Dhaka                                        '),
(2, 'Vegetables Burger ', '80.00', 3, '240.00', '2022-04-05 01:25:42', 'Ordered', 'Jobaed Bhuiyan', '01707586774', 'jobaedbhuiyan34@gmail.com', '556 East Kazipara, Dhaka'),
(3, 'Steamed Momo', '130.00', 5, '650.00', '2022-04-05 01:26:52', 'Ordered', 'Alvin Nill', '01722308516', 'helloking4321@gmail.com', '231 Shawrapara, Dhaka'),
(4, 'Vegetables Burger ', '80.00', 4, '320.00', '2022-04-05 01:32:35', 'Deleverd', 'Jobaed Bhuiyan', '01701586774', 'helloking4321@gmail.com', '                                                Test address                                        '),
(5, 'Chilly momo', '455.00', 1, '455.00', '2022-04-05 01:38:18', 'Canclled', 'Jobaed Bhuiyan', '01707586774', 'jobaedbhuiyan@gmail.com', '                        556 East Kazipara, Dhaka                    '),
(6, 'Neapolitan Pizza', '150.00', 1, '150.00', '2022-04-05 01:38:46', 'Ordered', 'Jobaed Bhuiyan', '01707586774', 'helloking4321@gmail.com', '556 East Kazipara, Dhaka'),
(7, 'Egg Sandwich', '80.00', 2, '160.00', '2022-04-05 01:40:14', 'Deleverd', 'Jobaed Bhuiyan', '01701586774', 'helloking4321@gmail.com', '                                                                                                231 Shawrapara, Dhaka                                                                                '),
(8, 'Chicken Burger', '150.00', 1, '150.00', '2022-04-05 01:41:17', 'Ordered', 'Jobaed Bhuiyan', '01707586774', 'jobaedbhuiyan38@gmail.com', '                                                 East Kazipara Dhaka                                                              '),
(9, 'Chilly momo', '455.00', 1, '455.00', '2022-04-05 01:42:53', 'Ordered', 'Alvin Nill', '01722308516', 'helloking4321@gmail.com', 'asdf'),
(10, 'Pea Fritters', '120.00', 1, '120.00', '2022-04-05 01:44:19', 'OnDelevary', 'Alvin Nill', '01707586774', 'helloking@gmail.com', '                                                ASDF                                        '),
(11, 'Pea Fritters', '120.00', 2, '240.00', '2022-04-05 01:46:14', 'OnDelevary', 'Jobaed Bhuiyan', '01707586774', 'asdfa@gmail.com', '                                                                        rsgjjsf                                                            '),
(13, 'Vegetables Burger ', '80.00', 5, '400.00', '2022-04-05 14:48:22', 'Canclled', 'Jobaed Bhuiyan', '01707586774', 'jobaedbhuiyan@gmail.com', '                                                                                                west Kazipara, Dhaka                                                                                '),
(14, 'Steamed Momo', '130.00', 1, '130.00', '2022-04-24 11:22:45', 'Ordered', 'Jobaed Bhuiyan', '01707586774', 'jobaedbhuiyan34@gmail.com', 'luu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
