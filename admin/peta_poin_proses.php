<?php
include('_koneksi.php');

$sql = "";
$id = '';
$lat = '';
$lon = '';
$lokasi = '';
$keterangan = '';
$pesan = 'Peta Poin';
$aksi = 'success';
if (isset($_POST['mode'])) {
    $id = $_POST['id'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];
    $lokasi = $_POST['lokasi'];
    $keterangan = $_POST['keterangan'];
    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO peta_poin(
                    lat,
                    lon,
                    lokasi,
                    keterangan) 
                VALUES(
                    '" . $lat . "',
                    '" . $lon . "',
                    '" . $lokasi . "',
                    '" . $keterangan . "')";

        $pesan = "Tambah " . $pesan;
    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE peta_poin SET 
                    lat='" . $lat . "',
                    lon = '" . $lon . "', 
                    lokasi = '" . $lokasi . "', 
                    keterangan = '" . $keterangan . "' 
                WHERE id = " . $id;
                
        $pesan = "Update " . $pesan;
    }
}
if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $id = $_GET['id'];
    $sql = "DELETE FROM peta_poin WHERE id=" . $id;
    $pesan = "Hapus " . $pesan;
}
if (mysqli_query($conn, $sql)) {
    $pesan = "Berhasi " . $pesan;
} else {
    $pesan = "Gagal " . $pesan;
    $aksi = 'error';
}
//echo $sql;
header('location:peta_poin.php?aksi=' . $aksi . '&pesan=' . $pesan);
