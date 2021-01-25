<?php
//registriraj vozilo cpt
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
	wp_nonce_field('spremi_vozilo_para_one', 'vozilo_para_one_nonce');
	wp_nonce_field('spremi_vozilo_para_two', 'vozilo_para_two_nonce');
	//dohvaćanje meta vrijednosti
	$vozilo_cijena = get_post_meta($post->ID, 'vozilo_cijena', true);
	$vozilo_saloni = get_post_meta($post->ID, 'vozilo_saloni', true);
	$vozilo_reklamno = get_post_meta($post->ID, 'vozilo_reklamno', true);
	$vozilo_slider = get_post_meta($post->ID, 'vozilo_slider', true);
	$vozilo_para_one = get_post_meta($post->ID, 'vozilo_para_one', true);
	$vozilo_para_two = get_post_meta($post->ID, 'vozilo_para_two', true);

	echo '
	<div>
		<div>
			<label for="vozilo_para_one">Prvi reklamni paragraf: </label>
			<input type="text" id="vozilo_para_one"
			name="vozilo_para_one" style="width:100%;" value="' . $vozilo_para_one . '" />
		</div>
		<div>
			<label for="vozilo_para_two">Drugi reklamni paragraf: </label>
			<input type="text" id="vozilo_para_two"
			name="vozilo_para_two" style="width:100%;" value="' . $vozilo_para_two . '" />
		</div>
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
	$is_valid_nonce_vozilo_para_one = (isset($_POST['vozilo_para_one_nonce']) && wp_verify_nonce(
		$_POST['vozilo_para_one_nonce'],
		basename(__FILE__)
	)) ? 'true' : 'false';
	$is_valid_nonce_vozilo_para_two = (isset($_POST['vozilo_para_two_nonce']) && wp_verify_nonce(
		$_POST['vozilo_para_two_nonce'],
		basename(__FILE__)
	)) ? 'true' : 'false';
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
		$is_autosave || $is_revision || !$is_valid_nonce_vozilo_saloni || !$is_valid_nonce_vozilo_cijena || !$is_valid_nonce_vozilo_reklamno|| !$is_valid_nonce_vozilo_slider ||!$is_valid_nonce_vozilo_para_one|| !$is_valid_nonce_vozilo_para_one
	) {
		return;
	}
	if (!empty($_POST['vozilo_para_one'])) {
		update_post_meta(
			$post_id,
			'vozilo_para_one',
			$_POST['vozilo_para_one']
		);
	} else {
		delete_post_meta($post_id, 'vozilo_para_one');
	}
	if (!empty($_POST['vozilo_para_two'])) {
		update_post_meta(
			$post_id,
			'vozilo_para_two',
			$_POST['vozilo_para_two']
		);
	} else {
		delete_post_meta($post_id, 'vozilo_para_two');
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

//METHODS
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
									Cijena <span class="price">'.$cijena.' </span> HRK
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
                   <span class="price">'.$cijenaVozila.'</span> HRK
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
?>