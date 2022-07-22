<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg user
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
include "navbar.php";
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

        <!-- Page Content  -->
      <div id="content" class="bg-dark p-4 p-md-5 pt-5">
        <h3 class="text-white">Tampil User</h3> <a href="form-user.php" class="btn btn-outline-success"> Tambah User</a>
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