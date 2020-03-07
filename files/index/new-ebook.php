<section class="faculty-area section-gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h1>Ebook Terbaru</h1>
						<p>
							Mau tau dan baca buku ebook terbaru liat di bawah ini
						</p>
					</div>
				</div>
			</div>
				 <div class="row justify-content-center d-flex align-items-center">
						 	<?php 
						$querySelectData = mysqli_query($link, "SELECT * FROM ebook ORDER BY id_ebook DESC LIMIT 4");
						while ($getData = mysqli_fetch_array($querySelectData)) {
							$allTeks = $getData['sinopsis'];
							$cutTeks = substr($allTeks, 0, 90);
							
						
					 ?>
					<div class="col-lg-3 col-md-6 col-sm-12 single-faculty">
						<div class="thumb d-flex justify-content-center">
							<img class="img-fluid" src="assets/gambar/<?= $getData['gambar']; ?>" alt="">
						</div>
						<div class="meta-text text-center">
							<h4><?= $getData['judul'] ?></h4>
							<p class="designation"><?= $getData['penulis'] ?></p>
							<div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".1s">
									<?= $cutTeks ?>...
								</p>
							</div>
						<div class="align-items-center justify-content-center d-flex">
							<a href="detail?kategori=<?= $getData['kategori'] ?>&id_ebook=<?= $getData['id_ebook'] ?>"><button class="btn btn-primary btn btn-sm">Explore Ebook</button></a>
						</div>
						</div>
					</div>
					<?php } ?>
				</div>
		</div>
	</section>