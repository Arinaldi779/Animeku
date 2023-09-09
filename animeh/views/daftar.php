<?php 
session_start();
// var_dump($_SESSION['status']);exit;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar</title>
    <!-- Include Css Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/css/login.css">
</head>

<body>
    <!-- Form Start -->
    <form action="../logic/daftarUser.php" method="post" autocomplete="none" enctype="multipart/form-data">
        <div class="container shadow-lg">
            <h1 class="blockquote text-center" style="color:white; position: relative; top: 5px;">Daftar</h1>
            <!-- Include Alert start -->
            <?php if(isset($_SESSION['status'])){ ?>
            <div class="alert alert-dismissible fade show text-white text-start" role="alert"
                style="z-index: 2;width:360px;height: 50px;background-color: red;">
                <?php 
                    echo $_SESSION['status']; 
                    unset($_SESSION['status']);   
                    ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
            <!-- Include Alert end -->
            <!-- Username -->
            <div class="form-floating">
                <input type="text" name="username" id="floatingInput" class="form-control mb-2" required autofocus
                    placeholder="Username">
                <label for="floatingInput"><i class="fa fa-user m-1"></i>Username</label>
            </div>
            <!-- Password -->
            <div class="form-floating password">
                <input type="password" name="password" id="password" class="form-control mb-2" placeholder="Password"
                    required>
                <label for="password"><i class="fa fa-lock m-1"></i>Password</label>
            </div>
            <!-- nama -->
            <div class="form-floating">
                <input type="text" name="nama" id="floatingInput" class="form-control mb-2" required placeholder="Nama">
                <label for="floatingInput"><i class="fa fa-user-circle m-1"></i>Nama Lengkap</label>
            </div>
            <!-- Email -->
            <div class="form-floating">
                <input type="email" name="email" id="floatingInput" class="form-control mb-2" required
                    placeholder="Email">
                <label for="floatingInput"><i class="fa fa-envelope m-1"></i>Email</label>
            </div>
            <!-- Jenis Kelamin -->
            <div class="form-floating">
                <select class="form-select mb-2" name="jk" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option selected>--JENIS KELAMIN--</option>
                    <option value="Laki-Laki">Laki Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <label for="floatingSelect">Pilih Jenis Kelamin</label>
            </div>
            <!-- Foto -->
            <div class="form-floating">
                <input type="file" name="foto" id="floatingInput" class="form-control" required placeholder="Foto">
                <label for="floatingInput"><i class="fa fa-image m-1"></i>Foto</label>
            </div>
            <!-- Submit -->
            <button type="submit" name="daftar" class="mt-3 btn btn-warning">
                Daftar
            </button>
            <p class="blockout text-white">Sudah punya akun? <a href="../index.php"
                    class="text-decoration-none text-warning">Login
                    Disini</a></p>
        </div>
    </form>
    <!-- Include JS bootstrap -->
    <?php include '../layout/js.php' ?>
</body>

</html>