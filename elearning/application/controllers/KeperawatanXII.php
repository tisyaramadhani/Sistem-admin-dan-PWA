<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KeperawatanXII extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KeperawatanXII_model');
    }

    public function index()
    {
        $data['title'] = 'Keperawatan XII';
        $data['keperawatanxii'] = $this->KeperawatanXII_model->get_data();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('keperawatanxii',  $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {

        $data['title'] = 'Keperawatan XII';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('keperawatanxii', $data);
        $this->load->view('templates/footer');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama_course', 'Nama_course', 'required', array(
            'required' => '%s harus diisi'
        ));
    }
    public function tambah_aksi()
    {

        $this->KeperawatanXII_model->insert_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('keperawatanxii');
    }
    public function edit($id)
    {


        $this->KeperawatanXII_model->get_dataid($id);
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $this->KeperawatanXII_model->update_data();
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('keperawatanxii');
    }
    }
    public function delete($id)
    {

        $this->KeperawatanXII_model->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('keperawatanxii');
    }
}
