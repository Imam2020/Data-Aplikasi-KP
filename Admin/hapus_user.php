<?php
include '../koneksi.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE from tb_login where id='$id'")or die(mysql_error());
header("location:Data_User.php");
?>