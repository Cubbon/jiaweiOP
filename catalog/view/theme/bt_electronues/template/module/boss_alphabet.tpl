<div class="box box-alphabet">
  <div class="box-heading"><?php echo $heading_title; ?></div>
  <div class="box-content">
    <div class="boss-alphabet">
      <ul>
        <?php foreach ($alphabet as $char) { ?>
        <li><a href="<?php echo $char['href']; ?>"><?php echo $char['char']; ?></a></li>
        <?php } ?>
      </ul>
	</div>
  </div>
</div>
