<?php get_header();?>
  <main class="c-main">
    <?php 
      if (!is_front_page()) {
        component('hero', array(
          'titolo' => get_the_title()
        ));
      }
    ?>
    <?php 
      $contenuti = get_field('contenuti'); 
      if($contenuti):
        partial('flexible');
      endif;
    ?>
  </main>
<?php get_footer();?>
