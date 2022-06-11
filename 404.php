<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php if (is_404()): ?>
  <main class="l-main">
    <section class="p-sect">
      <div class="l-cont">
        <div style="text-align: center;">
          <h2 class="c-lv2Heading u-mb30">404 Not Found</h2>
          <p>
            お探しのページは見つかりません。<br>
            一時的にアクセスできない状態か、移動もしくは削除されてしまった可能性があります。
          </p>
        </div>
      </div>
    </section>
  </main>
<?php endif; ?>

<?php get_footer(); ?>