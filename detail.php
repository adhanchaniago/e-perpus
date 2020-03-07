<?php 
	
	session_start();
	error_reporting(0);
	include 'auth/config.php';
	
	$id = $_GET['id_ebook'];
	$kategori = $_GET['kategori'];

	$getData = mysqli_query($link, "SELECT * FROM ebook WHERE id_ebook = '$id' AND kategori = '$kategori'");
	$resData = mysqli_fetch_array($getData);

	//View Pdf
	$pdfDb = $resData['file'];
	$file = "assets/files-pdf/$pdfDb";
    $pNum=1;


	//Cut Teks
	$allTeks = $resData['sinopsis'];
	$cutTeks = substr($allTeks, 0, 200);
	$cutTeksDescription = substr($allTeks, 80);

	if (empty($id)) {
		header("Location: index");
	}

	if (!$resData['id_ebook']) {
		header("Location: index");
	}




 ?>

 <!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="vendor/img/smkn5.jpg">
	<!-- Author Meta -->
	<meta name="author" content="Zamzam Saputra">
	<!-- Meta Description -->
	<meta name="description" content="<?= $cutTeksDescription ?>">
	<meta property="og:image" content="assets/gambar/<?= $resData['gambar'] ?>">
	<!-- Meta Keyword -->
	<meta name="keywords" content="Ebook">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title><?= $resData['judul'] ?></title>

	<!--
			Google Font
			============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">

	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="vendor/css/linearicons.css">
	<link rel="stylesheet" href="vendor/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/css/bootstrap.css">
	<link rel="stylesheet" href="vendor/css/magnific-popup.css">
	<link rel="stylesheet" href="vendor/css/nice-select.css">
	<link rel="stylesheet" href="vendor/css/animate.min.css">
	<link rel="stylesheet" href="vendor/css/owl.carousel.css">
	<link rel="stylesheet" href="vendor/css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<?php include 'files/globals/navbar.php'; ?>
	<!-- End Header Area -->


	<!-- Start Banner Area -->
	<section class="banner-area relative">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						<?= $resData['judul']; ?>
					</h1>
					<p><?= $cutTeks; ?>...</p>
					<div class="link-nav">
						<span class="box">
							<a href="index">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="">Details <?= $resData['judul'] ?></a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="rocket-img">
			<img src="img/rocket.png" alt="">
		</div>
	</section>
	<!-- End Banner Area -->


	<!-- Start About Area -->
	<section class="about-area section-gap">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-5 col-md-6 about-left">
					<img class="img-fluid" src="assets/gambar/<?= $resData['gambar'] ?>" alt="">
				</div>
				<div class="offset-lg-1 col-lg-6 offset-md-0 col-md-12 about-right">
					<h1>
						<?= $resData['judul'] ?>
					</h1>
					<div class="wow fadeIn" data-wow-duration="1s">
						<strong style="color: red;">Sinopsis Lengkap</strong><br><br>
						<p>
							<?= $resData['sinopsis'] ?>
						</p>
					</div>
					<?php if (isset($_SESSION['loginUsers']) OR isset($_SESSION['loginAdmin'])): ?>
						<a href="assets/files-pdf/<?= $resData['file'] ?>" class="primary-btn">Download</a>
					<?php endif ?>
					<?php if (!isset($_SESSION['loginUsers'])): ?>
						<?php if (!isset($_SESSION['loginAdmin'])): ?>
							<a href="login" class="primary-btn">Login Untuk Download</a>
						<?php endif ?>
					<?php endif ?>

					
				</div>
			</div>
		</div>
	</section>
	<!-- End About Area -->


	<div class="col-md-12" style="margin-top: -50px;">
            <div class="card">
              <div class="card-header" style="background: #483D8B;">
                <strong class="card-title" v-if="headerText" style="color: white;">Detail - <?= $resData['judul'] ?></strong>
           	 </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped table-align-middle mb-0">
                  <thead>
                    <th style="color: black;">Nama</th>
                    <th style="color: black;">Detail</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Judul</td>
                        <td><?= $resData['judul'] ?></td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td><?= $resData['penulis'] ?></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td><a href="category/<?= $resData['kategori'] ?>"><?= $resData['kategori'] ?></a></td>
                    </tr>
                    <tr>
                        <td>Tebal</td>
                        <td><?= $resData['tebal_halaman'] ?> Halaman</td>
                    </tr>
                    <tr>
                        <td>Bahasa</td>
                        <td><?= $resData['bahasa'] ?></td>
                    </tr>
                    <tr>
                        <td>Diupload Oleh</td>
                        <td><?= $resData['nama_upload'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        <br>
        <br>

	<!-- Start Footer Area -->
	<?php include 'files/globals/footer.php' ?>
</body>

</html>