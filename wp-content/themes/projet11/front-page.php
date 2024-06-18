
<?php wp_head(); ?> 

<h1>  <?php the_title(); ?>  </h1>

<?php //the_content(); ?>

<!---    the hero section    ----->
<h2>PHOTOGRAPHE EVENT</h2>

<section class="filter">

<?php
    $args= array (
        'post_type' => 'photo', 
        'posts_per_page' => 8, 
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => 1,
    );  
    
    $query = new WP_Query($args);
    if( $query ->have_posts() ) : 
        while( $query ->have_posts() ) : 
            $query ->the_post();
            $image_url = get_the_post_thumbnail_url(); ?>

            <div class="card">
                <img class="post_img" src="<?php echo  $image_url ?>" alt="photo test"  data-imgId="<?php echo $post_id ?>" />

                <span class="title"> <?php  echo the_title() ?> </span>
				<span class="categorie">categorie ici dynamique </span>
            </div>

<?php    
endwhile;
    else :
        _e( 'Sorry, no posts were found.', 'textdomain' );
    endif;

    
   
    wp_reset_postdata(); ?>

</section>
    
   

<?php get_footer(); ?> 