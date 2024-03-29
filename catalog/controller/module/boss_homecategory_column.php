<?php
class ControllerModuleBossHomecategoryColumn extends Controller {
    protected function index($setting) {
        		
		static $module = 0;
		
		$this->data['template'] = $this->config->get('config_template');
		
		$this->load->language('module/boss_homecategory_column');
		$this->data['text_view_all'] = $this->language->get('text_view_all');
		
		$this->load->model('catalog/product');
		$this->load->model('catalog/category');
		$this->load->model('tool/image');
		
		$category_id = $setting['category_id'];
		if (isset($category_id)) {
			$this->data['modules'] = array();
			$catagory_name = $this->model_catalog_category->getCategory($category_id);
			
			$data = array(
				'filter_category_id' => $category_id,
				'start' => 0,
				'limit' => $setting['limit']
			);
			
			$results = $this->model_catalog_product->getProducts($data);
			
			$products = array();
			foreach($results as $result){
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = false;
				}

				if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$price = false;
				}
						
				if ((float)$result['special']) { 
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$special = false;
				}
				
				if ($this->config->get('config_review_status')) {
					$rating = $result['rating'];
				} else {
					$rating = false;
				}

				$products[] = array(
					'product_id' => $result['product_id'],
					'thumb'   	 => $image,
					'name'    	 => $result['name'],
					'description'=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
					'price'   	 => $price,
					'special' 	 => $special,
					'rating'     => $rating,
					'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
					'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
				);
			}
			
			$this->data['modules'] = array(
					'name'	 		 =>	$catagory_name['name'],
					'products'       => $products, 
					'href'    		 => $this->url->link('product/category', 'path=' . $category_id),
			);
		}
		
		$this->data['module'] = $module++; 
       
	    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/boss_homecategory_column.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/module/boss_homecategory_column.tpl';
        } else {
            $this->template = 'default/template/module/boss_homecategory_column.tpl';
        }

        $this->render();
    }
	
}

?>