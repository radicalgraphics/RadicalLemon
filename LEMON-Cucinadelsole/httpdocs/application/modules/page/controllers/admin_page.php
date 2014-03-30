<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_page extends MX_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('model_admin_page');
    }

    public function index() {

        global $URI, $IN;
        $uri2 = $this->uri->segment(2);

        if ($IN->cookie('user_lang') == FALSE) {

            $lang = $URI->config->config['language_abbr'];
        } else {

            $lang = $IN->cookie('user_lang');
        }

        $id_page = $this->model_admin_page->getPageIdByUri($uri2);

        $data = array(
            'id' => $id_page->id_page,
            'lang' => $lang
        );

        $id_page_data = $this->model_admin_page->getIdPageDataByPageId($data);

        $data = array(
            'id' => $id_page_data->id_page_data,
            'pid' => $id_page_data->id_page,
            'lang' => $lang
        );

        $data['active_bgslide'] = $this->model_admin_page->getActiveBgslide($data);
        $data['non_active_bgslide'] = $this->model_admin_page->getNonActiveBgslide($data);
        $data['page_information_name'] = $this->model_admin_page->getPageInformationName($data);
        $data['page_information_template'] = $this->model_admin_page->getPageInformationTemplate($data);
        $this->load->view('admin_page', $data);
    }

    function slideOrderActive() {

        $data = array(
            'id_page_data' => $this->input->post('id_page_data'),
            'orderId' => $this->input->post('orderId')
        );

        $this->model_admin_page->saveSlideOrderActive($data);
    }

    function slideOrderNonActive() {

        $data = array(
            'id_page_data' => $this->input->post('id_page_data'),
            'orderId' => $this->input->post('orderId')
        );

        $this->model_admin_page->saveSlideOrderNonActive($data);
    }

    function setActiveSlide() {

        $data = array(
            'id_page_data' => $this->input->post('id_page_data'),
            'video_id' => $this->input->post('video_id')
        );

        $this->model_admin_page->saveActiveSlide($data);
    }

    function setNonActiveSlide() {

        $data = array(
            'id_page_data' => $this->input->post('id_page_data'),
            'video_id' => $this->input->post('video_id')
        );

        $this->model_admin_page->saveNonActiveSlide($data);
    }

    function addTitle() {

        $data = array(
            'slide_id' => $this->input->post('slide_id')
        );

        $data['title'] = $this->model_admin_page->getSlideTitle($data);

        $this->load->view('admin_title_page', $data);
    }

    function saveTitle() {

        $data = array(
            'slide_id' => $this->input->post('slide_id'),
            'title' => $this->input->post('title'),
        );

        $this->model_admin_page->saveTitle($data);
    }

    function previewSlide() {

        $data = array(
            'video_id' => $this->input->post('video_id')
        );

        $data['preview_slide'] = $this->model_admin_page->previewSlide($data);

        $this->load->view('admin_preview_page', $data);
    }

    function add() {

        $this->load->view('admin_add_page');
    }

 
    function deleteSlide() {

        $data = array(
            'video_id' => $this->input->post('video_id')
        );

        $this->model_admin_page->deleteSlide($data);
    }

    function writeSlide() {

        $data = array(
            'slide_id' => $this->input->post('slide_id')
        );

        $data['write_slide'] = $this->model_admin_page->writeSlide($data);

        $this->load->view('admin_write_page', $data);
    }

    function saveText() {

        $data = array(
            'content' => $this->input->post('content'),
            'slide_id' => $this->input->post('slide_id')
        );

        $this->model_admin_page->saveText($data);
    }

    function uploadPdf() {

        $data = array(
            'slide_id' => $this->input->post('slide_id')
        );

        $data = $this->model_admin_page->isPdfSet($data);

        $this->load->view('admin_upload_page', $data);
    }

    function upload() {

        $status = "";
        $msg = "";
        $file_element_name = 'userfile';

        if ($status != "error") {

            $config['upload_path'] = './media/pdf';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = ' ';
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

                $upload_status = $this->model_admin_page->upload($data);

            }
            @unlink($_FILES[$file_element_name]);
        }
    }

    function addSlideImg() {

        $config['upload_path'] = './media/page/original_images/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '';
        $config['max_width'] = '';
        $config['max_height'] = '';
        $config['encrypt_name'] = 'TRUE';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = $this->upload->data();

            $imgname = $data['file_name'];
            echo json_encode(array('img' => $imgname));
        }
    }

    function cropImg() {
        
        $this->load->library('image_lib');
        
        $x = $this->input->post('x');
        $y = $this->input->post('y');
        $w = $this->input->post('w');
        $h = $this->input->post('h');
        $img = $this->input->post('img');
        
       
        
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'media/page/original_images/'.$img;

        $config['maintain_ratio'] = FALSE;

        $config['new_image'] = 'media/page/'.$img;
        $config['width'] = $w;
        $config['height'] = $h;
        $config['x_axis'] = $x;
        $config['y_axis'] = $y;
        $config['quality'] = '60%';
        $this->image_lib->initialize($config);
        $this->image_lib->crop();
        
      
        
    }
    
    function saveSlide () {
                
        $data = array(
            'lang' => $this->input->post('lang')
        );

        if ($data['lang'] == "all") {

            $data = array(
                'id' => $this->input->post('id_page'),
                'img' => $this->input->post('img_name')
            );

            $data['page_data'] = $this->model_admin_page->getAllIdpagedataByPageId($data);

            $this->model_admin_page->addSlideForAll($data);
        } else {

            $data = array(
                'id' => $this->input->post('id_page'),
                'img' => $this->input->post('img_name'),
                'lang' => $this->input->post('lang')
            );

            $data['page_data'] = $this->model_admin_page->getIdPageDataByPageId($data);

            $this->model_admin_page->addSlide($data);
        }
       
    }
    
    
    
    
    
    
    
    function editBgText() {
                
        $id_page_data = $this->input->post('bgid');

        $data = array(
            'id_page_data' => $this->input->post('bgid'),
            'write_slide' => $this->model_admin_page->getEditBgText($id_page_data)
        );
        
        $this->load->view('admin_write_bg', $data);
 
    }
    
    
    
    
    function saveBgText () {
        
         $data = array(
                'id_page_data' => $this->input->post('id_page_data'),
                'content' => $this->input->post('content')
            );
         
         $id_exsists = $this->model_admin_page->ifIdPageDataExist($data);
         
         
         if ($id_exsists == FALSE) {
         
             $this->model_admin_page->saveEditBgText($data);
         
         }
         
         else  {
             
             $this->model_admin_page->updateEditBgText($data);
             
         }
         
         
         
    }
    
     function deletePdf (){
        
        $data = array (
			'slide_id' =>  $this->input->post('slide_id')			
		); 

		$this->model_admin_page->deletePdf($data);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}