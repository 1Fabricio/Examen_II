<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo', 'Panel Administrativo') | AGROVALLE Honduras</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --agro-navy: #0f1f38;
            --agro-green: #1b5e20;
            --agro-dark: #0f3813;
            --agro-leaf: #4caf50;
            --agro-gold: #fbc02d;
            --agro-bg: #f4f6f8;
        }

        body, #layoutSidenav_content {
            background-color: var(--agro-bg);
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }
        .agro-topnav {
            background: linear-gradient(135deg, var(--agro-dark), var(--agro-green)) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .sb-sidenav-dark {
            background-color: var(--agro-navy) !important;
        }

        .sb-sidenav-dark .sb-sidenav-menu .sb-sidenav-menu-heading {
            color: var(--agro-gold);
            font-size: 0.75rem;
            letter-spacing: 0.05rem;
            text-transform: uppercase;
        }

        .sb-sidenav-dark .sb-sidenav-menu .nav-link {
            color: rgba(255, 255, 255, 0.75);
            border-radius: 8px;
            margin: 4px 12px;
            padding: 10px 15px;
            transition: all 0.2s ease;
        }

        .sb-sidenav-dark .sb-sidenav-menu .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.08);
            transform: translateX(3px);
        }

        .sb-sidenav-dark .sb-sidenav-menu .nav-link.active {
            color: #fff;
            background: linear-gradient(90deg, var(--agro-green), var(--agro-leaf));
            box-shadow: 0 4px 10px rgba(27, 94, 32, 0.3);
            font-weight: 600;
        }

        .sb-sidenav-footer {
            background-color: rgba(0, 0, 0, 0.2) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border-radius: 12px;
        }

        .agro-footer {
            background-color: #ffffff;
            border-top: 1px solid #e3e6f0;
        }
    </style>
</head>
<body class="sb-nav-fixed">

    <nav class="sb-topnav agro-topnav navbar navbar-expand navbar-dark px-3">
        <a class="navbar-brand ps-2 fw-bold d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
            <i class="fas fa-seedling text-warning"></i> <span>AGROVALLE</span>
        </a>

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" type="button">
            <i class="fas fa-bars fa-lg"></i>
        </button>

        <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-white bg-white bg-opacity-10 px-3 py-1.5 rounded-pill text-decoration-none" 
                   id="userDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 32px; height: 32px; font-size: 0.85rem;">
                        {{ strtoupper(substr(auth()->user()->name ?? 'I', 0, 1)) }}
                    </div>
                    <span class="d-none d-md-inline fw-semibold small">{{ auth()->user()->name ?? 'Invitado' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2 p-2 rounded-4" aria-labelledby="userDropdown">
                    <li>
                        <h6 class="dropdown-header text-muted text-uppercase small fw-bold">Cuenta</h6>
                    </li>
                    <li><span class="dropdown-item-text text-dark fw-bold small">{{ auth()->user()->name ?? 'Invitado' }}</span></li>
                    <li><hr class="dropdown-divider my-2"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button class="dropdown-item text-danger d-flex align-items-center gap-2 rounded-2 py-2 fw-semibold" type="submit">
                                <i class="fas fa-right-from-bracket"></i> Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark">
                <div class="sb-sidenav-menu">

                    <div class="px-4 pt-4 pb-3 text-center">
                        <a href="{{ route('dashboard') }}" class="d-inline-block text-decoration-none">
                            <img src="{{ asset('img/logo.png') }}" alt="AGROVALLE Honduras" class="img-fluid transition-all" style="max-height: 65px; object-fit: contain; filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.3));">
                        </a>
                    </div>

                    <div class="nav px-2">
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon text-warning"><i class="fas fa-gauge"></i></div> Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Gestión</div>
                        <a class="nav-link {{ request()->routeIs('insumos.*') ? 'active' : '' }}" href="{{ route('insumos.index') }}">
                            <div class="sb-nav-link-icon text-success"><i class="fas fa-boxes-stacked"></i></div> Insumos
                        </a>
                        <a class="nav-link {{ request()->routeIs('proveedores.*') ? 'active' : '' }}" href="{{ route('proveedores.index') }}">
                            <div class="sb-nav-link-icon text-info"><i class="fas fa-truck"></i></div> Proveedores
                        </a>
                        <a class="nav-link {{ request()->routeIs('empleados.*') ? 'active' : '' }}" href="{{ route('empleados.index') }}">
                            <div class="sb-nav-link-icon text-primary"><i class="fas fa-users"></i></div> Empleados
                        </a>
                    </div>
                </div>

                <div class="sb-sidenav-footer py-3">
                    <div class="small text-white-50">Conectado como:</div>
                    <div class="fw-semibold text-white text-truncate">{{ auth()->user()->name ?? 'Invitado' }}</div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-4 border-0 border-start border-success border-4">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-4 border-0 border-start border-danger border-4">
                            <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('contenido')
                </div>
            </main>

            <footer class="py-4 agro-footer mt-auto">
                <div class="container-fluid px-4 small text-muted d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                    <div>
                        &copy; {{ date('Y') }} <strong>Distribuidora Agropecuaria del Valle S. de R.L.</strong> (AGROVALLE)
                    </div>
                    <div>
                        Comayagua – San Pedro Sula, Honduras
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>