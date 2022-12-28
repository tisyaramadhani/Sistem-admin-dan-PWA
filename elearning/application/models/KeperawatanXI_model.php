<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use GuzzleHttp\Client;
class KeperawatanXI_model extends CI_Model
{

    public function get_data()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/restserver-master/index.php/keperawatanxi');
        
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result['data'];
    }
    public function get_dataid($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/restserver-master/index.php/keperawatanxi',[
            'query' =>[
                'id_course' => $id
            ]
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result['data']['0'];
    }

    public function insert_data()
    {
        $client = new Client();
        
        $data = [
            "nama_course" => $this->input->post('nama_course', true),
        ];
        $response = $client->request('POST', 'http://localhost/restserver-master/index.php/keperawatanxi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
    }
    public function update_data()
    {
        $client = new Client();
        
        $data = [
            "nama_course" => $this->input->post('nama_course', true),
            "id_course" => $this->input->post('id_course', true),
        ];
        $response = $client->request('PUT', 'http://localhost/restserver-master/index.php/keperawatanxi',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
    }
    public function delete($id)
    {
        $client = new Client();
        $response = $client->request('DELETE', 'http://localhost/restserver-master/index.php/keperawatanxi', [
            'form_params' => [
                'id_course' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
    }
}
