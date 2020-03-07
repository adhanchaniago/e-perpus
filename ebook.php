<?php 

	session_start();
	include 'auth/config.php';
	$selectData = mysqli_query($link, "SELECT * FROM ebook ORDER BY id_ebook DESC LIMIT 1");
	$getData = mysqli_fetch_array($selectData);

	$selectAllData = mysqli_query($link, "SELECT * FROM ebook");
	$getAllData = mysqli_fetch_array($selectAllData);


	//Pagination

	$halaman = 8; //batasan halaman
	$page = isset($_GET['p'])? htmlspecialchars($_GET["p"]):1;
	$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
	$sql = mysqli_query($link, "SELECT * FROM ebook");
	$total = mysqli_num_rows($sql);
	$pages = ceil($total / $halaman); 


 ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<?php include 'files/globals/head-link.php'; ?>
	<title>E-Perpus SMKN5 Kota Bekasi</title>
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

	<?php include 'files/globals/navbar.php'; ?>


	<!-- Start Banner Area -->
	<section class="home-banner-area relative">
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-center">
				<div class="banner-content col-lg-8 col-md-12">
					<?php if (isset($_GET['p'])): ?>
						<h2 class="text-white">Page <?= $_GET['p'] ?></h2>
					<?php endif ?>
					<?php if (isset($_GET['search'])): ?>
						<?php $search = htmlspecialchars($_GET['search']); ?>
						<h5 class="text-white">Hasil Pencarian : <?= $search ?></h5>
					<?php endif ?>
					<div class="input-wrap">
						<form action="" method="get" class="form-box d-flex justify-content-between">
							<input type="text" placeholder="Search Ebook" class="form-control" name="search">
							<button type="submit" class="btn search-btn">Search</button>
						</form>
					</div>
					
					<h4 class="text-white">Kategori Ebook Terpopuler</h4>

					<div class="courses pt-20">
						<?php 

							$sql = mysqli_query($link, "SELECT kategori, count(kategori) AS jumlah FROM ebook GROUP BY kategori ORDER BY jumlah DESC LIMIT 8");
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
						
						 	if (isset($_GET['search']) === true) {
						 		$search = htmlspecialchars(strip_tags($_GET['search']));
						 		$data = mysqli_query($link, "SELECT * FROM ebook WHERE judul LIKE '%$search%' OR penulis LIKE '%$search%' OR nama_upload LIKE '%$search%'");
						 	}else{
						 		$data = mysqli_query($link, "SELECT * FROM ebook LIMIT $mulai, $halaman");
						 	}


						while ($getData = mysqli_fetch_array($data)) {
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
		</div>
	</section>
	<div class=" justify-content-center d-flex align-items-center">
		<?php for ($i=1; $i <= $pages; $i++) : ?>
			<a class="pagination" href="?p=<?= $i ?>"><?= $i ?></a>
		<?php endfor; ?>
	</div>

<?php include 'files/globals/footer.php'; ?>
</body>
</html>