<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<!-- Styles  -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print.css" type="text/css" media="print" />
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head();
	$options = get_option('f8_theme_options');
?>
</head>

<body <?php body_class(); ?>>
<div class="container">
<div class="container-inner">



<!-- Begin rss -->
<!-- 
<div id="inside-subscribe">
	<a href="<?php bloginfo('rss2_url'); ?>" class="feed">posts</a> <a href="<?php bloginfo('comments_rss2_url'); ?>" class="feed">comments</a>
</div>
-->

<div class="clear"></div>
<!--img src="http://graffitiwarehouse.com/wp-content/uploads/2011/07/untitled-2.jpg" height="56" width="950"-->
<!-- Begin Masthead -->
<div id="masthead" class="clearfix">
    <h4 class="left"><a href="<?php echo get_option('home'); ?>/" title="Home"><?php bloginfo('name'); ?></a> <span class="description"><?php bloginfo('description'); ?></span><span class="contact"><?php if ( $options['phone'] != '' ) { ?><?php echo $options['phone']; ?><br /><?php } if ( $options['email'] != '' ) { ?><a href="mailto:<?php echo $options['email']; ?>"><?php echo $options['email']; ?></a><?php } ?></span></h4>
</div>

<!-- <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fkeys2baltimore.com&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>  -->

<?php
	$slideshow = $options['selectinput'];
	// Only show this is the Single Header Image is selected or if no option is set
	if ( $slideshow == 1 || !$slideshow ) {
		// Check if this is a post or page, if it has a thumbnail, and if it's a big one
		if ( is_singular() &&
				has_post_thumbnail( $post->ID ) &&
				( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( '950', '425' ) ) ) &&
				$image[1] >= HEADER_IMAGE_WIDTH ) :
			// Houston, we have a new header image!
			echo get_the_post_thumbnail( $post->ID, '950x425' );
		else : ?>
		<!-- gjs	<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo('name'); ?>" class="headerimg" />  -->
	<?php endif; 
	} // End only show if Single Header Image is selected
?>





<?php
	if ( is_home() && $paged < 1 ) {
		get_template_part( 'slideshow' );
	}

?>

<?php
if (class_exists(‘Gallery’)) {
    $Gallery = new Gallery();
    $Gallery -> slideshow($output = true, $post_id = null);
}

?>



<!-- gjs start slideshow 

<div id="cimy_div_id">Loading images...</div>
<div class="cimy_div_id_caption"></div>
<style type="text/css">
	#cimy_div_id {
		float: left;
		margin: 1em auto;
		border: 1px solid #000000;
		width: 650px;
		height: 450px;
	}
	div.cimy_div_id_caption {
		position: relative;
		margin-top: 175px;
		margin-left: -75px;
		width: 150px;
		text-align: center;
		left: 50%;
		padding: 5px 10px;
		background: black;
		color: white;
		font-family: sans-serif;
		border-radius: 10px;
		display: none;
		z-index: 2;
	}
</style>
<noscript>
	<div id="cimy_div_id_nojs">
		<img id="cimy_img_id" src="http://graffitiwarehouse.com/wp-content/Cimy_Header_Images/176747_159227784134834_152177241506555_349258_2039604_o.jpg" alt="" />
	</div>
</noscript>


</div>
<div style="text-align: left"> -->

<!-- <div align="center">
<div class="ngg_slideshow widget">
			<div id="ngg-slideshow-1-916-1" class="ngg-widget-slideshow" style="height:360px;width:480px;">
<div id="ngg-slideshow-1-916-1-loader" class="ngg-slideshow-loader" style="height:360px;width:480px;">
<img src="http://graffitiwarehouse.com/wp-content/plugins/nextgen-gallery/images/loader.gif" alt="" />
</div></div></div>
<div style="text-align: left">
<script type="text/javascript" defer="defer">
jQuery(document).ready(function(){ 
jQuery("#ngg-slideshow-1-916-1").nggSlideshow( {id: 0,fx:"fade",width:480,height:360,domain: "http://graffitiwarehouse.com/",timeout:10000});
});
</script>  -->

<!-- gjs end slideshow -->


<!-- Begin Navigation -->
<?php f8_theme_nav(); ?>




