<?php 

	session_start();

 ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>

	<?php include 'files/globals/head-link.php'; ?>
	<title>Contact</title>
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
							Contact Us
					</h1>
					<p>In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of
						the space telescope.</p>
					<div class="link-nav">
						<span class="box">
							<a href="index">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="contact">Contact Us</a>
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

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<div class="row">
				<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
				<div class="col-lg-4 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-home"></span>
						</div>
						<div class="contact-details">
							<h5>Tegal Perintis</h5>
							<p>
								Jln. KH Muchtar Tabrani NO 37
							</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-phone-handset"></span>
						</div>
						<div class="contact-details">
							<h5><a href="https://api.whatsapp.com/send?phone=6289602362015">+62-896-0236-2015</a></h5>
							<p>Only Whatsapp (Fast Response)</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-envelope"></span>
						</div>
						<div class="contact-details">
							<h5>zamsyh.work@gmail.com</h5>
							<p>Send us your message anytime!</p>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
						<div class="row">
							<div class="col-lg-6 form-group">
								<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
								 class="common-input mb-20 form-control" required="" type="text">

								<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''"
								 onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

								<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'"
								 class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-6 form-group">
								<textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''"
								 onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
							</div>
							<div class="col-lg-12">
								<div class="alert-msg" style="text-align: left;"></div>
								<button class="primary-btn" style="float: right;">Send Message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- End contact-page Area -->

	<!-- Start Footer Area -->
	<?php include 'files/globals/footer.php'; ?>
</body>

</html>