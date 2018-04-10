<?php 
    require '../secret/dbsetting.php';
    $id_user = $_POST['id_delete'];
    $sql = "DELETE FROM user WHERE id_user=$id_user";
    if($conn->query($sql)) {
        header('Location: http://localhost/pariwisata/view/admin.php');
    } else {
        die("delete process error");
    }
?>