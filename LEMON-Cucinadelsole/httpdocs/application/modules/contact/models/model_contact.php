<?php 

class Model_contact extends CI_Model {
			
		function __construct() {
       
			parent::__construct();
		
		}
		
		function getContactData () {
		
			$query = $this->db->query(' SELECT * FROM ls_data ');
			return $query->row();
		
		
		
		}
		
}
?>