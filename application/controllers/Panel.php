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
          redirect('home', 'location', 301);
        else
          $this->load->model('PanelModel');
          $data['result'] = $this->PanelModel->get_users_admin();
          $this->load->view('panel_page', $data);
    }
    public function logout(){
      $this->session->unset_userdata('admin');
      redirect('home', 'location', 301);
    }
    public function edit(){
      $id = $this->uri->segment(3);
      $this->load->model('PanelModel');
      $data['result'] = $this->PanelModel->get_one_user($id);
      $this->load->view('edit_page', $data);
      //$this->session->set_userdata('ok','You have deleted user with successeful!!!');
      //redirect('http://auth/panel', 'location', 301);
    }
    public function delete(){
      $id = $this->uri->segment(3);
      $this->load->model('PanelModel');
      $this->PanelModel->delete_user($id);
      $this->session->set_userdata('ok','You have deleted user with successeful!!!');
      redirect('panel', 'location', 301);
    }
}
