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
            <?php
              if (has_excerpt()) {
                the_excerpt();
              } else {
                global $post;
                preg_match_all('/<h[2]>.+<\/h[2]>/u', $post->post_content, $matches_heading);
                preg_match_all('/<p>.+<\/p>/u', $post->post_content, $matches_text);
                $heading = $matches_heading[0][0];
                $heading = strip_tags($heading);
                $heading = '<p class="p-productItem__ttl">'.$heading.'</p>';
                echo $heading;

                $text = $matches_text[0][0];
                $text = strip_tags($text);
                $text = '<p class="p-productItem__txt">'.$text.'</p>';
                echo $text;
              }
            ?>
            <a href="<?php the_permalink(); ?>" class="p-productItem__btn">詳しく見る</a>
          </div>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
<?php else: ?>
  <p>記事が見つかりませんでした</p>
<?php endif; ?>