<?php
include("connection.php");

$id_transaksi=$_GET["id_user"];

$sql = "delete from user where id_user= '".$id_user."'";

$result = mysqli_query($connect, $sql);

if ($result) {
    echo "<script>alert('Sukses Hapus User !');location.href='list-user.php';</script>";
} else {
    echo "<script>alert('Gagal Hapus User !');location.href='list-user.php';</script>";
    exit();
}



?>