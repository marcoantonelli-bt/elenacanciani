<?php
	if ($args['dimensioni_immagine'] == 'grande') {
		$img_size = "c-col--two-third";
		$content_size = "c-col--one-third";
	} elseif ($args['dimensioni_immagine'] == 'piccola') {
		$img_size = "c-col--one-third";
		$content_size = "c-col--two-third";
	} else {
		$img_size = "c-col--one-half";
		$content_size = "c-col--one-half";
	}
?>

<section class="c-testo-immagine">
	<div class="c-container c-container--flex <?php if ($args['posizione_immagine'] == 'destra') {echo 'c-container--inverted';}?>">
		<div class="c-testo-immagine__immagine <?php echo $content_size;?>">
			<?php if ($args['immagine']):?>
				<img src="<?php echo $args['immagine']['url'];?>">
			<?php endif;?>
		</div>
		<div class="c-testo-immagine__contenuto <?php echo $img_size;?>">
			<?php if ($args['titolo']):?>
				<h2 class="c-testo-immagine__titolo"><?php echo $args['titolo'];?></h2>
			<?php endif;?>
			<div class="c-testo-immagine__testo"><?php echo $args['testo'];?></div>
		</div>
	</div>
</section>
