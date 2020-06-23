<?php get_header();

get_template_part('template-parts/intro');
?>
<main id="main">
  <?php
  // Template Experiencex & Formations
  get_template_part('template-parts/main');
  ?>

  <section id="skills">
    <div id="skill__title" class="main__title">
      <h2> Compétences</h2>
    </div>

    <div id="skill__color__description">
      <h3>Descriptif des couleurs</h3>
      <div id="item__container">
        <p class="item__color__description">J'ai des notions</p>
        <p class="item__color__description">Utilisation occasionnelle</p>
        <p class="item__color__description">Utilisation fréquente</p>
        <p class="item__color__description">Autres</p>
      </div>

    </div>

    <hr id="skill__separator">

    <div id="skills__container">
      <!--p class="skill__item" > HTML</p-->

    </div>

    <div id="allProjects">
      <p class="item__color__description"> Tous les projets</p>
    </div>

    <div id="text__skill">
      <p> Il est possible de cliquer sur les <span class="text__title">Compétences</span> <i class="fa fa-long-arrow-up" aria-hidden="true"></i> pour voir dans quels projets<span class="text__title"> Projets</span> elles sont présentes <i class="fa fa-long-arrow-down" aria-hidden="true"></i></p>
    </div>
    <div id="skill__project__title" class="main__title">
      <h2>Mes Projets</h2>
    </div>



    <div id="skill__project">

      <!--div class="skill__project__container">

            <article class="project__info__container">
              <div class="project__title">
                <h3></h3>
                <p class="project__content">
                </p>
                <p class="project__techno">
                  <span class="techno__title"> Technologies : </span> 
                </p>
                <p class="project__github">
                  <a href="#"> <i class="fa fa-github" aria-hidden="true"></i>Lien du repository</a>
                </p>
              </div>
            </article>
          </div-->


    </div>

  </section>

  <section class="others">
    <div class="other__title main__title">
      <h2> Autres</h2>
    </div>

    <div class="other__container">

      <div class="other__passion">
        <div class="other__title">
          <h3>Passions</h3>
        </div>

        <?php
        $args = [
          'post_type' => 'passions',
        ];

        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();

            $the_content = get_the_content();
            $the_content = strip_tags($the_content);

        ?>
            <article class="passion__title">

              <div class="passion__container">
                <div class="passion__img__container">
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                </div>

                <p class="passion__content">
                  <?= $the_content; ?>
                </p>
              </div>
            </article>
        <?php

          endwhile;
          wp_reset_postdata();
        endif;
        ?>



      </div>

      <div class="other__language">
        <div class="other__title">
          <h2> Langues</h2>
        </div>
        <?php
        $args = [
          'post_type' => 'languages',
        ];

        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();

            $the_content = get_the_content();
            $the_content = strip_tags($the_content);

        ?>
            <article class="language__title">

              <div class="language__container">
                <div class="language__img__container">
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                </div>
                <p class="passion__content">
                  <?= $the_content; ?>
                </p>
              </div>
            </article>
        <?php

          endwhile;
          wp_reset_postdata();
        endif;
        ?>

      </div>
      <?php get_footer(); ?>