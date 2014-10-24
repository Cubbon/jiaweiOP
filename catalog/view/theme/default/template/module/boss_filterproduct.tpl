<script type="text/javascript">
  jQuery(document).ready(function($){
  
	//	Here we init carousel, call function "initCarousel"
	initCarousel();
	
	checkDevices();
	
	//  When user clicks on tab, this code will be executed
	$(".head_tabs").click(function() {
	
		<?php if(!$use_tab) { ?>
		if(getWidthBrowser() > 767){
			return false;
		}
		<?php } ?>
		
		if(!$(this).parent().hasClass('active')) {
			//  First remove class "active" from currently active tab
			$(".head_tabs").parent().removeClass("active");
			
			//  Here we get the data-src(parent) value of the selected tab
			var $src_tab = $(this).attr("data-src");
			
			//  Now add class "active" to the selected/clicked tab
			$($src_tab).parent().addClass("active");
			
			//  Hide all tab content
			$(".content_tabs").hide();
			
			//  Here we get the href value of the selected tab
			var $selected_tab = $(this).attr("href");
			  
			//  Show the selected tab content
			$($selected_tab).fadeIn();
			
			<?php if ($use_scrolling_panel) { ?>
			//  Here we get the href value of the selected tab
			var $selected_carousel = $(this).attr("data-crs");
			
			// Update the selected carsoule content
			if($selected_carousel != ""){
			
				//	Here we call function "execCarousel"
				execCarousel($selected_carousel);
			}
			<?php } ?>
		}

		//  At the end, we add return false so that the click on the link is not executed
		return false;
	});
	
	//	Here we init all the carousel
	function initCarousel()
	{
		<?php if(!$use_tab) { ?>
			
			//	Only init the carousel for the content in actived tab, because after click the tab, we will init it again
			var $tabs = $(".head_tabs");
			
			<?php if ($use_scrolling_panel) { ?>
			$tabs.each(function() {
			
				//  Here we get the data-crs(carousel) value of the selected tab
				var $carousel = $(this).attr("data-crs");
				
				//	Here we call function "execCarousel"
				execCarousel($carousel);
				
			});
			<?php } ?>
		<?php } else { ?>
		
			//	Only init the carousel for the content in actived tab, because after click the tab, we will init it again
			var $tabs = $("#tabs li.active").first();
			
			<?php if ($use_scrolling_panel) { ?>
			//  Here we get the data-crs(carousel) value of the selected tab
			var $carousel = $($tabs).find("a").attr("data-crs");
			
			//	Here we call function "execCarousel"
			execCarousel($carousel);
			<?php } ?>
		<?php } ?>
	}
	
	//	Here we exec the carousel
	function execCarousel($carousel) {
	
		$($carousel).carouFredSel({
			responsive: true,
			width: '100%',
			prev: $($carousel).attr("data-prev"),
			next: $($carousel).attr("data-next"),
			auto: false,
			swipe: {
					onTouch : true
				},
			items: {
					width: 235,
					height:310,
					visible: {
						min: 1,
						max: 5
					}
				},
			scroll: {
					direction : 'left',    //  The direction of the transition.
					duration  : 900   //  The duration of the transition.
				}
		});
	}
	
	//
	function checkDevices(){
		
		<?php if(!$use_tab) { ?>
		if(getWidthBrowser() > 767){
			$('.content_tabs').show();
			$('.home_filter_content h3').addClass('color_active');
		}
		else {
			$('.content_tabs').hide();
			$('.home_filter_content h3').removeClass('color_active');
			var $tabs = $(".head_tabs");
			$tabs.each(function() {
			
				//  Here we get the active element
				var parent = $(this).parent();
				if($(parent).hasClass('active')){
					
					var href = $(parent).find("a").attr("href");
					$(href).show();
					//break;
				}
			});
		}
		<?php } ?>
	}
	
	// 
	$(window).resize(function() {
		checkDevices();
	});
  });
</script>

<?php if(!empty($tabs)){ ?>
<div id="boss_homefilter_tabs<?php echo $module; ?>" class="grid-container boss_homefilter_tabs">
  
  <div id="tabs_container" class="hide-on-mobile">
  <?php if($use_tab){ ?>
	<ul id="tabs" class="tabs-headings">
	<?php foreach ($tabs as $numTab => $tab) { ?>
		 <li <?php if($numTab == 0) echo 'class="active"'; ?>><a class="head_tab<?php echo $numTab.$module; ?> head_tabs" href="#content_tab<?php echo $numTab.$module; ?>" data-src=".head_tab<?php echo $numTab.$module; ?>" data-crs="#carousel_tab<?php echo $numTab.$module; ?>"><?php echo $tab['title']; ?><b></b></a></li>
	<?php } ?>
	</ul>
  <?php } ?>
  </div>
  
  <div id="tabs_content_container" class="home_filter_content">
  <div class="box-content">
	<?php foreach ($tabs as $numTab => $tab) { ?>
    <h3  class="<?php if($numTab == 0) echo 'active'; ?> <?php if($use_tab){ echo 'hide-on-desktop';} ?>"><a class="head_tab<?php echo $numTab.$module; ?> head_tabs" href="#content_tab<?php echo $numTab.$module; ?>" data-src=".head_tab<?php echo $numTab.$module; ?>" data-crs="#carousel_tab<?php echo $numTab.$module; ?>"><?php echo $tab['title']; ?></a></h3>
	
    <div id="content_tab<?php echo $numTab.$module; ?>" class="content_tabs list_carousel responsive" style="display:<?php if($numTab == 0) echo 'block'; else echo 'none'; ?>">
      <?php if(!empty($tab['products'])){ ?>
		<ul id="carousel_tab<?php echo $numTab.$module; ?>" data-prev="#prev_tab<?php echo $numTab.$module; ?>" data-next="#next_tab<?php echo $numTab.$module; ?>" class="box-product">
			<?php foreach ($tab['products'] as $product) { ?>
			  <li>
				<?php if ($product['thumb']) { ?>
				<div class="image">
					<div class="label">
					<?php if ($product['price'] && $product['special']) { ?>
						<img src="http://192.168.1.101/30_Perfume/trunk/site/image/data/bt_perfume/sale_label.png"; alt="" title ="" />
					<?php } ?>
					</div>
				<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>"/></a>
				</div>
				<?php } ?>
				<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
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
				<a onclick="boss_addToCart('<?php echo $product['product_id']; ?>');" class="button"><?php echo $button_cart; ?></a>
			  </li>
			<?php } ?>
		</ul>
		<div class="clearfix"></div>
		<?php if ($use_scrolling_panel) { ?>
			<a id="prev_tab<?php echo $numTab.$module; ?>" class="prev" href="#">&lt;</a>
			<a id="next_tab<?php echo $numTab.$module; ?>" class="next" href="#">&gt;</a>
		<?php } ?>
		<?php } ?>
    </div>
	<?php } ?>
  </div>
  </div>
</div>
<?php } ?>