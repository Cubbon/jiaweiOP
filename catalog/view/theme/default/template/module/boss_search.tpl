<div id="boss-search" >
<div class="choose-select">
	<span class="title">Search</span>
	<div class="input_cat">
    <select name="filter_category_id" id="boss_filter_search">
        <?php if (0 == $filter_category_id) { ?>
			<option value="0" selected="selected"><?php echo $text_category; ?></option>
		<?php } else { ?>
			<option value="0"><?php echo $text_category; ?></option>
		<?php } ?>
        <?php foreach ($categories as $category_1) { ?>
			<?php if ($category_1['category_id'] == $filter_category_id) { ?>
			<option class="option-1" value="<?php echo $category_1['category_id']; ?>" selected="selected"><?php echo $category_1['name']; ?></option>
			<?php } else { ?>
			<option class="option-1" value="<?php echo $category_1['category_id']; ?>"><?php echo $category_1['name']; ?></option>
			<?php } ?>
			<?php foreach ($category_1['children'] as $category_2) { ?>
				<?php if ($category_2['category_id'] == $filter_category_id) { ?>
				<option class="option-2" value="<?php echo $category_2['category_id']; ?>" selected="selected"><?php echo $category_2['name']; ?></option>
				<?php } else { ?>
				<option class="option-2" value="<?php echo $category_2['category_id']; ?>"><?php echo $category_2['name']; ?></option>
				<?php } ?>
				<?php foreach ($category_2['children'] as $category_3) { ?>
					<?php if ($category_3['category_id'] == $filter_category_id) { ?>
					<option class="option-3" value="<?php echo $category_3['category_id']; ?>" selected="selected"><?php echo $category_3['name']; ?></option>
					<?php } else { ?>
					<option class="option-3" value="<?php echo $category_3['category_id']; ?>"><?php echo $category_3['name']; ?></option>
					<?php } ?>
				<?php } ?>
			<?php } ?>
        <?php } ?>
	</select>
	</div>
	<div class="bkg_input_search">
		<input type="text" name="filter_name" placeholder="<?php echo $entry_search; ?>" value="<?php echo $filter_name; ?>" />
		<input title="<?php echo $button_search; ?>" type="button" value="<?php echo $button_search; ?>" id="boss-button-search" class="button-search" />
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$("#boss_filter_search").selectbox();
});
</script>
</div>