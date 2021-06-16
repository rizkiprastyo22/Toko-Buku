<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model users
    $this->load->model('model_users');
  }

  public function index()
  {
    // Jika form profile di submit jalankan blok kode ini
    if ($this->input->post('submit-information')) {
      
      // Mengatur validasi data nama,
      // required = tidak boleh kosong
      $this->form_validation->set_rules('nama', 'Nama', 'required');

      // Mengatur validasi data alamat,
      // required = tidak boleh kosong
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');

      // Mengatur validasi data telepon,
      // required = tidak boleh kosong
      $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'nama' => $this->input->post('nama'),
          'alamat' => $this->input->post('alamat'),
          'no_telp' => $this->input->post('no_telp')
        );

        // Ambil user ID dari session
        $userId = $this->session->userdata('id');

        // Jalankan function update pada model_users
        $query = $this->model_users->update($userId, $data);

        // Cek jika query berhasil
        if ($query) {

          // Set success message
          $message = array('status' => true, 'message' => 'Berhasil memperbarui profil');
          
          // Update session baru
          $this->session->set_userdata($data);

        } else {

          // Set error message
          $message = array('status' => false, 'message' => 'Gagal memperbarui profil');

        }

        // Simpan message sebagai session
        $this->session->set_flashdata('message_profile', $message);

        // Refresh page
        redirect('profile', 'refresh');
			} 
    }

    // Jika form password di submit jalankan blok kode ini
    if ($this->input->post('submit-password')) {

      // Mengatur validasi data password_baru,
      // required = tidak boleh kosong
      // min_length[5] = password_baru harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[5]');

      // Mengatur validasi data konfirmasi_password,
      // required = tidak boleh kosong
      // matches = nilai konfirmasi_password harus sama dengan password_baru
      $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password_baru]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
      $this->form_validation->set_message('matches', '{field} tidak sama dengan {param}.');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data['password'] = password_hash($this->input->post('konfirmasi_password'), PASSWORD_DEFAULT);

        // Ambil user ID
        $userId = $this->session->userdata('id');

        // Jalankan function update pada model_users
        $query = $this->model_users->update($userId, $data);

        // Cek jika query berhasil
        if ($query) {

          // Logout user
          redirect('auth/logout');

        } else {

          // Set error message
          $message = array('status' => false, 'message' => 'Gagal memperbarui profile');

        }

        // Simpan message sebagai session
        $this->session->set_flashdata('message_profile', $message);

        // Refresh page
        redirect('profile', 'refresh');
			}

    }

        // Jika form di submit jalankan blok kode ini
        if ($this->input->post('submit-topup')) {

          // Mengatur validasi data password,
          // required = tidak boleh kosong
          $this->form_validation->set_rules('topup', 'Jumlah Top Up', 'required');
    
          // Mengatur pesan error validasi data
          $this->form_validation->set_message('required', '%s tidak boleh kosong!');
    
          // Jalankan validasi jika semuanya benar maka lanjutkan
          if ($this->form_validation->run() === TRUE) {
    
            $data = array(
              't_email' => $this->session->userdata('id'),
              'topup' => $this->input->post('topup')
            );
    
            // Jalankan function insert pada model_buku
            $query = $this->model_users->topup($data);
    
              // Cek jika query berhasil
              if ($query) $message = array('status' => true, 'message' => 'Permohonan Top Up berhasil!'."\n".'Silakan transfer ke Bank BCA dengan Nomor Rekening 6482756254 a/n Serendipity Bookstore'."\n".'dan konfirmasi melalui Direct Message ke IG: @serendipitybs'."\n".'dengan menyertakan Nama Email dan Screenshot Bukti Transaksi kamu ya');
              else $message = array('status' => true, 'message' => 'Permohonan Top Up gagal!');
    
              // Simpan message sebagai session
              $this->session->set_flashdata('message', $message);
    
            // Refresh page
            redirect('profile', 'refresh');
          } 
        }

    // Data untuk page profile
    $data['pageTitle'] = 'Profil Akun';
    $data['pageContent'] = $this->load->view('profile/profile', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function topup($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit-topup')) {

      // Mengatur validasi data topup,
      // required = tidak boleh kosong
      $this->form_validation->set_rules('topup', 'Jumlah Top Up', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
          't_email' => $this->input->post('email'),
          'topup' => $this->input->post('topup')
        );

        // Jalankan function insert pada model_buku
        $query = $this->model_users->topup($data);

          // Cek jika query berhasil
          if ($query) $message = array('status' => true, 'message' => 'Permohonan Top Up berhasil! Silakan transfer ke Bank BCA dengan Nomor Rekening 6482756254 a/n Serendipity Bookstore dan konfirmasi melalui Direct Message ke IG: @serendipitybs');
          else $message = array('status' => true, 'message' => 'Permohonan Top Up gagal!');

          // Simpan message sebagai session
          $this->session->set_flashdata('message', $message);

        // Refresh page
        redirect('profile/topup', 'refresh');
			} 
    }

    // Data untuk page buku/add
    $data['pageTitle'] = 'Permohonan Top Up Ubur Cash';
    $data['pageContent'] = $this->load->view('profile/topup', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }
}