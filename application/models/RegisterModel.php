<?php
class RegisterModel extends CI_Model {
        public $first_name;
        public $last_name;
        public $email;
        public $password;
        public function reg_user()
        {
            $this->first_name = $this->input->post('fname');
            $this->last_name = $this->input->post('lname');
            $this->email = $this->input->post('email');
            $this->password = $this->input->post('password1');
            $password1 = $this->input->post('password2');
            if($this->password != $password1){
              $this->session->set_userdata('message','Your confirm password was wrong!!!');
              redirect('register');
            }
            if($query = $this->db->insert('users', $this))
              $this->session->set_userdata('ok','You have been registered on our website!!!');
              redirect('home');
        }
}
?>
