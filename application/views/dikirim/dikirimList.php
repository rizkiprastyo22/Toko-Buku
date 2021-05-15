<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content purple lighten-2 white-text">
          <span class="card-title">Daftar Buku Dikirim</span>
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
          <table class="bdikirimed highlight">
              <thead>
                  <tr>
                  <th>No</th>
                  <th>Nomor Resi</th>
                  <th>Judul Buku</th>
                  <th>Alamat</th>
                  <th class="center-align">Kurir</th>
                  <th class="center-align">Status Pesanan</th>
                  <th class="center-align">Konfirmasi Diterima</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($dikirim as $row):  
                    ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->resi; ?></td>
                      <td><?php echo $row->judul; ?></td>
                      <td><?php echo $row->alamat; ?></td>
                      <td class="center-align"><?php echo $row->kurir; ?></td>
                      <td class="center-align"><?php echo ucwords($row->p_status); ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('dikirim/konfirmasi/' . $row->oid); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Konfirmasi"><i class="material-icons">done</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>