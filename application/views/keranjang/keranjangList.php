<!-- <main style="background-image: url('<?php echo base_url('img/bg1.png'); ?>');"> -->
<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content purple lighten-2 white-text">
          <span class="card-title"><?php echo $pageTitle; ?></span>
          <!-- <a href="<?php echo base_url('keranjang/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light purple lighten-4 tooltipped" data-position="top" data-tooltip="Tambah Buku"><i class="material-icons">add</i></a> -->
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
                  <!-- <th>Pengarang</th> -->
                  <!-- <th class="center-align">Stock</th> -->
                  <th class="center-align">Jumlah Pembelian</th>
                  <th class="center-align">Harga Total</th>
                  <th class="center-align">Pilihan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 0; foreach($keranjang as $row): 
                    $harga = number_format(($row->harga)*($row->jumlah));
                    ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->judul; ?></td>
                      <!-- <td><?php echo $row->pengarang; ?></td> -->
                      <!-- <td class="center-align"><?php echo $row->stock; ?></td> -->
                      <td class="center-align"><?php echo $row->jumlah; ?></td>
                      <td class="center-align">Rp. <?php echo $harga; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('keranjang/edit/' . $row->pid); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Edit Data"><i class="material-icons">edit</i></a>
                        <a href="#modal1" class="btn-floating halfway-fab waves-effect waves-light tooltipped purple lighten-2" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a>
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal" style="width:350px;">
                          <div class="modal-content purple lighten-2 white-text">
                            <h4 style="font-size: 1.5rem;">Konfirmasi Hapus Buku</h4>
                          </div>
                          <div class="modal-content">
                            <p style="font-size: 1.2rem;">Apakah kamu yakin mau menghapus buku?</p>
                          </div>
                          <div class="modal-footer">
                            <a href="<?php echo base_url('keranjang/delete/' . $row->pid); ?>" class="modal-close waves-effect waves-green btn purple lighten-2">Yakin</a>
                            <a href="" class="modal-close waves-effect waves-green btn-flat">Tidak Jadi</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                    <tr>
                    <td></td>
                    <td></td>
                    <td class="center-align">Ubur Cash Anda: Rp. <strong>0</strong></td>
                    <td class="center-align">Total Biaya: Rp. <strong><?php echo number_format($total); ?></strong></td>
                    <td class="center-align"><button type="submit" name="submit" value="add_belanja" class="btn purple lighten-2 waves-effect waves-green">Bayar</button></td>
                    </tr>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
<!-- </main> -->