<div class="gallery">
    <?php for($i = 0; $i < 20; $i++):?>
    <div class="gallery__element">
        <a href="/item" class="gallery__imageContainer">
            <img class="gallery__image" src="/assets/images/gallery/<?= rand(1,8)?>.jpg" alt="galeria imagen" loading="lazy">
            <div class="gallery__autor">
                <p>Diana Vazquez</p>
            </div>
        </a>

        <div class="gallery__info">
            <p class="gallery__description"><span>Lorem ipsum</span> dolor sit amet consectetur sit amet consectetu</p>
            <a href="#" class="gallery__available">Comprar</a>
        </div>
    </div>
    <?php endfor ?>

</div>