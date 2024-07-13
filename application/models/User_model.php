<?php
class User_model extends CI_Model {


    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        
    }
    
   function insertuser($data) {
    $this->db->insert('users', $data);
   }

   function select_all_users() 
{
    $query = $this->db->get('users');
    return $query->result();
}

public function updateUsers($data, $userid) {
  
    $this->db->where('userid', $userid);
    $this->db->update('users', $data);


    if ($this->db->affected_rows() > 0) {
        return true; 
    } else {
        return false; 
    }
}


function select_user_by_id($user_id) 
{
    $this->db->where('userid', $user_id);
    $query = $this->db->get('users');
    return $query->row(); 
}



   function checkPassword($email, $password)
{
    $query = $this->db->query("SELECT * FROM users WHERE email = '$email' AND pword = '$password' AND status ='1'");
    if ($query->num_rows() == 1) {
        return $query->row(); 
    } else {
        return false;
    }
}

public function save_file($file_data) {
  
    $this->db->insert('files', $file_data);
}
public function get_users() {
    return $this->db->get('users')->result();
}

public function get_user($userid) {
    return $this->db->get_where('users', array('userid' => $userid))->row();
}

public function add_user($data) {
    return $this->db->insert('users', $data);
}

public function update_user($userid, $data) {
    $this->db->where('userid', $userid);
    return $this->db->update('users', $data);
}

public function delete_user($userid) {
    $this->db->where('userid', $userid);
    return $this->db->delete('users');
}
}

?>
