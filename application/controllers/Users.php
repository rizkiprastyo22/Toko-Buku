<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Cek apakah user login 
    // sebagai administrator
    $this->isAdmin();

    // Load model users
    $this->load->model('model_users');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Users';
    $data['users'] = $this->model_users->get_where(array('level' => 'pelanggan'))->result();
    $data['pageContent'] = $this->load->view('users/userList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama,
      // required = tidak boleh kosong
      $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');

      // Mengatur validasi data email,
      // required = tidak boleh kosong
      // min_length[5] = email harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|is_unique[users.email]');

      // Mengatur validasi data password,
      // required = tidak boleh kosong
      // min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

      // Mengatur validasi data level,
      // required = tidak boleh kosong
      // in_list[administrator, pelanggan, mitra] = hanya boleh bernilai salah satu di antara administrator, pelanggan, atau mitra
      $this->form_validation->set_rules('level', 'Level', 'required|in_list[administrator,pelanggan,mitra]');

      // Mengatur validasi data active,
      // required = tidak boleh kosong
      // in_list[0, 1] = hanya boleh bernilai salah satu di antara 0 atau 1
      $this->form_validation->set_rules('active', 'Status akun', 'required|in_list[aktif,tidak aktif]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
      $this->form_validation->set_message('is_unique', '%s sudah terdaftar!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
          'nama' => $this->input->post('nama'),
          'email' => $this->input->post('email'),
          'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'level' => $this->input->post('level'),
          'active' => $this->input->post('active')
        );

        // Jalankan function insert pada model_users
        $query = $this->model_users->insert($data);

        // Cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan user');
        else $message = array('status' => true, 'message' => 'Gagal menambahkan user');

        // Simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // Refresh page
        redirect('users/add', 'refresh');
			} 
    }
    
    // Data untuk page users/add
    $data['pageTitle'] = 'Tambah Data User';
    $data['pageContent'] = $this->load->view('users/userAdd', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {

      // Mengatur validasi data nama,
      // required = tidak boleh kosong
      $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');

      // Mengatur validasi data active,
      // required = tidak boleh kosong
      // in_list[0, 1] = hanya boleh bernilai salah satu di antara 0 atau 1
      $this->form_validation->set_rules('active', 'Status akun', 'required|in_list[0,1]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
          'nama' => $this->input->post('nama'),
          'active' => $this->input->post('active')
        );

        // Jalankan function insert pada model_users
        $query = $this->model_users->update($id, $data);

        // Cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui user');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui user');

        // Simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // Refresh page
        redirect('users/edit/'.$id, 'refresh');
			} 
    }
    
    // Ambil data user dari database
    $user = $this->model_users->get_where(array('id' => $id))->row();

    // Jika data user tidak ada maka show 404
    if (!$user) show_404();

    // Data untuk page users/add
    $data['pageTitle'] = 'Edit Data User';
    $data['user'] = $user;
    $data['pageContent'] = $this->load->view('users/userEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($id)
  {
    // Ambil data user dari database
    $user = $this->model_users->get_where(array('id' => $id))->row();

    // Jika data user tidak ada maka show 404
    if (!$user) show_404();

    // Jalankan function delete pada model_users
    $query = $this->model_users->delete($id);

    // Cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus user');
    else $message = array('status' => true, 'message' => 'Gagal menghapus user');

    // Simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // Refresh page
    redirect('users', 'refresh');
  }
}