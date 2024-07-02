<?php
$mode = 'tambah';
$cap = 'Tambah';
$_nama_file_proses = 'produk_proses.php';

//Seluruh Variabel Kolom
$kode = '';
$produk = '';
$harga = '';
$stok = '';
$gambar = '';
$keterangan = '';

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    include('_koneksi.php');
    $mode = 'edit';
    $cap = 'Update';

    //Variabel dikirim (Penamaan harus sesuai nama kolom primary)
    $kode = $_GET['kode'];

    $sql = "SELECT * FROM produk WHERE kode ='" . $kode . "'";

    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    //Variabel Kolom Selain Primary Key
    $produk = $data['produk'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $gambar = $data['gambar'];
    $keterangan = $data['keterangan'];
}
?>

<!-- Apabila ada upload file, tambahkan
enctype="multipart/form-data"
pada form -->
<form action="<?php echo $_nama_file_proses;?>" method="POST" enctype="multipart/form-data">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $cap; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>KODE</label>
            <input type="text" class="form-control" value="<?php echo $kode; ?>" name="kode" placeholder="KODE" placeholder="Kode">
            <input type="hidden" name="kode_old" value="<?php echo $kode;?>"/>
        </div>
        <div class="form-group">
            <label>Produk</label>
            <input type="text" class="form-control" value="<?php echo $produk; ?>" name="produk" placeholder="Produk">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" class="form-control" value="<?php echo $harga; ?>" name="harga" placeholder="Harga">
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" class="form-control" value="<?php echo $stok; ?>" name="stok" placeholder="Stok">
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <input type="file" class="form-control" value="<?php echo $gambar; ?>" name="gambar" placeholder="Gambar">
            <input type="hidden" name="gambar_old" value="<?php echo $gambar;?>"/>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" value="<?php echo $keterangan; ?>" name="keterangan" placeholder="Keterangan">
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>