<?php 
    require '../secret/dbsetting.php';
    $nama_wisata = $_POST['nama_wisata'];
    $lokasi_wisata = $_POST['lokasi_wisata'];
    $deskripsi_wisata = $_POST['deskripsi_wisata'];
    $gambar_wisata = $_POST['gambar_wisata'];

    $sql = "INSERT INTO wisata(nama_wisata, lokasi_wisata, deskripsi_wisata, gambar_wisata)
            VALUES('$nama_wisata', '$lokasi_wisata', '$deskripsi_wisata', '$gambar_wisata')";
    if($conn->query($sql)) {
        header("Location: http://localhost/pariwisata/view/admin.php");
    } else {
        die("Error create data: $conn->error");
    }
?>