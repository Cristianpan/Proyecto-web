<?php $this->extend('pages/auth/layout'); ?>


<?php $this->section("title") ?>
<title>Iniciar Sesión | Art Zone</title>
<?php $this->endSection() ?>


<?php $this->section("content") ?>
<nav class="nav">
    <a class="nav__link nav__link--active" href="/auth/signup">Registrarse</a>
    <a class="nav__link" href="/auth/login">Iniciar Sesión</a>
</nav>
<div class="auth__info">
    <h1 class="auth__title">Art Zone</h1>
    <p class="auth__description">¡Registra tu cuenta!</p>
</div>
<form class="form">
    <div class="form__field">
        <input class="form__input" type="text" id="user" name="user" required>
        <label for="user" class="form__label">Usuario</label>
    </div>
    <div class="form__field">
        <input class="form__input" type="email" id="email" name="email" required>
        <label for="email" class="form__label">Correo</label>
    </div>

    <div class="form__field">
        <input class="form__input" type="password" id="password" name="password" required>
        <label for="password" class="form__label">Contraseña</label>
    </div>

    <input type="submit" class="form__submit" value="Registrarse">
</form>
<?php $this->endSection() ?>