<?php 
    require '../secret/dbsetting.php';
    $nama_hotel = $_POST['nama_hotel'];
    $lokasi_hotel = $_POST['lokasi_hotel'];
    $deskripsi_hotel = $_POST['deskripsi_hotel'];
    $gambar_hotel = $_POST['gambar_hotel'];
    $kapasitas_hotel = $_POST['kapasitas_hotel'];
    $id_update = $_POST['id_update'];

    $sql = "UPDATE hotel SET nama_hotel='$nama_hotel', lokasi_hotel='$lokasi_hotel', deskripsi_hotel='$deskripsi_hotel',
            photo_hotel='$gambar_hotel', kamar=$kapasitas_hotel WHERE id_hotel=$id_update";
    if($conn->query($sql)) {
        header("Location: http://localhost/pariwisata/view/admin.php");
    } else {
        die("Error update process: $conn->error");
    }
?>