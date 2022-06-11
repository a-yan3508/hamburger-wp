<?php
  // headのstyle、script出力
  function head_script() {
    wp_enqueue_style('google-font-mplus', '//fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap', array(), '');
    wp_enqueue_style('google-font-roboto', '//fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap', array(), '');
    wp_enqueue_style('app', get_template_directory_uri().'/css/app.css', array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('style', get_template_directory_uri().'/style.css', array(), wp_get_theme()->get('Version'));
    wp_enqueue_script('jquery','//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', '', '', true);
  }
  add_action('wp_enqueue_scripts', 'head_script');

  // footerのscript出力
  function footer_script() {
    wp_enqueue_script('app',get_template_directory_uri().'/js/app.js', wp_get_theme()->get('Version'), true);
  }
  add_action('wp_footer', 'footer_script');

  // サイトタイトル出力
  function site_title($title) {
    if (is_front_page() && is_home()) {
      $title = get_bloginfo('name', 'display');
    } elseif (is_singular()) {
      $title = single_post_title('', false);
    }
    return $title;
  }
  add_filter('pre_get_document_title', 'site_title');

  // 各設定
  function custom_theme_support() {
    add_theme_support('html5', array(
      'serch-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    register_nav_menus(array(
      'footer_nav' => esc_html__('footer navigation', 'rtbread'),
      'category_nav' => esc_html__('category navigation', 'rtbread'),
    ));
  }
  add_action('after_setup_theme', 'custom_theme_support');

  // カテゴリー説明文でHTMLタグを使う
  remove_filter('pre_term_description', 'wp_filter_kses');
  // カテゴリー説明文から自動で付与されるpタグを除去
  remove_filter('term_description', 'wpautop');

  // ページネーション
  function pagenation($pages = '', $range = 8) {
    // 9ページまでページ番号を表示
    $showitems = ($range * 1) + 1;
    global $paged;

    if (empty($paged)) {
      $paged = 1;
    }

    if ($pages == '') {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if (!$pages) {
        $pages = 1;
      }
    }

    if (1 != $pages) {
      // 「1/2」表示 現在のページ数 / 総ページ数
      echo "<div class=\"p-pager__left\">page". $paged."/". $pages."</div>";
      
      echo "<ol class=\"p-pager__right\">\n";
      // 「前へ」を表示
      if ($paged > 1) {
        echo "<li><a class=\"p-pager__prev\" href='".get_pagenum_link($paged - 1)."'><span>前へ</span></a></li>";
      }
      // ページ番号を出力
      for ($i = 1; $i <= $pages; $i++) {
        if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
          if ($paged == $i) {
            echo "<li><span class=\"is-current\">".$i."</span></li>"; // 現在のページの数字はリンク無し
          } else {
            echo "<li><a class=\"p-pager__link\" href='".get_pagenum_link($i)."'>".$i."</a></li>";
          }
        }
      }
      // 「次へ」を表示
      if ($paged < $pages) {
        echo "<li><a class=\"p-pager__next\" href='".get_pagenum_link($paged + 1)."'><span>次へ</span></a></li>";
      }
      echo "</ol>\n";
    }
  }

  // OGP設定
  function my_meta_ogp() {
    if (is_front_page() || is_home() || is_singular()) {
      global $post;
      $ogp_title = '';
      $ogp_description = '';
      $ogp_url = '';
      $ogp_image = '#';
      $html = '';

      if (is_singular()) {
        // 記事＆固定ページ
        setup_postdata($post);
        $ogp_title = $post->post_title;
        $ogp_description = mb_substr(get_the_excerpt(), 0, 100);
        $ogp_url = get_permalink();
        wp_reset_postdata();
      } elseif (is_front_page() || is_home()) {
        // トップページ
        $ogp_title = get_bloginfo('name');
        $ogp_description = get_bloginfo('description');
        $ogp_url = home_url();
      }

      // og:type
      $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';

      // og:image
      if (is_singular() && has_post_thumbnail()) {
        $ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        $ogp_image = $ps_thumb[0];
      }

      // 出力するOGPタグをまとめる
      $html = "\n";
      $html .= '<meta name="description" content="' . esc_attr($ogp_description) . '">' . "\n";
      $html .= '<!-- ここからOGPタグ -->' . "\n";
      $html .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
      $html .= '<meta property="og:url" content="' . esc_url($ogp_url) . '">' . "\n";
      $html .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
      $html .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";
      $html .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '">' . "\n";
      $html .= '<meta property="og:image" content="' . esc_url($ogp_image) . '">' . "\n";
      $html .= '<meta property="og:locale" content="ja_JP">' . "\n";
      $html .= '<!-- ここまでOGPタグ -->' . "\n";
      
      echo $html;
    }
  }
  add_action('wp_enqueue_scripts', 'my_meta_ogp');





