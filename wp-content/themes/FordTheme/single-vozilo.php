
<?php
  get_header();


	$DostupnostVozilaArray = wp_get_post_terms( $post->ID,  array( 'dostupnost_vozila' ));
	$DostupnostTrenutnogVozila = "";
	foreach ($DostupnostVozilaArray as $DostupnostVozila) {
		$DostupnostTrenutnogVozila = $DostupnostVozila->name;
  }

  $vrstaVozilaArray = wp_get_post_terms( $post->ID,  array( 'vrsta_vozila' ));
	$vrstaTrenutnogVozila = "";
	foreach ($vrstaVozilaArray as $vrstaVozila) {
		$vrstaTrenutnogVozila = $vrstaVozila->name;
  }

	$vozilo_slider = get_post_meta($post->ID, 'vozilo_slider', true);
  $slideriArray = explode(',',$vozilo_slider);

  $vozilo_para_one = get_post_meta($post->ID, 'vozilo_para_one', true);
  $vozilo_para_two = get_post_meta($post->ID, 'vozilo_para_two', true);
  
  if($DostupnostTrenutnogVozila == "Reklama")
  {
    $postTitle = get_the_title();
    if(inBounds(0,$slideriArray))
    {
      echo '<div style="overflow:hidden;">';
      echo do_shortcode('[smartslider3 slider="'.$slideriArray[0].'"]');
      echo '</div>
      <article>
        <div class="container">
        <div class="row">
        <div class="col-lg-10 col-md-11 mx-auto">
        <h1 class="single-vozilo-h1">POTPUNO NOVO '.$postTitle.' VOZILO</h1>
        <h2 class="single-vozilo-h2">Sofisticirano i elegantno novo '.$postTitle.' vozilo donosi novu energiju u popularan '.$vrstaTrenutnogVozila.' segment na hrvatskom tržištu</h2>';
    }
      if(inBounds(1,$slideriArray))
      {
      echo '<div style="overflow:hidden;">';
    echo do_shortcode('[smartslider3 slider="'.$slideriArray[1].'"]');
      echo '</div>
      <div class="bg-gray">
      <h3 class="single-vozilo-h3">'.$vozilo_para_one.'</h3>
      </div>';
      }
      if(inBounds(2,$slideriArray))
      {
      echo '<div style="overflow:hidden;">';
      echo do_shortcode('[smartslider3 slider="'.$slideriArray[2].'"]');
        echo '</div>
        <div class="bg-gray">
        <h4 class="single-vozilo-h4">'.$vozilo_para_two.'</h4>
        </div>';
      }
      if(inBounds(3,$slideriArray))
      {
        echo '<div style="overflow:hidden;">';
        echo do_shortcode('[smartslider3 slider="'.$slideriArray[3].'"]');
          echo '</div>';
      }
      echo           '<div class="bg-gray text-center">
      <h4 class="single-vozilo-h3">Pronađite dostupna '.$postTitle.' vozila kod najbližih koncesionara!</h4>
    </div>';
      echo'<div id="map"></div>
      </div>
      </div>
      </div>
    </article>
    
    <hr />';
    
    dohvati_salone_u_kojima_je_reklamno_vozilo_dostupno($postTitle);
  }
  else
  {
    echo dohvati_single_dostupno_vozilo($post->ID);
    $reklamnoVoziloDostupnogVozila = get_post_meta($post->ID, 'vozilo_reklamno', true);
    dohvati_salone_u_kojima_je_reklamno_vozilo_dostupno($reklamnoVoziloDostupnogVozila);
  }



  get_footer();

  function inBounds ($index, $array) 
  {
      return ($index >= 0) && ($index < count($array));
  }
?>