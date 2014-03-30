<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_bgslider extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
		$this->load->model('model_admin_bgslider');

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
		
		$id_page = $this->model_admin_bgslider->getPageIdByUri($uri2);
		
		$data = array (
						'id' => $id_page->id_page,
						'lang' => $lang		
		); 
		
		$id_page_data = $this->model_admin_bgslider->getIdPageDataByPageId($data);

		$data = array (
						'id' => $id_page_data->id_page_data,
						'pid' => $id_page_data->id_page,
						'lang' => $lang	
		); 
		
		$data['active_bgslide'] = $this->model_admin_bgslider->getActiveBgslide($data);
		$data['non_active_bgslide'] = $this->model_admin_bgslider->getNonActiveBgslide($data);
		$data['page_information_name'] = $this->model_admin_bgslider->getPageInformationName($data);
		$data['page_information_template'] = $this->model_admin_bgslider->getPageInformationTemplate($data);		
		$this->load->view('admin_bgslider', $data);

	}
	
	function slideOrderActive() {
			
		$data = array(
			'id_page_data' =>  $this->input->post('id_page_data'),
			'orderId' =>  $this->input->post('orderId')
		);	

		$this->model_admin_bgslider->saveSlideOrderActive($data);
	
	}
	
	function slideOrderNonActive() {
			
		$data = array(
			'id_page_data' =>  $this->input->post('id_page_data'),
			'orderId' =>  $this->input->post('orderId')
		);	
			
		$this->model_admin_bgslider->saveSlideOrderNonActive($data);
	
	}
	
	function setActiveSlide() {
	
		$data = array(
			'id_page_data' =>  $this->input->post('id_page_data'),
			'video_id' =>  $this->input->post('video_id')
		);	
	
		$this->model_admin_bgslider->saveActiveSlide($data);
	
	}
	
	function setNonActiveSlide() {
		
		$data = array(
			'id_page_data' =>  $this->input->post('id_page_data'),
			'video_id' =>  $this->input->post('video_id')
		);	
	
		$this->model_admin_bgslider->saveNonActiveSlide($data);
	
	}
	
	function addTitle() {

		$data = array(
			'slide_id' =>  $this->input->post('slide_id')
		);	
		
		$data['title'] = $this->model_admin_bgslider->getSlideTitle($data);
		
		$this->load->view('admin_title_bgslide', $data);
		
	}
	
	function saveTitle() {

		$data = array(
			'slide_id' =>  $this->input->post('slide_id'),
			'title' =>  $this->input->post('title'),
		);	
		
		$this->model_admin_bgslider->saveTitle($data);

	}

	function previewSlide() {
		
		$data = array(
			'video_id' =>  $this->input->post('video_id')
		);	
		
		$data['preview_slide'] = $this->model_admin_bgslider->previewSlide($data);
		
		$this->load->view('admin_preview_bgslide', $data);
		
	}	
		
	function add() {
	
		$this->load->view('admin_add_bgslide');

	}
	
	function addSlide() {
		
		$data = array(
			'lang' =>  $this->input->post('lang')
		);	
		
		if ($data['lang'] == "all") {

			$data = array (
				'id' => $this->input->post('id_page'),
				'img' => $this->input->post('img')
			);
		
			$data['page_data'] = $this->model_admin_bgslider->getAllIdpagedataByPageId($data);
		
			$this->model_admin_bgslider->addSlideForAll($data);

		}
		else {
		
			$data = array (
				'id' => $this->input->post('id_page'),
				'img' => $this->input->post('img'),
				'lang' =>  $this->input->post('lang')
			);
		
			$data['page_data'] = $this->model_admin_bgslider->getIdPageDataByPageId($data);
			
			$this->model_admin_bgslider->addSlide($data);
			
		}
		
	}

	function deleteSlide() {
		
		$data = array(
			'video_id' =>  $this->input->post('video_id')
		);	
		
		$this->model_admin_bgslider->deleteSlide($data);
			
	}	
	
	function writeSlide() {

		$data = array(
			'slide_id' =>  $this->input->post('slide_id')
		);	
		
		$data['write_slide'] = $this->model_admin_bgslider->writeSlide($data);
		
		$this->load->view('admin_write_bgslide', $data);
		
	}
	
	function saveText() {
	
		$data = array (
			'content' => $this->input->post('content'),
			'slide_id' =>  $this->input->post('slide_id')			
		); 

		$this->model_admin_bgslider->saveText($data);
		
	}
		
	function uploadPdf() {
		
		$data = array(
			'slide_id' =>  $this->input->post('slide_id')
		);	
		
		$data = $this->model_admin_bgslider->isPdfSet($data);
				
		$this->load->view('admin_upload_bgslide', $data);
	
	}

	function upload() {

        $status = "";
        $msg = "";
        $file_element_name = 'userfile';

        if ($status != "error") {

            $config['upload_path'] = './media/pdf';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = ' ';
            $config['overwrite'] = TRUE;
            $config['encrypt_name'] = FALSE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {

                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } 
            else {
                $pdf_data = $this->upload->data();
                $data = array(
                    'slide_id' => $this->input->post('slide_id'),
                    'filename' => $pdf_data['file_name']
                );

                $upload_status = $this->model_admin_bgslider->upload($data);

            }
            @unlink($_FILES[$file_element_name]);
        }

    }

    function addDate () {
        
        $data = array(
			'slide_id' =>  $this->input->post('slide_id')
		);	
        
        $data = $this->model_admin_bgslider->getSlideDate($data);
		
        $this->load->view('admin_date_bgslide', $data);
        
    }
    
    function saveDate () {
        
        $data = array (
			'slide_date' => $this->input->post('slide_date'),
			'slide_id' =>  $this->input->post('slide_id')			
		); 

		$this->model_admin_bgslider->saveDate($data);
        
    }
    
    function deletePdf (){
        
        $data = array (
			'slide_id' =>  $this->input->post('slide_id')			
		); 
        
        $pdfName = $this->model_admin_bgslider->getPdfName($data);
        
        $deleteFilePath = 'media/pdf/'.$pdfName->pdf;
        $result = unlink($deleteFilePath);
       
        
		$this->model_admin_bgslider->deletePdf($data);
        
    }
    
	
}