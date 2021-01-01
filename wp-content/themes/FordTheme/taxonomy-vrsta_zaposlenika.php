<?php
    get_header();
    $vrsta_zaposlenika_slug = get_queried_object()->slug;
    $vrsta_zaposlenika_ime = get_queried_object()->name;
?>

<?php
    echo dohvati_zaposlenike($vrsta_zaposlenika_slug, $vrsta_zaposlenika_ime);
?>

<?php
get_footer();
?>