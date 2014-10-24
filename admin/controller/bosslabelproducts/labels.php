<?php
class ControllerBosslabelproductsLabels extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->load->language('bosslabelproducts/labels');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('bosslabelproducts/bosslabel');
		 
		$this->getList();
	
	}
	
	public function insert() {
		$this->load->language('bosslabelproducts/labels');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('bosslabelproducts/bosslabel');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_bosslabelproducts_bosslabel->addLabel($this->request->post);

			$url = '';
		
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->redirect($this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'] .$url, 'SSL')); 
		}

		$this->getForm();
	}

	public function update() {
		$this->load->language('bosslabelproducts/labels');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('bosslabelproducts/bosslabel');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_bosslabelproducts_bosslabel->editLabel($this->request->get['label_id'], $this->request->post);
			
			$url = '';
		
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->redirect($this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'] .$url, 'SSL')); 
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('bosslabelproducts/labels');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('bosslabelproducts/bosslabel');
		
		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $label_id) {
				$this->model_bosslabelproducts_bosslabel->deleteLabel($label_id);
			}

			$url = '';
		
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'] .$url, 'SSL')); 
		
		}

		$this->getList();
	}
	
	public function getList(){
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}
		
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
						
		$url = '';
		
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
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
									
		$this->data['insert'] = $this->url->link('bosslabelproducts/labels/insert', 'token=' . $this->session->data['token'] .$url, 'SSL');
		$this->data['delete'] = $this->url->link('bosslabelproducts/labels/delete', 'token=' . $this->session->data['token'] .$url, 'SSL');

		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_heading'] = $this->language->get('text_heading');		
		$this->data['text_boss_products'] = $this->language->get('text_boss_products'); 
		$this->data['text_boss_labels'] = $this->language->get('text_boss_labels'); 
		$this->data['text_boss_settings'] = $this->language->get('text_boss_settings'); 
		$this->data['text_no_results'] = $this->language->get('text_no_results');

		$this->data['column_image'] = $this->language->get('column_image');
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_action'] = $this->language->get('column_action');

		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
 
		$this->data['boss_products'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['boss_labels'] = $this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['boss_settings'] = $this->url->link('bosslabelproducts/setting', 'token=' . $this->session->data['token'], 'SSL');
			
	
		$this->data['labels'] = array();
		$data = array(
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit'           => $this->config->get('config_admin_limit')
		);

		$this->load->model('tool/image');
		
		$label_total = $this->model_bosslabelproducts_bosslabel->getTotallabels();
		
		$results = $this->model_bosslabelproducts_bosslabel->getLabels($data);
		
		foreach ($results as $result) {
			$action = array();
			
			if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
				$image = $this->model_tool_image->resize($result['image'], 50, 50);
			} else {
				$image = $this->model_tool_image->resize('no_image.jpg', 50, 50);
			}
			
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('bosslabelproducts/labels/update', 'token=' . $this->session->data['token'] . '&label_id=' . $result['label_id'] .$url, 'SSL')
			);
					
			$this->data['labels'][] = array(
				'label_id' => $result['label_id'],
				'name'        => $result['name'],
				'image' 	  => $image,
				'selected'    => isset($this->request->post['selected']) && in_array($result['label_id'], $this->request->post['selected']),
				'action'      => $action
			);
		}
	
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		
		$url = '';
								
		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['sort_name'] = $this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');	
		
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
												
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
			
		$pagination = new Pagination();
		$pagination->total = $label_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
		
		$this->data['pagination'] = $pagination->render();
		$this->data['sort'] = $sort;
		$this->data['order'] = $order;
		
		$this->template = 'bosslabelproducts/labels_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}

	public function getform(){
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
				
		$url = '';
		
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		if (!isset($this->request->get['label_id'])) {
			$this->data['action'] = $this->url->link('bosslabelproducts/labels/insert', 'token=' . $this->session->data['token'] .$url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('bosslabelproducts/labels/update', 'token=' . $this->session->data['token'] . '&label_id=' . $this->request->get['label_id'] .$url, 'SSL');
		}
		
		$this->data['cancel'] = $this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'] .$url, 'SSL');

		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_heading'] = $this->language->get('text_heading');		
		$this->data['text_boss_products'] = $this->language->get('text_boss_products'); 
		$this->data['text_boss_labels'] = $this->language->get('text_boss_labels'); 
		$this->data['text_boss_settings'] = $this->language->get('text_boss_settings'); 
		$this->data['text_no_results'] = $this->language->get('text_no_results');
 		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');	
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_image'] = $this->language->get('entry_image');	
		
		$this->data['column_image'] = $this->language->get('column_image');
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_action'] = $this->language->get('column_action');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
 
		$this->data['boss_products'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['boss_labels'] = $this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['boss_settings'] = $this->url->link('bosslabelproducts/setting', 'token=' . $this->session->data['token'], 'SSL');
			
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		
		$this->data['token'] = $this->session->data['token'];
		
		$this->load->model('tool/image'); 
		
		if (isset($this->request->post['label_image'])) {
			$label_image = $this->request->post['label_image'];
		} elseif (isset($this->request->get['label_id'])) {
			$label_image = $this->model_bosslabelproducts_bosslabel->getlabelImages($this->request->get['label_id']);	
		} else {
			$label_image = array();
		}
		
		if($label_image){
			if ($label_image['image'] && file_exists(DIR_IMAGE . $label_image['image'])) {
				$image = $label_image['image'];
			} else {
				$image = 'no_image.jpg';
			}			
		
			$this->data['label_image'] = array(
				'name' 					   => $label_image['name'],
				'image'                    => $image,
				'thumb'                    => $this->model_tool_image->resize($image, 100, 100)
			);	
		}else{
			$image = 'no_image.jpg';
			$this->data['label_image'] = array(
				'name' 					   => '',
				'image'                    => $image,
				'thumb'                    => $this->model_tool_image->resize($image, 100, 100)
			);	
		}
			
		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);		

		$this->template = 'bosslabelproducts/labels_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	private function validateForm() {
		if (!$this->user->hasPermission('modify', 'bosslabelproducts/labels')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		$value = $this->request->post['label_image'];
		if ((utf8_strlen($value['name']) < 3) || (utf8_strlen($value['name']) > 255)) {
			$this->error['warning'] = $this->language->get('error_name');
		}
					
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateDelete() {
		if (!$this->user->hasPermission('modify', 'bosslabelproducts/labels')) {
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