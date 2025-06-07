function updateNavbarAuthLinks() {
  const userLinks = document.getElementById('userLinks');
  if (!userLinks) return;

  userLinks.innerHTML = ''; // Limpiar

  const nick = localStorage.getItem('user_nick');

  if (nick) {
    // Usuario autenticado
    userLinks.innerHTML = `
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
          ${nick}
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#" onclick="cerrarSesion()">Cerrar sesión</a>
        </div>
      </li>
    `;
  } else {
    // No autenticado
    userLinks.innerHTML = `
      <li class="nav-item"><a class="nav-link" href="login.html">Iniciar sesión</a></li>
      <li class="nav-item"><a class="nav-link" href="registrarS.html">Registrarse</a></li>
    `;
  }
}

function cerrarSesion() {
  localStorage.removeItem('user_id');
  localStorage.removeItem('user_nick');
  window.location.href = '../index.html';
}
