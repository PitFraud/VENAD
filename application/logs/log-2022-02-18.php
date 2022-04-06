<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-18 11:27:35 --> Query error: Unknown column 'tbl_feeds.feeds_member_fk' in 'on clause' - Invalid query: SELECT *
FROM `tbl_allotment`
LEFT JOIN `tbl_receive_item` ON `tbl_receive_item`.`receival_member_id`=`tbl_allotment`.`allot_member_id_fk` AND `tbl_receive_item`.`receival_item_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_feeds` ON `tbl_feeds`.`feeds_member_fk`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_member` ON `tbl_member`.`member_id`=`tbl_allotment`.`allot_member_id_fk`
LEFT JOIN `tbl_product` ON `tbl_product`.`product_id`=`tbl_allotment`.`allot_item_id`
LEFT JOIN `tbl_unit` ON `tbl_unit`.`unit_id`=`tbl_allotment`.`allot_unit_fk`
 LIMIT 10
ERROR - 2022-02-18 11:27:35 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\VENAD\application\models\FCR_model.php 26
ERROR - 2022-02-18 16:21:44 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\VENAD\application\controllers\Mlogin.php 73
ERROR - 2022-02-18 17:04:08 --> Query error: Column 'user_name' cannot be null - Invalid query: INSERT INTO `tbl_login` (`user_name`, `password`, `user_type`, `mem_id`, `status`, `created_at`) VALUES (NULL, '2543', 'G', NULL, 1, '2022-02-18 17:04:08')
ERROR - 2022-02-18 17:09:37 --> Query error: Column 'user_name' cannot be null - Invalid query: INSERT INTO `tbl_login` (`user_name`, `password`, `user_type`, `mem_id`, `status`, `created_at`) VALUES (NULL, '1234', 'G', NULL, 1, '2022-02-18 17:09:37')
