<?php

/**
 * @Project NUKEVIET CMS 3.0
 * @Author VINADES (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES. All rights reserved
 * @Createdate 2-9-2010 14:43
 */

if ( ! defined( 'NV_IS_BOOKTOUR_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['tour_list'];
$contents = "";
$contents.= "
<div id=\"module_show_list\"><table class=\"tab1\"> 
<thead> 
<tr> 
<td style=\"width: 20px\" align=\"center\">".$lang_module['id']."</td> 
<td>Tên Tour</td> 
<td style=\"width: 100px\" align=\"center\">".$lang_module['times']."</td> 
<td style=\"width: 100px\" align=\"center\">".$lang_module['by']."</td> 
<td style=\"width: 100px\" align=\"center\">".$lang_module['price']."</td> 
<td style=\"width: 80px\">".$lang_module['func']."</td> 
</tr> 
</thead> 
<tbody> 
"; 
// bat dau vong lap sql
$sql = "SELECT `id`, `title`, `times`, `by`,`price` FROM `" . NV_PREFIXLANG . "_" . $module_data . "` ORDER BY `id` ASC" ;
$result = $db->sql_query( $sql ) or die ('Đã có lỗi xảy ra trong lệnh truy vấn CSDL.<br />');
while($row = $db->sql_fetchrow( $result ))
{
$contents.= "
<thead> 
<tbody> 
<tr><td>".$row['id']."</td> 
<td><a href=\"#\">".$row['title']."</td> 
<td align=\"center\">".$row['times']."</td> 
<td align=\"center\">".$row['by']."</td> 
<td  align=\"center\">".$row['price']."</td> 
<td><span class=\"edit_icon\"><a href=\"\">Sửa</a></span> 
&nbsp;-&nbsp;<span class=\delete_ico\"><a href=\"index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=del&id=".$row['id']."\" onclick=\"nv_module_del(7)\">Xóa</a></span></td> </tr>
</thead>
";

}
//het vong lap sql
$contents.= " 
</tbody> 
		<thead> 
			<tr> 
				<td colspan=\"8\" align=\"center\"><a  href=\"index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=add\">".$lang_module['addtour']."</a></td> 
			</tr> 
		</thead> 
</table> 
</div>";
include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>