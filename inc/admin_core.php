<?php

function wp_ajax_social_plugin_menu()

{

    add_options_page('Wp Ajax Social - Plugin Options Page', 'WP Ajax Social', 'administrator', 'wp-ajax-social', 'wp_ajax_social_admin_options');

}

function wp_ajax_social_action_javascript()

{

?>

<script type="text/javascript" >
jQuery(document).ready(function ($) {
    jQuery('#wp_ajax_social_options_form').submit(function () {
        aut_show = jQuery('#auto_show:checked').val();
        fb_wpa = jQuery('input[name=fb_wpas]:checked').val();
        gp_wpa = jQuery('input[name=gp_wpas]:checked').val();
		tw_wpa = jQuery('input[name=tw_wpas]:checked').val();
		even_method_wpas = jQuery('input[name=event_method_wpas]:checked').val();
        fb_wpa_button = jQuery('input[name=fb_wpas_button]:checked').val();
        gp_wpa_button = jQuery('input[name=gp_wpas_button]:checked').val();
		tw_show_coun = jQuery('input[name=tw_show_count]:checked').val();
		tw_button_vi = jQuery('#tw_button_via').attr('value');
		tw_button_recommen = jQuery('#tw_button_recommend').attr('value');
		tw_button_hashta = jQuery('#tw_button_hashtag').attr('value');
		tw_large_butto = jQuery('input[name=tw_large_button]:checked').val();
		tw_opt_tailorin = jQuery('input[name=tw_opt_tailoring]:checked').val();
        auto_wpa_button = jQuery('input[name=auto_wpas_button]:checked').val();
		wpas_fb_upload_img = jQuery('input[name=wpas_fb_upload_image]').val();
		wpas_gp_upload_img = jQuery('input[name=wpas_gp_upload_image]').val();
		wpas_tw_upload_img = jQuery('input[name=wpas_tw_upload_image]').val();
        //no_related_post_tex = jQuery('#no_related_post_text').attr('value');
        jQuery('#loading_img').show();
        var data = {
            action: 'social_save_ajax',
            auto_show: aut_show,
            fb_wpas: fb_wpa,
            gp_wpas: gp_wpa,
			tw_wpas: tw_wpa,
			event_method_wpas: even_method_wpas,
            fb_wpas_button: fb_wpa_button,
            gp_wpas_button: gp_wpa_button,
			tw_show_count: tw_show_coun,
			tw_button_via: tw_button_vi,
			tw_button_recommend: tw_button_recommen,
			tw_button_hashtag: tw_button_hashta,
			tw_large_button: tw_large_butto,
			tw_opt_tailoring: tw_opt_tailorin,
            auto_wpas_button: auto_wpa_button,
            wpas_fb_upload_image: wpas_fb_upload_img,
            wpas_gp_upload_image: wpas_gp_upload_img,
            wpas_tw_upload_image: wpas_tw_upload_img
        };
        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function (response) {
            jQuery('#loading_img').fadeOut(300, function () {
                jQuery('#wpas_div_success').fadeIn(1000, function () {
                    jQuery('#wpas_div_success').fadeOut(2000);
                });
            });
            $("#wpas_frm_fields").html(response);
            /*if(jscolor.binding) {

			jscolor.bind();

		}*/
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

function wp_ajax_action_callback()
{
    global $wpdb; // this is how you get access to the database
    global $wp_ajax_social;
	
	$wp_ajax_social = array( "auto_show" => $_POST['auto_show'],

					"fb_wpas" => $_POST['fb_wpas'],

					"gp_wpas" => $_POST['gp_wpas'],
					
					"tw_wpas" => $_POST['tw_wpas'],
					
					"event_method_wpas" => $_POST['event_method_wpas'],

					"fb_wpas_button" => $_POST['fb_wpas_button'],

					"gp_wpas_button" => $_POST['gp_wpas_button'],
					
					"tw_show_count" => $_POST['tw_show_count'],
					
					"tw_button_via" => $_POST['tw_button_via'],
					
					"tw_button_recommend" => $_POST['tw_button_recommend'],
					
					"tw_button_hashtag" => $_POST['tw_button_hashtag'],
					
					"tw_large_button" => $_POST['tw_large_button'],
					
					"tw_opt_tailoring" => $_POST['tw_opt_tailoring'],

					"auto_wpas_button" => $_POST['auto_wpas_button'],

					"wpas_fb_upload_image" => $_POST['wpas_fb_upload_image'],

					"wpas_gp_upload_image" => $_POST['wpas_gp_upload_image'],

					"wpas_tw_upload_image" => $_POST['wpas_tw_upload_image']);

	
	
	
	$auto_show   = ($_POST['auto_show'] == "") ? 2 : $_POST['auto_show'];
	
    $fb_wpas   = ($_POST['fb_wpas'] == "") ? 2 : $_POST['fb_wpas'];
    $gp_wpas      = ($_POST['gp_wpas'] == "") ? 2 : $_POST['gp_wpas'];
	$tw_wpas      = ($_POST['tw_wpas'] == "") ? 2 : $_POST['tw_wpas'];
	$event_method_wpas      = ($_POST['event_method_wpas'] == "") ? "click" : $_POST['event_method_wpas'];
	$fb_wpas_button      = ($_POST['fb_wpas_button'] == "") ? "" : $_POST['fb_wpas_button'];
	$gp_wpas_button      = ($_POST['gp_wpas_button'] == "") ? "" : $_POST['gp_wpas_button'];
	
	$tw_show_count      = ($_POST['tw_show_count'] == "") ? "" : $_POST['tw_show_count'];
	$tw_button_via      = ($_POST['tw_button_via'] == "") ? "" : $_POST['tw_button_via'];
	$tw_button_recommend      = ($_POST['tw_button_recommend'] == "") ? "" : $_POST['tw_button_recommend'];
	$tw_button_hashtag      = ($_POST['tw_button_hashtag'] == "") ? "" : $_POST['tw_button_hashtag'];
	$tw_large_button      = ($_POST['tw_large_button'] == "") ? "" : $_POST['tw_large_button'];
	$tw_opt_tailoring      = ($_POST['tw_opt_tailoring'] == "") ? "" : $_POST['tw_opt_tailoring'];
	
	$auto_wpas_button      = ($_POST['auto_wpas_button'] == "") ? "" : $_POST['auto_wpas_button'];
	$wpas_fb_upload_image      = ($_POST['wpas_fb_upload_image'] == "") ? WP_PLUGIN_URL."/wp-ajax-social/images/facebook.png" : $_POST['wpas_fb_upload_image'];
	$wpas_gp_upload_image      = ($_POST['wpas_gp_upload_image'] == "") ? WP_PLUGIN_URL."/wp-ajax-social/images/google_plus.png" : $_POST['wpas_gp_upload_image'];
	$wpas_tw_upload_image      = ($_POST['wpas_tw_upload_image'] == "") ? WP_PLUGIN_URL."/wp-ajax-social/images/twitter.png" : $_POST['wpas_tw_upload_image'];
	
    $wp_ajax_social          = array(
		"auto_show" => $auto_show,
		"fb_wpas" => $fb_wpas,
		"gp_wpas" => $gp_wpas,
		"tw_wpas" => $tw_wpas,
		"event_method_wpas" => $event_method_wpas,
        "fb_wpas_button" => $fb_wpas_button,
        "gp_wpas_button" => $gp_wpas_button,
		"tw_show_count" => $tw_show_count,
		"tw_button_via" => $tw_button_via,
		"tw_button_recommend" => $tw_button_recommend,
		"tw_button_hashtag" => $tw_button_hashtag,
		"tw_large_button" => $tw_large_button,
		"tw_opt_tailoring" => $tw_opt_tailoring,
        "auto_wpas_button" => $auto_wpas_button,
        "wpas_fb_upload_image" => $wpas_fb_upload_image,
        "wpas_gp_upload_image" => $wpas_gp_upload_image,
        "wpas_tw_upload_image" => $wpas_tw_upload_image);
	
    update_option('wp_ajax_social', $wp_ajax_social);
    $wp_ajax_social    = get_option('wp_ajax_social');
	//print_r($wp_ajax_social);
	
    $result       = $result . '<style>
	#options_fb_wpas{
		-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px; /* future proofing */
-khtml-border-radius: 10px; /* for old Konqueror browsers */
	}
	
	#options_gp_wpas{
		-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px; /* future proofing */
-khtml-border-radius: 10px; /* for old Konqueror browsers */
	}
	#options_tw_wpas{
		-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px; /* future proofing */
-khtml-border-radius: 10px; /* for old Konqueror browsers */
	}
	#options_auto_show{
		-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px; /* future proofing */
-khtml-border-radius: 10px; /* for old Konqueror browsers */
	}
	</style>
	
	
	<div class="updated fade below-h2" id="message"><p>Options updated.</p></div>

		<table class="form-table">

			<tbody>';

			$auto_chckd = ($wp_ajax_social['auto_show'] == "1") ? "checked=checked" : "";

				 $result       = $result .  '
				
				<tr valign="top">

				<th scope="row"><label for="blogname">Automatically Show WP Ajax Social icons? :<strong>(Tick If Yes)</strong></label></th>

					<td style="vertical-align:middle;"><input type="checkbox" id="auto_show" name="auto_show" value="1" ' . $auto_chckd . '/>&nbsp;&nbsp;<strong>(Do not tick if you want to place related posts Manually.)</strong><div id="options_auto_show" style="    background-color: #EAEAEA;
    padding: 11px;'; if($wp_ajax_social['auto_show'] != "1")  $result       = $result .  'display:none;';  $result       = $result .  '">
					<div style="padding-top: 4px; padding-right: 87px;"><input type="radio" value="After" name="auto_wpas_button" ';  $chckd_auto_wpas_button = ($wp_ajax_social['auto_wpas_button'] == "After") ? "checked=checked" : ""; $result       = $result .  $chckd_auto_wpas_button.'>&nbsp;After Posts &nbsp; <input type="radio" value="Before" name="auto_wpas_button" ';  $chckd_auto_wpas_button = ($wp_ajax_social['auto_wpas_button'] == "Before") ? "checked=checked" : ""; $result       = $result.$chckd_auto_wpas_button.'>&nbsp;Before Posts &nbsp;</div> </div> </td>

					

				</tr>

				<tr valign="top">

				<th scope="row"><label for="blogname">Manually Placing of Related Posts :</label></th>

					<td><code>&lt;?php if(function_exists(&#39;wpas_ajax_social&#39;)) wpas_ajax_social(); ?&gt;</code></td>

				</tr>
				<tr valign="top">

				<th scope="row"><label for="blogname">Event method to Replace icons with social widgets :</label></th>

					<td><input type="radio" value="click" name="event_method_wpas" ';  $chckd_event_method_wpas = ($wp_ajax_social['event_method_wpas'] == "click") ? "checked=checked" : ""; $result       = $result .$chckd_event_method_wpas.'>&nbsp;On Click &nbsp;<input type="radio" value="mouseover" name="event_method_wpas" ';  $chckd_event_method_wpas = ($wp_ajax_social['event_method_wpas'] == "mouseover") ? "checked=checked" : ""; $result       = $result .$chckd_event_method_wpas.'>&nbsp;On Hover	</td>

				</tr>
				';

    //echo $text; 
 $chckd = ($wp_ajax_social['fb_wpas'] == "1") ? "checked=checked" : "";
 
 
 
    $result       = $result . '<tr valign="top">

				<th scope="row"><label for="blogname">Facebook : </label></th>

					<td><input type="checkbox" id="fb_wpas" name="fb_wpas" value="1" ' . $chckd . '/><div id="options_fb_wpas" style="    background-color: #EAEAEA;
    padding: 11px;'; if($wp_ajax_social['fb_wpas'] != "1")  $result       = $result .'display:none;';  $result       = $result . '">
					<div><div style="float: left; padding-top: 4px; padding-right: 87px;"><input type="radio" value="fb_like_standard" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_like_standard") ? "checked=checked" : ""; $result       = $result . $chckd_fb_wpas_button.'>&nbsp;Facebook Like Standard &nbsp; </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_like_standard.png" /></div></div><hr>
					
								
					
					<div><div style="float: left; padding-top: 1px; padding-right: 66px;"><input type="radio" value="fb_like_button_count" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_like_button_count") ? "checked=checked" : ""; $result       = $result . $chckd_fb_wpas_button.'>&nbsp;Facebook Like Button Count &nbsp;		</div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_like_button_count.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 87px;"><input type="radio" value="fb_like_box_count" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_like_box_count") ? "checked=checked" : ""; $result       = $result .$chckd_fb_wpas_button.'>&nbsp;Facebook Like Box Count  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_like_box_count.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 4px; width: 229px;"><input type="radio" value="fb_recommend_standard" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_recommend_standard") ? "checked=checked" : ""; $result       = $result .$chckd_fb_wpas_button.'>&nbsp;Facebook Recommend Standard &nbsp; </div><div style="padding-bottom: 12px;">&nbsp;	&nbsp;	<img  src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_recommend_standard.png" /></div></div><hr>
					
								
					
					<div><div style="float: left; padding-top: 1px; padding-right: 16px;"><input type="radio" value="fb_recommend_button_count" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_recommend_button_count") ? "checked=checked" : ""; $result       = $result .$chckd_fb_wpas_button.'>&nbsp;Facebook Recommend Button Count &nbsp;		</div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_recommend_button_count.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 37px;"><input type="radio" value="fb_recommend_box_count" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_recommend_box_count") ? "checked=checked" : ""; $result       = $result .$chckd_fb_wpas_button.'>&nbsp;Facebook Recommend Box Count  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_recommend_box_count.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 37px;">Upload Image For Facebook  (Enter an URL or upload an icon for Facebook.) : </div><div>&nbsp;	&nbsp;	<label for="upload_image">
<div style="float:left;"><input id="fb_upload_image" type="text" size="36" name="wpas_fb_upload_image" value="'.$wp_ajax_social['wpas_fb_upload_image'].'" />
<input id="fb_upload_image_button" type="button" value="Upload Image" /></div><div style="padding-left:10px;" id="wpas_preview_fb"><img src="'.$wp_ajax_social['wpas_fb_upload_image'].'" /></div>
<br />
</label></div></div><hr>

					</div></td>

				</tr>';

    $chckdt = ($wp_ajax_social['gp_wpas'] == "1") ? "checked=checked" : "";

   

    $result       = $result . '<tr valign="top">

				<th scope="row"><label for="blogname">Google Plus : </label></th>

					<td><input type="checkbox" id="gp_wpas" name="gp_wpas" value="1" ' . $chckdt . '/><div id="options_gp_wpas" style="    background-color: #EAEAEA;
    padding: 11px;'; if($wp_ajax_social['gp_wpas'] != "1")  $result       = $result .'display:none;';  $result       = $result . '">
					<div><div style="float: left; padding-top: 4px; padding-right: 20px;"><input type="radio" value="gp_small_bubble" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_small_bubble") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Small Bubble&nbsp; </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_small_bubble.png" /></div></div><hr>
					
								
					
					<div><div style="float: left; padding-top: 1px; padding-right: 4px;"><input type="radio" value="gp_medium_bubble" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_medium_bubble") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Medium Bubble &nbsp;		</div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_medium_bubble.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 3px;"><input type="radio" value="gp_standard_bubble" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_standard_bubble") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Standard Bubble  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_standard_bubble.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 4px; width: 156px; padding-right: 25px;"><input type="radio" value="gp_tall_bubble" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_tall_bubble") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Tall Bubble &nbsp; </div><div style="padding-bottom: 12px;">&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_tall_bubble.png" /></div></div><hr>
					
								
					
					<div><div style="float: left; padding-top: 1px; padding-right: 23px;"><input type="radio" value="gp_small_none" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_small_none") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Small None &nbsp;		</div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_small_none.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 16px;"><input type="radio" value="gp_medium_none" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_medium_none") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Medium None </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_medium_none.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 9px;"><input type="radio" value="gp_standard_none" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_standard_none") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Standard None  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_standard_none.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 39px;"><input type="radio" value="gp_tall_none" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_tall_none") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Tall None  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_tall_none.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 20px;"><input type="radio" value="gp_small_inline" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_small_inline") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Small Inline &nbsp;		</div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_small_inline.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 14px;"><input type="radio" value="gp_medium_inline" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_medium_inline") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Medium Inline  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_medium_inline.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 8px;"><input type="radio" value="gp_standard_inline" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_standard_inline") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Standard Inline  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_standard_inline.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 39px;"><input type="radio" value="gp_tall_inline" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_tall_inline") ? "checked=checked" : ""; $result       = $result .$chckd_gp_wpas_button.'>&nbsp;Google Plus Tall Inline </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_tall_inline.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 37px;">Upload Image For Google Plus (Enter an URL or upload an icon for Google Plus.) : </div><div>&nbsp;	&nbsp;	<label for="upload_image">
<div style="float:left;"><input id="gp_upload_image" type="text" size="36" name="wpas_gp_upload_image" value="'.$wp_ajax_social['wpas_gp_upload_image'].'" />
<input id="gp_upload_image_button" type="button" value="Upload Image" /></div><div id="wpas_preview_gp"><img style="margin-left:10px;" src="'.$wp_ajax_social['wpas_gp_upload_image'].'" /></div>
<br />
</label></div></div><hr>
					</div></td>

				</tr>';

				

$chckd_tw = ($wp_ajax_social['tw_wpas'] == "1") ? "checked=checked" : "";

				 $result       = $result .  '<tr valign="top">

				<th scope="row"><label for="blogname">Twitter : </label></th>

					<td><input type="checkbox" id="tw_wpas" name="tw_wpas" value="1" ' . $chckd_tw . '/><div id="options_tw_wpas" style="    background-color: #EAEAEA;
    padding: 11px;'; if($wp_ajax_social['tw_wpas'] != "1")  $result       = $result .  'display:none;';  $result       = $result .  '">
					<div><div style="float: left; padding-top: 4px; padding-right: 87px;">Show count : &nbsp;&nbsp;&nbsp;
					<input type="radio" value="yes" name="tw_show_count" ';  $chckd_tw_show_count = ($wp_ajax_social['tw_show_count'] == "yes") ? "checked=checked" : ""; 
					$result       = $result . $chckd_tw_show_count.'>&nbsp;Yes&nbsp;<input type="radio" value="no" name="tw_show_count" ';  $chckd_tw_show_count = ($wp_ajax_social['tw_show_count'] == "no") ? "checked=checked" : ""; 
					$result       = $result . $chckd_tw_show_count.'>&nbsp;No 
					&nbsp; </div><div>&nbsp;	&nbsp;	</div></div><br /><hr>
					
								
					
					<div><div style="float: left; padding-top: 1px; padding-right: 66px;">Tweet Via : @<input type="text" class="code" value="' . $wp_ajax_social['tw_button_via'] . '" id="tw_button_via" name="tw_button_via" size="25"/></div><div>&nbsp;	&nbsp;	</div></div><br><hr>
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 66px;">Tweet Recommend : @<input type="text" class="code" value="' . $wp_ajax_social['tw_button_recommend'] . '" id="tw_button_recommend" name="tw_button_recommend" size="25"/></div><div>&nbsp;	&nbsp;	</div></div><br><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 66px;">Tweet Hashtag : #<input type="text" class="code" value="' . $wp_ajax_social['tw_button_hashtag'] . '" id="tw_button_hashtag" name="tw_button_hashtag" size="25"/></div><div>&nbsp;	&nbsp;	</div></div><br><hr>
					
					<div><div style="float: left; padding-top: 4px; padding-right: 87px;">Large Button : &nbsp;&nbsp;&nbsp;
					<input type="radio" value="yes" name="tw_large_button" ';  $chckd_tw_large_button = ($wp_ajax_social['tw_large_button'] == "yes") ? "checked=checked" : ""; 
					$result       = $result . $chckd_tw_large_button.'>&nbsp;Yes&nbsp;<input type="radio" value="no" name="tw_large_button" ';  $chckd_tw_large_button = ($wp_ajax_social['tw_large_button'] == "no") ? "checked=checked" : ""; 
					$result       = $result . $chckd_tw_large_button.'>&nbsp;No 
					&nbsp; </div><div>&nbsp;	&nbsp;	</div></div><br /><hr>
					
					<div><div style="float: left; padding-top: 4px; padding-right: 87px;">Opt-out of tailoring Twitter [<a href="https://support.twitter.com/articles/20169421">?</a>] : &nbsp;&nbsp;&nbsp;
					<input type="radio" value="yes" name="tw_opt_tailoring" ';  $chckd_tw_opt_tailoring = ($wp_ajax_social['tw_opt_tailoring'] == "yes") ? "checked=checked" : ""; 
					$result       = $result . $chckd_tw_opt_tailoring.'>&nbsp;Yes&nbsp;<input type="radio" value="no" name="tw_opt_tailoring" ';  $chckd_tw_opt_tailoring = ($wp_ajax_social['tw_opt_tailoring'] == "no") ? "checked=checked" : ""; 
					$result       = $result . $chckd_tw_opt_tailoring.'>&nbsp;No 
					&nbsp; </div><div>&nbsp;	&nbsp;	</div></div><br /><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 37px;">Upload Image For Twitter (Enter an URL or upload an icon for Twitter.) : </div><div>&nbsp;	&nbsp;	<label for="upload_image">
<div style="float:left;"><input id="tw_upload_image" type="text" size="36" name="wpas_tw_upload_image" value="'.$wp_ajax_social['wpas_tw_upload_image'].'" />
<input id="tw_upload_image_button" type="button" value="Upload Image" /></div><div style="padding-left:10px;" id="wpas_preview_tw"><img src="'.$wp_ajax_social['wpas_tw_upload_image'].'" /></div>
<br />
</label></div></div><hr>
					
					</div></td>

				</tr>


				<tr valign="top">

				<th scope="row" colspan="2"></td>

				</tr>

			</tbody>

		</table>';
    echo $result;
	die();
}

function wp_ajax_social_admin_options()

{

    global $wp_ajax_social,$wp_ajax_social_default, $plgin_dir;

    if ($_POST['wp_ajax_social_submit']) {

	

        $wp_ajax_social = array( "auto_show" => $_POST['auto_show'],

					"fb_wpas" => $_POST['fb_wpas'],

					"gp_wpas" => $_POST['gp_wpas'],
					
					"tw_wpas" => $_POST['tw_wpas'],
					
					"event_method_wpas" => $_POST['event_method_wpas'],

					"fb_wpas_button" => $_POST['fb_wpas_button'],

					"gp_wpas_button" => $_POST['gp_wpas_button'],
					
					"tw_show_count" => $_POST['tw_show_count'],
					
					"tw_button_via" => $_POST['tw_button_via'],
					
					"tw_button_recommend" => $_POST['tw_button_recommend'],
					
					"tw_button_hashtag" => $_POST['tw_button_hashtag'],
					
					"tw_large_button" => $_POST['tw_large_button'],
					
					"tw_opt_tailoring" => $_POST['tw_opt_tailoring'],

					"auto_wpas_button" => $_POST['auto_wpas_button'],

					"wpas_fb_upload_image" => $_POST['wpas_fb_upload_image'],

					"wpas_gp_upload_image" => $_POST['wpas_gp_upload_image'],

					"wpas_tw_upload_image" => $_POST['wpas_tw_upload_image']);

        update_option('wp_ajax_social', $wp_ajax_social);

        $message_succ = '<div id="message" class="updated fade"><p>Option Saved!</p></div>';

    } else {

        $message_succ       = "";

        $wp_ajax_social_new      = get_option('wp_ajax_social');

		if($wp_ajax_social_new)

		{

		if (!array_key_exists('auto_show', $wp_ajax_social_new)) {

			$wp_ajax_social_new['auto_show'] = $wp_ajax_social_default['auto_show'];

		

		}

		if (!array_key_exists('fb_wpas', $wp_ajax_social_new)) {

			$wp_ajax_social_new['fb_wpas'] = $wp_ajax_social_default['fb_wpas'];

		

		}
		if (!array_key_exists('tw_wpas', $wp_ajax_social_new)) {

			$wp_ajax_social_new['tw_wpas'] = $wp_ajax_social_default['tw_wpas'];

		

		}
		if (!array_key_exists('gp_wpas', $wp_ajax_social_new)) {

			$wp_ajax_social_new['gp_wpas'] = $wp_ajax_social_default['gp_wpas'];

		

		}
		if (!array_key_exists('event_method_wpas', $wp_ajax_social_new)) {

			$wp_ajax_social_new['event_method_wpas'] = $wp_ajax_social_default['event_method_wpas'];

		

		}
		if (!array_key_exists('fb_wpas_button', $wp_ajax_social_new)) {

			$wp_ajax_social_new['fb_wpas_button'] = $wp_ajax_social_default['fb_wpas_button'];

		

		}
		
		if (!array_key_exists('gp_wpas_button', $wp_ajax_social_new)) {

			$wp_ajax_social_new['gp_wpas_button'] = $wp_ajax_social_default['gp_wpas_button'];

		

		}
		if (!array_key_exists('tw_show_count', $wp_ajax_social_new)) {

			$wp_ajax_social_new['tw_show_count'] = $wp_ajax_social_default['tw_show_count'];

		

		}
		if (!array_key_exists('tw_button_via', $wp_ajax_social_new)) {

			$wp_ajax_social_new['tw_button_via'] = $wp_ajax_social_default['tw_button_via'];

		

		}
		if (!array_key_exists('tw_button_recommend', $wp_ajax_social_new)) {

			$wp_ajax_social_new['tw_button_recommend'] = $wp_ajax_social_default['tw_button_recommend'];

		

		}
		if (!array_key_exists('tw_button_hashtag', $wp_ajax_social_new)) {

			$wp_ajax_social_new['tw_button_hashtag'] = $wp_ajax_social_default['tw_button_hashtag'];

		

		}
		if (!array_key_exists('tw_large_button', $wp_ajax_social_new)) {

			$wp_ajax_social_new['tw_large_button'] = $wp_ajax_social_default['tw_large_button'];

		

		}
		if (!array_key_exists('tw_opt_tailoring', $wp_ajax_social_new)) {

			$wp_ajax_social_new['tw_opt_tailoring'] = $wp_ajax_social_default['tw_opt_tailoring'];

		

		}
		if (!array_key_exists('auto_wpas_button', $wp_ajax_social_new)) {

			$wp_ajax_social_new['auto_wpas_button'] = $wp_ajax_social_default['auto_wpas_button'];

		

		}
		
		if (!array_key_exists('wpas_fb_upload_image', $wp_ajax_social_new)) {

			$wp_ajax_social_new['wpas_fb_upload_image'] = $wp_ajax_social_default['wpas_fb_upload_image'];

		

		}
		if (!array_key_exists('wpas_gp_upload_image', $wp_ajax_social_new)) {

			$wp_ajax_social_new['wpas_gp_upload_image'] = $wp_ajax_social_default['wpas_gp_upload_image'];

		

		}
		if (!array_key_exists('wpas_tw_upload_image', $wp_ajax_social_new)) {

			$wp_ajax_social_new['wpas_tw_upload_image'] = $wp_ajax_social_default['wpas_tw_upload_image'];

		

		}

		}

		

		$fb_wpas   = ($wp_ajax_social_new['fb_wpas'] == "") ? $wp_ajax_social['fb_wpas'] : $wp_ajax_social_new['fb_wpas'];

		$auto_show   = ($wp_ajax_social_new['auto_show'] == "") ? $wp_ajax_social['auto_show'] : $wp_ajax_social_new['auto_show'];

        $gp_wpas   = ($wp_ajax_social_new['gp_wpas'] == "") ? $wp_ajax_social['gp_wpas'] : $wp_ajax_social_new['gp_wpas'];
		
		$tw_wpas   = ($wp_ajax_social_new['tw_wpas'] == "") ? $wp_ajax_social['tw_wpas'] : $wp_ajax_social_new['tw_wpas'];
		
		$event_method_wpas   = ($wp_ajax_social_new['event_method_wpas'] == "") ? $wp_ajax_social['event_method_wpas'] : $wp_ajax_social_new['event_method_wpas'];
		
		$fb_wpas_button   = ($wp_ajax_social_new['fb_wpas_button'] == "") ? $wp_ajax_social['fb_wpas_button'] : $wp_ajax_social_new['fb_wpas_button'];
		
		$gp_wpas_button   = ($wp_ajax_social_new['gp_wpas_button'] == "") ? $wp_ajax_social['gp_wpas_button'] : $wp_ajax_social_new['gp_wpas_button'];
		
		$tw_show_count   = ($wp_ajax_social_new['tw_show_count'] == "") ? $wp_ajax_social['tw_show_count'] : $wp_ajax_social_new['tw_show_count'];
		
		$tw_button_via   = ($wp_ajax_social_new['tw_button_via'] == "") ? $wp_ajax_social['tw_button_via'] : $wp_ajax_social_new['tw_button_via'];
		
		$tw_button_recommend   = ($wp_ajax_social_new['tw_button_recommend'] == "") ? $wp_ajax_social['tw_button_recommend'] : $wp_ajax_social_new['tw_button_recommend'];
		
		$tw_button_hashtag   = ($wp_ajax_social_new['tw_button_hashtag'] == "") ? $wp_ajax_social['tw_button_hashtag'] : $wp_ajax_social_new['tw_button_hashtag'];
		
		$tw_large_button   = ($wp_ajax_social_new['tw_large_button'] == "") ? $wp_ajax_social['tw_large_button'] : $wp_ajax_social_new['tw_large_button'];
		
		$tw_opt_tailoring   = ($wp_ajax_social_new['tw_opt_tailoring'] == "") ? $wp_ajax_social['tw_opt_tailoring'] : $wp_ajax_social_new['tw_opt_tailoring'];
		
		$auto_wpas_button   = ($wp_ajax_social_new['auto_wpas_button'] == "") ? $wp_ajax_social['auto_wpas_button'] : $wp_ajax_social_new['auto_wpas_button'];

		$wpas_fb_upload_image   = ($wp_ajax_social_new['wpas_fb_upload_image'] == "") ? $wp_ajax_social['wpas_fb_upload_image'] : $wp_ajax_social_new['wpas_fb_upload_image'];
		
		$wpas_gp_upload_image   = ($wp_ajax_social_new['wpas_gp_upload_image'] == "") ? $wp_ajax_social['wpas_gp_upload_image'] : $wp_ajax_social_new['wpas_gp_upload_image'];
      
		$wpas_tw_upload_image   = ($wp_ajax_social_new['wpas_tw_upload_image'] == "") ? $wp_ajax_social['wpas_tw_upload_image'] : $wp_ajax_social_new['wpas_tw_upload_image'];
		

        $wp_ajax_social          = array( "auto_show" => $auto_show,

					"fb_wpas" => $fb_wpas,

					"gp_wpas" => $gp_wpas,
					
					"tw_wpas" => $tw_wpas,
					
					"event_method_wpas" => $event_method_wpas,

					"fb_wpas_button" => $fb_wpas_button,

					"gp_wpas_button" => $gp_wpas_button,
					
					"tw_show_count" => $tw_show_count,
					
					"tw_button_via" => $tw_button_via,
					
					"tw_button_recommend" => $tw_button_recommend,
					
					"tw_button_hashtag" => $tw_button_hashtag,
					
					"tw_large_button" => $tw_large_button,
					
					"tw_opt_tailoring" => $tw_opt_tailoring,

					"auto_wpas_button" => $auto_wpas_button,

					"wpas_fb_upload_image" => $wpas_fb_upload_image,

					"wpas_gp_upload_image" => $wpas_gp_upload_image,

					"wpas_tw_upload_image" => $wpas_tw_upload_image);

    }

	

    echo $message_succ . '<style>
	#options_fb_wpas{
		-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px; /* future proofing */
-khtml-border-radius: 10px; /* for old Konqueror browsers */
	}
	
	#options_gp_wpas{
		-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px; /* future proofing */
-khtml-border-radius: 10px; /* for old Konqueror browsers */
	}
	#options_tw_wpas{
		-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px; /* future proofing */
-khtml-border-radius: 10px; /* for old Konqueror browsers */
	}
	#options_auto_show{
		-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px; /* future proofing */
-khtml-border-radius: 10px; /* for old Konqueror browsers */
	}
	</style><div class="wrap"><div id="icon-options-general" class="icon32"><br/></div>

	<div style="width: 70%; float: left;">

 	<form id="wp_ajax_social_options_form" name="wp_ajax_social_options_form" method="post" action="">

	

		<h2>Wordpress Ajax Social</h2> 

		<div id="wpas_frm_fields">

		<table class="form-table">

			<tbody>';

			$auto_chckd = ($wp_ajax_social['auto_show'] == "1") ? "checked=checked" : "";

				 echo $message_succ . '<tr valign="top">

				<th scope="row"><label for="blogname">Automatically Show WP Ajax Social icons? :<strong>(Tick If Yes)</strong></label></th>

					<td style="vertical-align:middle;"><input type="checkbox" id="auto_show" name="auto_show" value="1" ' . $auto_chckd . '/>&nbsp;&nbsp;<strong>(Do not tick if you want to place related posts Manually.)</strong><div id="options_auto_show" style="    background-color: #EAEAEA;
    padding: 11px;'; if($wp_ajax_social['auto_show'] != "1")  echo 'display:none;';  echo $message_succ . '">
					<div style="padding-top: 4px; padding-right: 87px;"><input type="radio" value="After" name="auto_wpas_button" ';  $chckd_auto_wpas_button = ($wp_ajax_social['auto_wpas_button'] == "After") ? "checked=checked" : ""; echo $message_succ .$chckd_auto_wpas_button.'>&nbsp;After Posts &nbsp; <input type="radio" value="Before" name="auto_wpas_button" ';  $chckd_auto_wpas_button = ($wp_ajax_social['auto_wpas_button'] == "Before") ? "checked=checked" : ""; echo $message_succ .$chckd_auto_wpas_button.'>&nbsp;Before Posts &nbsp;</div> </div> </td>

					

				</tr>

				<tr valign="top">

				<th scope="row"><label for="blogname">Manually Placing of Related Posts :</label></th>

					<td><code>&lt;?php if(function_exists(&#39;wpas_ajax_social&#39;)) wpas_ajax_social(); ?&gt;</code></td>

				</tr>
				
				<tr valign="top">

				<th scope="row"><label for="blogname">Event method to Replace icons with social widgets :</label></th>

					<td><input type="radio" value="click" name="event_method_wpas" ';  $chckd_event_method_wpas = ($wp_ajax_social['event_method_wpas'] == "click") ? "checked=checked" : ""; echo $message_succ .$chckd_event_method_wpas.'>&nbsp;On Click &nbsp;<input type="radio" value="mouseover" name="event_method_wpas" ';  $chckd_event_method_wpas = ($wp_ajax_social['event_method_wpas'] == "mouseover") ? "checked=checked" : ""; echo $message_succ .$chckd_event_method_wpas.'>&nbsp;On Hover	</td>

				</tr>

				';

    //echo $text; 
 $chckd = ($wp_ajax_social['fb_wpas'] == "1") ? "checked=checked" : "";
 
 
 
    echo $message_succ . '<tr valign="top">

				<th scope="row"><label for="blogname">Facebook : </label></th>

					<td><input type="checkbox" id="fb_wpas" name="fb_wpas" value="1" ' . $chckd . '/><div id="options_fb_wpas" style="    background-color: #EAEAEA;
    padding: 11px;'; if($wp_ajax_social['fb_wpas'] != "1")  echo 'display:none;';  echo $message_succ . '">
					<div><div style="float: left; padding-top: 4px; padding-right: 87px;"><input type="radio" value="fb_like_standard" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_like_standard") ? "checked=checked" : ""; echo $message_succ .$chckd_fb_wpas_button.'>&nbsp;Facebook Like Standard &nbsp; </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_like_standard.png" /></div></div><hr>
					
								
					
					<div><div style="float: left; padding-top: 1px; padding-right: 66px;"><input type="radio" value="fb_like_button_count" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_like_button_count") ? "checked=checked" : ""; echo $message_succ .$chckd_fb_wpas_button.'>&nbsp;Facebook Like Button Count &nbsp;		</div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_like_button_count.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 87px;"><input type="radio" value="fb_like_box_count" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_like_box_count") ? "checked=checked" : ""; echo $message_succ .$chckd_fb_wpas_button.'>&nbsp;Facebook Like Box Count  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_like_box_count.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 4px; width: 229px;"><input type="radio" value="fb_recommend_standard" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_recommend_standard") ? "checked=checked" : ""; echo $message_succ .$chckd_fb_wpas_button.'>&nbsp;Facebook Recommend Standard &nbsp; </div><div style="padding-bottom: 12px;">&nbsp;	&nbsp;	<img  src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_recommend_standard.png" /></div></div><hr>
					
								
					
					<div><div style="float: left; padding-top: 1px; padding-right: 16px;"><input type="radio" value="fb_recommend_button_count" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_recommend_button_count") ? "checked=checked" : ""; echo $message_succ .$chckd_fb_wpas_button.'>&nbsp;Facebook Recommend Button Count &nbsp;		</div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_recommend_button_count.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 37px;"><input type="radio" value="fb_recommend_box_count" name="fb_wpas_button" ';  $chckd_fb_wpas_button = ($wp_ajax_social['fb_wpas_button'] == "fb_recommend_box_count") ? "checked=checked" : ""; echo $message_succ .$chckd_fb_wpas_button.'>&nbsp;Facebook Recommend Box Count  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/fb_recommend_box_count.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 37px;">Upload Image For Facebook (Enter an URL or upload an icon for Facebook.) : </div><div>&nbsp;	&nbsp;	<label for="upload_image">
<div style="float:left;"><input id="fb_upload_image" type="text" size="36" name="wpas_fb_upload_image" value="'.$wp_ajax_social['wpas_fb_upload_image'].'" />
<input id="fb_upload_image_button" type="button" value="Upload Image" /></div><div style="padding-left:10px;" id="wpas_preview_fb"><img src="'.$wp_ajax_social['wpas_fb_upload_image'].'" /></div>
<br />
</label></div></div><hr>
					
					</div></td>

				</tr>';

    $chckdt = ($wp_ajax_social['gp_wpas'] == "1") ? "checked=checked" : "";

   

    echo $message_succ . '<tr valign="top">

				<th scope="row"><label for="blogname">Google Plus : </label></th>

					<td><input type="checkbox" id="gp_wpas" name="gp_wpas" value="1" ' . $chckdt . '/><div id="options_gp_wpas" style="    background-color: #EAEAEA;
    padding: 11px;'; if($wp_ajax_social['gp_wpas'] != "1")  echo 'display:none;';  echo $message_succ . '">
					<div><div style="float: left; padding-top: 4px; padding-right: 20px;"><input type="radio" value="gp_small_bubble" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_small_bubble") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Small Bubble&nbsp; </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_small_bubble.png" /></div></div><hr>
					
								
					
					<div><div style="float: left; padding-top: 1px; padding-right: 4px;"><input type="radio" value="gp_medium_bubble" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_medium_bubble") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Medium Bubble &nbsp;		</div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_medium_bubble.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 3px;"><input type="radio" value="gp_standard_bubble" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_standard_bubble") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Standard Bubble  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_standard_bubble.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 4px; width: 156px; padding-right: 25px;"><input type="radio" value="gp_tall_bubble" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_tall_bubble") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Tall Bubble &nbsp; </div><div style="padding-bottom: 12px;">&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_tall_bubble.png" /></div></div><hr>
					
								
					
					<div><div style="float: left; padding-top: 1px; padding-right: 23px;"><input type="radio" value="gp_small_none" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_small_none") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Small None &nbsp;		</div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_small_none.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 16px;"><input type="radio" value="gp_medium_none" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_medium_none") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Medium None </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_medium_none.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 9px;"><input type="radio" value="gp_standard_none" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_standard_none") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Standard None  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_standard_none.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 39px;"><input type="radio" value="gp_tall_none" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_tall_none") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Tall None  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_tall_none.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 20px;"><input type="radio" value="gp_small_inline" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_small_inline") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Small Inline &nbsp;		</div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_small_inline.png" /></div></div><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 14px;"><input type="radio" value="gp_medium_inline" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_medium_inline") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Medium Inline  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_medium_inline.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 8px;"><input type="radio" value="gp_standard_inline" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_standard_inline") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Standard Inline  </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_standard_inline.png" /></div></div><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 39px;"><input type="radio" value="gp_tall_inline" name="gp_wpas_button" ';  $chckd_gp_wpas_button = ($wp_ajax_social['gp_wpas_button'] == "gp_tall_inline") ? "checked=checked" : ""; echo $message_succ .$chckd_gp_wpas_button.'>&nbsp;Google Plus Tall Inline </div><div>&nbsp;	&nbsp;	<img src="'.WP_PLUGIN_URL.'/wp-ajax-social/images/gp_tall_inline.png" /></div></div><hr>
					<div><div style="float: left; padding-top: 1px; padding-right: 37px;">Upload Image For Google Plus (Enter an URL or upload an icon for Google Plus.) : </div><div>&nbsp;	&nbsp;	<label for="upload_image">
<div style="float:left;"><input id="gp_upload_image" type="text" size="36" name="wpas_gp_upload_image" value="'.$wp_ajax_social['wpas_gp_upload_image'].'" />
<input id="gp_upload_image_button" type="button" value="Upload Image" /></div><div id="wpas_preview_gp"><img style="margin-left:10px;" src="'.$wp_ajax_social['wpas_gp_upload_image'].'" /></div>
<br />
</label></div></div><hr>
					
					</div>
					
					</div></td>

				</tr>';
$chckd_tw = ($wp_ajax_social['tw_wpas'] == "1") ? "checked=checked" : "";

				 echo $message_succ . '<tr valign="top">

				<th scope="row"><label for="blogname">Twitter : </label></th>

					<td><input type="checkbox" id="tw_wpas" name="tw_wpas" value="1" ' . $chckd_tw . '/><div id="options_tw_wpas" style="    background-color: #EAEAEA;
    padding: 11px;'; if($wp_ajax_social['tw_wpas'] != "1")  echo 'display:none;';  echo $message_succ . '">
					<div><div style="float: left; padding-top: 4px; padding-right: 87px;">Show count : &nbsp;&nbsp;&nbsp;
					<input type="radio" value="yes" name="tw_show_count" ';  $chckd_tw_show_count = ($wp_ajax_social['tw_show_count'] == "yes") ? "checked=checked" : ""; 
					echo $message_succ .$chckd_tw_show_count.'>&nbsp;Yes&nbsp;<input type="radio" value="no" name="tw_show_count" ';  $chckd_tw_show_count = ($wp_ajax_social['tw_show_count'] == "no") ? "checked=checked" : ""; 
					echo $message_succ .$chckd_tw_show_count.'>&nbsp;No 
					&nbsp; </div><div>&nbsp;	&nbsp;	</div></div><br /><hr>
					
								
					
					<div><div style="float: left; padding-top: 1px; padding-right: 66px;">Tweet Via : @<input type="text" class="code" value="' . $wp_ajax_social['tw_button_via'] . '" id="tw_button_via" name="tw_button_via" size="25"/></div><div>&nbsp;	&nbsp;	</div></div><br><hr>
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 66px;">Tweet Recommend : @<input type="text" class="code" value="' . $wp_ajax_social['tw_button_recommend'] . '" id="tw_button_recommend" name="tw_button_recommend" size="25"/></div><div>&nbsp;	&nbsp;	</div></div><br><hr>
					
					<div><div style="float: left; padding-top: 1px; padding-right: 66px;">Tweet Hashtag : #<input type="text" class="code" value="' . $wp_ajax_social['tw_button_hashtag'] . '" id="tw_button_hashtag" name="tw_button_hashtag" size="25"/></div><div>&nbsp;	&nbsp;	</div></div><br><hr>
					
					<div><div style="float: left; padding-top: 4px; padding-right: 87px;">Large Button : &nbsp;&nbsp;&nbsp;
					<input type="radio" value="yes" name="tw_large_button" ';  $chckd_tw_large_button = ($wp_ajax_social['tw_large_button'] == "yes") ? "checked=checked" : ""; 
					echo $message_succ .$chckd_tw_large_button.'>&nbsp;Yes&nbsp;<input type="radio" value="no" name="tw_large_button" ';  $chckd_tw_large_button = ($wp_ajax_social['tw_large_button'] == "no") ? "checked=checked" : ""; 
					echo $message_succ .$chckd_tw_large_button.'>&nbsp;No 
					&nbsp; </div><div>&nbsp;	&nbsp;	</div></div><br /><hr>
					
					<div><div style="float: left; padding-top: 4px; padding-right: 87px;">Opt-out of tailoring Twitter [<a href="https://support.twitter.com/articles/20169421">?</a>] : &nbsp;&nbsp;&nbsp;
					<input type="radio" value="yes" name="tw_opt_tailoring" ';  $chckd_tw_opt_tailoring = ($wp_ajax_social['tw_opt_tailoring'] == "yes") ? "checked=checked" : ""; 
					echo $message_succ .$chckd_tw_opt_tailoring.'>&nbsp;Yes&nbsp;<input type="radio" value="no" name="tw_opt_tailoring" ';  $chckd_tw_opt_tailoring = ($wp_ajax_social['tw_opt_tailoring'] == "no") ? "checked=checked" : ""; 
					echo $message_succ .$chckd_tw_opt_tailoring.'>&nbsp;No 
					&nbsp; </div><div>&nbsp;	&nbsp;	</div></div><br /><hr>
					
					
					
					<div><div style="float: left; padding-top: 1px; padding-right: 37px;">Upload Image For Twitter (Enter an URL or upload an icon for Twitter.) : </div><div>&nbsp;	&nbsp;	<label for="upload_image">
<div style="float:left;"><input id="tw_upload_image" type="text" size="36" name="wpas_tw_upload_image" value="'.$wp_ajax_social['wpas_tw_upload_image'].'" />
<input id="tw_upload_image_button" type="button" value="Upload Image" /></div><div style="padding-left:10px;" id="wpas_preview_tw"><img src="'.$wp_ajax_social['wpas_tw_upload_image'].'" /></div>
<br />
</label></div></div><hr>
					
					</div></td>

				</tr>

				<tr valign="top">

				<th scope="row" colspan="2"></td>

				</tr>

			</tbody>

		</table>

		</div>

		<div style="float:left;width:250px;" align="center"><input type="submit" name="wp_ajax_social_submit" id="wp_ajax_social_submit" value="Update Options" /></div>&nbsp;&nbsp;&nbsp;&nbsp;<div id="loading_img" style="float:left;width:60px;padding-top:9px;display:none;" align="center"><img src="' . WP_PLUGIN_URL . '/wp-ajax-social/images/loader.gif"></div>&nbsp;&nbsp;&nbsp;&nbsp;<div class="flash wpas_success" style="float:left;display:none;" id="wpas_div_success">

   Options Saved.</div>

   <br>

   <br>

      <br>   <br>

	</form>

	</div>

	<div id="poststuff" class="metabox-holder has-right-sidebar" style="float: right; width: 24%;"> 

   <div id="side-info-column" class="inner-sidebar"> 

			<div class="postbox"> 

			  <h3 class="hndle"><span>Donate To Support Plugin:</span></h3> 

			  <div class="inside" align="center">

                To send donation send me donation on kinjugandhi@yahoo.com. Thanks.

              </div> 

			</div> 

  </div>

<div id="side-info-column" class="inner-sidebar"> 

			<div class="postbox"> 

			  <h3 class="hndle"><span>About Plugin:</span></h3> 

			  <div class="inside">

                <ul>

                <li><a href="http://php-freelancer.in/wp-ajax-social-wordpress-social-plugin-to-load-social-buttonswidgets-via-ajax-to-reduce-loading-time-of-site/" title="Wp Ajax Social">Plugin Homepage</a></li>

                <li><a href="http://php-freelancer.in" title="Visit PHP Freelancer">Plugin Main Site</a></li>

                <li><a href="http://php-freelancer.in/wp-ajax-social-wordpress-social-plugin-to-load-social-buttonswidgets-via-ajax-to-reduce-loading-time-of-site/" title="Post Comment to get support">Support For Plugin</a></li>

                <li><a href="http://php-freelancer.in/wordpress-developer/" title="Plugin Author Page">About the Author</a></li>

               

                </ul> 

              </div> 

			</div> 

  </div>

  <div class="inner-sidebar" id="side-info-column"> 

			<div class="postbox"> 

			  <h3 class="hndle"><span>Support &amp; Donations</span></h3> 

			  <div class="inside">

                <div id="smooth_sldr_donations">

                 <ul>

                    <li><a href="#">Richard Pablo - $20</a></li>

                   

                 </ul>

					

                   

                </div>

              </div> 

			</div> 

     </div>

 </div>

</div>';

}

function wpas_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', WP_PLUGIN_URL.'/wp-ajax-social/js/my-script.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
}

function wpas_admin_styles() {
wp_enqueue_style('thickbox');
}

if (isset($_GET['page']) && $_GET['page'] == 'wp-ajax-social') {
add_action('admin_print_scripts', 'wpas_admin_scripts');
add_action('admin_print_styles', 'wpas_admin_styles');
}

?>