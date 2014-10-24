<?php
class ControllerModuleBossLatestReview extends Controller {
	protected function index($setting) {
		
		$this->document->addScript('catalog/view/javascript/bossthemes/jquery.carouFredSel-6.2.0-packed.js');
		
		static $module = 0;
	
		$this->load->model('catalog/product');
		$this->load->model('tool/image');
		
		$this->data['use_scrolling_panel'] = $setting['use_scrolling_panel'];
		$this->data['scroll'] = $setting['scroll'];
		$this->data['button_cart'] = $this->language->get('button_cart');
		
		$results = array();
		$results_data = $this->getLatestReviewProducts($setting['limit']);
		$this->data['heading_title'] = $setting['title'][$this->config->get('config_language_id')];
		$this->data['products'] = array();
		foreach ($results_data as $data) {
			$author = $data['author'];
			$review = $data['text'];
			$result = $this->model_catalog_product->getproduct($data['product_id']);
			
			if ($result['image']) {
				$image = $this->model_tool_image->resize($result['image'], $setting['image_width'], $setting['image_height']);
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
			
			$this->data['products'][] = array(
				'author' 	 => $author,
				'review'	 => mb_substr(strip_tags(html_entity_decode($review, ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
				'product_id' => $result['product_id'],
				'model'      => $result['model'],
				'thumb'   	 => $image,
				'name'    	 => $result['name'],
				'price'   	 => $price,
				'special' 	 => $special,
				'rating'     => $rating,
                'description' => mb_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 50) . '..',
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
			);
		}
		
		$this->data['module'] = $module++;
		$this->data['template'] = $this->config->get('config_template');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/boss_latestreview.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/boss_latestreview.tpl';
		} else {
			$this->template = 'default/template/module/boss_latestreview.tpl';
		}

		$this->render();
	}
	public function getLatestReviewProducts($limit) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "review r ON (p.product_id = r.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND r.status = '1' ORDER BY r.date_added DESC LIMIT " . (int)$limit);
		
		return $query->rows;
	}
}
?>