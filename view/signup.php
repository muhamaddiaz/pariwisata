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
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/assets.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../assets/assets.js"></script>
</head>
<body>
<div class="signup-bg bg-raja">
    <div class="signup-ct">
        <div class="signup-text text-center">
            <h1 class="display-3 text-signup">Daftar Sekarang!</h1>
        </div>
        <div class="signup-main">
            <form action="../controller/signup-process.php" method="post" onsubmit="return validate()">
                <p class="text-danger" id="e_spot2"></p>
                <label>Nama Lengkap: </label>
                <input id="fullname" type="text" class="form-control" name="fullname"/> 
                <br>
                <p class="text-danger" id="e_spot3"></p>
                <label>Username: </label>
                <input id="username" type="text" class="form-control" name="username"/>
                <br>
                <p class="text-danger" id="e_spot4"></p>
                <label>Email: </label>
                <input id="email" type="text" class="form-control" name="email"/>
                <br>
                <p class="text-danger" id="e_spot6"></p>
                <label>Password: </label>
                <input id="password" type="password" class="form-control" name="password"/>
                <br>
                <button type="submit" class="btn btn-danger">Signup</button>
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