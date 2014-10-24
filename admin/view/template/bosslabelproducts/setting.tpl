<?php
$style = '<style type="text/css">
    .labeltable {margin:20px 0; width:100%; border:1px solid #dfdfdf; }
    .labeltable th {vertical-align:middle; border-bottom:1px solid #dfdfdf; padding:15px 5px; font-weight:bold; background:#fff; text-align:left; }
    .labeltable tr {vertical-align:middle; border-bottom:1px solid #dfdfdf; padding:15px 5px; background:#fff; text-align:left; }
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
	<div id="tabs" class="htabs">
		<a href="<?php echo $boss_settings; ?>" style="display: inline;" class="selected"><?php echo $text_boss_settings; ?></a>
		<a href="<?php echo $boss_products; ?>" style="display: inline;"><?php echo $text_boss_products ; ?></a>
		<a href="<?php echo $boss_labels; ?>" style="display: inline;"><?php echo $text_boss_labels; ?></a>
	</div>
    <?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<?php if ($success) { ?>
	<div class="success"><?php echo $success; ?></div>
	<?php } ?>     
	<div class="box">
		<div class="heading">
			<h1><img src="view/image/setting.png" alt="" /> <?php echo $text_heading; ?></h1>
			<div class="buttons">
				<a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a>
				<a onclick="location = '<?php echo $cancel; ?>'" class="button"><?php echo $button_cancel; ?></a>
			</div>
		</div>
		
		<div class="content">
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
			<table class="labeltable">
			  <tbody>	
				<tr class="black" >
					<th width="25%" ><?php echo $text_product_page; ?></th>
					<td width="75%" > <input type="radio" name="boss_label_products_setting[product]" value="1"  <?php if($module['product'] == '1') echo 'checked="checked"'; ?> /><?php echo $text_enabled; ?>
					<input type="radio" name="boss_label_products_setting[product]" value="0"  <?php if($module['product'] == '0') echo 'checked="checked"'; ?> /><?php echo $text_disabled; ?> </td>
				</tr>
				<tr>
					<th width="25%" ><?php echo $text_category_page; ?></th>
					<td width="75%" ><input type="radio" name="boss_label_products_setting[category]" value="1"  <?php if($module['category'] == '1') echo 'checked="checked"'; ?> /><?php echo $text_enabled; ?>
					<input type="radio" name="boss_label_products_setting[category]" value="0"  <?php if($module['category'] == '0') echo 'checked="checked"'; ?> /><?php echo $text_disabled; ?>
					</td>
				</tr>
				<tr class="black" >
					<th width="25%" ><?php echo $text_manufacturer_page; ?></th>
					<td width="75%" ><input type="radio" name="boss_label_products_setting[manufacturer]" value="1"  <?php if($module['manufacturer'] == '1') echo 'checked="checked"'; ?> /><?php echo $text_enabled; ?>
					<input type="radio" name="boss_label_products_setting[manufacturer]" value="0"  <?php if($module['manufacturer'] == '0') echo 'checked="checked"'; ?> /><?php echo $text_disabled; ?>
					</td>
				</tr>
				<tr>
					<th width="25%" ><?php echo $text_special_page; ?></th>
					<td width="75%" ><input type="radio" name="boss_label_products_setting[special]" value="1"  <?php if($module['special'] == '1') echo 'checked="checked"'; ?> /><?php echo $text_enabled; ?>
					<input type="radio" name="boss_label_products_setting[special]" value="0"  <?php if($module['special'] == '0') echo 'checked="checked"'; ?> /><?php echo $text_disabled; ?>
					</td>
				</tr>
				<tr class="black last">
					<th width="25%" ><?php echo $text_search_page; ?></th>
					<td width="75%" ><input type="radio" name="boss_label_products_setting[search]" value="1"  <?php if($module['search'] == '1') echo 'checked="checked"'; ?> /><?php echo $text_enabled; ?>
					<input type="radio" name="boss_label_products_setting[search]" value="0"  <?php if($module['search'] == '0') echo 'checked="checked"'; ?> /><?php echo $text_disabled; ?>
					</td>
				</tr>
			  </tbody>
			</table>
		  </form>
		</div>
    </div>
</div>
<?php echo $footer; ?>