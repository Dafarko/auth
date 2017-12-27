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
    /**
     * Выход из панели администратора
     * Удаление запущенных сессий при входе
     * Перенаправление на страницу авторизации
     */
    public function logout(){
      $this->session->unset_userdata('admin');
      $this->session->unset_userdata('group');
      redirect('home', 'location', 301);
    }
    /**
     * Страница с заполнеными полями из базы данных
     * в соответствии с полученным id
     */
    public function edit(){
      if($this->session->userdata('group') != 'admin') redirect('404');
      // Получаем id
      $id = $this->uri->segment(3);
      $this->load->model('PanelModel');
      $data["result"] = $this->PanelModel->get_one_user($id);
      $this->load->view('edit_page', $data);
    }
    public function edit_action(){
      if($this->session->userdata('group') != 'admin') redirect('404');
      // Получаем id
      $id = $this->input->post('id');
      $this->load->model('PanelModel');
      $query["result"] = $this->PanelModel->get_one_user($id);
      if(!($query["result"])) redirect('404');
      $data = [
        'first_name' => $this->input->post('fname'),
        'last_name' => $this->input->post('lname'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password1')
      ];
      $password1 = $this->input->post('password2');
      if($data['password'] != $password1){
        $this->session->set_userdata('message','Your confirm password was wrong!!!');
        redirect('panel/edit', $data);
      }
      if(empty($password1) && empty($data['password'])){
        $data['password'] = $query["result"][0]->password;
      }

      $this->load->model('PanelModel');
      if(!($this->PanelModel->edit_user($id, $data))){
        $this->session->set_userdata('ok','You have edited user with successeful!!!');
        redirect('panel', 'location', 301);
      }
      else{
        $this->session->set_userdata('message','Something was wrong, please check your data!!!');
        redirect('panel/edit', $data);
      }
    }
    /**
     * Удаление записи
     * Параметр id записи
     */
    public function delete(){
      if($this->session->userdata('group') != 'admin') redirect('404');

      $id = $this->uri->segment(3);
      $this->load->model('PanelModel');
      $this->PanelModel->delete_user($id);
      $this->session->set_userdata('ok','You have deleted user with successeful!!!');
      redirect('panel', 'location', 301);
    }
}
