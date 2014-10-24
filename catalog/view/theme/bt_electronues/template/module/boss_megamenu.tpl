<?php 
if($data_template){
	echo $data_template;
} else { ?>
<?php 
	function showSubmenu($category) {
		if (count($category['children']) > 0) {
			echo '<div class="sub_menu"><ul>';
			foreach ($category['children'] as $cat) {
				echo '<li><a href="'.$cat['href'].'">'.$cat['name'].'</a>';
				showSubmenu($cat);
				echo '</li>';
			}
			echo '</ul></div>';
		}
	}
	function showmenuChild($category) {
		if (count($category['children']) > 0) {
			echo '<ul>';
			foreach ($category['children'] as $cat) {
				(($cat['children'])? $parent = ' class="parent"' : $parent='');
				echo '<li'.$parent.'><a href="'.$cat['href'].'">'.$cat['name'].'</a>';
				showmenuChild($cat);
				echo '</li>';
			}
			echo '</ul>';
		}
	}
?>

<?php if ($this->config->get('b_General_Menu')) { ?>

				
<div class="quick-select">
<p><span><?php echo $menu_title; ?></span></p>
<div class="sub-inside mobile" id="boss_menu" >
	<ul class="display-menu">
	<?php foreach ($menus as $menu) { ?>
	<li class="menu_item level-1 parent<?php if (count($menu['menuchilds']) > 0) { ?> menu_check_child<?php } ?>">
		<a class="title_menu_parent" href="<?php echo $menu['href']; ?>"><?php if($menu['image']){ ?><img title="<?php echo $menu['title'] ?>" src="<?php echo $menu['image']; ?>" alt="<?php echo $menu['title'] ?>"><?php } ?>
		<span><?php echo $menu['title'] ?></span><?php if (count($menu['menuchilds']) > 0) { ?><b></b><?php } ?></a>
		
		<?php if (count($menu['menuchilds']) > 0) { ?>
		<div class="dropdown" style="width: <?php echo $menu['dropdown_width']; ?>px;">
		
			<?php foreach ($menu['menuchilds'] as $menuchild) { ?>
			<dl>

			<!--<div class="option" style="width: <?php echo $menuchild['child_width']; ?>px; float: left">-->
				<!--<a href="<?php echo $menuchild['href']; ?>"><?php echo $menuchild['title'] ?></a>-->
				<!-- html-->
				<?php if ($menuchild['type'] == 'html') { ?>
					<div class="staticblock"><?php echo $menuchild['content']; ?></div>
				<?php } ?>
				<?php if ($menuchild['type'] == 'url') { ?>
					<div class="url"><a href="<?php echo $menuchild['href']; ?>"><?php echo $menuchild['content']; ?></a></div>
				<?php } ?>
				<!-- information -->
				<?php if ($menuchild['type'] == 'information') { ?>
					<ul class="column information">
						<?php foreach($menuchild['content'] as $information) { ?>
						<li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
				
				<!-- manufacturer -->
				<?php if ($menuchild['type'] == 'manufacturer') { ?>
					<ul class="column manufacturer">
						<?php foreach($menuchild['content'] as $manufacturer) { ?>
							<li><a href="<?php echo $manufacturer['href']; ?>">
								<?php if ($manufacturer['show_image']) { ?><img src="<?php echo $manufacturer['image']; ?>" alt="<?php echo $manufacturer['name']; ?>"/><?php } ?>
								<?php if ($manufacturer['show_name']) { ?><?php echo $manufacturer['name']; ?><?php } ?>
							</a></li>
						<?php } ?>
					</ul>
				<?php } ?>
				
				<!-- category -->
				<?php if ($menuchild['type'] == 'category') { ?>
					<dt>
					<?php if ($menuchild['parent']) { ?>
						<?php if($menuchild['parent']['show_parent']){?>
							<a href="<?php echo $menuchild['parent']['href']; ?>" class="">
								<?php if (($menuchild['parent']['show_image'])&&$menuchild['parent']['image']) { ?>
								<img src="<?php echo $menuchild['parent']['image']; ?>" alt="<?php echo $menuchild['parent']['name']; ?>" /><?php } ?>
								<?php echo $menuchild['parent']['name']; ?>
							</a>
						<?php } ?>
					<?php } ?>
					</dt>
					<!--<ul class="column category">-->
						<dd>
						
						<?php foreach($menuchild['content'] as $category) { ?>
							<em>
								<a href="<?php echo $category['href']; ?>">
								<?php if (($category['show_image']) && $category['image']) { ?><img src="<?php echo $category['image']; ?>" alt="<?php echo $category['name']; ?>"/><?php } ?>
								<?php echo $category['name']; ?>
								</a>
								<?php if ($category['show_sub']) { showSubmenu($category); } ?>
							</em>
						<?php } ?>
						
						</dd>
					<!--</ul>-->
				<?php } ?>
				
				<!-- product -->
				<?php if ($menuchild['type'] == 'product') { ?>
					<ul class="column product">
						<?php foreach($menuchild['content'] as $product) { ?>
							<li>
								<?php if ($product['thumb']) { ?><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>"/></a><?php } ?>
									<a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
									<div class="model"><?php echo $product['model']; ?></div>
									<?php if ($product['rating']) { ?>
									<div class="rating"><img src="catalog/view/theme/bt_electronues/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
									<?php } ?>
									<?php if (!$product['special']) { ?>
										<span class="price"><?php echo $product['price']; ?></span>
									<?php } else { ?>
										<span class="price-old"><?php echo $product['price']; ?></span>
										<span class="price-new"><?php echo $product['special']; ?></span>
									<?php } ?>
							</li>
						<?php } ?>
					</ul>
				<?php } ?>
				
			<!--</div> -->
			</dl>
			<span class="spanOption" style="width: <?php echo $menuchild['child_width']; ?>px;" ></span>
			<?php } ?>			
		</div>
		<span class="spanOptionList" style="width: <?php echo $menu['dropdown_width']; ?>px;" ></span>
		<?php } ?>		
	</li>
	<?php } ?>
	</ul>
</div>

</div>
<?php } ?>
<div id="megamenu-responsive" class="hide-on-desktop hide-on-tablet" >

	<ul id="megamenu-responsive-root">
		<li class="menu-toggle"><span><?php echo $menu_title; ?><b></b></span></li>
		<li class="root">
			<ul>
			<?php foreach ($categories as $category) { ?>
				<li <?php if ($category['children']) echo 'class="parent"'; ?>><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
				  <?php if ($category['children']) { ?>
				
					<?php for ($i = 0; $i < count($category['children']);) { ?>
					<ul>
					  <?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
					  <?php for (; $i < $j; $i++) { ?>
					  <?php if (isset($category['children'][$i])) { ?>
					  <li class="parent">
					  <a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a>
					  <?php showmenuChild($category); ?>
					  </li>
					  <?php } ?>
					  <?php } ?>
					</ul>
					<?php } ?>
				 
				  <?php } ?>
				</li>
			<?php } ?>
				<li><a href="index.php?route=bossblog/bossblog">Blog</a></li>
			</ul>
		</li>
	</ul>
	<script type="text/javascript">
	$('document').ready(function(){
		$('#megamenu-responsive-root li.parent').prepend('<p>+</p>');
		
		$('.menu-toggle').click(function(){
			$('.root').toggleClass('open');
		});
		
		$('#megamenu-responsive-root li.parent > p').click(function(){

			if ($(this).text() == '+'){
				$(this).parent('li').children('ul').slideDown(300);
				$(this).text('-');
			}else{
				$(this).parent('li').children('ul').slideUp(300);
				$(this).text('+');
			}
			
		});
	});
	</script>
</div>

<?php } ?>