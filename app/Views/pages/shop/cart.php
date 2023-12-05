<?php $this->extend("templates/layout") ?>
<?php $this->section("title") ?>
<title>Art Zone | Cart</title>
<?php $this->endSection() ?>

<?php $this->section("css") ?>
<link rel="stylesheet" href="/assets/css/cart.min.css" />
<?php $this->endSection() ?>

<?php $this->section("js") ?> 
    <script src="/assets/js/cart.min.js"></script>

<?php $this->endSection() ?>

<?php $this->section("content") ?>
<div class="cart">
    <section class="cart__items">
        <div class="cart__items__title">
            <h1>Carrito de compras</h1>
        </div>
        <div class="cart__items__shopping">
            <div class="cart__items__shopping__header">
                <p class="cart__items__shopping__header__cell cell1"></p>
                <p class="cart__items__shopping__header__cell">Producto</p>
                <p class="cart__items__shopping__header__cell"></p>
                <p class="cart__items__shopping__header__cell cell4">Total</p>
            </div>
            <div class="cart__items__shopping__rows">
                <?php for ($i = 1; $i < 8; $i++) : ?>
                    <div id="art-item-<?=$i?>" class="art-item cart__items__shopping__rows__row">
                        <div class="cart__items__shopping__rows__row__cell1">
                            <button class="button-delete" data-id=<?=$i?>>X</button>
                        </div>
                        <div class="cart__items__shopping__rows__row__cell">
                            <div class="cart__items__shopping__rows__row__cell__img">
                                <img src="/assets/images/cart/j.jpg">
                            </div>
                        </div>
                        <div class="cart__items__shopping__rows__row__cell">
                            <p class="cart__items__shopping__rows__row__cell__title">Jirafa artística</p>
                            <p class="cart__items__shopping__rows__row__cell__desc">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Consequuntur</p>
                            <p class="cart__items__shopping__rows__row__cell__artist">Nombre artista</p>
                        </div>
                        <div class="cart__items__shopping__rows__row__cell4">
                            <p> $1269</p>
                        </div>

                    </div>
                <?php endfor ?>
            </div>
        </div>
    </section>
    <main class="cart__details">
        <div class="cart__details__content">
            <div class="cart__details__content__header">
                <h1>Detalle de compra</h1>
                <img src="/assets/images/cart/paypal.png">
            </div>
            <div class="cart__details__content__description">
                <div class="title">
                    <p>Cantidad de productos</p>
                </div>
                <div class="number">
                    <p>2</p>
                </div>
                <div class="title">
                    <p>Subtotal</p>
                </div>
                <div class="number">
                    <p>$5000</p>
                </div>
                <div class="title">
                    <p>Costo de envío</p>
                </div>
                <div class="number">
                    <p>$544</p>
                </div>
                <div class="title total">
                    <p>Total</p>
                </div>
                <div class="number total">
                    <p>$5644</p>
                </div>
            </div>
            <a href="/shop/cart/pay">Mi pago</a>
        </div>
    </main>
</div>
<?php $this->endSection() ?>