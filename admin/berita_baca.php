<?php

include('_koneksi.php');
$id = '';
$waktu = '';
$kategori = '';
$judul = '';
$berita = '';
$sql_baca = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_baca = "SELECT 
                    b.id AS id, 
                    b.waktu AS waktu, 
                    k.kategori AS kategori, 
                    b.judul AS judul, 
                    b.berita AS berita 
                FROM berita b, kategori k 
                WHERE b.id=" . $id . " AND k.id = (SELECT b.kategori_id)";
                
    $query_baca = mysqli_query($conn, $sql_baca);
    $data_baca = mysqli_fetch_assoc($query_baca);
    $waktu = $data_baca['waktu'];
    $kategori = $data_baca['kategori'];
    $judul = $data_baca['judul'];
    $berita = $data_baca['berita'];
}


?>
<div class="modal-header">
    <h4 class="modal-title"><?php echo $id . " - " . $judul; ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <h3 class="modal-title"><?php echo $kategori; ?></h3>
    <h4 class="modal-title"><?php echo $waktu; ?></h4>
    <?php echo $berita; ?>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
</div>