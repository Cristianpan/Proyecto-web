<div class="swiper personal-blocks ">
    <div class="swiper-wrapper">
        <?php for ($i = 1; $i < 4; $i++) : ?>
            <div id="block-<?= $i ?>" class="swiper-slide personal-blocks__block personal-blocks__block--<?= $i ?>">
                <h3 class="personal-blocks__title">Inspiraciones</h3>
                <p class="personal-blocks__text">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Ullam assumenda vitae
                    expedita, voluptates doloribus optio consequuntur
                    tenetur culpa est recusandae blanditiis eius, soluta,
                    laborum architecto repudiandae? Consectetur beatae optio laudantium
                </p>
                <?php if (isset($edit) && $edit === true) : ?>
                    <div class="personal-blocks-buttons">
                        <button data-id=<?= $i ?> class="personal-blocks-buttons__button personal-blocks-buttons__button--edit"> <img data-id=<?= $i ?> src="/assets/images/edit-icon.svg" alt="detele-icon"></button>
                        <a href="#" class="personal-blocks-buttons__button"><img src="/assets/images/delete-icon.svg" alt="detele-icon"></a>
                    </div>
                <?php endif ?>
            </div>
        <?php endfor ?>
    </div>
</div>