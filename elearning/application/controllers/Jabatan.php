<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Jabatan extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('jabatan_model', 'jabatan');
    }
    //Menampilkan data mahasiswa
    public function index_get()
    {
        $id = $this->get('id_jabatan');
        if($id === null){
            $jabatan = $this->jabatan->get_data();
        }else {
            $jabatan = $this->jabatan->get_data($id);
        }
        if($jabatan){
                // Set the response and exit
                $this->response([   
                    'status' => true,
                    'data' =>  $jabatan
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }else{
            $this->response([
                'status' => false,
                'messagge' =>  'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


}
