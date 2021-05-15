<?php
  class Model_topup extends CI_Model {

    public $table = 'topup';

    public function get()
    {
      // Jalankan query
      $query = $this->db->get($this->table);

      // Return hasil query
      return $query;
    }

    public function get_email($where)
    {
      // Jalankan query
      $query = $this->db
      ->from('topup')
      ->join('users', 'topup.t_email = users.id')
      ->where('topup.tid', $where)
      ->get();

      // Return hasil query
      return $query->row();
    }

    public function get_topup()
    {
      // Jalankan query
      $query = $this->db
      ->from('topup')
      ->join('users', 'topup.t_email = users.id')
      ->get();

      // Return hasil query
      return $query->result();
    }

    public function insert_riwayat($id, $data2)
    {
        // Jalankan query
        $query1 = $this->db
            ->insert('riwayat', $data2);

        $query2 = $this->db
        ->from('users')
        ->where('id', $data2['r_email'])
        ->get()->row();

        $akhir = ($query2->saldo) + $data2['topup'];

        // Jalankan query
        $query3 = $this->db
        ->from('users')
        ->where('id', $data2['r_email'])
        ->set('saldo', $akhir)
        ->update('users');

        // Jalankan query
        $query = $this->db
        ->where('tid', $id)
        ->delete($this->table);
      
        // Return hasil query
        return $query;
    }

    public function delete($id, $gagal)
    {
      // Jalankan query
      $query = $this->db
        ->where('tid', $id)
        ->delete($this->table);

      // Jalankan query
      $query1 = $this->db
      ->insert('riwayat', $gagal);
      
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

    
  }