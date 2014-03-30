<?php 

class Model_navigation extends CI_Model {
			
		function __construct() {
       
			parent::__construct();
		
		}
		
		function getMenu($lang) {

			$query = $this->db->query(' SELECT * FROM ls_pages_data INNER JOIN ls_pages ON ls_pages.id_page=ls_pages_data.id_page WHERE lang = "'.$lang.'" AND is_active ="1" ORDER BY order_active ASC ');
			return $query->result();
			
		}
		
}
?>