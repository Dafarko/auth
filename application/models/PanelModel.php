<?php
class PanelModel extends CI_Model {
        public function check_login($email, $password){
          $query = $this->db->query("SELECT *
                                     FROM users
                                     WHERE email = '$email' AND password = '$password'");
          if($query->result()){
            // Если пользователь принадлежит к группе Администрация
            // Создаем для него сессию
            if($query->result()[0]->group == 'A')
              $this->session->set_userdata('group', 'admin');
            return true;
          }
          else return false;
        }
        public function get_users_admin(){
            $query = $this->db->query('SELECT id, first_name, last_name, email, `group`
                                       FROM users');
            return $query->result();
        }
        public function get_one_user($id){
            $query = $this->db->query('SELECT id, first_name, last_name, email, password, `group`
                                       FROM users
                                       WHERE id = '.$id.'');
            return $query->result();
        }
        public function edit_user($id, $data){
          $this->db->where('id', $id);
          $this->db->update('users', $data);
        }
        /**
         * Удаление записи
         * Параметр для удаления id записи
         */
        public function delete_user($id){
            $this->db->delete('users', ['id' => $id]);
        }
}
?>
