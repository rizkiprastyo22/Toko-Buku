<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content purple lighten-2 white-text">
          <span class="card-title">Riwayat</span>
        </div>
        <div class="card-content">
        <div class="row">
          <div class="col s12">
            <ul class="tabs tabs-fixed-width">
              <li class="tab col s3"><a class="active" href="#pesan-buku">Pesanan Buku</a></li>
              <li class="tab col s3"><a href="#topup">Top Up</a></li>
            </ul>
          </div>

        <div id="pesan-buku" class="card-content">
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
                  <th>Nomor Resi</th>
                  <th>Judul Buku</th>
                  <th>Alamat</th>
                  <th class="center-align">Kurir</th>
                  <th class="center-align">Harga</th>
                  <th class="center-align">Status Pesanan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($riwayat as $row):  
                    ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->resi; ?></td>
                      <td><?php echo $row->judul; ?></td>
                      <td><?php echo $row->alamat; ?></td>
                      <td class="center-align"><?php echo $row->kurir; ?></td>
                      <td class="center-align">Rp. <?php echo number_format($row->harga); ?></td>
                      <td class="center-align"><?php echo ucwords($row->p_status); ?></td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>

        <div id="topup" class="card-content">
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
                  <th class="center-align">Nominal Top Up</th>
                  <th class="center-align">Status Pesanan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($topup as $row):  
                    ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td class="center-align">Rp. <?php echo number_format($row->topup); ?></td>
                      <td class="center-align"><?php echo ucwords($row->status); ?></td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>

      </div>
    </div>
</div>