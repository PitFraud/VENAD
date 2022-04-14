<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-04-13 16:35:02 --> Severity: Notice --> Trying to get property 'product_name' of non-object C:\wamp64\www\VENAD\application\views\PStock\receipt.php 167
ERROR - 2022-04-13 16:35:02 --> Severity: Notice --> Trying to get property 'allot_quantity' of non-object C:\wamp64\www\VENAD\application\views\PStock\receipt.php 169
ERROR - 2022-04-13 16:56:28 --> Query error: Column 'updated_at' in field list is ambiguous - Invalid query: SELECT *, DATE_FORMAT(updated_at, '%d/%m/%Y') AS date
FROM `tbl_production_details`
LEFT JOIN `tbl_production_itemlist` ON `tbl_production_itemlist`.`item_id`=`tbl_production_details`.`production_item_id_fk`
WHERE `item_status` = 1
ORDER BY `production_id` DESC
 LIMIT 10
ERROR - 2022-04-13 16:56:29 --> Severity: error --> Exception: Call to a member function result() on bool C:\wamp64\www\VENAD\application\models\ProductionStock_model.php 23
ERROR - 2022-04-13 17:05:01 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
ERROR - 2022-04-13 17:06:17 --> 404 Page Not Found: Assets/EasyAutocomplete-1.3.5
