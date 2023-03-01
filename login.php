<!DOCTYPE html>
<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$query=mysqli_query($conn,"SELECT * from tb_login where username='$username' and password='$password'")or die(mysqli_error());
$cocok=mysqli_num_rows($query);
    if ($cocok > 0){
$r=mysqli_fetch_array($query);
            if ($r['tingkatan']=="Admin") {
                $_SESSION['username']=$username;
                $_SESSION['tingkatan'] = $r['tingkatan'];
                $_SESSION['status'] = 'login';
                header("location:Admin/index.php");
            }else if ($r['tingkatan']=="User") {
                $_SESSION['username']=$username;
                $_SESSION['tingkatan'] = $r['tingkatan'];
                $_SESSION['status'] = 'login';
                header("location:User/index.php");
            }


}else{
    $error=true;
} 
}


// echo $pas;
 ?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background: #ecf0f1">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <?php if(isset($error)):?>
                            <div class="alert alert-danger  alert-dismissible fade show" role="alert">Username atau Password Salah!!! Silakan => <a href="lupapassword.php">Lupa Password</a> <= <button class="close" data-dismiss="alert" aria-label="close">&times;</button></div>
                        <?php endif?>
                        <div id="layoutAuthentication_header ">
                <header class="py-4 bg-transparent mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        </div>
                    </div>
                </header>
            </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header" style="background: #009966;"><h3 class="text-center font-weight-bold my-2"><i class="fas fa-sign-in-alt"></i>FORM LOGIN</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" >Username</label>
                                                <input class="form-control" name="username" type="text" placeholder="Enter Username" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >Password</label>
                                                <input class="form-control" name="password" type="password" placeholder="Enter password" required="" />
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input type="submit" class="btn btn-block text-white" style="background: #009966;" name="login" value="Login">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a href="index.php" type="submit" class="btn btn-danger btn-block">BATAL</a>
                                            </div>
                                        </div>
                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer ">
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
