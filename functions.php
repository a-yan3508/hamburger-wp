<?php
  // テーマサポート
  add_theme_support('title-tag');

  // タイトル出力
  function hamburger_title($title) {
    if (is_front_page() && is_home()) {
      $title = get_bloginfo('name', 'display');
    } elseif (is_singular()) {
      $title = single_post_title('', false);
    }
    return $title;
  }
  add_filter('pre_get_document_title', 'hamburger_title');

  add_filter('show_admin_bar', '__return_false');

  // headのstyle、script出力
  function hamburger_script() {
    wp_enqueue_style('google-font-common', '//fonts.googleapis.com', array());
    wp_enqueue_style('google-font-common02', '//fonts.gstatic.com', array());
    wp_enqueue_style('google-font-mplus', '//fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap', array());
    wp_enqueue_style('google-font-roboto', '//fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap', array());
    wp_enqueue_style('app', get_template_directory_uri().'/css/app.css', array(), '1.0.0');
    wp_enqueue_style('style', get_template_directory_uri().'/style.css', array(), '1.0.0');
    wp_enqueue_script('jquery','//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array());
  }
  add_action('wp_enqueue_scripts', 'hamburger_script');