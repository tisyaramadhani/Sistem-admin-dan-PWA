<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course_category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Course_category_model');
    }

    public function index()
    {
        $data['title'] = 'Course Category';
        $data['course_Category'] = $this->Course_category_model->get_data();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('course_Category',  $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {

        $data['title'] = 'User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('course_Category', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {

        $this->Course_category_model->insert_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('course_Category');
    }
    public function edit()
    {

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $this->Course_categor_model->update_data();
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('course_Category');
    }
    }
    public function delete($id)
    {

        $this->Course_category_model->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('course_Category');
    }
}
