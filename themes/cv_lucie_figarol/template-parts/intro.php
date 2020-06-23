<?php
//Affichage du Paragraphe ainsi que du titre
if (have_posts()) : while (have_posts()) : the_post();


  $img_url = get_the_post_thumbnail_url();
  $content_cv = get_the_content();
  $title_cv = get_the_title();
  

  endwhile;
endif; 
?>
<header class="intro" style="background-image:url('<?= $img_url; ?>');">
<div class="intro__personal">
    <div id="personal__img">
      <img src="<?= get_field('photo'); ?>" alt="">
    </div>
    <p id="personal__name">
      <?= get_field('name'); ?>
    </p>
    <p id="personal__more">
      <?= get_field('age'); ?><br>
      <?= get_field('voiture'); ?>
    </p>
  </div>

  <div id="intro__more">
    <div id="more__container">

      <?php
      $args = array('post_type' => 'presentation');
      $wp_query = new WP_Query($args);

      if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();

      $fa = get_field('icon_font_awesome');
      ?>
          <div class="more__container__items">
            <p class="item__icon">
             <?= $fa; ?>
            </p>
            <p class="item__content"> <?php the_excerpt(); ?></p>
          </div>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>

    
    <div class="more__content">
      <?= $content_cv; ?>

    </div>

    <div id="more__title__container">
      <h1 id="more__title"><?= $title_cv; ?></h1>
    </div>

   
  </div>
</header>