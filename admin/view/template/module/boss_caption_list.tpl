<?php echo $header; ?>
<div id="content">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>
	<?php if ($error_warning) { ?>
		<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<div class="box">
		<div class="heading">
			<h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
			<div class="buttons">
				<a href="<?php echo $insert; ?>" class="button"><?php echo $button_insert; ?></a>
				<a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a>
			</div>
		</div>
		<div class="content">
			<form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
				<ul id="revlslide_caption">
					
				</ul>

				
			</form>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="view/stylesheet/bossthemes/boss_revlslider.css" />
<script type="text/javascript"><!--
$(function() {
	$( "#revlslide_caption" ).sortable();
});
//--></script>
<?php echo $footer; ?>