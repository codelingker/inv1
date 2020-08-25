<?php 
session_start();
// waktu indonesia barat
date_default_timezone_set('Asia/Jakarta');
function tgl($str){
    $tr   = trim($str);
    $str    = str_replace(
        [
            'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
        ], 
        [
            'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sept', 'Okt', 'Nov', 'Des'
        ], $tr
    );
    return $str;
} 

// koneksi ke database
function config() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "db_inv";

    return mysqli_connect($hostname, $username, $password, $database); 
}

function cek_username($username) {
    $db = config();
    return mysqli_query($db, "SELECT * FROM tb_login WHERE username = '$username' ");
}

function akun() {
    $db = config();
    $cek = mysqli_query($db, "SELECT * FROM tb_login");
    return mysqli_fetch_assoc($cek);
}

function ubah_akun($username, $password) {
    $db = config();
    mysqli_query($db, "UPDATE tb_login SET username ='$username', password ='$password' ");
}

// data barang
function data_barang() {
    $db = config();
    return mysqli_query($db, "SELECT * FROM tb_barang b JOIN tb_satuan s ON b.id_satuan = s.id_satuan ORDER BY b.id_barang DESC  ");
}
// mengambil data barang berdasarkan id
function data_barang_byid($id) {
    $db = config();
    return  mysqli_query($db, "SELECT * FROM tb_barang b JOIN tb_satuan s ON b.id_satuan = s.id_satuan WHERE b.id_barang ='$id'  ");
}
// menambahkan barang baru
function pembelian_barang($nama_brg, $stok, $satuan, $harga_beli, $harga_jual) {
    $db = config();
    mysqli_query($db, "INSERT INTO tb_barang (nama_barang, stok, id_satuan, harga_beli, harga_jual) VALUES('$nama_brg', '$stok', '$satuan', '$harga_beli', '$harga_jual') ");
}
// invoice
function invoice() {
    $karakter = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    $panjang = 3;
    $string = "USP".date("dmy"); 

    for($i= 0; $i < $panjang; $i++ ) {
        $pos = rand(0, 26 - 1 );

        $string .= $karakter{$pos};
    }
    return $string;
}
// menyimpan data penjualan barang
function penjualan_barang($kode, $id_barang, $j) {
    $db = config();
    mysqli_query($db, "INSERT INTO tb_transaksi (kode_transaksi, id_barang, jumlah) VALUES('$kode', '$id_barang', '$j')");
    
    mysqli_query($db, "UPDATE tb_barang SET stok = stok - '$j' ");

}
// menyimpan data transaksi 
function simpan_transaksi($kode_transaksi, $date) {
    $db = config();
    mysqli_query($db, "INSERT INTO tb_m_transaksi (kode_transaksi, tgl_transaksi) VALUES('$kode_transaksi', '$date')");
}

// mengubah data barang sesuai id
function ubah_barang($id, $nama_brg, $stok, $satuan, $harga_beli, $harga_jual) {
    $db = config();
    mysqli_query($db, "UPDATE tb_barang SET nama_barang ='$nama_brg', stok ='$stok', id_satuan='$satuan', harga_beli ='$harga_beli', harga_jual='$harga_jual' WHERE id_barang ='$id' ");
}
// menghapus barang sesuai id
function hapus_barang($id) {
    $db = config();
    mysqli_query($db, "DELETE FROM tb_barang WHERE id_barang = '$id'");
}
// total semua barang
function total_barang() {
    $data = data_barang();
    return mysqli_num_rows($data);
}
// data satuan barang
function satuan() {
    $db = config();
    return mysqli_query($db, "SELECT * FROM tb_satuan ORDER BY id_satuan DESC  ");
}
// mengambil data satuan sesuai id
function satuan_byid($id) {
    $db = config();
    $cek = mysqli_query($db, "SELECT * FROM tb_satuan WHERE id_satuan = '$id' ");
    return mysqli_fetch_assoc($cek);
}
// tambah satuan baru
function tambah_satuan($nama_satuan) {
    $db = config();
    mysqli_query($db, "INSERT INTO tb_satuan (nama_satuan) VALUES('$nama_satuan')");
}
// ubah data satuan sesuai id
function ubah_satuan($id, $nama_satuan) {
    $db = config();
    mysqli_query($db, "UPDATE tb_satuan SET nama_satuan='$nama_satuan' WHERE id_satuan='$id'");   
}
// hapus data satuan sesuai id
function hapus_satuan($id) {
    $db = config();
    mysqli_query($db, "DELETE FROM tb_satuan WHERE id_satuan='$id'");   
}
// pencarian laporan penjualan berdasarkan tgl
function laporan_jual($from, $to) {
    $db = config();
    return mysqli_query($db, "SELECT * FROM tb_transaksi t JOIN tb_m_transaksi r ON t.kode_transaksi = r.kode_transaksi JOIN tb_barang b ON t.id_barang = b.id_barang JOIN tb_satuan s ON b.id_satuan = s.id_satuan WHERE r.tgl_transaksi BETWEEN '$from' AND '$to' ");    
}
// total penjualan hari ini
function total_penjualan() {
    $db = config();
    $cek = mysqli_query($db, "SELECT * FROM tb_m_transaksi WHERE date(tgl_ditambahkan) = CURRENT_DATE ");

    return mysqli_num_rows($cek);
}
// total brg terjual hari ini
function total_brg_terjual_today() {
    $db = config();
    $cek = mysqli_query($db, "SELECT SUM(t.jumlah) AS total FROM tb_transaksi t JOIN tb_m_transaksi r ON t.kode_transaksi = r.kode_transaksi WHERE date(r.tgl_ditambahkan) = CURRENT_DATE");

    $data = mysqli_fetch_assoc($cek);
    return $data['total'];
}
// total brg terjual
function total_brg_terjual() {
    $db = config();
    $cek = mysqli_query($db, "SELECT SUM(t.jumlah) as total FROM tb_transaksi t JOIN tb_m_transaksi r ON t.kode_transaksi = r.kode_transaksi");

    $data = mysqli_fetch_assoc($cek);
    return $data['total'];
}