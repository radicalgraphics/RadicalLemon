<?php 

class Model_message extends CI_Model {
			
		function __construct() {
       
			parent::__construct();
		
		}
		
		function isAccountDefault () {
			
			$query = $this->db->query(' SELECT * FROM ls_data WHERE username = "lemon" OR password = "shuttle" ');
	
			if ( $query->num_rows == 1 ) {	
				return $query->row();
			}
			return false;
			
			}
		
}
?>