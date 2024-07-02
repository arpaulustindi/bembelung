<?php
$mode = 'tambah';
$cap = 'Tambah';
$_nama_file_proses = 'geojson_proses.php';

//Seluruh Variabel Kolom
$id = '';
$label = '';
$geojson = '';

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    include('_koneksi.php');
    $mode = 'edit';
    $cap = 'Update';

    //Variabel dikirim (Penamaan harus sesuai nama kolom primary)
    $id = $_GET['id'];

    $sql = "SELECT * FROM geojson WHERE id =" . $id;

    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    //Variabel Kolom Selain Primary Key
    $label = $data['label'];
    $geojson = $data['geojson'];
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
            <label>ID</label>
            <input type="number" class="form-control" value="<?php echo $id; ?>" name="id" placeholder="ID" readonly>
        </div>
        <div class="form-group">
            <label>Label</label>
            <input type="text" class="form-control" value="<?php echo $label; ?>" name="label" placeholder="Label">
        </div>
        <div class="form-group">
            <label>GeoJSON</label>
            <input type="file" class="form-control" value="<?php echo $geojson; ?>" name="geojson" placeholder="Gambar">
            <input type="hidden" name="geojson_old" value="<?php echo $geojson;?>"/>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>