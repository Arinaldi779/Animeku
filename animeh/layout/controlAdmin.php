<?php if($_SESSION['level'] == "admin") { ?>

<?php 

//Hitung Jumlah users yang di terima
$user = "SELECT * FROM user WHERE level = 'user' AND statusLogin = 1";
$users = mysqli_query($conn, $user);
$hitungUser = mysqli_num_rows($users);

//Hitung Jumlah users yang baru mendaftar
$regis = "SELECT * FROM user WHERE level = 'user' AND statusLogin = 0";
$register = mysqli_query($conn, $regis);
$hitungreg = mysqli_num_rows($register);

//Hitung Jumlah Anime yang sudah di atas
$anime = "SELECT * FROM anime";
$animeh = mysqli_query($conn, $anime);
$hitungAnimeh = mysqli_num_rows($animeh);

?>
<!-- Container Main Start -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Jumlah Yang Mendaftar <?php echo $hitungreg; ?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="regisControl.php">Lihat Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Jumlah Yang Diterima <?php echo $hitungUser; ?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="userControl.php">Lihat Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Jumlah Judul Anime <?php echo $hitungAnimeh; ?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="animeControl.php">Lihat Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Danger Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<!-- Container Main End -->

<?php } ?>