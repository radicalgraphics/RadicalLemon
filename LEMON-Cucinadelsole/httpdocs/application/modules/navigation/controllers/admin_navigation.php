<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_navigation extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
		$this->load->model('model_admin_navigation');
		
    }

 	function getAdminNavigation() {
	
		$data['links'] = $this->model_admin_navigation->getPageLinks();	
		$this->load->view('admin_navigation', $data);
		
	} 
}