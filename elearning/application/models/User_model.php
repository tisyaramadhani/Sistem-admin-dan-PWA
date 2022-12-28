<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

class User_model extends CI_Model
{
    public function get_data()
    {
        //return $this->db->get($table);
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/restserver-master/index.php/User');
        
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result['data'];
    }
    public function insert_data()
    { 
        $client = new Client();
        
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "nama_jabatan" => $this->input->post('nama_jabatan', true),
        ];
        $response = $client->request('POST', 'http://localhost/restserver-master/index.php/User',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
    }
    public function update_data()
    {
        $client = new Client();
        
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "nama_jabatan" => $this->input->post('nama_jabatan', true),
        ];
        $response = $client->request('PUT', 'http://localhost/restserver-master/index.php/User',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
    }
    public function delete($id)
    {
        $client = new Client();
        $response = $client->request('DELETE', 'http://localhost/restserver-master/index.php/User', [
            'form_params' => [
                'id_user' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;


    }
    public function box()
    {
        $client = new Client();

        $response = $client->request('GET', 'http://localhost/restserver-master/index.php/jabatan',);
        
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result['data'];
    }
}
