<?php
    wp_footer();

    $nombre_institucion = myprefix_get_theme_option( 'input_example' );
    $direccion_institucion = myprefix_get_theme_option( 'introtext' );
    $numero_telefonico = myprefix_get_theme_option('phone_number');
    $correo_institucion = myprefix_get_theme_option('inst_email');
    $facebook_url = myprefix_get_theme_option('fb_url');
    $twitter_url = myprefix_get_theme_option('tw_url');
    $ig_url = myprefix_get_theme_option('ig_url');
    $yt_url = myprefix_get_theme_option('yt_url');

	$mapasitio = myprefix_get_theme_option('mapasitio');
	$politicaweb = myprefix_get_theme_option('politicaweb');
	$preguntas = myprefix_get_theme_option('preguntas');
	$cartaderecho = myprefix_get_theme_option('cartaderecho');
?>


<!-- bloc-12 -->
<div class="bloc l-bloc" id="bloc-12">
	<div class="container none">
		<div class="row">
			<div class="col">
				<div class="divider-h">
					<span class="divider"></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-12 END -->


<!-- bloc-1 -->
<div class="bloc none bgc-charcoal d-bloc full-width-bloc" id="bloc-1">
	<div class="container ">
		<div class="row">
			<div class="col-md-4 align-self-start offset-lg--1 col-lg-1 d-lg-block   d-none">
				<div class="text-center container-div-style text-lg-right">
					<span class="fa fa-location-arrow icon-md icon-white ub-icon-space"></span>
				</div>
			</div>
			<div class="col-lg-4 offset-sm-0 col-sm-4 offset-lg-0 offset-md-0 col-md-4">
				<h5 class="mg-sm tc-white text-center text-lg-left text-md-left text-sm-left h5-style" id="title-institucion">
					<?php echo $nombre_institucion;?>
				</h5>
				<h6 class="mg-md tc-white text-center text-lg-left text-md-left text-sm-left h6-heading-6-style" id="dir-institucion">
					<?php echo $direccion_institucion;?>
				</h6>
			</div>
			<div class="col-md-3 col-lg-2 offset-lg-1 offset-md-1 col-sm-3 offset-sm-1 footer-mapa">
				<a href="<?php echo $mapasitio; ?>" class="a-btn a-block ltc-white text-center link-font text-lg-left text-md-left text-sm-left" id="link1">Mapa del Sitio</a><a href="<?php echo $politicaweb; ?>" class="a-btn a-block ltc-white text-center link-font text-lg-left text-md-left text-sm-left" id="link2">Politica Web</a><a href="<?php echo $politicaweb; ?>" class="a-btn a-block ltc-white text-center link-font text-lg-left text-md-left text-sm-left" id="link3">Preguntas Frecuentes</a><a href="<?php echo $cartaderecho; ?>" class="a-btn a-block ltc-white text-center link-font link1 text-lg-left text-md-left text-sm-left" id="link4">Carta de Derecho</a>
			</div>
			<div class="col-md-4 align-self-start offset-lg-0 col-lg-4 col-sm-4 footer-unete">
				<h6 class="mg-md text-lg-center tc-white text-md-center text-sm-center text-center h6-style mg-sm-xs" id="label-comunidad">
					Unete a nuestra comunidad<span class="text-span-color"><span class="special-tag-for-editing-text-with-html"></span></span>
				</h6>
				<div class="follow-icon"><div class="social-link-bric text-center" bloc-name="follow-icons" id="follow-icons">
<?php if($twitter_url !=''){?>
<a href="<?php echo $twitter_url;?>" class="twitter-link" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FEFFFF" viewBox="0 0 24 24" style="margin-left: 12px; margin-right: 12px;"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z"></path></svg></a>
<?php }
if($facebook_url !=''){?>
<a href="<?php echo $facebook_url;?>" class="facebook-link" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FEFFFF" viewBox="0 0 24 24" style="margin-left: 12px; margin-right: 12px;"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"></path></svg></a>
<?php }
if($ig_url !=''){?>
<a href="<?php echo $ig_url;?>" class="instagram-link" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FEFFFF" viewBox="0 0 24 24" style="margin-left: 12px; margin-right: 12px;"><path d="M14.829 6.302c-.738-.034-.96-.04-2.829-.04s-2.09.007-2.828.04c-1.899.087-2.783.986-2.87 2.87-.033.738-.041.959-.041 2.828s.008 2.09.041 2.829c.087 1.879.967 2.783 2.87 2.87.737.033.959.041 2.828.041 1.87 0 2.091-.007 2.829-.041 1.899-.086 2.782-.988 2.87-2.87.033-.738.04-.96.04-2.829s-.007-2.09-.04-2.828c-.088-1.883-.973-2.783-2.87-2.87zm-2.829 9.293c-1.985 0-3.595-1.609-3.595-3.595 0-1.985 1.61-3.594 3.595-3.594s3.595 1.609 3.595 3.594c0 1.985-1.61 3.595-3.595 3.595zm3.737-6.491c-.464 0-.84-.376-.84-.84 0-.464.376-.84.84-.84.464 0 .84.376.84.84 0 .463-.376.84-.84.84zm-1.404 2.896c0 1.289-1.045 2.333-2.333 2.333s-2.333-1.044-2.333-2.333c0-1.289 1.045-2.333 2.333-2.333s2.333 1.044 2.333 2.333zm-2.333-12c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.958 14.886c-.115 2.545-1.532 3.955-4.071 4.072-.747.034-.986.042-2.887.042s-2.139-.008-2.886-.042c-2.544-.117-3.955-1.529-4.072-4.072-.034-.746-.042-.985-.042-2.886 0-1.901.008-2.139.042-2.886.117-2.544 1.529-3.955 4.072-4.071.747-.035.985-.043 2.886-.043s2.14.008 2.887.043c2.545.117 3.957 1.532 4.071 4.071.034.747.042.985.042 2.886 0 1.901-.008 2.14-.042 2.886z"></path></svg></a>
<?php }
if($yt_url !=''){?>
<a href="<?php echo $yt_url;?>" class="youtube-link" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FEFFFF" viewBox="0 0 24 24" style="margin-left: 12px; margin-right: 12px;"><path d="M10.918 13.933h.706v3.795h-.706v-.419c-.13.154-.266.272-.405.353-.381.218-.902.213-.902-.557v-3.172h.705v2.909c0 .153.037.256.188.256.138 0 .329-.176.415-.284v-2.881zm.642-4.181c.2 0 .311-.16.311-.377v-1.854c0-.223-.098-.38-.324-.38-.208 0-.309.161-.309.38v1.854c-.001.21.117.377.322.377zm-1.941 2.831h-2.439v.747h.823v4.398h.795v-4.398h.821v-.747zm4.721 2.253v2.105c0 .47-.176.834-.645.834-.259 0-.474-.094-.671-.34v.292h-.712v-5.145h.712v1.656c.16-.194.375-.354.628-.354.517.001.688.437.688.952zm-.727.043c0-.128-.024-.225-.075-.292-.086-.113-.244-.125-.367-.062l-.146.116v2.365l.167.134c.115.058.283.062.361-.039.04-.054.061-.141.061-.262v-1.96zm10.387-2.879c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-10.746-2.251c0 .394.12.712.519.712.224 0 .534-.117.855-.498v.44h.741v-3.986h-.741v3.025c-.09.113-.291.299-.436.299-.159 0-.197-.108-.197-.269v-3.055h-.741v3.332zm-2.779-2.294v1.954c0 .703.367 1.068 1.085 1.068.597 0 1.065-.399 1.065-1.068v-1.954c0-.624-.465-1.071-1.065-1.071-.652 0-1.085.432-1.085 1.071zm-2.761-2.455l.993 3.211v2.191h.835v-2.191l.971-3.211h-.848l-.535 2.16-.575-2.16h-.841zm10.119 10.208c-.013-2.605-.204-3.602-1.848-3.714-1.518-.104-6.455-.103-7.971 0-1.642.112-1.835 1.104-1.848 3.714.013 2.606.204 3.602 1.848 3.715 1.516.103 6.453.103 7.971 0 1.643-.113 1.835-1.104 1.848-3.715zm-.885-.255v.966h-1.35v.716c0 .285.024.531.308.531.298 0 .315-.2.315-.531v-.264h.727v.285c0 .731-.313 1.174-1.057 1.174-.676 0-1.019-.491-1.019-1.174v-1.704c0-.659.435-1.116 1.071-1.116.678.001 1.005.431 1.005 1.117zm-.726-.007c0-.256-.054-.445-.309-.445-.261 0-.314.184-.314.445v.385h.623v-.385z"></path></svg></a>
<?php }?>
<a href="https://vimeo.com/" class="vimeo-link d-none " target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#00adef" viewBox="0 0 24 24" style="margin-left: 2px; margin-right: 2px;"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.82 11.419c-1.306 2.792-4.463 6.595-6.458 6.595-1.966 0-2.25-4.192-3.324-6.983-.527-1.372-.868-1.058-1.858-.364l-.604-.779c1.444-1.27 2.889-2.745 3.778-2.826.998-.096 1.615.587 1.845 2.051.305 1.924.729 4.91 1.472 4.91.577 0 2.003-2.369 2.076-3.215.13-1.24-.912-1.277-1.815-.89 1.43-4.689 7.383-3.825 4.888 1.501z"></path></svg></a>

<a href="https://linkedin.com/in/" class="linkedin-link d-none " target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#0177b5" viewBox="0 0 24 24" style="margin-left: 2px; margin-right: 2px;"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"></path></svg></a>

</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-1 END -->

<!-- bloc-2 -->
<div class="bloc none bgc-charcoal full-width-bloc" id="bloc-2">
	<div class="container ">
		<div class="row">
			<div class="col-md-4 align-self-start offset-lg--1 col-lg-1 d-lg-block   d-none">
				<div class="text-center container-div-style text-lg-right">
					<span class="ion ion-android-call icon-md icon-white tel-icon-space" id="tel-icon"></span>
				</div>
				<div class="text-center text-lg-right">
					<span class="ion ion-email icon-md icon-white mail-icon-space" id="mail-icon"></span>
				</div>
			</div>
			<div class="offset-lg-0 offset-md-0 col-md-5">
				<h5 class="tc-white text-center text-lg-left text-sm-left h5-heading-5-style tel-movil-space mg-md" id="tel-institucion">
				<a href="tel:+503<?php echo $numero_telefonico;?>" ><?php echo $numero_telefonico;?></a>
				</h5>
				<h5 class="mg-md tc-white text-center text-lg-left text-sm-left text-md-left h5-3-style mail-text-space " id="mail-institucion">
				<a href="mailto:<?php echo $correo_institucion;?>"><?php echo $correo_institucion;?></a>
				</h5>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


</div>
<!-- Main container END --> 

<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-3.3.1.js?2644"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.bundle.js?8747"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/blocs.js?1340"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/jqBootstrapValidation.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/formHandler.js?7891"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/lazysizes.min.js" defer></script>
<!-- Additional JS END -->

<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->

</body>
</html>