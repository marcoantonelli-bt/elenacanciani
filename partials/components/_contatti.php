<section class="c-form">
	<div class="c-container c-container--flex">
		<div class="c-form__contenuto c-col--one-half">
			<?php if ($args['titolo']):?>
				<h2 class="c-form__titolo"><?php echo $args['titolo'];?></h2>
			<?php endif;?>
			<div class="c-form__testo"><?php echo $args['testo'];?></div>
		</div>
		<div class="c-form__form c-col--one-half">
			<?php if ($args['form']): echo $form;?>
				<?php $form = $args['form']; echo do_shortcode("$form");?>
			<?php endif;?>
		</div>
	</div>
</section>
