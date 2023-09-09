<?php 
session_start();
require '../connection/connection.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $genre = implode(",", $_POST['genre']);
    //Chek text aman dari charakter HTML
    $judul = htmlspecialchars($_POST['judul']);
    $rating = htmlspecialchars($_POST['rating']);
    $source = htmlspecialchars($_POST['source']);
    $studio = htmlspecialchars($_POST['studio']);
    $sinopsis = htmlspecialchars($_POST['sinopsis']);
    $tgl =   date('l F Y, h:i:s A');
    $gambarLama = $_POST['gambarLama'];

    //Cek apakah user/admin memasukkan gambar baru
    if($_FILES['gambar']['error'] === 4) {
        $namaFileBaru = $gambarLama;
    }else {
        unlink('../src/upload/'.$gambarLama);
        $namaFile   = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        if ($error === 4) { 
                $_SESSION['status'] = "Silahkan Upload Gambar";
                header('Location:../views/createAnime.php');
        }
		//Cek ekstensi file/
        $ekstensiGambarValid = ['jpg','jpeg','png','gif'];
        $ekstensiGambar      = explode('.',$namaFile);
        $ekstensiGambar      = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar,$ekstensiGambarValid)) {
            $_SESSION['status'] = "Yg anda upload bukan gambar";
            header('Location:../views/createAnime.php');
        }
		// Cek ukuran file/foto
        if ($ukuranFile > 3000000) {
            $_SESSION['status'] = "Ukuran gambar terlalu besar";
            header('Location:../views/createAnime.php');
        }
		// Buat nama file/foto baru untuk masuk ke database
        $namaFileBaru = $judul;
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
		// Masukkan file/foto yang
        move_uploaded_file($tmpName,'../src/upload/' . $namaFileBaru);

    }
        $query = "UPDATE anime SET
                                judul           = '$judul',
                                genre           = '$genre',
                                sinopsis        = '$sinopsis',
                                studio          = '$studio',
                                rating          = '$rating',
                                source          = '$source',
                                tanggal_tambah  = '$tgl',
                                foto            = '$namaFileBaru'
                                WHERE id        = '$id'
                                ";
        //Chek apakah data bernilai true dan masukkan di database
        if(mysqli_query($conn,$query)){
            $_SESSION['status'] = "Anime berhasil di edit";
            header('Location:../views/index.php');
        }else{
            $_SESSION['status'] = "Anime gagal di edit";
            header('Location:../views/updateAnime.php');
        }
}else {
    header('Location:../index.php');
}


?>