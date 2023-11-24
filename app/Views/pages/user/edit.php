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

    <form class="profile-form" method="post">
        <div class="profile-form__section">
            <?= validation_show_error('imageProfile', 'alert-error') ?>
            <div class="profile-form__field profile-form__field--file">
                <?= view("components/filePondInput", ['inputName' => 'imageProfile', 'deleteFiles' => $imageProfile['deleteFiles'] ?? []]) ?>
            </div>
            <div class="profile-form__field profile-form__field--select">
                <?= validation_show_error('occupationId', 'alert-error') ?>
                <select id="profesion" name="occupationId" class="profile-form__input profile-form__input--select">
                    <option value="">Ocupación</option>
                    <?php foreach ($occupations as $occupation) : 
                        $auxOccupation = old('occupationId') ?? $userDetails['occupationId'] ?? ''; 
                    ?>
                        <option value="<?= $occupation['occupationId'] ?>" <?= $auxOccupation == $occupation['occupationId'] ? 'selected' : '' ?>><?= $occupation['occupationType'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="profile-form__section">
            <div class="flex">
                <div class="flex__content">
                    <?= validation_show_error('imageBackground', 'alert-error') ?>
                    <div class="profile-form__field profile-form__field--file">
                        <?= view("components/filePondInput", ['inputName' => 'imageBackground', 'deleteFiles' => $imageBackground['deleteFiles'] ?? []]) ?>

                    </div>
                </div>
                <div class="flex__content">
                    <?= validation_show_error('name', 'alert-error') ?>
                    <div class="profile-form__field">
                        <input type="text" class="profile-form__input" name="name" id="name" value="<?= old('name') ?? $userData['name'] ?? '' ?>">
                        <label class="profile-form__label" for="name">Nombre</label>
                    </div>
                    <?= validation_show_error('lastName', 'alert-error') ?>
                    <div class="profile-form__field">
                        <input type="text" class="profile-form__input" name="lastName" id="lastName" value="<?= old('lastName') ?? $userData['lastName'] ?? '' ?>">
                        <label class="profile-form__label" for="lastName">Apellido</label>
                    </div>
                    <?= validation_show_error('email', 'alert-error') ?>
                    <div class="profile-form__field">
                        <input type="email" class="profile-form__input" name="email" id="email" value="<?= old('email') ?? $userData['email'] ?? '' ?>">
                        <label class="profile-form__label" for="email">Correo electrónico</label>
                    </div>
                    <?= validation_show_error('cardNumber', 'alert-error') ?>
                    <div class="profile-form__field">
                        <input type="numer" class="profile-form__input" name="cardNumber" id="card" value="<?= old('cardNumber') ?? $userDetails['cardNumber'] ?? '' ?>">
                        <label class="profile-form__label" for="card">No. de Tarjeta</label>
                    </div>
                </div>
            </div>

            <div class="profile-form__field profile-form__field--textarea">
                <textarea name="description" id="description" class="profile-form__input profile-form__input--textarea"><?= old('description') ?? $userDetails['description'] ?? '' ?></textarea>
                <label for="description" class="profile-form__label">Descripción</label>
            </div>
            <div class="buttons">
                <input type="submit" class="buttons__button buttons__button--submit" value="Actualizar">
                <a href="/user/<?= session()->get('user')['userId'] ?>/edit" class="buttons__button buttons__button--cancel">Cancelar</a>
            </div>
        </div>
        <input type="hidden" name="userDetailId" value="<?= old('userDetailId') ?? $userDetails['userDetailId'] ?? '' ?>">
    </form>
    <input type="hidden" id="imageBackgroundConfig" name="fileImageBackground" value="<?= esc(json_encode($imageBackground)) ?>">
    <input type="hidden" id="imageProfileConfig" name="fileImageProfle" value="<?= esc(json_encode($imageProfile)) ?>">
</main>

<section class="container personals-block-edit">
    <div class="personals-block-edit__header">
        <h2 class="personals-block-edit__title">Bloques Personales</h2>
        <button class="personals-block-edit__add"><img src="/assets/images/plus-icon.svg" alt="add-icon"></button>
    </div>

    <?php if ($personalBlocks ?? null) { ?>
        <?= view("components/personalBlocks", ['edit' => true, 'personalBlocks' => $personalBlocks]) ?>
    <?php } else { ?>
        <p>¡Registra un nuevo bloque para que te conozcan mejor!</p>
    <?php } ?>
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