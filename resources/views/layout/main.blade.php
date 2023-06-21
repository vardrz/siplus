<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/logo-ct.png">
  <link rel="icon" type="image/png" href="/assets/img/logo-ct.png">
  <title>
    {{ $title }} - SIPlus
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- DataTable -->
  <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
      <div class="sidenav-header">
        <a class="navbar-brand m-0" href="/" target="_blank">
            <h2 class="ms-1 font-weight-bold text-white">SIPlus</h2>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard') ? 'active bg-gradient-info' : '' }}" href="/dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('kelas') ? 'active bg-gradient-info' : '' }}" href="/kelas">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">school</i>
            </div>
            <span class="nav-link-text ms-1">Kelas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('siswa') ? 'active bg-gradient-info' : '' }}" href="/siswa">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('status') ? 'active bg-gradient-info' : '' }}" href="/status">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">playlist_add_check</i>
            </div>
            <span class="nav-link-text ms-1">Status Kelulusan</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="btn btn-outline-info mt-4 w-100 h6"><b>Logout</b></a>
        </form>
      </div>
    </div>
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-6 mb-5 px-3">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-6 mb-5 px-4 d-flex align-items-center justify-content-end">
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-bars cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2" aria-labelledby="dropdownMenuButton">
                      <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="/dashboard"><b>Dashboard</b></a>
                        <a class="dropdown-item border-radius-md" href="/kelas"><b>Kelas</b></a>
                        <a class="dropdown-item border-radius-md" href="/siswa"><b>Siswa</b></a>
                        <a class="dropdown-item border-radius-md" href="/status"><b>Status Kelulusan</b></a>
                        <form action="/logout" method="post">
                          @csrf
                          <button type="submit" class="dropdown-item text-danger border-radius-md"><b>Logout</b></a>
                        </form>
                      </li>
                    </ul>
                </li>
            </div>
        </div>

        @yield('content')

        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="copyright text-center text-sm text-muted">
                    &copy; <script>document.write(new Date().getFullYear())</script> SIPlus SMKN 01 Kuvukiland
                </div>
            </div>
        </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){
      $('#siswa').DataTable({
        "oLanguage": {
          "sInfo": "<span class='text-xs text-info'>Show _START_-_END_ of _TOTAL_ entries</span>",
          "sInfoEmpty": "No entries to show",
          "oPaginate": {
            "sNext": '>',
            "sPrevious": '<'
          }
        }
      });
    });
  </script>

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>