<div class="block-footer-2">
	<?php
	$Boss_Footer_2_Data = array();
	$Boss_Footer_2_Data = $this->config->get('b_Block_Footer_2');
	$Block_content = html_entity_decode($Boss_Footer_2_Data['content'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
	if ($Boss_Footer_2_Data['status']==1){ 	
		 echo $Block_content; 
	} 
	?>
</div>