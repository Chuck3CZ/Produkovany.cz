<?php get_header(); ?>

<main id="main" class="site-main page-single">
<div class="container">

  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>

    <header class="entry-header">
      <?php
      $cats = get_the_category();
      if ( $cats ) {
        echo '<div class="news-tag">' . esc_html($cats[0]->name) . '</div>';
      }
      ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <div class="entry-meta">
        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
          <?php echo get_the_date('j. F Y'); ?>
        </time>
        &nbsp;&middot;&nbsp;
        <?php the_author(); ?>
      </div>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-thumbnail">
      <?php the_post_thumbnail('produkovany-hero'); ?>
    </div>
    <?php endif; ?>

    <div class="entry-content">
      <?php
      the_content();
      wp_link_pages(['before' => '<div class="page-links">', 'after' => '</div>']);
      ?>
    </div>

    <footer class="entry-footer">
      <?php
      $tags = get_the_tags();
      if ( $tags ) {
        echo '<div class="entry-tags">';
        foreach ( $tags as $tag ) {
          echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="tag">' . esc_html($tag->name) . '</a>';
        }
        echo '</div>';
      }
      ?>
    </footer>

  </article>

  <nav class="post-navigation">
    <?php
    the_post_navigation([
      'prev_text' => '← %title',
      'next_text' => '%title →',
    ]);
    ?>
  </nav>

  <?php endwhile; ?>

</div>
</main>

<?php get_footer(); ?>
