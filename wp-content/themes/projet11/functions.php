<?php

function projet11_supports () {
    add_theme_support('title-tag');
}

function projet11_enqueue_styles() { //함수는 테마의 스타일 시트를 등록하고 로드합니다.
    // Enqueue the main stylesheet
    wp_enqueue_style('projet11', get_stylesheet_uri()); //스타일 시트를 큐에 추가하여 WordPress가 올바르게 로드하도록 합니다.
}

add_action('wp_enqueue_scripts', 'projet11_enqueue_styles');
add_action('after_setup_theme', 'projet11_supports');

?>