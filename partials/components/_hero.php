<section class="c-hero">
	<div class="c-hero__image" style="background-image:url(<?php echo $args['immagine']['url'];?>)"></div>
	<?php if ($args['sopratitolo']):?>
		<h3 class="c-hero__sopratitolo"><?php echo $args['sopratitolo'];?></h3>
	<?php endif;?>
	<div class="c-hero__container">
		<div class="c-col--one-half">
			<h1 class="c-hero__titolo"><?php echo $args['titolo'];?></h1>
			<?php if ($args['testo']):?>
				<div class="c-hero__testo"><?php echo $args['testo'];?></div>
			<?php endif;?>
		</div>
	</div>
</section>
