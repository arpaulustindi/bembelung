<?php
$mode = 'tambah';
$cap = 'Tambah';
$id = '';
$lat = '';
$lon = '';
$lokasi = '';
$keterangan = '';

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    include('_koneksi.php');
    $mode = 'edit';
    $cap = 'Update';
    $id = $_GET['id'];
    $sql = "SELECT * FROM peta_poin WHERE id =" . $id;
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $lat = $data['lat'];
    $lon = $data['lon'];
    $lokasi = $data['lokasi'];
    $keterangan = $data['keterangan'];
}
?>
<form action="peta_poin_proses.php" method="POST">
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
            <label>Lat</label>
            <input type="text" class="form-control" value="<?php echo $lat; ?>" name="lat" placeholder="Latitude">
        </div>
        <div class="form-group">
            <label>Lon</label>
            <input type="text" class="form-control" value="<?php echo $lon; ?>" name="lon" placeholder="Longitude">
        </div>
        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" class="form-control" value="<?php echo $lokasi; ?>" name="lokasi" placeholder="Lokasi">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea id="summernote" name="keterangan">
                        <?php echo $keterangan; ?>
                    </textarea>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>