<nav class="navbar">
    <div class="navbar-left">
        <a href="/auth/login"><strong>Iniciar Sesión</strong></a>
        <a href="/auth/signup"><strong>Registrarse</strong></a>
    </div>
    <div class="navbar-center">
        <a href="">ArtZone</a>
    </div>
    <div class="navbar-right">
        <div class="carrito">
            <a href="#">
                <img src="/assets/images/carrito.png" alt="Carrito de compras">
            </a>
        </div>
        <div class="perfil" id="perfilCircle">
            <div class="perfil-circle" id="perfilButton">
                <img src="/assets/images/user_icon.png" alt="Foto de perfil">
                <!-- Dropdown menu (oculto) -->
                <div class="navbar__profile-options" id="profileOptions">
                    <ul>
                        <li><a href="#" class="navbar__link"><strong>Usuario</strong></a></li>
                        <li><a href="#" class="navbar__link">Editar Perfil</a></li>
                        <li><a href="#" class="navbar__link">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    const perfilButton = document.getElementById("perfilButton");
    const profileOptions = document.getElementById("profileOptions");

    perfilButton.addEventListener("mouseover", function () {
        profileOptions.style.display = "block";
    });

    perfilButton.addEventListener("mouseout", function () {
        profileOptions.style.display = "none";
    });
</script>