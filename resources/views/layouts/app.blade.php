<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TecniRápido')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .navbar-brand { font-weight: bold; }
        .nueva { background-color: #28a745; color: white; padding: 8px 12px; border-radius: 4px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('reparaciones.index') }}">TecniRápido</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link nueva" href="{{ route('reparaciones.create') }}">Nueva Reparación</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>