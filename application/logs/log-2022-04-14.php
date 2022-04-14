<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-04-14 09:40:11 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\VENAD\application\controllers\ProductManagement.php 110
ERROR - 2022-04-14 09:41:14 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-14 09:41:25 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\VENAD\application\controllers\ProductManagement.php 110
ERROR - 2022-04-14 09:41:27 --> Query error: Column 'production_quantity' cannot be null - Invalid query: INSERT INTO `tbl_production_details` (`production_item_id_fk`, `production_mfd`, `production_chicken_type`, `production_expiry`, `production_quantity`, `production_row_mat_count`, `production_unit_id_fk`, `production_packet_weight`, `production_packet_count`, `production_chicken_count`, `production_chicken_weight`, `production_chicken_waste`, `production_price`, `production_code`, `production_chicken_old_stock`, `production_chicken_new_bal`, `created_at`) VALUES ('3', '2022-04-14', '1', '2022-04-18', NULL, '70', '2', '1', '70', '50', '110', '40', '240', 'AL8654542', '145', 35, '2022-04-14 09:41:25')
ERROR - 2022-04-14 09:41:30 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\VENAD\application\controllers\ProductManagement.php 137
ERROR - 2022-04-14 09:41:38 --> Severity: error --> Exception: Call to undefined method ProductManagement_model::getBroilerStock() C:\wamp64\www\VENAD\application\controllers\ProductManagement.php 187
ERROR - 2022-04-14 09:45:36 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\VENAD\application\controllers\ProductManagement.php 110
ERROR - 2022-04-14 09:45:38 --> Severity: Notice --> Undefined property: ProductManagement::$add_returnID C:\wamp64\www\VENAD\system\core\Model.php 153
ERROR - 2022-04-14 09:45:38 --> Query error: Column 'production_quantity' cannot be null - Invalid query: INSERT INTO `tbl_production_details` (`production_item_id_fk`, `production_mfd`, `production_chicken_type`, `production_expiry`, `production_quantity`, `production_row_mat_count`, `production_unit_id_fk`, `production_packet_weight`, `production_packet_count`, `production_chicken_count`, `production_chicken_weight`, `production_chicken_waste`, `production_price`, `production_code`, `production_chicken_old_stock`, `production_chicken_new_bal`, `created_at`) VALUES ('3', '2022-04-14', '1', '2022-04-18', NULL, '70', '2', '1', '70', '50', '110', '40', '240', 'AL8654542', '145', 35, '2022-04-14 09:45:36')
ERROR - 2022-04-14 09:45:40 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\VENAD\application\controllers\ProductManagement.php 137
ERROR - 2022-04-14 09:45:53 --> Severity: error --> Exception: Call to undefined method ProductManagement_model::getBroilerStock() C:\wamp64\www\VENAD\application\controllers\ProductManagement.php 187
ERROR - 2022-04-14 09:47:09 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-14 09:50:04 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-14 09:51:01 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\VENAD\application\controllers\ProductManagement.php 137
ERROR - 2022-04-14 10:06:36 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\VENAD\application\controllers\ProductManagement.php 162
ERROR - 2022-04-14 10:06:36 --> Severity: error --> Exception: Call to undefined method ProductManagement_model::getBroilerStock() C:\wamp64\www\VENAD\application\controllers\ProductManagement.php 171
ERROR - 2022-04-14 10:52:59 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-14 11:03:51 --> Query error: Column 'updated_at' in field list is ambiguous - Invalid query: SELECT *, DATE_FORMAT(updated_at, '%d/%m/%Y') AS date
FROM `tbl_allotment`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
WHERE `item_status` = 1
ORDER BY `allot_id` DESC
 LIMIT 10
ERROR - 2022-04-14 11:03:52 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\IntegrationDetails_model.php 25
ERROR - 2022-04-14 11:08:03 --> Query error: Unknown column 'item_status' in 'where clause' - Invalid query: SELECT *, DATE_FORMAT(updated_at, '%d/%m/%Y') AS date
FROM `tbl_allotment`
WHERE `item_status` = 1
ORDER BY `allot_id` DESC
 LIMIT 10
ERROR - 2022-04-14 11:08:04 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\IntegrationDetails_model.php 24
ERROR - 2022-04-14 11:08:15 --> Query error: Unknown column 'item_status' in 'where clause' - Invalid query: SELECT *, DATE_FORMAT(updated_at, '%d/%m/%Y') AS date
FROM `tbl_allotment`
WHERE `item_status` = 1
ORDER BY `allot_id` DESC
 LIMIT 10
ERROR - 2022-04-14 11:08:15 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\IntegrationDetails_model.php 24
ERROR - 2022-04-14 11:08:32 --> Query error: Unknown column 'item_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
WHERE `item_status` = 1
ORDER BY `allot_id` DESC
 LIMIT 10
ERROR - 2022-04-14 11:08:32 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\IntegrationDetails_model.php 24
ERROR - 2022-04-14 11:09:01 --> Query error: Unknown column 'item_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_allotment`
WHERE `item_status` = 1
ORDER BY `allot_id` DESC
 LIMIT 10
ERROR - 2022-04-14 11:09:01 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\IntegrationDetails_model.php 24
ERROR - 2022-04-14 11:18:51 --> Query error: Unknown column 'item_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_allotment`
WHERE `item_status` = 1
 LIMIT 10
ERROR - 2022-04-14 11:18:51 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\IntegrationDetails_model.php 24
ERROR - 2022-04-14 11:41:10 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
