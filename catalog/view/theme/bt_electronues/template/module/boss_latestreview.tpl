<div class="boss_lastestreview box">
  <div class="box-heading"><?php echo $heading_title; ?></div>
	<div class="box-content  list_carousel responsive" id="boss_lastestreview<?php echo $module; ?>">
		<?php if(!empty($products)){?>
		<ul class="latestreview_carouFredSel box-product">
		<?php 	$count = count($products);
				$i=0;
				if (!$use_scrolling_panel) { 
					$scroll = $count;
				}
				while ($i<$count) {
		?>
			<li> 
			<?php for($j=0; $j<$scroll && $i<$count; $j++){
				$product=$products[$i];
				$i++; ?>
				<div class="product_review<?php if($j==$scroll-1 || $i==$count){echo ' last';} ?>">
					<?php if ($product['thumb']) { ?>
					<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a></div>
					<?php } ?>
					<div class="detail">
					<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
					<div class="model"><?php echo $product['model']; ?></div>
					<?php if ($product['rating']) { ?>
					<div class="rating"><img src="catalog/view/theme/<?php echo $template; ?>/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
					<?php } ?>
					<?php if ($product['price']) { ?>
					<div class="price">
					  <?php if (!$product['special']) { ?>
					  <?php echo $product['price']; ?>
					  <?php } else { ?>
					  <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
					  <?php } ?>
					</div>
					<?php } ?>
					</div>
				</div>
			<?php } ?>
			</li>
		  <?php } ?>  
		</ul>
		<?php if ($use_scrolling_panel) { ?>
			<a id="prev_review<?php echo $module; ?>" class="prev" href="#">></a>
			<a id="next_review<?php echo $module; ?>" class="next" href="#"><</a>
		<?php } ?>
		<?php } ?>
  </div>
</div>

<?php if ($use_scrolling_panel) { ?>
<script type="text/javascript">	<!--
$(document).ready(function(){
	$('.latestreview_carouFredSel').carouFredSel({
		responsive: true,
		width: '100%',
		height: 'variable',
		prev: '#prev_review<?php echo $module; ?>',
		next: '#next_review<?php echo $module; ?>',
		auto: false,
		swipe: {
				onTouch : true
			},
		items: {
				width: 235,
				height: 'auto',
				visible: {
					min: 1,
					max: 1
				}
			},
		scroll: {
				direction : 'left',    //  The direction of the transition.
				duration  : 900   //  The duration of the transition.
			}
	});
});
//--></script>
<?php } ?>
