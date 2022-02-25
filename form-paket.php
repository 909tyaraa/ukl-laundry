<!DOCTYPE html>
<html lang="en">
<head>
<head>
  	<title>Tambah User</title>
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
                    Form Paket Laundry
                </h4>
            </div>

            <div class="card-body bg-dark text-white">
            <?php
                if (isset($_GET["id_paket"])) {
                    $id_paket = $_GET["id_paket"];
                    $sql = "select * from paket where id_paket='$id_paket'";

                    include("connection.php");

                    #eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);

                    #konversi kedalam bentuk array
                    $paket = mysqli_fetch_array($hasil);
            ?>
                        <form action="process-paket.php" method="post"
                        enctype="multipart/form-data">

                            ID Paket
                            <input type="text" name="id_paket"
                            class="form-control mb-2" required
                            value="<?=$paket["id_paket"];?>" readonly>

                            Jenis Paket Laundry
                            <select name="jenis" class="form-control mb-2" required>
                                <option value="kiloan">Kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                                <option value="kaos">Kaos</option>
                            </select>

                            Harga
                            <input type="text" name="harga"
                            class="form-control mb-2" required
                            value="<?=$paket["harga"];?>">

                            <button type="submit" class="btn btn-info btn-block"
                            name="update_paket">
                                Simpan
                            </button>
                        </form>
            <?php
                }else{
                    #form untuk insert
            ?>
                    <form action="process-paket.php" method="post"
                    enctype="multipart/form-data">

                            ID Paket
                            <input type="text" name="id_paket"
                            class="form-control mb-2" required>

                            Jenis Paket Laundry
                            <select name="jenis" class="form-control mb-2" required>
                                <option value="kiloan">Kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                                <option value="kaos">Kaos</option>
                            </select>

                            Harga
                            <input type="text" name="harga"
                            class="form-control mb-2" required>

                        <button type="submit" class="btn btn-info btn-block"
                        name="simpan_paket">
                            Simpan
                        </button>
                    </form>
                <?php
                }
                ?>
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