<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Mahasiswa extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }
    //Menampilkan data mahasiswa
    function index_get()
    {
        $id = $this->get('id_siswa');
        if ($id == '') {
            $kontak = $this->db->get('tb_user')->result();
        } else {
            $this->db->where('id_siswa', $id);
            $kontak = $this->db->get('tb_user')->result();
        }
        $this->response($kontak, 200);
    }
    function index_post()
    {
        $data = array(
            'id_siswa' => $this->put('id_siswa'),
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'id_jabatan' => $this->put('id_jabatan')
        );
        $insert = $this->db->insert('tb_user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Memperbarui data kontak yang telah ada
    function index_put()
    {
        $id = $this->put('id');
        $data = array(
            'id_siswa' => $this->put('id_siswa'),
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'id_jabatan' => $this->put('id_jabatan')
        );
        $this->db->where('id_siswa', $id);
        $update = $this->db->update('tb_user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Menghapus salah satu data kontak
    function index_delete()
    {
        $id = $this->delete('id_siswa');
        $this->db->where('id_siswa', $id);
        $delete = $this->db->delete('tb_user');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
