<?php
function wpspf_paymentform(){
    $publickey = get_option( 'wpspf_sitekey' );
    $admin_ajax_url = admin_url('admin-ajax.php');
    
    $formHtml = '<div class="payment_box payment_method_authorizenet_lightweight"><h1>'.esc_attr( get_option('wpspf_paymentheading') ).'</h1><div class="wpspf_form_container" id="wpspf_form_container">
        <form method="post" id="wpspf_form" onsubmit="return wpspfCheckGrecaptcha();" name="payment" enctype="multipart/form-data" action="">            
        <table id="wc-authorizenet_lightweight-cc-form" class="wc-credit-card-form wc-payment-form">';
    $formFields = wpspf_get_form_fields();
    if(!empty($formFields) && count($formFields)>0){
        foreach($formFields as $formField){
            $fieldAttributes = json_decode($formField->field_other_attributes);
            $formHtml .= wpspf_get_dynamic_form_field_view($fieldAttributes);
        }
        //adding payment gateway fields if enabled
        $formHtml .= wpspf_get_paymentgateway_field_view();
    }
    $formHtml .='</table></form></div><div id="wpspf_response"></div></div>';
    $formHtml .= "<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit'
        async defer></script><script> var sitekey = '".$publickey."'; var admin_ajax_url = '".$admin_ajax_url."'; </script>";
    return $formHtml;
}
add_shortcode('wpspf-paymentform','wpspf_paymentform');
?>