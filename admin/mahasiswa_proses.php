<?php
include('_koneksi.php');

$sql = "";
$nim = '';
$prodi_kode = '';
$nama = '';
$angaktan = '';
$pesan = 'Mahasiswa';
$aksi = 'success';
if (isset($_POST['mode'])) {
    $nim = $_POST['nim'];
    $nim_old = $_POST['nim_old'];
    $prodi_kode = $_POST['prodi_kode'];
    $nama = $_POST['nama'];
    $angkatan = $_POST['angkatan'];
    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO mahasiswa(
                    nim,
                    prodi_kode,
                    nama,
                    angkatan) 
                VALUES(
                    '" . $nim . "',
                    '" . $prodi_kode . "',
                    '" . $nama . "',
                    '" . $angkatan . "')";
                    
        $pesan = "Tambah " . $pesan;
    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE mahasiswa SET nim = '" . $nim . "', prodi_kode = '" . $prodi_kode . "', nama = '" . $nama . "', angkatan='" . $angkatan . "' WHERE nim = " . $nim_old;
        $pesan = "Update " . $pesan;
    }
}
if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $nim = $_GET['nim'];
    $sql = "DELETE FROM mahasiswa WHERE nim='" . $nim . "'";
    $pesan = "Hapus " . $pesan;
}
if (mysqli_query($conn, $sql)) {
    $pesan = "Berhasi " . $pesan;
} else {
    $pesan = "Gagal " . $pesan;
    $aksi = 'error';
}
header('location:mahasiswa.php?aksi=' . $aksi . '&pesan=' . $pesan);
