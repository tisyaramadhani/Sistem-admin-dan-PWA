<?php

class User_model extends CI_Model{
    
    public function get_data($id = null)
    {
        if ($id === null){
            return $this->db->get('tb_user')->result_array();
        }else{
            return $this->db->get_where('tb_user', ['id_user' => $id])->result_array();
        }
        
    }
    public function deleteuser($id){
        $this->db->delete('tb_user', ['id_user' => $id]);
        return $this->db->affected_rows();
        
    }
    public function createuser($data){
        $this->db->insert('tb_user', $data);
        return $this->db->affected_rows();
    }
    public function updateuser($data, $id){
        $this->db->update('tb_user', $data, ['id_user' => $id]);
        return $this->db->affected_rows();
    }
}