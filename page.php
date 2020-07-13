<?php get_header(); ?>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- top page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7675064447281678"
     data-ad-slot="8170203366"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<?php while (have_posts()) : the_post(); ?>

  <main>
    <article class="col">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <?php the_post_thumbnail('medium'); ?>
      <div class="page-content">
        <?php the_content(); ?>
      </div>
    </article>
  </main>

<?php endwhile; ?>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- bottom page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7675064447281678"
     data-ad-slot="1225521064"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<?php get_footer(); ?>