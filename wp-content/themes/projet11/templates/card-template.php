<!------   $args =>  a les données de la carte  ------->

<div class="card">
    <img class="post_img" src="<?php echo $args['image_url'] ?>" alt="<?php the_title_attribute(); ?>" data-ref="<?php echo $args['reference'] ?>" data-cat="<?php echo esc_attr($args['category']); ?>" />
    <img class="fullscreen" src="<?php echo get_template_directory_uri(); ?>/assets/maximize.svg" alt="fullscreen logo" role="button" aria-pressed="false" />
    <a href="<?php the_permalink(); ?>">
        <img class="lightbox-eye" alt="lightbox eye" role="button" aria-pressed="false" src="<?php echo get_template_directory_uri(); ?>/assets/eye.svg" />
        <span class="title"><?php echo the_title(); ?></span>
        <span class="categorie"><?php echo $args['category'] ?></span>
    </a>
</div>




<!---  debug outil    ---->
<pre aria-hidden="true" style="display:none">
    <?php /* var_dump($args) */ ?>
</pre>