 <?php
    //Setting Awal
    $_sidebar_nama_apilkasi = 'Nama Aplikasi';
    $_sidebar_nama_pengguna = 'Nama Pengguna';
 ?>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      
      <span class="brand-text font-weight-light"><?php echo $_sidebar_nama_apilkasi;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_sidebar_nama_pengguna;?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">GROUP MENU 1</li>
          <li class="nav-item">
            <a href="peta_poin.php" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Peta Poin
              </p>
            </a>
          </li>
          <li class="nav-header">GROUP MENU 2</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                Berita
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kategori.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="berita.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Berita</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Mahasiswa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="prodi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Data Prodi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mahasiswa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Mahasiswa</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>