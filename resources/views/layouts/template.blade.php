<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Custom fonts for this template -->
  <link href="{{url('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{url('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this page -->
  
  <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Aplikasi Lelang</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
     

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
     

      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- Nav Item - Charts -->
      @if(Auth::user()->level == 'administrator')
      <li class="nav-item {{ (request()->is('home*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <li class="nav-item {{ (request()->is('admin*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('admin')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Admin</span></a>
      </li>

      <li class="nav-item {{ (request()->is('petugas*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('petugas')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Petugas</span></a>
      </li>

      <li class="nav-item {{ (request()->is('masyarakat*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('masyarakat')}}">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Data Masyarakat</span></a>
      </li>

      <li class="nav-item {{ (request()->is('barang*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('barang')}}">
          <i class="fas fa-fw fa-database"></i>
          <span>Data Barang</span></a>
      </li>
      
      <li class="nav-item {{ (request()->is('lap_lelang*')) ? 'active' : '' }} {{ (request()->is('lap_history*')) ? 'active' : '' }} ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-file"></i>
          <span>Laporan</span>
        </a>
        <div id="collapse5" class="collapse {{ (request()->is('lap_lelang*')) ? 'show' : '' }}{{ (request()->is('lap_history*')) ? 'show' : '' }} " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan</h6>
            <a class="collapse-item {{ (request()->is('lap_lelang*')) ? 'active' : '' }}" href="{{url('lap_lelang')}}">Laporan Lelang</a>
            <a class="collapse-item {{ (request()->is('lap_history*')) ? 'active' : '' }}" href="{{url('lap_history')}}">Laporan History</a>
          </div>
        </div>
      </li>

      @elseif(Auth::user()->level=='petugas')

      <li class="nav-item {{ (request()->is('home*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item {{ (request()->is('barang*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('barang')}}">
          <i class="fas fa-fw fa-database"></i>
          <span>Data Barang</span></a>
      </li>

      <li class="nav-item {{ (request()->is('lelang*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('lelang')}}">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Data Lelang</span></a>
      </li>

      <li class="nav-item {{ (request()->is('penawaran*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('penawaran')}}">
          <i class="fas fa-fw fa-tag "></i>
          <span>Data Penawaran Lelang</span></a>
      </li>

      <li class="nav-item {{ (request()->is('lap_lelang*')) ? 'active' : '' }} {{ (request()->is('lap_history*')) ? 'active' : '' }} ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-file"></i>
          <span>Laporan</span>
        </a>
        <div id="collapse5" class="collapse {{ (request()->is('lap_lelang*')) ? 'show' : '' }}{{ (request()->is('lap_history*')) ? 'show' : '' }} " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan</h6>
            <a class="collapse-item {{ (request()->is('lap_lelang*')) ? 'active' : '' }}" href="{{url('lap_lelang')}}">Laporan Lelang</a>
            <a class="collapse-item {{ (request()->is('lap_history*')) ? 'active' : '' }}" href="{{url('lap_history')}}">Laporan History</a>
          </div>
        </div>
      </li>

      @else

      <li class="nav-item {{ (request()->is('home*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <li class="nav-item {{ (request()->is('menawar/data*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{url('menawar/data')}}">
          <i class="fas fa-fw fa-tag "></i>
          <span>Data Penawaran Anda</span></a>
      </li>
    @endif
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="group">
                <div class="mr-2">
                    {{ Carbon\Carbon::now()->format('l, d F Y')}}
                </div>
              </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}} | {{Auth::user()->level}}</span>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  KELUAR
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <!-- DataTales Example -->
          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><strong>Copyright &copy; M.Hidayatullah 2021</strong></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" untuk keluar dari aplikasi.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">BATAL</button>
         <a class="btn btn-danger" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('KELUAR') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
 <script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('assets/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <script src="{{url('assets/js/demo/datatables-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="{{url('assets/js/chart.js@2.8.0') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>

<script>
$(".select2").select2({
 });</script>
  @stack('scripts')
</body>

</html>
