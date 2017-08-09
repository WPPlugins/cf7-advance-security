<?php
/**
Plugin Name: CF7 Advance Security
Plugin URI: http://www.mrwebsolution.in
Description: "Contact Form 7 Advance Security" is a advance captcha module. It is only created for Contact Form 7 plugin.
Author: Raghunath Gurjar
Author URI: http://www.mrwebsolution.in
Version: 1.0 
License: GPL2
Contact Form 7 Advance Security is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Contact Form 7 Advance Security is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Contact Form 7 Advance Security.
 * 
 */
?>
<?php
/** register admin menu */
if(!function_exists('cf7as_admin_menu_init')):
add_action('admin_menu','cf7as_admin_menu_init');
function cf7as_admin_menu_init()
{
	add_options_page('CF7 Advance Security','CF7 Advance Security','manage_options','cf7as-settings','cf7as_add_settings_page');
	}
endif;

if(!function_exists('cf7as_add_settings_link')):
// Add settings link to plugin list page in admin
        function cf7as_add_settings_link( $links ) {
            $settings_link = array('<a href="options-general.php?page=cf7as-settings">' . __( 'Settings', 'cf7as' ) . '</a>');
            return array_merge( $links, $settings_link );;
        }
endif;
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'cf7as_add_settings_link' );
/** register settings */
if(!function_exists('cf7as_register_settings')):
function cf7as_register_settings() {
	register_setting( 'cf7as_options', 'cf7as_captcha');
	register_setting( 'cf7as_options', 'cf7as_hidden_captcha'); 
	register_setting( 'cf7as_options', 'cf7as_email_confirmation'); 
	register_setting( 'cf7as_options', 'cf7as-inlinecss'); 
} 
add_action( 'admin_init', 'cf7as_register_settings' );
endif;

/* CF7 Advance Security Settings Page HTML*/
if(!function_exists('cf7as_add_settings_page')):
function cf7as_add_settings_page()
{
if(get_option('cf7as-inlinecss')!='')
{
	$inlineCss=get_option('cf7as-inlinecss');
	}else
	{
		$inlineCss='.cf7ascaptcha {
    background: none repeat scroll 0 0 #eba1a5;border-radius: 10px;
    padding: 8px;
    width: 50%;
}.cf7ascaptcha input{ width:90%;border-radius: 5px;}';
		}	
?>
<div style="width: 80%; padding: 10px; margin: 10px;"> 
 <h1>Contact Form 7 Advance Security Settings</h1>
 <!-- Start Options Form -->
 <form action="options.php" method="post" id="cf7as-sidebar-admin-form">	
 <div id="cf7as-tab-menu"><a id="cf7as-general" class="cf7as-tab-links active" >General</a>
 <a id="cf7as-shortcode" class="cf7as-tab-links" >Shortcodes</a> <a  id="cf7as-support" class="cf7as-tab-links">Support</a> 
 </div>
<div class="cf7as-setting">
	<!-- General Setting -->	
	<div class="first cf7as-tab" id="div-cf7as-general">
	<h2>General Settings</h2>
	<p><input type="checkbox" id="cf7as_captcha" name="cf7as_captcha" value='1' <?php if(get_option('cf7as_captcha')!=''){ echo ' checked="checked"'; }?>/><label> Enable Math Captcha</label></p>
	<p><label> Math Captcha CSS </label><br><textarea rows="10" cols="50" id="cf7as-inlinecss" name="cf7as-inlinecss" ><?php echo $inlineCss;?></textarea> </p>
	</div>
	<!-- Shortcode -->	
	<div class="cf7as-tab" id="div-cf7as-shortcode">
	<h2>Shortcodes</h2>
	<p><h3>Math Captcha</h3>[cf7as-captcha] --  Use this shortcode for add to captcha into form 7</p>
	<p><h3> Hidden Captcha</h3>[cf7as-hiddencaptcha] --  Use this shortcode for add to hidden captcha into form 7</p>
	<p><h3> Email Double Confirmation</h3>You can add email double confirmation option on any form just need to add a new email shortcode fields with same exist email field name, only need add <b>confirm-</b> as prefix of new email fields <br>EXAMPLE:<br> [email* your-email] this is your origonal email address fields shortcode so now for implement double confirmaion email you will need to create a new email field  [email* <b>confirm-</b>your-email]<br> You can see here that origonal email field name is <b>your-email</b> and after add <b>confirm-</b> as prefix of this field name double confirmation email field name will be <b>confirm-your-email</b> <br>Screenshot
	<img src="<?php echo  plugins_url( 'images/screenshot.png' , __FILE__ );?>">
	</p>
	</div>
	<!-- Support -->
	<div class="last author cf7as-tab" id="div-cf7as-support">
	<h2>Plugin Support</h2>
	<p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZEMSYQUZRUK6A" target="_blank" style="font-size: 17px; font-weight: bold;"><img src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" title="Donate for this plugin"></a></p>
	<p><strong>Plugin Author:</strong><br><img src="<?php echo  plugins_url( 'images/raghu.jpg' , __FILE__ );?>" class="authorimg"><br><a href="http://raghunathgurjar.wordpress.com" target="_blank">Raghunath Gurjar</a></p>
	<p><a href="mailto:raghunath.0087@gmail.com" target="_blank" class="contact-author">Contact Author</a></p>
	<p><strong>My Other Plugins:</strong><br>
	<ul>
		<li><a href="https://wordpress.org/plugins/custom-share-buttons-with-floating-sidebar" target="_blank">Custom Share Buttons With Floating Sidebar</a></li>
		<li><a href="https://wordpress.org/plugins/protect-wp-admin/" target="_blank">Protect WP-Admin</a></li>
		<li><a href="https://wordpress.org/plugins/wp-testimonial/" target="_blank">WP Testimonial</a></li>
		<li><a href="https://wordpress.org/plugins/wp-easy-recipe/" target="_blank">WP Easy Recipe</a></li>
		<li><a href="https://wordpress.org/plugins/wp-social-buttons/" target="_blank">WP Social Buttons</a></li>
		<li><a href="https://wordpress.org/plugins/wp-youtube-gallery/" target="_blank">WP Youtube Gallery</a></li>
		</ul></p>
	</div>
	</div>
		<span class="submit-btn"><?php echo get_submit_button('Save Settings','button-primary','submit','','');?></span>
    <?php settings_fields('cf7as_options'); ?>
	</form>
<!-- End Options Form -->
</div>
<?php
}
endif;
/** add js into admin footer */
// better use get_current_screen(); or the global $current_screen
if (isset($_GET['page']) && $_GET['page'] == 'cf7as-settings') {
   add_action('admin_footer','init_cf7as_admin_scripts');
}

if(!function_exists('init_cf7as_admin_scripts')):
function init_cf7as_admin_scripts()
{
wp_register_style( 'cf7as_admin_style', plugins_url( 'css/cf7as-admin-min.css',__FILE__ ) );
wp_enqueue_style( 'cf7as_admin_style' );

echo $script='<script type="text/javascript">
	/* Protect WP-Admin js for admin */
	jQuery(document).ready(function(){
		jQuery(".cf7as-tab").hide();
		jQuery("#div-cf7as-general").show();
	    jQuery(".cf7as-tab-links").click(function(){
		var divid=jQuery(this).attr("id");
		jQuery(".cf7as-tab-links").removeClass("active");
		jQuery(".cf7as-tab").hide();
		jQuery("#"+divid).addClass("active");
		jQuery("#div-"+divid).fadeIn();
		});
		})
	</script>';
}
endif;

/** register_deactivation_hook */
/** Delete exits options during deactivation the plugins */
if( function_exists('register_deactivation_hook') ){
   register_deactivation_hook(__FILE__,'init_deactivation_cf7as_plugins');   
}

//Delete all options after uninstall the plugin
if(!function_exists('init_deactivation_cf7as_plugins')):
function init_deactivation_cf7as_plugins(){
	delete_option('cf7as_captcha');
	delete_option('cf7as-inlinecss');
}
endif;
/** register_activation_hook */
/** Delete exits options during activation the plugins */
if( function_exists('register_activation_hook') ){
   register_activation_hook(__FILE__,'init_activation_cf7as_plugins');   
}

//Disable free version after activate the plugin
if(!function_exists('init_activation_cf7as_plugins')):
function init_activation_cf7as_plugins(){
	delete_option('cf7as_captcha');
	delete_option('cf7as-inlinecss');
}
endif;
/** Include class file **/
require dirname(__FILE__).'/cf7as-class.php';
?>
