<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Alquiladora GAOS - Sistema de Renta')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f2f2f2;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 130px;
        }

        /* WRAPPER */
        #main-wrapper {
            flex: 1;
            transition: margin-left .3s ease;
            display: flex;
            flex-direction: column;
            padding-left: 260px;
        }

        /* ====================== HEADER ====================== */
        header {
            background: #111;
            color: white;
            padding: 35px 30px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 100;
            border-bottom: 3px solid #444;
        }

        .header-content {
            max-width: 1400px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .hamburger {
            color: white;
            font-size: 1.8em;
            cursor: pointer;
            margin-right: 20px;
        }

        .logo-text h1 {
            font-size: 1.9em;
            font-weight: bold;
        }

        .logo-text p {
            font-size: 0.9em;
            opacity: .7;
        }

        .header-nav a {
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            background: #333;
            border-radius: 8px;
            transition: .3s;
            font-weight: bold;
        }

        .header-nav a:hover {
            background: #555;
        }

        .header-nav .active {
            background: #777;
        }

        /* ====================== SIDEBAR ====================== */
        .sidebar {
            width: 260px;
            background: #141414;
            color: #fff;
            padding: 35px 0;
            position: fixed;
            top: 130px;
            left: 0;
            bottom: 0;
            transition: left 0.3s ease;
            overflow-y: auto;
            border-right: 3px solid #333;
        }

        .sidebar-header {
            padding: 0 25px 20px;
            border-bottom: 2px solid #333;
            margin-bottom: 20px;
        }

        .sidebar-header h2 {
            color: #eee;
            font-size: 1.3em;
        }

        .menu {
            list-style: none;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 25px;
            text-decoration: none;
            color: #ddd;
            border-left: 4px solid transparent;
            transition: .3s;
            font-size: 1.05em;
        }

        .menu-item a:hover {
            background: #222;
            color: #fff;
            border-left-color: #fff;
        }

        .menu-item.active a {
            background: #333;
            color: #fff;
            font-weight: bold;
            border-left-color: #fff;
        }

        /* ====================== CONTENIDO ====================== */
        .content {
            padding: 30px;
            width: 100%;
        }

        table {
            width: 100% !important;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #111;
            color: white;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        /* ====================== FOOTER ====================== */
        footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            background: #111;
            color: #fff;
            margin-top: auto;
        }

        @media (max-width: 968px) {
            #main-wrapper {
                padding-left: 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<header>
    <div class="header-content">
        <div class="header-left">
            <div class="hamburger" id="sidebarToggle">☰</div>

            <div class="logo-text">
                <h1>Alquiladora GAOS</h1>
                <p>Sistema web de gestión de renta de lonas, carpas, mesas y sillas</p>
            </div>
        </div>

        <nav class="header-nav">
            <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Inicio</a>
            <a href="{{ url('/reportes') }}" class="{{ Request::is('reportes*') ? 'active' : '' }}">Reportes</a>
        </nav>
    </div>
</header>


<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h2>Menú Principal</h2>
    </div>

    <ul class="menu">

        <li class="menu-item {{ Request::is('login') ? 'active' : '' }}">
            <a href="{{ route('login') }}">
                <span class="menu-icon">🔐</span> <span>Iniciar Sesión</span>
            </a>
        </li>

        <!-- ÚNICO BOTÓN USUARIOS (CORRECTO) -->
        <li class="menu-item {{ Request::is('usuarios*') ? 'active' : '' }}">
            <a href="{{ url('/usuarios') }}">
                <span class="menu-icon">👥</span> <span>Usuarios</span>
            </a>
        </li>

    </ul>
</aside>


<!-- CONTENIDO -->
<div id="main-wrapper">
    <main class="content">
        @yield('content')
    </main>

    <footer>
        © Alquiladora GAOS
    </footer>
</div>

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        const wrapper = document.getElementById('main-wrapper');

        if (sidebar.style.left === '0px') {
            sidebar.style.left = '-260px';
            wrapper.classList.remove('sidebar-visible');
        } else {
            sidebar.style.left = '0px';
            wrapper.classList.add('sidebar-visible');
        }
    });
</script>

</body>
</html>
