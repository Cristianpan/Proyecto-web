<div class="gallery">
    <?php for($i = 0; $i < 20; $i++):?>
    <div class="gallery__element">
        <a href="#" class="gallery__imageContainer">
            <img class="gallery__image" src="/assets/images/gallery/<?= rand(1,9)?>.jpg" alt="galeria imagen" loading="lazy">
            <p class="gallery__autor">Diana Vazquez</p>
        </a>

        <div class="gallery__info">
            <p class="gallery__description"><span>Lorem ipsum</span> dolor sit amet consectetur sit amet consectetu</p>
            <a href="#" class="gallery__available">Comprar</a>
        </div>
    </div>
    <?php endfor ?>

</div>