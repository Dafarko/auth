<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	//Конструктор. Подключение используемых библиотек и хелперов из загрузчика
	function __construct(){
      parent::__construct();
      $this->load->helper('form');
      $this->load->helper('url');
			$this->load->library('session');
  }


	public function index(){
		$this->load->view('home_page');
	}

	/**
	 * Проверка правильности введенного пароля и логина
	 * Params method post
	 */
	public function check(){
		//Получение параметров email и password
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		//Вызов модели для проверки параметров на ошибки
		$this->load->model('PanelModel');
		if($this->PanelModel->check_login($email, $password)){
			 $this->session->set_userdata('admin', 'ok');
			redirect('panel', 'location', 301);
		}
		else{
			//Если параметры были заданы неверно перенаправим пользователя на страницу авторизации
			$this->session->set_userdata('message','Your Email or Password is wrong!!!');
			redirect('home');
		}
	}
}
