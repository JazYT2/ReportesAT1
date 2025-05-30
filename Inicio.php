
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reportes</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/LOGO ICONO.ico">

  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    :root {
      --bg-light: #f4f6fc;
      --bg-dark: #1f1f1f;
      --text-light: #1f1f1f;
      --text-dark: #f4f6fc;
      --primary: #7b4fff;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--bg-light);
      color: var(--text-light);
      display: flex;
      min-height: 100vh;
      transition: background-color 0.3s, color 0.3s;
    }

    body.dark {
      background-color: var(--bg-dark);
      color: var(--text-dark);
    }

    .sidebar {
      width: 80px;
      background-color: white;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 1rem 0;
      box-shadow: 2px 0 5px rgba(0,0,0,0.05);
      transition: width 0.3s;
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      z-index: 1000;
    }

    body.dark .sidebar {
      background-color: #121212;
    }

    .sidebar.collapsed {
      width: 220px;
    }

    .top-section {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 1rem;
    }

    .logo {
      background-color: var(--primary);
      color: #fff;
      padding: 0.5rem 0.8rem;
      border-radius: 10px;
      font-weight: bold;
      font-size: 1.2rem;
    }

    .toggle-btn {
      background: transparent;
      border: none;
      cursor: pointer;
      color: #555;
      transform: rotate(180deg);
    }

    .sidebar.collapsed .toggle-btn {
      transform: rotate(0deg);
    }

    .nav-links {
      margin-top: 2rem;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      padding: 0 1rem;
    }

    .nav-links a {
      display: flex;
      align-items: center;
      gap: 1rem;
      text-decoration: none;
      color: inherit;
      padding: 0.5rem;
      border-radius: 10px;
      transition: background 0.2s;
    }

    .nav-links a:hover {
      background-color: #f0f0f0;
    }

    body.dark .nav-links a:hover {
      background-color: #2a2a2a;
    }

    .nav-links span {
      display: none;
    }

    .sidebar.collapsed .nav-links span {
      display: inline;
    }

    .bottom-toggle {
      padding: 1rem;
      display: flex;
      justify-content: center;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 42px;
      height: 24px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0; left: 0;
      right: 0; bottom: 0;
      background-color: #ccc;
      border-radius: 24px;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }

    input:checked + .slider {
      background-color: var(--primary);
    }

    input:checked + .slider:before {
      transform: translateX(18px);
    }
    .main {
  margin-left: 220px;            /* más separación del sidebar */
  flex-grow: 1;
  padding: 2rem;
  transition: margin-left 0.3s;
  width: 100%;

  display: flex;
  flex-direction: column;
  align-items: center;           /* centra horizontalmente el contenedor */
  justify-content: center;       /* centra verticalmente */
  min-height: 100vh;
  text-align: center;            /* centra el texto internamente */
}

    .sidebar.collapsed ~ .main {
      margin-left: 220px;
    }

    .form-section {
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      max-width: 1000px;
      margin: 0 auto;
    }

    .btn-submit {
      background-color: #007bff;
      color: #fff;
      padding: 10px 25px;
      font-size: 16px;
      font-weight: 500;
      border: none;
      border-radius: 5px;
    }

    .btn-submit:hover {
      background-color: #0056b3;
    }

    .mobile-menu-btn {
      position: fixed;
      top: 1rem;
      left: 1rem;
      z-index: 1100;
      background-color: var(--primary);
      border: none;
      color: white;
      padding: 8px 10px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .overlay {
      position: fixed;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: 1049;
      display: none;
    }

    .overlay.active {
      display: block;
    }

    .home-card {
    background-color: #f8f9fc;
    border-radius: 10px;
    padding: 2rem 1.5rem;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, background-color 0.3s;
    animation: fadeIn 0.8s ease forwards;
    opacity: 0;
  }

  .home-card .icon {
    width: 32px;
    height: 32px;
  }

  .home-card:hover {
    transform: translateY(-5px);
  }

  .fade-in { animation-delay: 0.3s; }
  .delay-1 { animation-delay: 0.5s; }
  .delay-2 { animation-delay: 0.7s; }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  body.dark .home-card {
    background-color: #2a2a2a;
    color: var(--text-dark);
  }

  body.dark .home-card:hover {
    background-color: #3a3a3a;
  }

    @media (max-width: 768px) {
      .sidebar {
        position: fixed;
        top: 0;
        left: -100%;
        width: 220px;
        height: 100%;
        transition: left 0.3s ease;
        z-index: 1050;
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
      }

      .sidebar.collapsed {
        left: 0;
      }

      .main {
        margin-left: 0 !important;
        padding: 1rem;
      }

      .form-section {
        padding: 15px;
      }

      body.sidebar-open {
        overflow: hidden;
      }
    }

    .bg-light-subtle { background-color: #f8f9fc; }
    .form-check { font-size: 0.95rem; }
    .form-label { font-weight: 600; }
    .form-check-input { margin-right: 6px; }
    .checkbox-group { display: flex; flex-wrap: wrap; gap: 0.5rem 1rem; }
    textarea, input, select { font-size: 0.95rem; }
  </style>
</head>
<body>
<button class="mobile-menu-btn d-md-none" onclick="toggleSidebar()"><i data-lucide="menu"></i></button>

<div class="sidebar" id="sidebar">
  <div class="top-section">
    <div class="logo">AT</div>
    <button class="toggle-btn d-none d-md-block" onclick="toggleSidebar()">
      <i data-lucide="chevron-right"></i>
    </button>
  </div>
  <div class="nav-links">
    <a href="Inicio.php"><i data-lucide="home"></i><span>Inicio</span></a>
    <a href="HomeAdaptable.php"><i data-lucide="bar-chart-3"></i><span>Reportes</span></a>
    <a href="VerDatos.php"><i data-lucide="folder"></i><span>Mis Registros</span></a>
    <a href="RegistrarUsuarios.php"><i data-lucide="user"></i><span>Perfil</span></a>
    <a href="ListaDeUsuarios.php"><i data-lucide="user"></i><span>Lista Usuarios</span></a>
    <a href="index.php"><i data-lucide="log-out"></i><span>Cerrar sesión</span></a>
  </div>
  <div class="bottom-toggle">
    <label class="switch">
      <input type="checkbox" id="darkModeToggle">
      <span class="slider"></span>
    </label>
  </div>
</div>
<div class="main">
  <div class="container-fluid">
    <h2 class="mb-4 fw-bold">Bienvenido al Sistema de reportes de Athenas C.A</h2>
    <div class="row g-4">
      
      <!-- Tarjeta 1 -->
      <div class="col-md-4">
        <div class="home-card fade-in">
          <i data-lucide="clipboard-list" class="mb-3 icon"></i>
          <h5 class="fw-bold">Reportes enviados</h5>
          <p class="mb-3">28 este mes</p>
          <a href="#" class="btn btn-primary btn-sm">Ver detalles</a>
        </div>
      </div>

      <!-- Tarjeta 2 -->
      <div class="col-md-4">
        <div class="home-card fade-in delay-1">
          <i data-lucide="wrench" class="mb-3 icon"></i>
          <h5 class="fw-bold">Nuevo Reporte</h5>
          <p class="mb-3">Inicia un nuevo formulario de inspección</p>
          <a href="HomeAdaptable.php" class="btn btn-success btn-sm">Crear</a>
        </div>
      </div>

      <!-- Tarjeta 3 -->
      <div class="col-md-4">
        <div class="home-card fade-in delay-2">
          <i data-lucide="folder" class="mb-3 icon"></i>
          <h5 class="fw-bold">Mis Registros</h5>
          <p class="mb-3">Consulta tus reportes anteriores</p>
          <a href="VerDatos.php" class="btn btn-secondary btn-sm">Ver registros</a>
        </div>
      </div>

    </div>
  </div>
</div>


      
    </form>
  </div>
</div>

<script>
  lucide.createIcons();
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const body = document.body;
    sidebar.classList.toggle('collapsed');
    overlay.classList.toggle('active');
    body.classList.toggle('sidebar-open');
  }
  function closeSidebar() {
    document.getElementById('sidebar').classList.remove('collapsed');
    document.getElementById('overlay').classList.remove('active');
    document.body.classList.remove('sidebar-open');
  }
  document.getElementById('darkModeToggle').addEventListener('change', function () {
    document.body.classList.toggle('dark');
  });
  lucide.createIcons(); // Asegura que los iconos se cargan correctamente
</script>
</script>
</body>
</html>
