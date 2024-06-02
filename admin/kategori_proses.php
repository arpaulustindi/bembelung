<?php
include('_koneksi.php');

$sql = "";
$id = '';
$kategori = '';
$pesan = 'Kategori';
$aksi = 'success';
if (isset($_POST['mode'])) {
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO kategori(kategori) VALUES('" . $kategori . "')";
        $pesan = "Tambah " . $pesan;
    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE kategori SET kategori = '" . $kategori . "' WHERE id = " . $id;
        $pesan = "Update " . $pesan;
    }
}
if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $id = $_GET['id'];
    $sql = "DELETE FROM kategori WHERE id=" . $id;
    $pesan = "Hapus " . $pesan;
}
if (mysqli_query($conn, $sql)) {
    $pesan = "Berhasi " . $pesan;
} else {
    $pesan = "Gagal " . $pesan;
    $aksi = 'error';
}

header('location:kategori.php?aksi=' . $aksi . '&pesan=' . $pesan);
