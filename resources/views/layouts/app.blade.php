<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IESTP Huaycán — Portal Académico</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0b0f19;
            color: #f1f5f9;
        }
        .sidebar {
            width: 270px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            background: #111827;
            border-right: 1px solid #1f2937;
            z-index: 100;
        }
        .main-content {
            margin-left: 270px;
            padding: 2.5rem;
        }
        .nav-link {
            color: #9ca3af;
            border-radius: 10px;
            margin-bottom: 8px;
            padding: 10px 15px;
            font-weight: 500;
            transition: all 0.25s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: #ffffff;
            background: #2563eb;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        }
        .card-tech {
            background: #161e2e;
            border: 1px solid #1f2937;
            color: #ffffff;
            border-radius: 1rem;
        }
        .table-tech {
            color: #f1f5f9;
        }
        .table-tech th, .table-tech td {
            border-color: #1f2937;
            background-color: #161e2e !important;
            color: #f1f5f9 !important;
        }
        /* Corrección de textos transparentes */
        .text-institutional-muted {
            color: #cbd5e1 !important;
        }
    </style>
</head>
<body>

@auth
    <!-- Sidebar Tech -->
    <div class="sidebar p-4 d-flex flex-column justify-content-between">
        <div>
            <div class="d-flex align-items-center mb-3">
                <div class="bg-primary text-white p-2 rounded-3 me-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="bi bi-mortarboard-fill fs-5"></i>
                </div>
                <h5 class="fw-bold text-white mb-0">IESTP Huaycán</h5>
            </div>
            <p class="text-secondary small mb-4 ps-1">Portal Oficial Académico</p>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('usuarios.index') }}" class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill me-2"></i> Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('postulantes.index') }}" class="nav-link {{ request()->routeIs('postulantes.*') ? 'active' : '' }}">
                        <i class="bi bi-person-badge-fill me-2"></i> Admisión
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tramites.index') }}" class="nav-link {{ request()->routeIs('tramites.*') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text-fill me-2"></i> Trámite FUT
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('matriculas.index') }}" class="nav-link {{ request()->routeIs('matriculas.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-check me-2"></i> Matrículas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pagos.index') }}" class="nav-link {{ request()->routeIs('pagos.*') ? 'active' : '' }}">
                        <i class="bi bi-cash-stack me-2"></i> Tesorería / Pagos
                    </a>
                </li>
            </ul>
        </div>

        <div class="border-top border-secondary pt-3">
            <div class="text-secondary small mb-1">Usuario activo:</div>
            <div class="fw-bold text-white mb-3 text-truncate">{{ auth()->user()->name }}</div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger btn-sm w-100 rounded-pill fw-semibold">
                    <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
@endauth

<!-- Contenido Principal -->
<div class="@auth main-content @else container my-5 @endauth">
    @if(session('ok'))
        <div class="alert alert-success bg-success text-white border-0 shadow-sm mb-4">{{ session('ok') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger bg-danger text-white border-0 shadow-sm mb-4">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger bg-danger text-white border-0 shadow-sm mb-4">{{ $errors->first() }}</div>
    @endif

    @yield('contenido')
</div>

</body>
</html>