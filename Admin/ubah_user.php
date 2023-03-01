<?php
    session_start();
    include '../koneksi.php';
    if ($_SESSION['status'] != "login") {
        header("Location:../login.php");
    }
?>
<?php
    if(isset($_POST['simpan'])){
        mysqli_query($conn, "UPDATE tb_login set
            nama = '$_POST[nama]',
            email = '$_POST[email]',
            tingkatan = '$_POST[tingkatan]',
            username = '$_POST[username]',
            password = '$_POST[password]'
            where id = '$_GET[id]'");

        header("Location:Data_User.php");

    }
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
                            <a class="nav-link" href="index.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link collapsed" href="Data_User.php" style="background-color: #009966; color: white;" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> 
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
                            <a class="nav-link collapsed" href="Data_Kegiatan_menunggu.php" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Kegiatan Menunggu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
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
                    <div class="sb-sidenav-footer bg-dark">
                        <div class="small">Aplikasi:</div>
                        Pengelolaan Jadwal Kegiatan & Ruangan
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Form Ubah Data Master</h1>
                        <ol class="breadcrumb mb-4" style="background: #bdc3c7">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="Data_User.php">Data User</a></li>
                            <li class="breadcrumb-item active">Form Ubah Data Master</li>
                        </ol>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-body">
<?php 
    $id =$_GET['id'];
    $query_mysqlis = mysqli_query($conn,"SELECT * FROM tb_login where id='$id'")or die(mysqli_error());
    while($mfa = mysqli_fetch_assoc($query_mysqlis))
    {
?>
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Nama</label>
                                                        <input class="form-control" name="nama" type="text" value="<?php echo $mfa['nama'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Email</label>
                                                        <input class="form-control" name="email" type="text" value="<?php echo $mfa['email'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr height="2">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Tingkatan</label>
                                                            <?php if($mfa['tingkatan']=="Admin"){ ?>
                                                            <select class="form-control" name="tingkatan">
                                                                <option value="Admin" selected>Admin</option>
                                                                <option value="User">User</option>
                                                            </select>
                                                            <?php } else{ ?>
                                                            <select class="form-control" name="tingkatan">
                                                                <option value="Admin">Admin</option>
                                                                <option value="User" selected>User</option>
                                                            </select>
                                                            <?php } ?>
                                                        </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Username</label>
                                                            <input class="form-control" name="username" type="text" value="<?php echo $mfa['username'] ?>">
                                                        </div> 
                                            </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label class="small mb-1">Password</label>
                                                            <input class="form-control" id="inputPassword" name="password" type="password" value="<?php echo $mfa['password'] ?>">
                                                            
                                                            <input type="checkbox" onclick="myFunction()">Tampilkan Password

                                                            <script>
                                                               function myFunction() {
                                                                   var x = document.getElementById("inputPassword");
                                                                     if (x.type === "password") {
                                                                          x.type = "text";
                                                                     } else {
                                                                        x.type = "password";
                                                                         }
                                                                     }
                                                             </script>
                                                        </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                            <div class="col-sm">
                                            <div class="form-group d-flex align-items-center justify-content-between mt-2 mb-0">
                                                <!-- <a class="btn btn-success btn-block" href="ubah_user_act.php">SIMPAN</a> -->
                                                <button type="submit" name="simpan" class="btn btn-success btn-block">SIMPAN</button>
                                                <!-- <input type="submit" class="btn btn-success btn-block" name="submit" value="SIMPAN"> -->
                                            </div>
                                        </div>
                                          <div class="col-sm">
                                            <div class="form-group d-flex align-items-center justify-content-between mt-2 mb-0">
                                               <a href="Data_User.php" type="submit" class="btn btn-danger btn-block">BATAL</a>
                                            </div>
                                        </div>
                                    </div>
                                        </form>
                                        <?php } ?>
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