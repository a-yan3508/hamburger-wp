<div class="l-header__search">
  <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <div class="l-header__input">
      <label for="s"><?php _x('Search for:', 'label'); ?></label>
      <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s">
    </div>
    <button class="l-header__submit" type="submit">検索</button>
  </form>
</div>