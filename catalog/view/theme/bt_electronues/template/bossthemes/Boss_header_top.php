<div class="block-header-top">		
<?php
$Boss_Header_Top_Data = array();
$Boss_Header_Top_Data = $this->config->get('b_Block_Header_Top');
$Block_content = html_entity_decode($Boss_Header_Top_Data['content'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
?>
<!-- Header Top -->
<?php if ($Boss_Header_Top_Data['status']==1){ ?>	
	<?php echo $Block_content; ?>
<?php } ?>
</div>