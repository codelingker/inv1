<section class="row">
    <div class="col-sm-4 mx-auto">
        <?php 
            $nama_brg   = "";
            $stok       = "";
            $satuan     = [];
            $harga_beli = "";
            $harga_jual = "";

            if(isset($_POST['submit'])) {
                $nama_brg   = $_POST['nama_barang'];
                $stok       = $_POST['stok'];
                $satuan     = $_POST['satuan'];
                $harga_beli = $_POST['harga_beli'];
                $harga_jual = $_POST['harga_jual'];

                if(empty($nama_brg)) {
                    echo "
                        <div class='alert alert-warning'> 
                            <b>Peringatan! </b> Nama Barang belum diisi.
                        </div>
                    ";
                } else {
                    pembelian_barang($nama_brg, $stok, $satuan, $harga_beli, $harga_jual);

                    echo "
                        <script>
                            window.location.href='index.php?page=pembelian&stat=berhasil';
                        </script>
                    ";
                }
            }

            if(isset($_GET['stat'])) {
                echo "
                    <div class='alert alert-success'> 
                        <b>Berhasil :) </b> Barang baru berhasil ditambahkan.
                        <a href='index.php?page=pembelian' class='close fa fa-times'></a>
                    </div>
                ";
            }
        ?>

        <form method="POST" class="card border-0 shadow border-top-info">
            <div class="card-header border-0">
                <h5>
                    <i class="fa fa-plus-circle mr-2"></i>
                     Barang Baru
                </h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <h6>Nama Barang</h6>
                    <input type="text" class="form-control form-control-sm" name="nama_barang" value="<?= $nama_brg; ?>" />
                </div>
                <div class="form-group">
                    <h6>Stok Barang</h6>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="stok" value="<?= $stok; ?>" />
                        <div class="input-group-append">
                            <select class="form-control form-control-sm" name="satuan">
                                <?php 
                                foreach(satuan() as $v) {
                                    if($v['id_satuan'] == $satuan) {
                                ?>
                                <option selected value="<?= $v['id_satuan']; ?>"><?= $v['nama_satuan']; ?></option>
                                <?php } else {  ?>
                                <option value="<?= $v['id_satuan']; ?>"><?= $v['nama_satuan']; ?></option>
                                <?php }} ?>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h6>Harga Beli</h6>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                Rp
                            </div>
                        </div>
                        <input type="text" class="form-control form-control-sm" name="harga_beli" value="<?= $harga_beli; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <h6>Harga Jual</h6>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                Rp
                            </div>
                        </div>
                        <input type="text" class="form-control form-control-sm" name="harga_jual" value="<?= $harga_jual; ?>" />
                    </div>
                </div>
            </div>
            <div class="card-footer border-0">
                <button type="submit" class="btn btn-primary btn-sm" name="submit">submit</button>
                <a href="index.php?page=data-barang" class="btn btn-outline-secondary btn-sm">Data Barang</a>
            </div>
        </form>
    </div>
</section>
