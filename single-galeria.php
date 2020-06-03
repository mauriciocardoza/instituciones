<?php get_header();?>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/galeria/galeria.css?103">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/galeria/animate.css?7899">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/galeria/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/galeria/feather.min.css">
	
    <title>Galeria</title>


<body>
<!-- Main container -->
<div class="page-container">
    
<!-- bloc-0flecha -->
<div class="bloc bgc-charcoal d-bloc padd" id="bloc-0flecha">
	<div class="container ">
		<div class="row">
			<div class="col">
				<a href="javascript:history.back()"><span class="feather-icon icon-arrow-left icon-md icon-white animated rotateIn animDelay1 float-lg-none" data-placement="right" data-toggle="tooltip" title="Atras" data-appear-anim-style="rotateIn"></span></a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-0flecha END -->

<!-- bloc-1 -->
<div class="bloc none l-bloc" id="bloc-1">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-lg-12 offset-lg-0 offset-md-0 col-md-12 offset-sm-0 col-sm-12">
				<h1 class="mg-sm h1-galería-style animated puffIn tc-white" id="tag1" data-appear-anim-style="puffIn">
					Galería<br>
				</h1>
			</div>
		</div>
	</div>
</div>
<!-- bloc-1 END -->


<!-- bloc-0 -->
<?php 
 have_posts();

$image_carrusel = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array( 1349, 562.08 ) );
?>
<div class="bloc l-bloc none " id="bloc-0">
	<div class="container bloc-sm">
		<div class="row voffset-clear-xs">
			<div class="col-12">
                <a href="#" data-lightbox="<?php echo $image_carrusel[0];?>" data-gallery-id="gallery-1" data-frame="dark-lb">
                <?php
                /** Imagen descatada */
                if( has_post_thumbnail()):
                    the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid mx-auto d-block panel-shadow lazyload']);
                endif;
                ?>
                
                </a>
			</div>
        </div>
        <?php 
        
        $galeria = get_post_gallery( get_the_ID(), false);
        $galeria_imagenes_ID = explode(',' , $galeria['ids']);        
        ?>
		<div class="row voffset voffset-xs">
            <?php            
               foreach($galeria_imagenes_ID as $id){
                    $imagen_thumb = wp_get_attachment_image_src($id, array())[0];                                                        
            ?>
			<div class="col-6 col-sm-3">
                <a href="#" data-lightbox="<?php echo $imagen_thumb;?>" data-gallery-id="gallery-1" data-frame="dark-lb">
                    <img src="<?php echo $imagen_thumb;?>" data-src="<?php echo $imagen_thumb;?>" class="img-fluid mx-auto d-block panel-shadow mg-sm lazyload" alt="placeholder image" />
                </a>
            </div>
            <?php
                
                }   
            ?>			
		</div>
	</div>
</div>
<!-- bloc-0 END -->
<?php
#endwhile;


$taxonomy = 'album';
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
<!-- bloc-2 -->
<div class="bloc" id="bloc-2">
	<div class="container bloc-md">
		<div class="row">
			<div class="col-12">
				<h1 class="mg-md h1-destacadas-style animated puffIn tc-white" id="tag2" data-appear-anim-style="puffIn">
					Destacadas<br>
				</h1>
            </div>
            <?php
            foreach($tax_terms as $tax_term){         
				$grupo = $tax_term->term_id;
				$nombre_grupo = $tax_term->name;
				$slug_grupo=$tax_term->slug;
				$id_imagen_grupo = get_term_meta( $grupo, 'category-image', true);
				#$img_grupo_thumbnail = wp_get_attachment_url($id_imagen_grupo);
				
				$args1 = array(
					'post_type' => 'galeria',
					'orderby'    => 'ID',
					'tax_query' => array( 
						array(
							'taxonomy'  => 'album',
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
                        $galerias = get_post_gallery($id_post, false);
                        $galerias_imagenes_ID = explode(',', $galerias['ids']);					                        
                        foreach($galerias_imagenes_ID as $ids){
                            $imagenes_thumb = wp_get_attachment_image_src($ids, array())[0];
                            $i++;
                            if($i <= 12){    
                            ?>
                            <div class="col-lg-2 col-6 col-sm-4">
                                <a href="#" data-lightbox="<?php echo $imagenes_thumb;?>" data-gallery-id="gallery-1">
                                <img src="<?php echo $imagenes_thumb;?>" data-src="<?php echo $imagenes_thumb;?>" class="img-fluid mx-auto d-block panel-shadow mg-sm lazyload" alt="placeholder image" />
                                </a>
                            </div>
                            <?php
                                }
                            }
                    endwhile;
                }
            }
            ?>
		</div>
	</div>
</div>
<!-- bloc-2 END -->


<?php
$taxonomy = 'album';
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

<!-- bloc-3 -->
<div class="bloc none" id="bloc-3">
	<div class="container ">
		<div class="row">
			<div class="col-lg-12 offset-lg-0 offset-md-0 col-md-12 offset-sm-0 col-sm-12">
				<h1 class="mg-sm h1-galería-style animated puffIn tc-white" data-appear-anim-style="puffIn">
					Álbumes<br>
				</h1>
			</div>
		</div>
	</div>
</div>
<!-- bloc-3 END -->


<!-- bloc-4 -->
<div class="bloc l-bloc" id="bloc-4">
	<div class="container bloc-sm">
		<div class="row">
        <?php            
        foreach($tax_terms as $tax_term){         
				$album = $tax_term->term_id;
                $nombre_album = $tax_term->name;
                $descripcion_album = $tax_terms->description;
				$slug_grupo=$tax_term->slug;
				$id_imagen_album = get_term_meta( $album, 'category-image', true);
                $img_grupo_thumbnail = wp_get_attachment_url($id_imagen_album);
                $term_link=get_term_link($tax_term, $taxonomy);
            ?>
			<div class="align-self-center col-lg-3 col-md-6">
				<div class="card animDelay02 panel-shadow" id="card1">
					<img src="<?php echo $img_grupo_thumbnail;?>" data-src="<?php echo $img_grupo_thumbnail;?>" class="img-fluid mx-auto d-block lazyload" alt="placeholder image" />
					<div class="card-body">
						<p>
							<?php echo $nombre_grupo;?>
						</p><a href="<?php echo $term_link;?>" class="btn btn-d btn-block">Ver</a>
					</div>
				</div>
            </div>
            <?php
        }
            ?>									
		</div>
	</div>
</div>
<!-- bloc-4 END -->

<!-- bloc-5 
<div class="bloc l-bloc" id="bloc-5">
	<div class="container bloc-md">
		<div class="row">
			<div class="col-sm-6 offset-sm-3 col-lg-6 offset-lg-3">
				<div class="text-center">
					<a href="album.php" class="btn btn-d btn-xl btn-style pulse-hvr panel-shadow animated fadeIn none" data-appear-anim-style="fadeIn">Ver todo</a>
				</div>
			</div>
		</div>
	</div>
</div>
-->
<!-- bloc-5 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


</div>
<!-- Main container END -->
    
<script src="<?php echo bloginfo('template_directory'); ?>/js/galeria/blocs.js?3661"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/galeria/jquery.touchSwipe.min.js" defer></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/galeria/lazysizes.min.js" defer></script>

<?php get_footer();?>