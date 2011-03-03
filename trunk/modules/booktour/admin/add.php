<?php

/**
 * @Project NUKEVIET CMS 3.0
 * @Author VINADES (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES. All rights reserved
 * @Createdate 2-9-2010 14:43
 */

if ( ! defined( 'NV_IS_BOOKTOUR_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $module_info['test content'];
$page_title = "Thêm Tour Du Lịch";


$contents = "";
$error = "";
$data = array();
$data['title'] = filter_text_input( 'title', 'post', '' );
$data['times'] = filter_text_input( 'times', 'post', '', 1, '' );
$data['by'] = filter_text_input( 'by', 'post', '', 1, '' );
$data['price'] = filter_text_input( 'price', 'post', '', 1, '' );
$data['img'] = filter_text_input( 'img', 'post', '', 1, '' );
$data['hometext'] = $nv_Request->get_string( 'hometext', 'post', '' );
$data['bodytext'] = $nv_Request->get_string( 'bodytext', 'post', ''); 
if ( ($nv_Request->get_int( 'add', 'post', 0 ) == 1) )
{
   if ( $data['title'] == "" )
   {
      $error = "Bạn chưa nhập tên tour";
   } 
   elseif ( $data['times'] == "" )
   {
      $error = "Bạn chưa nhập Thời gian của tour này";
   } 
    elseif ( $data['by'] == "" )
   {
      $error = "Bạn chưa nhập Phương Tiện";
   }
    elseif ( $data['price'] == "" )
   {
      $error = "Bạn chưa giá tour";
   }
   elseif ( $data['hometext'] == "" )
   {
      $error = "Bạn chưa nhập tóm tắt nội dung";
   }
    elseif ( $data['bodytext'] == "" )
   {
      $error = "Bạn chưa nhập  nội dung";
   }else
   {
     
      $resuilt = $db->sql_query( $sql );
      $query = "INSERT INTO `" . NV_PREFIXLANG . "_" . $module_data . "` 
      (
         `title`, `times`, `by`, `price`, `img`, `hometext`, `bodytext`
      ) 
      VALUES 
      ( 
        NULL, 
        " . $db->dbescape( $data['title'] ) . ",
		" . $db->dbescape( $data['times'] ) . ",
		" . $db->dbescape( $data['by'] ) . ",
		" . $db->dbescape( $data['img'] ) . ",
		" . $db->dbescape( $data['hometext'] ) . ",		 
        " . $db->dbescape( $data['bodytext'] ) . "
      )"; 
      if ( $db->sql_query_insert_id( $query ) ) 
      { 
         $db->sql_freeresult();
         Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name); die();
      } 
      else 
      { 
         $error = "Không thể lưu dữ liệu được"; 
      } 
   
   }
}

if( $error )
{
   $contents .= "<div class=\"quote\" style=\"width: 780px;\">\n
               <blockquote class=\"error\">
                  <span style=\"font-size:16px\">".$error."</span>
               </blockquote>
            </div>\n
            <div class=\"clear\">
            </div>";
}
$contents .="
<form method=\"post\">
   <table class=\"tab1\">
      <thead>
         <tr>
            <td colspan=\"2\">
               Thông tin Tour
            </td>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td style=\"width: 150px;\">
               Tên Tour
            </td>
            <td style=\"background: #eee;\">
               <input name=\"title\" style=\"width: 470px;\" value=\"" . $data['title'] . "\" type=\"text\">
            </td>
         </tr>
      </tbody>
	  <tbody>
         <tr>
            <td style=\"width: 150px;\">
               Thời gian
            </td>
            <td style=\"background: #eee;\">
               <input name=\"times\" style=\"width: 470px;\" value=\"" . $data['times'] . "\" type=\"text\">
            </td>
         </tr>
      </tbody>
	  <tbody>
         <tr>
            <td style=\"width: 150px;\">
               Phương Tiện
            </td>
            <td style=\"background: #eee;\">
               <input name=\"by\" style=\"width: 470px;\" value=\"" . $data['by'] . "\" type=\"text\">
            </td>
         </tr>
      </tbody>
	  <tbody>
         <tr>
            <td style=\"width: 150px;\">
               Giá Tour
            </td>
            <td style=\"background: #eee;\">
               <input name=\"price\" style=\"width: 470px;\" value=\"" . $data['price'] . "\" type=\"text\">
            </td>
         </tr>
      </tbody>
	  <tbody>
         <tr>
            <tr> 
				<td style=\"width: 124px\" >Hình Minh Họa</td> 
				<td>
					<input  style=\"width:380px\" type=\"text\" name=\"img\" id=\"img\" value=\"" . $data['img'] . "\" /> 
					<input  type=\"button\" value=\"Browse server\" name=\"selectimg\" />
				</td> 
			</tr> 
         </tr>
      </tbody>
    
      <tbody>
         <tr>
            <td>
            Tóm Tắt
            </td>
            <td>
               <textarea name=\"hometext\" style=\"width: 635px; height: 114px\"></textarea>
            </td>
         </tr>
      </tbody>
	  <tbody>
         <tr>
            <td>
            Nội Dung
            </td>
            <td>
               <textarea name=\"bodytext\" style=\"width: 635px; height: 114px\"></textarea>
            </td>
         </tr>
      </tbody>
         <tr>
            <td colspan=\"2\" align=\"center\" style=\"background: #eee;\">\n
               <input name=\"confirm\" value=\"Lưu\" type=\"submit\">\n
               <input type=\"hidden\" name=\"add\" value=\"1\">\n
            </td>\n
         </tr>\n
   </table>\n
</form>\n";
include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>