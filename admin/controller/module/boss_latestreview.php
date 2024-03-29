<?php
class ControllerModuleBossLatestReview extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->load->language('module/boss_latestreview');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('boss_latestreview', $this->request->post);		
			
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
				
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
		
		$this->data['entry_title'] = $this->language->get('entry_title');
		$this->data['entry_limit'] = $this->language->get('entry_limit');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_use_scrolling_panel'] = $this->language->get('entry_use_scrolling_panel');	
		$this->data['entry_scroll'] = $this->language->get('entry_scroll');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
			
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		if (isset($this->error['numproduct'])) {
			$this->data['error_numproduct'] = $this->error['numproduct'];
		} else {
			$this->data['error_numproduct'] = array();
		}
		if (isset($this->error['scroll'])) {
			$this->data['scroll'] = $this->error['scroll'];
		} else {
			$this->data['scroll'] = array();
		}
		if (isset($this->error['image'])) {
			$this->data['error_image'] = $this->error['image'];
		} else {
			$this->data['error_image'] = array();
		}

  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/boss_latestreview', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/boss_latestreview', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		//module
		$this->data['modules'] = array();
		
		if (isset($this->request->post['boss_latestreview_module'])) {
			$this->data['modules'] = $this->request->post['boss_latestreview_module'];
		} elseif ($this->config->get('boss_latestreview_module')) { 
			$this->data['modules'] = $this->config->get('boss_latestreview_module');
		}				
		
		$this->load->model('design/layout');
		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		$this->template = 'module/boss_latestreview.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/boss_latestreview')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (isset($this->request->post['boss_latestreview_module'])) {
			foreach ($this->request->post['boss_latestreview_module'] as $key => $value) {
				if (!$value['image_width'] || !$value['image_height']) {
					$this->error['image'][$key] = $this->language->get('error_image');
				}
				if (!$value['limit']) {
					$this->error['numproduct'][$key] = $this->language->get('error_numproduct');
				}
				if (!$value['scroll']) {
					$this->error['scroll'][$key] = $this->language->get('error_scroll');
				}				
			}
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function getIdLayout($layout_name) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "layout WHERE LOWER(name) = LOWER('".$layout_name."')");
		return (int)$query->row['layout_id'];
	}
	
	public function install() 
	{
		$this->load->model('setting/setting');
		
		$this->load->model('localisation/language');
			
		$languages = $this->model_localisation_language->getLanguages();
		
		$array_description0 = array();
						
		foreach($languages as $language){
			$array_description0{$language['language_id']} = 'Latest Review';
		}
		$boss_latestreview = array('boss_latestreview_module' => array (
		0 => array ( 'limit' => 3, 'image_width' => 84, 'image_height' => 84, 'title' => $array_description0, 'use_scrolling_panel' => 0, 'scroll' => 3, 'layout_id' => $this->getIdLayout("category"), 'position' => 'column_left', 'status' => 1, 'sort_order' => 2),
		1 => array ( 'limit' => 3, 'image_width' => 84, 'image_height' => 84, 'title' => $array_description0, 'use_scrolling_panel' => 0, 'scroll' => 3, 'layout_id' => $this->getIdLayout("manufacturer"), 'position' => 'column_left', 'status' => 1, 'sort_order' => 2),
		2 => array ( 'limit' => 3, 'image_width' => 84, 'image_height' => 84, 'title' => $array_description0, 'use_scrolling_panel' => 0, 'scroll' => 3, 'layout_id' => $this->getIdLayout("product"), 'position' => 'column_left', 'status' => 1, 'sort_order' => 2)
		));
		
		$this->model_setting_setting->editSetting('boss_latestreview', $boss_latestreview);		
	}

}
?>