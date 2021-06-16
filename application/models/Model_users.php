<?php
  class Model_users extends CI_Model {

    public $table = 'users';

    public function cekAkun($email, $password)
    {
      // Get data user yang mempunyai email == $email dan active == 1
      $this->db->where('email', $email);
      $this->db->where('active', 'aktif');
			
      // Jalankan query
      $query = $this->db->get($this->table)->row();
      
      // Jika query gagal atau tidak menemukan email yang sesuai maka return false
      if (!$query) return false;
			
      // Ambil data password dari database
      $hash = $query->password;
      
      // Jika $hash tidak sama dengan $password maka return false
      if (!password_verify($password, $hash)) return false;
      
      // Update last_login user
      $last_login = $this->update($query->id, array('last_login' => date('Y-m-d H:i:s')));
      
      // Jika email dan password benar maka return data user
      return $query;        
    }

    public function topup($data)
    {
      // Jalankan query
      $query = $this->db->insert('topup', $data);

      // Return hasil query
      return $query;
    }

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
  }