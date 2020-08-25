<?php 
if(isset($_GET['stat'])) :
    if($_GET['stat'] == "berhasil") :
?>

<div class="alert alert-success mb-5">
    <b>Berhasil :) </b> Data Transaksi sudah disimpan.
    <a href="index.php?page=penjualan" class="close fa fa-times"></a>
</div>

<?php endif; endif; ?>


<section class="row">
    <div class="col-md-3">
        <div class="card border-0 shadow border-top-danger">
            <form method="POST" class="card-body">
                <?php 
                
                if(isset($_SESSION['info_cart']['kode']) AND !empty($_SESSION['info_cart']['kode'])) {
                    
                    $kode_transaksi =  base64_decode($_SESSION['info_cart']['kode']);                
                    
                }  

                if(isset($_GET['act'])) {
                    if($_GET['act'] == "bersihkan") {
                        unset($_SESSION['cart']);
                        unset($_SESSION['info_cart']);

                        echo "
                        <script>
                            window.location.href='index.php?page=penjualan';
                        </script>                    
                        ";
                    }

                    if($_GET['act'] == "simpan") {
                        $date = date('d/m/Y');
                        simpan_transaksi($kode_transaksi, $date);

                        foreach($_SESSION['cart'] as $id_barang => $j) {
                            penjualan_barang($kode_transaksi, $id_barang, $j);
                        }

                        unset($_SESSION['cart']);
                        unset($_SESSION['info_cart']);

                        echo "
                        <script>
                            window.location.href='index.php?page=penjualan&stat=berhasil';
                        </script>                    
                        ";
                    }
                }                              
                
                if(isset($_GET['hapus'])) {
                    $hapus = $_GET['hapus'];
                    unset($_SESSION['cart'][$hapus]);
                    echo "
                    <script>
                        window.location.href='index.php?page=penjualan';
                    </script>                    
                    ";
                }

                if(isset($_POST['new'])) {
                    $newCode = $_SESSION['info_cart']['kode'] = base64_encode(invoice());    
                    
                    echo "
                    <script>
                        window.location.href='index.php?page=penjualan';
                    </script>
                    ";
                }

                if(isset($_POST['tambahkan'])) {
                    $id  = $_POST['id'];
                    $jml = $_POST['jml'];

                    $cek = data_barang_byid($id);

                    if(mysqli_num_rows($cek) == 0) {
                        echo "
                        <div class=\"alert alert-danger mb-3\">
                            <b> Danger! &nbsp; </b> Kode Barang tidak terdaftar!
                            <button class=\"close fa fa-times\" data-dismiss=\"alert\"></button>
                        </div>
                        ";
                    } else {
                        $_SESSION['cart'][$id] = $jml;
                    }

                }
                ?>

                <?php 
                if(isset($_SESSION['info_cart']['kode']) AND !empty($_SESSION['info_cart']['kode'])) {
                ?>
                <div class="form-group">
                    <h6>Kode Barang</h6>
                    <input type="text" class="form-control form-control-sm" required name="id" />
                </div>
                <div class="form-group">
                    <h6>Jumlah</h6>
                    <input type="number" class="form-control form-control-sm" name="jml" required />
                </div>
                <div class="mt-4">
                    <button type="submit" name="tambahkan" class="tmb tmb-primary w-100 text-center">Tambahkan</button>
                    <a href="index.php?page=penjualan&act=bersihkan" class="tmb text-dark border bg-white d-block text-center mt-3">Batal</a>
                </div>
                <?php } else { ?>
                <div class="form-group">
                    <h6>Kode Barang</h6>
                    <input type="text" class="form-control form-control-sm" disabled />
                </div>
                <div class="form-group">
                    <h6>Jumlah</h6>
                    <input type="number" class="form-control form-control-sm" disabled />
                </div>
                <div class="mt-4">
                    <button type="submit" name="new" class="tmb tmb-outline-danger w-100 text-center">Transaksi Baru</button>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>

    <div class="col-md-9">
         <div class="card border-0 shadow border-top-primary">
            <?php 
            if(isset($_SESSION['info_cart']['kode']) AND !empty($_SESSION['info_cart']['kode'])) {
            ?>
            <div class="card-header border-0">
                <h6 class="float-left">
                    Kode : <span class="text-danger"><?= $kode_transaksi; ?></span> 
                </h6>


                <div class="float-right">
                    <a href="" class="tmb tmb-info">Refresh</a>
                    <?php 
                        if(isset($_SESSION['cart']) AND !empty($_SESSION['cart'])) :
                    ?>
                    <a href="index.php?page=penjualan&act=simpan" class="tmb tmb-primary">simpan</a>
                    <?php endif; ?>
                </div>               

                <div class="clearfix"></div>
            </div>

            <?php } ?>
            <div class="card-body table-responsive">
                <table class="table table-borderless border table-striped data-table">
                    <thead>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php 
                        if(isset($_SESSION['cart'])) :
                        
                        $sess_cart = $_SESSION['cart'];
                        
                        $i = 0;
                        $total_bayar = 0;
                        foreach($sess_cart as $id_brg => $j) {
                            foreach(data_barang_byid($id_brg) as $data) {
                                $subharga = $data['harga_jual'] * $j;
                                $total_bayar += $subharga;
                        ?>
                        <tr>
                            <td><?= $i+=1; ?></td>
                            <td><?= $data['nama_barang']; ?></td>
                            <td>
                                <?= $j; ?> 
                                <?= $data['nama_satuan']; ?>
                            </td>
                            <td>
                                Rp  <?= number_format($data['harga_jual'],0,',','.'); ?>
                            </td>
                            <td class="text-right">
                                <a href="index.php?page=penjualan&hapus=<?= $data['id_barang']; ?>" class="badge badge-danger badge-pill">hapus</a>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                    <tfoot class="bg-light">
                        <tr>
                            <th colspan="3">Total Belanja</th>
                            <th colspan="2">Rp <?= number_format($total_bayar,0,',','.'); ?></th>
                        </tr>
                    </tfoot>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</section>
