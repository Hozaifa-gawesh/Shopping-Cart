-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 10:29 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, '<h3>Vision:</h3>\r\n\r\n<p>Handmade Design is the largest E-commerce platform in the Arab world, featuring more than 2,000 products across categories such as , All about handmade from accessories, watches, perfumery, etc. Handmade Design attracts over 24 thousand visits per month and is fast growing as more consumers shop online in the Arab.</p>\r\n\r\n<h3>Mission:</h3>\r\n\r\n<p>Handmade Design is the largest E-commerce platform in the Arab world, featuring more than 2,000 products across categories such as , All about handmade from accessories, watches, perfumery, etc. Handmade Design attracts over 24 thousand visits per month and is fast growing as more consumers shop online in the Arab.</p>\r\n\r\n<h3>Who We Are?</h3>\r\n\r\n<p>Handmade Design is the largest E-commerce platform in the Arab world, featuring more than 2,000 products across categories such as , All about handmade from accessories, watches, perfumery, etc. Handmade Design attracts over 24 thousand visits per month and is fast growing as more consumers shop online in the Arab.</p>', '19110365401340227.jpg', '2019-11-02 22:00:00', '2019-11-03 16:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `image`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Test', 'test@test.com', '$2y$10$LR8fFGxr1RJlE4KlkA/8Z.lAOYywFDk0stOajN5vYsrBRqsR426Ea', NULL, '01011121514', 'khRVAQr9cgV9Za4CSGRHHrOAGseOZR71ILg354DtpGqelq5c7qgfU9Z7EDCi', '2019-08-26 06:37:26', '2019-11-03 17:47:41'),
(2, 'Mohamed Ali', 'mohamed@gmail.com', '$2y$10$Ao8ywUmicjlMbpW5L4dRsuhF93.lbImv0e72Phusyq.3.PmUA0jJy', NULL, '01512321232', NULL, '2019-08-26 06:41:50', '2019-08-26 06:56:55'),
(3, 'Salah Ahmed', 'salah@gmail.com', '$2y$10$AT4KItuettU71WRse0QuruE.VS2s5kP5.0mjAocgVZK0ZVhDKzMMi', NULL, '01010101010', NULL, '2019-11-03 17:48:21', '2019-11-03 17:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', '19082630326805672.png', 'samsung', '2019-08-26 13:03:26', '2019-08-26 13:03:26'),
(2, 'Apple', '19082631149888964.jpg', 'apple', '2019-08-26 13:04:06', '2019-08-26 13:11:49'),
(3, 'Oppo', '19082631205990945.jpg', 'oppo', '2019-08-26 13:12:05', '2019-08-26 13:12:05'),
(4, 'OnePlus', '19082631220306487.png', 'oneplus', '2019-08-26 13:12:20', '2019-08-26 13:12:20'),
(5, 'Huawei', '19082631505384339.PNG', 'huawei', '2019-08-26 13:15:05', '2019-08-26 13:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Mobiles', '190826124647670315.jpg', 'mobiles', '2019-08-26 09:52:36', '2019-08-26 10:46:47'),
(2, 'Tablets', '190826124805692893.jpg', 'tablets', '2019-08-26 09:55:53', '2019-08-26 10:48:05'),
(5, 'Laptops', '190826124823593531.png', 'laptops', '2019-08-26 10:01:06', '2019-08-26 10:48:23'),
(6, 'Tvs', '190826124836269478.jpg', 'tvs', '2019-08-26 10:16:45', '2019-08-26 10:48:36'),
(7, 'Watches', '190826125400505456.jpg', 'watches', '2019-08-26 10:54:00', '2019-08-26 10:54:00'),
(8, 'Clothes', '190828114747130026.jpg', 'clothes', '2019-08-28 21:47:47', '2019-08-28 21:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone_1`, `phone_2`, `email_1`, `email_2`, `facebook`, `twitter`, `youtube`, `instagram`, `address`, `logo`, `favicon`, `map_link`, `created_at`, `updated_at`) VALUES
(1, '01234567891', '011987654321', 'support@domain.com', 'info@domain.com', 'https://www.fb.com', 'https://www.twitter.com', 'https://www.youtube.com', 'https://www.instagram.com', '123 Suspendis matti, Visaosang Building VST District', '19110391930339187.png', '19110391930286851.png', NULL, '2019-11-02 22:00:00', '2019-11-03 22:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `subject`, `email`, `message`, `created_at`, `updated_at`) VALUES
(5, 'Hozaifa Ramadan', 'Test Subject Question', 'hozaifagawesh100@gmai.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-11-07 10:29:49', '2019-11-07 10:29:49'),
(18, 'Mohamed Said', 'Question', 'mohamed-said@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-11-07 11:35:09', '2019-11-07 11:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_06_10_235902_create_admins_table', 1),
(5, '2019_08_26_090906_create_users_table', 2),
(6, '2019_08_26_091218_create_users_addresses_table', 2),
(7, '2019_08_26_092239_create_categories_table', 2),
(13, '2019_08_26_092300_create_brands_table', 3),
(14, '2019_08_26_092351_create_products_table', 3),
(15, '2019_08_26_092922_create_products_images_table', 3),
(16, '2019_10_19_175019_create_carts_table', 4),
(17, '2019_11_03_162610_create_abouts_table', 5),
(18, '2018_10_25_134019_create_cities_table', 6),
(19, '2018_10_25_134252_create_districts_table', 6),
(20, '2019_11_03_201908_create_contacts_table', 7),
(21, '2019_11_04_003829_create_messages_table', 8),
(22, '2019_11_07_153029_create_orders_table', 9),
(25, '2019_11_07_154011_create_order_details_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `status` enum('pending','shipping','arrived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `cancel` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `total`, `status`, `cancel`, `created_at`, `updated_at`) VALUES
(4, 1, 'Hozaifa', 'Ramadan', 'hozaifa@gmail.com', '01149632353', 'Cairo', 30300.00, 'arrived', 0, '2019-11-07 15:00:22', '2019-11-08 18:21:14'),
(9, 1, 'Test', 'Test', 'test@gmail.com', '0123456789', 'Test - Test - Test', 25020.00, 'shipping', 0, '2019-11-08 21:26:02', '2019-11-08 21:27:44'),
(10, 1, 'Hozaifa', 'Hozaifa', 'test@gmail.com', '0123456789', 'Test - Test - Test', 104050.00, 'pending', 0, '2019-11-08 21:27:07', '2019-11-08 21:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `quantity`, `price`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 17000, 4, '2019-11-07 17:00:22', '2019-11-07 17:00:22'),
(2, 12, 1, 13300, 4, '2019-11-07 17:00:22', '2019-11-07 17:00:22'),
(13, 13, 1, 9520, 9, '2019-11-08 21:26:02', '2019-11-08 21:26:02'),
(14, 7, 1, 15500, 9, '2019-11-08 21:26:02', '2019-11-08 21:26:02'),
(15, 9, 4, 57880, 10, '2019-11-08 21:27:07', '2019-11-08 21:27:07'),
(16, 8, 3, 18630, 10, '2019-11-08 21:27:07', '2019-11-08 21:27:07'),
(17, 6, 2, 27540, 10, '2019-11-08 21:27:07', '2019-11-08 21:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `colors` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` text COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `price_discount` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `brand_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `description`, `colors`, `size`, `price`, `discount`, `price_discount`, `slug`, `available`, `brand_id`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'Galaxy Note10‎+‎ 256GB 12GB RAM', '19102942155417422.jpg', '<p>Ensure you live the digital life to fullest with the Samsung Galaxy Note 10 Plus Smartphone. It is crafted meticulously with a black finish for a classy appearance. The 6.8inch QHD display of the Galaxy Note 10 Plus smartphone offers an immersive viewing experience. Furthermore, this smartphone features a 16MP plus 12MP rear camera for capturing beautiful landscapes in wide shots. Similarly, the rear camera boasts of a 12MP telescopic lens for close portrait shots. Thanks to the lasting 4300mAh battery of the Samsung smartphone, it works for a prolonged period. Also, this smartphone has an incredible 256GB memory for storing a myriad of photos, videos, movies, and much more. The Samsung Note 10 Plus 4G LTE smartphone flaunts of an impressive Octa-Core processor for the fluid working of heavy apps. Plus, the Samsung dual-SIM smartphone has a 12GB RAM that can manage a load of multiple apps and games simultaneously.</p>', 'Black,White,Silver', NULL, 17000, 0, 17000, 'galaxy-note10„+„-256gb-12gb-ram', 1, 1, 1, '2019-10-29 14:21:55', '2019-10-29 14:32:06'),
(6, 'Samsung Galaxy S10 Plus Dual Sim  512 GB 8 GB', '19102944204963865.jpg', '<p>Indulge in a never-had-before cinematic viewing experience at the palm of your hand with the Samsung Galaxy S10 Plus Dual SIM. It sports a large 6.3inch dynamic AMOLED Infinity-O display and comfortable, ergonomic grip for ease of use. With Quad HD plus resolution, this smartphone produces bright and vivid pictures on the screen with excellent contrast. The screen is protected by strong and sturdy Gorilla Glass 6. Moreover, it includes high-performance stereo speakers and Dolby Atmos technology to ensure that the stunning visuals are met with equally stunning acoustics. This mobile phone sports three cameras with an ultra-wide lens that enables you to capture brilliant pictures on the go. With optical image stabilization feature, it ensures the captured images and videos are free from distortion. Also, it features 10MP and an 8MP dual front camera that helps you capture special moments with your loved ones. This remarkable mobile includes a high-capacity battery and supports fast wireless charging 2.0 technology for quick charging. Also, it features an innovative wireless PowerShare technology that allows you to share the battery of your smartphone with compatible devices. This smartphone incorporates an ultrasonic on-screen fingerprint sensor with Samsung Knox technology that does the perfect job of keeping your data, safe and secure.</p>', 'Black,White', NULL, 15300, 10, 13770, 'samsung-galaxy-s10-plus-dual-sim--512-gb-8-gb', 1, 1, 1, '2019-10-29 14:42:04', '2019-10-29 14:42:04'),
(7, 'Oppo Reno 10X Zoom Dual Sim 256 GB 8 GB Ram', '1910294435454847.jpg', '<p>Awaken the photographer in you with the OPPO Reno 10X Zoom Dual-SIM Smartphone. With a triple rear camera setup and a powerful front camera, capture anything and everything in greater detail. This smartphone&rsquo;s incredible zooming capacity lets you click far and quick-moving objects with amazing clarity. Lag is a thing of past, as the OPPO Reno 10X runs on a powerful Octa-Core Qualcomm Snapdragon 855 processor. Also, it has 8GB RAM that allows you to switch between the apps swiftly than ever before. With powerful, long-lasting battery and efficient cooling technology, you can enjoy gaming and other tasks without any hassle. Enjoy the best of movies, sporting events, and other content, courtesy of the 6.6inch AMOLED display that brings pictures to life. The immersive Dolby Atmos audio heightens your entertainment quotient, keeping you glued to this smartphone. Plus, the ocean green color lends an eye-catching look to this OPPO Reno smartphone.</p>', 'Green,Black', NULL, 15500, 0, 15500, 'oppo-reno-10x-zoom-dual-sim-256-gb-8-gb-ram', 1, 3, 1, '2019-10-29 14:43:54', '2019-10-29 14:43:54'),
(8, 'MOBILE OPPO F11 PRO 128 GB 6G RAM', '19102944609685696.jpg', '<ul>\r\n	<li>Brand : OPPO</li>\r\n	<li>Color : Black</li>\r\n	<li>Operating System Type : Android</li>\r\n	<li>Storage Capacity : 128 GB</li>\r\n	<li>Number Of SIM : Dual SIM</li>\r\n	<li>Rear Camera Resolution : null</li>\r\n	<li>Mobile Phone Type : Smartphone</li>\r\n	<li>Cellular Network Technology : 4G LTE</li>\r\n	<li>Chipset manufacturer : MediaTek</li>\r\n	<li>Display Size (Inch) : 6.5 Inch</li>\r\n	<li>Model Number : OPPO F11 PRO</li>\r\n	<li>Battery Capacity in mAh : 4000 - 5000 mAH</li>\r\n	<li>Fast Charge : 1</li>\r\n	<li>Memory RAM : 6 GB</li>\r\n	<li>Are batteries needed to power the product or is this product a battery : 1</li>\r\n	<li>Is this a Dangerous Good or a Hazardous Material, Substance or Waste that is regulated for transportation, storage, and/or disposal? : 1</li>\r\n	<li>External Product ID Type : EAN-13</li>\r\n</ul>', 'Black', NULL, 6900, 10, 6210, 'mobile-oppo-f11-pro-128-gb-6g-ram', 1, 3, 1, '2019-10-29 14:46:09', '2019-10-29 14:46:09'),
(9, 'Apple Iphone X With Facetime 64GB 3GB RAM', '19102944951869583.jpg', '<p>APPLE IPHONE X IS EQUIPPED WITH A 12MP REAR CAMERA. THIS IPHONE X BOASTS A 5.8INCH SUPER RETINA DISPLAY. THE APPLE IPHONE X, WITH ITS SMOOTH AND EFFICIENT PERFORMANCE, BRINGS THE WORLD TO YOUR FINGERTIPS. THIS APPLE IPHONE X HAS 4G LTE NETWORK SUPPORT THAT ALLOWS YOU TO ENJOY BLAZING FAST INTERNET SPEEDS ON THE GO. FURTHERMORE, IT IS DRIVEN BY AN A11 BIONIC CHIP THAT RUNS ALL APPS AND GAMES SMOOTHLY WITHOUT A HINT OF LAG. THIS IPHONE PACKS A 256GB INTERNAL MEMORY THAT NEVER LETS YOU WORRY ABOUT SPACE. THIS PHONE COMES PREINSTALLED WITH IOS 11 OPERATING SYSTEM THAT MANAGES TO PACK IN A BROAD RANGE OF INTUITIVE FEATURES TO MAKE YOUR DIGITAL LIFE FASTER AND SIMPLER. THE APPLE IPHONE X IS EQUIPPED WITH A 12MP REAR CAMERA THAT CAPTURES EXCELLENT PICTURES ANY TIME OF THE DAY. MOREOVER, THE 7MP TRUEDEPTH CAMERA STUNS YOU WITH ITS QUALITY. THIS IPHONE BOASTS A 5.8INCH SUPER RETINA DISPLAY THAT GIVES YOU EXCEPTIONAL PICTURE QUALITY FOR WATCHING VIDEOS AND REVIEWING PHOTOS. AVAILABLE IN A STYLISH SILVER FINISH, THE APPLE IPHONE X HAS A COMPACT AND SLIM DESIGN THAT EASILY FITS IN ONE HAND.</p>', 'Black,Silver', NULL, 14470, 0, 14470, 'apple-iphone-x-with-facetime-64gb-3gb-ram', 1, 2, 1, '2019-10-29 14:49:51', '2019-10-29 14:49:51'),
(10, 'Apple Iphone XS Max With Facetime 512GB 4GB RAM', '19102945159562428.jpg', '<p>THE APPLE IPHONE XS MAX IS AN EXCELLENT WORK OF CRAFT AND MASTER OF TECHNOLOGY. THANKS TO THE A12 BIONIC CHIP, YOU ARE IN FOR NEXT-LEVEL USER EXPERIENCE. IT OPTIMIZES THE SYSTEM PERFORMANCE TO FACILITATE THE SMOOTH RUNNING OF APPLICATIONS, LETTING YOU PLAY VIDEO GAMES OR RUN NUMEROUS PHOTOGRAPHY TOOLS WITHOUT ANY ROOM FOR LAGS. WITH A LARGE 6.5INCH OLED SCREEN ENGINEERED INTO THIS APPLE PHONE, YOU ARE BOUND TO WITNESS THE BRILLIANT PICTURE QUALITY OF THIS SUPER RETINA DISPLAY AND HAVE AN INCREDIBLE VISUAL EXPERIENCE. FURTHERMORE, A POWERFUL 12MP DUAL CAMERA ON THE REAR HELPS YOU TO BROADEN YOUR PHOTOGRAPHY PERSPECTIVE AND ALSO EXPERIENCE VIDEO-CAPTURING AT ITS BEST. THIS IPHONE ALSO COMES WITH 512GB OF ENORMOUS STORAGE CAPACITY SO THAT YOU DO NOT RUN OUT OF SPACE TO STORE DATA. ALSO, THE FACE ID PROGRAMMED INTO THIS IPHONE PAVES THE WAY FOR SECURE ACCESS TO DATA AND ONLINE PAYMENT MODES. MOREOVER, THIS IPHONE ALSO BOASTS OF NANO-SIM AND ESIM FEATURE, THE LATTER OF WHICH, ELIMINATES THE NEED FOR ACQUIRING AND MAINTAINING A PHYSICAL SIM, THUS MAKING YOUR EVERYDAY LIFE EASY. LASTLY, A BOLD SPACE GRAY FINISH COMPLEMENTS THE STYLISH BUILD OF THIS IPHONE WHILE THE WELL-CRAFTED ROUNDED CORNERS MAKE THIS APPLE PHONE STAND OUT.</p>', 'Grey,Silver', NULL, 19400, 0, 19400, 'apple-iphone-xs-max-with-facetime-512gb-4gb-ram', 1, 2, 1, '2019-10-29 14:51:59', '2019-10-29 14:51:59'),
(11, 'Apple iPhone 11 Pro Max with FaceTime 256GB 4GB RAM', '19102945354646121.jpg', '<p>Leading-edge technologies, top-grade components, and robust design make the Apple iPhone 11 Pro Max a next-gen gadget. It has jaw-dropping capabilities that give it an edge over the rest. Thanks to its 4GB RAM and custom-built A13 Bionic chip, this Apple iPhone is the perfect choice for high‑performance gaming and the latest AR experiences. You can store all the data that is needed to keep you occupied on the run, as this iPhone has a massive internal memory of 256GB. This Apple mobile phone, with its 12MP triple camera system, gives you best-in-class photos and videos, no matter the lighting conditions. Moreover, the 12MP TrueDepth lets you capture awe-inspiring selfies. With its incredible battery efficiency, next-level machine learning capabilities, and durable design, this iPhone is just what you need to simplify your digital life.</p>', 'Grey', NULL, 25500, 0, 25500, 'apple-iphone-11-pro-max-with-facetime-256gb-4gb-ram', 1, 2, 1, '2019-10-29 14:53:54', '2019-10-29 14:53:54'),
(12, 'Oneplus 7 Pro Dual Sim - 256GB 8GB Ram', '19102945842256347.jpg', '<p>Shoot pictures like a pro with the OnePlus 7 Pro Dual-SIM mobile phone. It features a 48MP plus 8MP rear camera that lets you click impressive pictures. With optical image stabilization, this mobile ensures your captured shots are blur-free. Also, it features a 16MP front camera with f/2.0 aperture, which is ideal for selfies at parties and functions. With 256GB internal memory, this smartphone gives you extensive space for your pictures, videos, music, applications, and more. This mobile produces extraordinary visuals at a resolution of 3120 x 1440 pixels on its large 6.67inch screen. Also, it houses dual stereo speakers with Dolby Atmos technology that creates powerful, high-fidelity audio to give you an ultimate cinema-like sound experience. This smartphone is powered by a highly efficient Qualcomm Snapdragon 855 Octa-Core processor and features 8GB RAM to deliver a speedy and lag-free performance. All the more, it includes a 4000mAh battery that lasts for long hours on one single full charge. With its in-display fingerprint sensor and face unlock technology, this OnePlus smartphone lets you quickly unlock your smartphone.</p>', 'Blue,Gray', NULL, 13300, 0, 13300, 'oneplus-7-pro-dual-sim---256gb-8gb-ram', 1, 4, 1, '2019-10-29 14:55:15', '2019-10-29 14:58:42'),
(13, 'Oneplus 6T Dual Sim 128GB 8GB Ram', '191029457404859.jpg', '<p>Enhance your smartphone experience with the OnePlus 6T Dual-SIM smartphone. This smartphone runs on a powerful Qualcomm SDM845 Snapdragon 845 processor. This OnePlus 6T smartphone runs and opens even high-end apps quickly. Experience ultimate ease and user-friendliness while operating this smartphone, thanks to the Android Pie-powered Oxygen OS. There is enough space for your data to be stored in one place, thanks to the 128GB internal storage. The dual rear camera and a powerful front camera captures crystal-clear images. With Optical Image Stabilization and Nightscape feature, you get just the perfect click, irrespective of whether it is day or night. The 3700mAh long lasting battery ensures that there is no halt in your movie-watching experience when you are on the go. The 6.41inch Optic AMOLED display keeps you immersed for long by delivering lifelike images. This edge-to-edge display enhances your viewing experience, while the in-screen fingerprint sensor lets you unlock your phone securely. The curved edges, visually transforming and resilient glass and mirror black color give the OnePlus 6T a mesmerizing look. You can carry this water and dust-resilient smartphone almost anywhere you want.</p>', 'Black', NULL, 11900, 20, 9520, 'oneplus-6t-dual-sim-128gb-8gb-ram', 1, 4, 1, '2019-10-29 14:57:40', '2019-10-29 14:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `phone`, `gender`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Test', 'test@gmail.com', '$2y$10$HtbMuF5TZur/cvDk2EOfx./I.wV7o0gfiDmaDHfU6e.GCN2zBNW7G', '19110845228325963.jpg', '0123456789', 'male', '2019-01-29', '8eq8Qp8ZZxVqHxfK7pm1CIkpCcKG3VKGchL7Gv58Et5IoYypL9Wq8GWlYpEF', '2019-08-28 13:49:22', '2019-11-08 21:25:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
