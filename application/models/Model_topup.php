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

    public function insert_riwayat($id, $data)
    {
        // Jalankan query
        $query1 = $this->db
            ->insert('riwayat', $data);

        $query2 = $this->db
        ->from('users')
        // ->join('riwayat', 'riwayat.email = users.id')
        ->where('id', $data['email'])
        ->get()->row();

        $akhir = ($query2->saldo) + $data['topup'];

        // Jalankan query
        $query3 = $this->db
        ->from('users')
        // ->join('riwayat', 'riwayat.email = users.id')
        ->where('id', $data['email'])
        ->set('saldo', $akhir)
        ->update('users');

        // Jalankan query
        $query4 = $this->db
        ->where('tid', $id)
        ->delete($this->table);
      
        // Return hasil query
        return $query3;
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
  }