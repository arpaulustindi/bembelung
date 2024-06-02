<?php
//Konfigurasi Halaman
$_halaman_judul_tab = 'Peta Poin';
$_halaman_judul_halaman = 'Peta Poin';
$_halaman_judul_card = 'Peta Poin';
$_halaman_footer_card = 'Peta Poin';

//Variabel MySQL
include('_koneksi.php');

$sql_peta = "SELECT * FROM peta_poin";
$query_peta = mysqli_query($conn, $sql_peta);

$sql_tabel = "SELECT * FROM peta_poin";
$query_tabel = mysqli_query($conn, $sql_tabel);

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $_halaman_judul_tab; ?></title>
  <?php include('_part/_referensi.php'); ?>

  <!--PETA : LEAFLET -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <style>
    #peta {
      height: 250px;
    }
  </style>
  <!--/*PETA : LEAFLET -->

  <!--DATA TABLE -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!--/*DATA TABLE -->

  <!-- SUMMERNOTE -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- /*SUMMERNOTE -->
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
            <h3 class="card-title">Data Poin</h3>
            <div class="float-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-form" onclick="aksi('peta_poin_form.php','tambah',null);">Tambah Poin Baru</button>
            </div>
          </div>
          <div class="card-body">
            <!-- ISI KONTEN -->
            <!--DATA TABLE-->
            <table id="tabel" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>LAT</th>
                  <th>LON</th>
                  <th>Lokasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data_tabel = mysqli_fetch_array($query_tabel)) {
                ?>
                  <tr>
                    <td><?php echo $data_tabel['id']; ?></td>
                    <td><?php echo $data_tabel['lat']; ?></td>
                    <td><?php echo $data_tabel['lon']; ?></td>
                    <td><?php echo $data_tabel['lokasi']; ?></td>
                    <td>
                      <button onclick="aksi('peta_poin_form.php','edit','<?php echo $data_tabel['id']; ?>');" class="btn btn-success aksi" data-toggle="modal" data-target="#modal-form">Edit</button>
                      <a href="peta_poin_proses.php?mode=hapus&id=<?php echo $data_tabel['id']; ?>" class="btn btn-danger">Hapus</a>
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
            Data Poin
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
    var zoom_peta = 13;
    var peta = L.map('peta').setView([lat_tengah, lon_tengah], zoom_peta);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(peta);

    //Menambahkan Data Dari MySQL
    <?php
    $no_marker = 0;
    while ($data_peta = mysqli_fetch_array($query_peta)) {
      $no_marker++;
    ?>
      var marker<?php echo $no_marker; ?> = L.marker(
          [
            <?php echo $data_peta['lat']; ?>,
            <?php echo $data_peta['lon']; ?>
          ]
        )
        .addTo(peta)
        .bindPopup(
          '<?php echo $data_peta['keterangan']; ?>'
        );

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

  <!-- SUMMERNOTE -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- /*SUMMERNOTE -->

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

      function aksi(_link, _mode, _id) {
        $(".modal-content").load(_link + "?mode=" + _mode + "&id=" + _id, function(response, status, xhr) {
          if (status == "error") {
            $(".modal-content").html("Terjadi Error: " + xhr.status + " " + xhr.statusText);
          }
          //SUMMERNOTE
          $(function() {
            $('#summernote').summernote({
              height: 300
            })
          })
          //SUMMERNOTE
        });
      }
      //});
    </script>
</body>

</html>