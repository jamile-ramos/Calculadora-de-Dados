<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Calculadora de Dados - Painel Administrativo</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

  <!-- Fonts and icons -->
  <script src="assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["assets/css/fonts.min.css"],
      },
      active: function() {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/plugins.min.css" />
  <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="assets/css/demo.css" />

</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="index.html" class="logo text-write">
            Micks
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">
            <li class="nav-item active">
              <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                <i class="fas fa-shopping-cart"></i>
                <p>Vendas</p>
                <span class="caret"></span>
              </a>
            </li>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="main-header">
        <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              Micks
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
          <div class="container-fluid">
            <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
              <form action="{{ route('dashboard') }}" method="GET"
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input type="text" name="q" value="{{ request('q') }}" placeholder="Procurar ..." class="form-control" />

                  @if(request('q'))
                  <div class="input-group-append">
                    <a href="{{ route('dashboard') }}" class="btn btn-danger d-flex align-items-center justify-content-center h-100">
                      <i class="fa fa-times"></i>
                    </a>
                  </div>
                  @endif
                </div>
              </form>
            </nav>

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
              <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                  aria-expanded="false" aria-haspopup="true">
                  <i class="fa fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-search animated fadeIn">
                  <form class="navbar-left navbar-form nav-search">
                    <div class="input-group">
                      <input type="text" placeholder="Search ..." class="form-control" />
                    </div>
                  </form>
                </ul>
              </li>

              <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                  <span class="profile-username">
                    <span class="fw-bold">{{ Auth::user()->name }}</span>
                  </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt me-2"></i> Sair
                      </button>
                    </form>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>

      <div class="container">
        <div class="page-inner">
          <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
              <h3 class="fw-bold mb-3">Vendas</h3>
            </div>
          </div>
          <div class="row">
            <!-- Total de Vendas -->
            <div class="col-sm-7 col-md-4">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div class="icon-big text-center icon-primary bubble-shadow-small">
                        <i class="fas fa-shopping-cart"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Total de Vendas</p>
                        <h4 class="card-title">{{ $vendas->count() }}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Vendas Hoje -->
            <div class="col-sm-7 col-md-4">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div class="icon-big text-center icon-success bubble-shadow-small">
                        <i class="fas fa-calendar"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Vendas Hoje</p>
                        <h4 class="card-title">{{ $vendasHoje }}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total de Dispositivos -->
            <div class="col-sm-7 col-md-4">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div class="icon-big text-center icon-info bubble-shadow-small">
                        <i class="fas fa-mobile"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Total de Dispositivos</p>
                        <h4 class="card-title">{{ $totalDispositivos }}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="card mx-4">
          <div class="card-header">
            <h4 class="card-title">Vendas</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="basic-datatables" class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Plano</th>
                    <th>Peso Total</th>
                    <th>Data</th>
                    <th>É Game?</th>
                    <th>Dispositivos</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Plano</th>
                    <th>Peso Total</th>
                    <th>Data</th>
                    <th>É Game?</th>
                    <th>Dispositivos</th>
                  </tr>
                </tfoot>
                <tbody>
                  @forelse($vendas as $venda)
                  <tr>
                    <td>{{ $venda->nome }}</td>
                    <td>{{ $venda->email }}</td>
                    <td>{{ $venda->telefone }}</td>
                    <td>{{ $venda->plano->nome ?? '—' }}</td>
                    <td>{{ $venda->peso_total }}</td>
                    <td>{{ $venda->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $venda->is_gamer ? 'Sim' : 'Não' }}</td>
                    <td>@if($venda->detalhesDispositivos->count() > 0)
                      <ul class="mb-0">
                        @foreach($venda->detalhesDispositivos as $dispositivo)
                        <li>{{ $dispositivo->quantidade }}x {{ $dispositivo->tipo_dispositivo }}</li>
                        @endforeach
                      </ul>
                      @else
                      0
                      @endif
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="8" class="text-center">Nenhuma venda encontrada</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <div class="copyright">
              2025, feito por
              <a href="#">Jamile Ramos</a>
            </div>
          </div>
        </footer>
      </div>

      <!--   Core JS Files   -->
      <script src="assets/js/core/jquery-3.7.1.min.js"></script>
      <script src="assets/js/core/popper.min.js"></script>
      <script src="assets/js/core/bootstrap.min.js"></script>

      <!-- jQuery Scrollbar -->
      <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

      <!-- Chart JS -->
      <script src="assets/js/plugin/chart.js/chart.min.js"></script>

      <!-- jQuery Sparkline -->
      <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

      <!-- Chart Circle -->
      <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

      <!-- Datatables -->
      <script src="assets/js/plugin/datatables/datatables.min.js"></script>


      <!-- jQuery Vector Maps -->
      <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
      <script src="assets/js/plugin/jsvectormap/world.js"></script>

      <!-- Sweet Alert -->
      <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

      <!-- Kaiadmin JS -->
      <script src="assets/js/kaiadmin.min.js"></script>

      <!-- Kaiadmin DEMO methods, don't include it in your project! -->
      <script src="assets/js/setting-demo.js"></script>
      <script src="assets/js/demo.js"></script>
      <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
          type: "line",
          height: "70",
          width: "100%",
          lineWidth: "2",
          lineColor: "#177dff",
          fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
          type: "line",
          height: "70",
          width: "100%",
          lineWidth: "2",
          lineColor: "#f3545d",
          fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
          type: "line",
          height: "70",
          width: "100%",
          lineWidth: "2",
          lineColor: "#ffa534",
          fillColor: "rgba(255, 165, 52, .14)",
        });
      </script>
</body>

</html>