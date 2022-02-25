<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../anggota/style.css"> -->
    
</head>
<body>
<div id="content" class="bg-dark p-4 p-md-5 pt-5">
    <div class="container bg-dark" style= margin-top:150px;>
        <div class="card bg-dark col-lg-6 mx-auto">
            <div class="card-header bg-info">
                <h3 class="text-white text-center">Welcome ! </h3>
            </div>
            <div class="card-body text-white bg-dark">
                <form action="login-proses.php" method="POST">
                    <b>Username</b>
                    <input type="text" name="username" class="form-control mb-2"
                    placeholder="Username" required>
                    <b>Password</b>
                    <input type="password" name="password" class="form-control mb-2"
                    placeholder="Password" required>
                    
                    <div class="card-footer">
                        <button type="submit" name="login" class="btn btn-block btn-outline-success form-control">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>