<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Cek apakah user login 
    // sebagai mitra
    $this->isAdmin();

    // Load model Buku
    $this->load->model('model_buku');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Buku';
    $data['buku'] = $this->model_buku->get()->result();
    $data['pageContent'] = $this->load->view('buku/bukuList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  // public function sendmail()
  // {
  //   if(isset($_POST['submit_email'])){
  //     $email = $this->input->post('email');
  //     $subject = $this->input->post('subject');
  //     $pesan = $this->input->post('pesan');

  //     if(!empty($email)){
  //       $config = [
  //         'mailtype' => 'text',
  //         'charset' => 'iso-8859-1',
  //         'protocol' => 'smtp',
  //         'smtp_host' => 'ssl://smtp.googlemail.com',
  //         'smtp_user' => 'hematwarrior.gmail',
  //         'smtp_pass' => 'SemangatIAI21',
  //         'smtp_port' => 465
  //       ];

  //       $this->load->library('email', $config);
  //       $this->email->initialize($config);

  //       $this->emai->from('emailfrom');
  //       $this->emai->to($email);
  //       $this->emai->subject($subject);
  //       $this->emai->message($pesan);

  //       if($this->email-send()){
  //         echo "Email berhasil dikirim!"
  //       } else{
  //         show_error($this->email->print_debugger())
  //       }

  //     }
  //   }
  // }

  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit-buku')) {
      
      // Mengatur validasi data buku,
      // # required = tidak boleh kosong
      // # min_length[5] = buku harus terdiri dari minimal 5 karakter
      //   tidak boleh sama dengan record yg sudah ada pada tabel buku
      $this->form_validation->set_rules('nisn', 'NISN', 'required');
      
      // Mengatur validasi data buku,
      // # required = tidak boleh kosong
      // # min_length[5] = buku harus terdiri dari minimal 5 karakter
      //   tidak boleh sama dengan record yg sudah ada pada tabel buku
      $this->form_validation->set_rules('judul', 'Judul', 'required');

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('stock', 'Stok', 'required');

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('harga', 'Harga', 'required');

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

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
        if ( ! $this->upload->do_upload('foto2')) {
            exit($this->upload->display_errors());
        }
        else{
          $data['foto2'] = $this->upload->data()['file_name'];
        }
      }

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
          'nisn' => $this->input->post('nisn'),
          'judul' => $this->input->post('judul'),
          'pengarang' => $this->input->post('pengarang'),
          'stock' => $this->input->post('stock'),
          'harga' => $this->input->post('harga'),
          'deskripsi' => $this->input->post('deskripsi'),
          'foto' => $this->input->post('foto')
        );

        // Jalankan function insert pada model_buku
        $query = $this->model_buku->insert($data);

        // if(isset($_POST['submit_email'])){
          // $email = $this->input->post('email');
          // $email = 'rizkiprastyo1@gmail.com';
          // $subject = $this->input->post('mitra').' sedang ada diskon besar!';
          // $pesan = 'Bagi kamu pelanggan setia '.$this->input->post('mitra').', lagi ada diskon menu '.$this->input->post('buku').': -'.$this->input->post('deskripsi').'- dari yang harganya '.$this->input->post('harga_awal').' JADI CUMA '.$this->input->post('harga_buku');
    
          // if(!empty($email)){
          //   $config = [
          //     'mailtype' => 'text',
          //     'charset' => 'iso-8859-1',
          //     'protocol' => 'smtp',
          //     'smtp_host' => 'ssl://smtp.googlemail.com',
          //     'smtp_user' => 'hematwarrior@gmail.com',
          //     'smtp_pass' => 'SemangatIAI21',
          //     'smtp_port' => 465
          //   ];
    
          //   $this->load->library('email', $config);
          //   $this->email->initialize($config);
    
          //   $this->email->from('hematwarrior@gmail.com', 'Toko Ubur Ubur');
          //   $this->email->to($email);
          //   $this->email->subject($subject);
          //   $this->email->message($pesan);

          //   $this->email->send();

            // $what = $this->email->send();
          // }
          // if ($what) $message = array('email' => 'Berhasil mengirim email!');
          // else $message = array('email' => show_error($this->email->print_debugger()));  

          // cek jika query berhasil
          if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan buku');
          else $message = array('status' => true, 'message' => 'Gagal menambahkan buku');

          // simpan message sebagai session
          $this->session->set_flashdata('message', $message);
        // }

        // refresh page
        redirect('buku/add', 'refresh');
			} 
    }
    
    // Data untuk page buku/add
    $data['pageTitle'] = 'Tambah Data Buku';
    $data['pageContent'] = $this->load->view('buku/bukuAdd', $data, TRUE);

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