<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content purple lighten-2 white-text">
          <span class="card-title">Data Permohonan Top Up</span>
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
                  <th>Email</th>
                  <th class="center-align">Saldo Awal</th>
                  <th class="center-align">Nominal Top Up</th>
                  <th class="center-align">Pilihan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($topup as $row): 
                    $awal = number_format($row->saldo,2,',','.');
                    $nominal = number_format($row->topup,2,',','.');
                    ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->email; ?></td>
                      <td class="center-align">Rp<?php echo $awal; ?></td>
                      <td class="center-align">Rp<?php echo $nominal; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('topup/edit/' . $row->tid); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Konfirmasi"><i class="material-icons">done</i></a>
                        <a href="<?php echo base_url('topup/delete/' . $row->tid); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
