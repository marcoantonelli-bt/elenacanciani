<?php get_header(); ?>

<main role="c-main">
	
	<?php if ( have_posts() ) :?>
    <?php while ( have_posts() ) : the_post(); ?>
		<section>
				<h1><?php echo get_the_title(); ?></h1>
        <p><?php echo get_the_content(); ?></p>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
