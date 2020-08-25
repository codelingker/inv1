
<section class="row mt-4">
    <div class="col-sm-3">
        <a href="index.php?page=data-barang" class="card shadow border-0 border-left-primary ">
            <div class="card-body">
                <h6>Etalase Barang</h6>
                <h4><?= total_barang(); ?></h4>
                <div class="card-icon-d1 far fa-user"></div>
            </div>
        </a>
    </div> 
    
    <div class="col-sm-3">
        <a href="index.php?page=laporan-jual" class="card shadow border-0 border-left-info ">
            <div class="card-body">
                <h6>Transaksi Barang hari ini</h6>
                <h4><?= total_penjualan(); ?></h4>
                <div class="card-icon-d1 far fa-user"></div>
            </div>
        </a>
    </div> 
    
    <div class="col-sm-3">
        <a href="index.php?page=laporan-jual" class="card shadow border-0 border-left-danger ">
            <div class="card-body">
                <h6>Barang terjual hari ini</h6>
                <h4><?=  total_brg_terjual_today(); ?></h4>
                <div class="card-icon-d1 fa fa-shopping-cart"></div>
            </div>
        </a>
    </div> 

    <div class="col-sm-3">
        <a href="index.php?page=laporan-jual" class="card shadow border-0 border-left-success ">
            <div class="card-body">
                <h6>Total Barang Terjual</h6>
                <h4><?=  total_brg_terjual(); ?></h4>
                <div class="card-icon-d1 fa fa-shopping-cart"></div>
            </div>
        </a>
    </div>         
</section> 
