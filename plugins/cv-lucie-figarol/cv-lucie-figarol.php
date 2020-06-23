<?php

/*
 Plugin Name: Plugin CV Lucie Figarol
 Description: Plugin pour gérer les contenus du CV
 Version: 1.0.0
 Author: Lucie Figarol
 */
if (!defined('ABSPATH')) {
  die;
}

class CvLucieFigarol
{
  public function __construct()
  {
    // J'accroche à init registerCpt
    add_action('init', [$this, 'registerCpt']);
    add_action('init', [$this, 'registerTaxonomies']);
  }
  public function registerCpt()
  {
    $this->registerProjet();
    $this->registerPresentation();
    $this->registerExperience();
    $this->registerFormation();
    $this->registerPassion();
    $this->registerLanguage();
 
  }

  public function activate()
  {

    $this->registerCpt();
    $this->registerTaxonomies();
    flush_rewrite_rules(); // je souhaite regénérer les routes et les droits
  }

  public function desactivate()
  {
    flush_rewrite_rules();
  }

  public function registerProjet()
  {
    //permet d'enregistrer un nouveau type de contenu ici " Des Prestations"
    $labels = [
      'name'               => 'Projets',
      'singular_name'      => 'Projet',
      'menu_name'          => 'Projets',
      'name_admin_bar'     => 'Projet',
      'add_new'            => 'Ajouter un projet',
      'add_new_item'       => 'Ajouter un  nouveau projet',
      'new_item'           => 'Nouveau projet',
      'edit_item'          => 'Editer un projet',
      'view_item'          => 'Voir un projet',
      'all_items'          => 'Voir tous les projets',
      'search_items'       => 'Rechercher un projet',
      'not_found'          => 'Aucun projet trouvé',
      'not_found_in_trash' => 'Aucun projet trouvé dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'exclude_from_search' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-list-view',
      'hierarchiecal' => false,  // ici : besoin d'un sous projet : non.
      'supports' => [ // ici : ce que l'on veut avoir
        'title',
        'custom-fields',
        'editor'
      ],
      'has_archive' => true,
      'rewrite' => [
        'slug' => 'mes-projets'
      ],
      'show_in_rest' => true,

    ];

    register_post_type('projets', $args);
  }

  public function registerExperience()
  {
    //permet d'enregistrer un nouveau type de contenu ici " Des Prestations"
    $labels = [
      'name'               => 'Expériences',
      'singular_name'      => 'Expérience',
      'menu_name'          => 'Expériences',
      'name_admin_bar'     => 'Expérience',
      'add_new'            => 'Ajouter une expérience',
      'add_new_item'       => 'Ajouter une expérience',
      'new_item'           => 'Nouvelle expérience',
      'edit_item'          => 'Editer une expérience',
      'view_item'          => 'Voir une expérience',
      'all_items'          => 'Voir toutes les expériences',
      'search_items'       => 'Rechercher une expérience',
      'not_found'          => 'Aucune expérience trouvée',
      'not_found_in_trash' => 'Aucune expérience trouvée dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'exclude_from_search' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-portfolio',
      'hierarchiecal' => false,  // ici : besoin d'un sous projet : non.
      'supports' => [ // ici : ce que l'on veut avoir
        'title',
        'custom-fields',
        'editor'
      ],
      'has_archive' => true,
      'rewrite' => [
        'slug' => 'mes-experiences'
      ],
      'show_in_rest' => true,

    ];

    register_post_type('experiences', $args);
  }
  public function registerFormation()
  {
    //permet d'enregistrer un nouveau type de contenu ici " Des Prestations"
    $labels = [
      'name'               => 'Formations',
      'singular_name'      => 'Formation',
      'menu_name'          => 'Formations',
      'name_admin_bar'     => 'Formation',
      'add_new'            => 'Ajouter une formation',
      'add_new_item'       => 'Ajouter une formation',
      'new_item'           => 'Nouvelle formation',
      'edit_item'          => 'Editer une formation',
      'view_item'          => 'Voir une formation',
      'all_items'          => 'Voir toutes les formations',
      'search_items'       => 'Rechercher une formation',
      'not_found'          => 'Aucune formation trouvée',
      'not_found_in_trash' => 'Aucune formation trouvée dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'exclude_from_search' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-welcome-learn-more',
      'hierarchiecal' => false,  // ici : besoin d'un sous projet : non.
      'supports' => [ // ici : ce que l'on veut avoir
        'title',
        'custom-fields',
        'editor'
      ],
      'has_archive' => true,
      'rewrite' => [
        'slug' => 'mes-formations'
      ],
      'show_in_rest' => true,

    ];

    register_post_type('formations', $args);
  }

  public function registerPresentation()
  {
    //permet d'enregistrer un nouveau type de contenu ici " Des Prestations"
    $labels = [
      'name'               => 'Présentation',
      'singular_name'      => 'Présentation',
      'menu_name'          => 'Présentation',
      'name_admin_bar'     => 'Présentation',
      'add_new'            => 'Ajouter une présentation',
      'add_new_item'       => 'Ajouter une présentation',
      'new_item'           => 'Nouvelle présentation',
      'edit_item'          => 'Editer une présentation',
      'view_item'          => 'Voir une présentation',
      'all_items'          => 'Voir toutes les présentation',
      'search_items'       => 'Rechercher une présentation',
      'not_found'          => 'Aucune présentation trouvée',
      'not_found_in_trash' => 'Aucune présentation trouvée dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'exclude_from_search' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-admin-users',
      'hierarchiecal' => false,  // ici : besoin d'un sous projet : non.
      'supports' => [ // ici : ce que l'on veut avoir
        'title',
        'custom-fields',
        'editor',
      ],
      'has_archive' => true,
      'rewrite' => [
        'slug' => 'mes-presentations'
      ],
      'show_in_rest' => true,

    ];

    register_post_type('presentation', $args);
  }

  public function registerPassion()
  {
    //permet d'enregistrer un nouveau type de contenu ici " Des Prestations"
    $labels = [
      'name'               => 'Passions',
      'singular_name'      => 'Passion',
      'menu_name'          => 'Passions',
      'name_admin_bar'     => 'Passion',
      'add_new'            => 'Ajouter une passion',
      'add_new_item'       => 'Ajouter une passion',
      'new_item'           => 'Nouvelle passion',
      'edit_item'          => 'Editer une passion',
      'view_item'          => 'Voir une passion',
      'all_items'          => 'Voir toutes les passions',
      'search_items'       => 'Rechercher une passion',
      'not_found'          => 'Aucune passion trouvée',
      'not_found_in_trash' => 'Aucune passion trouvée dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'exclude_from_search' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-smiley',
      'hierarchiecal' => false,  // ici : besoin d'un sous projet : non.
      'supports' => [ // ici : ce que l'on veut avoir
        'title',
        'editor',
        'thumbnail'
      ],
      'has_archive' => true,
      'rewrite' => [
        'slug' => 'mes-passions'
      ],
      'show_in_rest' => true,

    ];

    register_post_type('passions', $args);
  }

  public function registerLanguage()
  {
    //permet d'enregistrer un nouveau type de contenu ici " Des Prestations"
    $labels = [
      'name'               => 'Langues',
      'singular_name'      => 'Langue',
      'menu_name'          => 'Langues',
      'name_admin_bar'     => 'Langue',
      'add_new'            => 'Ajouter une langue',
      'add_new_item'       => 'Ajouter une langue',
      'new_item'           => 'Nouvelle langue',
      'edit_item'          => 'Editer une langue',
      'view_item'          => 'Voir une langue',
      'all_items'          => 'Voir toutes les langues',
      'search_items'       => 'Rechercher une langue',
      'not_found'          => 'Aucune langue trouvée',
      'not_found_in_trash' => 'Aucune langue trouvée dans la corbeille',
    ];

    $args = [
      'labels' => $labels,
      'public' => true,
      'exclude_from_search' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-format-status',
      'hierarchiecal' => false,  // ici : besoin d'un sous projet : non.
      'supports' => [ // ici : ce que l'on veut avoir
        'title',
        'editor',
        'thumbnail'
      ],
      'has_archive' => true,
      'rewrite' => [
        'slug' => 'mes-langues'
      ],
      'show_in_rest' => true,

    ];

    register_post_type('languages', $args);
  }

  public function registerTaxonomies()
  {
    // Je créé une taxonomy pour relier mes projets par clients
    register_taxonomy(
      'techno',
      'projets',
      [
        'label' => 'Technologies',
        'public' => true,
        'hierarchical' => false,
        'rewrite' => [
          'slug' => 'les-technologies'
        ],
        'show_admin_column' => true,
        'show_in_rest' => true,
        
      ]
    );

    
  }


 
}
if (class_exists('CvLucieFigarol')) {

  $cvLucieFigarol = new CvLucieFigarol();
}

register_activation_hook(__FILE__, [$cvLucieFigarol, 'activate']);

register_deactivation_hook(__FILE__, [$cvLucieFigarol, 'deactivate']);
