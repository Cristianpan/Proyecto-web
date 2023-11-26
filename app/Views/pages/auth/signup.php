<?php $this->extend('pages/auth/layout'); ?>


<?php $this->section("title") ?>
<title>Iniciar Sesión | Art Zone</title>
<?php $this->endSection() ?>


<?php $this->section("content") ?>
<div class="auth__info">
    <h1 class="auth__title">Art Zone</h1>
    <p class="auth__description">¡Registra tu cuenta!</p>
</div>
<form class="form" method="post">
    <?= validation_show_error('name', 'alert-error') ?>
    <div class="form__field">
        <label for="name" class="form__label">Nombre</label>
        <input class="form__input" type="text" id="name" name="name" placeholder="Nombre" required value=<?= old('name') ?>>
    </div>
    <?= validation_show_error('email', 'alert-error') ?>
    <div class="form__field">
        <label for="email" class="form__label">Correo Electrónico</label>
        <input class="form__input" type="email" id="email" name="email" placeholder="Correo" required value=<?= old('email') ?>>
    </div>

    <?= validation_show_error('password', 'alert-error') ?>
    <div class="form__field">
        <label for="password" class="form__label">Contraseña</label>
        <input class="form__input" type="password" id="password" name="password" placeholder="Contraseña" required>
    </div>

    <input type="submit" class="form__submit" value="Registrarse">

    <a href="/auth/login" class="form__link form__link--center">Ya tienes una cuenta? Inicia Sesión</a>
</form>
<?php $this->endSection() ?>