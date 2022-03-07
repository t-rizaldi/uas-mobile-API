<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Bahan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BahanM');
    }

    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $bahan = $this->BahanM->getBahan()->result();
        } else {
            $bahan = $this->BahanM->getBahan($id)->result();
        }

        if ($bahan) {
            $this->response([
                'error' => false,
                'bahan' => $bahan
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Bahan tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'id_resep' => $this->post('id_resep'),
            'bahan' => $this->post('bahan'),
            'jumlah' => $this->post('jumlah'),
            'satuan' => $this->post('satuan')
        );

        $bahan = $this->BahanM->tambahBahan($data);

        if ($bahan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Bahan berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Bahan gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'id_resep' => $this->put('id_resep'),
            'bahan' => $this->put('bahan'),
            'jumlah' => $this->put('jumlah'),
            'satuan' => $this->put('satuan')
        );

        $bahan = $this->BahanM->updateBahan($where, $data);

        if ($bahan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Bahan berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Bahan gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array('id' => $this->delete('id'));

        $bahan = $this->BahanM->deleteBahan($where);

        if ($bahan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Bahan berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Bahan gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
