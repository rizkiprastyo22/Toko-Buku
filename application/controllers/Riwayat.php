<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model riwayat
    $this->load->model('model_riwayat');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Riwayat';
    $data['riwayat'] = $this->model_riwayat->get_riwayat()->result();
    $data['topup'] = $this->model_riwayat->get_topup()->result();
    $data['pageContent'] = $this->load->view('riwayat/riwayatList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function konfirmasi($id = null)
  {

    // Ambil data riwayat dari database
    $riwayat = $this->model_riwayat->get_pesanan($id)->row();
  
    // Jika data riwayat tidak ada maka show 404
    if (!$riwayat) show_404();

    // Data untuk page riwayat/add
    $data['pageTitle'] = 'Konfirmasi Penerimaan Buku';
    $data['riwayat'] = $riwayat;
    $data['pageContent'] = $this->load->view('riwayat/konfirmasi', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);

          // Jika form di submit jalankan blok kode ini
          if ($this->input->post('submit-konfirmasi')) {

          $data = array(
            'p_status' => 'selesai'
          );

          $id = $this->input->post('oid');

          // Jalankan function insert pada model_riwayat
          $query = $this->model_riwayat->update($id, $data);

          // Cek jika query berhasil
          if ($query) $message = array('status' => true, 'message' => 'Pesanan Selesai! Terima kasih telah berbelanja di Serendipity Bookstore');
          else $message = array('status' => true, 'message' => 'Konfirmasi pengiriman gagal');

          // Simpan message sebagai session
          $this->session->set_flashdata('message', $message);

          // Refresh page
          redirect('riwayat', 'refresh');

        } 
        
  }

}