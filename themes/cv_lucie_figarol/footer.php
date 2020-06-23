</section>


  <?php
  $args = [
    'pagename' => 'contact',
  ];

  $wp_query = new WP_Query($args);

  if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
  // $the_content = get_the_content();
  // $the_content = strip_tags($the_content);

  ?>
  <footer class="footer" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">

      <h2 class="title__section"><?= the_title(); ?></h2>

      <div class="form__container">
        <p id="content__footer">
        <?= get_field('texte_contact'); ?>
        </p>
        <?php the_content(); ?>
      </div>

  <?php

    endwhile;
    wp_reset_postdata();
  endif;
  ?>
</footer>
</main>
</div>


<?php wp_footer(); ?>
</body>

</html>