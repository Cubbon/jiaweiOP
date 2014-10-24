</div>
</div>
</div>
<div id="footer" >
	<?php 
	$themeName = $this->config->get('config_template');
	require_once( DIR_TEMPLATE.$this->config->get('config_template')."/template/bossthemes/boss_library.php" );
	$helper = ThemeControlHelper::getInstance( $this->registry,$themeName);
	?>
	
	<div class="grid-container">
		<div class="grid-100 tablet-grid-100 mobile-grid-100">
		<!-- Footer Position -->
		<?php
			$modules =$helper->getModulesByPosition('footer'); 
			if( $modules ){
				foreach ($modules as $module) { 
					echo $module;
				} 
			} 
		?>
	</div></div>
	<div class="grid-container">
		<div class="grid-100 tablet-grid-100 mobile-grid-100">
		  <?php include "catalog/view/theme/".$this->config->get('config_template')."/template/bossthemes/Boss_footer_1.php"; ?>
		  
			<div class="footer-center">
			<div class="block-footer-left">
			  <?php if ($informations) { ?>
			  <div class="column">
				<h3><?php echo $text_information; ?></h3>
				<ul>
				  <?php foreach ($informations as $information) { ?>
				  <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
				  <?php } ?>
				</ul>
			  </div>
			  <?php } ?>
			  <div class="column">
				<h3><?php echo $text_service; ?></h3>
				<ul>
				  <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
				  <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
				  <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
				</ul>
			  </div>
			  <div class="column">
				<h3><?php echo $text_extra; ?></h3>
				<ul>
				  <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
				  <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
				  <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
				  <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
				</ul>
			  </div>
			  <div class="column">
				<h3><?php echo $text_account; ?></h3>
				<ul>
				  <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
				  <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
				  <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
				  <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
				</ul>
			  </div>
				<?php include "catalog/view/theme/".$this->config->get('config_template')."/template/bossthemes/Boss_footer_2.php"; ?>
			</div>	
				<?php include "catalog/view/theme/".$this->config->get('config_template')."/template/bossthemes/Boss_footer_3.php"; ?>
			</div>
			<div class="clear"></div>
			<div id="powered">
				<?php echo $powered; ?>
				<?php include "catalog/view/theme/".$this->config->get('config_template')."/template/bossthemes/Boss_footer_4.php"; ?>
			</div>
		  
		</div>
	</div>
</div>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->

<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->

</body></html>