<div id="notification"></div>
<div id="content">
  <div class="product-info">
	 <?php if ($thumb || $images) { ?>
     <div class="left">
      <?php if ($thumb) { ?>
		<div class="image"><a href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>" class="colorbox cloud-zoom" id='zoom1' rel=""><img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" id="image" /></a>
		</div>
      <?php } ?>
      <?php if ($images) { ?>
      <div class="list_carousel responsive">
        <ul id="boss-image-additional">
		<?php foreach ($images as $image) { ?>
        <li><a href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>" class="colorbox cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: '<?php echo $image['thumb']; ?>' "><img src="<?php echo $image['addition']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a></li>
       <?php } ?>
		</ul> 
		<a id="prev_image_additional" class="prev nav_thumb" href="#" title="prev">&lt;</a>
		<a id="next_image_additional" class="next nav_thumb" href="#" title="next">&gt;</a>
      </div>
      <?php } ?>
	</div>
    <?php } ?>
	
	
	
    <div class="right">
      <h1><?php echo $heading_title; ?></h1>
      <div class="description">
        <?php if ($manufacturer) { ?>
        <span><?php echo $text_manufacturer; ?></span> <?php echo $manufacturer; ?><br />
        <?php } ?>
        <span><?php echo $text_model; ?></span> <?php echo $model; ?><br />
        <?php if ($reward) { ?>
        <span><?php echo $text_reward; ?></span> <?php echo $reward; ?></br>
        <?php } ?>
        <span class="stock"><span><?php echo $text_stock; ?></span> <?php echo $stock; ?></span></div>
     
	 <?php if ($profiles): ?>
      <div class="option">
          <h2><span class="required">*</span><?php echo $text_payment_profile ?></h2>
          <br />
          <select name="profile_id">
              <option value=""><?php echo $text_select; ?></option>
              <?php foreach ($profiles as $profile): ?>
              <option value="<?php echo $profile['profile_id'] ?>"><?php echo $profile['name'] ?></option>
              <?php endforeach; ?>
          </select>
          <br />
          <br />
          <span id="profile-description"></span>
          <br />
          <br />
      </div>
      <?php endif; ?>
	  
	  <?php if ($options) { ?>
      <div class="options">
        <h2><?php echo $text_option; ?></h2>
        <?php foreach ($options as $option) { ?>
        <?php if ($option['type'] == 'select') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <div class="title_text"><b><?php echo $option['name']; ?>:</b>
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?></div>
          <select name="option[<?php echo $option['product_option_id']; ?>]">
            <option value=""><?php echo $text_select; ?></option>
            <?php foreach ($option['option_value'] as $option_value) { ?>
            <option value="<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
            </option>
            <?php } ?>
          </select>
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'radio') { ?>
		<div class="box-check">
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <b><?php echo $option['name']; ?>:</b>
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <?php foreach ($option['option_value'] as $option_value) { ?>
          <input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
          <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
          </label>
          <br />
          <?php } ?>
        </div>
		</div>
        <?php } ?>
        <?php if ($option['type'] == 'checkbox') { ?>
		<div class="box-check">
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <b><?php echo $option['name']; ?>:</b>
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <?php foreach ($option['option_value'] as $option_value) { ?>
          <input type="checkbox" name="option[<?php echo $option['product_option_id']; ?>][]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
          <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
          </label>
          <br />
          <?php } ?>
        </div>
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'image') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <div class="title_text"><b><?php echo $option['name']; ?>:</b>
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?></div>
          <table class="option-image">
            <?php foreach ($option['option_value'] as $option_value) { ?>
            <tr>
              <td style="width: 1px;"><input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" /></td>
              <td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><img src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" /></label></td>
              <td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
                  <?php if ($option_value['price']) { ?>
                  (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                  <?php } ?>
                </label></td>
            </tr>
            <?php } ?>
          </table>
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'text') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <div class="title_text"><b><?php echo $option['name']; ?>:</b>
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?></div>
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" />
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'textarea') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <div class="title_text"><b><?php echo $option['name']; ?>:</b>
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?></div>
          <textarea name="option[<?php echo $option['product_option_id']; ?>]" cols="40" rows="5"><?php echo $option['option_value']; ?></textarea>
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'file') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <div class="title_text"><b><?php echo $option['name']; ?>:</b>
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?></div>
          <span class="button_black"><input type="button" value="<?php echo $button_upload; ?>" id="button-option-<?php echo $option['product_option_id']; ?>" class="button"></span>
          <input type="hidden" name="option[<?php echo $option['product_option_id']; ?>]" value="" />
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'date') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <div class="title_text"><b><?php echo $option['name']; ?>:</b>
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?></div>
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="date" />
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'datetime') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <div class="title_text"><b><?php echo $option['name']; ?>:</b>
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?></div>
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="datetime" />
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'time') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <div class="title_text"><b><?php echo $option['name']; ?>:</b>
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?></div>
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="time" />
        </div>
        <?php } ?>
        <?php } ?>
      </div>
      <?php } ?>
	  
      <div class="cart">	  
		<div class="rating"><img src="catalog/view/theme/bt_electronues/image/stars-<?php echo $rating; ?>.png" alt="<?php echo $reviews; ?>" /></div>
	   
		<div class="share"><!-- AddThis Button BEGIN -->
		<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
		<!-- AddThis Button END --> 
		</div>
		
        <div class="quantily_info"><b><?php echo $text_qty; ?></b>
			<div class="select_number">
			  <input type="text" min="<?php echo $minimum; ?>" name="quantity" size="2" value="<?php echo $minimum; ?>" />
			  <button onclick="changeQty(1); return false;" class="increase">increase</button>
			  <button onclick="changeQty(0); return false;" class="decrease">decrease</button>
			</div>
			<input type="hidden" name="product_id" size="2" value="<?php echo $product_id; ?>" />	
		</div>
		<input type="button" value="<?php echo $button_cart; ?>" id="button-cart" class="button_cart" title="<?php echo $button_cart; ?>" />
		<?php if ($minimum > 1) { ?>
			<div class="minimum"><?php echo $text_minimum; ?></div>
		<?php } ?>
		
		<?php if ($price) { ?>
		<div class="price">
			<?php if (!$special) { ?>
			<span class="price-text"><?php echo $price; ?></span>
			<?php } else { ?>
			<span class="price-old"><?php echo $price; ?></span> <span class="price-new"><?php echo $special; ?></span>
			<?php } ?>
			<?php if ($tax) { ?>
			<!-- <span class="price-tax"><?php echo $text_tax; ?> <?php echo $tax; ?></span> -->
			<?php } ?></br>
			<?php if ($points) { ?>
			<span class="reward"><small><?php echo $text_points; ?> <?php echo $points; ?></small></span>
			<?php } ?>
			<?php if ($discounts) { ?>
			<div class="discount">
			  <?php foreach ($discounts as $discount) { ?>
			  <?php echo sprintf($text_discount, $discount['quantity'], $discount['price']); ?><br />
			  <?php } ?>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
      </div>
    </div>
	
	
  </div>	
</div>	
	
	
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/common.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/cloud-zoom/cloud-zoom.1.0.3.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.easing.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.carouFredSel-6.2.0-packed.js"></script>
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_electronues/stylesheet/ie8.css" />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_electronues/stylesheet/ie7.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_electronues/stylesheet/ie6.css" />
<script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('#logo img');
</script>
<![endif]-->

<?php /******************THEME FONTS SETTINGS*********************/ ?>
<?php include "catalog/view/theme/bt_electronues/template/bossthemes/Boss_font_setting.php"; ?>
<?php include "catalog/view/theme/bt_electronues/template/bossthemes/Boss_color_setting.php"; ?>
<script type="text/javascript"><!--
	function changeQty(increase) {
		var qty = parseInt($('.select_number').find("input").val());
		if ( !isNaN(qty) ) {
			qty = increase ? qty+1 : (qty><?php echo $minimum; ?> ? qty-1 : <?php echo $minimum; ?>);
			$('.select_number').find("input").val(qty);
		}
	}
//--></script> 
<script type="text/javascript"><!--
    $(document).ready(function () {
        $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
    });
	$.fn.CloudZoom.defaults = {
		position: 'inside',
		tint: '#ffffff',
		tintOpacity: 0.5,
		lensOpacity: 0.5,
		softFocus: false,
		smoothMove: 6,
		showTitle: false,
		titleOpacity: 0.5,
		adjustX: 0,
		adjustY: 0
	}; 
	
//--></script>   
<script type="text/javascript"><!--
$(window).load(function(){
	$('#boss-image-additional').carouFredSel({
		auto: false,
		responsive: true,
		width: '100%',
		prev: '#prev_image_additional',
		next: '#next_image_additional',
		swipe: {
		onTouch : true
		},
		items: {
			width: 97,
			height: 90,
			visible: {
			min: 1,
			max: 4
			}
		},
		scroll: {
			direction : 'left',    //  The direction of the transition.
			duration  : 1000   //  The duration of the transition.
		}
	});
});
//--></script> 
<script type="text/javascript"><!--
$('select[name="profile_id"], input[name="quantity"]').change(function(){
    $.ajax({
		url: 'index.php?route=product/product/getRecurringDescription',
		type: 'post',
		data: $('input[name="product_id"], input[name="quantity"], select[name="profile_id"]'),
		dataType: 'json',
        beforeSend: function() {
            $('#profile-description').html('');
        },
		success: function(json) {
			$('.success, .warning, .attention, information, .error').remove();
            
			if (json['success']) {
                $('#profile-description').html(json['success']);
			}	
		}
	});
});
$('#button-cart').bind('click', function() {
	$.ajax({
		url: 'index.php?route=bossthemes/cart/add',
		type: 'post',
		data: $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\']:checked, .product-info input[type=\'checkbox\']:checked, .product-info select, .product-info textarea'),
		dataType: 'json',
		success: function(json) {
		$('.warning, .attention, information, .error').remove();
			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						$('#option-' + i).after('<span class="error">' + json['error']['option'][i] + '</span>');
					}
				}
                if (json['error']['profile']) {
                    $('select[name="profile_id"]').after('<span class="error">' + json['error']['profile'] + '</span>');
                }
			}  
			if (json['success']) {
				parent.$.fancybox.close();
				window.parent.document.getElementById('cart-total').innerHTML = json['total'];
				javascript:void(window.parent.addProductNotice(json['title'], json['thumb'], json['success'], 'success'));
			}
		}
	});
	
});
//--></script>
<?php if ($options) { ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/ajaxupload.js"></script>
<?php foreach ($options as $option) { ?>
<?php if ($option['type'] == 'file') { ?>
<script type="text/javascript"><!--
new AjaxUpload('#button-option-<?php echo $option['product_option_id']; ?>', {
	action: 'index.php?route=product/product/upload',
	name: 'file',
	autoSubmit: true,
	responseType: 'json',
	onSubmit: function(file, extension) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').after('<img src="catalog/view/theme/default/image/loading.gif" class="loading" style="padding-left: 5px;" />');
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', true);
	},
	onComplete: function(file, json) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', false);
		
		$('.error').remove();
		
		if (json['success']) {
			alert(json['success']);
			
			$('input[name=\'option[<?php echo $option['product_option_id']; ?>]\']').attr('value', json['file']);
		}
		
		if (json['error']) {
			$('#option-<?php echo $option['product_option_id']; ?>').after('<span class="error">' + json['error'] + '</span>');
		}
		
		$('.loading').remove();	
	}
});
//--></script>
<?php } ?>
<?php } ?>
<?php } ?>

<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript"><!--
$(document).ready(function() {
	if ($.browser.msie && $.browser.version == 6) {
		$('.date, .datetime, .time').bgIframe();
	}

	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
	$('.datetime').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'h:m'
	});
	$('.time').timepicker({timeFormat: 'h:m'});
});
//--></script>
