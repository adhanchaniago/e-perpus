<?php 
    
    session_start();
    // include '../auth/sessions.php';
    include '../auth/config.php';
    include '../auth/sessions.php';

    //SetUsernameForEbook

    $id = $_SESSION['session_id'];

    $queryEbook = mysqli_query($link, "SELECT * FROM ebook WHERE session_id = '$id'");
    $dataArrEbook = array();
    while (( $rowEbook = mysqli_fetch_array($queryEbook)) !== null) {
        $dataArrEbook[] = $rowEbook;
    }

    $countTotalEbookReport = count($dataArrEbook);


    //Terakhir Di Upload
    $queryTerakhirDiUpload = mysqli_query($link, "SELECT * FROM ebook WHERE session_id = '$id' ORDER BY id_ebook DESC");
    $dataArrTD = mysqli_fetch_array($queryTerakhirDiUpload);

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

    if (isset($_POST['submit']) === true) {
       $judul = htmlspecialchars($_POST['judul']);
       $kategori = htmlspecialchars($_POST['kategori']);
       $tebal_halaman = htmlspecialchars($_POST['tebal_halaman']);
       $penulis = htmlspecialchars($_POST['penulis']);
       $bahasa = htmlspecialchars($_POST['bahasa']);
       $nama_upload = htmlspecialchars($_POST['nama_upload']);
       $sinopsis = $_POST['sinopsis'];

       //GetIdEbook
       $id_ebook = $_POST['id_ebook'];



       $queryUpdate = mysqli_query($link, "UPDATE ebook SET judul = '$judul', sinopsis = '$sinopsis', kategori = '$kategori', tebal_halaman = '$tebal_halaman', penulis = '$penulis', bahasa = '$bahasa', nama_upload = '$nama_upload' WHERE id_ebook = '$id_ebook'");

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

<body>
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
                                    <h2 class="title-1">Laporan Anda</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2><?= number_format($countTotalEbookReport); ?></h2>
                                                <span>Ebook Diupload</span>
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
                                                <h4 style="color: white;"><?= $dataArrTD['judul'] ?> - <?= $dataArrTD['penulis'] ?></h4>
                                                <span>Terakhir Diupload</span>
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
                                <?php if (isset($success)): ?>
                                    <div class="alert alert-success"><i class="fa fa-check"></i> Data Berhasil di edit</div>
                                <?php endif ?>
                                <?php if (isset($error)): ?>
                                    <div class="alert alert-danger"><i class="fa fa-error"></i> Data gagal di edit</div>
                                <?php endif ?>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="ebook table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Tebal</th>
                                                <th>Penulis</th>
                                                <th>Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                                $no = 1;
                                                $resEbook = mysqli_query($link, "SELECT * FROM ebook WHERE session_id = '$id' ORDER BY id_ebook DESC");
                                                while ($rowEbook = mysqli_fetch_array($resEbook)) {
                                                    
                                             ?>
                                            <tr>
                                               <td><?= $no; ?></td> 
                                               <td><a style="color: black; " href="../detail?kategori=<?= $rowEbook['kategori'] ?>&id_ebook=<?= $rowEbook['id_ebook']; ?>"><?= $rowEbook['judul']; ?></a></td>
                                               <td><a style="color: black;" href="../category/<?= $rowEbook['kategori']; ?>"><?= $rowEbook['kategori']; ?></a></td>
                                               <td><?= $rowEbook['tebal_halaman']; ?></td>
                                               <td><?= $rowEbook['penulis']; ?></td>
                                               <td>
                                                   <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailAndEdit<?= $rowEbook['id_ebook'] ?> "><i class="fa fa-info-circle"></i> Detail</a>
                                                   <a href="delete?id_ebook=<?= $rowEbook['id_ebook'] ?>&session_id=<?= $rowEbook['session_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus ebook ini?')"><i class="fa fa-trash"></i> Delete</a>
                                               </td>
                                            </tr>

                                            <?php $_GET['id_ebook'] = true; ?>

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


     <!-- Modal Detail And Edit -->

     <?php 

        $no = 1;
        $resEbook = mysqli_query($link, "SELECT * FROM ebook WHERE session_id = '$id' ORDER BY id_ebook DESC");
        while ($rowEbook = mysqli_fetch_array($resEbook)) {
                                                    
    ?>

    <div class="modal fade" id="detailAndEdit<?= $rowEbook['id_ebook'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailAndEditLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailAndEditLabel">Edit Ebook - <?= $rowEbook['judul'] ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
            <div class="form-group">
                <input type="hidden" name="id_ebook" value="<?= $rowEbook['id_ebook']; ?>">
            </div>
            <div class="form-group">
                <label for="judul">Judul</label>
                <div class="input-group">
                    <input type="text" id="judul" name="judul" value="<?= $rowEbook['judul'] ?>" class="form-control" required="" minlength="4" autocomplete="off" autofocus="">
                </div>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <div class="input-group">
                   <select name="kategori" id="kategori" class="form-control" required="">
                       <option value="<?= $rowEbook['kategori'] ?>"><?= ucwords($rowEbook['kategori']) ?></option>
                       <option disabled="">---------------</option>
                       <option value="development">Development</option>
                       <option value="it-sofware">IT & Sofware</option>
                       <option value="hacking">Hacking</option>
                       <option value="bussines">Bussines</option>
                       <option value="novel">Novel</option>
                       <option value="social-science">Social Science</option>
                       <option value="data-science">Data Science</option>
                       <option value="design">Design</option>
                       <option value="marketing">Marketing</option>
                       <option value="economics">Economics</option>
                       <option value="robotics">Robotics</option>
                       <option value="out-category">DLL</option>
                   </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tebal_halaman">Tebal Halaman</label>
                <div class="input-group">
                    <input type="number" id="tebal_halaman" name="tebal_halaman" value="<?= $rowEbook['tebal_halaman'] ?>" class="form-control" required="" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis</label>
                <div class="input-group">
                   <input type="text" name="penulis" id="penulis" class="form-control" required="" autocomplete="off" value="<?= $rowEbook['penulis'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bahasa">Bahasa</label>
                <div class="input-group">
                    <select name="bahasa" id="bahasa" class="form-control" required="">
                        <option value="<?= $rowEbook['bahasa'] ?>">Bahasa <?= $rowEbook['bahasa'] ?></option>
                        <option disabled="">---------------</option>
                        <option value="Inggris">Bahasa Inggris</option>
                        <option value="Indonesia">Bahasa Indonesia</option>
                        <option value="Melayu">Bahasa Melayu</option>
                        <option value="Jepang">Bahasa Jepang</option>
                        <option value="China">Bahasa China</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_upload">Diupload Oleh</label>
                <div class="input-group">
                   <input type="text" name="nama_upload" id="nama_upload" class="form-control" required="" autocomplete="off" value="<?= $rowEbook['nama_upload'] ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis</label>
                <div class="input-group">
                   <textarea name="sinopsis" id="sinopsis" class="form-control" required="" rows="5"><?= $rowEbook['sinopsis'] ?></textarea>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
        </div>
    </form>
</div>
</div>
</div>
<?php } ?>

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

    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#sinopsis' ) )
    .catch( error => {
        console.error( error );
    } );
</script>


</body>

</html>
<!-- end document-->
