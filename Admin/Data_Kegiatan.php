<?php
    session_start();
    include "../koneksi.php";
    date_default_timezone_set("Asia/Bangkok");
    $date_now = date("Y-m-d");

    // $getdate = mysqli_query($conn, "SELECT * FROM tb_kegiatan WHERE registerend>");
    //jika kosong tidak tampil
    // $jumlahdata = mysqli_num_rows($getdate);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data Ruangan</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed" style="background: #ecf0f1">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: #009966">
            &nbsp <h2 style="color: white;"><STRONG>SMPN 52 Bekasi</STRONG></h2>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                </div>
            </form> -->
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
                            <a class="nav-link collapsed" href="Data_User.php" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> 
                            <a class="nav-link collapsed" href="Data_Ruangan.php"  data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Data Rungan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="#" style="background-color: #009966; color: white;" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
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
                            <a class="nav-link" href="../index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
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
                        <h1 class="mt-4">Data Kegiatan</h1>
                        <ol class="breadcrumb mb-4" style="background: #bdc3c7;">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Kegiatan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                       <div class="table-responsive">
                            
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <tr class="text-white" align="center" style="background: #009966">
                                                <th>No</th>
                                                <th>ID Ruangan</th>
                                                <th>Nama Ruangan</th>
                                                <th>Kegiatan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Tanggal kegiatan</th>
                                                <th>Waktu Mulai</th>
                                                <th>Waktu Selesai</th>
                                                <th>Kapasitas</th>
                                                <th>Jenis</th>
                                                <th>Option</th>
                                            </tr>
                        <?php 
                        $no= "";
                        $query_mysqli = mysqli_query($conn,"SELECT * FROM tb_kegiatan WHERE tgl>='$date_now'")or die(mysqli_error());
                        while($data = mysqli_fetch_assoc($query_mysqli)){
                            $no++;
                        ?>
                                            <tr align="center">
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['id_ruangan']; ?></td>
                                                <td><?php echo $data['nama_ruangan']; ?></td>
                                                <td><?php echo $data['kegiatan']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['tgl']; ?></td>
                                                <td><?php echo $data['wtk_mulai']; ?></td>
                                                <td><?php echo $data['wtk_selesai']; ?></td>
                                                <td><?php echo $data['kapasitas']; ?>  Orang</td>
                                                <td><?php echo $data['jenis']; ?></td>
                                                <td width="30">
                                                    <a onclick="return confirm('Yakin Ingin Menghapus Kegiatan Ini?...')" class="hapus" href="hapus_kegiatan.php?id=<?php echo $data['id']; ?>">
                                                        <div class="sb-nav-link-icon btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Hapus</div>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
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
