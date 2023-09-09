<!-- Sidebar start -->
<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <form class="d-flex" role="search">
        <input class="form-control me-2" name="cari" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="header_img"> <a href="../views/"><img src="../src/upload/<?php echo $_SESSION['foto'] ?>" alt=""> </a>
    </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i>
                <span class="nav_logo-name">Animehku>_< </span>
            </a>
            <div class="nav_list">
                <a href="index.php" class="nav_link active"> <i class='bx bx-home nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="genres.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Genre</span>
                </a>
                <a href="bookmark.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name">Bookmark</span>
                </a>
                <?php if($_SESSION['level'] == 'admin') { ?>
                <a href="createAnime.php" class="nav_link"> <i class='bx bx-plus-circle nav_icon'></i>
                    <span class="nav_name">Tambah</span>
                </a>
                <?php } ?>
                <!-- <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span
                            class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link"> <i
                            class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span
                            class="nav_name">Stats</span>
                    </a> -->
            </div>
        </div>
        <div>
            <a href="../logic/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </div>
    </nav>
</div>
<!-- End Sidebar -->