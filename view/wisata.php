<?php 
    session_start();
    require '../secret/dbsetting.php';
    $id_wisata = $_GET['wisata'];
    $sql = "SELECT * FROM wisata WHERE id_wisata=$id_wisata";
    $result = $conn->query($sql);
    $wisata = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/assets.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wisata-bg" style="background-image: url(<?php echo $wisata['gambar_wisata'] ?>); background-size: cover"></div>
    <div class="row">
        <div class="col-md-6" style="background-color: rgba(86, 61, 124, 0.8);">
            <div class="wisata-ct1 text-white text-center">
                <h1 class="display-3" style="font-weight: 700"><?php echo $wisata['nama_wisata'] ?></h1>
                <p style="font-size: 2rem"><?php echo $wisata['lokasi_wisata'] ?></p>
            </div>
        </div>
        <div class="col-md-6" style="background-color: white">
            <div class="wisata-ct2">
                <h2 class="display-4" style="color: rgb(86, 61, 124)">Sekilas tentang <?php echo $wisata['nama_wisata'] ?></h2>
                <hr>
                <p>
                    <?php 
                        echo $wisata['deskripsi_wisata'];
                    ?>
                </p>
                <p>Comment:</p>
                <hr>
                    <?php 
                        $sql = "SELECT * FROM komentar WHERE id_wisata='$id_wisata'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $id_user = $row['id_user'];
                                $komentar = $row['isi_komentar'];
                                $sqluser = "SELECT * FROM user WHERE id_user=$id_user";
                                $resuser = $conn->query($sqluser);
                                $user = mysqli_fetch_array($resuser, MYSQLI_ASSOC);
                                $username = $user['username'];
                                echo "<div class='card'>
                                        <div class='card-body'>
                                            <p class='card-text'>$komentar</p>
                                        </div>
                                        <div class='card-footer'>
                                            <p class='card-text'>Commented by - $username</p>
                                        </div>
                                      </div><br>";
                            }
                        } else {
                            echo "<h2>Belum ada komentar</h2>";
                        }
                    ?>
                <hr>
                <?php 
                    if(isset($_SESSION['id_user'])) {
                        $id_user = $_SESSION['id_user'];
                        echo "<form action='../controller/comment-process.php' method='post'>
                            <input type='hidden' name='id_user' value='$id_user' />
                            <input type='hidden' name='id_wisata' value='$id_wisata' />
                            <textarea name='comment' class='form-control' placeholder='Comment tentang destinasi ini' required></textarea>
                            <br>
                            <button type='submit' class='btn btn-success'>Comment</button>
                            </form>
                        <br>";
                    }
                ?>
                <a href="main.php">Back to home</a>
            </div>
        </div>
    </div>
</body>
</html>