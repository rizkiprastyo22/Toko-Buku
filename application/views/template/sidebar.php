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

    <!-- <li>
      <a class="waves-effect" href="<?php echo base_url('events'); ?>"><i class="material-icons">event</i>Events</a>
    </li> -->
    
    <li>
      <div class="divider"></div>
    </li>

    <?php if($this->session->userdata('level') === 'administrator'): ?>
      <!-- <li>
        <a class="subheader">administrator</a>
      </li> -->
      
      <li>
        <a class="waves-effect" href="<?php echo base_url('buku'); ?>"><i class="material-icons">article</i>Buku</a>
      </li>
      
      <li>
        <div class="divider"></div>
      </li>
    <?php endif; ?>

    <?php if($this->session->userdata('level') === 'administrator'): ?>
      <!-- <li>
        <a class="subheader">Admin</a>
      </li> -->
      
      <li>
        <a class="waves-effect" href="<?php echo base_url('users'); ?>"><i class="material-icons">people</i>Users</a>
      </li>
      
      <li>
        <div class="divider"></div>
      </li><br>
    <?php endif; ?>

    <?php if($this->session->userdata('level') !== 'administrator'): ?>
      <li>
        <a class="waves-effect" href="<?php echo base_url('keranjang'); ?>"><i class="material-icons">person</i>Keranjang</a>
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