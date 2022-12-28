<?php

class KeperawatanX_model extends CI_Model{
    
    public function get_data($id = null)
    {
        if ($id === null){
            return $this->db->get('tb_keperawatanx')->result_array();
        }else{
            return $this->db->get_where('tb_keperawatanx', ['id_course' => $id])->result_array();
        }
        
    }
    public function delete($id){
        $this->db->delete('tb_keperawatanx', ['id_course' => $id]);
        return $this->db->affected_rows();
        
    }
    public function create($data){
        $this->db->insert('tb_keperawatanx', $data);
        return $this->db->affected_rows();
    }
    public function update($data, $id){
        $this->db->update('tb_keperawatanx', $data, ['id_course' => $id]);
        return $this->db->affected_rows();
    }
}