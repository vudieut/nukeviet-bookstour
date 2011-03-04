<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES. All rights reserved
 * @Createdate Apr 20, 2010 10:47:41 AM
 */
if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' ); 

$allow_func = array('main'); 
$submenu['add'] = "Tạo Mới Tour";

$allow_func = array('main', 'add', 'edit', 'del'); 

define( 'NV_IS_BOOKTOUR_ADMIN', true );

?>
