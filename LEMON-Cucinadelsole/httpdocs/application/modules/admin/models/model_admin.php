<?php 

class Model_admin extends CI_Model {
			
	function __construct() {
       
		parent::__construct();

	}
	
	function proceedLogin ($data) {
	
		$query = $this->db->query(' SELECT * FROM ls_data WHERE username = "'. $data['username'].'" AND password = "'. $data['password'].'" ');
	
		if ( $query->num_rows == 1 ) {	
				return $query->row();
		}
		return false;
			
	
	}

	public function getAllPages () {
	
		$query = $this->db->query(' SELECT * FROM ls_pages ');
		
		if ( $query->num_rows > 0 ) {	
				return $query->result();
		}
		return false;
	
	}
	
	public function findPage ($uri) {
						
		$query = $this->db->query(' SELECT * FROM ls_pages WHERE url = "'.$uri.'" ');
		
		if ( $query->num_rows > 0 ) {	
				return $query->row();
		}
		return false;
		
	}	
		
	public function getPageLinks () {
						
		$query = $this->db->query(' SELECT url, template FROM ls_pages WHERE is_active="1" AND is_default = "0" ORDER BY order_active ASC');
		if ( $query->num_rows > 0 ) {	
				return $query->result();
		}
		return false;
			
	}
	
	public function getPageTemplate ($uri) {
						
		$query = $this->db->query(' SELECT template FROM ls_pages WHERE url = "'.$uri.'" ');
		
		if ( $query->num_rows > 0 ) {	
				return $query->row();
		}
		return false;
			
	}
	
	function addNewPage ($data) {
			
			$first_query = $this->db->query(' INSERT INTO ls_pages (url, template, is_default, is_active) VALUES ("'.underscore($data['page_url']).'", "'.$data['page_template'].'", "0", "0") ');
			
			$second_query = $this->db->query(' INSERT INTO ls_pages_data (lang, link_name, page_title, meta_description, meta_keywords, id_page ) VALUES 
				("nl","'.$data['first_link_name'].'", "'.$data['first_page_title'].'", "'.$data['first_meta_desc'].'", "'.$data['first_meta_key'].'", LAST_INSERT_ID()), 
				("en", "'.$data['second_link_name'].'", "'.$data['second_page_title'].'","'.$data['second_meta_desc'].'","'.$data['second_meta_key'].'", LAST_INSERT_ID())  '
			);

			if ($first_query && $second_query == true) {
				echo $data = "true";
			}
			else {
				echo $data = "false";
			} 

	}
	
	function getActivePages () {
		
		$query = $this->db->query(' SELECT id_page, url, template FROM ls_pages WHERE is_active="1" AND is_default = "0" ORDER BY order_active ASC');
		
		if ( $query->num_rows > 0 ) {	
				return $query->result();
		}
		return false;

	}
	
	function getNonActivePages () {
		
		$query = $this->db->query(' SELECT id_page, url, template FROM ls_pages WHERE is_active="0" AND is_default = "0" ORDER BY order_nonactive ASC');
		
		if ( $query->num_rows > 0 ) {	
				return $query->result();
		}
		return false;
		
	}

	function setActivePage ($page_id) {
	
		$query = $this->db->query(' UPDATE  ls_pages SET  is_active = 1 WHERE  id_page = "' .$page_id .'" ');
	
	}
	
	function setNonActivePage ($page_id) {
	
		$query = $this->db->query(' UPDATE  ls_pages SET  is_active = 0 WHERE  id_page = "' .$page_id .'" ');
	
	}
	
	function pageActiveOrder ($orderId) {
	
		foreach ( $orderId as $key => $val) {

			$query = $this->db->query(' UPDATE  ls_pages SET  `order_active` =  "'.$key.'"  WHERE  `id_page` = "' .$val .'" ');

		}
	
	}
	
	function pageNonActiveOrder ($orderId) {
	
		foreach ( $orderId as $key => $val) {

			$query = $this->db->query(' UPDATE  ls_pages SET  `order_nonactive` =  "'.$key.'"  WHERE  `id_page` = "' .$val .'" ');
	
		}
	
	}

	function deletePage ($data) {
		
		if ($this->db->table_exists('ls_temp_'.$data['template'].'_data')) {
		
			$first_query = $this->db->query(' DELETE FROM  ls_temp_'.$data['template'].'_data WHERE id_page = "'.$data['page_id'].'" ');
		
		}
		
		$second_query = $this->db->query(' DELETE ls_pages, ls_pages_data FROM ls_pages INNER JOIN ls_pages_data ON ls_pages.id_page=ls_pages_data.id_page  AND ls_pages.id_page = "'.$data['page_id'].'" ');
	
		if ($second_query == true) {
			echo $data = "true";
		}
		else {
			echo $data = "false";
		}
		
	}
	
	function getPageEditData($data) {
		
		$query = $this->db->query(' SELECT * FROM ls_pages_data WHERE id_page ="'.$data['page_id'].'" ');
		
		if ( $query->num_rows > 0 ) {	
				return $query->result();
		}
		return false;
	
	}
		
	function saveCurrentPageData($data) {
	
		$first_query = $this->db->query(' UPDATE ls_pages_data SET  `link_name` =  "'.$data['first_link_name'].'" , `page_title` =  "'.$data['first_page_title'].'" ,`meta_description` =  "'.$data['first_meta_desc'].'" ,  `meta_keywords` =  "'.$data['first_meta_key'].'"   WHERE  `id_page` = ' .$data['id_page'] .' AND  `lang` = "nl" ');
 		$second_query = $this->db->query(' UPDATE  ls_pages_data SET  `link_name` =  "'.$data['second_link_name'].'" , `page_title` =  "'.$data['second_page_title'].'" ,`meta_description` =  "'.$data['second_meta_desc'].'" ,  `meta_keywords` =  "'.$data['second_meta_key'].'"   WHERE  `id_page` = ' .$data['id_page'] .' AND `lang` = "en" ');
		
			if ($first_query && $second_query == true) {
				echo $data = "true";
			}
			else {
				echo $data = "false";
			} 
		
	}

	function getAccount () {
	
		$query = $this->db->query(' SELECT * FROM ls_data WHERE id ="1" ');
		
		if ( $query->num_rows > 0 ) {	
				return $query->row();
		}
		return false;
	
	}
	
	function updateAccount ($data) {
	
		$query = $this->db->query(' 
			UPDATE ls_data SET  
				`first_name` =  "'.$data['firstname'].'",
				`last_name` =  "'.$data['lastname'].'", 
				`username` =  "'.$data['username'].'", 
				`password` =  "'.$data['password'].'",
				`company` =  "'.$data['company'].'",
				`email` =  "'.$data['email'].'",
				`address` =  "'.$data['address'].'",
				`city` =  "'.$data['city'].'",
				`country` =  "'.$data['country'].'", 
				`telephone` =  "'.$data['telephone'].'" 
			WHERE id = 1 '
			);

			if ($query) {
				echo $data = "true";
			}
			else {
				echo $data = "false";
			}
	
	}
	
}
?>