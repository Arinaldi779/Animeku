<?php 
session_start();
include '../layout/cekLogin.php';//Cek apakah user sudah login atau belum
include '../layout/cekLevel.php';//Cek apakah user mencoba masuk lewat url
require '../connection/connection.php';
$query = mysqli_query($conn, "SELECT * FROM anime");
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
    <form action="../logic/tambahVideo.php" method="post">
        <div class="container shadow-lg">
            <div class="row m-5">
                <div class="col-md-6 col">
                    <!-- Episode -->
                    <div class="form-floating mt-1">
                        <input type="number" class="form-control" name="eps" id="eps" placeholder="eps" value="">
                        <label for="eps">Episode</label>
                    </div>
                    <!-- Judul Episode -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="judulEps" id="judulEps" placeholder="createGenre"
                            value="">
                        <label for="judulEps">Judul Episode</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Judul Animenya -->
                    <div class="form-floating mt-1">
                        <select name="anime" id="" class="form-select">
                            <option selected>----Pilih Anime----</option>
                            <?php while($data = mysqli_fetch_assoc($query)) { ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['judul']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Link/Video -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="videoLink" id="createGenre"
                            placeholder="createGenre" value="">
                        <label for="createGenre">Link Video</label>
                    </div>
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