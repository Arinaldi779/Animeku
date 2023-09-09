<?php 
session_start();
include '../layout/cekLogin.php';//Cek apakah user sudah login atau belum
include '../layout/cekLevel.php';//Cek apakah user mencoba masuk lewat url
require '../connection/connection.php';
//Query select genre
$query = mysqli_query($conn, "SELECT * FROM genre");
// var_dump($_POST['genre']);
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
    <link rel="stylesheet" href="../src/css/style2.css">
</head>

<body id="body-pd">

    <!-- Include Sidebar Start -->
    <?php include '../layout/sidebar.php' ?>
    <!-- Include Sidebar End -->

    <!-- Main Content Start -->
    <form action="../logic/createAnime.php" method="post" enctype='multipart/form-data'>
        <div class="container shadow-lg">
            <div class="row m-5">
                <div class="col-md-5 col">
                    <!-- Judul Anime -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value=""
                            autofocus required>
                        <label for="judul">Judul Anime</label>
                    </div>
                    <!-- Rating Anime -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="rating" id="rating" placeholder="rating" value=""
                            require>
                        <label for="rating">Rating Anime</label>
                    </div>
                    <!-- Source Anime -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="source" id="source" placeholder="source" value=""
                            required>
                        <label for="source">Source Anime</label>
                    </div>
                    <!-- Studio Anime -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="studio" id="studio" placeholder="studio" value=""
                            required>
                        <label for="studio">Studio Anime</label>
                    </div>
                </div>

                <div class="col-md-7 col">
                    <!-- Sinopsis -->
                    <div class="form-group mt-1">
                        <label for="">Sinopsis Anime</label>
                        <textarea name="sinopsis" id="sinopsis" cols="3" rows="1" class="form-control"
                            required></textarea>
                    </div>
                    <!-- Foto -->
                    <div class="form-floating mt-1">
                        <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Foto">
                        <label for="gambar">gambar Anime</label>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mt-5">
                    <label for="">Genre Anime</label><br>
                    <?php while($data = mysqli_fetch_assoc($query)) { ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="genre[]"
                            value="<?php echo $data['nama_genre'] ?>" id="genre">
                        <label class="form-check-label" for="genre"><?php echo $data['nama_genre']; ?></label>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-sm">Simpan</button>
        </div>
    </form>
    <!-- Main Content End -->

    <!-- Include Js  -->
    <?php include '../layout/js.php' ?>
</body>

</html>