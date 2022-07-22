<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg petugas
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Member</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="header/css/style.css">
</head>
<body>
<div class="bg-dark wrapper d-flex align-items-stretch">
        
            <div class="card-body">
                <h3 class="text-white ">Form Member</h3>

                <?php
                if (isset($_GET["id_member"])) {
                    // memeriksa ketika load file ini
                    // apakah membawa data GET dg nama "id_memberpelanggan"
                    // jika true, maka form pelanggan digunakan utk edit

                    # mengakses data pelanggan dari id_memberpelanggan yg dikirim
                    include "connection.php";
                    $id_member = $_GET["id_member"];
                    $sql = "select * from member where id_member='$id_member'";
                    # eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $member = mysqli_fetch_array($hasil);
                    ?>

                <form action="process-member.php" method="post">
                    ID Member
                    <input type="text" name="id_member"
                    class="form-control mb-2" required
                    value="<?=$member["id_member"] ?>" readonly>

                    Nama 
                    <input type="text" name="nama"
                    class="form-control mb-2" required
                    value="<?=$member["nama"] ?>">

                    Alamat 
                    <input type="text" name="alamat"
                    class="form-control mb-2" required
                    value="<?=$member["alamat"] ?>">

                    Jenis Kelamin
                    <input type="text" name="jenis_kelamin"
                    class="form-control mb-2" required
                    value="<?=$member["jenis_kelamin"] ?>">
                    
                    No. Telepon
                    <input type="text" name="tlp"
                    class="form-control mb-2" required
                    value="<?=$member["tlp"] ?>">

                    <button type="submit" class="btn btn-primary btn-block"
                    name="edit_member" onclick="return confirm('Apakah anda yakin?')">
                        Save
                    </button>
                </form>

                    <?php
                }else {
                    // jika false, maka form pelanggan digunakan utk insert
                    ?>

                <form action="process-member.php" method="post">
                    ID 
                    <input type="text" name="id_member"
                    class="form-control mb-2" required>
                    
                    Nama 
                    <input type="text" name="nama"
                    class="form-control mb-2" required>

                    Alamat
                    <input type="text" name="alamat"
                    class="form-control mb-2" required>

                    Jenis Kelamin
                    <select name="jenis_kelamin" class="form-control mb-2" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    No.Telepon
                    <input type="text" name="tlp"
                    class="form-control mb-2" required>


                    <button type="submit" class="btn btn-primary btn-block"
                    name="simpan_member" onclick="return confirm('Apakah anda yakin?')">
                        Save
                    </button>
                </form>

                    <?php
                }
                ?>
                
            </div>
        </div>
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