<?php
class ControllerModuleBossStaticblock extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->language->load('module/boss_staticblock');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('boss_staticblock', $this->request->post);		
					
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('module/boss_staticblock', 'token=' . $this->session->data['token'], 'SSL'));
		}
				
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_browse'] = $this->language->get('text_browse');
        $this->data['text_clear'] = $this->language->get('text_clear');
        $this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_slideshow'] = $this->language->get('text_slideshow');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
		$this->data['text_default'] = $this->language->get('text_default');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
		$this->data['button_add_new_block'] = $this->language->get('button_add_new_block');
		
		$this->data['entry_content'] = $this->language->get('entry_content');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_store'] = $this->language->get('entry_store');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		//tab
		$this->data['tab_content'] = $this->language->get('tab_content');
		$this->data['tab_header'] = $this->language->get('tab_header');
		$this->data['tab_footer'] = $this->language->get('tab_footer');
		$this->data['tab_header_top'] = $this->language->get('tab_header_top');
		$this->data['tab_header_bottom'] = $this->language->get('tab_header_bottom');
		$this->data['tab_footer_1'] = $this->language->get('tab_footer_1');
		$this->data['tab_footer_2'] = $this->language->get('tab_footer_2');
		$this->data['tab_footer_3'] = $this->language->get('tab_footer_3');
		$this->data['tab_footer_4'] = $this->language->get('tab_footer_4');
		
		$this->data['tab_block'] = $this->language->get('tab_block');
		
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
			'href'      => $this->url->link('module/boss_staticblock', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/boss_staticblock', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['token'] = $this->session->data['token'];
		
		$this->load->model('localisation/language');
		
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		$this->data['b_Block_Header_Top'] = array();
		
		if (isset($this->request->post['b_Block_Header_Top'])) {
            $b_Block_Header_Top = $this->request->post['b_Block_Header_Top'];
		} elseif ($this->config->get('b_Block_Header_Top')) { 
            $b_Block_Header_Top = $this->config->get('b_Block_Header_Top');
		} else{
			$b_Block_Header_Top = '';
		}
		
		$this->data['b_Block_Header_Top'] = $b_Block_Header_Top;
		
		$this->data['b_Block_Header_Bottom'] = array();
		
		if (isset($this->request->post['b_Block_Header_Bottom'])) {
            $b_Block_Header_Bottom = $this->request->post['b_Block_Header_Bottom'];
		} elseif ($this->config->get('b_Block_Header_Bottom')) { 
            $b_Block_Header_Bottom = $this->config->get('b_Block_Header_Bottom');
		}else{
			$b_Block_Header_Bottom = '';
		}
		
		$this->data['b_Block_Header_Bottom'] = $b_Block_Header_Bottom;
		
		$this->data['b_Block_Footer_1'] = array();
		
		if (isset($this->request->post['b_Block_Footer_1'])) {
            $b_Block_Footer_1 = $this->request->post['b_Block_Footer_1'];
		} elseif ($this->config->get('b_Block_Footer_1')) { 
            $b_Block_Footer_1 = $this->config->get('b_Block_Footer_1');
		} else{
			$b_Block_Footer_1 = '';
		}
		
		$this->data['b_Block_Footer_1'] = $b_Block_Footer_1;
		
		$this->data['b_Block_Footer_2'] = array();
		
		if (isset($this->request->post['b_Block_Footer_2'])) {
            $b_Block_Footer_2 = $this->request->post['b_Block_Footer_2'];
		} elseif ($this->config->get('b_Block_Footer_2')) { 
            $b_Block_Footer_2 = $this->config->get('b_Block_Footer_2');
		}else{
			$b_Block_Footer_2 = '';
		}
		
		$this->data['b_Block_Footer_2'] = $b_Block_Footer_2;
		
		$this->data['b_Block_Footer_3'] = array();
		
		if (isset($this->request->post['b_Block_Footer_3'])) {
            $b_Block_Footer_3 = $this->request->post['b_Block_Footer_3'];
		} elseif ($this->config->get('b_Block_Footer_3')) { 
            $b_Block_Footer_3 = $this->config->get('b_Block_Footer_3');
		}else{
			$b_Block_Footer_3 = '';
		}
		
		$this->data['b_Block_Footer_3'] = $b_Block_Footer_3;

		$this->data['b_Block_Footer_4'] = array();
		
		if (isset($this->request->post['b_Block_Footer_4'])) {
            $b_Block_Footer_4 = $this->request->post['b_Block_Footer_4'];
		} elseif ($this->config->get('b_Block_Footer_4')) { 
            $b_Block_Footer_4 = $this->config->get('b_Block_Footer_4');
		}else{
			$b_Block_Footer_4 = '';
		}
		
		$this->data['b_Block_Footer_4'] = $b_Block_Footer_4;
		
		

		$this->data['modules'] = array();
		
		if (isset($this->request->post['boss_staticblock_module'])) {
			$this->data['modules'] = $this->request->post['boss_staticblock_module'];
		} elseif ($this->config->get('boss_staticblock_module')) { 
			$this->data['modules'] = $this->config->get('boss_staticblock_module');
		}	
		
		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
		
		$this->load->model('setting/store');
		
		$this->data['stores'] = $this->model_setting_store->getStores();
		
		$this->load->model('localisation/language');
		
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
						
		$this->template = 'module/boss_staticblock.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/boss_staticblock')) {
			$this->error['warning'] = $this->language->get('error_permission');
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
		
		$array_description_header_0 = array();
		$array_description_footer_1 = array();
		$array_description_footer_2 = array();
		$array_description_footer_3 = array();
		$array_description_footer_4 = array();
		$array_description0 = array();
		
		
		foreach($languages as $language){
			$array_description_header_0{$language['language_id']} = '&lt;div class=&quot;static-header&quot;&gt;
&lt;p&gt;Support 24/7 xxxx - 123456Bossthemes&lt;/p&gt;
&lt;/div&gt;';
			$array_description_footer_1{$language['language_id']} = '&lt;div id=&quot;footer_static_store_directories&quot;&gt;
&lt;ul&gt;
	&lt;li&gt;
	&lt;h4&gt;Store Directories&lt;/h4&gt;
	&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Suspendisse&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Vivamus interdum&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Nulla rutrum&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Quisque augue&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Phasellus placerat&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Ut dolor mauris&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Nunc consequat&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Vivamus interdum&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Nulla rutrum&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;Quisque&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;';
			$array_description_footer_2{$language['language_id']} = '&lt;div id=&quot;footer_static_link&quot;&gt;
&lt;ul&gt;
	&lt;li class=&quot;link_1&quot;&gt;&lt;a href=&quot;#&quot;&gt;2098 Sodales Diaculis Sapies Street&lt;/a&gt;&lt;/li&gt;
	&lt;li class=&quot;link_2&quot;&gt;&lt;a href=&quot;#&quot;&gt;Egestas justo placerat bibendum &lt;/a&gt;&lt;/li&gt;
	&lt;li class=&quot;link_3&quot;&gt;&lt;a href=&quot;#&quot;&gt;Quisque pellentesque justo ut nunc &lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;';
			$array_description_footer_3{$language['language_id']} = '&lt;div id=&quot;footer-block-friends&quot;&gt;&lt;img alt=&quot;static_banner_1&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/banner_footer_03.png&quot; title=&quot;static banner 1&quot; /&gt;
&lt;h3&gt;Let\'s be friend&lt;/h3&gt; &lt;ul class=&quot;first&quot;&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;facebook&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/face.png&quot; title=&quot;facebook&quot; /&gt;Find us on Facebook&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;twiter&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/twiter.png&quot; title=&quot;twiter&quot; /&gt;Follow us on Twitter&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt; &lt;ul&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;google&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/google.png&quot; title=&quot;google&quot; /&gt;Google&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;flickr&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/flickr.png&quot; title=&quot;flickr&quot; /&gt;Flick&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt; &lt;ul&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;rss&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/rss.png&quot; title=&quot;rss&quot; /&gt;RSS Feed&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;vimeo&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/vimeo.png&quot; title=&quot;vimeo&quot; /&gt;Vimeo&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;';
			$array_description_footer_4{$language['language_id']} = '&lt;div class=&quot;footer-block-palpay&quot;&gt;
&lt;ul&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;paypal&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/paypal_01.png&quot; title=&quot;paypal&quot; /&gt;&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;visa&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/paypal_02.png&quot; title=&quot;visa&quot; /&gt;&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;AmericanExpress&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/paypal_03.png&quot; title=&quot;American Express&quot; /&gt;&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;MasterCard&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/paypal_04.png&quot; title=&quot;MasterCard&quot; /&gt;&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;#&quot;&gt;&lt;img alt=&quot;Skrill&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/paypal_05.png&quot; title=&quot;Skrill&quot; /&gt;&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;';
			$array_description0{$language['language_id']} = '&lt;div class=&quot;banner_header&quot;&gt;
&lt;ul&gt;
	&lt;li class=&quot;grid-33&quot;&gt;
	&lt;div&gt;&lt;a href=&quot;index.php?route=product/category&amp;amp;path=25&quot;&gt;&lt;img alt=&quot;static_banner_1&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/banner_home_01.png&quot; title=&quot;Volup Aculis&quot; /&gt; &lt;/a&gt;
	&lt;p&gt;Volup Aculis&lt;/p&gt;
	&lt;/div&gt;
	&lt;/li&gt;
	&lt;li class=&quot;grid-33 push-33&quot;&gt;
	&lt;div&gt;&lt;a href=&quot;index.php?route=product/category&amp;amp;path=25&quot;&gt;&lt;img alt=&quot;static_banner_1&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/banner_home_02.png&quot; title=&quot;Pellent Hend&quot; /&gt; &lt;/a&gt;
	&lt;p&gt;Pellent Hend&lt;/p&gt;
	&lt;/div&gt;
	&lt;/li&gt;
	&lt;li class=&quot;grid-33 pull-33&quot;&gt;
	&lt;div&gt;&lt;a href=&quot;index.php?route=product/category&amp;amp;path=25&quot;&gt;&lt;img alt=&quot;static_banner_1&quot; src=&quot;http://demo.bossthemes.com/electronues/image/data/bt_electronues/banner_home_03.png&quot; title=&quot;Aenea Ligula&quot; /&gt; &lt;/a&gt;
	&lt;p&gt;Aenea Ligula&lt;/p&gt;
	&lt;/div&gt;
	&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;';
		}
		
		$boss_staticblock = array(
			'b_Block_Header_Top' => array ('content' => $array_description_header_0, 'status' => 1, 'store_id' => array(0=>0)),
			'b_Block_Footer_1' =>array('content' => $array_description_footer_1, 'status' => 1, 'store_id' => array(0=>0)),
			'b_Block_Footer_2' =>array('content' => $array_description_footer_2, 'status' => 1, 'store_id' => array(0=>0)),
			'b_Block_Footer_3' =>array('content' => $array_description_footer_3, 'status' => 1, 'store_id' => array(0=>0)),
			'b_Block_Footer_4' =>array('content' => $array_description_footer_4, 'status' => 1, 'store_id' => array(0=>0)),
			'boss_staticblock_module' => array(
				0 => array ( 'description' => $array_description0, 'layout_id' => $this->getIdLayout("home"), 'store_id' => array(0=>0), 'position' => 'slideshow', 'status' => 1, 'sort_order' => 1)
			)
		);
		
		$this->model_setting_setting->editSetting('boss_staticblock', $boss_staticblock);		
	}	
}
?>