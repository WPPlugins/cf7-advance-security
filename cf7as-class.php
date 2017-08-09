<?php
/*
 * CF7 Advance Security(C)
 * @get_cf7as_sidebar_options()
 * @get_cf7as_sidebar_content()
 * */
?>
<?php 
// get all options value for "Custom Share Buttons with Floating Sidebar"
	function get_cf7as_sidebar_options() {
		global $wpdb;
		$ctOptions = $wpdb->get_results("SELECT option_name, option_value FROM $wpdb->options WHERE option_name LIKE 'cf7as_%'");
								
		foreach ($ctOptions as $option) {
			$ctOptions[$option->option_name] =  $option->option_value;
		}
	
		return $ctOptions;	
	}
	


// Get plugin options
global $pluginOptionsVal;
$pluginOptionsVal=get_cf7as_sidebar_options();
/** Start Captcha Code */
if(isset($pluginOptionsVal['cf7as_captcha']) && $pluginOptionsVal['cf7as_captcha']==1){
	add_action( 'wpcf7_init', 'cf7as_shortcodes_capctha' );	
	if(!function_exists('cf7as_captcha_confirmation_validation_filter')):
		add_filter( 'wpcf7_validate_text', 'cf7as_captcha_confirmation_validation_filter', 10, 2 );
		add_filter( 'wpcf7_validate_text*', 'cf7as_captcha_confirmation_validation_filter', 10, 2 );
		function cf7as_captcha_confirmation_validation_filter( $result, $tag ) {
		$cptha1=strip_tags($_POST['cf7as_hdn_cpthaval1']);
		$cptha2=strip_tags($_POST['cf7as_hdn_cpthaval2']);
		$cptha3=strip_tags($_POST['cf7as_hdn_cpthaaction']);
		$cptha4=strip_tags($_POST['cf7as-captchcode']);
		if($cptha3=='x'){ 
		$finalCechking=($cptha1*$cptha2);
		}elseif($cptha3=='+'){ 
		$finalCechking=($cptha1+$cptha2);
		}else
		{
			$finalCechking=($cptha1-$cptha2);
			}
		if(isset($_POST['cf7as-captchcode'])){
				
		if($cptha4==''){
					$result['valid'] = false;
					$result['reason']['cf7as-captchcode'] = 'Please fill the required field.';
			}
		else
		if($cptha4!=$finalCechking){
					$result['valid'] = false;
					$result['reason']['cf7as-captchcode'] = 'Enter a valid math captcha response!';
			}else
			{
				//silent
				}
		}
			return $result;
		}
	endif;

}

/** captcha */
if(!function_exists('cf7as_shortcodes_capctha')):
function cf7as_shortcodes_capctha() {
    wpcf7_add_shortcode( 'cf7as-captcha', 'cf7as_captcha_shortcode_handler' ); // "clock" is the type of the form-tag
}
endif;
if(!function_exists('cf7as_captcha_shortcode_handler')):
function cf7as_captcha_shortcode_handler( $tag ) {
    
    $operationAry=array('+','x','-');
    $random_action=array_rand($operationAry,2);
    $random_actionVal=$operationAry[$random_action[0]];
    $actnVal1=rand(10,20);
    $actnVal2=rand(1,9);
    $cf7as_captcha='<p class="cf7ascaptcha"><input name="cf7as_hdn_cpthaval1" id="cf7as_hdn_cpthaval1" type="hidden" value="'.$actnVal1.'" /><input name="cf7as_hdn_cpthaval2" id="cf7as_hdn_cpthaval2" type="hidden" value="'.$actnVal2.'" /><input name="cf7as_hdn_cpthaaction" id="cf7as_hdn_cpthaaction" type="hidden" value="'.$random_actionVal.'" />';
    /*$cf7as_captcha.=$titleMsg.'?
    <span class="wpcf7-form-control-wrap cf7as-captchcode"><span id="firstAct">'.$actnVal1.'</span> <span id="Action">'.$random_actionVal.'</span> <span id="secondAct">'.$actnVal2.'</span> <span>=</span> <input type="captcha" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="10" value="" name="cf7as-captchcode"></span></p>';*/
    $cf7as_captcha.='What is <span class="cf7as-firstAct">'.$actnVal2.'</span> '.$random_actionVal.'<span class="cf7as-firstAct"> '.$actnVal1.'</span> ? <br><span class="wpcf7-form-control-wrap cf7as-captchcode"> <input type="captcha" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" value="" name="cf7as-captchcode" placeholder="Type your answer"></span></p>';
    return $cf7as_captcha;
}
endif;
/** End Captcha Code */

/** form css */
add_action('wp_head','add_cf7as_inline_style');
function add_cf7as_inline_style()
{
	$pluginOptionsVal=get_cf7as_sidebar_options();
	
	$cf7as_style='<style>'.$pluginOptionsVal['cf7as-inlinecss'].'</style>';
	print $cf7as_style;
	}
