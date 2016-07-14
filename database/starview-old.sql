/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : starview

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2016-06-01 05:46:51
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_address`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_address`;
CREATE TABLE `tbl_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_detail` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lat` decimal(12,9) DEFAULT NULL,
  `lng` decimal(12,9) DEFAULT NULL,
  `address_street` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address_2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `district_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `provincial` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `provincial_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `zip_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `country_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_address
-- ----------------------------
INSERT INTO tbl_address VALUES ('1', '21 Cầu Giấy, Hanoi, Vietnam', '21.029611000', '105.802821000', '21 Cầu Giấy', '', 'Ba Đình', 'Ba Đinh', 'Hà Nội', 'Ha Noi', '100000', 'Vietnam', 'Vietnam');
INSERT INTO tbl_address VALUES ('2', '345 Tây Sơn, Hanoi, Vietnam', '21.003427000', '105.820917000', '345 Tây Sơn', '', 'Đống Đa', 'Đong Đa', 'Hà Nội', 'Ha Noi', '100000', 'Vietnam', 'Vietnam');
INSERT INTO tbl_address VALUES ('3', '678 Hoàng Hoa Thám, Hanoi, Vietnam', '21.047585000', '105.806556000', '678 Hoàng Hoa Thám', '', 'Tây Hồ', 'Tay Ho', 'Hà Nội', 'Ha Noi', '100000', 'Vietnam', 'Vietnam');

-- ----------------------------
-- Table structure for `tbl_amenities`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_amenities`;
CREATE TABLE `tbl_amenities` (
  `amenities_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenities_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `amenities_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `status` tinyint(1) DEFAULT NULL,
  `filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`amenities_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_amenities
-- ----------------------------
INSERT INTO tbl_amenities VALUES ('1', 'Cho phép hút thuốc', 'Smoking Allowed', '', '', '1', '1', '2016-05-10 11:01:09');
INSERT INTO tbl_amenities VALUES ('2', 'TV truyền hình cáp', 'Cable TV', '', '', '1', '1', '2016-05-10 11:01:19');
INSERT INTO tbl_amenities VALUES ('3', 'Mạng internet không dây', 'Wireless Internet', 'Một thiết bị wifi khách có thể dùng 24/7', 'A wireless router that guests can access 24/7', '1', '1', '2016-05-10 11:01:25');
INSERT INTO tbl_amenities VALUES ('4', 'TV', 'TV', '', '', '1', null, '2016-05-10 11:01:28');
INSERT INTO tbl_amenities VALUES ('8', 'Lò sưởi trong nhà', 'Indoor Fireplace', '', '', '1', null, '2016-05-10 11:01:31');
INSERT INTO tbl_amenities VALUES ('9', 'Bếp', 'Kitchen', 'Bếp có thể cho khách sử dụng', 'Kitchen is available for guests', '1', null, '2016-05-27 09:42:49');
INSERT INTO tbl_amenities VALUES ('10', 'Máy lạnh', 'Air Conditioning', '', '', '1', null, '2016-05-10 11:01:37');
INSERT INTO tbl_amenities VALUES ('20', 'Tủ lạnh', 'Refrigerator', '', '', '1', null, '2016-05-10 11:01:41');
INSERT INTO tbl_amenities VALUES ('39', 'Có chỗ đậu xe', 'Parking Included', '', '', '1', null, '2016-05-10 11:31:22');

-- ----------------------------
-- Table structure for `tbl_category`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category_parent` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `show_filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO tbl_category VALUES ('1', 'Loại nhà ở', 'Property Type', '0', null, '1', '0', null);
INSERT INTO tbl_category VALUES ('2', 'Loại phòng', 'Room Type', '0', null, '1', '1', null);
INSERT INTO tbl_category VALUES ('3', 'Loại giường', 'Bed Type', '0', null, '1', '1', null);
INSERT INTO tbl_category VALUES ('4', 'Trải nghiệm', 'Experience', '0', null, '1', '1', null);
INSERT INTO tbl_category VALUES ('5', 'Tiện nghi', 'Amenities', '0', null, '1', '1', null);
INSERT INTO tbl_category VALUES ('6', 'Căn hộ', 'Apartment', '1', null, '1', '0', null);
INSERT INTO tbl_category VALUES ('7', 'Nhà riêng', 'House', '1', null, '1', '0', null);
INSERT INTO tbl_category VALUES ('8', 'Nguyên căn', 'Entire Home', '2', null, '1', '1', null);
INSERT INTO tbl_category VALUES ('9', 'Phòng riêng', 'Private Room', '2', null, '1', '1', null);

-- ----------------------------
-- Table structure for `tbl_district`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_district`;
CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `provincial_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_district
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_experience`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_experience`;
CREATE TABLE `tbl_experience` (
  `experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `experience_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `experience_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `icon` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`experience_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_experience
-- ----------------------------
INSERT INTO tbl_experience VALUES ('1', 'Bãi biển', 'Beach', 'Địa điểm gần biển, có thể đến biển một cách dễ dàng', 'Beachfront property, accessible to a nearby beach', '1', '1', null, '2016-05-18 16:43:11');
INSERT INTO tbl_experience VALUES ('5', 'Cảnh trí', 'Scenic', 'Với quang cảnh đẹp', 'With a view', '3', '1', null, '2016-05-18 15:42:03');
INSERT INTO tbl_experience VALUES ('6', 'Mua sắm', 'Shopping', 'Ở trong hoặc gần khu vực mua sắm phổ biến, chợ đêm hay chợ đường phố', 'In or near popular shopping districts, night markets, street markets', '4', '1', null, '2016-05-18 15:42:09');
INSERT INTO tbl_experience VALUES ('7', 'Truyền thống', 'Traditional', 'Ngôi nhà kiểu truyền thống như nhà sàn, nhà cổ, vv', 'Authentic-styled homes like stilt houses, nipa huts, gladak homes, etc.', '2', '1', null, '2016-05-18 15:42:16');
INSERT INTO tbl_experience VALUES ('8', 'Thành thị', 'Urban', 'Trong thành phố', 'In the city', '14', '1', null, '2016-05-18 15:42:23');
INSERT INTO tbl_experience VALUES ('9', 'Nhóm', 'Group', 'Chứa một nhóm 4 hoặc nhiều hơn', 'Accommodates a group of 4 or more', '9', '1', null, '2016-05-30 12:13:38');
INSERT INTO tbl_experience VALUES ('10', 'Trang trọng', 'Luxury', 'Cung cấp phòng cao cấp, tiện nghi cá nhân', 'Offer high-end accommodations, private amenities', '13', '1', null, '2016-05-30 12:14:57');

-- ----------------------------
-- Table structure for `tbl_house_type`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_house_type`;
CREATE TABLE `tbl_house_type` (
  `house_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `house_type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `house_type_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `status` tinyint(4) DEFAULT NULL,
  `filter` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`house_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_house_type
-- ----------------------------
INSERT INTO tbl_house_type VALUES ('8', 'Nhà riêng', 'House', '', 'aaaaa', '1', null, '2016-05-11 10:20:38');
INSERT INTO tbl_house_type VALUES ('9', 'Căn hộ', 'Apartment', '', '', '1', null, '2016-05-10 14:40:47');
INSERT INTO tbl_house_type VALUES ('10', 'Nhà thuyền', 'Boat', '', '', '1', null, '2016-05-10 14:41:06');
INSERT INTO tbl_house_type VALUES ('11', 'Resort', 'Resort', '', '', '1', null, '2016-05-27 09:52:19');
INSERT INTO tbl_house_type VALUES ('12', 'Cabin', 'Cabin', '', '', '0', null, '2016-05-30 12:08:01');

-- ----------------------------
-- Table structure for `tbl_icon`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_icon`;
CREATE TABLE `tbl_icon` (
  `icon_id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `icon_value` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`icon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_icon
-- ----------------------------
INSERT INTO tbl_icon VALUES ('1', 'fa-umbrella', 'Bãi biển', 'Beach');
INSERT INTO tbl_icon VALUES ('2', 'fa-home', 'Truyền thống', 'Traditional');
INSERT INTO tbl_icon VALUES ('3', 'fa-camera-retro', 'Cảnh đẹp', 'Views');
INSERT INTO tbl_icon VALUES ('4', 'fa-shopping-bag', 'Mua sắm', 'Shopping');
INSERT INTO tbl_icon VALUES ('5', 'fa-arrows', 'Trung tâm thành phố, địa điểm nổi tiếng', 'In the Central Business District, in or around the town centre, in or near famous districts ');
INSERT INTO tbl_icon VALUES ('6', 'fa-pagelines', 'Gần gũi với thiên nhie', 'Natural surroundings ');
INSERT INTO tbl_icon VALUES ('7', 'fa-strikethrough', 'Tiết kiệm', 'Cheap, no-frills accommodations');
INSERT INTO tbl_icon VALUES ('8', 'fa-heart', 'Lãng mạn', 'Romantic');
INSERT INTO tbl_icon VALUES ('9', 'fa-users', 'Nhóm', 'Group');
INSERT INTO tbl_icon VALUES ('10', 'fa-star', 'Đặc biệt', 'Special');
INSERT INTO tbl_icon VALUES ('11', 'fa-braille', 'Độc đáo', 'Unique');
INSERT INTO tbl_icon VALUES ('12', 'fa-glass', 'Dạ tiệc', 'Nightlife');
INSERT INTO tbl_icon VALUES ('13', 'fa-diamond', 'Trang trọng', 'Luxury');
INSERT INTO tbl_icon VALUES ('14', 'fa-building-o', 'Thành thị', 'City');
INSERT INTO tbl_icon VALUES ('15', 'fa-area-chart', 'Mạo hiểm', 'Adventure');

-- ----------------------------
-- Table structure for `tbl_post_room`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_post_room`;
CREATE TABLE `tbl_post_room` (
  `post_room_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_id` int(11) NOT NULL,
  `post_room_name` varchar(255) CHARACTER SET utf8 NOT NULL,
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
  `status` tinyint(4) DEFAULT '1' COMMENT '0:ko hien thi, 1: hien thi',
  PRIMARY KEY (`post_room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_post_room
-- ----------------------------
INSERT INTO tbl_post_room VALUES ('1', '1', 'Villa Santai - Kuta - 4 Bedrooms', null, '8', 'Perfect for families and large groups, Villa Santai offers all the comforts of home. Beautifully presented, this spacious villa has lots to offer with 24 hour security in a secure complex. \r\n\r\nPLEASE NOTE - We have several villas to choose from. If this villa is booked for some or all of your dates, please send me a message as another villa could be available \r\n\r\nLAST MINUTE SPECIALS - Contact Debbie for a quote\r\n\r\nVilla Santai boasts Private plunge pool with sun beds, four spacious bedrooms, three bathrooms, large living /dining areas and full kitchen. Sleeps 8 guests with extra beds available. Fully self contained, Villa Santai has air conditioning in every room, and our friendly staff will service the villa daily. Lounge and all bedrooms have a TV with Cable TV. \r\n\r\nDaily American or local breakfast, is prepared in your villa by our chef.', '11', '5', '8', '4', '4', null, '2', '100', '39,20,10,4,3,2', '10,9,8', '1500000', '60', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', null, '[\".\\/uploads\\/room\\/qJ0AipPd7Xh_85d7c6e9c2b003ac66d7ca535fa7bda6.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_484a1082e222a6c8fdb1d789f031191a.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_913cbbea3461eda2ede0c85776b9b2b1.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_8887dd46f36ccae7e1d48e34b48b013c.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_4151810d4b48facb872aa58f742d94bb.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_a3d79eea46630b4282706dbec018807c.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_a4c26e82fe82952bac95315321fdf552.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_a88fde7eb1f797a01e7c3016e4dfef90.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_b54264635220eccedf624699c11ebf07.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_d555aabcbe8870180c044e3dcd77be38.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_e2b24e8151f7af1cab7afc2c30bd7f88.jpg\",\".\\/uploads\\/room\\/qJ0AipPd7Xh_fb0e2398b058eec41eefa41d97aacbf1.jpg\"]', '2016-05-31 16:02:52', '2016-05-31 16:02:52', '1');
INSERT INTO tbl_post_room VALUES ('2', '2', 'Delightful & Cozy Villa Umalas', null, '8', 'Villa managed by Optimum Bali. Lowest prices and best services guaranteed. This villa cannot legitimately be offered with better conditions.\r\n\r\nFull time maid and 24H security guard. Mobile phone with local number available.\r\n\r\nPrices included: \r\nFirst morning breakfast \r\nOne way airport transfer min. 5 nights stays \r\nFree return airport transfer min. 10 nights stay \r\n(We can always arrange any kinds of transfers)\r\n\r\nGet discount for staying more than 10 nights stays in Low or High season.* \r\n*Discounts cannot be combined.\r\n\r\nOn request we can arrange: Car & motorbike rental, day tour, cook, baby-sitting, baby cot, high chair, massage spa, laundry & pressing, florist, food delivery etc… Do not hesitate to contact us for any particular request.', '11', '1', '4', '2', '2', null, '2', '100', '39,20,10,9,4,3,2', '10,9,8,6,5', '1500000', '67', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', null, '[\".\\/uploads\\/room\\/GkiQp9FzW3X_0fbbe6b444307f8c876380d9b4d807f1.jpg\",\".\\/uploads\\/room\\/GkiQp9FzW3X_2e20ebe938211a350051cf56c6663fe3.jpg\",\".\\/uploads\\/room\\/GkiQp9FzW3X_20ffa00a2c3c07f4705a37e2068e108c.jpg\",\".\\/uploads\\/room\\/GkiQp9FzW3X_3756103eb29b312e0541bc7a5a6a1515.jpg\",\".\\/uploads\\/room\\/GkiQp9FzW3X_ad3450a55808e781ba1f19a9f8852903.jpg\",\".\\/uploads\\/room\\/GkiQp9FzW3X_af269e26d2171d5b03238d810d8b4cdd.jpg\",\".\\/uploads\\/room\\/GkiQp9FzW3X_b314eea6c0430708b4980cfb7e7006c2.jpg\",\".\\/uploads\\/room\\/GkiQp9FzW3X_c8c5f7b3933bd9bc81e383249860b4c1.jpg\",\".\\/uploads\\/room\\/GkiQp9FzW3X_f419118bc8f8bb1ee5af2414394294fc.jpg\"]', '2016-05-31 16:04:35', '2016-05-31 16:04:35', '1');
INSERT INTO tbl_post_room VALUES ('3', '3', 'Araminth,luxury 4/5Bed villa,Lovina', null, '8', 'Được dịch bởi\r\n\r\nLuxury Villa Araminth is located close to Lovina, spectacular ocean views, short walk to the beach.\r\nThe villa has been set up with full spa facilities, making Araminth the ideal destination retreat for those seeking peace and tranquility away from the crowded areas.\r\n\r\nThe villa comes with a 4 and 5 bedroom option.\r\nPrices quoted are for the 4 bedroom option.\r\nFor the 5 bedroom option please contact us.\r\n\r\nThe fully equipped spa facility is right by, offering a comprehensive range of spa and beauty treatments.\r\n\r\nDaily breakfast is complimentary, full chef service available for other meals.\r\nFree unlimited wi-fi access.\r\nServiced daily by our professional staff.\r\n\r\nThe villa comprises:\r\n\r\n5 feature private suites, all with full remote A/C and TV package/DVD \r\n5 en-suite bathrooms\r\nFamily dining area \r\nLiving area \r\nWell equipped kitchen\r\nEntertainment room.\r\nFeature tropical gardens\r\nMagnificent infinity swimming pool \r\n2 large pool decks\r\nPrivate parking', '11', '1', '6', '3', '3', null, '2', '100', '39,20,10,9,8,4,3,2,1', '10,9,8,7,6', '2000000', '100', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', null, '[\".\\/uploads\\/room\\/ajPnfhHuYY8_2a96e5a4b9bc74ec6427ed62d20dd2b4.jpg\",\".\\/uploads\\/room\\/ajPnfhHuYY8_14fde95b5a5bdd8f3ca2d5300f40647b.jpg\",\".\\/uploads\\/room\\/ajPnfhHuYY8_306e75c88e28805c504f409648184abd.jpg\",\".\\/uploads\\/room\\/ajPnfhHuYY8_778a7d8e161bf443327059dcfde9ea13.jpg\",\".\\/uploads\\/room\\/ajPnfhHuYY8_94732aeb026ebfeb4ac29cbba6d1d2b5.jpg\",\".\\/uploads\\/room\\/ajPnfhHuYY8_a76907d601cbea0bc0a0c0525c80f874.jpg\",\".\\/uploads\\/room\\/ajPnfhHuYY8_e23c048473a3fab59cd148775ba4d52b.jpg\",\".\\/uploads\\/room\\/ajPnfhHuYY8_fa127e46d9fc802cbc8ddf76a10fa610.jpg\",\".\\/uploads\\/room\\/fYE16f9Wvpr_b1849a0ac6d3bca42734a17d78c9e816.jpg\"]', '2016-05-31 16:06:40', '2016-05-31 16:06:40', '1');

-- ----------------------------
-- Table structure for `tbl_provincial`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_provincial`;
CREATE TABLE `tbl_provincial` (
  `provincial_id` int(11) NOT NULL AUTO_INCREMENT,
  `provincial_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`provincial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_provincial
-- ----------------------------
INSERT INTO tbl_provincial VALUES ('1', 'Hà Nội', null, null);
INSERT INTO tbl_provincial VALUES ('2', 'Hải Dương', null, null);
INSERT INTO tbl_provincial VALUES ('3', 'Hải Phòng', null, null);
INSERT INTO tbl_provincial VALUES ('4', 'Hưng Yên', null, null);
INSERT INTO tbl_provincial VALUES ('8', 'Quảng Ninh', '', null);
INSERT INTO tbl_provincial VALUES ('9', 'Thanh Hóa', '', null);
INSERT INTO tbl_provincial VALUES ('10', 'TP HCM', '', null);
INSERT INTO tbl_provincial VALUES ('11', 'An Giang', 'abcádadsad', null);
INSERT INTO tbl_provincial VALUES ('12', 'Bà Rịa - Vũng Tàu', '', null);
INSERT INTO tbl_provincial VALUES ('13', 'Bắc Giang', '', null);
INSERT INTO tbl_provincial VALUES ('14', 'Bắc Kạn', '', null);
INSERT INTO tbl_provincial VALUES ('15', 'Bạc Liêu', '', null);

-- ----------------------------
-- Table structure for `tbl_role`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_role`;
CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_role
-- ----------------------------
INSERT INTO tbl_role VALUES ('1', 'Quản trị viên', null, '1', null, null);
INSERT INTO tbl_role VALUES ('2', 'Đối tác', null, '1', null, null);
INSERT INTO tbl_role VALUES ('3', 'Thành viên', null, '1', null, null);

-- ----------------------------
-- Table structure for `tbl_room_type`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_room_type`;
CREATE TABLE `tbl_room_type` (
  `room_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `room_type_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `status` tinyint(1) DEFAULT NULL,
  `filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_room_type
-- ----------------------------
INSERT INTO tbl_room_type VALUES ('1', 'Nguyên căn', 'Entire Home', 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaa', '1', null, '2016-05-10 16:49:42');
INSERT INTO tbl_room_type VALUES ('5', 'Phòng riêng', 'Private room', '', '', '1', null, '2016-05-10 17:19:17');

-- ----------------------------
-- Table structure for `tbl_user`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `role_id` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO tbl_user VALUES ('2', 'Bùi Ngọc', 'Hưởng', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'admin', '01678283552', '0', '0000-00-00', 'bikini_set_2_grande-2.png', '1', 'Hoàn kiếm', null, 'aaa', null, '0000-00-00 00:00:00', '2016-05-27 12:09:05', '1', '1');
INSERT INTO tbl_user VALUES ('4', 'Nguyễn Huy', 'C', 'doitac1', 'bim_v0tinh@yahoo.com.vn', 'e10adc3949ba59abbe56e057f20f883e', null, 'Khu du lịch Đồ Sơn Cát Bà', null, null, null, null, null, null, null, null, null, '2016-05-26 14:30:25', '2016-05-31 09:13:40', '1', '2');
INSERT INTO tbl_user VALUES ('7', 'Hoàng Thị', 'Dương', 'doitac4', 'doitac4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', null, 'Khu du lịch đảo cô tô', null, null, null, null, null, null, null, null, null, '2016-05-28 10:19:59', null, '1', '2');
INSERT INTO tbl_user VALUES ('8', 'Nguyễn Văn', 'F', 'admin1', 'admin1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', null, 'admin', null, null, null, null, null, null, null, null, null, '2016-05-31 13:54:41', null, '1', '1');
