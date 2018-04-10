<?php 
    require '../secret/dbsetting.php';
    $id_transport = $_POST['id_delete'];
    $sql = "DELETE FROM transport WHERE id_transport=$id_transport";
    if($conn->query($sql)) {
        header('Location: http://localhost/pariwisata/view/admin.php');
    } else {
        die("delete process error");
    }
?>