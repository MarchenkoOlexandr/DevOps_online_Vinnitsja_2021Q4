<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml" lang="ru-RU">
<head profile="//gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<link rel="stylesheet" href="//3.65.220.230/wp-content/themes/pozdravljalka/style.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="Поздравления и пожелания RSS Feed" href="//3.65.220.230/feed" />
<link rel="pingback" href="//3.65.220.230/xmlrpc.php" />
<style type="text/css" media="screen">
<?php
// Checks to see whether it needs a sidebar or not
if ( !empty($withcomments) && !is_single() ) {
?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbg-<?php bloginfo('text_direction'); ?>.jpg") repeat-y top; border: none; }
<?php } else { // No sidebar ?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbgwide.jpg") repeat-y top; border: none; }
<?php } ?>
</style>
<?php wp_head(); ?>
</head>
<body>
<div id="headergol" align="center">
	<div id="bloggol"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></div>
	<div id="descriptiongol"><?php bloginfo('description'); ?></div>
</div>
