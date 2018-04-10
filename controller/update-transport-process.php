<?php 
    require '../secret/dbsetting.php';
    $nama_transport = $_POST['nama_transport'];
    $tujuan_transport = $_POST['tujuan_transport'];
    $jenis_transport = $_POST['jenis_transport'];
    $kapasitas_transport = $_POST['kapasitas_transport'];
    $gambar_transport = $_POST['photo_transport'];
    $id_update = $_POST['id_update'];

    $sql = "UPDATE transport SET nama_transport='$nama_transport', jenis_transport='$jenis_transport', tujuan_transport='$tujuan_transport',
            photo_transport='$gambar_transport', kapasitas=$kapasitas_transport WHERE id_transport=$id_update";
    if($conn->query($sql)) {
        header("Location: http://localhost/pariwisata/view/admin.php");
    } else {
        die("Error update process");
    }
?>