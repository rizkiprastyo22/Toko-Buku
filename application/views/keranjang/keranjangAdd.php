<!-- <main style="background-image: url('img/bg1.png');"> -->
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content purple lighten-2 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <form class="row" id="add-order-form" method="post" action="" enctype="multipart/form-data">
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

          <!-- <?php $jumlah = 0; $total=0;?> -->
          <div class="input-field col s12 m6">
              <input id="id" readonly name="id" type="number" value="<?php echo $buku->id; ?>">
              <label for="id" class="">ID Buku</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="judul" readonly name="judul" type="text" value="<?php echo $buku->judul; ?>">
              <label for="judul" class="">Judul</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="jumlah" name="jumlah" type="number" value="<?php echo set_value('jumlah'); ?>">
              <label for="jumlah" class="">Jumlah Pembelian</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="harga" readonly name="harga" type="number" value="<?php echo $buku->harga; ?>">
              <label for="harga" class="">Harga Satuan</label>
          </div>
          <div class="input-field col s6 m6 l6 left-align">
            <br><br><a href="#modal4"><button name="batal" class="btn light blue lighten-2 waves-effect waves-green">Kembali</button></a>
          </div>
          <div class="input-field col s6 m6 l6 right-align">
            <br><br><button type="submit" name="submit-order" value="add_keranjang" class="btn light purple lighten-2 waves-effect waves-green">Tambah Keranjang</button>
            <!-- <br><br><a href="#modal8"><button name="total" class="btn light purple lighten-2 waves-effect waves-green">Tambahkan</button></a> -->
          </div>
          </form>
          <!-- Modal Structure -->
          <!-- <div id="modal8" class="modal center-align" style="width:320px;">
              <div class="modal-content purple lighten-2 white-text">
                <h4 style="font-size: 1.5rem;">Total Harga</h4>
              </div>
              <div class="modal-content">
                <p style="font-size: 1.2rem;">Total harga pesananmu adalah 
                <?php
                  $total=$jumlah*($buku->harga);
                  echo $total; ?></p>
                <p style="font-size: 1.2rem;">Apakah kamu yakin untuk menambahkan di keranjangmu?</p>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit-order" value="<?php echo $buku->id; ?>" class="modal-close btn-flat waves-effect waves-green">Yakin</button>
                <a href="" class="modal-close btn-flat waves-effect waves-green">Tidak Jadi</a>
              </div>
          </div> -->
        
        <!-- Modal Structure -->
        <div id="modal4" class="modal center-align" style="width:320px;">
          <div class="modal-content purple lighten-2 white-text">
            <h4 style="font-size: 1.5rem;">Konfirmasi kembali</h4>
          </div>
          <div class="modal-content">
            <p style="font-size: 1.2rem;">Apakah kamu yakin mau kembali?</p>
          </div>
          <div class="modal-footer">
            <a href="<?php echo base_url('buku'); ?>" class="modal-close waves-effect waves-green btn-flat">Yakin</a>
            <a href="" class="modal-close waves-effect waves-green btn-flat">Tidak Jadi</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- </main> -->