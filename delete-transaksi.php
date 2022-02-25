<?php
include("connection.php");

$id_transaksi=$_GET["id_transaksi"];

$sql = "delete from transaksi where id_transaksi= '".$id_transaksi."'";

$result = mysqli_query($connect, $sql);

if ($result) {
    echo "<script>alert('Sukses hapus transaksi');location.href='list-transaksi.php';</script>";
} else {
    echo "<script>alert('Gagal hapus transaksi');location.href='list-transaksi.php';</script>";
    exit();
}



?>
