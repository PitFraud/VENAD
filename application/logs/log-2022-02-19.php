<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-19 11:29:10 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\VENAD\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2022-02-19 11:29:10 --> Unable to connect to the database
ERROR - 2022-02-19 11:37:16 --> 404 Page Not Found: Images/logo.jpg
ERROR - 2022-02-19 11:37:17 --> 404 Page Not Found: Images/logo.jpg
ERROR - 2022-02-19 11:46:20 --> 404 Page Not Found: Mlogin/getVehicles
ERROR - 2022-02-19 11:46:35 --> 404 Page Not Found: Mlogin/getVehicles
ERROR - 2022-02-19 11:50:51 --> Severity: error --> Exception: Call to undefined method Member_model::get_member_credentials() C:\xampp\htdocs\VENAD\application\controllers\Mlogin.php 67
ERROR - 2022-02-19 11:58:21 --> Severity: error --> Exception: Call to undefined method Member_model::getPayrollReportTotalCount() C:\xampp\htdocs\VENAD\application\models\Member_model.php 237
ERROR - 2022-02-19 12:07:15 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\VENAD\application\controllers\Mlogin.php 65
ERROR - 2022-02-19 12:13:03 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) C:\xampp\htdocs\VENAD\application\models\Member_model.php 235
ERROR - 2022-02-19 12:13:18 --> Severity: error --> Exception: syntax error, unexpected '->' (T_OBJECT_OPERATOR) C:\xampp\htdocs\VENAD\application\models\Member_model.php 236
ERROR - 2022-02-19 12:18:28 --> Severity: Notice --> Undefined variable: response_text C:\xampp\htdocs\VENAD\application\controllers\Mlogin.php 42
ERROR - 2022-02-19 12:20:14 --> Query error: Unknown column 'tbl_login.member_mid' in 'on clause' - Invalid query: SELECT *
FROM `tbl_login`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_type`=`tbl_login`.`member_mid`
LEFT JOIN `tbl_member_type` ON `tbl_member_type`.`member_type_id`=`tbl_login`.`user_type`
ORDER BY `user_name`
ERROR - 2022-02-19 12:20:14 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Member_model.php 230
ERROR - 2022-02-19 12:24:29 --> Severity: Notice --> Undefined variable: response_text C:\xampp\htdocs\VENAD\application\controllers\Mlogin.php 42
ERROR - 2022-02-19 12:30:22 --> 404 Page Not Found: Assets/js
ERROR - 2022-02-19 12:30:26 --> 404 Page Not Found: Assets/js
ERROR - 2022-02-19 12:31:38 --> 404 Page Not Found: Assets/js
ERROR - 2022-02-19 12:50:05 --> 404 Page Not Found: Assets/js
ERROR - 2022-02-19 16:43:37 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_item` ON `tbl_receive_item`.`receival_member_id`=`tbl_allotment`.`allot_member_id_fk` AND `tbl_receive_item`.`receival_item_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_allotment`.`allot_unit_fk`
 LIMIT 10
ERROR - 2022-02-19 16:43:37 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\FCR_model.php 26
ERROR - 2022-02-19 16:43:57 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_item` ON `tbl_receive_item`.`receival_member_id`=`tbl_allotment`.`allot_member_id_fk` AND `tbl_receive_item`.`receival_item_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_allotment`.`allot_unit_fk`
 LIMIT 10
ERROR - 2022-02-19 16:43:57 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\FCR_model.php 26
