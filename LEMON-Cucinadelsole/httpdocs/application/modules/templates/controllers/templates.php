<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends MX_Controller {

	function one_column($data) {

		$this->load->view('one_column', $data);
	
	}
	
	function admin_template($data) {
	
		$this->load->view('admin_template', $data);
	
	}
}
