<div class="block-header-bottom">		
<?php
$Boss_Header_Bottom_Data = array();
$Boss_Header_Bottom_Data = $this->config->get('b_Block_Header_Bottom');
$Block_content = html_entity_decode($Boss_Header_Bottom_Data['content'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
?>
<!-- Header Top -->
<?php if ($Boss_Header_Bottom_Data['status']==1){ ?>	
	<?php echo $Block_content; ?>
<?php } ?>
</div>