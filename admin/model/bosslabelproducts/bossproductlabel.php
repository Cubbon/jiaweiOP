<?php
class ModelBosslabelproductsBossproductlabel extends Model {
    public function dropProductLabel(){
        $this->db->query("DROP TABLE `" . DB_PREFIX . "boss_product_label");
    }
	
    public function createTableProductlabel() {       
		$create_boss_label = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "boss_product_label` (`product_id` int(11) NOT NULL , `top_left` int(11) default NULL, `top_right` int(11) default NULL, `center` int(11) default NULL, `bottom_left` int(11) default NULL, `bottom_right` int(11) default NULL , PRIMARY KEY  (`product_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
		$this->db->query($create_boss_label);
	}
	
	public function addProductLabel($data) {
		$product_label=$data['product_label'];
		$this->db->query("INSERT INTO " . DB_PREFIX . "boss_product_label SET product_id = '" . $this->db->escape($product_label['product_id']) . "', top_left = '" . $this->db->escape($product_label['top_left']) . "', top_right = '" . $this->db->escape($product_label['top_right']) . "', center = '" . $this->db->escape($product_label['center']) . "', bottom_left = '" . $this->db->escape($product_label['bottom_left']) . "', bottom_right = '" . $this->db->escape($product_label['bottom_right']) . "'");	
	}
	
	public function editProductLabel($data) {
		$product_label=$data['product_label'];
		$this->db->query("UPDATE " . DB_PREFIX . "boss_product_label SET top_left = '" . $this->db->escape($product_label['top_left']) . "', top_right = '" . $this->db->escape($product_label['top_right']) . "', center = '" . $this->db->escape($product_label['center']) . "', bottom_left = '" . $this->db->escape($product_label['bottom_left']) . "', bottom_right = '" . $this->db->escape($product_label['bottom_right']) . "' WHERE product_id = '" . (int)$product_label['product_id'] . "'");		
	}
		
	public function checkProductid($product_id){
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "boss_product_label WHERE 	product_id = '" . (int)$product_id . "'");
		
		if($query->row){
			return true;
		}
		return false;
	}

	public function getlabelImages($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "boss_product_label WHERE 	product_id = '" . (int)$product_id . "'");
		
		return $query->row;
	}
	
}
?>