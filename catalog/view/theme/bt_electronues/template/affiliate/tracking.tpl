<?php echo $header; ?>
<div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <a <?php echo (($breadcrumb==end($breadcrumbs))? 'class="last"':''); ?> href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><div class="boss_frame"><?php echo $content_top; ?>

  <h1><?php echo $heading_title; ?></h1>
  <p><?php echo $text_description; ?></p>
  <p><?php echo $text_code; ?><br />
    <textarea cols="40" rows="5"><?php echo $code; ?></textarea>
  </p>
  <p><?php echo $text_generator; ?><br />
    <input type="text" name="product" value="" />
  </p>
  <p><?php echo $text_link; ?><br />
    <textarea name="link" cols="40" rows="5"></textarea>
  </p>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><span><?php echo $button_continue; ?></span></a></div>
  </div>
  <?php echo $content_bottom; ?></div></div>
<script type="text/javascript"><!--
$('input[name=\'product\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=affiliate/tracking/autocomplete&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.link
					}
				}));
			}
		});
	},
	select: function(event, ui) {
		$('input[name=\'product\']').attr('value', ui.item.label);
		$('textarea[name=\'link\']').attr('value', ui.item.value);
						
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});
//--></script>
<?php echo $footer; ?>