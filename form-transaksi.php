<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg user
if (!isset($_SESSION["user"])) {
    header("login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Tambah Transaksi</title>
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
<div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Form Transaksi Laundry
                </h4>
            </div>

            <div class="card-body bg-dark text-info">
                <?php
                if (isset($_GET["id_transaksi"])) {
                    include "connection.php";
                    $id_transaksi = $_GET["id_transaksi"];
                    $sql = "select * from transaksi where id_transaksi='$id_transaksi'";
                    # eksekusi perintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    # konversi ke bentuk array
                    $transaksi = mysqli_fetch_array($hasil);
                ?>
                <form action="process-transaksi.php" method="post">
                    <!-- input kode transaksi -->
                    ID Transaksi
                      <input type="text" name="id_transaksi" class="form-control mb-2" required
                      value="<?=$transaksi["id_transaksi"];?>" readonly>
                      
                    Status
                    <select name="status" class="form-control mb-2" required
                    value="<?=$transaksi["status"];?>">
                        <option value="baru">baru</option>
                        <option value="proses">proses</option>
                        <option value="selesai">selesai</option>
                        <option value="diambil">diambil</option>
                    </select>

                    Status Pembayaran
                    <select name="dibayar" class="form-control mb-2" required
                    value="<?=$transaksi["dibayar"];?>">
                        <option value="sudah_dibayar">dibayar</option>
                        <option value="belum_dibayar">belum bayar</option>
                    </select>
               
                <button type="submit "class="btn btn-block btn-info" name="edit_status">
                    edit
                </button>
                </form>

                <?php
                }else{
                ?>
                <form action="process-transaksi.php" method="post">
                    <!-- input kode transaksi -->
                    ID Transaksi
                      <input type="text" name="id_transaksi" class="form-control mb-2" required>

                    Pilih Data Member
                    <select name="id_member" class="form-control mb-2" required>
                        <?php
                        include "connection.php";
                        $sql = "select * from member";
                        $hasil = mysqli_query($connect, $sql);
                        while ($member = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($member["id_member"])?>">
                            <?=($member["nama"])?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>

                    <!-- transaksi ambil dari data login -->
                    <input type="hidden" name="id_user" 
                    value="<?=($_SESSION["user"]["id_user"])?>">
                
                    User
                    <input type="text" name="nama_user" 
                    class="form-control mb-2" readonly
                    value="<?=($_SESSION["user"]["nama_user"])?>">
                    <!-- tgl_pinjam dibuat otomatis -->

                    <?php
                     date_default_timezone_set('Asia/Jakarta');
                    ?>
                    Tanggal Laundry
                    <input type="text" name="tgl" class="form-control mb-2" 
                    readonly value="<?=(date("Y-m-d"))?>">

                    Tanggal Ambil
                    <input type="date" name="batas_waktu" class="form-control mb-2" required>
                
                    Tanggal bayar
                    <input type="date" name="tgl_bayar" class="form-control mb-2" required>

                    Status
                    <select name="status" class="form-control mb-2" required>
                        <option value="baru">baru</option>
                        <option value="proses">proses</option>
                        <option value="selesai">selesai</option>
                        <option value="diambil">diambil</option>
                    </select>

                    Status Pembayaran
                    <select name="dibayar" class="form-control mb-2" required>
                        <option value="sudah_dibayar">dibayar</option>
                        <option value="belum_dibayar">belum bayar</option>
                    </select>

                <!-- tampilkan pilihan paket yg akan dipinjam -->
                Pilih paket yang akan di transaksi
                <select name="id_paket" class="form-control mb-2" 
                required>
                    <?php
                    $sql = " select * from paket";
                    $hasil = mysqli_query($connect, $sql);
                    while ($paket = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($paket["id_paket"])?>">
                           <?=($paket["jenis"])?>
                           <?=($paket["harga"] .  " /kg")?>
                        </option>
                        <?php
                    }
                    ?>
                </select>

                Jumlah Laundry...Kg
                <input type="number" name="qty" 
                class="form-control mb-2" >
               
                <button type="submit "class="btn btn-block btn-info" name="simpan_transaksi">
                    transaksi
                </button>
                </form>
                <?php
                }?>
            </div>
            <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
        crossorigin="anonymous"></script>
        </div>
    </div>
    <script src="header/js/jquery.min.js"></script>
    <script src="header/js/popper.js"></script>
    <script src="header/js/bootstrap.min.js"></script>
    <script src="header/js/main.js"></script>
</body>
</html>