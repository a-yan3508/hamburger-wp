<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php if (is_archive()): ?>
  <main class="l-main">
    <div class="p-archiveMv">
      <h1 class="p-archiveMv__ttl">Menu:<span><?php single_cat_title(); ?></span></h1>
      <div class="p-archiveMv__bg">
        <?php
          $cat_name = single_cat_title('', false);

          if ($cat_name == 'バーガー') {
            $num = '01';
          } elseif ($cat_name == 'サイド') {
            $num = '02';
          } elseif ($cat_name == 'ドリンク') {
            $num = '03';
          }
        ?>
        <img class="u-spOnly02" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/archive/mv_bg<?php echo $num; ?>_sp.png" alt="<?php single_cat_title(); ?>">
        <img class="u-pcOnly02" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/archive/mv_bg<?php echo $num; ?>_pc.png" alt="<?php single_cat_title(); ?>">
      </div>
    </div>

    <section class="p-sect">
      <div class="l-cont">
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
  </main>
<?php endif; ?>

<?php get_footer(); ?>