<div class="left">
  <h2><?php echo $text_your_details; ?></h2>
  
  <dl>
  	<dt><span class="required">*</span> <?php echo $entry_firstname; ?></dt>
  	<dd><input type="text" name="firstname" value="<?php echo $firstname; ?>" class="large-field" /></dd>
  </dl>
  <dl>
  	<dt><span class="required">*</span> <?php echo $entry_email; ?></dt>
  	<dd><input type="text" name="email" value="<?php echo $email; ?>" class="large-field" /></dd>
  </dl>
  <dl>
  	<dt><span class="required">*</span> <?php echo $entry_telephone; ?></dt>
  	<dd><input type="text" name="telephone" value="<?php echo $telephone; ?>" class="large-field" /></dd>
  </dl>
  <br />
  <br />
</div>

<div class="right">
  <h2><?php echo $text_your_address; ?></h2>
  <dl>
  	<dt><span class="required">*</span> <?php echo $entry_zone; ?></dt>
  	<dd><select name="zone_id" class=""></select></dd>
  	<dt><span class="required">*</span> <?php echo $entry_city; ?></dt>
  	<dd><input type="text" name="city" disabled="disabled" title="目前只暂支持长治地区" style="cursor:not-allowed;width: 50%;" value="长治"  /></dd>
  </dl>
  <dl>
  	<dt><span class="required">*</span> <?php echo $entry_address_1; ?></dt>
  	<dd><input type="text" name="address_1" value="<?php echo $address_1; ?>" class="large-field" /></dd>
  </dl>
  <dl>
  	<dt><?php echo $entry_address_2; ?></dt>
  	<dd><input type="text" name="address_2" value="<?php echo $address_2; ?>" class="large-field" /></dd>
  </dl>
  <dl>
  	<dt><span id="payment-postcode-required" class="required">*</span> <?php echo $entry_postcode; ?></dt>
  	<dd><input type="text" name="postcode" value="<?php echo $postcode; ?>" class="large-field" /></dd>
  </dl>
  <dl>
  	<dt><span class="required">*</span> <?php echo $entry_country; ?></dt>
  	<dd>
		<select name="country_id" class="large-field">
		<option value=""><?php echo $text_select; ?></option>
		<?php foreach ($countries as $country) { ?>
		<?php if ($country['country_id'] == $country_id) { ?>
		<option value="<?php echo $country['country_id']; ?>" selected="selected"><?php echo $country['name']; ?></option>
		<?php } else { ?>
		<option value="<?php echo $country['country_id']; ?>"><?php echo $country['name']; ?></option>
		<?php } ?>
		<?php } ?>
		</select>
	</dd>
  </dl>
</div>

<?php if ($shipping_required) { ?>
<div style="clear: both; padding-top: 15px; border-top: 1px solid #DDDDDD;">
  <?php if ($shipping_address) { ?>
  <input type="checkbox" name="shipping_address" value="1" id="shipping" checked="checked" />
  <?php } else { ?>
  <input type="checkbox" name="shipping_address" value="1" id="shipping" />
  <?php } ?>
  <label for="shipping"><?php echo $entry_shipping; ?></label>
  <br />
  <br />
  <br />
</div>
<?php } ?>
<div class="buttons">
  <div class="left">
    <input type="button" value="<?php echo $button_continue; ?>" id="button-guest" class="button" />
  </div>
</div>
<script type="text/javascript"><!--
$('#payment-address input[name=\'customer_group_id\']:checked').live('change', function() {
	var customer_group = [];
	
<?php foreach ($customer_groups as $customer_group) { ?>
	customer_group[<?php echo $customer_group['customer_group_id']; ?>] = [];
	customer_group[<?php echo $customer_group['customer_group_id']; ?>]['company_id_display'] = '<?php echo $customer_group['company_id_display']; ?>';
	customer_group[<?php echo $customer_group['customer_group_id']; ?>]['company_id_required'] = '<?php echo $customer_group['company_id_required']; ?>';
	customer_group[<?php echo $customer_group['customer_group_id']; ?>]['tax_id_display'] = '<?php echo $customer_group['tax_id_display']; ?>';
	customer_group[<?php echo $customer_group['customer_group_id']; ?>]['tax_id_required'] = '<?php echo $customer_group['tax_id_required']; ?>';
<?php } ?>	

	if (customer_group[this.value]) {
		if (customer_group[this.value]['company_id_display'] == '1') {
			$('#company-id-display').show();
		} else {
			$('#company-id-display').hide();
		}
		
		if (customer_group[this.value]['company_id_required'] == '1') {
			$('#company-id-required').show();
		} else {
			$('#company-id-required').hide();
		}
		
		if (customer_group[this.value]['tax_id_display'] == '1') {
			$('#tax-id-display').show();
		} else {
			$('#tax-id-display').hide();
		}
		
		if (customer_group[this.value]['tax_id_required'] == '1') {
			$('#tax-id-required').show();
		} else {
			$('#tax-id-required').hide();
		}	
	}
});

$('#payment-address input[name=\'customer_group_id\']:checked').trigger('change');
//--></script> 
<script type="text/javascript"><!--
$('#payment-address select[name=\'country_id\']').bind('change', function() {
	if (this.value == '') return;
	$.ajax({
		url: 'index.php?route=checkout/checkout/country&country_id=' + this.value,
		dataType: 'json',
		beforeSend: function() {
			$('#payment-address select[name=\'country_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
		},
		complete: function() {
			$('.wait').remove();
		},			
		success: function(json) {
			if (json['postcode_required'] == '1') {
				$('#payment-postcode-required').show();
			} else {
				$('#payment-postcode-required').hide();
			}
			
			html = '<option value=""><?php echo $text_select; ?></option>';
			
			if (json['zone'] != '') {
				for (i = 0; i < json['zone'].length; i++) {
        			html += '<option value="' + json['zone'][i]['zone_id'] + '"';
	    			
					if (json['zone'][i]['zone_id'] == '<?php echo $zone_id; ?>') {
	      				html += ' selected="selected"';
	    			}
	
	    			html += '>' + json['zone'][i]['name'] + '</option>';
				}
			} else {
				html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
			}
			
			$('#payment-address select[name=\'zone_id\']').html(html);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$('#payment-address select[name=\'country_id\']').trigger('change');
//--></script>