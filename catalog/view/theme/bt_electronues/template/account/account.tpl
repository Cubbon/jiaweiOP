<?php echo $header; ?>  
<div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <a <?php echo (($breadcrumb==end($breadcrumbs))? 'class="last"':''); ?> href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><div class="boss_frame"><?php echo $content_top; ?>
  <div class="my_account">
		<div class="content myaccount">
		<h2><?php echo $text_my_account; ?></h2>
			<ul>
			  <li><a href="<?php echo $edit; ?>"><?php echo $text_edit; ?></a></li>
			  <li><a href="<?php echo $password; ?>"><?php echo $text_password; ?></a></li>
			  <li><a href="<?php echo $address; ?>"><?php echo $text_address; ?></a></li>
			  <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
			</ul>
		</div>
	
	  <div class="content myaccount">
	  <h2><?php echo $text_my_orders; ?></h2>
		<ul>
		  <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
		  <li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
		  <?php if ($reward) { ?>
		  <li><a href="<?php echo $reward; ?>"><?php echo $text_reward; ?></a></li>
		  <?php } ?>
		  <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
		  <li><a href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a></li>
 		  <li><a href="<?php echo $recurring; ?>"><?php echo $text_recurring; ?></a></li>
		</ul>
	  </div>
	  <div class="content myaccount">
	  <h2><?php echo $text_my_newsletter; ?></h2>
		<ul>
		  <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
		</ul>
	  </div>
</div>	
  <?php echo $content_bottom; ?></div></div>
<?php echo $footer; ?> 