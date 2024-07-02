<?php
include('_koneksi.php');

$sql = "";

//Seluruh Variabel Kolom
$kode = '';
$kode_old = '';
$produk = '';
$harga = '';
$stok = '';
//**AWAL BLOK KHUSUS UNTUK FILE
include('_fungsi_file.php'); //Include Fungsi File
$gambar = '';
$gambar_file = '';

$status_upload = false;
$status_hapus = false;
//**AKHIR BLOK KHUSUS UNTUK FILE//Khusus untuk File
$keterangan = '';

$pesan = 'Produk';
$aksi = 'success';
if (isset($_POST['mode'])) {
    //Seluruh Variabel Kolom yang terdaftar dan dikirm dari form
    $kode = $_POST['kode'];
    $kode_old = $_POST['kode_old'];
    $produk = $_POST['produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    //**AWAL BLOK KHUSUS UNTUK FILE
    if(trim($_FILES['gambar']['name']) != null){
        $gambar = $_FILES['gambar']['name'];
        $gambar_file = $_FILES['gambar'];

        $status_upload = true;
    } else {
        $gambar = $_POST['gambar_old'];
        $status_upload = false;
    }
    //**AKHIR BLOK KHUSUS UNTUK FILE
    $keterangan = $_POST['keterangan'];

    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO produk(
                    kode,
                    produk,
                    harga,
                    stok,
                    gambar,
                    keterangan
                ) VALUES(
                    '" . $kode . "',
                    '" . $produk . "',
                    '" . $harga . "',
                    '" . $stok . "',
                    '" . $gambar . "',
                    '" . $keterangan. "'
                    )";
        $pesan = "Tambah " . $pesan;

    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE produk SET
                    kode = '" . $kode . "',
                    produk = '" . $produk . "',
                    harga = '" . $harga . "',
                    stok = '" . $stok . "',
                    gambar = '" . $gambar . "',
                    keterangan = '" . $keterangan . "'
                WHERE kode = '" . $kode_old . "'";
        $pesan = "Update " . $pesan;
    }
}

if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $kode = $_GET['kode'];
    //**AWAL BLOK KHUSUS UNTUK FILE
    $gambar = $_GET['gambar'];
    $status_hapus = true;
    //**AKHIR BLOK KHUSUS UNTUK FILE
    $sql = "DELETE FROM produk WHERE kode='" . $kode . "'";
    $pesan = "Hapus " . $pesan;
    
}


//Jika error, ketik tanda /* di baris di bawah ini

if (mysqli_query($conn, $sql)) {
    $pesan = "Berhasi " . $pesan;

    //**AWAL BLOK KHUSUS UNTUK FILE
    if($status_upload == true){
        fungsi_upload_file($gambar_file);
    }
    if($status_hapus == true){
        fungsi_hapus_file($gambar);   }
    //**AKHIR BLOK KHUSUS UNTUK FILE

} else {
    $pesan = "Gagal " . $pesan;
    $aksi = 'error';
}

header('location:produk.php?aksi=' . $aksi . '&pesan=' . $pesan);

//Jika error, ketik tanda */ di baris di atas ini

echo $sql;
?>
