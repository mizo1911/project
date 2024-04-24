-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 09:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `palestina_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(300) NOT NULL,
  `user_address` varchar(300) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `product_price` decimal(6,0) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `product_image2` varchar(300) NOT NULL,
  `product_image3` varchar(300) NOT NULL,
  `product_image4` varchar(300) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Trendy Shoes\r\n', 'Shoes\r\n', '\r\nBlacklight LED Light Roller Sneakers for Kids! These amazing shoes feature built-in LED lights that illuminate in bright neon colors, making your child the star of any party or event.\r\n\r\nBut that\'s not all – these shoes also have hidden wheels in the sole, allowing your child to glide effortle', 'shoes-featured.png', 'coat.webp', 'shirt-featured.jpg', 'bag-featured.png', 350.00, 0, 'Black'),
(2, 'Red Hooded Faux Fur Long Jacket', ' jackets', 'Girl Hooded Faux Fur Long Jacket\r\nCasual Winter Jacket\r\nFancy Long Sleeve Faux Fur Hooded Jacket ', 'coat.webp', 'shirt-featured.jpg', 'bag-featured.png', '	\r\nshoes-featured.png', 850.00, 0, 'Red'),
(3, 'Funko Backpack', 'Bags', 'Mini Backpack Girls Water-Resistant Small Backpack For Womens Adult Kids School Travel Women Backpack -Mini Backpack Bag For Regular Use Women Bags.', 'bag-featured.png', 'shoes-featured.png', 'shirt-featured.jpg', 'coat.webp', 280.00, 0, 'White & Blue'),
(4, 'Oversize Fit Sweatshirt', 'Clothes', 'Awesome Oversize Fit Sweatshirt \r\nWinter Hoodie long sleeves padded inside high quality\r\nPrinted Oversized Hoodie', 'shirt-featured.jpg', 'bag-featured.png', 'coat.webp', 'shoes-featured.png', 499.00, 0, 'White & Baby Blue'),
(5, 'Winter Trench Coat Men Coat Wool', 'jackets', 'Winter Trench Coat Men Coat Wool Formal Coat Male 2023 Autumn', 'manCoat1.jpg', 'manCoat2.webp', 'manCoat3.webp', 'manCoat4.webp', 1000.00, 20, 'grey'),
(6, 'BRITISH PALACE TAILCOAT', 'jackets', 'BRITISH PALACE TAILCOAT LONG SUIT JACKET FOR MEN Overcoat Warm Winter Trench Coat PASLTER Mens Trench Coat Slim Fit Notched Collar Fall Winter Single Breasted Pea Coat Warm Soft Overcoat', 'manCoat2.webp', 'manCoat1.jpg', 'manCoat3.webp', 'manCoat4.webp', 2000.00, 0, 'Black'),
(7, 'Men\'s Jackets Windproof Hooded ', 'jackets', 'Men\'s Jackets Windproof Hooded Casual Coat\r\nBRITISH PALACE TAILCOAT LONG SUIT JACKET FOR MEN Overcoat Warm Winter Trench Coat PASLTER Mens Trench Coat Slim Fit Notched Collar Fall Winter Single Breasted Pea Coat Warm Soft Overcoat', 'manCoat3.webp', 'manCoat4.webp', 'manCoat1.jpg', 'manCoat2.webp', 899.00, 0, 'Brown'),
(8, 'Men Military Hooded  ', 'jackets', 'Men Military Hooded Water Proof Wind Breaker Casual Coat Male 2023 Autumn', 'manCoat4.webp', 'manCoat3.webp', 'manCoat2.webp', 'coat1.jpg', 559.00, 0, 'Green'),
(9, 'Sports Fashion Black Shoes ', 'Shoes', 'Sports Fashion Black Sports Shoes For Boys Men', 'shoe1.jpg', 'shoe2.jpg', 'shoe3.webp', 'shoe4.webp', 800.00, 20, 'Black'),
(10, 'Men\'s Running Shoes', 'Shoes', 'Sports Shoes Running Shoes\r\nWalking Shoes Non Slip Athletic Fashion Sneakers Mesh Workout Casual Sports', 'shoe3.webp', 'shoe4.webp', 'shoe2.jpg', 'shoe1.jpg', 900.00, 10, 'Yellow'),
(11, 'Casual Sports Shoes', 'Shoes', 'Men\'s Running Shoes Comfortable Lightweight Breathable Walking Shoes Mesh Workout Casual Sports Shoes', 'shoe2.jpg', 'shoe1.jpg', 'shoe4.webp', 'shoe3.webp', 699.00, 40, 'Dark Blue'),
(12, 'High Quality Badminton Sports Shoes', 'Shoes', 'EMBROIDERED-LOGO TRAINERS WITH RUBBERISED FAUX LEATHER', 'shoe4.webp', 'shoe2.jpg', 'shoe3.webp', 'shoe1.jpg', 1050.00, 0, 'Purple');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
