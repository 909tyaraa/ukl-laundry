<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="header/css/style.css">
    <!-- <link rel="stylesheet" href="../anggota/style.css"> -->
    
</head>
<body>
    <div class="container bg-dark" style= margin-top:150px;>
            <body class="bg-dark">
    <div class="container">
        <div class="card text-white bg-info col-lg-6 mx-auto">
            <div class="card-header bg-info">
                <h4 class="text-white text-center">WELCOME !</h4>
            </div>
            <div class="card-body">
                <form action="login-proses.php" method="post">
                    Username
                    <input type="text" name="username"
                    class="form-control mb-2" required>
                    Password
                    <input type="password" name="password"
                    class="form-control mb-2" required>
                    <button type="submit" name="login"
                    class="btn btn-success btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html