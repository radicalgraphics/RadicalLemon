<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
		$this->load->model('model_video');

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
		
		$id_page_data = $this->model_video->getPageDataId($data);
	
		$content = array(
		'id_page_data' => $id_page_data->id_page_data
		);
		
		$data['video_content'] = $this->model_video->getContactData($content);		
		$this->load->view('video', $data);	

	}
	
}