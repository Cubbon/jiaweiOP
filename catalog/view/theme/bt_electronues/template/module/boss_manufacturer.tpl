<div class="manuff_block box">
	<div class="box-heading"> <?php echo $by_brand; ?> </div>
	<div class="box-content">
    <select onchange="location = this.value">
      <option value=""><?php echo $heading_title; ?></option>
      <?php foreach ($manufacturers as $manufacturer) { ?>
      <?php if ($manufacturer['manufacturer_id'] == $manufacturer_id) { ?>
      <option value="<?php echo $manufacturer['href']; ?>" selected="selected"><?php echo $manufacturer['name']; ?></option>
      <?php } else { ?>
      <option value="<?php echo $manufacturer['href']; ?>"><?php echo $manufacturer['name']; ?></option>
      <?php } ?>
      <?php } ?>
    </select>
	</div>
</div>