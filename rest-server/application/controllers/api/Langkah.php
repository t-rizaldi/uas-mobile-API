<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Langkah extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LangkahM');
    }

    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $langkah = $this->LangkahM->getLangkah()->result();
        } else {
            $langkah = $this->LangkahM->getLangkah($id)->result();
        }

        if ($langkah) {
            $this->response([
                'error' => false,
                'langkah' => $langkah
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Langkah tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'id_resep' => $this->post('id_resep'),
            'langkah' => $this->post('langkah')
        );

        $langkah = $this->LangkahM->tambahLangkah($data);

        if ($langkah > 0) {
            $this->response([
                'error' => false,
                'message' => 'Langkah berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Langkah gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'id_resep' => $this->put('id_resep'),
            'langkah' => $this->put('langkah')
        );

        $langkah = $this->LangkahM->updateLangkah($where, $data);

        if ($langkah > 0) {
            $this->response([
                'error' => false,
                'message' => 'Langkah berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Langkah gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array('id' => $this->delete('id'));

        $langkah = $this->LangkahM->deleteLangkah($where);

        if ($langkah > 0) {
            $this->response([
                'error' => false,
                'message' => 'Langkah berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Langkah gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
