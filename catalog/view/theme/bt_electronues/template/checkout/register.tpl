<div class="center">
    <h2><?php echo $text_your_details; ?></h2>
    <dl>
        <dt><span class="required">*</span> <?php echo $entry_firstname; ?></dt>
        <dd><input type="text" name="firstname" value="" class="large-field" /></dd>
    </dl>
    <dl>
        <dt><span class="required">*</span> <?php echo $entry_telephone; ?></dt>
        <dd><input type="text" name="telephone" value="<?php echo $datanum;?>" class="large-field" /></dd>
    </dl>
    <dl>
        <dt><span class="required">*</span> <?php echo $entry_password; ?></dt>
        <dd><input type="password" name="password" value="" class="large-field" /></dd>
    </dl>
    <dl>
        <dt><span class="required">*</span> <?php echo $entry_confirm; ?></dt>
        <dd><input type="password" name="confirm" value="" class="large-field" /></dd>
    </dl>
</div>
<div style="clear: both; padding-top: 10px; font-weight:400;">
  <input type="checkbox" name="newsletter" value="1" id="newsletter" />&nbsp; &nbsp;
  <label for="newsletter"><?php echo $entry_newsletter; ?></label>
  <br />
  <?php if ($shipping_required) { ?>
  <input type="checkbox" name="shipping_address" value="1" id="shipping" checked="checked" />&nbsp; &nbsp;
  <label for="shipping"><?php echo $entry_shipping; ?></label>
  <?php } ?>
</div>
<?php if ($text_agree) { ?>
<div class="buttons">
  <div class="left">
    <input type="checkbox" name="agree" value="1" />&nbsp; &nbsp;<?php echo $text_agree; ?> <br/>
    <span class="button"><input type="button" value="<?php echo $button_continue; ?>" id="button-register" class="button" /></span>
  </div>
</div>
<?php } else { ?>
<div class="buttons">
  <div class="left">
    <span class="button"><input type="button" value="<?php echo $button_continue; ?>" id="button-register" class="button" /></span>
  </div>
</div>
<?php } ?>
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
<script type="text/javascript"></script> 
<script type="text/javascript"><!--
function get_Width_Height() {
	var array = new Array();
	if(getWidthBrowser() > 766){
		array[0] = 640;
		array[1] = 480;
	} else if(getWidthBrowser() < 767 && getWidthBrowser() > 480) {
		array[0] = 450;
		array[1] = 350;
	}else{
		array[0] = 300;
		array[1] = 300;
	}
	return array;
}
$('.colorbox').colorbox({
	width: get_Width_Height()[0],
	height: get_Width_Height()[1]
});
//--></script>  