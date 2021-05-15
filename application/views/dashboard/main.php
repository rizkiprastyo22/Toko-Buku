    <!-- Top box -->
		<!-- Logo & Site Name -->
		<!-- <div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" style="background-image: url('<?php echo base_url('img/bg1.png'); ?>');">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="<?php echo base_url('img/logoku.png'); ?>" alt="Logo" class="tm-site-logo" width="200" 
							height="50" /> <br>
							<div class="tm-site-text-box">
								<h6 class="tm-site-description" style="color: black; padding-left: 5px;">Segala buku, Ada di Toko Ubur Ubur!</h6>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

        <div>
            <h2 class="col-12 text-center tm-section-title">Temukan buku untukmu disini!</h2>
			<p class="col-12 text-center" style="font-size:16px;">Hidup lebih mudah dengan kami yang menyediakan <b style="color:red;">863.891</b><br>buku yang tersedia dari <b style="color:red;">39.456</b> pengarang dari seluruh dunia</p><br>
        </div>

        <!-- <div class="tm-paging-links">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link active">Buku</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Rekomendasi</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Bukber</a></li>
					</ul>
				</nav>
			</div> -->

        <!-- Gallery -->
			<div class="row tm-gallery"><br>
				<!-- gallery page 1 -->
				<div id="tm-gallery-page-promo" class="tm-gallery-page container">
				<?php $no = 0; foreach($buku as $row): 
					$harga = number_format($row->harga);
					?>
                    <article class="col s12 offset-s1 m6 l4 xl3 tm-gallery-item">
						<!-- <a href=""> -->
							<figure class="card purple lighten-4" style="min-height: 900px; max-height: 900px;">
								<div class="card-image">
									<!-- <img src="<?php echo base_url('assets/images/') . $row->foto; ; ?>" style="height: 350px;"> -->
									<a href="<?php echo base_url('pesanan/add/' . $row->id); ?>">
										<img src="<?php echo base_url('assets/images/') . $row->foto; ; ?>" alt="Image" class="img-fluid tm-gallery-img" style="height: 350px;" />
									</a>
									<!-- Modal Structure -->
									<!-- <div id="modal7" class="modal">
										<div class="modal-content purple lighten-2 white-text">
											<h4 style="font-size: 1.5rem;">Konfirmasi Tambah Keranjang</h4>
										</div>
										<div class="modal-content">
											<p style="font-size: 1.2rem;">Jumlah buku "<?php echo $row->judul; ?>" yang kamu beli:</p>
											<p style="font-size: 1.2rem;">Apakah kamu yakin?</p>
										</div>
										<div class="modal-footer">
											<a href="<?php echo base_url('pesanan/add/' . $row->id); ?>" class="modal-close waves-effect waves-green btn-flat">Yakin</a>
											<a href="" class="modal-close waves-effect waves-green btn-flat">Tidak Jadi</a>
										</div>
									</div> -->
									<figcaption class="container">
										<h3 class="tm-gallery-title"><?php echo $row->judul; ?></h3>
										<h4 class="tm-gallery-resto"><?php echo $row->pengarang; ?></h4>
										<p class="tm-gallery-description"><?php echo $row->deskripsi; ?><br><br><span style="color:red;">Stok Buku: <?php echo $row->stock; ?></span><br><br><span style="color:blue;">(Ketuk gambar untuk membeli)</span></p>
										<p class="tm-gallery-price">Rp. <?php echo $harga; ?></p>
										<!-- <a href="#">Klik untuk membeli</a> -->
										<!-- <div class="col s12 m12 l12 left-align">
											<a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
										</div> -->
									</figcaption>
								</div>
							</figure>
						<!-- </a> -->
					</article>
                <?php endforeach; ?>
				</div> <!-- gallery page 1 -->
				<div class="tm-section tm-container-inner">
					<div class="row">
						<div class="col s11 right-align">
							<div class="tm-description-box"> 
								<!-- <h4 class="tm-gallery-title">Maecenas nulla neque</h4>
								<p class="tm-mb-45">Redistributing this template as a downloadable ZIP file on any template collection site is strictly prohibited. You will need to <a rel="nofollow" href="https://templatemo.com/contact">talk to us</a> for additional permissions about our templates. Thank you.</p> -->
								<a href="#" class="btn waves-effect waves-light btn-primary btn-pill purple lighten-2">See more</a>
							</div>
						</div>
					</div>
				</div>
            </div>