<?php $this->extend("templates/layout") ?>

<?php $this->section("title") ?>
<title>Art Zone | Usuario</title>
<?php $this->endSection() ?>

<?php $this->section("css") ?>

<link rel="preload" href="/assets/css/profile.min.css" as="style" />
<link rel="stylesheet" href="/assets/css/profile.min.css" />
<?php $this->endSection() ?>


<?php $this->section("content") ?>
<?= view("components/navigationBar") ?>

<div class="profile">
    <img class="profile__background" src="../assets/images/fondo.jpg">

    <div class="profile__datas">
        <div class="profile__datas__picture">
            <img src="../assets/images/porfile.jpg">
        </div>
        <h3 class="profile__datas__name">Nombre artista</h3>
        <div class="profile__datas__info">
            <div class="profile__datas__info__numbers">
                <p><b>30</b><br></p>
                <p>Creaciones</p>
            </div>
            <div class="profile__datas__info__numbers">
                <p><b>10</b><br></p>
                <p>Disponible</p>
            </div>
        </div>
    </div>
    <div class="profile__editButton">
        <button>
            <img src="../assets/images/edit-icon.svg" alt="Descripción de la imagen">
            <span>Editar Perfil</span>
        </button>
    </div>

</div>

<div class="aboutme">
    <h1 class="aboutme__name">Nombre artista</h1>
    <p class="aboutme__job">oficio</p>
    <p class="aboutme__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et aut alias odio qui ad ut
        maiores ea iusto. Explicabo consequatur unde provident accusantium harum repudiandae amet ipsam enim. Atque,
        quidem? si Lorem ipsum dolor sit amet consectetur adipisicing elit. Et aut alias odio qui ad ut
        maiores ea iusto. Explicabo consequatur unde provident accusantium harum repudiandae amet ipsam enim. Atque,
        quidem? si</p>
</div>


</div>
<div>


    <?= view("components/personalBlocks") ?>
    <h2>Catálogo</h2>
    <?= view("components/searchBar") ?>
    <?= view("components/gallery") ?>
    <?php $this->endSection() ?>