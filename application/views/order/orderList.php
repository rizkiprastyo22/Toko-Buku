<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content purple lighten-2 white-text">
          <span class="card-title">Data Orderan</span>
        </div>
        <div class="card-content">
        <?php if(validation_errors()): ?>
            <div class="col s12">
              <div class="card-panel red">
                <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
              </div>
            </div>
          <?php endif; ?>
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
                  <th>Pemesan</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Judul Buku</th>
                  <th class="center-align">Konfirmasi pengiriman</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($order as $row): 
                    $email = explode('@', $row->email);
                    ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->nama; ?></td>
                      <td><?php echo $email[0].'<br>@'.$email[1]; ?></td>
                      <td><?php echo $row->alamat; ?></td>
                      <td><?php echo $row->judul; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('order/konfirmasi/' . $row->oid); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Konfirmasi"><i class="material-icons">edit</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>