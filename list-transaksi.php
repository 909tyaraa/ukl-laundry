<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg user
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Transaksi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="header/css/style.css">
  </head>
  <?php include "navbar.php";?>
  <body>
    
  <div class="bg-dark wrapper d-flex align-items-stretch">
    
        <div id="content" class="p-4 p-md-5 pt-5">
    
    <h3 class="text-white">Tampil Transaksi</h3>
    <a href="form-member.php" class="btn btn-warning">Tambah Member</a>
        <table class="table table-hover text-white table-striped">
        <thead> 
          <tr>
            <th class="text-info">KODE TRANSAKSI</th> 
            <th class="text-info">MEMBER</th>
            <th class="text-info">USER</th>
            <th class="text-info">TANGGAL TRANSAKSI</th>
            <th class="text-info">TANGGAL BAYAR</th>
            <th class="text-info">PENGAMBILAN</th>
            <th class="text-info">STATUS</th>
            <th class="text-info">DIBAYAR</th>
            <th class="text-info">AKSI</th>
          </tr>

          <!-- kotak pencarian data pelanggan -->
          <form action="list-transaksi.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-3 bg-dark text-info"
                    placeholder="Cari apa hayooo..."
                    required>

                <ul class="list-group">
                    <?php
                    
                    include "connection.php";
                    $sql = "select 
                    transaksi.*,member.*,user.*
                    from 
                    transaksi inner join member
                    on member.id_member=transaksi.id_member
                    inner join user 
                    on transaksi.id_user=user.id_user
                    order by transaksi.tgl desc";

                    $hasil = mysqli_query($connect, $sql);
                    while ($transaksi = mysqli_fetch_array($hasil)) {
                        ?>
                                
                                <tr>
                                    <td><?=$transaksi['id_transaksi']?></td>
                                    <td><?=$transaksi['nama']?></td>
                                    <td><?=$transaksi['nama_user']?></td>
                                    <td><?=$transaksi['tgl']?></td>
                                    <td><?=$transaksi['tgl_bayar']?></td>
                                    <td><?=$transaksi['batas_waktu']?></td>
                                    <td><?=$transaksi['status']?></td>
                                    <td><?=$transaksi['dibayar']?></td>
                                    
                                    <!-- bagian tombol pilihan-->
                                    <td><a href="form-transaksi.php?id_transaksi=<?=$transaksi['id_transaksi']?>" 
                class="btn btn-outline-warning">Edit</a> | <a href="process-transaksi.php?id_transaksi=<?=$transaksi['id_transaksi']?>" 
                onclick="return confirm('Apakah anda yakin menghapus data ini?')" 
                class="btn btn-outline-danger">Delete</a> | <a href="bayar.php?id_transaksi=<?=$transaksi['id_transaksi']?>" 
                onclick="return confirm('Apakah anda yakin membayar data ini?')" 
                class="btn btn-outline-primary">Pay</a> </td>
                                </tr>
                    </thead>
                                    
                                    <?php
                                }
                                ?>
                        </li>
                    </table>
                </ul>
                <a href="form-transaksi.php" class="btn btn-warning">Tambah Data</a>
        <a class="btn btn-warning" href="#" onclick="window.print();" role = "button">Cetak Laporan</a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      </div>
		</div>

    <script src="header/js/jquery.min.js"></script>
    <script src="header/js/popper.js"></script>
    <script src="header/js/bootstrap.min.js"></script>
    <script src="header/js/main.js"></script>
    
  </body>
</html>
