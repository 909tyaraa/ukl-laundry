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
  <body>
  <div class="bg-dark wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Menu</span>
	        </button>
        </div>
        <div class="p-4">
		  		<h1><a href="home.php" class="logo">L A U N D R Y - !!</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="home.php"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
	              <a href="list-user.php"><span class="fa fa-user mr-3"></span> Data User</a>
	          </li>
	          <li>
	              <a href="list-member.php"><span class="fa fa-user mr-3"></span> Data Member</a>
	          </li>
            <li>
	              <a href="list-paket.php"><span class="fa fa-user mr-3"></span> Data Paket</a>
	          </li>
            <li>
	              <a href="list-transaksi.php"><span class="fa fa-user mr-3"></span> Data Transaksi</a>
	          </li>
              <li>
              <a class="nav-link text-white" href="login.php">Logout</a>
              </li>
	        </ul>

	        <div class="mb-5">
						<h3 class="h6 mb-3">Subscribe for newsletter</h3>
						<form action="#" class="subscribe-form">
	            <div class="form-group d-flex">
	            	<div class="icon"><span class="icon-paper-plane"></span></div>
	              <input type="text" class="form-control" placeholder="Enter Email Address">
	            </div>
	          </form>
					</div>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <div id="content" class="p-4 p-md-5 pt-5">
    <body>
    <h3>Tampil Transaksi</h3> <a href="form-member.php" class="btn btn-warning">Tambah Member</a>
        <table class="table table-hover text-white table-striped">
        <thead> 
            <tr>
            <th class="text-info">NAMA<th class="text-info">ALAMAT</th>
            <th class="text-info">JENIS KELAMIN</th><th class="text-info">NO TELEPON</th>
            <th class="text-info">AKSI</th>
            </tr>

            <div class="card-body">
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
                        <thead> 
                                <tr>
                                    <th class="text-info">KODE TRANSAKSI</th> 
                                    <th class="text-info">MEMBER</th>
                                    <th class="text-info">USER</th>
                                    <th class="text-info">TANGGAL TRANSAKSI</th>
                                    <th class="text-info">"TANGGAL BAYAR</th>
                                    <th class="text-info">PENGAMBILAN</th>
                                    <th class="text-info">STATUS</th>
                                    <th class="text-info">DIBAYAR</th>
                                    <th class="text-info">AKSI</th>
                                </tr>
                                
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
                class="btn btn-success">U</a> | <a href="process-transaksi.php?id_transaksi=<?=$transaksi['id_transaksi']?>" 
                onclick="return confirm('Apakah anda yakin menghapus data ini?')" 
                class="btn btn-danger">X</a> | <a href="bayar.php?id_transaksi=<?=$transaksi['id_transaksi']?>" 
                onclick="return confirm('Apakah anda yakin membayar data ini?')" 
                class="btn btn-primary">B</a> </td>
                                </tr>
                    </thead>
                                    
                                    <?php
                                }
                                ?>
                        </li>
                       
                </ul>
                <a href="tambah_transaksi.php" class="btn btn-warning">Tambah Data</a>
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
