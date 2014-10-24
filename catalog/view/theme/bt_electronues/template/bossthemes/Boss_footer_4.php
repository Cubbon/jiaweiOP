<div class="block-footer-4">
	<?php
	$Boss_Footer_4_Data = array();
	$Boss_Footer_4_Data = $this->config->get('b_Block_Footer_4');
	$Block_content = html_entity_decode($Boss_Footer_4_Data['content'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
	if ($Boss_Footer_4_Data['status']==1){ 	
		 echo $Block_content; 
	} 
	?>
</div>