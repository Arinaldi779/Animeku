<?php 
session_start();
include '../layout/cekLogin.php';//Cek apakah user sudah login atau belum
include '../layout/cekLevel.php';//Cek apakah user mencoba masuk lewat url
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
    <style>
    .container {
        margin-top: 100px;
        width: 1000px;
        height: 200px;
        border: 1px transparent;
        border-radius: 10px;
        background-color: #F0EAD6;
    }
    </style>
</head>

<body id="body-pd">

    <!-- Include Sidebar Start -->
    <?php include '../layout/sidebar.php' ?>
    <!-- Include Sidebar End -->

    <!-- Main Content Start -->
    <form action="../logic/createGenre.php" method="post">
        <div class="container shadow-lg">
            <div class="row m-5">
                <div class="col-md-12 col">
                    <!-- Judul Anime -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="createGenre" id="createGenre"
                            placeholder="createGenre" value="">
                        <label for="createGenre">Tambahkan Genre</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
        </div>
    </form>
    <!-- Main Content End -->

    <!-- Include Js  -->
    <?php include '../layout/js.php' ?>
</body>

</html>