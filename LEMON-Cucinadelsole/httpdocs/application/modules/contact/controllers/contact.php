<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MX_Controller {

	public function __construct() {
            
		parent::__construct();
        $this->load->model('model_contact');
		
    }
	
	public function index() {
		$data['contact_details'] = $this->model_contact->getContactData();
		$this->load->view('contact', $data);	
	}
     
    public function sendmail() {

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $coment = $this->input->post('coment');
        $ajax = $this->input->post('ajax');
        
        if (isset($ajax) && $ajax == 1) {

            $this->load->library('email');
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from($email, $name);
            $this->email->subject('Cucina Del Sole contact form - message from ' . $name);
            $this->email->message($coment . "<br><div style='margin-top: 20px; '><strong>Contact information:</strong></div><br>Name: ". $name . "<br> Mobiel nummer: " . $phone . "<br>E-mail: " . $email);
            $this->email->to('info@cucinadelsole.nl');
            $this->email->send();
            echo $data='true';
        }
    }
}