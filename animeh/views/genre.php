<?php 
session_start();
include '../layout/cekLogin.php';//Cek apakah user sudah login atau belum
require '../connection/connection.php';

$cari = $_GET['cari'];
$query1 = mysqli_query($conn, "SELECT * FROM anime");
$data1 = mysqli_fetch_assoc($query1);

// var_dump($data1['genre']);exit;

// if(is_string($data1['genre']) == 1) {
//     $arrGenre = explode(",",$data1['genre']);
// }

// if($a = in_array("$data",$arrGenre))
// {
// $a = $data;
// var_dump($a);exit;
$query = mysqli_query($conn, "SELECT * FROM anime a JOIN genre b ON a.genre = b.nama_genre WHERE 
a.genre = '$cari' ORDER BY a.id ASC ");
$cari = $_GET['cari'];
// $cek = mysqli_num_rows($query);
// var_dump($query);exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include '../layout/css.php' ?>
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body id="body-pd">

    <!-- Include Sidebar Start -->
    <?php include '../layout/sidebar.php' ?>
    <!-- Include Sidebar End -->

    <!--Container Main start-->
    <!-- Mengecek apakah data kosong atau tidak -->
    <?php if(!empty($cek)) { ?>
    <div class="container">
        <div class="row m-1">
            <?php while($data = mysqli_fetch_assoc($query)) { ?>
            <?php
                    var_dump($data);
                    
                    ?>
            <div class="col-md-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../src/upload/<?php echo $data['foto']; ?>" class="img-fluid rounded-start"
                                alt="..."
                                style="min-height: 230px;max-height: 300px;max-width: 125px;min-width: 120px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                                <p class="card-text">&#11088;<?php echo $data['rating']; ?></p>
                                <p class="card-text blockquote-footer"><small class="text-muted">Ditambahkan pada
                                        <b><?php echo $data['tanggal_tambah']; ?></b></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php }else { ?>
    <div class="container">
        <h1 class="text-center" style="margin-top: 100px;">Data Kosong</h1>
    </div>
    <?php } ?>
    <!-- End chek data kosong -->
    <!--Container Main end-->
    <?php include '../layout/js.php' ?>
</body>

</html>