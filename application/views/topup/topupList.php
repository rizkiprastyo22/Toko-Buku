<!-- <main style="background-image: url('<?php echo base_url('img/bg1.png'); ?>');"> -->
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
                  <th class="center-align">Nominal Top Up</th>
                  <!-- <th class="center-align">Stock</th>
                  <th class="center-align">Harga</th> -->
                  <th class="center-align">Pilihan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($topup as $row): 
                    $nominal = number_format($row->topup);
                    ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->email; ?></td>
                      <td class="center-align">Rp. <?php echo $nominal; ?></td>
                      <!-- <td class="center-align"><?php echo $row->stock; ?></td>
                      <td class="center-align">Rp. <?php echo $harga; ?></td> -->
                      <td class="center-align">
                        <a href="<?php echo base_url('topup/edit/' . $row->tid); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Konfirmasi"><i class="material-icons">edit</i></a>
                        <a href="#modal1" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a>
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                          <div class="modal-content purple lighten-2 white-text">
                            <h4 style="font-size: 1.5rem;">Konfirmasi Delete Permohonan</h4>
                          </div>
                          <div class="modal-content">
                            <p style="font-size: 1.2rem;">Apakah kamu yakin pengguna telah membatalkan permohonan?</p>
                          </div>
                          <div class="modal-footer">
                            <a href="<?php echo base_url('topup/delete/' . $row->tid); ?>" class="modal-close waves-effect waves-green btn-flat">Yakin</a>
                            <a href="" class="modal-close waves-effect waves-green btn-flat">Tidak Jadi</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
<!-- </main> -->