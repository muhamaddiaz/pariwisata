<?php 
    require '../secret/dbsetting.php';
    $id_hotel = $_POST['id_delete'];
    $sql = "DELETE FROM hotel WHERE id_hotel=$id_hotel";
    if($conn->query($sql)) {
        header('Location: http://localhost/pariwisata/view/admin.php');
    } else {
        die("delete process error");
    }
?>