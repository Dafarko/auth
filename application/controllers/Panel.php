<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    		$this->load->library('session');
    }
    public function index()
    {
        if($this->session->userdata('admin') != 'ok')
          redirect('http://auth/home', 'location', 301);
        else
          $this->load->view('panel_page');
    }
    public function logout(){
      $this->session->unset_userdata('admin');
      redirect('http://auth/home', 'location', 301);
    }
}
