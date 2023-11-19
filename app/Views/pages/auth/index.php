<?php $this->extend('pages/auth/layout'); ?>


<?php $this->section("title") ?>
<title>Iniciar Sesión | Art Zone</title>
<?php $this->endSection() ?>


<?php $this->section("content") ?>
<nav class="nav">
    <a class="nav__link nav__link--active" href="/auth/login">Iniciar Sesión</a>
    <a class="nav__link" href="/auth/signup">Registrarse</a>
</nav>
<div class="auth__info">
    <h1 class="auth__title">Art Zone</h1>
    <p class="auth__description">¡Bienvenido de vuelta!</p>
</div>


<form class="form" method="post">
    <?= validation_show_error('email', 'alert-error') ?>
    <div class="form__field">
        <input class="form__input" type="text" id="email" name="email" value="<?= old('email') ?? ''?>">
        <label for="email" class="form__label">Correo</label>
    </div>
    <?= validation_show_error('password', 'alert-error') ?>
    <div class="form__field">
        <input class="form__input" type="password" id="password" name="password" value="<?= old('password') ?? ''?>">
        <label for="password" class="form__label">Contraseña</label>
    </div>
    <?= validation_show_error('credentials', 'alert-error') ?>

    <a class="form__enlace" href="#">¿Olvidaste tu contraseña?</a>

    <input type="submit" class="form__submit" value="Iniciar Sesión ">

    <a href="/auth/signup" class="form__enlace-nav">Aún no tienes una cuenta? Regístrate</a>
</form>
<?php $this->endSection() ?>