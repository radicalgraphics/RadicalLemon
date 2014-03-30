<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_message extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
		$this->load->model('model_message');

    }
	
	function getMessage() {
			
		$isdefault = $this->model_message->isAccountDefault();	

		if ($isdefault != FALSE) {
		
			$this->load->view('admin_message');
		
		}
		
	}

}