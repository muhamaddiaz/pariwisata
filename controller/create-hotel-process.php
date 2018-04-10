<?php 
    require '../secret/dbsetting.php';
    $nama_hotel = $_POST['nama_hotel'];
    $lokasi_hotel = $_POST['lokasi_hotel'];
    $deskripsi_hotel = $_POST['deskripsi_hotel'];
    $gambar_hotel = $_POST['gambar_hotel'];
    $kapasitas_hotel = $_POST['kapasitas_hotel'];

    $sql = "INSERT INTO hotel(nama_hotel, deskripsi_hotel, photo_hotel, lokasi_hotel, kamar)
            VALUES('$nama_hotel', '$deskripsi_hotel', '$gambar_hotel', '$lokasi_hotel', $kapasitas_hotel)";
    if($conn->query($sql)) {
        header("Location: http://localhost/pariwisata/view/admin.php");
    } else {
        die("Error create data: $conn->error");
    }
?>