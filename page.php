<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php if (is_page()): ?>
  <main class="l-main">
    <div class="p-pageMv">
      <h1 class="p-pageMv__ttl"><?php the_title(); ?></h1>
      <div class="p-pageMv__bg">
        <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail();
          } else {
            $sample_bg = get_template_directory_uri();
            echo '<img src="'.$sample_bg.'/images/page/mv_bg.jpg" alt="no_image">';
          } 
        ?>
      </div>
    </div>

    <section class="p-sect p-sect--lg">
      <div class="l-cont">
        <div class="p-details">  
          <?php the_content(); ?>
          <?php wp_link_pages(); ?>
        </div>
      </div>
    </section>
  </main>
<?php endif; ?>

<?php get_footer(); ?>