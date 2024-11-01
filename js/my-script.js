jQuery(document).ready(function() {


 jQuery('#gp_upload_image_button').live('click', function () {
		formfield = jQuery('#gp_upload_image').attr('name');
		uploadID = jQuery(this).prev('input'); 
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
    });
jQuery('#fb_upload_image_button').live('click', function () {
		formfield = jQuery('#fb_upload_image').attr('name');
		uploadID = jQuery(this).prev('input'); 
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
    });
jQuery('#tw_upload_image_button').live('click', function () {
		formfield = jQuery('#tw_upload_image').attr('name');
		uploadID = jQuery(this).prev('input'); 
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
    });
/*jQuery('#gp_upload_image_button').click(function() {
	formfield = jQuery('#gp_upload_image').attr('name');
 uploadID = jQuery(this).prev('input'); 
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
jQuery('#fb_upload_image_button').click(function() {
	formfield = jQuery('#fb_upload_image').attr('name');
 uploadID = jQuery(this).prev('input'); 
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});*/
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
  
 uploadID.val(imgurl);
 
uploadID.parent().next().empty().append('<img src='+imgurl+' />');
// alert(uploadID.next().next().append('<img src='+imgurl+' />'));

 tb_remove();
}



/*window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 alert("hii");
 jQuery('#fb_upload_image').val(imgurl);
 tb_remove();
}*/

});