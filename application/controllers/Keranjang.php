<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model Buku
    $this->load->model('model_buku');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Keranjang';
    $data['keranjang'] = $this->model_buku->tampil_keranjang(array('email' => $this->session->userdata('id'), 'transaksi' => NULL));
    $data['total'] = $this->model_buku->total_biaya(array('email' => $this->session->userdata('id'), 'transaksi' => NULL));
    $data['pageContent'] = $this->load->view('keranjang/keranjangList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }


  public function add($id = null)
  {
      
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit-order')) {

        // Mengatur validasi data password,
        // # required = tidak boleh kosong
        // # min_length[5] = password harus terdiri dari minimal 5 karakter
        $this->form_validation->set_rules('jumlah', 'Jumlah Pembelian', 'required');
  
        // Mengatur pesan error validasi data
        $this->form_validation->set_message('required', '%s tidak boleh kosong!');
  
        // Jalankan validasi jika semuanya benar maka lanjutkan
        if ($this->form_validation->run() === TRUE) {
  
          $data = array(
            'email' => $this->session->userdata('id'),
            'judul' => $this->input->post('id'),
            'jumlah' => $this->input->post('jumlah')
          );
  
          // Jalankan function insert pada model_buku
          $query = $this->model_buku->keranjang($data);
  
          // cek jika query berhasil
          if ($query) $message = array('status' => true, 'message' => 'Berhasil menambah keranjang');
          else $message = array('status' => true, 'message' => 'Gagal menambah keranjang');
  
          // simpan message sebagai session
          $this->session->set_flashdata('message', $message);
  
          // refresh page
          redirect('keranjang/add/'.$id, 'refresh');
        } 
    }
      
      // Ambil data buku dari database
      $buku = $this->model_buku->get_where(array('id' => $id))->row();
  
      // Jika data buku tidak ada maka show 404
      if (!$buku) show_404();
  
      // Data untuk page buku/add
      $data['pageTitle'] = 'Tambah Keranjang';
      $data['buku'] = $buku;
      $data['pageContent'] = $this->load->view('keranjang/keranjangAdd', $data, TRUE);
  
      // Jalankan view template/layout
      $this->load->view('template/layout', $data);
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

        // Jalankan function insert pada model_buku
        $query = $this->model_buku->update($id, $data);

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
    $buku = $this->model_buku->get_where(array('id' => $id))->row();

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
    $buku = $this->model_buku->get_where(array('id' => $id))->row();

    // Jika data buku tidak ada maka show 404
    if (!$buku) show_404();

    // Jalankan function delete pada model_buku
    $query = $this->model_buku->delete($id);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus buku');
    else $message = array('status' => true, 'message' => 'Gagal menghapus buku');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('buku', 'refresh');
  }
}