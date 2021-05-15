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
    $data['pesanan'] = $this->model_pesanan->get_order(array('p_email' => $this->session->userdata('id')))->result();
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

    // Data untuk page buku/add
    $data['pageTitle'] = 'Konfirmasi Pembelian';
    $data['buku'] = $buku;
    $data['pageContent'] = $this->load->view('pesanan/konfirmasi', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);

          // Jika form di submit jalankan blok kode ini
          if (($this->input->post('submit-konfirmasi')) && (($this->session->userdata('saldo'))>=($buku->harga)) && ($buku->stock > 0)) {

          $data = array(
            'p_email' => $this->input->post('p_email'),
            'p_judul' => $this->input->post('p_judul'),
            'p_jumlah' => 1,
            'p_status' => 'diproses'
          );

          // Jalankan function insert pada model_pesanan
          $query = $this->model_pesanan->update_buku($id, $data);

          // cek jika query berhasil
          if ($query) $message = array('status' => true, 'message' => 'Berhasil membeli buku, silakan mengecek status pemesananmu di kolom pemesanan ya');
          else $message = array('status' => true, 'message' => 'Gagal membeli buku');

          // simpan message sebagai session
          $this->session->set_flashdata('message', $message);

          // $saldo = ($this->session->userdata('saldo')) - ($buku->harga);

          // $harga = array(
          //   'harga' => $saldo
          // );

          // Jalankan function insert pada model_pesanan
          $query = $this->model_pesanan->update_saldo($id);

          // refresh page
          redirect('pesanan', 'refresh');

        } elseif($buku->stock == 0) $message = array('status' => false, 'message' => 'Stok habis');
        
        else $message = array('status' => false, 'message' => 'Saldo tidak cukup');
        $this->session->set_flashdata('message', $message);
        redirect('pesanan', 'refresh');
  }

  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit-buku')) {

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('stock', 'Stok', 'required');

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('harga', 'Harga', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jika foto diganti jalankan blok kode ini
      if (!empty($_FILES['foto2']['name'])) {
        // Konfigurasi library upload codeigniter
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['file_name'] = $this->input->post('foto');

        // Load library upload
        $this->load->library('upload', $config);
        
        // Jika terdapat error pada proses upload maka exit
        if (!$this->upload->do_upload('foto2')) {
            exit($this->upload->display_errors());
        }
        else{
          $data['foto2'] = $this->upload->data()['file_name'];
        }
      }

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
          'stock' => $this->input->post('stock'),
          'harga' => $this->input->post('harga'),
          'deskripsi' => $this->input->post('deskripsi'),
          'foto' => $this->input->post('foto')
        );

        // Jalankan function insert pada model_pesanan
        $query = $this->model_pesanan->update($id, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui buku');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui buku');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('buku/edit/'.$id, 'refresh');
			} 
    }
    
    // Ambil data buku dari database
    $buku = $this->model_pesanan->get_where(array('id' => $id))->row();

    // Jika data buku tidak ada maka show 404
    if (!$buku) show_404();

    // Data untuk page buku/add
    $data['pageTitle'] = 'Edit Data Buku';
    $data['buku'] = $buku;
    $data['pageContent'] = $this->load->view('buku/bukuEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($id)
  {
    // Ambil data buku dari database
    $buku = $this->model_pesanan->get_where(array('id' => $id))->row();

    // Jika data buku tidak ada maka show 404
    if (!$buku) show_404();

    // Jalankan function delete pada model_pesanan
    $query = $this->model_pesanan->delete($id);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus buku');
    else $message = array('status' => true, 'message' => 'Gagal menghapus buku');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('buku', 'refresh');
  }
}