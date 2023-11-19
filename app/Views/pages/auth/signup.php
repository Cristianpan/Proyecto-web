<?php $this->extend('pages/auth/layout'); ?>


<?php $this->section("title") ?>
<title>Iniciar Sesión | Art Zone</title>
<?php $this->endSection() ?>


<?php $this->section("content") ?>
<nav class="nav">
    <a class="nav__link" href="/auth/login">Iniciar Sesión</a>
    <a class="nav__link nav__link--active" href="/auth/signup">Registrarse</a>
</nav>
<div class="auth__info">
    <h1 class="auth__title">Art Zone</h1>
    <p class="auth__description">¡Registra tu cuenta!</p>
</div>
<form class="form">
    <div class="form__field--fields">
        <div class="form__field">
            <input class="form__input" type="text" id="name" name="name" required>
            <label for="name" class="form__label">Nombre</label>
        </div>
        <div class="form__field">
            <input class="form__input" type="text" id="lastName" name="lastName" required>
            <label for="lastName" class="form__label">Apellido</label>
        </div>
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

    <a href="/auth/login" class="form__enlace-nav">Ya tienes una cuenta? Inicia Sesión</a>
</form>
<?php $this->endSection() ?>