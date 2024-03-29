<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 28/8/2010, 23:11
 */

if ( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "`";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `times` varchar(255) NOT NULL,
  `by` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL,
  `imgthumb` varchar(255) NOT NULL,
  `hometext` mediumtext NOT NULL,
  `bodytext` mediumtext NOT NULL, 
  UNIQUE KEY `title` (`title`),
  KEY `id` (`id`)
)ENGINE=MyISAM";



?>