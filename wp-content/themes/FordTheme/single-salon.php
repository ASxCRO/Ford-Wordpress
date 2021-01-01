
<?php
    get_header();
?>

<?php
    $salon_slug = get_queried_object()->slug;
    $saloon_ime = get_queried_object()->name;
    echo $salon_slug . $salon_ime;
?>

    <?php
echo do_shortcode('[smartslider3 slider="7"]');
?>
    <?php
        echo dohvati_vozila_po_salonu($salon_slug);
        echo dohvati_zaposlenike('prodajnisavjetnik', 'Prodajni savjetnici u salonu',  get_the_title($post->ID));
        echo dohvati_zaposlenike('serviser', 'Serviseri u salonu', get_the_title($post->ID));
    ?>


<?php
    get_footer();
?>
