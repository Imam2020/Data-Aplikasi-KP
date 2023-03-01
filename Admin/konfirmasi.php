<?php
    session_start();
    include "../koneksi.php";
?>
<?php
    if(isset($_POST['simpan'])){
        mysqli_query($conn, "INSERT INTO tb_kegiatan set
            id_ruangan = '$_POST[id_ruangan]',
            nama_ruangan = '$_POST[nama_ruangan]',
            kegiatan = '$_POST[kegiatan]',
            nama = '$_POST[nama]',
            tgl = '$_POST[tgl]',
            wtk_mulai = '$_POST[wtk_mulai]',
            wtk_selesai = '$_POST[wtk_selesai]',
            kapasitas = '$_POST[kapasitas]',
            jenis = '$_POST[jenis]'");
            // where id = '$_GET[id]'

        header("Location:Data_Kegiatan.php");

    }
    // function query($query){
    // global $conn;
    // $result = mysqli_query($conn, $query);
    // $datas = [];
    // while($data = mysqli_fetch_assoc($result)) {
    //     $datas[] = $data;
    // }
    //     return $datas;
    // }
    // $tbruangan = query("SELECT * FROM tb_ruangan")

    // $tbruangan = query("SELECT * FROM tb_ruangan WHERE id_ruangan1=$id_ruangan")
?>

<?php  
?>  

<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ubah Data User</title>
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
                            <a class="nav-link collapsed" href="Data_User.php" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> 
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
                            <a class="nav-link collapsed" href="Data_Kegiatan_menunggu.php" style="background-color: #009966; color: white;" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
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
                        <h1 class="mt-4">Form Konfirmasi Data Kegiatan</h1>
                        <ol class="breadcrumb mb-4" style="background: #bdc3c7">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="Data_Kegiatan_menunggu.php">Data Pengajuan Kegiatan</a></li>
                            <li class="breadcrumb-item active">Form Ubah Data Ruangan</li>
                        </ol>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                        <form method="POST">
<?php 
    $id =$_GET['id'];
    $query_mysqlis = mysqli_query($conn,"SELECT * FROM tb_pengajuan where id='$id'")or die(mysqli_error());
    while($mfa = mysqli_fetch_assoc($query_mysqlis))
    {
?>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Nama Ruangan</label>
                                                        <!-- <input class="form-control" name="id_ruangan" type="text" placeholder="Masukan ID Ruangan" required /> -->
                                                        <!-- <select name="nama_ruangan" class="form-control" onchange="changeValue(this.value)">
                                                        <option disabled="" selected="">Pilih</option> -->
                                                        <input class="form-control" name="nama_ruangan" type="text" value="<?php echo $mfa['nama_ruangan'] ?>" readonly />
                                                        <?php
    
                                                            // $query_ruangan = mysqli_query($conn,"SELECT * FROM tb_ruangan");
                                                            // $arrayjs = "let roomName = new Array();\n";

                                                            // while($row = mysqli_fetch_array($query_ruangan)){
                                                            //     echo "
                                                            //     <option value='".$row['nama_ruangan']."'>".$row['nama_ruangan']."</option>";
                                                            //     $arrayjs .= "roomName['" . $row['nama_ruangan'] . "'] = {id_ruangan:'" . addslashes($row['id_ruangan']) . "'};\n";
                                                            // }
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <input type="submit" class="btn btn-info" value="Pilih">
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">

                                                        <label class="small mb-1">ID Ruangan</label>
                                                        <input class="form-control" name="id_ruangan" type="text" value="<?php echo $mfa['id_ruangan'] ?>" readonly />

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Kegiatan</label>
                                                        <input class="form-control" name="kegiatan" type="text" value="<?php echo $mfa['kegiatan'] ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Nama Penanggung Jawab</label>
                                                        <input class="form-control" name="nama" type="text" value="<?php echo $mfa['nama'] ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Tanggal</label>
                                                            <input class="form-control" name="tgl" type="date" value="<?php echo $mfa['tgl'] ?>" readonly />
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Waktu Mulai</label>
                                                            <input class="form-control" name="wtk_mulai" type="text" value="<?php echo $mfa['wtk_mulai'] ?>" readonly />
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Waktu Selesai</label>
                                                            <input class="form-control" name="wtk_selesai" type="text" value="<?php echo $mfa['wtk_selesai'] ?>" readonly />
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <!-- <label class="small mb-1">Kapasitas</label>
                                                            <input class="form-control" name="kapasitas" type="number" placeholder="Masukan Kapasitas Ruangan"/ required> -->
                                                            <label class="small mb-1">Kapasitas</label>
                                                            <input class="form-control" name="kapasitas" type="text" value="<?php echo $mfa['kapasitas'] ?>" readonly />
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Jenis</label>
                                                            <input class="form-control" name="jenis" type="text" value="<?php echo $mfa['jenis'] ?>" readonly />
                                                        </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                            <div class="col-sm">
                                            <div class="form-group d-flex align-items-center justify-content-between mt-2 mb-0">
                                                <button type="submit" name="simpan" class="btn btn-success btn-block">SIMPAN</button>
                                                <!-- <input type="submit" class="btn btn-success btn-block" name="submit" value="INPUT"> -->
                                            </div>
                                        </div>
                                          <div class="col-sm">
                                            <div class="form-group d-flex align-items-center justify-content-between mt-2 mb-0">
                                               <a href="Data_Kegiatan_menunggu.php" type="submit" class="btn btn-danger btn-block">KEMBALI</a>

                                            </div>
                                        </div>
                                    </div>
                                        </form>
                                        <?php } ?>

<!-- <script type="text/javascript">    
        <?php echo $arrayjs; ?>  
        //     function changeValue(x){  
        //         document.getElementById('id_ruangan').value = roomName[x].id_ruangan;   
        // };  
</script>  -->

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