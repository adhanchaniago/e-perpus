<?php 
    
    session_start();
    // include '../auth/sessions.php';
    include '../auth/config.php';
    include '../auth/sessions.php';

    //Hitung User Online
    $queryUsersOnline = mysqli_query($link, "SELECT * FROM users WHERE aktif = 'online'");
    $dataArrUsersOnline = array();
    while (( $dataUsersOnline = mysqli_fetch_array($queryUsersOnline)) !== null) {
        $dataArrUsersOnline[] = $dataUsersOnline;
    }

    $countUsersOnline = count($dataArrUsersOnline);

    //Hitung Register
    $queryUsersRegister = mysqli_query($link, "SELECT * FROM users");
    $dataArrUsersRegister = array();
    while (( $dataUsersRegister = mysqli_fetch_array($queryUsersRegister)) !== null) {
        $dataArrUsersRegister[] = $dataUsersRegister;
    }

    $countUsersRegister = count($dataArrUsersRegister);

    //Hitung Total Ebook
    $queryTotalEbook = mysqli_query($link, "SELECT * FROM ebook");
    $dataArrTotalEbook = array();
    while (( $dataTotalEbook = mysqli_fetch_array($queryTotalEbook)) !== null) {
        $dataArrTotalEbook[] = $dataTotalEbook;
    }

    $countTotalEbook = count($dataArrTotalEbook);

    //Hitung Top Category
    $queryTopCategory = mysqli_query($link, "SELECT kategori, count(kategori) AS jumlah FROM ebook GROUP BY kategori ORDER BY jumlah DESC");
    $rowData = mysqli_fetch_array($queryTopCategory);

   
    // //Hash Url 
    // require_once '../hashids/lib/Hashids/HashGenerator.php';
    // require_once '../hashids/lib/Hashids/Hashids.php';

    // $hash = new Hashids\Hashids('this is my salt', 10, 'abcdefghijklmno123456789');

    

    
    

    


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="E-Perpus - Admin Dashboard">
    <meta name="author" content="ItsZami - www.codecrime.net">
    <meta name="keywords" content="E- Perpus Admin">
    <link rel="icon" href="../vendor/img/smkn5.jpg">

    <!-- Title Page-->
    <title>E- Perpus - Admin Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="../assets/libs/css/font-face.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../assets/libs/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../assets/libs/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../assets/libs/css/theme.css" rel="stylesheet" media="all">

    <!-- HighChart CSS -->
</head>

<body class="animsition">
    <div class="page-wrapper">

        <?php include 'files/navbar.php'; ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-info"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../vendor/img/smkn5.jpg" alt="admin" />
                                                </div>
                                                <div class="content">
                                                    <p>Welcome admin <?= $_SESSION['username']; ?></p>
                                                    <span>Zamzam - Superadmin</span>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../vendor/img/smkn5.jpg" alt="<?= $_SESSION['username']; ?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $_SESSION['username']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../vendor/img/smkn5.jpg" alt="<?= $_SESSION['username']; ?>" />
                                                    </a>
                                                </div>
                                                
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?= $_SESSION['username']; ?></a>
                                                    </h5>
                                                    <span class="email"><?= $_SESSION['email']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dasboard</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2><?= number_format($countUsersRegister); ?></h2>
                                                <span>Users Register</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2><?= number_format($countUsersOnline); ?></h2>
                                                <span>Member Online</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <!-- <div class="icon">
                                                <i class="zmdi zmdi-bug"></i>
                                            </div> -->
                                            <div class="text">
                                                <h2><?= number_format($countTotalEbook); ?></h2>
                                                <span>Total Ebook</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <!-- <div class="icon">
                                                <i class="zmdi zmdi-info-outline"></i>
                                            </div> -->
                                            <div class="text">
                                                <h2><?= ucwords($rowData['kategori']) ?></h2>
                                                <span>Top Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Ebook</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="ebook table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Tebal</th>
                                                <th>Penulis</th>
                                                <th>Diupload Oleh</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                                $no = 1;
                                                $resEbook = mysqli_query($link, "SELECT * FROM ebook ORDER BY id_ebook DESC");
                                                while ($rowEbook = mysqli_fetch_array($resEbook)) {
                                                    
                                             ?>
                                            <tr>
                                               <td><?= $no; ?></td> 
                                               <td><a style="color: black; " href="../detail?kategori=<?= $rowEbook['kategori'] ?>&id_ebook=<?= $rowEbook['id_ebook']; ?>"><?= $rowEbook['judul']; ?></a></td>
                                               <td><a style="color: black;" href="../category/<?= $rowEbook['kategori']; ?>"><?= $rowEbook['kategori']; ?></a></td>
                                               <td><?= $rowEbook['tebal_halaman']; ?></td>
                                               <td><?= $rowEbook['penulis']; ?></td>
                                               <td><?= $rowEbook['nama_upload']; ?></td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Member Online</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="ebook table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>No Handphone</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                                $no = 1;
                                                $resUsers = mysqli_query($link, "SELECT * FROM users");
                                                while ($rowUsers = mysqli_fetch_array($resUsers)) {
                                                    
                                             ?>
                                            <tr>
                                               <td><?= $no; ?></td> 
                                               <td><?= $rowUsers['username']; ?></td>
                                               <td><?= $rowUsers['email']; ?></td>
                                               <td><?= $rowUsers['no_hp']; ?></td>
                                                   <?php if ($rowUsers['aktif'] === 'online'): ?>
                                                       <td style="color: green;">Online</td>
                                                   <?php endif ?>
                                                   <?php if ($rowUsers['aktif'] === 'offline'): ?>
                                                       <td style="color: red;">Offline</td>
                                                   <?php endif ?>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 E-Perpus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../assets/libs/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../assets/libs/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../assets/libs/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../assets/libs/vendor/slick/slick.min.js">
    </script>
    <script src="../assets/libs/vendor/wow/wow.min.js"></script>
    <script src="../assets/libs/vendor/animsition/animsition.min.js"></script>
    <script src="../assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../assets/libs/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../assets/libs/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../assets/libs/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/libs/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../assets/libs/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../assets/libs/js/main.js"></script>

     <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.ebook').DataTable();
        } );
    </script>



</body>

</html>
<!-- end document-->
