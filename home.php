<?php get_header(); ?>

<main role="c-main">

	<?php 
		if (!is_front_page()) {
			component('hero', array(
				'titolo' => Blog
			));
		}
	?>

  <?php if ( have_posts() ) :?>
    <?php while ( have_posts() ) : the_post(); ?>
      <section>
        <h2><?php echo get_the_title(); ?></h2>
        <p><?php echo get_the_content(); ?></p>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
