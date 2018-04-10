<?php
    session_start();
    require '../secret/dbsetting.php';
    $user_id = $_SESSION['id_user'];
    $sql = "SELECT * FROM user WHERE id_user=$user_id";
    $result = $conn->query($sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($user['admin']) {
        header("Location: http://localhost/pariwisata/view/admin.php");
    } else {
        header("Location: http://localhost/pariwisata/view/main.php");
    }
?>