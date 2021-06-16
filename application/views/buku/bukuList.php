<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content purple lighten-2 white-text">
          <span class="card-title">Data Buku</span>
          <a href="<?php echo base_url('buku/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light purple lighten-4 tooltipped" data-position="top" data-tooltip="Tambah Data"><i class="material-icons">add</i></a>
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
                  <th>Judul</th>
                  <th>Pengarang</th>
                  <th class="center-align">Stock</th>
                  <th class="center-align">Harga</th>
                  <th class="center-align">Pilihan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($buku as $row): 
                    $harga = number_format($row->harga,2,',','.');
                    ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->judul; ?></td>
                      <td><?php echo $row->pengarang; ?></td>
                      <td class="center-align"><?php echo $row->stock; ?></td>
                      <td class="center-align">Rp<?php echo $harga; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('buku/edit/' . $row->id); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Edit Data"><i class="material-icons">edit</i></a>
                        <a href="<?php echo base_url('buku/delete/' . $row->id); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
