<section class="c-citazione">
	<div class="c-container c-container--flex">
		<div class="c-citazione__contenuto <?php if ($args['immagine']){echo 'c-citazione__contenuto--immagine';}?>">
			<h2 class="c-citazione__testo">"<?php echo $args['testo'];?>"</h2>
			<?php if ($args['fonte']):?>
				<p class="c-citazione__fonte"><?php echo $args['fonte'];?></p>
			<?php endif;?>
		</div>
		<?php if ($args['immagine']):?>
			<div class="c-citazione__immagine"><img src="<?php echo $args['immagine']['url'];?>"></div>
		<?php endif;?>
	</div>
</section>
