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
      // Принимаем значения из полей и записываем их в массив
      $data = [
        'first_name' => $this->input->post('fname'),
        'last_name' => $this->input->post('lname'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password1')
      ];
      $password1 = $this->input->post('password2');
      if($data['password'] != $password1){
        $this->session->set_userdata('message','Your confirm password was wrong!!!');
        redirect('register');
      }
      $this->load->model('RegisterModel');
      $this->RegisterModel->reg_user($data);
    }
}
