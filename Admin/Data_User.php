<?php
    session_start();
    include '../koneksi.php';
    if ($_SESSION['status'] != "login") {
        header("Location:../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data User</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed" style="background: #ecf0f1">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: #009966">
            &nbsp<h2 style="color: white;"><STRONG>SMPN 52 Bekasi</STRONG></h2>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form action="Data_User.php" method="GET" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="pencarian" />
                    <?php
                        include "../koneksi.php";
                        if(isset($_GET['pencarian'])){
                        $cari = $_GET['pencarian'];
                        }
                    ?>
                </div>
            </form>
            <!-- Navbar-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                             <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link collapsed" href="#" style="background-color: #009966; color: white;" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> 
                            <a class="nav-link collapsed" href="Data_Ruangan.php"  data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Data Ruangan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="Data_Kegiatan.php" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Data Kegiatan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="Data_Kegiatan_menunggu.php" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Kegiatan Menunggu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="Data_Kegiatan_Sebelumnya.php" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Kegiatan Sebelumnya
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseReport" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Laporan Data Jadwal Kegiatan</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Laporan Data Ruangan</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Logout</div>
                            <a class="nav-link" href="Logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Aplikasi:</div>
                        Pengelolaan Jadwal Kegiatan & Ruangan
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data User</h1>
                        <ol class="breadcrumb mb-4" style="background: #bdc3c7;">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data User</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               <div class="table-responsive">
                                <a href="Tambah_user.php" type="submit" class="btn btn-outline-success mb-1"><i class="fas fa-plus"></i>Tambah Data</a>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <tr class="text-white" align="center" style="background: #009966">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Email</th>
                                                <th>Tingkatan</th>
                                                <th colspan="2">Optiont</th>
                                            </tr>
                        <?php 
                        // include "../koneksi.php";
                        // $no= "";
                        // $query_mysqli = mysqli_query($conn,"SELECT * FROM tb_login")or die(mysqli_error());
                        // while($data = mysqli_fetch_array($query_mysqli)){
                        //     $no++;
                        ?>

                    <?php
                      $queryAdmin = "SELECT * FROM tb_login";
                      if(isset($_GET['pencarian'])){
                          $cari = $_GET['pencarian'];
                          $cariData = mysqli_query($conn,"SELECT * FROM tb_login WHERE nama LIKE '%".$cari."%' 
                          OR username LIKE '%".$cari."%' OR tingkatan LIKE '%".$cari."%' "); //cari cuma 1 data
                          
                          // $cariData = mysqli_query($koneksi,"SELECT * FROM admin 
                          //   WHERE username LIKE '%".$cari."%' OR password LIKE  '%".$cari."%' ORDER BY id");    
                      }                      
                      else{
                          $cariData = mysqli_query($conn, $queryAdmin);  
                      }

                      $no = "";
                      while($data = mysqli_fetch_array($cariData)){
                      $no++;

                      //data master
                        $nama = $data['nama'];
                        $username = $data['username'];
                        $email = $data['email'];
                    ?>
                                            <tr align="center">
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['username']; ?></td>
                                                <td>*****</td>
                                                <td><?php echo $data['email']; ?></td>
                                                <td><?php echo $data['tingkatan']; ?></td>
                                                <td width="30">
                                                    <a class="edit" href="ubah_user.php?id=<?php echo $data['id']; ?>">
                                                        <div class="sb-nav-link-icon btn btn-outline-primary"><i class="fas fa-edit"></i>Edit</div>
                                                    </a></td>
                                                <td width="30">
                                                <form method='GET'>
                                                    <a onclick="return confirm('Yakin Ingin Menghapus Data Ini?...')" class="hapus" href="hapus_user.php?id=<?php echo $data['id']; ?>">
                                                        <div class="sb-nav-link-icon btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Hapus</div>
                                                    </a>
                                                </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-transparent mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Aplikasi Pengelolaan Jadwal Kegiatan & Ruangan 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>