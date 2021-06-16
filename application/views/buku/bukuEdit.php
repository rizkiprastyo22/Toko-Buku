<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content purple lighten-2 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <form class="row" id="edit-promo-form" method="post" action="" enctype="multipart/form-data">
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
          
          <div class="input-field col s12 m6">
              <input id="nisn" disabled name="nisn" type="number" value="<?php echo $buku->nisn; ?>">
              <label for="mitra" class="">ISBN</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="judul" disabled name="judul" type="text" value="<?php echo $buku->judul; ?>">
              <label for="judul" class="">Judul</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="pengarang" disabled name="pengarang" type="text" value="<?php echo $buku->pengarang; ?>">
              <label for="pengarang" class="">Pengarang</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="stock" name="stock" type="number" value="<?php echo $buku->stock; ?>">
              <label for="stock" class="">Stok</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="harga" name="harga" type="number" value="<?php echo $buku->harga; ?>">
              <label for="harga" class="">Harga</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="deskripsi" name="deskripsi" type="text" value="<?php echo $buku->deskripsi; ?>">
              <label for="deskripsi" class="">Deskripsi Singkat (1 kalimat):</label>
          </div>
          <div class="input-field file-field col s12 m12 l12">
                <div class="btn purple lighten-2">
                  <span>Foto Buku</span>
                  <input type="file" name="foto2">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" name="foto" type="text" accept="image/png, image/jpeg" value="<?php echo $buku->foto; ?>">
                </div>
          </div>
          <div class="col s12 m12 l12 left-align">
            Format Upload Gambar (tanpa spasi): <br><span style="color:blue;">JudulBuku_FotoKeberapa</span><br>(Misal: HW_NG_8)<br><span style="color:red;">*nilai foto keberapa harus +1 dari file sebelumnya</span>
          </div>
          <div class="input-field col s6 m6 l6 left-align">
            <br><br><a href="#modal4"><button name="batal" class="btn light blue lighten-2 waves-effect waves-green">Kembali</button></a>
          </div>
          <div class="input-field col s6 m6 l6 right-align">
            <br><br><button type="submit" name="submit-buku" value="<?php echo $buku->id; ?>" class="btn purple lighten-2 waves-effect waves-green">Simpan</button>
          </div>
        </form>
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
