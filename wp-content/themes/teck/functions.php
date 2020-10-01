<?php
//Função de inicio de um child theme, disponivel na documentação do WP. Adicionado '/style.css' no 'child-style'
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri() . '/style.css',
        array($parenthandle),
        $theme->get('Version') // this only works if you have Version in the style header
    );
    //Adicionar nova fonte
    wp_enqueue_style('twentynineteen-child-theme-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
}

//Funções plugaveis do parents-theme "if():" alteradas pelos child-theme
function twentynineteen_the_posts_navigation()
{
    the_posts_pagination(
        array(
            'mid_size'  => 2,
            'prev_text' => sprintf(
                '%s <span class="nav-prev-text">%s</span>',
                twentynineteen_get_icon_svg('chevron_left', 22),
                __('Newer', 'twentynineteen')
            ),
            'next_text' => sprintf(
                '<span class="nav-next-text">%s</span> %s',
                __('Older', 'twentynineteen'),
                twentynineteen_get_icon_svg('chevron_right', 22)
            ),
        )
    );
}

//Função de alterar titulos dos posts em certas categorias, nesse caso Web
function web_titles($title, $id = null)
{
    if (in_category('desenvolvimento-web', $id)) {
        $title = "WEB: " . $title;
    }
    return $title;
}
add_filter('the_title', 'web_titles', 10, 2);

//Função de remoção de funcionabilidade do parent theme

function twentynineteen_child_theme_setup()
{
    //remove_action('widgets_init', 'twentynineteen_widgets_init');

    // Adicionar novo menu
    register_nav_menus(
        array(
            'menu-2' => __('Secondary', 'twentynineteen'),
        )
    );
}
add_action('after_setup_theme', 'twentynineteen_child_theme_setup');

//Remover autor do post
function twentynineteen_posted_by()
{
}
