<?php 
session_start();
include 'koneksi.php';
$username=$_POST['username'];
$password=$_POST['password'];
// $pas=md5($pass);
$query=mysql_query("SELECT * from tb_login where username='$username' and password='$password'");
$cocok=mysql_num_rows($query);
// $r=mysql_fetch_array($query);
if ($cocok > 0){
          $r=mysql_fetch_array($query);
              if ($r['tingkatan']=="Admin") {
              $_SESSION['username']=$username;
              $_SESSION['tingkatan'] = $r['tingkatan'];
              header("location:Admin/index.php");
               
            }else if ($r['tingkatan']=="User") {
              $_SESSION['username']=$username;
              $_SESSION['tingkatan'] = $r['tingkatan'];
              header("location:User/index.php");
            }


} 
// echo $pas;
?>
