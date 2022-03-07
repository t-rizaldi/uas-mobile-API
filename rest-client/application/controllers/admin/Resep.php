<?php

class Resep extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ResepM');

    // if ($this->session->userdata('role_id') != 2) {
    //   $this->session->set_flashdata('pesan', '<div class="small alert alert-danger alert-dismissible fade show" role="alert">
    //             Anda belum login...!!!
    //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //               <span aria-hidden="true">&times;</span>
    //             </button>
    //           </div>');

    //   redirect('auth/login');
    // }
  }

  public function index()
  {
    $this->session->set_flashdata('breadcrumb', '<nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb bg-transparent mt-3">
                                                        <li class="breadcrumb-item"><a href="' . base_url() . '">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Daftar Resep</li>
                                                        </ol>
                                                    </nav>');


    $data['title'] = 'Admin | Resep Makanan';
    $data['resep'] = $this->ResepM->getAllResep();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/resep', $data);
    $this->load->view('templates/footer');
  }

  public function tambahResep()
  {
    $nama_masakan = htmlspecialchars(strip_tags(stripslashes($this->input->post('nama_masakan'))));
    $gambar = $_FILES['gambar']['name'];

    if ($gambar == '') {
    } else {
      $config['upload_path'] = './gambar';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambar')) {
        echo "Gambar Gagal di Upload!";
      } else {
        $gambar = $this->upload->data('file_name');
      }
    }

    $data = array(
      'nama_masakan' => $nama_masakan,
      'gambar' => base_url('gambar/') . $gambar
    );

    $resep = $this->ResepM->tambahResep($data);

    if ($resep > 0) {
      $this->session->set_flashdata('message', 'berhasil ditambah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal ditambah...!!!');
    }

    redirect('admin/resep');
  }

  public function editResep()
  {
    $id = $this->input->post('id_resep');
    $nama_masakan = htmlspecialchars(strip_tags(stripslashes($this->input->post('nama_masakan'))));
    $gambarLama = $this->input->post('gambarLama');
    $gambar = $_FILES['gambar']['name'];

    if ($gambar == '') {
    } else {
      $config['upload_path'] = './gambar';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambar')) {

        $gambar = $gambarLama;

        $data = array(
          'id' => $id,
          'nama_masakan' => $nama_masakan,
          'gambar' => $gambar
        );
      } else {
        $gambar = $this->upload->data('file_name');

        $data = array(
          'id' => $id,
          'nama_masakan' => $nama_masakan,
          'gambar' => base_url('gambar/') . $gambar
        );
      }
    }

    $resep = $this->ResepM->editResep($data);

    if ($resep > 0) {
      $this->session->set_flashdata('message', 'berhasil diubah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal diubah...!!!');
    }

    redirect('admin/resep');
  }

  public function hapusKamar()
  {
    $where = array(
      'id' => $this->input->post('id')
    );

    $resep = $this->ResepM->hapusKamar($where);

    if ($resep > 0) {
      $this->session->set_flashdata('message', 'berhasil dihapus...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal dihapus...!!!');
    }

    redirect('admin/resep');
  }
}
