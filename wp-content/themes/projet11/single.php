<?php
get_header();
?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
// initializer la variable category
$category = null;
?>

        <section class="container single_post">
            <div class="post-info">
                <div class="post-texte">
                    <h1 class="single_title">
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
                                            // definir la category
                                            $category = $category->name;
                                        }
                                    }

                                    ?></p>
                    <p class="single_format"> FORMAT : <?php echo the_terms(get_the_ID(), 'format', false) ?></p>
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
            <div class="thumbnail_img">
            <div class="thumbnail">
        <?php echo get_the_post_thumbnail(get_previous_post(),'medium'); ?>
        <?php //echo get_the_post_thumbnail(get_next_post(),'medium'); ?>
    </div>

    <div class="arrows">
        <a href="<?php echo get_permalink(get_previous_post()) ?>" class="previous_arrow">
            <img class="prev_arrow" src="<?php echo get_template_directory_uri() . '/assets/Lind6.png'; ?>" alt="previous_arrow">
        </a>
        <a href="<?php echo get_permalink(get_next_post()) ?>" class="next_arrow">
        <img class="prev_arrow" src="<?php echo get_template_directory_uri() . '/assets/Lind7.png'; ?>" alt="next_arrow">
        </a>
    </div>
            </div>
        </section>

        <section class="img_propose container">
        <?php
            $args= array (
                'post_type' => 'photos', 
                'posts_per_page' => 2, 
                'order' => 'rand',
                'tax_query' => array(
                    array(
                        'taxonomy'=>'category',
                        'field'=> 'slug',
                        'terms'=> $category
                    )
                    ),
                "post__not_in" => array(get_the_ID()) // excluir la photo du post single.php

            );  
            
            $query = new WP_Query($args);
            ?>
            <p class="titre_imgpro">Vous aimerez aussi</p>
            <div class="img_group">
                <?php  if( $query ->have_posts() ) :
                    while($query->have_posts()): 
                        $query ->the_post();
                        $image_url = get_the_post_thumbnail_url(); 
                        ?>
                    <div class="post_photos">
                        <a href="<?php the_permalink(); ?>">
                            <img class="post_photo" 
                            src="<?php echo  $image_url ?>" alt="photo test"  
                            data-imgId="<?php echo $post_id ?>" /> 
                        </a>
                    </div>
                <?php endwhile; 
                endif;
                wp_reset_postdata(); 
                
                ?>
            </div>
        </section>


<?php
    endwhile;

endif; ?>


<?php
get_footer();
?>