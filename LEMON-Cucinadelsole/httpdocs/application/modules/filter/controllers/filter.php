<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
		$this->load->model('model_filter');

    }
	
	function calendarFilter ($slider_content) {
        
        $this->load->view('filter',$slider_content);
        
    }
	
}