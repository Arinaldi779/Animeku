<?php 
session_start();
include '../layout/cekLogin.php';//Cek apakah user sudah login atau belum
require '../connection/connection.php';

$query = mysqli_query($conn, "SELECT * FROM anime");
$cek = mysqli_num_rows($query);
// var_dump($_SESSION['id']);exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include '../layout/css.php' ?>
    <link rel="stylesheet" href="../src/css/style.css">
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
                                            judul LIKE '%{$_GET['cari']}%' OR 
                                            studio LIKE '%{$_GET["cari"]}%' OR
                                            genre LIKE '%{$_GET["cari"]}%'
                                            ");
                                            $cari = $_GET['cari'];
        }

    ?>
    <!-- Cari data dari form search di navbar end -->

    <!-- Chek Data Kosong start -->
    <?php if(!empty($cek)) { ?>
    <form action="../logic/insertBookmark.php" method="post">
        <div class="container mt-1">
            <div class="row m-1">
                <?php while($data = mysqli_fetch_assoc($query)) { ?>
                <div class="col-md-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../src/upload/<?php echo $data['foto'] ?>" class="img-fluid rounded-start"
                                    alt="Thumbnail"
                                    style="min-height: 230px;max-height: 300px;max-width: 125px;min-width: 120px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                                    <p class="card-text">&#11088;<?php echo $data['rating']; ?></p>
                                    <p class="card-text"><?php echo $data['genre']; ?></p>
                                    <p class="card-text">
                                        <a href="tonton.php?id=<?php echo $data['id'] ?>" class="btn btn-info btn-sm"><i
                                                class="fa fa-info-circle m-1" aria-hidden="true"></i>Tonton</a>
                                        <button class="btn btn-warning btn-sm" name="bookmark" type="submit"
                                            value="<?php echo $data['id'] ?>"><i class="fa fa-bookmark"
                                                aria-hidden="true"></i></button>
                                    </p>
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
    </form>
    <?php } ?>
    <!-- End chek data kosong -->
    <!--Container Main end-->
    <?php include '../layout/js.php' ?>
</body>

</html>