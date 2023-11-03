<?php $this->extend("templates/layout") ?>

<?php $this->section("title") ?>
<title>Art Zone | Crear Obra</title>
<?php $this->endSection() ?>

<?php $this->section("css") ?>
<link rel="preload" href="/assets/css/createItem.min.css" as="style" />
<link rel="stylesheet" href="/assets/css/createItem.min.css" />
<?php $this->endSection() ?>

<?php $this->section("js") ?>
<script src="/assets/js/createItem.min.js"></script>
<?php $this->endSection() ?>


<?php $this->section("content") ?>
<?= view("components/navigationBar") ?>


<main class="item">
    <h2 class="item__title">Registrar Obra</h2>
    <form class="item-form" action="post">
        <div class="item-form__section item-form__section--image">
            <div class="item-form__images">
                <div class="swiper">
                    <div class="swiper-wrapper" id="swiper-image">
                        <div class="swiper-slide">
                            <img src="/assets/images/gallery/1.jpg">
                        </div>

                        <div class="swiper-slide">
                            <img src="/assets/images/gallery/1.jpg">
                        </div>
                        <div class="swiper-slide">
                            <img src="/assets/images/gallery/1.jpg">
                        </div>
                    </div>
                </div>

                <div class="item-form__field">
                    <label class="item-form__label--file" for="image">
                        <span><img src="/assets/images/plus-icon.svg" alt="add-icon"></span> Agregar imágenes
                    </label>
                    <input class="item-form__input--hidden" type="file" multiple accept="image/jpeg, image/png" name="image[]" id="image">
                </div>
            </div>
        </div>

        <div class="item-form__section item-form__section--inputs">
            <h2 class="item__title item__title--tablet">Registrar Obra</h2>
            <div class="item-form__field">
                <input type="text" class="item-form__input" id="name" name="name">
                <label for="name" class="item-form__label">Nombre</label>
            </div>
            <div class="item-form__field item-form__field--textarea">
                <textarea class="item-form__input item-form__input--textarea-short" name="shortDescription" id="shortDescription"></textarea>
                <label for="shortDescription" class="item-form__label">Descripción corta</label>
            </div>

            <div class="item-form__fields">
                <select name="type" class="item-form__input item-form__input--select">
                    <option value="" selected disabled>Tipo</option>
                    <option value="pintura">Pintura</option>
                    <option value="escultura">Escultora</option>
                    <option value="otro">Otro</option>
                </select>
                <select name="style" class="item-form__input item-form__input--select">
                    <option value="" selected disabled>Estilo</option>
                    <option value="pintura">Pintura</option>
                    <option value="escultura">Escultora</option>
                    <option value="otro">Otro</option>
                </select>
                <select name="theme" class="item-form__input item-form__input--select">
                    <option value="" selected disabled>Tema</option>
                    <option value="pintura">Pintura</option>
                    <option value="escultura">Escultora</option>
                    <option value="otro">Otro</option>
                </select>
                <select name="material" class="item-form__input item-form__input--select">
                    <option value="" selected disabled>Material</option>
                    <option value="pintura">Pintura</option>
                    <option value="escultura">Escultora</option>
                    <option value="otro">Otro</option>
                </select>
            </div>

            <div class="item-form__field item-form__field--textarea">
                <textarea class="item-form__input item-form__input--textarea" name="description" id="description"></textarea>
                <label for="description" class="item-form__label">Descripción</label>
            </div>

            <div class="item-form__field">
                <input type="text" class="item-form__input" id="measurements" name="measurements">
                <label for="measurements" class="item-form__label">Medidas</label>
            </div>

            <div class="item-form__field">
                <input type="text" class="item-form__input" id="origin" name="origin">
                <label for="origin" class="item-form__label">Lugar de origen</label>
            </div>

            <div class="item-form__fields">
                <div class="item-form__field--checkbox">
                    <input type="checkbox" class="item-form__input--checkbox" id="onSale" name="onSale">
                    <label for="onSale" class="item-form__label--checkbox">En venta</label>
                </div>
                <div class="item-form__field mb-0">
                    <input type="number" class="item-form__input" id="price" name="price">
                    <label for="price" class="item-form__label">Precio</label>
                </div>
            </div>
            <div class="buttons">
                <input type="submit" class="buttons__button buttons__button--submit" value="Guardar">
                <a href="#" class="buttons__button buttons__button--cancel">Cancelar</a>
            </div>
        </div>
    </form>
</main>

<?php $this->endSection() ?>