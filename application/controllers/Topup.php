<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Topup extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Cek apakah user login 
    // sebagai mitra
    $this->isAdmin();

    // Load model topup
    $this->load->model('model_topup');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Top Up';
    $data['topup'] = $this->model_topup->get_topup();
    $data['pageContent'] = $this->load->view('topup/topupList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }


  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit-topup')) {

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('status', 'Status Transaksi', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
            'r_email' => $this->input->post('email'),
            'topup' => $this->input->post('topup'),
            'status' => $this->input->post('status')
        );

        // Jalankan function insert pada model_topup
        $query3 = $this->model_topup->insert_riwayat($id, $data);

        // cek jika query berhasil
        if ($query3) $message = array('status' => true, 'message' => 'Top Up pengguna berhasil');
        else $message = array('status' => true, 'message' => 'Top Up pengguna gagal');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('topup', 'refresh');
		} 
    }
    
    // Ambil data topup dari database
    $topup = $this->model_topup->get_email($id);

    // Jika data topup tidak ada maka show 404
    if (!$topup) show_404();

    // Data untuk page topup/add
    $data['pageTitle'] = 'Konfirmasi Data Topup';
    $data['topup'] = $topup;
    $data['pageContent'] = $this->load->view('topup/topupEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($id)
  {
    // Ambil data topup dari database
    $topup = $this->model_topup->get_where(array('tid' => $id))->row();

    // Jika data topup tidak ada maka show 404
    if (!$topup) show_404();

    $gagal = array(
      'r_email' => $topup->{'t_email'},
      'topup' => $topup->{'topup'},
      'status' => 'gagal'
    );

    // Jalankan function delete pada model_topup
    $query = $this->model_topup->delete($id, $gagal);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus topup');
    else $message = array('status' => true, 'message' => 'Gagal menghapus topup');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('topup', 'refresh');
  }
}