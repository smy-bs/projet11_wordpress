
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
    <div class="categories">
        <select class="option" name="category" id="category-select">
        <option value="">categories</option>    
        <option value="reception">Réception</option>
        <option value="television">Télévision</option>
        <option value="concert">Concert</option>
        <option value="mariage">Mariage</option>
         </select>
    </div>
  
    <div class="formats">
        <select class="option" name="format" id="format-select">
        <option value="">format</option>
        <option value="paysage">Paysage</option>
        <option value="portrait">Portrait</option>
        </select>
    </div>

    <div class="trierpar">
        <select class="option" name="trier" id="trier-select">
        <option value="">Trier-Par</option>
        <option value="category">category</option>
        <option value="format">format</option>
        </select>
    </div>
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
			<span class="categorie"><?php  echo the_category() ?></span>
              

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