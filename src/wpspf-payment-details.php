<?php
$entryId = $_GET['wpspf_entry'];
global $wpdb;
$wpspfPaymentEntryMetaTable = $wpdb->prefix.'wpspf_payment_entry_meta';
$data = $wpdb->get_results("SELECT * FROM $wpspfPaymentEntryMetaTable WHERE entry_id = '$entryId'",ARRAY_A);
//echo '<pre>'; print_r($data); echo '</pre>';
$fieldAttributes = [];
$formFields = wpspf_get_form_fields();
    if(!empty($formFields) && count($formFields)>0){
        foreach($formFields as $formField){
            $fieldAttribute = json_decode($formField->field_other_attributes);
            $fieldAttributes[$fieldAttribute->wpspf_input_field_name] = $fieldAttribute->wpspf_input_field_label;
        }
    }
    $fieldAttributes['paymentmethod']='Card Type';
    $fieldAttributes['wpspf_authorizenet_card-number']='Card Last 4 Digit';
    
?>
<h1 class="wp-heading-inline">Payment Details <a href="<?php echo admin_url(); ?>admin.php?page=wpspf-all-payments" class="btn button">View All</a> <button class="btn button" onclick="printDiv();" id="printBtn">Print</button> </h1> 
<div id="printableTable">
<table class="wp-list-table widefat fixed striped wpspf_entries">
	<?php
	foreach($data as $meta){
		if(isset($fieldAttributes[$meta['field_key']])){
	?>
		<tr>
			<th style="width: 250px;font-weight: bold;">
				<?php echo $fieldAttributes[$meta['field_key']]; ?>
			</th>
			<th style="width: 20px;font-weight: bold;">:</th>
			<td><?php if($meta['field_key']=='payment_amount'){ echo '$';} echo $meta['field_value']; ?></td>
		</tr>
<?php
		}
	}
?>
	<tr>
		<th style="width: 250px;font-weight: bold;">Payment Status</th>
		<th style="width: 20px;font-weight: bold;">:</th>
		<td>Paid</td>
	</tr>
	<?php
		global $wpdb;
        $wpspfPaymentEntryTable = $wpdb->prefix.'wpspf_payment_entry';
        $data = $wpdb->get_row("SELECT * FROM $wpspfPaymentEntryTable WHERE id='$entryId'",ARRAY_A);
        
	?>
	<tr>
		<th style="width: 250px;font-weight: bold;">Payment Date</th>
		<th style="width: 20px;font-weight: bold;">:</th>
		<td><?php echo $data['dt']; ?></td>
	</tr>	
</table>
<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
</div>
<script type="text/javascript">
	function printDiv() {
         window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
       }
</script>
<style type="text/css">
	@media print {
  * {
    display: none;
  }
  #printableTable {
    display: block;
  }
}
</style>