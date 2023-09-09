<?php 
session_start();
require '../connection/connection.php';

if(isset($_POST['bookmark'])) {
    $anime = $_POST['bookmark'];
    $user = $_SESSION['id'];

    // var_dump($anime);
    // var_dump($user);exit;

    $query = "INSERT INTO bookmark(id_bookmark,id_anime,nama_user) VALUES ('','$anime','$user');";
    $result = mysqli_query($conn, $query);

    if($result) {
        $_SESSION['status'] = "Sudah ditambahkan ke Bookmark";
        header('Location:../views/');
    }
}else {
    header('Location:../views/');
}


?>