 <?php
    //Setting Awal
    $_sidebar_nama_apilkasi = 'Bembelung';
    $_sidebar_nama_pengguna = 'User Bembelung';
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
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-header">GROUP MENU 1 : TANPA PERLU LOGIN</li>
          <!--Mulai Menu-->
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                HALAMAN END USER
              </p>
            </a>
          </li>
          <!--Selesai Menu-->
          <!--Mulai Menu-->
          <li class="nav-item">
            <a href="kategori.php" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <!--Selesai Menu-->
          <!--Mulai Menu-->
          <li class="nav-item">
            <a href="produk.php" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
          <!--Selesai Menu-->
          <!--Mulai Menu-->
          <li class="nav-item">
            <a href="geojson.php" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Geojson
              </p>
            </a>
          </li>
          <!--Selesai Menu-->
          <!--Mulai Menu-->
          <li class="nav-item">
            <a href="akun.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Akun
              </p>
            </a>
          </li>
          <!--Selesai Menu-->
          <!--Mulai Menu-->
          <li class="nav-item">
            <a href="_login.php" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Login
              </p>
            </a>
          </li>
          <!--Selesai Menu-->

          <li class="nav-header">GROUP MENU 2 : PERLU LOGIN</li>
          <!--Mulai Menu-->
          <li class="nav-item">
            <a href="otoriasi_all_.php" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Otorasis All
              </p>
            </a>
          </li>
          <!--Selesai Menu-->
          <!--Mulai Menu-->
          <li class="nav-item">
            <a href="otoriasi_all_.php" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Otorasis Admin
              </p>
            </a>
          </li>
          <!--Selesai Menu-->
          <!--Mulai Menu-->
          <li class="nav-item">
            <a href="otoriasi_all_.php" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Otorasis Super dan Admin
              </p>
            </a>
          </li>
          <!--Selesai Menu-->
          <!--Mulai Menu-->
          <li class="nav-item">
            <a href="otoriasi_all_.php" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Otorasis Super
              </p>
            </a>
          </li>
          <!--Selesai Menu-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>