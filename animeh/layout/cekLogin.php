<?php 
if($_SESSION['level'] == "") {
    $_SESSION['status'] = "Silahkan login terlebih dahulu!!!";
    header('Location:../');
}

?>