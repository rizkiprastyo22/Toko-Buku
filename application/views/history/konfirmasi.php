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
          <!-- <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?> -->
          <div class="input-field col s12 m6">
              <input id="oid" readonly name="oid" type="text" value="<?php echo $dikirim->oid; ?>">
              <label for="oid" class="">ID Pesanan</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="judul" readonly name="judul" type="text" value="<?php echo $dikirim->judul; ?>">
              <label for="judul" class="">Judul Buku</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="nama" readonly name="nama" type="text" value="<?php echo $dikirim->nama; ?>">
              <label for="nama" class="">Nama Pemesan</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="alamat" readonly name="alamat" type="text" value="<?php echo $dikirim->alamat; ?>">
              <label for="alamat" class="">Alamat Pemesan</label>
          </div>
          <div class="input-field col s6 m6 l6 left-align">
            <br><br><a href="#modal3"><button name="batal" class="btn light blue lighten-2 waves-effect waves-green">Kembali</button></a>
          </div>
          <div class="input-field col s6 m6 l6 right-align">
            <br><br><button type="submit" name="submit-konfirmasi" value="add_konfirmasi" class="btn purple lighten-2 waves-effect waves-green">Pesanan Selesai</button>
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
            <a href="<?php echo base_url('dikirim'); ?>" class="modal-close waves-effect waves-green btn-flat">Yakin</a>
            <a href="" class="modal-close waves-effect waves-green btn-flat">Tidak Jadi</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>