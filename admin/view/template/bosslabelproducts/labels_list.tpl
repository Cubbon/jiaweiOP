<?php echo $header; ?>
<div id="content">
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <h1><?php echo $heading_title; ?></h1>
	<div  id="tabs" class="htabs">
		<a href="<?php echo $boss_settings; ?>" style="display: inline;"><?php echo $text_boss_settings; ?></a>
		<a href="<?php echo $boss_products; ?>" style="display: inline;"><?php echo $text_boss_products ; ?></a>
		<a href="<?php echo $boss_labels; ?>" style="display: inline;"  class="selected"><?php echo $text_boss_labels; ?></a>
	</div>
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<?php if ($success) { ?>
	<div class="success"><?php echo $success; ?></div>
	<?php } ?>     
    <div class="box">
		<div class="heading">
		  <h1><img src="view/image/image.png" alt="" /> <?php echo $text_heading; ?></h1>
		  <div class="buttons"><a onclick="location = '<?php echo $insert; ?>'" class="button"><?php echo $button_insert; ?></a><a onclick="$('#form').submit();" class="button"><?php echo $button_delete; ?></a></div>
		</div>
		
		<div class="content">
			<form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
			<table class="list">
			  <thead>
				<tr>
				  <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
				  <td class="center"><?php echo $column_image; ?></td>
				  <td class="left"><?php if ($sort == 'name') { ?>
					<a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
					<?php } else { ?>
					<a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
					<?php } ?></td>
				  <td class="center"><?php echo $column_action; ?></td>
				</tr>
			  </thead>
			  <tbody>
				<?php if ($labels) { ?>
				<?php foreach ($labels as $label) { ?>
				<tr>
				  <td class="center"><?php if ($label['selected']) { ?>
					<input type="checkbox" name="selected[]" value="<?php echo $label['label_id']; ?>" checked="checked" />
					<?php } else { ?>
					<input type="checkbox" name="selected[]" value="<?php echo $label['label_id']; ?>" />
					<?php } ?></td>
				  <td class="center"><img src="<?php echo $label['image']; ?>" alt="<?php echo $label['name']; ?>" /></td>
				  <td class="left"><?php echo $label['name']; ?></td>
				  <td class="center"><?php foreach ($label['action'] as $action) { ?>
					[ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
					<?php } ?></td>
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr>
				  <td class="center" colspan="4"><?php echo $text_no_results; ?></td>
				</tr>
				<?php } ?>
			  </tbody>
			</table>
		  </form>
		<div class="pagination"><?php echo $pagination; ?></div>
		</div>
    </div>
</div>
<?php echo $footer; ?>