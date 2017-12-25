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

            $this->db->insert('users', $this);
        }
}
?>
