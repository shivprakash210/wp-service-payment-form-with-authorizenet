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