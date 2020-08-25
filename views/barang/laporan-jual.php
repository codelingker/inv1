<section class="row">
    <div class="col-md-3">
        <?php 
        $from   = "";
        $to     = "";

        if(isset($_POST['cari'])) {
            $from   = base64_encode($_POST['from']);
            $to     = base64_encode($_POST['to']);

            if(empty($from)) {
                echo "
                <div class='alert alert-warning'>
                    <b>Peringatan!</b> Dari tanggal belum diisi!
                </div>
                ";
            } else if(empty($to)) {
                echo "
                <div class='alert alert-warning'>
                    <b>Peringatan!</b> Sampai tanggal belum diisi!
                </div>
                ";
            } else {
                echo "
                    <script>
                        window.location.href='index.php?page=laporan-jual&from=$from&to=$to';
                    </script>
                ";
            }

        }

        if(isset($_GET['from']) AND isset($_GET['to'])) {
            $from   = base64_decode($_GET['from']);
            $to     = base64_decode($_GET['to']);
        }
        ?>
        <form method="POST" class="card border-0 shadow border-top-primary">
            <div class="card-header border-0">
                <h5><i class="fa fa-search mr-2"></i> Pencarian</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <h6>Dari Tgl</h6>
                    <input type="text" class="form-control form-control-sm datepicker" name="from" value="<?= $from; ?>" />
                </div>
                <div class="form-group">
                    <h6>Sampai Tgl</h6>
                    <input type="text" class="form-control form-control-sm datepicker" name="to" value="<?= $to; ?>"  />
                </div>
            </div>
            <div class="card-footer border-0">
                <button type="submit" class="tmb tmb-primary" name="cari">
                    submit
                </button>
            </div>
        </form>
    </div>

    <div class="col-md-9">
        <div class="card border-0 shadow border-top-info">
            <div class="card-header border-0">
                <h5>
                   <i class="fa fa-file mr-2"></i> Hasil pencarian
                </h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-borderless border table-striped data-table">
                    <thead>
                        <th>#</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Terjual</th>
                        <th>Tgl Transaksi</th>
                    </thead>
                    <tbody>
                        <?php 
                        foreach(laporan_jual($from, $to) as $i => $data) :
                        ?>
                        <tr>
                            <td><?= $i+=1; ?></td>
                            <td><?= $data['id_barang'] ?></td>
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= $data['jumlah'] ?> <?= $data['nama_satuan']; ?> </td>
                            <td><?= $data['tgl_transaksi'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>