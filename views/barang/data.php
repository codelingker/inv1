<?php 
if(isset($_GET['act'])) {
    if($_GET['act'] == "ubah") {
?>

<div class="alert alert-success">
    <b>Berhasil :) </b> Data barang berhasil diubah.
    <a href="index.php?page=data-barang" class="close fa fa-times"></a>
</div>

<?php } else if($_GET['act'] == "hapus") { ?>

<div class="alert alert-success">
    <b>Berhasil :) </b> Data barang berhasil dihapus.
    <a href="index.php?page=data-barang" class="close fa fa-times"></a>
</div>

<?php }} ?>
<?php  
if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    hapus_barang($id);

    echo "
        <script>
            window.location.href='index.php?page=data-barang&act=hapus';
        </script>
    ";
}
?>

<section class="row">
    <div class="col-sm-12">
        <div class="card card-0 shadow border-top-primary">
            <div class="card-header border-0">
                <h5>
                    <i class="fa fa-file mr-2"></i>
                     Etalase Barang
                </h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-borderless border table-striped data-table">
                    <thead>
                        <th>#</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php 
                        foreach(data_barang() as $i => $data):
                        ?>
                        <tr>
                            <td>
                                <?= $i+1; ?>
                            </td>
                            <td>
                                <?= $data['id_barang']; ?>
                            </td>
                            <td>
                                 <?= $data['nama_barang']; ?>
                            </td>
                            <td>
                                 <?= $data['stok']; ?>  <?= $data['nama_satuan']; ?>
                            </td>
                            <td>Rp  <?= number_format($data['harga_beli'],0,',','.'); ?></td>
                            <td>Rp  <?= number_format($data['harga_jual'],0,',','.'); ?></td>
                            <td class="text-right">
                                <a href="index.php?page=ubah-barang&barang=<?= $data['id_barang']; ?>" class="badge badge-primary badge-pill">
                                    ubah
                                </a>
                                <a href="index.php?page=data-barang&hapus=<?= $data['id_barang']; ?>" class="badge badge-danger badge-pill hps-data">
                                    hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>