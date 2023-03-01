<?php
    session_start();
    include '../koneksi.php';
    if ($_SESSION['status'] != "login") {
        header("Location:../login.php");
    }

if(isset($_POST['tambah'])){
    mysqli_query($conn,"INSERT INTO tb_pengajuan set
    nama_ruangan = '$_POST[nama_ruangan]',
    id_ruangan = '$_POST[id_ruangan]',
    kegiatan = '$_POST[kegiatan]',
    nama = '$_POST[nama]',
    tgl = '$_POST[tgl]',
    wtk_mulai = '$_POST[wtk_mulai]',
    wtk_selesai = '$_POST[wtk_selesai]',
    kapasitas = '$_POST[kapasitas]',
    jenis = '$_POST[jenis]'");


    header('location:Data_Kegiatan_menunggu2.php');
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
                            <a class="nav-link collapsed" href="Data_Kegiatan_menunggu2.php" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Kegiatan Menunggu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="#" style="background-color: #009966; color: white;" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
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
                        <h1 class="mt-4">Form Pengajuan Kegiatan</h1>
                        <ol class="breadcrumb mb-4" style="background: #bdc3c7">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Pengajuan Kegiatan</li>
                        </ol>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Nama</label>
                                                        <input class="form-control" name="nama" type="text" placeholder="Masukan Nama Anda" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Kegiatan</label>
                                                        <input class="form-control" name="kegiatan" type="text" placeholder="Masukan Nama Kegiatan" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Nama Ruangan</label>
                                                        <!-- <input class="form-control" name="id_ruangan" type="text" placeholder="Masukan ID Ruangan" required /> -->
                                                        <select name="nama_ruangan" class="form-control" onchange="changeValue(this.value)">
                                                        <option disabled="" selected="">Pilih</option>

                                                        <?php
    
                                                            $query_ruangan = mysqli_query($conn,"SELECT * FROM tb_ruangan LEFT JOIN tb_pengajuan ON tb_ruangan.id_ruangan=tb_pengajuan.id_ruangan where tb_pengajuan.id_ruangan is null ");
                                                            $arrayjs = "let roomName = new Array();\n";

                                                            while($row = mysqli_fetch_array($query_ruangan)){
                                                                var_dump($row);
                                                                echo "
                                                                <option value='".$row[2]."'>".$row[2]."</option>";
                                                                $arrayjs .= "roomName['" . $row[2] . "'] = {id_ruangan:'" . addslashes($row[1]) . "', kapasitas:'" . addslashes($row[5]) . "'};\n";
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">

                                                        <label class="small mb-1">ID Ruangan</label>
                                                        <input class="form-control" id="id_ruangan" name="id_ruangan" type="text" placeholder="[Pilih Ruangan]" value="" readonly/>

                                                    </div>
                                                </div>
                                            </div>        
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Tanggal</label>
                                                        <input class="form-control" name="tgl" type="date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Waktu Mulai</label>
                                                            <input class="form-control" name="wtk_mulai" type="time" placeholder="Masukkan Jam Mulai Kegiatan" required />
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Waktu Selesai</label>
                                                            <input class="form-control" name="wtk_selesai" type="time" placeholder="Masukkan Jam Selesai Kegiatan" required />
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Kapasitas</label>
                                                            <input class="form-control" name="kapasitas" type="number" min="0" max="40" id="kapasitas" onkeyup="maxvalue(this)" placeholder="[Pilih Ruangan]" value="" readonly/>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Jenis</label>
                                                            <input class="form-control" name="jenis" type="text" placeholder="Masukan Nama Jenis Kegiatan" required />
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
                                        </form>

<script type="text/javascript">    
        <?php echo $arrayjs; ?>  
            function changeValue(x){  
                document.getElementById('id_ruangan').value = roomName[x].id_ruangan;
                document.getElementById('kapasitas').value = parseInt(roomName[x].kapasitas);
                console.log(roomName[x].kapasitas);
        };  
</script> 
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
        <script>
            function maxvalue(e){
                if(e.value>40){
                    console.log(e.value)
                    e.value="40"
                }
            }
        </script>
    </body>
</html>
