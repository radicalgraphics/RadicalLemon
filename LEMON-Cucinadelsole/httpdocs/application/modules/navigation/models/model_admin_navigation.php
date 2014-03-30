<?php 

class Model_admin_navigation extends CI_Model {
			
		function __construct() {
       
			parent::__construct();
		
		}
		
		public function getPageLinks () {

		$query = $this->db->query(' SELECT url, template FROM ls_pages WHERE is_active="1" ORDER BY order_active ASC');
		
		if ( $query->num_rows > 0 ) {	
				return $query->result();
		}
		return false;
			
	}
		
}
?>