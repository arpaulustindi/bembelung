<?php
$mode = 'tambah';
$cap = 'Tambah';
$id = '';
$kategori_id = '';
$judul = '';
$berita = '';
$waktu = '';

include('_koneksi.php');

//SELECT 2
$sql_kategori = "SELECT * FROM kategori";
$query_kategori = mysqli_query($conn, $sql_kategori);
///*SELECT 2

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    $mode = 'edit';
    $cap = 'Update';
    $id = $_GET['id'];
    $sql = "SELECT * FROM berita WHERE id =" . $id;
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $kategori_id = $data['kategori_id'];
    $judul = $data['judul'];
    $berita = $data['berita'];
    $waktu = $data['waktu'];
}
?>
<form action="berita_proses.php" method="POST">
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
            <select class="form-control select2" name="kategori_id" placeholder="Pilih Kategori">
                <?php
                while ($data_kategori = mysqli_fetch_array($query_kategori)) {
                ?>
                    <option value="<?php echo $data_kategori['id']; ?>" <?php
                                                                        if ($mode == 'edit' && $data_kategori['id'] == $kategori_id) {
                                                                            echo "selected";
                                                                        }
                                                                        ?>>
                        <?php echo $data_kategori['kategori']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" value="<?php echo $judul; ?>" name="judul" placeholder="Judul">
        </div>
        <div class="form-group">
            <label>Berita</label>
            <textarea id="summernote" name="berita" height="100">
                        <?php echo $berita; ?>
                    </textarea>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>