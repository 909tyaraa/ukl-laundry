<?php 
    if($_GET['id_transaksi']){
        include "connection.php";
        $query=mysqli_query($connect,"update transaksi 
        set dibayar='dibayar'
        where id_transaksi='".$_GET['id_transaksi']."'");
        if($query){
            echo "<script>alert('Sukses bayar ');location.href='list-transaksi.php';</script>";
        } else {
            echo "<script>alert('Gagal bayar ');location.href='list-transaksi.php';</script>";
        }
    }
?>
