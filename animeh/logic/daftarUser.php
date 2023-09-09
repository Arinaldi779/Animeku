<?php 
session_start();
require '../connection/connection.php';
if(isset($_POST['daftar'])) {
//Ambil data yang dikirim lewat post
$username = htmlspecialchars($_POST['username']);
$pass = htmlspecialchars($_POST['password']);
$password = htmlspecialchars(md5($pass));
$nama = htmlspecialchars($_POST['nama']);
$email = htmlspecialchars($_POST['email']);
$jk = htmlspecialchars($_POST['jk']);
$level = "user";
//Membuat tanggal daftar
$date = date("l Y-m-d H:i:s");


//Mengecek apakah username sudah ada atau belum
$select = "SELECT * FROM user WHERE username = '$username'";
$query_select = mysqli_query($conn, $select);

if(mysqli_num_rows($query_select) > 0) {
            $_SESSION['status'] = "Username sudah Dipakai";
            header('Location: ../views/daftar.php');
        }else {
            //Tambahkan Gambar
            $namaFile   = $_FILES['foto']['name'];
            $ukuranFile = $_FILES['foto']['size'];
            $error = $_FILES['foto']['error'];
            $tmpName = $_FILES['foto']['tmp_name'];
            //Cek apakah gambar di upload
            if ($error === 4) { 
                            $_SESSION['error'] = "Silahkan Upload Gambar";
                            header('Location:../views/daftar.php');
                    }
                    //Cek ekstensi file/
                    $ekstensiGambarValid = ['jpg','jpeg','png','gif'];
                    $ekstensiGambar      = explode('.',$namaFile);
                    $ekstensiGambar      = strtolower(end($ekstensiGambar));
                    if (!in_array($ekstensiGambar,$ekstensiGambarValid)) {
                        $_SESSION['error'] = "Yg anda upload bukan gambar";
                        header('Location:../views/daftar.php');
                    }
                    // Cek ukuran file/foto
                    if ($ukuranFile > 3000000) {
                        $_SESSION['error'] = "Ukuran gambar terlalu besar";
                        header('Location:../views/daftar.php');
                    }
                    // Buat nama file/foto baru untuk masuk ke database
                    $namaFileBaru = $username;
                    $namaFileBaru .= '.';
                    $namaFileBaru .= $ekstensiGambar;
                    // Masukkan file/foto yang
                    move_uploaded_file($tmpName,'../src/upload/' . $namaFileBaru);
                    
            //Query Insert
            $query = "INSERT INTO user(id, username, password, nama,email,jk,foto, tanggalDaftar, level,statusLogin) 
            VALUES ('','$username','$password','$nama','$email','$jk','$namaFileBaru','$date','user','')";
            $result = mysqli_query($conn,$query);
            //Chek apakah data bernilai true dan masukkan di database
            if($result){
            $_SESSION['status'] = "Tunggu permintaan anda diterima admin";
            header('Location: ../index.php');
            }else{
            $_SESSION['status'] = "Akun baru gagal di tambahkan";
            header('Location:../views/daftar.php');
            }
        }
        

        
}else {
    header('Location:../index.php');
}


?>