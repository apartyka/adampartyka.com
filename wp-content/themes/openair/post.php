	        <?php if(!function_exists('wp_list_comments')) { ?>
            <div class="post">
			<?php } else { ?>
			<div <?php post_class(); ?>>
			<?php } ?>
			  <div class="post-top"></div>
			  
			  <!--
			    The main content of the page; then the additional links for tagging
				-->
			  <div class="post-content">
				<div class="post-title">
				  <?php if (!is_single()) { ?>
			      <h2><a href="<?php the_permalink(); ?>" rel="tag" 
						title="Permanent link to <?php the_title(); ?>"><?php the_title('',''); ?></a>
			      </h2>
				  <?php } else { ?>
				  <h2><?php the_title('',''); ?></h2>
				  <?php } ?>
				  
				  <div class="post-date">
				    <p>
<?php
    $prefix = '';
	
    $structures = array(
	'',
	$prefix . '/%year%/%monthnum%/%day%/%postname%/',
	$prefix . '/%year%/%monthnum%/%postname%/',
	$prefix . '/archives/%post_id%'
	);

    $permst = get_option('permalink_structure'); 
	
    $month = get_the_time('M'); $mon = get_the_time('m'); $yr = get_the_time('Y'); 
	
    if ($permst == $structures[1] || $permst == $structures[2]) {
?>

					  <span class="month"><a href="<?php bloginfo('url'); ?>/<?php echo $yr; ?>/<?php echo $mon; ?>/"><?php echo $month; ?></a>&nbsp;<?php the_time('j'); ?></span><br />
					  <span class="date"><a href="<?php bloginfo('url'); ?>/<?php echo $yr; ?>/"><?php the_time('Y'); ?></a></span>
                      
<?php
    } else { 
?>

					  <span class="month"><?php echo $month; ?>&nbsp;<?php the_time('j'); ?></span><br />
					  <span class="date"><?php the_time('Y'); ?></span>
                      
<?php
    }
?>
					</p>
				  </div> <!-- end .post-date //-->
				</div> <!-- end .post-title //-->
				
				<div class="post-main">
		          <?php trackback_rdf(); ?>
		          <?php the_content('Click to read more ...'); ?>
				  
				  <p>
				    <?php the_tags('Tags: ', ', ', ''); ?>
				  </p>
				  
				  <div class="spacer"><br /><br /></div>
				</div> <!-- end .post-main //-->
			  </div> <!-- end .post-content //-->
			  
			  <!--
			    The bottom of the post where comments, trackback, category and edit
				links are shown.
				-->
		      <div class="post-bottom">
			    <div class="post-comments">
				  <p>
			        <a href="<?php comments_link(); ?>" rel="tag"
				      title="<?php comments_number('0','1','%'); ?> comments on '<?php the_title(); ?>'.">
				    <?php comments_number('0','1','%'); ?>
				    </a>
				  </p>
				</div> <!-- end .post-comments //-->
				
				<div class="post-info">
		          <a href="<?php trackback_url(display); ?>" title="Trackback to '<?php the_title(); ?>'.">Trackback</a>
				  &nbsp;&bull;&nbsp;
				  Posted in <?php the_category(', '); ?>
				  &nbsp;
				  <?php edit_post_link('Edit','&bull;&nbsp;',''); ?>
				</div> <!-- end .post-info //-->
			  </div> <!-- end .post-bottom //-->
		   
			  <!--
			    Navigation links at the bottom to the previous and next pages.
				-->
	          <div class="navigation">
		        <div class="align-left"><h3><?php previous_post_link('%link','&laquo; Previous post') ?></h3></div>
		        <div class="align-right"><h3><?php next_post_link('%link','Next post &raquo;') ?></h3></div>
				<br />
	          </div> <!-- end .navigation //-->
            </div> <!-- end .post //-->
		  
			<!--
			  The comments.
			  -->
	        <?php comments_template(); ?>