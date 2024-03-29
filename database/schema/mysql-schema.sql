/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `communication_mode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `communication_mode` (
  `mode_id` int NOT NULL,
  `mode` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `delete_issue_process`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delete_issue_process` (
  `complaint_id` int NOT NULL,
  `processed_by` int DEFAULT NULL,
  `processed_at` datetime(3) DEFAULT NULL,
  `processed_message` longtext COLLATE utf8mb4_general_ci,
  `issue_type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Complaint',
  `priority` varchar(35) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `district_id` int DEFAULT NULL,
  `category_id` int NOT NULL,
  `comments` longtext COLLATE utf8mb4_general_ci,
  `created_by` int NOT NULL,
  `created_date` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updated_by` int DEFAULT NULL,
  `upated_date` datetime(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `district` (
  `district_id` int NOT NULL,
  `region_id` int NOT NULL,
  `district` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ec_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ec_data` (
  `id` int NOT NULL,
  `region_id` int DEFAULT NULL,
  `region_name` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `constituency_id` int DEFAULT NULL,
  `constituency_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `electoral_area_id` int DEFAULT NULL,
  `electoral_area_name` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `polling_station_id` int DEFAULT NULL,
  `polling_station_code` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `polling_station_name` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `register` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_category_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_category_field` (
  `issue_category_id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `field_id` int NOT NULL,
  `display` int NOT NULL,
  `created_by` int NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`issue_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_comment` (
  `id` int NOT NULL,
  `issue_id` int NOT NULL,
  `user_fk` int NOT NULL,
  `date` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `comments` longtext COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_esc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_esc` (
  `id` int NOT NULL,
  `complaint_id` int NOT NULL,
  `escalator` int NOT NULL,
  `prev` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `neaw` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `reason` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_field` (
  `field_id` int NOT NULL,
  `field_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_master` (
  `issue_id` bigint NOT NULL AUTO_INCREMENT,
  `issue_code` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `mode_id` int DEFAULT NULL,
  `source_id` int NOT NULL,
  `priority` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Low',
  `raw_report` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `received_date` date NOT NULL,
  `processed_by` int DEFAULT NULL,
  `processed_date` datetime DEFAULT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL DEFAULT '0',
  `region_id` int NOT NULL DEFAULT '0',
  `district_id` int DEFAULT '0',
  `constituency_id` int NOT NULL DEFAULT '0',
  `electoral_area_id` int NOT NULL DEFAULT '0',
  `polling_station_id` int NOT NULL DEFAULT '0',
  `community` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gps_latitude` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gps_longitude` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status_id` int NOT NULL DEFAULT '1',
  `created_by` int DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_media` (
  `issue_media_id` bigint NOT NULL AUTO_INCREMENT,
  `issue_id` bigint NOT NULL,
  `media_type_id` int NOT NULL,
  `file_name` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`issue_media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_resolution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_resolution` (
  `id` int NOT NULL AUTO_INCREMENT,
  `complaint_id` int NOT NULL,
  `resolver_id` int NOT NULL,
  `resolution` longtext COLLATE utf8mb4_general_ci,
  `resolved_date` date DEFAULT NULL,
  `confirmed_closed` tinyint NOT NULL DEFAULT '0',
  `confirmed_date` date DEFAULT NULL,
  `reopened` tinyint NOT NULL DEFAULT '0',
  `reopen_by` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reopen_date` date DEFAULT NULL,
  `reopen_reason` longtext COLLATE utf8mb4_general_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_source` (
  `source_id` int NOT NULL,
  `source` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `sms_msg` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `email_msg` varchar(1200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `issue_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_subcategory` (
  `issue_subcategory_id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`issue_subcategory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `media_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media_type` (
  `media_type_id` int NOT NULL,
  `media_type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `region` (
  `region_id` int NOT NULL,
  `region` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `support_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_group` (
  `support_group_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `contact_name` varchar(300) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `duration` int NOT NULL,
  `acticve` int NOT NULL DEFAULT '1',
  `created_by` int NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`support_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `vw_district`;
/*!50001 DROP VIEW IF EXISTS `vw_district`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_district` AS SELECT 
 1 AS `region`,
 1 AS `district_id`,
 1 AS `region_id`,
 1 AS `District`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_ec_data_constituency`;
/*!50001 DROP VIEW IF EXISTS `vw_ec_data_constituency`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_ec_data_constituency` AS SELECT 
 1 AS `region_id`,
 1 AS `region_name`,
 1 AS `constituency_id`,
 1 AS `constituency_name`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_ec_data_electoral_area`;
/*!50001 DROP VIEW IF EXISTS `vw_ec_data_electoral_area`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_ec_data_electoral_area` AS SELECT 
 1 AS `region_id`,
 1 AS `region_name`,
 1 AS `constituency_id`,
 1 AS `constituency_name`,
 1 AS `electoral_area_id`,
 1 AS `electoral_area_name`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_electoral_areas`;
/*!50001 DROP VIEW IF EXISTS `vw_electoral_areas`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_electoral_areas` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `constituency_id`,
 1 AS `constituency_name`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_issue_category_field`;
/*!50001 DROP VIEW IF EXISTS `vw_issue_category_field`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_issue_category_field` AS SELECT 
 1 AS `field_name`,
 1 AS `category`,
 1 AS `active`,
 1 AS `issue_category_id`,
 1 AS `category_id`,
 1 AS `field_id`,
 1 AS `display`,
 1 AS `created_by`,
 1 AS `created_date`,
 1 AS `modified_by`,
 1 AS `modified_date`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_issue_master`;
/*!50001 DROP VIEW IF EXISTS `vw_issue_master`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_issue_master` AS SELECT 
 1 AS `mode`,
 1 AS `source`,
 1 AS `category`,
 1 AS `description`,
 1 AS `region`,
 1 AS `district`,
 1 AS `constituency_name`,
 1 AS `electoral_area_name`,
 1 AS `polling_station_name`,
 1 AS `status`,
 1 AS `issue_id`,
 1 AS `issue_code`,
 1 AS `code`,
 1 AS `name`,
 1 AS `email`,
 1 AS `phone`,
 1 AS `gender`,
 1 AS `mode_id`,
 1 AS `source_id`,
 1 AS `priority`,
 1 AS `raw_report`,
 1 AS `received_date`,
 1 AS `category_id`,
 1 AS `subcategory_id`,
 1 AS `region_id`,
 1 AS `district_id`,
 1 AS `constituency_id`,
 1 AS `electoral_area_id`,
 1 AS `polling_station_id`,
 1 AS `community`,
 1 AS `gps_latitude`,
 1 AS `gps_longitude`,
 1 AS `status_id`,
 1 AS `created_by`,
 1 AS `created_at`,
 1 AS `updated_by`,
 1 AS `updated_at`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_issue_subcategory`;
/*!50001 DROP VIEW IF EXISTS `vw_issue_subcategory`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_issue_subcategory` AS SELECT 
 1 AS `category`,
 1 AS `issue_subcategory_id`,
 1 AS `category_id`,
 1 AS `description`,
 1 AS `active`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `vw_polling_stations`;
/*!50001 DROP VIEW IF EXISTS `vw_polling_stations`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_polling_stations` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `electoral_area_id`,
 1 AS `electoral_area_name`*/;
SET character_set_client = @saved_cs_client;
/*!50001 DROP VIEW IF EXISTS `vw_district`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_district` AS select `region`.`region` AS `region`,`district`.`district_id` AS `district_id`,`district`.`region_id` AS `region_id`,`district`.`district` AS `District` from (`region` join `district` on((`region`.`region_id` = `district`.`district_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_ec_data_constituency`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_ec_data_constituency` AS select `ec_data`.`region_id` AS `region_id`,`ec_data`.`region_name` AS `region_name`,`ec_data`.`constituency_id` AS `constituency_id`,`ec_data`.`constituency_name` AS `constituency_name` from `ec_data` group by `ec_data`.`region_id`,`ec_data`.`region_name`,`ec_data`.`constituency_id`,`ec_data`.`constituency_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_ec_data_electoral_area`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_ec_data_electoral_area` AS select `ec_data`.`region_id` AS `region_id`,`ec_data`.`region_name` AS `region_name`,`ec_data`.`constituency_id` AS `constituency_id`,`ec_data`.`constituency_name` AS `constituency_name`,`ec_data`.`electoral_area_id` AS `electoral_area_id`,`ec_data`.`electoral_area_name` AS `electoral_area_name` from `ec_data` group by `ec_data`.`region_id`,`ec_data`.`region_name`,`ec_data`.`constituency_id`,`ec_data`.`constituency_name`,`ec_data`.`electoral_area_id`,`ec_data`.`electoral_area_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_electoral_areas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_electoral_areas` AS select distinct `ec_data`.`electoral_area_id` AS `id`,`ec_data`.`electoral_area_name` AS `name`,`ec_data`.`constituency_id` AS `constituency_id`,`ec_data`.`constituency_name` AS `constituency_name` from `ec_data` where (`ec_data`.`id` > 0) order by `ec_data`.`electoral_area_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_issue_category_field`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_issue_category_field` AS select `issue_field`.`field_name` AS `field_name`,`issue_category`.`category` AS `category`,`issue_category`.`active` AS `active`,`issue_category_field`.`issue_category_id` AS `issue_category_id`,`issue_category_field`.`category_id` AS `category_id`,`issue_category_field`.`field_id` AS `field_id`,`issue_category_field`.`display` AS `display`,`issue_category_field`.`created_by` AS `created_by`,`issue_category_field`.`created_date` AS `created_date`,`issue_category_field`.`modified_by` AS `modified_by`,`issue_category_field`.`modified_date` AS `modified_date` from ((`issue_category_field` join `issue_category` on((`issue_category_field`.`category_id` = `issue_category`.`category_id`))) join `issue_field` on((`issue_category_field`.`field_id` = `issue_field`.`field_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_issue_master`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_issue_master` AS select `communication_mode`.`mode` AS `mode`,`issue_source`.`source` AS `source`,`issue_category`.`category` AS `category`,`issue_subcategory`.`description` AS `description`,`region`.`region` AS `region`,`district`.`district` AS `district`,`vw_ec_data_constituency`.`constituency_name` AS `constituency_name`,`vw_ec_data_electoral_area`.`electoral_area_name` AS `electoral_area_name`,`ec_data`.`polling_station_name` AS `polling_station_name`,`issue_status`.`status` AS `status`,`issue_master`.`issue_id` AS `issue_id`,`issue_master`.`issue_code` AS `issue_code`,`issue_master`.`code` AS `code`,`issue_master`.`name` AS `name`,`issue_master`.`email` AS `email`,`issue_master`.`phone` AS `phone`,`issue_master`.`gender` AS `gender`,`issue_master`.`mode_id` AS `mode_id`,`issue_master`.`source_id` AS `source_id`,`issue_master`.`priority` AS `priority`,`issue_master`.`raw_report` AS `raw_report`,`issue_master`.`received_date` AS `received_date`,`issue_master`.`category_id` AS `category_id`,`issue_master`.`subcategory_id` AS `subcategory_id`,`issue_master`.`region_id` AS `region_id`,`issue_master`.`district_id` AS `district_id`,`issue_master`.`constituency_id` AS `constituency_id`,`issue_master`.`electoral_area_id` AS `electoral_area_id`,`issue_master`.`polling_station_id` AS `polling_station_id`,`issue_master`.`community` AS `community`,`issue_master`.`gps_latitude` AS `gps_latitude`,`issue_master`.`gps_longitude` AS `gps_longitude`,`issue_master`.`status_id` AS `status_id`,`issue_master`.`created_by` AS `created_by`,`issue_master`.`created_at` AS `created_at`,`issue_master`.`updated_by` AS `updated_by`,`issue_master`.`updated_at` AS `updated_at` from ((((((((((`issue_master` join `vw_ec_data_constituency` on((`issue_master`.`constituency_id` = `vw_ec_data_constituency`.`constituency_id`))) join `communication_mode` on((`issue_master`.`mode_id` = `communication_mode`.`mode_id`))) join `issue_source` on((`issue_master`.`source_id` = `issue_source`.`source_id`))) join `issue_category` on((`issue_master`.`category_id` = `issue_category`.`category_id`))) join `issue_subcategory` on((`issue_master`.`subcategory_id` = `issue_subcategory`.`issue_subcategory_id`))) join `region` on((`issue_master`.`region_id` = `region`.`region_id`))) join `district` on((`issue_master`.`region_id` = `district`.`district_id`))) join `vw_ec_data_electoral_area` on((`issue_master`.`electoral_area_id` = `vw_ec_data_electoral_area`.`electoral_area_id`))) join `ec_data` on((`issue_master`.`polling_station_id` = `ec_data`.`polling_station_id`))) join `issue_status` on((`issue_master`.`status_id` = `issue_status`.`status_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_issue_subcategory`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_issue_subcategory` AS select `issue_category`.`category` AS `category`,`issue_subcategory`.`issue_subcategory_id` AS `issue_subcategory_id`,`issue_subcategory`.`category_id` AS `category_id`,`issue_subcategory`.`description` AS `description`,`issue_subcategory`.`active` AS `active` from (`issue_subcategory` join `issue_category` on((`issue_subcategory`.`category_id` = `issue_category`.`category_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50001 DROP VIEW IF EXISTS `vw_polling_stations`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_polling_stations` AS select distinct `ec_data`.`polling_station_id` AS `id`,`ec_data`.`polling_station_name` AS `name`,`ec_data`.`electoral_area_id` AS `electoral_area_id`,`ec_data`.`electoral_area_name` AS `electoral_area_name` from `ec_data` where (`ec_data`.`id` > 0) order by `ec_data`.`polling_station_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

