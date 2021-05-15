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
              <input id="p_email" readonly name="p_email" type="number" value="<?php echo $this->session->userdata('id'); ?>">
              <label for="p_email" class="">ID Pengguna</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="p_judul" readonly name="p_judul" type="number" value="<?php echo $buku->id; ?>">
              <label for="p_judul" class="">ID Judul Buku</label>
          </div>
          <div class="input-field col s12 m12 l12">
              <input id="judul" readonly name="judul" type="text" value="<?php echo $buku->judul; ?>">
              <label for="judul" class="">Judul Buku</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="harga" readonly name="harga" type="number" value="<?php echo $buku->harga; ?>">
              <label for="harga" class="">Harga Total</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="saldo" readonly name="saldo" type="number" value="<?php echo $this->session->userdata('saldo'); ?>">
              <label for="saldo" class="">Ubur Cash Anda</label>
          </div>
          <div class="input-field col s6 m6 l6 left-align">
            <br><br><a href="#modal3"><button name="batal" class="btn light blue lighten-2 waves-effect waves-green">Kembali</button></a>
          </div>
          <div class="input-field col s6 m6 l6 right-align">
            <br><br><button type="submit" name="submit-konfirmasi" value="add_konfirmasi" class="btn purple lighten-2 waves-effect waves-green">Beli Sekarang</button>
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
            <a href="<?php echo base_url('dashboard'); ?>" class="modal-close waves-effect waves-green btn-flat">Yakin</a>
            <a href="" class="modal-close waves-effect waves-green btn-flat">Tidak Jadi</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>