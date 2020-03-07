<?php 

	session_start();	
	include '../auth/config.php';

	$kategori = htmlspecialchars($_GET['kategori']);
	$queryId = mysqli_query($link, "SELECT * FROM ebook WHERE kategori = '$kategori'");
	$resultId = mysqli_fetch_array($queryId);

	// $selectData = mysqli_query($link, "SELECT * FROM ebook ORDER BY id_ebook DESC LIMIT 1");
	// $getData = mysqli_fetch_array($selectData);

	// $selectAllData = mysqli_query($link, "SELECT * FROM ebook");
	// $getAllData = mysqli_fetch_array($selectAllData);

	if (!$resultId['kategori']) {
		header("Location: ../index");
	}




	//Pagination

	$halaman = 8; //batasan halaman
	$page = isset($_GET['p'])? htmlspecialchars($_GET["p"]):1;
	$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
	$sql = mysqli_query($link, "SELECT * FROM ebook WHERE kategori = '$kategori'");
	$total = mysqli_num_rows($sql);
	$pages = ceil($total / $halaman); 


 ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="../vendor/img/smkn5.jpg">
	<!-- Author Meta -->
	<meta name="author" content="ItsZami - www.codecrime.net">
	<!-- Meta Description -->
	<meta name="description" content="E- Perpus merupakan kumpulan berbagai macam ebook yang bisa anda download kapanpun">
	<!-- Meta Keyword -->
	<meta name="keywords" content="E- Perpus SMKN5 Kota Bekasi">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->

	<!--
			Google Font
			============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">

	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="../vendor/css/linearicons.css">
	<link rel="stylesheet" href="../vendor/css/font-awesome.min.css">
	<link rel="stylesheet" href="../vendor/css/bootstrap.css">
	<link rel="stylesheet" href="../vendor/css/magnific-popup.css">
	<link rel="stylesheet" href="../vendor/css/nice-select.css">
	<link rel="stylesheet" href="../vendor/css/animate.min.css">
	<link rel="stylesheet" href="../vendor/css/owl.carousel.css">
	<link rel="stylesheet" href="../vendor/css/main.css">
	<title>Category - <?= ucwords($resultId['kategori']); ?></title>
	<style type="text/css">
		.pagination{
			padding: 10px;
			background-color: #E6E6FA;
			margin: none;
			border-radius: 0px; 
			color: black; 
			text-decoration: none;
			border-radius: none;

		}
	</style>
	
</head>

<body>

	<!-- Start Header Area -->
	<header id="header">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a  style="color: white; align-items: center; display: flex;" href="index.html"><img src="vendor/img/logo2.png" alt="" title="" /><div style="line-height: 30px;">E-Perpus SMK Negeri 5</div></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<?php if (isset($_SESSION['loginAdmin'])): ?>
							<li><a href="superadmin"></a>Dashboard</li>
						<?php endif ?>
						<li class="menu-active"><a href="index">Home</a></li>
						<li><a href="ebook">E-book</a></li>
						<li><a href="contact">Contact</a></li>
						<?php if (isset($_SESSION['loginUsers']) OR isset($_SESSION['loginAdmin'])): ?>
							<li><a href="#"><?= $_SESSION['username']; ?></a></li>
							<li><a href="logout" onclick="return confirm('Apakah anda yakin ingin logout?')">Logout</a></li>
						<?php endif ?>
						<?php if (!isset($_SESSION['username'])): ?>
							<li><a href="login">Login</a></li>
						<?php endif ?>
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header>
	<!-- End Header Area -->


	<!-- Start Banner Area -->
	<section class="home-banner-area relative">
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-center">
				<div class="banner-content col-lg-8 col-md-12">
					<h2 class="text-white">Kategori - <?= ucwords(strtolower($resultId['kategori'])); ?></h2>
					<?php if (isset($_GET['p'])): ?>
						<h2 class="text-white">Page <?= $_GET['p'] ?></h2>
					<?php endif ?>
					<?php if (isset($_GET['search'])): ?>
						<?php $search = htmlspecialchars($_GET['search']); ?>
						<h5 class="text-white">Hasil Pencarian : <?= $search ?></h5>
					<?php endif ?>
					<div class="input-wrap">
						<form action="" method="get" class="form-box d-flex justify-content-between">
							<input id="search" type="text" required="" placeholder="Search Ebook" class="form-control" name="search" minlength="3"autocomplete="off">
							<button type="submit" class="btn search-btn">Search</button>
						</form>
					</div>
					
					<h4 class="text-white">Kategori Ebook Terpopuler</h4>

					<div class="courses pt-20">
						<?php 

							$sql = mysqli_query($link, "SELECT kategori, count(kategori) AS jumlah FROM ebook GROUP BY kategori ORDER BY jumlah DESC LIMIT 8");
							while ($resSql = mysqli_fetch_array($sql)) {
								
							

						 ?>

						 <a href="<?= $resSql['kategori'] ?>" data-wow-duration="1s" data-wow-delay=".3s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown"><?= $resSql['kategori'] ?></a>

						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="rocket-img">
			<img src="../vendor/img/rocket.png" alt="">
		</div>
	</section>
	<!-- End Banner Area -->

	<section class="faculty-area section-gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h1>Ebook Terbaru</h1>
						<p>
							Mau tau dan baca buku ebook terbaru liat di bawah ini tentang kategori <b><?= $resultId['kategori']; ?></b>
						</p>
					</div>
				</div>
			</div>
				<div class="row justify-content-center d-flex align-items-center">
						 	<?php 
						
						 	if (isset($_GET['search'])) {
						 		$search = htmlspecialchars($_GET['search']);
						 		$kategori = $_GET['kategori'];
						 		$data = mysqli_query($link, "SELECT * FROM ebook WHERE kategori = '$kategori' AND judul LIKE '%$search%' OR penulis LIKE '%$search%'");
						 	}else{
						 		$data = mysqli_query($link, "SELECT * FROM ebook WHERE kategori = '$kategori' LIMIT $mulai, $halaman");
						 	}


						while ($resultId = mysqli_fetch_array($data)) {
							$allTeks = $resultId['sinopsis'];
							$cutTeks = substr($allTeks, 0, 90);
							
						
					 ?>
					<div class="col-lg-3 col-md-6 col-sm-12 single-faculty">
						<div class="thumb d-flex justify-content-center">
							<img class="img-fluid" src="../assets/gambar/<?= $resultId['gambar']; ?>" alt="">
						</div>
						<div class="meta-text text-center">
							<h4><?= $resultId['judul'] ?></h4>
							<p class="designation"><?= $resultId['penulis'] ?></p>
							<div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".1s">
									<?= $cutTeks ?>...
								</p>
							</div>
						<div class="align-items-center justify-content-center d-flex">
							<a href="../detail?kategori=<?= $resultId['kategori'] ?>&id_ebook=<?= $resultId['id_ebook'] ?>"><button class="btn btn-primary btn btn-sm">Explore Ebook</button></a>
						</div>
						</div>
					</div>
					<?php } ?>
				</div>				
			</div>
		</div>
	</section>
	<div class=" justify-content-center d-flex align-items-center">
		<?php for ($i=1; $i <= $pages; $i++) : ?>
			<a class="pagination" href="?p=<?= $i ?>"><?= $i ?></a>
		<?php endfor; ?>
	</div>

<footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="contact">Contact</a></li>
						<li><a href="ebook">E-Books</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Resources</h4>
					<ul>
						<li><a href="https://github.com/zamisyh">Github</a></li>
						<li><a href="https://infotech401.blogspot.com">Blogger</a></li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-6 single-footer-widget">
					<h4>Newsletter</h4>
					<p>You can trust us. we only send promo offers,</p>
					<div class="form-wrap" id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
						 method="get" class="form-inline">
							<input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
							 required="" type="email">
							<button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
							<div style="position: absolute; left: -5000px;">
								<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
							</div>

							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-bottom row align-items-center">
				<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i> by Zamzam Saputra
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				<div class="col-lg-4 col-md-12 footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-dribbble"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer Area -->

	<!-- ####################### Start Scroll to Top Area ####################### -->
	<div id="back-top">
		<a title="Go to Top" href="#"></a>
	</div>
	<!-- ####################### End Scroll to Top Area ####################### -->

	<script src="../vendor/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="../vendor/js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="../vendor/js/easing.min.js"></script>
	<script src="../vendor/js/hoverIntent.js"></script>
	<script src="../vendor/js/superfish.min.js"></script>
	<script src="../vendor/js/jquery.ajaxchimp.min.js"></script>
	<script src="../vendor/js/jquery.magnific-popup.min.js"></script>
	<script src="../vendor/js/owl.carousel.min.js"></script>
	<script src="../vendor/js/owl-carousel-thumb.min.js"></script>
	<script src="../vendor/js/jquery.sticky.js"></script>
	<script src="../vendor/js/jquery.nice-select.min.js"></script>
	<script src="../vendor/js/parallax.min.js"></script>
	<script src="../vendor/js/waypoints.min.js"></script>
	<script src="../vendor/js/wow.min.js"></script>
	<script src="../vendor/js/jquery.counterup.min.js"></script>
	<script src="../vendor/js/mail-script.js"></script>
	<script src="../vendor/js/main.js"></script>

	<script src="../assets/libs/vendor/bootstrap-validate/bootstrap-validate.js"></script>

    <!-- Bootstrap Validate Main -->
    <script>
        
        bootstrapValidate('#search', 'min:3:Masukkan nama minimal 3 huruf');

    </script>
</body>
</html>
