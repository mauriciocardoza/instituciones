<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Consultas reutilizables
 */

// require get_template_directory().'/inc/queries.php';

/**
 * Menus de instituciones
 * 
 */

 function instituciones_menu(){
     register_nav_menus( array(
        'menu-principal' => __( 'Menú Principal',"Instituciones" )
	 ));
	 
	 register_nav_menus( array(
        'menu-movil' => __( 'Menú Móvil',"Instituciones" )
     ));
 }

 add_action( 'init', 'instituciones_menu' );

 class Child_Wrap extends Walker_Nav_Menu{
	 
    function start_lvl(&$output, $depth = 0, $args = array()){
		$indent = str_repeat("\t", $depth);		
        $output .= "<div class='dropdown btn-dropdown'><a href='#' class='dropdown-toggle nav-link' data-toggle='dropdown' aria-expanded='false'>$indent</a><ul class=\"dropdown-menu\" role=\"menu\">";
    }

    function end_lvl(&$output, $depth = 0, $args = array()){
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>";
    }
}

/** Botones categorias principales para el index */
function CreateCategory(){
	$avisos = array('cat_name' => 'Avisos', 
		'category_description' => '—',
		 'category_nicename' => 'avisos',
		  'category_parent' => '');

	$noticias = array('cat_name' => 'Noticias', 
		'category_description' => '—',
		 'category_nicename' => 'noticias',
		  'category_parent' => '');		  

	$carrusel = array('cat_name' => 'Carrusel Principal', 
		  'category_description' => 'Contiene entradas de el carrusel superio',
		   'category_nicename' => 'carrusel-principal',
			'category_parent' => '');		  					
	// Creando categorias para entradas 
	wp_insert_category($avisos);
	wp_insert_category($noticias);
	wp_insert_category($carrusel);	
}
	add_action('admin_init','CreateCategory');


/** Botones paginación */

function instituciones_botones_paginador(){
	return 'class="ltc-isabelline"';	
}
add_filter( 'next_posts_link_attributes', 'instituciones_botones_paginador' );
add_filter( 'previous_posts_link_attributes', 'instituciones_botones_paginador' );


/** Deficicion de extracto  */
/*
function wpdocs_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( 'Leer más...', 'textdomain' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

*/

add_action('the_excerpt','add_class_to_excerpt');
function add_class_to_excerpt( $excerpt ){
    return '<div class="parrafos-blancos-letranegra">'.$excerpt.'</div>';
}

/**
 * 
 * Scripts y Styles
 *
 */

function instituciones_scripts_styles(){

	
	//Dependencias estilos
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css?6593', array(), '4.2.1');
	wp_enqueue_style('animate', get_template_directory_uri().'/css/animate.css?438', array(), '3.7.0');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), '4.7.0');
	wp_enqueue_style('feather', get_template_directory_uri().'/css/feather.min.css', array(), '1.0.0');
	wp_enqueue_style('ionicons', get_template_directory_uri().'/css/ionicons.min.css', array(), '2.0.0');	
	// Hoja de estilos principal
	wp_enqueue_style( 'style', get_stylesheet_uri().'?4511', array('bootstrap','animate','font-awesome','feather','ionicons'), '1.0.0');
	
	// Scripts
}

add_action( 'wp_enqueue_scripts', 'instituciones_scripts_styles');


add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size();


/**
 * Create A Simple Theme Options Panel
 *
 */

/** DATOS DE LA INSTITUCION */
add_action("nuevo", "setup_theme_admin_menus");
// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Datos de la Institución', 'text-domain' ),
				esc_html__( 'Datos de la Institución', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Checkbox
				if ( ! empty( $options['checkbox_example'] ) ) {
					$options['checkbox_example'] = 'on';
				} else {
					unset( $options['checkbox_example'] ); // Remove from options if not checked
				}

				// Input
				if ( ! empty( $options['input_example'] ) ) {
					$options['input_example'] = sanitize_text_field( $options['input_example'] );
				} else {
					unset( $options['input_example'] ); // Remove from options if empty
				}

				// Select
				if ( ! empty( $options['select_example'] ) ) {
					$options['select_example'] = sanitize_text_field( $options['select_example'] );
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Datos generales de la Institución', 'text-domain' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>

					<table class="form-table wpex-custom-admin-login-table">

						
						<?php // Text input example ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Logo de la instituci&oacute;n', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_logo' ); ?>
								<input type="text" name="theme_options[input_logo]" value="<?php echo esc_attr( $value ); ?>" size='70'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'URL Portal de Transparencia', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_portal' ); ?>
								<input type="text" name="theme_options[input_portal]" value="<?php echo esc_attr( $value ); ?>" size='70'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'URL Buscador', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_buscador' ); ?>
								<input type="text" name="theme_options[input_buscador]" value="<?php echo esc_attr( $value ); ?>" size='70'>
							</td>
						</tr>


						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Nombre de la instituci&oacute;n', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_example' ); ?>
								<input type="text" name="theme_options[input_example]" value="<?php echo esc_attr( $value ); ?>" size='70'>
							</td>
						</tr>
                                                
                         <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Direcci&oacute;n de la instituci&oacute;n', 'text-domain' ); ?></th>
							<td>     
								<?php $value = self::get_theme_option( 'introtext' ); ?>
								<textarea id="theme_options[introtext]"
								class="large-text" cols="50" rows="10" name="theme_options[introtext]"><?php echo esc_attr( $value); ?></textarea>
							</td>
						</tr>
                                                                                                                                                
                        <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Tel&eacute;fono de contacto', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'phone_number' ); ?>
								<input type="text" name="theme_options[phone_number]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
                                                                                                
                        <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Correo electr&oacute;nico', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'inst_email' ); ?>
								<input type="text" name="theme_options[inst_email]" value="<?php echo esc_attr( $value ); ?>" size='35'>
							</td>
						</tr>                                                                                                                                             

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'URL de Twitter', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'tw_url' ); ?>
								<input type="text" name="theme_options[tw_url]" value="<?php echo esc_attr( $value ); ?>" size='50'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'URL de Facebook', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'fb_url' ); ?>
								<input type="text" name="theme_options[fb_url]" value="<?php echo esc_attr( $value ); ?>" size='50'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'URL de Instagram', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'ig_url' ); ?>
								<input type="text" name="theme_options[ig_url]" value="<?php echo esc_attr( $value ); ?>" size='50'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'URL de YouTube', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'yt_url' ); ?>
								<input type="text" name="theme_options[yt_url]" value="<?php echo esc_attr( $value ); ?>" size='50'>
							</td>
						</tr>

						
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Videos', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'videos' ); ?>
								<input type="text" name="theme_options[videos]" value="<?php echo esc_attr( $value ); ?>" size='75'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Calendario', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'calendario' ); ?>
								<input type="text" name="theme_options[calendario]" value="<?php echo esc_attr( $value ); ?>" size='75'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Descargas', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'descargas' ); ?>
								<input type="text" name="theme_options[descargas]" value="<?php echo esc_attr( $value ); ?>" size='75'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Mapa del Sitio', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'mapasitio' ); ?>
								<input type="text" name="theme_options[mapasitio]" value="<?php echo esc_attr( $value ); ?>" size='75'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Politica Web', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'politicaweb' ); ?>
								<input type="text" name="theme_options[politicaweb]" value="<?php echo esc_attr( $value ); ?>" size='75'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Preguntas Frecuentres', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'preguntas' ); ?>
								<input type="text" name="theme_options[preguntas]" value="<?php echo esc_attr( $value ); ?>" size='75'>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Carta de Derecho', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'cartaderecho' ); ?>
								<input type="text" name="theme_options[cartaderecho]" value="<?php echo esc_attr( $value ); ?>" size='75'>
							</td>
						</tr>

						<?php // Select example ?>
						<!-- <tr valign="top" class="wpex-custom-admin-screen-background-section">
							<th scope="row"><?php esc_html_e( 'Select Example', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'select_example' ); ?>
								<select name="theme_options[select_example]">
									<?php
									$options = array(
										'1' => esc_html__( 'Option 1', 'text-domain' ),
										'2' => esc_html__( 'Option 2', 'text-domain' ),
										'3' => esc_html__( 'Option 3', 'text-domain' ),
									);
									foreach ( $options as $id => $label ) { ?>
										<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $value, $id, true ); ?>>
											<?php echo strip_tags( $label ); ?>
										</option>
									<?php } ?>
								</select>
							</td>
						</tr> -->
					</table>
					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new WPEX_Theme_Options();

// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option( $id = '' ) {
	return WPEX_Theme_Options::get_theme_option( $id );
}


 
 ?>