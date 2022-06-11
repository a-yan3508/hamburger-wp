<div class="l-menu">
  <div class="l-menu__bg"></div>
  <nav class="l-menu__inner">
    <div class="l-menu__close">
      <span></span>
      <span></span>
    </div>
    <p class="l-menu__ttl">Menu</p>
    <?php
      echo str_replace('sub-menu', 'l-menu__listLv2', wp_nav_menu(
        array(
          'menu'            => 'cateogrymenu',
          'menu_class'      => 'l-menu__list',
          'container'       => false,
          'echo'            => false,
          'fallback_cb'     => 'wp_page_menu',
          'theme_location'  => 'category navigation',
        )
      ));
    ?>
  </nav>
</div>