<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php if (is_search()): ?>
  <main class="l-main">
    <div class="p-archiveMv">
      <h1 class="p-archiveMv__ttl">Search:<span><?php echo $_GET['s']; ?></span></h1>
      <div class="p-archiveMv__bg">
        <img class="u-spOnly02" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/archive/mv_bg01_sp.png" alt="search_image">
        <img class="u-pcOnly02" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/archive/mv_bg01_pc.png" alt="search_image">
      </div>
    </div>

    <section class="p-sect">
      <div class="l-cont">
        <?php 
          global $wp_query;
          $total_results = $wp_query->found_posts; // 検索件数
          $search_query = get_search_query(); // 検索ワード
        ?>
        <?php if (isset($_GET['s']) && empty($_GET['s'])): ?>
          <p class="c-txt">検索条件が入力されていません</p>
        <?php else: ?>
          <h2 class="c-lv2Heading u-mb30"><?php echo $search_query; ?>の検索結果</h2>
          <?php
            if ($total_results > 0) {
              echo '<p class="c-txt">'.$total_results.'件の検索結果が見つかりました。</p>';
            }
          ?>
          <h2 class="c-lv2Heading u-mb30"><?php single_cat_title(); ?></h2>
          <p class="c-txt"><?php echo category_description(); ?></p>
          <?php get_template_part('article-list'); ?>
      </div>
    </section>

    <div class="p-pager">
      <?php 
        if (function_exists('pagenation')) {
          pagenation();
        }
      ?>
    </div>
    <?php endif; ?>
  </main>
<?php endif; ?>

<?php get_footer(); ?>


