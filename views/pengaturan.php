<?php 
$data = akun();

if(isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)) {
        echo "
        <div class=\"alert alert-warning mb-5\">
            <b> Warning! &nbsp; </b> Username tidak boleh kosong!
            <button class=\"close fa fa-times\" data-dismiss=\"alert\"></button>
        </div>
        ";
    } else if(empty($password)) {
        echo "
        <div class=\"alert alert-warning mb-5\">
            <b> Warning! &nbsp; </b> password tidak boleh kosong!
            <button class=\"close fa fa-times\" data-dismiss=\"alert\"></button>
        </div>
        ";
    } else {
        ubah_akun($username, $password);

        echo "
        <script>
            window.location.href = 'index.php?page=pengaturan&stat=berhasil';
        </script>
        ";
    }
}

if(isset($_GET['stat'])) {
    echo "
    <div class=\"alert alert-success mb-5\">
        <b> Berhasil :) &nbsp; </b> Akun login sudah diubah.
        <a class=\"close fa fa-times\" href=\"index.php?page=pengaturan\"></a>
    </div>
    ";
}
?>

<section class="row">
    <div class="col-sm-4 mx-auto">
        <form method="POST" class="card border-top-danger border-0 shadow">
            <div class="card-header border-0">
                <h5>
                    <i class="fa fa-user-cog mr-2"></i>
                     Pengaturan Akun
                </h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <h6>Username</h6>
                    <input type="text" class="form-control form-control-sm" name="username" value="<?= $data['username']; ?>" />
                </div>
                <div class="form-group">
                    <h6>Password</h6>
                    <input type="text" class="form-control form-control-sm" name="password" value="<?= $data['password']; ?>" />
                </div>
            </div>
            <div class="card-footer border-0">
                <button type="submit" class="tmb tmb-primary" name="simpan">simpan</button>
            </div>
        </form>
    </div>
</section>