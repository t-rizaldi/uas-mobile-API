<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Bumbu extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BumbuM');
    }

    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $bumbu = $this->BumbuM->getBumbu()->result();
        } else {
            $bumbu = $this->BumbuM->getBumbu($id)->result();
        }

        if ($bumbu) {
            $this->response([
                'error' => false,
                'bumbu' => $bumbu
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Bumbu tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'id_resep' => $this->post('id_resep'),
            'bumbu' => $this->post('bumbu'),
            'jumlah' => $this->post('jumlah')
        );

        $bumbu = $this->BumbuM->tambahBumbu($data);

        if ($bumbu > 0) {
            $this->response([
                'error' => false,
                'message' => 'Bumbu berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Bumbu gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'id_resep' => $this->put('id_resep'),
            'bumbu' => $this->put('bumbu'),
            'jumlah' => $this->put('jumlah')
        );

        $bumbu = $this->BumbuM->updateBumbu($where, $data);

        if ($bumbu > 0) {
            $this->response([
                'error' => false,
                'message' => 'Bumbu berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Bumbu gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array('id' => $this->delete('id'));

        $bumbu = $this->BumbuM->deleteBumbu($where);

        if ($bumbu > 0) {
            $this->response([
                'error' => false,
                'message' => 'Bumbu berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Bumbu gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
