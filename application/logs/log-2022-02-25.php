<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-25 09:40:57 --> 404 Page Not Found: Images/back.jpg
ERROR - 2022-02-25 10:04:33 --> Query error: Unknown column 'product_price' in 'field list' - Invalid query: SELECT `product_price`
FROM `tbl_product`
WHERE `product_id` = '5'
AND `product_status` = 1
ERROR - 2022-02-25 10:04:33 --> Severity: Notice --> Trying to get property 'result' of non-object /home2/woztijwy/public_html/VENAD/application/models/Purchase_model.php 134
ERROR - 2022-02-25 10:04:33 --> Query error: Unknown column 'product_price' in 'field list' - Invalid query: SELECT `product_price`
FROM `tbl_product`
WHERE `product_id` = '5'
ERROR - 2022-02-25 10:04:33 --> Severity: error --> Exception: Call to a member function row() on bool /home2/woztijwy/public_html/VENAD/application/models/Purchase_model.php 114
ERROR - 2022-02-25 10:05:26 --> Query error: Table 'woztijwy_venad230222.tbl_user' doesn't exist - Invalid query: SELECT *
FROM `tbl_user`
WHERE `log_id_fk` = '1'
AND `status` = 1
ERROR - 2022-02-25 10:05:34 --> 404 Page Not Found: Purchase/index
ERROR - 2022-02-25 14:20:13 --> Severity: Notice --> Undefined variable: param /home2/woztijwy/public_html/VENAD/application/controllers/FCR.php 35
ERROR - 2022-02-25 14:20:13 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_item` ON `tbl_receive_item`.`receival_member_id`=`tbl_allotment`.`allot_member_id_fk` AND `tbl_receive_item`.`receival_item_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_allotment`.`allot_unit_fk`
ERROR - 2022-02-25 14:20:13 --> Severity: error --> Exception: Call to a member function result() on bool /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 41
ERROR - 2022-02-25 14:20:13 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home2/woztijwy/public_html/VENAD/system/core/Exceptions.php:271) /home2/woztijwy/public_html/VENAD/system/core/Common.php 573
ERROR - 2022-02-25 14:20:33 --> Severity: error --> Exception: syntax error, unexpected end of file /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 66
ERROR - 2022-02-25 14:21:55 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_item` ON `tbl_receive_item`.`receival_member_id`=`tbl_allotment`.`allot_member_id_fk` AND `tbl_receive_item`.`receival_item_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_allotment`.`allot_unit_fk`
ERROR - 2022-02-25 14:21:55 --> Severity: error --> Exception: Call to a member function result() on bool /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 40
ERROR - 2022-02-25 14:22:19 --> Severity: error --> Exception: syntax error, unexpected 'return' (T_RETURN) /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 69
ERROR - 2022-02-25 14:37:09 --> Severity: Warning --> print_r() expects at least 1 parameter, 0 given /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 35
ERROR - 2022-02-25 14:43:27 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allot_id`=`tbl_receive_back`.`rec_allotment_fk`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
ERROR - 2022-02-25 14:43:27 --> Severity: error --> Exception: Call to a member function result() on bool /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 37
ERROR - 2022-02-25 14:43:34 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allot_id`=`tbl_receive_back`.`rec_allotment_fk`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
ERROR - 2022-02-25 14:43:34 --> Severity: error --> Exception: Call to a member function result() on bool /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 37
ERROR - 2022-02-25 14:43:42 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allot_id`=`tbl_receive_back`.`rec_allotment_fk`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
ERROR - 2022-02-25 14:43:42 --> Severity: error --> Exception: Call to a member function result() on bool /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 37
ERROR - 2022-02-25 14:49:54 --> 404 Page Not Found: FCR/get_feed_conversion_ratio_details
ERROR - 2022-02-25 15:05:21 --> 404 Page Not Found: Test/tbl_receive_back
ERROR - 2022-02-25 15:10:40 --> 404 Page Not Found: Images/back.jpg
ERROR - 2022-02-25 15:10:53 --> 404 Page Not Found: Images/back.jpg
ERROR - 2022-02-25 15:20:21 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allot_id`=`tbl_receive_back`.`rec_allotment_fk`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
ERROR - 2022-02-25 15:20:21 --> Severity: error --> Exception: Call to a member function result() on bool /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 39
ERROR - 2022-02-25 15:23:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5 - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allot_id`=`tbl_receive_back`.`rec_allotment_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=
ERROR - 2022-02-25 15:23:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5 - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allot_id`=`tbl_receive_back`.`rec_allotment_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=
ERROR - 2022-02-25 15:24:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5 - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allot_id`=`tbl_receive_back`.`rec_allotment_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=
ERROR - 2022-02-25 15:26:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5 - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allot_id`=`tbl_receive_back`.`rec_allotment_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=
ERROR - 2022-02-25 15:38:41 --> 404 Page Not Found: Feeds/get_feed_conversion_ratio_details
ERROR - 2022-02-25 15:39:19 --> 404 Page Not Found: Feeds/getFeedConvertionRatioDetails
ERROR - 2022-02-25 15:39:27 --> Severity: Notice --> Undefined variable: query1 /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 40
ERROR - 2022-02-25 15:39:27 --> Severity: error --> Exception: Call to a member function result() on null /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 40
ERROR - 2022-02-25 15:39:27 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home2/woztijwy/public_html/VENAD/system/core/Exceptions.php:271) /home2/woztijwy/public_html/VENAD/system/core/Common.php 573
ERROR - 2022-02-25 15:47:18 --> 404 Page Not Found: Feeds/getFeedConvertionRatioDetails
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Undefined variable: param /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 35
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Trying to access array offset on value of type null /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 35
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Undefined variable: param /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 39
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Trying to access array offset on value of type null /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 39
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Undefined variable: param /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 39
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Trying to access array offset on value of type null /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 39
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Undefined variable: param /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 40
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Trying to access array offset on value of type null /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 40
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Undefined variable: param /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 40
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Trying to access array offset on value of type null /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 40
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Undefined variable: param /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 51
ERROR - 2022-02-25 15:56:27 --> Severity: Notice --> Trying to access array offset on value of type null /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 57
ERROR - 2022-02-25 15:56:27 --> Query error: Table 'woztijwy_venad230222.tbl_vehicles' doesn't exist - Invalid query: SELECT *
FROM `tbl_vehicles`
WHERE `vehicle_status` = 1
ORDER BY `vehicle_id`
ERROR - 2022-02-25 15:56:27 --> Severity: error --> Exception: Call to a member function num_rows() on bool /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 66
ERROR - 2022-02-25 15:56:27 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home2/woztijwy/public_html/VENAD/system/core/Exceptions.php:271) /home2/woztijwy/public_html/VENAD/system/core/Common.php 573
ERROR - 2022-02-25 15:56:59 --> Query error: Table 'woztijwy_venad230222.tbl_vehicles' doesn't exist - Invalid query: SELECT *
FROM `tbl_vehicles`
WHERE `vehicle_status` = 1
ORDER BY `vehicle_id`
ERROR - 2022-02-25 15:56:59 --> Severity: error --> Exception: Call to a member function num_rows() on bool /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 66
ERROR - 2022-02-25 15:58:10 --> Severity: error --> Exception: Call to undefined method FCR_model::num_rows() /home2/woztijwy/public_html/VENAD/application/models/FCR_model.php 52
ERROR - 2022-02-25 16:59:47 --> Severity: Notice --> Undefined variable: products /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 16:59:47 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 16:59:47 --> Severity: Notice --> Undefined variable: member_types /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 16:59:47 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 16:59:47 --> Severity: Notice --> Undefined variable: units /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 16:59:47 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 16:59:47 --> Severity: Notice --> Undefined variable: vaccinationdays /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 16:59:47 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:00:17 --> Severity: Notice --> Undefined variable: products /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:00:17 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:00:17 --> Severity: Notice --> Undefined variable: member_types /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 17:00:17 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 17:00:17 --> Severity: Notice --> Undefined variable: units /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 17:00:17 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 17:00:17 --> Severity: Notice --> Undefined variable: vaccinationdays /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:00:17 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:15:14 --> Severity: Notice --> Undefined variable: products /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:15:14 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:15:14 --> Severity: Notice --> Undefined variable: member_types /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 17:15:14 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 17:15:14 --> Severity: Notice --> Undefined variable: units /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 17:15:14 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 17:15:14 --> Severity: Notice --> Undefined variable: vaccinationdays /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:15:14 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:18:39 --> Severity: Notice --> Undefined variable: products /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:18:39 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:18:39 --> Severity: Notice --> Undefined variable: member_types /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 17:18:39 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 17:18:39 --> Severity: Notice --> Undefined variable: units /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 17:18:39 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 17:18:39 --> Severity: Notice --> Undefined variable: vaccinationdays /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:18:39 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:19:15 --> Severity: Notice --> Undefined variable: products /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:19:15 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:19:15 --> Severity: Notice --> Undefined variable: member_types /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 17:19:15 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 17:19:15 --> Severity: Notice --> Undefined variable: units /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 17:19:15 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 17:19:15 --> Severity: Notice --> Undefined variable: vaccinationdays /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:19:15 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:20:08 --> Severity: Notice --> Undefined variable: products /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:20:08 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:20:08 --> Severity: Notice --> Undefined variable: member_types /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 17:20:08 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 55
ERROR - 2022-02-25 17:20:08 --> Severity: Notice --> Undefined variable: units /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 17:20:08 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 84
ERROR - 2022-02-25 17:20:08 --> Severity: Notice --> Undefined variable: vaccinationdays /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:20:08 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 95
ERROR - 2022-02-25 17:23:24 --> Severity: Notice --> Undefined variable: products /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:23:24 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:23:24 --> Severity: Notice --> Undefined variable: member_types /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 57
ERROR - 2022-02-25 17:23:24 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 57
ERROR - 2022-02-25 17:23:24 --> Severity: Notice --> Undefined variable: units /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 86
ERROR - 2022-02-25 17:23:24 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 86
ERROR - 2022-02-25 17:23:24 --> Severity: Notice --> Undefined variable: vaccinationdays /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 97
ERROR - 2022-02-25 17:23:24 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 97
ERROR - 2022-02-25 17:26:38 --> Severity: Notice --> Undefined variable: products /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:26:38 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 45
ERROR - 2022-02-25 17:26:38 --> Severity: Notice --> Undefined variable: member_types /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 57
ERROR - 2022-02-25 17:26:38 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 57
ERROR - 2022-02-25 17:26:38 --> Severity: Notice --> Undefined variable: units /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 86
ERROR - 2022-02-25 17:26:38 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 86
ERROR - 2022-02-25 17:26:38 --> Severity: Notice --> Undefined variable: vaccinationdays /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 97
ERROR - 2022-02-25 17:26:38 --> Severity: Warning --> Invalid argument supplied for foreach() /home2/woztijwy/public_html/VENAD/application/views/Allotment/add.php 97
