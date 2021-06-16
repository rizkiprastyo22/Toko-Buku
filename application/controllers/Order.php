<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model order
    $this->load->model('model_order');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Order';
    $data['order'] = $this->model_order->get_order()->result();
    $data['pageContent'] = $this->load->view('order/orderList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function konfirmasi($id = null)
  {

    // Ambil data order dari database
    $order = $this->model_order->get_pesanan($id)->row();
  
    // Jika data order tidak ada maka show 404
    if (!$order) show_404();

    // Data untuk page order/add
    $data['pageTitle'] = 'Konfirmasi Pengiriman';
    $data['order'] = $order;
    $data['pageContent'] = $this->load->view('order/konfirmasi', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);

          // Jika form di submit jalankan blok kode ini
          if ($this->input->post('submit-konfirmasi')) {

          $data = array(
            'resi' => $this->input->post('resi'),
            'kurir' => $this->input->post('kurir'),
            'p_status' => 'dikirim'
          );

          $id = $this->input->post('oid');

          // Jalankan function insert pada model_order
          $query = $this->model_order->update($id, $data);

          // cek jika query berhasil
          if ($query) $message = array('status' => true, 'message' => 'Konfirmasi pengiriman berhasil');
          else $message = array('status' => true, 'message' => 'Konfirmasi pengiriman gagal');

          // Simpan message sebagai session
          $this->session->set_flashdata('message', $message);

          // Refresh page
          redirect('order', 'refresh');

        } 
        
  }

  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit-order')) {

      // Mengatur validasi data stok,
      // required = tidak boleh kosong
      $this->form_validation->set_rules('stock', 'Stok', 'required');

      // Mengatur validasi data harga,
      // required = tidak boleh kosong
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

        // Jalankan function insert pada model_order
        $query = $this->model_order->update($id, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui buku');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui buku');

        // Simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // Refresh page
        redirect('buku/edit/'.$id, 'refresh');
			} 
    }
    
    // Ambil data buku dari database
    $buku = $this->model_order->get_where(array('id' => $id))->row();

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
    $buku = $this->model_order->get_where(array('id' => $id))->row();

    // Jika data buku tidak ada maka show 404
    if (!$buku) show_404();

    // Jalankan function delete pada model_order
    $query = $this->model_order->delete($id);

    // Cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus buku');
    else $message = array('status' => true, 'message' => 'Gagal menghapus buku');

    // Simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // Refresh page
    redirect('buku', 'refresh');
  }
}