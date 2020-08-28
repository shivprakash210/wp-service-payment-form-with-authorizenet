<?php

if(isset($_POST['submit']) && wp_verify_nonce($_REQUEST['wpspf_nonce'], 'wpspf_nonce_action')){
        $deprecated = null;
        $autoload = 'no';
        
        $wpspfnet_enable        = (!empty($_POST['wpspfnet_enable'])) ? intval($_POST['wpspfnet_enable']) : 0;
        $wpspfnet_enable_check  = (!empty($_POST['wpspfnet_enable_check'])) ? intval($_POST['wpspfnet_enable_check']) : 0;
        $wpspf_apiloginid       = sanitize_text_field($_POST['wpspf_apiloginid']);
        $wpspf_transactionkey   = sanitize_text_field($_POST['wpspf_transactionkey']);
        $wpspf_transactionmode  = (!empty($_POST['wpspf_transactionmode'])) ? intval($_POST['wpspf_transactionmode']) : 0;
        $wpspf_paymentheading   = sanitize_text_field($_POST['wpspf_paymentheading']);
        $wpspf_paymentBtnLabel  = sanitize_text_field($_POST['wpspf_paymentBtnLabel']);
        // $wpspf_servicetype      = sanitize_text_field($_POST['wpspf_servicetype']);
        
        $wpspf_sitekey       = trim($_POST['wpspf_sitekey']);
        $wpspf_secretekey    = trim($_POST['wpspf_secretekey']);
        
        // $wpspfnet_enable_servicetype = (!empty($_POST['wpspfnet_enable_servicetype'])) ? intval($_POST['wpspfnet_enable_servicetype']) : 0;

        //Customer email receipt start
        $wpspf_x_email_customer  = (!empty($_POST['wpspf_x_email_customer'])) ? intval($_POST['wpspf_x_email_customer']) : 0;
        $wpspf_x_header_email_receipt   = sanitize_text_field($_POST['wpspf_x_header_email_receipt']);
        $wpspf_x_footer_email_receipt  = sanitize_text_field($_POST['wpspf_x_footer_email_receipt']);
        if ( get_option( 'wpspf_x_email_customer' ) !== false ) {
            update_option( 'wpspf_x_email_customer', $wpspf_x_email_customer );
        } else {             
            add_option( 'wpspf_x_email_customer', $wpspf_x_email_customer , $deprecated, $autoload );
        }

        if ( get_option( 'wpspf_x_header_email_receipt' ) !== false ) {
            update_option( 'wpspf_x_header_email_receipt', $wpspf_x_header_email_receipt );
        } else {             
            add_option( 'wpspf_x_header_email_receipt', $wpspf_x_header_email_receipt , $deprecated, $autoload );
        }

        if ( get_option( 'wpspf_x_footer_email_receipt' ) !== false ) {
            update_option( 'wpspf_x_footer_email_receipt', $wpspf_x_footer_email_receipt );
        } else {             
            add_option( 'wpspf_x_footer_email_receipt', $wpspf_x_footer_email_receipt , $deprecated, $autoload );
        }
        //Customer email receipt end       
        
        
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
            
        // if ( get_option( 'wpspfnet_enable_servicetype' ) !== false ) {

        //     update_option( 'wpspfnet_enable_servicetype', $wpspfnet_enable_servicetype );

        // } else {
             
        //     add_option( 'wpspfnet_enable_servicetype', $wpspfnet_enable_servicetype , $deprecated, $autoload );
        // }
        
            
        // if ( get_option( 'wpspf_servicetype' ) !== false ) {

        //     update_option( 'wpspf_servicetype', $wpspf_servicetype );

        // } else {
             
        //     add_option( 'wpspf_servicetype', $wpspf_servicetype , $deprecated, $autoload );
        // }
        
            
        if ( get_option( 'wpspf_paymentheading' ) !== false ) {

            update_option( 'wpspf_paymentheading', $wpspf_paymentheading );

        } else {
             
            add_option( 'wpspf_paymentheading', $wpspf_paymentheading , $deprecated, $autoload );
        }

        if ( get_option( 'wpspf_paymentBtnLabel' ) !== false ) {

            update_option( 'wpspf_paymentBtnLabel', $wpspf_paymentBtnLabel );

        } else {
             
            add_option( 'wpspf_paymentBtnLabel', $wpspf_paymentBtnLabel , $deprecated, $autoload );
        }
        
        
        if ( get_option( 'wpspfnet_enable' ) !== false ) {

            update_option( 'wpspfnet_enable', $wpspfnet_enable );

        } else {
             
            add_option( 'wpspfnet_enable', $wpspfnet_enable , $deprecated, $autoload );
        }
        
        if ( get_option( 'wpspfnet_enable_check' ) !== false ) {

            update_option( 'wpspfnet_enable_check', $wpspfnet_enable_check );

        } else {
             
            add_option( 'wpspfnet_enable_check', $wpspfnet_enable_check , $deprecated, $autoload );
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
        <th scope="row"><?php echo esc_html_e( 'Form Heading', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="text" style="width:100%;" name="wpspf_paymentheading" value="<?php echo esc_attr(get_option( 'wpspf_paymentheading' )); ?>" required="required" /></td>
        </tr>

        <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Form Button Label', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="text" style="width:100%;" name="wpspf_paymentBtnLabel" value="<?php echo esc_attr(get_option( 'wpspf_paymentBtnLabel' )); ?>" required="required" /></td>
        </tr>
        
        <!-- <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Enable/Disable', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="checkbox" name="wpspfnet_enable_servicetype" value="1" <?php if ( trim(get_option( 'wpspfnet_enable_servicetype' ))==1 ){ echo 'checked'; } ?> /><?php esc_html_e( 'Check to show service type on front end', 'wpspf_with_authorize.net' ); ?></td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Service type', 'wpspf_with_authorize.net' ); ?></th>
        <td><textarea name="wpspf_servicetype" style="width:100%;" required="required" placeholder="seperate service type by | e.g. type one | type two | type three"><?php echo esc_html_e(get_option( 'wpspf_servicetype' )); ?></textarea></td>
        </tr> -->
        
        <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Enable/Disable', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="checkbox" name="wpspfnet_enable" value="1" <?php if ( trim(get_option( 'wpspfnet_enable' ))==1 ){ echo 'checked'; } ?> /><?php echo esc_html_e( 'Enable Authorize.Net', 'wpspf_with_authorize.net' ); ?></td>
        </tr>

        <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Check Processing', 'wpspf_with_authorize.net' ); ?></th>
        <td><input type="checkbox" name="wpspfnet_enable_check" value="1" <?php if ( trim(get_option( 'wpspfnet_enable_check' ))==1 ){ echo 'checked'; } ?> /><?php echo esc_html_e( 'Enable Check Processing', 'wpspf_with_authorize.net' ); ?></td>
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
        <th scope="row" colspan="2"><h1><?php echo esc_html_e( 'Customer Email Receipt Setting'); ?></h1></th>
        </tr>

        <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Enable Customer Email Receipt', 'wpspf_with_authorize.net' ); ?></th>
        <td><select name="wpspf_x_email_customer" style="width:100%;">
            <option value="">Select Anyone</option>
            <option value="1" <?php if ( trim(get_option( 'wpspf_x_email_customer' ))==1 ){ echo 'selected="selected"'; } ?>>TRUE</option>
            <option value="0" <?php if ( trim(get_option( 'wpspf_x_email_customer' ))==0 ){ echo 'selected="selected"'; } ?>>FALSE</option>
        </select>   
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Header Email Receipt'); ?></th>
        <td><textarea name="wpspf_x_header_email_receipt" style="width:100%;"><?php echo esc_html_e(get_option( 'wpspf_x_header_email_receipt' )); ?></textarea></td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php echo esc_html_e( 'Footer Email Receipt'); ?></th>
        <td><textarea name="wpspf_x_footer_email_receipt" style="width:100%;"><?php echo esc_html_e(get_option( 'wpspf_x_footer_email_receipt' )); ?></textarea></td>
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
    
    <p class="submit"><input name="submit" id="submit" class="button button-primary" value="Save Form Settings" type="submit"></p>

</form>
</div>