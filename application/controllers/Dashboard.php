<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();

    // Load model buku
    $this->load->model('model_buku');
  }

  public function index()
  {
    $data['pageTitle'] = 'Home';
    $data['buku'] = $this->model_buku->get()->result();
    $data['pageContent'] = $this->load->view('dashboard/main', $data, TRUE);

    $this->load->view('template/layout', $data);
  }
}