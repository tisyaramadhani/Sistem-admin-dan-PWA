<?php

class Course_category_model extends CI_Model{
    
    public function get_data($id = null)
    {
        if ($id === null){
            return $this->db->get('tb_coursecategory')->result_array();
        }else{
            return $this->db->get_where('tb_coursecategory', ['id_coursecategory' => $id])->result_array();
        }
        
    }
    public function delete($id){
        $this->db->delete('tb_coursecategory', ['id_coursecategory' => $id]);
        return $this->db->affected_rows();
        
    }
    public function create($data){
        $this->db->insert('tb_coursecategory', $data);
        return $this->db->affected_rows();
    }
    public function update($data, $id){
        $this->db->update('tb_coursecategory', $data, ['id_coursecategory' => $id]);
        return $this->db->affected_rows();
    }
}