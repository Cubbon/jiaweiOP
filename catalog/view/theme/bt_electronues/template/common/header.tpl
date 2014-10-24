<?php 
$themeName = $this->config->get('config_template');
require_once( DIR_TEMPLATE.$this->config->get('config_template')."/template/bossthemes/boss_library.php" );
$helper = ThemeControlHelper::getInstance( $this->registry,$themeName);
//print_r($helper);die;
?>
<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<head>
<meta charset="UTF-8" />
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<!--unsemantic-->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<!--unsemantic-->
<?php if ($icon) { ?>
<link href="<?php echo $icon; ?>" rel="icon" />
<?php } ?>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/stylesheet.css" />
<?php foreach ($styles as $style) { ?>
<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>


<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/boss_add_cart.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/boss_carousel.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/boss_megamenu.css" />
<script type="text/javascript" src="catalog/view/javascript/common.js"></script>
<?php foreach ($scripts as $script) { ?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>
<!---->
<script type="text/javascript" src="catalog/view/javascript/bossthemes/getwidthbrowser.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/bossthemes.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/notify.js"></script>	
<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.selectbox-0.2.js"></script>

<link href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/unsemantic/unsemantic-grid-base.css" rel="stylesheet" type="text/css" media="all" />
<?php if (!$this->config->get('b_General_Respon')) { ?>
<script>
	$(document).ready(function() {
		var body = $("body").outerWidth();
		if(body > 1200){
			$("#container").css("width", body);
		}else{
			$("#container").css("width", 1200);
		}
	});
</script>
<link href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/unsemantic/unsemantic-grid-desktop.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/responsive.css" />
<script>
		  var ADAPT_CONFIG = {
			path: 'catalog/view/theme/<?php echo $themeName;?>/stylesheet/unsemantic/',
			dynamic: true,
			range: [
			  '0 to 767px = unsemantic-grid-mobile.css',
			  '767 to 1024px = unsemantic-grid-tablet.css',
			  '1024px = unsemantic-grid-desktop.css'
			]
		  };
</script>
<script>
if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
  var viewportmeta = document.querySelector('meta[name="viewport"]');
  if (viewportmeta) {
    viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0';
    document.addEventListener('gesturestart', function() {
      viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
    }, false);
  }
}
 </script>
 <script type="text/javascript" src="catalog/view/javascript/bossthemes/unsemantic/adapt.min.js"></script>
 <!--unsemantic-->
 <?php } ?>
 <!--[if IE 8]> 
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/ie8.css" />
<![endif]-->
<!--[if IE 7]> 
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/ie7.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/ie6.css" />
<script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('#logo img');
</script>
<![endif]-->
<?php if ($stores) { ?>
<script type="text/javascript"><!--
$(document).ready(function() {
<?php foreach ($stores as $store) { ?>
$('body').prepend('<iframe src="<?php echo $store; ?>" style="display: none;"></iframe>');
<?php } ?>
});
<?php 
$customcode = array();
$customcode =  $this->config->get('customcode'); 
echo $customcode['custom_java'];
?>
//--></script>
<?php } ?>

<?php 
$customcode = array();
$customcode =  $this->config->get('customcode');
?>
<!-- custom css-->
<?php 
if($customcode['custom_css']){
?>
<style type="text/css">
<?php 
echo $customcode['custom_css'];
?>
</style>
<?php } ?>
<!-- end custom css-->

<!-- custom javascript-->
<?php 
if($customcode['custom_java']){
?>
<script type="text/javascript"><!--
<?php 
echo $customcode['custom_java'];
?>
//--></script>
<?php } ?>
<!-- end custom javascript-->


<?php /******************THEME FONTS SETTINGS*********************/ ?>
<?php require_once  "catalog/view/theme/bt_electronues/template/bossthemes/Boss_font_setting.php"; ?>
<?php require_once  "catalog/view/theme/bt_electronues/template/bossthemes/Boss_color_setting.php"; ?>
<?php require_once  "catalog/view/theme/bt_electronues/template/bossthemes/Mobile_Detect_2.6.6.php"; ?>
<?php echo $google_analytics; ?>

</head>
<?php 
	$array = (explode('/',$_SERVER['REQUEST_URI']));
	$end = end($array);
	if($end == "index.php" || $end == "home" || $end == ""){
		$home_page='home_page';
	}else{
		$home_page="other_page";
	}
?>
<body class="<?php echo $home_page; ?>">
<?php
$detect = new Mobile_Detect;
$b_Mode_CSS = $this->config->get('b_Mode_CSS');
if(!isset($b_Mode_CSS)){
	$b_Mode_CSS ="wide";
}
?>
<div id="container" class="<?php echo $b_Mode_CSS; ?>">
<div class="boss_header">
<?php
$modules =$helper->getModulesByPosition('header'); 
if( $modules ){?>
<?php foreach ($modules as $module) { ?>
	<?php echo $module; ?>
<?php } } ?>
<!-- mobile -->
<?php if($detect->isMobile() && !$detect->isTablet()){  ?>
	<div class="frame_mobile">
	<div class="header_top">
		<?php if ($logo) { ?>
		<div id="logo"><a href="<?php echo $home; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></a></div>
		<?php } ?>
		<?php if(isset($boss_search)){echo $boss_search;} ?>	
		<?php echo $cart; ?>
		<div class="choose_option">
			<?php echo $currency; ?>
			<?php echo $language; ?>
		</div>
		<div class="links"><a href="<?php echo $wishlist; ?>" id="wishlist-total"><?php echo $text_wishlist; ?></a><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a><a href="<?php echo $shopping_cart; ?>"><?php echo $text_shopping_cart; ?></a><a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></div>
		<div id="welcome">
			<?php if (!$logged) { ?>
			<?php echo $text_welcome; ?>
			<?php } else { ?>
			<?php echo $text_logged; ?>
			<?php } ?>
		</div>
	</div>
	<div class="header_bottom">	
	<?php
		$modules =$helper->getModulesByPosition('mainmenu'); 
		if( $modules ){
			foreach ($modules as $module) { 
				 echo $module; 
			} 
		} 
	?>
		<div class="slideshow_grid">
			<?php
			$modules =$helper->getModulesByPosition('slideshow'); 
			if( $modules ){
			?>
			<?php foreach ($modules as $module) { ?>
				<?php echo $module; ?>
			<?php } ?>
			<?php } ?>
			
			<?php /********************Block Header bottom******************/ ?>
			<?php include "catalog/view/theme/".$this->config->get('config_template')."/template/bossthemes/Boss_header_bottom.php";?>
		</div>
	</div>
	</div>
<?php } else{ ?>
<div id="header_top">
<div class="frame_header_top">
	<div class="grid-container">
		<div class="grid-100 tablet-grid-100 mobile-grid-100">
		<div>
			<?php if ($logo) { ?>
			<div id="logo"><a href="<?php echo $home; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></a></div>
			<?php } ?>
			<?php echo $currency; ?>
			<?php echo $language; ?>
			<div class="links"><a href="<?php echo $wishlist; ?>" id="wishlist-total"><?php echo $text_wishlist; ?></a><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a><a href="<?php echo $shopping_cart; ?>"><?php echo $text_shopping_cart; ?></a><a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></div>
			<div id="welcome">
				<?php if (!$logged) { ?>
				<?php echo $text_welcome; ?>
				<?php } else { ?>
				<?php echo $text_logged; ?>
				<?php } ?>
			</div>			
			
			<?php /********************Block Header Top******************/ ?>
			<?php include "catalog/view/theme/".$this->config->get('config_template')."/template/bossthemes/Boss_header_top.php";?>
		</div>
		</div>
	</div>
</div>
</div>
<div id="header_bottom" > 
	<div class="grid-container">
		<div class="grid-100 tablet-grid-100 mobile-grid-100">
		<div>
			<div id="frame_menu_dropdown" class="form_search_cart grid-80 tablet-grid-75 mobile-grid-100 grid-parent">		
				<?php echo $cart; ?>
				<?php if(isset($boss_search)){echo $boss_search;} ?>	
			</div>
			<div id="frame_menu" class="boss_menu_vertical grid-20 tablet-grid-25 mobile-grid-100 grid-parent">
			<?php 
				$modules =$helper->getModulesByPosition('mainmenu'); 
				if( $modules ){
					foreach ($modules as $module) { 
						 echo $module; 
					} 
				}
			if ($this->config->get('b_General_Menu')=='0') { ?>
			<div class="quick-select hide-on-mobile" >
				<p><span>All Categories</span></p>
				<?php if ($categories) { ?>
					<div class="menu_default" id="menu" >
					  <ul>
						<?php foreach ($categories as $category) { ?>
						<li <?php if(count($category['children'])>0){echo 'class="dropdown-arrow"'; }?>><a href="<?php echo $category['href']; ?>"><span><?php echo $category['name']; ?></span><?php if (count($category['children'])>0) { ?><b></b><?php } ?></a>
						  <?php if ($category['children']) { ?>
						  <div class="dropdown">
							  <div>
								<?php for ($i = 0; $i < count($category['children']);) { ?>
								<ul>
								  <?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
								  <?php for (; $i < $j; $i++) { ?>
								  <?php if (isset($category['children'][$i])) { ?>
								  <li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a></li>
								  <?php } ?>
								  <?php } ?>
								</ul>
								<?php } ?>
							  </div>
						  </div>
						  <?php } ?>
						</li>
						<?php } ?>
					  </ul>
					</div>
				<?php } ?>
				<script type="text/javascript"><!--
					if($('body').hasClass('other_page')){
						$('.quick-select > p span').append('<b>+</b>');
			
						$('.quick-select').click(function(){

							if ($(this).find('p b').text() == '+'){
								$(this).children('#menu').slideDown(300);
								$(this).find('p b').text('-');
							}else{
								$(this).children('#menu').slideUp(300);
								$(this).find('p b').text('+');
							}  
							
						});
					}
					
					<?php if($detect->isTablet()){ ?>
						$(".menu_default > ul > li a").bind('touchstart', function(){
							if(!$(this).hasClass("ishover") && $(this).parent("li.dropdown-arrow").length>0){
								$(".menu_default > ul > li a").removeClass('ishover');
								$(this).addClass("ishover");
								return false;
							}else{
								return true;
							}
						});	
					<?php } ?>
				//--></script>
			</div>
			<?php }else{ ?>
			<script type="text/javascript"><!--
				
				if($('body').hasClass('other_page')){
					$('.quick-select > p span').append('<b>+</b>');

					$('.quick-select').click(function(){
						if ($(this).find('p b').text() == '+'){
							$(this).children('#boss_menu').slideDown(300);
							$(this).find('p b').text('-');
						}else{
							$(this).children('#boss_menu').slideUp(300);
							$(this).find('p b').text('+');
						}  
					});
				}
			//--></script>
			<?php } ?>
			</div>
			<div class="position_slideshow grid-80 tablet-grid-75 mobile-grid-100 grid-parent">
			<div class="slideshow_grid">
				<?php
				$modules =$helper->getModulesByPosition('slideshow'); 
				if( $modules ){
				?>
				<?php foreach ($modules as $module) { ?>
					<?php echo $module; ?>
				<?php } ?>
				<?php } ?>
				
				<?php /********************Block Header bottom******************/ ?>
				<?php include "catalog/view/theme/".$this->config->get('config_template')."/template/bossthemes/Boss_header_bottom.php";?>
			</div>
			</div>
		</div>	
		</div>
	</div>
</div>
<?php } ?>
</div>
<?php if ($error) { ?>
    
    <div class="warning"><?php echo $error ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
    
<?php } ?>
<div class="grid-container page">
<div class="grid-100 tablet-grid-100 mobile-grid-100">
<div>
<div class="clear"></div>

<div id="notification"></div>
