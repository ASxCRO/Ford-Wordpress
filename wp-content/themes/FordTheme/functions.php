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




//SIDEBAR ZA NOVOSTI
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


//registriraj vozilo cpt
// Register Custom Post Type
function registriraj_vozilo() {

	$labels = array(
		'name'                  => _x( 'vozilo', 'Post Type General Name', 'ford' ),
		'singular_name'         => _x( 'Vozilo', 'Post Type Singular Name', 'ford' ),
		'menu_name'             => __( 'Vozila', 'ford' ),
		'name_admin_bar'        => __( 'Vozila', 'ford' ),
		'archives'              => __( 'vozila', 'ford' ),
		'attributes'            => __( 'vozilo_atributi', 'ford' ),
		'parent_item_colon'     => __( 'Nadređeno vozilo', 'ford' ),
		'all_items'             => __( 'Sva vozila', 'ford' ),
		'add_new_item'          => __( 'Dodaj novo vozilo', 'ford' ),
		'add_new'               => __( 'Dodaj novo', 'ford' ),
		'new_item'              => __( 'Novo vozilo', 'ford' ),
		'edit_item'             => __( 'Uredi vozilo', 'ford' ),
		'update_item'           => __( 'Ažuriraj vozilo', 'ford' ),
		'view_item'             => __( 'Vidi vozilo', 'ford' ),
		'view_items'            => __( 'Vidi vozila', 'ford' ),
		'search_items'          => __( 'Pretraži vozila', 'ford' ),
		'not_found'             => __( 'Vozilo nije pronađeno', 'ford' ),
		'not_found_in_trash'    => __( 'Vozilo nije pronađeno u smeću', 'ford' ),
		'featured_image'        => __( 'Slika vozila', 'ford' ),
		'set_featured_image'    => __( 'Postavi sliku vozila', 'ford' ),
		'remove_featured_image' => __( 'Ukloni sliku vozila', 'ford' ),
		'use_featured_image'    => __( 'Koristi kao sliku vozila', 'ford' ),
		'insert_into_item'      => __( 'Ubaci u vozilo', 'ford' ),
		'uploaded_to_this_item' => __( 'Uploadano za ovo vozilo', 'ford' ),
		'items_list'            => __( 'Lista vozila', 'ford' ),
		'items_list_navigation' => __( 'Navigacija liste vozila', 'ford' ),
		'filter_items_list'     => __( 'Filter liste vozila', 'ford' ),
	);
	$args = array(
		'label'                 => __( 'Vozilo', 'ford' ),
		'description'           => __( 'Ford vozila', 'ford' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'post-formats' ),
		'taxonomies'            => array( 'vrsta_vozila', 'dostupnost' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-car',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'vozilo', $args );

}
add_action( 'init', 'registriraj_vozilo', 0 );

			//-registriraj taksonomije - vrsta_vozila, dostupnost

			function register_vrsta_vozila() {

				$labels = array(
					'name'                       => _x( 'Vrsta vozila', 'Taxonomy General Name', 'ford' ),
					'singular_name'              => _x( 'Vrsta vozilo', 'Taxonomy Singular Name', 'ford' ),
					'menu_name'                  => __( 'Vrsta vozila', 'ford' ),
					'all_items'                  => __( 'Sve vrste vozila', 'ford' ),
					'parent_item'                => __( 'Nadređena vrsta vozila', 'ford' ),
					'parent_item_colon'          => __( 'Roditeljska vrsta vozila', 'ford' ),
					'new_item_name'              => __( 'Nova vrsta vozila', 'ford' ),
					'add_new_item'               => __( 'Dodaj novu vrstu vozilo', 'ford' ),
					'edit_item'                  => __( 'Uredi vrstu vozila', 'ford' ),
					'update_item'                => __( 'Ažuriraj vrstu vozila', 'ford' ),
					'view_item'                  => __( 'Pogledaj vrstu vozila', 'ford' ),
					'separate_items_with_commas' => __( 'Razdvoji vrstu vozila', 'ford' ),
					'add_or_remove_items'        => __( 'Dodaj ili ukloni vrstu vozila', 'ford' ),
					'choose_from_most_used'      => __( 'Izaberi iz najviše korištenih', 'ford' ),
					'popular_items'              => __( 'Popularne vrste vozila', 'ford' ),
					'search_items'               => __( 'Pretraži vrste vozila', 'ford' ),
					'not_found'                  => __( 'Nije pronađeno', 'ford' ),
					'no_terms'                   => __( 'Nema vrsta vozila', 'ford' ),
					'items_list'                 => __( 'Lista vrsta vozila', 'ford' ),
					'items_list_navigation'      => __( 'Navigacija vrsta vozila', 'ford' ),
				);
				$args = array(
					'labels'                     => $labels,
					'hierarchical'               => true,
					'public'                     => true,
					'show_ui'                    => true,
					'show_admin_column'          => true,
					'show_in_nav_menus'          => true,
					'show_tagcloud'              => true,
				);
				register_taxonomy( 'vrsta_vozila', array( 'vozilo' ), $args );

			}
			add_action( 'init', 'register_vrsta_vozila', 0 );

			function register_dostupnost_vozila() {

				$labels = array(
					'name'                       => _x( 'Dostupnost vozila', 'Taxonomy General Name', 'ford' ),
					'singular_name'              => _x( 'Dostupnost vozilo', 'Taxonomy Singular Name', 'ford' ),
					'menu_name'                  => __( 'Dostupnost vozila', 'ford' ),
					'all_items'                  => __( 'Sve dostupnosti vozila', 'ford' ),
					'parent_item'                => __( 'Nadređena dostupnost vozila', 'ford' ),
					'parent_item_colon'          => __( 'Roditeljska dostupnost vozila', 'ford' ),
					'new_item_name'              => __( 'Nova dostupnost vozila', 'ford' ),
					'add_new_item'               => __( 'Dodaj novu dostupnost vozilo', 'ford' ),
					'edit_item'                  => __( 'Uredi dostupnost vozila', 'ford' ),
					'update_item'                => __( 'Ažuriraj dostupnost vozila', 'ford' ),
					'view_item'                  => __( 'Pogledaj dostupnost vozila', 'ford' ),
					'separate_items_with_commas' => __( 'Razdvoji dostupnost vozila', 'ford' ),
					'add_or_remove_items'        => __( 'Dodaj ili ukloni dostupnost vozila', 'ford' ),
					'choose_from_most_used'      => __( 'Izaberi iz najviše korištenih', 'ford' ),
					'popular_items'              => __( 'Popularne dostupnosti vozila', 'ford' ),
					'search_items'               => __( 'Pretraži dostupnosti vozila', 'ford' ),
					'not_found'                  => __( 'Nije pronađeno', 'ford' ),
					'no_terms'                   => __( 'Nema dostupnosti vozila', 'ford' ),
					'items_list'                 => __( 'Lista dostupnosti vozila', 'ford' ),
					'items_list_navigation'      => __( 'Navigacija dostupnosti vozila', 'ford' ),
				);
				$args = array(
					'labels'                     => $labels,
					'hierarchical'               => true,
					'public'                     => true,
					'show_ui'                    => true,
					'show_admin_column'          => true,
					'show_in_nav_menus'          => true,
					'show_tagcloud'              => true,
				);
				register_taxonomy( 'dostupnost_vozila', array( 'vozilo' ), $args );

			}
			add_action( 'init', 'register_dostupnost_vozila', 0 );

			//html box karoserija,cijena,motor,boja, salon multiselect



//registriraj salon cpt

function registriraj_salon() {

	$labels = array(
		'name'                  => _x( 'salon', 'Post Type General Name', 'ford' ),
		'singular_name'         => _x( 'Salon', 'Post Type Singular Name', 'ford' ),
		'menu_name'             => __( 'Salon', 'ford' ),
		'name_admin_bar'        => __( 'Saloni', 'ford' ),
		'archives'              => __( 'saloni', 'ford' ),
		'attributes'            => __( 'salon-atributi', 'ford' ),
		'parent_item_colon'     => __( 'Nadređeni salon', 'ford' ),
		'all_items'             => __( 'Svi saloni', 'ford' ),
		'add_new_item'          => __( 'Dodaj novi salon', 'ford' ),
		'add_new'               => __( 'Dodaj novi', 'ford' ),
		'new_item'              => __( 'Novi salon', 'ford' ),
		'edit_item'             => __( 'Uredi salon', 'ford' ),
		'update_item'           => __( 'Ažuriraj salon', 'ford' ),
		'view_item'             => __( 'Vidi salon', 'ford' ),
		'view_items'            => __( 'Vidi salone', 'ford' ),
		'search_items'          => __( 'Pretraži salone', 'ford' ),
		'not_found'             => __( 'Salon nije pronađen', 'ford' ),
		'not_found_in_trash'    => __( 'Salon nije pronađen u smeću', 'ford' ),
		'featured_image'        => __( 'Slika salona', 'ford' ),
		'set_featured_image'    => __( 'Postavi sliku salona', 'ford' ),
		'remove_featured_image' => __( 'Ukloni sliku salona', 'ford' ),
		'use_featured_image'    => __( 'Koristi kao sliku salona', 'ford' ),
		'insert_into_item'      => __( 'Ubaci u salon', 'ford' ),
		'uploaded_to_this_item' => __( 'Uploadano za ovaj salon', 'ford' ),
		'items_list'            => __( 'Lista salona', 'ford' ),
		'items_list_navigation' => __( 'Navigacija liste salona', 'ford' ),
		'filter_items_list'     => __( 'Filter liste salona', 'ford' ),
	);
	$args = array(
		'label'                 => __( 'Salon', 'ford' ),
		'description'           => __( 'Ford saloni vozila', 'ford' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'post-formats' ),
		'taxonomies'            => array( 'dostupna_vozila', 'motori', 'cijena' , 'zaposlenici' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-building',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'salon', $args );

}
add_action( 'init', 'registriraj_salon', 0 );
			//-registriraj taksonomije

			function register_dostupnost_servisa() {

				$labels = array(
					'name'                       => _x( 'Dostupnost servisa', 'Taxonomy General Name', 'ford' ),
					'singular_name'              => _x( 'Dostupnost servisa', 'Taxonomy Singular Name', 'ford' ),
					'menu_name'                  => __( 'Dostupnost servisa', 'ford' ),
					'all_items'                  => __( 'Sve dostupnosti servisa', 'ford' ),
					'parent_item'                => __( 'Nadređena dostupnost servisa', 'ford' ),
					'parent_item_colon'          => __( 'Roditeljska dostupnost servisa', 'ford' ),
					'new_item_name'              => __( 'Nova dostupnost servisa', 'ford' ),
					'add_new_item'               => __( 'Dodaj novu dostupnost servisa', 'ford' ),
					'edit_item'                  => __( 'Uredi dostupnost servisa', 'ford' ),
					'update_item'                => __( 'Ažuriraj dostupnost servisa', 'ford' ),
					'view_item'                  => __( 'Pogledaj dostupnost servisa', 'ford' ),
					'separate_items_with_commas' => __( 'Razdvoji dostupnost servisa', 'ford' ),
					'add_or_remove_items'        => __( 'Dodaj ili ukloni dostupnost servisa', 'ford' ),
					'choose_from_most_used'      => __( 'Izaberi iz najviše korištenih', 'ford' ),
					'popular_items'              => __( 'Popularne dostupnosti servisa', 'ford' ),
					'search_items'               => __( 'Pretraži dostupnosti servisa', 'ford' ),
					'not_found'                  => __( 'Nije pronađeno', 'ford' ),
					'no_terms'                   => __( 'Nema dostupnosti servisa', 'ford' ),
					'items_list'                 => __( 'Lista dostupnosti servisa', 'ford' ),
					'items_list_navigation'      => __( 'Navigacija dostupnosti servisa', 'ford' ),
				);
				$args = array(
					'labels'                     => $labels,
					'hierarchical'               => true,
					'public'                     => true,
					'show_ui'                    => true,
					'show_admin_column'          => true,
					'show_in_nav_menus'          => true,
					'show_tagcloud'              => true,
				);
				register_taxonomy( 'dostupnost_servisa', array( 'salon' ), $args );

			}
			add_action( 'init', 'register_dostupnost_servisa', 0 );
			
			function register_vrsta_salona() {

				$labels = array(
					'name'                       => _x( 'Vrste salona', 'Taxonomy General Name', 'ford' ),
					'singular_name'              => _x( 'Vrsta salona', 'Taxonomy Singular Name', 'ford' ),
					'menu_name'                  => __( 'Vrsta salona', 'ford' ),
					'all_items'                  => __( 'Sve vrste', 'ford' ),
					'parent_item'                => __( 'Nadređena vrsta', 'ford' ),
					'parent_item_colon'          => __( 'Roditeljska vrsta', 'ford' ),
					'new_item_name'              => __( 'Nova vrsta salona', 'ford' ),
					'add_new_item'               => __( 'Dodaj novu vrstu', 'ford' ),
					'edit_item'                  => __( 'Uredi vrstu', 'ford' ),
					'update_item'                => __( 'Ažuriraj vrstu', 'ford' ),
					'view_item'                  => __( 'Pogledaj vrstu salona', 'ford' ),
					'separate_items_with_commas' => __( 'Razdvoji vrste zarezom', 'ford' ),
					'add_or_remove_items'        => __( 'Dodaj ili ukloni vrste', 'ford' ),
					'choose_from_most_used'      => __( 'Izaberi iz najviše korištenih', 'ford' ),
					'popular_items'              => __( 'Popularne vrste', 'ford' ),
					'search_items'               => __( 'Pretraži vrste', 'ford' ),
					'not_found'                  => __( 'Nije pronađeno', 'ford' ),
					'no_terms'                   => __( 'Nema vrste salona', 'ford' ),
					'items_list'                 => __( 'Lista vrsta salona', 'ford' ),
					'items_list_navigation'      => __( 'Navigacija vrste salona', 'ford' ),
				);
				$args = array(
					'labels'                     => $labels,
					'hierarchical'               => true,
					'public'                     => true,
					'show_ui'                    => true,
					'show_admin_column'          => true,
					'show_in_nav_menus'          => true,
					'show_tagcloud'              => true,
				);
				register_taxonomy( 'vrsta_salona', array( 'salon' ), $args );
			
			}
			add_action( 'init', 'register_vrsta_salona', 0 );

			
			function register_motor_vozila() {

				$labels = array(
					'name'                       => _x( 'Motori vozila', 'Taxonomy General Name', 'ford' ),
					'singular_name'              => _x( 'Motor vozila', 'Taxonomy Singular Name', 'ford' ),
					'menu_name'                  => __( 'Motori vozila', 'ford' ),
					'all_items'                  => __( 'Svi motori vozila', 'ford' ),
					'parent_item'                => __( 'Nadređeni motori vozila', 'ford' ),
					'parent_item_colon'          => __( 'Roditeljski motori', 'ford' ),
					'new_item_name'              => __( 'Novi motori vozila', 'ford' ),
					'add_new_item'               => __( 'Dodaj nove motore vozila', 'ford' ),
					'edit_item'                  => __( 'Uredi motore vozila', 'ford' ),
					'update_item'                => __( 'Ažuriraj motore vozila', 'ford' ),
					'view_item'                  => __( 'Pogledaj motore vozila', 'ford' ),
					'separate_items_with_commas' => __( 'Razdvoji motore vozila', 'ford' ),
					'add_or_remove_items'        => __( 'Dodaj ili ukloni motore vozila', 'ford' ),
					'choose_from_most_used'      => __( 'Izaberi iz najviše korištenih', 'ford' ),
					'popular_items'              => __( 'Popularni motori vozila', 'ford' ),
					'search_items'               => __( 'Pretraži motore vozila', 'ford' ),
					'not_found'                  => __( 'Nije pronađeno', 'ford' ),
					'no_terms'                   => __( 'Nema motora vozila', 'ford' ),
					'items_list'                 => __( 'Lista motora vozila', 'ford' ),
					'items_list_navigation'      => __( 'Navigacija motora vozila', 'ford' ),
				);
				$args = array(
					'labels'                     => $labels,
					'hierarchical'               => true,
					'public'                     => true,
					'show_ui'                    => true,
					'show_admin_column'          => true,
					'show_in_nav_menus'          => true,
					'show_tagcloud'              => true,
				);
				register_taxonomy( 'motor_vozila', array( 'vozilo' ), $args );

			}
			add_action( 'init', 'register_motor_vozila', 0 );

			
			function register_boja_vozila() {

				$labels = array(
					'name'                       => _x( 'Boje vozila', 'Taxonomy General Name', 'ford' ),
					'singular_name'              => _x( 'Boja vozilo', 'Taxonomy Singular Name', 'ford' ),
					'menu_name'                  => __( 'Boja vozila', 'ford' ),
					'all_items'                  => __( 'Sve boje vozila', 'ford' ),
					'parent_item'                => __( 'Nadređena boja', 'ford' ),
					'parent_item_colon'          => __( 'Roditeljska boja', 'ford' ),
					'new_item_name'              => __( 'Nova boja vozila', 'ford' ),
					'add_new_item'               => __( 'Dodaj novu boju vozila', 'ford' ),
					'edit_item'                  => __( 'Uredi boju vozila', 'ford' ),
					'update_item'                => __( 'Ažuriraj boju vozila', 'ford' ),
					'view_item'                  => __( 'Pogledaj boju vozila', 'ford' ),
					'separate_items_with_commas' => __( 'Razdvoji boju vozilo', 'ford' ),
					'add_or_remove_items'        => __( 'Dodaj ili ukloni boju vozila', 'ford' ),
					'choose_from_most_used'      => __( 'Izaberi iz najviše korištenih', 'ford' ),
					'popular_items'              => __( 'Popularna boja vozila', 'ford' ),
					'search_items'               => __( 'Pretraži boje vozila', 'ford' ),
					'not_found'                  => __( 'Nije pronađeno', 'ford' ),
					'no_terms'                   => __( 'Nema boja vozila', 'ford' ),
					'items_list'                 => __( 'Lista dosutpnih boju', 'ford' ),
					'items_list_navigation'      => __( 'Navigacija boja vozila', 'ford' ),
				);
				$args = array(
					'labels'                     => $labels,
					'hierarchical'               => true,
					'public'                     => true,
					'show_ui'                    => true,
					'show_admin_column'          => true,
					'show_in_nav_menus'          => true,
					'show_tagcloud'              => true,
				);
				register_taxonomy( 'boja_vozila', array( 'vozilo' ), $args );

			}
			add_action( 'init', 'register_boja_vozila', 0 );


			//cijena dostupnog vozila html box , zaposlenici multiselect htmlbox
			
//registriraj zaposlenik cpt
function registriraj_zaposlenika() {

	$labels = array(
		'name'                  => _x( 'zaposlenik', 'Post Type General Name', 'ford' ),
		'singular_name'         => _x( 'Zaposlenik', 'Post Type Singular Name', 'ford' ),
		'menu_name'             => __( 'Zaposlenik', 'ford' ),
		'name_admin_bar'        => __( 'Zaposlenici', 'ford' ),
		'archives'              => __( 'zaposlenici', 'ford' ),
		'attributes'            => __( 'salon-atributi', 'ford' ),
		'parent_item_colon'     => __( 'Nadređeni zaposlenik', 'ford' ),
		'all_items'             => __( 'Svi zaposlenici', 'ford' ),
		'add_new_item'          => __( 'Dodaj novog zaposlenika', 'ford' ),
		'add_new'               => __( 'Dodaj novog', 'ford' ),
		'new_item'              => __( 'Novi zaposlenik', 'ford' ),
		'edit_item'             => __( 'Uredi zaposlenika', 'ford' ),
		'update_item'           => __( 'Ažuriraj zaposlenika', 'ford' ),
		'view_item'             => __( 'Vidi zaposlenika', 'ford' ),
		'view_items'            => __( 'Vidi zaposlenike', 'ford' ),
		'search_items'          => __( 'Pretraži zaposlenike', 'ford' ),
		'not_found'             => __( 'Zaposlenik nije pronađen', 'ford' ),
		'not_found_in_trash'    => __( 'Zaposlenik nije pronađen u smeću', 'ford' ),
		'featured_image'        => __( 'Slika zaposlenika', 'ford' ),
		'set_featured_image'    => __( 'Postavi sliku zaposlenika', 'ford' ),
		'remove_featured_image' => __( 'Ukloni sliku zaposlenika', 'ford' ),
		'use_featured_image'    => __( 'Koristi kao sliku zaposlenika', 'ford' ),
		'insert_into_item'      => __( 'Ubaci u zaposlenika', 'ford' ),
		'uploaded_to_this_item' => __( 'Uploadano za ovaj salon', 'ford' ),
		'items_list'            => __( 'Lista zaposlenika', 'ford' ),
		'items_list_navigation' => __( 'Navigacija liste zaposlenika', 'ford' ),
		'filter_items_list'     => __( 'Filter liste zaposlenika', 'ford' ),
	);
	$args = array(
		'label'                 => __( 'Zaposlenik', 'ford' ),
		'description'           => __( 'Zaposlenici Forda', 'ford' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'post-formats' ),
		'taxonomies'            => array( 'vrsta_zaposlenika'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'zaposlenik', $args );

}
add_action( 'init', 'registriraj_zaposlenika', 0 );
			//-registriraj taksonomije

			// Register Custom Taxonomy
function register_vrsta_zaposlenika() {

	$labels = array(
		'name'                       => _x( 'Vrste zaposlenika', 'Taxonomy General Name', 'ford' ),
		'singular_name'              => _x( 'Vrsta zaposlenika', 'Taxonomy Singular Name', 'ford' ),
		'menu_name'                  => __( 'Vrsta zaposlenika', 'ford' ),
		'all_items'                  => __( 'Sve vrste', 'ford' ),
		'parent_item'                => __( 'Nadređena vrsta', 'ford' ),
		'parent_item_colon'          => __( 'Roditeljska vrsta', 'ford' ),
		'new_item_name'              => __( 'Nova vrsta zaposlenika', 'ford' ),
		'add_new_item'               => __( 'Dodaj novu vrstu', 'ford' ),
		'edit_item'                  => __( 'Uredi vrstu', 'ford' ),
		'update_item'                => __( 'Ažuriraj vrstu', 'ford' ),
		'view_item'                  => __( 'Pogledaj vrstu zaposlenika', 'ford' ),
		'separate_items_with_commas' => __( 'Razdvoji vrste zarezom', 'ford' ),
		'add_or_remove_items'        => __( 'Dodaj ili ukloni vrste', 'ford' ),
		'choose_from_most_used'      => __( 'Izaberi iz najviše korištenih', 'ford' ),
		'popular_items'              => __( 'Popularne vrste', 'ford' ),
		'search_items'               => __( 'Pretraži vrste', 'ford' ),
		'not_found'                  => __( 'Nije pronađeno', 'ford' ),
		'no_terms'                   => __( 'Nema vrste zaposlenika', 'ford' ),
		'items_list'                 => __( 'Lista vrsta zaposlenika', 'ford' ),
		'items_list_navigation'      => __( 'Navigacija vrste zaposlenika', 'ford' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'vrsta_zaposlenika', array( 'zaposlenik' ), $args );

}
add_action( 'init', 'register_vrsta_zaposlenika', 0 );

?>

<?php
function add_meta_box_info_vozila()
{
	add_meta_box('info_vozila', 'Info o vozilu', 'html_meta_box_info_vozila', 'vozilo');
}
function html_meta_box_info_vozila($post)
{
	wp_nonce_field('spremi_vozilo_cijena', 'vozilo_cijena_nonce');
	wp_nonce_field('spremi_vozilo_saloni', 'vozilo_saloni_nonce');
	wp_nonce_field('spremi_vozilo_reklamno', 'vozilo_reklamno_nonce');
	wp_nonce_field('spremi_vozilo_slider', 'vozilo_slider_nonce');
	//dohvaćanje meta vrijednosti
	$vozilo_cijena = get_post_meta($post->ID, 'vozilo_cijena', true);
	$vozilo_saloni = get_post_meta($post->ID, 'vozilo_saloni', true);
	$vozilo_reklamno = get_post_meta($post->ID, 'vozilo_reklamno', true);
	$vozilo_slider = get_post_meta($post->ID, 'vozilo_slider', true);
	echo '
	<div>
		<div>
			<label for="vozilo_slider">Slider (odvoji sa zarezom ako ih ima više): </label>
			<input type="text" id="vozilo_slider"
			name="vozilo_slider" value="' . $vozilo_slider . '" />
		</div>
		<div>
			<label for="vozilo_cijena">Cijena vozila: </label>
			<input type="number" id="vozilo_cijena"
			name="vozilo_cijena" value="' . $vozilo_cijena . '" />
		</div>
		<div>
		<label for="vozilo_saloni">Dostupan u salonima: </label>
			<select multiple="multiple" id="vozilo_saloni" name="vozilo_saloni[]">
				  '.
				  $args = array(
					'posts_per_page' => -1,
					'post_type' => 'salon',
					'post_status' => 'publish'
					);
					$saloni = get_posts( $args );
					$sHtml = "";
		
					foreach ($saloni as $salon)
						{
							$nazivSalona = $salon->post_title;
							$saloniArray = explode(', ', $vozilo_saloni);
							$selected = "";
							foreach ($saloniArray as $oSalon) 
							{
								
								if ($oSalon == $nazivSalona)
								{
									$selected = "selected";
								}
							}

							
							$sHtml .= '<option value="'.$nazivSalona.'" '. $selected .'>'.$nazivSalona.'</option>';
						}
					echo $sHtml
				  .'
			</select>
		</div>
		<div>
			<label for="vozilo_reklamno">Reklamno: </label>
			<select id="vozilo_reklamno" name="vozilo_reklamno[]">
				  '.
				  $args = array(
					'posts_per_page' => -1,
					'post_type' => 'vozilo',
					'post_status' => 'publish'
					);
					$vozila = get_posts( $args );
					$sHtml = "";
		
					foreach ($vozila as $vozilo)
						{
							$nazivVozila = $vozilo->post_title;
							$vozilaArray = explode(', ', $vozilo_reklamno);
							$selected = "";
							foreach ($vozilaArray as $oVozilo) 
							{
								
								if ($oVozilo == $nazivVozila)
								{
									$selected = "selected";
								}
							}

							
							$sHtml .= '<option value="'.$nazivVozila.'" '. $selected .'>'.$nazivVozila.'</option>';
						}
					echo $sHtml
				  .'
			</select>
		</div>
	</div>
  ';
}
function spremi_info_vozila($post_id)
{
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce_vozilo_cijena = (isset($_POST['vozilo_cijena_nonce']) && wp_verify_nonce(
		$_POST['vozilo_cijena_nonce'],
		basename(__FILE__)
	)) ? 'true' : 'false';
	$is_valid_nonce_vozilo_slider = (isset($_POST['vozilo_slider_nonce']) && wp_verify_nonce(
		$_POST['vozilo_slider_nonce'],
		basename(__FILE__)
	)) ? 'true' : 'false';
	$is_valid_nonce_vozilo_saloni = ( isset( $_POST[ 'vozilo_saloni_nonce' ] ) &&
			 wp_verify_nonce($_POST[ 'vozilo_saloni_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
			 $is_valid_nonce_vozilo_reklamno = ( isset( $_POST[ 'vozilo_reklamno_nonce' ] ) &&
			 wp_verify_nonce($_POST[ 'vozilo_reklamno_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	if (
		$is_autosave || $is_revision || !$is_valid_nonce_vozilo_saloni || !$is_valid_nonce_vozilo_cijena || !$is_valid_nonce_vozilo_reklamno|| !$is_valid_nonce_vozilo_slider
	) {
		return;
	}
	if (!empty($_POST['vozilo_cijena'])) {
		update_post_meta(
			$post_id,
			'vozilo_cijena',
			$_POST['vozilo_cijena']
		);
	} else {
		delete_post_meta($post_id, 'vozilo_cijena');
	}
	if (!empty($_POST['vozilo_slider'])) {
		update_post_meta(
			$post_id,
			'vozilo_slider',
			$_POST['vozilo_slider']
		);
	} else {
		delete_post_meta($post_id, 'vozilo_slider');
	}
	if(!empty($_POST['vozilo_saloni']))
	{
		if (is_array($_POST[ 'vozilo_saloni' ]))
		{
			$saloni = implode(", ", $_POST[ 'vozilo_saloni' ]);
		}
		else
		{
			$saloni = $_POST[ 'vozilo_saloni' ];
		}
		update_post_meta($post_id, 'vozilo_saloni',
		$saloni);
	}
	else
	{
		delete_post_meta($post_id, 'vozilo_saloni');
	}
	if(!empty($_POST['vozilo_reklamno']))
	{
		if (is_array($_POST[ 'vozilo_reklamno' ]))
		{
			$vozilo = implode(", ", $_POST[ 'vozilo_reklamno' ]);
		}
		else
		{
			$vozilo = $_POST[ 'vozilo_reklamno' ];
		}
		update_post_meta($post_id, 'vozilo_reklamno',
		$vozilo);
	}
	else
	{
		delete_post_meta($post_id, 'vozilo_reklamno');
	}
}
add_action('add_meta_boxes', 'add_meta_box_info_vozila');
add_action('save_post', 'spremi_info_vozila');

function add_meta_box_info_salona()
{
	add_meta_box('info_salona', 'Info o salonu', 'html_meta_box_info_salona', 'salon');
}
function html_meta_box_info_salona($post)
{
	wp_nonce_field('spremi_salon_adresa', 'salon_adresa_nonce');
	wp_nonce_field('spremi_salon_lat', 'salon_lat_nonce');
	wp_nonce_field('spremi_salon_lng', 'salon_lng_nonce');
	wp_nonce_field('spremi_salon_brojservisa', 'salon_brojservisa_nonce');
	wp_nonce_field('spremi_salon_brojsalona', 'salon_brojsalona_nonce');

	//dohvaćanje meta vrijednosti
	$salon_adresa = get_post_meta($post->ID, 'salon_adresa', true);
	$salon_lat = get_post_meta($post->ID, 'salon_lat', true);
	$salon_lng = get_post_meta($post->ID, 'salon_lng', true);
	$salon_brojservisa = get_post_meta($post->ID, 'salon_brojservisa', true);
	$salon_brojsalona = get_post_meta($post->ID, 'salon_brojsalona', true);

	echo '
		<div>
			<div>
				<label for="salon_adresa">Adresa salona:  </label>
				<input type="text" id="salon_adresa"
				name="salon_adresa" value="' . $salon_adresa . '" style="width:100%" />
			</div>
			<div class="employee-card">
				<div class="employee-card-body">
					<div class="row">
						<h4 class="text-center mb-1" style="width: 100%;">Odaberi lokaciju salona: </h4>
					</div>
					<hr/>
					<div class="row">
						<div class="col-sm-12">
							<div id="map" style="margin-bottom: 0; height: 300px;"></div>
						</div>
					</div>
				</div>
			</div>
			<div>
			
				<label for="salon_lat">Latituda: </label>
				<input disabled type="text" id="salon_lat"
				name="salon_lat" value="' . $salon_lat . '" />
			</div>
			<div>
				<label for="salon_lng">Longituda </label>
				<input disabled type="text" id="salon_lng"
				name="salon_lng" value="' . $salon_lng . '" />
			</div>
			<div>
				<label for="salon_brojservisa">Tel. broj. servisa:  </label>
				<input type="number" id="salon_brojservisa"
				name="salon_brojservisa" value="' . $salon_brojservisa . '" />
			</div>		
			<div>
				<label for="salon_brojsalona">Tel. broj. salona: </label>
				<input type="number" id="salon_brojsalona"
				name="salon_brojsalona" value="' . $salon_brojsalona . '" />
			</div>			
		</div>
  	';
}
function spremi_info_salona($post_id)
{
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);

	$is_valid_nonce_salon_adresa = ( isset( $_POST[ 'salon_adresa_nonce' ] ) &&
	wp_verify_nonce($_POST[ 'salon_adresa_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_salon_lat = ( isset( $_POST[ 'salon_lat_nonce' ] ) &&
	wp_verify_nonce($_POST[ 'salon_lat_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_salon_lng = ( isset( $_POST[ 'salon_lng_nonce' ] ) &&
	wp_verify_nonce($_POST[ 'salon_lng_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_salon_brojservisa = ( isset( $_POST[ 'salon_brojservisa_nonce' ] ) &&
	wp_verify_nonce($_POST[ 'salon_brojservisa_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_salon_brojsalona = ( isset( $_POST[ 'salon_brojsalona_nonce' ] ) &&
	wp_verify_nonce($_POST[ 'salon_brojsalona_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	if (
		$is_autosave || $is_revision 
	) {
		return;
	}

	if (!empty($_POST['salon_adresa'])) {
		update_post_meta(
			$post_id,
			'salon_adresa',
			$_POST['salon_adresa']
		);
	} else {
		delete_post_meta($post_id, 'salon_adresa');
	}
	if (!empty($_POST['salon_lat'])) {
		update_post_meta(
			$post_id,
			'salon_lat',
			$_POST['salon_lat']
		);
	} else {
		delete_post_meta($post_id, 'salon_lat');
	}
	if (!empty($_POST['salon_lng'])) {
		update_post_meta(
			$post_id,
			'salon_lng',
			$_POST['salon_lng']
		);
	} else {
		delete_post_meta($post_id, 'salon_lng');
	}
	if (!empty($_POST['salon_brojservisa'])) {
		update_post_meta(
			$post_id,
			'salon_brojservisa',
			$_POST['salon_brojservisa']
		);
	} else {
		delete_post_meta($post_id, 'salon_brojservisa');
	}
	if (!empty($_POST['salon_brojsalona'])) {
		update_post_meta(
			$post_id,
			'salon_brojsalona',
			$_POST['salon_brojsalona']
		);
	} else {
		delete_post_meta($post_id, 'salon_brojsalona');
	}
}
add_action('add_meta_boxes', 'add_meta_box_info_salona');
add_action('save_post', 'spremi_info_salona');

function add_meta_box_info_zaposlenika()
{
	add_meta_box('info_zaposlenika', 'Info o vozilu', 'html_meta_box_info_zaposlenika', 'zaposlenik');
}
function html_meta_box_info_zaposlenika($post)
{
	wp_nonce_field('spremi_zaposlenik_salon', 'zaposlenik_salon_nonce');
	wp_nonce_field('spremi_zaposlenik_citat', 'zaposlenik_citat_nonce');
	wp_nonce_field('spremi_zaposlenik_email', 'zaposlenik_salon_nonce');
	wp_nonce_field('spremi_zaposlenik_uredskibroj', 'zaposlenik_citat_nonce');	
	wp_nonce_field('spremi_zaposlenik_mobilnibroj', 'zaposlenik_citat_nonce');
	//dohvaćanje meta vrijednosti
	$zaposlenik_salon = get_post_meta($post->ID, 'zaposlenik_salon', true);
	$zaposlenik_citat = get_post_meta($post->ID, 'zaposlenik_citat', true);
	$zaposlenik_email = get_post_meta($post->ID, 'zaposlenik_email', true);
	$zaposlenik_uredskibroj = get_post_meta($post->ID, 'zaposlenik_uredskibroj', true);
	$zaposlenik_mobilnibroj = get_post_meta($post->ID, 'zaposlenik_mobilnibroj', true);

	echo '
		<div>
			<div>
				<label for="zaposlenik_email">Email: </label>
				<input type="text" id="zaposlenik_email"
				name="zaposlenik_email" value="' . $zaposlenik_email . '" />
			</div>
			<div>
				<label for="zaposlenik_uredskibroj">Tel. broj u uredu: </label>
				<input type="text" id="zaposlenik_uredskibroj"
				name="zaposlenik_uredskibroj" value="' . $zaposlenik_uredskibroj . '" />
			</div>
			<div>
				<label for="zaposlenik_mobilnibroj">Mobilni broj: </label>
				<input type="text" id="zaposlenik_mobilnibroj"
				name="zaposlenik_mobilnibroj" value="' . $zaposlenik_mobilnibroj . '" />
			</div>

			<div>
				<label for="zaposlenik_citat">Citat na kartici: </label>
				<input type="text" id="zaposlenik_citat"
				name="zaposlenik_citat" value="' . $zaposlenik_citat . '" />
			</div>
		<div>
			<label for="zaposlenik_salon">Radi u salonu: </label>
			<select id="zaposlenik_salon" name="zaposlenik_salon[]">
				  '.
				  $args = array(
					'posts_per_page' => -1,
					'post_type' => 'salon',
					'post_status' => 'publish'
					);
					$saloni = get_posts( $args );
					$sHtml = "";
		
					foreach ($saloni as $salon)
						{
							$nazivSalona = $salon->post_title;
							$saloniArray = explode(', ', $zaposlenik_salon);
							$selected = "";
							foreach ($saloniArray as $oSalon) 
							{
								
								if ($oSalon == $nazivSalona)
								{
									$selected = "selected";
								}
							}

							
							$sHtml .= '<option value="'.$nazivSalona.'" '. $selected .'>'.$nazivSalona.'</option>';
						}
					echo $sHtml
				  .'
			</select>
			</div>
	</div>
  ';
}
function spremi_info_zaposlenika($post_id)
{
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce_zaposlenik_salon = ( isset( $_POST[ 'zaposlenik_salon_nonce' ] ) &&
			 wp_verify_nonce($_POST[ 'zaposlenik_salon_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_zaposlenik_citat = ( isset( $_POST[ 'zaposlenik_citat_nonce' ] ) &&
	wp_verify_nonce($_POST[ 'zaposlenik_citat_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_zaposlenik_email = ( isset( $_POST[ 'zaposlenik_email_nonce' ] ) &&
	wp_verify_nonce($_POST[ 'zaposlenik_email_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_zaposlenik_uredskibroj = ( isset( $_POST[ 'zaposlenik_uredskibroj_nonce' ] ) &&
	wp_verify_nonce($_POST[ 'zaposlenik_uredskibroj_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_zaposlenik_mobilnibroj = ( isset( $_POST[ 'zaposlenik_mobilnibroj_nonce' ] ) &&
	wp_verify_nonce($_POST[ 'zaposlenik_mobilnibroj_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	if (
		$is_autosave || $is_revision || !$is_valid_nonce_zaposlenik_salon|| !$is_valid_nonce_zaposlenik_citat
	) {
		return;
	}
	if (!empty($_POST['zaposlenik_citat'])) {
		update_post_meta(
			$post_id,
			'zaposlenik_citat',
			$_POST['zaposlenik_citat']
		);
	} else {
		delete_post_meta($post_id, 'zaposlenik_citat');
	}
	if (!empty($_POST['zaposlenik_email'])) {
		update_post_meta(
			$post_id,
			'zaposlenik_email',
			$_POST['zaposlenik_email']
		);
	} else {
		delete_post_meta($post_id, 'zaposlenik_email');
	}
	if (!empty($_POST['zaposlenik_uredskibroj'])) {
		update_post_meta(
			$post_id,
			'zaposlenik_uredskibroj',
			$_POST['zaposlenik_uredskibroj']
		);
	} else {
		delete_post_meta($post_id, 'zaposlenik_uredskibroj');
	}
	if (!empty($_POST['zaposlenik_mobilnibroj'])) {
		update_post_meta(
			$post_id,
			'zaposlenik_mobilnibroj',
			$_POST['zaposlenik_mobilnibroj']
		);
	} else {
		delete_post_meta($post_id, 'zaposlenik_mobilnibroj');
	}
	if(!empty($_POST['zaposlenik_salon']))
	{
		if (is_array($_POST[ 'zaposlenik_salon' ]))
		{
			$saloni = implode(", ", $_POST[ 'zaposlenik_salon' ]);
		}
		else
		{
			$saloni = $_POST[ 'zaposlenik_salon' ];
		}
		update_post_meta($post_id, 'zaposlenik_salon',
		$saloni);
	}
	else
	{
		delete_post_meta($post_id, 'zaposlenik_salon');
	}
}
add_action('add_meta_boxes', 'add_meta_box_info_zaposlenika');
add_action('save_post', 'spremi_info_zaposlenika');



function dohvati_vozila($slug)
{

	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'vozilo',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'dostupnost_vozila',

				'field' => 'slug',
				'terms' => $slug
			)
		)
	);
	$vozila = get_posts($args);

	$sHtml = " <div class='category-products container'>
	<ul class='products-grid row bg-aligned'>";
	foreach ($vozila as $Vozilo) {
		$nVoziloID = $Vozilo->ID;
		$sVoziloURL = $Vozilo->guid;
		$sVoziloNaziv = $Vozilo->post_title;
		
		$cijena = get_post_meta($nVoziloID, 'vozilo_cijena', true);
		if($cijena ==""|| $cijena == 0 || $cijena == NULL) {
			$cijena = "-";
		}
		$sVoziloSlikaURI  = "";
		$hasImage = false;
		if(get_the_post_thumbnail_url($nVoziloID))
		{
			$sVoziloSlikaURI = get_the_post_thumbnail_url($nVoziloID);
			$hasImage = true;
		}
		else 
		{
			$sVoziloSlikaURI = get_template_directory_uri() . '/img/no-image.png';
			$hasImage = false;
		}

		$innerMargin = $hasImage ? "3rem" : "0";
		$innerRight = $hasImage ?  "0" : "4.5rem";

		$sHtml .= '<li class="item col-lg-4 col-md-6 col-sm-12 col-xs-12" >
		<div class="item-inner" style="margin-right: '.$innerRight .'">
		 <div class="item-img">
		   <div class="item-img-info">
			 <a href="'.$sVoziloURL.'" title="Retis lapen casen" class="product-image">
				 <img src="'.$sVoziloSlikaURI.'" alt="slika_vozila">
			 </a>
		   </div>
		 </div>
		 <div class="item-info">
		   <div class="info-inner" style="margin-right: '.$innerMargin.'">
			 <div class="item-title"><a href="'.$sVoziloURL.'" title="Retis lapen casen">'.$sVoziloNaziv.'</a> </div>
			 <div class="item-content">
			   <div class="item-price">
				 <div class="price-box">
					 <span class="regular-price">
						Od <span class="price">&nbsp;' .$cijena.' </span>&nbsp;HRK
					 </span> 
				 </div>
			   </div>
			 </div>
		   </div>
		 </div>
	   </div>
	   </li>';
	}
	$sHtml .= "</ul></div>";
	return $sHtml;
}


function dohvati_salone()
{
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'salon',
		'post_status' => 'publish'
	);
	$saloni = get_posts($args);

	$sHtml = " <div class='category-products container'>
	<ul class='products-grid row bg-aligned'>";
	foreach ($saloni as $Salon) {
		$nSalonID = $Salon->ID;
		$sSalonURL = $Salon->guid;
		$sSalonNaziv = $Salon->post_title;
		
		$dostupnostServisaArray = wp_get_post_terms( $nSalonID,  array( 'dostupnost_servisa' ));


		if($dostupnostServisa == NULL) {
			 $dostupnostServisa = "-";
		}
		$sSalonSlikaURI  = "";
		if(get_the_post_thumbnail_url($nSalonID))
		{
			$sSalonSlikaURI = get_the_post_thumbnail_url($nSalonID);
		}
		else 
		{
			$sSalonSlikaURI = get_template_directory_uri() . '/img/no-image.png';
		}

		$sHtml .= '<li class="item col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="item-inner">
		 <div class="item-img">
		   <div class="item-img-info">
			 <a href="'.$sSalonURL.'" title="Retis lapen casen" class="product-image">
				 <img src="'.$sSalonSlikaURI.'" alt="slika_salon" style="object-fit:none; width:100%;">
			 </a>
		   </div>
		 </div>
		 <div class="item-info">
		   <div class="info-inner">
		   <div class="item-title">
				   <h2 href="'.$sSalonURL.'" title="Retis lapen casen" style="mb-5">'.$sSalonNaziv.'</h2>
				   <a href="'.$sSalonURL.'" title="Retis lapen casen">Odmah dostupna vozila</a>
		    </div>
			 <div class="item-content">
			   <div class="item-price">
				 <div class="price-box">
					 <span class="regular-price">
					    
						 <span class="price">Servis: ';
						 		foreach ($dostupnostServisaArray as $dostSer) {
									$dostupnostServisa = $dostSer->name;
								}
						 	$sHtml .=	 $dostupnostServisa;
						 
						 
							 $sHtml .= '
						</span> 
					</span> 
				 </div>
			   </div>
			 </div>
		   </div>
		 </div>
	   </div>
	   </li>';
	}
	$sHtml .= "</ul></div>";
	return $sHtml;
}

function dohvati_zaposlenike($slug, $imeVrste, $nazivSalona = null)
{
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'zaposlenik',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'vrsta_zaposlenika',

				'field' => 'slug',
				'terms' => $slug
			)
		)
	);
	$zaposlenici = get_posts($args);
	$zaposleniciNaSalonu = array();

	$sHtml = '<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">'.$imeVrste.'</h5>
        <div class="row">';
	if($nazivSalona != null) 
	{
		foreach ($zaposlenici as $Zaposlenik) {
			$nZaposlenikID = $Zaposlenik->ID;
			$radniSalon = get_post_meta($nZaposlenikID, 'zaposlenik_salon', true);
			if($radniSalon == $nazivSalona) {
				array_push($zaposleniciNaSalonu,$Zaposlenik);
			}
		}
	}


	if(count($zaposleniciNaSalonu) > 0)
	{
		$zaposlenici = $zaposleniciNaSalonu;
	}
	else if ($nazivSalona != null){
		$zaposlenici = array();
		$sHtml .= "<div class='page-header' style='width: 100%;'>
		<hr style='border-top: 2px black solid'>     
		<h1 style='font-weight: 800; text-align: center;'>".$nazivSalona." - Nema dostupnih prodajnih savjetnika !</h1> 
		<hr style='border-top: 2px black solid'>     
	  </div>";
	}

	foreach ($zaposlenici as $Zaposlenik) {
		$nZaposlenikID = $Zaposlenik->ID;
		$sZaposlenikURL = $Zaposlenik->guid;
		$sZaposlenikNaziv = $Zaposlenik->post_title;
		
		$radniSalon = get_post_meta($nZaposlenikID, 'zaposlenik_salon', true);
		$citatZaposlenika = get_post_meta($nZaposlenikID, 'zaposlenik_citat', true);
		$sZaposlenikSlikaURI  = "";
		if(get_the_post_thumbnail_url($nZaposlenikID))
		{
			$sZaposlenikSlikaURI = get_the_post_thumbnail_url($nZaposlenikID);
		}
		else 
		{
			$sZaposlenikSlikaURI = get_template_directory_uri() . '/img/no-image.png';
		}

		$sHtml .= '<div class="col-xs-12 col-sm-6 col-md-4">
		<div class="image-flip" >
			<div class="mainflip flip-0">
				<div class="frontside">
					<div class="card">
						<div class="card-body text-center">
							<p>
								<img class="img-fluid" src="'.$sZaposlenikSlikaURI.'" alt="card image">
							</p>
							<h4 class="card-title">'.$sZaposlenikNaziv.'</h4>
							<p class="card-text">Radno mjesto: '.$radniSalon.'</p>
							<a href="'.$sZaposlenikURL.'" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Okreni za info</a>

						</div>
					</div>
				</div>
				<div class="backside">
					<div class="card">
						<div class="card-body text-center mt-4">
							<h4 class="card-title">'.$sZaposlenikNaziv.'</h4>
							<p class="card-text">'.$citatZaposlenika.'</p>
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
										<i class="fab fa-facebook"></i>
									</a>
								</li>
								<li class="list-inline-item">
									<a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
										<i class="fab fa-google"></i>
									</a>
								</li>
							</ul>
							<a href="'.$sZaposlenikURL.'" class="social-icon text-xs-center"><i class="fas fa-info fa-5x"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>';
	}
	$sHtml .= "</div></div></section>";
	return $sHtml;
}

function dohvati_zaposlenika($title)
{
	$Zaposlenik = get_page_by_title($title, OBJECT, 'zaposlenik');

	$sHtml = '<div class="employee-parent-body">
	<div class="container">
		<div class="employee-body">
			  <nav aria-label="breadcrumb" class="main-breadcrumb">
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="index.html">Ford Tim</a></li>
				  <li class="breadcrumb-item"><a href="javascript:void(0)">Zaposlenici</a></li>
				  <li class="breadcrumb-item active" aria-current="page">'.$title.'</li>
				</ol>
			  </nav>';
	$nZaposlenikID = $Zaposlenik->ID;
	$sZaposlenikURL = $Zaposlenik->guid;
	$radniSalon = get_post_meta($nZaposlenikID, 'zaposlenik_salon', true);
	$citatZaposlenika = get_post_meta($nZaposlenikID, 'zaposlenik_citat', true);
	$emailZaposlenika = get_post_meta($nZaposlenikID, 'zaposlenik_email', true);
	$uredskiTelefon = get_post_meta($nZaposlenikID, 'zaposlenik_uredskibroj', true);
	$mobilniBroj = get_post_meta($nZaposlenikID, 'zaposlenik_mobilnibroj', true);
	$sZaposlenikSlikaURI  = "";
	if(get_the_post_thumbnail_url($nZaposlenikID))
	{
		$sZaposlenikSlikaURI = get_the_post_thumbnail_url($nZaposlenikID);
	}
	else 
	{
		$sZaposlenikSlikaURI = get_template_directory_uri() . '/img/no-image.png';
	}

	$vrste_zaposlenikaArray = wp_get_post_terms( $nZaposlenikID,  array( 'vrsta_zaposlenika' ));
	$vrstaZaposlenika = '';
	foreach ($vrste_zaposlenikaArray as $vrsta_zaposlenika) {
		$vrstaZaposlenika = $vrsta_zaposlenika->name;
	}
	$sHtml .= '        
	<div class="row gutters-sm">
		<div class="col-xl-4 col-md-12 mb-3">
			<div class="employee-card">
				<div class="employee-card-body">
				<div class="d-flex flex-column align-items-center text-center">
					<img src="'.$sZaposlenikSlikaURI.'" alt="Admin" class="rounded-circle" width="100" height="100">
					<div class="mt-3">
					<h4>'.$title.'</h4>
					<p class="text-secondary mb-1">'.$vrstaZaposlenika.'</p>
					<p class="text-muted font-size-sm">'.$citatZaposlenika.'</p>
					<a class="btn btn-outline-primary" href="mailto: '.$emailZaposlenika.'">Pošalji mail</a>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="col-xl-8 col-md-12 mb-3" >
		<div class="employee-card" style="height: 297px;">
			<div class="employee-card-body">
			<div class="row">
				<div class="col-sm-3">
				<h6 class="mb-0">Puno Ime</h6>
				</div>
				<div class="col-sm-9 text-secondary h6">
				'.$title.'
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3">
				<h6 class="mb-0">Email</h6>
				</div>
				<div class="col-sm-9 text-secondary h6">
				'.$emailZaposlenika.'
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3">
				<h6 class="mb-0">Broj u uredu</h6>
				</div>
				<div class="col-sm-9 text-secondary h6">
				'.$uredskiTelefon.'
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3">
				<h6 class="mb-0">Mobilni kroj</h6>
				</div>
				<div class="col-sm-9 text-secondary h6">
				'.$mobilniBroj.'
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3">
				<h6 class="mb-0">Radi u: </h6>
				</div>
				<div class="col-sm-9 text-secondary h6">
				 '.$radniSalon.'
				</div>
			</div>
			</div>
			</div>
		</div>
	  </div>
	  <div class="row gutters-sm">
			<div class="col-md-12 mb-3">
				<div class="employee-card">
					<div class="employee-card-body">
						<div class="row">
							<h4 class="text-center mb-1" style="width: 100%;">Salon trenutnog Ford zaposlenika</h4>
						</div>
						<hr/>
						<div class="row">
							<div class="col-sm-12">
								<div id="map" style="margin-bottom: 0;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
	  </div>
	  '
	  ;
	$sHtml .= '</div></div></div>';
	dohvati_salone_u_kojem_radi_zaposlenik_ispisi_marker($nZaposlenikID);
	return $sHtml;
}


function dohvati_vozila_po_vrsti($slug)
{
	$args = array(
		'post_type' => 'vozilo',
		'posts_per_page' => -1,
        'order' => 'ASC',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'vrsta_vozila',
				'field' => 'slug',
				'terms' => $slug
			),
			array(
				'taxonomy' => 'dostupnost_vozila',
				'field' => 'slug',
				'terms' => 'reklama'
			)
		)
	);
	$vozila = get_posts($args);

	$sHtml = " <div class='category-products container'>
	<ul class='products-grid row bg-aligned'>";
	foreach ($vozila as $Vozilo) {
		$nVoziloID = $Vozilo->ID;
		$sVoziloURL = $Vozilo->guid;
		$sVoziloNaziv = $Vozilo->post_title;
		
		$cijena = get_post_meta($nVoziloID, 'vozilo_cijena', true);
		if($cijena ==""|| $cijena == 0 || $cijena == NULL) {
			$cijena = "-";
		}
		$sVoziloSlikaURI  = "";
		if(get_the_post_thumbnail_url($nVoziloID))
		{
			$sVoziloSlikaURI = get_the_post_thumbnail_url($nVoziloID);
		}
		else 
		{
			$sVoziloSlikaURI = get_template_directory_uri() . '/img/no-image.png';
		}

		$sHtml .= '<li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
		<div class="item-inner">
		 <div class="item-img">
		   <div class="item-img-info">
			 <a href="'.$sVoziloURL.'" title="Retis lapen casen" class="product-image">
				 <img src="'.$sVoziloSlikaURI.'" alt="slika_vozila">
			 </a>
		   </div>
		 </div>
		 <div class="item-info">
		   <div class="info-inner">
			 <div class="item-title"><a href="'.$sVoziloURL.'" title="Retis lapen casen">'.$sVoziloNaziv.'</a> </div>
			 <div class="item-content">
			   <div class="item-price">
				 <div class="price-box">
					 <span class="regular-price">
						 <span class="price">HRK '.$cijena.'</span> 
					 </span> 
				 </div>
			   </div>
			 </div>
		   </div>
		 </div>
	   </div>
	   </li>';
	}
	$sHtml .= "</ul></div>";
	return $sHtml;
}

function dohvati_vozila_po_salonu($salon)
{
	$args = array(
		'post_type' => 'vozilo',
		'posts_per_page' => -999999,
        'order' => 'ASC',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'dostupnost_vozila',
				'field' => 'slug',
				'terms' => 'dostupan'
			)
		)
	);
	$vozila = get_posts($args);

	global $post;
	$trenutniSalon = $post->post_title;
	$trenutniSalonID = $post->ID;
	$adresaTrenutnogSalona = get_post_meta($trenutniSalonID, 'salon_adresa', true);
	$dostupnostServisa = "Nedostupan";
	$brojSalona = get_post_meta($trenutniSalonID, 'salon_brojsalona', true);
	$brojServisa = get_post_meta($trenutniSalonID, 'salon_brojservisa', true);
	$latSalona = get_post_meta($trenutniSalonID, 'salon_lat', true);
	$lngSalona = get_post_meta($trenutniSalonID, 'salon_lng', true);

	$dostupnostServisaArray = wp_get_post_terms( $trenutniSalonID,  array( 'dostupnost_servisa' ));

	foreach ($dostupnostServisaArray as $dostSer) {
		$dostupnostServisa = $dostSer->name;
	}

	$sHtml = " <div class='category-products container'>
	<div class='page-header'>
	<h1 style='font-weight: 800;'>".$trenutniSalon." - Odmah dostupna vozila</h1> 
	<hr style='border-top: 2px black solid'>     
  </div>
	<ul class='products-grid row bg-aligned'>";
	$brojVozilaUSalonu = 0;
	foreach ($vozila as $Vozilo) {

		$nVoziloID = $Vozilo->ID;
				$sVoziloURL = $Vozilo->guid;
				$sVoziloNaziv = $Vozilo->post_title;
		$saloniTrenutnogVozilaMeta = get_post_meta($nVoziloID, 'vozilo_saloni', true);
		$saloniTrenutnogVozilaArray = explode(', ', $saloniTrenutnogVozilaMeta);

		foreach ($saloniTrenutnogVozilaArray as $salonTrenutnogVozila) {

			if($trenutniSalon == $salonTrenutnogVozila) {
				$brojVozilaUSalonu++;
				$cijena = get_post_meta($nVoziloID, 'vozilo_cijena', true);
				if($cijena ==""|| $cijena == 0 || $cijena == NULL) {
					$cijena = "-";
				}
				$sVoziloSlikaURI  = "";
				if(get_the_post_thumbnail_url($nVoziloID))
				{
					$sVoziloSlikaURI = get_the_post_thumbnail_url($nVoziloID);
				}
				else 
				{
					$sVoziloSlikaURI = get_template_directory_uri() . '/img/no-image.png';
				}
		
				$sHtml .= '<li class="item col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<div class="item-inner">
					<div class="item-img">
					<div class="item-img-info">
						<a href="'.$sVoziloURL.'" title="Retis lapen casen" class="product-image">
							<img src="'.$sVoziloSlikaURI.'" alt="slika_vozila">
						</a>
					</div>
					</div>
					<div class="item-info">
					<div class="info-inner">
						<div class="item-title"><a href="'.$sVoziloURL.'" title="Retis lapen casen">'.$sVoziloNaziv.'</a> </div>
						<div class="item-content">
						<div class="item-price">
							<div class="price-box">
								<span class="regular-price">
									<span class="price">HRK '.$cijena.'</span> 
								</span> 
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>
				</li>';

			}
		}
	}	
	$sHtml .= "</ul></div><div class='employee-parent-body'>
	<div class='container'>
		<div class='employee-body'>
                 
	<div class='row gutters-sm'>
		<div class='col-md-6'>
		   <div class='employee-card mb-3'>
			<div class='employee-card-body' style='height: 347px;'>
			   <div class='row'>
				<div class='col-sm-3'>
				<h6 class='mb-0'>Naziv salona</h6>
				</div>
				<div class='col-sm-9 text-secondary h5'>
				".$trenutniSalon."
				</div>
			   </div>
			    <hr>
			    <div class='row'>
				<div class='col-sm-3'>
				<h6 class='mb-0'>Adresa</h6>
				</div>
				<div class='col-sm-9 text-secondary h5'>
				 $adresaTrenutnogSalona
				</div>
			   </div>
			   <hr>
			   <div class='row'>
				<div class='col-sm-3'>
				<h6 class='mb-0'>Servis</h6>
				</div>
				<div class='col-sm-9 text-secondary h5'>
				$dostupnostServisa
				</div>
			    </div>
			   <hr>
			   <div class='row'>
				<div class='col-sm-3'>
				<h6 class='mb-0'>Broj salona</h6>
				</div>
				<div class='col-sm-9 text-secondary h5'>
				$brojSalona
				</div>
			   </div>
			   <hr>
			   <div class='row'>
				<div class='col-sm-3'>
				<h6 class='mb-0'>Broj servisa</h6>
				</div>
				<div class='col-sm-9 text-secondary h5'>
				$brojServisa
				</div>
			   </div>
			   <hr>
			</div>
		</div>
	</div>
	<div class='col-md-6'>
	<div class='employee-card'>
		       <div class='employee-card-body'>
			  <div class='row'>
		           <h4 class='text-center mb-1' style='width: 100%;'>Pronađite nas na adresi: </h4>
		          </div>
		          <hr/>
			 <div class='row'>
			   <div class='col-sm-12'>
			      <div id='map' style='margin:0;     height: 250px;'></div>
			  </div>
		        </div>
		      </div>
	            </div>
                </div>
            </div>
        </div>
     </div>
  </div>
</div>";
	if($brojVozilaUSalonu > 0) {
		nacrtaj_marker($latSalona,$lngSalona,$trenutniSalon,'#');
		return $sHtml;
	}
	$NemaVozilaSlikaURI = get_template_directory_uri() . '/img/no-items.jpg';;
	if($brojVozilaUSalonu == 0)
	{
		$sHtml = '<section class="content-wrapper" style="background:#ffd83b">
		<div class="container">
		  <div class="std">
			<div class="page-not-found">
			<br>
			  <div><img src="'.$NemaVozilaSlikaURI.'" alt="error image"></div>
			  <h3>Oops! Trenutno nema vozila za prikazati.</h3>
			  <div><a href="'.get_template_directory_uri().'" class="btn-home"><span>Vratite se na početnu stranicu</span></a></div>
			</div>
		  </div>
		</div>
	  </section>';
	  return $sHtml;
	}
}

function dohvati_salone_po_vrsti($slug)
{
	$args = array(
		'post_type' => 'salon',
		'posts_per_page' => -1,
        'order' => 'ASC',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'vrsta_salona',
				'field' => 'slug',
				'terms' => $slug
			)
		)
	);
	$saloni = get_posts($args);

	$sHtml = " <div class='category-products container'>
	<ul class='products-grid row bg-aligned'>";
	foreach ($saloni as $Salon) {
		$nSalonID = $Salon->ID;
		$sSalonURL = $Salon->guid;
		$sSalonNaziv = $Salon->post_title;
		
		$dostupnostServisaArray = wp_get_post_terms( $nSalonID,  array( 'dostupnost_servisa' ));


		if($dostupnostServisa == NULL) {
			 $dostupnostServisa = "-";
		}
		$sSalonSlikaURI  = "";
		if(get_the_post_thumbnail_url($nSalonID))
		{
			$sSalonSlikaURI = get_the_post_thumbnail_url($nSalonID);
		}
		else 
		{
			$sSalonSlikaURI = get_template_directory_uri() . '/img/no-image.png';
		}

		$sHtml .= '<li class="item col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="item-inner">
		 <div class="item-img">
		   <div class="item-img-info">
			 <a href="'.$sSalonURL.'" title="Retis lapen casen" class="product-image">
				 <img src="'.$sSalonSlikaURI.'" alt="slika_salon">
			 </a>
		   </div>
		 </div>
		 <div class="item-info">
		   <div class="info-inner">
		   <div class="item-title">
				   <h2 href="'.$sSalonURL.'" title="Retis lapen casen" style="mb-5">'.$sSalonNaziv.'</h2>
				   <a href="'.$sSalonURL.'" title="Retis lapen casen">Odmah dostupna vozila</a>
		    </div>
			 <div class="item-content">
			   <div class="item-price">
				 <div class="price-box">
					 <span class="regular-price">
					    
						 <span class="price">Servis: ';
						 
						 		foreach ($dostupnostServisaArray as $dostSer) {
			$dostupnostServisa = $dostSer->name;
		}
						 $sHtml .=	 $dostupnostServisa;
						 
						 
						 $sHtml .= '</span> 
					 </span> 
					 
				 </div>
			   </div>
			 </div>
		   </div>
		 </div>
	   </div>
	   </li>';
	}
	$sHtml .= "</ul></div>";
	return $sHtml;
}


  function dohvati_salone_u_kojima_je_reklamno_vozilo_dostupno($trenutnoReklamnoVozilo)
  {
	$args = array(
		'post_type' => 'vozilo',
		'posts_per_page' => -1,
        'order' => 'ASC',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'dostupnost_vozila',
				'field' => 'slug',
				'terms' => 'dostupan'
			)
		)
	);
	$dostupnaVozila = get_posts($args);
	foreach ($dostupnaVozila as $dostupnoVozilo) {
		$nDostupnoVoziloID = $dostupnoVozilo->ID;
		$sDostupnoVoziloURL = $dostupnoVozilo->guid;
		$sDostupnoVoziloNaziv = $dostupnoVozilo->post_title;
		$reklamnoVoziloDostupnogVozila = get_post_meta($nDostupnoVoziloID, 'vozilo_reklamno', true);

		if($reklamnoVoziloDostupnogVozila == $trenutnoReklamnoVozilo)
		{
			$saloniDostupnogVozila = get_post_meta($nDostupnoVoziloID, 'vozilo_saloni', true);
			$saloniDostupnogVozilaArray = explode(', ', $saloniDostupnogVozila);

			foreach ($saloniDostupnogVozilaArray as $salonDostupnogVozila) {
				$salon = get_page_by_title($salonDostupnogVozila, OBJECT, 'salon');
				$nSalonID = $salon->ID;
				$sSalonNaziv = $salon->post_title;
				$sSalonURL = $salon->guid;

				$latSalona = get_post_meta($nSalonID, 'salon_lat', true);
				$lngSalona = get_post_meta($nSalonID, 'salon_lng', true);
				nacrtaj_marker($latSalona, $lngSalona,$sSalonNaziv, $sSalonURL);
			}
		}
	}
  }

  function dohvati_salone_u_kojem_radi_zaposlenik_ispisi_marker($zaposlenikID)
  {
	$args = array(
		'post_type' => 'salon',
		'posts_per_page' => -1,
        'order' => 'ASC',
		'post_status' => 'publish',
	);
	$saloni = get_posts($args);
	$salonZaposlenika = get_post_meta($zaposlenikID, 'zaposlenik_salon', true);
	global $post;
	
	foreach ($saloni as $salon) {
		$sSalonNaziv = $salon->post_title;
		$nSalonID = $salon->ID;
		$sSalogURI = $salon->guid;
		if($sSalonNaziv == $salonZaposlenika)
		{
			$latSalona = get_post_meta($nSalonID, 'salon_lat', true);
			$lngSalona = get_post_meta($nSalonID, 'salon_lng', true);
			nacrtaj_marker($latSalona, $lngSalona,$sSalonNaziv, $sSalogURI);
		}
	}
  }

  function dohvati_single_vozilo($VoziloID)
  {

  }


  function dohvati_single_dostupno_vozilo($VoziloID) 
  {
	$voziloSliderID = get_post_meta($VoziloID, 'vozilo_slider', true);
	$voziloNaziv  = get_the_title( $VoziloID );
	$vrstaVozilaArray = wp_get_post_terms( $VoziloID,  array( 'vrsta_vozila' ));
	$vrstaTrenutnogVozila = "Nedefinirano";
	foreach ($vrstaVozilaArray as $vrstaVozila) {
		$vrstaTrenutnogVozila = $vrstaVozila->name;
	}
	$DostupnostVozilaArray = wp_get_post_terms( $VoziloID,  array( 'dostupnost_vozila' ));
	$DostupnostTrenutnogVozila = "Nedefinirano";
	foreach ($DostupnostVozilaArray as $DostupnostVozila) {
		$DostupnostTrenutnogVozila = $DostupnostVozila->name;
	}
	$AgregatVozilaArray = wp_get_post_terms( $VoziloID,  array( 'motor_vozila' ));
	$AgregatTrenutnogVozila = "Nedefinirano";
	foreach ($AgregatVozilaArray as $AgregatVozila) {
		$AgregatTrenutnogVozila = $AgregatVozila->name;
	}
	$BojaVozilaArray = wp_get_post_terms( $VoziloID,  array( 'boja_vozila' ));
	$BojaTrenutnogVozila = "Nedefinirano";
	foreach ($BojaVozilaArray as $BojaVozila) {
		$BojaTrenutnogVozila = $BojaVozila->name;
	}
	$cijenaVozila = get_post_meta($VoziloID, 'vozilo_cijena', true);
	$reklamnoVozilo = get_post_meta($VoziloID, 'vozilo_reklamno', true);
	$sHtml = do_shortcode('[smartslider3 slider="'.$voziloSliderID.'"]');
	$sHtml .= ' <div class="employee-parent-body">
		<div class="container">
			<div class="employee-body">
					
		<div class="row gutters-sm">
			<div class="col-md-6">
			<div class="employee-card mb-3">
				<div class="employee-card-body">
				<div class="row">
					<div class="col-sm-3">
					<h6 class="mb-0">Model</h6>
					</div>
					<div class="col-sm-9 text-secondary h6">
						'.$voziloNaziv.'
					</div>
				</div>
					<hr>
					<div class="row">
					<div class="col-sm-3">
					<h6 class="mb-0">Vrsta</h6>
					</div>
					<div class="col-sm-9 text-secondary h6">
						'.$vrstaTrenutnogVozila.'
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-3">
					<h6 class="mb-0">Dostupnost</h6>
					</div>
					<div class="col-sm-9 text-secondary h6">
						'.$DostupnostTrenutnogVozila.'
					</div>
					</div>
				<hr>
				<div class="row">
					<div class="col-sm-3">
					<h6 class="mb-0">Pogonski agregat</h6>
					</div>
					<div class="col-sm-9 text-secondary h6">
					'.$AgregatTrenutnogVozila.'
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-3">
					<h6 class="mb-0">Boja</h6>
					</div>
					<div class="col-sm-9 text-secondary h6">
						'.$BojaTrenutnogVozila.'
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-3">
					<h6 class="mb-0">Cijena</h6>
					</div>
					<div class="col-sm-9 text-secondary h6">
					'.$cijenaVozila.' HRK
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-3">
					<h6 class="mb-0">Reklamno vozilo</h6>
					</div>
					<div class="col-sm-9 text-secondary h6">
					 '.$reklamnoVozilo.'
					</div>
				</div>
				<hr/>
				</div>
					</div>
				</div>
				<div class="col-md-6">
				<div class="employee-card">
				<div class="employee-card-body">
				<div class="row">
					<h4 class="text-center mb-1" style="width: 100%;">Dostupno u salonima: </h4>
					</div>
					<hr/>
				<div class="row">
				<div class="col-sm-12">
					<div id="map" style="margin:0; height: 375px;"></div>
				</div>
					</div>
				</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	';
	
	return $sHtml; 
  }


  
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