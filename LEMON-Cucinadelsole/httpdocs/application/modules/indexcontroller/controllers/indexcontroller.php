<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indexcontroller extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
        $this->load->model('model_indexcontroller');
		
    }
	
	public function index() {

		global $URI, $IN;
		$uri = uri_string();
		
		if ($IN->cookie('user_lang') == FALSE) {
			$lang = $URI->config->config['language_abbr'];
		}
		else {
			$lang = $IN->cookie('user_lang');
		}
	
		$data = array (
						'uri' => $uri,
						'lang' => $lang
		); 
		
		if ( empty($uri) ) {		
			$home_page = $this->model_indexcontroller->findHomePage($data);
			
			if ($home_page != FALSE) {
		
				$data['id_page'] = $home_page->id_page;	
				$data['main_class'] = "home";
				$data['lang'] = $lang;
				$data['module'] = $home_page->template;
				$data['view_file'] = $home_page->template;
				$data['head'] = array(
								'title' => $home_page->page_title,
								'meta_keywords' =>  $home_page->meta_keywords,
								'meta_description' =>  $home_page->meta_description
				);		
			}
			else {
				
				$data['id_page'] = "Lemon Shuttle";	
				$data['main_class'] = "home";
				$data['lang'] = $lang;
				$data['module'] = "Lemon Shuttle";	
				$data['view_file'] = "Lemon Shuttle";	
				$data['head'] = array(
								'title' => "Lemon Shuttle",
								'meta_keywords' => "Lemon Shuttle",
								'meta_description' => "Lemon Shuttle"
				);
			}
			echo Modules::run('templates/one_column', $data);
		}
		else {
		
			$page = $this->model_indexcontroller->findPage($data);
								
			if ( $page != FALSE ) {
							
				$data['id_page'] = $page->id_page;			
				$data['main_class'] = $page->url;
				$data['lang'] =  $lang;
				$data['module'] = $page->template;
				$data['head'] = array(
							'title' => $page->page_title,
							'meta_keywords' => $page->meta_keywords,
							'meta_description' => $page->meta_description
				);	
				echo Modules::run('templates/one_column', $data);					
			}						
			else {
				show_404();					
			}
		}
	}
    
}

/* End of file indexcontroller.php */
/* Location: ./application/modules/indexcontroller/controllers/indexcontroller.php */