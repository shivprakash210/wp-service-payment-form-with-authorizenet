<div class="wrap">
<h3>Settings Document</h3>
<p>Please use "[wpspf-paymentform]" shortcode for payment form.</p>
<p>You can add or modify any fields using filter "wpspf_frontend_form_fields" </p>
<p>You can modify form post data using filter "wpspf_payment_form_post_data" </p>
<h4>Form fields name</h4>
    <p>The following fields are optional, and can be added to your Service Payment form as inputs with these names, or added to the post data using the filter "wpspf_payment_form_post_data".</p>
<table class="wp-list-table widefat fixed striped">
	<tr>
		<th>Field Name</th>
		<th>Description</th>
	</tr>
	<tr>
		<th>wpspf_x_cust_id</th>
		<td>
			<p>Optional</p>
			<p><b>Value:</b> The merchant assigned customer ID.</p>
			<p><b>Default value:</b>  mt_rand() generate random unique customer ID. If you want to accept customer ID from the customer then add field which name must be "wpspf_x_cust_id".</p>
			<p><b>Format:</b> 20-character maximum (no symbols).</p>
			<p><b>Notes:</b> The unique identifier that represents the customer associated with
the transaction.</p>
			<p>The customer ID must be created dynamically on the merchant server or
provided per transaction. The payment gateway does not perform this
function.</p>
		</td>
	</tr>
	<tr>
		<th>company_name</th>
		<td>
			<p>Optional</p>
			<p><b>Value:</b> The company associated with the customer’s billing address.</p>
			<p><b>Format:</b> 50-character maximum (no symbols).</p>
		</td>
	</tr>
	<tr>
		<th>invoice_number</th>
		<td>
			<p>Optional</p>
			<p><b>Value:</b> The merchant-assigned invoice number for the transaction.</p>
			<p><b>Format:</b> 20-character maximum (no symbols).</p>
			<p><b>Notes:</b> The invoice number must be created dynamically on the merchant server or provided per transaction. The payment gateway does not perform this function.</p>
		</td>
	</tr>
	<tr>
		<th>description</th>
		<td>
			<p>Optional</p>
			<p><b>Value:</b> The transaction description.</p>
			<p><b>Format:</b> 255-character maximum (no symbols).</p>
			<p>The description must be created dynamically on the merchant server or provided per transaction. The payment gateway does not perform this function.</p>
		</td>
	</tr>
</table>
</div>