<?php 
    session_start();
    require '../secret/dbsetting.php';

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli($server, $dbuser, $keypass, $dbname);
    if($conn->connect_error) {
        die('Error: '. $conn->connect_error);
    }

    $sql = "INSERT INTO user(fullname, username, email, password)
                VALUES ('$fullname', '$username', '$email', '$password')";
    $sqlcheck = "SELECT * FROM user WHERE username='$username' OR email='$email'";
    $result = $conn->query($sqlcheck);
    if($result->num_rows == 0) {
        if($conn->query($sql) == TRUE) {
            $json = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['id_user'] = $json['id_user'];
            $_SESSION['alert'] = "<script>alert('User berhasil terdaftar')</script>";
            header("Location: ". "http://localhost/pariwisata/view/main.php");
        }
    } else {
        $_SESSION['alert'] = "<script>alert('User sudah terdaftar')</script>";
        header("Location: ". "http://localhost/pariwisata/view/signup.php");
    }
?>