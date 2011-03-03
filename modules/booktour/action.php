<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES. All rights reserved
 * @Createdate Apr 20, 2010 10:47:41 AM
 */

if ( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "`";
$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_info`";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `hometext` varchar(255) NOT NULL,
  `bodytext` varchar(255) NOT NULL,
  `times` varchar(255) NOT NULL,
  `begin_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `by` varchar(255) NOT NULL,
  `price` mediumtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `imgthumb` varchar(255) NOT NULL,
  UNIQUE KEY `title` (`title`),
  PRIMARY KEY (`id`),
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_info` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `send_time` int(11) unsigned NOT NULL DEFAULT '0',
  `sender_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `sender_name` varchar(100) NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `sender_phone` varchar(255) NOT NULL,
  `sender_ip` varchar(15) NOT NULL,
  `is_read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_reply` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `reply_content` mediumtext NOT NULL,
  `reply_time` int(11) unsigned NOT NULL DEFAULT '0',
  `reply_aid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sender_name` (`sender_name`)
) ENGINE=MyISAM";

?>