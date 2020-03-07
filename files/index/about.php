<section class="about-area section-gap">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-5 col-md-6 about-left">
					<img class="img-fluid" src="assets/gambar/<?= $getData['gambar']; ?>" alt="">
				</div>
				<div class="offset-lg-1 col-lg-6 offset-md-0 col-md-12 about-right">
					<h1>
						<div style="color: red;">New</div> <?= $getData['judul']; ?>
					</h1>
					<div class="wow fadeIn" data-wow-duration="1s">
						<p>
							<?php 

								$allTeks = $getData['sinopsis'];
								$cutTeks = substr($allTeks, 0, 200);

								echo $cutTeks."....";

							 ?>
						</p>
					</div>
					<a href="detail?kategori=<?= $getData['kategori'] ?>&id_ebook=<?= $getData['id_ebook'] ?>" class="primary-btn">Explore Ebook</a>
				</div>
			</div>
		</div>
	</section>