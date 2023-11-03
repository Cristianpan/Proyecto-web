<?php $this->extend("templates/layout") ?>

<?php $this->section("title") ?>
<title>Art Zone | Editar Catálogo</title>
<?php $this->endSection() ?>

<?php $this->section("css") ?>
<link rel="preload" href="/assets/css/catalog.min.css" as="style" />
<link rel="stylesheet" href="/assets/css/catalog.min.css" />
<?php $this->endSection() ?>

<?php $this->section("js") ?>
<?php $this->endSection() ?>


<?php $this->section("content") ?>

<div class="container">
    <h2 class="title-orange">Catálogo</h2>
    <?= view("components/searchBar") ?>
</div>

<main class="container catalog">
    <a href="/user/catalog/item" class="catalog__add-button">
        <span class="catalog__hidden">Agregar Obra</span>
    </a>

    <?= view("/components/catalog") ?>

</main>

<?php $this->endSection() ?>