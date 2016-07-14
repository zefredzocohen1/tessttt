-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2016 at 11:02 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starview`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `address_id` int(11) NOT NULL,
  `address_detail` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address_detail_ascii` varchar(500) NOT NULL,
  `lat` decimal(12,9) DEFAULT NULL,
  `lng` decimal(12,9) DEFAULT NULL,
  `address_street` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address_2` varchar(500) NOT NULL,
  `address_street_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `district_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `provincial` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `provincial_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `zip_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `country_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`address_id`, `address_detail`, `address_detail_ascii`, `lat`, `lng`, `address_street`, `address_2`, `address_street_ascii`, `district`, `district_ascii`, `provincial`, `provincial_ascii`, `zip_code`, `country`, `country_ascii`) VALUES
(1, '21 Cầu Giấy, Hà Nội, Vietnam', '21 Cau Giay, Ha Noi, Vietnam', '21.029611000', '105.802821000', '21 Cầu Giấy', '', '21 Cau Giay', 'Ba Đình', 'Ba Dinh', 'Hà Nội', 'Ha Noi', '100000', 'Việt Nam', 'Viet nam'),
(2, '345 Tây Sơn, Hà Nội, Vietnam', '345 Tay Son, Ha Noi, Vietnam', '21.003427000', '105.820917000', '345 Tây Sơn', '', '345 Tay Son', 'Đống Đa', 'Dong Da', 'Hà Nội', 'Ha Noi', '100000', 'Việt Nam', 'Viet nam'),
(3, '678 Hoàng Hoa Thám, Hà Nội, Vietnam', '678 Hoang Hoa Tham, Ha Noi, Vietnam', '21.047585000', '105.806556000', '678 Hoàng Hoa Thám', '', '678 Hoang Hoa Tham', 'Tây Hồ', 'Tay Ho', 'Hà Nội', 'Ha Noi', '100000', 'Việt Nam', 'Viet nam'),
(4, '51 Nguyễn Thái Học, Văn Miếu, Đống Đa, Hà Nội, Việt Nam', '', '21.028946091', '105.840650746', '51 Nguyễn Thái Học', '', NULL, 'Đống Đa', 'Dong Da', 'Hà Nội', 'Ha Noi', '100000', 'Việt Nam', 'Viet Nam'),
(5, '27 Trần Duy Hưng, Hà Nội, Việt Nam', '', '21.013457400', '105.803312200', '27 Trần Duy Hưng', '10 LE THANH NGHI, HA BA TRUNG', NULL, 'Thanh Xuân', 'Thanh Xuan', 'Hà Nội', 'Ha Noi', '10000', 'Việt Nam', 'Viet Nam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amenities`
--

CREATE TABLE `tbl_amenities` (
  `amenities_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `status` tinyint(1) DEFAULT NULL,
  `filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_amenities`
--

INSERT INTO `tbl_amenities` (`amenities_id`, `name`, `name_en`, `description`, `description_en`, `status`, `filter`, `created`) VALUES
(1, 'Cho phép hút thuốc', 'Smoking Allowed', '', '', 1, 1, '2016-05-10 11:01:09'),
(2, 'TV truyền hình cáp', 'Cable TV', '', '', 1, 1, '2016-05-10 11:01:19'),
(3, 'Mạng internet không dây', 'Wireless Internet', 'Một thiết bị wifi khách có thể dùng 24/7', 'A wireless router that guests can access 24/7', 1, 1, '2016-05-10 11:01:25'),
(4, 'TV', 'TV', '', '', 1, NULL, '2016-05-10 11:01:28'),
(8, 'Lò sưởi trong nhà', 'Indoor Fireplace', '', '', 1, NULL, '2016-05-10 11:01:31'),
(9, 'Bếp', 'Kitchen', 'Bếp có thể cho khách sử dụng', 'Kitchen is available for guests', 1, NULL, '2016-05-27 09:42:49'),
(10, 'Máy lạnh', 'Air Conditioning', '', '', 1, NULL, '2016-05-10 11:01:37'),
(20, 'Tủ lạnh', 'Refrigerator', '', '', 1, NULL, '2016-05-10 11:01:41'),
(39, 'Có chỗ đậu xe', 'Parking Included', '', '', 1, NULL, '2016-05-10 11:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category_parent` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `show_filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_name_en`, `category_parent`, `description`, `status`, `show_filter`, `created`) VALUES
(1, 'Loại nhà ở', 'Property Type', 0, NULL, 1, 0, NULL),
(2, 'Loại phòng', 'Room Type', 0, NULL, 1, 1, NULL),
(3, 'Loại giường', 'Bed Type', 0, NULL, 1, 1, NULL),
(4, 'Trải nghiệm', 'Experience', 0, NULL, 1, 1, NULL),
(5, 'Tiện nghi', 'Amenities', 0, NULL, 1, 1, NULL),
(6, 'Căn hộ', 'Apartment', 1, NULL, 1, 0, NULL),
(7, 'Nhà riêng', 'House', 1, NULL, 1, 0, NULL),
(8, 'Nguyên căn', 'Entire Home', 2, NULL, 1, 1, NULL),
(9, 'Phòng riêng', 'Private Room', 2, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `provincial_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE `tbl_email` (
  `email_id` int(11) NOT NULL,
  `email_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`email_id`, `email_name`, `description`) VALUES
(1, 'Email xác nhận đặt phòng', 'Bạn đã đặt phòng thành công'),
(2, 'Email xác nhận đặt phòng', 'Bạn đã đặt phòng thành công');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_experience`
--

CREATE TABLE `tbl_experience` (
  `experience_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `icon` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_experience`
--

INSERT INTO `tbl_experience` (`experience_id`, `name`, `name_en`, `description`, `description_en`, `icon`, `status`, `filter`, `created`) VALUES
(1, 'Bãi biển', 'Beach', 'Địa điểm gần biển, có thể đến biển một cách dễ dàng', 'Beachfront property, accessible to a nearby beach', 1, 1, NULL, '2016-05-18 16:43:11'),
(5, 'Cảnh trí', 'Scenic', 'Với quang cảnh đẹp', 'With a view', 3, 1, NULL, '2016-05-18 15:42:03'),
(6, 'Mua sắm', 'Shopping', 'Ở trong hoặc gần khu vực mua sắm phổ biến, chợ đêm hay chợ đường phố', 'In or near popular shopping districts, night markets, street markets', 4, 1, NULL, '2016-05-18 15:42:09'),
(7, 'Truyền thống', 'Traditional', 'Ngôi nhà kiểu truyền thống như nhà sàn, nhà cổ, vv', 'Authentic-styled homes like stilt houses, nipa huts, gladak homes, etc.', 2, 1, NULL, '2016-05-18 15:42:16'),
(8, 'Thành thị', 'Urban', 'Trong thành phố', 'In the city', 14, 1, NULL, '2016-05-18 15:42:23'),
(9, 'Nhóm', 'Group', 'Chứa một nhóm 4 hoặc nhiều hơn', 'Accommodates a group of 4 or more', 9, 1, NULL, '2016-05-30 12:13:38'),
(10, 'Trang trọng', 'Luxury', 'Cung cấp phòng cao cấp, tiện nghi cá nhân', 'Offer high-end accommodations, private amenities', 13, 1, NULL, '2016-05-30 12:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_house_type`
--

CREATE TABLE `tbl_house_type` (
  `house_type_id` int(11) NOT NULL,
  `house_type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `house_type_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `status` tinyint(4) DEFAULT NULL,
  `filter` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_house_type`
--

INSERT INTO `tbl_house_type` (`house_type_id`, `house_type_name`, `house_type_name_en`, `description`, `description_en`, `status`, `filter`, `created`) VALUES
(8, 'Nhà riêng', 'House', '', 'aaaaa', 1, NULL, '2016-05-11 10:20:38'),
(9, 'Căn hộ', 'Apartment', '', '', 1, NULL, '2016-05-10 14:40:47'),
(10, 'Nhà thuyền', 'Boat', '', '', 1, NULL, '2016-05-10 14:41:06'),
(11, 'Resort', 'Resort', '', '', 1, NULL, '2016-05-27 09:52:19'),
(12, 'Cabin', 'Cabin', '', '', 1, NULL, '2016-05-30 12:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_icon`
--

CREATE TABLE `tbl_icon` (
  `icon_id` tinyint(11) NOT NULL,
  `icon_value` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_icon`
--

INSERT INTO `tbl_icon` (`icon_id`, `icon_value`, `description`, `description_en`) VALUES
(1, 'fa-umbrella', 'Bãi biển', 'Beach'),
(2, 'fa-home', 'Truyền thống', 'Traditional'),
(3, 'fa-camera-retro', 'Cảnh đẹp', 'Views'),
(4, 'fa-shopping-bag', 'Mua sắm', 'Shopping'),
(5, 'fa-arrows', 'Trung tâm thành phố, địa điểm nổi tiếng', 'In the Central Business District, in or around the town centre, in or near famous districts '),
(6, 'fa-pagelines', 'Gần gũi với thiên nhie', 'Natural surroundings '),
(7, 'fa-strikethrough', 'Tiết kiệm', 'Cheap, no-frills accommodations'),
(8, 'fa-heart', 'Lãng mạn', 'Romantic'),
(9, 'fa-users', 'Nhóm', 'Group'),
(10, 'fa-star', 'Đặc biệt', 'Special'),
(11, 'fa-braille', 'Độc đáo', 'Unique'),
(12, 'fa-glass', 'Dạ tiệc', 'Nightlife'),
(13, 'fa-diamond', 'Trang trọng', 'Luxury'),
(14, 'fa-building-o', 'Thành thị', 'City'),
(15, 'fa-area-chart', 'Mạo hiểm', 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `post_room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `checkin` int(11) NOT NULL,
  `checkout` int(11) NOT NULL,
  `number_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_room`
--

CREATE TABLE `tbl_post_room` (
  `post_room_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `post_room_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_room_name_ascii` varchar(255) NOT NULL,
  `post_room_alias` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `house_type` int(11) NOT NULL,
  `room_type` int(11) NOT NULL,
  `num_guest` int(11) DEFAULT NULL,
  `num_bedroom` int(11) DEFAULT NULL,
  `num_bed` int(11) DEFAULT NULL,
  `type_bed` int(11) DEFAULT NULL,
  `num_bathroom` int(11) DEFAULT NULL,
  `acreage` int(11) DEFAULT NULL,
  `amenities` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `experience` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price_night_vn` decimal(15,0) DEFAULT NULL,
  `price_night_en` decimal(15,0) DEFAULT NULL,
  `price_lastweek_vn` decimal(15,0) DEFAULT NULL,
  `price_lastweek_en` decimal(15,0) DEFAULT NULL,
  `type_last_week` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price_week_vn` decimal(15,0) DEFAULT NULL,
  `price_week_en` decimal(15,0) DEFAULT NULL,
  `price_month_vn` decimal(15,0) DEFAULT NULL,
  `price_month_en` decimal(15,0) DEFAULT NULL,
  `deposit_vn` decimal(15,0) DEFAULT NULL COMMENT 'tiền cọc',
  `deposit_en` decimal(15,0) DEFAULT NULL,
  `price_guest_more_vn` decimal(15,0) DEFAULT NULL,
  `price_guest_more_en` decimal(15,0) DEFAULT NULL,
  `clearning_fee_vn` decimal(15,0) DEFAULT NULL,
  `clearning_fee_en` decimal(15,0) DEFAULT NULL,
  `clearning_type` tinyint(1) DEFAULT NULL COMMENT '1:dọn theo ngày/đêm ,0: dọn 1 lần ở',
  `cancel_police` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `regulations` text CHARACTER SET utf8,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image_list` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '0:ko hien thi, 1: hien thi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post_room`
--

INSERT INTO `tbl_post_room` (`post_room_id`, `address_id`, `post_room_name`, `post_room_name_ascii`, `post_room_alias`, `user_id`, `description`, `house_type`, `room_type`, `num_guest`, `num_bedroom`, `num_bed`, `type_bed`, `num_bathroom`, `acreage`, `amenities`, `experience`, `price_night_vn`, `price_night_en`, `price_lastweek_vn`, `price_lastweek_en`, `type_last_week`, `price_week_vn`, `price_week_en`, `price_month_vn`, `price_month_en`, `deposit_vn`, `deposit_en`, `price_guest_more_vn`, `price_guest_more_en`, `clearning_fee_vn`, `clearning_fee_en`, `clearning_type`, `cancel_police`, `regulations`, `image`, `image_list`, `created`, `updated`, `status`) VALUES
(1, 1, 'Villa Santai - Kuta - 4 Bedrooms', 'Villa Santai Kuta 4 Bedrooms', NULL, 8, 'Perfect for families and large groups, Villa Santai offers all the comforts of home. Beautifully presented, this spacious villa has lots to offer with 24 hour security in a secure complex. \r\n\r\nPLEASE NOTE - We have several villas to choose from. If this villa is booked for some or all of your dates, please send me a message as another villa could be available \r\n\r\nLAST MINUTE SPECIALS - Contact Debbie for a quote\r\n\r\nVilla Santai boasts Private plunge pool with sun beds, four spacious bedrooms, three bathrooms, large living /dining areas and full kitchen. Sleeps 8 guests with extra beds available. Fully self contained, Villa Santai has air conditioning in every room, and our friendly staff will service the villa daily. Lounge and all bedrooms have a TV with Cable TV. \r\n\r\nDaily American or local breakfast, is prepared in your villa by our chef.', 11, 5, 8, 4, 4, NULL, 2, 100, '39,20,10,4,3,2', '10,9,8', '1500000', '60', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/qJ0AipPd7Xh_85d7c6e9c2b003ac66d7ca535fa7bda6.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_484a1082e222a6c8fdb1d789f031191a.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_913cbbea3461eda2ede0c85776b9b2b1.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_8887dd46f36ccae7e1d48e34b48b013c.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_4151810d4b48facb872aa58f742d94bb.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_a3d79eea46630b4282706dbec018807c.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_a4c26e82fe82952bac95315321fdf552.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_a88fde7eb1f797a01e7c3016e4dfef90.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_b54264635220eccedf624699c11ebf07.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_d555aabcbe8870180c044e3dcd77be38.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_e2b24e8151f7af1cab7afc2c30bd7f88.jpg","\\/uploads\\/room\\/qJ0AipPd7Xh_fb0e2398b058eec41eefa41d97aacbf1.jpg"]', '2016-05-31 16:02:52', '2016-05-31 16:02:52', 1),
(2, 2, 'Delightful & Cozy Villa Umalas', 'Delightful Cozy Villa Umalas', NULL, 8, 'Villa managed by Optimum Bali. Lowest prices and best services guaranteed. This villa cannot legitimately be offered with better conditions.\r\n\r\nFull time maid and 24H security guard. Mobile phone with local number available.\r\n\r\nPrices included: \r\nFirst morning breakfast \r\nOne way airport transfer min. 5 nights stays \r\nFree return airport transfer min. 10 nights stay \r\n(We can always arrange any kinds of transfers)\r\n\r\nGet discount for staying more than 10 nights stays in Low or High season.* \r\n*Discounts cannot be combined.\r\n\r\nOn request we can arrange: Car & motorbike rental, day tour, cook, baby-sitting, baby cot, high chair, massage spa, laundry & pressing, florist, food delivery etc… Do not hesitate to contact us for any particular request.', 11, 1, 4, 2, 2, NULL, 2, 100, '39,20,10,9,4,3,2', '10,9,8,6,5', '1500000', '67', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/GkiQp9FzW3X_0fbbe6b444307f8c876380d9b4d807f1.jpg","\\/uploads\\/room\\/GkiQp9FzW3X_2e20ebe938211a350051cf56c6663fe3.jpg","\\/uploads\\/room\\/GkiQp9FzW3X_20ffa00a2c3c07f4705a37e2068e108c.jpg","\\/uploads\\/room\\/GkiQp9FzW3X_3756103eb29b312e0541bc7a5a6a1515.jpg","\\/uploads\\/room\\/GkiQp9FzW3X_ad3450a55808e781ba1f19a9f8852903.jpg","\\/uploads\\/room\\/GkiQp9FzW3X_af269e26d2171d5b03238d810d8b4cdd.jpg","\\/uploads\\/room\\/GkiQp9FzW3X_b314eea6c0430708b4980cfb7e7006c2.jpg","\\/uploads\\/room\\/GkiQp9FzW3X_c8c5f7b3933bd9bc81e383249860b4c1.jpg","\\/uploads\\/room\\/GkiQp9FzW3X_f419118bc8f8bb1ee5af2414394294fc.jpg"]', '2016-05-31 16:04:35', '2016-05-31 16:04:35', 0),
(3, 3, 'Araminth,luxury 4/5Bed villa,Lovina', 'Araminth luxury 4 5Bed villa Lovina', NULL, 8, 'Được dịch bởi\r\n\r\nLuxury Villa Araminth is located close to Lovina, spectacular ocean views, short walk to the beach.\r\nThe villa has been set up with full spa facilities, making Araminth the ideal destination retreat for those seeking peace and tranquility away from the crowded areas.\r\n\r\nThe villa comes with a 4 and 5 bedroom option.\r\nPrices quoted are for the 4 bedroom option.\r\nFor the 5 bedroom option please contact us.\r\n\r\nThe fully equipped spa facility is right by, offering a comprehensive range of spa and beauty treatments.\r\n\r\nDaily breakfast is complimentary, full chef service available for other meals.\r\nFree unlimited wi-fi access.\r\nServiced daily by our professional staff.\r\n\r\nThe villa comprises:\r\n\r\n5 feature private suites, all with full remote A/C and TV package/DVD \r\n5 en-suite bathrooms\r\nFamily dining area \r\nLiving area \r\nWell equipped kitchen\r\nEntertainment room.\r\nFeature tropical gardens\r\nMagnificent infinity swimming pool \r\n2 large pool decks\r\nPrivate parking', 11, 1, 6, 3, 3, NULL, 2, 100, '39,20,10,9,8,4,3,2,1', '10,9,8,7,6', '2000000', '100', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/ajPnfhHuYY8_2a96e5a4b9bc74ec6427ed62d20dd2b4.jpg","\\/uploads\\/room\\/ajPnfhHuYY8_14fde95b5a5bdd8f3ca2d5300f40647b.jpg","\\/uploads\\/room\\/ajPnfhHuYY8_306e75c88e28805c504f409648184abd.jpg","\\/uploads\\/room\\/ajPnfhHuYY8_778a7d8e161bf443327059dcfde9ea13.jpg","\\/uploads\\/room\\/ajPnfhHuYY8_94732aeb026ebfeb4ac29cbba6d1d2b5.jpg","\\/uploads\\/room\\/ajPnfhHuYY8_a76907d601cbea0bc0a0c0525c80f874.jpg","\\/uploads\\/room\\/ajPnfhHuYY8_e23c048473a3fab59cd148775ba4d52b.jpg","\\/uploads\\/room\\/ajPnfhHuYY8_fa127e46d9fc802cbc8ddf76a10fa610.jpg","\\/uploads\\/room\\/fYE16f9Wvpr_b1849a0ac6d3bca42734a17d78c9e816.jpg"]', '2016-05-31 16:06:40', '2016-05-31 16:06:40', 1),
(4, 4, '2br apartment CENTRAL Hanoi', '2br apartment CENTRAL Hanoi', NULL, 2, 'Căn hộ dịch vụ thương hiệu mới với 4 *** chất lượng! \r\n\r\nIDC White House cung cấp các căn hộ máy lạnh rộng rãi với nhà bếp đầy đủ tiện nghi và Wi-Fi miễn phí. Toạ lạc lý tưởng ở khu phố cổ của Hà Nội, nó là 2-phút đi từ Hồ Tây và quảng trường Ba đình. Một phòng tập thể dục và phòng xông hơi cũng có tại đây.\r\n\r\nTrang bị, tất cả các căn hộ bao gồm một TV màn hình phẳng TV và DVD player. Máy giặt/máy sấy máy cũng được cung cấp tại đây. Phòng tắm được trang bị với một bồn tắm và vòi sen.\r\n\r\nNhà trắng IDC là một 5-phút lái xe, hoặc 15 phút đi bộ từ Hồ Hoàn Kiếm và nhà hát lớn Hà Nội. Sân bay quốc tế Nội Bài nằm cách đó 45 phút lái xe.', 9, 1, 6, 2, 3, NULL, 1, 90, '39,20,9,8,4,2', '10,9,8,7,6,5,1', '2257284', '102603', '2267284', '103058', '7,8', '0', '0', '0', '0', '0', '0', '100000', '5', '22000', '1', NULL, '', '', NULL, '["\\/uploads\\/room\\/02.jpg","\\/uploads\\/room\\/7e.jpg","\\/uploads\\/room\\/81.jpg","\\/uploads\\/room\\/fc.jpg","\\/uploads\\/room\\/ff.jpg"]', '2016-06-09 00:00:00', '2016-06-09 00:00:00', 1),
(5, 5, 'phòng cho thuê depphòng cho thuê depphòng cho thuê', '', NULL, 2, 'phòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê depphòng cho thuê dep', 9, 1, 1, 1, 1, NULL, 1, 50, '20,10,4', NULL, '2000000', '100', '7500000', '350', '7', '0', '0', '0', '0', '0', '0', '500000', '25', '0', '0', NULL, '', 'Hủy trước 5 ngày thu 50% phí', NULL, '[".\\/uploads\\/room\\/Chrysanthemum.jpg"]', '2016-06-21 00:00:00', '2016-06-21 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_room_amenities`
--

CREATE TABLE `tbl_post_room_amenities` (
  `post_room_id` int(11) NOT NULL,
  `amenities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_post_room_amenities`
--

INSERT INTO `tbl_post_room_amenities` (`post_room_id`, `amenities_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 10),
(1, 20),
(1, 39),
(2, 2),
(2, 3),
(2, 4),
(2, 9),
(2, 10),
(2, 20),
(2, 39),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 8),
(3, 9),
(3, 10),
(3, 20),
(3, 39),
(4, 2),
(4, 4),
(4, 8),
(4, 9),
(4, 20),
(4, 39);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_room_experience`
--

CREATE TABLE `tbl_post_room_experience` (
  `post_room_id` int(11) NOT NULL,
  `experience_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_post_room_experience`
--

INSERT INTO `tbl_post_room_experience` (`post_room_id`, `experience_id`) VALUES
(1, 8),
(1, 9),
(1, 10),
(2, 5),
(2, 6),
(2, 8),
(2, 9),
(2, 10),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(4, 1),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provincial`
--

CREATE TABLE `tbl_provincial` (
  `provincial_id` int(11) NOT NULL,
  `provincial_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_provincial`
--

INSERT INTO `tbl_provincial` (`provincial_id`, `provincial_name`, `description`, `created`) VALUES
(1, 'Hà Nội', NULL, NULL),
(2, 'Hải Dương', NULL, NULL),
(3, 'Hải Phòng', NULL, NULL),
(4, 'Hưng Yên', NULL, NULL),
(8, 'Quảng Ninh', '', NULL),
(9, 'Thanh Hóa', '', NULL),
(10, 'TP HCM', '', NULL),
(11, 'An Giang', 'abcádadsad', NULL),
(12, 'Bà Rịa - Vũng Tàu', '', NULL),
(13, 'Bắc Giang', '', NULL),
(14, 'Bắc Kạn', '', NULL),
(15, 'Bạc Liêu', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`, `description`, `status`, `created`, `updated`) VALUES
(1, 'Quản trị viên', NULL, 1, NULL, NULL),
(2, 'Đối tác', NULL, 1, NULL, NULL),
(3, 'Thành viên', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_type`
--

CREATE TABLE `tbl_room_type` (
  `room_type_id` int(11) NOT NULL,
  `room_type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `room_type_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `status` tinyint(1) DEFAULT NULL,
  `filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room_type`
--

INSERT INTO `tbl_room_type` (`room_type_id`, `room_type_name`, `room_type_name_en`, `description`, `description_en`, `status`, `filter`, `created`) VALUES
(1, 'Nguyên căn', 'Entire Home', 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaa', 1, NULL, '2016-05-10 16:49:42'),
(5, 'Phòng riêng', 'Private room', '', '', 1, NULL, '2016-05-10 17:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_old` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ozganzation` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'tochuc-cty',
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `gender` tinyint(2) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `avarta` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `provincial_id` int(11) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `workplace` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `country` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '0:block,1:active',
  `role_id` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `last_name`, `first_name`, `user_name`, `email`, `password`, `password_old`, `ozganzation`, `phone`, `gender`, `birthday`, `avarta`, `provincial_id`, `address`, `workplace`, `description`, `country`, `created`, `updated`, `status`, `role_id`) VALUES
(2, 'Bùi Ngọc', 'Hưởng', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'admin', '01678283552', 0, '0000-00-00', 'bikini_set_2_grande-2.png', 1, 'Hoàn kiếm', NULL, 'aaa', NULL, '0000-00-00 00:00:00', '2016-05-27 12:09:05', 1, 1),
(4, 'Nguyễn Huy', 'C', 'doitac1', 'bim_v0tinh@yahoo.com.vn', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Khu du lịch Đồ Sơn Cát Bà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-05-26 14:30:25', '2016-05-31 09:13:40', 1, 2),
(7, 'Hoàng Thị', 'Dương', 'doitac4', 'doitac4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Khu du lịch đảo cô tô', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-05-28 10:19:59', NULL, 1, 2),
(8, 'Nguyễn Văn', 'F', 'admin1', 'admin1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-05-31 13:54:41', NULL, 1, 1),
(10, 'a', 'a', 'a', NULL, '1b8e2262663b6efb5c5a6d21e2122593', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3),
(11, '1', '1', '1', NULL, 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3),
(12, '1', '1', '1', 'lehai04.1991@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3),
(13, 'hai', 'le', 'lehia', 'zefredzocohen@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3),
(14, 'hai', 'le', 'lehai', 'zefredzocohen@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  ADD PRIMARY KEY (`amenities_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  ADD PRIMARY KEY (`experience_id`);

--
-- Indexes for table `tbl_house_type`
--
ALTER TABLE `tbl_house_type`
  ADD PRIMARY KEY (`house_type_id`);

--
-- Indexes for table `tbl_icon`
--
ALTER TABLE `tbl_icon`
  ADD PRIMARY KEY (`icon_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_post_room`
--
ALTER TABLE `tbl_post_room`
  ADD PRIMARY KEY (`post_room_id`);

--
-- Indexes for table `tbl_post_room_amenities`
--
ALTER TABLE `tbl_post_room_amenities`
  ADD PRIMARY KEY (`post_room_id`,`amenities_id`);

--
-- Indexes for table `tbl_post_room_experience`
--
ALTER TABLE `tbl_post_room_experience`
  ADD PRIMARY KEY (`post_room_id`,`experience_id`);

--
-- Indexes for table `tbl_provincial`
--
ALTER TABLE `tbl_provincial`
  ADD PRIMARY KEY (`provincial_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_room_type`
--
ALTER TABLE `tbl_room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  MODIFY `amenities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_house_type`
--
ALTER TABLE `tbl_house_type`
  MODIFY `house_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_icon`
--
ALTER TABLE `tbl_icon`
  MODIFY `icon_id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_post_room`
--
ALTER TABLE `tbl_post_room`
  MODIFY `post_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_provincial`
--
ALTER TABLE `tbl_provincial`
  MODIFY `provincial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_room_type`
--
ALTER TABLE `tbl_room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
