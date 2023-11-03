<?php $this->extend("templates/layout") ?>

<?php $this->section("title") ?>
<title>Art Zone | Editar Perfil</title>
<?php $this->endSection() ?>

<?php $this->section("css") ?>
<link rel="preload" href="/assets/css/profileEdit.min.css" as="style" />
<link rel="stylesheet" href="/assets/css/profileEdit.min.css" />
<?php $this->endSection() ?>

<?php $this->section("js") ?>
<script src="/assets/js/personalBlocks.min.js"></script>
<?php $this->endSection() ?>

<?php $this->section("content") ?>

<main class="container profile">
    <h2 class="profile__title">Mi cuenta</h2>

    <form class="profile-form">
        <div class="profile-form__section">
            <div id="profile-image" class="profile__image profile__image--none">
                <p>No se ha seleccionada alguna foto de perfil</p>
            </div>
            <div class="profile-form__field">
                <label class="profile-form__label--file" for="profile">
                    Agregar foto de perfil
                </label>
                <input class="profile-form__input--hidden" type="file" accept="image/jpeg, image/png" name="profile" id="profile">
            </div>
            <div class="profile-form__field profile-form__field--select">
                <select id="profesion" name="profesion" class="profile-form__input profile-form__input--select">
                    <option value="" selected disabled>Profesion</option>
                    <option value="pintor">Pintor</option>
                    <option value="escultor">Escultor</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
        </div>
        <div class="profile-form__section">
            <div class="flex">
                <div class="flex__content">
                    <div id="background-image" class="profile__image profile__image--none">
                        <p>No se ha seleccionada alguna foto de perfil</p>
                    </div>
                    <div class="profile-form__field">
                        <label class="profile-form__label--file" for="background">
                            Agregar foto de perfil
                        </label>
                        <input class="profile-form__input--hidden" accept="image/jpeg, image/png" type="file" name="background" id="background">
                    </div>
                </div>
                <div class="flex__content">
                    <div class="profile-form__field">
                        <input type="text" class="profile-form__input" name="name" id="name">
                        <label class="profile-form__label" for="name">Nombre</label>
                    </div>
                    <div class="profile-form__field">
                        <input type="text" class="profile-form__input" name="Apellido" id="Apellido">
                        <label class="profile-form__label" for="Apellido">Apellido</label>
                    </div>
                    <div class="profile-form__field">
                        <input type="email" class="profile-form__input" name="email" id="email">
                        <label class="profile-form__label" for="email">Correo electrónico</label>
                    </div>
                    <div class="profile-form__field">
                        <input type="numer" class="profile-form__input" name="card" id="card">
                        <label class="profile-form__label" for="card">No. de Tarjeta</label>
                    </div>
                </div>
            </div>
            <div class="profile-form__field profile-form__field--textarea">
                <textarea name="description" id="description" class="profile-form__input profile-form__input--textarea"></textarea>
                <label for="description" class="profile-form__label">Descripción</label>
            </div>
            <div class="buttons">
                <input type="submit" class="buttons__button buttons__button--submit" value="Actualizar">
                <a href="#" class="buttons__button buttons__button--cancel">Cancelar</a>
            </div>
        </div>
    </form>
</main>

<section class="container personals-block-edit">
    <div class="personals-block-edit__header">
        <h2 class="personals-block-edit__title">Bloques Personales</h2>
        <button class="personals-block-edit__add"><img src="/assets/images/plus-icon.svg" alt="add-icon"></button>
    </div>

    <?= view("components/personalBlocks", ['edit' => true]) ?>
</section>


<div class="modal modal--none">
    <div class="modal__content">
        <h2 class="modal__title">Agregar Nuevo Bloque</h2>
        <form class="modal-form" method="post">
            <div class="modal-form__field">
                <input class="modal-form__input" type="text" id="block-name" name="name">
                <label class="modal-form__label" for="block-name">Nombre</label>
            </div>
            <div class="modal-form__field modal-form__field--textarea">
                <textarea class="modal-form__input" id="block-description" name="description"></textarea>
                <label class="modal-form__label" for="block-description">Descripción</label>
            </div>

            <div class="buttons">
                <input type="submit" class="buttons__button" value="Guardar Bloque">
                <input type="reset" class="buttons__button buttons__button--cancelar" value="Cancelar">
            </div>
        </form>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section("js") ?>
<script src="/assets/js/profileEdit.min.js"></script>
<?php $this->endSection() ?>