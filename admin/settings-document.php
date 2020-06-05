<div class="wrap">
<h3>Settings Document</h3>
<p>Please use "[wpspf-paymentform]" shortcode for payment form.</p>
<h4>Form fields name</h4>
<table class="wp-list-table widefat fixed striped">
	<tr>
		<th>Field Name</th>
		<th>Description</th>
	</tr>
	<tr>
		<th>wpspf_x_cust_id</th>
		<td>
			<p>Optional</p>
			<p><b>Value:</b> The merchant assigned customer ID</p>
			<p><b>Default value:</b>  mt_rand() generate random unique customer ID. If you want to accept customer ID from the customer then add field which name must be "wpspf_x_cust_id".</p>
			<p><b>Format:</b> 20-character maximum (no symbols)</p>
			<p><b>Notes:</b> The unique identifier that represents the customer associated with
the transaction.</p>
			<p>The customer ID must be created dynamically on the merchant server or
provided per transaction. The payment gateway does not perform this
function.</p>
		</td>
	</tr>
</table>
</div>