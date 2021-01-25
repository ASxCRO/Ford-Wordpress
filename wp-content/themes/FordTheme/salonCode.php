<?php
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

//METHODS
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

?>