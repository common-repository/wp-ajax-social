<?php
//require_once('get-the-image.php');


function wpas_total_content($content)
{
    global $single;
    if (get_option('wp_ajax_social')) {
        $wp_ajax_social = get_option('wp_ajax_social');
    }
	
    $output = wpas_ajax_social_get_content();
	if (is_single()) {
        
   
	if($wp_ajax_social['auto_wpas_button'] == "Before")
	{
		return $output . $content;
	}
	else
	{
		return $content . $output;
	}
   
        
    } else {
        return $content;
    }
}
function wpas_ajax_social_get_content()
{
    global $wp_ajax_social,$wp_ajax_social_default, $wpdb, $post, $single, $WP_PLUGIN_URL;
    if (!defined('WP_PLUGIN_URL'))
        define('WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');
    $pluginDir = WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), "", plugin_basename(__FILE__));
	 $wpas_img_path = WP_PLUGIN_URL."/wp-ajax-social/images";
	 
	
	
    if (get_option('wp_ajax_social')) {
        $wp_ajax_social_temp = get_option('wp_ajax_social');
		
		if (!array_key_exists('auto_show', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['auto_show'] = $wp_ajax_social_default['auto_show'];
		
		}
		if (!array_key_exists('fb_wpas', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['fb_wpas'] = $wp_ajax_social_default['fb_wpas'];
		
		}
		if (!array_key_exists('gp_wpas', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['gp_wpas'] = $wp_ajax_social_default['gp_wpas'];
		
		}
		if (!array_key_exists('tw_wpas', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['tw_wpas'] = $wp_ajax_social_default['tw_wpas'];
		
		}
		if (!array_key_exists('event_method_wpas', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['event_method_wpas'] = $wp_ajax_social_default['event_method_wpas'];
		
		}
		if (!array_key_exists('fb_wpas_button', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['fb_wpas_button'] = $wp_ajax_social_default['fb_wpas_button'];
		
		}
		if (!array_key_exists('gp_wpas_button', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['gp_wpas_button'] = $wp_ajax_social_default['gp_wpas_button'];
		
		}
		if (!array_key_exists('tw_show_count', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['tw_show_count'] = $wp_ajax_social_default['tw_show_count'];
		
		}
		if (!array_key_exists('tw_button_via', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['tw_button_via'] = $wp_ajax_social_default['tw_button_via'];
		
		}
		if (!array_key_exists('tw_button_recommend', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['tw_button_recommend'] = $wp_ajax_social_default['tw_button_recommend'];
		
		}
		if (!array_key_exists('tw_button_hashtag', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['tw_button_hashtag'] = $wp_ajax_social_default['tw_button_hashtag'];
		
		}
		if (!array_key_exists('tw_large_button', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['tw_large_button'] = $wp_ajax_social_default['tw_large_button'];
		
		}
		if (!array_key_exists('tw_opt_tailoring', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['tw_opt_tailoring'] = $wp_ajax_social_default['tw_opt_tailoring'];
		
		}
		if (!array_key_exists('auto_wpas_button', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['auto_wpas_button'] = $wp_ajax_social_default['auto_wpas_button'];
		
		}
		if (!array_key_exists('wpas_fb_upload_image', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['wpas_fb_upload_image'] = $wp_ajax_social_default['wpas_fb_upload_image'];
		
		}
		if (!array_key_exists('wpas_gp_upload_image', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['wpas_gp_upload_image'] = $wp_ajax_social_default['wpas_gp_upload_image'];
		
		}
		if (!array_key_exists('wpas_tw_upload_image', $wp_ajax_social_temp)) {
			$wp_ajax_social_temp['wpas_tw_upload_image'] = $wp_ajax_social_default['wpas_tw_upload_image'];
		
		}
    }
    
   if (isset($wp_ajax_social_temp['auto_show']) && $wp_ajax_social_temp['auto_show'] == "1" || $wp_ajax_social_temp['auto_show'] == "2") 
	{
        if($wp_ajax_social_temp['gp_wpas'] == 1 || $wp_ajax_social_temp['fb_wpas'] == 1 || $wp_ajax_social_temp['tw_wpas'] == 1)
		{
		?>

<script type="text/javascript" >
jQuery(document).ready(function ($) {
    jQuery('div.temp_icons a').<?php echo $wp_ajax_social_temp['event_method_wpas']; ?>(function () {
      var clkd_icon = $(this).attr('class');
	
	  jQuery('.static_icon_'+clkd_icon).html('<img style="padding-left:20px;padding-right:20px;" src="<?php echo $wpas_img_path."/loader.gif"; ?>">');
       
		if(clkd_icon == "facebook")
		{
			var send_val = '<?php echo $wp_ajax_social_temp['fb_wpas_button']; ?>';
			 var data = {
			action: 'dhf_loadme_ajax',
			 post_id: '<?php echo $post->ID; ?>',
			 send_val_yu: send_val
			};
		}
		if(clkd_icon == "googleplus")
		{
			var send_val = '<?php echo $wp_ajax_social_temp['gp_wpas_button']; ?>';
			var data = {
			action: 'dhf_loadme_ajax',
			post_id: '<?php echo $post->ID; ?>',
			send_val_yu: send_val
			};
		}
		if(clkd_icon == "twitter")
		{
			var send_val = 'tw';
			var tw_show_count = '<?php echo $wp_ajax_social_temp['tw_show_count']; ?>';
			var tw_button_via = '<?php echo $wp_ajax_social_temp['tw_button_via']; ?>';
			var tw_button_recommend = '<?php echo $wp_ajax_social_temp['tw_button_recommend']; ?>';
			var tw_button_hashtag = '<?php echo $wp_ajax_social_temp['tw_button_hashtag']; ?>';
			var tw_large_button = '<?php echo $wp_ajax_social_temp['tw_large_button']; ?>';
			var tw_opt_tailoring = '<?php echo $wp_ajax_social_temp['tw_opt_tailoring']; ?>';
			var data = {
			action: 'dhf_loadme_ajax',
			post_id: '<?php echo $post->ID; ?>',
			send_val_yu: send_val,
			tw_show_count_yu: tw_show_count,
			tw_button_via_yu: tw_button_via,
			tw_button_recommend_yu: tw_button_recommend,
			tw_button_hashtag_yu: tw_button_hashtag,
			tw_large_button_yu: tw_large_button,
			tw_opt_tailoring_yu: tw_opt_tailoring
			
			};
		}
       
        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function (response) {
			
		  jQuery('.static_icon_'+clkd_icon).empty();
		  if(send_val == "gp_small_bubble")
		  {
		  	jQuery('.static_icon_'+clkd_icon).css('width','53px'); jQuery('.static_icon_'+clkd_icon).css('padding-top','3px');
		  }
		  if(send_val == "gp_medium_bubble")
		  {
		  	jQuery('.static_icon_'+clkd_icon).css('width','60px'); jQuery('.static_icon_'+clkd_icon).css('padding-top','4px');
		  }
		  if(send_val == "gp_standard_bubble")
		  {
		  	jQuery('.static_icon_'+clkd_icon).css('width','71px'); jQuery('.static_icon_'+clkd_icon).css('padding-top','1px');
		  }
	                    jQuery('.static_icon_'+clkd_icon).html(response.substring(0, response.length - 1));
        });
        return false;
    });
    jQuery('form#wp_ajax_social_options_form input[type=checkbox]').live('change', function () {
        var id_chk = jQuery(this).attr('id');
        if (jQuery(this).is(':checked')) {
            jQuery("#options_" + id_chk).slideDown();
        } else {
            jQuery("#options_" + id_chk).slideUp();
        }
    });
});

</script>

<?php
		}
		 $css_var = "";
		if($wp_ajax_social_temp['fb_wpas'] == 1)
		{
			$wpas_fb_icon = '<div class="static_icon_facebook" style="float:left;display:inline-block;"><a href="javascript:;" id="wpas_icon" class="facebook"><img style="max-width:100%;" src="'.$wp_ajax_social_temp['wpas_fb_upload_image'].'"></a></div>';
		}
		else
		{
			$wpas_fb_icon = "";
		}
		if($wp_ajax_social_temp['gp_wpas'] == 1)
		{
			/*if($wp_ajax_social_temp['gp_wpas_button']== "gp_small_bubble")
			{
				$css_var = "width:53px;padding-top:3px;";
			}
			if($wp_ajax_social_temp['gp_wpas_button']== "gp_medium_bubble")
			{
				$css_var = "width:60px;padding-top:4px;";			
			}
			if($wp_ajax_social_temp['gp_wpas_button']== "gp_standard_bubble")
			{
				$css_var = "width:71px;padding-top:1px;";		
			}*/
			$wpas_gp_icon = '<div class="static_icon_googleplus" style="display: inline-block; float: left;'.$css_var.'"><a href="javascript:;" id="wpas_icon" class="googleplus"><img style="max-width:100%;" src="'.$wp_ajax_social_temp['wpas_gp_upload_image'].'"></a></div>';
		}
		else
		{
			$wpas_gp_icon = "";
		}
     	if($wp_ajax_social_temp['tw_wpas'] == 1)
		{
			
			$wpas_tw_icon = '<div class="static_icon_twitter" style="float:left;display:inline-block; padding-left: 4px;"><a href="javascript:;" id="wpas_icon" class="twitter"><img style="max-width:100%;" src="'.$wp_ajax_social_temp['wpas_tw_upload_image'].'"></a></div>';
		}
		else
		{
			$wpas_tw_icon = "";
		}
		
		

    $output = '<div class="temp_icons"  style="display:inline-block;">'.$wpas_fb_icon.$wpas_gp_icon.$wpas_tw_icon;
     $output .= '</div>';
    } 
   
    
    return $output;
}
function dhf_loadme_ajax()
{
	//echo "Hi";
	 global $wp_ajax_social,$wp_ajax_social_default, $wpdb, $post, $single, $WP_PLUGIN_URL;
	 $post_id = $_POST['post_id'];
	 $send_val_yu = $_POST['send_val_yu'];
	 if(strpos($send_val_yu,'fb') !== false)
	 {
		 if($_POST['send_val_yu'])
		 {
			if($_POST['send_val_yu'] == "fb_like_standard")
			{
				$layout_type = "standard";
				$action_fb = "like";
				$fb_height = "35";
				$fb_width = "225";
			}
			else if($_POST['send_val_yu'] == "fb_like_button_count")
			{
				$layout_type = "button_count";
				$action_fb = "like";
				$fb_height = "20";
				$fb_width = "90";
			}
			else if($_POST['send_val_yu'] == "fb_like_box_count")
			{
				$layout_type = "box_count";
				$action_fb = "like";
				$fb_height = "65";
				$fb_width = "55";
			}
			else if($_POST['send_val_yu'] == "fb_recommend_standard")
			{
				$layout_type = "standard";
				$action_fb = "recommend";
				$fb_height = "35";
				$fb_width = "265";
			}
			else if($_POST['send_val_yu'] == "fb_recommend_button_count")
			{
				$layout_type = "button_count";
				$action_fb = "recommend";
				$fb_height = "20";
				$fb_width = "130";
			}
			else if($_POST['send_val_yu'] == "fb_recommend_box_count")
			{
				$layout_type = "box_count";
				$action_fb = "recommend";
				$fb_height = "65";
				$fb_width = "95";
			}
			else
			{
				$layout_type = "standard";
				$action_fb = "like";
				$fb_height = "35";
				$fb_width = "225";
			}
		 }
		 else
		 {
				$layout_type = "standard";
				$action_fb = "like";
				$fb_height = "35";
				$fb_width = "225";
		 }
		$total_link = '<iframe src="http://www.facebook.com/plugins/like.php?href=';
		$total_link .= urlencode(get_permalink($post_id));
		$total_link .= '&amp;send=false&amp;layout='.$layout_type.'&amp;width='.$fb_width.'&amp;show_faces=false&amp;action='.$action_fb.'&amp;colorscheme=light&amp;font=trebuchet+ms&amp;height='.$fb_height.'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$fb_width.'px; height:'.$fb_height.'px;" allowTransparency="true"></iframe>';
	 }
	 if(strpos($send_val_yu,'gp') !== false)
	 {
		 if($_POST['send_val_yu'])
		 {
		
		 	if($_POST['send_val_yu'] == "gp_small_bubble")
			{
				$wpas_gp_size = 'data-size="small"';
				$wpas_gp_annotation = '';
				$wpas_gp_width = '';
				$wpas_gp_string = '{"size" : "small"}';
				
			}
			else if($_POST['send_val_yu'] == "gp_medium_bubble")
			{
				$wpas_gp_size = 'data-size="medium"';
				$wpas_gp_annotation = '';
				$wpas_gp_width = '';
				$wpas_gp_string = '{"size" : "medium"}';	
				
			}
			else if($_POST['send_val_yu'] == "gp_standard_bubble")
			{
				$wpas_gp_size = '';
				$wpas_gp_annotation = '';
				$wpas_gp_width = '';
				$wpas_gp_string = '{"size" : "standard"}';	
						
			}
			else if($_POST['send_val_yu'] == "gp_tall_bubble")
			{
				$wpas_gp_size = 'data-size="tall"';
				$wpas_gp_annotation = '';
				$wpas_gp_width = '';
				$wpas_gp_string = '{"size" : "tall"}';				
			}
			else if($_POST['send_val_yu'] == "gp_small_none")
			{
				$wpas_gp_size = 'data-size="small"';
				$wpas_gp_annotation = 'data-annotation="none"';
				$wpas_gp_width = '';
				$wpas_gp_string = '{"size" : "small", "annotation": "none"}';				
			}
			else if($_POST['send_val_yu'] == "gp_medium_none")
			{
				$wpas_gp_size = 'data-size="medium"';
				$wpas_gp_annotation = 'data-annotation="none"';
				$wpas_gp_width = '';
				$wpas_gp_string = '{"size" : "medium", "annotation": "none"}';	
			}
			else if($_POST['send_val_yu'] == "gp_standard_none")
			{
				$wpas_gp_size = '';
				$wpas_gp_annotation = 'data-annotation="none"';
				$wpas_gp_width = '';
				$wpas_gp_string = '{"size" : "standard","annotation": "none"}';	
			}
			else if($_POST['send_val_yu'] == "gp_tall_none")
			{
				$wpas_gp_size = 'data-size="tall"';
				$wpas_gp_annotation = 'data-annotation="none"';
				$wpas_gp_width = '';
				$wpas_gp_string = '{"size" : "tall", "annotation": "none"}';	
			}
			else if($_POST['send_val_yu'] == "gp_small_inline")
			{
				$wpas_gp_size = 'data-size="small"';
				$wpas_gp_annotation = 'data-annotation="inline"';
				$wpas_gp_width = 'data-width="300"';
				$wpas_gp_string = '{"size" : "small", "annotation": "inline", "width": "300"}';	
			}
			else if($_POST['send_val_yu'] == "gp_medium_inline")
			{
				$wpas_gp_size = 'data-size="medium"';
				$wpas_gp_annotation = 'data-annotation="inline"';
				$wpas_gp_width = 'data-width="300"';
				$wpas_gp_string = '{"size" : "medium", "annotation": "inline", "width": "300"}';	
			}
			else if($_POST['send_val_yu'] == "gp_standard_inline")
			{
				$wpas_gp_size = '';
				$wpas_gp_annotation = 'data-annotation="inline"';
				$wpas_gp_width = 'data-width="300"';
				$wpas_gp_string = '{"size" : "standard", "annotation": "inline", "width": "300"}';	
			}
			else if($_POST['send_val_yu'] == "gp_tall_inline")
			{
				$wpas_gp_size = 'data-size="tall"';
				$wpas_gp_annotation = 'data-annotation="inline"';
				$wpas_gp_width = 'data-width="300"';
				$wpas_gp_string = '{"size" : "tall", "annotation": "inline", "width": "300"}';	
			}
			else
			{
				$wpas_gp_size = '';
				$wpas_gp_annotation = '';
				$wpas_gp_width = '';
				$wpas_gp_string = '{"size" : "standard"}';				
			}
			$total_link = '<div id="live-preview"><div id="code"><div class="g-plusone" '.$wpas_gp_size. ' '.$wpas_gp_annotation.' '.$wpas_gp_width.' ></div></div></div><script type="text/javascript">
			gapi.plusone.render("live-preview",'.$wpas_gp_string.');
			</script>';
			
		 }
		 else
		 {
			$wpas_gp_size = '';
			$wpas_gp_annotation = '';
			$wpas_gp_width = '';
			$wpas_gp_string = '{"size" : "standard"}';				
			$total_link = '<div id="live-preview"><div id="code"><div class="g-plusone" '.$wpas_gp_size. ' '.$wpas_gp_annotation.' '.$wpas_gp_width.' ></div></div></div><script type="text/javascript">
			gapi.plusone.render("live-preview",'.$wpas_gp_string.');
			</script>';
		 }
	 }
	 
	 
	 if(strpos($send_val_yu,'tw') !== false)
	 {
		 if($_POST['send_val_yu'])
		 {
		 	if($_POST['tw_show_count_yu'] == "no")
			{
				$wpas_tw_count = ' data-count="none"';
			}
			else 
			{
				$wpas_tw_count = '';			
			}
			
			if($_POST['tw_button_via_yu'])
			{
				$wpas_tw_via = ' data-via="'.$_POST['tw_button_via_yu'].'"';	
			}
			else
			{				
				$wpas_tw_via = '';				
			}
			if($_POST['tw_button_recommend_yu'])
			{
				$wpas_tw_recommend = ' data-related="'.$_POST['tw_button_recommend_yu'].'"';	
			}
			else
			{				
				$wpas_tw_recommend = '';				
			}
			if($_POST['tw_button_hashtag_yu'])
			{
				$wpas_tw_hashtag = ' data-hashtags="'.$_POST['tw_button_hashtag_yu'].'"';	
			}
			else
			{				
				$wpas_tw_hashtag = '';				
			}
			if($_POST['tw_large_button_yu'] == "yes")
			{
				$wpas_tw_large = ' data-size="large"';	
			}
			else
			{				
				$wpas_tw_large = '';				
			}
			if($_POST['tw_opt_tailoring_yu'] == "yes")
			{
				$wpas_tw_tailoring = ' data-dnt="true"';	
			}
			else
			{				
				$wpas_tw_tailoring = '';				
			}
			
			$total_link = '<a href="https://twitter.com/share" class="twitter-share-button" '.$wpas_tw_count.$wpas_tw_via.$wpas_tw_recommend.$wpas_tw_hashtag.$wpas_tw_large.$wpas_tw_tailoring.'>Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
			
		 }
		 else
		 {
		 	$wpas_tw_count = ""; 
			$wpas_tw_via = "";
			$wpas_tw_recommend = "";
			$wpas_tw_hashtag = "";
			$wpas_tw_large = "";
			$wpas_tw_tailoring = "";
			$total_link = '<a href="https://twitter.com/share" class="twitter-share-button" '.$wpas_tw_count.$wpas_tw_via.$wpas_tw_recommend.$wpas_tw_hashtag.$wpas_tw_large.$wpas_tw_tailoring.'>Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		 }
	 }
	 
	
echo $total_link;
}

function wpas_ajax_social()
{
	$output = wpas_ajax_social_get_content();
	echo $output;
}
/**
 * Adds the WordPress Ajax Library to the frontend.
 */
function wpas_add_ajax_library() {
	
	 global $wp_ajax_social,$wp_ajax_social_default, $wpdb, $post, $single, $WP_PLUGIN_URL;
   
    if (get_option('wp_ajax_social')) {
        $wp_ajax_social_temp = get_option('wp_ajax_social');
	
	if (!array_key_exists('gp_wpas', $wp_ajax_social_temp)) {
				$wp_ajax_social_temp['gp_wpas'] = $wp_ajax_social_default['gp_wpas'];
	}
	}
 	$html = "";
 	if(isset($wp_ajax_social_temp['gp_wpas']))
	{
		$html = '<script type="text/javascript" src="https://apis.google.com/js/plusone.js">';
        $html .= '{"parsetags": "explicit"}';
   		$html .= '</script>';
	}
    $html .= '<script type="text/javascript">';
        $html .= 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '"';
    $html .= '</script>';
 
    echo $html;
 
} // end add_ajax_library
?>