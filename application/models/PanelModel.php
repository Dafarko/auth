<?php
class PanelModel extends CI_Model {
        public function get_users_admin()
        {
            $query = $this->db->query('SELECT id, first_name, last_name, email, `group` FROM users');
            return $query->result();
        }
        public function get_one_user($id)
        {
            $query = $this->db->query('SELECT id, first_name, last_name, email, `group` FROM users WHERE id = '.$id.'');
            return $query->result();
        }
        public function delete_user($id){
            $this->db->delete('users', ['id' => $id]);
        }
}
?>
