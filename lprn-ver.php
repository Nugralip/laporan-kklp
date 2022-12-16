<?php 
  include 'koneksi.php';
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}

  // if (isset($_POST['tambah'])) {
  //   $nama = $_POST['nama'];
  //   $harga = $_POST['harga'];
  //   $fasilitas = $_POST['fasilitas'];
    
  //   $query = "('','$nama', '$harga','$fasilitas')";
  //   if (tambah("kelas", $query) == 1) {
  //     echo "<script>
  //             alert('data berhasil ditambahkan');
  //             document.location.href ='laporan.php';
  //         </script>";
  //   } else {
  //     echo "<script>
  //             alert('data gagal ditambahkan');
  //             document.location.href ='harga.php';
  //         </script>";
  //   }
  // }
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "hapus"){
        $id=$_GET['id'];
        if (hapus('lprn','id_laporan',$id) == 1) {
          echo "<script>
                  alert('data berhasil dihapus');
                  document.location.href ='laporan.php';
              </script>";
        } else {
          echo "<script>
                  alert('data gagal dihapus');
                  document.location.href ='laporan.php';
              </script>";
        }
    }
    else if($_GET['pesan'] == "confir"){
          $id=$_GET['id'];
          if (update('lprn',"status='konfirm' WHERE id_laporan=".$id) == 1) {
            echo "<script>
                    alert('data berhasil dikonfirmasi');
                    document.location.href ='lprn-ver.php';
                </script>";
          } else {
            echo "<script>
                    alert('data gagal dikonfirmasi');
                    document.location.href ='lprn-ver.php';
                </script>";
          }
      }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>KKLP - Dashboard</title>
    
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
                  <li class="active">
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

                <!-- search form -->
                <!-- <div class="search-form">
                  <form action="index.html" method="get">
                    <div class="input-group input-group-sm" id="input-group-search">
                      <input type="text" autocomplete="off" name="query" id="search-input" class="form-control" placeholder="Search..." />
                      <div class="input-group-append">
                        <button class="btn" type="button">/</button>
                      </div>
                    </div>
                  </form>
                  <ul class="dropdown-menu dropdown-menu-search">

                    <li class="nav-item">
                      <a class="nav-link" href="index.html">Morbi leo risus</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.html">Dapibus ac facilisis in</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.html">Porta ac consectetur ac</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.html">Vestibulum at eros</a>
                    </li>

                  </ul>

                </div> -->

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
                <div class="row" style="background-color:white;">
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <h3 class="m-5">Tabel Laporan</h3>
                            </td>
                            <td align="right">
                                <a href="laporan.php" class="btn btn-danger mr-5">Kembali</a>
                            </td>
                            
                        </tr>
                    </table>
                    
                    <table class="table table-bordered m-5">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Stb</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat KKLP</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Tanggal</th>
                        <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                          $no=1;
                          $laporan = mysqli_query($koneksi,"SELECT * FROM lprn INNER JOIN mahasiswa ON lprn.id_mahasiswa = mahasiswa.id_mahasiswa WHERE lprn.status = 'send' ");
                          while($data = mysqli_fetch_array($laporan)): ?>
                        <tr>
                        <th scope="col"><?= $no++; ?></th>
                        <th scope="col"><?= $data['stb']; ?></th>
                        <th scope="col"><?= $data['nama'];?></th>
                        <th scope="col"><?= $data['tempat_kklp']; ?></th>
                        <th scope="col"><?= $data['isi']; ?></th>
                        <th scope="col"><?= $data['tgl']; ?></th>
                        <th class="text-center">
                          <a href="laporan.php?pesan=confir&&id=<?= $data['id_laporan'];?>" onclick="return confirm('yakin ingin konfirmasi laporan?')" class="btn btn-info mb-1"><i class="mdi mdi-checkbox-multiple-marked-outline"></i></a>
                          <a href="laporan.php?pesan=hapus&&id=<?= $data['id_laporan'];?>" onclick="return confirm('yakin ingin hapus data?')" class="btn btn-danger mb-1"><i class="mdi mdi-beaker"></i></a>
                        </th>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                    </table>
                  </div>  
        </div>
          
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
