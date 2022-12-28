<?php

class KeperawatanXII_model extends CI_Model{
    
    public function get_data($id = null)
    {
        if ($id === null){
            return $this->db->get('tb_keperawatanxii')->result_array();
        }else{
            return $this->db->get_where('tb_keperawatanxii', ['id_course' => $id])->result_array();
        }
        
    }
    public function delete($id){
        $this->db->delete('tb_keperawatanxii', ['id_course' => $id]);
        return $this->db->affected_rows();
        
    }
    public function create($data){
        $this->db->insert('tb_keperawatanxii', $data);
        return $this->db->affected_rows();
    }
    public function update($data, $id){
        $this->db->update('tb_keperawatanxii', $data, ['id_course' => $id]);
        return $this->db->affected_rows();
    }
}