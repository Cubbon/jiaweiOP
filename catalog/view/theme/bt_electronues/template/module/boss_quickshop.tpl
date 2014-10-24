<script type="text/javascript"><!--
$(document).ready(function() {
	boss_quick_shop();
	 //refess grid and list
	$('.display').bind('click', function() {
		$('.sft_quickshop_icon').remove();
		boss_quick_shop();
	});
});

function boss_quick_shop(){
	var _qsHref = "<a class=\"sft_quickshop_icon fancybox.iframe\" href=\"#\" style=\"visibility:hidden;position:absolute;top:0;left:0\"><span><?php echo $text; ?></span></a>";
	$(document.body).append(_qsHref);
	
	var quickshop_icon = $('.sft_quickshop_icon');

<?php	foreach($selecters as $selecter){ ?>	
		$('<?php echo $selecter; ?>').each(function(index, value){
			var id_product="";
			var reloadurl="";
			if($(".image a",this).attr('href')){
				var href_pro = $(".image a",this).attr('href'); 
			}else{ 
				var href_pro = '';
			}
			if	(href_pro){
				var check=href_pro.match("index.php"); 
			}
			var last_index = '';
			if(check=="index.php"){	 //direct link
				var str = href_pro.split("&");
				for (var i=0;i<str.length;i++){
					if(str[i].match("product_id=") =="product_id="){
						//truong hop co limit sort des tren duong dan
						//site/index.php?route=product/product&path=24&product_id=40
						//site/index.php?route=product/product&product_id=31
						last_index = str[i];
						break;
					}
				}
				reloadurl="<?php echo $base; ?>index.php?route=module/boss_quick_shop_product&"+last_index;
			}else{	//mode SEO
				var check_seo = href_pro.match("product_id=");
				if(check_seo=="product_id="){
				//1. no seo
				//site/desktops?product_id=47&sort=p.price&order=DESC&limit=100
				//site/desktops/mac?product_id=41&limit=100
				//site/desktops/mac?product_id=41
					var str = href_pro.split("&");
					for (var i=0; i<str.length; i++){
						if(str[i].match("product_id=") == "product_id="){
							var temp = str[i].split("?");
							last_index = temp[temp.length-1]; // lay phan tu cuoi cung
							break;
						}
					}
					//alert("product");
					reloadurl="<?php echo $base; ?>index.php?route=module/boss_quick_shop_product&"+last_index;
				}else{
				// 2. seo
				//site/desktops/ipod_classic?sort=p.model&order=DESC&limit=100
				//site/desktops/test?sort=p.price&order=DESC&limit=100
				//site/ipod_classic
					var str_1 = href_pro.split("/");
					var str_2 = str_1[str_1.length-1]; 
					//lay phan tu cuoi cung
					var temp = str_2.split("?");
					last_index = temp[0];
					//lay id tu seo
					var id_index = getProductId_bySeokeyword(last_index);
					reloadurl="<?php echo $base; ?>index.php?route=module/boss_quick_shop_product&"+id_index;
				}
			}
			$('.image').css('position', 'relative');
			
			$(".image img", this).hover(function () {
				var o = $(this).offset();
				var o_image = $(this).parents('.image').offset();
				var o_width = o.left - o_image.left;
				var o_height = o.top - o_image.top;
				
				var image = $(this).parents('.image');
				
				//border + padding = 4
				var width_a = image.width()/2;
				var width_b = o_width + $(this).width()/2 + 4
				
				var height_a = image.height()/2;
				var height_b = o_height + $(this).height()/2 + 4;
				
		
				$('.sft_quickshop_icon').attr('href',reloadurl)
				.show()
				.css({
					'top': '50%',
					'left': '50%',
					'margin-left': -(width_a - width_b ) - 48 + 'px',
					'margin-top': -(height_a - height_b ) - 15 +'px',
					'visibility': 'visible',
				});
					
				$(this).before($('.sft_quickshop_icon'));
			},function () {
				$(this).parent().mouseleave(function() {
					$('.sft_quickshop_icon').css('visibility', 'hidden')
				});
			});
			
			 //fix bug image disapper when hover
			$('.sft_quickshop_icon').bind('mouseover', function() {
				$(this).show();
			}).bind('click', function() {
				$(this).hide();
			});
	   });
<?php	} ?>
	$('.sft_quickshop_icon').fancybox({
		width: '85%',
		height: '85%',
		maxWidth: '<?php echo $width; ?>px', 
		maxHeight: '<?php echo $height; ?>px'
	});	   
}
function getProductId_bySeokeyword(seo){
	$.ajax({
		url: 'index.php?route=module/boss_quickshop/getProductId_bySeokeyword',
		type: 'post',
		data: 'keyword=' + seo,
		dataType: 'json',
		success: function(json) {
			bien = json['success'];
		},
		async: false
	});
	return bien;
}
//--></script> 