<nav class="navbar">
    <?php if (!session()->has('user')): ?>
    <div class="navbar-left">
        <a href="/auth/login"><strong>Iniciar Sesión</strong></a>
        <a href="/auth/signup"><strong>Registrarse</strong></a>
    </div>
    <?php endif ?>
    <div class="navbar-center">
        <a class="navbar-brand" href="/">ArtZone</a>
    </div>
    <div class="navbar-right">
        <div class="carrito">
            <a href="/cart">
                <img src="/assets/images/carrito.png" alt="Carrito de compras">
            </a>
        </div>
        <?php 
            $user = session()->get('user') ?? null; 
            if ($user):
        ?>
        <div class="perfil" id="perfilCircle">
            <div class="perfil-circle" id="perfilButton">
                <img src="/assets/images/user_icon.png" alt="Foto de perfil">
                <div class="navbar__profile-options" id="profileOptions">
                    <ul>
                        <li><a href="/user/<?=$user['userId']?>" class="navbar__link"><strong>Usuario</strong></a></li>
                        <li><a href="/user/<?=$user['userId']?>/edit" class="navbar__link">Editar Perfil</a></li>
                        <li><a href="/user/<?=$user['userId']?>/catalog" class="navbar__link">Editar Catalogo</a></li>
                        <li><a href="/auth/logout" class="navbar__link">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif?>
    </div>
</nav>

<script>
const perfilButton = document.getElementById("perfilButton");
const profileOptions = document.getElementById("profileOptions");

perfilButton.addEventListener("mouseover", function() {
    profileOptions.style.display = "block";
});

perfilButton.addEventListener("mouseout", function() {
    profileOptions.style.display = "none";
});
</script>