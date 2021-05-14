<?php
  class Model_buku extends CI_Model {

    public $table = 'buku';

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
        ->where('id', $id)
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

    public function keranjang($data)
    {
      // Jalankan query
      $query = $this->db->insert('pembeli', $data);

      // Return hasil query
      return $query;
    }  

    public function tampil_keranjang($where)
    {
      // Jalankan query
      $query = $this->db
        ->from('pembeli')
        // ->join('users', 'pembeli.email = users.id')
        ->join('buku', 'pembeli.judul = buku.id')
        ->where($where)
        ->get();

      // Return hasil query
      return $query->result();
    }

    public function get_where_keranjang($where)
    {
      // Jalankan query
      $query = $this->db
        // ->select('buku.judul','pembeli.jumlah','buku.harga')
        ->from('pembeli')
        // ->join('users', 'pembeli.email = users.id')
        ->join('buku', 'pembeli.judul = buku.id')
        ->where('pembeli.pid', $where)
        ->get();

      // Return hasil query
      return $query->result();
    }

    public function get_where_item($where)
    {
      // Jalankan query
      $query = $this->db
        // ->select('buku.judul','pembeli.jumlah','buku.harga')
        ->from('pembeli')
        // ->join('users', 'pembeli.email = users.id')
        ->join('buku', 'pembeli.judul = buku.id')
        ->where('pembeli.pid', $where)
        ->get();

      // Return hasil query
      return $query;
    }

    // public function get_where_barang($where)
    // {
    //   // Jalankan query
    //   $query = $this->db
    //     // ->select('buku.judul','pembeli.jumlah','buku.harga')
    //     ->from('pembeli')
    //     // ->join('users', 'pembeli.email = users.id')
    //     ->join('buku', 'pembeli.judul = buku.id')
    //     ->where('pembeli.id', $where)
    //     ->get();

    //   // Return hasil query
    //   return $query;
    // }

    public function total_biaya($where)
    {
      // Jalankan query
      $query = $this->db
        ->from('pembeli')
        // ->join('users', 'pembeli.email = users.id')
        ->join('buku', 'pembeli.judul = buku.id')
        ->where($where)
        ->get()
        ->result();

        $total=0;
        $harga=0;
        foreach($query as $row)
        {
          $harga = ($row->harga)*($row->jumlah);
          $total += $harga;
        }

      // Return hasil query
      return $total;
    }

    public function update_keranjang($id, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('pembeli.pid', $id)
        ->update('pembeli', $data);
      
      // Return hasil query
      return $query;
    }

    public function delete_keranjang($id)
    {
      // Jalankan query
      $query = $this->db
        ->where('pembeli.pid', $id)
        ->delete('pembeli');
      
      // Return hasil query
      return $query;
    }
  }