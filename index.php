<?php
    session_start();
    date_default_timezone_set("Asia/Bangkok");
    $date_now = date("Y-m-d");

    // $getdate = mysqli_query($conn, "SELECT * FROM tb_kegiatan WHERE registerend>");
    //jika kosong tidak tampil
    // $jumlahdata = mysqli_num_rows($getdate);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard - Indx</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed" style="background: #ecf0f1">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: #009966; ">
            <a class="navbar-brand" href="index.php"><h2><STRONG>SMPN 52 Bekasi</STRONG></h2></a> 
            <!-- Navbar Search-->
            <div class="collapse navbar-collapse" id="navbarNav">

            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                   <a href="login.php"><div class="sb-nav-link-icon text-white"><i class="fas fa-user"></i> Login</div></a>
            </ul>
        </nav>
        <div id="layoutSidenav">
            
                    </div>
                    <div class="sb-sidenav-footer bg-dark mt-2">
                        <div class="small">Aplikasi:</div>
                        Pengelolaan Jadwal Kegiatan & Ruangan
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="jumbotron jumbotron-fluid text-white mb-0 mt-3 p-2" style="background: #009966;">
                            <div class="container text-center">
                                <h1 class="display-4 mb-0"><b><?php date_default_timezone_set('Asia/Jakarta'); echo date('H:i');?></b></h1>
                                <h4 class="lead mb-1"><?php echo date('l, M - d - Y');?></h4>
                                <div class="text-white mt-0"><i class="fas fa-bell fa-lg"></i></div>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="table-responsive small">
                                    <h4 class="text-center" style="font-family: Cambria;">
                                        Daftar Jadwal Kegiatan
                                    </h4>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <tr class="text-dark" align="center" style="background: #bdc3c7;">
                                                <th>No</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Nama ruanagan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Tanggal Kegiatan</th>
                                                <th>Waktu Mulai</th>
                                                <th>Waktu Selesai</th>
                                                <th>Kapasitas</th>
                                                <th>Jenis</th>
                                            </tr>
                                            <?php 
                                            include "koneksi.php";
                                            $no= "";
                                            $query_mysqli = mysqli_query($conn,"SELECT * FROM tb_kegiatan WHERE tgl>='$date_now'")or die(mysqli_error());
                                            while($data = mysqli_fetch_assoc($query_mysqli)){
                                            $no++;
                                            ?>
                                            <tr class="text-dark" align="center" style="background: #fff">
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['kegiatan']; ?></td>
                                                <td><?php echo $data['nama_ruangan']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['tgl']; ?></td>
                                                <td><?php echo $data['wtk_mulai']; ?></td>
                                                <td><?php echo $data['wtk_selesai']; ?></td>
                                                <td><?php echo $data['kapasitas']; ?> Orang</td>
                                                <td><?php echo $data['jenis']; ?></td>
                                            </tr>
                                        <?php }?>
                                    </table>

                                </div>
                            </div>
                            <div class="modal fade" id="modal_pj" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        </div>
                </main>
            </div>
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
