<?php 

session_start();
include '../auth/sessions.php';
include '../auth/config.php';

$queryValidate = mysqli_query($link, "SELECT * FROM users");
$dataValidate = mysqli_fetch_array($queryValidate);

if (isset($_POST['submit']) === true) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $aktif = 'offline';
    $type = htmlspecialchars($_POST['type']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $session_id = session_id();
    
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $queryInsert = mysqli_query($link, "INSERT INTO users (id, session_id, username, email, no_hp, aktif, password, type) VALUES ('', '$session_id', '$username', '$email', '$no_hp', '$aktif', '$hash', '$type')");

    if (mysqli_affected_rows($link) > 0) {
        $success = true;
    }else{
        $error = true;
    }
}


?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="E-Perpus - Admin Dashboard">
    <meta name="author" content="ItsZami - www.codecrime.net">
    <meta name="keywords" content="E-Perpus">
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

    <!--  Toastr -->

    <link rel="stylesheet" type="text/css" href="../assets/libs/vendor/toastr/toastr.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/vendor/toastr/toastr.min.css">



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

</head>

<body class="animsition">
    <div class="page-wrapper">

       <?php include 'files/navbar.php'; ?>

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
                                        <div class="col-lg-12">
                                            <?php if (isset($success)): ?>
                                                <div class="alert alert-success">Data berhasil di tambahkan sebagai <?= $type; ?></div>
                                            <?php endif ?>
                                            <?php if (isset($error)): ?>
                                                <div class="alert alert-danger">Data gagal di tambahkan</div>
                                            <?php endif ?>
                                            <?php if ($_SESSION['type'] !== 'superadmin'): ?>
                                                <div class="alert alert-danger"><i class="fas fa-warning"></i> Access Blocked - Anda bukan Superadmin</div>
                                            <?php endif ?>
                                            <div class="form-group">
                                                <?php if ($_SESSION['type'] === 'superadmin'): ?>
                                                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#addReport">
                                                      Tambah Admin
                                                  </button>
                                              <?php endif ?>
                                              <?php if ($_SESSION['type'] !== 'superadmin'): ?>
                                                <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#errorReport">
                                                  Tambah Admin
                                              </button>
                                          <?php endif ?>
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

    <!-- Modal Add Report -->

    <div class="modal fade" id="addReport" tabindex="-1" role="dialog" aria-labelledby="addReportLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addReportLabel">Tambah Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group">
                    <input type="text" id="username" name="username" placeholder="Username..." class="form-control" required="" minlength="4" autocomplete="off" autofocus="">
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Email..." class="form-control" required="" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <div class="input-group">
                    <input type="number" id="no_hp" name="no_hp" placeholder="Nomor Hp" class="form-control" required="" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <div class="input-group">
                    <select name="type" id="type" name="type" class="form-control" required="">
                        <option value="users">Users</option>
                        <option value="admin">Admin</option>
                        <option value="superadmin">Superadmin</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" required="" autocomplete="off">
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
        </div>
    </form>
</div>
</div>
</div>


<!-- Modal Error Report -->

<div class="modal fade" id="errorReport" tabindex="-1" role="dialog" aria-labelledby="errorReportLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorReportLabel">Sorry - Access Blocked</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><i class="fas fa-warning"></i> Your Access Has Been Blocked</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


<!--- Modal Detail -->



<!-- Jquery JS-->
<script src="../assets/libs/vendor/jquery-3.2.1.min.js"></script>
<script src="../assets/libs/vendor/toastr/toastr.min.js"></script>

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
<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.client').DataTable();
    } );
</script> -->

<!-- <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#solusi' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
 -->
</body>

</html>
<!-- end document-->
