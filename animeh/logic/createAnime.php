<?php 
session_start();
require '../connection/connection.php';

if(isset($_POST['submit'])) {
//Jadikan Array ke String
$genre = implode(",", $_POST['genre']);
//Chek text aman dari charakter HTML
$judul = htmlspecialchars($_POST['judul']);
$rating = htmlspecialchars($_POST['rating']);
$source = htmlspecialchars($_POST['source']);
$studio = htmlspecialchars($_POST['studio']);
$sinopsis = htmlspecialchars($_POST['sinopsis']);
$tgl =   date('l F Y, h:i:s A');



//Tambahkan Gambar
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
        
        // var_dump($error);exit;



// var_dump($genre);
// var_dump($judul);
// var_dump($rating);
// var_dump($source);
// var_dump($studio);
// var_dump($sinopsis);exit;

//Query Insert
$query = "INSERT INTO anime(id,judul,genre,sinopsis,studio,rating,source,tanggal_tambah,foto) 
                                VALUES(
                                '',
                                '$judul',
                                '$genre',
                                '$sinopsis',
                                '$studio',
                                '$rating',
                                '$source',
                                '$tgl',
								'$namaFileBaru'
                                )";
    //Chek apakah data bernilai true dan masukkan di database
    if(mysqli_query($conn,$query)){
        $_SESSION['status'] = "Anime baru berhasil di tambahkan";
        header('Location:../views/index.php');
    }else{
        $_SESSION['status'] = "Anime baru gagal di tambahkan";
        header('Location:../views/createAnime.php');
    }
}else {
    header('Location:../index.php');
}


?>