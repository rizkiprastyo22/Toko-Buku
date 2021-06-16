<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content purple lighten-2 white-text">
          <span class="card-title">Data Pesanan</span>
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
                  <th>Judul</th>
                  <th>Pengarang</th>
                  <th class="center-align">Harga</th>
                  <th class="center-align">Status Pesanan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($pesanan as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->judul; ?></td>
                      <td><?php echo $row->pengarang; ?></td>
                      <td class="center-align">Rp<?php echo number_format($row->harga,2,',','.'); ?></td>
                      <td class="center-align"><?php echo ucwords($row->p_status); ?></td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>