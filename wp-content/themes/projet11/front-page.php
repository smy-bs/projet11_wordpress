<?php get_header() ?>

<main id="primary" class="site-main">

    <!----   ça doit etre un template et l'image doit etre random aussi  ------>
    <?php get_template_part('/templates/random'); ?>
    <!--- dans un template et random image    --->

    <section class="formulaire">
        <div class="form-firstCol">
            <article>
                <div class="categories">
                    <?php
                    /// categories

                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    ));
                    ?>
                    <div role="button" class="select-btn">
                        <span class="category_selected">Catégories</span>
                        <svg class="svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 12.2559C5.26366 12.5814 4.73602 12.5814 4.41058 12.2559C4.08514 11.9305 4.08514 11.4028 4.41058 11.0774L9.41058 6.07741C9.73602 5.75197 10.2637 5.75197 10.5891 6.07741L15.5891 11.0774C15.9145 11.4028 15.9145 11.9305 15.5891 12.2559C15.2637 12.5814 14.736 12.5814 14.4106 12.2559L9.99984 7.84518L5.58909 12.2559Z" fill="#313144" />
                        </svg>

                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.58909 0.744078C1.26366 0.418641 0.736018 0.418641 0.410582 0.744078C0.0851447 1.06951 0.0851447 1.59715 0.410582 1.92259L5.41058 6.92259C5.73602 7.24803 6.26366 7.24803 6.58909 6.92259L11.5891 1.92259C11.9145 1.59715 11.9145 1.06951 11.5891 0.744078C11.2637 0.418641 10.736 0.418641 10.4106 0.744078L5.99984 5.15482L1.58909 0.744078Z" fill="#313144" />
                        </svg>
                    </div>
                    <ul class="ul-category">
                        <?php

                        foreach ($categories as $category) :
                            $category_link = sprintf(
                                esc_html($category->name)
                            ); ?>

                            <li data-field="category"> <?php echo $category_link; ?> </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </article>

            <article>
                <div class="formats">
                    <div role="button" class="select-btn">
                        <span class="format_selected">Formats</span>
                        <svg class="svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 12.2559C5.26366 12.5814 4.73602 12.5814 4.41058 12.2559C4.08514 11.9305 4.08514 11.4028 4.41058 11.0774L9.41058 6.07741C9.73602 5.75197 10.2637 5.75197 10.5891 6.07741L15.5891 11.0774C15.9145 11.4028 15.9145 11.9305 15.5891 12.2559C15.2637 12.5814 14.736 12.5814 14.4106 12.2559L9.99984 7.84518L5.58909 12.2559Z" fill="#313144" />
                        </svg>

                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.58909 0.744078C1.26366 0.418641 0.736018 0.418641 0.410582 0.744078C0.0851447 1.06951 0.0851447 1.59715 0.410582 1.92259L5.41058 6.92259C5.73602 7.24803 6.26366 7.24803 6.58909 6.92259L11.5891 1.92259C11.9145 1.59715 11.9145 1.06951 11.5891 0.744078C11.2637 0.418641 10.736 0.418641 10.4106 0.744078L5.99984 5.15482L1.58909 0.744078Z" fill="#313144" />
                        </svg>
                    </div>
                    <ul class="ul-formats">
                        <?php

                        $formats = get_terms('format', array(
                            'orderby'    => 'count',
                            'hide_empty' => 0,
                        ));

                        foreach ($formats as $format) :
                            $format_link = sprintf(
                                esc_html($format->name)
                            ); ?>

                            <li data-field="format"> <?php echo $format_link; ?> </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </article>
        </div>

        <article>
            <div class="trierpar">
                <div role="button" class="select-btn">
                    <span class="date_selected">Ordre</span>
                    <svg class="svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 12.2559C5.26366 12.5814 4.73602 12.5814 4.41058 12.2559C4.08514 11.9305 4.08514 11.4028 4.41058 11.0774L9.41058 6.07741C9.73602 5.75197 10.2637 5.75197 10.5891 6.07741L15.5891 11.0774C15.9145 11.4028 15.9145 11.9305 15.5891 12.2559C15.2637 12.5814 14.736 12.5814 14.4106 12.2559L9.99984 7.84518L5.58909 12.2559Z" fill="#313144" />
                    </svg>

                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.58909 0.744078C1.26366 0.418641 0.736018 0.418641 0.410582 0.744078C0.0851447 1.06951 0.0851447 1.59715 0.410582 1.92259L5.41058 6.92259C5.73602 7.24803 6.26366 7.24803 6.58909 6.92259L11.5891 1.92259C11.9145 1.59715 11.9145 1.06951 11.5891 0.744078C11.2637 0.418641 10.736 0.418641 10.4106 0.744078L5.99984 5.15482L1.58909 0.744078Z" fill="#313144" />
                    </svg>
                </div>
                <ul class="ul-trier">
                    <li data-field="date">A partir des plus récentes</li>
                    <li data-field="date">A partir des plus anciennes</li>
                </ul>
            </div>
        </article>
    </section>

    <section class="filter" id="photo-container">
        <?php
        $args = array(
            'post_type' => 'photos',
            'posts_per_page' => 8,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => 1,
        );

        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post();
                $image_url = get_the_post_thumbnail_url();
                $categories = get_the_category();
                $category_names = array_map(function ($cat) {
                    return $cat->name;
                }, $categories);
                $category_list = implode(', ', $category_names);
                $reference = get_post_meta(get_the_ID(), 'reference', true);
                $post_id = get_the_ID();
        ?>
                <div class="card">
                    <img class="post_img" src="<?php echo $image_url; ?>" alt="<?php the_title_attribute(); ?>" data-ref="<?php echo $reference; ?>" data-cat="<?php echo esc_attr($category_list); ?>" />
                    <img class="fullscreen" src="<?php echo get_template_directory_uri(); ?>/assets/maximize.svg" alt="fullscreen logo" role="button" aria-pressed="false" />
                    <a href="<?php the_permalink(); ?>">
                        <img class="lightbox-eye" alt="lightbox eye" role="button" aria-pressed="false" src="<?php echo get_template_directory_uri(); ?>/assets/eye.svg" />
                        <span class="title"><?php echo $reference; ?></span>
                        <span class="categorie"><?php echo $category_list; ?></span>
                    </a>
                </div>
        <?php
            endwhile;
        else :
            _e('Sorry, no posts were found.', 'textdomain');
        endif;

        wp_reset_postdata();
        ?>
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

        <button id="load-more">Load More</button>
    </section>

</main>

<?php get_footer(); ?>