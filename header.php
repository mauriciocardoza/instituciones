<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
	<?php 
		wp_head(); 
		$logo_institucion = myprefix_get_theme_option( 'input_logo' );
		if($logo_institucion == ''){
			$logo_institucion_msj="Colocar link del logo en los datos de la institución!..";
		}
		$portal_transparencia = myprefix_get_theme_option( 'input_portal' );
		$buscador = myprefix_get_theme_option( 'input_buscador' );
		

	?>
    <title><?php get_bloginfo('name');?></title>
    
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>
<header>
<!-- Main container -->
<div class="page-container">

<?php if ( wp_is_mobile() ) {?>
	<div class="bloc none full-width-bloc l-bloc " id="bloc-head">
	<div class="container head-conf bloc-sm">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2">
			<div class="img-fluid mg-sm float-lg-none pad-icons-head">
				<?php  #echo do_shortcode('[gtranslate]'); ?>
			</div>
				<!-- <img src="img/bandp.png" class="img-fluid img-1-style mg-sm float-lg-none pad-icons-head" alt="1" /> -->				
				<!--<img src="<?php bloginfo('stylesheet_directory'); ?>/img/xl.png" class="img-fluid img-bloc-head-style float-lg-none d-block mg-sm" alt="transp large" /><a href="https://www.transparencia.gob.sv" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/png4xportalp.png" class="img-fluid img-recurso-2-style float-lg-none pad-icons-head" alt="Recurso%202" /></a><img src="<?php bloginfo('stylesheet_directory'); ?>/img/xl.png" class="img-fluid mx-auto img-transp-lar-style d-block mg-sm" alt="transp large" /><a href="http://instituciones.gob.sv/" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/minis.svg" class="img-fluid img-3-style float-lg-none mg-md pad-icons-head" alt="Recurso%201" /></a> -->
			</div>
			<div class="col-sm-8 col-lg-8 logo-separador">
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo $logo_institucion; ?>" class="img-fluid mx-auto d-block img-logo-mag-style animated fadeIn" alt="LOGO INSTITUCIONAL" id="logo-institucion" data-appear-anim-style="fadeIn" /><?php echo $logo_institucion_msj;?></a>
			</div>						
			<div class="buscador"><a href="<?php echo $buscador;?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lupa.png" class="img-fluid img-recurso-2-style float-lg-none pad-icons-head" alt="Recurso%202" /> </a></div>			
		</div>
	</div>
</div>




			<?php
			}
			else{ ?>	
<!-- bloc-head -->
<div class="bloc none full-width-bloc l-bloc " id="bloc-head">
	<div class="container head-conf bloc-sm">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2">
			
				<!-- <img src="img/bandp.png" class="img-fluid img-1-style mg-sm float-lg-none pad-icons-head" alt="1" /> -->				
				<!--<img src="<?php bloginfo('stylesheet_directory'); ?>/img/xl.png" class="img-fluid img-bloc-head-style float-lg-none d-block mg-sm" alt="transp large" /><a href="https://www.transparencia.gob.sv" target="_blank">Portal de <br>Transparencia</a><img src="<?php bloginfo('stylesheet_directory'); ?>/img/xl.png" class="img-fluid mx-auto img-transp-lar-style d-block mg-sm" alt="transp large" /><a href="<?php echo bloginfo('template_directory'); ?>/ministerios.php" target="_blank">MINISTERIOS</a> -->
				<img src="<?php bloginfo('stylesheet_directory'); ?>/img/xl.png" class="img-fluid img-bloc-head-style float-lg-none d-block mg-sm" alt="transp large" /><a href="<?php echo $portal_transparencia;?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lupa.png" class="img-fluid img-recurso-2-style float-lg-none pad-icons-head" alt="Recurso%202" />Portal de <br>Transparencia</a><img src="<?php bloginfo('stylesheet_directory'); ?>/img/xl.png" class="img-fluid mx-auto img-transp-lar-style d-block mg-sm" alt="transp large" /><a href="<?php echo bloginfo('template_directory'); ?>/ministerios.php" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/Instituciones.svg" class="img-fluid img-3-style float-lg-none pad-icons-head img-inst" alt="Recurso%201" /> INSTITUCIONES</a> 				
				
			</div>			
			<div class="col-sm-8 col-lg-8 logo-separador">
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo $logo_institucion; ?>" class="img-fluid mx-auto d-block img-logo-mag-style animated fadeIn" alt="LOGO INSTITUCIONAL" id="logo-institucion" data-appear-anim-style="fadeIn" /><?php echo $logo_institucion_msj;?></a>								
			</div>						
			<div class="buscador"><?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?></div>
			<div class="traductor"><?php echo do_shortcode('[gtranslate]'); ?></div>
		</div>
	</div>
</div>
<!-- bloc-head END -->
<?php
}?>


<!-- bloc-1 -->
<div class="bloc full-width-bloc l-bloc" id="bloc-1">
	<div class="container bloc-sm row-blocs shadow-n">
		<div class="row">
			<div class="col">
				<nav class="navbar row navbar-expand-md flex-column navbar-dark" role="navigation">
					<button id="nav-toggle" type="button" class="ui-navbar-toggler navbar-toggler border-0 p-0 toggle-ub-config" data-toggle="collapse" data-target=".navbar-43351" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
						if ( wp_is_mobile() ) {
							wp_nav_menu (array(
								'theme_location' => 'menu-movil',
								'container' => 'div',
								'container_class' => 'collapse navbar-collapse navbar-43351  sidebar-nav nav-item nav-separador',
								'menu_class' => 'site-navigation nav navbar-nav mx-auto justify-content-center ',
								'walker' 
								=> new Child_Wrap()														
							));
							
						}
						else{
						
                        wp_nav_menu (array(
							'theme_location' => 'menu-principal',
							'container' => 'div',
							'container_class' => 'collapse navbar-collapse navbar-43351  sidebar-nav nav-item nav-separador',
							'menu_class' => 'site-navigation nav navbar-nav mx-auto justify-content-center ',
							'walker' 
							=> new Child_Wrap()														
						));
						
					}
                    ?>					
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- bloc-1 END -->
</header>