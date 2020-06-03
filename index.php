<?php get_header();?>


<!-- bloc-1 -->
<div class="bloc full-width-bloc l-bloc" id="bloc-1">
	<div class="container ">
		<div class="row voffset-clear-xs no-gutters">
			<div class="col-12 l-bloc">
				<div class="text-center">
					<div id="carrusel-principal" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators hide-indicators">
							<li data-target="#carrusel-principal" data-slide-to="0" class="active">
							</li>
							<li data-target="#carrusel-principal" data-slide-to="1">
							</li>
							<li data-target="#carrusel-principal" data-slide-to="2">
							</li>
						</ol>
						<div class="carousel-inner" role="listbox">
						<?php
							$args = array(
								'post_type'=> 'post',
								'orderby'    => 'ID',
								'category_name'    => 'Carrusel Principal',
								'post_status' => 'publish',
								'order'    => 'DESC',
								'posts_per_page' => 3 
							);
							$result = new WP_Query( $args );
							if ( $result-> have_posts() ){
								$i = 0;								
								$class = '';
								while ( $result->have_posts() ) : $result->the_post();
								
									$image_carrusel = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), array( 1200, 400 ) )[0];									
									if ($i == 0)
									{
										$class = 'active';
									}
									else
									{
										$class = '';
									}
							?>

							<div class="carousel-item gradiente <?php echo $class;?>">
								<img class="d-inline-block w-100" alt="slide 1" src="<?php echo $image_carrusel;?>"/>
								<div class="carousel-caption">								
									<?php echo get_the_excerpt();?>
								</div>
							</div>							
							<?php
								$i++;
								endwhile;
							}
							?>
						</div><a class="carousel-nav-controls carousel-control-prev" href="#carrusel-principal" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span><span class="sr-only">Previous</span></a><a class="carousel-nav-controls carousel-control-next" href="#carrusel-principal" role="button" data-slide="next"><span class="fa fa-chevron-right"></span><span class="sr-only">Next</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-1 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->

<!-- avisos-panel -->
<?php
    // Get the ID of a given category
    $category_id = get_cat_ID( 'Avisos' );
 
    // Get the URL of this category
    $category_link = get_category_link( $category_id );
?>
<div class="bloc none full-width-bloc l-bloc" id="avisos-panel">
	<div class="container shadow-index bloc-sm">
		<div class="row">
			<div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
				<a href="<?php echo esc_url( $category_link ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lazyload-ph.png" data-src="<?php bloginfo('stylesheet_directory'); ?>/img/icono%20avisos.png" class="img-fluid mx-auto d-block img-icono-avisos-style swing-hvr animated puffIn lazyload" alt="icono%20avisos" id="avisos-icon" data-appear-anim-style="puffIn" /></a>
			</div>
		</div>
	</div>
</div>
<!-- avisos-panel END -->

<script>
function myFunction() {
					
var elements = document.getElementsByClassName('myDIV'), elLength = elements.length;
for (var i = 0; i < elLength; i++) {
	if (elements.item(i).style.display === "block") {
	
	elements.item(i).style.display = "none";
	
  } else {
	
    elements.item(i).style.display = "none";
  }

};
  
}
</script>
<!-- galeria1 -->
<div class="bloc none full-width-bloc l-bloc" id="galeria1">
	<div class="container none">
		<div class="row voffset-clear-xs no-gutters">
		<?php
			$args = array(
				'post_type'=> 'post',
				'orderby'    => 'ID',
				'category_name'    => 'Avisos',
				'post_status' => 'publish',
				'order'    => 'DESC',
				'posts_per_page' => 6,				
			);
			$result = new WP_Query( $args );
			if ( $result-> have_posts() ){
				$i = 0;
				$class = '';
				while ( $result->have_posts() ) : $result->the_post();
				
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), 'single-post-thumbnail' );					
					$thumbnail_details = get_posts(array('p' => get_post_thumbnail_id( $result->ID ), 'post_type' => 'attachment'));
					$titulo =  $thumbnail_details[0]->post_title;
					$leyenda = $thumbnail_details[0]->post_excerpt;
					if ($i == 0)
					{
						$class = 'active';
					}
					else
					{
						$class = '';
					}
					if($i < 3){
			?>
			<div class="col-3 col-4" onclick="myFunction()">
				<a href="<?php echo bloginfo('template_directory'); ?>/#" data-toggle-visibility="bloc-<?php the_ID();?>" class="gradiente"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lazyload-ph.png" data-src="<?php echo $image[0]; ?>" class="img-fluid mx-auto d-block lazyload" alt="placeholder image" id="avisos-img1" /><div class="carousel-caption"><?php echo $titulo;?></div></a>				
			</div>
			<?php
			}
				$i++;
				endwhile;
			}
			?>			
		</div>
	</div>
</div>
<!-- galeria1 END -->


<!-- VIEW POST AVISO -->
<?php
$args = array(
	'post_type'=> 'post',
	'orderby'    => 'ID',
	'category_name'    => 'Avisos',
	'post_status' => 'publish',
	'order'    => 'DESC',
	'posts_per_page' => 6	
);
$result = new WP_Query( $args );
if ( $result-> have_posts() ){
	$i = 0;
	$class = '';
	while ( $result->have_posts() ) : $result->the_post();
		$image_aviso = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), 'single-post-thumbnail' );	
		if( class_exists('Dynamic_Featured_Image') ) {
			global $dynamic_featured_image;
			$featured_images = $dynamic_featured_image->get_featured_images( $postId );
		}
		
		if($featured_images[0]['full'] == ''){$image_aviso=$image_aviso[0];}
		else{$image_aviso=$featured_images[0]['full'];}
	if($i < 3){		
?>		
<!-- bloc-img1-avisos -->
<div class="bloc object-hidden full-width-bloc l-bloc myDIV" id="bloc-<?php the_ID();?>"> 
	<div class="container bloc-sm">
		<div class="row no-gutters">
			<div class="col-12">
				<div class="text-center">
					<div id="<?php the_ID();?>" class="carousel slide carousel-4-style" data-ride="carousel" data-interval="false">
						<ol class="carousel-indicators hide-indicators">
							<li data-target="#<?php the_ID();?>" data-slide-to="0" class="active">
							</li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img class="d-inline-block w-100 " alt="slide 1" src="<?php echo $image_aviso; ?>" />
								<div class="carousel-caption">
								</div>
							</div>
						</div><a class="carousel-nav-controls carousel-control-prev object-hidden" href="#<?php the_ID();?>" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span><span class="sr-only">Previous</span></a><a class="carousel-nav-controls carousel-control-next object-hidden" href="#<?php the_ID();?>" role="button" data-slide="next"><span class="fa fa-chevron-right"></span><span class="sr-only">Next</span></a>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-10 offset-lg-1">
				<div class="row row-style">
					<div class="col-lg-3">
						<h4 class="mg-md tab-mg-md grids-index animDelay1 animated fadeInUp" id="tab-text1" data-appear-anim-style="fadeInUp">
							<?php the_title();?>
						</h4>
					</div>
					<div class="col-lg-12">
						<div class="text-center">
							<div class="text-center margen-boton">
								<a href="<?php echo bloginfo('template_directory'); ?>/#" data-toggle-visibility="bloc-<?php the_ID();?>"><span class="feather-icon icon-circle-cross icon-md icon-azure" data-placement="top" data-toggle="tooltip" title="cerrar"></span></a>
							</div>
						</div>
					</div>
				</div>
				<p class="mg-lg pad-show-bloc" id="parrafo1-avisos">
					<?php echo get_the_excerpt();?>
				</p><a href="<?php the_permalink();?>" class="btn btn-lg pad-show-bloc btn-d">Leer más...</a>
				<div class="row">
					<div class="col">
						<?php
							// Get the ID of a given category
							$category_id = get_cat_ID( 'Avisos' );
						
							// Get the URL of this category
							$category_link = get_category_link( $category_id );
						?>
						<div class="text-center">
							<label class="label-mas-noticias-style text-lg-center mg-clear">
								Mas Avisos<br>
							</label><a href="<?php echo $category_link; ?>" rel="nofollow"><span class="fa fa-angle-down icon-lg icon-azure" data-placement="top" data-toggle="tooltip" title="Mas avisos"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-img1-avisos END -->
<?php 
	}
$i++;
	endwhile;
}
?>

<!-- galeria1 -->
<div class="bloc none full-width-bloc l-bloc" id="galeria1">
	<div class="container none">
		<div class="row voffset-clear-xs no-gutters">
		<?php
			$args = array(
				'post_type'=> 'post',
				'orderby'    => 'ID',
				'category_name'    => 'Avisos',
				'post_status' => 'publish',
				'order'    => 'DESC',
				'posts_per_page' => 6,				
			);
			$result = new WP_Query( $args );
			if ( $result-> have_posts() ){
				$i = 0;
				$class = '';
				while ( $result->have_posts() ) : $result->the_post();
				
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), 'single-post-thumbnail' );
					$thumbnail_details = get_posts(array('p' => get_post_thumbnail_id( $result->ID ), 'post_type' => 'attachment'));
					$titulo =  $thumbnail_details[0]->post_title;
					$leyenda = $thumbnail_details[0]->post_excerpt;
					if ($i == 0)
					{
						$class = 'active';
					}
					else
					{
						$class = '';
					}
				if($i >=3){
			?>
			<div class="col-3 col-4" onclick="myFunction()">
				<a href="<?php echo bloginfo('template_directory'); ?>/#" data-toggle-visibility="bloc-<?php the_ID();?>" class="gradiente"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lazyload-ph.png" data-src="<?php echo $image[0]; ?>" class="img-fluid mx-auto d-block lazyload" alt="placeholder image" id="avisos-img1" /><div class="carousel-caption"><?php echo $titulo;?></div></a>				
			</div>
			<?php
				}
				$i++;
				endwhile;
			}
			?>			
		</div>
	</div>
</div>
<!-- galeria1 END -->

<!-- VIEW POST AVISO -->
<?php
$args = array(
	'post_type'=> 'post',
	'orderby'    => 'ID',
	'category_name'    => 'Avisos',
	'post_status' => 'publish',
	'order'    => 'DESC',
	'posts_per_page' => 6	
);
$result = new WP_Query( $args );
if ( $result-> have_posts() ){
	$i = 0;
	$class = '';
	while ( $result->have_posts() ) : $result->the_post();
		$image_aviso = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), 'single-post-thumbnail' );		
		if( class_exists('Dynamic_Featured_Image') ) {
			global $dynamic_featured_image;
			$featured_images = $dynamic_featured_image->get_featured_images( $postId );
		}
		
		if($featured_images[0]['full'] == ''){$image_aviso=$image_aviso[0];}
		else{$image_aviso=$featured_images[0]['full'];}

	if($i >= 3){
?>		
<!-- bloc-img1-avisos -->
<div class="bloc object-hidden full-width-bloc l-bloc myDIV" id="bloc-<?php the_ID();?>">
	<div class="container bloc-sm">
		<div class="row no-gutters">
			<div class="col-12">
				<div class="text-center">
					<div id="<?php the_ID();?>" class="carousel slide carousel-4-style" data-ride="carousel" data-interval="false">
						<ol class="carousel-indicators hide-indicators">
							<li data-target="#<?php the_ID();?>" data-slide-to="0" class="active">
							</li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img class="d-inline-block w-100" alt="slide 1" src="<?php echo $image_aviso; ?>" />
								<div class="carousel-caption">
								</div>
							</div>
						</div><a class="carousel-nav-controls carousel-control-prev object-hidden" href="#<?php the_ID();?>" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span><span class="sr-only">Previous</span></a><a class="carousel-nav-controls carousel-control-next object-hidden" href="#<?php the_ID();?>" role="button" data-slide="next"><span class="fa fa-chevron-right"></span><span class="sr-only">Next</span></a>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-10 offset-lg-1">
				<div class="row row-style">
					<div class="col-lg-3">
						<h4 class="mg-md tab-mg-md grids-index animDelay1 animated fadeInUp" id="tab-text1" data-appear-anim-style="fadeInUp">
							<?php the_title();?>
						</h4>
					</div>
					<div class="col-lg-12">
						<div class="text-center">
							<div class="text-center margen-boton">
								<a href="<?php echo bloginfo('template_directory'); ?>/#" data-toggle-visibility="bloc-<?php the_ID();?>"><span class="feather-icon icon-circle-cross icon-md icon-azure" data-placement="top" data-toggle="tooltip" title="cerrar"></span></a>
							</div>
						</div>
					</div>
				</div>
				<p class="mg-lg pad-show-bloc" id="parrafo1-avisos">
					<?php echo get_the_excerpt();?>
				</p><a href="<?php the_permalink();?>" class="btn btn-lg pad-show-bloc btn-d">Leer más...</a>
				<div class="row">
					<div class="col">
						<?php
							// Get the ID of a given category
							$category_id = get_cat_ID( 'Avisos' );
						
							// Get the URL of this category
							$category_link = get_category_link( $category_id );
						?>
						<div class="text-center">
							<label class="label-mas-noticias-style text-lg-center mg-clear">
								Mas Avisos<br>
							</label><a href="<?php echo $category_link; ?>" rel="nofollow"><span class="fa fa-angle-down icon-lg icon-azure" data-placement="top" data-toggle="tooltip" title="Mas avisos"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-img1-avisos END -->
<?php 
	}
$i++;
	endwhile;
}
?>


<!-- bloc-4 -->
<?php
    // Get the ID of a given category
    $category_id = get_cat_ID( 'Noticias' );
 
    // Get the URL of this category
    $category_link = get_category_link( $category_id );
?> 
<div class="bloc none full-width-bloc l-bloc" id="bloc-4">
	<div class="container shadow-index bloc-sm">
		<div class="row">
			<div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
				<a href="<?php echo esc_url( $category_link); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lazyload-ph.png" data-src="<?php bloginfo('stylesheet_directory'); ?>/img/icono%20noticias.png" class="img-fluid mx-auto d-block img-icono-noticias-style pulse-hvr animated puffIn lazyload" alt="icono%20noticias" id="noticias-icon" data-appear-anim-style="puffIn" /></a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-4 END -->



<!-- galeria1 -->
<div class="bloc none full-width-bloc l-bloc" id="galeria1">
	<div class="container none">
		<div class="row voffset-clear-xs no-gutters">
		<?php
			$args = array(
				'post_type'=> 'post',
				'orderby'    => 'ID',
				'category_name'    => 'Noticias',
				'post_status' => 'publish',
				'order'    => 'DESC',
				'posts_per_page' => 6,				
			);
			$result = new WP_Query( $args );
			if ( $result-> have_posts() ){
				$i = 0;
				$class = '';
				while ( $result->have_posts() ) : $result->the_post();
				
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), 'single-post-thumbnail' );
					$thumbnail_details = get_posts(array('p' => get_post_thumbnail_id( $result->ID ), 'post_type' => 'attachment'));
					$titulo =  $thumbnail_details[0]->post_title;
					$leyenda = $thumbnail_details[0]->post_excerpt;
					if ($i == 0)
					{
						$class = 'active';
					}
					else
					{
						$class = '';
					}
					if($i < 3){
			?>
			<div class="col-3 col-4" onclick="myFunction()">
				<a href="<?php echo bloginfo('template_directory'); ?>/#" data-toggle-visibility="bloc-<?php the_ID();?>" class="gradiente"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lazyload-ph.png" data-src="<?php echo $image[0]; ?>" class="img-fluid mx-auto d-block lazyload" alt="placeholder image" id="avisos-img1" /><div class="carousel-caption"><?php echo $titulo;?></div></a>				
			</div>
			<?php
			}
				$i++;
				endwhile;
			}
			?>			
		</div>
	</div>
</div>
<!-- galeria1 END -->


<!-- VIEW POST AVISO -->
<?php
$args = array(
	'post_type'=> 'post',
	'orderby'    => 'ID',
	'category_name'    => 'Noticias',
	'post_status' => 'publish',
	'order'    => 'DESC',
	'posts_per_page' => 6	
);
$result = new WP_Query( $args );
if ( $result-> have_posts() ){
	$i = 0;
	$class = '';
	while ( $result->have_posts() ) : $result->the_post();
		$image_aviso = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), 'single-post-thumbnail' );	
		if( class_exists('Dynamic_Featured_Image') ) {
			global $dynamic_featured_image;
			$featured_images = $dynamic_featured_image->get_featured_images( $postId );
		}
		
		if($featured_images[0]['full'] == ''){$image_aviso=$image_aviso[0];}
		else{$image_aviso=$featured_images[0]['full'];}
	if($i < 3){		
?>		
<!-- bloc-img1-avisos -->
<div class="bloc object-hidden full-width-bloc l-bloc myDIV" id="bloc-<?php the_ID();?>">
	<div class="container bloc-sm">
		<div class="row no-gutters">
			<div class="col-12">
				<div class="text-center">
					<div id="<?php the_ID();?>" class="carousel slide carousel-4-style" data-ride="carousel" data-interval="false">
						<ol class="carousel-indicators hide-indicators">
							<li data-target="#<?php the_ID();?>" data-slide-to="0" class="active">
							</li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img class="d-inline-block w-100" alt="slide 1" src="<?php echo $image_aviso; ?>" />
								<div class="carousel-caption">
								</div>
							</div>
						</div><a class="carousel-nav-controls carousel-control-prev object-hidden" href="#<?php the_ID();?>" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span><span class="sr-only">Previous</span></a><a class="carousel-nav-controls carousel-control-next object-hidden" href="#<?php the_ID();?>" role="button" data-slide="next"><span class="fa fa-chevron-right"></span><span class="sr-only">Next</span></a>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-10 offset-lg-1">
				<div class="row row-style">
					<div class="col-lg-3">
						<h4 class="mg-md tab-mg-md grids-index animDelay1 animated fadeInUp" id="tab-text1" data-appear-anim-style="fadeInUp">
							<?php the_title();?>
						</h4>
					</div>
					<div class="col-lg-12">
						<div class="text-center">
							<div class="text-center margen-boton">
								<a href="<?php echo bloginfo('template_directory'); ?>/#" data-toggle-visibility="bloc-<?php the_ID();?>"><span class="feather-icon icon-circle-cross icon-md icon-azure" data-placement="top" data-toggle="tooltip" title="cerrar"></span></a>
							</div>
						</div>
					</div>
				</div>
				<p class="mg-lg pad-show-bloc" id="parrafo1-avisos">
					<?php echo get_the_excerpt();?>
				</p><a href="<?php the_permalink();?>" class="btn btn-lg pad-show-bloc btn-d">Leer más...</a>
				<div class="row">
					<div class="col">
						<?php
							// Get the ID of a given category
							$category_id = get_cat_ID( 'Avisos' );
						
							// Get the URL of this category
							$category_link = get_category_link( $category_id );
						?>
						<div class="text-center">
							<label class="label-mas-noticias-style text-lg-center mg-clear">
								Mas Avisos<br>
							</label><a href="<?php echo $category_link; ?>" rel="nofollow"><span class="fa fa-angle-down icon-lg icon-azure" data-placement="top" data-toggle="tooltip" title="Mas avisos"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-img1-avisos END -->
<?php 
	}
$i++;
	endwhile;
}
?>

<!-- galeria1 -->
<div class="bloc none full-width-bloc l-bloc" id="galeria1">
	<div class="container none">
		<div class="row voffset-clear-xs no-gutters">
		<?php
			$args = array(
				'post_type'=> 'post',
				'orderby'    => 'ID',
				'category_name'    => 'Noticias',
				'post_status' => 'publish',
				'order'    => 'DESC',
				'posts_per_page' => 6,				
			);
			$result = new WP_Query( $args );
			if ( $result-> have_posts() ){
				$i = 0;
				$class = '';
				while ( $result->have_posts() ) : $result->the_post();
				
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), 'single-post-thumbnail' );
					$thumbnail_details = get_posts(array('p' => get_post_thumbnail_id( $result->ID ), 'post_type' => 'attachment'));
					$titulo =  $thumbnail_details[0]->post_title;
					$leyenda = $thumbnail_details[0]->post_excerpt;
					if ($i == 0)
					{
						$class = 'active';
					}
					else
					{
						$class = '';
					}
				if($i >=3){
			?>
			<div class="col-3 col-4" onclick="myFunction()">
				<a href="<?php echo bloginfo('template_directory'); ?>/#" data-toggle-visibility="bloc-<?php the_ID();?>" class="gradiente"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lazyload-ph.png" data-src="<?php echo $image[0]; ?>" class="img-fluid mx-auto d-block lazyload" alt="placeholder image" id="avisos-img1" /><div class="carousel-caption"><?php echo $titulo;?></div></a>				
			</div>
			<?php
				}
				$i++;
				endwhile;
			}
			?>			
		</div>
	</div>
</div>
<!-- galeria1 END -->

<!-- VIEW POST AVISO -->
<?php
$args = array(
	'post_type'=> 'post',
	'orderby'    => 'ID',
	'category_name'    => 'Noticias',
	'post_status' => 'publish',
	'order'    => 'DESC',
	'posts_per_page' => 6	
);
$result = new WP_Query( $args );
if ( $result-> have_posts() ){
	$i = 0;
	$class = '';
	while ( $result->have_posts() ) : $result->the_post();
		$image_aviso = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), 'single-post-thumbnail' );		
		if( class_exists('Dynamic_Featured_Image') ) {
			global $dynamic_featured_image;
			$featured_images = $dynamic_featured_image->get_featured_images( $postId );
		}
		
		if($featured_images[0]['full'] == ''){$image_aviso=$image_aviso[0];}
		else{$image_aviso=$featured_images[0]['full'];}
	if($i >= 3){
?>		
<!-- bloc-img1-avisos -->
<div class="bloc object-hidden full-width-bloc l-bloc myDIV" id="bloc-<?php the_ID();?>">
	<div class="container bloc-sm">
		<div class="row no-gutters">
			<div class="col-12">
				<div class="text-center">
					<div id="<?php the_ID();?>" class="carousel slide carousel-4-style" data-ride="carousel" data-interval="false">
						<ol class="carousel-indicators hide-indicators">
							<li data-target="#<?php the_ID();?>" data-slide-to="0" class="active">
							</li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img class="d-inline-block w-100" alt="slide 1" src="<?php echo $image_aviso; ?>" />
								<div class="carousel-caption">
								</div>
							</div>
						</div><a class="carousel-nav-controls carousel-control-prev object-hidden" href="#<?php the_ID();?>" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span><span class="sr-only">Previous</span></a><a class="carousel-nav-controls carousel-control-next object-hidden" href="#<?php the_ID();?>" role="button" data-slide="next"><span class="fa fa-chevron-right"></span><span class="sr-only">Next</span></a>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-10 offset-lg-1">
				<div class="row row-style">
					<div class="col-lg-3">
						<h4 class="mg-md tab-mg-md grids-index animDelay1 animated fadeInUp" id="tab-text1" data-appear-anim-style="fadeInUp">
							<?php the_title();?>
						</h4>
					</div>
					<div class="col-lg-12">
						<div class="text-center">
							<div class="text-center margen-boton">
								<a href="<?php echo bloginfo('template_directory'); ?>/#" data-toggle-visibility="bloc-<?php the_ID();?>"><span class="feather-icon icon-circle-cross icon-md icon-azure" data-placement="top" data-toggle="tooltip" title="cerrar"></span></a>
							</div>
						</div>
					</div>
				</div>
				<p class="mg-lg pad-show-bloc" id="parrafo1-avisos">
					<?php echo get_the_excerpt();?>
				</p><a href="<?php the_permalink();?>" class="btn btn-lg pad-show-bloc btn-d">Leer más...</a>
				<div class="row">
					<div class="col">
						<?php
							// Get the ID of a given category
							$category_id = get_cat_ID( 'Avisos' );
						
							// Get the URL of this category
							$category_link = get_category_link( $category_id );
						?>
						<div class="text-center">
							<label class="label-mas-noticias-style text-lg-center mg-clear">
								Mas Avisos<br>
							</label><a href="<?php echo $category_link; ?>" rel="nofollow"><span class="fa fa-angle-down icon-lg icon-azure" data-placement="top" data-toggle="tooltip" title="Mas avisos"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-img1-avisos END -->
<?php 
	}
$i++;
	endwhile;
}
?>



<!-- bloc-7 -->
<?php
    $taxonomy = 'album';
	$tax_terms = get_terms($taxonomy);
	foreach($tax_terms as $tax_term){
		$term_link=get_term_link($tax_term, $taxonomy);
	}


	$args = array(
		'post_type'=> 'galeria',
		'orderby'    => 'ID',
		'post_status' => 'publish',
		'order'    => 'DESC',
		'posts_per_page' => 1 
	);
	$result = new WP_Query( $args );
	if ( $result-> have_posts() ){
		$result->the_post();		
		
?>

<div class="bloc none full-width-bloc l-bloc" id="bloc-7">
	<div class="container shadow-index bloc-sm">
		<div class="row">
			<div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
				<a href="<?php  the_permalink(get_the_ID()); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lazyload-ph.png" data-src="<?php bloginfo('stylesheet_directory'); ?>/img/icono%20galeria.png" class="img-fluid img-icono-galeria-style pulse-hvr animated puffIn mx-auto d-block lazyload" alt="icono%20galeria" data-appear-anim-style="puffIn" /></a>
			</div>
		</div>
	</div>
</div>
<?php
}
?>

<!-- bloc-7 END -->




<!-- bloc-8 -->
<div class="bloc full-width-bloc l-bloc" id="bloc-8">
	<div class="container ">
		<div class="row voffset-clear-xs no-gutters">
			<div class="col-12 l-bloc">
				<div class="text-center">
					<div id="carrusel-galeria" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators hide-indicators">
							<li data-target="#carrusel-galeria" data-slide-to="0" class="active">
							</li>
							<li data-target="#carrusel-galeria" data-slide-to="1">
							</li>
							<li data-target="#carrusel-galeria" data-slide-to="2">
							</li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<?php
							$args = array(
								'post_type'=> 'galeria',
								'orderby'    => 'ID',
								'post_status' => 'publish',
								'order'    => 'DESC',
								'posts_per_page' => 3 
							);
							$result = new WP_Query( $args );
							if ( $result-> have_posts() ){
								$i = 0;
								$class = '';
								while ( $result->have_posts() ) : $result->the_post();
								
									$image_galeria = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), 'single-post-thumbnail' );
									if ($i == 0)
									{
										$class = 'active';
									}
									else
									{
										$class = '';
									}

							?>	
							<div class="carousel-item gradiente <?php echo $class;?>">
								<img class="d-inline-block w-100" alt="slide 1" src="<?php echo $image_galeria[0];?>" />
								<div class="carousel-caption">
									<?php echo get_the_excerpt();?>
								</div>
							</div>
							<?php
								$i++;
								endwhile;
							}
							?>						
						</div><a class="carousel-nav-controls carousel-control-prev" href="#carrusel-galeria" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span><span class="sr-only">Previous</span></a><a class="carousel-nav-controls carousel-control-next" href="#carrusel-galeria" role="button" data-slide="next"><span class="fa fa-chevron-right"></span><span class="sr-only">Next</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-8 END -->
<?php
	$videos = myprefix_get_theme_option('videos');
	$calendario = myprefix_get_theme_option('calendario');
	$descargas = myprefix_get_theme_option('descargas');
?>


<!-- bloc-9 -->
<div class="bloc none full-width-bloc l-bloc" id="bloc-9">
	<div class="container back-icons-conf ">
		<div class="row">
			<div class="offset-lg-1 col-lg-3 offset-sm-0 col-sm-4 offset-md-0 col-md-4 col-4">
				<?php
					if($videos != ''){
				?>
				<a href="<?php echo $videos;?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/img/lazyload-ph.png" data-src="<?php bloginfo('stylesheet_directory'); ?>/img/vidp.png" class="img-fluid mx-auto d-block img-icono-videos-style animated pulse-hvr mg-md fadeInUp lazyload" alt="icono%20videos" data-appear-anim-style="fadeInUp" />
				</a>
				<?php }?>
			</div>
			<div class="offset-lg-0 col-lg-4 col-sm-4 offset-sm-0 offset-md-0 col-md-4 col-4">
			<?php
					if($calendario != ''){
				?>
				<a href="<?php echo $calendario; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/lazyload-ph.png" data-src="<?php bloginfo('stylesheet_directory'); ?>/img/calenp.png" class="img-fluid img-style mx-auto d-block animated pulse-hvr mg-md fadeInUp lazyload" alt="placeholder image" data-appear-anim-style="fadeInUp" /></a>
				<?php }?>
			</div>
			<div class="offset-lg-0 col-lg-3 col-sm-4 offset-sm-0 offset-md-0 col-md-4 col-4">
			<?php
					if($descargas != ''){
				?>
				<a href="<?php echo $descargas;?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/img/lazyload-ph.png" data-src="<?php bloginfo('stylesheet_directory'); ?>/img/descarp.png" class="img-fluid mx-auto d-block img-desca-style animated pulse-hvr fadeInUp lazyload" alt="descarp" data-appear-anim-style="fadeInUp" />
				</a>
				<?php }?>
			</div>
		</div>
	</div>
</div>
<!-- bloc-9 END -->

<?php get_footer();?>