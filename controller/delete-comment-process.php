<?php 
    require '../secret/dbsetting.php';
    $id_komen = $_POST['id_delete'];
    $id_wisata = $_POST['id_wisata'];
    
    $sql = "DELETE FROM komentar WHERE id_komentar=$id_komen";
    if($conn->query($sql)) {
        header("Location: ". "http://localhost/pariwisata/view/wisata.php?wisata=$id_wisata");
    } else {
        die("delete process error");
    }
?>