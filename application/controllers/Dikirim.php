<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dikirim extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model dikirim
    $this->load->model('model_dikirim');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Dikirim';
    $data['dikirim'] = $this->model_dikirim->get_dikirim()->result();
    $data['pageContent'] = $this->load->view('dikirim/dikirimList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function konfirmasi($id = null)
  {

    // Ambil data dikirim dari database
    $dikirim = $this->model_dikirim->get_pesanan($id)->row();
  
    // Jika data dikirim tidak ada maka show 404
    if (!$dikirim) show_404();

    // Data untuk page dikirim/add
    $data['pageTitle'] = 'Konfirmasi Penerimaan Buku';
    $data['dikirim'] = $dikirim;
    $data['pageContent'] = $this->load->view('dikirim/konfirmasi', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);

          // Jika form di submit jalankan blok kode ini
          if ($this->input->post('submit-konfirmasi')) {

          $data = array(
            'p_status' => 'selesai'
          );

          $id = $this->input->post('oid');

          // Jalankan function insert pada model_dikirim
          $query = $this->model_dikirim->update($id, $data);

          // Cek jika query berhasil
          if ($query) $message = array('status' => true, 'message' => 'Pesanan Selesai! Terima kasih telah berbelanja di Serendipity Bookstore');
          else $message = array('status' => true, 'message' => 'Konfirmasi pengiriman gagal');

          // Simpan message sebagai session
          $this->session->set_flashdata('message', $message);

          // Refresh page
          redirect('dikirim', 'refresh');

        } 
        
  }

}