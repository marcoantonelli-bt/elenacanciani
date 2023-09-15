<?php get_header();?>
  <main class="c-main">
    <?php 
      $contenuti = get_field('contenuti'); 
      if($contenuti):
        partial('flexible');
      endif;
    ?>
  </main>
<?php get_footer();?>
