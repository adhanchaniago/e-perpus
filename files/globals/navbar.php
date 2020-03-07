<!-- Start Header Area -->
	<header id="header">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a  style="color: white; align-items: center; display: flex;" href="index.html"><img src="vendor/img/logo2.png" alt="" title="" /><div style="line-height: 30px;">E-Perpus SMK Negeri 5</div></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-active"><a href="index">Home</a></li>
						<?php if (isset($_SESSION['loginAdmin'])): ?>
							<li><a href="superadmin">Dashboard</a></li>
						<?php endif ?>
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