    <footer class="l-footer">
      <?php
        wp_nav_menu(
          array(
            'menu'            => 'footermenu',
            'menu_class'      => 'l-footer__linkList',
            'container'       => false,
            'fallback_cb'     => 'wp_page_menu',
            'theme_location'  => 'footer navigation',
          )
        );
      ?>
      <div class="l-footer__copy">Copyright: RaiseTech</div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>