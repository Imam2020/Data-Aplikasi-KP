<?php
session_start();
include '../koneksi.php';

if(isset($_POST['tambah'])){
    mysqli_query($conn,"INSERT INTO tb_ruangan set
    id_ruangan = '$_POST[id_ruangan]',
    nama_ruangan = '$_POST[nama_ruangan]',
    lantai = '$_POST[lantai]',
    keterangan = '$_POST[keterangan]',
    kapasitas = '$_POST[kapasitas]',
    jenis = '$_POST[jenis]' ");


    header('location:Data_Ruangan.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data Ruangan</title>
        <link href="css/styles.css" rel="stylesheet" />

    </head>
    <body class="sb-nav-fixed" style="background: #ecf0f1">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: #009966">
            &nbsp<h2 style="color: white;"><STRONG>SMPN 52 Bekasi</STRONG></h2>
            
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
                            
                            <a class="nav-link collapsed" href="Data_Ruangan.php"  data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Data Ruangan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="Data_Kegiatan.php"  data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Data Kegiatan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="#" style="background-color: #009966; color: white;" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Kegiatan Menunggu
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
                        <h1 class="mt-4">Form Tambah Data Ruangan</h1>
                        <ol class="breadcrumb mb-4" style="background: #bdc3c7">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="Data_Ruangan.php">Data Ruangan</a></li>
                            <li class="breadcrumb-item active">Form Tambah Data Ruangan</li>
                        </ol>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Id Ruangan</label>
                                                        <input class="form-control" name="id_ruangan" type="text" placeholder="Masukan ID Ruangan" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Nama Ruangan</label>
                                                        <input class="form-control" name="nama_ruangan" type="text" placeholder="Masukan Nama Ruangan" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Lantai</label>
                                                        <input class="form-control" name="lantai" type="number" placeholder="Masukan Lantai Ruangan" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Keterangan</label>
                                                            <select class="form-control" name="keterangan">
                                                                <option>Pilih Keterangan</option>
                                                                <option value="Indoor">Indoor</option>
                                                                <option value="Outdoor">Outdoor</option>
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Kapasitas</label>
                                                            <input class="form-control" name="kapasitas" type="number" placeholder="Masukkan Jumlah Kapasitas Ruangan" required />
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Jenis</label>
                                                            <input class="form-control" name="jenis" type="text" placeholder="Masukkan Jenis Kegunaan Ruangan" required />
                                                        </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                            <div class="col-sm">
                                            <div class="form-group d-flex align-items-center justify-content-between mt-2 mb-0">
                                                <button type="submit" name="tambah" class="btn btn-success btn-block">TAMBAH</button>
                                                <!-- <input type="submit" class="btn btn-success btn-block" name="submit" value="INPUT"> -->
                                            </div>
                                        </div>
                                          <div class="col-sm">
                                            <div class="form-group d-flex align-items-center justify-content-between mt-2 mb-0">
                                               <a href="Data_Ruangan.php" type="submit" class="btn btn-danger btn-block">BATAL</a>

                                            </div>
                                        </div>
                                    </div>
                                        </form>
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
