<?php 
    require '../secret/dbsetting.php';
    $nama_transport = $_POST['nama_transport'];
    $jenis_transport = $_POST['jenis_transport'];
    $tujuan_transport = $_POST['tujuan_transport'];
    $gambar_transport = $_POST['gambar_transport'];
    $kapasitas_transport = $_POST['kapasitas_transport'];

    $sql = "INSERT INTO transport(nama_transport, jenis_transport, tujuan_transport, photo_transport, kapasitas)
            VALUES('$nama_transport', '$jenis_transport', '$tujuan_transport', '$gambar_transport', $kapasitas_transport)";
    if($conn->query($sql)) {
        header("Location: http://localhost/pariwisata/view/admin.php");
    } else {
        die("Error create data: $conn->error");
    }
?>