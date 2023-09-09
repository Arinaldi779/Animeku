<?php 
session_start();
require '../connection/connection.php';

if(isset($_GET['tolak'])) {
    $id = $_GET['tolak'];
    $select = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
    $selects = mysqli_fetch_assoc($select);

    $query = "DELETE FROM user WHERE id = '$id'";
    if(mysqli_query($conn, $query)){
        unlink('../src/upload/'.$selects['foto']);
        $_SESSION['status'] = "User telah ditolak";
        header('Location:../views/userControl.php');
    }
}else {
    header('Location:../');
}

?>