<?php 
    session_start(); 
    if(!isset($_SESSION['id_user'])) {
        header('Location: '. 'http://localhost/pariwisata');
    }
    require '../secret/dbsetting.php';
    $id_user = $_SESSION['id_user'];
    $sqluser = "SELECT * FROM user WHERE id_user=$id_user";
    $result = $conn->query($sqluser);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/assets.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        $tujuan = $_POST['ke'];
        $dari = $_POST['dari'];
        $infant = $_POST['infant'];
        $berangkat = $_POST['berangkat'];
        $pulang = $_POST['pulang'];
    ?>
    <div class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand" href="#" style="color: rgb(86, 61, 124)">Travelpedia</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="main.php"><?php echo $user['fullname'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../controller/logout-process.php">Keluar</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid" style="padding: 0">
        <div class="faded-search text-white">
            <h1 class="display-3" style="font-weight: 900">Destinasi <?php echo $tujuan ?></h1>
            <h6 style="font-weight: 600"><?php echo "Jangka waktu: $berangkat - $pulang"?></h6>
        </div>
    </div>
    <br>
    <div class="container">
        <?php 
            $sql = "SELECT * FROM transport WHERE tujuan_transport='$tujuan'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo "<p>Transportasi menuju $tujuan</p><hr>";
                while($row = $result->fetch_assoc()) {
                    $nama_transport = $row['nama_transport'];
                    $jenis_transport = $row['jenis_transport'];
                    $photo_transport = $row['photo_transport'];
                    echo "<div class='card'>
                            <div class='card-body'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <img src=$photo_transport style=width:100% />
                                    </div>
                                    <div class='col-md-8'>
                                        <h2 class=card-title>$nama_transport</h2>
                                        <p class=card-text>$jenis_transport</p>
                                    </div>
                                </div>
                            </div>
                            <div class='card-footer'>
                                <p class=card-text>$dari - $tujuan</p>
                            </div>
                          </div><br>";
                }
            }
        ?>
        <?php 
            $sql = "SELECT * FROM hotel WHERE lokasi_hotel='$tujuan'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo "<p>Hotel di $tujuan</p><hr>";
                while($row = $result->fetch_assoc()) {
                    $nama_hotel = $row['nama_hotel'];
                    $deskripsi_hotel = $row['deskripsi_hotel'];
                    $photo_hotel = $row['photo_hotel'];
                    $lokasi_hotel = $row['lokasi_hotel'];
                    echo "<div class='card'>
                            <div class='card-body'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <img src=$photo_hotel style=width:100% />
                                    </div>
                                    <div class='col-md-8'>
                                        <h2 class=card-title>$nama_hotel</h2>
                                        <p class=card-text>$deskripsi_hotel</p>
                                    </div>
                                </div>
                            </div>
                          </div><br>";
                }
            }
        ?>
        <?php 
            $sql = "SELECT * FROM wisata WHERE lokasi_wisata='$tujuan'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo "<p>Wisata yang ada di $tujuan</p><hr>";
                while($row = $result->fetch_assoc()) {
                    $id_wisata = $row['id_wisata'];
                    $nama_wisata = $row['nama_wisata'];
                    $deskripsi_wisata = $row['deskripsi_wisata'];
                    $photo_wisata = $row['gambar_wisata'];
                    echo "<div class='card'>
                            <div class='card-body'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <img src=$photo_wisata style=width:100% />
                                    </div>
                                    <div class='col-md-8'>
                                        <h2 class=card-title>$nama_wisata</h2>
                                        <p class=card-text>$deskripsi_wisata</p>
                                    </div>
                                </div>
                            </div>
                            <div class='card-footer'>
                                <form action='wisata.php' method='get'>
                                    <input type='hidden' name='wisata' value='$id_wisata' />
                                    <button class='btn btn-info btn-block' type='submit'>Selengkapnya</button>
                                </form>
                            </div>
                          </div><br>";
                }
            }
        ?>
    </div>
</body>
</html>