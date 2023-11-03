<?php $this->extend("templates/layout") ?>
<?php $this->section("title") ?>
<title>Art Zone | Pagar compra</title>
<?php $this->endSection() ?>

<?php $this->section("css") ?>
<link rel="preload" href="/assets/css/payment.min.css" as="style" />
<link rel="stylesheet" href="/assets/css/payment.min.css" />
<!-- include your css styles -->

<?php $this->endSection() ?>

<?php $this->section("js") ?>
<script src="/assets/js/payment.js"></script>
<!-- include your js code -->
<?php $this->endSection() ?>

<?php $this->section("content") ?>
<main class="payment">
    <form class="payment-form">
        <h2 class="payment__price">A pagar $1,0000.00</h2>
        <div class="payment-form__section">
            <div class="payment-form__field">
                <input class="payment-form__input" type="text" id="name" name="name">
                <label class="payment-form__label" for="name">Nombre</label>
            </div>

            <div class="payment-form__fields">
                <div class="payment-form__field">
                    <input class="payment-form__input" type="text" id="firstSurname" name="firstSurname">
                    <label class="payment-form__label" for="firstSurName">Primer Apellido</label>
                </div>
                <div class="payment-form__field">
                    <input class="payment-form__input" type="text" id="secuondSurname" name="secondSurname">
                    <label class="payment-form__label" for="secondSurname">Segundo Apellido</label>
                </div>
            </div>
            <div class="payment-form__field">
                <input type="email" id="email" name="email">
                <label class="payment-form__label" for="email">Correo Electronico</label>
            </div>
            <div class="payment-form__field">
                <input type="text" id="telephone" name="telephone">
                <label class="payment-form__label" for="telephone">Telefono</label>
            </div>
        </div>

        <div class="payment-form__section payment-form__section--grid">
            <div class="payment-form__field payment-form__field--grid-1-3">
                <input class="payment-form__input" type="text" id="card" name="card">
                <label class="payment-form__label" for="card">Número de tarjeta</label>
            </div>
            <div class="payment-form__field">
                <input class="payment-form__input" type="text" id="key" name="key">
                <label class="payment-form__label" for="key">CVV</label>
            </div>
            <div class="payment-form__field">
                <input class="payment-form__input" type="text" id="country" name="country">
                <label class="payment-form__label" for="country">Pais</label>
            </div>
            <div class="payment-form__field">
                <input class="payment-form__input" type="text" id="colony" name="colony">
                <label class="payment-form__label" for="colony">Colonia</label>
            </div>
            <div class="payment-form__field payment-form__field--grid-1-3">
                <input class="payment-form__input " type="text" id="cross" name="cross">
                <label class="payment-form__label" for="cross">Cruzamientos</label>
            </div>
            <div class="payment-form__field">
                <input class="payment-form__input" type="text" id="state" name="state">
                <label class="payment-form__label" for="state">Estado</label>
            </div>
            <div class="payment-form__field">
                <input class="payment-form__input" type="text" id="street" name="street">
                <label class="payment-form__label" for="street">Calle</label>
            </div>
            <div class="payment-form__field">
                <input class="payment-form__input" type="text" id="numHouse" name="numHouse">
                <label class="payment-form__label" for="numHouse">No. Casa</label>
            </div>
        </div>

        <div class="buttons">
            <input class="buttons__button buttons__button--submit" type="submit" value="Comprar" id="comprar">
            <a href="#" class="buttons__button buttons__button--cancel">Cancelar</a>
        </div>
    </form>
</main>
<?php $this->endSection() ?>