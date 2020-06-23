<div id="main__container">
  <div id="XP__container">
    <div id="XP__title" class="main__title">
      <h2>Expériences</h2>
    </div>

    <?php
    $args = [
      'post_type' => 'experiences',
      'orderby' => 'date',
      'order' => 'asc'
    ];

    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();

        get_template_part('template-parts/experiences');

      endwhile;
      wp_reset_postdata();
    endif;
    ?>

  </div>

  <div id="shcool__container">
    <div id="school__title" class="main__title">
      <h2>Formations</h2>
    </div>

    <?php
    $args = [
      'post_type' => 'formations',
      'orderby' => 'date',
      'order' => 'asc'
    ];

    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();

        get_template_part('template-parts/formations');

      endwhile;
      wp_reset_postdata();
    endif;
    ?>

  </div>
</div>