<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('register_page');
    }
    public function reg(){
      $this->load->model('RegisterModel');
      $this->RegisterModel->reg_user();
    }
}
