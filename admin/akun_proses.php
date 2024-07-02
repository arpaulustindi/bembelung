<?php
include('_koneksi.php');

$sql = "";

//Seluruh Variabel Kolom
$id = '';
$akun = '';
$sandi = '';
$nama = '';
$role = '';

$pesan = 'Akun';
$aksi = 'success';
if (isset($_POST['mode'])) {
    //Seluruh Variabel Kolom yang terdaftar dan dikirm dari form
    $id = $_POST['id'];
    $akun = $_POST['akun'];
    $sandi = $_POST['sandi'];
    $sandi_old = $_POST['sandi_old'];
    //AKHIR BAGIAN CEK PASSWORD LAMA DAN BARU
    $nama = $_POST['nama'];
    $role = $_POST['role'];

    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO akun(
                    akun,
                    sandi,
                    nama,
                    role
                ) VALUES(
                    '" . $akun . "',
                    '" . $sandi . "',
                    '" . $nama . "',
                    '" . $role . "'
                    )";
        $pesan = "Tambah " . $pesan;

    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE akun SET
                    akun = '" . $akun . "',
                    sandi = '" . $sandi . "',
                    nama = '" . $nama . "',
                    role = '" . $role . "'
                WHERE id = " . $id;
        $pesan = "Update " . $pesan;
    }
}

if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $id = $_GET['id'];
    $sql = "DELETE FROM akun WHERE id=" . $id;
    $pesan = "Hapus " . $pesan;
}


//Jika error, ketik tanda /* di baris di bawah ini
if (mysqli_query($conn, $sql)) {
    $pesan = "Berhasi " . $pesan;
} else {
    $pesan = "Gagal " . $pesan;
    $aksi = 'error';
}

header('location:akun.php?aksi=' . $aksi . '&pesan=' . $pesan);

//Jika error, ketik tanda */ di baris di atas ini
echo $sql;
?>
