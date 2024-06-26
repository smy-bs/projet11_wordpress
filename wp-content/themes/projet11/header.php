
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
         
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<header>
   
    <div class="site-branding">
            <?php
            if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                the_custom_logo();
            } else {
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                <?php
            }
            ?>
        </div>
        <div class="menu-toggle">
                <span class="line_menu"></span>
                <span class="line_menu"></span>
                <span class="line_menu"></span>
            </div>
        
        <nav class="nav_menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'container' => false,
                'menu_class' => 'primary-menu',
                'fallback_cb' => '__return_false'
            ) );
            ?>
            

        </nav>

        
    </header>