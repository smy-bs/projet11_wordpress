<?php
get_header();
?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
?>

        <section class="container single_post">
            <div class="post-info">
                <div class="post-texte">
                    <h1 class="single_title"><?php //the_title(); 
                                                ?>
                        <?php
                        $title = get_the_title();
                        $title_parts = explode(' ', $title, 2);
                        if (count($title_parts) == 2) {
                            $title = $title_parts[0] . '<br />' . $title_parts[1];
                        }
                        echo $title;
                        ?>
                    </h1>

                    <div class="text_group">
                    <?php
                    $post = get_post();
                    $categories = get_the_category($post->ID);

                    ?>

                    <p> RÉFERENCE : <?php echo get_post_meta(get_the_ID(), 'reference', true); ?></p>
                    <p> CATÉGORIE : <?php
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            echo esc_html($category->name); // Display category name safely
                                        }
                                    }

                                    ?></p>
                    <p> FORMAT : <?php echo get_field('formats') ?></p>
                    <p> TYPE : <?php echo get_post_meta(get_the_ID(), 'type', true); ?></p>
                    <p> ANNÉE : <?php the_date('Y'); ?></p>
                </div>
                </div>
            </div>

            <div class="post-image">
                <?php the_post_thumbnail(); // main single photo 
                ?>
            </div>
        </section>

        
        <section class="contact_line">
           <p>Cette photo vous intéresse ?</p>
            <button class="single_btn">Contact</button>
            <img src="" alt="" class="thumbnail_img">
        </section>

        <section class="img_propose">
            <p>Vous aimerez aussi</p>
            <div class="img_group">
                <img src="" class="post_photos" alt="">
                <img src="" class="post_photos" alt="">
            </div>
        </section>


<?php
    endwhile;

endif; ?>


<?php
get_footer();
?>