<?php
    get_header();
    $vrsta_vozila_slug = get_queried_object()->slug;
    $vrsta_vozila_ime = get_queried_object()->name;
?>

<?php
    echo dohvati_vozila_po_vrsti($vrsta_vozila_slug);
?>

<?php
get_footer();
?>