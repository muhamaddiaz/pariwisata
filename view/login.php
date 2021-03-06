<?php 
    session_start(); 
    if(isset($_SESSION['id_user'])) {
        header('Location: '. 'http://localhost/pariwisata/middleware/login-middleware.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/assets.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../assets/assets.js"></script>
</head>
<body>
<div class="login-bg bg-bromo">
    <div class="login-ct">
        <div class="login-text text-center">
            <h1 class="display-3 text-login">Login Sekarang!</h1>
        </div>
        <div class="login-main">
            <form action="../controller/login-process.php" method="post" onsubmit="return validate3()">
                <p class="text-danger" id="e_spot1"></p>
                <label>Username: </label>
                <input id="username" type="text" class="form-control" name="username"/> 
                <br>
                <p class="text-danger" id="e_spot2"></p>
                <label>Password: </label>
                <input id="password" type="password" class="form-control" name="password"/>
                <br>
                <button type="submit" class="btn btn-success">Login</button>
                <br>
                <br>
                <p>Belum punya akun? <a href="signup.php">daftar sekarang</a></p>
            </form>
        </div>
    </div>
</div>
    <?php 
        if(isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    ?>
</body>
</html>