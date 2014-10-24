<?php  
class ControllerModuleBossEditorthemes extends Controller {
	protected function index($setting) {
	
		$status = $this->config->get('b_General_Show');
		$this->data['product_gird'] = $this->config->get('b_Layout_Setting');
		if($status==1){
		
			$data_template = $this->cache->get('boss_editorthemes.' . (int)$this->config->get('config_language_id'));
			$this->data['data_template'] = $data_template;
			
			if(!$data_template){
				$this->load->model('bossthemes/boss_editorthemes');
				
				$this->load->model('bossthemes/boss_editorthemes');
				
				$this->data['bg_images'] = $this->model_bossthemes_boss_editorthemes->getBackgrounds();
				
				$this->data['temp_setting_arr'] = $this->model_bossthemes_boss_editorthemes->getColorThemes();
				
				$this->data['temp_name_arr'] = $this->model_bossthemes_boss_editorthemes->getThemeNames();
				
				$colors_data = $this->data['temp_setting_arr'];
				
				$this->data['colors_data'] = json_encode($colors_data);
				
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/boss_editorthemes.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/module/boss_editorthemes.tpl';
				} else {
					$this->template = 'default/template/module/boss_editorthemes.tpl';
				}
				$this->cache->set('boss_editorthemes.' . (int)$this->config->get('config_language_id'),$this->render());
				//$this->render(); 
			}else{
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/boss_editorthemes.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/module/boss_editorthemes.tpl';
				} else {
					$this->template = 'default/template/module/boss_editorthemes.tpl';
				}
				
				$this->render();
			}
		}
	}
	private function getIdLayout($layout_name) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "layout WHERE LOWER(name) = LOWER('".$layout_name."')");
		if($query->row){
			return (int)$query->row['layout_id'];
		}
	}
}
?>