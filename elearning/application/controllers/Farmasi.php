<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Farmasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Farmasi_model');
    }

    public function index()
    {
        $data['title'] = 'Farmasi';
        $data['farmasi'] = $this->Farmasi_model->get_data('tb_farmasi')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('farmasi',  $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {

        $data['title'] = 'User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('farmasi', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {

        $data = array(
            'nama_course' => $this->input->post('nama_course'),
        );

        $this->Farmasi_model->insert_data($data, 'tb_farmasi',);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('farmasi');
    }
    public function edit($id_course)
    {


        $data = array(
            'id_course' => $id_course,
            'nama_course' => $this->input->post('nama_course'),
        );
        $this->Farmasi_model->update_data($data, 'tb_farmasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('farmasi');
    }
    public function delete($id)
    {
        $where = array('id_course' => $id);

        $this->Farmasi_model->delete($where, 'tb_farmasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('farmasi');
    }
}
