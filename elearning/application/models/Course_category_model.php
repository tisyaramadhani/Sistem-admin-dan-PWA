<?php

require 'vendor/autoload.php';
use GuzzleHttp\Client;

class Course_category_model extends CI_Model
{

    public function get_data()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/restserver-master/index.php/course_category');
        
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result['data'];
    }

    public function insert_data()
    {
        $client = new Client();
        
        $data = [
            "nama_course" => $this->input->post('nama_course', true),
        ];
        $response = $client->request('POST', 'http://localhost/restserver-master/index.php/course_category',[
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
        ];
        $response = $client->request('PUT', 'http://localhost/restserver-master/index.php/course_category',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
    }
    public function delete($id)
    {
        $client = new Client();
        $response = $client->request('DELETE', 'http://localhost/restserver-master/index.php/course_category', [
            'form_params' => [
                'id_coursecategory' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
    }
}
