<!-- <main style="background-image: url('img/bg1.png');"> -->
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content purple lighten-2 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <form class="row" id="add-promo-form" method="post" action="" enctype="multipart/form-data">
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
                <!-- <span class="white-text"><?php echo $message['email']; ?></span> -->
              </div>
            </div>
          <?php endif; ?>
          <div class="input-field col s12 m6">
              <input id="nisn" name="nisn" type="text" value="<?php echo set_value('nisn'); ?>">
              <label for="nisn" class="">NISN</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="judul" name="judul" type="text" value="<?php echo set_value('judul'); ?>">
              <label for="judul" class="">Judul</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="pengarang" name="pengarang" type="number" value="<?php echo set_value('pengarang'); ?>">
              <label for="pengarang" class="">Pengarang</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="stock" name="stock" type="number" value="<?php echo set_value('stock'); ?>">
              <label for="stock" class="">Stok</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="harga" name="harga" type="number" value="<?php echo set_value('harga'); ?>">
              <label for="harga" class="">Harga</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="deskripsi" name="deskripsi" type="text" value="<?php echo set_value('deskripsi'); ?>">
              <label for="deskripsi" class="">Deskripsi Singkat (1 kalimat)</label>
          </div>
          <div class="input-field file-field col s12 m12 l12">
                <div class="btn purple lighten-2">
                  <span>Foto Buku</span>
                  <input type="file" name="foto2">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" name="foto" type="text" accept="image/png, image/jpeg" value="<?php echo set_value('foto'); ?>">
                </div>
          </div>
          <div class="col s12 m12 l12 left-align">
            Format Upload Gambar (tanpa spasi): <br><span style="color:blue;">JudulBuku_FotoKeberapa</span><br>(Misal: Shine_8)
          </div>
          <div class="input-field col s6 m6 l6 left-align">
            <br><br><a href="#modal3"><button name="batal" class="btn light blue lighten-2 waves-effect waves-green">Kembali</button></a>
          </div>
          <div class="input-field col s6 m6 l6 right-align">
            <br><br><button type="submit" name="submit-buku" value="add_buku" class="btn purple lighten-2 waves-effect waves-green">Simpan</button>
          </div>
        </form>
        <!-- Modal Structure -->
        <div id="modal3" class="modal center-align" style="width:320px;">
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