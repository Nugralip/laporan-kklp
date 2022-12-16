<?php 
  include 'koneksi.php';
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
  if (isset($_POST['mahasiswa'])) {

    $query = "id_jurusan = '".$_POST['jur']."', stb = '".$_POST['stb']."', nama = '".$_POST['nama']."', tempat_kklp = '".$_POST['tkklp']."' WHERE id_mahasiswa = '".$_POST['idm']."'";
    if (update("mahasiswa", $query) == 1) {
      echo "<script>
              alert('data berhasil diedit');
              document.location.href ='mahasiswa.php';
          </script>";
    } else {
      echo "<script>
              alert('data gagal diedit');
              document.location.href ='mahasiswa.php';
          </script>";
    }
  }

  if (isset($_POST['jurusan'])) {

    $query = "kd_jur = '".$_POST['kd']."', jurusan = '".$_POST['jurus']."' WHERE id_jurusan = '".$_POST['idj']."'";
    if (update("jurusan", $query) == 1) {
      echo "<script>
              alert('data berhasil diedit');
              document.location.href ='jurusan.php';
          </script>";
    } else {
      echo "<script>
              alert('data gagal diedit');
              document.location.href ='jurusan.php';
          </script>";
    }
  }

  if (isset($_POST['admin'])) {
    
    $query = "nama = '".$_POST['nama']."', username = '".$_POST['usernm']."', password = '".$_POST['password']."' WHERE id_admin = '".$_POST['ida']."'";
    if (update("admin", $query) == 1) {
      echo "<script>
              alert('data berhasil diedit');
              document.location.href ='user.php';
          </script>";
    } else {
      echo "<script>
              alert('data gagal diedit');
              document.location.href ='user.php';
          </script>";
    }
  }

  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "hapus"){
        $id=$_GET['id'];
        hapus('mahasiswa','id_mahasiswa',$id);
    }else if($_GET['pesan'] == "edit"){
      $id=$_GET['id'];

    }
  }


	?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Srikala - Dashboard</title>
    
  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
  
  
  
  
  <link href="plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
  
  
  
  <link href="plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  
  
  
  <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  
  
  
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  
  
  
  <link href="plugins/toaster/toastr.min.css" rel="stylesheet" />
  
  
  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />

  


  <!-- FAVICON -->
  <link href="images/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="plugins/nprogress/nprogress.js"></script>
</head>


  <body class="navbar-fixed sidebar-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    
    <div id="toaster"></div>
    

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/index.html">
                <img src="images/logo.png" alt="Mono">
                <span class="brand-name">KKLP</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                  <li>
                    <a class="sidenav-item-link" href="dashboard.php">
                      <i class="mdi mdi-briefcase-account-outline"></i>
                      <span class="nav-text">Dashboard</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="laporan.php">
                      <i class="mdi mdi-file-multiple"></i>
                      <span class="nav-text">Laporan</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="mahasiswa.php">
                      <i class="mdi mdi-account-group"></i>
                      <span class="nav-text">Mahasiswa</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="jurusan.php">
                      <i class="mdi mdi-book-open-variant"></i>
                      <span class="nav-text">Jurusan</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="user.php">
                      <i class="mdi mdi-account-edit"></i>
                      <span class="nav-text">Admin</span>
                    </a>
                  </li>
          </div>
        </aside>

      

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- Header -->
          <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <span class="page-title">dashboard</span>

              <div class="navbar-right ">

               

                <ul class="nav navbar-nav">
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="images/user/user-xs-01.jpg" class="user-image rounded-circle" alt="User Image" />
                      <span class="d-none d-lg-inline-block"><?php echo $_SESSION['username']; ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li>
                        <a class="dropdown-link-item" href="user-profile.html">
                          <i class="mdi mdi-account-outline"></i>
                          <span class="nav-text">My Profile</span>
                        </a>
                      </li>
                      <li class="dropdown-footer">
                        <a class="dropdown-link-item" href="logout.php"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>

        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        
        <div class="content-wrapper">
          <div class="content">              
                  <!-- Top Statistics -->
                <?php 
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "mahasiswa"){
                            $mahasiswa = cari('mahasiswa', 'id_mahasiswa='.$_GET['id']);
                            while($mhs = mysqli_fetch_array($mahasiswa)):
                            ?>
                            <form class="bg-white p-5" method="POST" action="edit.php">
                                <h2 class="mb-2">Edit Mahasiswa</h2>
                                <input type="hidden" name="idm" value="<?= $mhs['id_mahasiswa'] ?>">
                                <div class="input-group mb-3">
                              <input type="number" name="stb" class="form-control" value="<?= $mhs['stb']; ?>" placeholder="STB" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                              <input type="text" name="nama" class="form-control" value="<?= $mhs['nama']; ?>" placeholder="Nama" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                              <input type="text" name="tkklp" class="form-control" value="<?= $mhs['tempat_kklp']; ?>" placeholder="Tempat KKLP" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            
                            <div class="form-group mb-3">
                              <select name="jur" class="form-control" id="">
                                <?php
                                 $jurusan = cari('jurusan', 'id_jurusan='.$mhs['id_jurusan']);
                                 while($jur = mysqli_fetch_array($jurusan)):
                                ?>
                                <option value="<?= $jur['id_jurusan']; ?>" selected disabled><?= $jur['kd_jur']; ?></option>
                                
                              <?php endwhile;
                            $row = tampil('jurusan');
                            while ($vjur = mysqli_fetch_array($row)) :
                            ?>
                              <option value="<?= $vjur['id_jurusan'];?>"><?= $vjur['kd_jur'];?></option>
                              
                              <?php endwhile; ?>
                              </select>
                            </div>
                          <div class="modal-footer">
                            <a href="mahasiswa.php" class="btn btn-light btn-pill">Cancel</a>
                            <button type="submit" name="mahasiswa" class="btn btn-primary btn-pill">Edit</button>
                          </div>
                          </form>
                          <?php endwhile; ?>
                <?php
                        }else if($_GET['pesan'] == "jurusan"){
                        $ed = cari('jurusan','id_jurusan = '.$_GET['id']);
                        while($dj = mysqli_fetch_array($ed)):
                        ?>
                            <form action=" " method="POST" class="bg-white p-5">
                              <input type="hidden" value="<?= $dj['id_jurusan'] ?>" name="idj">
                            <div class="input-group mb-3">
                              <input type="text" name="kd" class="form-control" placeholder="Kode" aria-label="Username" aria-describedby="basic-addon1" value="<?= $dj['kd_jur'] ?>">
                            </div>
                            <div class="input-group mb-3">
                              <input type="text" name="jurus" class="form-control" placeholder="Jurusan" aria-label="Username" aria-describedby="basic-addon1" value="<?= $dj['jurusan'] ?>">
                            </div>
                          <div class="modal-footer">
                          <a href="jurusan.php" class="btn btn-light btn-pill">Cancel</a>
                            <button type="submit" name="jurusan" class="btn btn-primary btn-pill">Edit</button>
                          </div>
                          </form>
                        <?php
                          endwhile;
                        ?>

                    <?php
                        }else if($_GET['pesan'] == "admin"){

                        $data = cari('admin',"id_admin =".$_GET['id']);
                        while($ad = mysqli_fetch_array($data)){?>
                             <form action=" " method="POST" class="bg-white p-5">
                              <input type="hidden" value="<?= $ad['id_admin'] ?>" name="ida">
                            <div class="input-group mb-3">
                              <input type="text" name="nama" class="form-control" placeholder="Kode" aria-label="Username" aria-describedby="basic-addon1" value="<?= $ad['nama'] ?>">
                            </div>
                            <div class="input-group mb-3">
                              <input type="text" name="usernm" class="form-control" placeholder="Jurusan" aria-label="Username" aria-describedby="basic-addon1" value="<?= $ad['username'] ?>">
                            </div>
                            <div class="input-group mb-3">
                              <input type="password" name="password" class="form-control" placeholder="Jurusan" aria-label="Username" aria-describedby="basic-addon1" value="<?= $ad['password'] ?>">
                            </div>
                          <div class="modal-footer">
                            <a href="user.php" class="btn btn-light btn-pill">Cancel</a>
                            <button type="submit" name="admin" class="btn btn-primary btn-pill">Edit</button>
                          </div>
                          </form>
                    <?php }
                        }
                    }

                ?>
            
        </div>
        
          <!-- Footer -->
          <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a class="text-primary" href="http://www.iamabdus.com/" target="_blank" >Abdus</a>.
              </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

      </div>
    </div>



    
                    <script src="plugins/jquery/jquery.min.js"></script>
                    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="plugins/simplebar/simplebar.min.js"></script>
                    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

                    
                    
                    <script src="plugins/apexcharts/apexcharts.js"></script>
                    
                    
                    
                    <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
                    
                    
                    
                    <script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
                    <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
                    <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
                    
                    
                    
                    <script src="plugins/daterangepicker/moment.min.js"></script>
                    <script src="plugins/daterangepicker/daterangepicker.js"></script>
                    <script>
                      jQuery(document).ready(function() {
                        jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                          cancelLabel: 'Clear'
                        }
                      });
                        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                          jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                        });
                        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                          jQuery(this).val('');
                        });
                      });
                    </script>
                    
                    
                    
                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                    
 
                    <script src="js/mono.js"></script>
                    <script src="js/chart.js"></script>
                    <script src="js/map.js"></script>
                    <script src="js/custom.js"></script>
  </body>
</html>
