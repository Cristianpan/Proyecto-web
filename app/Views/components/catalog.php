<div class="gallery">
    <?php for ($i = 0; $i < 20; $i++) : ?>
        <div class="gallery__element">
            <a href="/user/catalog/item" class="gallery__imageContainer">
                <img class="gallery__image" src="/assets/images/gallery/<?= rand(1, 8) ?>.jpg" alt="galeria imagen" loading="lazy">
            </a>

            <div class="gallery__info">
                <p class="gallery__description"><span>Lorem ipsum</span> dolor sit amet consectetur sit amet consectetu</p>
                <p class="gallery__available">En venta</p>
            </div>
        </div>
    <?php endfor ?>

</div>