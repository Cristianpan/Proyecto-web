<nav class="navbar">
  <div class="navbar-left">
    <a href="">Inicio</a>
  </div>
  <div class="navbar-center">
    <a href="">
      <img src="/assets/images/logo_artzone.png" alt="Logo Artzone">
    </a>
  </div>
  <div class="navbar-right">
    <a href="carrito.php">
      <img src="/assets/images/carrito.png" alt="Carrito de compras">
    </a>
    <div class="perfil" id="perfilCircle">
      <a href="#" id="perfilLink">
        <div class="perfil-circle">
          <img src="/assets/images/user_icon.png" alt="Foto de perfil">
        </div>
      </a>
      <div class="navbar__profile-options" id="profileOptions">
        <ul>
          <li><a href="#" class="navbar__link">Editar Perfil</a></li>
          <li><a href="#" class="navbar__link">Cerrar Sesión</a></li>
          <li><a href="#" class="navbar__link">Editar Obra</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<script>
  // Obtén el enlace del perfil y las opciones del perfil
  const perfilLink = document.getElementById('perfilLink');
  const profileOptions = document.getElementById('profileOptions');

  // Agrega un evento de clic al enlace del perfil
  perfilLink.addEventListener('click', function (e) {
    e.preventDefault(); // Evita que el enlace se abra

    // Muestra u oculta las opciones del perfil al hacer clic
    if (profileOptions.style.display === 'block') {
      profileOptions.style.display = 'none';
    } else {
      profileOptions.style.display = 'block';
    }
  });
</script>