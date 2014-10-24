<?php
$style = '<style type="text/css">
    .labeltable {margin:20px 0; width:100%; border:1px solid #dfdfdf; }
    .labeltable tr {vertical-align:middle; border-bottom:1px solid #dfdfdf; padding:15px 5px; font-weight:bold; background:#fff; text-align:left; }
    .labeltable th, .labeltable td {vertical-align:middle; border-bottom:1px solid #dfdfdf; padding:10px 5px; background:#fff; }
    .labeltable tr.black td, .labeltable tr.black th {background:#f9f9f9; }
    .labeltable tr.last td, .labeltable tr.last th{border:none; }
</style>';
$header = str_replace('</head>',$style.'</head>',$header);
echo $header; ?>
<div id="content">
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <h1><?php echo $heading_title; ?></h1>
	<div  id="tabs" class="htabs">
		<a href="<?php echo $boss_settings; ?>" style="display: inline;"><?php echo $text_boss_settings; ?></a>
		<a href="<?php echo $boss_products; ?>" style="display: inline;" class="selected"><?php echo $text_boss_products ; ?></a>
		<a href="<?php echo $boss_labels; ?>" style="display: inline;"><?php echo $text_boss_labels; ?></a>
	</div>
         
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<div class="box">
		<div class="heading">
			<h1><img src="view/image/product.png" alt="" /> <?php echo $text_heading; ?></h1>
			<div class="buttons">
			<a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a>
			<a onclick="location = '<?php echo $cancel; ?>'" class="button"><?php echo $button_cancel; ?></a></div>
		</div>
		<div class="content">
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
				<table class="labeltable">
					<tr>
						<td><?php echo $entry_product_name; ?></td>
						<td><input type="text" disabled="disabled" value="<?php echo $product_label['product_name']; ?>" size="100" /></td>
						<input type="text" style="display:none" name="product_label[product_id]" value="<?php echo $product_label['product_id']; ?>" size="100" />
					</tr>
					<tr class="black">
						<td><?php echo $entry_top_left; ?></td>
						<td><select name="product_label[top_left]" style="float:left; margin:10px 10px 0 0" onchange="checkImage(this.value,'topleft');">
							<?php if($product_label['top_left'] == 0) { ?>
								<option value="0" selected="selected"><?php echo "None"; ?></option>
							<?php } else { ?>
								<option value="0"><?php echo "None"; ?></option>
							<?php } ?>
							<?php foreach($labels as $label){ ?>
								<?php if ($label['label_id']  == $product_label['top_left']) { ?>
								<option value="<?php echo $label['label_id'] ?>" selected="selected"><?php echo $label['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $label['label_id'] ?>"><?php echo $label['name']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
						<?php if($product_label['top_left']==0){ ?>
						<div class="label_image_topleft"></div>
						<?php }else{ ?>
							<?php foreach($labels as $label){ ?>
								<?php if ($label['label_id']  == $product_label['top_left']) { ?>
								<div class="label_image_topleft">
									<img alt="<?php echo $label['name']; ?>" src="<?php echo $label['image']; ?>" />
								</div>
								<?php } ?>
							<?php } ?>
						<?php } ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $entry_top_right; ?></td>
						<td><select name="product_label[top_right]" style="float:left; margin:10px 10px 0 0" onchange="checkImage(this.value,'topright');">
							<?php if($product_label['top_right'] == 0) { ?>
								<option value="0" selected="selected"><?php echo "None"; ?></option>
							<?php } else { ?>
								<option value="0"><?php echo "None"; ?></option>
							<?php } ?>
							<?php foreach($labels as $label){ ?>
								<?php if ($label['label_id']  == $product_label['top_right']) { ?>
								<option value="<?php echo $label['label_id'] ?>" selected="selected"><?php echo $label['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $label['label_id'] ?>"><?php echo $label['name']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
						<?php if($product_label['top_right']==0){ ?>
						<div class="label_image_topright"></div>
						<?php }else{ ?>
							<?php foreach($labels as $label){ ?>
								<?php if ($label['label_id']  == $product_label['top_right']) { ?>
								<div class="label_image_topright">
									<img alt="<?php echo $label['name']; ?>" src="<?php echo $label['image']; ?>" />
								</div>
								<?php } ?>
							<?php } ?>
						<?php } ?>
						</td>
					</tr>
					<tr class="black">
						<td><?php echo $entry_center; ?></td>
						<td><select name="product_label[center]" style="float:left; margin:10px 10px 0 0" onchange="checkImage(this.value,'center');">
							<?php if($product_label['center'] == 0) { ?>
								<option value="0" selected="selected"><?php echo "None"; ?></option>
							<?php } else { ?>
								<option value="0"><?php echo "None"; ?></option>
							<?php } ?>
							<?php foreach($labels as $label){ ?>
								<?php if ($label['label_id']  == $product_label['center']) { ?>
								<option value="<?php echo $label['label_id'] ?>" selected="selected"><?php echo $label['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $label['label_id'] ?>"><?php echo $label['name']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
						<?php if($product_label['center']==0){ ?>
						<div class="label_image_center"></div>
						<?php }else{ ?>
							<?php foreach($labels as $label){ ?>
								<?php if ($label['label_id']  == $product_label['center']) { ?>
								<div class="label_image_center">
									<img alt="<?php echo $label['name']; ?>" src="<?php echo $label['image']; ?>" />
								</div>
								<?php } ?>
							<?php } ?>
						<?php } ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $entry_bottom_left; ?></td>
						<td><select name="product_label[bottom_left]" style="float:left; margin:10px 10px 0 0" onchange="checkImage(this.value,'bottomleft');">
							<?php if($product_label['bottom_left'] == 0) { ?>
								<option value="0" selected="selected"><?php echo "None"; ?></option>
							<?php } else { ?>
								<option value="0"><?php echo "None"; ?></option>
							<?php } ?>
							<?php foreach($labels as $label){ ?>
								<?php if ($label['label_id']  == $product_label['bottom_left']) { ?>
								<option value="<?php echo $label['label_id'] ?>" selected="selected"><?php echo $label['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $label['label_id'] ?>"><?php echo $label['name']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
						<?php if($product_label['bottom_left']==0){ ?>
						<div class="label_image_bottomleft"></div>
						<?php }else{ ?>
							<?php foreach($labels as $label){ ?>
								<?php if ($label['label_id']  == $product_label['bottom_left']) { ?>
								<div class="label_image_bottomleft">
									<img alt="<?php echo $label['name']; ?>" src="<?php echo $label['image']; ?>" />
								</div>
								<?php }?>
							<?php }?>
						<?php } ?>
						</td>
					</tr>
					<tr class="black last">
						<td><?php echo $entry_bottom_right; ?></td>
						<td><select name="product_label[bottom_right]" style="float:left; margin:10px 10px 0 0" onchange="checkImage(this.value,'bottomright');">
							<?php if($product_label['bottom_right'] == 0) { ?>
								<option value="0" selected="selected"><?php echo "None"; ?></option>
							<?php } else { ?>
								<option value="0"><?php echo "None"; ?></option>
							<?php } ?>
							<?php foreach($labels as $label){ ?>
								<?php if ($label['label_id']  == $product_label['bottom_right']) { ?>
								<option value="<?php echo $label['label_id'] ?>" selected="selected"><?php echo $label['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $label['label_id'] ?>"><?php echo $label['name']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
						<?php if($product_label['bottom_right']==0){ ?>
						<div class="label_image_bottomright"></div>
						<?php }else{ ?>
							<?php foreach($labels as $label){ ?>
								<?php if ($label['label_id']  == $product_label['bottom_right']) { ?>
								<div class="label_image_bottomright">
									<img alt="<?php echo $label['name']; ?>" src="<?php echo $label['image']; ?>" />
								</div>
								<?php }?>
							<?php } ?>
						<?php } ?>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<script text="text/javascript"><!--
function checkImage($id_lable,$position){
	$('.label_image_'+$position).each(function(index, element) {
	if($id_lable==0){
		html = '';
	}else{
		<?php foreach($labels as $label){ ?>
			$label_id = <?php echo $label['label_id']; ?>;
			if ($label_id  == $id_lable) { 
				html = '<img alt="<?php echo $label['name']; ?>" src="<?php echo $label['image']; ?>" />';
			}
		<?php } ?>	
	}
	$(element).html(html);	
	});
}
//--></script>
<?php echo $footer; ?>

