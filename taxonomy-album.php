<?php get_header();?>
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/galeria/galeria.css?554">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/galeria/animate.css?7070">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/galeria/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/galeria/feather.min.css">

	
    <title>Album</title>


    
<!-- Analytics -->
 
<!-- Analytics END -->
    
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

<?php

$album = get_queried_object();
?>
<!-- bloc-6 -->
<div class="bloc tc-white" id="bloc-6">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col">
				<h1 class="mg-sm h1-galería-style animated puffIn tc-white" id="tag1" data-appear-anim-style="puffIn">
					Album <?php echo $album->name;?><br>
				</h1>
			</div>
		</div>
		<div class="row voffset">
            <?php

            while(have_posts()): the_post();
            $id_post = get_the_ID();        	
            $galerias = get_post_gallery($id_post, false);
            $galerias_imagenes_ID = explode(',', $galerias['ids']);
            foreach($galerias_imagenes_ID as $ids){
                $imagenes_thumb = wp_get_attachment_image_src($ids, array())[0];
                ?>
                <div class="col-lg-3 col-md-6">
                    <a href="#" data-lightbox="<?php echo $imagenes_thumb; ?>" data-gallery-id="gallery-1"><img src="<?php echo $imagenes_thumb; ?>" data-src="<?php echo $imagenes_thumb; ?>" class="img-fluid mx-auto d-block lazyload" alt="placeholder image" /></a>
                    <h4 class="mg-md tc-white">
                        <?php the_title();?> 
                    </h4>
                    <p>
                        <?php the_excerpt();?>
                    </p>
                </div>
                <?php 
            }
            endwhile;
            ?>
			
		</div>		
	</div>
</div>
<!-- bloc-6 END -->

<!-- bloc-7 
<div class="bloc full-width-bloc" id="bloc-7">
	<div class="container ">
		<div class="row">
			<div class="col-md-3 col-lg-1">
				<a href="url"><span class="feather-icon icon-arrow-left icon-md icon-white float-lg-right"></span></a>
			</div>
			<div class="col-md-3 col-lg-2">
				<h6 class="mg-md tc-white">
					<a class="ltc-white" href="url">Anterior</a><br>
				</h6>
			</div>
			<div class="col-md-3 col-lg-2 offset-lg-6">
				<h6 class="tc-white text-lg-right h6-style mg-sm">
					<a class="ltc-white" href="url">Siguiente</a><br>
				</h6>
			</div>
			<div class="col-md-3 col-lg-1">
				<a href="url"><span class="feather-icon icon-arrow-right icon-white icon-md float-lg-none"></span></a>
			</div>
		</div>
	</div>
</div>
-->
<!-- bloc-7 END -->

<!-- bloc-7 -->
<div class="bloc l-bloc full-width-bloc" id="bloc-7">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col">
				<div class="divider-h">
					<span class="divider"></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-7 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


</div>
<!-- Main container END -->

<script src="<?php echo bloginfo('template_directory'); ?>/js/galeria/blocs.js?3661"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/galeria/jquery.touchSwipe.min.js" defer></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/galeria/lazysizes.min.js" defer></script>

    

<?php get_footer();?>