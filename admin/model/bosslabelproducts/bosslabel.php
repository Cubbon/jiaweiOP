<?php
class ModelBosslabelproductsBosslabel extends Model {
    public function dropLabel(){
        $this->db->query("DROP TABLE `" . DB_PREFIX . "boss_label");
    }
	
    public function createTablelabel() {       
		$create_boss_label = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "boss_label` (`label_id` int(11) NOT NULL auto_increment, `name` varchar(255) collate utf8_unicode_ci default NULL, `image` varchar(255) collate utf8_unicode_ci default NULL, PRIMARY KEY  (`label_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
		$this->db->query($create_boss_label);
	}
	
	public function getlabelImages($label_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "boss_label WHERE 	label_id = '" . (int)$label_id . "'");
		
		return $query->row;
	}
	
	public function getLabels($data = array()) {
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "boss_label";
			
			if (isset($data['sort'])) {
				$sql .= " ORDER BY " . $data['sort'];	
			} else {
				$sql .= " ORDER BY name";	
			}
			
			if (isset($data['order']) && ($data['order'] == 'DESC')) {
				$sql .= " DESC";
			} else {
				$sql .= " ASC";
			}
		
			if (isset($data['start']) || isset($data['limit'])) {
				if ($data['start'] < 0) {
					$data['start'] = 0;
				}				

				if ($data['limit'] < 1) {
					$data['limit'] = 20;
				}	
			
				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
			}	

			$query = $this->db->query($sql);
		
			return $query->rows;
		}else{
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "boss_label WHERE 1");
			
			return $query->rows;
		}
	}
	
	public function getTotallabels() {
		$query = $this->db->query("SELECT count(label_id)  AS total FROM " . DB_PREFIX . "boss_label WHERE 1");
		
		return $query->row['total'];
	}	
	
	public function addLabel($data) {
		$label = $data['label_image'];
		$this->db->query("INSERT INTO " . DB_PREFIX . "boss_label SET name = '" . $this->db->escape($label['name']) . "', image = '" . $this->db->escape($label['image']) . "'");	
	}
	
	public function editLabel($label_id, $data) {
		$label = $data['label_image'];
		$this->db->query("UPDATE " . DB_PREFIX . "boss_label SET name = '" . $this->db->escape($label['name']) . "', image = '" . $this->db->escape($label['image']) . "' WHERE label_id = '" . (int)$label_id . "'");		
	}
	
	public function deleteLabel($label_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "boss_label WHERE label_id = '" . (int)$label_id . "'");
		$this->db->query("UPDATE " . DB_PREFIX . "boss_product_label SET top_left = 0 WHERE top_left = '" . (int)$label_id . "'");
		$this->db->query("UPDATE " . DB_PREFIX . "boss_product_label SET top_right = 0 WHERE top_right = '" . (int)$label_id . "'");
		$this->db->query("UPDATE " . DB_PREFIX . "boss_product_label SET center = 0 WHERE center = '" . (int)$label_id . "'");
		$this->db->query("UPDATE " . DB_PREFIX . "boss_product_label SET bottom_left = 0 WHERE bottom_left = '" . (int)$label_id . "'");
		$this->db->query("UPDATE " . DB_PREFIX . "boss_product_label SET bottom_right = 0 WHERE bottom_right = '" . (int)$label_id . "'");
	}

}
?>