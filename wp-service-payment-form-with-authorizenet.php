<?php
/**
 *
 * @since             1.0.1
 * @package           WP_Service_Payment_Form_With_Authorize.net
 *
 * @wordpress-plugin
 * Plugin Name:       WP Service Payment Form With Authorize.net
 * Plugin URI:        https://github.com/shivprakash210/wp-service-payment-form-with-authorizenet
 * Description:       WP Service Payment Form With Authorize.net allows to accept payments from credit/debit cards using Authorize.net Gateway with captcha.
 * Version:           1.2
 * Author:            Shiv Prakash Tiwari
 * Author URI:        https://github.com/shivprakash210/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpspf_with_authorize.net
 * Domain Path:       /languages/
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || die( 'Wordpress Error! Opening plugin file directly' );

define( 'PLUGIN_PATH', plugins_url( __FILE__ ) );

/************************************************** 
* Activation function
***************************************************/
function wpspf_on_activation()
{
    if ( ! current_user_can( 'activate_plugins' ) )
        return;
    $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    
    check_admin_referer( "activate-plugin_{$plugin}" );     
}

/**************************************************
* Deactivation function
***************************************************/
function wpspf_on_deactivation()
{
    if ( ! current_user_can( 'activate_plugins' ) )
        return;
    $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
    global $wpdb;	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
    check_admin_referer( "deactivate-plugin_{$plugin}" );  
    
}

/**************************************************
* Uninstall function
***************************************************/
function wpspf_on_uninstall()
{
    if ( ! current_user_can( 'activate_plugins' ) )
        return;
    check_admin_referer( 'bulk-plugins' );
    if ( __FILE__ != WP_UNINSTALL_PLUGIN )
        return;
}

/**************************************************
* Register activation, deactivation and unistall hook
***************************************************/
register_activation_hook(   __FILE__, 'wpspf_on_activation' );
register_deactivation_hook( __FILE__, 'wpspf_on_deactivation' );
register_uninstall_hook(    __FILE__, 'wpspf_on_uninstall' );


add_action('admin_menu', 'wpspf_plugin_create_menu');

function wpspf_plugin_create_menu() {
	add_menu_page('Service Payment', 'Service Payment', 'administrator', __FILE__, 'wpspf_plugin_settings_page'  );
    add_action( 'admin_init', 'register_wpspf_plugin_settings' );
}

function register_wpspf_plugin_settings() {
	//register our settings
	register_setting( 'wpspf-plugin-settings-group', 'wpspfnet_enable' );
	register_setting( 'wpspf-plugin-settings-group', 'wpspf_apiloginid' );
	register_setting( 'wpspf-plugin-settings-group', 'wpspf_transactionkey' );
	register_setting( 'wpspf-plugin-settings-group', 'wpspf_transactionmode' );
}

function wpspf_plugin_settings_page() {
	
	if(isset($_POST['submit']) && wp_verify_nonce($_REQUEST['wpspf_nonce'], 'wpspf_nonce_action')){
		$wpspfnet_enable 		= intval($_POST['wpspfnet_enable']);
		$wpspf_apiloginid 		= sanitize_text_field($_POST['wpspf_apiloginid']);
		$wpspf_transactionkey 	= sanitize_text_field($_POST['wpspf_transactionkey']);
		$wpspf_transactionmode 	= intval($_POST['wpspf_transactionmode']);
		$wpspf_paymentheading 	= sanitize_text_field($_POST['wpspf_paymentheading']);
		$wpspf_servicetype 		= sanitize_text_field($_POST['wpspf_servicetype']);
        
        $wpspf_sitekey       = trim($_POST['wpspf_sitekey']);
		$wpspf_secretekey    = trim($_POST['wpspf_secretekey']);
		
		$wpspfnet_enable_servicetype = intval($_POST['wpspfnet_enable_servicetype']);
		
		$deprecated = null;
        $autoload = 'no';
		
        if ( get_option( 'wpspf_sitekey' ) !== false ) {

			update_option( 'wpspf_sitekey', $wpspf_sitekey );

		} else {
             
			add_option( 'wpspf_sitekey', $wpspf_sitekey , $deprecated, $autoload );
		}
		
			
		if ( get_option( 'wpspf_secretekey' ) !== false ) {

			update_option( 'wpspf_secretekey', $wpspf_secretekey );

		} else {
             
			add_option( 'wpspf_secretekey', $wpspf_secretekey , $deprecated, $autoload );
		}
			
		if ( get_option( 'wpspfnet_enable_servicetype' ) !== false ) {

			update_option( 'wpspfnet_enable_servicetype', $wpspfnet_enable_servicetype );

		} else {
             
			add_option( 'wpspfnet_enable_servicetype', $wpspfnet_enable_servicetype , $deprecated, $autoload );
		}
		
			
		if ( get_option( 'wpspf_servicetype' ) !== false ) {

			update_option( 'wpspf_servicetype', $wpspf_servicetype );

		} else {
             
			add_option( 'wpspf_servicetype', $wpspf_servicetype , $deprecated, $autoload );
		}
		
			
		if ( get_option( 'wpspf_paymentheading' ) !== false ) {

			update_option( 'wpspf_paymentheading', $wpspf_paymentheading );

		} else {
             
			add_option( 'wpspf_paymentheading', $wpspf_paymentheading , $deprecated, $autoload );
		}
		
		
		if ( get_option( 'wpspfnet_enable' ) !== false ) {

			update_option( 'wpspfnet_enable', $wpspfnet_enable );

		} else {
             
			add_option( 'wpspfnet_enable', $wpspfnet_enable , $deprecated, $autoload );
		}
		
		if ( get_option( 'wpspf_transactionmode' ) !== false ) {

			update_option( 'wpspf_transactionmode', $wpspf_transactionmode );

		} else {
             $deprecated = null;
             $autoload = 'no';
			add_option( 'wpspf_transactionmode', $wpspf_transactionmode , $deprecated, $autoload );
		}
		
		if ( get_option( 'wpspf_apiloginid' ) !== false ) {

			update_option( 'wpspf_apiloginid', $wpspf_apiloginid );

		} else {
             $deprecated = null;
             $autoload = 'no';
			add_option( 'wpspf_apiloginid', $wpspf_apiloginid , $deprecated, $autoload );
		}
		
		if ( get_option( 'wpspf_transactionkey' ) !== false ) {

			update_option( 'wpspf_transactionkey', $wpspf_transactionkey );

		} else {
             $deprecated = null;
             $autoload = 'no';
			add_option( 'wpspf_transactionkey', $wpspf_transactionkey , $deprecated, $autoload );
		}
	}
	 
?>
<div class="wrap">
<h3><?php echo esc_html_e( 'WP Service Payment Form With Authorize.net Plugin For Wordpress', 'wpspf_with_authorize.net' ); ?></h3>
<p><?php echo esc_html_e( 'Please use "[wpspf-paymentform]" shortcode for payment form.', 'wpspf_with_authorize.net' ); ?></p>
<form method="post" action="">
    <table class="form-table">
		
		<tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Payment Heading', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="text" style="width:100%;" name="wpspf_paymentheading" value="<?php echo esc_attr(get_option( 'wpspf_paymentheading' )); ?>" required="required" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Enable/Disable', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="checkbox" name="wpspfnet_enable_servicetype" value="1" <?php if ( trim(get_option( 'wpspfnet_enable_servicetype' ))==1 ){ echo 'checked'; } ?> /><?php esc_html_e( 'Check to show service type on front end', 'wpspf_with_authorize.net' ); ?></td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Service type', 'wpspf_with_authorize.net' ); ?></th>
        <td><textarea name="wpspf_servicetype" style="width:100%;" required="required" placeholder="seperate service type by | e.g. type one | type two | type three"><?php echo esc_html_e(get_option( 'wpspf_servicetype' )); ?></textarea></td>
        </tr>
		
        <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Enable/Disable', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="checkbox" name="wpspfnet_enable" value="1" <?php if ( trim(get_option( 'wpspfnet_enable' ))==1 ){ echo 'checked'; } ?> /><?php echo esc_html_e( 'Enable Authorize.Net', 'wpspf_with_authorize.net' ); ?></td>
        </tr>
         
        <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'API Login ID', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="text" name="wpspf_apiloginid" value="<?php echo esc_attr( get_option('wpspf_apiloginid') ); ?>" required="required" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Transaction Key', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="text" name="wpspf_transactionkey" value="<?php echo esc_attr( get_option('wpspf_transactionkey') ); ?>" required="required" /></td>
        </tr>	
		
		<tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Transaction Mode', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="checkbox" name="wpspf_transactionmode" value="1" <?php if ( trim(get_option( 'wpspf_transactionmode' ))==1 ){ echo 'checked'; } ?> /><?php echo esc_html_e( 'Enable Authorize.Net sandbox (Live Mode if Unchecked)', 'wpspf_with_authorize.net' ); ?>
		<?php wp_nonce_field('wpspf_nonce_action', 'wpspf_nonce'); ?>	
		</td>
        </tr>
        
        <tr valign="top">
        <th scope="row" colspan="2"><h1><?php echo esc_html_e( 'Google reCAPTCHA Details'); ?></h1></th>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Site key'); ?></th>
        <td><input type="text" style="width:100%;" name="wpspf_sitekey" value="<?php echo get_option( 'wpspf_sitekey' ); ?>" required="required" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Secret key'); ?></th>
        <td><input type="text" style="width:100%;" name="wpspf_secretekey" value="<?php echo get_option( 'wpspf_secretekey' ); ?>" required="required" /></td>
        </tr>
		
    </table>
    
    <p class="submit"><input name="submit" id="submit" class="button button-primary" value="Save Changes" type="submit"></p>

</form>
</div>
<?php }


function wpspf_paymentform(){
    if(!isset($_GET['action'])){
	$publickey = get_option( 'wpspf_sitekey' );
	$privatekey = get_option( 'wpspf_secretekey' );
	# the response from reCAPTCHA
	$resp = null;
    //check for form submit         
    if(isset($_POST['wpspf_payment']) && wp_verify_nonce($_REQUEST['wpspf_billpay_nonce'], 'wpspf_nonce_billpay_action')){
        //check for google captcha
        if(isset($_POST['spGoogleCaptchaRes']) && trim($_POST['spGoogleCaptchaRes'])!='' && wpspf_verify_google_captcha($_POST['spGoogleCaptchaRes'])==true){
                    // Testing, is it a real transaction
                    $environment = ( intval(get_option( 'wpspf_transactionmode' ))==1 ) ? 'TRUE' : 'FALSE';


                    // Decide which URL to post to
                    $environment_url = ( "FALSE" == $environment ) 
                                       ? 'https://secure.authorize.net/gateway/transact.dll'
                                       : 'https://test.authorize.net/gateway/transact.dll';

                    if(isset($_POST['wpspf_authorizenet_card-number']) && $_POST['wpspf_authorizenet_card-number']!=''){
                            $wpspf_card_number = sanitize_text_field(str_replace( array(' ', '-' ), '', $_POST['wpspf_authorizenet_card-number'] ));
                    }else{ $wpspf_card_number =''; }

                    if(isset($_POST['wpspf_authorizenet_card-cvc']) && $_POST['wpspf_authorizenet_card-cvc']!=''){
                            $wpspf_cvc = intval($_POST['wpspf_authorizenet_card-cvc']);
                    }else{ $wpspf_cvc =''; }

                    if(isset($_POST['wpspf_authorizenet_card-expiry'])){
                        $x_exp_date = str_replace( array( '/', ' '), '', sanitize_text_field($_POST['wpspf_authorizenet_card-expiry'] ));
                    }else{
                        $x_exp_date='';
                    }


                    $payload = array(
                        // Authorize.net Credentials and API Info
                        "x_tran_key"           	=> esc_attr( get_option('wpspf_transactionkey') ),
                        "x_login"              	=> esc_attr( get_option('wpspf_apiloginid')),
                        "x_version"            	=> "3.1",

                        // Order total
                        "x_amount"             	=> floatval($_POST['payment_amount']),

                        // Credit Card Information				
                        "x_card_num"           	=> $wpspf_card_number,				

                        "x_card_code"          	=> $wpspf_cvc,

                        "x_exp_date"           	=> $x_exp_date,

                        "x_type"               	=> 'AUTH_CAPTURE',
                        "x_invoice_num"        	=> str_replace( "#", "", sanitize_text_field($_POST['invoice_number'])),
                        "x_test_request"       	=> $environment,
                        "x_delim_char"         	=> '|',
                        "x_encap_char"         	=> '',
                        "x_delim_data"         	=> "TRUE",
                        "x_relay_response"     	=> "FALSE",
                        "x_method"             	=> "CC",

                        // Billing Information
                        "x_first_name"         	=> sanitize_text_field($_POST['customer_first_name']),
                        "x_last_name"          	=> sanitize_text_field($_POST['customer_last_name']),
                        "x_address"            	=> (isset($_POST['billing_address'])) ? sanitize_text_field($_POST['billing_address']) : '',
                        "x_city"              	=> sanitize_text_field($_POST['billing_city']),
                        "x_state"              	=> sanitize_text_field($_POST['billing_state']),
                        "x_zip"                	=> sanitize_text_field($_POST['billing_zipcode']),
                        "x_country"            	=> sanitize_text_field($_POST['billing_country']),
                        "x_phone"              	=> '',
                        "x_email"              	=> '',

                        // Shipping Information
                        "x_ship_to_first_name" 	=> sanitize_text_field($_POST['customer_first_name']),
                        "x_ship_to_last_name"  	=> sanitize_text_field($_POST['customer_last_name']),
                        "x_ship_to_company"    	=> '',
                        "x_ship_to_address"    	=> (isset($_POST['service_address'])) ? sanitize_text_field($_POST['service_address']) : '',
                        "x_ship_to_city"       	=> sanitize_text_field($_POST['service_city']),
                        "x_ship_to_country"    	=> sanitize_text_field($_POST['service_country']),
                        "x_ship_to_state"      	=> sanitize_text_field($_POST['service_state']),
                        "x_ship_to_zip"        	=> sanitize_text_field($_POST['service_zip']),

                        // Some Customer Information
                        "x_cust_id"            	=> mt_rand(),
                        "x_customer_ip"        	=> $_SERVER['REMOTE_ADDR'],

                    );

                    // Send this payload to Authorize.net for processing
                    $response = wp_remote_post( $environment_url, array(
                        'method'    => 'POST',
                        'body'      => http_build_query( $payload ),
                        'timeout'   => 90,
                        'sslverify' => false,
                    ) );

                    if ( is_wp_error( $response ) ) 
                        throw new Exception( esc_html_e( 'We are currently experiencing problems trying to connect to this payment gateway. Sorry for the inconvenience.', 'wpspf_with_authorize.net' ) );

                    if ( empty( $response['body'] ) )
                        throw new Exception( esc_html_e( 'Authorize.net\'s Response was empty.', 'wpspf_with_authorize.net' ) );

                    // Retrieve the body's resopnse if no errors found
                    $response_body = wp_remote_retrieve_body( $response );

                    // Parse the response into something we can read
                    foreach ( preg_split( "/\r?\n/", $response_body ) as $line ) {
                        $resp = explode( "|", $line );
                    }


                    // Get the values we need
                    $r['response_code']             = $resp[0];
                    $r['response_sub_code']         = $resp[1];
                    $r['response_reason_code']      = $resp[2];
                    $r['response_reason_text']      = $resp[3];

                    // Test the code to know if the transaction went through or not.
                    // 1 or 4 means the transaction was a success
                    if ( ( $r['response_code'] == 1 ) || ( $r['response_code'] == 4 ) ) {
                        // Payment has been successful
                        $customername = sanitize_text_field($_POST['customer_name']);
                        $servicetype = sanitize_text_field($_POST['servicetype']);
                        echo  '<div class="success">Thanks! '.$customername.',  Your payment has been successfully completed for service "'.$servicetype.'"</div>';			
                    } else {
                        // Transaction was not succesful			
                        $error = $r['response_reason_text'];
                        echo  '<div class="error">'.$error.'</div>';
                    }
                }else{
                    echo  '<div class="error">Invalid captcha. Please try again.</div>';        
                } 
            }                   
		
		?>
		<style>
			.wc-credit-card-form{ width:100%;}
			.form-field{ width: 100%; padding: 5px; }
			.success{ padding: 10px;border: 1px solid rgb(6, 149, 6);color: rgb(24, 180, 24);}
			.error{ padding: 10px;border: 1px solid #ed0a0a;;color: #ed0a0a;;}
			.wc-credit-card-form th {
					width: 260px;
		     }
			.required {
    			color: #ed0a0a;
			}
	     </style>
		<div class="payment_box payment_method_authorizenet_lightweight">
		<form method="post" id="wpspf_form" onsubmit="return wpspfCheckGrecaptcha();" name="payment" action="">
			<h1><?php echo esc_attr( get_option('wpspf_paymentheading') ); ?></h1>

		<table id="wc-authorizenet_lightweight-cc-form" class="wc-credit-card-form wc-payment-form">
			<tr>
				<th><?php echo esc_html_e( 'First Name', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><input type="text" name="customer_first_name" id="customer_first_name" placeholder="First Name" class="form-field" value="<?php if(isset($_POST['customer_first_name'])){ echo $_POST['customer_first_name']; }?>" required="required"></td>
			</tr>
			<tr>
				<th> <?php echo esc_html_e( 'Last Name', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><input type="text" name="customer_last_name" id="customer_last_name" placeholder="Last Name" class="form-field" value="<?php if(isset($_POST['customer_last_name'])){ echo $_POST['customer_last_name']; }?>" required="required"></td>
			</tr>
			<tr>
				<th><?php echo esc_html_e( 'Payment Amount ', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><input type="text" name="payment_amount" id="payment_amount" placeholder="Payment Amount" class="form-field" value="<?php if(isset($_POST['payment_amount'])){ echo $_POST['payment_amount']; }?>" required="required"></td>
			</tr>
			<tr>
				<th> <?php echo esc_html_e( 'Invoice Number(s) (Optional)', 'wpspf_with_authorize.net' ); ?></th>
				<td><input type="text" name="invoice_number" id="invoice_number" placeholder="Invoice Number(s)" value="<?php if(isset($_POST['invoice_number'])){ echo $_POST['invoice_number']; }?>" class="form-field"></td>
			</tr>
			<?php if( intval(get_option( 'wpspfnet_enable_servicetype' ))==1 ){ 
			$wpspf_servicetypes = esc_attr( get_option('wpspf_servicetype') );
	        if($wpspf_servicetypes!=''){   $wpspf_servicetypes = explode('|',$wpspf_servicetypes); }
	           if(!empty($wpspf_servicetypes)){
			?>
			<tr>
				<th>  <?php echo esc_html_e( 'Service type', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><select name="servicetype" id="servicetype"required="required" class="form-field">
					<option value="">Select any one</option>
					<?php 
	                      foreach($wpspf_servicetypes as $wpspf_servicetype){
					?>
					<option value="<?php echo $wpspf_servicetype;?>"><?php echo $wpspf_servicetype;?></option>
					<?php }  ?>
					</select></td>
			</tr>
			<?php } } ?>
			<tr>
				<th><?php echo esc_html_e( 'Service Address', 'wpspf_with_authorize.net' ); ?></th>
				<td></td>
			</tr>
			<tr>
				<th><?php echo esc_html_e( 'Address', 'wpspf_with_authorize.net' ); ?> <span class="required">*</span></th>
				<td><input type="text" name="service_address" id="service_address" placeholder="Address" class="form-field" value="<?php if(isset($_POST['service_address'])){ echo $_POST['service_address']; }?>" required="required"></td>
			</tr>
			<tr>
				<th> <?php echo esc_html_e( 'City', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><input type="text" name="service_city" id="service_city" placeholder="City" class="form-field" value="<?php if(isset($_POST['service_city'])){ echo $_POST['service_city']; }?>" required="required"></td>
			</tr>
			<tr>
				<th> <?php echo esc_html_e( 'State', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><input type="text" name="service_state" id="service_state" placeholder="State" class="form-field" value="<?php if(isset($_POST['service_state'])){ echo $_POST['service_state']; }?>" required="required"></td>
			</tr>
			<tr>
				<th> <?php echo esc_html_e( 'Zip Code', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><input type="text" name="service_zipcode" id="service_zipcode" placeholder="Zip Code" class="form-field" value="<?php if(isset($_POST['service_zipcode'])){ echo $_POST['service_zipcode']; }?>" required="required"></td>
			</tr>
			<tr>
				<th> <?php echo esc_html_e( 'Country', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><input type="text" name="service_country" id="service_country" placeholder="Country Name" class="form-field" value="<?php if(isset($_POST['service_country'])){ echo $_POST['service_country']; }?>" required="required"></td>
			</tr>
			
			
			<tr>
				<th colspan="2"><?php echo esc_html_e( 'Billing Address (if different from Service Address)', 'wpspf_with_authorize.net' ); ?></th>
				
			</tr>
			<tr>
				<th><?php echo esc_html_e( 'Address', 'wpspf_with_authorize.net' ); ?></th>
				<td><input type="text" name="billing_address" value="<?php if(isset($_POST['billing_address'])){ echo $_POST['billing_address']; }?>" id="billing_address" placeholder="Address" class="form-field"></td>
			</tr>
			<tr>
				<th><?php echo esc_html_e( 'City', 'wpspf_with_authorize.net' ); ?></th>
				<td><input type="text" name="billing_city" value="<?php if(isset($_POST['billing_city'])){ echo $_POST['billing_city']; }?>" id="billing_city" placeholder="City" class="form-field"></td>
			</tr>
			<tr>
				<th><?php echo esc_html_e( 'State', 'wpspf_with_authorize.net' ); ?></th>
				<td><input type="text" name="billing_state" value="<?php if(isset($_POST['billing_state'])){ echo $_POST['billing_state']; }?>" id="billing_state" placeholder="State" class="form-field"></td>
			</tr>
			<tr>
				<th><?php echo esc_html_e( 'Zip Code', 'wpspf_with_authorize.net' ); ?></th>
				<td><input type="text" name="billing_zipcode" value="<?php if(isset($_POST['billing_zipcode'])){ echo $_POST['billing_zipcode']; }?>" id="billing_zipcode" placeholder="Zip Code" class="form-field"></td>
			</tr>
			<tr>
				<th><?php echo esc_html_e( 'Country', 'wpspf_with_authorize.net' ); ?></th>
				<td><input type="text" name="billing_country" value="<?php if(isset($_POST['billing_country'])){ echo $_POST['billing_country']; }?>" id="billing_country" placeholder="Country Name" class="form-field"></td>
			</tr>
			
			<tr>
				<th>  <?php echo esc_html_e( 'Payment Method', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><select name="paymentmethod" id="paymentmethod" required="required" class="form-field">
					<option value="">Select any one</option>
					<option value="VISA">VISA</option>
					<option value="MasterCard">MasterCard</option>
					<option value="AMEX">AMEX</option>
					<option value="Discover">Discover</option>
				    </select>
				</td>
				</tr>
			
			<tr>
				<th> <?php  echo esc_html_e( 'Credit Card Number', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><input id="authorizenet_lightweight-card-number" value="<?php if(isset($_POST['wpspf_authorizenet_card-number'])){ echo $_POST['wpspf_authorizenet_card-number']; }?>" class="form-field"   maxlength="20" autocomplete="off" placeholder="•••• •••• •••• ••••" name="wpspf_authorizenet_card-number" type="text" required="required"></td>
			</tr>
			<tr>
				<th> <?php echo esc_html_e( 'Expiration Date (MM/YY)', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
				<td><input id="authorizenet_lightweight-card-expiry" class="form-field" maxlength="5"  autocomplete="off" placeholder="MM / YY" name="wpspf_authorizenet_card-expiry" value="<?php if(isset($_POST['wpspf_authorizenet_card-expiry'])){ echo $_POST['wpspf_authorizenet_card-expiry']; }?>" type="text" required="required"></td>
			</tr>
			<tr>
			<th> <?php echo esc_html_e( 'Security Code', 'wpspf_with_authorize.net' ); ?><span class="required">*</span></th>
			<td><input id="authorizenet_lightweight-card-cvc" class="form-field" autocomplete="off" placeholder="CVC" name="wpspf_authorizenet_card-cvc" value="<?php if(isset($_POST['wpspf_authorizenet_card-cvc'])){ echo $_POST['wpspf_authorizenet_card-cvc']; }?>" type="text" required="required"></td>
		    </tr>
            
            <tr>
				<td><input type="hidden" id="spGoogleCaptchaRes" name="spGoogleCaptchaRes" value="" required="required"></td>
				<td>
					<div id="spGoogleCaptcha"></div>	
				</td>
			</tr>
            
			<tr><td></td><td style="text-align:right;padding: 10px;">
				<IMG src="//payments.intuit.com/payments/landing_pages/LB/default.jsp?c=VMAD&l=H&s=2&b=FFFFFF" width="235" height="35" border=0 alt="Credit Card Logos" /> 
				</td></tr>
			<tr id="wpspf_submit_btn" style="display: none">	<td></td>		
			<td>
				<?php wp_nonce_field('wpspf_nonce_billpay_action', 'wpspf_billpay_nonce'); ?>
				<input type="submit" name="wpspf_payment" class="btn button form-field" value="Pay Your Bill"></td></tr>
			</table>
	    </form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript">
            function wpspfCheckGrecaptcha(){
                var spGoogleCaptchaRes = jQuery('#spGoogleCaptchaRes').val();
                if(spGoogleCaptchaRes==''){
                    return false;
                }else{
                    return true;
                }                
            }
      var verifyCallback = function(token) {
        jQuery('#wpspf_submit_btn').show();
        jQuery('#spGoogleCaptchaRes').val(token);
      };

      var expiredCallback = function() {
        jQuery('#wpspf_submit_btn').hide();
        var tokenBlank = '';
        jQuery('#spGoogleCaptchaRes').val(tokenBlank);
      };
      
      var captchaTheme = 'light';
      var sitekey = '<?php echo $publickey; ?>';
      var onloadCallback = function() {        
        grecaptcha.render('spGoogleCaptcha', {
          'sitekey' : sitekey,
          'callback' : verifyCallback,
          'expired-callback' : expiredCallback,
          'theme' : captchaTheme
        });
      };
    </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
<script>
	jQuery(document).ready(function(){ 
		jQuery('#authorizenet_lightweight-card-number').on('keyup', function() {
		  var foo = jQuery(this).val().split(" ").join(""); 
		  if (foo.length > 0) {
			foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
		  }
		  jQuery(this).val(foo);
		});
		
	    jQuery('#authorizenet_lightweight-card-expiry').on('keyup', function() {
		  var foo = jQuery(this).val().split("/").join(""); 
			
		  if (foo.length > 0) {
			foo = foo.match(new RegExp('.{1,2}', 'g')).join("/");
		  }
		  jQuery(this).val(foo);
		});
	});
</script>
</div>
<?php
}
}
add_shortcode('wpspf-paymentform','wpspf_paymentform');

//verify google captcha
function wpspf_verify_google_captcha($captcha){
    $secretKey = get_option( 'wpspf_secretekey' );
    $ip = $_SERVER['REMOTE_ADDR'];

    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => $secretKey, 'response' => $captcha);

    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
      )
    );
    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $responseKeys = json_decode($response,true);
    return $responseKeys['success'];
}
?>