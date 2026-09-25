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
    <?php if ( get_post_type() === 'kandidat' ) :
      $kandidat_ids = produkovany_get_kandidat_siblings();
      $kandidat_pos = array_search( get_the_ID(), $kandidat_ids, true );
      $prev_id = ( $kandidat_pos !== false && $kandidat_pos > 0 ) ? $kandidat_ids[ $kandidat_pos - 1 ] : 0;
      $next_id = ( $kandidat_pos !== false && $kandidat_pos < count( $kandidat_ids ) - 1 ) ? $kandidat_ids[ $kandidat_pos + 1 ] : 0;
      if ( $prev_id || $next_id ) :
    ?>
      <div class="nav-links">
        <?php if ( $prev_id ) : ?>
          <div class="nav-previous"><a href="<?php echo esc_url( get_permalink( $prev_id ) ); ?>">&larr; <?php echo esc_html( get_the_title( $prev_id ) ); ?></a></div>
        <?php endif; ?>
        <?php if ( $next_id ) : ?>
          <div class="nav-next"><a href="<?php echo esc_url( get_permalink( $next_id ) ); ?>"><?php echo esc_html( get_the_title( $next_id ) ); ?> &rarr;</a></div>
        <?php endif; ?>
      </div>
    <?php endif; else :
      the_post_navigation([
        'prev_text' => '← %title',
        'next_text' => '%title →',
      ]);
    endif; ?>
  </nav>

  <?php endwhile; ?>

</div>
</main>

<?php get_footer(); ?>
