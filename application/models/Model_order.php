<?php
  class Model_order extends CI_Model {

    public $table = 'pesanan';

    public function get()
    {
      // Jalankan query
      $query = $this->db->get($this->table);

      // Return hasil query
      return $query;
    }

    public function get_where($where)
    {
      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get($this->table);

      // Return hasil query
      return $query;
    }

    public function insert($data)
    {
      // Jalankan query
      $query = $this->db->insert($this->table, $data);

      // Return hasil query
      return $query;
    }

    public function update($id, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('oid', $id)
        ->update($this->table, $data);
      
      // Return hasil query
      return $query;
    }

    public function delete($id)
    {
      // Jalankan query
      $query = $this->db
        ->where('id', $id)
        ->delete($this->table);
      
      // Return hasil query
      return $query;
    }

    public function get_order()
    {
      // Jalankan query
      $query = $this->db
        ->from($this->table)
        ->join('buku', 'pesanan.p_judul = buku.id')
        ->join('users', 'pesanan.p_email = users.id')
        ->where('p_status', 'diproses')
        ->get();

      // Return hasil query
      return $query;
    }

    public function get_buku($where)
    {
      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get('buku');

      // Return hasil query
      return $query;
    }

    public function update_buku($id, $data)
    {
      // Jalankan query
      $query = $this->db->insert($this->table, $data);

      $query1 = $this->db
      ->where(array('id' => $id))
      ->get('buku')->row();

      $stock = ($query1->stock) - 1;

      $query2 = $this->db
      ->from('buku')
      ->set('stock', $stock)
      ->where(array('id' => $id))
      ->update('buku');

      // Return hasil query
      return $query;
    }

    public function update_saldo($id)
    {

      $query1 = $this->db
      ->from('buku')
      ->where(array('id' => $id))
      ->get()->row();

      $saldo = ($this->session->userdata('saldo')) - ($query1->harga);

      //Jalankan query
      $query = $this->db
        ->where('id', $this->session->userdata('id'))
        ->set('saldo', $saldo)
        ->update('users');

      $this->session->set_userdata('saldo', $saldo);

      // Return hasil query
      return $query;
    }

    public function get_pesanan($id)
    {
      // Jalankan query
      $query = $this->db
        ->from('pesanan')
        ->join('buku', 'pesanan.p_judul = buku.id')
        ->join('users', 'pesanan.p_email = users.id')
        ->where('oid', $id)
        ->get();

      // Return hasil query
      return $query;
    }
  }