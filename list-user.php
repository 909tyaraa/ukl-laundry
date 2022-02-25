<!doctype html>
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
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="home.php" class="logo"> L A U N D R Y - !!</a></h1>
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

        <!-- Page Content  -->
      <div id="content" class="bg-dark p-4 p-md-5 pt-5">
        <h3 class="text-white text-center bg-info">Tampil User</h3> <a href="form-user.php" class="btn btn-outline-success"> Tambah User</a>
        <table class="table table-hover text-white table-striped">
            <thead>
                <tr>
                    <th class="text-info">NAMA USER<th class="text-info">USERNAME</th>
                    <th class="text-info">ROLE</th><th class="text-info">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                if (isset($_GET["search"])) {
                    # jika pada saat loadd halaman ini,
                    # akan mengecek apakah data dengan method
                    # GET yg bernama_user "search"
                    $search = $_GET ["search"];
                    $sql = "select * from user
                    where id_user like '%$search%'
                    or nama_user like '%$search%' 
                    or role like '%$search%'
                    or username like '%$search%'";
                } else {
                    $sql = "select * from user";
                }
                
                //eksekusi perintah SQL
                $query = mysqli_query($connect, $sql);
                while ($user = mysqli_fetch_array($query)) {?>
                <tr>
                    <td><?=$user['nama_user']?></td>
                    <td><?=$user['username']?></td>
                    <td><?=$user['role']?></td>
                    <td>
                    <a href="form-user.php?id_user=<?=$user["id_user"]?>">
                        <button class="btn btn-outline-warning "
                        onclick="return confirm('Yakin nich ?')">
                            Edit
                        </button>
                    </a>
                    <a href="process-user.php?id_user=<?=$user["id_user"]?>">
                    <button class="btn btn-outline-danger"
                    onclick="return confirm('Yakin nich ?')">
                    Delete
                </button>
            </a>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
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