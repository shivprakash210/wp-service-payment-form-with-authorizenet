<?php
function wpspf_get_form_field_ajax(){	
	if(!empty($_POST['action']) && !empty($_POST['field_type']) && $_POST['action']==='wpspf_get_form_field'){
		$choice = $_POST['field_type'];
		$fieldHtml='';
		switch ($choice) {
			case 'checkbox':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id"></div>
		</div>';
		$fieldHtml .='<div class="row" style="width:500px;">
			<div class="col">Add checkbox options (seperate each options by | e.g. Option1 | Option2 | Option3):</div>
			<div class="col"><input type="text" name="wpspf_input_field_options" class="field" id="wpspf_input_field_options" style="width:496px;" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Is Required field:</div>
			<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false">No</option></select></div>
		</div>';
				break;
			case 'radio':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id"></div>
		</div>';
		$fieldHtml .='<div class="row" style="width:500px;">
			<div class="col">Add radio options (seperate each options by | e.g. Option1 | Option2 | Option3):</div>
			<div class="col"><input type="text" name="wpspf_input_field_options" class="field" id="wpspf_input_field_options" style="width:496px;" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Is Required field:</div>
			<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false">No</option></select></div>
		</div>';
				break;
			case 'file':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id"></div>
		</div>';
		$fieldHtml .='<div class="row" style="width:455px;">
			<div class="col">Add allowed file type (seperate each file type by | e.g. jpeg | jpg | png):</div>
			<div class="col"><input type="text" name="wpspf_input_field_file_type" class="field" id="wpspf_input_field_file_type" style="width:450px;" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Is Required field:</div>
			<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false">No</option></select></div>
		</div>';
				break;	
			case 'select':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id"></div>
		</div>';
		$fieldHtml .='<div class="row" style="width:455px;">
			<div class="col">Add options (seperate each options by | e.g. Option1 | Option2 | Option3):</div>
			<div class="col"><input type="text" name="wpspf_input_field_options" class="field" id="wpspf_input_field_options" style="width:450px;" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Is Required field:</div>
			<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false">No</option></select></div>
		</div>';
				break;	
			case 'date':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field placeholder:</div>
			<div class="col"><input type="text" name="wpspf_input_field_placeholder" class="field" id="wpspf_input_field_placeholder"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Is Required field:</div>
			<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false">No</option></select></div>
		</div>';
		
				break;
			case 'password':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field placeholder:</div>
			<div class="col"><input type="text" name="wpspf_input_field_placeholder" class="field" id="wpspf_input_field_placeholder"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Is Required field:</div>
			<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false">No</option></select></div>
		</div>';
		
				break;
			default:
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field placeholder:</div>
			<div class="col"><input type="text" name="wpspf_input_field_placeholder" class="field" id="wpspf_input_field_placeholder"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field default value:</div>
			<div class="col"><input type="text" name="wpspf_input_field_default_value" class="field" id="wpspf_input_field_default_value"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Is Required field:</div>
			<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false">No</option></select></div>
		</div>';
		
				break;
		}
		echo $fieldHtml;

	}
	wp_die();
}
add_action( 'wp_ajax_wpspf_get_form_field', 'wpspf_get_form_field_ajax');

function wpspf_save_form_field_ajax(){
	if(!empty($_POST['action']) && !empty($_POST['field_detail'])){
		$attributes = [];
		foreach($_POST['field_detail'] as $attribute){
			$attributes[$attribute['name']] = $attribute['value'];
		}
		$attributes['wpspf_input_field_name'] = strtolower(str_replace(' ', '_', $attributes['wpspf_input_field_name']));
		if(isset($attributes['wpspf_input_field_id']) && trim($attributes['wpspf_input_field_id']) != ''){
			$attributes['wpspf_input_field_id'] = strtolower(str_replace(' ', '_', $attributes['wpspf_input_field_id']));
		}
		$fieldJson = json_encode($attributes);
		global $wpdb;
		$table = $wpdb->prefix.'wpspf_form_fields';
		$result = [];
		$result['status'] = 'success';
		//check for already available field
		$fieldName = $attributes['wpspf_input_field_name'];
		$field = $wpdb->get_results("SELECT id FROM $table WHERE form_id='1' AND field_name='$fieldName'");
		if(empty($field) && count($field)==0){
			if(isset($attributes['wpspf_input_field_position']) && trim($attributes['wpspf_input_field_position']) != ''){
				$data = array('field_name' => $attributes['wpspf_input_field_name'],'field_position' => $attributes['wpspf_input_field_position'], 'field_other_attributes' => $fieldJson);
				$format = array('%s','%d','%s');
				$insert = $wpdb->insert($table,$data,$format);
			}else{
				$data = array('field_name' => $attributes['wpspf_input_field_name'],'field_other_attributes' => $fieldJson);
				$format = array('%s','%s');
				$insert = $wpdb->insert($table,$data,$format);
			}
			$result['msg'] =  '<p id="wpspf_success_msg">Form field added successfully.</p>';
		}elseif(isset($attributes['field_id']) && $attributes['field_id']>0){
			if(isset($attributes['wpspf_input_field_position']) && trim($attributes['wpspf_input_field_position']) != ''){
				$data = array('field_name' => $attributes['wpspf_input_field_name'],'field_position' => $attributes['wpspf_input_field_position'], 'field_other_attributes' => $fieldJson);
				$where = array('id' => $attributes['field_id']);
				$format = array('%s','%d','%s');
				$whereFormat = array('%d');
				$update = $wpdb->update($table,$data,$where,$format,$whereFormat);
			}else{
				$data = array('field_name' => $attributes['wpspf_input_field_name'],'field_other_attributes' => $fieldJson);
				$where = array('id' => $attributes['field_id']);
				$format = array('%s','%s');
				$whereFormat = array('%d');
				$update = $wpdb->update($table,$data,$where,$format,$whereFormat);
			}
			$result['msg'] =  '<p id="wpspf_success_msg">Form field updated successfully.</p>';
		}else{
			$result['msg'] =  '<p id="wpspf_error_msg">Please check field name and id. This field is already added.</p>';
			$result['status'] = 'error';
		}
		echo json_encode($result);
		
	}
	wp_die();
}
add_action( 'wp_ajax_wpspf_save_form_field', 'wpspf_save_form_field_ajax');

//finction to get form fields
function wpspf_get_form_fields($fieldId = null){
	global $wpdb;
	$table = $wpdb->prefix.'wpspf_form_fields';
	if($fieldId!=null && $fieldId>0){
		$sql = "SELECT * FROM $table WHERE form_id=1 AND id='$fieldId'";
		$formFields = $wpdb->get_results($sql);
	}else{
		$sql = "SELECT * FROM $table WHERE form_id=1 ORDER BY field_position asc";
		$formFields = $wpdb->get_results($sql);
	}	
	return $formFields;
}

//function for get edit field attributes
function wpspf_get_edit_field_attributes($fieldId){
	if(!empty($fieldId)){
		$editFields = wpspf_get_form_fields($fieldId);	
	if(!empty($editFields)){
		foreach($editFields as $editField){
			$editFieldAttributes = json_decode($editField->field_other_attributes);	
		$choice = $editFieldAttributes->wpspf_field_type;
		$fieldHtml='';
		switch ($choice) {
			case 'checkbox':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required" value="'.$editFieldAttributes->wpspf_input_field_label.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required" value="'.$editFieldAttributes->wpspf_input_field_name.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class" value="'.$editFieldAttributes->wpspf_input_field_class.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id" value="'.$editFieldAttributes->wpspf_input_field_id.'"></div>
		</div>';
		$fieldHtml .='<div class="row" style="width:500px;">
			<div class="col">Add checkbox options (seperate each options by | e.g. Option1 | Option2 | Option3):</div>
			<div class="col"><input type="text" name="wpspf_input_field_options" class="field" id="wpspf_input_field_options" style="width:496px;" required="required" value="'.$editFieldAttributes->wpspf_input_field_options.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position" value="'.$editFieldAttributes->wpspf_input_field_position.'"></div>
		</div>';
		if($editFieldAttributes->wpspf_input_field_is_required=='true'){
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true" selected="selected">Yes</option><option value="false">No</option></select></div>
			</div>';
		}else{
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false" selected="selected">No</option></select></div>
			</div>';
		}
				break;
			case 'radio':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required" value="'.$editFieldAttributes->wpspf_input_field_label.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required" value="'.$editFieldAttributes->wpspf_input_field_name.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class" value="'.$editFieldAttributes->wpspf_input_field_class.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id" value="'.$editFieldAttributes->wpspf_input_field_id.'"></div>
		</div>';
		$fieldHtml .='<div class="row" style="width:500px;">
			<div class="col">Add radio options (seperate each options by | e.g. Option1 | Option2 | Option3):</div>
			<div class="col"><input type="text" name="wpspf_input_field_options" class="field" id="wpspf_input_field_options" style="width:496px;" required="required" value="'.$editFieldAttributes->wpspf_input_field_options.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position" value="'.$editFieldAttributes->wpspf_input_field_position.'"></div>
		</div>';
		if($editFieldAttributes->wpspf_input_field_is_required=='true'){
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true" selected="selected">Yes</option><option value="false">No</option></select></div>
			</div>';
		}else{
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false" selected="selected">No</option></select></div>
			</div>';
		}
				break;
			case 'file':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required" value="'.$editFieldAttributes->wpspf_input_field_label.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required" value="'.$editFieldAttributes->wpspf_input_field_name.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class" value="'.$editFieldAttributes->wpspf_input_field_class.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id" value="'.$editFieldAttributes->wpspf_input_field_id.'"></div>
		</div>';
		$fieldHtml .='<div class="row" style="width:455px;">
			<div class="col">Add allowed file type (seperate each file type by | e.g. jpeg | jpg | png):</div>
			<div class="col"><input type="text" name="wpspf_input_field_file_type" class="field" id="wpspf_input_field_file_type" style="width:450px;" required="required" value="'.$editFieldAttributes->wpspf_input_field_file_type.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position" value="'.$editFieldAttributes->wpspf_input_field_position.'"></div>
		</div>';
		if($editFieldAttributes->wpspf_input_field_is_required=='true'){
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true" selected="selected">Yes</option><option value="false">No</option></select></div>
			</div>';
		}else{
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false" selected="selected">No</option></select></div>
			</div>';
		}
				break;	
			case 'select':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required" value="'.$editFieldAttributes->wpspf_input_field_label.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required" value="'.$editFieldAttributes->wpspf_input_field_name.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class" value="'.$editFieldAttributes->wpspf_input_field_class.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id" value="'.$editFieldAttributes->wpspf_input_field_id.'"></div>
		</div>';
		$fieldHtml .='<div class="row" style="width:455px;">
			<div class="col">Add options (seperate each options by | e.g. Option1 | Option2 | Option3):</div>
			<div class="col"><input type="text" name="wpspf_input_field_options" class="field" id="wpspf_input_field_options" style="width:450px;" required="required" value="'.$editFieldAttributes->wpspf_input_field_options.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position" value="'.$editFieldAttributes->wpspf_input_field_position.'"></div>
		</div>';
		if($editFieldAttributes->wpspf_input_field_is_required=='true'){
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true" selected="selected">Yes</option><option value="false">No</option></select></div>
			</div>';
		}else{
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false" selected="selected">No</option></select></div>
			</div>';
		}
				break;	
			case 'date':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required" value="'.$editFieldAttributes->wpspf_input_field_label.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required" value="'.$editFieldAttributes->wpspf_input_field_name.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class" value="'.$editFieldAttributes->wpspf_input_field_class.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id" value="'.$editFieldAttributes->wpspf_input_field_id.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field placeholder:</div>
			<div class="col"><input type="text" name="wpspf_input_field_placeholder" class="field" id="wpspf_input_field_placeholder" value="'.$editFieldAttributes->wpspf_input_field_placeholder.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position" value="'.$editFieldAttributes->wpspf_input_field_position.'"></div>
		</div>';
		if($editFieldAttributes->wpspf_input_field_is_required=='true'){
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true" selected="selected">Yes</option><option value="false">No</option></select></div>
			</div>';
		}else{
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false" selected="selected">No</option></select></div>
			</div>';
		}
		
				break;
			case 'password':
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required" value="'.$editFieldAttributes->wpspf_input_field_label.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div>
			<div class="col"><input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required" value="'.$editFieldAttributes->wpspf_input_field_name.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class" value="'.$editFieldAttributes->wpspf_input_field_class.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id" value="'.$editFieldAttributes->wpspf_input_field_id.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field placeholder:</div>
			<div class="col"><input type="text" name="wpspf_input_field_placeholder" class="field" id="wpspf_input_field_placeholder" value="'.$editFieldAttributes->wpspf_input_field_placeholder.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position" value="'.$editFieldAttributes->wpspf_input_field_position.'"></div>
		</div>';
		if($editFieldAttributes->wpspf_input_field_is_required=='true'){
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true" selected="selected">Yes</option><option value="false">No</option></select></div>
			</div>';
		}else{
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false" selected="selected">No</option></select></div>
			</div>';
		}
		
				break;
			default:
				$fieldHtml .='<div class="row">
			<div class="col">Field label:</div>
			<div class="col"><input type="text" name="wpspf_input_field_label" class="field" id="wpspf_input_field_type" required="required" value="'.$editFieldAttributes->wpspf_input_field_label.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field name:</div><div class="col">';
		if(!in_array($editFieldAttributes->wpspf_input_field_name,wpspf_getDefaultFormFieldsList())){
			$fieldHtml .='<input type="text" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required" value="'.$editFieldAttributes->wpspf_input_field_name.'">';
		}else{
			$fieldHtml .='<input type="hidden" name="wpspf_input_field_name" class="field" id="wpspf_input_field_name" required="required" value="'.$editFieldAttributes->wpspf_input_field_name.'"><div class="wpspf_onlyreable">'.$editFieldAttributes->wpspf_input_field_name.'</div>';
		}
		

		$fieldHtml .='</div></div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field class:</div>
			<div class="col"><input type="text" name="wpspf_input_field_class" class="field" id="wpspf_input_field_class" value="'.$editFieldAttributes->wpspf_input_field_class.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field id:</div>
			<div class="col"><input type="text" name="wpspf_input_field_id" class="field" id="wpspf_input_field_id" value="'.$editFieldAttributes->wpspf_input_field_id.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field placeholder:</div>
			<div class="col"><input type="text" name="wpspf_input_field_placeholder" class="field" id="wpspf_input_field_placeholder" value="'.$editFieldAttributes->wpspf_input_field_placeholder.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field default value:</div>
			<div class="col"><input type="text" name="wpspf_input_field_default_value" class="field" id="wpspf_input_field_default_value" value="'.$editFieldAttributes->wpspf_input_field_default_value.'"></div>
		</div>';
		$fieldHtml .='<div class="row">
			<div class="col">Field position in form:</div>
			<div class="col"><input type="number" min="1" max="100" name="wpspf_input_field_position" class="field" id="wpspf_input_field_position" value="'.$editFieldAttributes->wpspf_input_field_position.'"></div>
		</div>';
		if($editFieldAttributes->wpspf_input_field_is_required=='true'){
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true" selected="selected">Yes</option><option value="false">No</option></select></div>
			</div>';
		}else{
			$fieldHtml .='<div class="row">
				<div class="col">Is Required field:</div>
				<div class="col"><select name="wpspf_input_field_is_required" class="field" id="wpspf_input_field_is_required"><option value="true">Yes</option><option value="false" selected="selected">No</option></select></div>
			</div>';
		}
		
		
				break;
		}
		echo $fieldHtml;
			}
		}
	}
}

//delete form field
function wpspf_delete_form_fields($fieldId){
	global $wpdb;
	$table = $wpdb->prefix.'wpspf_form_fields';
	if($fieldId!=null && $fieldId>0){
		$wpdb->delete( $table, array( 'id' => $fieldId ), array( '%d' ) );
	}
}

//front end dynamic form field view
function wpspf_get_dynamic_form_field_view($fieldAttributes){
	$fieldHtml = '';
	$fieldHtml .='<tr><th>'.$fieldAttributes->wpspf_input_field_label;
    if($fieldAttributes->wpspf_input_field_is_required==='true'){
    	$fieldHtml .='<span class="required">*</span>';
    }                
    $fieldHtml .='</th>';
	$case = $fieldAttributes->wpspf_field_type;
			switch ($case) {
				case 'checkbox':
					$fieldHtml .='<td>';	                
	                $options = explode("|", $fieldAttributes->wpspf_input_field_options);
	                if(!empty($options)){
	                	foreach ($options as $option) {
	                		$option = trim($option);
	                   		$fieldHtml .='<input type="checkbox" name="'.$fieldAttributes->wpspf_input_field_name.'" class="'.$fieldAttributes->wpspf_input_field_class.'" value="'.$option.'"><span class="wpspf_checkbox">'.$option.' </span>';
	                	}
	                } 
	                $fieldHtml .='</td>';
					break;
				case 'radio':
					$fieldHtml .='<td>';	                
	                $options = explode("|", $fieldAttributes->wpspf_input_field_options);
	                if(!empty($options)){
	                	foreach ($options as $option) {
	                		$option = trim($option);
	                   		$fieldHtml .='<input type="radio" name="'.$fieldAttributes->wpspf_input_field_name.'" class="'.$fieldAttributes->wpspf_input_field_class.'" value="'.$option.'"><span class="wpspf_radio">'.$option.' </span>';
	                	}
	                } 
	                $fieldHtml .='</td>';					
					break;
				case 'file':
					$fieldHtml .='<td>';
	                $fieldHtml .='<input type="'.$case.'" name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="form-field '.$fieldAttributes->wpspf_input_field_class.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">';      
	                $fieldHtml .='</td>';
					break;
				case 'textarea':
					$fieldHtml .='<td>';
	                $fieldHtml .='<textarea name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="form-field '.$fieldAttributes->wpspf_input_field_class.'" placeholder="'.$fieldAttributes->wpspf_input_field_placeholder.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">'.$fieldAttributes->wpspf_input_field_default_value.'</textarea>';
	                $fieldHtml .='</td>';
					break;
				case 'select':
					$fieldHtml .='<td>';
	                $fieldHtml .='<select name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="form-field '.$fieldAttributes->wpspf_input_field_class.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">';
	                $options = explode("|", $fieldAttributes->wpspf_input_field_options);
	                   $fieldHtml .='<option value="">Select</option>';
	                if(!empty($options)){
	                	foreach ($options as $option) {
	                		$option = trim($option);
	                   		$fieldHtml .='<option value="'.$option.'">'.$option.'</option>';
	                	}
	                } 
	                $fieldHtml .='</select></td>';					
					break;
				case 'password':
					$fieldHtml .='<td>';
	                $fieldHtml .='<input type="'.$case.'" name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="form-field '.$fieldAttributes->wpspf_input_field_class.'" placeholder="'.$fieldAttributes->wpspf_input_field_placeholder.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">';    
	                $fieldHtml .='</td>';
					break;
					case 'label':
						$fieldHtml .='<td>';
						$fieldHtml .='<input type="text" name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="form-field '.$fieldAttributes->wpspf_input_field_class.'"  value="'.$fieldAttributes->wpspf_input_field_default_value.'" readonly="true">';
						$fieldHtml .='</td>';
						break;
				case 'date':
					$fieldHtml .='<td>';
	                $fieldHtml .='<input type="'.$case.'" name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="form-field '.$fieldAttributes->wpspf_input_field_class.'" placeholder="'.$fieldAttributes->wpspf_input_field_placeholder.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">';    
	                $fieldHtml .='</td>';
					break;
				default:
					$fieldHtml .='<td>';
	                $fieldHtml .='<input type="'.$case.'" name="'.$fieldAttributes->wpspf_input_field_name.'" id="'.$fieldAttributes->wpspf_input_field_id.'" class="form-field '.$fieldAttributes->wpspf_input_field_class.'" placeholder="'.$fieldAttributes->wpspf_input_field_placeholder.'" value="'.$fieldAttributes->wpspf_input_field_default_value.'" required="'.$fieldAttributes->wpspf_input_field_is_required.'">';
	                $fieldHtml .='</td>';					
					break;
			}
	$fieldHtml .='</tr>';
	return $fieldHtml;
}

//payment gateway fields if enabled
function wpspf_get_paymentgateway_field_view(){
	$fieldHtml = '';
	if(get_option('wpspfnet_enable')==1){
		$fieldHtml .= '<tr><th>Payment Method<span class="required">*</span></th><td><select name="paymentmethod" id="paymentmethod" required="required" class="form-field">
	                    <option value="">Select any one</option>
	                    <option value="VISA">VISA</option>
	                    <option value="MasterCard">MasterCard</option>
	                    <option value="AMEX">AMEX</option>
	                    <option value="Discover">Discover</option>
	                    </select></td></tr>';
	            
	    $fieldHtml .= '<tr><th>Credit Card Number<span class="required">*</span></th><td><input id="authorizenet_lightweight-card-number"';
	    if(isset($_POST['wpspf_authorizenet_card-number'])){
	    	$fieldHtml .= ' value="'.$_POST['wpspf_authorizenet_card-number'].'"';
		}
	    $fieldHtml .= ' class="form-field"   maxlength="20" autocomplete="off" placeholder="•••• •••• •••• ••••" name="wpspf_authorizenet_card-number" type="text" required="required"></td>
	    </tr>';
	    $fieldHtml .= '<tr><th>Expiration Date (MM/YY)<span class="required">*</span></th>
	        <td><input id="authorizenet_lightweight-card-expiry" class="form-field" maxlength="5"  autocomplete="off" placeholder="MM / YY" name="wpspf_authorizenet_card-expiry"';
	    if(isset($_POST['wpspf_authorizenet_card-expiry'])){ 
	    	$fieldHtml .= ' value="'.$_POST['wpspf_authorizenet_card-expiry'].'"'; 
		}
	    $fieldHtml .= ' type="text" required="required"></td></tr>';

	    $fieldHtml .= '<tr><th>Security Code<span class="required">*</span></th>
	    <td><input id="authorizenet_lightweight-card-cvc" class="form-field" autocomplete="off" placeholder="CVC" name="wpspf_authorizenet_card-cvc"';
	    if(isset($_POST['wpspf_authorizenet_card-cvc'])){
		    $fieldHtml .=' value="'.$_POST['wpspf_authorizenet_card-cvc'].'"';
		}
	    $fieldHtml .=' type="text" required="required"></td></tr>';
    }

    $fieldHtml .='<tr><td><input type="hidden" id="spGoogleCaptchaRes" name="spGoogleCaptchaRes" value="" required="required"></td><td><div id="spGoogleCaptcha"></div></td></tr>';

    if(get_option('wpspfnet_enable')==1){
	    $fieldHtml .='<tr><td></td><td style="text-align:right;padding: 10px;"><IMG src="//payments.intuit.com/payments/landing_pages/LB/default.jsp?c=VMAD&l=H&s=2&b=FFFFFF" width="235" height="35" border=0 alt="Credit Card Logos" /></td></tr>';
	}

    $fieldHtml .='<tr id="wpspf_submit_btn" style="display: none"><td></td><td>';
    $fieldHtml .=wp_nonce_field('wpspf_nonce_billpay_action', 'wpspf_billpay_nonce', true, false);
    if (trim(get_option( 'wpspf_paymentBtnLabel' ))!='') {
		$wpspf_paymentBtnLabel = get_option( 'wpspf_paymentBtnLabel' );
	} else {
    	$wpspf_paymentBtnLabel ='Pay Your Bill';
    }
    $fieldHtml .='<input type="submit" name="wpspf_payment" id="wpspf_payment" class="btn button form-field" value="'.$wpspf_paymentBtnLabel.'"></td></tr>';
    $fieldHtml .='<tr id="wpspf_submit_btn_loader" style="display: none"><td></td><td><div class="wpspf_loader_text">Please Wait... </div><div class="wpspf_loader"></div></td></tr>';
            
	return $fieldHtml;
}

function wpspf_getDefaultFormFieldsList(){
	$fields = [
		'customer_first_name',
		'customer_last_name',
		'email_address',
		'payment_amount',
		'service_address',
		'service_city',
		'service_state',
		'service_zipcode',
		'service_country'
	];
	return $fields;
}

function wpspf_service_payment_request_ajax(){
	$result=[];
	$result['status']='success';
	$result['msg']='';
	if(!empty($_POST['action']) && !empty($_POST['field_detail'])){		
		$postData = [];
		foreach($_POST['field_detail'] as $field){
			$postData[$field['name']] = $field['value'];
		}
	$publickey = get_option( 'wpspf_sitekey' );
    $privatekey = get_option( 'wpspf_secretekey' );
    # the response from reCAPTCHA
    $resp = null;
    //check for form submit         
    if(wp_verify_nonce($postData['wpspf_billpay_nonce'], 'wpspf_nonce_billpay_action')){
        //check for google captcha
        if(isset($postData['spGoogleCaptchaRes']) && trim($postData['spGoogleCaptchaRes'])!='' && $postData['spGoogleCaptchaRes']==$postData['g-recaptcha-response']){
        			// Testing, is it a real transaction
				    $environment = ( intval(get_option( 'wpspf_transactionmode' ))==1 ) ? 'TRUE' : 'FALSE';
				    // Decide which URL to post to
				    $environment_url = ( "FALSE" == $environment ) 
				                       ? 'https://secure.authorize.net/gateway/transact.dll'
				                       : 'https://test.authorize.net/gateway/transact.dll';

				    if(isset($postData['wpspf_authorizenet_card-number']) && $postData['wpspf_authorizenet_card-number']!=''){
				            $wpspf_card_number = sanitize_text_field(str_replace( array(' ', '-' ), '', $postData['wpspf_authorizenet_card-number'] ));
				    }else{ $wpspf_card_number =''; }

				    if(isset($postData['wpspf_authorizenet_card-cvc']) && $postData['wpspf_authorizenet_card-cvc']!=''){
				            $wpspf_cvc = intval($postData['wpspf_authorizenet_card-cvc']);
				    }else{ $wpspf_cvc =''; }

				    if(isset($postData['wpspf_authorizenet_card-expiry'])){
				        $x_exp_date = str_replace( array( '/', ' '), '', sanitize_text_field($postData['wpspf_authorizenet_card-expiry'] ));
				    }else{
				        $x_exp_date='';
				    }

				    if(trim(sanitize_text_field($postData['email_address']))!=''){
				        $customer_email = sanitize_text_field($postData['email_address']);
				    }else{
				        $customer_email = '';
				    }

				    if(trim(sanitize_text_field($postData['wpspf_x_cust_id']))!=''){
				        $x_cust_id = sanitize_text_field($postData['wpspf_x_cust_id']);
				    }else{
				        $x_cust_id = mt_rand();
				    }				    

				    //Customer email receipt start
				    $x_email_customer = ( intval(get_option( 'wpspf_x_email_customer' ))==1 ) ? 'TRUE' : 'FALSE';
				    if(trim(sanitize_text_field(get_option( 'wpspf_x_header_email_receipt' )))!=''){
				        $x_header_email_receipt = sanitize_text_field(get_option( 'wpspf_x_header_email_receipt' ));
				    }else{
				        $x_header_email_receipt = '';
				    }
				    if(trim(sanitize_text_field(get_option( 'wpspf_x_footer_email_receipt' )))!=''){
				        $x_footer_email_receipt = sanitize_text_field(get_option( 'wpspf_x_footer_email_receipt' ));
				    }else{
				        $x_footer_email_receipt = '';
				    }
				    //Customer email receipt end


				    $payload = array(
				        // Authorize.net Credentials and API Info
				        "x_tran_key"            => esc_attr( get_option('wpspf_transactionkey') ),
				        "x_login"               => esc_attr( get_option('wpspf_apiloginid')),
				        "x_version"             => "3.1",
				        // Order total
				        "x_amount"              => floatval($postData['payment_amount']),
				        // Credit Card Information              
				        "x_card_num"            => $wpspf_card_number,
				        "x_card_code"           => $wpspf_cvc,
				        "x_exp_date"            => $x_exp_date,
				        "x_type"                => 'AUTH_CAPTURE',
				        "x_invoice_num"         => str_replace( "#", "", sanitize_text_field($postData['invoice_number'])),
				        "x_test_request"        => $environment,
				        "x_delim_char"          => '|',
				        "x_encap_char"          => '',
				        "x_delim_data"          => "TRUE",
				        "x_relay_response"      => "FALSE",
				        "x_method"              => "CC",

				        // Billing Information
				        "x_first_name"          => sanitize_text_field($postData['customer_first_name']),
				        "x_last_name"           => sanitize_text_field($postData['customer_last_name']),
				        "x_address"             => (isset($postData['service_address'])) ? sanitize_text_field($postData['service_address']) : '',
				        "x_city"                => sanitize_text_field($postData['service_city']),
				        "x_state"               => sanitize_text_field($postData['service_state']),
				        "x_zip"                 => sanitize_text_field($postData['service_zipcode']),
				        "x_country"             => sanitize_text_field($postData['service_country']),
				        "x_phone"               => '',
				        "x_email"               => $customer_email,
				        "x_email_customer"		=> $x_email_customer,
				        "x_header_email_receipt"=> $x_header_email_receipt,
				        "x_footer_email_receipt"=> $x_footer_email_receipt,

				        // Shipping Information
				        "x_ship_to_first_name"  => sanitize_text_field($postData['customer_first_name']),
				        "x_ship_to_last_name"   => sanitize_text_field($postData['customer_last_name']),
				        "x_ship_to_company"     => '',
				        "x_ship_to_address"     => (isset($postData['service_address'])) ? sanitize_text_field($postData['service_address']) : '',
				        "x_ship_to_city"        => sanitize_text_field($postData['service_city']),
				        "x_ship_to_country"     => sanitize_text_field($postData['service_country']),
				        "x_ship_to_state"       => sanitize_text_field($postData['service_state']),
				        "x_ship_to_zip"         => sanitize_text_field($postData['service_zipcode']),

				        // Some Customer Information
				        "x_cust_id"             => $x_cust_id,
				        "x_customer_ip"         => $_SERVER['REMOTE_ADDR'],

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
				        $customername = sanitize_text_field($postData['customer_first_name']);
				        $result['status']='success';
				        $result['msg']= '<div class="success">Thanks! '.$customername.', You have successfully completed your payment.</div>';
				        //save data in db
				        $postData['wpspf_authorizenet_card-number'] = $resp[50];
				        unset($postData['wpspf_authorizenet_card-expiry']);
				        unset($postData['wpspf_authorizenet_card-cvc']);
				        unset($postData['spGoogleCaptchaRes']);
				        unset($postData['g-recaptcha-response']);
				        wpspf_save_service_payment_form_data_in_db($postData,'Paid');         
				    } else {
				        // Transaction was not succesful            
				        $error = $r['response_reason_text'];
				        $result['status']='error';
				        $result['msg']=  '<div class="error">'.$error.'</div>';
				    }
                }else{
                	$result['status']='error';
                    $result['msg']= '<div class="error">Invalid captcha. Please try again.</div>';
                } 
            }
	}
	echo json_encode($result);
	wp_die();	
}
add_action('wp_ajax_wpspf_service_payment_request','wpspf_service_payment_request_ajax');
add_action('wp_ajax_nopriv_wpspf_service_payment_request','wpspf_service_payment_request_ajax');

//save payment form data
function wpspf_save_service_payment_form_data_in_db($postData,$paymentStatus){
	global $wpdb;
	$wpspfPaymentEntryTable = $wpdb->prefix.'wpspf_payment_entry';
	$wpspfPaymentEntryMetaTable = $wpdb->prefix.'wpspf_payment_entry_meta';
	$data = [
		'customer_first_name' => $postData['customer_first_name'],
		'customer_last_name' => $postData['customer_last_name'],
		'email_address' => $postData['email_address'],
		'payment_amount' => $postData['payment_amount'],
		'payment_status' => $paymentStatus
	];
	$format = array('%s','%s','%s','%f','%s');
	$insert = $wpdb->insert($wpspfPaymentEntryTable,$data,$format);
	$entry_id = $wpdb->insert_id;
	foreach($postData as $key => $value){
		$dataMeta = [
			'entry_id'=>$entry_id,
			'field_key' => $key,
			'field_value' => $value
		];
		$formatMeta = array('%d','%s','%s');
		$wpdb->insert($wpspfPaymentEntryMetaTable,$dataMeta,$formatMeta);
	}
}

//donate button
function wpspf_donate(){
	echo '<p style="text-align: center;font-size: 15px;font-weight: bold;padding: 10px;color: #fff;background: #23282d;">Would you like to support the advancement of this plugin? Donate to this plugin. PayPal ID: "shivprakash210@gmail.com"</p>';
}
?>