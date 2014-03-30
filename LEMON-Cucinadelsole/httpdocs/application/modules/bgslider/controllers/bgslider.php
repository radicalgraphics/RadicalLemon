<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bgslider extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
        global $URI, $IN;

        if ($IN->cookie('user_lang') == FALSE) {

           $lang = $URI->config->config['language_abbr'];

        } else {

           $lang = $IN->cookie('user_lang');

        }

        $this->lang->load('ls_site', $lang);
        
		$this->load->model('model_bgslider');

    }
	
	public function index($id_page) {
			
		global $URI, $IN;
	    
        if ($IN->cookie('user_lang') == FALSE) {
			$lang = $URI->config->config['language_abbr'];
		}
		else {
			$lang = $IN->cookie('user_lang');
		}
       
		$data = array(
			'id_page' => $id_page,
			'lang' => $lang
		);
        
		$id_page_data = $this->model_bgslider->getPageDataId($data);
        
		$content = array(
            'id_page_data' => $id_page_data->id_page_data
		);
		
		$data['slider_content'] = $this->model_bgslider->getContactData($content);		
		$this->load->view('bgslider', $data);	

	}
	
}