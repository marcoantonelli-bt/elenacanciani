<?php
	$count = 0;
	while (have_rows('contenuti')): the_row();
		$count++;
		if( get_row_layout() == 'blocco_testo' ){
			component('blocco-testo', array(
				'titolo' => get_sub_field('titolo'),
				'sottotitolo' => get_sub_field('sottotitolo'),
				'testo' => get_sub_field('testo'),
			));
		} 
		else if( get_row_layout() == 'testo_immagine' ){
			component('testo_immagine', array(
				'posizione_immagine' => get_sub_field('posizione_immagine'),
				'dimensioni_immagine' => get_sub_field('dimensioni_immagine'),
				'immagine' => get_sub_field('immagine'),
				'titolo' => get_sub_field('titolo'),
				'testo' => get_sub_field('testo'),
			));
		} 
		else if( get_row_layout() == 'citazione' ){
			component('citazione', array(
				'testo' => get_sub_field('testo'),
				'fonte' => get_sub_field('fonte'),
				'immagine' => get_sub_field('immagine'),
			));
		} 
	endwhile;
?>	