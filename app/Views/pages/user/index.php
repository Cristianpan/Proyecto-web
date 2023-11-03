<?php $this->extend("templates/layout") ?>

<?php $this->section("title") ?>
<title>Art Zone | Usuario</title>
<?php $this->endSection() ?>

<?php $this->section("css") ?>

<link rel="preload" href="/assets/css/profile.min.css" as="style" />
<link rel="stylesheet" href="/assets/css/profile.min.css" />
<?php $this->endSection() ?>

<?php $this->section("js") ?>
<script src="/assets/js/personalBlocks.min.js"></script>
<?php $this->endSection() ?>


<?php $this->section("content") ?>

<div class="profile">
    <img class="profile__background" src="/assets/images/fondo.jpg">

    <div class="profile__content">
        <div class="profile__picture">
            <img src="/assets/images/porfile.jpg">
        </div>
        <h3 class="profile__name">Lucía Méndez</h3>

        <div class="profile__info-container">
            <div class="profile__info">
                <p class="profile__info-text profile__info-text--bolder">30</p>
                <p class="profile__info-text">Creaciones</p>
            </div>
            <div class="profile__info">
                <p class="profile__info-text profile__info-text--bolder">10</p>
                <p class="profile__info-text">Disponible</p>
            </div>
        </div>
    </div>
</div>

<div class="about container">
    <h1 class="about__name">Lucía Méndez</h1>
    <p class="about__job">Oficio</p>
    <p class="about__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et aut alias odio qui ad ut
        maiores ea iusto. Explicabo consequatur unde provident accusantium harum repudiandae amet ipsam enim. Atque,
        quidem? si Lorem ipsum dolor sit amet consectetur adipisicing elit. Et aut alias odio qui ad ut
        maiores ea iusto. Explicabo consequatur unde provident accusantium harum repudiandae amet ipsam enim. Atque,
        quidem? si</p>
</div>

</div>

<section class="container">
    <?= view("components/personalBlocks") ?>
</section>

<section class="container">
    <h2 class="title-orange">Catálogo</h2>
    <?= view("components/searchBar") ?>
    <?= view("components/gallery") ?>
</section>
<?php $this->endSection() ?>