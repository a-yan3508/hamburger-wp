<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php if (is_home()): ?>
  <main class="l-main">
    <div class="p-homeMv">
      <h1 class="p-homeMv__ttl">ダミーサイト</h1>
    </div>

    <section class="p-homeSect">
      <div class="l-cont">
        <div class="p-homeCardUnit p-homeCardUnit--col2">
          <div class="p-homeCard p-homeCard--takeOut">
            <div class="p-homeCard__inner">
              <h2 class="p-homeCard__head">Take Out</h2>
              <div class="p-homeCard__body">
                <?php
                  $cat = array();
                  $cat_id = array();
                  $categories = get_categories();
                  foreach( $categories as $category ) {
                    array_push($cat, $category->name);
                    array_push($cat_id, $category->term_id);
                  }
                  $cat = array_diff($cat, array('Eat In', 'Take Out', 'Uncategorized'));
                  $cat = array_values($cat);

                  $cat_id = array_diff($cat_id, array('1', '2', '3'));
                  $cat_id = array_values($cat_id);
                ?>
                <?php
                  if (!empty($cat) && !empty($cat_id)) {
                    for ($i = 0; $i < count($cat); $i++) {
                      echo '<div class="p-homeCard__box">';
                      echo '<p class="p-homeCard__ttl">'.$cat[$i].'</p>';
                      $args = array(
                        'post_type' => 'post',
                        'category__and' => array(2, $cat_id[$i]),
                        'posts_per_page' => 100,
                        'orderby' => 'date', 
                        'order' => 'DESC',
                      );
                      $the_query = new WP_Query($args);
                      echo '<p class="p-homeCard__txt">';
                      if ($the_query->have_posts()) {
                        while ($the_query->have_posts()): $the_query->the_post();
                          echo '<a href=';
                          echo the_permalink();
                          echo '>';
                          echo the_title();
                          echo '</a>&emsp;';
                        endwhile;
                      } else {
                        echo '現在、該当メニューがございません。';
                      }
                      echo '</p>';
                      echo '</div>';
                    }
                  } else {
                    echo '<div class="p-homeCard__box">';
                    echo '<p class="p-homeCard__txt">現在、該当メニューがございません。</p>';
                    echo '</div>';
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="p-homeCard p-homeCard--eatIn">
            <div class="p-homeCard__inner">
              <h2 class="p-homeCard__head">Eat In</h2>
              <div class="p-homeCard__body">
              <?php
                if (!empty($cat) && !empty($cat_id)) {
                  for ($i = 0; $i < count($cat); $i++) {
                    echo '<div class="p-homeCard__box">';
                    echo '<p class="p-homeCard__ttl">'.$cat[$i].'</p>';
                    $args = array(
                      'post_type' => 'post',
                      'category__and' => array(3, $cat_id[$i]),
                      'posts_per_page' => 100,
                      'orderby' => 'date', 
                      'order' => 'DESC',
                    );
                    $the_query = new WP_Query($args);
                    echo '<p class="p-homeCard__txt">';
                    if ($the_query->have_posts()) {
                      while ($the_query->have_posts()): $the_query->the_post();
                        echo '<a href=';
                        echo the_permalink();
                        echo '>';
                        echo the_title();
                        echo '</a>&emsp;';
                      endwhile;
                    } else {
                      echo '現在、該当メニューがございません。';
                    }
                    echo '</p>';
                    echo '</div>';
                  }
                } else {
                  echo '<div class="p-homeCard__box">';
                  echo '<p class="p-homeCard__txt">現在、該当メニューがございません。</p>';
                  echo '</div>';
                }
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-homeMap">
      <div class="p-homeMap__inner">
        <div class="p-homeMap__cont">
          <h2 class="p-homeMap__ttl">見出しが入ります</h2>
          <p class="p-homeMap__txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
        </div>
      </div>
    </section>
  </main>
<?php endif; ?>

<?php get_footer(); ?>