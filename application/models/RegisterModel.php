<?php
class RegisterModel extends CI_Model {
        //public function select_with_clause($where)
        public function reg_user($data)
        {
            //Если запрос был выполнен возращем сообщение о успешном удалении
            if($query = $this->db->insert('users', $data))
              $this->session->set_userdata('ok','You have been registered on our website!!!');
              redirect('home');
        }
}
?>
