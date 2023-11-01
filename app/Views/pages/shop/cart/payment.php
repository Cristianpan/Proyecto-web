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
<!-- include your js code -->
<?php $this->endSection() ?>

<?php $this->section("content") ?>
<?= view("components/navigationBar") ?>
<div class="form">
    <form action="">
        <div class="rowSectionF">
            <div class="rowSectionF__first">
                <input type="text" id="name" name="name" placeholder="Nombres">
            </div>
            <div class="rowSectionF__second">
                <input class="rowSectionF__second__Apellido" type="text" id="Surname" name="Surname" placeholder="Primer Apellido">
                <input type="text" id="secondsurname" name="secondsurname" placeholder="Segundo Apellido">
            </div>
            <div class="rowSectionF__third">
                <input type="email" id="email" name="email" placeholder="Correo Electronico">
            </div>
            <div class="rowSectionF__fourth">
                <input type="text" id="telephone" name="telephone" placeholder="Telefono">
            </div>
        </div>
        <div class="rowSectionS">
            <div class="rowSectionS__first">
                <input class="rowSectionS__first__card" type="text" id="card" name="card" placeholder="Numero de tarjeta">
                <input class="rowSectionS__first__key" type="text" id="key" name="key" placeholder="Clave">
            </div>
            <div class="rowSectionS__second">
                <input class="rowSectionS__second__country" type="text" id="country" name="country" placeholder="Pais">
                <input class="rowSectionS__second__colony" type="text" id="colony" name="colony" placeholder="Colonia">
                <input class="rowSectionS__second__cross" type="text" id="cross" name="cross" placeholder="Cruzamiento">
            </div>
            <div class="rowSectionS__third">
                <input class="rowSectionS__third__state" type="text" id="state" name="state" placeholder="Estado">
                <input class="rowSectionS__third__street" type="text" id="street" name="street" placeholder="calle">
                <input class="rowSectionS__third__numHouse" type="text" id="numHouse" name="numHouse" placeholder="No.Casa">
            </div>
        </div>
        <div class="submit">
            <input class="submit__comprar" type="submit" value="Comprar">
            <input class="submit__cancelar" type="submit" value="CANCELAR">
        </div>
    </form>
</div>
<?php $this->endSection() ?>