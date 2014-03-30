<?php 

class Model_indexcontroller extends CI_Model {
			
		function __construct() {
       
			parent::__construct();
		
		}
		
		public function findHomePage ($data) {
						
			$query = $this->db->query(' SELECT * FROM ls_pages INNER JOIN ls_pages_data ON ls_pages.id_page=ls_pages_data.id_page WHERE is_active = "1" AND order_active="0" AND lang = "'.$data['lang'].'"   ');
		
			if ( $query->num_rows > 0 ) {	
					return $query->row();
			}
			return false;
		}	

		public function findPage ($data) {
		
			$query = $this->db->query(' SELECT * FROM ls_pages_data INNER JOIN ls_pages ON ls_pages.id_page=ls_pages_data.id_page WHERE url = "'.$data['uri'].'" AND lang = "'.$data['lang'].'"  ');
	
			if ( $query->num_rows > 0 ) {	
					return $query->row();
			}
			return false;			
		}
		
}
?>