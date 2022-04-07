<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ダミーサイトのトップページ">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon.ico">
    <meta property="og:site_name" content="ダミーサイト">
    <meta property="og:url" content="#">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Humburger">
    <meta property="og:description" content="ダミーサイトのトップページ">
    <meta property="og:image" content="#">
    <meta property="og:local" content="ja_JP">
    <?php wp_head(); ?>
  </head>
  <body id="page">
    <header class="l-header">
      <div class="l-header__inner">
        <p class="l-header__ttl">
          <a href="<?php echo esc_url('/'); ?>"><?php bloginfo('name'); ?></a>
        </p>
        <?php get_search_form(); ?>
        <div class="l-header__menuToggle">
          <button>Menu</button>
        </div>
      </div>
    </header>