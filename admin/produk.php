<?php
//Konfigurasi Halaman
$_halaman_judul_tab = 'Produk';
$_halaman_judul_halaman = 'Produk';
$_halaman_judul_card = 'Produk :Contoh Untuk Primary Key dengan Nama Kolom (kode) Dengan Type Data Varchar (kode diisi manual)';
$_halaman_footer_card = 'Produk';

$_button_tambah_cap = 'Tambah Produk';

$_nama_file_form = 'produk_form.php';
$_nama_file_proses = 'produk_proses.php';
$_nama_kolom_primary = 'kode';

//Variabel MySQL
include('_koneksi.php');

$sql_tabel = "SELECT * FROM produk"; //produk merupakan nama tabel
$query_tabel = mysqli_query($conn, $sql_tabel);

//**AWAL BLOK KHUSUS UNTUK FILE
include('_config_file.php');
//**AKHIR BLOK KHUSUS UNTUK FILE
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $_halaman_judul_tab; ?></title>
  <?php include('_part/_referensi.php'); ?>


  <!--DATA TABLE -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!--/*DATA TABLE -->

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php include('_part/_navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include('_part/_sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo $_halaman_judul_halaman; ?></h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo $_halaman_judul_card; ?></h3>
            <div class="float-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-form" onclick="aksi('produk_form.php','tambah',null);"><?php echo $_button_tambah_cap;?></button>
            </div>
          </div>
          <div class="card-body">
            <!-- ISI KONTEN -->
            <!--DATA TABLE-->
            <table id="tabel" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Gambar</th>
                  <th>Keterangan</th>

                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data_tabel = mysqli_fetch_array($query_tabel)) {
                ?>
                  <tr>
                    <td><?php echo $data_tabel['kode']; ?></td>
                    <td><?php echo $data_tabel['produk']; ?></td>
                    <td><?php echo $data_tabel['harga']; ?></td>
                    <td><?php echo $data_tabel['stok']; ?></td>
                    <!--AWAL KHUSUS GAMBAR-->
                    <td>
                      <?php
                        if($data_tabel['gambar'] != null){
                          ?>
                          <img src="<?php echo $url_folder.$data_tabel['gambar'];?>" width="60px" height="40px"/>
                          <?php
                        } else {
                          echo "Tidak Ada Gambar";
                        }
                      ?>
                     </td>
                    <!--AKHIR KHUSUS GAMBAR-->
                    <td><?php echo $data_tabel['keterangan']; ?></td>

                    <td>
                      <button onclick="aksi('<?php echo $_nama_file_form;?>','edit','<?php echo $data_tabel['kode']; ?>');" class="btn btn-success aksi" data-toggle="modal" data-target="#modal-form">Edit</button>
                      <a href="<?php echo $_nama_file_proses;?>?mode=hapus&<?php echo $_nama_kolom_primary;?>=<?php echo $data_tabel['kode']; ?>&gambar=<?php echo $data_tabel['gambar'];?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            <!--/*DATA TABLE -->
            <!-- /*ISI KONTEN -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <?php echo $_halaman_footer_card; ?>
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include('_part/_footer.php'); ?>

  </div>
  <!-- ./wrapper -->

  <?php include('_part/_script.php'); ?>

  <!--DATA TABLE-->
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
    $(function() {
      $("#tabel").DataTable({
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      }).buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');
    });
  </script>
  <!--/*DATA TABLE-->

  <div class="modal fade" id="modal-form">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <script>
      //$(document).ready(function(){

      function aksi(_link, _mode, _<?php echo $_nama_kolom_primary;?>) {
        $(".modal-content").load(_link + "?mode=" + _mode + "&<?php echo $_nama_kolom_primary;?>=" + _<?php echo $_nama_kolom_primary;?>, function(response, status, xhr) {
          if (status == "error") {
            $(".modal-content").html("Terjadi Error: " + xhr.status + " " + xhr.statusText);
          }
        });
      }
      //});
    </script>
</body>

</html>