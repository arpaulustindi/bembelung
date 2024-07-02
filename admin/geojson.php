<?php
//Konfigurasi Halaman
$_halaman_judul_tab = 'Geojson';
$_halaman_judul_halaman = 'Geojson';
$_halaman_judul_card = 'Geojson : Contoh Sederhana Untuk Peta Menggunakan File GeoJSON';
$_halaman_footer_card = 'Geojson';

$_button_tambah_cap = 'Tambah Geojson';

$_nama_file_form = 'geojson_form.php';
$_nama_file_proses = 'geojson_proses.php';
$_nama_kolom_primary = 'id';

//Variabel MySQL
include('_koneksi.php');

$sql_tabel = "SELECT * FROM geojson"; //geojson merupakan nama tabel
$query_tabel = mysqli_query($conn, $sql_tabel);

$sql_peta = "SELECT * FROM geojson"; //geojson merupakan nama tabel
$query_peta = mysqli_query($conn, $sql_peta);

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

  <!--PETA : LEAFLET -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
  <style>
    #peta {
      height: 400px;
    }
  </style>
  <!--/*PETA : LEAFLET -->

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
          </div>
          <div class="card-body">
            <!-- ISI KONTEN -->
            <!--PETA : LEAFLET -->
            <div id="peta"></div>
            <!--PETA : LEAFLET -->
            <!-- /*ISI KONTEN -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <?php echo $_halaman_footer_card; ?>
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo $_halaman_judul_card; ?></h3>
            <div class="float-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-form" onclick="aksi('geojson_form.php','tambah',null);"><?php echo $_button_tambah_cap;?></button>
            </div>
          </div>
          <div class="card-body">
            <!-- ISI KONTEN -->
            <!--DATA TABLE-->
            <table id="tabel" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Label</th>
                  <th>Geojson</th>

                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data_tabel = mysqli_fetch_array($query_tabel)) {
                ?>
                  <tr>
                    <td><?php echo $data_tabel['id']; ?></td>
                    <td><?php echo $data_tabel['label']; ?></td>
                    <td><?php echo $data_tabel['geojson']; ?></td>

                    <td>
                      <button onclick="aksi('<?php echo $_nama_file_form;?>','edit','<?php echo $data_tabel['id']; ?>');" class="btn btn-success aksi" data-toggle="modal" data-target="#modal-form">Edit</button>
                      <a href="<?php echo $_nama_file_proses;?>?mode=hapus&<?php echo $_nama_kolom_primary;?>=<?php echo $data_tabel['id']; ?>&geojson=<?php echo $data_tabel['geojson'];?>" class="btn btn-danger">Hapus</a>
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

  <!--PETA : LEAFLET -->
  <script>
    var lat_tengah = 3.610506;
    var lon_tengah = 125.497011;
    var zoom_peta = 12;
    var peta = L.map('peta').setView([lat_tengah, lon_tengah], zoom_peta);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(peta);

    <?php
    //**AWAL BLOK KHUSUS UNTUK FILE
    include('_config_file.php');
    //**AKHIR BLOK KHUSUS UNTUK FILE

    $nomor_variabel = 0;
    while ($data_peta = mysqli_fetch_array($query_peta)) {
    $nomor_variabel++;
    ?>
    var geojson_url<?php echo $nomor_variabel;?> = '<?php echo $url_folder.$data_peta['geojson'];?>';

    function set_popup<?php echo $nomor_variabel;?>(feature, layer) {
            if (feature.properties && feature.properties.name) {
                layer.bindPopup(feature.properties.name);
            }
        }
    var geojsonLayer<?php echo $nomor_variabel;?> = new L.GeoJSON.AJAX(geojson_url<?php echo $nomor_variabel;?>, {
      onEachFeature: set_popup<?php echo $nomor_variabel;?>
    });
      geojsonLayer<?php echo $nomor_variabel;?>.addTo(peta);
    
    <?php
    }
    ?>
  </script>
  <!--/*PETA : LEAFLET -->

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