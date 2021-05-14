<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content purple lighten-2 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <div class="row">
          <div class="col s12">
            <ul class="tabs tabs-fixed-width">
              <li class="tab col s3"><a class="active" href="#basic-tab">Saldo</a></li>
              <li class="tab col s3"><a href="#info-tab">Ubah Profil</a></li>
              <li class="tab col s3"><a href="#password-tab">Ubah Password</a></li>
            </ul>
          </div>

          <div id="basic-tab" class="col s12">
            <form class="row" id="basic-form" method="post" action="" style="margin-top: 20px;" enctype="multipart/form-data">
              <?php if(validation_errors()): ?>
                <div class="col s12">
                  <div class="card-panel red">
                    <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <?php if($message = $this->session->flashdata('message_profile')): ?>
                <div class="col s12">
                  <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                    <span class="white-text"><?php echo $message['message']; ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <div id="basic-form">
                <div class="input-field col s12 m12 l12">
                    <h3 class="center-align">Rp. <?php echo $this->session->userdata('saldo'); ?></h3>
                </div>
                <div class="input-field col s12 m12 l12 center-align">
                  <!-- <a href="<?php echo base_url('profile/edit/' . $this->session->userdata('id')); ?>" class="btn purple lighten-2 waves-effect waves-green">Top Up Sekarang</a><br><br> -->
                  <a href="#modal9" class="btn purple lighten-2 waves-effect waves-green">Top Up Sekarang</a>
                  <div id="modal9" class="modal left-align">
                    <!-- <form class="row" method="post" action="" style="margin-top: 20px;" enctype="multipart/form-data"> -->
                      <!-- <div class="container"> -->
                        <div class="modal-content purple lighten-2 white-text">
                          <h4 style="font-size: 1.5rem;">Konfirmasi Top Up</h4>
                        </div>
                        <br>
                        <div class="input-field col s12 m12 l12">
                          <input id="email" readonly name="email" type="text" value="<?php echo $this->session->userdata('email'); ?>">
                          <label for="email" class="">Email</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <input id="saldo" readonly name="saldo" type="number" value="<?php echo $this->session->userdata('saldo'); ?>">
                            <label for="saldo" class="">Saldo saat ini</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <input id="topup" name="topup" type="number" value="<?php echo set_value('topup'); ?>">
                            <label for="topup" class="">Jumlah Top Up</label>
                        </div>
                        <br>
                        <div class="modal-footer">
                          <input type="submit" name="submit-topup" value="Top Up" class="modal-close waves-effect waves-green btn purple lighten-2"></input>
                          <a href="" class="modal-close waves-effect waves-green btn-flat">Batal</a>
                        </div>
                      <!-- </div> -->
                    <!-- </form> -->
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div id="info-tab" class="col s12">
            <form class="row" id="info-form" method="post" action="" style="margin-top: 20px;" enctype="multipart/form-data">
              <?php if(validation_errors()): ?>
                <div class="col s12">
                  <div class="card-panel red">
                    <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <?php if($message = $this->session->flashdata('message_profile')): ?>
                <div class="col s12">
                  <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                    <span class="white-text"><?php echo $message['message']; ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <div class="input-field col s12 m12 l12">
                  <input id="nama" name="nama" type="text" value="<?php echo $this->session->userdata('nama'); ?>">
                  <label for="nama" class="">Nama Lengkap</label>
              </div>
              <div class="input-field col s12 m12 l12">
                  <input id="alamat" name="alamat" type="text" value="<?php echo $this->session->userdata('alamat'); ?>">
                  <label for="alamat" class="">Alamat</label>
              </div>
              <div class="input-field col s12 m12 l12">
                  <input id="no_telp" name="no_telp" type="number" value="<?php echo $this->session->userdata('no_telp'); ?>">
                  <label for="no_telp" class="">No. Telepon</label>
              </div>
              <div class="input-field col s12 right-align">
                  <button type="submit" name="submit-information" value="true" class="btn purple lighten-2 waves-effect waves-green">Simpan</button>
              </div>
                <!-- <div class="btn purple lighten-2">
                  <span>Upload Avatar</span>
                  <input type="file" name="avatar2">
                </div> -->
                <!-- <div class="file-path-wrapper"> -->
                  <!-- <input class="file-path validate" name="foto" type="text" accept="image/png, image/jpeg" value="<?php echo set_value('avatar'); ?>"> -->
                <!-- </div>
              </div> -->
            </form>
          </div>

          <div id="password-tab" class="col s12">
            <form class="row" id="password-form" method="post" action="" style="margin-top: 20px;">
              <?php if(validation_errors()): ?>
                <div class="col s12">
                  <div class="card-panel red">
                    <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <?php if($message = $this->session->flashdata('message_password')): ?>
                <div class="col s12">
                  <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                    <span class="white-text"><?php echo $message['message']; ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <!-- <div class="input-field col s12">
                  <input id="password_lama" name="password_lama" type="password">
                  <label for="password_lama" class="">Password Lama</label>
              </div> -->
              <div class="input-field col s12">
                  <input id="password_baru" name="password_baru" type="password">
                  <label for="password_baru" class="">Password Baru</label>
              </div>
              <div class="input-field col s12">
                  <input id="konfirmasi_password" name="konfirmasi_password" type="password">
                  <label for="konfirmasi_password" class="">Konfirmasi Password</label>
              </div>
              <div class="input-field col s12 right-align">
                  <button type="submit" name="submit-password" value="true" class="btn purple lighten-2 waves-effect waves-green">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>