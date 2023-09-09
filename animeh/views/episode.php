<?php 
session_start();
include '../layout/cekLogin.php';//Cek apakah user sudah login atau belum
require '../connection/connection.php';
$id = $_GET['data'];
$query = mysqli_query($conn , "SELECT * FROM video WHERE id_video = '$id'");
$cek = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php while($data = mysqli_fetch_assoc($query)) { ?>
    <iframe width="560" height="315" src="<?php echo $data['link'] ?>" title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen></iframe>
    <?php } ?>


</body>

</html>