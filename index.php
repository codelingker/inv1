<?php
require_once("configs/koneksi.php");

if(isset($_SESSION['sess_log'])) :

include "views/layouts/header.php";

if(isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'data-barang':
            include "views/barang/data.php";
        break;
        
        case 'ubah-barang':
            include "views/barang/ubah.php";
        break;
        
        case 'pembelian':
            include "views/barang/pembelian.php";
        break;
        
        case 'penjualan':
            include "views/barang/penjualan.php";
        break;
        
        case 'laporan-jual':
            include "views/barang/laporan-jual.php";
        break;
        
        case 'satuan':
            include "views/barang/satuan.php";
        break;
        
        case 'pengaturan':
            include "views/pengaturan.php";
        break;
        
        case 'logout':
            session_destroy();

            echo "
            <script>
                window.location.href = 'login.php';
            </script>
            ";
        break;
        
        default:
            # code...
            break;
    }
} else {
    include "views/beranda.php";
}

include "views/layouts/footer.php";

else:
    echo "
    <script>
        window.location.href = 'login.php';
    </script>
    ";
endif;