<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
		
    }
	
	function getLangSwitcher($lang) {

		$this->load->view('lang_switcher', $lang);

	}
}