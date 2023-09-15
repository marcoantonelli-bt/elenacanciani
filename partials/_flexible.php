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
		else if( get_row_layout() == 'contatti' ){
			component('contatti', array(
				'titolo' => get_sub_field('titolo'),
				'testo' => get_sub_field('testo'),
				'form' => get_sub_field('form'),
			));
		} 
		else if( get_row_layout() == 'citazione' ){
			component('citazione', array(
				'testo' => get_sub_field('testo'),
				'fonte' => get_sub_field('fonte'),
				'immagine' => get_sub_field('immagine'),
			));
		} 
		else if( get_row_layout() == 'hero' ){
			component('hero', array(
				'immagine' => get_sub_field('immagine'),
				'sopratitolo' => get_sub_field('sopratitolo'),
				'titolo' => get_sub_field('titolo'),
				'testo' => get_sub_field('testo'),
			));
		} 
		else if( get_row_layout() == 'link' ){
			component('link', array(
				'lista_link' => get_sub_field('lista_link'),
			));
		} 
	endwhile;
?>	