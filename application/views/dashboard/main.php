        <div>
            <h2 class="col-12 text-center tm-section-title"><b><i>Temukan buku untukmu disini!</i></b></h2>
			<p class="col-12 text-center" style="font-size:16px;">Hidup lebih mudah dengan kami yang menyediakan <b style="color:red;">863.891</b><br>buku yang tersedia dari <b style="color:red;">39.456</b> pengarang dari seluruh dunia</p><br>
        </div>

        <!-- Gallery -->
			<div class="row tm-gallery"><br>
				<div id="tm-gallery-page-promo" class="tm-gallery-page container">
				<?php $no = 0; foreach($buku as $row): 
					$harga = number_format($row->harga,2,',','.');
					?>
                    <article class="col s12 offset-s1 m6 l3 tm-gallery-item">
						<!-- <a href=""> -->
							<figure class="card purple lighten-4" style="min-height: 900px; max-height: 900px;">
								<div class="card-image">
									<!-- <img src="<?php echo base_url('assets/images/') . $row->foto; ; ?>" style="height: 350px;"> -->
									<a href="<?php echo base_url('pesanan/add/' . $row->id); ?>">
										<img src="<?php echo base_url('assets/images/') . $row->foto; ; ?>" alt="Image" class="img-fluid tm-gallery-img" style="height: 350px;" />
									</a>

									<figcaption class="container text-center">
										<h3 class="tm-gallery-title"><b><?php echo $row->judul; ?></b></h3>
										<h4 class="tm-gallery-resto"><?php echo $row->pengarang; ?></h4>
										<p class="tm-gallery-description left-align"><?php echo $row->deskripsi; ?>
										<p style="color:red; font-size:17px;">Stok Buku: <?php echo $row->stock; ?></p>
										<p style="color:blue;">(Ketuk gambar untuk membeli)</p></p>
										<p style="font-size:19px;" class="tm-gallery-price"><b>Rp<?php echo $harga; ?></b></p>
									</figcaption>
								</div>
							</figure>
					</article>
                <?php endforeach; ?>
				</div>
				<div class="tm-section tm-container-inner">
					<div class="row">
						<div class="col s11 right-align">
							<div class="tm-description-box"> 
								<a href="#" class="btn waves-effect waves-light btn-primary btn-pill purple lighten-2">See more</a>
							</div>
						</div>
					</div>
				</div>
            </div>