<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
      parent::__construct();
      $this->load->helper('form');
      $this->load->helper('url');
			$this->load->library('session');
  }


	public function index(){
		$this->load->view('home_page');
	}

	public function verif(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->load->model('PanelModel');
		if($this->PanelModel->check_login($email, $password)){
			 $this->session->set_userdata('admin', 'ok');
			redirect('panel', 'location', 301);
		}
		else{
			$this->session->set_userdata('message','Your Email or Password is wrong!!!');
			redirect('panel');
		}
	}
}
