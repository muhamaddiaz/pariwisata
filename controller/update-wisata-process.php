<?php 
    require '../secret/dbsetting.php';
    $nama_wisata = $_POST['nama_wisata'];
    $lokasi_wisata = $_POST['lokasi_wisata'];
    $deskripsi_wisata = $_POST['deskripsi_wisata'];
    $gambar_wisata = $_POST['gambar_wisata'];
    $id_update = $_POST['id_update'];

    $sql = "UPDATE wisata SET nama_wisata='$nama_wisata', lokasi_wisata='$lokasi_wisata', deskripsi_wisata='$deskripsi_wisata',
            gambar_wisata='$gambar_wisata' WHERE id_wisata=$id_update";
    if($conn->query($sql)) {
        header("Location: http://localhost/pariwisata/view/admin.php");
    } else {
        die("Error update process");
    }
?>