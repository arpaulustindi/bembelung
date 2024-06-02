<?php
$mode = 'tambah';
$cap = 'Tambah';
$nim = '';
$prodi_kode = '';
$nama = '';
$angkatan = '';


include('_koneksi.php');

//SELECT 2
$sql_prodi = "SELECT * FROM prodi";
$query_prodi = mysqli_query($conn, $sql_prodi);
///*SELECT 2

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    $mode = 'edit';
    $cap = 'Update';
    $nim = $_GET['nim'];
    $sql = "SELECT * FROM mahasiswa WHERE nim ='" . $nim . "'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $prodi_kode = $data['prodi_kode'];
    $nama = $data['nama'];
    $angkatan = $data['angkatan'];
}
?>
<form action="mahasiswa_proses.php" method="POST">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $cap; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>NIM</label>
            <input type="text" class="form-control" value="<?php echo $nim; ?>" name="nim" placeholder="NIM">
            <input type="hidden" name="nim_old" value="<?php echo $nim; ?>" />
        </div>
        <div class="form-group">
            <label>Prodi</label>
            <select class="form-control select2" name="prodi_kode" placeholder="Pilih Prodi">
                <?php
                while ($data_prodi = mysqli_fetch_array($query_prodi)) {
                ?>
                    <option value="<?php echo $data_prodi['kode']; ?>" <?php
                                                                        if ($mode == 'edit' && $data_prodi['kode'] == $prodi_kode) {
                                                                            echo "selected";
                                                                        }
                                                                        ?>>
                        <?php echo $data_prodi['prodi']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" value="<?php echo $nama; ?>" name="nama" placeholder="Nama">
        </div>
        <div class="form-group">
            <label>Angkatan</label>
            <input type="number" class="form-control" value="<?php echo $angkatan; ?>" name="angkatan" placeholder="Angkatan">
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>