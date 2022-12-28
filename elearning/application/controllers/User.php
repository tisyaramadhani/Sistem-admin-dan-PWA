<?php
use LDAP\Result;
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'User';
        $data['user'] = $this->user_model->get_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user',  $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {

        $data['title'] = 'User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_user', $data);
        $this->load->view('templates/footer');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('id_user', 'ID user', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('username', 'Nama User', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s harus diisi'
        ));
    }
    public function tambah_aksi()
    {
            $this->user_model->insert_data();
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('user');
        
    }
    public function edit()
    {

        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $this->user_model->update_data();
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('user');
    }
}

    public function delete($id)
    {
        $this->user_model->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('user');
        
    }
}
