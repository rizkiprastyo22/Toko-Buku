<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model pesanan
    $this->load->model('model_pesanan');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Pesanan';
    $data['pesanan'] = $this->model_pesanan->get_order(array('p_email' => $this->session->userdata('id'), 'p_status' => 'diproses'))->result();
    $data['pageContent'] = $this->load->view('pesanan/pesananList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function add($id = null)
  {

    // Ambil data buku dari database
    $buku = $this->model_pesanan->get_buku(array('id' => $id))->row();

    // Jika data buku tidak ada maka show 404
    if (!$buku) show_404();

    if($buku->stock == 0){
      $message = array('status' => false, 'message' => 'Stok habis');
      $this->session->set_flashdata('message', $message);
      // Refresh page
      redirect('pesanan', 'refresh');
    } 

    elseif(($this->session->userdata('saldo'))<($buku->harga)){
      $message = array('status' => false, 'message' => 'Saldo Anda tidak cukup');
      $this->session->set_flashdata('message', $message);
      // Refresh page
      redirect('pesanan', 'refresh');
    }

    else{

      // Data untuk page buku/add
      $data['pageTitle'] = 'Konfirmasi Pembelian';
      $data['buku'] = $buku;
      $data['pageContent'] = $this->load->view('pesanan/konfirmasi', $data, TRUE);

      // Jalankan view template/layout
      $this->load->view('template/layout', $data);

      // Jika form di submit jalankan blok kode ini
      if ($this->input->post('submit-konfirmasi')) {

        $data = array(
          'p_email' => $this->input->post('p_email'),
          'p_judul' => $this->input->post('p_judul'),
          'p_jumlah' => 1,
          'p_status' => 'diproses'
        );

        // Jalankan function insert pada model_pesanan
        $query = $this->model_pesanan->update_buku($id, $data);

        // Cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil membeli buku, silakan mengecek status pemesananmu di kolom pemesanan ya');
        else $message = array('status' => true, 'message' => 'Gagal membeli buku');

        // Simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // Jalankan function insert pada model_pesanan
        $query = $this->model_pesanan->update_saldo($id);

        // Refresh page
        redirect('pesanan', 'refresh');

      } 
    }
  }
}