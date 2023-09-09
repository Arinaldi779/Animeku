<?php 
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Include Css Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="src/css/login.css">
</head>

<body>


    <!-- Form Start -->
    <form action="logic/loginCek.php" method="post" autocomplete="none">
        <div class="container shadow-lg">
            <h1 class="blockquote text-center" style="color:white; position: relative; top: 5px;">Login</h1>
            <!-- Alert Start -->
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
            <!-- Alert End -->
            <!-- Username -->
            <div class="form-floating username">
                <input type="username" name="username" id="floatingInput" class="form-control mb-5" required autofocus
                    placeholder="Username">
                <label for="floatingInput"><i class="fa fa-user m-1 y"></i>Username</label>
            </div>
            <!-- Password -->
            <div class="form-floating password">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                    required>
                <label for="password"><i class="fa fa-lock m-1 y"></i>Password</label>
            </div>
            <!-- Submit -->
            <button type="submit" name="login" class="mt-3 btn btn-warning">
                Login
            </button>
            <p class="blockout text-white">Belum punya akun? <a href="views/daftar.php"
                    class="text-decoration-none text-warning">Daftar
                    Disini</a></p>
        </div>
    </form>
    <!-- Include JS bootstrap -->
    <?php include 'layout/js.php' ?>
</body>

</html>