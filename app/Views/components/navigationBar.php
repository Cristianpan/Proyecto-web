<nav class="navbar">
  <div class="navbar-left">
        <a href=""><strong>Inicio</strong></a>
  </div>
  <div class="navbar-center">
    <a href=""> ArtZone </a>
  </div>
  <div class="navbar-right">
    <div class="carrito">
        <a href="carrito.php">
            <img src="/assets/images/carrito.png" alt="Carrito de compras">
        </a>
    </div>
    <div class="perfil" id="perfilCircle">
      <a href="#" id="perfilLink">
        <div class="perfil-circle">
          <img src="/assets/images/user_icon.png" alt="Foto de perfil">
        </div>
      </a>
      <div class="navbar__profile-options" id="profileOptions">
        <ul>
          <li><a href="#" class="navbar__link">Editar Perfil</a></li>
          <li><a href="#" class="navbar__link">Editar Obra</a></li>
          <li><a href="#" class="navbar__link">Cerrar Sesión</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<script>
  const perfilLink = document.getElementById('perfilLink');
  const profileOptions = document.getElementById('profileOptions');

  perfilLink.addEventListener('click', function (e) {
    e.preventDefault(); 

    // Muestra las opciones del perfil al hacer clic <img src="/assets/images/logo_artzone.png" alt="Logo Artzone">
    if (profileOptions.style.display === 'block') {
      profileOptions.style.display = 'none';
    } else {
      profileOptions.style.display = 'block';
    }
  });
</script>