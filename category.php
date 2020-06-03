
<?php get_header();

$categoria = get_queried_object();
?>
<div class="bloc none full-width-bloc bgc-white tc-black" id="bloc-112">
	<div class="container bloc-sm">
		<div class="row align-items-end no-gutters">
			<div class="col align-self-start">
                <h1 class="mg-md tc-black h1-categoria" data-appear-anim-style="fadeInUp">
                    Categoría / <?php echo $categoria->name;?>
                </h1>
			</div>
		</div>
	</div>
</div>
<?php 
while(have_posts()): the_post();
?>
<!-- bloc-noticia1 -->
<div class="bloc none full-width-bloc bgc-white tc-black" id="bloc-noticia1">
	<div class="container bloc-sm">
		<div class="row no-gutters">
			<div class="col-md-12 offset-lg--1 col-lg-6">				
                <?php the_post_thumbnail('full', array('class'=>'img-fluid mx-auto d-block mg-md shadow lazyload'));?>
			</div>
			<div class="align-self-center offset-md-1 col-md-10 col-sm-10 offset-sm-1 offset-1 col-10 offset-lg-1 col-lg-4">
				<h2 class="mg-md tc-black">
					<a href="<?php the_permalink();?>" class="mg-md tc-black a-categoria"><?php the_title();?></a>
				</h2>
				<p class="parrafos-blancos-letranegra">
                    <?php echo get_the_excerpt();?>					
				</p><a href="<?php the_permalink();?>" class="btn btn-d float-right">Seguir leyendo</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-noticia1 END -->
<?php 
endwhile;
?>

<!-- bloc-9 -->
<div class="bloc l-bloc" id="bloc-9">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-md-6 col-6">
				<h3 class="mg-md h3- -anterior-style">
					<?php previous_posts_link('<span class="feather-icon icon-arrow-left icon-md-cat icon-white"></span>');?><?php previous_posts_link('Anterior');?><br>
				</h3>
			</div>
			<div class="col-md-6 col-6">
				<h3 class="mg-sm text-lg-right mx-auto d-block h3-siguiente -style text-sm-right">
					<?php next_posts_link('<span class="feather-icon icon-arrow-right float-lg-right icon-md-cat icon-white float-right"></span>');?><?php next_posts_link('Siguiente');?>
				</h3>
			</div>
		</div>
	</div>
</div>
<!-- bloc-9 END -->

<?php get_footer();?>