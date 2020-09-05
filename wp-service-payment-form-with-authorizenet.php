<?php
/**
 *
 * @since             1.0.1
 * @package           WP_Service_Payment_Form_With_Authorize.net
 *
 * @wordpress-plugin
 * Plugin Name:       WP Service Payment Form With Authorize.net
 * Plugin URI:        https://github.com/shivprakash210/wp-service-payment-form-with-authorizenet
 * Description:       WP Service Payment Form With Authorize.net allows to accept payments from credit/debit cards and checks using Authorize.net Gateway with captcha.
 * Version:           2.2.0
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

$wpspf_file = __FILE__;
$wpspf_dir = plugin_dir_path($wpspf_file);
$wpspf_page_url = plugin_dir_url($wpspf_file);
define( 'PLUGIN_DIR', $wpspf_dir );

require_once PLUGIN_DIR . 'functions.php'; 
require_once PLUGIN_DIR. 'src/shortcodes.php';    

/************************************************** 
* Activation function
***************************************************/
function wpspf_on_activation()
{
    if ( ! current_user_can( 'activate_plugins' ) )
        return;
    $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
    global $wpdb;
    $form_fields_table = $wpdb->prefix . 'wpspf_form_fields';
    $dropSql = "DROP TABLE IF EXISTS $form_fields_table";
    $wpdb->query($dropSql);
    $charset_collate = $wpdb->get_charset_collate();
    $sql_form_fields_table = "CREATE TABLE $form_fields_table (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `form_id` int(11) NOT NULL DEFAULT '1',
              `field_name` varchar(150) NOT NULL,
              `field_position` int(11) NOT NULL DEFAULT '100',
              `field_other_attributes` text NOT NULL,
              PRIMARY KEY (`id`),
              UNIQUE KEY `form_id` (`form_id`,`field_name`)
        ) $charset_collate;"; 

    $payment_entry_table = $wpdb->prefix . 'wpspf_payment_entry';
    $sql_payment_entry_table = "CREATE TABLE IF NOT EXISTS $payment_entry_table (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `customer_first_name` varchar(250) NOT NULL,
              `customer_last_name` varchar(250) NOT NULL,
              `email_address` varchar(250) NOT NULL,
              `payment_amount` decimal(10,2) NOT NULL,
              `payment_status` varchar(250) NOT NULL,
              `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`)
            ) $charset_collate;"; 

    $payment_entry_meta = $wpdb->prefix . 'wpspf_payment_entry_meta';
    $sql_payment_entry_meta_table = "CREATE TABLE IF NOT EXISTS $payment_entry_meta (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `entry_id` int(11) NOT NULL,
              `field_key` varchar(250) NOT NULL,
              `field_value` varchar(250) NOT NULL,
              PRIMARY KEY (`id`)
            ) $charset_collate;";   

    $sql_form_fields_table_insert = "INSERT INTO $form_fields_table (`form_id`, `field_name`, `field_position`, `field_other_attributes`) VALUES
(1, 'customer_first_name', 1, '{\"wpspf_field_type\": \"text\", \"wpspf_input_field_id\": \"customer_first_name\", \"wpspf_input_field_name\": \"customer_first_name\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"First Name\", \"wpspf_input_field_position\": \"1\", \"wpspf_input_field_is_required\": \"true\", \"wpspf_input_field_placeholder\": \"Enter your first name\", \"wpspf_input_field_default_value\": \"\"}'),
(1, 'customer_last_name', 2, '{\"field_id\": \"2\", \"wpspf_field_type\": \"text\", \"wpspf_input_field_id\": \"customer_last_name\", \"wpspf_input_field_name\": \"customer_last_name\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"Last Name\", \"wpspf_input_field_position\": \"2\", \"wpspf_input_field_is_required\": \"true\", \"wpspf_input_field_placeholder\": \"Enter your last name\", \"wpspf_input_field_default_value\": \"\"}'),
(1, 'payment_amount', 3, '{\"wpspf_field_type\": \"text\", \"wpspf_input_field_id\": \"payment_amount\", \"wpspf_input_field_name\": \"payment_amount\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"Payment Amount\", \"wpspf_input_field_position\": \"3\", \"wpspf_input_field_is_required\": \"true\", \"wpspf_input_field_placeholder\": \"Enter payment amount\", \"wpspf_input_field_default_value\": \"100\"}'),
(1, 'invoice_number', 4, '{\"wpspf_field_type\": \"text\", \"wpspf_input_field_id\": \"invoice_number\", \"wpspf_input_field_name\": \"invoice_number\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"Invoice Number(s) (Optional)\", \"wpspf_input_field_position\": \"4\", \"wpspf_input_field_is_required\": \"false\", \"wpspf_input_field_placeholder\": \"Enter invoice number\", \"wpspf_input_field_default_value\": \"\"}'),
(1, 'service_address', 5, '{\"wpspf_field_type\": \"text\", \"wpspf_input_field_id\": \"service_address\", \"wpspf_input_field_name\": \"service_address\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"Service Address\", \"wpspf_input_field_position\": \"5\", \"wpspf_input_field_is_required\": \"true\", \"wpspf_input_field_placeholder\": \"Enter you address\", \"wpspf_input_field_default_value\": \"\"}'),
(1, 'service_city', 6, '{\"wpspf_field_type\": \"text\", \"wpspf_input_field_id\": \"service_city\", \"wpspf_input_field_name\": \"service_city\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"City\", \"wpspf_input_field_position\": \"6\", \"wpspf_input_field_is_required\": \"true\", \"wpspf_input_field_placeholder\": \"Enter your city\", \"wpspf_input_field_default_value\": \"\"}'),
(1, 'service_state', 7, '{\"wpspf_field_type\": \"text\", \"wpspf_input_field_id\": \"service_state\", \"wpspf_input_field_name\": \"service_state\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"State\", \"wpspf_input_field_position\": \"7\", \"wpspf_input_field_is_required\": \"true\", \"wpspf_input_field_placeholder\": \"Enter your state\", \"wpspf_input_field_default_value\": \"\"}'),
(1, 'service_zipcode', 8, '{\"wpspf_field_type\": \"text\", \"wpspf_input_field_id\": \"service_zipcode\", \"wpspf_input_field_name\": \"service_zipcode\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"Zip Code\", \"wpspf_input_field_position\": \"8\", \"wpspf_input_field_is_required\": \"true\", \"wpspf_input_field_placeholder\": \"Enter zip code\", \"wpspf_input_field_default_value\": \"\"}'),
(1, 'service_country', 9, '{\"wpspf_field_type\": \"text\", \"wpspf_input_field_id\": \"service_country\", \"wpspf_input_field_name\": \"service_country\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"Country\", \"wpspf_input_field_position\": \"9\", \"wpspf_input_field_is_required\": \"true\", \"wpspf_input_field_placeholder\": \"Enter your country\", \"wpspf_input_field_default_value\": \"\"}'),
(1, 'email_address', 2, '{\"field_id\": \"15\", \"wpspf_field_type\": \"email\", \"wpspf_input_field_id\": \"email_address\", \"wpspf_input_field_name\": \"email_address\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"Email Address\", \"wpspf_input_field_position\": \"2\", \"wpspf_input_field_is_required\": \"true\", \"wpspf_input_field_placeholder\": \"Enter your email address\", \"wpspf_input_field_default_value\": \"\"}'),
(1, 'servicetype', 6, '{\"field_id\": \"16\", \"wpspf_field_type\": \"select\", \"wpspf_input_field_id\": \"servicetype\", \"wpspf_input_field_name\": \"servicetype\", \"wpspf_input_field_class\": \"form-field\", \"wpspf_input_field_label\": \"Service Type\", \"wpspf_input_field_options\": \"Plugin Development | Plugin Customization | Theme Development\", \"wpspf_input_field_position\": \"6\", \"wpspf_input_field_is_required\": \"false\"}');";


    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta( $sql_form_fields_table );
    dbDelta( $sql_form_fields_table_insert );
    dbDelta( $sql_payment_entry_table );
    dbDelta( $sql_payment_entry_meta_table );    
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
    global $wpdb; 
    $form_fields_table = $wpdb->prefix . 'wpspf_form_fields';
    $dropSql = "DROP TABLE IF EXISTS $form_fields_table";
    $wpdb->query($dropSql);  
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
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
    add_menu_page('Service Payment', 'Service Payment', 'administrator','wpspf-plugin-settings-page', 'wpspf_plugin_settings_page', 'dashicons-forms'  );
    add_action( 'admin_init', 'register_wpspf_plugin_settings' );
    add_submenu_page( 'wpspf-plugin-settings-page', 'All Payments', 'All Payments', 'manage_options', 'wpspf-all-payments', 'wpspf_all_payments');
    add_submenu_page( 'wpspf-plugin-settings-page', 'Form Fields Settings', 'Form Fields Settings', 'manage_options', 'wpspf-form-settings', 'wpspf_form_setings');
    add_submenu_page( 'wpspf-plugin-settings-page', 'Settings Document', 'Settings Document', 'manage_options', 'wpspf-settings-document', 'wpspf_setings_document');
}

//add js file
function wpspf_adding_scripts() { 
    wp_enqueue_script('wpspf_service_form_script', plugins_url('js/wpspf-service-form.js', __FILE__), array('jquery'),'', true);     
    wp_enqueue_script('wpspf_service_form_script');
}  
add_action( 'wp_enqueue_scripts', 'wpspf_adding_scripts' );

//add css file
function wpspf_adding_styles() {
    wp_register_style('wpspf_service_form_style', plugins_url('css/style.css', __FILE__));
    wp_enqueue_style('wpspf_service_form_style');  
}
add_action( 'wp_enqueue_scripts', 'wpspf_adding_styles' );   

//add admin js
function wpspf_admin_enqueue_scripts() {
    wp_enqueue_script('wpspf_service_admin', plugins_url('js/wpspf-service-admin.js', __FILE__), array('jquery'), '', true);
}
add_action( 'admin_enqueue_scripts', 'wpspf_admin_enqueue_scripts' );

//form setting
function wpspf_form_setings(){
    wpspf_donate();
    require_once PLUGIN_DIR. 'src/form-settings.php';    
}

//payment entry listing
function wpspf_all_payments(){
    wpspf_donate();
    if(isset($_GET['action']) && $_GET['action'] === 'details'){
        require_once PLUGIN_DIR. 'src/wpspf-payment-details.php';
    }else{
        require_once PLUGIN_DIR. 'src/wpspf-payments-list.php';
    }
    
}

function register_wpspf_plugin_settings() {
    //register our settings
    register_setting( 'wpspf-plugin-settings-group', 'wpspfnet_enable' );
    register_setting( 'wpspf-plugin-settings-group', 'wpspf_apiloginid' );
    register_setting( 'wpspf-plugin-settings-group', 'wpspf_transactionkey' );
    register_setting( 'wpspf-plugin-settings-group', 'wpspf_transactionmode' );
    register_setting( 'wpspf-plugin-settings-group', 'wpspfnet_enable_check' );
}

//payment gateway settings
function wpspf_plugin_settings_page() {
    wpspf_donate();
    require_once PLUGIN_DIR. 'admin/settings.php';
}

//setting document
function wpspf_setings_document(){
  wpspf_donate();
    require_once PLUGIN_DIR. 'admin/settings-document.php';
}