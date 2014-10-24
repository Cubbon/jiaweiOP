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
		<a href="<?php echo $boss_labels; ?>" style="display: inline;" class="selected"><?php echo $text_boss_labels; ?></a>
	</div>
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>     
    <div class="box">
		<div class="heading">
		  <h1><img src="view/image/image.png" alt="" /> <?php echo $text_heading; ?></h1>
		  <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
		</div>
		<div class="content">
		  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
			<table class="form">
			  <tr>
				<td><span class="required">*</span> <?php echo $entry_name; ?></td>
				<td><input type="text" name="label_image[name]" value="<?php echo $label_image['name']; ?>" size="100" />
			  </tr>
			  <tr>
				<td><?php echo $entry_image; ?></td>
				<td class="left"><div class="image">
					<img src="<?php echo $label_image['thumb']; ?>" alt="" id="thumb" />
					<input type="hidden" name="label_image[image]" value="<?php echo $label_image['image']; ?>" id="image"  />
					<br />
					<a onclick="image_upload('image', 'thumb');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb').attr('src', '<?php echo $no_image; ?>'); $('#image').attr('value', '');"><?php echo $text_clear; ?></a></div></td>
			  </tr>
			</table>
		  </form>
		</div>
    </div>
</div>
<?php echo $footer; ?>

<script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: '<?php echo $text_image_manager; ?>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
					dataType: 'text',
					success: function(data) {
						$('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
					}
				});
			}
		},	
		bgiframe: false,
		width: 700,
		height: 400,
		resizable: false,
		modal: false
	});
};
//--></script> 