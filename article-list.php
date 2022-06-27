<?php if (have_posts()): ?>
  <ul class="p-productList">
    <?php while (have_posts()): the_post(); ?>
      <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="p-productItem">
          <div class="p-productItem__imgWrap">
            <?php 
              if (has_post_thumbnail()) {
                the_post_thumbnail();
              } else {
                $sample_bg = get_template_directory_uri();
                echo '<img src="'.$sample_bg.'/images/archive/product_img.png" alt="no_image">';
              } 
            ?>
          </div>
          <div class="p-productItem__body">
            <p class="p-productItem__name"><?php the_title(); ?></p>
            <div class="p-productItem__cont">
              <?php
                if ($post->post_content == "") {
                  echo the_excerpt();
                } else {
                  echo mb_substr($post->post_content, 0, 200, 'UTF-8');
                }
              ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="p-productItem__btn">詳しく見る</a>
          </div>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
<?php else: ?>
  <p>記事が見つかりませんでした</p>
<?php endif; ?>