-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 05:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `aboutus` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `aboutus`) VALUES
(1, 'The Online Grocery Store Management System can be used to sell Grocery Item online.It maintains the information about the various Grocery items available in the system. It also maintains the records of all the Users, Admin, Dealer, Delivery boy.The purpose of project is to build an application program to reduce the manual work for managing grocery, customers, stock, products etc.It tracks all the details about the order.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admin_products`
--

CREATE TABLE `admin_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_company` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_volume` varchar(255) NOT NULL,
  `product_unit` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_availability` varchar(255) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_products`
--

INSERT INTO `admin_products` (`product_id`, `product_name`, `product_company`, `product_description`, `product_volume`, `product_unit`, `product_price`, `product_availability`, `product_image1`, `product_image2`, `product_image3`, `product_quantity`) VALUES
(1, 'AASHIRWAD AATA', '', '', '', '', 500, '', '', '', '', 0),
(2, 'coconut water', 'Vita ', 'The Vita Coco organic coconut water is our not from concentrate budget pick which as well as being naturally gluten free is also kosher.                                                    ', '1000', 'ml', 60, '', '', '', '', 0),
(3, 'dabur glucose', '', '', '', '', 40, '', '', '', '', 0),
(4, 'FORTUNE SOYABEAN OIL', '', '', '', '', 500, '', '', '', '', 0),
(5, 'frozen sweet corn', '', '', '', '', 250, '', '', '', '', 0),
(6, 'kesar mango pulp', '', '', '', '', 200, '', '', '', '', 0),
(7, 'mixed fruit juice', '', '', '', '', 50, '', '', '', '', 0),
(8, 'orange soft drink', '', '', '', '', 30, '', '', '', '', 0),
(9, 'prune juice - sunsweet', '', '', '', '', 50, '', '', '', '', 0),
(10, 'red bull energy drink', '', '', '', '', 25, '', '', '', '', 0),
(11, 'sprite bottle ', '', '', '', '', 50, '', '', '', '', 0),
(12, 'Wheat Flour - Maida', '', '', '', '', 600, '', '', '', '', 0),
(49, 'pepper salami ', 'Simon peter fish', ' Our black pepper salami is slow-fermented at a lower than average temperature for a soft taste and just a hint of spice to round out the savory depth.                                                   ', '250', 'gram', 250, '', '', '', '', 0),
(50, 'aamras juice ', 'Asmras', ' Paper boat aamras is made from 45 percent mango pulp, it reminds of the fact that the mango is indeed the true king of the fruit realm.                                                  ', '250', 'ml', 20, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`) VALUES
(1, 'Althan'),
(2, 'Kharvarnagar'),
(3, 'Sagrampura'),
(4, 'Varacha'),
(5, 'Vesu VIP road'),
(6, 'Vesu,near Shayam Mandir'),
(7, 'Katargam'),
(8, 'Adajan'),
(9, 'Khatodara');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `totalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CATEGORY_NAME` varchar(50) NOT NULL,
  `CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UPDATION_DATE` varchar(25) DEFAULT NULL,
  `CATEGORY_DESCRIPTION` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CATEGORY_NAME`, `CREATION_DATE`, `UPDATION_DATE`, `CATEGORY_DESCRIPTION`) VALUES
(1, 'FLOUR', '2020-03-09 04:05:57', '09-03-2020 09:35:57 AM', 'Flour is a powder made by grinding raw grains, roots, beans, nuts, or seeds. It is used to make many different foods.'),
(2, 'OIL', '2020-03-08 06:21:16', NULL, 'Oil and gas in everyday life. Oil and gas are used widely in modern life. Oil fuels the cars, trucks and planes that underpin modern economies and lifestyles.'),
(3, 'Beveranges', '2020-04-04 07:59:22', NULL, 'About 33,00,00,000 results (0.47 seconds) \r\nSearch Results\r\nFeatured snippet from the web\r\nImage result for beverages description\r\nA liquid to consume, usually excluding water; a drink. This may include tea, coffee, liquor, beer, milk, juice, or soft drinks.'),
(4, 'Frozen food', '2020-04-04 13:01:53', NULL, 'The definition of frozen food in the dictionary is food preserved by a freezing process and stored in a freezer before cooking.'),
(8, 'Meat', '2020-06-09 13:22:14', NULL, 'lunch meat, poultry, beef, pork');

-- --------------------------------------------------------

--
-- Table structure for table `chart_data`
--

CREATE TABLE `chart_data` (
  `id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `month` varchar(50) NOT NULL,
  `profit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_data`
--

INSERT INTO `chart_data` (`id`, `year`, `month`, `profit`) VALUES
(2, '2020', 'April', '100.00'),
(3, '2018', 'Febuary', '600.00'),
(4, '2018', 'January', '50.00'),
(5, '2018', 'March', '20.00'),
(6, '2019', 'April', '30.00'),
(7, '2019', 'June', '250.00'),
(8, '2019', 'May', '280.00'),
(9, '2020', 'July', '500.00'),
(10, '2020', 'May', '900.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reg`
--

CREATE TABLE `customer_reg` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `CUSTOMER_NAME` varchar(255) NOT NULL,
  `CUSTOMER_GMAIL` varchar(255) NOT NULL,
  `CUSTOMER_PHONE` varchar(10) NOT NULL,
  `CUSTOMER_OTP` int(11) NOT NULL,
  `CUSTOMER_STATUS` char(1) NOT NULL,
  `CUSTOMER_PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_reg`
--

INSERT INTO `customer_reg` (`CUSTOMER_ID`, `CUSTOMER_NAME`, `CUSTOMER_GMAIL`, `CUSTOMER_PHONE`, `CUSTOMER_OTP`, `CUSTOMER_STATUS`, `CUSTOMER_PASSWORD`) VALUES
(3, 'Fenu Jariwala', '17bmiit129@gmail.com', '7575099918', 0, 'A', '8416ab0f44ad4ff7ef66f01fad22c2cc'),
(5, 'Feni Jariwala', 'fenijariwala225@gmail.com', '7575988876', 0, 'A', '8416ab0f44ad4ff7ef66f01fad22c2cc');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_products`
--

CREATE TABLE `dealer_products` (
  `PRODUCT_ID` int(11) NOT NULL,
  `DEALER_ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(50) NOT NULL,
  `PRODUCT_COMPANY` varchar(50) NOT NULL,
  `PRODUCT_DESCRIPTION` varchar(255) NOT NULL,
  `PRODUCT_VOLUME` int(11) NOT NULL,
  `PRODUCT_UNIT` varchar(50) NOT NULL,
  `PRODUCT_PRICE` float NOT NULL,
  `PRODUCT_SHIPPINGCHARGE` int(11) NOT NULL,
  `PRODUCT_AVAILABILITY` varchar(50) NOT NULL,
  `PRODUCT_IMAGE1` varchar(255) NOT NULL,
  `PRODUCT_IMAGE2` varchar(255) NOT NULL,
  `PRODUCT_IMAGE3` varchar(255) NOT NULL,
  `SUBCATEGORY_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `PRODUCT_QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer_products`
--

INSERT INTO `dealer_products` (`PRODUCT_ID`, `DEALER_ID`, `PRODUCT_NAME`, `PRODUCT_COMPANY`, `PRODUCT_DESCRIPTION`, `PRODUCT_VOLUME`, `PRODUCT_UNIT`, `PRODUCT_PRICE`, `PRODUCT_SHIPPINGCHARGE`, `PRODUCT_AVAILABILITY`, `PRODUCT_IMAGE1`, `PRODUCT_IMAGE2`, `PRODUCT_IMAGE3`, `SUBCATEGORY_ID`, `CATEGORY_ID`, `PRODUCT_QUANTITY`) VALUES
(9, 21, 'FORTUNE SOYABEAN OIL', 'FORTUNE', 'Fortune Soya Health Oil contains zero cholesterol and helps maintain strong bones and good vision.                                                ', 5, 'liter', 500, 30, 'In Stock', 'FORTUNE1.PNG', 'FORTUNE2.PNG', 'FORTUNE3.PNG', 9, 2, 44),
(10, 57, 'AASHIRWAD AATA', 'AASHIRWAD', '  Aashirvaad atta is made from the choicest grains - heavy on the palm, golden amber in colour and hard in bite.                                                   ', 15, 'kg', 500, 20, 'In Stock', 'aashirwad.png', 'aashirwad2.png', 'aashirwad3.png', 10, 1, 7),
(11, 57, 'Wheat Flour - Maida', 'NATURAL HARVEST', 'All Purpose flour made from Endosperm in the wheat grain kernal is coomnly known as refined flour or Maida.                                                     ', 5, 'kg', 600, 20, 'In Stock', 'MAIDA1.PNG', 'MAINDA2.PNG', 'MAINDA3.PNG', 10, 1, 16),
(12, 58, 'orange soft drink', 'Mirinda', 'It is part of a beverage area often referred to as the flavour segment, comprising carbonated and non-carbonated fruit-flavoured beverages.                                                     ', 250, 'ml', 30, 5, 'In Stock', '49.png', '', '', 11, 3, 25),
(13, 58, 'prune juice - sunsweet', 'sunsweet', '  Sunsweet prune is a source of dietary fibre and potassium, providing two of the principle beneficial nutrients gained from having fruit and vegetables in our diet.                                                   ', 1, 'liter', 50, 8, 'In Stock', '14.png', '', '', 11, 3, 39),
(14, 58, 'coco cola zero can ', 'coco cola', '  Coca-Cola Zero Sugar, also called Coke Zero, is a diet cola produced by The Coca-Cola Company.                                                 ', 330, 'ml', 15, 6, 'In Stock', '15.png', '', '', 11, 3, 7),
(15, 58, 'sprite bottle ', 'coco cola', 'Sprite is a colorless, lemon and lime-flavored soft drink created by The Coca-Cola Company.                                                 ', 2, 'liter', 50, 5, 'In Stock', '16.png', '', '', 11, 3, 45),
(16, 58, 'mixed fruit juice', 'Tropicana', ' It also does not come with added preservatives, colour, or artificial flavouring. This healthy juice comes with nine different nutrients that revitalise your body and make you feel fresh.                                                   ', 1, 'liter', 50, 6, 'In Stock', '13.png', '', '', 12, 3, 36),
(17, 58, 'aamras juice ', 'Asmras', ' Paper boat aamras is made from 45 percent mango pulp, it reminds of the fact that the mango is indeed the true king of the fruit realm.                                                  ', 250, 'ml', 20, 6, 'In Stock', '50.png', '', '', 12, 3, 33),
(18, 58, 'coconut water', 'Vita ', 'The Vita Coco organic coconut water is our not from concentrate budget pick which as well as being naturally gluten free is also kosher.                                                    ', 1000, 'ml', 60, 10, 'In Stock', '51.png', '', '', 12, 3, 23),
(19, 58, 'dabur glucose', 'Dabur', '                                                   Enriched with vitamin-D and calcium for easy assimilation and quick replenishment of essential vitamins, minerals and body salts, Dabur Glucose is a ready source of energy to fight tiredness.             ', 250, 'gram', 40, 10, 'In Stock', '53.png', '', '', 13, 3, 25),
(20, 58, 'mix lemon flavour', 'Gatorade', '  The Gatorade Company, Inc. is an American manufacturer of sports-themed beverage and food                                                   ', 50, 'gram', 100, 10, 'In Stock', '54.png', '', '', 13, 3, 49),
(21, 58, 'red bull energy drink', 'Red Bull GmbH', 'In this,Caffeine, taurine, glucuronolactone, sucrose and glucose, B-group vitamins, and alpine spring water are their                                                    ', 250, 'ml', 25, 3, 'In Stock', '56.png', '', '', 13, 3, 44),
(22, 59, 'pepper salami ', 'Simon peter fish', ' Our black pepper salami is slow-fermented at a lower than average temperature for a soft taste and just a hint of spice to round out the savory depth.                                                   ', 250, 'gram', 250, 5, 'In Stock', '66.png', '', '', 14, 4, 2),
(23, 59, 'kesar mango pulp', 'Swad', 'Kesar mangoes are also referred to as being the Queen of fruits.                                                     ', 800, 'gram', 200, 5, 'In Stock', '69.png', '', '', 14, 4, 42),
(24, 60, 'frozen sweet corn ', 'Fresh', 'crops preserved by freezing is sweet corn (Zea mays L.). Both corn on the cob and cut corn are frozen. Sweet corn must be harvested while still young and tender and while the kernels are full of “milk.”                                                     ', 250, 'gram', 250, 15, 'In Stock', '70.png', '', '', 15, 4, 13),
(25, 58, '7 Up', '7 Up Lithiated Lemon Soda', '7 Up is a brand of lemon-lime-flavored non-caffeinated soft drink. The rights to the brand are held ... Its name was later shortened to \"7 Up Lithiated Lemon Soda\" before being further shortened to just \"7 Up\" by 1936.                                     ', 1, 'liter', 80, 5, 'In Stock', '7up.jpge.jpeg', '', '', 11, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mailus`
--

CREATE TABLE `mailus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mailus`
--

INSERT INTO `mailus` (`id`, `name`, `phone`, `email`, `subject`, `message`) VALUES
(1, 'Fenu', '8585764567', 'fenijariwala225@gmail.com', 'For foods', 'Please ,put variety of food packets.');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(15, 53, 'in Process', 'Your products is in process', '2020-04-27 09:02:47'),
(16, 53, 'Delivered', 'Your order have been delivered to your address', '2020-04-27 09:03:12'),
(17, 56, 'in Process', 'Your order in process', '2020-05-21 13:36:53'),
(18, 56, 'Delivered', 'your order is sucessfully reached at your address', '2020-05-21 13:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_address_customer`
--

CREATE TABLE `order_address_customer` (
  `full_name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address_type` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_address_customer`
--

INSERT INTO `order_address_customer` (`full_name`, `mobile_no`, `landmark`, `city`, `address_type`, `customer_id`) VALUES
('Feni', '9825017895', 'old mahavir hospital', 'surat', 'Home', 4),
('Feni', '7575899967', 'old mahavir hospital', 'surat', 'Home', 4),
('Fenu Jariwala', '7575688897', 'old mahavir hospital', 'Surat', 'Commercial', 5),
('Twinkle', '9825017895', 'Swayam Mandir', 'Surat', 'Office', 5),
('Parth Jariwala', '9876578456', 'Kharvarnagar', 'Surat', 'Home', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_item_name` varchar(250) NOT NULL,
  `order_item_quantity` int(11) NOT NULL,
  `order_item_price` double(12,2) NOT NULL,
  `order_item_company` varchar(255) NOT NULL,
  `order_item_description` varchar(255) NOT NULL,
  `order_item_volume` varchar(255) NOT NULL,
  `order_item_unit` varchar(255) NOT NULL,
  `order_item_subcategory` int(11) NOT NULL,
  `order_item_category` int(11) NOT NULL,
  `order_dealerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `order_item_name`, `order_item_quantity`, `order_item_price`, `order_item_company`, `order_item_description`, `order_item_volume`, `order_item_unit`, `order_item_subcategory`, `order_item_category`, `order_dealerid`) VALUES
(11, 13, 'Wheat Flour - Maida', 10, 600.00, '', '', '', '', 0, 0, 0),
(12, 14, 'AASHIRWAD AATA', 10, 500.00, '', '', '', '', 0, 0, 0),
(13, 15, 'orange soft drink', 1, 30.00, '', '', '', '', 0, 0, 0),
(14, 15, 'prune juice - sunsweet', 3, 50.00, '', '', '', '', 0, 0, 0),
(15, 15, 'dabur glucose', 5, 40.00, '', '', '', '', 0, 0, 0),
(16, 15, 'red bull energy drink', 15, 25.00, '', '', '', '', 0, 0, 0),
(17, 15, 'kesar mango pulp', 5, 200.00, '', '', '', '', 0, 0, 0),
(18, 15, 'frozen sweet corn', 15, 250.00, '', '', '', '', 0, 0, 0),
(19, 15, 'mixed fruit juice', 4, 50.00, '', '', '', '', 0, 0, 0),
(23, 17, 'FORTUNE SOYABEAN OIL', 1, 500.00, '', '', '', '', 0, 0, 0),
(24, 18, 'AASHIRWAD AATA', 1, 500.00, '', '', '', '', 0, 0, 0),
(25, 19, 'AASHIRWAD AATA', 1, 500.00, '', '', '', '', 0, 0, 0),
(26, 20, 'AASHIRWAD AATA', 1, 500.00, '', '', '', '', 0, 0, 0),
(27, 21, 'orange soft drink', 1, 30.00, '', '', '', '', 0, 0, 0),
(28, 22, 'orange soft drink', 1, 30.00, '', '', '', '', 0, 0, 0),
(29, 23, 'FORTUNE SOYABEAN OIL', 1, 500.00, '', '', '', '', 0, 0, 0),
(30, 24, 'AASHIRWAD AATA', 1, 500.00, '', '', '', '', 0, 0, 0),
(31, 25, 'sprite bottle ', 1, 50.00, '', '', '', '', 0, 0, 0),
(32, 26, 'sprite bottle ', 1, 50.00, '', '', '', '', 0, 0, 0),
(33, 27, 'AASHIRWAD AATA', 1, 500.00, 'AASHIRWAD', '  Aashirvaad atta is made from the choicest grains - heavy on the palm, golden amber in colour and hard in bite.                                                   ', '15', 'kg', 10, 1, 0),
(34, 28, 'sprite bottle ', 1, 50.00, 'coco cola', 'Sprite is a colorless, lemon and lime-flavored soft drink created by The Coca-Cola Company.                                                 ', '2', 'liter', 11, 3, 0),
(35, 28, 'coconut water', 1, 60.00, 'Vita ', 'The Vita Coco organic coconut water is our not from concentrate budget pick which as well as being naturally gluten free is also kosher.                                                    ', '1000', 'ml', 12, 3, 0),
(36, 29, 'AASHIRWAD AATA', 2, 500.00, 'AASHIRWAD', '  Aashirvaad atta is made from the choicest grains - heavy on the palm, golden amber in colour and hard in bite.                                                   ', '15', 'kg', 10, 1, 0),
(37, 30, 'Wheat Flour - Maida', 1, 600.00, 'NATURAL HARVEST', 'All Purpose flour made from Endosperm in the wheat grain kernal is coomnly known as refined flour or Maida.                                                     ', '5', 'kg', 10, 1, 0),
(38, 30, 'orange soft drink', 2, 30.00, 'Mirinda', 'It is part of a beverage area often referred to as the flavour segment, comprising carbonated and non-carbonated fruit-flavoured beverages.                                                     ', '250', 'ml', 11, 3, 0),
(39, 31, 'orange soft drink', 1, 30.00, 'Mirinda', 'It is part of a beverage area often referred to as the flavour segment, comprising carbonated and non-carbonated fruit-flavoured beverages.                                                     ', '250', 'ml', 11, 3, 0),
(40, 32, 'orange soft drink', 2, 30.00, 'Mirinda', 'It is part of a beverage area often referred to as the flavour segment, comprising carbonated and non-carbonated fruit-flavoured beverages.                                                     ', '250', 'ml', 11, 3, 0),
(41, 33, 'pepper salami ', 1, 250.00, 'Simon peter fish', ' Our black pepper salami is slow-fermented at a lower than average temperature for a soft taste and just a hint of spice to round out the savory depth.                                                   ', '250', 'gram', 14, 4, 0),
(42, 34, 'pepper salami ', 2, 250.00, 'Simon peter fish', ' Our black pepper salami is slow-fermented at a lower than average temperature for a soft taste and just a hint of spice to round out the savory depth.                                                   ', '250', 'gram', 14, 4, 0),
(43, 35, 'pepper salami ', 1, 250.00, 'Simon peter fish', ' Our black pepper salami is slow-fermented at a lower than average temperature for a soft taste and just a hint of spice to round out the savory depth.                                                   ', '250', 'gram', 14, 4, 0),
(44, 36, 'aamras juice ', 2, 20.00, 'Asmras', ' Paper boat aamras is made from 45 percent mango pulp, it reminds of the fact that the mango is indeed the true king of the fruit realm.                                                  ', '250', 'ml', 12, 3, 0),
(45, 36, 'AASHIRWAD AATA', 1, 500.00, 'AASHIRWAD', '  Aashirvaad atta is made from the choicest grains - heavy on the palm, golden amber in colour and hard in bite.                                                   ', '15', 'kg', 10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_item_customer`
--

CREATE TABLE `order_item_customer` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_item_name` varchar(250) NOT NULL,
  `order_item_quantity` int(11) NOT NULL,
  `order_item_price` double(12,2) NOT NULL,
  `order_item_dealerid` int(11) NOT NULL,
  `order_item_company` varchar(255) NOT NULL,
  `order_item_description` varchar(255) NOT NULL,
  `order_item_volume` varchar(255) NOT NULL,
  `order_item_unit` varchar(255) NOT NULL,
  `order_item_subcategory` int(11) NOT NULL,
  `order_item_category` int(11) NOT NULL,
  `order_item_customerid` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `orderStatus` varchar(25) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item_customer`
--

INSERT INTO `order_item_customer` (`order_item_id`, `order_id`, `order_item_name`, `order_item_quantity`, `order_item_price`, `order_item_dealerid`, `order_item_company`, `order_item_description`, `order_item_volume`, `order_item_unit`, `order_item_subcategory`, `order_item_category`, `order_item_customerid`, `year`, `month`, `orderStatus`, `order_date`, `status`) VALUES
(20, 53, 'sprite bottle ', 2, 50.00, 58, 'coco cola', 'Sprite is a colorless, lemon and lime-flavored soft drink created by The Coca-Cola Company.                                                 ', '2', 'liter', 11, 3, 5, 2020, 'April', '', '2020-05-14 14:36:40', 'A'),
(21, 53, 'mixed fruit juice', 1, 50.00, 58, 'Tropicana', ' It also does not come with added preservatives, colour, or artificial flavouring. This healthy juice comes with nine different nutrients that revitalise your body and make you feel fresh.                                                   ', '1', 'liter', 12, 3, 5, 2020, 'April', '', '2020-05-14 14:36:40', 'A'),
(22, 54, 'frozen sweet corn ', 1, 250.00, 60, 'Fresh', 'crops preserved by freezing is sweet corn (Zea mays L.). Both corn on the cob and cut corn are frozen. Sweet corn must be harvested while still young and tender and while the kernels are full of “milk.”                                                     ', '250', 'gram', 15, 4, 5, 2020, 'May', '', '2020-05-15 03:13:02', ''),
(23, 54, 'kesar mango pulp', 2, 200.00, 59, 'Swad', 'Kesar mangoes are also referred to as being the Queen of fruits.                                                     ', '800', 'gram', 14, 4, 5, 2020, 'May', '', '2020-05-15 03:13:02', ''),
(24, 55, 'kesar mango pulp', 1, 200.00, 59, 'Swad', 'Kesar mangoes are also referred to as being the Queen of fruits.                                                     ', '800', 'gram', 14, 4, 5, 2020, 'May', '', '2020-05-20 12:46:53', 'A'),
(25, 56, 'frozen sweet corn ', 2, 250.00, 60, 'Fresh', 'crops preserved by freezing is sweet corn (Zea mays L.). Both corn on the cob and cut corn are frozen. Sweet corn must be harvested while still young and tender and while the kernels are full of “milk.”                                                     ', '250', 'gram', 15, 4, 1, 2020, 'May', '', '2020-05-21 13:26:54', 'A'),
(26, 57, 'kesar mango pulp', 1, 200.00, 59, 'Swad', 'Kesar mangoes are also referred to as being the Queen of fruits.                                                     ', '800', 'gram', 14, 4, 5, 2020, 'June', '', '2020-06-11 15:03:09', ''),
(27, 57, 'frozen sweet corn ', 2, 250.00, 60, 'Fresh', 'crops preserved by freezing is sweet corn (Zea mays L.). Both corn on the cob and cut corn are frozen. Sweet corn must be harvested while still young and tender and while the kernels are full of “milk.”                                                     ', '250', 'gram', 15, 4, 5, 2020, 'June', '', '2020-06-11 15:03:09', ''),
(28, 58, '7 Up', 2, 80.00, 58, '7 Up Lithiated Lemon Soda', '7 Up is a brand of lemon-lime-flavored non-caffeinated soft drink. The rights to the brand are held ... Its name was later shortened to ', '1', 'liter', 11, 3, 5, 2020, 'June', '', '2020-06-11 15:09:09', ''),
(29, 58, 'frozen sweet corn ', 2, 250.00, 60, 'Fresh', 'crops preserved by freezing is sweet corn (Zea mays L.). Both corn on the cob and cut corn are frozen. Sweet corn must be harvested while still young and tender and while the kernels are full of “milk.”                                                     ', '250', 'gram', 15, 4, 5, 2020, 'June', '', '2020-06-11 15:09:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `order_total_amount` double(12,2) NOT NULL,
  `transaction_id` varchar(200) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `card_cvc` int(5) NOT NULL,
  `card_expiry_month` varchar(30) NOT NULL,
  `card_expiry_year` varchar(30) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `card_holder_number` varchar(250) NOT NULL,
  `email_address` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_city` varchar(250) NOT NULL,
  `customer_pin` varchar(30) NOT NULL,
  `customer_state` varchar(250) NOT NULL,
  `customer_country` varchar(250) NOT NULL,
  `customer_area` varchar(255) NOT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `deliveryBoyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `order_number`, `order_total_amount`, `transaction_id`, `order_date`, `card_cvc`, `card_expiry_month`, `card_expiry_year`, `order_status`, `card_holder_number`, `email_address`, `customer_name`, `customer_address`, `customer_city`, `customer_pin`, `customer_state`, `customer_country`, `customer_area`, `orderStatus`, `deliveryBoyId`) VALUES
(53, 831765, 150.00, 'txn_1GcRdrKmh6fwvQYOLEsU6DfA', '2020-04-27 09:03:12', 854, '05', '2025', 'succeeded', '4242424242424242', 'fenijariwala225@gmail.com', 'Feni Jariwala', 'Sagrampura,khatodara', 'Surat', '395002', 'Gujarat', 'India', '', 'Delivered', 0),
(54, 802230, 650.00, 'txn_1GitytKmh6fwvQYOwx72RN1O', '2020-05-15 03:13:01', 856, '05', '2024', 'succeeded', '4242424242424242', 'parth@gmail.com', 'Parth Jariwala', 'Althan,Sai Enclave', 'Surat', '395002', 'Gujarat', 'India', '', '', 0),
(55, 233921, 200.00, 'txn_1GjPIJKmh6fwvQYOD15QZAJQ', '2020-05-20 12:37:04', 856, '05', '2024', 'succeeded', '4242424242424242', 'nimisha@gmail.com', 'Nimisha Jariwala', 'Sagrampura,Surat', 'Surat', '395002', 'Gujarat', 'India', 'Sagrampura', '', 3),
(56, 693186, 500.00, 'txn_1GlEFdKmh6fwvQYOvGkQoEFl', '2020-05-21 13:37:22', 856, '05', '2024', 'succeeded', '4242424242424242', 'raju@gmail.com', 'RAJU JARIWALA', 'Adajan', 'Surat', '395002', 'Gujarat', 'India', 'Adajan', 'Delivered', 4),
(57, 228859, 700.00, 'txn_1GsrvtKmh6fwvQYO5GiZPcL2', '2020-06-11 15:03:09', 856, '05', '2024', 'succeeded', '4242424242424242', 'fenu@gmail.com', 'FENU JARI', 'Sagrampura', 'Surat', '395002', 'Gujarat', 'India', 'Althan', '', 0),
(58, 818835, 660.00, 'txn_1Gss1gKmh6fwvQYOgWrMoAbB', '2020-06-11 15:09:09', 856, '05', '2024', 'succeeded', '4242424242424242', 'ganesh@gmail.com', 'Ganesh Jariwala', 'Althan,Sayam Mandir', 'Surat', '395866', 'Gujarat', 'India', 'Althan', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `SUBCATEGORY_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `DEALER_ID` int(11) NOT NULL,
  `SUBCATEGORY_NAME` varchar(255) NOT NULL,
  `SUBCATEGORY_STATUS` char(1) NOT NULL,
  `CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UPDATION_DATE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`SUBCATEGORY_ID`, `CATEGORY_ID`, `DEALER_ID`, `SUBCATEGORY_NAME`, `SUBCATEGORY_STATUS`, `CREATION_DATE`, `UPDATION_DATE`) VALUES
(1, 1, 1, 'rice flour', 'A', '2020-03-09 04:22:12', NULL),
(9, 2, 21, 'FORTUNE OIL', 'A', '2020-04-15 06:41:31', '13-03-2020 10:40:32 AM'),
(10, 1, 57, 'WHEAT FLOUR', 'A', '2020-03-13 09:20:35', NULL),
(11, 3, 58, 'Soft Drinks', 'A', '2020-04-04 08:06:45', NULL),
(12, 3, 58, 'Juices', 'A', '2020-04-04 08:07:04', NULL),
(13, 3, 58, 'Energy Drinks', 'A', '2020-04-04 12:46:19', NULL),
(14, 4, 59, 'Frozen snacks', 'A', '2020-04-04 13:05:21', NULL),
(15, 4, 60, 'Frozen snacks', 'A', '2020-04-04 13:21:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `ADMIN_NAME` varchar(30) NOT NULL,
  `ADMIN_EMAIL` varchar(255) NOT NULL,
  `ADMIN_PASSWORD` varchar(255) NOT NULL,
  `ADMIN_ADD_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ADMIN_PROFILE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ADMIN_ID`, `ADMIN_NAME`, `ADMIN_EMAIL`, `ADMIN_PASSWORD`, `ADMIN_ADD_DATE`, `ADMIN_PROFILE`) VALUES
(1, 'ADMIN', 'groceryshoppingsurat@gmail.com', '93d9398ce7e599f9088c4d90fbc3560e', '2020-04-28 07:24:33', 'avatar-04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `BANNER_ID` int(11) NOT NULL,
  `BANNER_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`BANNER_ID`, `BANNER_NAME`) VALUES
(2, '4.jpg'),
(3, '5.jpg'),
(4, '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer`
--

CREATE TABLE `tbl_dealer` (
  `DEALER_ID` int(11) NOT NULL,
  `DEALER_NAME` varchar(255) DEFAULT NULL,
  `DEALER_EMAIL` varchar(255) DEFAULT NULL,
  `DEALER_PASSWORD` varchar(255) DEFAULT NULL,
  `DEALER_CATEGORY` varchar(30) DEFAULT NULL,
  `DEALER_OTP` int(11) DEFAULT NULL,
  `DEALER_STATUS` char(1) DEFAULT NULL,
  `DEALER_PROFILE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dealer`
--

INSERT INTO `tbl_dealer` (`DEALER_ID`, `DEALER_NAME`, `DEALER_EMAIL`, `DEALER_PASSWORD`, `DEALER_CATEGORY`, `DEALER_OTP`, `DEALER_STATUS`, `DEALER_PROFILE`) VALUES
(21, 'FENU JARIWALA', '17bmiit129@gmail.com', 'fenu123', 'OIL', 95397, 'D', ''),
(57, 'FENU JARIWALA', 'fenijariwala225@gmail.com', '8416ab0f44ad4ff7ef66f01fad22c2cc', 'FLOUR', 19770, 'D', 'avatar-02.jpg'),
(58, 'Feni J', 'fpcute4173@gmail.com', 'fenu123', 'Beveranges', 46689, 'A', 'avatar-05.jpg'),
(59, 'Ganesh Jariwala', '17bmiit124@gmail.com', 'fenu123', 'Frozen food', NULL, 'A', ''),
(60, 'Twinkle Jariwala', 'tjariwala@gmail.com', 'fenu123', 'Frozen food', NULL, 'A', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deliveryboy`
--

CREATE TABLE `tbl_deliveryboy` (
  `deliveryboy_id` int(11) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `daddress` varchar(255) NOT NULL,
  `pickup` varchar(255) NOT NULL,
  `deliveryaddress` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `demail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_deliveryboy`
--

INSERT INTO `tbl_deliveryboy` (`deliveryboy_id`, `dname`, `daddress`, `pickup`, `deliveryaddress`, `area`, `phone`, `customer_id`, `status`, `password`, `demail`) VALUES
(3, 'Raman Patel', '', '', '', 'Sagrampura', '', 0, 'D', 'e0080ed98aaab9aeff33fca18a375201', 'fenijariwala225@gmail.com'),
(4, 'Vivek ', 'Adajan', '', '', 'Adajan', '8585958695', 0, '', 'fenu123', '17bmiit129@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(1, 'T-shirt 1', 'image-1.jpg', 350.00),
(2, 'T-shirt 2', 'image-2.jpg', 460.00),
(3, 'T-shirt 3', 'image-3.png', 400.00),
(4, 'T-shirt 4', 'image-4.jpg', 530.00),
(5, 'T-shirt 5', 'image-5.jpg', 400.00),
(6, 'T-shirt 6', 'image-6.jpg', 320.00),
(7, 'T-shirt 7', 'image-7.jpg', 270.00);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistid` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlistid`, `customer_id`, `product_id`) VALUES
(1, 5, 12),
(2, 5, 12),
(3, 5, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_products`
--
ALTER TABLE `admin_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `chart_data`
--
ALTER TABLE `chart_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reg`
--
ALTER TABLE `customer_reg`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `dealer_products`
--
ALTER TABLE `dealer_products`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Indexes for table `mailus`
--
ALTER TABLE `mailus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `order_item_customer`
--
ALTER TABLE `order_item_customer`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`SUBCATEGORY_ID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ADMIN_ID`) USING BTREE;

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`BANNER_ID`);

--
-- Indexes for table `tbl_dealer`
--
ALTER TABLE `tbl_dealer`
  ADD PRIMARY KEY (`DEALER_ID`);

--
-- Indexes for table `tbl_deliveryboy`
--
ALTER TABLE `tbl_deliveryboy`
  ADD PRIMARY KEY (`deliveryboy_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_products`
--
ALTER TABLE `admin_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chart_data`
--
ALTER TABLE `chart_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_reg`
--
ALTER TABLE `customer_reg`
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dealer_products`
--
ALTER TABLE `dealer_products`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mailus`
--
ALTER TABLE `mailus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_item_customer`
--
ALTER TABLE `order_item_customer`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `SUBCATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `BANNER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_dealer`
--
ALTER TABLE `tbl_dealer`
  MODIFY `DEALER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_deliveryboy`
--
ALTER TABLE `tbl_deliveryboy`
  MODIFY `deliveryboy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
