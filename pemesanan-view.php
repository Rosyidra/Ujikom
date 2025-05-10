<?php
    include "config/database.php";
    $execute = $connection->query("SELECT * FROM pemesanan");
    $total = mysqli_num_rows($execute);
    $no=0;
?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ticket Online</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <?php
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="halaman_penumpang.php">
          <img src="images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="halaman_penumpang.php">
          <img src="images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">

        <ul class="navbar-nav navbar-nav-right">


          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, <?php echo $_SESSION['username']; ?></span>
              <img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

              <a class="dropdown-item mt-2">
                Profile
              </a>
              <a href="logout.php" class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="images/faces/face1.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION['username']; ?></p>
                  <div>
                    <small class="designation text-muted"><?php echo $_SESSION['level']; ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>

            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="halaman_penumpang.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Daftar Menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="daftar_jadwal-penumpang.php">Daftar Jadwal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pesan_tiket.php">Pesan Tiket</a>
                </li>

              </ul>
            </div>
          </li>

          </li>
        </ul>
      </nav>
      <!-- partial -->

        <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="panel-heading">Daftar Pemesan
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a class="btn btn-xs-primary btn-default pull-right"></a>
                        <a href="daftar_pemesan.php" class="btn btn-xs-primary btn-default pull-right">Kembali </a><br><br>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr style="background-color: grey">
                              <th>
                                <h6>Subjek</h6>
                              </th>
                              <th>
                                <h6>Objek</h6>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php
                            $id = $_GET['id_pemesanan'];
                            $data=$connection->query("select * from pemesanan where id_pemesanan='$id'");


                            while ($isi=$data->fetch_array(MYSQLI_BOTH)){

                            echo'
                          <tr>
                            <th scope="row"> ID </th>

                            <td>'.$isi["id_pemesanan"].'</td>
                          </tr>
                          <tr>
                            <th scope="row"> Kode Pemesanan </th>

                            <td>'.$isi["kode_pemesanan"].'</td>
                          </tr>
                          <tr>
                            <th scope="row"> Tanggal Pemesanan </th>

                            <td>'.$isi["tanggal_pemesanan"].'</td>
                          </tr>
                          <tr>
                            <th scope="row"> Tempat Pemesanan </th>

                            <td>'.$isi["tempat_pemesanan"].'</td>
                          </tr>
                          <tr>
                            <th scope="row"> Tujuan </th>

                            <td>'.$isi["tujuan"].'</td>
                          </tr>
                          <tr>
                            <th scope="row"> Tanggal Pemberangkatan  </th>

                            <td>'.$isi["tanggal_berangkat"].'</td>
                            <tr>
                              <th scope="row"> Jam Check In </th>

                              <td>'.$isi["jam_cekin"].'</td>
                            </tr>
                          </tr>
                          <tr>
                            <th scope="row"> Jam Check Out </th>

                            <td>'.$isi["jam_berangkat"].'</td>
                          </tr>
                          <tr>
                            <th scope="row"> Total Pembayaran </th>

                            <td>'.$isi["total_bayar"].'</td>
                          </tr>
                          <tr>
                            <th scope="row"> Status </th>

                            <td>'.$isi["valid"].'</td>
                          </tr>

                            ';}?>
                        </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
            <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
            <i class="mdi mdi-heart text-danger"></i>
          </span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->
</body>

</html>
