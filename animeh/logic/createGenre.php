<?php 
require '../connection/connection.php';

//Chek text aman dari charakter HTML
$newGenre = htmlspecialchars($_POST['createGenre']);

//Query Insert
$query = "INSERT INTO genre VALUES('','$newGenre')";
    //Chek apakah data bernilai true dan masukkan di database
    if(mysqli_query($conn,$query)){
        echo "
        <script>
        alert('Genre baru berhasil di tambahkan');
        window.location.href = '../views/genres.php'
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Genre baru gagal di tambahkan');
        window.location.href = '../views/createGenre.php'
        </script>
        ";
    }


?>