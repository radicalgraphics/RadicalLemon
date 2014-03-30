<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_language extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
		
    }
	
	function getAdminLangSwitcher() {

		$this->load->view('lang_admin_switcher');

	}
}