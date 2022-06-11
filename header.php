<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
  </head>
  <body id="page" <?php body_class(); ?>>
    <?php wp_body_open(); ?>
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