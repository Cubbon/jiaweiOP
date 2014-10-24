<?php 
if($data_template){
	echo $data_template;
} else { ?>
<div class="cpanelContainer" style="display:none; clear:both;">
	<div class="boss-themedesign">
		<div class="cpanel_icon">
			<span>icon</span>
		</div> <!-- End .cpanel_icon-->
		<div class="boss-themedesign-info">
		<h2>Theme Design</h2>
		<ul id="bt_category">
			<li> <!-- Design background -->
				<span class="expand">Design Background</span>
				<ul class="design_background"> 
				<li><h3>Body Background</h3></li>
					<?php foreach ($bg_images as $image => $settings) {?>
					<li><a onclick="addBackground('<?php echo $settings;?>','body')"><img alt="Background" src="image/data/background/<?php echo $settings; ?>" /></a></li>
					<?php } ?>
				</ul>
				
				<ul class="design_background"> 
					<li><h3>Header Background</h3></li>
					<?php foreach ($bg_images as $image => $settings) {?>
					<li><a onclick="addBackground('<?php echo $settings;?>','header')"><img alt="Background" src="image/data/background/<?php echo $settings; ?>" /></a></li>
					<?php } ?>
				</ul>
				
				<ul class="design_background"> 
				<li><h3>Footer Background</h3></li>
					<?php foreach ($bg_images as $image => $settings) {?>
					<li><a onclick="addBackground('<?php echo $settings;?>','footer')"><img alt="Background" src="image/data/background/<?php echo $settings; ?>" /></a></li>
					<?php } ?>
				</ul>
			</li> <!-- End Design background-->
			
			<li><!-- Mode Css-->
				<span class="expand">Mode CSS</span>
				<?php $b_Mode_CSS = $this->config->get('b_Mode_CSS'); ?>
				<ul class="mode_css"> 
					<li><input type="radio" id="mode_boxed" value="boxed" onclick="changeModeCSS('boxed')" name="b_Mode_CSS" <?php if ($b_Mode_CSS == 'boxed') echo ' checked="checked"'; ?> /> Box</li>
					<li><input type="radio" id="mode_wide" value="wide" onclick="changeModeCSS('wide')" name="b_Mode_CSS" <?php if ($b_Mode_CSS == 'wide') echo ' checked="checked"'; ?> /> Wide</li>
				</ul>
			</li>
			
			<li><!-- product grid view-->
				<span class="expand">Product Grid View</span>
				<?php $b_Layout_Setting = $this->config->get('b_Layout_Setting'); ?>
				<ul class="mode_css"> 
					<li><input type="radio" id="view_33_100-66-33_33-50-100" value="33,100-66-33,33-50-100" onclick="changeProductView('33','100-66-33','33-50-100');storeTotalStorage('33','100-66-33','33-50-100');" name="b_Layout_Setting" <?php if ($b_Layout_Setting == '33,100-66-33,33-50-100') echo ' checked="checked"'; ?> /> Extra</li>
					<li><input type="radio" id="view_25_100-75-50_25-33-50" value="25,100-75-50,25-33-50" onclick="changeProductView('25','100-75-50','25-33-50');storeTotalStorage('25','100-75-50','25-33-50');" name="b_Layout_Setting" <?php if ($b_Layout_Setting == '25,100-75-50,25-33-50')  echo ' checked="checked"'; ?> /> Large</li>
					
					<li><input type="radio"  id="view_20_100-80-60_20-25-33" value="20,100-80-60,20-25-33" onclick="changeProductView('20','100-80-60','20-25-33');storeTotalStorage('20','100-80-60','20-25-33');" name="b_Layout_Setting" <?php if ($b_Layout_Setting == '20,100-80-60,20-25-33') echo ' checked="checked"'; ?> /> Medium</li>
					
					<li><input type="radio" id="view_25_100-75-50_10-20-25" value="25,100-75-50,10-20-25" onclick="changeProductView('25','100-75-50','10-20-25');storeTotalStorage('25','100-75-50','10-20-25');" name="b_Layout_Setting" <?php if ($b_Layout_Setting == '25,100-75-50,10-20-25') echo ' checked="checked"'; ?> /> Small</li>
				</ul>
			</li>
			
			<li><!-- Font setting-->
				<span class="expand">Font Setting</span>
				<ul class="accordion_content"> 
					<?php
						$json = file_get_contents("catalog/view/theme/".$this->config->get('config_template')."/fonts/webfonts.json", true);
						$decode = json_decode($json, true);
						$webfonts = array();
						foreach ($decode['items'] as $key => $value) {
							// FONT FAMILY
							$item_family = $decode['items'][$key]['family'];
							$item_family_trunc =  str_replace(' ','+',$item_family);
							$webfonts[$item_family_trunc] = $item_family;
						}
						//print_r ($default);
						$defaultFont = array( 
							'Arial', 
							'Verdana', 
							'Helvetica', 
							'Lucida Grande', 
							'Trebuchet MS', 
							'Times New Roman', 
							'Tahoma', 
							'Georgia'
							);
						$FontWeight = array( 'default','normal', 'bold' );
						
					?>
					<?php $FontsSizes = array( 
						'default', '10px', '11px', '12px', '13px', '14px', '15px', '16px', '17px', '18px', '19px', '20px', '21px', '22px', '23px', '24px', '25px', 
						'26px', '27px', '28px', '29px', '30px', '31px', '32px', '33px',
						'34px', '35px', '36px', '37px', '38px', '39px', '40px', '41px',
						'42px', '43px', '44px', '45px', '46px', '47px', '48px', '49px', '50px'
					); ?>
					<?php 
						$b_Font_Data = array();
						$b_Font_Data = $this->config->get('b_Font_Data');
					?>
					<?php $objXML = simplexml_load_file("config_xml/font_setting.xml"); ?>
					<?php foreach ($objXML->children() as $child) {	
						foreach($child->children() as $childOFchild){ ?>
						<?php if($childOFchild->frontend=='true'){ ?>
						<li><h3><?php echo $childOFchild->text; ?></h3>
							<div class="boss_font">
								<select id="<?php echo $childOFchild->style; ?>" name="b_Font_Data[<?php echo $childOFchild->style; ?>]" onchange="selectedFontStyle('<?php echo $childOFchild->style; ?>','<?php echo $childOFchild->class_name; ?>')">
									<option>default</option>
									<optgroup label="HTML default fonts">
									<?php foreach ($defaultFont as $key) { ?>
										<?php ($key ==  $b_Font_Data[''.$childOFchild->style.'']) ? $selected = 'selected' : $selected = ''; ?>
										<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
									<?php } ?>
									</optgroup>
									<optgroup label="Google fonts">
									<?php foreach ($webfonts as $key => $face ) { ?>
										<?php ($key ==  $b_Font_Data[''.$childOFchild->style.'']) ? $selected = 'selected' : $selected=''; ?>
										<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $face; ?></option>
									<?php } ?>
									</optgroup>
								</select>
							</div>
							<div class="boss_size">
								<select id="<?php echo $childOFchild->size; ?>" name="b_Font_Data[<?php echo $childOFchild->size; ?>]" onchange="selectedFontSize('<?php echo $childOFchild->size; ?>','<?php echo $childOFchild->class_name; ?>')">
									<?php foreach ($FontsSizes as $key) { ?>
										<?php ($key ==  $b_Font_Data[''.$childOFchild->size.'']) ? $selected = 'selected' : $selected=''; ?>
										<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $key; ?></option>
									<?php } ?>
								</select>
							</div>
						</li>
					<?php } } }?>
				</ul>
			</li> <!-- End font setting-->
			
			<li><!-- Color setting-->
				<span class="expand">Color Setting</span>
				<ul class="accordion_content"> 
					<li><h3>Template Color</h3>
						<div class="boss_color_scheme">
							<?php
								$b_Setting = $this->config->get('b_Setting');
								$b_Color_Data = $this->config->get('b_Color_Data');
							?>
							<select id="temp_setting" name="b_Setting[temp_setting]" onchange="changeTemplate(this.value);">
								<option value="custom" <?php ($b_Setting['temp_setting']) =='custom' ? $selected = 'selected' : $selected = ''; ?>>Custom</option>
								<?php foreach ($temp_setting_arr as $key => $value){ ?>
									<?php if ($key == $b_Setting['temp_setting']){ ?>
										<option value="<?php echo $key; ?>" selected="selected"><?php echo $temp_name_arr[$key]; ?></option>
									<?php } else{ ?>
										<option value="<?php echo $key; ?>"><?php echo $temp_name_arr[$key]; ?></option>
									<?php } ?>
								 <?php } ?>
							</select>
						</div>
					</li>
					<?php $objXML = simplexml_load_file("config_xml/color_setting.xml"); ?>
					<?php foreach ($objXML->children() as $child) { ?>
						<li><h2 class="title"><?php echo $child->getName();  ?></h2></li>
					<?php foreach($child->children() as $childOFchild){ ?>
						<?php if($childOFchild->frontend=='true'){ ?>
							<li> 
								<h3><?php echo $childOFchild->text; ?></h3>
							<?php foreach($childOFchild->children() as $childOF){ ?>
							<?php if($childOF->itemshow=="true"){ ?>
								<?php if($childOF->text || $childOF->name ){ ?>
								<?php if($childOF->text && $childOF->name ){ echo '<p>'; } ?>
									<?php if($childOF->text){ ?>
										<span><?php echo $childOF->text; ?></span>
									<?php } ?>
									<?php if($childOF->name){ ?>
										<input size=6 type="text" class="hex" style="width:50px" name="b_Color_Data[<?php echo $childOF->name; ?>]" id="<?php echo $childOF->name; ?>" value="<?php echo $b_Color_Data[''.$childOF->name.''] ?>" />
									<?php } ?>
								<?php if($childOF->text && $childOF->name ){ echo '</p>'; } ?>
								<?php	} ?>
							<?php	} ?>
							<?php	} ?>
							</li> 
					<?php } } } ?>
				</ul>
			</li> <!-- End Color setting -->
		</ul>	
		<ul id="bt_category">	
			<li><span class="button_black"><input type="button" value="Reset" onclick="ResetAll()" /></span></li>
			<li style="display:none"><input type="hidden" id="colors_data" name="colors_data" value='<?php echo $colors_data; ?>' /></li>
		</ul>
		</div>
	</div> <!-- End .boss-themedesign-->
<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.dcjqaccordion.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/bossthemes.setting.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery.total-storage.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/colorpicker.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/eye.js"></script>
<?php include "catalog/view/javascript/bossthemes/layout.js.php"; ?>
<?php if (file_exists('catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/boss_editorthemes.css')) {
		echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/boss_editorthemes.css" media="screen" />';
	} else {
		echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/boss_editorthemes.css" media="screen" />';
	}
?>
<?php if (file_exists('catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/colorpicker.css')) {
		echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/colorpicker.css" media="screen" />';
	} else {
		echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/colorpicker.css" media="screen" />';
	}
?>
<?php if (file_exists('catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/layout.css')) {
		echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/layout.css" media="screen" />';
	} else {
		echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/layout.css" media="screen" />';
	}
?>
<script type="text/javascript"><!--
$('.cpanelContainer').css("display", "block");
var colorsData = jQuery.parseJSON($("#colors_data").val());
<?php $objXML = simplexml_load_file("config_xml/color_setting.xml");
$code_color = array();
foreach ($objXML->children() as $child){
	foreach($child->children() as $childOFchild){
		foreach($childOFchild->children() as $childOF){ 
			if($childOF->name!=''){
				$code_color[] = $childOF->name;
			}
		}
	}	
}
?>
var id_Color_List = Array(
<?php foreach ($code_color as $color) {
if($color==end($code_color))
	echo "'".$color."'";
else
	echo "'".$color."'".", ";
} ?>);

//--></script>
<script type="text/javascript"><!--
$(document).ready(function() {
	class_array_new = $.totalStorage('changeProductView');
	if (class_array_new) {
		changeProductView(class_array_new[0],class_array_new[1],class_array_new[2]);
		$('#view_'+ class_array_new[0] + '_' + class_array_new[1] + '_' + class_array_new[2]).attr("checked",true);
	}else{
		loadGird();
	}
	var template = '<?php echo($b_Setting['temp_setting']); ?>';
	//changeTemplate(template);
	$('.display').bind('click', function() {
		if (!(($('#content .product-grid .mobile-grid-100').length)||($('#content .product-list .mobile-grid-100').length))) {
			loadGird();
		}
	});
});
//--></script>
</div> <!-- End .cpanelContainer -->
<?php } ?>