<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
  {
      parent::__construct();
      $this->load->helper('form');
      $this->load->helper('url');
			$this->load->library('session');
  }


	public function index()
	{
		$this->load->view('home_page');
	}

	public function verif()
	{
		$this->session->set_userdata('admin','');
		if(($this->input->post('email') != 'test@gmail.com') || ($this->input->post('password') != '111'))
		{
			$this->session->set_userdata('message','Error. Email or Password was introduced wrong');
			redirect('panel');
		}
		else
			$this->session->set_userdata('admin', 'ok');
			redirect('panel', 'location', 301);
	}
}
