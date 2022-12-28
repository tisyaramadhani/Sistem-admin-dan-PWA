<?php

class jabatan_model extends CI_Model{
    
    public function get_data($id = null)
    {
        if ($id === null){
            return $this->db->get('jabatan')->result_array();
        }else{
            return $this->db->get_where('jabatan', ['id_jabatan' => $id])->result_array();
        }
        
    }
    public function delete($id){
        $this->db->delete('jabatan', ['id_jabatan' => $id]);
        return $this->db->affected_rows();
        
    }
    public function create($data){
        $this->db->insert('jabatan', $data);
        return $this->db->affected_rows();
    }
    public function update($data, $id){
        $this->db->update('jabatan', $data, ['id_jabatan' => $id]);
        return $this->db->affected_rows();
    }
}