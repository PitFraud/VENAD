<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-04-19 14:19:33 --> Severity: error --> Exception: C:\wamp64\www\VENAD\application\models/Allotment_integration_model.php exists, but doesn't declare class Allotment_integration_model C:\wamp64\www\VENAD\system\core\Loader.php 671
ERROR - 2022-04-19 14:19:53 --> Severity: Notice --> Undefined property: Allotment_integration_report::$Salereport_model C:\wamp64\www\VENAD\application\controllers\Allotment_integration_report.php 44
ERROR - 2022-04-19 14:19:53 --> Severity: error --> Exception: Call to a member function get_shop() on null C:\wamp64\www\VENAD\application\controllers\Allotment_integration_report.php 44
ERROR - 2022-04-19 14:24:51 --> Severity: Notice --> Undefined property: Allotment_integration_report::$Salereport_model C:\wamp64\www\VENAD\application\controllers\Allotment_integration_report.php 44
ERROR - 2022-04-19 14:24:51 --> Severity: error --> Exception: Call to a member function get_shop() on null C:\wamp64\www\VENAD\application\controllers\Allotment_integration_report.php 44
ERROR - 2022-04-19 14:25:24 --> Query error: Unknown column 'sale_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
WHERE `sale_status` = 1
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT 10
ERROR - 2022-04-19 14:25:25 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 14:25:43 --> Query error: Unknown column 'sale_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_allotment`
WHERE `sale_status` = 1
 LIMIT 10
ERROR - 2022-04-19 14:25:43 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 14:25:53 --> Query error: Unknown column 'sale_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_allotment`
WHERE `sale_status` = 1
 LIMIT 10
ERROR - 2022-04-19 14:25:53 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 14:26:16 --> Query error: Unknown column 'sale_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_allotment`
WHERE `sale_status` = 1
 LIMIT 10
ERROR - 2022-04-19 14:26:17 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 14:29:33 --> Query error: Unknown column 'sale_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_allotment`
WHERE `sale_status` = 1
 LIMIT 10
ERROR - 2022-04-19 14:29:33 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 14:34:22 --> Query error: Unknown column 'sale_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
WHERE `sale_status` = 1
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT 10
ERROR - 2022-04-19 14:34:22 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 14:34:34 --> Query error: Unknown column 'sale_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_allotment`
WHERE `sale_status` = 1
 LIMIT 10
ERROR - 2022-04-19 14:34:35 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 14:35:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 5 - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 14:35:27 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 22
ERROR - 2022-04-19 14:35:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 5 - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 14:35:50 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 22
ERROR - 2022-04-19 14:39:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 5 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 14:39:08 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 22
ERROR - 2022-04-19 14:39:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 5 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 14:39:45 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 22
ERROR - 2022-04-19 14:58:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 14:58:04 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 14:59:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 14:59:02 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 15:26:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 15:26:36 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 15:31:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 15:31:54 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 15:33:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 15:33:51 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 15:34:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 15:34:33 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 15:34:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 15:34:45 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 15:35:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 15:35:04 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 15:35:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 15:35:24 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 15:35:30 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-19 15:36:35 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-19 15:36:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 15:36:36 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 15:38:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 15:38:43 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 16:17:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 16:17:01 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 16:17:08 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-19 16:17:32 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-19 16:17:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 16:17:33 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 16:17:44 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-19 16:17:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-1' at line 6 - Invalid query: SELECT *
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT -1
ERROR - 2022-04-19 16:17:44 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
ERROR - 2022-04-19 16:18:24 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-19 16:19:45 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-19 16:19:48 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-19 16:20:08 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-19 16:36:46 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-19 16:38:37 --> Query error: Operand should contain 1 column(s) - Invalid query: SELECT *, round(((allot_quantity/rec_given_feeds_total)/7), 4) AS feed_consumption, round(((rec_weight/rec_quantity)/7), 4) AS body_weight_ratio, ((((rec_weight/rec_quantity)/7)/1000), 4) AS body_weight_kg
FROM `tbl_allotment`
JOIN `tbl_receive_back` ON `tbl_receive_back`.`rec_allotment_fk`=`tbl_allotment`.`allot_id`
JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_allotment_fk`=`tbl_allotment`.`allot_id`
ORDER BY `tbl_allotment`.`allot_id` DESC
 LIMIT 10
ERROR - 2022-04-19 16:38:38 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\Allotment_integration_model.php 23
