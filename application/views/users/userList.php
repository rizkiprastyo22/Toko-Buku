<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content purple lighten-2 white-text">
          <span class="card-title">Data Pengguna</span>
          <a href="<?php echo base_url('users/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light purple lighten-4 tooltipped" data-position="top" data-tooltip="Tambah Data"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <table class="bordered highlight">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Email</th>
                      <th>Nomor Telepon</th>
                      <th class="center-align">Status Akun</th>
                      <!-- <th class="center-align">Active</th>
                      <th class="center-align">Last Login</th> -->
                      <th class="center-align">Edit Status</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($users as $row): 
                    $email = explode('@', $row->email);
                    ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->nama; ?></td>
                      <td><?php echo $email[0].'<br>@'.$email[1]; ?></td>
                      <td><?php echo $row->no_telp; ?></td>
                      <td class="center-align"><?php echo ucwords($row->active); ?></td>
                      <!-- <td><?php echo $row->last_login; ?></td> -->
                      <!-- <td class="center-align"><?php echo $row->last_login; ?></td> -->
                      <td class="center-align">
                        <a href="<?php echo base_url('users/edit/' . $row->id); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Edit Status"><i class="material-icons">edit</i></a>
                        <!-- <a href="<?php echo base_url('users/delete/' . $row->id); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a> -->
                      </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>