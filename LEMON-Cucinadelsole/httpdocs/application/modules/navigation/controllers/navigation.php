<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navigation extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
		$this->load->model('model_navigation');
		
    }
	
	function getNavigation($lang) {

		$data['navigation'] = $this->model_navigation->getMenu($lang);
		$this->load->view('navigation', $data);
		
	}
}