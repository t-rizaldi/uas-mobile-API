<?php

use GuzzleHttp\Client;

class ResepM extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/uasMobile/rest-server/api/'
        ]);
    }


    public function getAllResep()
    {

        try {
            $response = $this->_client->request('GET', 'resep');
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['resep'];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function tambahResep($data)
    {
        $response = $this->_client->request('POST', 'resep', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function editResep($data)
    {
        $response = $this->_client->request('PUT', 'resep', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function hapusResep($where)
    {
        $response = $this->_client->request('DELETE', 'resep', [
            'form_params' => $where
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}
