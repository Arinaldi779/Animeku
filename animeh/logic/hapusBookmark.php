<?php 
session_start();
require '../connection/connection.php';
if(isset($_GET['data'])) {
    $data = $_GET['data'];
    $query = "DELETE FROM bookmark WHERE id_bookmark = '$data'";
    $result = mysqli_query($conn, $query);
    if($result){
        $_SESSION['status'] = "Sudah dihapus dari bookmark";
        header('Location:../views/');
    }
}
?>