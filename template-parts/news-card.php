<?php
// Karta aktuality – používá se na hlavní stránce i na stránce /aktuality/
$cats     = get_the_category();
$cat_name = $cats ? $cats[0]->name : 'Aktuality';
?>
<article class="news-card">
  <div class="news-thumb">
    <?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail('produkovany-thumb'); ?>
    <?php else : ?>
      <span aria-hidden="true">📰</span>
    <?php endif; ?>
  </div>
  <div class="news-body">
    <div class="news-tag"><?php echo esc_html($cat_name); ?></div>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p><?php the_excerpt(); ?></p>
    <div class="news-date"><?php echo get_the_date('j. F Y'); ?></div>
  </div>
</article>
