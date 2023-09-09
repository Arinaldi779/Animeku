<?php 
session_start();
include '../layout/cekLogin.php';//Cek apakah user sudah login atau belum
require '../connection/connection.php';

$idTonton = $_GET['id'];
$queryAnime = mysqli_query($conn, "SELECT * FROM anime WHERE id = '$idTonton'");
$queryEpisode = $query = mysqli_query($conn, "SELECT * FROM video a JOIN anime b ON a.anime_id = b.id WHERE b.id = '$idTonton'");
$cek = mysqli_num_rows($queryAnime);
$cek_eps = mysqli_num_rows($queryEpisode);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tonton</title>
    <?php include '../layout/css.php' ?>
    <style>
    .container {
        border-radius: 10px;
        background-color: white;
    }

    .container img {
        height: 260px;
        width: 200px;
    }

    .parent {
        padding: 30px;
    }

    .eps {
        color: black;
        border: 1px solid black;
        background-color: #AFA5D9;
        width: 60px;
        height: 35px;
        border-radius: 3px;
    }

    .eps a {
        color: black;
    }

    .eps a:hover {
        color: white;
    }

    .eps:hover {
        background-color: #4723D9;

    }
    </style>
</head>

<body id="body-pd">



    <!-- Include Alert start -->
    <?php include '../layout/alert.php' ?>
    <!-- Include Alert end -->

    <!-- Include Sidebar Start -->
    <?php include '../layout/sidebar.php' ?>
    <!-- Include Sidebar End -->

    <!-- Include Control Panel Admin start -->
    <?php include '../layout/controlAdmin.php' ?>
    <!-- Include Control Panel Admin end -->

    <!-- Cari data dari form search di navbar -->
    <?php 
    
    if(isset($_GET['cari'])){
             $query =  mysqli_query($conn, "SELECT * FROM anime WHERE  
                                            judul LIKE '%{$_GET["cari"]}%' OR 
                                            studio LIKE '%{$_GET["cari"]}%'
                                            ");
                                            $cari = $_GET['cari'];
        }

    ?>

    <?php if($cek > 0 ) {?>
    <?php if($data = mysqli_fetch_assoc($queryAnime)) { ?>
    <div class="container shadow-lg mb-5">
        <h3 class="blockout text-center pt-2"><?php echo $data['judul']; ?></h3>
        <div class="row parent m-3">
            <div class="col-md-4">
                <img src="../src/upload/<?php echo $data['foto'] ?>" class="rounded" alt="">
            </div>
            <div class="col-md-4">
                <p class="badge bg-warning fs-5"><?php echo $data['sinopsis']; ?></p>
                <p class="badge bg-success fs-5"><?php echo $data['source']; ?></p>
                <p class="badge bg-primary fs-5">&#11088;<?php echo $data['rating']; ?></p><br>
                <p class="badge bg-danger"><?php echo $data['genre']; ?></p>
                <h4 class="blockout-header">Sinopsis</h4>
                <p><?php echo $data['sinopsis']; ?></p>
            </div>
            <?php } ?>

            <?php if($cek_eps) { ?>
            <?php while($eps = mysqli_fetch_assoc($queryEpisode)) { ?>
            <div class="col-md-4 eps shadow-lg">
                <p class="text-center pt-1"><a href="episode.php?data=<?php echo $eps['id_video'] ?>" target="_blank"
                        rel="noopener noreferrer" class=""><?php echo $eps['eps']; ?></a></p>
            </div>
            <?php } ?>
            <?php }else { ?>
            <div class="container">
                <h4 class="text-center" style="margin-top: 10px;">Belum Ada Episode</h4>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php }else { ?>
    <div class="container">
        <h1 class="text-center" style="margin-top: 100px;">Data Kosong</h1>
    </div>
    <?php } ?>

    <!-- Include Js -->
    <?php include '../layout/js.php' ?>
    <!-- js -->
</body>

</html>