
<?php
  get_header();


	$DostupnostVozilaArray = wp_get_post_terms( $post->ID,  array( 'dostupnost_vozila' ));
	$DostupnostTrenutnogVozila = "";
	foreach ($DostupnostVozilaArray as $DostupnostVozila) {
		$DostupnostTrenutnogVozila = $DostupnostVozila->name;
  }
  
  if($DostupnostTrenutnogVozila == "Reklama")
  {
    $postTitle = get_the_title();
    ob_start();
    the_content();
    $content_output = ob_get_clean();
    echo $content_output;
    dohvati_salone_u_kojima_je_reklamno_vozilo_dostupno($postTitle);
  }
  else
  {
    echo dohvati_single_dostupno_vozilo($post->ID);
    $reklamnoVoziloDostupnogVozila = get_post_meta($post->ID, 'vozilo_reklamno', true);
    dohvati_salone_u_kojima_je_reklamno_vozilo_dostupno($reklamnoVoziloDostupnogVozila);
  }



  get_footer();
?>