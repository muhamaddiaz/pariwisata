<?php 
    session_start(); 
    if(!isset($_SESSION['id_user'])) {
        header('Location: '. 'http://localhost/pariwisata');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/assets.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        require '../secret/dbsetting.php';
        $id_user = $_SESSION['id_user'];
        $sqluser = "SELECT * FROM user WHERE id_user=$id_user";
        $result = $conn->query($sqluser);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
    <div class="container-fluid bg-raja" style="padding: 0">
        <div class="faded-main text-center text-white">
            <h1 class="display-2" style="font-weight: 700">Selamat datang, <?php echo $user['username'] ?></h1>
            <h3 class="display-4">Mulailah liburan anda</h3>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <br>
                    <form action="search-wisata.php" method="get">
                        <input type="search" name="search" class="form-control" placeholder="Cari wisata" required/>
                        <br>
                        <button type="submit" class="btn btn-success">Cari wisata</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="search-ct">
            <form action="search.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <label>Dari: </label>
                        <select name="dari" class="form-control">
                            <option value="Bandung">Bandung</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Ke: </label>
                        <select name="ke" class="form-control">
                            <?php 
                                $sql = "SELECT DISTINCT lokasi_wisata FROM wisata";
                                $result = $conn->query($sql);
                                if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $data = $row['lokasi_wisata'];
                                        echo "<option value='$data'>$data</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <label>Infant: </label>
                        <input type="number" class="form-control" name="infant" placeholder="Untuk berapa orang ?" required/>
                    </div>
                    <div class="col-md-4">
                        <label>Tanggal keberangkatan: </label>
                        <input type="date" class="form-control" name="berangkat" required/>
                    </div>
                    <div class="col-md-4">
                        <label>Tanggal pulang: </label>
                        <input type="date" class="form-control" name="pulang" required/>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary btn-block" type="submit">Search</button>
            </form>
        </div>
    </div>
    <br><br>
</body>
</html>