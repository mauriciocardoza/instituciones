<?php 
/**
 * Template Name: Contenido para Servicios
 */
get_header();
while ( have_posts() ): the_post();
?>
<!-- bloc-img-servicios -->
<div class="bloc full-width-bloc bgc-white d-flex l-bloc" id="bloc-img-servicios">
	<div class="container none">
		<div class="row no-gutters">
			<div class="col-12">
				<div id="img-institucion" class="carousel slide" data-ride="carousel" data-interval="false">
					<ol class="carousel-indicators hide-indicators">
						<li data-target="#img-institucion" data-slide-to="0" class="active">
						</li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
                            <?php 
                            /** Imagen descatada */
                            if( has_post_thumbnail()):
                                the_post_thumbnail('post-thumbnail', ['class' => 'd-inline-block w-100']);
                            endif;
                            ?>
							<!-- <img class="d-inline-block w-100" alt="slide 1" src="<?php bloginfo('template_directory');?>/img/servicios1p.png" /> -->
							<div class="carousel-caption">
							</div>
						</div>
					</div><a class="carousel-nav-controls carousel-control-prev object-hidden" href="#img-institucion" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span><span class="sr-only">Previous</span></a><a class="carousel-nav-controls carousel-control-next object-hidden" href="#img-institucion" role="button" data-slide="next"><span class="fa fa-chevron-right"></span><span class="sr-only">Next</span></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-img-servicios END -->
<!-- etiqueta-img -->
<div class="bloc l-bloc" id="etiqueta-img">
	<div class="container none">
		<div class="row">
			<div class="col-12">
				<h4 class="tab-white-mg-md mg-md animated fadeInUp" id="tab-text-servicios" data-appear-anim-style="fadeInUp">
					<?php the_title();?>
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- etiqueta-img END -->

<?php                       
#LISTANDO BOTONES GRUPO DE SERVICIOS
$taxonomy = 'grupo';
$args = array(
    'orderby'           => 'name', 
    'order'             => 'ASC',
    'number'            => '', 
    'fields'            => 'all', 
    'slug'              => '',
    'parent'            => '',
    'hierarchical'      => true, 
 ); 
$i=0; 
$tax_terms = get_terms($taxonomy, $args);
?>
<div class="bloc bgc-white l-bloc" id="iconos-2">
	<div class="container none bloc-sm">
		<div class="row">

			<?php
			foreach($tax_terms as $tax_term){         
				$grupo = $tax_term->term_id;
				$nombre_grupo = $tax_term->name;
				$slug_grupo=$tax_term->slug;
				$id_imagen_grupo = get_term_meta( $grupo, 'category-image', true);
				$img_grupo_thumbnail = wp_get_attachment_url($id_imagen_grupo);
				$i++;
				$args1 = array(
					'post_type' => 'servicios',
					'orderby'    => 'ID',
					'tax_query' => array( 
						array(
							'taxonomy'  => 'grupo',
							'field' => 'slug',
							'terms' => $slug_grupo,
						),
					),
					'post_status' => 'publish',
					'order'    => 'ASC'
				);
				$result = new WP_Query( $args1 );
				if ( $result-> have_posts() ){

					while ( $result->have_posts() ) : $result->the_post();   						
						$id_post = get_the_ID();        						
						$id_class.= $id_post.'-'.$i.',';         
					endwhile;	
				}

			?>
			<!-- iconos-2 -->
			<div class="col-md-4 col-4">
				<a href="#" data-toggle-visibility="<?php echo $grupo;?>-img,<?php echo $id_class;?>">
				<img src="<?php echo $img_grupo_thumbnail;?>" data-src="<?php echo $img_grupo_thumbnail;?>" class="img-fluid img-116-style mx-auto d-block lazyload" alt="servicio5p" id="icon4" /></a>
				<h4 class="text-center h4-bloc-11-style mx-auto d-block text-lg-center mg-sm tc-black text-md-center text-sm-center" id="titulo-icon4">
					<?php echo $nombre_grupo;?>
				</h4>

				<img src="<?php bloginfo('template_directory');?>/img/lazyload-ph.png" data-src="<?php bloginfo('template_directory');?>/img/sep1p.png" class="img-fluid mx-auto object-hidden animated fadeIn animDelay02 mg-md lazyload" alt="sep1p" id="<?php echo $grupo;?>-img" data-appear-anim-style="fadeIn" />				
				<?php
				$args2 = array(
					'post_type' => 'servicios',
					'orderby'    => 'ID',
					'tax_query' => array( 
						array(
							'taxonomy'  => 'grupo',
							'field' => 'slug',
							'terms' => $slug_grupo,
						),
					),
					'post_status' => 'publish',
					'order'    => 'ASC'
				);
				$result = new WP_Query( $args2 );
				if ( $result-> have_posts() ){

					while ( $result->have_posts() ) : $result->the_post();   
						$id_post = get_the_ID();        
						$id_link =  $id_post.'-'.$i;                        
				?>
				<div class="row">
					<div class="col">
						<div class="text-center">
						<a href="<?php the_permalink();?>" class="a-btn object-hidden text-lg-center ltc-black" id="<?php echo $id_link;?>"><?php the_title();?></a>
						</div>
					</div>
				</div>
				<?php
					endwhile;
				}
				?>	
				</br>
			</div>												
			<?php		
			$id_class='';		
			}
			?>	
		</div>
	</div>
</div>
<!-- iconos-2 END -->


<?php
endwhile;
get_footer();
?>