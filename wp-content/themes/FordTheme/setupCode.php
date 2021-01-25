<?php 
if (!function_exists('inicijaliziraj_temu')) {
	function inicijaliziraj_temu()
	{
		add_theme_support('post-thumbnails');
		register_nav_menus(array(
			'glavni-menu' => "Glavni navigacijski izbornik",
			'footer-menu-middle-1' => "Srednji navigacijski izbornik 1",
			'footer-menu-middle-2' => "Srednji navigacijski izbornik 2",
			'footer-menu-bottom' => "Donji navigacijski izbornik"
		));
		add_theme_support('custom-background', apply_filters(
			'test_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		));
		add_theme_support('customize-selective-refresh-widgets');
		add_post_type_support( 'vozilo', 'thumbnail' );
		add_post_type_support( 'salon', 'thumbnail' );
		add_post_type_support( 'zaposlenik', 'thumbnail' );
	}
}
add_action('after_setup_theme', 'inicijaliziraj_temu');

function aktiviraj_sidebar()
{

	register_sidebar(
		array(
			'name' => "footer-slogan",
			'id' => 'footer-slogan',
			'description' => "Slogan za footer",
			'before_widget' => '<p>',
			'after_widget' => "</p>"
		)
	);

	
	register_sidebar(
		array(
			'name' => "footer-slogan-2",
			'id' => 'footer-slogan-2',
			'description' => "Slogan 2 za footer",
			'before_widget' => '<h1>',
			'after_widget' => "</h2>"
		)
	);

	register_sidebar(
		array(
			'name' => "footer-broj",
			'id' => 'footer-broj',
			'description' => "Broj za footer",
			'before_widget' => '<h2>',
			'after_widget' => "</h2>"
		)
	);

	register_sidebar(
		array(
			'name' => "footer-grad-postanski",
			'id' => 'footer-grad-postanski',
			'description' => "Grad i postanski za footer",
			'before_widget' => '<p>',
			'after_widget' => "</p>"
		)
	);

	register_sidebar(
		array(
			'name' => "footer-social",
			'id' => 'footer-social',
			'description' => "Social media",
			'before_widget' => '<ul style="display: inline; margin-left: .5rem">',
			'after_widget' => "</ul>"
		)
	);
}
add_action('widgets_init', 'aktiviraj_sidebar');


//UCITAVANJE CSS DATOTEKA
function UcitajCssTeme()
{
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css');
	wp_enqueue_style('select2-css', get_template_directory_uri() . '/vendor/select2/select2.min.css');
	wp_enqueue_style('reponsive-css', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_style('glavni-css', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'UcitajCssTeme');

//UCITAVANJE JS DATOTEKA
function UcitajJsTeme()
{
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), true);
	wp_enqueue_script('fontawesome-js', get_template_directory_uri() . '/vendor/fontawesome-free/js/all.min.js', array('jquery'), true);
	wp_enqueue_script('jquery-js', get_template_directory_uri() . '/vendor/jquery/jquery.min.js', array('jquery'), true);
	wp_enqueue_script('jquery-mask-js', get_template_directory_uri() . '/vendor/jquery/jquery.mask.min.js', array('jquery'), true);
	wp_enqueue_script('select2', get_template_directory_uri() . '/vendor/select2/select2.min.js', array('jquery'), true);
	wp_enqueue_script('glavni-js', get_template_directory_uri() . '/js/skripta.js', array('jquery'), true);
}
add_action('wp_enqueue_scripts', 'UcitajJsTeme');

function register_admin_scripts() {
	wp_enqueue_script('jquery-js', get_template_directory_uri() . '/vendor/jquery/jquery.min.js', array('jquery'), true);
	wp_enqueue_script('jquery-mask-js', get_template_directory_uri() . '/vendor/jquery/jquery.mask.min.js', array('jquery'), true);

	wp_enqueue_style('select2-css', get_template_directory_uri() . '/vendor/select2/select2.min.css');
	wp_enqueue_script('select2', get_template_directory_uri() . '/vendor/select2/select2.min.js', array('jquery'), true);
	wp_enqueue_style('maps-css', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css');
	wp_enqueue_script('maps-js', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js');
	wp_enqueue_style('search-maps-css', 'https://unpkg.com/leaflet-geosearch@3.0.5/dist/geosearch.css');
	wp_enqueue_script('search-maps-js', 'https://unpkg.com/leaflet-geosearch@3.0.5/dist/geosearch.umd.js');
	wp_enqueue_script('glavni-js', get_template_directory_uri() . '/js/admin-skripta.js', array('jquery'), true);
}

// Hook into the 'admin_enqueue_scripts' action
add_action( 'admin_enqueue_scripts', 'register_admin_scripts' );

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

  
function console_log( $data ){
	echo '<script>';
	echo 'console.log('. $data .')';
	echo '</script>';
  }

  function nacrtaj_marker( $lat, $lng , $nazivSalona, $urlSalona){
	echo '<script>';
	echo '$(document).ready
	(
		function() 
		{
			var marker = L.marker(['.$lat.', '.$lng.']).addTo(mymap);
			var linkVariable = "'.$urlSalona.'";
			marker.bindPopup(\'<b>'.$nazivSalona.'</b><hr><a id="popUpSalonHref" href="\'+linkVariable+\'">Pogledaj salon</a>\');
		}
	);';
	echo '</script>';
  }

?>