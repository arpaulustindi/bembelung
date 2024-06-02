<?php
include('_koneksi.php');

$sql = "";
$id = '';
$waktu = date("Y-m-d H:i:s");
$kategori_id = '';
$judul = '';
$berita = '';
$pesan = 'Berita';
$aksi = 'success';
if (isset($_POST['mode'])) {
    $id = $_POST['id'];
    $waktu = date("Y-m-d H:i:s");
    $kategori_id = $_POST['kategori_id'];
    $judul = $_POST['judul'];
    $berita = $_POST['berita'];
    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO berita(
                    waktu,
                    kategori_id,
                    judul,
                    berita) 
                VALUES('" . $waktu . "',
                    '" . $kategori_id . "',
                    '" . $judul . "',
                    '" . $berita . "')";

        $pesan = "Tambah " . $pesan;
    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE berita SET 
                    waktu = '" . $waktu . "',
                    kategori_id = '" . $kategori_id . "', 
                    judul = '" . $judul . "', 
                    berita = '" . $berita . "' 
                WHERE id = " . $id;
        $pesan = "Update " . $pesan;
    }
}
if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $id = $_GET['id'];
    $sql = "DELETE FROM berita WHERE id=" . $id;
    $pesan = "Hapus " . $pesan;
}
if (mysqli_query($conn, $sql)) {
    $pesan = "Berhasi " . $pesan;
} else {
    $pesan = "Gagal " . $pesan;
    $aksi = 'error';
}
header('location:berita.php?aksi=' . $aksi . '&pesan=' . $pesan);
