<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inventaris App</title>

<!-- Icon -->
<link rel="shortcut icon" href="" type="image/x-icon" />

<!-- CSS -->
<link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
<link rel="stylesheet" href="assets/vendors/select2/css/select2.min.css" />
<link rel="stylesheet" href="assets/vendors/datatable/datatables.min.css" />
<link rel="stylesheet" href="assets/vendors/datepicker/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="assets/css/main.css" />
<link rel="stylesheet" href="assets/css/mod.css" />
<link rel="stylesheet" href="assets/css/media.css" />

</head>
<body>
<div class="loading">
    <span></span>
    <span></span>
    <span></span>
</div>
<header class="header-wrapper">
    <div class="header-inline">
        <div class="header-left">
            <div class="webTitle justify-content-center">
                <h1>
                    <a href="index.php">                        
                        Inventaris<span>APP</span>
                    </a>
                </h1>
            </div>
            <div class="left-menu-icon fa fa-bars"></div>
        </div>
        <div class="header-right">
            <div class="navicon-menu user">
                <div class="icon">
                    <img src="assets/img/coding.png" />
                </div>

                <div class="submenu">
                    <div class="profil">
                        <img src="assets/img/coding.png" />
                        <div class="text">
                            <h5><?= $_SESSION['sess_log']['username']; ?></h5>
                            <p class="text-danger">Admin</p>
                            <div class="mt-3 mb-2">
                                <a href="" class="tmb tmb-primary mr-1">Akun</a>
                                <a href="index.php?page=logout" class="tmb tmb-danger logOut">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<nav class="navmenu">
    <h5>
        Main Menu
    </h5>
    <ul id="menu-left">
        <li>
            <a href="index.php" class="active">
                <i class="fa fa-home mr-2"></i> Beranda
            </a>
        </li>
        <li>
            <a href="" class="sembunyi">
                <i class="fa fa-list mr-2"></i> Master Data
            </a>

            <ul>
                <li><a href="index.php?page=data-barang">Barang</a></li>
                <li><a href="index.php?page=satuan">Satuan</a></li>
            </ul>
        </li>
        <li>
            <a href="" class="sembunyi">
                <i class="fa fa-shopping-cart mr-2"></i> Transaksi
            </a>

            <ul>
                <li><a href="index.php?page=penjualan">Penjualan</a></li>
                <li><a href="index.php?page=pembelian">Pembelian</a></li>
            </ul>
        </li>
        <li>
            <a href="" class="sembunyi">
                <i class="far fa-file mr-2"></i> Laporan
            </a>

            <ul>
                <li><a href="index.php?page=laporan-jual">Penjualan</a></li>
            </ul>
        </li>
        <li>
            <a href="index.php?page=pengaturan">
                <i class="fa fa-cog mr-2"></i> Pengaturan
            </a>
        </li>
        <li>
            <a href="index.php?page=logout" class="logOut">
                <i class="fa fa-sign-out-alt mr-2"></i> Keluar
            </a>
        </li>
    </ul>

</nav>

<div class="navinfo">
    <div class="navinfo-left float-left">
       
    </div>
    <div class="navinfo-right float-right">
        <h6 class="mb-0 text-danger"><?= tgl(date('D, d F Y')) ?></h6>
    </div>
</div>

<main class="main">