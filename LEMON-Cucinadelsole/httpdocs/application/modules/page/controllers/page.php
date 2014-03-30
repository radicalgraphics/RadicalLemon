<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
		$this->load->model('model_page');

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
		
		$id_page_data = $this->model_page->getPageDataId($data);
	
		$content = array(
            'id_page_data' => $id_page_data->id_page_data
		);
        
        $data['bg_content'] = $this->model_page->getBgContactData($content);
        
		$data['slider_content'] = $this->model_page->getContactData($content);		
		$this->load->view('page', $data);	

	}
	
}