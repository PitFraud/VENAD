<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-20 09:41:28 --> Severity: Notice --> Undefined index: user_type C:\xampp\htdocs\VENAD\application\views\template\left_navigation.php 4
ERROR - 2022-02-20 09:52:17 --> Severity: Notice --> Undefined variable: MemberTypes C:\xampp\htdocs\VENAD\application\views\District_login\add.php 44
ERROR - 2022-02-20 09:52:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\VENAD\application\views\District_login\add.php 44
ERROR - 2022-02-20 09:52:23 --> Severity: Notice --> Undefined variable: MemberTypes C:\xampp\htdocs\VENAD\application\views\District_login\add.php 44
ERROR - 2022-02-20 09:52:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\VENAD\application\views\District_login\add.php 44
ERROR - 2022-02-20 09:53:22 --> Severity: Notice --> Undefined variable: MemberTypes C:\xampp\htdocs\VENAD\application\views\District_login\add.php 45
ERROR - 2022-02-20 09:53:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\VENAD\application\views\District_login\add.php 45
ERROR - 2022-02-20 10:12:05 --> Severity: Notice --> Undefined property: StateLogin::$State_model C:\xampp\htdocs\VENAD\application\controllers\StateLogin.php 25
ERROR - 2022-02-20 10:12:05 --> Severity: error --> Exception: Call to a member function getStates() on null C:\xampp\htdocs\VENAD\application\controllers\StateLogin.php 25
ERROR - 2022-02-20 10:12:17 --> Severity: Notice --> Undefined variable: MemberTypes C:\xampp\htdocs\VENAD\application\views\StateLogin\add.php 44
ERROR - 2022-02-20 10:12:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\VENAD\application\views\StateLogin\add.php 44
ERROR - 2022-02-20 10:16:48 --> Severity: Notice --> Undefined variable: response_text C:\xampp\htdocs\VENAD\application\controllers\StateLogin.php 41
ERROR - 2022-02-20 10:30:43 --> 404 Page Not Found: StateLogin/District_login
ERROR - 2022-02-20 10:30:53 --> 404 Page Not Found: StateLogin/District_login
ERROR - 2022-02-20 10:46:05 --> Severity: Notice --> Undefined variable: response_text C:\xampp\htdocs\VENAD\application\controllers\District_login.php 44
ERROR - 2022-02-20 10:49:38 --> Severity: Notice --> Undefined variable: response_text C:\xampp\htdocs\VENAD\application\controllers\District_login.php 44
ERROR - 2022-02-20 10:55:16 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_item` ON `tbl_receive_item`.`receival_member_id`=`tbl_allotment`.`allot_member_id_fk` AND `tbl_receive_item`.`receival_item_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_allotment`.`allot_unit_fk`
 LIMIT 10
ERROR - 2022-02-20 10:55:16 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\FCR_model.php 26
ERROR - 2022-02-20 10:56:20 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_item` ON `tbl_receive_item`.`receival_member_id`=`tbl_allotment`.`allot_member_id_fk` AND `tbl_receive_item`.`receival_item_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_allotment`.`allot_unit_fk`
 LIMIT 10
ERROR - 2022-02-20 10:56:20 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\FCR_model.php 26
ERROR - 2022-02-20 12:49:49 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_item` ON `tbl_receive_item`.`receival_member_id`=`tbl_allotment`.`allot_member_id_fk` AND `tbl_receive_item`.`receival_item_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_allotment`.`allot_unit_fk`
 LIMIT 10
ERROR - 2022-02-20 12:49:49 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\FCR_model.php 26
ERROR - 2022-02-20 12:56:51 --> Query error: Table 'farmer.tbl_user' doesn't exist - Invalid query: SELECT *
FROM `tbl_user`
WHERE `log_id_fk` = '1'
AND `status` = 1
ERROR - 2022-02-20 12:56:51 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Purchasereport_model.php 88
ERROR - 2022-02-20 13:31:51 --> Severity: Compile Error --> Cannot redeclare FeedPurchase::getFeedsDetails() C:\xampp\htdocs\VENAD\application\controllers\FeedPurchase.php 112
ERROR - 2022-02-20 13:32:32 --> Severity: Notice --> Undefined variable: allotment_details C:\xampp\htdocs\VENAD\application\views\FeedPurchase\add.php 42
ERROR - 2022-02-20 13:32:39 --> Severity: Notice --> Undefined variable: allotment_details C:\xampp\htdocs\VENAD\application\views\FeedPurchase\add.php 42
ERROR - 2022-02-20 13:58:28 --> Query error: Unknown column 'tbl_feeds.feeds_id' in 'order clause' - Invalid query: SELECT *, `tbl_feed_purchase`.`created_at` as `purchase_date`
FROM `tbl_feed_purchase`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_feed_purchase`.`purchase_unit_fk`
LEFT JOIN `tbl_feed_item` ON `tbl_feed_item`.`feed_id`=`tbl_feed_purchase`.`purchase_item_fk`
ORDER BY `tbl_feeds`.`feeds_id` DESC
 LIMIT 10
ERROR - 2022-02-20 13:58:28 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Feed_model.php 82
ERROR - 2022-02-20 13:59:00 --> Query error: Unknown column 'tbl_feeds.feeds_id' in 'order clause' - Invalid query: SELECT *, `tbl_feed_purchase`.`created_at` as `purchase_date`
FROM `tbl_feed_purchase`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_feed_purchase`.`purchase_unit_fk`
LEFT JOIN `tbl_feed_item` ON `tbl_feed_item`.`feed_id`=`tbl_feed_purchase`.`purchase_item_fk`
ORDER BY `tbl_feeds`.`feeds_id` DESC
 LIMIT 10
ERROR - 2022-02-20 13:59:00 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Feed_model.php 82
ERROR - 2022-02-20 14:01:12 --> Query error: Unknown column 'tbl_feeds.feeds_id' in 'order clause' - Invalid query: SELECT *, `tbl_feed_purchase`.`created_at` as `purchase_date`
FROM `tbl_feed_purchase`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_feed_purchase`.`purchase_unit_fk`
LEFT JOIN `tbl_feed_item` ON `tbl_feed_item`.`feed_id`=`tbl_feed_purchase`.`purchase_item_fk`
ORDER BY `tbl_feeds`.`feeds_id` DESC
 LIMIT 10
ERROR - 2022-02-20 14:01:12 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Feed_model.php 82
ERROR - 2022-02-20 14:01:50 --> Query error: Unknown column 'tbl_feeds.feeds_id' in 'order clause' - Invalid query: SELECT *, `tbl_feed_purchase`.`created_at` as `purchase_date`
FROM `tbl_feed_purchase`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_feed_purchase`.`purchase_unit_fk`
LEFT JOIN `tbl_feed_item` ON `tbl_feed_item`.`feed_id`=`tbl_feed_purchase`.`purchase_item_fk`
ORDER BY `tbl_feeds`.`feeds_id` DESC
 LIMIT 10
ERROR - 2022-02-20 14:01:50 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Feed_model.php 82
ERROR - 2022-02-20 14:02:43 --> Query error: Unknown column 'tbl_feeds.feeds_id' in 'order clause' - Invalid query: SELECT *, `tbl_feed_purchase`.`created_at` as `purchase_date`
FROM `tbl_feed_purchase`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_feed_purchase`.`purchase_unit_fk`
LEFT JOIN `tbl_feed_item` ON `tbl_feed_item`.`feed_id`=`tbl_feed_purchase`.`purchase_item_fk`
ORDER BY `tbl_feeds`.`feeds_id` DESC
ERROR - 2022-02-20 14:02:43 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Feed_model.php 73
ERROR - 2022-02-20 15:37:13 --> 404 Page Not Found: FeedStock/index
ERROR - 2022-02-20 15:38:21 --> 404 Page Not Found: FeedStock/index
ERROR - 2022-02-20 15:41:05 --> 404 Page Not Found: FeedStock/index
ERROR - 2022-02-20 16:48:07 --> Query error: Unknown column 'receival_status' in 'field list' - Invalid query: INSERT INTO `tbl_receive_back` (`rec_allotment_fk`, `rec_quantity`, `rec_weight`, `rec_unit`, `rec_given_feeds_total`, `rec_fcr`, `receival_status`, `created_at`) VALUES ('16', '20', '20', '2', '10', '2', 1, '2022-02-20 16:48:07')
ERROR - 2022-02-20 16:48:52 --> Query error: Unknown column 'receival_status' in 'field list' - Invalid query: INSERT INTO `tbl_receive_back` (`rec_allotment_fk`, `rec_quantity`, `rec_weight`, `rec_unit`, `rec_given_feeds_total`, `rec_fcr`, `receival_status`, `created_at`) VALUES ('16', '10', '15', '2', '10', '1', 1, '2022-02-20 16:48:52')
ERROR - 2022-02-20 16:56:01 --> Query error: Unknown column 'tbl_allotment.allotment_id' in 'on clause' - Invalid query: SELECT *, `tbl_receive_back`.`created_at` as `receival_date`
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allotment_id`=`tbl_receive_back`.`rec_allotment_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_member_type` ON `tbl_member_type`.`member_type_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_receive_back`.`rec_unit`
ORDER BY `tbl_receive_back`.`rec_id` DESC
 LIMIT 10
ERROR - 2022-02-20 16:56:01 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\ReceiveItem_model.php 29
ERROR - 2022-02-20 16:56:09 --> Query error: Unknown column 'tbl_allotment.allotment_id' in 'on clause' - Invalid query: SELECT *, `tbl_receive_back`.`created_at` as `receival_date`
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allotment_id`=`tbl_receive_back`.`rec_allotment_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_member_type` ON `tbl_member_type`.`member_type_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_receive_back`.`rec_unit`
ORDER BY `tbl_receive_back`.`rec_id` DESC
 LIMIT 10
ERROR - 2022-02-20 16:56:09 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\ReceiveItem_model.php 29
ERROR - 2022-02-20 16:57:31 --> Query error: Unknown column 'tbl_allotment.allotment_id' in 'on clause' - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allotment_id`=`tbl_receive_back`.`rec_allotment_fk`
 LIMIT 10
ERROR - 2022-02-20 16:57:31 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\ReceiveItem_model.php 32
ERROR - 2022-02-20 16:59:26 --> Query error: Unknown column 'tbl_allotment.allotment_id' in 'on clause' - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allotment_id`=`tbl_receive_back`.`rec_allotment_fk`
 LIMIT 10
ERROR - 2022-02-20 16:59:26 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\ReceiveItem_model.php 32
ERROR - 2022-02-20 17:00:48 --> Query error: Unknown column 'allot_days_fk' in 'field list' - Invalid query: INSERT INTO `tbl_allotment` (`allot_item_id`, `allot_quantity`, `allot_member_id_fk`, `allot_unit_fk`, `allot_days_fk`, `allot_weight`, `allot_status`, `created_at`) VALUES ('1', '100', '2', '2', '1', '250', 1, '2022-02-20 17:00:48')
ERROR - 2022-02-20 17:05:15 --> Severity: Notice --> Undefined index: allot_item_id C:\xampp\htdocs\VENAD\application\controllers\Allotment.php 34
ERROR - 2022-02-20 17:05:15 --> Severity: Notice --> Undefined index: allot_quantity C:\xampp\htdocs\VENAD\application\controllers\Allotment.php 35
ERROR - 2022-02-20 17:05:15 --> Severity: Notice --> Undefined index: allot_member_id_fk C:\xampp\htdocs\VENAD\application\controllers\Allotment.php 36
ERROR - 2022-02-20 17:05:15 --> Severity: Notice --> Undefined index: allot_weight C:\xampp\htdocs\VENAD\application\controllers\Allotment.php 37
ERROR - 2022-02-20 17:05:15 --> Severity: Notice --> Undefined index: allot_unit_fk C:\xampp\htdocs\VENAD\application\controllers\Allotment.php 38
ERROR - 2022-02-20 17:07:35 --> Severity: Notice --> Undefined index: allot_weight C:\xampp\htdocs\VENAD\application\controllers\Allotment.php 37
ERROR - 2022-02-20 17:07:35 --> Severity: Notice --> Undefined index: allot_unit_fk C:\xampp\htdocs\VENAD\application\controllers\Allotment.php 38
ERROR - 2022-02-20 17:08:50 --> Query error: Unknown column 'tbl_allotment.allotment_id' in 'on clause' - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allotment_id`=`tbl_receive_back`.`rec_allotment_fk`
 LIMIT 10
ERROR - 2022-02-20 17:08:50 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\ReceiveItem_model.php 32
ERROR - 2022-02-20 17:15:36 --> Query error: Unknown column 'tbl_allotment.allotment_id' in 'on clause' - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allotment_id`=`tbl_receive_back`.`rec_allotment_fk`
 LIMIT 10
ERROR - 2022-02-20 17:15:36 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\ReceiveItem_model.php 32
ERROR - 2022-02-20 17:17:36 --> Query error: Unknown column 'tbl_allotment.allotment_id' in 'on clause' - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allotment_id`=`tbl_receive_back`.`rec_allotment_fk`
 LIMIT 10
ERROR - 2022-02-20 17:17:36 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\ReceiveItem_model.php 32
ERROR - 2022-02-20 17:22:54 --> Query error: Unknown column 'tbl_allotment.allotment_id' in 'on clause' - Invalid query: SELECT *
FROM `tbl_receive_back`
LEFT JOIN `tbl_allotment` ON `tbl_allotment`.`allotment_id`=`tbl_receive_back`.`rec_allotment_fk`
 LIMIT 10
ERROR - 2022-02-20 17:22:54 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\ReceiveItem_model.php 32
