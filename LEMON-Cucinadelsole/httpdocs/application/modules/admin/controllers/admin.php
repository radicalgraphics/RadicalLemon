<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	public function __construct () {
            
		parent::__construct();
		$this->load->library('session');
		$this->load->model('model_admin');
		
	}
	
	function index () {

	 	if  ($this->session->userdata('logged_in') == FALSE) {
		
			$data['module'] = "admin"; 
			$data['method'] = "login"; 
					
			echo Modules::run('templates/admin_template', $data); 
				
		}
		else {
		
			redirect('admin/dashboard' , 'refresh');

		}
 
	}
	
	function login () {
		
		$this->load->view('login_form');
	
	}
	
	function proceedLogin () {
		
		$data = array(
			'username' =>  strtolower($this->input->post('username')),
			'password' => $this->input->post('password')
		);
										
		$user = $this->model_admin->proceedLogin($data);

		if ($user) {
		
		 	$sess_array = array(
							 'username' => $user->username,
							 'first_name' => $user->first_name,
							 'last_name' => $user->last_name
			); 
			
			$this->session->set_userdata('logged_in', $sess_array);
		
			echo "true";
		}
			
	}
	
	function logout() {

		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('admin', 'refresh');

	}
	
	function dashboard () {
	
		if  ($this->session->userdata('logged_in') == FALSE ) {

			redirect('admin' , 'refresh');

		}
		else {
			
			$data['links'] = $this->model_admin->getPageLinks();
		
			$data['module'] = "admin"; 
			$data['method'] = "dashboardPage"; 
			
			echo Modules::run('templates/admin_template', $data); 
	
		}
	
	}
	
	function dashboardPage () {
	
		$data['links'] = $this->model_admin->getPageLinks();
		$this->load->view('dashboard', $data);
		
	}

	function edit () {
	
		if  ($this->session->userdata('logged_in') == FALSE) {
	
			redirect('admin' , 'refresh');
						
		}  
		else {
			
			$uri = $this->uri->segment(2);
			$uri2 = $this->uri->segment(3);
			$uri3 = $this->uri->segment(4);
		
			$template = $this->model_admin->getPageTemplate($uri);
			$page = $this->model_admin->findPage($uri);
				
			if ( $uri != FALSE) {
				
					if ($page != FALSE && $uri2 == FALSE) {
					
						$data['module'] = $template->template; 
						$data['method'] = "index"; 
						
						echo Modules::run('templates/admin_template', $data);
							
					}
					elseif($page != FALSE && $uri2 == "add" && $uri3 == !TRUE ) {
						
						$data['module'] = $template->template; 
						$data['method'] = $uri2; 
						
						echo Modules::run('templates/admin_template', $data);
						
					}
					else {
					
						show_404();

					}
				
			}
			else {
			
					$this->dashboard();
					
			}
			
		}
			
	}
	
	function pages () {
	
		if  ($this->session->userdata('logged_in') == FALSE ) {

			redirect('admin' , 'refresh');

		}
		else {
		
			$uri = $this->uri->segment(1);
			$uri2 = $this->uri->segment(2);
			$uri3 = $this->uri->segment(3);

			if ( $uri2 == FALSE && $uri3 == FALSE ) {
										
				$data['module'] = "admin"; 
				$data['method'] = "showPages"; 
				
				echo Modules::run('templates/admin_template', $data); 
										
			}
			elseif ($uri2 == "add" && $uri3 == FALSE ) {
											
				$data['module'] = "admin"; 
				$data['method'] = "add"; 

				echo Modules::run('templates/admin_template', $data); 
										
			}
			else {

				show_404();

			}
			
		}
	
	}
	
	function showPages () {
	
		$data['active_pages'] = $this->model_admin->getActivePages();
		$data['non_active_pages'] = $this->model_admin->getNonActivePages();
		$this->load->view('manage_pages', $data);
	
	}
	
	function add () {
	
		$this->load->view('manage_pages_new');
	
	}
	
	function addNewPage () {
	
		$data = array(
			'page_url' =>  strtolower($this->input->post('page_url')),
			'page_template' => $this->input->post('page_template'),
			'first_link_name' => $this->input->post('first_link_name'),
			'second_link_name' => $this->input->post('second_link_name'),
			'first_page_title' => $this->input->post('first_page_title'),
			'second_page_title' => $this->input->post('second_page_title'),
			'first_meta_key' => $this->input->post('first_meta_key'),
			'second_meta_key' => $this->input->post('second_meta_key'),
			'first_meta_desc' => $this->input->post('first_meta_desc'),
			'second_meta_desc' => $this->input->post('second_meta_desc')
		);
										
		$this->model_admin->addNewPage($data);
	
	}
	
	function ActivePage () {
	
		$pageId = $this->input->post('page_id');
		$this->model_admin->setActivePage($pageId);
		
	}
	
	function NonActivePage () {
	
		$pageId = $this->input->post('page_id');
		$this->model_admin->setNonActivePage($pageId);

	}
		
	function pageOrderActive () {
	
		$orderId = $this->input->post('orderId');
		$this->model_admin->pageActiveOrder($orderId);
	
	}
	
	function pageOrderNonActive () {
	
		$orderId = $this->input->post('orderId');
		$this->model_admin->pageNonActiveOrder($orderId);
	
	}
		
	function deletePage() {
			
		$data = array(
			'page_id' =>  $this->input->post('page_id'),
			'template' => $this->input->post('template')
		);
		
		$this->model_admin->deletePage($data);

	}		
		
	function editPage() {
	
		$data = array(
			'page_id' => $this->input->post('page_id')
		);
		
		$data['page_data'] = $this->model_admin->getPageEditData($data);
		$this->load->view('manage_pages_edit', $data);
		
	}
	
	function saveCurrentPageData() {
		
		$data = array(
			'id_page' =>  $this->input->post('id_page'),
			'first_link_name' =>  $this->input->post('first_link_name'),
			'first_meta_desc' => $this->input->post('first_meta_desc'),
			'first_meta_key' => $this->input->post('first_meta_key'),
			'first_page_title' => $this->input->post('first_page_title'),
			'second_link_name' => $this->input->post('second_link_name'),
			'second_meta_desc' => $this->input->post('second_meta_desc'),
			'second_meta_key' => $this->input->post('second_meta_key'),
			'second_page_title' => $this->input->post('second_page_title')
		);
		
		$this->model_admin->saveCurrentPageData($data);
	
	}
	
	function dynamicPageNavigation () {
	
		echo Modules::run('navigation/admin_navigation/getAdminNavigation'); 
	
	}
	
	function account () {
	
		if  ($this->session->userdata('logged_in') == FALSE ) {

			redirect('admin' , 'refresh');

		}
		else {
		
			$uri = $this->uri->segment(1);
			$uri2 = $this->uri->segment(2);
			$uri3 = $this->uri->segment(3);

			if ( $uri2 == FALSE && $uri3 == FALSE ) {
										
				$data['module'] = "admin"; 
				$data['method'] = "showAccount"; 
				
				echo Modules::run('templates/admin_template', $data); 
										
			}
			elseif ($uri2 == "manage" && $uri3 == FALSE ) {
											
				$data['module'] = "admin"; 
				$data['method'] = "manage"; 

				echo Modules::run('templates/admin_template', $data); 
										
			}
			else {

				show_404();

			}
			
		}
	
	}
	
	function showAccount () {
		$data['account'] = $this->model_admin->getAccount();
		$this->load->view('show_account', $data);
	
	}
	
	function manage () {
			$data['account'] = $this->model_admin->getAccount();
			$this->load->view('manage_account', $data);
	
	}
	
	function updateAccount () {
	
		$data = array(
			'firstname' =>  $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'company' => $this->input->post('company'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'country' => $this->input->post('country'),
			'telephone' => $this->input->post('telephone')
		);
										
		$this->model_admin->updateAccount($data);
		
	}
	
	function moduleFunctions () {
	
		$module = $this->input->post('template');
		$method = $this->input->post('method');
		
		echo Modules::run($module."/admin_".$module."/".$method); 
	
	}
    
    
    
 
    
    

}