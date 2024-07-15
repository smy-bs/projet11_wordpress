<section class="photo__header">
    <div class="photo__content">
        <?php
        $random_image_url = get_random_photo();
        if ($random_image_url) {
            ?>
            <img class="photographe" src="<?php echo esc_url($random_image_url); ?>" alt="photograph__event">
            <?php
        } else {
            ?>
            <img class="photographe" src="<?php echo get_template_directory_uri() . '/assets/default-image.jpg'; ?>" alt="photograph__event">
            <?php
        }
        ?>
        <h1 class="photograph__event">PHOTOGRAPH EVENT</h1>
    </div>
</section>