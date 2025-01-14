<?php
$mode = 'tambah';
$cap = 'Tambah';
$_nama_file_proses = 'kategori_proses.php';

//Seluruh Variabel Kolom
$id = '';
$kategori = '';
$deskripsi = '';

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    include('_koneksi.php');
    $mode = 'edit';
    $cap = 'Update';

    //Variabel dikirim (Penamaan harus sesuai nama kolom primary)
    $id = $_GET['id'];

    $sql = "SELECT * FROM kategori WHERE id =" . $id;

    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    //Variabel Kolom Selain Primary Key
    $kategori = $data['kategori'];
    $deskripsi = $data['deskripsi'];
}
?>
<form action="<?php echo $_nama_file_proses;?>" method="POST">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $cap; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>ID</label>
            <input type="number" class="form-control" value="<?php echo $id; ?>" name="id" placeholder="ID" readonly>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" class="form-control" value="<?php echo $kategori; ?>" name="kategori" placeholder="Kategori">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control" value="<?php echo $deskripsi; ?>" name="deskripsi" placeholder="Deskripsi">
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>