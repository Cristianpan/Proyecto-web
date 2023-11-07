<?php $this->extend("templates/layout") ?>
<?php $this->section("title") ?>
<title>Art Zone | Obra</title>
<?php $this->endSection() ?>

<?php $this->section("css") ?>
<link rel="stylesheet" href="/assets/css/art.min.css" />
<?php $this->endSection() ?>
<?php $this->section("js") ?>
<script src="/assets/js/description_move.min.js"></script>
<?php $this->endSection() ?>

<?php $this->section("content") ?>
<div class="art">
    <div class="art__images">
        <div class="art__images__space">
            <button class="art__images__space__slide" id="prevButton">&lt;</button>
            <button class="art__images__space__slide" id="nextButton">&gt;</button>
            <ul class="art__images__space__content" id="art__images__content">
                <?php for ($i=1; $i < 5; $i++):?>
                <li class="art__images__space__content__element">
                    <img src="/assets/images/ejemp/<?= $i?>.jpg">
                </li>
                <?php endfor ?>
            </ul>

        </div>
        <a class="art__images__link" href="/user">Nombre Artista</a>

    </div>


    <div class="art__descriptions">
        <div class="art__descriptions__center">
            <div class="art__descriptions__center__text">
                <h1 class="art__descriptions__center__text__dark">Título de la obra</h1>
                <h3 class="art__descriptions__center__text__green">Nombre artista</h3>
                <p class="art__descriptions__center__text__price">$ 1000</p>
            </div>
            <div class="art__descriptions__center__structure">


                <div id="container">

                    <div id="navigation">
                        <button class="btn__navigation active"
                            onclick="openTab(event, 'section__description')">Descripción</button>
                        <button class="btn__navigation" onclick="openTab(event, 'section__details')">Detalles</button>
                    </div>

                    <div id="carousel">
                        <div class="change">
                            <section id="section__description" class="change__content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, voluptatem.
                                    Expedita
                                    iure
                                    ullam sequi architecto tempora excepturi libero. Error corporis eligendi quo
                                    numquam.ctetur adipisicing elit. Repellat nesciunt dolores autem laborum quisquam
                                    optio
                                    nostrum veniam enim, eligendi quis iste dignissimos odio saepe, beatae nemo
                                    explicabo?
                                    Omnis, nihil doloremque.</p>
                            </section>
                            <section id="section__details" class="change__content">
                                <p>
                                    Título: Jirafa<BR>
                                    medidas:<BR>
                                    Tipo de arte: (pintura, artesanía, fotografía, escultura?)<BR>
                                    Estilo: (minimalista, etc?)<BR>
                                    Tema:<BR>
                                    Material: (Hay materíal dependiendo el tipo de arte?)<BR>
                                    Origen de obra: Lugar del artista (ubicacion artista)<BR>
                                    precio: está o no en venta

                                </p>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
            <div class="art__descriptions__center__buttons">
                <a href="/payment" class="art__descriptions__center__buttons__comprar">Comprar</a>
                <button class="art__descriptions__center__buttons__agregar">Agregar al carrito</button>
            </div>
        </div>
    </div>
</div>
<script>
const slidesContainer = document.getElementById("art__images__content");
const slide = document.querySelector(".art__images__space__content__element");
const prevButton = document.getElementById("prevButton");
const nextButton = document.getElementById("nextButton");

nextButton.addEventListener("click", () => {
    const slideWidth = slide.clientWidth;
    slidesContainer.scrollLeft += slideWidth;


});

prevButton.addEventListener("click", () => {
    const slideWidth = slide.clientWidth;
    slidesContainer.scrollLeft -= slideWidth;

});
</script>

<script>
function openTab(evt, tabName) {
    var i, change__content, btn__navigation;
    change__content = document.getElementsByClassName("change__content");
    for (i = 0; i < change__content.length; i++) {
        change__content[i].style.display = "none";
    }
    btn__navigation = document.getElementsByClassName("btn__navigation");
    for (i = 0; i < btn__navigation.length; i++) {
        btn__navigation[i].className = btn__navigation[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<?php $this->endSection() ?>