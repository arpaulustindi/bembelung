<?php
//Variabel MySQL
include('admin/_koneksi.php');
include('admin/_config_file.php');

$sql_produk = "SELECT * FROM produk"; //produk merupakan nama tabel
$query_produk = mysqli_query($conn, $sql_produk);

$sql_kategori = "SELECT * FROM kategori"; //produk merupakan nama tabel
$query_kategori = mysqli_query($conn, $sql_kategori);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Top Navigation</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <span class="brand-text font-weight-light">Judul</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="admin/index.php" class="nav-link">Admin Panel</a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Contoh Load Data Dari Database</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">

                    <!-- AWAL CONTOH PRODUK -->
                    <h1>Produk</h1>
                    <div class="row">
                        <?php
                        while ($data_produk = mysqli_fetch_array($query_produk)) {
                        ?>
                            <div class="col-md-4">
                                <!-- Widget: user widget style 1 -->
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-info">
                                        <h3 class="widget-user-username"><?php echo $data_produk['produk']; ?></h3>
                                        <h5 class="widget-user-desc"><?php echo $data_produk['keterangan']; ?></h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="<?php echo $url_folder . $data_produk['gambar']; ?>" alt="<?php echo $data_produk['produk']; ?>">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">KODE</h5>
                                                    <span class="description-text"><?php echo $data_produk['kode']; ?></span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">HARGA</h5>
                                                    <span class="description-text"><?php echo $data_produk['harga']; ?></span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <h5 class="description-header">STOK</h5>
                                                    <span class="description-text"><?php echo $data_produk['stok']; ?></span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                        <?php
                        }
                        ?>
                        <!-- /.col -->
                    </div>
                    <!-- AWAL CONTOH KATEGORI -->
                    <h1>KATEGORI</h1>
                    <div class="row">
                        <?php
                        while ($data_kategori = mysqli_fetch_array($query_kategori)) {
                        ?>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text"><?php echo $data_kategori['kategori']; ?></span>
                                        <span class="info-box-number"><?php echo $data_kategori['deskripsi']; ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        <?php
                        }
                        ?>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- /.row -->
                </div>

            </div>


        </div>
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014 <a href="#">SI Polnustar</a>.</strong> All rights reserved.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.min.js"></script>
</body>

</html>