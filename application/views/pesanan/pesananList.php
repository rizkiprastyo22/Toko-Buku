<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content purple lighten-2 white-text">
          <span class="card-title">Data Pesanan</span>
        </div>
        <div class="card-content">
          <table class="bordered highlight">
              <thead>
                  <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th class="center-align">Jumlah</th>
                  <th class="center-align">Status Pesanan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($pesanan as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->p_judul; ?></td>
                      <td class="center-align"><?php echo $row->p_jumlah; ?></td>
                      <td class="center-align"><?php echo $row->p_status; ?></td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>