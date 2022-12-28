<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Keperawatan extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Keperawatan_model', 'course');
    }
    //Menampilkan data mahasiswa
    public function index_get()
    {
        $id = $this->get('id_course');
        if($id === null){
            $course = $this->course->get_data();
        }else {
            $course = $this->course->get_data($id);
        }
        if($course){
                // Set the response and exit
                $this->response([   
                    'status' => true,
                    'data' =>  $course
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }else{
            $this->response([
                'status' => false,
                'messagge' =>  'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_delete(){
        $id = $this->delete('id_course');

        if($id === null ){
                $this->response([
                'status' => false,
                'messagge' =>  'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this-> course ->delete($id) > 0){
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
            'id_course' => $this->post('id_course'),
            'nama_course' => $this->post('nama_course')
        ];
        if ($this->course->create($data) > 0){
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
        $id = $this->put('id_course');
        $data =[
            'id_course' => $this->put('id_course'),
            'nama_course' => $this->put('nama_course')
        ];
        if ($this->course->update($data, $id) > 0){
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
