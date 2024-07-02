<?php
include('_koneksi.php');

$sql = "";

//Seluruh Variabel Kolom
$id = '';
$label = '';
//**AWAL BLOK KHUSUS UNTUK FILE
include('_fungsi_file.php'); //Include Fungsi File
$geojson = '';
$geojson_file = '';

$status_upload = false;
$status_hapus = false;
//**AKHIR BLOK KHUSUS UNTUK FILE//Khusus untuk File

$pesan = 'Geojson';
$aksi = 'success';
if (isset($_POST['mode'])) {
    //Seluruh Variabel Kolom yang terdaftar dan dikirm dari form
    $id = $_POST['id'];
    $label = $_POST['label'];
    //**AWAL BLOK KHUSUS UNTUK FILE
    if(trim($_FILES['geojson']['name']) != null){
        $geojson = $_FILES['geojson']['name'];
        $geojson_file = $_FILES['geojson'];

        $status_upload = true;
    } else {
        $geojson = $_POST['geojson_old'];
        $status_upload = false;
    }
    //**AKHIR BLOK KHUSUS UNTUK FILE

    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO geojson(
                    label,
                    geojson
                ) VALUES(
                    '" . $label . "',
                    '" . $geojson . "'
                    )";
        $pesan = "Tambah " . $pesan;

    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE geojson SET
                    label = '" . $label . "',
                    geojson = '" . $geojson . "'
                WHERE id = " . $id;
        $pesan = "Update " . $pesan;
    }
}

if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $id = $_GET['id'];
    //**AWAL BLOK KHUSUS UNTUK FILE
    $geojson = $_GET['geojson'];
    $status_hapus = true;
    //**AKHIR BLOK KHUSUS UNTUK FILE
    $sql = "DELETE FROM geojson WHERE id=" . $id;
    $pesan = "Hapus " . $pesan;
}


//Jika error, ketik tanda /* di baris di bawah ini
if (mysqli_query($conn, $sql)) {
    $pesan = "Berhasi " . $pesan;

    //**AWAL BLOK KHUSUS UNTUK FILE
    if($status_upload == true){
        fungsi_upload_file($geojson_file);
    }
    if($status_hapus == true){
        fungsi_hapus_file($geojson);   }
    //**AKHIR BLOK KHUSUS UNTUK FILE
} else {
    $pesan = "Gagal " . $pesan;
    $aksi = 'error';
}

header('location:geojson.php?aksi=' . $aksi . '&pesan=' . $pesan);

//Jika error, ketik tanda */ di baris di atas ini

echo $sql;
?>
