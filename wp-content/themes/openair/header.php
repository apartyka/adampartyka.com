<!DOCTYPE html PUBLIC 
    "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  
  <?php global $openair_options; ?>
  
  <?php if (is_single() || is_page()) { 
          if (have_posts()) { 
		    while (have_posts()) : the_post(); ?>
  <meta name="description" content="<?php the_excerpt_rss(); ?>" />
  <?php       csv_tags(); ?>
  <?php     endwhile; 
          }
		} else if (is_home()) { ?>
  <meta name="description" content="<?php bloginfo('description'); ?>" />
  <?php } ?> 
   
  <?php if (is_home() || is_single() || is_page()) { 
          echo '<meta name="robots" content="index,follow" />'; 
	    } else { 
		  echo '<meta name="robots" content="noindex,follow" />'; 
		} ?>

  <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :: '; } ?><?php bloginfo('name'); if(is_home()) { echo ' :: '; bloginfo('description'); } ?></title>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  
  <?php wp_get_archives('type=monthly&format=link'); ?>
  <?php //comments_popup_script(); // off by default ?>
  <?php  if (is_singular()) wp_enqueue_script('comment-reply'); ?>
  <?php wp_head(); ?>
</head>

<?php 
if ($openair_options['no_of_columns'] == 'three') { 
  if ($openair_options['column_pos'] == 'left') { ?>
<body class="col_three col_left">
  <?php 
  } else if ($openair_options['column_pos'] == 'center') { ?>
<body class="col_three col_center">
  <?php 
  } else if ($openair_options['column_pos'] == 'right') { ?>
<body class="col_three col_right">
  <?php 
  }
} else if ($openair_options['sidebar_pos'] == 'left') { ?>
<body class="left">
  <?php 
} else { ?>
<body class="right">
<?php 
} ?>

  <div id="wrap">
    <div id="header">
	  <div id="text">
	    <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
		<h2 class="description" id="tagline"><?php echo bloginfo('description'); ?></h2>
	  </div>
    </div>
	