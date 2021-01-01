<?php
    get_header();
    $vrsta_salona_slug = get_queried_object()->slug;
    $vrsta_salona_ime = get_queried_object()->name;
?>

<?php
    echo dohvati_salone_po_vrsti($vrsta_salona_slug);
?>

<?php
get_footer();
?>