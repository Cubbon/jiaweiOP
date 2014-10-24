<?php 
class ControllerBosslabelproductsProducts extends Controller {
	private $error = array(); 
     
  	public function index() {
		$this->load->language('bosslabelproducts/products');
    	
		$this->document->setTitle($this->language->get('heading_title')); 
		
		$this->load->model('catalog/product');
		
		$this->load->model('bosslabelproducts/bossproductlabel');
				
		$this->getList();
  	}
  
  	public function insert() {
    	$this->load->language('bosslabelproducts/products');

    	$this->document->setTitle($this->language->get('heading_title')); 
		
		$this->load->model('bosslabelproducts/bossproductlabel');
		
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
		
			$this->model_bosslabelproducts_bossproductlabel->addProductLabel($this->request->post);
	  		
			$this->session->data['success'] = $this->language->get('text_success');
	  
			$url = '';
			
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}
		
			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
			}
			
			if (isset($this->request->get['filter_price'])) {
				$url .= '&filter_price=' . $this->request->get['filter_price'];
			}
			
			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}
			
			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}
					
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->redirect($this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getForm();
  	}

  	public function update() {
    	$this->load->language('bosslabelproducts/products');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('bosslabelproducts/bossproductlabel');
	
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_bosslabelproducts_bossproductlabel->editProductLabel($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$url = '';
			
			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}
		
			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
			}
			
			if (isset($this->request->get['filter_price'])) {
				$url .= '&filter_price=' . $this->request->get['filter_price'];
			}
			
			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}	
		
			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}
					
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->redirect($this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

    	$this->getForm();
  	}

  	private function getList() {				
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}

		if (isset($this->request->get['filter_model'])) {
			$filter_model = $this->request->get['filter_model'];
		} else {
			$filter_model = null;
		}
		
		if (isset($this->request->get['filter_price'])) {
			$filter_price = $this->request->get['filter_price'];
		} else {
			$filter_price = null;
		}

		if (isset($this->request->get['filter_quantity'])) {
			$filter_quantity = $this->request->get['filter_quantity'];
		} else {
			$filter_quantity = null;
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'pd.name';
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
						
		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}
		
		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}		

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}
						
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
		
    	
		$this->data['products'] = array();

		$data = array(
			'filter_name'	  => $filter_name, 
			'filter_model'	  => $filter_model,
			'filter_price'	  => $filter_price,
			'filter_quantity' => $filter_quantity,
			'filter_status'   => $filter_status,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit'           => $this->config->get('config_admin_limit')
		);
		$this->load->model('bosslabelproducts/bosslabel');
		
		$this->load->model('tool/image');
		
		$product_total = $this->model_catalog_product->getTotalProducts($data);
			
		$results = $this->model_catalog_product->getProducts($data);
				    			
		foreach ($results as $result) {
			$action = array();
			
			if($this->model_bosslabelproducts_bossproductlabel->checkProductid($result['product_id'])){		
				$action[] = array(
					'text' => $this->language->get('text_action'),
					'href' => $this->url->link('bosslabelproducts/products/update', 'token=' . $this->session->data['token'] . '&product_id=' . $result['product_id'] . $url, 'SSL')
				);
			}else{
				$action[] = array(
					'text' => $this->language->get('text_action'),
					'href' => $this->url->link('bosslabelproducts/products/insert', 'token=' . $this->session->data['token'] . '&product_id=' . $result['product_id'] . $url, 'SSL')
				);
			}
							
			$labels = $this->model_bosslabelproducts_bossproductlabel->getlabelImages($result['product_id']);
			$image_top_left = $this->model_tool_image->resize('no_image.jpg', 40, 40);
			$image_top_right = $this->model_tool_image->resize('no_image.jpg', 40, 40);
			$image_center = $this->model_tool_image->resize('no_image.jpg', 40, 40);
			$image_bottom_left = $this->model_tool_image->resize('no_image.jpg', 40, 40);
			$image_bottom_right = $this->model_tool_image->resize('no_image.jpg', 40, 40);
			if($labels){
				if($labels['top_left']){
					$top_left = $this->model_bosslabelproducts_bosslabel->getlabelImages($labels['top_left']);
					if($top_left['image'] && file_exists(DIR_IMAGE . $top_left['image'])){
						$image_top_left = $this->model_tool_image->resize($top_left['image'], 40, 40);
					}
				}
				if($labels['top_right']){
					$top_right = $this->model_bosslabelproducts_bosslabel->getlabelImages($labels['top_right']);
					if($top_right['image'] && file_exists(DIR_IMAGE . $top_right['image'])){
						$image_top_right = $this->model_tool_image->resize($top_right['image'], 40, 40);
					}
				}
				if($labels['center']){
					$center = $this->model_bosslabelproducts_bosslabel->getlabelImages($labels['center']);
					if($center['image'] && file_exists(DIR_IMAGE . $center['image'])){
						$image_center = $this->model_tool_image->resize($center['image'], 40, 40);
					}
				}
				if($labels['bottom_left']){
					$bottom_left = $this->model_bosslabelproducts_bosslabel->getlabelImages($labels['bottom_left']);
					if($bottom_left['image'] && file_exists(DIR_IMAGE . $bottom_left['image'])){
						$image_bottom_left = $this->model_tool_image->resize($bottom_left['image'], 40, 40);
					}
				}
				if($labels['bottom_right']){
					$bottom_right = $this->model_bosslabelproducts_bosslabel->getlabelImages($labels['bottom_right']);
					if($bottom_right['image'] && file_exists(DIR_IMAGE . $bottom_right['image'])){
						$image_bottom_right = $this->model_tool_image->resize($bottom_right['image'], 40, 40);
					}
				}
			}
			
			
			if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
				$image = $this->model_tool_image->resize($result['image'], 40, 40);
			} else {
				$image = $this->model_tool_image->resize('no_image.jpg', 40, 40);
			}
	
			$special = false;
			
			$product_specials = $this->model_catalog_product->getProductSpecials($result['product_id']);
			
			foreach ($product_specials  as $product_special) {
				if (($product_special['date_start'] == '0000-00-00' || $product_special['date_start'] < date('Y-m-d')) && ($product_special['date_end'] == '0000-00-00' || $product_special['date_end'] > date('Y-m-d'))) {
					$special = $product_special['price'];
			
					break;
				}					
			}
	
      		$this->data['products'][] = array(
				'product_id' => $result['product_id'],
				'name'       => $result['name'],
				'model'      => $result['model'],
				'price'      => $result['price'],
				'special'    => $special,
				'image'      => $image,
				'quantity'   => $result['quantity'],
				'status'     => ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
				'action'    	 => $action, 
				'top_left' 		=> $image_top_left,
				'top_right' 	=> $image_top_right,
				'center' 		=> $image_center,
				'bottom_left' 	=> $image_bottom_left,
				'bottom_right' 	=> $image_bottom_right,				
			);
    	}
		
		$this->data['heading_title'] = $this->language->get('heading_title');		
		$this->data['text_heading'] = $this->language->get('text_heading');		
		$this->data['text_enabled'] = $this->language->get('text_enabled');		
		$this->data['text_disabled'] = $this->language->get('text_disabled');		
		$this->data['text_no_results'] = $this->language->get('text_no_results');		
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');		
			
		$this->data['column_image'] = $this->language->get('column_image');		
		$this->data['column_name'] = $this->language->get('column_name');		
		$this->data['column_model'] = $this->language->get('column_model');		
		$this->data['column_price'] = $this->language->get('column_price');		
		$this->data['column_quantity'] = $this->language->get('column_quantity');		
		$this->data['column_status'] = $this->language->get('column_status');		
		$this->data['column_action'] = $this->language->get('column_action');		
		$this->data['column_label'] = $this->language->get('column_label');		
					
		$this->data['button_filter'] = $this->language->get('button_filter');
		 
 		$this->data['token'] = $this->session->data['token'];
		
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

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}
		
		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}
		
		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}
								
		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
					
		$this->data['sort_name'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'] . '&sort=pd.name' . $url, 'SSL');
		$this->data['sort_model'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'] . '&sort=p.model' . $url, 'SSL');
		$this->data['sort_price'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'] . '&sort=p.price' . $url, 'SSL');
		$this->data['sort_quantity'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'] . '&sort=p.quantity' . $url, 'SSL');
		$this->data['sort_status'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'] . '&sort=p.status' . $url, 'SSL');
		$this->data['sort_order'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'] . '&sort=p.sort_order' . $url, 'SSL');
		
		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}
		
		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
												
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
				
		$pagination = new Pagination();
		$pagination->total = $product_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();
	
		$this->data['filter_name'] = $filter_name;
		$this->data['filter_model'] = $filter_model;
		$this->data['filter_price'] = $filter_price;
		$this->data['filter_quantity'] = $filter_quantity;
		$this->data['filter_status'] = $filter_status;
		
		$this->data['sort'] = $sort;
		$this->data['order'] = $order;

		$this->template = 'bosslabelproducts/products_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
  	}

  	private function getForm() {
    	$this->data['heading_title'] = $this->language->get('heading_title');
    	$this->data['text_heading'] = $this->language->get('text_heading');
		$this->data['text_boss_products'] = $this->language->get('text_boss_products'); 
		$this->data['text_boss_labels'] = $this->language->get('text_boss_labels'); 
		$this->data['text_boss_settings'] = $this->language->get('text_boss_settings');  
		
		$this->data['entry_product_name'] = $this->language->get('entry_product_name');  
		$this->data['entry_top_left'] = $this->language->get('entry_top_left');  
		$this->data['entry_top_right'] = $this->language->get('entry_top_right');  
		$this->data['entry_center'] = $this->language->get('entry_center');  
		$this->data['entry_bottom_left'] = $this->language->get('entry_bottom_left');  
		$this->data['entry_bottom_right'] = $this->language->get('entry_bottom_right');  
	
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['token'] = $this->session->data['token'];	
		
		$this->data['boss_products'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['boss_labels'] = $this->url->link('bosslabelproducts/labels', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['boss_settings'] = $this->url->link('bosslabelproducts/setting', 'token=' . $this->session->data['token'], 'SSL');

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}
		
		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

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
			'href'      => $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

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
		$this->load->model('tool/image');	
		$this->load->model('bosslabelproducts/bosslabel');
		$this->data['labels'] = array();
		$results = $this->model_bosslabelproducts_bosslabel->getLabels();
		foreach ($results as $result) {
			if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
				$image = $this->model_tool_image->resize($result['image'], 40, 40);
			} else {
				$image = $this->model_tool_image->resize('no_image.jpg', 40, 40);
			}
			$this->data['labels'][] = array(
				'label_id' => $result['label_id'],
				'image'         => $image,
				'name'        => $result['name']
			);
		}
			
		if(isset($this->request->get['product_id'])){	
			$product_id = $this->request->get['product_id']; 
		}	
		$this->load->model('catalog/product');
		$product = 	$this->model_catalog_product->getProduct($product_id);
		
		if($this->model_bosslabelproducts_bossproductlabel->checkProductid($product_id)){		
			$product_label = $this->model_bosslabelproducts_bossproductlabel->getlabelImages($product_id);
			
			$this->data['product_label'] = array(
				'product_id' 	=>  $product_id,
				'product_name'	=>  $product['name'],
				'top_left'		=> $product_label['top_left'],
				'top_right'		=> $product_label['top_right'],
				'center'		=> $product_label['center'],
				'bottom_left'	=> $product_label['bottom_left'],
				'bottom_right'	=> $product_label['bottom_right'],
			);
			
			$this->data['action'] = $this->url->link('bosslabelproducts/products/update', 'token=' . $this->session->data['token'] . '&product_id=' . $this->request->get['product_id'] .$url, 'SSL');
		}else{ 
			$this->data['product_label'] = array(
				'product_id' 	=>  $product_id,
				'product_name'	=>  $product['name'],
				'top_left'		=>  0,
				'top_right'		=> 	0,
				'center'		=> 	0,
				'bottom_left'	=> 	0,
				'bottom_right'	=> 	0,
			);
			$this->data['action'] = $this->url->link('bosslabelproducts/products/insert', 'token=' . $this->session->data['token'] .$url, 'SSL');
		}
		
		$this->data['cancel'] = $this->url->link('bosslabelproducts/products', 'token=' . $this->session->data['token'] .$url, 'SSL');

		$this->template = 'bosslabelproducts/products_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
  	} 
	
  	private function validateForm() { 
    	if (!$this->user->hasPermission('modify', 'bosslabelproducts/products')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	}
		
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}
					
    	if (!$this->error) {
			return true;
    	} else {
      		return false;
    	}
  	}
	
	public function autocomplete() {
		$json = array();
		
		if (isset($this->request->get['filter_name']) || isset($this->request->get['filter_model']) || isset($this->request->get['filter_category_id'])) {
			$this->load->model('catalog/product');
			
			if (isset($this->request->get['filter_name'])) {
				$filter_name = $this->request->get['filter_name'];
			} else {
				$filter_name = '';
			}
			
			if (isset($this->request->get['filter_model'])) {
				$filter_model = $this->request->get['filter_model'];
			} else {
				$filter_model = '';
			}
						
			if (isset($this->request->get['filter_category_id'])) {
				$filter_category_id = $this->request->get['filter_category_id'];
			} else {
				$filter_category_id = '';
			}
			
			if (isset($this->request->get['filter_sub_category'])) {
				$filter_sub_category = $this->request->get['filter_sub_category'];
			} else {
				$filter_sub_category = '';
			}
			
			if (isset($this->request->get['limit'])) {
				$limit = $this->request->get['limit'];	
			} else {
				$limit = 20;	
			}			
						
			$data = array(
				'filter_name'         => $filter_name,
				'filter_model'        => $filter_model,
				'filter_category_id'  => $filter_category_id,
				'filter_sub_category' => $filter_sub_category,
				'start'               => 0,
				'limit'               => $limit
			);
			
			$results = $this->model_catalog_product->getProducts($data);
			
			foreach ($results as $result) {
				$option_data = array();
				
				$product_options = $this->model_catalog_product->getProductOptions($result['product_id']);	
				
				foreach ($product_options as $product_option) {
					if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
						$option_value_data = array();
					
						foreach ($product_option['product_option_value'] as $product_option_value) {
							$option_value_data[] = array(
								'product_option_value_id' => $product_option_value['product_option_value_id'],
								'option_value_id'         => $product_option_value['option_value_id'],
								'name'                    => $product_option_value['name'],
								'price'                   => (float)$product_option_value['price'] ? $this->currency->format($product_option_value['price'], $this->config->get('config_currency')) : false,
								'price_prefix'            => $product_option_value['price_prefix']
							);	
						}
					
						$option_data[] = array(
							'product_option_id' => $product_option['product_option_id'],
							'option_id'         => $product_option['option_id'],
							'name'              => $product_option['name'],
							'type'              => $product_option['type'],
							'option_value'      => $option_value_data,
							'required'          => $product_option['required']
						);	
					} else {
						$option_data[] = array(
							'product_option_id' => $product_option['product_option_id'],
							'option_id'         => $product_option['option_id'],
							'name'              => $product_option['name'],
							'type'              => $product_option['type'],
							'option_value'      => $product_option['option_value'],
							'required'          => $product_option['required']
						);				
					}
				}
					
				$json[] = array(
					'product_id' => $result['product_id'],
					'name'       => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),	
					'model'      => $result['model'],
					'option'     => $option_data,
					'price'      => $result['price']
				);	
			}
		}

		$this->response->setOutput(json_encode($json));
	}
}
?>