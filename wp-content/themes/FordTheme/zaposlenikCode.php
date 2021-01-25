<?php
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

//METHODS

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
?>