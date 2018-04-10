<?php 
    require '../secret/dbsetting.php';
    $id_wisata = $_POST['id_delete'];
    $sql = "DELETE FROM wisata WHERE id_wisata=$id_wisata";
    if($conn->query($sql)) {
        header('Location: http://localhost/pariwisata/view/admin.php');
    } else {
        die("delete process error");
    }
?>