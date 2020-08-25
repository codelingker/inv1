<section class="row">
    <div class="col-sm-4">
        <?php 
        $nama_satuan = "";
        if(isset($_GET['ubah'])) {
            $id = $_GET['ubah'];
            $data_byid = satuan_byid($id);
            $nama_satuan = $data_byid['nama_satuan'];

            if(isset($_POST['simpan'])) {
                $nama_satuan = $_POST['nama_satuan'];

                if(empty($nama_satuan)) {
                    echo "
                    <div class='alert alert-warning'>
                        <b>Peringatan!</b> Nama satuan belum diisi!
                    </div>
                    ";
                } else {
                    ubah_satuan($id, $nama_satuan);
    
                    echo "
                    <script>
                        window.location.href='index.php?page=satuan&act=ubah';
                    </script>
                    ";
                }
            }
        }
        if(isset($_POST['submit'])) {
            $nama_satuan = $_POST['nama_satuan'];

            if(empty($nama_satuan)) {
                echo "
                <div class='alert alert-warning'>
                    <b>Peringatan!</b> Nama satuan belum diisi!
                </div>
                ";
            } else {
                tambah_satuan($nama_satuan);

                echo "
                <script>
                    window.location.href='index.php?page=satuan&act=tambah';
                </script>
                ";
            }
        }

        if(isset($_GET['act'])) {
            if($_GET['act'] == "tambah") {
                echo "
                    <div class='alert alert-success'>
                        <b>Berhasil :) </b> Satuan baru sudah ditambahkan.
                        <a href='index.php?page=satuan' class='close fa fa-times'></a>
                    </div>
                ";
            }
            if($_GET['act'] == "ubah") {
                echo "
                    <div class='alert alert-success'>
                        <b>Berhasil :) </b> Data Satuan sudah diubah.
                        <a href='index.php?page=satuan' class='close fa fa-times'></a>
                    </div>
                ";
            }
            if($_GET['act'] == "hapus") {
                echo "
                    <div class='alert alert-success'>
                        <b>Berhasil :) </b> Data Satuan sudah dihapus.
                        <a href='index.php?page=satuan' class='close fa fa-times'></a>
                    </div>
                ";
            }
        }

        if(isset($_GET['hapus'])) {
            $id = $_GET['hapus'];
            hapus_satuan($id);

            echo "
                <script>
                    window.location.href='index.php?page=satuan&act=hapus';
                </script>
            ";
        }
        ?>
        <div class="card card-0 shadow border-top-primary">
            <div class="card-header border-0">
                <h5>
                    <i class="fa fa-plus-circle mr-2"></i>
                     Satuan Baru
                </h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <h6>Nama Satuan</h6>
                        <input type="text" class="form-control-sm form-control" name="nama_satuan" value="<?= $nama_satuan; ?>" />
                    </div>
                    <div class="mt-4">
                        <?php 
                            if(isset($_GET['ubah'])) {
                                echo "
                                <button type=\"submit\" class=\"btn btn-sm btn-primary\" name=\"simpan\">simpan</button>
                                <a href=\"index.php?page=satuan\" class=\"btn btn-sm btn-secondary\">batal</a>
                                ";
                            } else {
                                echo "
                                <button type=\"submit\" class=\"btn btn-sm btn-primary\" name=\"submit\">submit</button>
                                ";
                            }
                        ?>                            
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card card-0 shadow border-top-primary">
            <div class="card-header border-0">
                <h5>
                    <i class="fa fa-file mr-2"></i>
                     Data Satuan
                </h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-borderless border table-striped data-table">
                    <thead>
                        <th>#</th>
                        <th>Nama Satuan</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php 
                        foreach(satuan() as $i => $data) :
                        ?>
                        <tr>
                            <td>
                                <?= $i+=1; ?>                            
                            </td>
                            <td><?= $data['nama_satuan']; ?></td>
                            <td class="text-right">
                                <a href="index.php?page=satuan&ubah=<?= $data['id_satuan']; ?>" class="badge badge-primary badge-pill">
                                    ubah
                                </a>
                                <a href="index.php?page=satuan&hapus=<?= $data['id_satuan']; ?>" class="badge badge-danger badge-pill hps-data">
                                    hapus
                                </a>
                            </td>
                        </tr>
                        <?php  endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>