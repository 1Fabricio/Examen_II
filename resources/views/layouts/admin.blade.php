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
            --agro-navy:  #14284B;
            --agro-green: #2E7D32;
            --agro-dark:  #1B5E20;
            --agro-leaf:  #6BAF3D;
            --agro-gold:  #F2B52E;
            --agro-bg:    #F3F7F1;
        }
        body, #layoutSidenav_content { background: var(--agro-bg); }

        .agro-topnav {
            background: linear-gradient(90deg, var(--agro-dark), var(--agro-green));
            border-bottom: 4px solid var(--agro-gold);
        }
        .agro-topnav .navbar-brand { color: #fff; font-weight: 700; }
        .agro-topnav .navbar-brand i { color: var(--agro-gold); }

        .sb-sidenav-dark { background: var(--agro-navy); }
        .sb-sidenav-dark .sb-sidenav-menu .sb-sidenav-menu-heading {
            color: var(--agro-gold); font-weight: 700;
        }
        .sb-sidenav-dark .sb-sidenav-menu .nav-link {
            color: rgba(255,255,255,.8);
            border-left: 4px solid transparent;
        }
        .sb-sidenav-dark .sb-sidenav-menu .nav-link .sb-nav-link-icon { color: var(--agro-leaf); }
        .sb-sidenav-dark .sb-sidenav-menu .nav-link:hover {
            color: #fff; background: rgba(255,255,255,.08);
        }
        .sb-sidenav-dark .sb-sidenav-menu .nav-link.active {
            color: #fff; background: var(--agro-green);
            border-left-color: var(--agro-gold); font-weight: 600;
        }
        .sb-sidenav-dark .sb-sidenav-menu .nav-link.active .sb-nav-link-icon { color: var(--agro-gold); }
        .sb-sidenav-dark .sb-sidenav-footer {
            background: rgba(0,0,0,.25); color: #fff;
            border-top: 3px solid var(--agro-gold);
        }
        .logo-card {
            background: #fff; border-radius: 14px;
            margin: 14px 12px; padding: 10px; text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,.25);
        }
        .logo-card img { max-height: 120px; width: auto; max-width: 100%; }

        h1, h2, h3, h4 { color: var(--agro-navy); }
        .card { border: 0; border-top: 4px solid var(--agro-green); }
        .table thead th { background: var(--agro-navy); color: #fff; }
        .btn-primary {
            --bs-btn-bg: var(--agro-green); --bs-btn-border-color: var(--agro-green);
            --bs-btn-hover-bg: var(--agro-dark); --bs-btn-hover-border-color: var(--agro-dark);
        }
        .btn-success {
            --bs-btn-bg: var(--agro-leaf); --bs-btn-border-color: var(--agro-leaf);
            --bs-btn-hover-bg: var(--agro-green); --bs-btn-hover-border-color: var(--agro-green);
        }
        .btn-warning { --bs-btn-bg: var(--agro-gold); --bs-btn-border-color: var(--agro-gold); }
        a { color: var(--agro-green); }
        .form-control:focus, .form-select:focus {
            border-color: var(--agro-green);
            box-shadow: 0 0 0 .2rem rgba(46,125,50,.2);
        }
        .agro-footer { background: #fff; border-top: 3px solid var(--agro-gold); }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav agro-topnav navbar navbar-expand navbar-dark">
        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">
            <i class="fas fa-seedling"></i> AGROVALLE
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" type="button">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="navbar-nav ms-auto me-3 align-items-center">
            <li class="nav-item text-white me-3">
                <i class="fas fa-user"></i> {{ auth()->user()->name ?? 'Invitado' }}
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-warning btn-sm fw-semibold" type="submit">
                        <i class="fas fa-right-from-bracket"></i> Cerrar sesión
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark">
                <div class="sb-sidenav-menu">

                    <div class="logo-card">
                        <img src="{{ asset('img/logo.jpg') }}" alt="AGROVALLE Honduras">
                    </div>

                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-gauge"></i></div> Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Gestión</div>
                        <a class="nav-link {{ request()->routeIs('insumos.*') ? 'active' : '' }}" href="{{ route('insumos.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes-stacked"></i></div> Insumos
                        </a>
                        <a class="nav-link {{ request()->routeIs('proveedores.*') ? 'active' : '' }}" href="{{ route('proveedores.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div> Proveedores
                        </a>
                        <a class="nav-link {{ request()->routeIs('empleados.*') ? 'active' : '' }}" href="{{ route('empleados.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div> Empleados
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Conectado como:</div>
                    {{ auth()->user()->name ?? 'Invitado' }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('contenido')
                </div>
            </main>
            <footer class="py-4 agro-footer mt-auto">
                <div class="container-fluid px-4 small text-muted">
                    &copy; {{ date('Y') }} Distribuidora Agropecuaria del Valle S. de R.L. (AGROVALLE Honduras)
                    · Comayagua – San Pedro Sula
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>