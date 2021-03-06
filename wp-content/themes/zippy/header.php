<?php
/**
 * The Header for our theme.
 *
 
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('|', true, 'right'); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="head">
<div class="head_content">
	<div class="header_content_inner">
	<div class="head_title">
	<div class="realtor_en">Mandy <span>Liang<span></div>
	<div class="sub_line">Real Estate Specialist</div>
	<div class="realtor_zh"><span>梁</span><span>佩</span><span>美</span></div>
	</div>
<div class="header_contact">
	<div class="tele">604.720.1822</div>
	<?php
		$out = "";
		$lang = "";
		if (isset($_GET['lang'])){
			$lang = $_GET['lang'];
		}
		if ($lang!='en'){
			$out .= '<div>电话: 604-720-1822</div>';
			$out .= '<div>传真: 604-439-0512</div>';
			$out .= '<div>邮箱: mandyliang@gmail.com</div>';
		}
		// print $out;
	?>
</div>
<div class="logo"><div class="logo_pic"><a href="<?php echo esc_url(home_url('/')); ?>"><?php if ( zippy_options_array('logo') ) { ?>
    <img src="<?php echo zippy_options_array('logo'); ?>" alt="<?php bloginfo('name'); ?>" />
    <?php }else{ ?><span class="site-name"><?php bloginfo('name'); ?></span><?php }?></a>
	</div>
	<div class="icon-two"><img src="http://mandyliang.com/wp-content/uploads/2015/02/medallion_logo_2000.jpg"></div>
	</div>
</div> <!-- header content inner end -->
<div id="nav">
<?php //echo zippy_get_social_network(array("facebook",'twitter','google_plus','youtube','pinterest','rss'));?>
<div class="clear"></div>
   <div class="nav_menu">

        <?php
if(function_exists('wp_nav_menu')) {
wp_nav_menu(array('theme_location'=>'primary','depth'=>0,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span>', 'link_after' => '</span>'));
}
?> </div>

</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div><!--head-->
