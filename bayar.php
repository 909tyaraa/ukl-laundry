<?php
include("connection.php");

$id_transaksi=$_GET["id_transaksi"];

$sql = "update from transaksi where id_transaksi= '".$id_transaksi."'";

$result = mysqli_query($connect, $sql);

if ($result) {
    echo "<script>alert('Pembayaran Sukses !');location.href='list-transaksi.php';</script>";
} else {
    echo "<script>alert('Pembayaran Gagal !');location.href='list-transaksi.php';</script>";
    exit();
}



?>