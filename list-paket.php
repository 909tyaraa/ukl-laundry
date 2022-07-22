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
  <?php
   include "navbar.php";?>
   
  <body>
		
  <div class="wrapper d-flex align-items-stretch">
			
        <!-- Page Content  -->
      <div id="content" class="bg-dark p-4 p-md-5 pt-5">
    <body>
        <h3 class="text-white">Tampil Paket</h3><a href="form-paket.php" class="btn btn-outline-success"> Tambah Paket</a>
        <table class="table text-white table-hover table-striped">
            <thead>
                <tr>
                    <th class="text-info">JENIS PAKET<th class="text-info">HARGA</th>
                    <th class="text-info">AKSI</th>
                </tr>
            </thead>

           

            <tbody>
                <?php
               
                include "connection.php";
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from paket 
                        where jenis like '%$search%' 
                        or harga like '%$search%' 
                        or id_paket like '%$search%'";
                    }else {
                        $sql = "select * from paket";
                    }
                    # eksekusi SQL
                    $hasil = mysqli_query($connect, $sql);
                    while ($paket = mysqli_fetch_array($hasil)) {
                        ?>
                <tr>
                    <td><?=$paket['jenis']?></td>
                    <td><?=$paket['harga']?></td>
                    <td>
                        <a href="form-paket.php?id_paket=<?=$paket["id_paket"]?>">
                        <button class="btn btn-outline-warning "
                        onclick="return confirm('Yakin nich ?')">
                            Edit
                        </button>
                    </a>
                    <a href="process-paket.php?id_paket=<?=$paket["id_paket"]?>">
                    <button class="btn btn-outline-danger "
                    onclick="return confirm('Yakin nich ?')">
                    Delete
                </button>
            </a></td> 
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