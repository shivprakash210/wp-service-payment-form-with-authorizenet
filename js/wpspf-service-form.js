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
    //intial load, hide fields until a payment method selection is made (if check enabled).
    if (wpspf_vars.wpspfnet_enable_check == 1){
		jQuery('#authorizenet_lightweight-card-numberrow').hide();
		jQuery('#authorizenet_lightweight-card-expiryrow').hide();
    jQuery('#authorizenet_lightweight-card-cvcrow').hide();
    jQuery('#authorizenet_name-on-accountrow').hide();
		jQuery('#authorizenet_routing-numberrow').hide();
		jQuery('#authorizenet_account-numberrow').hide();
		jQuery('#authorizenet_bank-namerow').hide();
    jQuery('#check-imagerow').hide();
    
    jQuery('#authorizenet_lightweight-card-number').removeAttr('required');
		jQuery('#authorizenet_lightweight-card-expiry').removeAttr('required');
    jQuery('#authorizenet_lightweight-card-cvc').removeAttr('required');
    jQuery('#authorizenet_name-on-account').removeAttr('required');
		jQuery('#authorizenet_routing-number').removeAttr('required');
		jQuery('#authorizenet_account-number').removeAttr('required');
		jQuery('#authorizenet_bank-name').removeAttr('required');
    }
});
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
var onloadCallback = function() {        
  grecaptcha.render('spGoogleCaptcha', {
    'sitekey' : sitekey,
    'callback' : verifyCallback,
    'expired-callback' : expiredCallback,
    'theme' : captchaTheme
  });
};

jQuery('#wpspf_form').on('submit',function(event){
          event.preventDefault();
          jQuery('#wpspf_submit_btn').hide();
          jQuery('#wpspf_submit_btn_loader').show();
          var formData = jQuery(this).serializeArray();
          var blankHtml ='';
          jQuery('#wpspf_response').html(blankHtml);
          jQuery.ajax( 
              {
                  url : admin_ajax_url,
                type : 'post',
                data : {
                    action : 'wpspf_service_payment_request',
                    field_detail : formData
                },
                success : function( response ) {                  
                  jQuery('#wpspf_submit_btn_loader').hide();
                  var res = JSON.parse(response);                  
                  jQuery('#wpspf_response').html(res.msg);                  
                  if(res.status=='success'){
                    jQuery('#wpspf_submit_btn').hide();
                    jQuery('#wpspf_form_container').html(blankHtml);
                  }else{
                    jQuery('#wpspf_submit_btn').show();
                  }                  
                }
              });
      });

// Script to show CC/Bank fields depending on selection
jQuery('#paymentmethod').change(function() {
  if (wpspf_vars.wpspfnet_enable_check == 1){
	  if (jQuery(this).val() == 'CHECKING' || jQuery(this).val() == 'SAVINGS'){
      //Show Bank Rows
		  jQuery('#authorizenet_name-on-accountrow').show();
      jQuery('#authorizenet_routing-numberrow').show();
		  jQuery('#authorizenet_account-numberrow').show();
		  jQuery('#authorizenet_bank-namerow').show();
      jQuery('#check-imagerow').show();
    
      //Make Bank Fields Required
		  jQuery('#authorizenet_bank-name').attr('required', '');
      jQuery('#authorizenet_name-on-account').attr('required', '');
		  jQuery('#authorizenet_routing-number').attr('required', '');
		  jQuery('#authorizenet_account-number').attr('required', '');

      //Hide Credit Card Rows
		  jQuery('#authorizenet_lightweight-card-numberrow').hide();
		  jQuery('#authorizenet_lightweight-card-expiryrow').hide();
		  jQuery('#authorizenet_lightweight-card-cvcrow').hide();
      
      //Remove Required from Credit Card Fields
		  jQuery('#authorizenet_lightweight-card-number').removeAttr('required');
		  jQuery('#authorizenet_lightweight-card-expiry').removeAttr('required');
		  jQuery('#authorizenet_lightweight-card-cvc').removeAttr('required');


	  }else if (jQuery(this).val() == ''){
      //Placeholder Selected - Hide all rows
		  jQuery('#authorizenet_lightweight-card-numberrow').hide();
		  jQuery('#authorizenet_lightweight-card-expiryrow').hide();
      jQuery('#authorizenet_lightweight-card-cvcrow').hide();
      jQuery('#authorizenet_name-on-accountrow').hide();
		  jQuery('#authorizenet_routing-numberrow').hide();
		  jQuery('#authorizenet_account-numberrow').hide();
		  jQuery('#authorizenet_bank-namerow').hide();
		  jQuery('#check-imagerow').hide();
    
    }else{//A Credit Card is selected
      //Hide Bank Rows
		  jQuery('#authorizenet_name-on-accountrow').hide();
		  jQuery('#authorizenet_routing-numberrow').hide();
		  jQuery('#authorizenet_account-numberrow').hide();
		  jQuery('#authorizenet_bank-namerow').hide();
		  jQuery('#check-imagerow').hide();

      //Remove required from Bank Fields
		  jQuery('#authorizenet_name-on-account').removeAttr('required');
		  jQuery('#authorizenet_routing-number').removeAttr('required');
		  jQuery('#authorizenet_account-number').removeAttr('required');
		  jQuery('#authorizenet_bank-name').removeAttr('required');

      //Show Credit Card Fields
		  jQuery('#authorizenet_lightweight-card-numberrow').show();
		  jQuery('#authorizenet_lightweight-card-expiryrow').show();
		  jQuery('#authorizenet_lightweight-card-cvcrow').show();

      //Make Credit Card Fields Required
		  jQuery('#authorizenet_lightweight-card-number').attr('required', '');
		  jQuery('#authorizenet_lightweight-card-expiry').attr('required', '');
		  jQuery('#authorizenet_lightweight-card-cvc').attr('required', '');	
    }
  }
});
