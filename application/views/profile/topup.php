<!-- <main style="background-image: url('img/bg1.png');"> -->
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content purple lighten-2 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <form class="row" id="topup-form" method="post" action="" enctype="multipart/form-data">
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
          
            <div class="input-field col s12 m12 l12">
                <input id="email" readonly name="email" type="text" value="<?php echo $this->session->userdata('email'); ?>">
                <label for="email" class="">ID Email</label>
            </div>
            <div class="input-field col s12 m12 l12">
                <input id="saldo" readonly name="saldo" type="number" value="<?php echo $this->session->userdata('saldo'); ?>">
                <label for="saldo" class="">Saldo saat ini</label>
            </div>
            <div class="input-field col s12 m12 l12">
                <input id="topup" name="topup" type="number" value="<?php echo set_value('topup'); ?>">
                <label for="topup" class="">Jumlah Top Up</label>
            </div>
            <div class="input-field col s6 m6 l6 left-align">
                <br><br><a href="#modal10"><button name="batal" class="btn light blue lighten-2 waves-effect waves-green">Kembali</button></a>
            </div>
            <div class="input-field col s6 m6 l6 right-align">
                <!-- <br><br><button type="submit" name="submit-order" value="add_keranjang" class="btn light purple lighten-2 waves-effect waves-green">Update Keranjang</button> -->
                <br><br><a href="#modal9"><button name="total" class="btn light purple lighten-2 waves-effect waves-green">Top Up</button></a>
            </div>

            <!-- Modal Structure -->
            <!-- <div id="modal9" class="modal center-align" style="width:320px;">
            <div class="modal-content purple lighten-2 white-text">
                <h4 style="font-size: 1.5rem;">Konfirmasi Top Up</h4>
            </div>
            <div class="modal-content">
                <p style="font-size: 1.2rem;">Apakah kamu yakin data top up sudah benar?</p>
            </div>
            <div class="modal-footer">
                <br><br><button type="submit" name="submit-topup" value="add_topup" class="modal-close waves-effect waves-green btn-flat">Yakin</button> -->
                <!-- <a href="<?php echo base_url('profile/topup/' . $this->session->userdata('id')); ?>" class="modal-close waves-effect waves-green btn-flat">Yakin</a> -->
                <!-- <a href="" class="modal-close waves-effect waves-green btn-flat">Batal</a>
            </div> -->
        </form>
        <!-- Modal Structure -->
        <div id="modal10" class="modal center-align" style="width:320px;">
          <div class="modal-content purple lighten-2 white-text">
            <h4 style="font-size: 1.5rem;">Konfirmasi kembali</h4>
          </div>
          <div class="modal-content">
            <p style="font-size: 1.2rem;">Apakah kamu yakin mau kembali?</p>
          </div>
          <div class="modal-footer">
            <a href="<?php echo base_url('profile'); ?>" class="modal-close waves-effect waves-green btn-flat">Yakin</a>
            <a href="" class="modal-close waves-effect waves-green btn-flat">Tidak Jadi</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- </main> -->