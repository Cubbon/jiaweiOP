<?php function showSubcate($category) {
	if (count($category['children']) > 0) {
		echo '<dd>';
		foreach ($category['children'] as $cat) {
			echo($cat['children'])? '<dl class="cate-list-item submenu">':'<dl class="cate-list-item">';
				echo '<dt>';
				echo '<a href="'.$cat['href'].'">'.$cat['name'].'</a>';
				showSubcate($cat);
				echo '</dt>';
			echo '</dl>';
		}
		echo '</dd>';
	}
} ?>
<!--module boss-category-->
<div id="submenu" class="box">
	<div class="box-heading"><?php echo $heading_title; ?></div>
	<div class="submenu-inside box-content">
		<?php foreach ($categories as $category) { ?>
		<dl class="cate-list-item<?php echo($category['children'])? ' submenu':''; ?>">
			
			 <?php if ($category['category_id'] == $category_id_2) { ?>
				<dt class="cate-name curr">
				<a href="<?php echo $category['href']; ?>" class="active"><?php echo $category['name']; ?></a>
			<?php } else { ?>
				<dt class="cate-name">
				<a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
			<?php } ?>
			<em></em>
			</dt>
			<dd class="sub-cate-list">
				<div class="sub-item">
					<?php foreach($category['children'] as $child) { ?>
					<dl>
						<dt>
							<?php if ($child['child_id'] == $child_id) { ?>
								<a href="<?php echo $child['href']; ?>" class="active"><?php echo $child['name']; ?></a>
							<?php }else{ ?>
								<a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a>
							<?php }?>
						</dt>
					</dl>
					<?php } ?>
				</div>
			</dd>
		</dl>
		<?php } ?>
	</div>
</div>
<script type="text/javascript"><!--
	$().ready(function(){
		$('.cate-name').click(function(){
			$(this).toggleClass('curr');
		});
	});
	
//--></script>
<!--module boss-category-->