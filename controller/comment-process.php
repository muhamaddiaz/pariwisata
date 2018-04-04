<?php 
    session_start();
    require '../secret/dbsetting.php';

    $id_user = $_POST['id_user'];
    $id_wisata = $_POST['id_wisata'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO komentar(id_wisata, id_user, isi_komentar)
                VALUES ($id_wisata, $id_user, '$comment')";
    if($conn->query($sql) == TRUE) {
        $_SESSION['alert'] = "<script>alert('Comment berhasil di post!')</script>";
        header("Location: ". "http://localhost/pariwisata/view/wisata.php?wisata=$id_wisata");
    } else {
        $_SESSION['alert'] = "<script>alert('Comment tidak dapat di post!')</script>";
        header("Location: ". "http://localhost/pariwisata/view/wisata.php?wisata=$id_wisata");
    }
?>