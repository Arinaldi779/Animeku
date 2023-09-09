<?php 
session_start();
require '../connection/connection.php';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass     = $_POST['password'];
    $password = md5($pass);

    //Jalankan Query Select 
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $row    = mysqli_fetch_assoc($result);
    //Cek apakah username dan password yang dimasukkan user ada di database
    $cek = mysqli_num_rows($result);
    // var_dump($cek);exit;
    if($cek > 0) {
        if($row['statusLogin'] == 1) {
            $_SESSION['id']   = $row['id'];
            $_SESSION['nama']   = $row['nama'];
            $_SESSION['foto']   = $row['foto'];
            $_SESSION['level']   = $row['level'];
            $_SESSION['status']  = "Selamat datang". " ". $_SESSION['nama'];
            
            header('Location: ../views/index.php');
        }else {
            $_SESSION['status'] = "Tunggu Admin menerima registrasi anda";
            header('Location:../');
        }
        
    }else {
        $_SESSION['status'] = "Username atau Password anda Salah";
        header('Location:../');
    }

}

?>