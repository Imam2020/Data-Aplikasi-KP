
<?php
    session_start();
    include '../koneksi.php';
    if ($_SESSION['status'] != "login") {
        header("Location:../login.php");
    }

    $tanda = mysqli_query($conn, "SELECT * from tb_login");
    $row = mysqli_fetch_array($tanda);

    date_default_timezone_set("Asia/Bangkok");
    $date_now = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
    <head>/>
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed" style="background: #ecf0f1">
        <nav class="sb-topnav navbar navbar-expand navbar-dark"  style="background: #009966;">
            &nbsp <h2 style="color: white;"><STRONG>SMPN 52 Bekasi</STRONG></h2>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="index.php" style="background-color: #009966; color: white;">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Main</div>
                            
                            <a class="nav-link collapsed" href="Data_Ruangan.php" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Data Ruangan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="Data_Kegiatan.php" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Data Kegiatan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="Data_Kegiatan_menunggu2.php" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Kegiatan Menunggu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="Data_Kegiatan_menunggu.php" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Pengajuan Kegiatan
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
                                <div class="sb-nav-link-icon" ><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer bg-dark">
                        <div class="small">Aplikasi:</div>
                        Pengelolaan Jadwal Kegiatan & Ruangan
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-2">Dashboard</h1>
                        <?php
                        include '../koneksi.php';
                        $datakegiatan = mysqli_query($conn, "SELECT * FROM tb_kegiatan WHERE tgl>='$date_now'");
                        // $dataruangan = mysqli_query($conn, "SELECT * from tb_ruangan");
                        // $dataanggota = mysqli_query($conn, "SELECT * from tb_login");

                        $dataruangan = mysqli_query($conn, "SELECT * from tb_ruangan");

                        $jumlahruangan = mysqli_num_rows($dataruangan);

                        $jumlahkegiatan = mysqli_num_rows($datakegiatan);
                        // $jumlahruangan = mysqli_num_rows($dataruangan);
                        // $jumlahanggota = mysqli_num_rows($dataanggota);
                        ?>
                        <div class="row">
                            <div class="col-xl-4 col-md-1">
                                <div class="card text-white mb-1">
                                    <div class="card-body pb-0" style="background: #009966;"><i class="fas fa-calendar-alt"></i> Data Kegiatan<br><h2><?php echo $jumlahkegiatan; ?></h2></div>

                                    <div class="card-footer bg-dark d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="Data_Kegiatan.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card text-white mb-1">
                                    <div class="card-body pb-0" style="background: #009966;"><i class="fas fa-door-open"></i> Data Ruangan<br><h2><?php echo $jumlahruangan; ?></h2></div>
                                    <div class="card-footer bg-dark d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="Data_Ruangan.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-4 col-md-6">
                                <div class="card text-white mb-1">
                                    <div class="card-body pb-0" style="background: #009966;"><i class="fas fa-user"></i> Data Anggota<br><h2><?php echo $jumlahanggota; ?></h2></div>
                                    <div class="card-footer bg-dark d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="Data_User.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                       
                    <div class="card-body">
                        
                    </div>
                        
                </main>
                <footer class="py-4 mt-auto bg-transparent">
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
