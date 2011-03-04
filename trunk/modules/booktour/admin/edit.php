<?php

/**
 * @Project NUKEVIET CMS 3.0
 * @Author VINADES (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES. All rights reserved
 * @Createdate 2-9-2010 14:43
 */


if ( ! defined( 'NV_IS_BOOKTOUR_ADMIN' ) ) die( 'Stop!!!' );

$result = false;
$id = $nv_Request->get_int('id', 'post,get', 0);

if( $id > 0 )
{
   $sql = "DELETE FROM `" . NV_PREFIXLANG . "_" . $module_data ."` WHERE `id`=" . $id;
    $result = $db->sql_query( $sql );
}

if( $result )
{
   echo $lang_module['del_success'];
}
else
{
   echo $lang_module['del_error'];
}
if ( $result ) 
   { 
        $result = $db->sql_query( $sql );
        Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name); die();
   } 
   else 
    { 
         $error = "Không thể xóa dữ liệu được"; 
    }
?>

?>