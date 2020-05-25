<div class="wrap">
<h1 class="wp-heading-inline"><?php echo esc_html_e( 'Form Fields Settings', 'wpspf_with_authorize.net' ); ?></h1>
<?php
//Delete field
if(isset($_GET['action']) && isset($_GET['page']) && isset($_GET['field']) && $_GET['action']=='delete' && $_GET['page']=='wpspf-form-settings'){
	$fieldId = intval(trim($_GET['field']));
	wpspf_delete_form_fields($fieldId);
}
//Edit field
if(isset($_GET['action']) && isset($_GET['page']) && isset($_GET['field']) && $_GET['action']=='edit' && $_GET['page']=='wpspf-form-settings'){
	$fieldId = intval(trim($_GET['field']));
	$editFields = wpspf_get_form_fields($fieldId);
	
	if(!empty($editFields)){
		foreach($editFields as $editField){
			$editFieldAttributes = json_decode($editField->field_other_attributes);
			//echo '<pre>';print_r($editFieldAttributes);echo '</pre>';
?>
<hr class="wp-header-end">
<div class="wpspf_form_setting" id="wpspf_form_setting">
	<form name="wpspf_form_setting_form" id="wpspf_form_setting_form" method="post" enctype="multipart/form-data">
		<div class="row">
			<input type="hidden" name="field_id" value="<?php echo $fieldId; ?>">
			<div class="col">Selected Field Type</div>
			<div class="col">
				<select name="wpspf_field_type" class="field" id="wpspf_field_type" required="required">
					<option value="<?php echo $editFieldAttributes->wpspf_field_type; ?>"><?php echo $editFieldAttributes->wpspf_field_type; ?></option>
				</select>
			</div>
		</div>
	<div class="wpspf_other_field_container" id="wpspf_other_field_container">
		<?php wpspf_get_edit_field_attributes($fieldId); ?>
	</div>
	<br style="clear: both;">
	<input type="submit" name="wpspf_update_field" value="Update Field" class="btn button" id="wpspf_update_field">
	<a href="<?php echo admin_url(); ?>admin.php?page=wpspf-form-settings" class="btn button">Cancel</a>
	<div id="wpspf_response"></div>	
	</form>
</div>
<?php }}}else{ ?>
<a href="javascript:void(0);" id="wpspf_add_new_field" class="page-title-action">Add New Field</a>
<hr class="wp-header-end">
<div class="wpspf_form_setting" id="wpspf_form_setting" style="display: none;">
	<form name="wpspf_form_setting_form" id="wpspf_form_setting_form" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col">Select Field Type</div>
			<div class="col">
				<select name="wpspf_field_type" class="field" id="wpspf_field_type" required="required">
					<option value="">Select Field Type</option>
					<option value="text">Text</option>
					<option value="textarea">Textarea</option>
					<option value="select">Select</option>
					<option value="email">Email</option>
					<option value="number">Number</option>
					<option value="password">Password</option>
					<option value="date">Date</option>
					<option value="checkbox">Checkbox</option>
					<option value="radio">Radio</option>
					<option value="hidden">Hidden</option>
				</select>
			</div>
		</div>
	<div class="wpspf_other_field_container" id="wpspf_other_field_container"></div>
	<br style="clear: both;">
	<input type="submit" name="wpspf_save_new_field" value="Save New Field" class="btn button" id="wpspf_save_new_field" style="display: none;">
	<a href="<?php echo admin_url(); ?>admin.php?page=wpspf-form-settings" class="btn button">Cancel</a>
	<div id="wpspf_response"></div>	
	</form>
</div>
<?php } ?>
<div class="wpspf_created_form_container">
	<?php	
	$formFields = wpspf_get_form_fields();	
	$formHtml = '<div class="payment_box payment_method_authorizenet_lightweight">
        <form method="post" id="wpspf_form" name="payment" action="" enctype="multipart/form-data">            
        <table id="wc-authorizenet_lightweight-cc-form" class="wp-list-table widefat fixed striped wc-credit-card-form wc-payment-form"><thead><tr><th>Field Label</th><th>Field Name</th><th>Field View</th><th class="align-center">Position</th><th>Action</th></tr></thead><tbody>';
	if(!empty($formFields) && count($formFields) > 0){
		foreach($formFields as $formField){
			$fieldAttributes = json_decode($formField->field_other_attributes);			
			$case = $fieldAttributes->wpspf_field_type;			
			$formHtml .='<tr><th>'.$fieldAttributes->wpspf_input_field_label;
            if($fieldAttributes->wpspf_input_field_is_required==='true'){
            	$formHtml .='<span class="required">*</span>';
            }                
            $formHtml .='</th><td>'.$fieldAttributes->wpspf_input_field_name.'</td><td>';
			switch ($case) {
				case 'checkbox':	                
	                $options = explode("|", $fieldAttributes->wpspf_input_field_options);
	                if(!empty($options)){
	                	foreach ($options as $option) {
	                		$option = trim($option);
	                   		$formHtml .='<input type="checkbox" name="'.$fieldAttributes->wpspf_input_field_name.'" class="'.$fieldAttributes->wpspf_input_field_class.'" value="'.$option.'"><span class="wpspf_checkbox">'.$option.' </span>';
	                	}
	                } 
	                
					break;
				case 'radio':	                
	                $options = explode("|", $fieldAttributes->wpspf_input_field_options);
	                if(!empty($options)){
	                	foreach ($options as $option) {
	                		$option = trim($option);
	                   		$formHtml .='<input type="radio" name="'.$fieldAttributes->wpspf_input_field_name.'" class="'.$fieldAttributes->wpspf_input_field_class.'" value="'.$option.'"><span class="wpspf_radio">'.$option.' </span>';
	                	}
	                }					
					break;
				case 'file':
	                $formHtml .='<input type="'.$case.'" name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="'.$fieldAttributes->wpspf_input_field_class.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">';
					break;
				case 'textarea':
	                $formHtml .='<textarea name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="'.$fieldAttributes->wpspf_input_field_class.'" placeholder="'.$fieldAttributes->wpspf_input_field_placeholder.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">'.$fieldAttributes->wpspf_input_field_default_value.'</textarea>';
					break;
				case 'select':
	                $formHtml .='<select name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="'.$fieldAttributes->wpspf_input_field_class.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">';
	                $options = explode("|", $fieldAttributes->wpspf_input_field_options);
	                   $formHtml .='<option value="">Select</option>';
	                if(!empty($options)){
	                	foreach ($options as $option) {
	                		$option = trim($option);
	                   		$formHtml .='<option value="'.$option.'">'.$option.'</option>';
	                	}
	                } 
	                $formHtml .='</select>';					
					break;
				case 'password':
	                $formHtml .='<input type="'.$case.'" name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="'.$fieldAttributes->wpspf_input_field_class.'" placeholder="'.$fieldAttributes->wpspf_input_field_placeholder.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">';
					break;
				case 'date':
	                $formHtml .='<input type="'.$case.'" name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="'.$fieldAttributes->wpspf_input_field_class.'" placeholder="'.$fieldAttributes->wpspf_input_field_placeholder.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">';
					break;
				default:
	                $formHtml .='<input type="'.$case.'" name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="'.$fieldAttributes->wpspf_input_field_class.'" placeholder="'.$fieldAttributes->wpspf_input_field_placeholder.'" value="'.$fieldAttributes->wpspf_input_field_default_value.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">';					
					break;
			}
			$formHtml .='</td><td class="align-center">'.$formField->field_position.'</td><td>';
            $formHtml .='<a href="?page=wpspf-form-settings&action=edit&field='.$formField->id.'" class="btn button wpspf_btn_edit">Edit</a>';
            if(!in_array($fieldAttributes->wpspf_input_field_name,wpspf_getDefaultFormFieldsList())){
            	$formHtml .=' <a href="?page=wpspf-form-settings&action=delete&field='.$formField->id.'" onclick="return confirmDelete();" class="btn button wpspf_btn_delete">Delete</a>';
            }else{
            	$formHtml .=' <a href="javascript:void();" title="This is not deleteable." class="btn button">Default</a>';
            }
            $formHtml .='</td></tr>';
		}
	}
	echo $formHtml .= '</tbody><tfoot><tr><th>Field Label</th><th>Field Name</th><th>Field View</th><th class="align-center">Position</th><th>Action</th></tr></tfoot></table></form></div>';
	?>

</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		var admin_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';		
		jQuery('#wpspf_add_new_field').on('click',function(){
			jQuery('#wpspf_form_setting').toggle();
		});

		jQuery('#wpspf_field_type').on('change',function(){
			var fieldType = jQuery(this).val();
			jQuery.ajax({
	            url : admin_ajax_url,
	            type : 'post',
	            data : {
	                action : 'wpspf_get_form_field',
	                field_type : fieldType
	            },
	            success : function( response ) {
	            	jQuery('#wpspf_other_field_container').html(response);
	            	jQuery('#wpspf_save_new_field').show();
	            }
	        });
		});

		jQuery('#wpspf_form_setting_form').on('submit',function(event){
	        event.preventDefault();
	        var formData = jQuery(this).serializeArray();
	        jQuery.ajax( 
	            {
	                url : admin_ajax_url,
		            type : 'post',
		            data : {
		                action : 'wpspf_save_form_field',
		                field_detail : formData
		            },
		            success : function( response ) {
		            	var res = JSON.parse(response);
		            	if(res.status=='success'){
		            		jQuery('#wpspf_response').html(res.msg);
		            		setTimeout(function(){
		            			var url = '<?php echo admin_url(); ?>'+'admin.php?page=wpspf-form-settings';
		            			window.location.href=url;
		            		},1000);		            		
		            	}else{
		            		jQuery('#wpspf_response').html(res.msg);
		            	}
		            	
		            }
	            });
	    });
	});
	function confirmDelete(){
		return confirm('Are you sure?');
	}
</script>
<style type="text/css">
	#wpspf_form_setting .row{
		    width: 225px;
		    float: left;
		    padding: 10px 0px;
	}
	#wpspf_form_setting .field {
	    width: 221px;
	}
	#wc-authorizenet_lightweight-cc-form th {
	    text-align: left;
	}
	.align-center{  text-align: center !important; }
	#wpspf_success_msg{
		border: 1px solid;
	    padding: 5px;
	    color: #048004;
	}
	#wpspf_error_msg{
		border: 1px solid;
	    padding: 5px;
	    color: #d8190b;
	}
	.wpspf_created_form_container{ padding-top: 10px; }
	.row .col {
	    padding: 2px;
	    font-size: 14px;
	    font-weight: 400;
	}
	form#wpspf_form input[type=text], form#wpspf_form input[type=email], form#wpspf_form input[type=number], form#wpspf_form select, form#wpspf_form textarea, form#wpspf_form input[type=password], form#wpspf_form input[type=date] {
	    width: 100%;
	}
	span.wpspf_checkbox, span.wpspf_radio{
	    padding: 2px;
	}
	a.btn.button.wpspf_btn_delete {
	    color: #d40e0e;
	    border-color: #d40e0e;
	}
	.wpspf_onlyreable {
	    box-shadow: 0 0 0 transparent;
	    border-radius: 4px;
	    border: 1px solid #7e8993;
	    color: #32373c;
	    padding: 5px;
	}
</style>