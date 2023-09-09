<?php 
session_start();
include '../layout/cekLogin.php';//Cek apakah user sudah login atau belum

require '../connection/connection.php';

$query = "SELECT * FROM anime";
$result = mysqli_query($conn,$query);

$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <?php include '../layout/css.php' ?>
    <style>
    .container tbody img {
        width: 100px;
        height: 100px;
    }

    .container table {
        border-radius: 10px;
        width: 1000px;
        margin-top: 20px;
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

    <!-- Chek Data Kosong start -->
    <?php //if(!empty($cek)) { ?>
    <form action="updateAnime.php" method="post">
        <div class="container">
            <center>
                <table class="table table-striped table-responsive mt-2 data">
                    <thead class="bg-info">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Genre</th>
                            <th>Studio</th>
                            <th>Rating</th>
                            <th>Source</th>
                            <th>Tanggal Ditambahkan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($data = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th><?php echo $i++ ?></th>
                            <th><?php echo $data['judul'] ?></th>
                            <th><?php echo $data['genre'] ?></th>
                            <th><?php echo $data['studio'] ?></th>
                            <th><?php echo $data['rating'] ?></th>
                            <th><?php echo $data['source'] ?></th>
                            <th><?php echo $data['tanggal_tambah'] ?></th>
                            <th>
                                <img src="../src/upload/<?php echo $data['foto'] ?>" alt="" class="rounded">
                            </th>
                            <th>
                                <button type="submit" name="edit" class="btn btn-warning btn-sm m-1"
                                    value="<?php echo $data['id']?>">
                                    Edit
                                </button>
                                <a href="../logic/tolakUser.php?tolak=<?php echo $data['id'] ?>"
                                    class="btn btn-dark btn-sm m-1">Hapus</a>
                            </th>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </center>
        </div>
    </form>
    <?php //}else { ?>
    <!-- <div class="container">
        <h1 class="text-center" style="margin-top: 100px;">Data Kosong</h1>
    </div> -->
    <?php //} ?>

    <!-- Include Js -->
    <?php include '../layout/js.php' ?>
</body>

</html>