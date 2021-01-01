
<?php
  get_header();
  $imeZaposlenika = get_the_title();
  echo dohvati_zaposlenika($imeZaposlenika);
  get_footer();
?>
