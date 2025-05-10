<!DOCTYPE html>
<?php
include "config/database.php";
$id=$_GET['id_pemesanan'];
$data=$connection->query("select * from pemesanan where id_pemesanan='$id'");
$isi=$data->fetch_array(MYSQLI_BOTH) ;
$kode=$isi['kode_pemesanan'];
$tglp=$isi['tanggal_pemesanan'];
$tempat=$isi['tempat_pemesanan'];
$tujuan=$isi['tujuan'];
$tglb=$isi['tanggal_berangkat'];
$cekin=$isi['jam_cekin'];
$cekot=$isi['jam_berangkat'];
$total=$isi['total_bayar'];
$valid=$isi['valid'];



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
        <a class="navbar-brand brand-logo" href="halaman_admin.php">
          <img src="images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="halaman_admin.php">
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
            <a class="nav-link" href="halaman_admin.php">
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
                  <a class="nav-link" href="daftar_jadwal-admin.php">Daftar Jadwal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="daftar_pemesan.php">Daftar Pemesan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="daftar_hak_akses.php">Daftar Hak Akses</a>
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
          <div class="">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Pemesanan</h4>

                  <form class="forms-sample" method="post" action="proses_pemesanan-edit.php">
                    <div class="form-group">
                      <label>ID</label>
                      <input type="text" readonly="readonly"name="id_pemesanan" value="<?php echo $id ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Kode Pemesanan</label>
                      <input type="text" readonly="readonly" name="kode_pemesanan" value="<?php echo $kode ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Pemesanan</label>
                      <input type="date" readonly="readonly" name="tanggal_pemesanan" value="<?php echo $tglp ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tempat Pemesanan</label>
                      <input type="text" readonly="readonly" name="tempat_pemesanan" value="<?php echo $tempat ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tujuan</label>
                      <div>
                      <?php
                        include "config/database.php";
                        $result = mysqli_query($connection,"select * from rute");
                        $jsArray = "var prdName = new Array();\n";
                        echo '
                        <select class="form-control" name="tujuan" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">
                        <option>-- Pilih Tujuan Baru --</option>';
                        while ($row = mysqli_fetch_array($result))
                        {
                        echo '
                        <option value="' . $row['tujuan'] . '">' . $row['tujuan'] . '</option>';
                        $jsArray .= "prdName['" . $row['tujuan'] . "'] = '" . addslashes($row['harga']) . "';\n";
                        }
                        echo
                       '</select>';
                      ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Tanggal Berangkat</label>
                      <input type="date" name="tanggal_berangkat" value="<?php echo $tglb ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Jam Check In</label>
                      <input type="time" readonly="readonly"name="jam_cekin" value="<?php echo $cekin ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Jam Berangkat</label>
                      <input type="time" name="jam_berangkat" value="<?php echo $cekot ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Harga</label>
                      <input class="form-control" type="text" readonly="readonly" class="form-control" name="total_bayar" id="prd_name" autofocus>
                       <script type="text/javascript">
                        <?php
                           echo $jsArray;
                         ?>
                       </script>
                    </div>

                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="valid">
                      <option><?php echo $valid ?></option>
                      <option>Verify</option>
                    </select>
                    </div>


                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>







        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
