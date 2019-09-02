<?php
/**
 * Récuperer le champ slider dans l'option ACF
 */
if (function_exists('get_field')):
   $sliders = get_field('sliders', 'options');
else:
   $sliders = [];
endif;
?>

<header class="">
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container ">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav m-auto d-flex">

            <?php
            if (has_nav_menu('menu-principal')) :
               /**
                * Récuperer tous les menus disponible
                */
               $locations = get_nav_menu_locations();
               // Récuperer le menu pour slug: menu-principal
               $menu_id = $locations["menu-principal"];
               $menuObject = wp_get_nav_menu_object($menu_id);
               // Recupérer la liste du menu dans un tableau
               $menu_items = wp_get_nav_menu_items($menuObject->term_id);
               foreach ($menu_items as $key => $menu_item) {
                  // Afficher le logo au millieux de la liste du menu
                  if (round(count($menu_items) / 2) == $key || count($menu_items) === 0 || !$menu_items) {
                     ?>

                     <li class="nav-item orangea-logo">
                        <a class="nav-link" href="<?= home_url('/') ?>">
                           <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/br_logo.png" class="mr-2 ml-2" width="90" />
                        </a>
                     </li>

                     <?php
                  }
                  $class = $key === 0 ? 'active' : '';
                  /**
                   * $menu_item : WP_Post
                   * Afficher la liste
                   */
                  echo sprintf("<li class='nav-item %s'><a href='%s' class='nav-link mr-4'>%s</a></li>", $class, $menu_item->url, $menu_item->post_title);
                }
            endif;
          ?>
            </ul>
         </div>
      </div>

   </nav>
   <div class="header-footer">
      <div class="hf-container-slider" style="position: relative">
         <div class="fadeOut owl-carousel owl-theme">
         <?php 
            if ($sliders && is_array($sliders)) { 
               foreach($sliders as $slider):
         ?>
            <div class="item">
               <img src="<?= $slider['url'] ?>">
            </div>
         <?php 
               endforeach;  
           }
         ?>

         <?php if (!$sliders): ?>
            <div class="item">
               <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/home/home_1.jpg">
            </div>
            <div class="item">
               <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/home/home_2.jpg">
            </div>
            <div class="item">
               <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/home/home_3.jpg">
            </div>
         <?php endif; ?>
         </div>
      </div>


   </div>
</header>