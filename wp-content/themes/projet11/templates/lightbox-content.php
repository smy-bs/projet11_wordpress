<!-- 라이트박스 HTML 구조 -->
<div class="lightbox">
            <div class="lightbox__box">
                <button class="lightbox__close">Fermer</button>
                <button class="lightbox__next">
                    Suivant
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-right.svg" alt="next arrow" />
                </button>
                <button class="lightbox__prev">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-left.svg" alt="next arrow" />
                    Précédent
                </button>
                <div class="lightbox__container">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/image-icon.png" alt="image thumbnail" id="imgThumbnail" />
                    <div class="lightbox__info">
                        <p class="lightbox__ref">light-ref</p>
                        <p class="lightbox__cat">light-cat</p>
                    </div>
                </div>
            </div>
        </div>
