<section class="c-link">
	<div class="c-container c-link__container">
		<?php foreach ($args['lista_link'] as $link) {?>
			<a <?php if ($link['esterno']){echo 'target="_blank"';}?> href="<?php echo $link['link'];?>" class="c-link__link"><?php echo $link['nome_tasto'];?></a>	
		<?php }?>
	</div>
</section>
