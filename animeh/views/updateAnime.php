<?php 
session_start();
include '../layout/cekLogin.php';//Cek apakah user sudah login atau belum
include '../layout/cekLevel.php';//Cek apakah user mencoba masuk lewat url
if(isset($_POST['edit'])) {
    $id = $_POST['edit'];
require '../connection/connection.php';
//Query select genre
$query = mysqli_query($conn, "SELECT * FROM genre");
$queryShow = mysqli_query($conn, "SELECT * FROM anime WHERE id = '$id'");
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
    <style>
    .container-update {
        display: flex;
        justify-content: end;
        margin-top: 120px;
        width: 1000px;
        height: 400px;
        border: 1px transparent;
        border-radius: 10px;
        background-color: #ffda60;
        overflow-y: auto;
    }

    .container-update button {
        height: 40px;
    }

    .container-update textarea {
        resize: none;
        width: 270px;
        height: 100px
    }
    </style>
</head>

<body id="body-pd">

    <!-- Include Sidebar Start -->
    <?php include '../layout/sidebar.php' ?>
    <!-- Include Sidebar End -->

    <?php while($show = mysqli_fetch_assoc($queryShow)){ ?>
    <!-- Main Content Start -->
    <form action="../logic/updateAnime.php" method="post" enctype='multipart/form-data'>
        <div class="container-update update shadow-lg">
            <div class="row m-5">
                <div class="col-md-5 col">
                    <input type="hidden" name="id" value="<?php echo $show['id'] ?>">
                    <input type="hidden" name="gambarLama" value="<?php echo $show['foto'] ?>">
                    <!-- Judul Anime -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul"
                            value="<?php echo $show['judul'] ?>" autofocus required>
                        <label for="judul">Judul Anime</label>
                    </div>
                    <!-- Rating Anime -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="rating" id="rating" placeholder="rating"
                            value="<?php echo $show['rating'] ?>" require>
                        <label for="rating">Rating Anime</label>
                    </div>
                    <!-- Source Anime -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="source" id="source" placeholder="source"
                            value="<?php echo $show['source'] ?>" required>
                        <label for="source">Source Anime</label>
                    </div>
                    <!-- Studio Anime -->
                    <div class="form-floating mt-1">
                        <input type="text" class="form-control" name="studio" id="studio" placeholder="studio"
                            value="<?php echo $show['studio'] ?>" required>
                        <label for="studio">Studio Anime</label>
                    </div>
                </div>

                <div class="col-md-7 col">
                    <!-- Sinopsis -->
                    <div class="form-floating mt-1">
                        <textarea name="sinopsis" id="sinopsis" class="form-control" required
                            placeholder="Sinposis"><?php echo $show['sinopsis'] ?></textarea>
                        <label for="">Sinopsis Anime</label>
                    </div>
                    <!-- Foto -->
                    <div class="form-floating mt-1">
                        <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Foto">
                        <label for="gambar">gambar Anime</label>
                        <img src="../src/upload/<?php echo $show['foto'] ?>" alt="" class="rounded img mt-1"
                            width="100px" height="120px">
                    </div>
                </div>
            </div>
            <?php } ?>

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
<?php 
    }else {
        header('Location:index.php');
    }

?>