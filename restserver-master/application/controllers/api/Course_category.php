<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Course_category extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Course_category_model', 'category');
    }
    //Menampilkan data mahasiswa
    public function index_get()
    {
        $id = $this->get('id_coursecategory');
        if($id === null){
            $category = $this->category->get_data();
        }else {
            $category = $this->category->get_data($id);
        }
        if($category){
                // Set the response and exit
                $this->response([   
                    'status' => true,
                    'data' =>  $category
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }else{
            $this->response([
                'status' => false,
                'messagge' =>  'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_delete(){
        $id = $this->delete('id_coursecategory');

        if($id === null ){
                $this->response([
                'status' => false,
                'messagge' =>  'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this-> category ->delete($id) > 0){
                $this->response([
                    'status' => true,
                    'data' =>  $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else{
                $this->response([
                    'status' => false,
                    'messagge' =>  'id not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    public function index_post()
    {
        $data =[
            'id_coursecategory' => $this->post('id_coursecategory'),
            'nama_course' => $this->post('nama_course')
        ];
        if ($this->category->create($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'New Course'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'messagge' =>  'id not found'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put()
    {
        $id = $this->put('id_coursecategory');
        $data =[
            'id_coursecategory' => $this->put('id_coursecategory'),
            'nama_course' => $this->put('nama_course')
        ];
        if ($this->category->update($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'has been Update'
            ], REST_Controller::HTTP_NO_CONTENT);
        }else{
            $this->response([
                'status' => false,
                'messagge' =>  'failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


}
