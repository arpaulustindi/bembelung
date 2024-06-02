<?php
include ('_koneksi.php');

$sql = "";
$kode = '';
$prodi = '';
$pesan = 'Prodi';
$aksi = 'success';
if(isset($_POST['mode'])){
    $kode = $_POST['kode'];
    $kode_old = $_POST['kode_old'];
    $prodi = $_POST['prodi'];
    if($_POST['mode'] == 'tambah'){
        $sql = "INSERT INTO prodi(
                    kode,
                    prodi) 
                VALUES(
                    '".$kode."',
                    '".$prodi."')";
                    
        $pesan = "Tambah ".$pesan;
    } else if($_POST['mode'] == 'edit'){
        $sql = "UPDATE prodi SET kode = '".$kode."', prodi = '".$prodi."' WHERE kode = ".$kode_old;
        $pesan = "Update ".$pesan;
    }
}
if(isset($_GET['mode']) && $_GET['mode'] == 'hapus'){
    $kode = $_GET['kode'];
    $sql = "DELETE FROM prodi WHERE kode='".$kode."'";
    $pesan = "Hapus ".$pesan;
}
if(mysqli_query($conn, $sql)){
    $pesan = "Berhasi ". $pesan;
} else {
    $pesan = "Gagal ".$pesan;
    $aksi = 'error';
}
header('location:prodi.php?aksi='.$aksi.'&pesan='.$pesan);
?>