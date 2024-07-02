<?php
include('_koneksi.php');

$sql = "";

//Seluruh Variabel Kolom
$id = '';
$kategori = '';
$deskripsi = '';

$pesan = 'Kategori';
$aksi = 'success';
if (isset($_POST['mode'])) {
    //Seluruh Variabel Kolom yang terdaftar dan dikirm dari form
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO kategori(
                    kategori,
                    deskripsi
                ) VALUES(
                    '" . $kategori . "',
                    '" . $deskripsi . "'
                    )";
        $pesan = "Tambah " . $pesan;

    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE kategori SET
                    kategori = '" . $kategori . "',
                    deskripsi = '" . $deskripsi . "'
                WHERE id = " . $id;
        $pesan = "Update " . $pesan;
    }
}

if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $id = $_GET['id'];
    $sql = "DELETE FROM kategori WHERE id=" . $id;
    $pesan = "Hapus " . $pesan;
}


//Jika error, ketik tanda /* di baris di bawah ini
if (mysqli_query($conn, $sql)) {
    $pesan = "Berhasi " . $pesan;
} else {
    $pesan = "Gagal " . $pesan;
    $aksi = 'error';
}

header('location:kategori.php?aksi=' . $aksi . '&pesan=' . $pesan);

//Jika error, ketik tanda */ di baris di atas ini

echo $sql;
?>
