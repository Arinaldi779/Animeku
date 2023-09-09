<?php 
session_start();
require '../connection/connection.php';

if(isset($_POST['terima'])) {
    $id = $_POST['id'];

    $query = "UPDATE user SET statusLogin = 1 WHERE id = '$id'";
    $update = mysqli_query($conn, $query);
    if($update) {
        $_SESSION['status'] = "User telah diterima";
        header('Location:../views/userControl.php');
    }
}else {
    header('Location:../views/');
}

?>