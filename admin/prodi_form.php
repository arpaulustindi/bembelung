<?php
$mode = 'tambah';
$cap = 'Tambah';
$kode = '';
$prodi = '';

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    include('_koneksi.php');
    $mode = 'edit';
    $cap = 'Update';
    $kode = $_GET['kode'];
    $sql = "SELECT * FROM prodi WHERE kode ='" . $kode . "'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $prodi = $data['prodi'];
}
?>
<form action="prodi_proses.php" method="POST">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $cap; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" value="<?php echo $kode; ?>" name="kode" placeholder="Kode">
            <input type="hidden" class="form-control" value="<?php echo $kode; ?>" name="kode_old">
        </div>
        <div class="form-group">
            <label>Prodi</label>
            <input type="text" class="form-control" value="<?php echo $prodi; ?>" name="prodi" placeholder="Prodi">
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>