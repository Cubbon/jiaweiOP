<?php
class ControllerModuleBossLabelProducts extends Controller {
	private $error = array();
	
	public function index() {
		$this->load->language('module/boss_label_products');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');
        
         $this->data['text_heading'] = $this->language->get('text_heading'); 
         $this->data['text_boss_products'] = $this->language->get('text_boss_products'); 
         $this->data['text_boss_labels'] = $this->language->get('text_boss_labels'); 
         $this->data['text_boss_settings'] = $this->language->get('text_boss_settings');  
         
         $this->data['boss_products'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'], 'SSL');
         $this->data['boss_labels'] = $this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'], 'SSL');
         $this->data['boss_settings'] = $this->url->link('bosslabelproducts/setting', 'token=' . $this->session->data['token'], 'SSL');
        
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
        
 			
		$this->template = 'module/boss_label_products.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());

	}

	public function install() {
        
        $this->load->model('user/user_group');
		$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'bosslabelproducts/labels');
		$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'bosslabelproducts/labels');
		$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'bosslabelproducts/products');
		$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'bosslabelproducts/products');
		$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'bosslabelproducts/setting');
		$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'bosslabelproducts/setting');
		$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'module/boss_label_products');
		$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'module/boss_label_products');
		        
        $this->load->model('bosslabelproducts/bosslabel');
        $this->load->model('bosslabelproducts/bossproductlabel');
        
        $this->model_bosslabelproducts_bosslabel->createTablelabel();
        $this->model_bosslabelproducts_bossproductlabel->createTableProductlabel();
		
		$this->load->model('setting/setting');
		
		$boss_label_products_setting = array('boss_label_products_setting' => array ( 
			 'product' => 1, 'category' => 1, 'manufacturer' => 1, 'special' => 1, 'search' => 1
		));
		
		$this->model_setting_setting->editSetting('boss_label_products_setting', $boss_label_products_setting);
 	}
    public function uninstall() {
    	$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('boss_label_products_setting');


        $this->load->model('bosslabelproducts/bosslabel');
        $this->load->model('bosslabelproducts/bossproductlabel');
		
        $this->model_bosslabelproducts_bosslabel->dropLabel();
        $this->model_bosslabelproducts_bossproductlabel->dropProductLabel();
 	}
        
}
?>
