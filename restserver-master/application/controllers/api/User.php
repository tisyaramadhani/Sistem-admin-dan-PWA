<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class User extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model');
    }
    //Menampilkan data mahasiswa
    public function index_get()
    {
        $id = $this->get('id_siswa');
        if($id === null){
            $user = $this->User_model->get_data();
        }else {
            $user = $this->User_model->get_data($id);
        }
        if($user){
                // Set the response and exit
                $this->response([
                    'status' => true,
                    'data' =>  $user
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }else{
            $this->response([
                'status' => false,
                'messagge' =>  'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_delete(){
        $id = $this->delete('id_siswa');

        if($id === null ){
                $this->response([
                'status' => false,
                'messagge' =>  'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this-> User_model ->deleteuser($id) > 0){
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
            'id_siswa' => $this->post('id_siswa'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'id_jabatan' => $this->post('id_jabatan')
        ];
        if ($this->User_model->createuser($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'New User'
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
        $id = $this->put('id_siswa');
        $data =[
            'id_siswa' => $this->put('id_siswa'),
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'id_jabatan' => $this->put('id_jabatan')
        ];
        if ($this->User_model->updateuser($data, $id) > 0){
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
