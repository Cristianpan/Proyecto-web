<div class="gallery">
    <?php foreach ($items as $item): ?>
        <div class="gallery__element">
            <a href="<?=url_to("item-edit", session()->get('user')['userId'], $item['artItemId'])?>" class="gallery__imageContainer">
                <img class="gallery__image" src="/api/files/load?file=<?= $item['image'] ?>"" alt="galeria imagen" loading="lazy">
            </a>

            <div class="gallery__info">
                <p class="gallery__description"><?= $item['shortDescription']?></p>
            </div>
        </div>
    <?php endforeach ?>
</div>