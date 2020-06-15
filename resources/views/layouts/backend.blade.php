<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard BPBJ Pasangkayu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('template/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/backend/css/adminlte.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('template/backend/plugins/toastr/toastr.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  @yield('headlink')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/backend')}}" class="nav-link">Welcome {{ Auth::user()->name }} !!!</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-danger">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('template/frontend/images/logo-bpbjpaskay.png')}}"
          alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3"
          style="opacity: .8">
      <span class="brand-text font-weight-light">BPBJ Pasangkayu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library 
            edar tambah : if menu multiple list get class menu-open on li and active on a href class -->
          <li class="nav-item has-treeview ">
            <a href="{{url('/backend')}}" class="nav-link {{request()->is('backend') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          {{-- <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                RUP
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Tambah RUP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>List RUP</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item has-treeview ">
            <a href="{{url('/backend/Kilasinfo')}}" class="nav-link {{request()->is('backend/Kilasinfo*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>Kilas Informasi</p>
            </a>
          </li>
          <li class="nav-item has-treeview  {{request()->is('backend/Blog*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('backend/Blog*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Berita
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Blog.create')}}" class="nav-link {{request()->is('backend/Blog/create') ? 'active' : ''}}">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Buat Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Blog.index')}}" class="nav-link {{request()->is('backend/Blog') ? 'active' : ''}}">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>List Berita</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{request()->is('backend/Galeri*') || request()->is('backend/Tutorial*') || request()->is('backend/Video-galeri*')? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('backend/Galeri*') || request()->is('backend/Tutorial*') || request()->is('backend/Video-galeri*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Galeri
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Galeri.indexb')}}" class="nav-link {{request()->is('backend/Galeri*') ? 'active' : ''}}">
                  <i class="fas fa-images nav-icon"></i>
                  <p>Album Foto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Video-galeri.index')}}" class="nav-link {{request()->is('backend/Video-galeri*') ? 'active' : ''}}">
                  <i class="fas fa-video nav-icon"></i>
                  <p>Album Video</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Video-galeri.tutor')}}" class="nav-link {{request()->is('backend/Tutorial*') ? 'active' : ''}}">
                  <i class="fas fa-key nav-icon"></i>
                  <p>Tutorial</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{request()->is('backend/Produk*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('backend/Produk*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-bookmark"></i>
              <p>
                Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Produk.create')}}" class="nav-link {{request()->is('backend/Produk/create') ? 'active' : ''}}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Tambah Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Produk.index')}}" class="nav-link {{request()->is('backend/Produk') ? 'active' : ''}}">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>List Produk</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- SOP -->
          <li class="nav-item has-treeview {{request()->is('backend/Sop*') || request()->is('backend/doc*') || request()->is('backend/lpse*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('backend/Sop*') || request()->is('backend/doc*') || request()->is('backend/lpse*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                SOP
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Sop.index')}}" class="nav-link {{request()->is('backend/Sop*') ? 'active' : ''}}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Standar Operasional</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Sop.standoc')}}" class="nav-link {{request()->is('backend/doc*') ? 'active' : ''}}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Standar Dokumen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Sop.stanlpse')}}" class="nav-link {{request()->is('backend/lpse*') ? 'active' : ''}}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>17 Standar LPSE</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="{{url('/backend/Agenda')}}" class="nav-link {{request()->is('backend/Agenda*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>Agenda</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('user.edit', Auth::user()->id)}}" class="nav-link {{request()->is('backend/users/*') ? 'active' : ''}}">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Konten Utama Dashboard -->
    <br />
    @yield('backend')

    <!-- / akhir section content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>HALI</b> Software House
    </div>
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">BPBJ Pasangkayu</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('template/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('template/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/backend/js/adminlte.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('template/backend/plugins/datatables/jquery.dataTables.js')}}"></script>
<!-- toaster -->
<script src="{{asset('template/backend/plugins/toastr/toastr.min.js')}}"></script>
@yield('footscript')
</body>
</html>
