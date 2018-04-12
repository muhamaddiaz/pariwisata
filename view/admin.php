<?php
    session_start();
    require '../secret/dbsetting.php';
    //User
    $user_id = $_SESSION['id_user'];
    $sql = "SELECT * FROM user WHERE id_user=$user_id";
    $result = $conn->query($sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //Wisata count
    $sql = "SELECT COUNT(*) AS total FROM `wisata`";
    $result = $conn->query($sql);
    $wisata_total = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //Hotel count
    $sql = "SELECT COUNT(*) AS total FROM `hotel`";
    $result = $conn->query($sql);
    $hotel_total = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //Transportasi count
    $sql = "SELECT COUNT(*) AS total FROM `transport`";
    $result = $conn->query($sql);
    $transport_total = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //Wisata terbanyak
    $sql = "SELECT COUNT(nama_wisata), lokasi_wisata FROM `wisata` GROUP BY lokasi_wisata ORDER BY COUNT(nama_wisata) DESC LIMIT 1";
    $result = $conn->query($sql);
    $wisata_favorit = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //Wisata
    $sql = "SELECT * FROM wisata";
    $wisata = $conn->query($sql);

    //Hotel
    $sql = "SELECT * FROM hotel";
    $hotel = $conn->query($sql);

    //Transportasi
    $sql = "SELECT * FROM transport";
    $transport = $conn->query($sql);

    //Semua user
    $sql = "SELECT * FROM user WHERE admin=0";
    $user_all = $conn->query($sql);

    if(!$user['admin']) {
        header('Location: '. 'http://localhost/pariwisata/view/main.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello, <?php echo $user['username'] ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/assets.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../assets/assets.js"></script>
</head>
<body>
    <div class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <a class="navbar-brand" href="#" style="color: rgb(86, 61, 124)">Travelpedia</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="main.php"><?php echo $user['fullname'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link">As Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../controller/logout-process.php">Keluar</a>
            </li>
        </ul>
    </div>
    <br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="jumbotron bg-purple text-white">
                    <h1 class="display-4">Administrator have Superpowers</h1>
                    <p style="font-size: 1.4rem"><?php echo $user['fullname'] ?> (Travelpedia Admin)</p>
                </div>
                <p class="display-4" style="font-size: 2rem">Rekap data analis</p>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="card-title display-4"><?php echo $wisata_total['total'] ?></h1>
                                <h2 class="card-title display-4" style="font-size: 2.2rem">Total destinasi wisata</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="card-title display-4"><?php echo $hotel_total['total'] ?></h1>
                                <h2 class="card-title display-4" style="font-size: 2.2rem">Total hotel</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="card-title display-4"><?php echo $transport_total['total'] ?></h1>
                                <h2 class="card-title display-4" style="font-size: 2.2rem">Total transportasi</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="card-title display-4"><?php echo $wisata_favorit['lokasi_wisata'] ?></h1>
                                <h2 class="card-title display-4" style="font-size: 2.2rem">Wisata terbanyak</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <p class="display-4" style="font-size: 2rem">Data Tabel</p>
                <hr>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header text-center">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                Table Wisata
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <table class='table table-bordered'>
                                    <tr>
                                        <th>ID Wisata</th>
                                        <th>Nama Wisata</th>
                                        <th>Lokasi Wisata</th>
                                        <th colspan='2'>Aksi</th>
                                    </tr>
                                    <?php 
                                        while($row = $wisata->fetch_assoc()) {
                                            $id_wisata = $row['id_wisata'];
                                            $nama_wisata = $row['nama_wisata'];
                                            $lokasi_wisata = $row['lokasi_wisata'];
                                            $deskripsi_wisata = $row['deskripsi_wisata'];
                                            $gambar_wisata = $row['gambar_wisata'];
                                            echo 
                                            "<tr>
                                                <td>$id_wisata</td>
                                                <td>$nama_wisata</td>
                                                <td>$lokasi_wisata</td>
                                                <td>
                                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#wisatadelete$id_wisata'>
                                                        Delete
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#wisataupdate$id_wisata'>
                                                        Update
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class='modal fade' id='wisatadelete$id_wisata' >
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header bg-danger text-white'>
                                                            <h4 class='modal-title'>Hapus data wisata $nama_wisata?</h4>
                                                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            Data ini akan dihapus secara permanent.
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <form action='../controller/delete-wisata-process.php' method='post'>
                                                                <input type='hidden' name='id_delete' value='$id_wisata' />
                                                                <button type='submit' class='btn btn-danger'>Lanjutkan</button>
                                                            </form>
                                                            <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='modal fade' id='wisataupdate$id_wisata' >
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header bg-info text-white'>
                                                            <h4 class='modal-title'>Update data wisata $nama_wisata?</h4>
                                                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form action='../controller/update-wisata-process.php' method='post'>
                                                                <input type='hidden' name='id_update' value='$id_wisata' />
                                                                <input class='form-control' type='text' name='nama_wisata' value='$nama_wisata' required/>
                                                                <br>
                                                                <input class='form-control' type='text' name='lokasi_wisata' value='$lokasi_wisata' required/>
                                                                <br>
                                                                <textarea class='form-control' name='deskripsi_wisata' required>$deskripsi_wisata</textarea>
                                                                <br>
                                                                <input class='form-control' type='text' name='gambar_wisata' value='$gambar_wisata' required/>
                                                                <br>
                                                                <button type='submit' class='btn btn-primary'>Update data</button>
                                                                <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header text-center">
                            <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                                Table Hotel
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <table class='table table-bordered'>
                                    <tr>
                                        <th>ID Hotel</th>
                                        <th>Nama Hotel</th>
                                        <th>Lokasi Hotel</th>
                                        <th>Kapasitas Hotel</th>
                                        <th colspan='2'>Aksi</th>
                                    </tr>
                                    <?php 
                                        while($row = $hotel->fetch_assoc()) {
                                            $id_hotel = $row['id_hotel'];
                                            $nama_hotel = $row['nama_hotel'];
                                            $lokasi_hotel = $row['lokasi_hotel'];
                                            $kapasitas_hotel = $row['kamar'];
                                            $deskripsi_hotel = $row['deskripsi_hotel'];
                                            $gambar_hotel = $row['photo_hotel'];
                                            echo
                                            "<tr>
                                                <td>$id_hotel</td>
                                                <td>$nama_hotel</td>
                                                <td>$lokasi_hotel</td>
                                                <td>$kapasitas_hotel</td>
                                                <td>
                                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#hoteldelete$id_hotel'>
                                                        Delete
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#hotelupdate$id_hotel'>
                                                        Update
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class='modal fade' id='hoteldelete$id_hotel' >
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header bg-danger text-white'>
                                                            <h4 class='modal-title'>Hapus data hotel $nama_hotel?</h4>
                                                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            Data ini akan dihapus secara permanent.
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <form action='../controller/delete-hotel-process.php' method='post'>
                                                                <input type='hidden' name='id_delete' value='$id_hotel' />
                                                                <button type='submit' class='btn btn-danger'>Lanjutkan</button>
                                                            </form>
                                                            <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='modal fade' id='hotelupdate$id_hotel' >
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header bg-info text-white'>
                                                            <h4 class='modal-title'>Update data hotel $nama_hotel?</h4>
                                                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form action='../controller/update-hotel-process.php' method='post'>
                                                                <input type='hidden' name='id_update' value='$id_hotel' />
                                                                <input class='form-control' type='text' name='nama_hotel' value='$nama_hotel' required/>
                                                                <br>
                                                                <input class='form-control' type='text' name='lokasi_hotel' value='$lokasi_hotel' required/>
                                                                <br>
                                                                <textarea class='form-control' name='deskripsi_hotel' required>$deskripsi_hotel</textarea>
                                                                <br>
                                                                <input class='form-control' type='text' name='gambar_hotel' value='$gambar_hotel' required/>
                                                                <br>
                                                                <input class='form-control' type='number' name='kapasitas_hotel' value='$kapasitas_hotel' required/>
                                                                <br>
                                                                <button type='submit' class='btn btn-primary'>Update data</button>
                                                                <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header text-center">
                            <a class="card-link" data-toggle="collapse" href="#collapseThree">
                                Table Transport
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <table class='table table-bordered'>
                                    <tr>
                                        <th>ID Transport</th>
                                        <th>Nama Transport</th>
                                        <th>Jenis Transport</th>
                                        <th>Tujuan Transport</th>
                                        <th>Kapasitas</th>
                                        <th colspan='2'>Aksi</th>
                                    </tr>
                                    <?php 
                                        while($row = $transport->fetch_assoc()) {
                                            $id_transport = $row['id_transport'];
                                            $nama_transport = $row['nama_transport'];
                                            $jenis_transport = $row['jenis_transport'];
                                            $tujuan_transport = $row['tujuan_transport'];
                                            $kapasitas_transport = $row['kapasitas'];
                                            $photo_transport = $row['photo_transport'];
                                            echo 
                                            "<tr>
                                                <td>$id_transport</td>
                                                <td>$nama_transport</td>
                                                <td>$jenis_transport</td>
                                                <td>$tujuan_transport</td>
                                                <td>$kapasitas_transport</td>
                                                <td>
                                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#transportdelete$id_transport'>
                                                        Delete
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#transportupdate$id_transport'>
                                                        Update
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class='modal fade' id='transportdelete$id_transport' >
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header bg-danger text-white'>
                                                            <h4 class='modal-title'>Hapus data transport $nama_transport?</h4>
                                                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            Data ini akan dihapus secara permanent.
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <form action='../controller/delete-transport-process.php' method='post'>
                                                                <input type='hidden' name='id_delete' value='$id_transport' />
                                                                <button type='submit' class='btn btn-danger'>Lanjutkan</button>
                                                            </form>
                                                            <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='modal fade' id='transportupdate$id_transport' >
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header bg-info text-white'>
                                                            <h4 class='modal-title'>Update data transport $nama_transport?</h4>
                                                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form action='../controller/update-transport-process.php' method='post'>
                                                                <input type='hidden' name='id_update' value='$id_transport' />
                                                                <input class='form-control' type='text' name='nama_transport' value='$nama_transport' required/>
                                                                <br>
                                                                <input class='form-control' type='text' name='jenis_transport' value='$jenis_transport' required/>
                                                                <br>
                                                                <input class='form-control' type='text' name='tujuan_transport' value='$tujuan_transport' required/>
                                                                <br>
                                                                <input class='form-control' type='number' name='kapasitas_transport' value='$kapasitas_transport' required/>
                                                                <br>
                                                                <input class='form-control' type='text' name='photo_transport' value='$photo_transport' required/>
                                                                <br>
                                                                <button type='submit' class='btn btn-primary'>Update data</button>
                                                                <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header text-center">
                            <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                Table User
                            </a>
                        </div>
                        <div id="collapseFour" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <table class='table table-bordered'>
                                    <tr>
                                        <th>ID User</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nama Pengguna</th>
                                        <th>Email</th>
                                        <th colspan='2'>Aksi</th>
                                    </tr>
                                    <?php 
                                        while($row = $user_all->fetch_assoc()) {
                                            $id_user_all = $row['id_user'];
                                            $nama_user_all = $row['fullname'];
                                            $username_user_all = $row['username'];
                                            $email_user_all = $row['email'];
                                            echo 
                                            "<tr>
                                                <td>$id_user_all</td>
                                                <td>$nama_user_all</td>
                                                <td>$username_user_all</td>
                                                <td>$email_user_all</td>
                                                <td>
                                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#userdelete$id_user_all'>
                                                        Delete
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#userupdate$id_user_all'>
                                                        Update
                                                    </button>
                                                </td>
                                                </tr>
                                                <div class='modal fade' id='userdelete$id_user_all' >
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header bg-danger text-white'>
                                                                <h4 class='modal-title'>Hapus data user $nama_user_all?</h4>
                                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                Data ini akan dihapus secara permanent.
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <form action='../controller/delete-user-process.php' method='post'>
                                                                    <input type='hidden' name='id_delete' value='$id_user_all' />
                                                                    <button type='submit' class='btn btn-danger'>Lanjutkan</button>
                                                                </form>
                                                                <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='modal fade' id='userupdate$id_user_all' >
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header bg-info text-white'>
                                                                <h4 class='modal-title'>Update data user $nama_user_all?</h4>
                                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <form action='../controller/update-user-process.php' method='post'>
                                                                    <input type='hidden' name='id_update' value='$id_user_all' />
                                                                    <input class='form-control' type='text' name='nama_user' value='$nama_user_all' required/>
                                                                    <br>
                                                                    <input class='form-control' type='text' name='username' value='$username_user_all' required/>
                                                                    <br>
                                                                    <input class='form-control' type='email' name='email' value='$email_user_all' required/>
                                                                    <br>
                                                                    <button type='submit' class='btn btn-primary'>Update data</button>
                                                                    <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                            }
                                        ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
            </div>
            <div class="col-md-4 sticky-top">
                <div class="card bg-primary text-white">
                    <div class="card-header">
                        <h3 class="card-title" style='font-weight: 300'>Tambahkan Wisata</h3>
                    </div>
                    <div class="card-body">
                        <p class='card-text'>Dengan menggunakan fitur ini anda akan dapat dengan mudah untuk menambahkan beberapa wisata baru di lokasi yang anda tentukan</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" data-toggle='modal' data-target='#wisataModal'>Tambah wisata</button>
                    </div>
                </div>
                <br>
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <h3 class="card-title" style='font-weight: 300'>Tambahkan Hotel</h3>
                    </div>
                    <div class="card-body">
                        <p class='card-text'>Dengan menggunakan fitur ini anda akan dapat dengan mudah untuk menambahkan beberapa hotel baru di lokasi yang anda tentukan</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger" data-toggle='modal' data-target='#hotelModal'>Tambah hotel</button>
                    </div>
                </div>
                <br>
                <div class="card bg-info text-white">
                    <div class="card-header">
                        <h3 class="card-title" style='font-weight: 300'>Tambahkan Transport</h3>
                    </div>
                    <div class="card-body">
                        <p class='card-text'>Dengan menggunakan fitur ini anda akan dapat dengan mudah untuk menambahkan beberapa jurusan transportasi baru di lokasi yang anda tentukan</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info" data-toggle='modal' data-target='#transportModal'>Tambah transport</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="wisataModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title">Tambahkan data wisata baru</h4>
                </div>
                <div class="modal-body">
                    <form action='../controller/create-wisata-process.php' method='post'>
                        <input class="form-control" type="text" name="nama_wisata" placeholder="Nama wisata" required/>
                        <br>
                        <input class="form-control" type="text" name="lokasi_wisata" placeholder="Lokasi wisata" required/>
                        <br>
                        <textarea class="form-control" name="deskripsi_wisata" placeholder="Deskripsi wisata" required></textarea>
                        <br>
                        <input class="form-control" type="text" name="gambar_wisata" placeholder="Link gambar wisata" required/>
                        <br>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="hotelModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h4 class="modal-title">Tambahkan data hotel baru</h4>
                </div>
                <div class="modal-body">
                    <form action='../controller/create-hotel-process.php' method='post'>
                        <input class="form-control" type="text" name="nama_hotel" placeholder="Nama hotel" required/>
                        <br>
                        <input class="form-control" type="text" name="lokasi_hotel" placeholder="Lokasi hotel" required/>
                        <br>
                        <textarea class="form-control" name="deskripsi_hotel" placeholder="Deskripsi hotel" required></textarea>
                        <br>
                        <input class="form-control" type="text" name="gambar_hotel" placeholder="Link gambar hotel" required/>
                        <br>
                        <input class="form-control" type="number" name="kapasitas_hotel" placeholder="Kapasitas hotel" required/>
                        <br>
                        <button type="submit" class="btn btn-danger">Kirim</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>              
                </div>
            </div>
        </div>
    </div>
    <div id="transportModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h4 class="modal-title">Tambahkan data transport baru</h4>
                </div>
                <div class="modal-body">
                    <form action='../controller/create-transport-process.php' method='post'>
                        <input class="form-control" type="text" name="nama_transport" placeholder="Nama transport" required/>
                        <br>
                        <input class="form-control" type="text" name="jenis_transport" placeholder="Jenis transport" required/>
                        <br>
                        <input class="form-control" type="text" name="tujuan_transport" placeholder="Tujuan transport" required/>
                        <br>
                        <input class="form-control" type="text" name="gambar_transport" placeholder="Link gambar hotel" required/>
                        <br>
                        <input class="form-control" type="number" name="kapasitas_transport" placeholder="Kapasitas transport" required/>
                        <br>
                        <button type="submit" class="btn btn-info">Kirim</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>   
                </div>
            </div>
        </div>
    </div>
</body>
</html>