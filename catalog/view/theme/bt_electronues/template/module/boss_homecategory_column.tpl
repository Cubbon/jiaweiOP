<?php if(!empty($modules)){ ?>
<div class="box boss_homecategory_column" id="boss_homecategory_column_<?php echo $module; ?>">
	<div class="box-heading color-heading"><span><?php echo $modules['name']; ?></span></div>
	<div class="box-content">
		<?php if(!empty($modules['products'])){ ?>
			<ul class="box-product">
			<?php foreach ($modules['products'] as $product){ ?>
				<li>
					<?php if ($product['thumb']) { ?>
						<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>"/></a></div>
					<?php } ?>
					<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>	
					<?php if ($product['rating']) { ?>
						<div class="rating"><img src="catalog/view/theme/bt_electronues/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
					<?php } ?>					
					<?php if ($product['price']) { ?>
						<div class="price">
						  <?php if (!$product['special']) { ?>
						  <?php echo $product['price']; ?>
						  <?php } else { ?>
						  <span class="price-old"><?php echo $product['price']; ?></span> 
						  <span class="price-new"><?php echo $product['special']; ?></span>
						  <?php } ?>
						</div>
					<?php } ?>
				</li>
				<?php } ?>
				<a class="viewmore" href="<?php echo $modules['href']; ?>"><span><?php echo $text_view_all; ?></span><b></b></a>
			</ul>
		<?php } ?>
	</div>
</div>
<?php } ?>
	