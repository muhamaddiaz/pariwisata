<?php 
    require '../secret/dbsetting.php';
    $nama_user = $_POST['nama_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $id_update = $_POST['id_update'];

    $sql = "UPDATE user SET fullname='$nama_user', username='$username', email='$email' WHERE id_user=$id_update";
    if($conn->query($sql)) {
        header("Location: http://localhost/pariwisata/view/admin.php");
    } else {
        die("Error update process");
    }
?>