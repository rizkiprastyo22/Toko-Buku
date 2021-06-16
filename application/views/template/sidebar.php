<aside>
  <ul id="sidenav" class="side-nav fixed purple lighten-4">
    <li>
      <div class="userView">
        <div class="background">
          <img src="<?php echo base_url('img/sidebar.jpg'); ?>">
        </div>
        <a href="#!user"><img class="circle" src="<?php echo base_url('assets/images/noavatar.png'); ?>"></a>
        <a href="#!name"><span class="white-text name"><?php echo ucwords(strtolower($this->session->userdata('nama'))); ?></span></a>
        <a href="#!email"><span class="white-text email"><?php echo (strtolower($this->session->userdata('email'))); ?></span></a>
      </div>
    </li>
    <li>
      <a class="waves-effect" href="<?php echo base_url('dashboard'); ?>"><i class="material-icons">home</i>Home</a>
    </li>
    
    <li>
      <div class="divider"></div>
    </li>

    <?php if($this->session->userdata('level') === 'administrator'): ?>

      <li>
        <a class="waves-effect" href="<?php echo base_url('buku'); ?>"><i class="material-icons">article</i>Daftar Buku</a>
      </li>
      
      <li>
        <div class="divider"></div>
      </li>

      <li>
        <a class="waves-effect" href="<?php echo base_url('order'); ?>"><i class="material-icons">assignment_ind</i>Daftar Pesanan</a>
      </li>
      
      <li>
        <div class="divider"></div>
      </li>

      <li>
        <a class="waves-effect" href="<?php echo base_url('topup'); ?>"><i class="material-icons">credit_card</i>Permohonan Top Up</a>
      </li>
      
      <li>
        <div class="divider"></div>
      </li>

      <li>
        <a class="waves-effect" href="<?php echo base_url('riwayat'); ?>"><i class="material-icons">history</i>Riwayat</a>
      </li>
      
      <li>
        <div class="divider"></div>
      </li>
      
      <li>
        <a class="waves-effect" href="<?php echo base_url('users'); ?>"><i class="material-icons">people</i>Users</a>
      </li>
      
      <li>
        <div class="divider"></div>
      </li><br>
    <?php endif; ?>

    <?php if($this->session->userdata('level') !== 'administrator'): ?>
      <li>
        <a class="waves-effect" href="<?php echo base_url('pesanan'); ?>"><i class="material-icons">shopping_cart</i>Pesanan</a>
      </li>

      <li>
          <div class="divider"></div>
      </li>

      <li>
        <a class="waves-effect" href="<?php echo base_url('dikirim'); ?>"><i class="material-icons">schedule_send</i>Dikirim</a>
      </li>

      <li>
          <div class="divider"></div>
      </li>

      <li>
        <a class="waves-effect" href="<?php echo base_url('history'); ?>"><i class="material-icons">history</i>Riwayat</a>
      </li>

      <li>
          <div class="divider"></div>
      </li>
      
      <li>
        <a class="waves-effect" href="<?php echo base_url('profile'); ?>"><i class="material-icons">person</i>Profil</a>
      </li>

      <li>
          <div class="divider"></div>
      </li>
    <?php endif; ?>

    <li>
      <a class="waves-effect"  href="<?php echo base_url('auth/logout'); ?>"><i class="material-icons">exit_to_app</i>Logout</a>
    </li>
    
  </ul>
</aside>