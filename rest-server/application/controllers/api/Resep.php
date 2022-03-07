<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Resep extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ResepM');
    }

    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $resep = $this->ResepM->getResep()->result();
        } else {
            $resep = $this->ResepM->getResep($id)->result();
        }

        if ($resep) {
            $this->response([
                'error' => false,
                'resep' => $resep
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Resep tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'nama_masakan' => $this->post('nama_masakan'),
            'gambar' => $this->post('gambar')
        );

        $resep = $this->ResepM->tambahResep($data);

        if ($resep > 0) {
            $this->response([
                'error' => false,
                'message' => 'Resep berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Resep gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'nama_masakan' => $this->put('nama_masakan'),
            'gambar' => $this->put('gambar')
        );

        $resep = $this->ResepM->updateResep($where, $data);

        if ($resep > 0) {
            $this->response([
                'error' => false,
                'message' => 'Resep berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Resep gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array('id' => $this->delete('id'));

        $resep = $this->ResepM->deleteResep($where);

        if ($resep > 0) {
            $this->response([
                'error' => false,
                'message' => 'Resep berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Resep gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
