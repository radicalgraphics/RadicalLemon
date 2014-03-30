<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_video extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
		$this->load->model('model_admin_video');

    }
	
	public function index() {
			
		global $URI, $IN;
		$uri2 = $this->uri->segment(2);
		
		if ($IN->cookie('user_lang') == FALSE) {
   
			$lang = $URI->config->config['language_abbr'];
		
		}
		else {
			
			$lang = $IN->cookie('user_lang');
			
		}
		
		$id_page = $this->model_admin_video->getPageIdByUri($uri2);
		
		$data = array (
						'id' => $id_page->id_page,
						'lang' => $lang		
		); 
		
		$id_page_data = $this->model_admin_video->getIdPageDataByPageId($data);

		$data = array (
						'id' => $id_page_data->id_page_data,
						'pid' => $id_page_data->id_page,
						'lang' => $lang	
		); 

		$data['active_videos'] = $this->model_admin_video->getActiveVideo($data);
		$data['non_active_videos'] = $this->model_admin_video->getNonActiveVideo($data);
		$data['page_information_name'] = $this->model_admin_video->getPageInformationName($data);
		$data['page_information_template'] = $this->model_admin_video->getPageInformationTemplate($data);
		$this->load->view('admin_video', $data);

	}
	
	function add() {
			
			$data = array (
						'id_page_data' => $this->input->get('id'),
						'id_page' => $this->input->get('pid')	
			); 

			$this->load->view('admin_add_video', $data);
			
	}
	
    
    
    
    
    
    
    
    
	function save() {
		
		
	

		
        $data = array(
			'lang' =>  $this->input->post('lang')
		);	
		
		if ($data['lang'] == "all") {

			$data = array (
				'id' => $this->input->post('id_page'),
				'video_url' => $this->input->post('video_url')
			);
		
			$data['page_data'] = $this->model_admin_video->getAllIdpagedataByPageId($data);
		
			$this->model_admin_video->saveYouTubeVideoForAll($data);

		}
		else {
		
			$data = array (
				'id' => $this->input->post('id_page'),
				'video_url' => $this->input->post('video_url'),
				'lang' =>  $this->input->post('lang')
			);
		
			$data['page_data'] = $this->model_admin_video->getIdPageDataByPageId($data);
			
			$this->model_admin_video->saveYouTubeVideo($data);
			
		}
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
	
	function videoOrderActive() {
			
		$data = array(
			'id_page_data' =>  $this->input->post('id_page_data'),
			'orderId' =>  $this->input->post('orderId')
		);	
			
		$this->model_admin_video->saveVideoOrderActive($data);
	
	}
	
	function videoOrderNonActive() {
			
		$data = array(
			'id_page_data' =>  $this->input->post('id_page_data'),
			'orderId' =>  $this->input->post('orderId')
		);	
			
		$this->model_admin_video->saveVideoOrderNonActive($data);
	
	}
	
	function setActiveVideo() {
	
		$data = array(
			'id_page_data' =>  $this->input->post('id_page_data'),
			'video_id' =>  $this->input->post('video_id')
		);	
	
		$this->model_admin_video->saveActiveVideo($data);
	
	}
	
	function setNonActiveVideo() {
		
		$data = array(
			'id_page_data' =>  $this->input->post('id_page_data'),
			'video_id' =>  $this->input->post('video_id')
		);	
	
		$this->model_admin_video->saveNonActiveVideo($data);
	
	}
	
	function deleteVideo() {
		
		$data = array(
			'video_id' =>  $this->input->post('video_id')
		);	
		
		$this->model_admin_video->deleteVideo($data);
			
	}
	
	function previewVideo() {
		
		$data = array(
			'video_id' =>  $this->input->post('video_id')
		);	
		
		$data['preview_video'] = $this->model_admin_video->previewVideo($data);
		
		$this->load->view('admin_preview_video', $data);
		
	}
	
}