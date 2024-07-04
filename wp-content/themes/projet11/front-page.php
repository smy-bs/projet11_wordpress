
<?php get_header() ?>



<?php //the_content(); ?> 


<main id="primary" class="site-main">
    <section class="photo__header">
        <div class="photo__content">
            <img class="photographe" src="<?php echo get_template_directory_uri() . '/assets/nathalie-11.jpeg'; ?> " alt="photograph__event">
            <h1 class="photograph__event"> PHOTOGRAPH EVENT </h1>        
        </div>
    </section>

  <section class="formulaire">
        <article>
        <div class="categories">
                <?php 
                /// categories

                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'ASC'
                ));
                ?> 
                <div role="button" class="select-btn">
                    Catégories
                    <svg class="svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 12.2559C5.26366 12.5814 4.73602 12.5814 4.41058 12.2559C4.08514 11.9305 4.08514 11.4028 4.41058 11.0774L9.41058 6.07741C9.73602 5.75197 10.2637 5.75197 10.5891 6.07741L15.5891 11.0774C15.9145 11.4028 15.9145 11.9305 15.5891 12.2559C15.2637 12.5814 14.736 12.5814 14.4106 12.2559L9.99984 7.84518L5.58909 12.2559Z" fill="#313144"/>
                </svg>
            </div>
                <ul class="ul-category">
                        <?php

                        foreach( $categories as $category ):
                            $category_link = sprintf( 
                                esc_html( $category->name )
                            ); ?>
                            
                            <li> <?php echo $category_link; ?> </li>
                        <?php endforeach; ?>
                </ul>
                </div>
        </article>   
            
                <!--- 
                <select class="option" name="category" id="category-select">
                    <option class="option_font" value="">categories</option>    
                    <option class="option_font" value="reception">Réception</option>
                    <option class="option_font" value="television">Télévision</option>
                    <option class="option_font" value="concert">Concert</option>
                    <option class="option_font" value="mariage">Mariage</option>
                </select>
                --->
          
    <article>
    <div class="formats">
        <div role="button" class="select-btn">
                Formats
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 12.2559C5.26366 12.5814 4.73602 12.5814 4.41058 12.2559C4.08514 11.9305 4.08514 11.4028 4.41058 11.0774L9.41058 6.07741C9.73602 5.75197 10.2637 5.75197 10.5891 6.07741L15.5891 11.0774C15.9145 11.4028 15.9145 11.9305 15.5891 12.2559C15.2637 12.5814 14.736 12.5814 14.4106 12.2559L9.99984 7.84518L5.58909 12.2559Z" fill="#313144"/>
                </svg>
                        </div>
        <ul class="ul-formats">
                <?php

                $formats = get_terms( 'format', array(
                    'orderby'    => 'count',
                    'hide_empty' => 0,
                ) );

                foreach( $formats as $format ):
                    $format_link = sprintf( 
                        esc_html( $format->name )
                    ); ?>
                    
                    <li> <?php echo $format_link; ?> </li>
                <?php endforeach; ?>
        </ul>

        <!--- 
        <select class="option" name="format" id="format-select">
            <option class="option_font" value="">format</option>
            <option class="option_font" value="paysage">Paysage</option>
            <option class="option_font" value="portrait">Portrait</option>
        </select>
        --->
    </div></article>

    
    <article>
    <div class="trierpar">
        <div role="button" class="select-btn">
            TRIER PAR
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 12.2559C5.26366 12.5814 4.73602 12.5814 4.41058 12.2559C4.08514 11.9305 4.08514 11.4028 4.41058 11.0774L9.41058 6.07741C9.73602 5.75197 10.2637 5.75197 10.5891 6.07741L15.5891 11.0774C15.9145 11.4028 15.9145 11.9305 15.5891 12.2559C15.2637 12.5814 14.736 12.5814 14.4106 12.2559L9.99984 7.84518L5.58909 12.2559Z" fill="#313144"/>
            </svg>
                </div>
            <ul class="ul-trier">
                <li>Nouveou</li>
                <li>Ancienne</li>
            </ul>
    </div>
    </article>
  </section>  

<section class="filter">

<?php
    $args= array (
        'post_type' => 'photos', 
        'posts_per_page' => 8, 
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => 1,
    );  
    
    $query = new WP_Query($args);
    if( $query ->have_posts() ) : 
        while( $query ->have_posts() ) : 
            $query ->the_post();
            $image_url = get_the_post_thumbnail_url(); 
                      ?>

            <div class="card">
               <a href="<?php echo $image_url?>">
                 <img class="post_img" src="<?php echo  $image_url ?>" alt="photo test"  
                 data-imgId="<?php echo $post_id ?>" /> 
               
                 <img
                class="fullscreen"
                src="./assets/maximize.svg"
                alt="logo"
                role="button"
                aria-pressed="false"
            />
            <img
                class="lightbox-eye"
                alt="lightbox eye"
                role="button"
                aria-pressed="false"
                src="./assets/eye.svg"
            />
        

               
            <span class="title"> <?php  echo the_title() ?> </span>
			<span class="cate_gorie"><?php  echo the_category() ?></span>
              

                <span class="post_link">
                <a href="<?php the_permalink();?>"> link por le post</a></span>
        
            
            </div>

<?php    
endwhile;
    else :
        _e( 'Sorry, no posts were found.', 'textdomain' );
    endif;

    
   
    wp_reset_postdata(); ?>



</section>
    
</main>

<?php get_footer(); ?> 