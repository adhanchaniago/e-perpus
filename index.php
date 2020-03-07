<?php 

	session_start();
	include 'auth/config.php';
	$selectData = mysqli_query($link, "SELECT * FROM ebook ORDER BY id_ebook DESC LIMIT 1");
	$getData = mysqli_fetch_array($selectData);

	$selectAllData = mysqli_query($link, "SELECT * FROM ebook");
	$getAllData = mysqli_fetch_array($selectAllData);

	


 ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<?php include 'files/globals/head-link.php'; ?>
	<title>E-Perpus SMKN5 Kota Bekasi</title>

	
</head>

<body>

	<?php include 'files/globals/navbar.php'; ?>


	<!-- Start Banner Area -->
	<section class="home-banner-area relative">
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-center">
				<div class="banner-content col-lg-8 col-md-12">
					<h1 class="wow fadeIn" data-wow-duration="4s">Selamat Datang <br> Di E- Perpus SMK Negeri 5 Kota Bekasi</h1>
					<p class="text-white">
						E- Perpus adalah perpustakaan online SMKN5 Kota Bekasi, anda bisa mencari ebook dan request berbagai macam ebook sesuai kebutuhan anda
					</p>

					<!-- <div class="input-wrap">
						<form action="" class="form-box d-flex justify-content-between">
							<input type="text" placeholder="Search Ebook" class="form-control" name="search-query">
							<button type="submit" class="btn search-btn">Search</button>
						</form>
					</div> -->
					<br>
					<br>
					<h4 class="text-white">Kategori Ebook Terpopuler</h4>

					<div class="courses pt-20">
						<?php 

							$sql = mysqli_query($link, "SELECT kategori, count(kategori) AS jumlah FROM ebook GROUP BY kategori ORDER BY jumlah DESC LIMIT 6");
							while ($resSql = mysqli_fetch_array($sql)) {
								
							

						 ?>

						 <a href="category/<?= $resSql['kategori'] ?>" data-wow-duration="1s" data-wow-delay=".3s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?= $resSql['kategori'] ?></a>

						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="rocket-img">
			<img src="vendor/img/rocket.png" alt="">
		</div>
	</section>
	<!-- End Banner Area -->


	<!-- Start About Area -->
	<?php include 'files/index/about.php'; ?>
	<!-- End About Area -->


	<!-- Start Courses Area -->
	<section class="courses-area section-gap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5 about-right">
					<h1>
						Kenapa Lebih <br> Memilih E-Book Disini?
					</h1>
					<div class="wow fadeIn" data-wow-duration="1s">
						<p>
							Karena ebook disini banyak sekali berbagai macam ebook, anda bisa mencarinya dengan kategori yang sudah kami sediakan, selain itu anda juga bisa request berbagai macam ebook.
						</p>
					</div>
					<!-- <a href="courses.html" class="primary-btn white">Explore Courses</a> -->
				</div>
				<div class="offset-lg-1 col-lg-6">
					<div class="courses-right">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<ul class="courses-list">
									<li>
										<a class="wow fadeInLeft" href="category/development" data-wow-duration="1s" data-wow-delay=".1s">
											<i class="fa fa-book"></i> Development
										</a>
									</li>
									<li>
										<a class="wow fadeInLeft" href="category/it-sofware" data-wow-duration="1s" data-wow-delay=".3s">
											<i class="fa fa-book"></i> IT & Software
										</a>
									</li>
									<li>
										<a class="wow fadeInLeft" href="category/hacking" data-wow-duration="1s" data-wow-delay=".7s">
											<i class="fa fa-book"></i> Hacking
										</a>
									</li>
									<li>
										<a class="wow fadeInLeft" href="category/bussines" data-wow-duration="1s" data-wow-delay=".9s">
											<i class="fa fa-book"></i> Bussines
										</a>
									</li>
									<li>
										<a class="wow fadeInLeft" href="category/novel" data-wow-duration="1s" data-wow-delay="1.1s">
											<i class="fa fa-book"></i> Novel
										</a>
									</li>
									<li>
										<a class="wow fadeInLeft" href="category/social-science" data-wow-duration="1s" data-wow-delay="1.2s">
											<i class="fa fa-book"></i> Social Science
										</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<ul class="courses-list">
									<li>
										<a class="wow fadeInRight" href="category/data-science" data-wow-duration="1s" data-wow-delay="1.3s">
											<i class="fa fa-book"></i> Data Science
										</a>
									</li>
									<li>
										<a class="wow fadeInRight" href="category/design" data-wow-duration="1s" data-wow-delay="1.1s">
											<i class="fa fa-book"></i> Design
										</a>
									</li>
									<li>
										<a class="wow fadeInRight" href="category/marketing" data-wow-duration="1s" data-wow-delay=".5s">
											<i class="fa fa-book"></i> Marketing
										</a>
									</li>
									<li>
										<a class="wow fadeInRight" href="category/economics" data-wow-duration="1s" data-wow-delay=".3s">
											<i class="fa fa-book"></i> Economics
										</a>
									</li>
									<li>
										<a class="wow fadeInRight" href="category/robotics" data-wow-duration="1s" data-wow-delay=".4s">
											<i class="fa fa-book"></i> Robotics
										</a>
									</li>
									<li>
										<a class="wow fadeInRight" href="category/out-category" data-wow-duration="1s" data-wow-delay=".5s">
											<i class="fa fa-book"></i> Out Category
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Courses Area -->


	<!--Start Feature Area -->
	<section class="feature-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h1>Keunggulan Kami</h1>
						<p>
							E-book yang kita sajikan berisi tentang banyak macam kategori seperti bussines, it-sofware, arduino, coding dll. anda bisa download sepuasnya sesuai E-Book yang kalian minati.
						</p>
					</div>
				</div>
			</div>
			<div class="feature-inner row">
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="ti-book"></i>
						<h4>E-book</h4>
						<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".1s">
							<p>
								Menyediakan banyak macam E-Book untuk kebutuhan sehari" anda dan juga tersedia E-Book yang berisi materi pelajaran Produktif.
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="ti-help"></i>
						<h4>Requests E-book</h4>
						<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
							<p>
								Selain menyediakan ebook, kalian juga bisa requests Ebook, jika anda ingin requests anda bisa chat kami di page (contact).
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="ti-medall-alt"></i>
						<h4>Concept Design</h4>
						<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".5s">
							<p>
								Dengan web yang di desain dengan baik, sehingga para pembaca tidak mudah bosan untuk mendownload dan membaca di website kami
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="ti-key"></i>
						<h4>Lifetime Access</h4>
						<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".1s">
							<p>
								Dengan fitur lifetime anda bisa download dan baca E-Book kapanpun dan di manapun
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="ti-files"></i>
						<h4>File Included</h4>
						<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
							<p>
								Materi yang kita sediakan hanyalah E-book bukan buku dsb, anda juga bisa menjadi admin yang bertugas untuk berbagi E-book
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="ti-headphone-alt"></i>
						<h4>Live Support</h4>
						<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".5s">
							<p>
								Dengan layanan yang fast response, kalian bisa chat melalui whatsapp admin yang sudah di sisipkan di page (contact).
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Feature Area -->


	<!-- Start Faculty Area -->
	<?php include 'files/index/new-ebook.php' ?>
	<!-- End Faculty Area -->


	<!-- Start Testimonials Area -->
	<section class="testimonials-area section-gap">
		<div class="container">
			<div class="testi-slider owl-carousel" data-slider-id="1">
				<div class="item">
					<div class="testi-item">
						<h4>Ryundra Putra Pradhana</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								Web ini sangat bagus dan berguna terutama untuk siswa dan siswi SMK Negeri 5 Kota Bekasi, karna memudahkan untuk membaca sehingga kita dapat membaca dimanapun dan kapan pun.
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-item">
						<h4>Muhammad Andrew Bima</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								Terus kembangkan Web ini, agar lebih bermanfaat lagi nantinya
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-item">
						<h4>Ahmad Miqo</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								Web yang sangat bagus, semoga saya bisa membuat web seperti ini. Bagi yang membuat web diharapkan selalu tingkatkan sampai tingkat internasional.
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-item">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel
								across her face <br> and She is the host to your journey.
							</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<!-- End Testimonials Area -->


	<!-- Start Footer Area -->
	<?php include 'files/globals/footer.php'; ?>
</body>

</html>