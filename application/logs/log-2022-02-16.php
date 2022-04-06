<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-16 10:29:09 --> 404 Page Not Found: Purchasereport/index
ERROR - 2022-02-16 10:29:17 --> Severity: Notice --> Undefined variable: member_types C:\xampp\htdocs\VENAD\application\views\Allotment\add.php 55
ERROR - 2022-02-16 10:29:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\VENAD\application\views\Allotment\add.php 55
ERROR - 2022-02-16 10:29:17 --> Severity: Notice --> Undefined variable: units C:\xampp\htdocs\VENAD\application\views\Allotment\add.php 80
ERROR - 2022-02-16 10:29:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\VENAD\application\views\Allotment\add.php 80
ERROR - 2022-02-16 10:29:17 --> Severity: Notice --> Undefined variable: vaccinationdays C:\xampp\htdocs\VENAD\application\views\Allotment\add.php 89
ERROR - 2022-02-16 10:29:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\VENAD\application\views\Allotment\add.php 89
ERROR - 2022-02-16 10:33:41 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_item` ON `tbl_receive_item`.`receival_member_id`=`tbl_allotment`.`allot_member_id_fk` AND `tbl_receive_item`.`receival_item_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_allotment`.`allot_unit_fk`
 LIMIT 10
ERROR - 2022-02-16 10:33:41 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\FCR_model.php 26
ERROR - 2022-02-16 11:12:58 --> 404 Page Not Found: Purchasereport/index
ERROR - 2022-02-16 11:13:36 --> 404 Page Not Found: Employee/index
ERROR - 2022-02-16 11:13:41 --> 404 Page Not Found: Emp_attendence/index
ERROR - 2022-02-16 11:15:00 --> 404 Page Not Found: Purchasereport/index
ERROR - 2022-02-16 11:15:14 --> 404 Page Not Found: Salereport/index
ERROR - 2022-02-16 11:15:24 --> 404 Page Not Found: Member_report/index
ERROR - 2022-02-16 11:15:30 --> 404 Page Not Found: DailyAttendancereport/index
ERROR - 2022-02-16 11:21:37 --> Query error: Unknown column 'allot_days_fk' in 'field list' - Invalid query: INSERT INTO `tbl_allotment` (`allot_item_id`, `allot_quantity`, `allot_member_id_fk`, `allot_unit_fk`, `allot_days_fk`, `allot_weight`, `allot_status`, `created_at`) VALUES ('1', '10', '3', '2', '7', '25', 1, '2022-02-16 11:21:37')
ERROR - 2022-02-16 11:24:08 --> Query error: Unknown column 'allot_days_fk' in 'field list' - Invalid query: INSERT INTO `tbl_allotment` (`allot_item_id`, `allot_quantity`, `allot_member_id_fk`, `allot_unit_fk`, `allot_days_fk`, `allot_weight`, `allot_status`, `created_at`) VALUES ('1', '100', '3', '2', '4', '250', 1, '2022-02-16 11:24:08')
ERROR - 2022-02-16 11:26:38 --> Query error: Unknown column 'allot_days_fk' in 'field list' - Invalid query: INSERT INTO `tbl_allotment` (`allot_item_id`, `allot_quantity`, `allot_member_id_fk`, `allot_unit_fk`, `allot_days_fk`, `allot_weight`, `allot_status`, `created_at`) VALUES ('1', '10', '2', '2', '4', '15', 1, '2022-02-16 11:26:38')
ERROR - 2022-02-16 11:28:12 --> Query error: Unknown column 'allot_days_fk' in 'field list' - Invalid query: INSERT INTO `tbl_allotment` (`allot_item_id`, `allot_quantity`, `allot_member_id_fk`, `allot_unit_fk`, `allot_days_fk`, `allot_weight`, `allot_status`, `created_at`) VALUES ('1', '100', '2', '2', '2', '20', 1, '2022-02-16 11:28:12')
ERROR - 2022-02-16 15:15:02 --> Severity: error --> Exception: Unable to locate the model you have specified: Voucherhead_model C:\xampp\htdocs\VENAD\system\core\Loader.php 344
ERROR - 2022-02-16 15:15:08 --> Severity: error --> Exception: Unable to locate the model you have specified: Voucher_model C:\xampp\htdocs\VENAD\system\core\Loader.php 344
ERROR - 2022-02-16 15:19:58 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *, DATE_FORMAT(voucher_date, '%d/%m/%Y')as voucher_date
FROM `tbl_project_voucher`
JOIN `tbl_project_vouchhead` ON `vouch_id` = `vouch_id_fk`
WHERE `voucher_status` = 1
AND `project_id_fk` IS NULL
ORDER BY `voucher_id` ASC
 LIMIT 10
ERROR - 2022-02-16 15:19:58 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Voucher_model.php 122
ERROR - 2022-02-16 15:20:04 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *, DATE_FORMAT(voucher_date, '%d/%m/%Y')as voucher_date
FROM `tbl_project_voucher`
JOIN `tbl_project_vouchhead` ON `vouch_id` = `vouch_id_fk`
WHERE `voucher_status` = 1
AND `project_id_fk` IS NULL
ORDER BY `voucher_id` ASC
 LIMIT 10
ERROR - 2022-02-16 15:20:04 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Voucher_model.php 122
ERROR - 2022-02-16 15:20:16 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *, DATE_FORMAT(voucher_date, '%d/%m/%Y')as voucher_date
FROM `tbl_project_voucher`
JOIN `tbl_project_vouchhead` ON `vouch_id` = `vouch_id_fk`
WHERE `voucher_status` = 1
AND `project_id_fk` IS NULL
ORDER BY `voucher_id` ASC
 LIMIT 10
ERROR - 2022-02-16 15:20:16 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Voucher_model.php 122
ERROR - 2022-02-16 15:20:22 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
JOIN `tbl_project_vouchhead` ON `vouch_id` = `vouch_id_fk`
WHERE `voucher_status` = 1
AND `project_id_fk` IS NULL
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:20:22 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 736
ERROR - 2022-02-16 15:20:31 --> 404 Page Not Found: GLedger/get_sum
ERROR - 2022-02-16 15:20:37 --> Severity: error --> Exception: Unable to locate the model you have specified: Greport_model C:\xampp\htdocs\VENAD\system\core\Loader.php 344
ERROR - 2022-02-16 15:20:46 --> 404 Page Not Found: GLedger/get_sum
ERROR - 2022-02-16 15:22:07 --> 404 Page Not Found: GLedger/get_sum
ERROR - 2022-02-16 15:22:08 --> Severity: error --> Exception: Unable to locate the model you have specified: Project_model C:\xampp\htdocs\VENAD\system\core\Loader.php 344
ERROR - 2022-02-16 15:22:44 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
JOIN `tbl_project_vouchhead` ON `vouch_id` = `vouch_id_fk`
WHERE `voucher_status` = 1
AND `project_id_fk` IS NULL
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:22:44 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 736
ERROR - 2022-02-16 15:23:13 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
JOIN `tbl_project_vouchhead` ON `vouch_id` = `vouch_id_fk`
WHERE `voucher_status` = 1
AND `project_id_fk` IS NULL
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:23:13 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 736
ERROR - 2022-02-16 15:23:21 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
JOIN `tbl_project_vouchhead` ON `vouch_id` = `vouch_id_fk`
WHERE `voucher_status` = 1
AND `project_id_fk` IS NULL
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:23:21 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 736
ERROR - 2022-02-16 15:23:40 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
JOIN `tbl_project_vouchhead` ON `vouch_id` = `vouch_id_fk`
WHERE `voucher_status` = 1
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:23:40 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 736
ERROR - 2022-02-16 15:23:51 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
WHERE `voucher_status` = 1
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:23:51 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 736
ERROR - 2022-02-16 15:28:33 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
WHERE `voucher_status` = 1
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:28:33 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 736
ERROR - 2022-02-16 15:28:39 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
WHERE `voucher_status` = 1
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:28:39 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 736
ERROR - 2022-02-16 15:29:28 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
WHERE `voucher_status` = 1
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:29:28 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 736
ERROR - 2022-02-16 15:29:38 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
WHERE `voucher_status` = 1
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:29:38 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 736
ERROR - 2022-02-16 15:32:52 --> Query error: Table 'farmer.tbl_project_voucher' doesn't exist - Invalid query: SELECT *
FROM `tbl_project_voucher`
WHERE `voucher_status` = 1
AND `voucher_date` >= '2022-02-01'
AND `voucher_date` <= '2022-02-28'
ERROR - 2022-02-16 15:32:52 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\Daybook_model.php 737
ERROR - 2022-02-16 15:34:31 --> 404 Page Not Found: GDaybook/get_sum
ERROR - 2022-02-16 15:34:43 --> 404 Page Not Found: GDaybook/get_opening
ERROR - 2022-02-16 15:34:43 --> 404 Page Not Found: GDaybook/get_sum_
ERROR - 2022-02-16 15:34:44 --> 404 Page Not Found: GDaybook/get_sum
ERROR - 2022-02-16 15:34:49 --> 404 Page Not Found: GDaybook/get_sum_
ERROR - 2022-02-16 15:34:49 --> 404 Page Not Found: GDaybook/get_opening
ERROR - 2022-02-16 15:34:50 --> 404 Page Not Found: GDaybook/get_sum
ERROR - 2022-02-16 15:34:51 --> 404 Page Not Found: GDaybook/get_opening
ERROR - 2022-02-16 15:34:51 --> 404 Page Not Found: GDaybook/get_sum_
ERROR - 2022-02-16 15:34:52 --> 404 Page Not Found: GDaybook/get_sum
