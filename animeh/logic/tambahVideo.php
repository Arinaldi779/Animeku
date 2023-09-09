<?php 
session_start();
require '../connection/connection.php';

//Chek text aman dari charakter HTML
$eps = htmlspecialchars($_POST['eps']);
$judulEps = htmlspecialchars($_POST['judulEps']);
$anime = $_POST['anime'];
$link = htmlspecialchars($_POST['videoLink']);
$tgl = $tgl =   date('l F Y, h:i:s A');
//Query Insert
$query = "INSERT INTO video(id_video,eps,judul_eps,anime_id,link,tgl_tmbh) VALUES('','$eps','$judulEps',$anime,'$link','$tgl')";
    //Chek apakah data bernilai true dan masukkan di database
    if(mysqli_query($conn,$query)){
        $_SESSION['status'] = "Episode Baru Berhasil Ditambahkan";
    header('Location:../views');
    }else{
    
    }


?>