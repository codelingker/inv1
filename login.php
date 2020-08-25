<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<!-- CSS -->
<link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="assets/css/mod.css">

</head>
<body>
<div class="login-wrap">
    <div class="loading">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="login-header">
        <h2>Login</h2>
    </div>
    <div class="login-content">
        <?php 
        require_once('configs/koneksi.php');
        if(isset($_POST['login'])) {
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
                $cek = cek_username($username);
                $data = mysqli_fetch_assoc($cek);
                $rows = mysqli_num_rows($cek);

                if($rows == 0) {
                    echo "
                    <div class=\"alert alert-danger mb-5\">
                        <b> Danger! &nbsp; </b> Username dan password salah!
                        <button class=\"close fa fa-times\" data-dismiss=\"alert\"></button>
                    </div>
                    ";
                } else {
                    if($password <> $data['password']) {
                        echo "
                        <div class=\"alert alert-danger mb-5\">
                            <b> Danger! &nbsp; </b> Username dan password salah!
                            <button class=\"close fa fa-times\" data-dismiss=\"alert\"></button>
                        </div>
                        ";
                    } else if($username <> $data['username']) {
                        echo "
                        <div class=\"alert alert-danger mb-5\">
                            <b> Danger! &nbsp; </b> Username dan password salah!
                            <button class=\"close fa fa-times\" data-dismiss=\"alert\"></button>
                        </div>
                        ";
                    } else {
                        $_SESSION['sess_log']['username'] = $data['username'];
                        $_SESSION['sess_log']['time_log'] = date('d/m/Y G:i:s');

                        echo "
                        <script>
                            window.location.href = 'index.php';
                        </script>
                        ";
                    }
                }
            }
        }
        ?>
        
        <form action="" method="post">
            <div class="field-group">
                <input type="text" class="field" id="username" name="username" placeholder=" " autocomplete="off" />
                <label for="username" class="label">Username</label>
            </div>            
            <div class="field-group">
                <input type="password" class="field pass" id="password" name="password" placeholder=" " />
                <label for="password" class="label">Password</label>

                <input type="checkbox" id="showhide_pass" />
                <label for="showhide_pass" id="showhide_pass_lab" class="fa fa-eye-slash"></label>
            </div>            
            
            <div class="field-group mt-5 mb-3">
                <button type="submit" class="login-btn w-100" name="login">
                    Login
                </button>
            </div>
        </form>
    </div>
    <div class="login-icon fa fa-lock"></div>
</div>

<div class="popup">
    <div class="popup-content">
        <h2 class="mb-5">Chat Admin</h2>
        <button class="close fa fa-times"></button>
        <form method="POST">
            <div class="field-group">
                <input type="text" class="field" id="sub" name="sub" placeholder=" " autocomplete="off" />
                <label for="sub" class="label">Masalah</label>
            </div>
            <div class="field-group textarea">
                <textarea class="field" id="pesan" name="pesan" placeholder=" "></textarea>
                <label for="pesan" class="label">Ceritakan masalah</label>
            </div>
           
            <div class="field-group">
                <button class="tmb tmb-primary">Kirim</button>
            </div>
        </form>
    </div>
</div>

<script src="assets/vendors/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/sweetAlert/sweetalert2.all.min.js"></script>
<script src="assets/vendors/datatable/datatables.min.js"></script>
<script src="assets/vendors/select2/js/select2.min.js"></script>
<script src="assets/vendors/chartjs/chart.bundle.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>