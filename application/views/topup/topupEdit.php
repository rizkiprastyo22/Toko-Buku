<!-- <main style="background-image: url('img/bg1.png');"> -->
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content purple lighten-2 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <form class="row" id="edit-topup-form" method="post" action="<?php echo base_url('topup/edit'); ?>" enctype="multipart/form-data">
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
              <input id="r_email" readonly name="r_email" type="number" value=<?php echo $topup->t_email; ?>>
              <label for="r_email" class="">ID Email Pengguna</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="tid" readonly name="tid" type="number" value="<?php echo $topup->tid; ?>">
              <label for="tid" class="">Email Pengguna</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="topup" readonly name="topup" type="text" value="<?php echo $topup->topup; ?>">
              <label for="topup" class="">Nominal Top Up</label>
          </div>
          <div class="input-field col s12 m12 l12">
              <select id="status" name="status">
                  <option value="berhasil">Berhasil</option>
              </select>
              <label>Pilih Status</label>
          </div>
          <div class="input-field col s6 m6 l6 left-align">
            <br><br><a href="#modal4"><button name="batal" class="btn light blue lighten-2 waves-effect waves-green">Kembali</button></a>
          </div>
          <div class="input-field col s6 m6 l6 right-align">
            <br><br><button type="submit" name="submit-topup" value="<?php echo $topup->tid; ?>" class="btn purple lighten-2 waves-effect waves-green">Top Up</button>
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
            <a href="<?php echo base_url('topup'); ?>" class="modal-close waves-effect waves-green btn purple lighten-2">Yakin</a>
            <a href="" class="modal-close waves-effect waves-green btn-flat">Tidak Jadi</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- </main> -->