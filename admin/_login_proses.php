<?php
include('_koneksi.php');

$akun = $_POST['akun'];
$sandi = $_POST['sandi'];
$sql = "SELECT * FROM akun WHERE 
            akun = '".$akun."'
        AND
            sandi = '".$sandi."'";
$query = mysqli_query($conn, $sql);
$ada = mysqli_num_rows($query);

if($ada > 0){
    $data = mysqli_fetch_assoc($query);
    session_start();
    $_SESSION['login'] = true;
    $_SESSION['id'] = $data['id'];
    $_SESSION['akun'] = $data['akun'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];
    header('location:otorisasi_all_.php');
    
} else {
    header('location:_login.php');
}

echo $sql;
?>
