<?php

/**
 * @Project NUKEVIET CMS 3.0
 * @Author VINADES (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES. All rights reserved
 * @Createdate 2-9-2010 14:43
 */

if ( ! defined( 'NV_IS_BOOKTOUR_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['tour_add'];

$contents = "";
$error = "";
$data = array();
// truyen du lieu tu forum
$data['title'] = filter_text_input( 'title', 'post', '' );
$data['times'] = filter_text_input( 'times', 'post', '' );
$data['by'] = filter_text_input( 'by', 'post', '' );
$data['price'] = $nv_Request->get_int( 'price', 'post', 0 );
$data['img'] = $nv_Request->get_string( 'img', 'post', '' );
$data['imgthumb'] = $nv_Request->get_string( 'imgthumb', 'post', '' );
$data['hometext'] = $nv_Request->get_string( 'hometext', 'post', '' );
$data['bodytext'] = $nv_Request->get_string( 'bodytext', 'post', '');
// kiem tra du lieu co dc nhap vao hay kong
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
      $error = "Bạn chưa nhập giá tour";
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
      $query = "INSERT INTO `" . NV_PREFIXLANG . "_" . $module_data . "` VALUES 
      ( 
        NULL, 
        " . $db->dbescape( $data['title'] ) . ",
		" . $db->dbescape( $data['times'] ) . ",
		" . $db->dbescape( $data['by'] ) . ",
		" . $db->dbescape( $data['price'] ) . ",
		" . $db->dbescape( $data['img'] ) . ",
		" . $db->dbescape( $data['imgthumb'] ) . ",
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
// xuat thong bao loi
if( $error )
{
   $contents .= "<div class=\"quote\" style=\"width: 780px;\">\n
               <blockquote class=\"error\">
                  <span style=\"font-size:16px\">" . $error . "</span>
               </blockquote>
            </div>\n
            <div class=\"clear\">
            </div>";
}

//noi dung html
$contents .="
<form method=\"post\">
   <table class=\"tab1\">
      <thead>
         <tr>
            <td colspan=\"2\">
               ".$lang_module['info']."
            </td>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td style=\"width: 150px;\">
               ".$lang_module['title']."
            </td>
            <td style=\"background: #eee;\">
               <input name=\"title\" style=\"width: 470px;\" value=\"" . $data['title'] . "\" type=\"text\">
            </td>
         </tr>
      </tbody>
	  <tbody>
         <tr>
            <td style=\"width: 150px;\">
               ".$lang_module['times']."
            </td>
            <td style=\"background: #eee;\">
               <input name=\"times\" style=\"width: 470px;\" value=\"" . $data['times'] . "\" type=\"text\">
            </td>
         </tr>
      </tbody>
	  <tbody>
         <tr>
            <td style=\"width: 150px;\">
               ".$lang_module['by']."
            </td>
            <td style=\"background: #eee;\">
               <input name=\"by\" style=\"width: 470px;\" value=\"" . $data['by'] . "\" type=\"text\">
            </td>
         </tr>
      </tbody>
	  <tbody>
         <tr>
            <td style=\"width: 150px;\">
               ".$lang_module['price']."
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
               <textarea name=\"hometext\" style=\"width: 635px; height: 114px\">" . $data['hometext'] . "</textarea>
            </td>
         </tr>
      </tbody>
	  <tbody>
         <tr>
            <td>
            Nội Dung
            </td>
   
   <td>";
   // add trinh soan thao van ban
if ( defined( 'NV_EDITOR' ) )
{
    require_once ( NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php' );
}
    if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
        {
           $contents .= nv_aleditor( 'bodytext', '680px', '250px', $data['bodytext'] );
        }
        else
        {
         $contents .= "<textarea style=\"width: 680px\"  name=\"bodytext\" id=\"describe\" cols=\"20\" rows=\"15\"></textarea>\n";
        }
$contents.="           
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
$contents.="
<script type=\"text/javascript\">         
            $(\"input[name=selectimg]\").click(function()
            {
               var area = \"img\"; // return value area
               var path = \"".NV_UPLOADS_DIR . "/" . $module_name."\";
               nv_open_browse_file(\"".NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=upload&popup=1&area=" + area+"&path="+path, "NVImg", "850", "500","resizable=no,scrollbars=no,toolbar=no,location=no,status=no'."\");
               return false;
            });
            </script>";
include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>