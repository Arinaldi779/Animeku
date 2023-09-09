<?php 
session_start();
include '../layout/cekLogin.php';//Cek apakah user sudah login atau belum
require '../connection/connection.php';

$query = mysqli_query($conn,"SELECT * FROM genre");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include Css -->
    <?php include '../layout/css.php' ?>
    <link rel="stylesheet" href="../src/css/genres.css">
</head>

<body id="body-pd">
    <!-- Include Sidebar Start -->
    <?php include '../layout/sidebar.php' ?>
    <!-- Include Sidebar End -->

    <h2>Genre</h2>
    <?php if($_SESSION['level'] == "admin") { ?>
    <a href="createGenre.php" class="btn btn-success btn-sm mb-4">Tambah Genre<i
            class='bx bx-plus-circle nav_icon'></i></a>
    <?php } ?>

    <!-- Main Content Start -->
    <div class="container">
        <div class="row">
            <?php while($data = mysqli_fetch_assoc($query)) { ?>
            <div class="col-md-3">
                <form action="genre.php" method="get">
                    <p>
                        <button type="submit" name="cari" class="text-white"
                            value="<?php echo  $data['nama_genre']?>"><?php echo $data['nama_genre']; ?></button>
                    </p>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Main Content End -->

    <!-- Include Js -->
    <?php include '../layout/js.php' ?>
</body>

</html>