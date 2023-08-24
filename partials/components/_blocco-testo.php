<section class="c-blocco-testo">
	<div class="c-container">
		<?php if ($args['titolo']):?>
			<h2 class="c-blocco-testo__titolo"><?php echo $args['titolo'];?></h2>
		<?php endif;?>
		<?php if ($args['sottotitolo']):?>
			<h3 class="c-blocco-testo__sottotitolo"><?php echo $args['sottotitolo'];?></h3>
		<?php endif;?>
		<div class="c-blocco-testo__testo"><?php echo $args['testo'];?></div>
	</div>
</section>
