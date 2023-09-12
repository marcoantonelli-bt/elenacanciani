<section class="c-hero" style="background-image:url(<?php echo $args['immagine']['url'];?>)">
	<div class="c-container c-hero__container">
		<?php if ($args['sopratitolo']):?>
			<h3 class="c-hero__sopratitolo"><?php echo $args['sopratitolo'];?></h3>
		<?php endif;?>
		<h1 class="c-hero__titolo"><?php echo $args['titolo'];?></h1>
		<?php if ($args['testo']):?>
			<div class="c-hero__testo"><?php echo $args['testo'];?></div>
		<?php endif;?>
	</div>
</section>
