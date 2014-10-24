<?php  
class ControllerModuleBossCategory extends Controller {
	protected function index($setting) {
	
		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/boss_category.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/boss_category.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/boss_category.css');
		}
		
		$this->language->load('module/boss_category');
		
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}
		
		$this->data['column'] = $setting['column'];
		$this->data['width'] = $setting['width'];
		
		if (isset($parts[0])) {
			$this->data['category_id'] = $parts[0];
		} else {
			$this->data['category_id'] = 0;
		}
		if (isset($parts[1])) {
			$this->data['category_id_2'] = $parts[1];
		} else {
			$this->data['category_id_2'] = 0;
		}
		if (isset($parts[2])) {
			$this->data['child_id'] = $parts[2];
		} else {
			$this->data['child_id'] = 0;
		}
						
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories($parts[0]);

		foreach ($categories as $category) {
			$total = $this->model_catalog_product->getTotalProducts(array('filter_category_id' => $category['category_id']));
			//加上父Id
			$test=$category['parent_id'].'_'.$category['category_id'];
			$this->data['categories'][] = array(
				'category_id' => $category['category_id'],
				'name'        => $category['name'] . ($this->config->get('config_product_count') ? ' (' . $total . ')' : ''),
				'children'	  => $this->getChildrenCategory($category, $test),
				'href'        => $this->url->link('product/category', 'path='.$test)
			);	
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/boss_category.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/boss_category.tpl';
		} else {
			$this->template = 'default/template/module/boss_category.tpl';
		}
		
		
		$this->render();
		
  	}
	
	private function getChildrenCategory($category, $path)
	{
		$children_data = array();
		
		$children = $this->model_catalog_category->getCategories($category['category_id']);
		
		foreach ($children as $child) {
			$data = array(
				'filter_category_id'  => $child['category_id'],
				'filter_sub_category' => true	
			);		
								
			$children_data[] = array(
				'child_id'	=> $child['category_id'],
				'name'  	=> $child['name'],
				'children' 	=> $this->getChildrenCategory($child, $path . '_' . $child['category_id']),
				'href'  => $this->url->link('product/category', 'path=' . $path . '_' . $child['category_id'])	
			);
			
		}
		return $children_data;
	}
}
?>