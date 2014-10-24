<?php
class ControllerBosslabelproductsSetting extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->load->language('bosslabelproducts/setting');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('boss_label_products_setting', $this->request->post);		
						
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('bosslabelproducts/setting', 'token=' . $this->session->data['token'], 'SSL'));
		}
			
		$this->data['heading_title'] = $this->language->get('heading_title');		
		$this->data['text_heading'] = $this->language->get('text_heading');		
		$this->data['text_boss_products'] = $this->language->get('text_boss_products'); 
		$this->data['text_boss_labels'] = $this->language->get('text_boss_labels'); 
		$this->data['text_boss_settings'] = $this->language->get('text_boss_settings');  
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_product_page'] = $this->language->get('text_product_page');
		$this->data['text_category_page'] = $this->language->get('text_category_page');
		$this->data['text_manufacturer_page'] = $this->language->get('text_manufacturer_page');
		$this->data['text_special_page'] = $this->language->get('text_special_page');
		$this->data['text_search_page'] = $this->language->get('text_search_page');
		$this->data['text_search_page'] = $this->language->get('text_search_page');
	
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
				
		$this->data['boss_products'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['boss_labels'] = $this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['boss_settings'] = $this->url->link('bosslabelproducts/setting', 'token=' . $this->session->data['token'], 'SSL');
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
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
			'href'      => $this->url->link('module/boss_label_products', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
			
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['action'] = $this->url->link('bosslabelproducts/setting', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['token'] = $this->session->data['token'];
	
		$this->data['module'] = array();
		
		if (isset($this->request->post['boss_label_products_setting'])) {
			$this->data['module'] = $this->request->post['boss_label_products_setting'];
		} elseif ($this->config->get('boss_label_products_setting')) { 
			$this->data['module'] = $this->config->get('boss_label_products_setting');
		}				
		
		$this->template = 'bosslabelproducts/setting.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'bosslabelproducts/setting')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
						
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}	
}
?>